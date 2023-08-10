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
                                    <h4>Transaction</h4>
                                </div>
                                <nav aria-label="breadcrumb" Trasaction="navigation">
                                    <ol class="breadcrumb">
                                        <li class="breadcrumb-item">
                                            <a href="{{ route('dashboard') }}">Home</a>
                                        </li>
                                        <li class="breadcrumb-item">
                                            <a href="{{ route('transaction.index') }}">Transaction</a>
                                        </li>
                                        <li class="breadcrumb-item active" aria-current="page">
                                            Create
                                        </li>
                                    </ol>
                                </nav>
                            </div>
                            <div class="mt-1">
                                <a href="{{ route('transaction.index') }}" class="btn btn-primary btn-lg">Back</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="pd-10 card-box mb-20 mt-20">
                    <div class="col-md-12 pl-0 my-2">
                        <div class="d-flex justify-content-between mb-20 col-md-12">
                            <h3 class="text-blue">Create Trasaction</h3>
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
                        <form action="{{ route('transaction.store') }}" method="POST">
                            @csrf
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Project: <span class="text-danger font-20 mt-0">*</span></label>
                                        <select class="custom-select" name="project_id">
                                            <option selected disabled>Select Project</option>
                                            @if ($projects)
                                                @foreach ($projects as $project)
                                                    <option value="{{ $project->id }}">{{ $project->name }}</option>
                                                @endforeach
                                            @endif
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Transaction Type: <span class="text-danger font-20 mt-0">*</span></label>
                                        <select class="custom-select" name="transaction_type_id">
                                            <option selected disabled>Select Transaction Type</option>
                                            @if ($transaction_types)
                                                @foreach ($transaction_types as $transaction_type)
                                                    <option value="{{ $transaction_type->id }}">
                                                        {{ $transaction_type->name }}
                                                    </option>
                                                @endforeach
                                            @endif
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Income Source: <span class="text-danger font-20 mt-0">*</span></label>
                                        <select class="custom-select" name="income_source_id">
                                            <option selected disabled>Select Income Source</option>
                                            @if ($income_sources)
                                                @foreach ($income_sources as $income_source)
                                                    <option value="{{ $income_source->id }}">{{ $income_source->name }}
                                                    </option>
                                                @endforeach
                                            @endif
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label>Amount: <span class="text-danger font-20 mt-0">*</span></label>
                                        <input class="form-control" type="text" placeholder="Amount" name="amount"
                                            value="{{ old('amount') }}"
                                            oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1').replace(/^0[^.]/, '0');" />
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label>Currency: <span class="text-danger font-20 mt-0">*</span></label>
                                        <select class="custom-select" name="currency_id">
                                            <option selected disabled>Select Currency</option>
                                            @if ($currencies)
                                                @foreach ($currencies as $currency)
                                                    <option value="{{ $currency->id }}">{{ $currency->name }}</option>
                                                @endforeach
                                            @endif
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label>Transaction Date: <span class="text-danger font-20 mt-0">*</span></label>
                                        <input class="form-control" type="date" placeholder="Transaction Date"
                                            name="transaction_date" value="{{ old('transaction_date') }}" />
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label>Name: <span class="text-danger font-20 mt-0">*</span></label>
                                        <input class="form-control" type="text" placeholder="Name" name="name"
                                            value="{{ old('name') }}" />
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Description:</label>
                                        <textarea class="form-control" type="text" placeholder="Description" name="description" />{{ old('description') }}</textarea>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <button type="submit" class="btn btn-primary btn-lg"
                                        onclick="return confirm('Do you really want to submit the form?');">Submit</button>
                                    <a href="{{ route('transaction.index') }}" class="btn btn-secondary btn-lg">Cancel</a>
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
