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
	<h6 style="text-align: center; padding-top: 1%; color: blue;font-weight: bold;font-size: 2rem;">BUFF COMMENT POST</h6>
		<hr>
	<div class="row">

		<div class="col-12 col-md-8 ">
			<div class="col-12 ">
<form action=" {{route('post_fbcmt')}}" method="post">
	{!!csrf_field()!!}
				<table border="0">
	    			<tr>
				        <td class="short bold">Nhập link bài post:</td>
				        <td><input class="form-control" type="text" name="link" placeholder="Nhập link bài post"></td>
	    			</tr>
	    			<tr>
				        <td ></td>
				        <td>
							<p class="nen">Mẹo nhỏ: Hệ thống ưu tiên chạy các job giá cao trước nên nếu bạn cần gấp bạn có thể set giá job của mình cao hơn 1 vài đồng để chạy nhanh nhất có thể nhé.</p><br/>
							<p class="nen">Lưu ý: Nên buff dư thêm 30 - 50% trên tổng số lượng để tránh tụt.</p>
						</td>
	    			</tr>
	    			<tr>
				        <td class="short bold">Giá tiền mỗi tương tác:</td>
				        <td>
							<input type="number" id="dongia" name="dongia" min="500">
							@error('dongia')
		                        <p style="color: red;">{{ $message }}</p>
		                    @enderror
						</td>
	    			</tr>
	    			<tr>
				        <td ></td>
				        <td>
							<p class="nen">Giá thấp nhất: 500 coin</p>
						</td>
	    			</tr>
	    			<tr>
				        <td ></td>
				        <td>
							<p class="nen">Mỗi dòng tương ứng với 1 bình luận!</p>
				        	<div id="d"></div>
						</td>
	    			</tr>
	    			<tr>
				        <td class="short bold">Nội dung bình luận:</td>
				        <td><p class="nen" style="background-color: #F86C72;">Bạn đã nhập <i id="dong">0</i> dòng</p>
				        	<textarea rows="9" name="noidung" cols="70" style="width: 100%;" id="noidung"  style="white-space: pre-line; " onkeydown ="Change(this.id)"> </textarea>
				        	<div id="nd"></div>
				        </td>
	    			</tr>
	    			<tr>
				        <td class="short bold">Ghi chú:</td>
				        <td><input class="form-control ghichu" type="text" name="ghichu" placeholder="Nhập ghi chú (nếu có)">
				        </td>
	    			</tr>
	    			<tr>
				        <td class="short bold">Thành tiền:</td>
				        <td>
				        	<div class="thanhtien">
				        	Số tiền bạn phải thanh toán là: <i class="thanhtoan" style="font-size: 2rem; font-weight: bold;"></i> coin
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
	let dongia=0, soluong=0;
	function Change(id){
		var noidung = $('#'+id).val().split(/[\r\n]+/);
		var count = noidung.length;
		soluong = count;
		kq = soluong * dongia;
		$('.thanhtoan').html(kq);
		$('#dong').html(count);
		$('#d').html('<input type="text" name="sl" value="'+count+' " hidden="true" >');
		$('#nd').html('<input type="text" name="nd" value="'+noidung+' " hidden="true" >');
	}
	$('#dongia').on('click', function(){
		var dg = $("#dongia").val();
		dongia = dg;
		kq = soluong * dongia;
		$('.thanhtoan').html(kq);
	});
	$('#dongia').on('keyup', function(){
		var dg = $("#dongia").val();
		dongia = dg;
		kq = soluong * dongia;
		$('.thanhtoan').html(kq);
	});
</script>

@endsection