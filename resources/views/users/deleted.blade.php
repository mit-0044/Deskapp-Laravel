<script src="{{ asset('jquery/jquery.min.js') }}"></script>
@extends('layouts.main')
@section('title', 'Authentication Logs')
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
                        <div class="col-md-6 col-sm-12">
                            <div class="title">
                                <h4>Deleted</h4>
                            </div>
                            <nav aria-label="breadcrumb" role="navigation">
                                <ol class="breadcrumb weight-500">
                                    <li class="breadcrumb-item">
                                        <a href="{{ route('dashboard') }}">Home</a>
                                    </li>
                                    <li class="breadcrumb-item" aria-current="page">
                                        <a href="{{ route('user.index') }}">Users</a>
                                    </li>
                                    <li class="breadcrumb-item active" aria-current="page">
                                        Deleted
                                    </li>
                                </ol>
                            </nav>
                        </div>
                        <div class="col-md-6 col-sm-12 text-right">
                            <a href="{{ route('user.index') }}" class="btn btn-primary">Back</a>
                        </div>
                    </div>
                </div>
                <div class="pd-10 card-box mb-20 mt-20">
                    <div class="col-md-12 pl-0 mt-2">
                        <div class="d-flex justify-content-between mb-20 col-md-12">
                            <h3 class="text-blue">Deleted Users</h3>
                        </div>
                    </div>
                    @if (session()->has('add'))
                        <div class="alert alert-success">
                            {{ session()->get('add') }}
                        </div>
                    @endif
                    @if (session()->has('update'))
                        <div class="alert alert-info">
                            {{ session()->get('update') }}
                        </div>
                    @endif
                    @if (session()->has('delete'))
                        <div class="alert alert-danger">
                            {{ session()->get('danger') }}
                        </div>
                    @endif
                    <div class="row">
                        <div class="col-md-12">
                            <table class="table" id="datatable">
                                <thead>
                                    <tr class="">
                                        <th>No.</th>
                                        <th>Type</th>
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>Verified</th>
                                        <th>Login Status</th>
                                        <th>Account Status</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody id="tablebody">
                                    @foreach ($users as $user)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>
                                                @if ($user->type == 1)
                                                    Administrator
                                                @elseif($user->type == 2)
                                                    User
                                                @endif
                                            </td>
                                            <td>{{ $user->name }}</td>
                                            <td>{{ $user->email }}</td>
                                            <td>
                                                @if ($user->email_verified_at)
                                                    <span class="badge badge-pill badge-success" data-color="">Yes</span>
                                                @else
                                                    <span class="badge badge-pill badge-danger" data-color="">No</span>
                                                @endif
                                            </td>
                                            <td>
                                                @if ($user->login_status == 1)
                                                    <span class="badge badge-pill badge-success"
                                                        data-color="">Online</span>
                                                @endif
                                                @if ($user->login_status == 0)
                                                    @if ($user->logout_at == null)
                                                        <span class="badge badge-pill badge-warning"
                                                            data-color="">Fresh</span>
                                                    @else
                                                        <span class="badge badge-pill badge-danger"
                                                            data-color="">Logout</span>
                                                    @endif
                                                @endif
                                            </td>
                                            <td>
                                                @if ($user->account_status == 1)
                                                    <span class="badge badge-pill badge-success"
                                                        data-color="">Active</span>
                                                @endif
                                                @if ($user->account_status == 0)
                                                    <span class="badge badge-pill badge-danger"
                                                        data-color="">Deactive</span>
                                                @endif
                                            </td>
                                            <td>
                                                <div class="d-flex">
                                                    <a href="{{ route('user.show', $user->id) }}"
                                                        class="btn text-white font-12 btn-info btn-sm mx-1">View</a>
                                                    <a href="{{ route('user.show', $user->id) }}"
                                                        class="btn text-white font-12 btn-primary btn-sm mx-1">Edit</a>
                                                    <button class="btn btn-outline-secondary btn-sm dropdown-toggle"
                                                        type="button" data-toggle="dropdown" aria-haspopup="true"
                                                        aria-expanded="false">More</button>
                                                    <div class="dropdown-menu">
                                                        <a class="dropdown-item" href="#">Change Password</a>
                                                        <a class="dropdown-item" href="#">Clear Session</a>
                                                        <a class="dropdown-item" href="#">Deactivate</a>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
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
    <script>
        $(document).ready(function() {
            $('#datatable').DataTable();
        });
    </script>
@endsection
