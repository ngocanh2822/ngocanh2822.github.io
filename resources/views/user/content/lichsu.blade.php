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
<!---------lịch sử---------->
<div class="wrapper">
	<h6 style="text-align: center; padding-top: 1%; color: blue;font-weight: bold;font-size: 2rem;">LỊCH SỬ GIAO DỊCH</h6>
	<hr>	
	<div class="col-12 " >
		<div class="col-12 lichsu" style="margin-bottom: 1%;" >

<div class="card shadow mb-4">
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>STT</th>
                      <th>Tên tiến trình</th>
                      <th>Nội dung</th>
                      <th>Số tiền</th>
                      <th>Thời gian gửi yêu cầu</th>
                      <th>Thời gian hoàn thành</th>
                      <th>Trạng thái</th>
                    </tr>
                  </thead>
                  <tbody>
                  	<?php 
	                    $page = isset($_GET['page']) ? $_GET['page'] : 1;
	                    $i=1 + ($page-1)*10;
					?>
                  	@foreach($donhang as $row)
                    <tr>
                    	<td>{{$i}}</td>
                    	 <?php $i= $i+1;?>
                      <td>
                      	<?php foreach ($chucnang as $row2) 
                      	{
                      		if($row2->ID_chucnang == $row->ID_chucnang ) echo $row2->chucnang_name;
                      	} 
                      	?>
                      </td>
                      <td>{{$row->noidung}}</td>
                      <td><?php 
                              $user_money = $row->tongtien;
                              $j = 0;
                              $n = strlen($user_money)-1;
                              for ($l=$n; $l >=0; $l--) { 
                                  $j++;
                                  if ($j%3 == 0 && $j != $n+1) {
                                      $user_money = substr($user_money, 0, $l) . "." . substr($user_money, $l);
                                  }
                              }
                        ?>
                        {{$user_money}} coin</td>
                      <td>{{$row->created_at}}</td>
                      <td>{{$row->updated_at}}</td>
                      <td><?php if($row->trangthai==0) echo"Hoàn thành";
                      else echo"Đang chờ xử lý"; ?></td>
                    </tr>
                    @endforeach
                  </tbody>
                </table>
                {{$donhang->links()}}
              </div>
            </div>
          </div>

		</div>
	</div>

<!---------hết lịch sử---------->
</div>
@endsection