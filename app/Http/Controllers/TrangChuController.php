<?php

namespace App\Http\Controllers;

use Request;
use App\Product;
use App\Oder;
use App\OderDetail;

use App\Http\Requests\CheckoutRequest;
use DB,Mail,Cart;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Auth;


class TrangChuController extends Controller
{
    public function getIndex(){
    	$product = Product::select('id','name','price','image','alias')->take(20)->get();
    	$product_new = DB::table('products')->orderBy('id','DESC')->take(4)->get();
    	return view('font-end.pages.home',compact('product','product_new'));
    }

    public function getLoaisanpham($id){
    	$product_cate = Product::select('id','name','price','cate_id','image','alias')->where('cate_id',$id)->paginate(3);
    	$cate = DB::table('cates')->select('parent_id','id','name')->where('id',$product_cate[0]->cate_id)->first();
    	$menu_cate = DB::table('cates')->select('name','alias','id','parent_id')->where('parent_id',$cate->parent_id)->get();
    	$product_new = Product::select('id','name','price','cate_id','image','alias')->orderBy('id','DESC')->take(3)->get();
    	$name_cate_product = DB::table('cates')->select('name')->where('id',$id)->first();
    	return view('font-end.pages.cate',compact('product_cate','menu_cate','product_new','name_cate_product'));
    }

    public function chitietsanpham($id){
    	$product = DB::table('products')->select('id','name','image','price','cate_id')->where('id',$id)->get();
    	$product_detail = DB::table('produc_images')->select('id','image')->where('product_id',$id)->get();
    	$product_cate = DB::table('products')->where('cate_id',$product[0]->cate_id)->where('id','<>',$id)->take(4)->get();
    	return view('font-end.pages.product-detail',compact('product','product_detail','product_cate'));
    }

    public function getLienhe(){
    	return view('font-end.pages.contact');
    }

    public function postLienhe(Request $request){
    	$data = ['name'=>$request->name,'msg'=>$request->message,'email'=>$request->email];

    	Mail::send('font-end.emails.send-email',$data,function($msg) use($data) {
    		$msg->from('ntros@gmail.com','Minh Tú-[NT]');
    		$msg->to($data['email'],$data['name']);
    		$msg->subject('------ Demo send Email Laravel ------');
    	});

    	echo "<script>
    	alert('Cảm ơn bạn đã gửi ý kiến cho chúng tôi! Chúng tôi sẽ phản hồi lại cho bạn sớm nhất.');
		window.location = '".url('/')."';
    	</script>";
    	//return redirect()->route('trangchu');
    }

    public function muahang($id){
    	$product = DB::table('products')->where('id',$id)->first();
    	cart::add(['id'=>$id,'name'=>$product->name,'qty'=>1,'price'=>$product->price,'options'=>['image'=>$product->image]]);
    	return redirect()->back();
    }
    public function giohang(){
    	$cart = cart::content();
    	$cart_c = $cart->count();
    	
    	return view('font-end.pages.shopping-cart',compact('cart','cart_c'));
    }

    public function xoasp($rowId){
    	cart::remove($rowId);
    	return redirect()->route('giohang');
    }

    public function update(Request $request){
    	if(Request::ajax()){
    		$id = Request::get('id');
    		$qty= Request::get('qty');
    		
    		cart::update($id,$qty);
    		echo "oke";
    	}
    }

    public function Thanhtoan(){

    	return view('font-end.pages.checkout');
    }

    public function postThanhtoan(Request $request){
    	if(Auth::check()){

            $oder = new Oder;
            
            //Luu đơn hàng vào database ---------------------------
            $oder->ten_kh       = Request::input('hoten');
            $oder->email        = Request::input('email');
            $oder->sdt          = Request::input('sdt');
            $oder->diachi       = Request::input('diachi');
            $oder->thanhpho     = Request::input('thanhpho');
            $oder->note         = Request::input('note');
            $oder->save();

            //Luu chi tiết đơn hàng vào database ---------------------------

            foreach(Cart::content() as $key=>$item){
                $oder_detail = new OderDetail;

                $oder_detail->ten_kh    = Request::input('hoten');
                $oder_detail->tensp     = $item->name;
                $oder_detail->qty       = $item->qty;
                $oder_detail->price     = $item->price;
                $oder_detail->total     = $item->total;
                $oder_detail->oder_id   = $oder->id;
                $oder_detail->save();
            }
            
    		$data = [
    			'hoten'=>Request::input('hoten'),
    			'email'=>Request::input('email'),
    			'sdt'=>Request::input('sdt'),
    			'diachi'=>Request::input('diachi'),
    			'thanhpho'=>Request::input('thanhpho')
    		];
            //Gửi Email đơn hàng cho khách ---------------------------
    		Mail::send('font-end.emails.email-dathang',$data,function($msg) use($data) {
    			$msg->from('ntros@gmail.com','Minh Tú-[NT]');
    			$msg->to($data['email'],$data['hoten']);
    			$msg->subject('------Demo Xác nhận đơn mua hàng [NT]------');
    		});
    		Cart::destroy();
    		return redirect()->route('complete');

    	}
        else{

    		$data =[
    			'username'  =>Request::input('username'),
    			'password'  =>Request::input('password'),
    			'level'	 => 2
    		];

    		if(Auth::attempt($data)){
    			return redirect()->route('thanhtoan');
    		}
    		else{
    			return redirect()->route('thanhtoan');}
    	}
    }

    public function getLogout(){
    	Auth::logout();
    	return redirect()->route('trangchu');
    }

    public function complete(){
    	return view('font-end.pages.complete');
    }
}
