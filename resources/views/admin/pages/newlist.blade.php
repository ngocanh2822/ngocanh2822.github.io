@extends('admin.layouts.master')
@section('content')
        <div class="container-fluid">

          <!-- Page Heading -->
          <h1 class="h3 mb-2 text-gray-800">Dịch vụ</h1>

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
                      <th>ID Đơn hàng</th>
                      <th>ID người dùng</th>
                      <th>ID chức năng</th>
                      <th>Nội dung</th>
                      <th>Thời gian order</th>
                      <th>Hoàn thành</th>
                    </tr>
                  </thead>
                  <tbody>
                  	@foreach($newlist as $row)
                    <tr>
                      <td>{{$row->id}}</td>
                      <td>{{$row->id_user}}</td>
                      <td>{{$row->id_chucnang}}</td>
                      <td>{{$row->chucnang_name}}</td>
                      <td>{{$row->thoigian_order}}</td>
                      <td><button class="btn btn-primary"><i class="fas fa-check"></i></button></td>
                    </tr>
                    @endforeach
                  </tbody>
                </table>
              </div>
            </div>
          </div>

        </div>
@endsection