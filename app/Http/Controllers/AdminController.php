<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Contracts\Auth\Guard;

class AdminController extends Controller
{

    public function getLogin(){
    	return view('Admin.login');
    }

    public function postLogin(Request $request){

        $data =[
         'username'  => $request->username,
         'password'  => $request->password,
         'level'	 => 1
        ];

        if(Auth::guard('admin')->attempt($data)){
        	
        	return redirect()->route('Admin.cate.getList');
        	
        }
        
        else {return redirect('login-admin');}
    }
}
