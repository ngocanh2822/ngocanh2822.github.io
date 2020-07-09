@extends('user.content.dichvu')
@section('content')
<style type="text/css">
	.luuy{
		background-color: #689B45;
		border-radius: 10px;
		color: white;
		padding-top: 2%;
		padding-bottom: 2%;
		margin-bottom: 5%;
	}
	.huongdan{
		background-color:#CD2710;
		border-radius: 10px;
		color: white;
		padding-top: 2%;
		padding-bottom: 2%;
		padding-left: 5%;
		padding-right: 5%;
		font-size: 1.2rem;
	}
	.stk{
		background-color: #24AB8C;
		color: white;
		padding: 10px;
		margin-top: 2%;
		border-radius: 10px;
	}
	pre{
		font-size: 1.2rem;
		color: white;
	}
	.lichsu{
		border-radius: 10px;
		margin-top: 2%;
		border: 1px solid gray;
	}
	td{
		padding-bottom: 0!important;
	}
</style>
<div class="wrapper">
	<h6 style="text-align: center; padding-top: 1%; font-weight: bold;font-size: 2rem;">NẠP TIỀN</h6><hr>
	<div class="row">
		<div class="col-12 col-md-8 ">
			<div class="col-12 huongdan">
				<h5>Tỷ giá: 1 VND = 1 coin</h5>
					Bạn vui lòng chuyển khoản chính xác nội dung chuyển khoản bên dưới, hệ thống sẽ tự động cộng tiền cho bạn sau 1 phút sau khi nhận được tiền.<br/><br/>
					Nếu chuyển khác ngân hàng sẽ mất thời gian lâu hơn, tùy thời gian xử lý của mỗi ngân hàng.<br/><br/>
					Nếu sau 10 phút từ khi tiền trong tài khoản của bạn bị trừ mà bạn vẫn chưa được cộng tiền vui lòng liên hệ hỗ trợ với chúng tôi để được hỗ trợ.
			</div>
		<div class="col-12">
			<div class="row">
			<div class="col-12 col-md-6 ">
				<div class="col-12 stk">
				<h4>
				<i class="fa fa-credit-card" style="margin-right: 2%;"></i>Tài khoản 1</h4>
					<pre>Ngân hàng:Techcombank
Chủ tài khoản: HA TRONG HUNG
Số tài khoản: 19128485517038
Chi nhánh: Hà Nội</pre>
</div>
			</div>
			<div class="col-12 col-md-6 ">
				<div class="col-12 stk">
				<h4><i class="fa fa-credit-card" style="margin-right: 2%;"></i></i>Tài khoản 2</h4>
					<pre>Ngân hàng:Techcombank
Chủ tài khoản: HA TRONG HUNG
Số tài khoản: 19128485517038
Chi nhánh: Hà Nội</pre>
				</div>
			</div>
		</div>
		<div class="col-12 stk">

			<h4>NỘI DUNG CHUYỂN KHOẢN</h4> 
			<h4 style=" text-align: center;">{{auth::user()->email}}</h4>
		</div>
		</div>
	</div>
<!---------phần ghi chú mở rộng---------->
		<div class="col-12 col-md-4 " style="margin-top: 2%;">
			<div class="col-12">
				<div class="col-12 luuy">
				<h6><i class="fa fa-money" style="margin-right: 2%;"></i>SỐ TIỀN HIỆN CÓ</h6>
				<h4 style="text-align: center;">{{$user_money}} coin</h4>
				</div>
			</div>
			<div class="col-12">
				<div class="col-12 luuy">
				<h6><i class="fa fa-info-circle" style="margin-right: 2%;"></i>HƯỚNG DẪN NẠP TIỀN</h6>
					<div class="col-12 ">
				<h5>Tỷ giá: 1 VND = 1 coin</h5>
					Bạn vui lòng chuyển khoản chính xác nội dung chuyển khoản bên dưới, hệ thống sẽ tự động cộng tiền cho bạn sau 1 phút sau khi nhận được tiền.<br/><br/>
					Nếu chuyển khác ngân hàng sẽ mất thời gian lâu hơn, tùy thời gian xử lý của mỗi ngân hàng.<br/><br/>
					Nếu sau 10 phút từ khi tiền trong tài khoản của bạn bị trừ mà bạn vẫn chưa được cộng tiền vui lòng liên hệ hỗ trợ với chúng tôi để được hỗ trợ.
			</div>
				</div>
			</div>
		</div>
<!---------hết phần ghi chú mở rộng---------->
	</div>
<!---------lịch sử---------->	
	<div class="col-12 " >
		<div class="col-12 lichsu" style="margin-bottom: 1%;" >
			<h6 style="text-align: center; padding-top: 1%;font-weight: bold;font-size: 1rem;">LỊCH SỬ NẠP TIỀN</h6><hr>
			<table border="1">
				<tr >
					<td >STT</td>
					<td >Thời gian</td>
					<td >Số tiền</td>
					<td >Trạng thái</td>
				</tr>
			</table>
		</div>
	</div>
<!---------hết lịch sử---------->
</div>
@endsection