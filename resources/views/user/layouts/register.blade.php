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

  <!-- Outer Row -->
    <div class="row justify-content-center">

      <div class=" col-lg-6 col-md-6">

        <div class="card o-hidden border-0 shadow-lg my-5">
          <div class="card-body p-0">
            <!-- Nested Row within Card Body -->
            <div class="row">
              <div class="col-lg-12">
                <div class="p-5">
                  <div class="text-center">
                    <h1 class="h4 text-gray-900 mb-4">ĐĂNG KÝ TÀI KHOẢN!</h1>
                  </div>
                  <form class="user" action="{{route('checkregister')}}" method="post">
                    @csrf
                    <div class="form-group">
                      <label>Tên đăng nhập</label>
                      <input type="text" class="form-control form-control-user" placeholder="Tên đăng nhập" name="name" required="" value="{{old('name')}}">
                      @error('name')
                        <p style="color: red;">{{ $message }}</p>
                      @enderror
                    </div>
                    <div class="form-group">
                      <label>Email</label>
                      <input type="email" class="form-control form-control-user" id="exampleInputEmail" aria-describedby="emailHelp" placeholder="Email" name="email" required="" value="{{old('email')}}">
                      @error('email')
                        <p style="color: red;">{{ $message }}</p>
                      @enderror
                    </div>
                    <div class="form-group">
                      <label>Mật khẩu</label>
                      <input type="password" class="form-control form-control-user" id="exampleInputPassword" placeholder="Mật khẩu" name="password" required="">
                      @error('password')
                        <p style="color: red;">{{ $message }}</p>
                      @enderror
                    </div>
                    <div class="form-group">
                      <label>Nhập lại mật khẩu</label>
                      <input type="password" class="form-control form-control-user" id="exampleInputPassword1" placeholder="Nhập lại mật khẩu" name="password_confirm" required="">
                      @error('password_confirm')
                        <p style="color: red;">{{ $message }}</p>
                      @enderror
                    </div>
                    <button type="submit" class="btn btn-primary btn-user btn-block" >ĐĂNG KÝ</button>
                  </form>
                  <hr>
                  <div class="text-center">
                    Bạn đã có tài khoản? <a class="small" href="register"> ĐĂNG NHẬP <a>
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

</body>

</html>
