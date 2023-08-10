@extends('layouts.main')
@section('css')
    <style>
        input[name=arg_ifsc] {
            text-transform: uppercase;
        }

        input[name=arg_bank] {
            pointer-events: none;
        }

        input[name=arg_branch] {
            pointer-events: none;
        }

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
                        <div class="col-md-6 col-sm-12">
                            <div class="title">
                                <h4>Change Password</h4>
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
                                        Change Password
                                    </li>
                                </ol>
                            </nav>
                        </div>
                        <div class="col-md-6 col-sm-12 text-right">
                            <a href="{{ route('user.index') }}" class="btn btn-primary">Back</a>
                        </div>
                    </div>
                </div>
                <div class="pd-10 card-box mb-20 mt-20 pb-20">
                    <div class="col-md-12 pl-0 my-2">
                        <div class="d-flex justify-content-between mb-20 col-md-12">
                            <h3 class="text-primary">Change Password</h3>
                        </div>
                    </div>
                    <div class="col-md-6">
                        @if (session('status'))
                            <div role="alert" class="alert alert-info mb-3">
                                <i class="fa fa-info-circle"></i>
                                <em class="font-16 weight-500">
                                    {{ session()->get('status') }} </em>
                            </div>
                        @endif
                        @if ($users)
                            @foreach ($users as $user)
                                <form action="{{ route('user.update_password', $user->id) }}" method="post">
                                    @csrf
                                    <div class="form-group mb-0">
                                        <span class="font-18 weight-700">Name: &nbsp;</span>
                                        <span class="font-18 weight-700 text-primary">{{ $user->name }}</span>
                                    </div>
                                    <div class="form-group">
                                        <span class="font-18 weight-700">Email: &nbsp;</span>
                                        <span class="font-18 weight-700 text-primary">{{ $user->email }}</span>
                                    </div>
                                    <div class="form-group">
                                        <label>New Password</label>
                                        <input class="form-control" type="password" placeholder="New Password"
                                            name="password" />
                                        <x-input-error :messages="$errors->updatePassword->get('password')" class="mt-1 text-danger" />
                                    </div>
                                    <div class="form-group">
                                        <label>Password Confirmation</label>
                                        <input class="form-control" type="password" placeholder="Confirm Password"
                                            name="password_confirmation" />
                                        <x-input-error :messages="$errors->updatePassword->get('password_confirmation')" class="mt-1 text-danger" />
                                    </div>
                                    <div class="form-group">
                                        <button type="submit" class="btn btn-primary btn-lg">Update Password</button>
                                        <a href="{{ route('user.index') }}" class="btn btn-secondary btn-lg">Cancel</a>
                                    </div>
                                </form>
                            @endforeach
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="{{ asset('jquery/jquery-3.6.4.js') }}"></script>
@endsection
