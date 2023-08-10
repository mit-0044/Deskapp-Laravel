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
                                    <h4>Client Status</h4>
                                </div>
                                <nav aria-label="breadcrumb" role="navigation">
                                    <ol class="breadcrumb">
                                        <li class="breadcrumb-item">
                                            <a href="{{ route('dashboard') }}">Home</a>
                                        </li>
                                        <li class="breadcrumb-item">
                                            <a href="{{ route('client-status.index') }}">Client Status</a>
                                        </li>
                                        <li class="breadcrumb-item active" aria-current="page">
                                            View
                                        </li>
                                    </ol>
                                </nav>
                            </div>
                            <div class="my-auto">
                                <a href="{{ route('client-status.index') }}" type="button" class="btn-primary btn btn-lg">Back</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="pd-10 card-box my-20">
                    <div class="col-md-12 pl-0 mt-2">
                        <div class="d-flex justify-content-between mb-20 col-md-12 pr-0">
                        </div>
                    </div>
                    <div class="row mx-3">
                        <table class="table table-bordered table-striped">
                            <thead class="">
                                <tr>
                                    <th>ID</th>
                                    <th>Name</th>
                                    <th>Badge</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if ($clientStatus)
                                    @foreach ($clientStatus as $clientStatus)
                                        <tr>
                                            <td scope="row">{{ $clientStatus->id }}</td>
                                            <td>{{ $clientStatus->name }}</td>
                                            <td>
                                                <span
                                                    class="badge badge-pill badge-secondary">{{ $clientStatus->name }}</span>
                                            </td>
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
@section('script')
    <script>
        $(document).ready(function() {});
    </script>
@endsection
@endsection
