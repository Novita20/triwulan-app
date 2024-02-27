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
    <title>Login</title>
</head>

<body>
    <div class="content-wrapper d-flex">
        <div class="side-left">
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
                    <div
                        class="wrapper-mobile-only-logo justify-content-center flex-column align-items-center mt-5 mb-3">
                        <img src="{{ asset('assets/img/logo-pemkab.svg') }}" alt="Logo PEMKAB">
                        <h4 class="second-typography">DINAS KOMUNIKASI <br>DAN INFORMATIKA </h4>
                        <p class="text-light">Kabupaten Malang</p>
                    </div>
                    <h2 class="title-form text-center">Selamat Datang 👋</h2>
                    <p class="desc-form text-center">Masukkan Username dan Password</p>

                    <form action="{{ url('/login') }}" method="post">
                        @csrf
                        <div class="input-group mb-4">
                            <input name="username" type="text" class="form-control" placeholder="username">
                        </div>
                        <div class="input-group mb-4">
                            <input name="password" type="password" class="form-control" placeholder="password">
                        </div>

                    
                        <div class="row">
                            <!-- /.col -->
                            <div class="col-7">
                                <button type="submit" class="btn btn-primary btn-block">Masuk</button>
                            </div>
                            <div class="col-5">
                              <a href="/register\" class="text-center desc-form">belum punya akun?daftar sekarang</a>
                            </div>
                            <!-- /.col -->
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
