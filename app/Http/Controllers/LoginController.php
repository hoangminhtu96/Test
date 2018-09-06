<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\User;
class LoginController extends Controller
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

        $data1 =[
         'username'  => $request->username,
         'password'  => $request->password,
         'level'     => 2
        ];


        if(Auth::guard('admin')->attempt($data)){
        	return redirect()->route('Admin.cate.getList');
        }
        else if(Auth::attempt($data1)){
         	return redirect('/');}
        else {return redirect('login-all');}
    }

    public function getLogout(){
        if(Auth::guard('admin')->check()){
            Auth::guard('admin')->logout();
        }
        if(Auth::check()){
    	   Auth::logout();
        }
    	return redirect()->route('getLogin');
    }
}
