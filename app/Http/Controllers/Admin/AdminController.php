<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    public function dashboard(){
        return view('Admin.dashboard');
    }

    public function login(Request $request){
        if($request->isMethod('post')){
           $data=$request->all();
           if(Auth::guard('admin')->attempt(['email'=>$data['email'],'password'=>$data['password'],'status'=>1])){
                return redirect('/admin/dashboard');
           }else{
               return redirect()->back()->with('err','Invalid email or password');
           }
        }
        return view('Admin.login');
    }
    public function logout(){
        Auth::guard('admin')->logout();
        return redirect('/admin/login');
    }

    public function updatePassword(Request $request){
        if($request->isMethod('post')){
            $data=$request->all();
            if(Hash::check($data['current_password'],Auth::guard('admin')->user()->password)){
                if($data['new_password']==$data['confirm_password']){
                    Admin::where('id',Auth::guard('admin')->user()->id)->update([
                        'password'=>bcrypt($data['new_password'])
                    ]);
                    return redirect()->back()->with('success','Your password has been set successfully !');
                }else{
                    return redirect()->back()->with('err','Your new password and confirmed do not match !');
                }
            }else{
               return redirect()->back()->with('err','Your current password is not correct!');
            }
        }
        $admin=Admin::where('email',Auth::guard('admin')->user()->email)->first()->toArray();
      
        return view('admin.settings.update-admin-password')->with(compact('admin'));
    }
    public function updateDetails(Request $request){
        if($request->isMethod('post')){
            $data =$request->all();
            $rules=[
                'name'     => 'required|regex:/^[\pL\s\-]+$/u',
                'mobile'=>'required|numeric'
            ];
            $this->validate($request,$rules);
            Admin::where('id',Auth::guard('admin')->user()->id)->update([
                'name'=>$data['name'],
                'mobile'=>$data['mobile']
            ]);
            return redirect()->back()->with('success','Admin details has been saved successfully!');
        }
        $admin=Admin::where('email',Auth::guard('admin')->user()->email)->first()->toArray();
        return view('admin.settings.update-admin-details')->with(compact('admin'));
    }
    public function checkCurrentPassword(Request $request){
        $data =$request->all();
       if(Hash::check($data['current_password'],Auth::guard('admin')->user()->password)){
           return 1;
       }else{
           return 0;
       }
    }
}
