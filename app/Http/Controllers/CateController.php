<?php

namespace App\Http\Controllers;
use App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Http\Requests\CateRequest;
use App\Http\Requests\aRequest;
use App\Cate;


class CateController extends Controller
{
    public function getAdd(){

        $parent = cate::select('id','name','parent_id')->get()->toArray();
    	return view('Admin.cate.add',compact('parent'));
    }
    public function getList(){
        $data = cate::select('id','name','parent_id')->get()->toArray();
        return view('Admin.cate.list',compact('data'));
    }
    public function postAdd(aRequest $request){
    	$cate = new cate;
    	
    	$cate->name = $request->txtCateName;
        $cate->alias =changeTitle($request->txtCateName);
    	$cate->oder = $request->txtOrder;
    	$cate->keyword = $request->txtKeyword;
    	$cate->parent_id = $request->sltParent;
    	$cate->description = $request->txtDescription;
    	$cate->save();

        return redirect()->route('Admin.cate.getList');
    }

    public function getDelete($id){
        $parent = Cate::where('parent_id',$id)->count();
       
        if($parent == 0){
            if($id != 0){
                $cate = Cate::find($id);
                $cate->delete();
                return redirect()->route('Admin.cate.getList')->with(['flash'=>'Xoá thành công']);
            }
        } else{
            return redirect()->route('Admin.cate.getList')->with(['flashs'=>'Bạn không thể xoá dữ liệu này! Vì có ràng buộc nào đó.']);
            // echo    "<script type='text/javascript'>
            //             alert('Bạn không thể xoá dòng dữ liệu này!');
            //             window.location = '";
            //                 echo route('Admin.cate.getList');
            //             echo "'
            //         </script>";

        }
        
        

    }
    public function getEdit($id){
        $data = cate::FindOrFail($id)->toArray();
        $parent = cate::select('id','name','parent_id','oder','keyword','description')->get()->toArray();
        return view('Admin.cate.edit',compact('parent','data'));
    }
    public function postEdit(Request $request, $id){
        $this->validate($request,
            ["txtCateName" => "required"],
            ["txtCateName.required" => "Bạn chưa nhập Cate Name !"]
        );

        $cate = cate::findOrfail($id);

        $cate->name = $request->txtCateName;
        $cate->alias =changeTitle($request->txtCateName);
        $cate->oder = $request->txtOrder;
        $cate->keyword = $request->txtKeyword;
        $cate->parent_id = $request->sltParent;
        $cate->description = $request->txtDescription;
        $cate->save();

        return redirect()->route('Admin.cate.getList')->with(['flash' => "Cập nhập thành công"]);
    }
}
