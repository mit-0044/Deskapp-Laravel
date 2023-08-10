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
                        <div class="col-md-12 d-flex justify-content-between">
                            <div>
                                <div class="title">
                                    <h4>Roles</h4>
                                </div>
                                <nav aria-label="breadcrumb" role="navigation">
                                    <ol class="breadcrumb">
                                        <li class="breadcrumb-item">
                                            <a href="{{ route('dashboard') }}">Home</a>
                                        </li>
                                        <li class="breadcrumb-item active" aria-current="page">
                                            Roles
                                        </li>
                                    </ol>
                                </nav>
                            </div>
                            <div class='my-auto'>
                                <a href="{{ route('role.index') }}" role="button"
                                    class="btn btn-primary btn-lg ml-0">Back</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="pd-10 card-box mb-20">
                    <div class="col-md-12 pl-0 mt-2">
                        <div class="d-flex justify-content-between mb-20 col-md-12 pr-0">
                            <h3 class="text-blue">Roles</h3>
                        </div>
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
                                        <tr class="">
                                            <th class="col-md-1">No</th>
                                            <th class="col-md-3">Role</th>
                                            <th class="col-md-2">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($roles as $role)
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td>{{ $role->name }}</td>
                                                <td>
                                                    <div class="d-flex">
                                                        <a href="{{ route('role.edit', $role->id) }}"
                                                            class="btn text-white font-12 btn-primary btn-sm mx-1">Edit</a>
                                                        <form action="{{ route('role.restore', $role->id) }}"
                                                            method="post">
                                                            @csrf
                                                            <button type="submit"
                                                                class="btn font-12 btn-success btn-sm mx-1">Restore</button>
                                                        </form>
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
