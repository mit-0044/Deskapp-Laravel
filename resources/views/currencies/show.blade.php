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
                        <div class="col-md-12 col-sm-12">
                            <div class="title">
                                <h4>Currency</h4>
                            </div>
                            <nav aria-label="breadcrumb" currency="navigation">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item">
                                        <a href="{{ route('dashboard') }}">Home</a>
                                    </li>
                                    <li class="breadcrumb-item">
                                        <a href="{{ route('currency.index') }}">Currency</a>
                                    </li>
                                    <li class="breadcrumb-item active" aria-current="page">
                                        View
                                    </li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>
                <div class="pd-10 card-box my-20">
                    <div class="col-md-12 pl-0 mt-2">
                        <div class="d-flex justify-content-between mb-20 col-md-12 pr-0">
                            <h4 class="text-blue">Currency Details</h4>
                            <button class="btn btn-primary btn-lg">Back</button>
                        </div>
                    </div>
                    <div class="row mx-2">
                        @foreach ($currencies as $currency)
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Name</th>
                                        <th>Code</th>
                                        <th>Main Currency</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td scope="row">{{ $loop->iteration }}</td>
                                        <td>{{ $currency->name }}</td>
                                        <td>{{ $currency->code }}</td>
                                        <td>
                                            @if ($currency->main_currency == 1)
                                                <span class="badge badge-pill badge-success">Yes</span>
                                            @else
                                                <span class="badge badge-pill badge-danger">No</span>
                                            @endif
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                    </div>
                    <div class="col-md-12 pl-0 mt-2">
                        <div class="d-flex mb-20 col-md-12 pr-0">
                            <a href="{{ route('currency.edit', $currency->id) }}" type="button" class="btn btn-primary btn-lg">Update</a>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
    <script src="{{ asset('jquery/jquery-3.6.4.js') }}"></script>
@endsection
