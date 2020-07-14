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
	<h6 style="text-align: center; padding-top: 1%; color: blue;font-weight: bold;font-size: 2rem;">VIP LIKE CẢM XÚC</h6>
		<hr>
	<div class="row">

		<div class="col-12 col-md-8 ">
			<div class="col-12 ">
<form action="{{route('post_vipreactionmonth')}}" method="post">
	{!!csrf_field()!!}
				<table border="0">
	    			<tr>
				        <td class="short bold">Nhập Link hoặc ID profile cần cài VIP:</td>
				        <td><input class="form-control" type="text" name="link" placeholder="Nhập Link hoặc ID profile cần cài VIP"></td>
	    			</tr>
	    			<tr>
				        <td class="short bold">Chọn cảm xúc:</td>
				        <td>
				        	<div class="row">
				        		<img src="media/emotion/like.png" id ="like" class="emotion" clicked="no">
				        		<img src="media/emotion/love.png" id ="love" class="emotion" clicked="no">
				        		<img src="media/emotion/haha.png" id ="haha" class="emotion" clicked="no">
				        		<img src="media/emotion/wow.png" id ="wow" class="emotion" clicked="no">
				        		<img src="media/emotion/sad.png" id ="sad" class="emotion" clicked="no">
	    					</div>
	    					<div id="camxuc">
	    					</div>
				        </td>
	    			</tr>
	    			<tr>
	    				<td colspan="2" id="vipcontent"></td>
	    			</tr>
	    			<tr>
	    				<td colspan="2">
					        <div class="row" >
					        		<div class="col-12 col-md-6" style="height: auto; width: 100%;">
					        			<p class="bold" style="margin-bottom: 0;">Số lượng bài viết cần tăng trong 1 ngày:</p>
					        			<input type="number" id="slbai" name="slbai" min="1" value="2">
					        			@error('slbai')
					                        <p style="color: red;">{{ $message }}</p>
					                    @enderror
					        		</div>
					        		<div class="col-12 col-md-6" style="height: auto; width: 100%;">
					        			<p class="bold" style="margin-bottom: 0;">Số ngày cần mua Vip:</p>
					        			<input type="number" id="slngay" name="slngay" min="1" value="30">
					        			@error('slngay')
					                        <p style="color: red;">{{ $message }}</p>
					                    @enderror
					        		</div>
					        </div>
					        <p class="nen" style="margin-top: 1%;">Tổng tiền của gói VIP sẽ = (Giá tiền mỗi tương tác) x (Số lượng like lớn nhất mỗi bài) x (Số lượng bài trong ngày) x (Số ngày đăng ký VIP)</p>
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
				        	Số tiền bạn phải thanh toán là: <i class="thanhtoan" style="font-size: 2rem; font-weight: bold;"></i> coin <!--------thanhtoan để hiện số ra ngoài---------->
				        	</div>
				        	<div id="tt"> <!--------thành tiền để truyền qua controller lưu---------->
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

<script src="{{asset('jquery/vipreaction.js')}}"></script>
<script src="{{asset('jquery/vipreactioncount.js')}}"></script>
<script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
<script type="text/javascript" src="{{asset('jquery/total.js')}}"></script>
@endsection