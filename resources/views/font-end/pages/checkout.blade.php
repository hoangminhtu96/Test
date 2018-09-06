@extends('font-end.master')
@section('checkout')
<div id="maincontainer">
  <section id="product">
    <div class="container">
    <!--  breadcrumb -->  
      <ul class="breadcrumb">
        <li>
          <a href="#">Home</a>
          <span class="divider">/</span>
        </li>
        <li class="active">Thanh toán</li>
      </ul>
      <div class="row">        
        <!-- Account Login-->
        <div class="col-lg-9">
        	<h1 class="heading1"><span class="maintext">Thanh Toán</span></h1>
			@if(!Auth::check())
				<div class="checkoutsteptitle"> Bạn cần đăng nhập để thực thiện thanh toán.<a class="modify">Ẩn/Hiện</a>
        		</div>
        		<div class="checkoutstep ">
        		<section class="returncustomer">
        			<h3 class="heading3">Login </h3>
        			<div class="loginbox">
        				<form class="form-vertical" method="POST" action="{{route('thanhtoan')}}">
        					<input type="hidden" name="_token" value="{{csrf_token()}}">
        					<fieldset>
        						<div class="control-group">
        							<label class="control-label">Username:</label>
        							<div class="controls">
        								<input type="text" name="username">
        							</div>
        						</div>
        						<div class="control-group">
        							<label class="control-label">Password:</label>
        							<div class="controls">
        								<input type="password" name="password">
        							</div>
        						</div>
        						<a class="" href="#">Quên mật khẩu?</a>
        						<br>
        						<br>
        						<input type="submit" name="login-tt" value="Login">
        					</fieldset>
        				</form>
        			</div>
        	</section>
        	</div>
			@else
				@if(Cart::count() >0)
				<div class="checkoutsteptitle">Xác nhận đơn hàng<a class="modify">Ẩn/Hiện</a>
				</div>
				<div class="checkoutstep">
				  <div class="cart-info">
				    <table class="table table-striped table-bordered">
				      <tr>
				        <th class="image">Hình</th>
				        <th class="name">Tên sản phẩm</th>
				        <th class="quantity">Số lượng</th>
				        <th class="price">Số lượng</th>
				        <th class="total">Thành tiền</th>
				      </tr>
				      @if(Cart::count() >0)
				      @foreach(Cart::content() as $item)
				      	<tr>
				        <td class="image"><a href="#"><img title="product" alt="product" src="{{asset('upload/'.$item->options->image)}}" height="50" width="50"></a></td>
				        <td  class="name"><a href="#">{!!$item->name!!}</a></td>
				        <td class="quantity"><input type="text" size="1" value="{!!$item->qty!!}" name="quantity[40]" class="col-lg-2">
				          &nbsp;
				        <td class="price">{{number_format($item->price)}}</td>
				        <td class="total">{{number_format($item->price*$item->qty)}}</td>
				        </tr>
				        @endforeach
				        @endif
				    </table>
				  </div>
				  <div class="row">
				      <div class="col-lg-4 pull-right">
				        <table class="table table-striped table-bordered ">
				          <tbody>
				          	@if(cart::count()>0)
				            <tr>
				              <td><span class="extra bold totalamout">Tổng tiền :</span></td>
				              <td><span class="bold totalamout">{{cart::total()}}</span></td>
				            </tr>
				            @endif
				          </tbody>
				        </table>
				      </div>
				  </div>
				</div>
				<div class="checkoutsteptitle">Thông tin khách hàng<a class="modify">Ẩn/Hiện</a>
				</div>
				<div class="checkoutstep">
					<div class="row">
						<div class='col-lg-12'>
							@if(count($errors) > 0)
							    <div class="alert alert-danger">
							        <ul>
							            @foreach($errors->all() as $error)                              
							                <li>{!! $error !!}</li>
							            @endforeach
							        </ul>
							    </div>
							@endif
						</div>
						<label style="margin-bottom: 20px"><span class="red" style="font-size: 16px;">(*) Lưu ý: 
						Bạn sẽ thanh toán trực tiếp khi nhận hàng từ dịch vụ !</span></label>
						<form class="form-horizontal" method="POST" action="{{route('thanhtoan')}}">
							<input type="hidden" name="_token" value="{{csrf_token()}}">
							<fieldset>
								<div class="col-lg-6">
									<div class="control-group">
										<label class="control-label" >Họ Tên<span class="red">*</span></label>
										<div class="controls">
											<input type="text" class="" name="hoten" value="" required>
										</div>
									</div>

									<div class="control-group">
										<label class="control-label" >E-Mail<span class="red">*</span></label>
										<div class="controls">
											<input type="email" class="" name="email" value="" required>
										</div>
									</div>
									<div class="control-group">
										<label class="control-label" >Số điện thoại<span class="red">*</span></label>
										<div class="controls">
											<input type="text" class="" name="sdt" value="" required>
										</div>
									</div>
								</div>
								<div class="col-lg-6">
									<div class="control-group">
										<label class="control-label" >Địa chỉ<span class="red">*</span></label>
										<div class="controls">
											<input type="text" class="" name="diachi" value="" required>
										</div>
									</div>

									<div class="control-group">
										<label class="control-label" >Thành Phố<span class="red">*</span></label>
										<div class="controls">
											<input type="text" class="" name="thanhpho" value="" required>
										</div>

									</div>
									<div class="control-group">
										<label class="control-label" >Ghi chú<span class="red">*</span></label>
										<div class="controls">
											<textarea name="note"></textarea>
										</div>

									</div>
									
								</fieldset>

								<input type="submit" style="" class="btn btn-orange pull-right mr10" value="Đặt hàng">
							</form>
						</div>
					</div>
				@else
					<p style="color:red; font-size: 16px">-- Giỏ hàng trống! Hãy mua thêm sản phẩm và thực hiện thanh toán! --</p>
				@endif
          	@endif
        </div>        
      </div>
    </div>
  </section>
</div>
@endsection()