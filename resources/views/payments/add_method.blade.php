@extends('layouts.main')
@section('css')
    <style>

    </style>
@endsection
@section('main')
    <div class="main-container">
        <div class="pd-ltr-20 xs-pd-20-10">
            <div class="min-height-200px">
                <div class="page-header">
                    <div class="row">
                        <div class="col-md-12 d-flex justify-content-between">
                            <div class="my-auto">
                                <div class="title">
                                    <h4>Add Method</h4>
                                </div>
                                <nav aria-label="breadcrumb" role="navigation">
                                    <ol class="breadcrumb">
                                        <li class="breadcrumb-item">
                                            <a href="{{ route('dashboard') }}">Home</a>
                                        </li>
                                        <li class="breadcrumb-item">
                                            <a href="{{ route('payment.index') }}">Payment</a>
                                        </li>
                                        <li class="breadcrumb-item active" aria-current="page">
                                            Add Method
                                        </li>
                                    </ol>
                                </nav>
                            </div>
                            <div class="my-auto">
                                <a href="{{ route('payment.index') }}" class="btn btn-primary btn-lg">Back</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6 mb-30">
                        <div class="pd-20 card-box">
                            <h5 class="h4 text-blue mb-20">Add Method</h5>
                            <div class="tab">
                                <ul class="nav nav-tabs customtab" role="tablist">
                                    <li class="nav-item">
                                        <a class="nav-link active" data-toggle="tab" href="#home2" role="tab"
                                            aria-selected="false">Card</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" data-toggle="tab" href="#profile2" role="tab"
                                            aria-selected="true">UPI</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" data-toggle="tab" href="#contact2" role="tab"
                                            aria-selected="false">PayPal</a>
                                    </li>
                                </ul>
                                <div class="tab-content">
                                    <div class="tab-pane fade active show" id="home2" role="tabpanel">
                                        <div class="pd-20">
                                            Lorem ipsum dolor sit amet, consectetur adipisicing
                                            elit, sed do eiusmod tempor incididunt ut labore et
                                            dolore magna aliqua. Ut enim ad minim veniam, quis
                                            nostrud exercitation ullamco laboris nisi ut aliquip ex
                                            ea commodo consequat. Duis aute irure dolor in
                                            reprehenderit in voluptate velit esse cillum dolore eu
                                            fugiat nulla pariatur. Excepteur sint occaecat cupidatat
                                            non proident, sunt in culpa qui officia deserunt mollit
                                            anim id est laborum.
                                        </div>
                                    </div>
                                    <div class="tab-pane fade" id="profile2" role="tabpanel">
                                        <div class="pd-20">
                                            Lorem ipsum dolor sit amet, consectetur adipisicing
                                            elit, sed do eiusmod tempor incididunt ut labore et
                                            dolore magna aliqua. Ut enim ad minim veniam, quis
                                            nostrud exercitation ullamco laboris nisi ut aliquip ex
                                            ea commodo consequat. Duis aute irure dolor in
                                            reprehenderit in voluptate velit esse cillum dolore eu
                                            fugiat nulla pariatur. Excepteur sint occaecat cupidatat
                                            non proident, sunt in culpa qui officia deserunt mollit
                                            anim id est laborum.
                                        </div>
                                    </div>
                                    <div class="tab-pane fade" id="contact2" role="tabpanel">
                                        <div class="pd-20">
                                            Lorem ipsum dolor sit amet, consectetur adipisicing
                                            elit, sed do eiusmod tempor incididunt ut labore et
                                            dolore magna aliqua. Ut enim ad minim veniam, quis
                                            nostrud exercitation ullamco laboris nisi ut aliquip ex
                                            ea commodo consequat. Duis aute irure dolor in
                                            reprehenderit in voluptate velit esse cillum dolore eu
                                            fugiat nulla pariatur. Excepteur sint occaecat cupidatat
                                            non proident, sunt in culpa qui officia deserunt mollit
                                            anim id est laborum.
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@section('script')
    <script></script>
@endsection
@endsection
