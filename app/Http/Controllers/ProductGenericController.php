<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ProductGeneric;
use App\Models\ProductCategory;
use Session;

class ProductGenericController extends Controller
{
    public function ProductGeneric(){
        $data['generics'] = ProductGeneric::get();
        return view("admin.generic.generics",$data);
    }

    public function addEditProductGeneric(Request $request, $id=null){
        if ($id=="") {
            $title ="Add Generic";
            $generic = new ProductGeneric;
            $genericdata = array();
            $message ="generic Add Successfully!";
        }else{
            $title ="Edit Generic";
            $genericdata = ProductGeneric::where('id',$id)->first();
            
            $generic = ProductGeneric::find($id);
            $message ="generic Update Successfully!";
        }
        if ($request->isMethod('post')) {
            $data = $request->all();
// echo "<pre>"; print_r($data); die;
            $rulse = [
                'category_id' => 'required',
                'name' => 'required',
            ];

            $customMessage = [
                'category_id.required' =>'Product category is required',
                'name.required' =>'Product generic is required',
            ];

            $this->validate($request,$rulse,$customMessage);

            
            $generic->category_id = $data['category_id'];
            $generic->name = $data['name'];
            $generic->save();

            Session::flash('success_message',$message);
            return redirect("admin/generics");
        }
        $categories = ProductCategory::get();
        return view("admin.generic.add-Edit-Generic")->with(compact('genericdata','categories'));
    }

    public function deleteProductGeneric($id){
        ProductGeneric::where('id',$id)->delete();
        return redirect()->back()->with("success_message","Madicine generic has been deleted Successfully!");
        
    }
}
