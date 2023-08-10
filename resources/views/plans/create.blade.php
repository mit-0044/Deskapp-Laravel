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
                                        <li class="breadcrumb-item" aria-current="page">
                                            <a href="{{ route('plan.index') }}">Plans</a>
                                        </li>
                                        <li class="breadcrumb-item active" aria-current="page">
                                            Create
                                        </li>
                                    </ol>
                                </nav>
                            </div>
                            <div class="my-auto">
                                <a href="{{ route('plan.index') }}" class="btn btn-primary btn-lg">Back</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row pb-20 mb-20">
                    <div class="col-lg-12">
                        <div class="pd-10 card-box mb-20 mt-20">
                            <div class="row mb-3">
                                <div class="col-md-12">
                                    <h3 class="text-blue">Creare Plan</h3>
                                </div>
                            </div>
                            <form action="{{ route('plan.store') }}" method="post">
                                @csrf
                                <div class="row">
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label>Name <span class="text-danger font-20 mt-0">*</span></label>
                                            <input class="form-control" type="text" placeholder="Name" name="name"
                                                value="{{ old('name') }}" required />

                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label>Stripe Plan Key <span class="text-danger font-20 mt-0">*</span></label>
                                            <input class="form-control" type="text" placeholder="Price"
                                                name="stripe_plan" value="{{ old('stripe_plan') }}" required />
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label>Price <span class="text-danger font-20 mt-0">*</span></label>
                                            <input class="form-control" type="text" placeholder="Price" name="price"
                                                value="{{ old('price') }}" required />
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label>Select Time Period <span
                                                    class="text-danger font-20 mt-0">*</span></label>
                                            <select class="custom-select form-control" name="time_period">
                                                <option selected disabled>Select Time</option>
                                                <option value="Per Month">Per Month</option>
                                                <option value="Per 3 Months">Per 3 Months</option>
                                                <option value="Per Year">Per Year</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-9">
                                        <div class="form-group">
                                            <label>Description <span class="text-danger font-20 mt-0">*</span></label>
                                            <textarea class="form-control" type="text" placeholder="Description" name="description" required>{{ old('name') }}</textarea>
                                        </div>
                                    </div>
                                </div>
                                <div class="">
                                    <button type="submit" class="btn btn-primary btn-lg">Create</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="{{ asset('jquery/jquery-3.6.4.js') }}"></script>
@endsection
