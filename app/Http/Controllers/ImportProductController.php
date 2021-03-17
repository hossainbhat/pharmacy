<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ImportProduct;
use App\Imports\ProductImport;
use Session;
use DB;
use Excel;
class ImportProductController extends Controller
{
    public function importProduct(){

        $data['importProducts'] = ImportProduct::select('id','company','category','generic','strength','product')->get();
        return view("admin.importProduct.importProduct",$data);
    }

      
    public function addEditImportProduct(Request $request, $id=null){
 
        if ($id=="") {
            $title ="Add Product";
            $product = new ImportProduct;
            $productdata = array();
            $message ="Product Add Successfully!";
        }else{
            $title ="Edit Product";
            $productdata = ImportProduct::where('id',$id)->first();
            
            $product = ImportProduct::find($id);
            $message ="Product Update Successfully!";
        }
        if ($request->isMethod('post')) {
            $data = $request->all();
// echo "<pre>"; print_r($data); die;
            $rulse = [
                'company' => 'required',
                'category' => 'required',
                'generic' => 'required',
                'strength' => 'required',
                'product' => 'required',
            ];

            $customMessage = [
                'company.required' =>'name is required',
                'category.required' =>'name is required',
                'generic.required' =>'name is required',
                'strength.required' =>'name is required',
                'product.required' =>'name is required',
            ];

            $this->validate($request,$rulse,$customMessage);

            
            $product->company = $data['company'];
            $product->category = $data['category'];
            $product->generic = $data['generic'];
            $product->strength = $data['strength'];
            $product->product = $data['product'];
            $product->save();

            Session::flash('success_message',$message);
            return redirect("admin/import-products");
        }
        return view('admin.importProduct.add_edit_importProduct')->with(compact('title','productdata'));
    }

    public function deleteImportProduct($id=null){
        ImportProduct::where('id',$id)->delete();
        return redirect()->back()->with("success_message","Product has been deleted Successfully!");
    }

    public function importExcellProduct(Request $request){
        
        Excel::import(new ImportProduct,$request->file);
        return redirect()->back();
    }
}
