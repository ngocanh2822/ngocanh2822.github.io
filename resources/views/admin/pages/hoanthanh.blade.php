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
                      <th>Tên</th>
                      <th>Loại</th>
                      <th>Nội dung</th>
                      <th>Tổng tiền</th>
                      <th>Thời gian hoàn thành</th>
                      <th>Ghi chú</th>
                    </tr>
                  </thead>
                  <tbody>
                  	@foreach($donhang as $row)
                    <tr>
                      <td>{{$row->ID}}</td>
                      <td>{{$row->ID_user}}</td>
                      <td>{{$row->chucnang_name}}</td>
                      <td><?php echo $row->noidung?></td>
                      <td>{{$row->tongtien}}</td>
                      <td>{{$row->updated_at}}</td>
                      <td>{{$row->ghichu}}</td>
                    </tr>
                    @endforeach
                  </tbody>
                </table>
              </div>
            </div>
          </div>

        </div>
@endsection