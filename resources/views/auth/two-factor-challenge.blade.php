<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Deskapp</title>

    <!-- Fonts -->
    <link href="{{ asset('css/core.css') }}" rel="stylesheet">
    <link href="{{ asset('css/icon-font.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">

</head>

<body class="login-page">
    <div class="login-header box-shadow">
        <div class="container-fluid d-flex justify-content-between align-items-center">
            <div class="brand-logo">
                <a href="login.php">
                    <img src="{{ asset('images/deskapp-logo.svg') }}" alt="" />
                </a>
            </div>
        </div>
    </div>
    <div class="login-wrap d-flex align-items-center flex-wrap justify-content-center">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-md-6 col-lg-7">
                    <img src="{{ asset('images/login-page-img.png') }}" alt="" />
                </div>
                <div class="col-md-6 col-lg-5">
                    <div class="login-box bg-white box-shadow border-radius-10">
                        <div class="login-title">
                            <h2 class="text-center text-primary">Login To Deskapp</h2>
                        </div>
                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                        <form id="Form" action="{{ route('2fa') }}" method="POST">
                            @csrf
                            <div class="col-md-12 p-0">
                                <div class="form-group">
                                    <input class="form-control" type="email" placeholder="Email Address" name="email"/>
                                </div>
                            </div>
                            <div class="col-md-12 p-0">
                                <div class="form-group">
                                    <input type="password" name="one_time_password" id="pwd"
                                        class="form-control form-control-lg" placeholder="Authentication Code"/>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="input-group mb-0">
                                        <button class="btn btn-primary btn-lg btn-block" type="submit">Submit</button>
                                    </div>
                                </div>
                            </div>
                            <div class="font-16 weight-600 pt-10 pb-10 text-center" data-color="#707373">
                                OR
                            </div>
                            <div class="input-group mb-0">
                                <a role="button" class="btn btn-outline-primary btn-lg btn-block"
                                    href="{{ route('login') }}">Login
                                    Using Email</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="{{ asset('scripts/core.js') }}"></script>
    <script src="{{ asset('scripts/script.min.js') }}"></script>
    <script src="{{ asset('scripts/process.js') }}"></script>
    <script src="{{ asset('scripts/layout-settings.js') }}"></script>
</body>

</html>
