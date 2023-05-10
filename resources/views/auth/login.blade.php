<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
    <title>LOGIN - SISTEM INFORMASI GIS</title>

    <!-- General CSS Files -->
    <link rel="stylesheet" href="{{ asset('vendor/assets/modules/bootstrap/css/bootstrap.min.css'); }}">
    <link rel="stylesheet" href="{{ asset('vendor/assets/modules/fontawesome/css/all.min.css'); }}">

    <!-- CSS Libraries -->
    <link rel="stylesheet" href="{{ asset('vendor/assets/modules/jquery-selectric/selectric.css') }}">
    <link rel="stylesheet" href="{{ asset('vendor/assets/modules/bootstrap-tagsinput/dist/bootstrap-tagsinput.css') }}">
    <!-- Template CSS -->
    <link rel="stylesheet" href="{{ asset('vendor/assets/css/style.css'); }}">
    <link rel="stylesheet" href="{{ asset('vendor/assets/css/components.css'); }}">
</head>
<body class="login">
    <div id="app">
        <section class="section">
            <div class="container mt-5">
                <div class="row">
                    <div class="col-12 col-sm-8 offset-sm-2 col-md-6 offset-md-3 col-lg-6 offset-lg-3 col-xl-4 offset-xl-4">
                        <div class="card card-primary">
                            <div class="card-header text-center">
                                <h4>SISTEM INFORMASI GIS</h4>
                            </div>
                            <div class="card-body">
                                @error('notif')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                                <form method="POST" action="{{ route('login') }}" class="needs-validation" novalidate="">
                                    @csrf
                                    <div class="form-group">
                                        <label for="email">Email</label>
                                        <input id="email" type="email" class="form-control" name="email" tabindex="1" required autofocus>
                                        <div class="invalid-feedback">
                                            Please fill in your email
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <div class="d-block">
                                            <label for="password" class="control-label">Password</label>
                                            <div class="float-right">
                                                <a href="" class="text-small">
                                                    Forgot Password?
                                                </a>
                                            </div>
                                        </div>
                                        <input id="password" type="password" class="form-control" name="password" tabindex="2" required>
                                        <div class="invalid-feedback">
                                            please fill in your password
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <button type="submit" name="login" class="btn btn-primary btn-lg btn-block" tabindex="4">
                                            Login
                                        </button>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <!--<div class="mt-5 text-muted text-center">
              Don't have an account? <a href="auth-register.html">Create One</a>
            </div>-->
                        <div class="simple-footer">
                            Copyright &copy; SISTEM INFORMASI GIS 
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
    <!-- General JS Scripts -->
    <script src="{{ asset('vendor/assets/modules/jquery.min.js');}}"></script>
    <script src="{{ asset('vendor/assets/modules/popper.js');}}"></script>
    <script src="{{ asset('vendor/assets/modules/tooltip.js');}}"></script>
    <script src="{{ asset('vendor/assets/modules/bootstrap/js/bootstrap.min.js');}}"></script>
    <script src="{{ asset('vendor/assets/modules/nicescroll/jquery.nicescroll.min.js');}}"></script>
    <script src="{{ asset('vendor/assets/modules/moment.min.js');}}"></script>
    <script src="{{ asset('vendor/assets/js/stisla.js');}}"></script>
    <script src="{{ asset('vendor/assets/js/scripts.js'); }}"></script>
    <script src="{{ asset('vendor/assets/js/custom.js');  }}"></script>
</body>

</html>