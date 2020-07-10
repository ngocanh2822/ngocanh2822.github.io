<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Dịch vụ FB - Đăng ký tài khoản</title>

  <!-- Custom fonts for this template-->
  <link href="{{asset('fonts/all.min.css')}}" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="{{asset('css/sb-admin-2.min.css')}}" rel="stylesheet">

</head>

<body class="bg-gradient-primary">

  <div class="container">

    <!-- Outer Row -->
    <div class="row justify-content-center">

      <div class="col-xl-10 col-lg-12 col-md-9">

        <div class="card o-hidden border-0 shadow-lg my-5">
          <div class="card-body p-0">
            <!-- Nested Row within Card Body -->
            <div class="row">
              <div class="col-lg-6 d-none d-lg-block bg-login-image"></div>
              <div class="col-lg-6">
                <div class="p-5">
                  <div class="text-center">
<<<<<<< HEAD
                    <h1 class="h4 text-gray-900 mb-4">Xin chào!</h1>
=======
                    <h1 class="h4 text-gray-900 mb-4">Welcome!</h1>
>>>>>>> 14ea528931543301bec3cddc7ca7bbc1ee2b8726
                  </div>
                  <form class="user" action="" method="post">
                    @csrf
                    <div class="form-group">
<<<<<<< HEAD
                      <label>Tên đăng nhập</label>
                      <input type="text" class="form-control form-control-user" id="exampleInputEmail" aria-describedby="emailHelp" placeholder="Tên đăng nhập" name="name" required="" value="{{old('email')}}">
                    </div>
                    <div class="form-group">
                      <label>Địa chỉ email</label>
                      <input type="text" class="form-control form-control-user" id="exampleInputEmail" aria-describedby="emailHelp" placeholder="Địa chỉ email" name="email" required="" value="{{old('email')}}">
=======
                      <label>Email address</label>
                      <input type="text" class="form-control form-control-user" id="exampleInputEmail" aria-describedby="emailHelp" placeholder="Tên đăng nhập" name="email" required="" value="{{old('email')}}">
>>>>>>> 14ea528931543301bec3cddc7ca7bbc1ee2b8726
                    </div>
                    <div class="form-group">
                      <label>Mật khẩu</label>
                      <input type="password" class="form-control form-control-user" id="exampleInputPassword" placeholder="Mật khẩu" name="password" required="">
                    </div>
                    <div class="form-group">
                      <label>Nhập lại mật khẩu</label>
                      <input type="password" class="form-control form-control-user" id="exampleInputPassword" placeholder="Nhập lại mật khẩu" name="password-confirm" required="">
                    </div>
<<<<<<< HEAD
                    
=======
>>>>>>> 14ea528931543301bec3cddc7ca7bbc1ee2b8726
                    <button type="submit" class="btn btn-primary btn-user btn-block" >ĐĂNG KÝ</button>
                  </form>
                  <hr>
                  <div class="text-center">
                    Bạn đã có tài khoản? <a class="small" href="login"> ĐĂNG NHẬP</a>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>

      </div>

    </div>

  </div>
  @include('sweetalert::alert', ['cdn' => "https://cdn.jsdelivr.net/npm/sweetalert2@9"])
  <!-- Bootstrap core JavaScript-->
  <script src="{{asset('jquery/jquery.min.js')}}"></script>
  <script src="{{asset('bootstrap/js/bootstrap.bundle.min.js')}}"></script>

  <!-- Core plugin JavaScript-->
  <script src="{{asset('jquery/jquery.easing.min.js')}}"></script>

  <!-- Custom scripts for all pages-->
  <script src="{{asset('jquery/sb-admin-2.min.js')}}"></script>

</body>

</html>
