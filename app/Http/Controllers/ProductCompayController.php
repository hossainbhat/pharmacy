<?php

namespace App\Http\Controllers;

use App\Models\ProductCompany;
use Illuminate\Http\Request;
use Session;
class ProductCompayController extends Controller
{
    public function ProductCompany(){
        $data['companies'] = ProductCompany::get();
        return view("admin.company.productCompanies",$data);
    }

    public function addEditProductCompany(Request $request,$id=null){
        if ($id=="") {
            $title ="Add Company";
            $company = new ProductCompany;
            $companydata = array();
            $message ="Company Add Successfully!";
        }else{
            $title ="Edit Company";
            $companydata = ProductCompany::where('id',$id)->first();
            
            $company = ProductCompany::find($id);
            $message ="Company Update Successfully!";
        }
        if ($request->isMethod('post')) {
            $data = $request->all();
// echo "<pre>"; print_r($data); die;
            $rulse = [
                'name' => 'required',
            ];

            $customMessage = [
                'name.required' =>'Product Company is required',
            ];

            $this->validate($request,$rulse,$customMessage);

            
            $company->name = $data['name'];
            $company->save();

            Session::flash('success_message',$message);
            return redirect("admin/companies");
        }
        return view("admin.company.add-edit-product-company")->with(compact('title','companydata'));
    }

    public function deleteProductCompany($id=null){
        ProductCompany::where('id',$id)->delete();
        return redirect()->back()->with("success_message","Madicine Company has been deleted Successfully!");
    }
}
