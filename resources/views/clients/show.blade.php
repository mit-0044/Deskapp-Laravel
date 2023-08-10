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
                                <h4>Client</h4>
                            </div>
                            <nav aria-label="breadcrumb" role="navigation">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item">
                                        <a href="{{ route('dashboard') }}">Home</a>
                                    </li>
                                    <li class="breadcrumb-item">
                                        <a href="{{ route('role.index') }}">Client</a>
                                    </li>
                                    <li class="breadcrumb-item active" aria-current="page">
                                        View
                                    </li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>
                <div class="pd-10 card-box mb-20">
                    <div class="col-md-12 pl-0 mt-2">
                        <div class="d-flex justify-content-between mb-20 col-md-12 pr-0">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12 mt-2">
                            <div class="d-flex justify-content-between mb-20 col-md-12 pr-0">
                                <h3 class="text-blue">Client Details</h3>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="col-md-12">
                                <table class="table table-bordered">
                                    <tbody>
                                        @if ($clients)
                                            @foreach ($clients as $client)
                                                <tr>
                                                    <th class="col-md-3">ID</th>
                                                    <td class="col-md-9">{{ $client->id }}</td>
                                                </tr>
                                                <tr>
                                                    <th class="col-md-3">Name</th>
                                                    <td class="col-md-9">{{ $client->first_name }} {{ $client->last_name }}
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <th class="col-md-3">Company</th>
                                                    <td class="col-md-9">{{ $client->company }}</td>
                                                </tr>
                                                <tr>
                                                    <th class="col-md-3">Email</th>
                                                    <td class="col-md-9">{{ $client->email }}</td>
                                                </tr>
                                                <tr>
                                                    <th class="col-md-3">Phone</th>
                                                    <td class="col-md-9">{{ $client->phone }}</td>
                                                </tr>
                                                <tr>
                                                    <th class="col-md-3">Website</th>
                                                    <td class="col-md-9">{{ $client->website }}</td>
                                                </tr>
                                                <tr>
                                                    <th class="col-md-3">Skype</th>
                                                    <td class="col-md-9">{{ $client->skype }}</td>
                                                </tr>
                                                <tr>
                                                    <th class="col-md-3">Country</th>
                                                    <td class="col-md-9">{{ $country[0]->country }}</td>
                                                </tr>
                                                <tr>
                                                    <th class="col-md-3">Client Status</th>
                                                    <td class="col-md-9">{{ $client_status[0]->name }}</td>
                                                </tr>
                                            @endforeach
                                        @endif
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="col-md-12 mb-3">
                            <div class="col-md-12">
                                <a href="{{ route('client.edit', $client->id) }}" class="btn btn-primary btn-lg">Update</a>
                                <a href="{{ route('client.index') }}" class="btn btn-secondary btn-lg">Cancel</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="{{ asset('jquery/jquery-3.6.4.js') }}"></script>
@endsection
