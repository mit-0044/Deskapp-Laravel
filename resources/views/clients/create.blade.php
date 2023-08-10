@extends('layouts.main')
@section('css')
    <style>
        input[type=number]::-webkit-inner-spin-button,
        input[type=number]::-webkit-outer-spin-button {
            -webkit-appearance: none;
            -moz-appearance: none;
            appearance: none;
            margin: 0;
        }
    </style>
@endsection()
@section('main')
    <div class="main-container">
        <div class="pd-ltr-20 xs-pd-20-10">
            <div class="min-height-200px">
                <div class="page-header">
                    <div class="row">
                        <div class="col-md-12 col-sm-12 d-flex justify-content-between">
                            <div>
                                <div class="title">
                                    <h4>Client</h4>
                                </div>
                                <nav aria-label="breadcrumb" role="navigation">
                                    <ol class="breadcrumb">
                                        <li class="breadcrumb-item">
                                            <a href="{{ route('dashboard') }}">Home</a>
                                        </li>
                                        <li class="breadcrumb-item">
                                            <a href="{{ route('client.index') }}">Client</a>
                                        </li>
                                        <li class="breadcrumb-item active" aria-current="page">
                                            Create
                                        </li>
                                    </ol>
                                </nav>
                            </div>
                            <div class="mt-1">
                                <a href="{{ route('client.index') }}" role="button" class="btn btn-primary btn-lg">Back</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="pd-10 card-box mb-20 mt-20">
                    <div class="col-md-12 pl-0 my-2">
                        <div class="d-flex justify-content-between mb-20 col-md-12">
                            <h3 class="text-blue">Client</h3>
                        </div>
                    </div>
                    <div class="col-md-12 mb-3">
                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div><br />
                        @endif
                        <form action="{{ route('client.store') }}" method="POST">
                            @csrf
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>First Name:<span class="text-danger font-20 mt-0">*</span></label>
                                        <input class="form-control" type="text" placeholder="First Name"
                                            name="first_name" value="{{ old('first_name') }}" />
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Last Name:<span class="text-danger font-20 mt-0">*</span></label>
                                        <input class="form-control" type="text" placeholder="Last Name" name="last_name"
                                            value="{{ old('last_name') }}" />
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Company:<span class="text-danger font-20 mt-0">*</span></label>
                                        <input class="form-control" type="text" placeholder="Company" name="company"
                                            value="{{ old('company') }}" />
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Email:<span class="text-danger font-20 mt-0">*</span></label>
                                        <input class="form-control" type="email" placeholder="Email" name="email"
                                            value="{{ old('email') }}" />
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Phone:<span class="text-danger font-20 mt-0">*</span></label>
                                        <input class="form-control" type="number" placeholder="Phone" name="phone"
                                            value="{{ old('phone') }}" />
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Website:</label>
                                        <input class="form-control" type="text" placeholder="Website" name="website"
                                            value="{{ old('website') }}" />
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Skype:</label>
                                        <input class="form-control" type="text" placeholder="Skype" name="skype"
                                            value="{{ old('skype') }}" />
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Country:<span class="text-danger font-20 mt-0">*</span></label>
                                        <select class="custom-select" name="country">
                                            <option selected disabled>Select Country</option>
                                            @if ($country)
                                                @foreach ($country as $country)
                                                    <option value="{{ $country->countryid }}">{{ $country->country }}
                                                    </option>
                                                @endforeach
                                            @endif
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Client Status:<span class="text-danger font-20 mt-0">*</span></label>
                                        <select class="custom-select" name="client_status">
                                            <option selected disabled>Select Status</option>
                                            @if ($clientStatus)
                                                @foreach ($clientStatus as $clientStatus)
                                                    <option value="{{ $clientStatus->id }}">{{ $clientStatus->name }}
                                                    </option>
                                                @endforeach
                                            @endif
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <button type="submit" class="btn btn-primary btn-lg"
                                        onclick="return confirm('Do you really want to submit the form?');">Submit</button>
                                    <a role="button" href="{{ route('client.index') }}"
                                        class="btn btn-secondary btn-lg">Cancel</a>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="{{ asset('jquery/jquery-3.6.4.js') }}"></script>
@endsection
