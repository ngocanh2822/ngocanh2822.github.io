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
</style>
<div class="wrapper">
	<h6 style="text-align: center; padding-top: 1%; color: blue;font-weight: bold;font-size: 2rem;">HỆ THỐNG RIP XOÁ BÀI VIẾT + KHOÁ LINK TÊN MIỀN WEBSITE</h6>
		<hr>
	<div class="row">

		<div class="col-12 col-md-8 ">
			<div class="col-12 ">
<form action="{{route('post_fbripnick')}}" method="post">
	{!!csrf_field()!!}
				<table border="0">
	    			<tr>
				        <td class="short bold">Nhập link bài viết,website, page hoặc group</td>
				        <td>
							<form class="form-inline">
							    <div class="input-group">
							    	<input class="form-control" type="text" name="link" placeholder="Nhập link" value="{{old('link')}}">
							    </div>
							</form>
				    	</td>
	    			</tr>
	    			<tr>
				        <td class="short bold">Bạn muốn rip loại nào</td>
				        <td>
							<select class="form-control" list="loairip" id="loairip" name="loairip">
							 	<option value="Xóa fanpage/group"> Xóa fanpage/group</option>
							  	<option value="Rip nick facebook"> Rip nick facebook</option>
							 	 <option value="Xóa bài đăng facebook">Xóa bài đăng facebook</option>
							  	<option value="Rip domain">Rip domain</option>
							</select> 
						</td>
	    			</tr>
	    			<tr>
				        <td class="short bold">Thời gian</td>
				        <td>
							<select class="form-control" list="loaithoigian" id="loaithoigian" name="loaithoigian">
							 	<option value="24h">24h</option>
							  	<option value="48h">48h</option>
							</select> 
						</td>
	    			</tr>
	    			<tr>
				        <td class="short bold">Số điện thoại để liên lạc</td>
				        <td><p class="nen">Nhập đúng SĐT để chúng tôi có thể liên lạc với bạn!</p><input class="form-control" type="text" name="SDT" placeholder="Nhập số điện thoại" value="{{old('SDT')}}"></td>
	    			</tr>
	    			<tr>
				        <td class="short bold">Ghi chú</td>
				        <td><input class="form-control" type="text" name="ghichu" placeholder="Nhập ghi chú" value="{{old('ghichu')}}"></td>
	    			</tr>
	    			<tr>
<<<<<<< HEAD
				        <td colspan="2" style="text-align: center;"><button class="btn tientrinh" type="submit">Gửi yêu cầu</button></td>
=======
				        <td class="short bold"></td>
				        <td style="text-align: center;"><button class="btn" type="submit">Gửi yêu cầu</button></td>
>>>>>>> 14ea528931543301bec3cddc7ca7bbc1ee2b8726
	    			</tr>
				</table>
</form>
			</div>
			<div class="col-12 ">
			<div class="col-12">
				<div class="col-12 baogia">
				<h6><i class="fa fa-info-circle" style="margin-right: 2%;"></i>BÁ0 GIÁ</h6>
				+ Nick Facebook 10k theo dõi giá: 1.2 triệu <br/>
				+ Nick Facebook 20k theo dõi giá: 2.4 triệu <br/>
				+ Nick Facebook 30k theo dõi giá: 3.6 triệu <br/>
				+ Nick Facebook 50k theo dõi giá: 6 triệu <br/>
				+ Fanpage 10k lượt thích : 2.5 triệu <br/>
				+ Fanpage 20k lượt thích : 5 triệu <br/>
				+ Fanpage 30k lượt thích : 7.5 triệu <br/>
				+ Fanpage 50k lượt thích : 12.5 triệu <br/>
				+ Còn các trang lớn vui lòng liên hệ Admin <br/>
				</div>
			</div>
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
@endsection