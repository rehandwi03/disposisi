<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Login</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{{ asset('assets/vendor/bootstrap/css/bootstrap.min.css') }}">
    <link href="{{ asset('assets/vendor/fonts/circular-std/style.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('assets/libs/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/vendor/fonts/fontawesome/css/fontawesome-all.css') }}">
    <style>
        html,
        body {
            height: 100%;
        }

        body {
            display: -ms-flexbox;
            display: flex;
            -ms-flex-align: center;
            align-items: center;
            padding-top: 40px;
            padding-bottom: 40px;
        }
    </style>
</head>

<body>
    <!-- ============================================================== -->
    <!-- login page  -->
    <!-- ============================================================== -->
    <div class="splash-container">
        <div class="card ">
            <div class="card-header text-center"><a href="http://binainsani.ac.id"><img class="logo-img"
                        src="{{ asset('/uploads/logo/binainsani.png') }}" alt="logo" width="200"></a><span <div
                    class="card-body">
                    <form action="{{route('login')}}" method="post">
                        @csrf
                        <div class="form-group">
                            <input
                                class="form-control form-control-lg {{ $errors->has('username') ? ' is-invalid' : '' }}"
                                id="username" type="text" placeholder="Username" autocomplete="off" name="username">
                            <div class="invalid-feedback">
                                Masukan username yang valid.
                            </div>
                        </div>
                        <div class="form-group">
                            <input
                                class="form-control form-control-lg {{ $errors->has('password') ? ' is-invalid' : '' }}"
                                id="password" type="password" placeholder="Password" name="password">
                            <div class="invalid-feedback">
                                Masukan password yang valid.
                            </div>
                        </div>
                        <div class="form-group mt-4">
                            {{-- <label class="custom-control custom-checkbox">
                            <input class="custom-control-input" type="checkbox"><span
                                class="custom-control-label">Remember Me</span>
                        </label> --}}
                        </div>
                        <button type="submit" class="btn btn-primary btn-lg btn-block">Sign in</button>
                    </form>
            </div>
            {{-- <div class="card-footer bg-white p-0  ">
                <div class="card-footer-item card-footer-item-bordered">
                    <a href="#" class="footer-link">Create An Account</a></div>
                <div class="card-footer-item card-footer-item-bordered">
                    <a href="#" class="footer-link">Forgot Password</a>
                </div>
            </div> --}}
        </div>
    </div>

    <!-- ============================================================== -->
    <!-- end login page  -->
    <!-- ============================================================== -->
    <!-- Optional JavaScript -->
    <script src="{{ asset('assets/vendor/jquery/jquery-3.3.1.min.js') }}"></script>
    <script src="{{ asset('assets/vendor/bootstrap/js/bootstrap.bundle.js') }}"></script>
    @include('sweetalert::alert')
</body>

</html>