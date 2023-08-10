@extends('layouts.main')
@section('title', 'Debit Card')
@section('css')
    <style>
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
                                <h4>Edit</h4>
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
                                        Edit
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
                    <div class="col-md-12 pl-0 my-2">
                        <div class="d-flex justify-content-between mb-20 col-md-12">
                            <h3 class="text-primary">Edit User</h3>
                        </div>
                    </div>
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div><br />
                    @endif
                    <div class="col-md-12 mb-3">
                        @foreach ($users as $user)
                            <form action="{{ route('user.update', $user->id) }}" method="POST">
                                @csrf
                                @method('PATCH')
                                <div class="row">
                                    <div class="col-md-4 pr-0">
                                        <div class="form-group">
                                            <label>Type:<span class="text-danger font-20 mt-0">*</span></label>
                                            <div class="form-group d-flex">
                                                <select class="form-control" name="type" id="user_type">
                                                    @php
                                                        $types = DB::table('users')
                                                            ->distinct('type')
                                                            ->get('type');
                                                    @endphp
                                                    @foreach ($types as $type)
                                                        <option
                                                            value="{{ $type->type }}"@if ($type->type == $user->type) selected @endif>
                                                            {{ $type->type }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label>Name:<span class="text-danger font-20 mt-0">*</span></label>
                                            <input class="form-control" type="text" placeholder="Name" name="name"
                                                value="{{ $user->name }}" />
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label>Email:<span class="text-danger font-20 mt-0">*</span></label>
                                            <input class="form-control" type="email" placeholder="Example@email.com"
                                                name="email" value="{{ $user->email }}" />
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group row">
                                            <label class="weight-600 col-md-2">Account<span
                                                    class="text-danger font-20 mt-0">*</span></label>
                                            <div class="d-flex col-md-10 mt-1">
                                                <div class="custom-control custom-checkbox mb-5 mr-2 form-group">
                                                    <input type="checkbox" class="custom-control-input" id="Activate"
                                                        name="account_status" value="1" checked />
                                                    <label class="custom-control-label" for="Activate">Activate</label>
                                                </div>
                                                <div class="custom-control custom-checkbox mb-5 mx-2 form-group">
                                                    <input type="checkbox" class="custom-control-input" id="Deactivate"
                                                        name="account_status" value="1" />
                                                    <label class="custom-control-label" for="Deactivate">Deactivate</label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Password:</label>
                                            <em class="font-16 weight-500 text-danger">You can not change password, contact
                                                admin to
                                                change password</em>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <button type="submit" class="btn btn-primary btn-lg"
                                            onclick="return confirm('Do you really want to submit the form?');">Submit</button>
                                        <a role="button" href="{{ route('user.index') }}"
                                            class="btn btn-secondary btn-lg">Cancel</a>
                                    </div>
                                </div>
                            </form>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="{{ asset('jquery/jquery-3.6.4.js') }}"></script>
@endsection
