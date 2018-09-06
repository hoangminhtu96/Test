@extends('font-end.master')
@section('shopping-cart')
<div id="maincontainer">
  <section id="product">
    <div class="container">
     <!--  breadcrumb --> 
      <ul class="breadcrumb">
        <li>
          <a href="#">Home</a>
          <span class="divider">/</span>
        </li>
        <li class="active"> Shopping Cart</li>
      </ul>       
      <h1 class="heading1"><span class="maintext"> Shopping Cart</span><span class="subtext"> All items in your  Shopping Cart</span></h1>
      <!-- Cart-->
      <div class="cart-info">
        <table class="table table-striped table-bordered">
          <tr>
            <th class="image">Image</th>
            <th class="name">Product Name</th>
            <th class="quantity">Qty</th>
              <th class="total">Action</th>
            <th class="price">Unit Price</th>
            <th class="total">Total</th>
           
          </tr>
		 	<form name="cart" action="" method="POST" accept-charset="utf-8">
			<input type="hidden" name="_token" value="{{csrf_token()}}">
			@if($cart_c == 0)
			<p style="color: red; font-size: 16px">-- Hiện tại không có sản phẩm nào --</p>
			@else($cart_c > 0)
         	@foreach($cart as $item)
         	
          	<tr>
            <td class="image"><a href="#"><img title="product" alt="product" src="{{asset('upload/'.$item->options->image)}}" height="50" width="50"></a></td>
            <td class="name"><a href="#">{!!$item->name!!}</a></td>
            <td class="quantity"><input type="text" id="qty" size="1" value="{!!$item->qty!!}" name="quantity[40]" class="col-lg-2">
             
            </td>
            <td class="total">
            	<a href="#" class="update-sp" id="{{$item->rowId}}"><img class="tooltip-test" data-original-title="Update" src="{{asset('font-end/img/update.png')}}" alt=""></a>
            	<a href="{{url('xoa-sp',[$item->rowId])}}"><img class="tooltip-test" data-original-title="Remove"  src="{{asset('font-end/img/remove.png')}}" alt=""></a></td>

            <td class="price">{{number_format($item->price)}}</td>
            <td class="total">{{number_format($item->price*$item->qty)}}</td>
             
          	</tr>
          	
          	@endforeach
          	@endif
          	</form>
        </table>
      </div>
      <div class="container">
      <div>
          <div class="col-lg-4 pull-right">
            <table class="table table-striped table-bordered ">
              <tr>
                <td><span class="extra bold totalamout">Total :</span></td>
                @if($cart_c >0)
                <td class="total">{{cart::total()}}</td>
                @endif
              </tr>
            </table>
            <div class="pull-right"><a class="btn btn-orange" href="{!!route('thanhtoan')!!}">Thanh toán</a> </div>
          </div>
        </div>
        </div>
    </div>
  </section>
</div>
@endsection()