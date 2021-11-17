<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminLogincontroller extends Controller
{
    public function adminlogin(){
        return view('admin.auth.login');
    }
    public function dashboard(){
        return view('admin.auth.dashboard');
    }

    
}
