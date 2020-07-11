@extends('user.content.dichvu')
@section('content')
<style type="text/css">
	.luuy{
		background-color: #CD2710;
		border-radius: 10px;
		color: white;
		padding-top: 2%;
		padding-bottom: 2%;
		margin-bottom: 5%;
	}
	.baogia{
		background-color: #24AB8C;
		border-radius: 10px;
		color: white;
		padding-top: 2%;
		padding-bottom: 2%;
	}
	.giancach{
		margin-bottom: 20px;
		justify-content: center;
	}
	.nap{
		background-color: #33813E;
		border-radius: 10px;
		color: white;
		padding-top: 2%;
		padding-bottom: 2%;
		margin-bottom: 5%;
	}
	h6{
		margin-top: 2%;
		text-align: center;
		font-weight: bold;
		font-size: 1.2rem;
	}
	.hotro{
		height: 200px;
		background-color: #90E3B7;
		border-radius: 10px;
	}
	.line{
		background-color: white;
		width: 80%;
	}
	a{
		text-decoration-line: none;
		color: white;
	}
	a:hover{
		text-decoration-line: none;
		color: white;
	}
	.hotro-a:hover{
		color: red;
	}
	.icon{
		margin-right: 10px;
	}
	.hotro-a{
		font-size: 1.5rem;
	}
	.ma{
		margin: auto;
	}
	.nap:hover{
		background-color: #3D9D82;
	}
background-color: #E49459;
	}
</style>
<div class="wrapper">
	<h6 style="text-align: center; padding-top: 1%; color: blue;font-weight: bold;font-size: 2rem;">
		Xin chào: {{auth::user()->name}}
	</h6>
		<hr>
	<div class="row">

		<div class="col-12 col-md-6 ">
			<div class="col-12 "><h6>THÔNG TIN CÁ NHÂN</h6>
<form action="{{route('post_taikhoan')}}" method="post">
	{!!csrf_field()!!}
				<table border="0">
	    			<tr>
				        <td class="short bold ">Tên tài khoản</td>
				        <td>
				        	<input class="form-control giancach" type="text" value="{{auth::user()->name}}">
				        </td>
	    			</tr>
	    			<tr>
				        <td class="short bold">Họ và tên</td>
				        <td><input class="form-control giancach" type="text" name="hoten" placeholder="Nhập họ và tên" value="{{auth::user()->hoten}}"></td>
	    			</tr>
	    			<tr>
				        <td class="short bold">Địa chỉ email</td>
				        <td><input class="form-control giancach" type="text" name="email" placeholder="Nhập địa chỉ email" value="{{auth::user()->email}}"></td>
				        </tr>
	    			<tr>
				        <td class="short bold">Số điện thoai</td>
				        <td><input class="form-control giancach" type="text" name="SDT" placeholder="Nhập số điện thoại" value="{{auth::user()->user_sdt}}"></td>
	    			</tr>
	    			<tr>
				        <td class="short bold">Link Facebook</td>
				        <td><input class="form-control giancach" type="text" name="fbid" placeholder="Nhập link Facebook" value="{{auth::user()->user_fbid}}"></td>
	    			</tr>
	    			<tr>
				        <td class="short bold">Mật khẩu cũ</td>
				        <td><input class="form-control giancach" type="password" name="mkc" placeholder="Nhập mật khẩu cũ" value="{{old('mkc')}}"></td>
	    			</tr>
	    			<tr>
				        <td class="short bold">Mật khẩu mới</td>
				        <td><input class="form-control giancach" type="password" name="mkm1" placeholder="Nhập mật khẩu mới"></td>
	    			</tr>
	    			<tr>
				        <td class="short bold">Xác nhận mật khẩu mới</td>
				        <td><input class="form-control giancach" type="password" name="mkm2" placeholder="Xác nhận mật khẩu mới"></td>
	    			</tr>
	    			<tr>
	    				<td></td>
				        <td style="text-align: center;"><button class="btn" type="submit">Lưu thay đổi</button></td>
	    			</tr>
				</table>
</form>
			</div>
		</div>
<!---------phần ghi chú mở rộng---------->
		<div class="col-12 col-md-6 ">
			<div class="col-12">
				<div class="col-12 luuy">
				<h6><i class="fa fa-dollar" style="margin-right: 2%;"></i>SỐ DƯ TÀI KHOẢN</h6>
				<h5 style="text-align: center;">{{$user_money}} coin</h5>
				</div>
			</div>
			<div class="col-12 " >
				<a href="user-payment">
				<div class="col-12 nap">
					<h6><i class="fa fa-briefcase" style="margin-right: 2%;"></i>NẠP TIỀN</h6>
				</div>
				</a>
			</div>
			<div class="col-12 " >
				<a href="user-history">
				<div class="col-12 nap">
					<h6><i class="fa fa-history" style="margin-right: 2%;"></i>LỊCH SỬ GIAO DỊCH</h6>
				</div>
				</a>
			</div>
				<div class="col-12">
					<div class="col-md-10 hotro">
						<h6>LIÊN HỆ HỖ TRỢ</h6>
						<hr class="line">
						<div class="col-12">
							<a href="" class="hotro-a"> <i class="icon fa fa-facebook"></i>Facebook</a>
						</div>
						<div class="col-12">
							<a href="" class="hotro-a"><i class="icon fa fa-users"></i>Group</a>
						</div>
						<div class="col-12">
							<a class="hotro-a"><i class="icon fa fa-phone"></i>Hotline: xxxx xxx xxx</a>
						</div>
					</div>
				</div>
			</div>
		
<!---------hết phần ghi chú mở rộng---------->
	</div>
</div>
@endsection