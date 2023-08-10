@extends('layouts.main')
@section('main')
    <div class="main-container">
        <div class="pd-ltr-20 xs-pd-20-10">
            <div class="min-height-200px">
                <div class="page-header">
                    <div class="row">
                        <div class="col-md-12 col-sm-12 d-flex justify-content-between">
                            <div>
                                <div class="title">
                                    <h4>Currency</h4>
                                </div>
                                <nav aria-label="breadcrumb" currency="navigation">
                                    <ol class="breadcrumb">
                                        <li class="breadcrumb-item">
                                            <a href="{{ route('dashboard') }}">Home</a>
                                        </li>
                                        <li class="breadcrumb-item">
                                            <a href="{{ route('permission.index') }}">Currency</a>
                                        </li>
                                        <li class="breadcrumb-item active" aria-current="page">
                                            Update
                                        </li>
                                    </ol>
                                </nav>
                            </div>
                            <div class="mt-1">
                                <a href="{{ route('currency.index') }}" currency="button"
                                    class="btn btn-primary btn-lg">Back</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="pd-10 card-box mb-20 mt-20">
                    <div class="col-md-12 pl-0 my-2">
                        <div class="d-flex justify-content-between mb-20 col-md-12">
                            <h3 class="text-blue">Update Currency</h3>
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
                        @foreach ($currencies as $currency)
                            <form action="{{ route('currency.update', $currency->id) }}" method="POST">
                                @csrf
                                @method('put')
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label>Currency Name:<span class="text-danger font-20 mt-0">*</span></label>
                                            <input class="form-control" type="text" placeholder="Name" name="name"
                                                value="{{ $currency->name }}" />
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label>Currency Code:<span class="text-danger font-20 mt-0">*</span></label>
                                            <input class="form-control" type="text" placeholder="Name" name="code"
                                                value="{{ $currency->code }}" />
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <div class="custom-control custom-checkbox mb-5">
                                                <input type="checkbox" class="custom-control-input" id="main"
                                                    name="main_currency" value="1"
                                                    {{ !empty(old('main_currency')) ? 'checked' : '' }} />
                                                <label class="custom-control-label" for="main">Main Currency</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <button type="submit" class="btn btn-primary btn-lg"
                                            onclick="return confirm('Do you really want to submit the form?');">Update</button>
                                        <a currency="button" href="{{ route('currency.index') }}"
                                            class="btn btn-secondary btn-lg">Cancel</a>
                                    </div>
                                </div>
                            </form>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="{{ asset('jquery/jquery-3.6.4.js') }}"></script>
@endsection
