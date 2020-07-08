@extends('user.content.dichvu')
@section('content')
<style type="text/css">

	.chucnang-chitiet-fb{
		height: 100px;
		background-color: #0B8347;
		border-radius: 10px;
		margin-top: 10px;
		font-size: 1.2rem;
		text-transform: uppercase;
		display: flex;
		flex-direction: column;
		text-align: center;
		justify-content: center;
		text-shadow: 2px 2px 5px red;
		box-shadow: 5px 5px 5px #2CA051 inset;
		font-weight: bold;
		 -webkit-animation: ani 700ms infinite;
		 -moz-animation: ani 700ms infinite; 
		 -o-animation: ani 700ms infinite; 
		 animation: ani 700ms infinite;
	}
	.chucnang-chitiet-fv{
		height: 100px;
		background-color: red;
		border-radius: 10px;
		margin-top: 10px;
		font-size: 1.2rem;
		text-transform: uppercase;
		display: flex;
		flex-direction: column;
		text-align: center;
		justify-content: center;
		text-shadow: 2px 2px 5px black;
		box-shadow: 5px 5px 5px #F14422 inset;
		font-weight: bold;
	}
	.chucnang-chitiet-ib{
		height: 100px;
		background-color: #81B62B;
		border-radius: 10px;
		margin-top: 10px;
		font-size: 1.2rem;
		text-transform: uppercase;
		display: flex;
		flex-direction: column;
		text-align: center;
		justify-content: center;
		text-shadow: 2px 2px 5px black;
		box-shadow: 5px 5px 5px #B4F058 inset;
		font-weight: bold;
	}
	.chucnang-chitiet-fb:hover{
		background-color: #12641F;
	}
	.chucnang-chitiet-fv:hover{
		background-color: #A82213;
	}
	.chucnang-chitiet-ib:hover{
		background-color: #4A6D13;
	}
	.naptien{
		height: 100px;
		background-color: #48B6B3;
		border-radius: 10px;
	}
	.naptien:hover{
		background-color: #195D79;
	}

	.sodu{
		height: 100px;
		background-color: #48B6B3;
		border-radius: 10px;
	}
	.sodu h6{
		font-weight: normal;
		font-size: 0.9rem;
	}
	.sodu i{
		font-size: 1rem;
		margin-top: 1%;
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
	.fa-briefcase{
		font-size: 2rem;
		text-align: center;
		margin-top: 1%;
	}
	/*animation chữ nhấp nháy*/
@-webkit-keyframes ani {
 0% { color: #F8CD0A; } 
 50% { color: #fff;  } 
 100% { color: #F8CD0A;  } 
 }
 @-moz-keyframes ani{ 
 0% { color: #F8CD0A;  } 
 50% { color: #fff;  }
 100% { color: #F8CD0A;  } 
 }
 @-o-keyframes ani { 
 0% { color: #F8CD0A; } 
 50% { color: #fff; } 
 100% { color: #F8CD0A;  } 
 }
 @keyframes ani { 
 0% { color: #F8CD0A;  } 
 50% { color: #fff;  }
 100% { color: #F8CD0A;  } 
 } 
</style>
<?php
	class chucnang
	{
		public $id;
		public $ten;
		public $loai;
		public $ghichu;
		public $href;
	} 
	$fb = array();
	$fv = array();
	$ib = array();
	foreach ($chucnang as $row) 
	{
		if($row->ID_type=="1")
		{
			$tam = new chucnang;
			$tam->id = $row->ID_chucnang;
			$tam->ten = $row->chucnang_name;
			$tam->loai = $row->ID_type;
			$tam->ghichu = $row->chucnang_ghichu;
			$tam->href = $row->href;
			array_push($fb,$tam);
		}
		if($row->ID_type=="2")
		{
			$tam = new chucnang;
			$tam->id = $row->ID_chucnang;
			$tam->ten = $row->chucnang_name;
			$tam->loai = $row->ID_type;
			$tam->ghichu = $row->chucnang_ghichu;
			$tam->href = $row->href;
			array_push($fv,$tam);
		}
		if($row->ID_type=="3")
		{
			$tam = new chucnang;
			$tam->id = $row->ID_chucnang;
			$tam->ten = $row->chucnang_name;
			$tam->loai = $row->ID_type;
			$tam->ghichu = $row->chucnang_ghichu;
			$tam->href = $row->href;
			array_push($ib,$tam);
		}
		
	}
?>
<div class="wrapper">
	<div class="row">
<!-----show chức năng------->
		<div class="col-12 col-md-6 chucnang">
			<h6>DỊCH VỤ</h6>
			<h6>FACEBOOK BUFF</h6>
			<div class="row">
				@foreach($fb as $row)
				<div class="col-md-6 ">
					<a href="{{$row->href}}">
					<div class="col-md-12 chucnang-chitiet-fb">
						{{$row->ten}}
					</div>
					</a>	
				</div>
				@endforeach
			</div>
			<h6>FACEBOOK VIP</h6>
			<div class="row">
				@foreach($fv as $row)
				<div class="col-md-6 ">
					<a href="{{$row->href}}">
					<div class="col-md-12 chucnang-chitiet-fv">
						{{$row->ten}}
					</div>
					</a>	
				</div>
				@endforeach
			</div>
			<h6>INSTAGRAM BUFF</h6>
			<div class="row">
				@foreach($ib as $row)
				<div class="col-md-6 ">
					<a href="{{$row->href}}">
					<div class="col-md-12 chucnang-chitiet-ib">
						{{$row->ten}}
					</div>
					</a>	
				</div>
				@endforeach
			</div>
			
		</div>
<!------------>
<!-----show tài khoản------->
		<div class="col-12 col-md-6 taikhoan">
<!-----số dư tài khoản------->
			<h6>TÀI KHOẢN</h6>
			<div class="row">
				<div class="col-md-12">
					<a href="user-payment">
					<div class="col-md-12 naptien ">
						<div class="col-12 ma">
							<h6><i class="fa fa-briefcase"></i></h6>
							<h6>NẠP TIỀN VÀO TÀI KHOẢN</h6>
						</div>
					</div>
					</a>
				</div>
			</div>
<!------------>
<!-----báo cáo số dư------->
			<h6>BÁO CÁO</h6>
			<div class="row">
				<div class="col-4">
					<a href="">
						<div class="col-md-12 sodu">
							<div class="col-12 ma">
								<h6><i class="fa fa-dollar"></i></h6>
								<h6>SỐ DƯ</h6><h6>0</h6>
							</div>
						</div>
					</a>
				</div>
				<div class="col-4">
					<a href="">
						<div class="col-md-12 sodu">
							<div class="col-12 ma">
								<h6><i class="fa fa-history"></i></h6>
								<h6>NẠP THÁNG NÀY</h6><h6>0</h6>
							</div>
						</div>
					</a>
				</div>
				<div class="col-4">
					<a href="">
						<div class="col-md-12 sodu">
							<div class="col-12 ma">
								<h6><i class="fa fa-download"></i></h6>
								<h6>TỔNG NẠP</h6><h6>0</h6>
							</div>
						</div>
					</a>
				</div>
			</div>
<!------------>
<!-----hỗ trợ------->
			<h6>HỖ TRỢ</h6>
			<div class="row">
				<div class="col-12">
					<div class="col-md-7 hotro">
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
<!------------>
		</div>
<!------------>

@endsection