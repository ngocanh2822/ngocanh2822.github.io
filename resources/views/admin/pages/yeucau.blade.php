@extends('admin.layouts.master')
@section('content')
        <div class="container-fluid">

          <!-- Page Heading -->
          <h1 class="h3 mb-2 text-gray-800">Yêu cầu</h1>

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
                      <th>Chức năng</th>
                      <th>Nội dung</th>
                      <th>SĐT</th>
                      <th>Ghi chú</th>
                      <th>Thời gian</th>
                      <th>Hoàn thành</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php 
                    $page = isset($_GET['page']) ? $_GET['page'] : 1;
                    $i=1 + ($page-1)*10;?>
                  	@foreach($datas as $row)
                    <tr>
                      <td>{{$i}}</td>
                      <td>{{$row->name}}</td>
                      <td>{{$row->chucnang_name}}</td>
                      <td>{{$row->noidung}}</td>
                      <td>{{$row->sdt}}</td>
                      <td>{{$row->ghichu}}</td>
                      <td>{{$row->updated_at}}</td>
                      <td>
                        <form action="{{route('yeucau.update',$row->ID)}}" method="POST">
                          @method('PUT')
                          @csrf
                          <button type="submit" class="btn btn-primary"><i class="fas fa-check"></i></button>
                        </form>
                      </td>
                    <?php $i++?>
                    @endforeach
                  </tbody>
                </table>
                {{$datas->links()}}
              </div>
            </div>
          </div>
         
        </div>
@endsection