<?php

namespace App\Http\Controllers;

use App\Models\ProductCategory;
use App\Models\ProductCompany;
use Illuminate\Http\Request;
use Session;

class ProductCategoryController extends Controller
{
    public function ProductCategory(){
        $data['categories'] = ProductCategory::with(['company'])->get();
        // dd($data);
        return view("admin.category.product-category",$data);
    }
    public function addEditProductCategory(Request $request,$id=null){
        if ($id=="") {
            $title ="Add Category";
            $category = new ProductCategory;
            $categorydata = array();
            $message ="Category Add Successfully!";
        }else{
            $title ="Edit Category";
            $categorydata = ProductCategory::where('id',$id)->first();
            
            $category = ProductCategory::find($id);
            $message ="Category Update Successfully!";
        }
        if ($request->isMethod('post')) {
            $data = $request->all();
// echo "<pre>"; print_r($data); die;
            $rulse = [
                'company_id' => 'required',
                'name' => 'required',
            ];

            $customMessage = [
                'company_id.required' =>'Product company is required',
                'name.required' =>'Product Category is required',
            ];

            $this->validate($request,$rulse,$customMessage);

            
            $category->company_id = $data['company_id'];
            $category->name = $data['name'];
            $category->save();

            Session::flash('success_message',$message);
            return redirect("admin/categories");
        }
        $companies = ProductCompany::get();
        return view("admin.category.add-edit-product-category")->with(compact('title','categorydata','companies'));
    }

    public function deleteProductCategory($id=null){
        ProductCategory::where('id',$id)->delete();
        return redirect()->back()->with("success_message","Madicine category has been deleted Successfully!");
    }
}
