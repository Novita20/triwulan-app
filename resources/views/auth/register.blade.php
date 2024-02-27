{{-- <!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>AdminLTE 3 | Registration Page</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{asset('assets/plugins/fontawesome-free/css/all.min.css')}}">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="{{asset('assets/plugins/icheck-bootstrap/icheck-bootstrap.min.css')}}">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{asset('assets/dist/css/adminlte.min.css')}}">
</head>
<body class="hold-transition register-page">

<div class="register-box">
  <div class="register-logo">
    <a href="../../index2.html"><b>Admin</b>LTE</a>
  </div>

  <div class="card">
    <div class="card-body register-card-body">
      <p class="login-box-msg">Register a new membership</p>

      <form action="{{ url('/register') }}" method="post">
        @csrf

        <div class="input-group mb-3">
          <input name="username" type="text" class="form-control @error('username') is-invalid @enderror" placeholder="Username">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-user"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input name="name" type="text" class="form-control @error('name') is-invalid @enderror" placeholder="Name">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-envelope"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
            <input name="email" type="email" class="form-control @error('email') is-invalid @enderror" placeholder="Email">
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-envelope"></span>
              </div>
            </div>
          </div>
        <div class="input-group mb-3">
          <input name="password" type="password" class="form-control @error('password') is-invalid @enderror" placeholder="Password">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="password" name="password_confirmation" class="form-control @error('password') is-invalid @enderror" placeholder="Retype password">
          @error('password') <p>{{ $message }}</p> @enderror
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-8">
            <div class="icheck-primary">
              <input type="checkbox" id="agreeTerms" name="terms" value="agree">
              <label for="agreeTerms">
               I agree to the <a href="#">terms</a>
              </label>
            </div>
          </div>
          <!-- /.col -->
          <div class="col-4">
            <button type="submit" class="btn btn-primary btn-block">Register</button>
          </div>
          <!-- /.col -->
        </div>
      </form>

      <a href="/login" class="text-center">I already have a membership</a>
    </div>
    <!-- /.form-box -->
  </div><!-- /.card -->
</div>
<!-- /.register-box -->

<!-- jQuery -->
<script src="{{asset('assets/plugins/jquery/jquery.min.js')}}"></script>
<!-- Bootstrap 4 -->
<script src="{{asset('assets/plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<!-- AdminLTE App -->
<script src="{{asset('assets/dist/js/adminlte.min.js')}}"></script>
</body>
</html> --}}





<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('assets/css/login-style.css') }}">
    <title>Register</title>
</head>

<body>


    <div class="content-wrapper d-flex">
        <div class="side-left">
            <!-- Left side content similar to login page -->
            <div class="wrapper-position-brand d-flex justify-content-center align-items-center">
                <div class="brand-wrapper">
                    <div class="box-of-brand d-flex align-items-center">
                        <div class="wrapper-logo">
                            <img src="{{ asset('assets/img/logo-pemkab.svg') }}" alt="Logo PEMKAB">
                        </div>
                        <div class="typography-box">
                            <p class="text-light">SISFO-KINERJA</p>
                            <h2 class="second-typography">DINAS KOMUNIKASI <br>DAN INFORMATIKA </h2>
                            <p class="third-typography">Kabupaten Malang</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="side-right pb-5">
            <div class="wrapper-position-form d-flex justify-content-center align-items-center">
                <div class="form-wrapper">
                    <!-- Mobile logo and title similar to login page -->
                    <h2 class="title-form text-center">Pendaftaran Akun 📝</h2>
                    <p class="desc-form text-center">Isi formulir pendaftaran di bawah ini</p>

                    <form action="{{ url('/register') }}" method="post">
                        @csrf
                        <!-- Input fields for registration -->
                        <div class="input-group mb-3">
                            <input name="username" type="text"
                                class="form-control @error('username') is-invalid @enderror" placeholder="Username">
                        </div>
                        <div class="input-group mb-3">
                            <input name="name" type="text"
                                class="form-control @error('name') is-invalid @enderror" placeholder="Name">
                        </div>
                        <div class="input-group mb-3">
                            <input name="email" type="email"
                                class="form-control @error('email') is-invalid @enderror" placeholder="Email">
                        </div>
                        <div class="input-group mb-3">
                            <input name="password" type="password"
                                class="form-control @error('password') is-invalid @enderror" placeholder="Password">
                        </div>
                        <div class="input-group mb-3">
                            <input type="password" name="password_confirmation"
                                class="form-control @error('password') is-invalid @enderror"
                                placeholder="Retype password">
                            @error('password')
                                <p>{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="row">
                            <div class="col-7">
                                <button type="submit" class="btn btn-primary btn-block">Daftar</button>
                            </div>
                            <div class="col-5">
                                <a href="/login" class="text-center desc-form">Sudah punya akun? Login sekarang</a>
                            </div>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>
</body>

</html>
