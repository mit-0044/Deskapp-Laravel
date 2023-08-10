@extends('layouts.main')
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
            <div class="min-height-200px">
                <div class="page-header">
                    <div class="row">
                        <div class="col-md-12 col-sm-12">
                            <div class="title">
                                <h4>Report</h4>
                            </div>
                            <nav aria-label="breadcrumb" role="navigation">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item">
                                        <a href="{{ route('dashboard') }}">Home</a>
                                    </li>
                                    <li class="breadcrumb-item active" aria-current="page">
                                        Report
                                    </li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>
                <div class="pd-10 card-box mb-20 mt-20">
                    <div class="col-md-12 pl-0 mt-2">
                        <div class="d-flex justify-content-between mb-20 col-md-12 pr-0">
                            <h3 class="text-blue">Report</h3>
                            <a href="{{ route('client.report') }}" class="btn btn-lg btn-secondary"><i class="fa fa-refresh"
                                    aria-hidden="true"></i>
                                Refresh</a>
                        </div>
                    </div>
                    <div class="col-md-12 pb-2">
                        <form action="#" method="GET">
                            <div class="form-group d-flex">
                                <select name="project" class="form-control mr-1 col-md-4">
                                    <option selected value="all">--- All Project ---</option>
                                    @foreach ($projects as $project)
                                        <option value="{{ $project->id }}"
                                            @if ($project->id == $currentProject) selected @endif>{{ $project->name }}</option>
                                    @endforeach
                                </select>
                                <button class="btn btn-primary btn-lg ml-1" type="submit">Submit</button>
                            </div>
                        </form>
                    </div>
                    <div class="row mx-1">
                        <div class="col-md-12">
                            <table class="table data-table data">
                                <thead>
                                    <tr>
                                        <th>Month</th>
                                        <th>Income</th>
                                        <th>Expenses</th>
                                        <th>Fees</th>
                                        <th>Total</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($entries as $date => $info)
                                        @foreach ($info as $currency => $row)
                                            <tr>
                                                <td>{{ date('F Y', strtotime($date)) }}</td>
                                                <td>{{ number_format($row['income']) }} {{ $currency }}</td>
                                                <td>{{ number_format($row['expenses']) }} {{ $currency }}</td>
                                                <td>{{ number_format($row['fees']) }} {{ $currency }}</td>
                                                <td>{{ number_format($row['total']) }} {{ $currency }}</td>
                                            </tr>
                                        @endforeach
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="{{ asset('jquery/jquery-3.6.4.js') }}"></script>
@endsection
