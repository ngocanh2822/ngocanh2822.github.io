@extends('user.content.dichvu')
@section('content')
<style type="text/css">
	
	.baogia{
		background-color: #24AB8C;
		border-radius: 10px;
		color: white;
		padding-top: 2%;
		padding-bottom: 2%;
	}
	.emotion:hover{
		transform: scale(1.2);
        -webkit-transform: scale(1.2); 
        -moz-transform: scale(1.2); 
        -o-transform: scale(1.2);
        -ms-transform: scale(1.2);
    	cursor: pointer; 
	}
</style>
<div class="wrapper">
	<h6 style="text-align: center; padding-top: 1%; color: blue;font-weight: bold;font-size: 2rem;">VIP LIKE SỐ LƯỢNG BÀI VIẾT</h6>
		<hr>
	<div class="row">

		<div class="col-12 col-md-8 ">
			<div class="col-12 ">
<form action="{{route('post_viplikemount')}}" method="post">
	{!!csrf_field()!!}
				<table border="0">
	    			<tr>
				        <td class="short bold">Nhập Link hoặc ID profile cần cài VIP:</td>
				        <td><input class="form-control" type="text" name="link" placeholder="Nhập Link hoặc ID profile cần cài VIP"></td>
	    			</tr>
	    			<tr>
	    				<td colspan="2">
					        <div class="row" >
					        		<div class="col-12 col-md-6" style="height: auto; width: 100%;">
					        			<p class="bold" style="margin-bottom: 0;">Số lượng like nhỏ nhất cần tăng mỗi bài viết:</p>
					        			<input type="number" id="minlike" name="minlike" min="40">
					        			@error('minlike')
					                        <p style="color: red;">{{ $message }}</p>
					                    @enderror
					        		</div>
					        		<div class="col-12 col-md-6" style="height: auto; width: 100%;">
					        			<p class="bold" style="margin-bottom: 0;">Số lượng like lớn nhất cần tăng mỗi bài viết:</p>
					        			<input type="number" id="maxlike" name="maxlike" min="50">
					        			@error('maxlike')
					                        <p style="color: red;">{{ $message }}</p>
					                    @enderror
					        		</div>
					        		<div class="col-12 col-md-6" style="height: auto; width: 100%;">
					        			<p class="bold" style="margin-bottom: 0;">Tổng số bài viết cần đăng ký VIP:</p>
					        			<input type="number" id="slbai" name="slbai" min="1">
					        			@error('slbai')
					                        <p style="color: red;">{{ $message }}</p>
					                    @enderror
					        		</div>
					        </div>
					        <p class="nen" style="margin-top: 1%;">Tổng tiền của gói vip sẽ = (Giá tiền mỗi tương tác ) x (Số lượng like lớn nhất mỗi bài) x (Tổng số bài viết đăng ký VIP)</p>
					    </td>
	    			</tr>
	    			<tr>
				        <td class="short bold">Giá tiền mỗi tương tác:</td>
				        <td>
							<input type="number" id="dongia" name="dongia" min="30">
							@error('dongia')
		                        <p style="color: red;">{{ $message }}</p>
		                    @enderror
						</td>
	    			</tr>
	    			<tr>
				        <td ></td>
				        <td>
							<p class="nen">Giá thấp nhất: 30 coin</p>
						</td>
	    			</tr>
	    			<tr>
				        <td class="short bold">Ghi chú:</td>
				        <td><input class="form-control ghichu" type="text" name="ghichu" placeholder="Nhập ghi chú (nếu có)"></td>
	    			</tr>
	    			<tr>
				        <td class="short bold">Thành tiền:</td>
				        <td>
				        	<div class="thanhtien">
				        	Số tiền bạn phải thanh toán là: <i class="thanhtoan" style="font-size: 2rem; font-weight: bold;"></i> coin
				        	</div>
				        	<div id="tt">
	    				</div>
				        </td>
	    			</tr>
	    			<tr>
				        <td colspan="2" style="text-align: center;"><button class="btn tientrinh" type="submit">Tạo tiến trình</button></td>
	    			</tr>
				</table>
</form>

			</div>
		</div>
<!---------phần ghi chú mở rộng---------->
		<div class="col-12 col-md-4 ">
			<div class="col-12">
				<div class="col-12 luuy">
				Chú ý:
<br/>
<div style="color: #EAD92F">
- Nghiêm cấm Buff các ID Seeding có nội dung vi phạm pháp luật, chính trị, đồi trụy... Nếu cố tình buff bạn sẽ bị trừ hết tiền và band khỏi hệ thống vĩnh viễn, và phải chịu hoàn toàn trách nhiệm trước pháp luật. </div>
<br/>
- Hệ thống sử dụng 99% tài khoản người VN, fb thật để tương tác like, comment, share....
<br/><br/>
- Thời gian làm việc (tăng seeding) và bảo hành tính từ ngày bắt đầu cho đến ngày kết thúc job, tối đa là 1 tuần
<br/><br/>
- Hết thời gian của job đã order nếu không đủ số lượng hệ thống sẽ tự động hoàn lại số tiền seeding chưa tăng cho bạn trong vòng 1 đến 3 ngày
<br/><br/>
- Vui lòng lấy đúng id bài viết, công khai và check kỹ job tránh tạo nhầm, tính năng đang trong giai đoạn thử nghiệm nên sẽ không hoàn tiền nếu bạn tạo nhầm
<br/><br/>
<div style="color: #EAD92F">
- Nhập id lỗi hoặc trong thời gian chạy die id thì hệ thống không hoàn lại tiền.
</div>
<br/>
- Mỗi id có thể Buff tối đa 10 lần trên hệ thống để tránh Spam , max 1k trong ngày (hoặc hơn nếu order giá cao), trên 1k thời gian lên chậm hơn trong vòng 7 ngày
				</div>
			</div>
		</div>
<!---------hết phần ghi chú mở rộng---------->
	</div>
</div>
<script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
<script type="text/javascript" src="{{asset('jquery/total.js')}}"></script>
<script type="text/javascript">
	let maxlike=0; 
	let slbai=0; 
	let dongia=0;
	let kq=0;
	$('#maxlike').on('click', function(){
		var max = $("#maxlike").val();
		maxlike = max;
		kq = maxlike * slbai * dongia;
		$('.thanhtoan').html(kq);
		$('#tt').html('<input type="text" name="thanhtien" value="'+kq+' " hidden="true" >');
	});
	$('#slbai').on('click', function(){
		var slb = $("#slbai").val();
		slbai = slb;
		kq = maxlike * slbai * dongia;
		$('.thanhtoan').html(kq);
		$('#tt').html('<input type="text" name="thanhtien" value="'+kq+' " hidden="true" >');
	});
	$('#dongia').on('click', function(){
		var dg = $("#dongia").val();
		dongia = dg;
		kq = maxlike * slbai * dongia;
		$('.thanhtoan').html(kq);
		$('#tt').html('<input type="text" name="thanhtien" value="'+kq+' " hidden="true" >');
	});
	$('#maxlike').on('keyup', function(){
		var max = $("#maxlike").val();
		maxlike = max;
		kq = maxlike * slbai * dongia;
		$('.thanhtoan').html(kq);
		$('#tt').html('<input type="text" name="thanhtien" value="'+kq+' " hidden="true" >');
	});
	$('#slbai').on('keyup', function(){
		var slb = $("#slbai").val();
		slbai = slb;
		kq = maxlike * slbai * dongia;
		$('.thanhtoan').html(kq);
		$('#tt').html('<input type="text" name="thanhtien" value="'+kq+' " hidden="true" >');
	});
	$('#dongia').on('keyup', function(){
		var dg = $("#dongia").val();
		dongia = dg;
		kq = maxlike * slbai * dongia;
		$('.thanhtoan').html(kq);
		$('#tt').html('<input type="text" name="thanhtien" value="'+kq+' " hidden="true" >');
	});
</script>
@endsection