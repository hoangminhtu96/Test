<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\RegisterRequest;
use Illuminate\Validation\Validator;
use App\User;
use Hash;
class RegisterController extends Controller
{
    public function getR(){
    	return view('font-end.pages.register');
    }

    public function postR(RegisterRequest $request){
    	$user = new User();

    	$user->username = $request->name;
    	$user->password = Hash::make($request->password);
    	$user->email = $request->email;
    	$user->level = 2;
    	$user->remember_token = $request->_token;

    	$user->save();
    	return redirect('/');
    }
}
