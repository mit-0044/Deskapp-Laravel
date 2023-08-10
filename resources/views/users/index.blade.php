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
                        <div class="col-md-6">
                            <div class="title">
                                <h4>Users</h4>
                            </div>
                            <nav aria-label="breadcrumb" role="navigation">
                                <ol class="breadcrumb weight-500">
                                    <li class="breadcrumb-item">
                                        <a href="{{ route('dashboard') }}">Home</a>
                                    </li>
                                    <li class="breadcrumb-item active" aria-current="page">
                                        Users
                                    </li>
                                </ol>
                            </nav>
                        </div>
                        <div class="col-md-6 text-right">
                            <a href="{{ route('user.show_deactivated') }}" class="btn btn-secondary">Deactivated Users</a>
                            <a href="{{ route('user.show_deleted') }}" class="btn btn-danger ml-1">Deleted Users</a>
                        </div>
                    </div>
                </div>
                <div class="pd-10 card-box mb-20 mt-20">
                    <div class="col-md-12 pl-0 mt-2">
                        <div class="d-flex justify-content-between mb-20 col-md-12">
                            <h3 class="text-blue">Users</h3>
                            <a href="{{ route('user.create') }}" role="button" class="btn btn-primary btn-lg ml-0">Create
                                User</a>
                        </div>
                    </div>
                    @if (session('status'))
                        <div role="alert" class="alert alert-info mb-3">
                            <i class="fa fa-info-circle"></i>
                            <em class="weight-500">{{ session()->get('status') }}</em>
                        </div>
                    @endif
                    @if (session()->has('add'))
                        <div class="alert alert-success weight-500">
                            {{ session()->get('add') }}
                        </div>
                    @endif
                    @if (session()->has('update'))
                        <div class="alert alert-info weight-500">
                            {{ session()->get('update') }}
                        </div>
                    @endif
                    @if (session()->has('delete'))
                        <div class="alert alert-danger weight-500">
                            {{ session()->get('danger') }}
                        </div>
                    @endif
                    <div class="row">
                        <div class="col-md-12">
                            <table class="table data-table" id="datatable">
                                <thead>
                                    <tr>
                                        <th class="col-md-1">No.</th>
                                        <th class="col-md-2">Type</th>
                                        <th class="col-md-2">Name</th>
                                        <th class="col-md-2">Email</th>
                                        <th class="col-md-1">Verified</th>
                                        <th class="col-md-1">Login Status</th>
                                        <th class="col-md-2">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($users as $user)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $user->type }}</td>
                                            <td>{{ $user->name }}</td>
                                            <td>{{ $user->email }}</td>
                                            <td>
                                                @if ($user->email_verified_at)
                                                    <span class="badge badge-pill badge-success">Yes</span>
                                                @else
                                                    <span class="badge badge-pill badge-danger">No</span>
                                                @endif
                                            </td>
                                            <td>
                                                @if ($user->is_active == 1)
                                                    <span class="badge badge-pill badge-success">Online</span>
                                                @elseif ($user->login_at == null)
                                                    <span class="badge badge-pill badge-warning">Yet to
                                                        login</span>
                                                @elseif ($user->is_active == 0)
                                                    <span class="badge badge-pill badge-danger">Offline</span>
                                                @endif
                                            </td>
                                            <td>
                                                <div class="d-flex">
                                                    <a href="{{ route('user.show', $user->id) }}"
                                                        class="btn text-white font-12 btn-info btn-sm mx-1">View</a>
                                                    <a href="{{ route('user.edit', $user->id) }}"
                                                        class="btn text-white font-12 btn-primary btn-sm mx-1">Edit</a>
                                                    @if (Auth::user()->type == 'Admin')
                                                        @if ($user->type != 'Admin')
                                                            <form action="{{ route('user.destroy', $user->id) }}"
                                                                method="post">
                                                                @csrf
                                                                @method('delete')
                                                                <button type="submit"
                                                                    class="btn font-12 btn-danger btn-sm mx-1">Delete</button>
                                                            </form>
                                                        @endif
                                                        <button
                                                            class="btn btn-outline-secondary btn-sm mx-1 dropdown-toggle"
                                                            type="button" data-toggle="dropdown" aria-haspopup="true"
                                                            aria-expanded="false">More</button>
                                                        <div class="dropdown-menu">
                                                            <a class="dropdown-item"
                                                                href="{{ route('user.change_password', $user->id) }}">Change
                                                                Password</a>
                                                            @if ($user->type != 'Admin')
                                                                <a class="dropdown-item"
                                                                    href="{{ route('users.impersonate', $user->id) }}">Login
                                                                    As {{ $user->name }}</a>
                                                            @endif
                                                            @if ($user->type != 'Admin')
                                                                @if ($user->account_status == 0)
                                                                    <form
                                                                        action="{{ route('user.activate_account', ['id' => $user->id]) }}"
                                                                        method="post">
                                                                        @csrf
                                                                        <button type="submit"
                                                                            class="dropdown-item">Activate</button>
                                                                    </form>
                                                                @elseif($user->account_status == 1)
                                                                    <form
                                                                        action="{{ route('user.deactivate_account', ['id' => $user->id]) }}"
                                                                        method="post">
                                                                        @csrf
                                                                        <button type="submit"
                                                                            class="dropdown-item">Deactivate</button>
                                                                    </form>
                                                                @endif
                                                            @endif
                                                        </div>
                                                    @endif
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
@endsection
