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
                        <div class="col-md-6 col-sm-12">
                            <div class="title">
                                <h4>View</h4>
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
                                        View
                                    </li>
                                </ol>
                            </nav>
                        </div>
                        <div class="col-md-6 col-sm-12 text-right">
                            <a href="{{ route('user.index') }}" class="btn btn-primary">Back</a>
                        </div>
                    </div>
                </div>
                <div class="pd-10 card-box mb-30">
                    <div class="col-md-12 pl-0 my-2">
                        <div class="d-flex justify-content-between mb-20 col-md-12 pr-0">
                            <h3 class="text-blue">User Details</h3>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12 mb-4">
                            @foreach ($user as $user)
                                <table class="table dataTable mb-20 border-bottom">
                                    <tbody>
                                        <tr>
                                            <th class="col-md-4">Type</th>
                                            <td>{{ $user->type }}</td>
                                        </tr>
                                        <tr>
                                            <th class="col-md-4">Avatar</th>
                                            <td>
                                                <img class="user-profile-image" src="{{ asset('images/no_image.png') }}"
                                                    alt="No Image">
                                            </td>
                                        </tr>
                                        <tr>
                                            <th class="col-md-4">Name</th>
                                            <td>{{ $user->name }}</td>
                                        </tr>
                                        <tr>
                                            <th class="col-md-4">E-mail Address</th>
                                            <td>{{ $user->email }}</td>
                                        </tr>
                                        <tr>
                                            <th class="col-md-4">Verified</th>
                                            <td>
                                                @if ($user->email_verified_at != null)
                                                    <span class="badge badge-pill badge-success">Yes</span>
                                                @else
                                                    <span class="badge badge-pill badge-danger">No</span>
                                                @endif
                                            </td>
                                        </tr>
                                        <tr>
                                            <th class="col-md-4">Login Status</th>
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
                                        </tr>
                                        @if ($user->is_active == 1)
                                            <tr>
                                                <th class="col-md-4">Login At</th>
                                                <td class="">
                                                    <div>Date: {{ date('d-m-Y', strtotime($user->login_at)) }}</div>
                                                    <div>Time: {{ date('h:i:s A', strtotime($user->login_at)) }}</div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <th class="col-md-4">IP Address</th>
                                                <td>{{ $user->last_login_ip }}</td>
                                            </tr>
                                        @elseif ($user->is_active == 0)
                                            <tr>
                                                <th class="col-md-4">Last Logout At</th>
                                                <td class="">
                                                    <div>Date: {{ date('d-m-Y', strtotime($user->logout_at)) }}</div>
                                                    <div>Time: {{ date('h:i:s A', strtotime($user->logout_at)) }}</div>
                                                </td>
                                            </tr>
                                        @elseif($user->login_at == null)
                                            <tr>
                                                <th class="col-md-4">Last Logout At</th>
                                                <td class="">
                                                    <div>Date: {{ date('d-m-Y', strtotime($user->logout_at)) }}</div>
                                                    <div>Time: {{ date('h:i:s A', strtotime($user->logout_at)) }}</div>
                                                </td>
                                            </tr>
                                        @endif
                                    </tbody>
                                </table>
                        </div>
                        <div class="col-md-12">
                            <small class="float-right text-muted">
                                <strong>Account Created:</strong> {{ $created_at }} ({{ $created_ago }}),
                                <strong>Last Updated:</strong> {{ $updated_at }} ({{ $updated_ago }})
                            </small>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="{{ asset('jquery/jquery-3.6.4.js') }}"></script>
    <script>
        $(document).ready(function() {});
    </script>
@endsection
