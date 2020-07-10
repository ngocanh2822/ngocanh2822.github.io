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
<<<<<<< HEAD
                      <th>Admin nạp</th>
=======
                      <th>Người nạp</th>
>>>>>>> 14ea528931543301bec3cddc7ca7bbc1ee2b8726
                      <th>Tài khoản nạp</th>
                      <th>Nội dung</th>
                      <th>Số tiền</th>
                      <th>Thời gian nạp</th>
                    </tr>
                  </thead>
                  <tbody>
<<<<<<< HEAD
=======
                    <?php 
                    $page = isset($_GET['page']) ? $_GET['page'] : 1;
                    $i=1 + ($page-1)*10;?>
>>>>>>> 14ea528931543301bec3cddc7ca7bbc1ee2b8726
                  	@foreach($lichsu as $row)
                    <tr>
                      <td>{{$i}}</td>
                      <td>{{$row->admin}}</td>
                      <td>{{$row->user}}</td>
                      <td><?php echo $row->noidung?></td>
<<<<<<< HEAD
                      <td>
                        <?php 
                              $user_money = $row->sotien;
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
=======
                      <td>{{$row->sotien}}</td>
>>>>>>> 14ea528931543301bec3cddc7ca7bbc1ee2b8726
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