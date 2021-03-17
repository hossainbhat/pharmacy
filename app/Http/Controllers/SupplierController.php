<?php

namespace App\Http\Controllers;

use App\Models\Supplier;
use Illuminate\Http\Request;
use Session;

class SupplierController extends Controller
{
    public function Supplier(){
        $data['suppliers'] = Supplier::get();
        return view("admin.supplier.suppliers",$data);
    }
    public function addEditSupplier(Request $request,$id=null){
        if ($id=="") {
            $title ="Add Supplier";
            $supplier = new Supplier;
            $supplierdata = array();
            $message ="Supplier Add Successfully!";
        }else{
            $title ="Edit Supplier";
            $supplierdata = Supplier::where('id',$id)->first();
            
            $supplier = Supplier::find($id);
            $message ="Supplier Update Successfully!";
        }
        if ($request->isMethod('post')) {
            $data = $request->all();
// echo "<pre>"; print_r($data); die;
            $rulse = [
                'name' => 'required',
                'email' => 'required',
                'phone' => 'required',
                'address' => 'required',

            ];

            $customMessage = [
                'name.required' =>' name is required',
                'email.required' =>' email is required',
                'phone.required' =>' phone is required',
                'address.required' =>' address is required',
            ];

            $this->validate($request,$rulse,$customMessage);

            
            $supplier->name = $data['name'];
            $supplier->email = $data['email'];
            $supplier->phone = $data['phone'];
            $supplier->address = $data['address'];
            $supplier->save();

            Session::flash('success_message',$message);
            return redirect("admin/suppliers");
        }
        return view("admin.supplier.add-edit-supplier")->with(compact('title','supplierdata'));
    }
    public function deleteSupplier($id=null){
        Supplier::where('id',$id)->delete();
        return redirect()->back()->with("success_message","Madicine strength has been deleted Successfully!");
    }

}
