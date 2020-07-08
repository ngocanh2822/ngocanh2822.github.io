@extends('user.index')
@section('content')
<style type="text/css">
	.lienhe{
		margin: auto;
		padding-top: 2%;
		padding-bottom: 2%;
		border-radius: 10px;
	}
	.box{
		background-color: #1C4A65;
		border-radius: 10px;
		padding: 2% 0 2% 0;
		text-align: center;
		color: yellow;
		margin-top:2%;
	}
	.box a{
		color:  yellow;
	}
	.box a:hover{
		color: white;
		text-decoration-line: none;
	}
</style>
	<div class="row" style="margin-bottom:2%;margin-top: 2%;">
		<div class="col-12 col-md-10 lienhe">
				<h4 style="text-align: center;"> LIÊN HỆ VỚI CHÚNG TÔI</h4>
			<div class="row">
				<div class="col-12 col-md-6 ">
					<div class="col-12 box">
					HOTLINE: <h1>xxxx.xxx.xxx</h1>
					</div>
				</div>
				<div class="col-12 col-md-6 ">
					<div class="col-12 box">
					FACEBOOK: <h1><a href="">NGUYỄN VĂN A</a></h1>
					</div>
				</div>
				<div class="col-12">
					<div class="col-12 box">
						THỜI GIAN LÀM VIỆC
					</div>
				</div>
			</div>
		</div>
	</div>
@endsection