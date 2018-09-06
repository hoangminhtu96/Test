<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\UserRequest;
use Illuminate\Support\Facades\Auth;
use App\User;
use App\admin;
use Hash;
class UserController extends Controller
{
    public function getAdd(){
    	return view('Admin.user.add');
    }

    public function postAdd(UserRequest $request){
        if($request->rdoLevel == 2){
            $user                       = new User;
            $user->username             = $request->txtUser;
            $user->email                = $request->txtEmail;
            $user->password             = Hash::make($request->txtPass);
            $user->level                = $request->rdoLevel;
            $user->remember_token       = $request->_token;

            $user->save();
            return redirect()->route('Admin.user.getList')->with(['flash'=>'Đã thêm thành viên: '.$request->txtUser.' thành công!']);
        }else{
            $user                       = new admin;
            $user->username             = $request->txtUser;
            $user->email                = $request->txtEmail;
            $user->password             = Hash::make($request->txtPass);
            $user->level                = $request->rdoLevel;
            $user->remember_token       = $request->_token;

            $user->save();
            return redirect()->route('Admin.user.getListAd')->with(['flash'=>'Đã thêm Admin: '.$request->txtUser.' thành công!']);
        }
    }

    public function getList(){
    	$data = User::select('id','username','level')->orderBy('id','DESC')->get()->toArray();
    	return view('Admin.user.list',compact('data'));
    }

    public function getEdit($id){
        $user_login = Auth::guard('admin')->user()->id;
    	$user = User::findOrfail($id);

        return view('Admin.user.edit',compact('user','id'));
    }
    
    public function postEdit(Request $request,$id){
        $user = User::find($id);

        if($request->input('pass')){
            $this->validate($request,
                [
                    'pass' => 'required|min:6',
                    'repass' => 'required|same:pass',
                    'email' =>'required|email'
                ],
                [
                    'pass.required'     => 'Xin vui lòng nhập Password',
                    'pass.min'          => 'Password phải >= 6 ký tự',
                    'repass.required'   => 'Xin vui lòng nhập lại Password',
                    'repass.same'       => '2 Password không trùng khớp',
                    'email.required'    =>  'Xin vui lòng nhập Email',
                    'email.email'       =>  'Email không hợp lệ'
                ]
            );
        }
        if($request->rdoLevel == 2){
            $user->password = Hash::make($request->pass);
            $user->email    = $request->email;
            $user->level    = $request->rdoLevel;
            $user->remember_token = $request->_token;
            $user->save();    
        }
        else{

            $user1                       = new admin;
            $user1->username             = $user->username;
            $user1->email                = $request->email;
            $user1->level                = $request->rdoLevel;

            $user1->password             = Hash::make($request->pass);
            $user1->level                = $request->rdoLevel;
            $user1->remember_token       = $request->_token;

            $user1->save();

            $user->delete();
        }
        
        return redirect()->route('Admin.user.getList')->with(['flash'=>'Đã sửa xong thành viên: '.$user->username]);  
    }
    public function getDelete($id){
        if(Auth::guard('admin')->check()){
            $user_login = Auth::guard('admin')->user()->id;
            $user = User::findOrfail($id);
        
            $user->delete();
            return redirect()->route('Admin.user.getList')->with(['flash'=>'Đã xoá thành viên: '.$user->username]);
        }
    }

    public function getListAd(){
        $data = admin::select('id','username','level')->orderBy('id','DESC')->get()->toArray();
        return view('Admin.user.Admin_list',compact('data'));
    }

    public function getDeleteAd($id){
        if(Auth::guard('admin')->check() && Auth::guard('admin')->id() == 3){
            $user_login = Auth::guard('admin')->user()->id;
            $user = admin::findOrfail($id);
            
             if($user_login == $id){
                return redirect()->route('Admin.user.getListAd')->with(['flashs'=>'Không thể xoá!']);
            }
            else{
                $user->delete();
                return redirect()->route('Admin.user.getListAd')->with(['flash'=>'Đã xoá thành viên: '.$user->username]);
            }
        }
    }
    public function getEditAd($id){
        $user_login = Auth::guard('admin')->user()->id;
        $user = admin::findOrfail($id);

        return view('Admin.user.Admin_edit',compact('user','id'));
    }

    public function postEditAd(Request $request,$id){
        $user = admin::find($id);

        if($request->input('pass')){
            $this->validate($request,
                [
                    'pass' => 'required|min:6',
                    'repass' => 'required|same:pass',
                    'email' =>'required|email'
                ],
                [
                    'pass.required'     => 'Xin vui lòng nhập Password',
                    'pass.min'          => 'Password phải >= 6 ký tự',
                    'repass.required'   => 'Xin vui lòng nhập lại Password',
                    'repass.same'       => '2 Password không trùng khớp',
                    'email.required'    =>  'Xin vui lòng nhập Email',
                    'email.email'       =>  'Email không hợp lệ'
                ]
            );
        }
        if($request->rdoLevel == 1){
            $user->password             = Hash::make($request->pass);
            $user->email                = $request->email;
            $user->level                = $request->rdoLevel;
            $user->remember_token       = $request->_token;
            $user->save();    
        }
        else{

            $user1                       = new User;
            $user1->username             = $user->username;
            $user1->email                = $request->email;
            $user1->level                = $request->rdoLevel;
            $user1->password             = Hash::make($request->pass);
            $user1->level                = $request->rdoLevel;
            $user1->remember_token       = $request->_token;
            $user1->save();
            $user->delete();
        }
        return redirect()->route('Admin.user.getListAd')->with(['flash'=>'Đã sửa xong!']); 
    }
}
