@extends('layouts.main')
@section('title', 'Employee')
@section('css')
    <style>
        #content1::after {
            content: "\a";
            white-space: pre;
        }
    </style>
@endsection
@section('main')
    <div class="main-container">
        <div class="pd-ltr-20 xs-pd-20-10">
            <div class="min-height-200px">
                <div class="pd-10 card-box my-20">
                    <div class="col-md-12 pl-0 mt-2">
                        <div class="d-flex justify-content-end mb-20 col-md-12 pr-0">
                            <a href="{{ route('debit_card.index') }}" type="button"
                                class="btn btn-secondary mx-1 btn-lg">Back</a>
                        </div>
                    </div>
                    <div class="row">
                        @foreach ($auth as $auth)
                            <div class="col-md-12 ml-4 mb-20">
                                <div class="d-flex">
                                    <p class="weight-700 font-18 mb-1 text-blue">Sr. No.:&nbsp;</p>
                                    <p class="weight-500 font-18 mb-1">{{ $auth->id }}</p>
                                </div>
                                <div class="d-flex">
                                    <p class="weight-700 font-18 mb-1 text-blue">Authenticatable Type:&nbsp;</p>
                                    <p class="weight-500 font-18 mb-1">{{ $auth->authenticatable_type }}</p>
                                </div>
                                <div class="d-flex">
                                    <p class="weight-700 font-18 mb-1 text-blue">Authenticatable ID:&nbsp;</p>
                                    <p class="weight-500 font-18 mb-1">{{ $auth->authenticatable_id }}</p>
                                </div>
                                <div class="d-flex">
                                    <p class="weight-700 font-18 mb-1 text-blue">IP Address:&nbsp;</p>
                                    <p class="weight-500 font-18 mb-1">{{ $auth->ip_address }}</p>
                                </div>
                                <div class="d-flex">
                                    <p class="weight-700 font-18 mb-1 text-blue">Browser:&nbsp;</p>
                                    <p class="weight-500 font-18 mb-1">{{ $auth->user_agent }}</p>
                                </div>
                                <div class="d-flex">
                                    <p class="weight-700 font-18 mb-1 text-blue">Login At:&nbsp;</p>
                                    <p class="weight-500 font-18 mb-1">{{ $auth->login_at }}</p>
                                </div>
                                <div class="d-flex">
                                    <p class="weight-700 font-18 mb-1 text-blue">Login Successful:&nbsp;</p>
                                    <p class="weight-500 font-18 mb-1">{{ $auth->login_successful }}</p>
                                </div>
                                <div class="d-flex">
                                    <p class="weight-700 font-18 mb-1 text-blue">Logout At:&nbsp;</p>
                                    <p class="weight-500 font-18 mb-1">{{ $auth->logout_at }}</p>
                                </div>
                                <div class="d-flex">
                                    <p class="weight-700 font-18 mb-1 text-blue">Location:&nbsp;</p>
                                    <p class="weight-500 font-18 mb-1">
                                        {{-- {{ print_r($auth->location) }} --}}
                                    </p>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="{{ asset('jquery/jquery-3.6.4.js') }}"></script>
    <script>
        $(document).ready(function() {

            
        });
    </script>
@endsection
