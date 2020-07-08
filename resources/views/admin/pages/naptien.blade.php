@extends('admin.layouts.master')
@section('content')

        <div class="container-fluid">

          <!-- Page Heading -->
          <h1 class="h3 mb-2 text-gray-800">Nạp tiền</h1>

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
                      <th>ID người dùng</th>
                      <th>Tên</th>
                      <th>Số dư tài khoản</th>
                      <th>Nạp thêm</th>
                      <th>Xác nhận</th>
                    </tr>
                  </thead>
                  <tbody>
                  	@foreach($naptien as $row)
                    <tr>
                      <td>{{$row->id}}</td>
                      <td>{{$row->name}}</td>
                      <td>{{$row->user_money}}</td>
                      <td><input type="number" name="tien" class="form-control"></td>
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