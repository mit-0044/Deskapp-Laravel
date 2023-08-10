@extends('layouts.main')
@section('title', 'Employee')
@section('css')
    <style>
        :disabled {
            cursor: not-allowed;
            display: none;
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
                            <div>
                                <div class="title">
                                    <h4>Transaction</h4>
                                </div>
                                <nav aria-label="breadcrumb" role="navigation">
                                    <ol class="breadcrumb">
                                        <li class="breadcrumb-item">
                                            <a href="{{ route('dashboard') }}">Home</a>
                                        </li>
                                        <li class="breadcrumb-item">
                                            <a href="{{ route('transaction.index') }}">Transaction</a>
                                        </li>
                                        <li class="breadcrumb-item active" aria-current="page">
                                            View
                                        </li>
                                    </ol>
                                </nav>
                            </div>
                            <div class="my-auto">
                                <a href="{{ route('transaction.index') }}" class="btn btn-primary btn-lg">Back</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="pd-10 card-box mb-30">
                    <div class="col-md-12 pl-0 mt-2">
                        <div class="d-flex justify-content-between mb-20 col-md-12 pr-0">
                            <h3 class="text-blue">Transaction Details</h3>
                        </div>
                    </div>
                    <div class="row mx-3">
                        <table class="table table-bordered table-striped">
                            <tbody>
                                @if ($transactions)
                                    @foreach ($transactions as $transaction)
                                        <tr>
                                            <th class="col-md-3">ID</th>
                                            <td>{{ $transaction->id }}</td>
                                        </tr>
                                        <tr>
                                            <th class="col-md-3">Project</th>
                                            <td>
                                                @php
                                                    $projects = DB::table('projects')
                                                        ->where('id', $transaction->project_id)
                                                        ->get();
                                                    echo $projects[0]->name;
                                                @endphp
                                            </td>
                                        </tr>
                                        <tr>
                                            <th class="col-md-3">Transaction Type</th>
                                            <td>
                                                @php
                                                    $transaction_types = DB::table('transaction_types')
                                                        ->where('id', $transaction->transaction_type_id)
                                                        ->get();
                                                    echo $transaction_types[0]->name;
                                                @endphp
                                            </td>
                                        </tr>
                                        <tr>
                                            <th class="col-md-3">Income Source</th>
                                            <td>
                                                @php
                                                    $income_source = DB::table('income_sources')
                                                        ->where('id', $transaction->income_source_id)
                                                        ->get();
                                                    echo $income_source[0]->name;
                                                @endphp
                                            </td>
                                        </tr>
                                        <tr>
                                            <th class="col-md-3">Amount</th>
                                            <td>{{ number_format($transaction->amount) }}</td>
                                        </tr>
                                        <tr>
                                            <th class="col-md-3">Currency</th>
                                            <td>
                                                @php
                                                    $currency = DB::table('currencies')
                                                        ->where('id', $transaction->currency_id)
                                                        ->get();
                                                    echo $currency[0]->name;
                                                @endphp
                                            </td>
                                        </tr>
                                        <tr>
                                            <th class="col-md-3">Transaction Date</th>
                                            <td>{{ date('d-m-Y', strtotime($transaction->transaction_date)) }}</td>
                                        </tr>
                                        <tr>
                                            <th class="col-md-3">Name</th>
                                            <td>{{ $transaction->name }}</td>
                                        </tr>
                                        <tr>
                                            <th class="col-md-3">Description</th>
                                            <td>{{ $transaction->description }}</td>
                                        </tr>
                                    @endforeach
                                @endif
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="{{ asset('jquery/jquery-3.6.4.js') }}"></script>
@endsection
