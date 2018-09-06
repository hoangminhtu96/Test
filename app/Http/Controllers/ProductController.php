<?php

namespace App\Http\Controllers;
use Request;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Auth;
use Illuminate\Contracts\Auth\Guard;

use Illuminate\Support\Facades\Storage;
use App\Http\Requests\ProductRequest;
use App\Http\Requests\ProductEditRequest;
use App\Cate;
use App\Product;
use File;
use App\ProductImage;

class ProductController extends Controller
{
    public function getAdd()
    {
    	$parent = Cate::select('id','parent_id','name')->get()->toArray();
    	return view('Admin.product.add',compact('parent'));
    }
    public function postAdd(ProductRequest $request)
    {
    	$file_name = $request->file('fImages')->getClientOriginalName();
    	
    	$product = new Product;

    	$product->name     = $request->txtName;
    	$product->alias    = changeTitle($request->txtName);
    	$product->price    = $request->txtPrice;
    	$product->intro    = $request->txtIntro;
    	$product->content  = $request->txtContent;
    	$product->image    = $file_name;
    	
    	if($request->hasFile('fImages')){
    		$request->file('fImages')->move('upload/',$file_name);
    	}

    	$product->keyword  = $request->txtKeyword;
    	$product->description  = $request->txtDescript;
    	$product->cate_id  = $request->sltParent;
    	$product->admin_id  = Auth::guard('admin')->user()->id;
    	$product->save();

    	$product_id = $product->id;
    	if($request->hasFile('fProduc-detail')){
    		foreach($request->file('fProduc-detail') as $file){
    			$product_img = new ProductImage();
    			if(isset($file)){
    				$file->move('upload/detail',$file->getClientOriginalName());
    				$product_img->image = $file->getClientOriginalName();
    				$product_img->product_id = $product_id;
    				
    				$product_img->save();
    			}
    		}	
    	}

    	return redirect()->route('Admin.product.getList')->with(['flash' => 'Thêm sản phẩm thành công']);
    }

    public function getList()
    {
    	$data = Product::select('id','name','cate_id','price','created_at')->orderBy('id','DESC')->get()->toArray();
    	return view('Admin.product.list',compact('data'));
    }
    public function getDelete($id)
    {
    	$product_img_detail = Product::find($id)->pimages->toArray();
    	foreach($product_img_detail as $item){
    		File::delete('upload/detail/'.$item['image']);
    	}

    	$product_img = Product::find($id);
    	File::delete('upload/'.$product_img->image);
    	$product_img->delete();
    	return redirect()->route('Admin.product.getList')->with(['flash' => 'Xoá sản phẩm thành công']);
    }

    public function getEdit($id)
    {   
        $cate = Cate::select('id','name','parent_id')->get()->toArray();
        $product = Product::find($id)->toArray();
        $product_img = Product::find($id)->pimages->toArray();
        return view('Admin.product.edit',compact('cate','product','product_img'));
    }

    public function postEdit(ProductEditRequest $request,$id)
    {
        $product = Product::findOrfail($id);

        // Sửa thông tin của bảng Product------------------------------------------
        $product->name          = Request::input('txtName');
        $product->alias         = changeTitle(Request::input('txtName'));
        $product->price         = Request::input('txtPrice');
        $product->intro         = Request::input('txtIntro');
        $product->content       = Request::input('txtContent');
        $product->keyword       = Request::input('txtKeyword');
        $product->description   = Request::input('txtDescription');
        $product->cate_id       = Request::input('sltParent');
        $product->user_id       = Auth::guard('admin')->user()->id;

        if(!empty(Request::hasfile('fImages'))){
            $img_name_current = Request::input('img-current');
            $src_img_current = "upload/".$img_name_current;
            $img_name = Request::file('fImages')->getClientOriginalName();

            if(File::exists("$src_img_current")){
                File::delete("$src_img_current");
            }
            $product->image = $img_name;
            Request::file('fImages')->move('upload/',$img_name);
            $product->save();
        }

        //Chỉnh sửa Img--------------------------------------------------------
        if(!empty(Request::hasfile('fEdit-detail'))){
            foreach(Request::file('fEdit-detail') as $file){
                $img_name = $file->getClientOriginalName();
                $product_img = ProductImage::find($id);

                $product_img->image = $img_name;
                $product_img->product_id = $id;
                $product_img->save();
            }
            
            if(!empty(Request::input('f-name-current'))){
                $arr = Request::input('f-name-current');
                foreach($arr as $key => $item){
                    $src_img_detail = "upload/detail/".$item;
                    if(File::exists($src_img_detail)){
                        File::delete($src_img_detail);
                    }
                }
            }   
        }
        //Chỉnh sửa Img-detail--------------------------------------------------------
        if(!empty(Request::hasfile('f-Edit-detail'))){
            foreach(Request::file('f-Edit-detail') as $file){
                $img_name = $file->getClientOriginalName();
                $product_img = new ProductImage;

                $src_img = "upload/".$img_name;
            
                $product_img->image = $img_name;
                $product_img->product_id = $id;
                $file->move('upload/detail/',$img_name);
                $product_img->save(); 
            }
        }
        $product->save();
        return redirect()->route('Admin.product.getList')->with(['flash'=>'Sửa thành công']);
    }

    public function getDelImg($id)
    {
        if(Request::ajax()){
            $idHinh = (int)Request::get('id');
            $img_detail = ProductImage::find($idHinh);
            if(!empty($img_detail)){
                $img = 'upload/detail/'.$img_detail->image;
                if(File::exists($img)){
                    File::delete($img);
                }
                $img_detail->delete();
            }
            return "Oke";
        }
    }


}
