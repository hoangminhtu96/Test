
<style type="text/css" media="screen">
	td{padding:8px; text-align: center;border:1px solid;} 
	th{padding:10px; border:1px solid;}
	table{border:1px solid;}
	#ok{

		width: 50%;
		height: 50%;
		margin: 0px auto;
		
	}
</style>
<div id="ok">
	<font face="Arial">
		<div>
			<font color="#FF9600"><h3>Thông tin khách hàng</h3></font>
			<p>
				<strong>Khách hàng: {{$hoten}}</strong>
			</p>
			<p>
				<strong>Địa chỉ email: {{$email}}</strong>
			</p>
			<p>
				<strong>Số điện thoại: {{$sdt}}</strong>
			</p>
			<p>
				<strong>Địa chỉ: {{$diachi}} - Thuộc thành phố: {{$thanhpho}}</strong>
			</p>
		</div>
		<div>
			<font color="#FF9600"><h3>Hoá đơn của bạn</h3></font>
			<div>
			    <table >
			      <tr>
			        <th >Tên</th>
			        <th >Số lượng</th>
			        <th >Giá</th>
			        <th >Thành tiền</th>
			      </tr>
			      @foreach(Cart::content() as $item)
			      <tr>
			        <td >{!!$item->name!!}</td>
			        <td >&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;{!!$item->qty!!}</td>
			        <td >&nbsp;&nbsp;{{number_format($item->price)}}</td>
			        <td >&nbsp;&nbsp;{{number_format($item->price*$item->qty)}}</td>
			      </tr>
			      @endforeach
			    </table>
			</div>
			<div style="margin-top: 3px">
				<div >
					<table>
						<tbody>
							<tr>
								<font color="#FF9600"><h3>Tổng tiền: </h3></font>
								<td><span >{{cart::total()}}</span></td>
							</tr>
						</tbody>
					</table>
				</div>
			</div>

		</div>
		
	</font>
</div>