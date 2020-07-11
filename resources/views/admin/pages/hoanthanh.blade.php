@extends('admin.layouts.master')
@section('content')
        <div class="container-fluid">

          <!-- Page Heading -->
          <h1 class="h3 mb-2 text-gray-800">Đơn hàng đã hoàn thành</h1>

          <!-- DataTales Example -->
          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">Mới</h6>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>STT</th>
                      <th>Người dùng</th>
                      <th>Người tích</th>
                      <th>Loại</th>
                      <th>Nội dung</th>
                      <th>Tổng tiền</th>
                      <th>Thời gian hoàn thành</th>
                      <th>Ghi chú</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php 
                    $page = isset($_GET['page']) ? $_GET['page'] : 1;
                    $i=1 + ($page-1)*10;?>
                  	@foreach($donhang as $row)
                    <tr>
                      <td>{{$i}}</td>
                      <td>{{$row->user}}</td>
                      <td>{{$row->admin}}</td>
                      <td>{{$row->chucnang_name}}</td>
                      <td><?php echo $row->noidung?></td>
                      <td>
                        <?php 
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
                      <td>{{$row->updated_at}}</td>
                      <td>{{$row->ghichu}}</td>
                    </tr>
                    <?php $i++?>
                    @endforeach
                  </tbody>
                </table>
                {{$donhang->links()}}
              </div>
            </div>
          </div>

        </div>
@endsection