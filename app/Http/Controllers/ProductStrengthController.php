<?php

namespace App\Http\Controllers;

use App\Models\ProductStrength;
use Illuminate\Http\Request;
use Session;
class ProductStrengthController extends Controller
{
    public function ProductStrength(){
        $data['strengths'] = ProductStrength::get();
        return view("admin.strength.strengths",$data);
    }
    public function addEditProductStrength(Request $request,$id=null){
        if ($id=="") {
            $title ="Add Strength";
            $strength = new ProductStrength;
            $strengthdata = array();
            $message ="Strength Add Successfully!";
        }else{
            $title ="Edit Strength";
            $strengthdata = ProductStrength::where('id',$id)->first();
            
            $strength = ProductStrength::find($id);
            $message ="Strength Update Successfully!";
        }
        if ($request->isMethod('post')) {
            $data = $request->all();
// echo "<pre>"; print_r($data); die;
            $rulse = [
                'name' => 'required',
            ];

            $customMessage = [
                'name.required' =>'Product Strength is required',
            ];

            $this->validate($request,$rulse,$customMessage);

            
            $strength->name = $data['name'];
            $strength->save();

            Session::flash('success_message',$message);
            return redirect("admin/strengths");
        }
        return view("admin.strength.add-edit-product-strength")->with(compact('title','strengthdata'));
    }

    public function deleteProductStrength($id=null){
        ProductStrength::where('id',$id)->delete();
        return redirect()->back()->with("success_message","Madicine strength has been deleted Successfully!");
    }
  
}
