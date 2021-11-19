<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Admin;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;
use Auth;


class AdminProfileController extends Controller
{
    //Admin Profile
    public function profile(){
        $admin = Auth::guard('admin')->user();
        return view('admin.profile',compact('admin'));

    }
    //Update Profile
    public function updateProfile(Request $request, $id){
        $data =$request->all();
        // dd($data);
        $rule=[
            'name'=> 'required|max:255',
            'email'=> 'required|email|max:255',
            'phone'=> 'required',

        ];
        $customMessages= [
            'name.required' => 'Please enter the name',
            'name.max' => 'You are not allowed to enter more than 255 characters',
            'email.required' => 'Please enter email',
            'email.max' => 'You are not allowed to enter more than 255 characters',
            'email.email' => 'please a valid email address',
            'phone.required' => 'Please enter phone',
        ];
        // $this->validate($request,$rule,$customMessages);
        $admin_id=Auth::guard('admin')->user()->id;
        $admin= Admin::findorFail($admin_id);
        $admin->name = $data['name'];
        $admin->email = $data['email'];
        $admin->phone = $data['phone'];
        $random = Str::random(10);
        if($request->hasFile('image')){
            $img_tmp = $request->file('image');
            if($image_tmp->isValid()){
                $extension = $img_tmp->getClientOriginalExtension();
                $filename = $random . '.' . $extension;

            }
        }
        $admin->save();
        Session::flash('success_message', 'Admin profile has been updated successfully');
        return redirect()->back();

    }
}
