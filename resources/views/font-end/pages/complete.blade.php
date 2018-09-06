@extends('font-end.master')
@section('complete')
<style type="text/css" media="screen">
	div.complete{
		color: green;
		width: 50%;
		height: 50%;
		margin: 0px auto;
		text-align: center;
		border: 1px solid;
	}
	.msg{
		margin-top: 20px;
	}
</style>
<font face="Arial" >
	<div class="container complete">
		<div >
			<h3 style="color:green">Cảm ơn quý khách đã mua hàng!</h3>
		</div>
		<div class="msg">
			<p>Thông tin đơn hàng sẽ được gửi vào địa chỉ Email của bạn</p>
			<p>Mọi thông tin về mặt hàng đều được đính kèm theo</p>
			<p>Hàng sẽ được chuyển đến địa chỉ mà bạn đã đặt</p>
			<p>Xin cảm ơn bạn đã mua hàng & sử dụng dịch vụ của chúng tôi!</p>	
		</div>
		
	</div>
</font>
@endsection()