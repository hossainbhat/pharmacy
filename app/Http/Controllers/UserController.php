<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use App\Models\UserDetail;
use Auth;
use Session;
use Image;

class UserController extends Controller
{
    public function dashboard(){
        return view("admin.dashboard");
    }

    public function login(Request $request){
        $data = $request->all();
        if($request->isMethod('post')){
            $data = $request->input();
             if (Auth::attempt(['email' => $data['email'], 'password' => $data['password']])) {
                //echo "Success"; die;
                /*Session::put('adminSession',$data['email']);*/
                return redirect('/admin/dashboard');
            }else{
                //echo "failed"; die;
                return redirect('/')->with('error_message','Invalid Username or Password');
            }
        }
        return view("admin.login");
    }

    public function profile(){
        $data['userdetail'] = UserDetail::first();
        return view("admin.profile.profile",$data);
    }
    
    public function updateProfile(Request $request,$id=null){
        $data = $request->all();
        // dd($data);die;

            //upload image
            if($request->hasFile('photo')){
                $image_tmp = $request->file('photo');
                if ($image_tmp->isValid()) {
                    // Upload Images after Resize
                    $extension = $image_tmp->getClientOriginalExtension();
                    $fileName = rand(111,99999).'.'.$extension;
                    $imagePath = 'images/profile/'.$fileName;

                    Image::make($image_tmp)->resize(110, 110)->save($imagePath);

                }
            }else if(!empty($data['current_image'])){
                $fileName = $data['current_image'];
            }else{
                $fileName = "";
            }

            

        UserDetail::where('id',$id)->update(['fast_name'=>$data['fast_name'],'middle_name'=>$data['middle_name'],'last_name'=>$data['last_name'],'phone'=>$data['phone'],'address'=>$data['address'],'city'=>$data['city'],'zip'=>$data['zip'],'photo'=>$fileName]);
        return redirect()->back()->with('success_message','profile Update has been Successfully'); 
    }

    public function setting(){
        return view("admin.profile.setting");
    }
    public function chkPassword(Request $request){

        $data = $request->all();

        // echo "<pre>"; print_r($data);

        $current_password = $data['current_pwd'];

        if(Hash::check($current_password,Auth::user()->password)){
            echo "true"; die;
        }else {
            echo "false"; die;
        }
    }

    public function updatePassword(Request $request){
        if ($request->isMethod('post')) {
            $data = $request->all();

            if(Hash::check($data['current_pwd'],Auth::user()->password)){

                if ($data['new_pwd']==$data['confirm_pwd']) {
                    User::where('id',Auth::user()->id)->update(['password'=>bcrypt($data['new_pwd'])]);
                    Session::flash('success_message','Password has been updated Successfully!');
                }else{
                   Session::flash('error_message','new Password & confirm password not match!');
                }

            }else {

                Session::flash('error_message','Incorrect Current Password!');
            }
           return redirect()->back();
      }
    }

    public function logout(){
        Session::flush();
        return redirect('/')->with('flash_message_success','Logged out Successfully'); 
    }
}
