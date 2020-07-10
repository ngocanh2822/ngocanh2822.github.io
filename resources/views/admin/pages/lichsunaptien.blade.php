@extends('admin.layouts.master')
@section('content')
        <div class="container-fluid">

          <!-- Page Heading -->
          <h1 class="h3 mb-2 text-gray-800">Lịch sử nạp tiền</h1>

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
                      <th>Người nạp</th>
                      <th>Tài khoản nạp</th>
                      <th>Nội dung</th>
                      <th>Số tiền</th>
                      <th>Thời gian nạp</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php 
                    $page = isset($_GET['page']) ? $_GET['page'] : 1;
                    $i=1 + ($page-1)*10;?>
                  	@foreach($lichsu as $row)
                    <tr>
                      <td>{{$i}}</td>
                      <td>{{$row->admin}}</td>
                      <td>{{$row->user}}</td>
                      <td><?php echo $row->noidung?></td>
                      <td>{{$row->sotien}}</td>
                      <td>{{$row->thoigian}}</td>
                    </tr>
                    <?php $i++?>
                    @endforeach
                  </tbody>
                </table>
                {{$lichsu->links()}}
              </div>
            </div>
          </div>

        </div>
@endsection