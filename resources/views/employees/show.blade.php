@extends('layouts.main')
@section('title', 'Log Activity')
@section('css')
    <style>
        @media screen and (min-device-width : 320px) and (max-device-width : 480px) {
            .update_btn {
                margin-top: 20px;
                float: left !important;
            }

            .submit_btn {
                margin-top: -45px;
                float: right !important;
            }

        }
    </style>
@endsection()
@section('main')
    <div class="main-container">
        <div class="pd-ltr-20 xs-pd-20-10">
            <div class="min-height-200px max-width-1000">
                <div class="pd-10 card-box mb-20 mt-20">
                    <div class="col-md-12 pl-0 mt-2">
                        <div class="d-flex justify-content-between mb-20 col-md-12">
                            <h3 class="text-blue">Authentication Logs</h3>
                        </div>
                    </div>
                    <div class="col-md-12 mb-3">
                        {{-- {{ User::find(1)->authentications }} --}}
                        {{-- {{ User::find(1)->lastLoginAt(); }} --}}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
