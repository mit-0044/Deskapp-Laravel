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

    <style>
        html {
            position: relative;
            min-height: 100%;
        }

        body {
            font-size: .875rem;
            margin-bottom: 60px;
        }

        .main-footer {
            position: absolute;
            bottom: 0;
            width: 100%;
            height: 60px;
            line-height: 60px;
            background-color: #E8EAF6;
        }

        .main-footer p {
            margin-bottom: 0;
        }

        .main-footer .fa.fa-heart {
            color: #C62828;
        }

        .page-header {
            border-bottom: 1px solid #8a8a8a;
        }

        /*
         * Boxes
         */

        .box {
            display: block;
            padding: 0;
            min-height: 70px;
            background: #fff;
            width: 100%;
            box-shadow: 0 1px 1px rgba(0, 0, 0, 0.1);
            border-radius: .25rem;
        }

        .box>.box-icon>i,
        .box .box-content .box-text,
        .box .box-content .box-number {
            color: #FFF;
            text-shadow: 0 1px 1px rgba(0, 0, 0, 0.3);
        }

        .box>.box-icon {
            border-radius: 2px 0 0 2px;
            display: block;
            float: left;
            height: 70px;
            width: 70px;
            text-align: center;
            font-size: 40px;
            line-height: 70px;
            background: rgba(0, 0, 0, 0.2);
        }

        .box .box-content {
            padding: 5px 10px;
            margin-left: 70px;
        }

        .box .box-content .box-text {
            display: block;
            font-size: 1rem;
            white-space: nowrap;
            overflow: hidden;
            text-overflow: ellipsis;
            font-weight: 600;
        }

        .box .box-content .box-number {
            display: block;
        }

        .box .box-content .progress {
            background: rgba(0, 0, 0, 0.2);
            margin: 5px -10px 5px -10px;
        }

        .box .box-content .progress .progress-bar {
            background-color: #FFF;
        }

        /*
         * Log Menu
         */

        .log-menu .list-group-item.disabled {
            cursor: not-allowed;
        }

        .log-menu .list-group-item.disabled .level-name {
            color: #D1D1D1;
        }

        /*
         * Log Entry
         */

        .stack-content {
            color: #AE0E0E;
            font-family: consolas, Menlo, Courier, monospace;
            white-space: pre-line;
            font-size: .8rem;
        }

        /*
         * Colors: Badge & Infobox
         */
        .badge {
            font-size: 13px;
        }

        .badge.badge-env,
        .badge.badge-primary,
        .badge.badge-level-all,
        .badge.badge-level-emergency,
        .badge.badge-level-alert,
        .badge.badge-level-critical,
        .badge.badge-level-error,
        .badge.badge-level-warning,
        .badge.badge-level-notice,
        .badge.badge-level-info,
        .badge.badge-level-debug,
        .badge.empty {
            color: #FFF;
            text-shadow: 0 1px 1px rgba(0, 0, 0, 0.3);
        }

        .badge.badge-level-all,
        .box.level-all {
            background-color: rgb(86, 85, 85);
            /* background-color: {{ log_styler()->color('all') }}; */
        }

        .badge.badge-level-emergency,
        .box.level-emergency {
            background-color: {{ log_styler()->color('emergency') }};
        }

        .badge.badge-level-alert,
        .box.level-alert {
            background-color: {{ log_styler()->color('alert') }};
        }

        .badge.badge-level-critical,
        .box.level-critical {
            background-color: {{ log_styler()->color('critical') }};
        }

        .badge.badge-level-error,
        .box.level-error {
            background-color: {{ log_styler()->color('error') }};
        }

        .badge.badge-level-warning,
        .box.level-warning {
            background-color: {{ log_styler()->color('warning') }};
        }

        .badge.badge-level-notice,
        .box.level-notice {
            background-color: {{ log_styler()->color('notice') }};
        }

        .badge.badge-level-info,
        .box.level-info {
            background-color: {{ log_styler()->color('info') }};
        }

        .badge.badge-level-debug,
        .box.level-debug {
            background-color: {{ log_styler()->color('debug') }};
        }

        .badge.empty,
        .box.empty {
            background-color: grey;
            /* background-color: {{ log_styler()->color('empty') }}; */
        }

        .badge.badge-env {
            background-color: #6A1B9A;
        }

        #entries {
            overflow-wrap: anywhere;
        }
    </style>
</head>

<body>
    @yield('content')
    {{-- Scripts --}}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" crossorigin="anonymous">
    </script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.1/Chart.min.js"></script>
    <script src="{{ asset('js/core.js') }}"></script>
    <script src="{{ asset('js/process.js') }}"></script>
    <script src="{{ asset('js/script.min.js') }}"></script>
    <script src="{{ asset('datatables/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('datatables/js/dataTables.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('datatables/js/dataTables.responsive.min.js') }}"></script>
    <script src="{{ asset('datatables/js/responsive.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('datatables/js/dataTables.buttons.min.js') }}"></script>

    @yield('modals')
    @yield('scripts')
</body>

</html>
