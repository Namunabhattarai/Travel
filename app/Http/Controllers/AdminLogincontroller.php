<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
class AdminLogincontroller extends Controller
{
    public function adminlogin(Request $request){
        if($request->isMethod('post')){
            $data=$request->all();
            // dd($data);
            if(Auth::guard('admin')->attempt(['email'=> $data=['email'],'password'=>$data=['password']])){
                return redirect('/admin/dashboard');
            }
            else{
                return redirect()->back();
            }
        }
    
        return view('admin.auth.login');
    }
    public function dashboard(){
        return view('admin.auth.dashboard');
    }

    
}
