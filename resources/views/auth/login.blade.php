<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>{{ config('app.name', 'Deskapp') }}</title>

    <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('images/apple-touch-icon.png') }}" />
    <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('images/favicon-32x32.png') }}" />
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('images/favicon-16x16.png') }}" />

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
                            </div><br />
                        @endif
                        <form id="Form" action="{{ url('/login') }}" method="POST">
                            @csrf
                            <div class="col-md-12 p-0">
                                <div class="form-group">
                                    <input class="form-control" type="email" placeholder="Email Address"
                                        name="email" value="admin@admin.com" autocomplete="email" />
                                </div>
                            </div>
                            <div class="col-md-12 p-0">
                                <div class="form-group">
                                    <input type="password" name="password" id="pwd"
                                        class="form-control form-control-lg" placeholder="Password" value="12345678" />
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-5 border-rounded pr-0">
                                    <div class="captcha" style="border-radius: 8px;">
                                        {!! Captcha::img() !!}
                                    </div>
                                </div>
                                <div class="col-md-7">
                                    <div class="form-group">
                                        <input class="form-control" type="password" placeholder="Captcha"
                                            name="captcha" />
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="input-group mb-0">
                                        <button class="btn btn-primary btn-lg btn-block" type="submit">Submit</button>
                                    </div>
                                </div>
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
