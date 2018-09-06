@extends('font-end.master')
@section('register')
<div id="maincontainer">
  <section id="product">
    <div class="container">
     <!--  breadcrumb --> 
      <ul class="breadcrumb">
        <li>
          <a href="#">Home</a>
          <span class="divider">/</span>
        </li>
        <li class="active">Register Account</li>
      </ul>
      <div class="row">        
        <!-- Register Account-->
        <div class="col-lg-9">
          <h1 class="heading1"><span class="maintext">Đăng kí tài khoản</span></h1>
          <form class="form-horizontal" method="POST" action="">
          	<input type="hidden" name="_token" value="{{csrf_token()}}" >
            <h3 class="heading3">Thông tin của bạn</h3>
            <div class="registerbox">
            	@include('font-end.errors')
              <fieldset>
                <div class="control-group">
                  <label class="control-label"><span class="red">*</span> Tên đăng nhập:</label>
                  <div class="controls">
                    <input type="text" name='name' class="input-xlarge" placeholder=" ... Nhập tên đăng nhập">
                  </div>
                </div>
                <div class="control-group">
                  <label class="control-label"><span class="red">*</span> Email:</label>
                  <div class="controls">
                    <input type="email" name='email' class="input-xlarge" placeholder=" ... Nhập Email của bạn">
                  </div>
                </div>
                <div class="control-group">
                  <label class="control-label"><span class="red">*</span> Mật khẩu:</label>
                  <div class="controls">
                    <input type="password" name='password' class="input-xlarge" placeholder=" ... Nhập mật khẩu">
                  </div>
                </div>
                <div class="control-group">
                  <label class="control-label"><span class="red">*</span> Nhập lại mật khẩu:</label>
                  <div class="controls">
                    <input type="password" name='re-password' class="input-xlarge" placeholder=" ... Nhập lại mật khẩu">
                  </div>
                </div>
                <div style="margin-left: 385px;">
					<input type="Submit" class="btn btn-orange" value="Đăng ký">
				</div>
              </fieldset>
          	</div>
          </form>
          <div class="clearfix"></div>
          <br>
        </div>        
        
      </div>
    </div>
  </section>
</div>
@endsection