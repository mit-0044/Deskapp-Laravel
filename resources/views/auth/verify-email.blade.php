<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width,initial-scale=1">

    <title>{{ config('app.name', 'Deskapp') }}</title>

    <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('images/apple-touch-icon.png') }}" />
    <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('images/favicon-32x32.png') }}" />
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('images/favicon-16x16.png') }}" />

    <!-- CSS -->
    <link href="{{ asset('css/core.css') }}" rel="stylesheet">
    <link href="{{ asset('css/icon-font.min.css') }}" rel="stylesheet">
    <link href="{{ asset('datatables/css/dataTables.bootstrap4.min.css') }}" rel="stylesheet">
    <link href="{{ asset('datatables/css/responsive.bootstrap4.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">

    @livewireStyles
</head>

<body>
    <div class="pd-ltr-20 xs-pd-20-10">
        <div class="min-height-200px">
            <div class="page-header mb-4">
                <div class="row">
                    <div class="col-md-12 ml-3 mb-3">
                        <div class="row">
                            <h3 class="text-primary">@lang('Email Verification')</h3>
                        </div>
                    </div>
                    <div class="col-md-12 ml-3">
                        <div class="row">
                            <span class="mb-4 font-20 weight-500">
                                @if (session('status') == 'verification-link-sent')
                                    <span class="mb-4 font-22 weight-500">
                                        {{ __('A new verification link has been sent.') }}
                                    </span><br>
                                @else
                                    <span class="mb-4">
                                        {{ __('Verify your email address before go to dashboard. if you have verified your email, kindly refresh the page.') }}
                                    </span>
                                @endif
                            </span>
                        </div>
                    </div>
                    <div class="col-md-12 ml-3">
                        <div class="row">
                            <form method="POST" action="{{ route('verification.send') }}">
                                @csrf
                                <div>
                                    <button class="btn btn-primary mx-1">{{ __('Verify Email') }}</button>
                                </div>
                            </form>
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
                                <button type="submit" class="btn btn-danger mx-1">{{ __('Log Out') }}</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="{{ asset('js/core.js') }}"></script>
    <script src="{{ asset('js/process.js') }}"></script>
    <script src="{{ asset('js/script.min.js') }}"></script>
</body>

</html>
