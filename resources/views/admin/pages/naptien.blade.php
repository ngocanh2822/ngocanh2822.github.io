@extends('admin.layouts.master')
@section('content')
        <div class="container-fluid">

          <!-- Page Heading -->
          <h1 class="h3 mb-2 text-gray-800">Nạp tiền</h1>

          <!-- DataTales Example -->
          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <!-- search -->
          <!-- Topbar Search -->
            <form class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search" action="{{route('search_user')}}" method="post">
              @csrf
              <div class="input-group">
                <input type="text" name="user_name" class="form-control border-1 small" placeholder="Nhập tên người dùng" aria-label="Search" aria-describedby="basic-addon2" required="">
                <div class="input-group-append">
                  <button class="btn btn-primary" type="submit">
                    <i class="fas fa-search fa-sm"></i>
                  </button>
                </div>
              </div>
            </form>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>STT</th>
                      <th>Tên</th>
                      <th>Số dư tài khoản</th>
                      <th>Nạp thêm</th>
                      <th>Nội dung</th>
                      <th>Xác nhận</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php 
                    $page = isset($_GET['page']) ? $_GET['page'] : 1;
                    $i=1 + ($page-1)*10;?>
                  	@foreach($naptien as $row)
                    <tr>
                      <td>{{$i}}</td>
                      <td>{{$row->name}}</td>
                      <td>
                        <?php 
                              $user_money = $row->user_money;
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
                      <form action="{{route('naptien.update',$row->id)}}" method="POST">
                        @method('PUT')
                          @csrf
                      <td>
                        <input type="number" name="tien" class="form-control" required="">
                      </td>
                      <td><input type="text" name="noidung" class="form-control" value="Nạp tiền vào tài khoản" required=""></td>
                      <td>
                          <button type="submit" class="btn btn-primary"><i class="fas fa-check"></i></button>
                      </td>
                      </form>
                    </tr>
                    <?php $i++?>
                    @endforeach
                  </tbody>
                </table>
                {{$naptien->links()}}
              </div>
            </div>
          </div>
         
        </div>
@endsection