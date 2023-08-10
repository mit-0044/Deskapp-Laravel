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
                                        <a href="{{ route('permmission.index') }}">Permissions</a>
                                    </li>
                                    <li class="breadcrumb-item active" aria-current="page">
                                        View
                                    </li>
                                </ol>
                            </nav>
                        </div>
                        <div class="col-md-6 col-sm-12 text-right">
                            <a href="{{ route('permission.index') }}" class="btn btn-primary">Back</a>
                        </div>
                    </div>
                </div>
                <div class="pd-10 card-box my-20">
                    <div class="col-md-12 pl-0 mt-2">
                        <div class="d-flex justify-content-between mb-20 col-md-12 pr-0">
                            <h3 class="text-blue">User Login</h3>
                        </div>
                    </div>
                    <div class="row">
                        @foreach ($users as $user)
                            <div class="col-md-12 ml-4">
                                <div class="d-flex">
                                    <p class="weight-500 font-18 mb-1 text-blue">Name:&nbsp;</p>
                                    <p class="weight-500 font-18 mb-1">{{ $user->name }}</p>
                                </div>
                                <div class="d-flex">
                                    <p class="weight-500 font-18 mb-1 text-blue">Username:&nbsp;</p>
                                    <p class="weight-500 font-18 mb-1 username">{{ $user->username }}</p>
                                </div>
                                <div class="d-flex">
                                    <p class="weight-500 font-18 mb-1 text-blue">Email Address:&nbsp;</p>
                                    <p class="weight-500 font-18 mb-1">{{ $user->email }}</p>
                                </div>
                                <div class="d-flex mb-0">
                                    <p class="weight-500 font-18 mb-1 text-blue">Account Status:&nbsp;</p>
                                    @if ($user->account_status == 1)
                                        <p class="weight-500 font-18 mb-1">Activate</p>
                                    @endif
                                    @if ($user->account_status == 0)
                                        <span class="weight-500 font-18 mb-1">Deactivate</span>
                                    @endif
                                </div>
                                <div class="form-group d-flex mt-3">
                                    <form action={{ url('activate_user_account') }} method="POST">
                                        @csrf
                                        <input type="hidden" name="username" value="{{ $user->username }}">
                                        <button type="submit" class="btn btn-success mx-1 btn-lg" id="activate_btn"
                                            @if ($user->account_status == 1) disabled @endif>Activate</button>
                                    </form>
                                    <form action={{ url('deactivate_user_account') }} method="POST">
                                        @csrf
                                        <input type="hidden" name="username" value="{{ $user->username }}">
                                        <button type="submit" class="btn btn-danger mx-1 btn-lg" id="deactivate_btn"
                                            @if ($user->account_status == 0) disabled @endif>Deactivate</button>
                                    </form>
                                </div>
                            </div>
                            <div class="col-md-12 d-flex justify-content-center mb-20">
                                <a href="{{ route('user.edit', $user->id) }}" class="btn btn-primary mx-1 btn-lg"
                                    id="update_btn">Update</a>
                                <a href="{{ route('user.index') }}" class="btn btn-secondary mx-1 btn-lg">Cancel</a>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="{{ asset('jquery/jquery-3.6.4.js') }}"></script>
@endsection
