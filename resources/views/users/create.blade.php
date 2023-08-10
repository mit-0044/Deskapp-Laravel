@extends('layouts.main')
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
                                <h4>Create</h4>
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
                                        Create
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
                            <h3 class="text-primary">Create User</h3>
                        </div>
                    </div>
                    <div class="col-md-12 mb-3">
                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div><br />
                        @endif
                        <form action="{{ route('user.store') }}" method="POST">
                            @csrf
                            <div class="row">
                                <div class="col-md-4 pr-0">
                                    <div class="form-group">
                                        <label>Type:<span class="text-danger font-20 mt-0">*</span></label>
                                        <div class="form-group d-flex">
                                            <select class="form-control mr-1" name="type" id="user_type">
                                                @php
                                                    $types = DB::table('users')
                                                        ->distinct('type')
                                                        ->get('type');
                                                @endphp
                                                @foreach ($types as $type)
                                                    <option value="{{ $type->type }}"
                                                        {{ old('type') == $type->type ? 'selected' : '' }}>
                                                        {{ $type->type }}</option>
                                                @endforeach
                                            </select>
                                            <button class="btn btn-lg btn-dark ml-1" id="add_user_type_btn">ADD</button>
                                            <button class="btn btn-lg btn-dark ml-1" id="close_user_type_btn">CLOSE</button>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Name:<span class="text-danger font-20 mt-0">*</span></label>
                                        <input class="form-control" type="text" placeholder="Name" name="name"
                                            value="{{ old('name') }}" />
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Email:<span class="text-danger font-20 mt-0">*</span></label>
                                        <input class="form-control" type="email" placeholder="Example@email.com"
                                            name="email" value="{{ old('email') }}" />
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Password:<span class="text-danger font-20 mt-0">*</span></label>
                                        <input class="form-control" type="password" placeholder="Password" name="password"
                                            value="" />
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Password Confirmation:<span class="text-danger font-20 mt-0">*</span></label>
                                        <input class="form-control" type="password" placeholder="Password Confirmation"
                                            name="password_confirmation" value="" />
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
                                                    name="account_status" value="1" checked
                                                    {{ !empty(old('account_status')) ? 'checked' : '' }} />
                                                <label class="custom-control-label" for="Activate">Activate</label>
                                            </div>
                                            <div class="custom-control custom-checkbox mb-5 mx-2 form-group">
                                                <input type="checkbox" class="custom-control-input" id="Deactivate"
                                                    name="account_status" value="1"
                                                    {{ !empty(old('account_status')) ? 'checked' : '' }} />
                                                <label class="custom-control-label" for="Deactivate">Deactivate</label>
                                            </div>
                                        </div>
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
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="{{ asset('jquery/jquery-3.6.4.js') }}"></script>
    <script>
        $("#close_user_type_btn").hide();
        $("#add_user_type_btn").click(function() {
            $("#user_type").replaceWith(
                '<input type="text" class="form-control mr-1" id="user_type" placeholder="User Type" name="type">'
            );
            $("#add_user_type_btn").hide();
            $("#close_user_type_btn").show();
        })
        $("#close_user_type_btn").click(function() {
            $("#user_type").replaceWith(
                `<select class="form-control mr-1" name="type" id="user_type">
                    @php
                        $users = DB::table('users')
                            ->distinct('type')
                            ->get('type');
                    @endphp
                    @foreach ($users as $user)
                        <option value="{{ $user->type }}"
                            {{ old('type') == $user->type ? 'selected' : '' }}>
                            {{ $user->type }}</option>
                    @endforeach
                </select>`
            );
            $("#add_user_type_btn").show();
            $("#close_user_type_btn").hide();
        })
    </script>
@endsection
