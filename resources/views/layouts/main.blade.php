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
    @yield('css')

</head>

<body>

    @include('layouts.header')
    @yield('main')
    @include('layouts.sidebar')
    @include('layouts.footer')

    <script src="{{ asset('js/core.js') }}"></script>
    <script src="{{ asset('js/process.js') }}"></script>
    <script src="{{ asset('js/script.min.js') }}"></script>

    <script src="{{ asset('scripts/datatable-setting.js') }}"></script>
    <script src="{{ asset('datatables/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('datatables/js/dataTables.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('datatables/js/dataTables.responsive.min.js') }}"></script>
    <script src="{{ asset('datatables/js/responsive.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('datatables/js/dataTables.buttons.min.js') }}"></script>
    <script src="{{ asset('datatables/js/buttons.bootstrap4.min.js') }}"></script>
    @yield('script')


</body>

</html>
