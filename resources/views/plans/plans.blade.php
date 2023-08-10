@extends('layouts.main')
@section('css')
    <style>
        .card-box {
            -webkit-box-shadow: 0px 5px 30px -10px rgba(0, 0, 0, 0.1);
            box-shadow: 0px 5px 30px -10px rgba(0, 0, 0, 0.1);
            padding: 35px 50px;
            border-radius: 20px;
            position: relative;
        }

        .card-box .plan {
            font-size: 34px;
        }

        .pricing-badge {
            position: absolute;
            top: 0;
            z-index: 999;
            right: 0;
            width: 100%;
            display: block;
            font-size: 15px;
            padding: 0;
            overflow: hidden;
            height: 100px;
        }

        .pricing-badge .badge {
            float: right;
            -webkit-transform: rotate(45deg);
            transform: rotate(45deg);
            right: -67px;
            top: 17px;
            position: relative;
            text-align: center;
            width: 200px;
            font-size: 13px;
            margin: 0;
            padding: 7px 10px;
            font-weight: 500;
            color: #ffffff;
            background: #fb7179;
        }

        .mb-2,
        .my-2 {
            margin-bottom: .5rem !important;
        }

        p {
            line-height: 1.7;
        }
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
                                    <h4>Plans</h4>
                                </div>
                                <nav aria-label="breadcrumb" role="navigation">
                                    <ol class="breadcrumb">
                                        <li class="breadcrumb-item">
                                            <a href="{{ route('dashboard') }}">Home</a>
                                        </li>
                                        <li class="breadcrumb-item active" aria-current="page">
                                            Plans
                                        </li>
                                    </ol>
                                </nav>
                            </div>
                            <div class="my-auto">
                                <a href="{{ route('plan.create') }}" class="btn btn-primary btn-lg">Create Plan</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row pb-20 mb-20">
                    @foreach ($plans as $plan)
                        <div class="col-lg-4">
                            <div class="card-box mt-4">
                                <i class="mdi mdi-account-multiple-plus h1"></i>
                                <h4 class="f-20 text-blue">{{ $plan->name }}</h4>
                                <div class="mt-4 pt-2">
                                    <p class="mb-2 f-18">Features</p>
                                    <p class="mb-2"><i
                                            class="mdi mdi-checkbox-marked-circle text-success f-18 mr-2"></i><b>Unlimited</b>
                                        Target Audience</p>
                                    <p class="mb-2"><i
                                            class="mdi mdi-checkbox-marked-circle text-success f-18 mr-2"></i><b>1</b>
                                        User Account</p>
                                    <p class="mb-2"><i class="mdi mdi-checkbox-marked-circle  f-18 mr-2"></i><b>100+</b>
                                        Video Tuts</p>
                                    <p class="mb-2"><i
                                            class="mdi mdi-checkbox-marked text-success f-18 mr-2"></i><b>Public</b>
                                        Displays
                                    </p>
                                </div>
                                <div class="pricing-plan mt-4 pt-2 d-flex justify-content-center">
                                    <h4 class="plan pl-3 text-dark">&#x20b9;{{ number_format($plan->price) }} </h4>
                                    <p class="text-muted mt-3">/Month</p>
                                </div>
                                <div class="text-center mt-3">
                                    <a href="{{ route('plan.show', $plan->slug) }}"
                                        class="btn btn-primary btn-rounded">Purchase
                                        Now</a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
    <script src="{{ asset('jquery/jquery-3.6.4.js') }}"></script>
@endsection
