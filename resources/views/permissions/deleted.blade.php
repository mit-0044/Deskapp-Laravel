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
                                        <a href="{{ route('permission.index') }}">Permissions</a>
                                    </li>
                                    <li class="breadcrumb-item active" aria-current="page">
                                        Deleted
                                    </li>
                                </ol>
                            </nav>
                        </div>
                        <div class="col-md-6 col-sm-12 text-right">
                            <a href="{{ route('permission.index') }}" class="btn btn-primary">Back</a>
                        </div>
                    </div>
                </div>
                <div class="pd-10 card-box mb-20 mt-20">
                    <div class="col-md-12 pl-0 mt-2">
                        <div class="d-flex justify-content-between mb-20 col-md-12">
                            <h3 class="text-blue">Deleted Permissions</h3>
                        </div>
                    </div>
                    @if (session()->has('restore'))
                        <div class="alert alert-success">
                            {{ session()->get('restore') }}
                        </div>
                    @endif
                    @if (session()->has('update'))
                        <div class="alert alert-info">
                            {{ session()->get('update') }}
                        </div>
                    @endif
                    <div class="row">
                        <div class="col-md-12">
                            <table class="table data-table">
                                <thead>
                                    <tr class="">
                                        <th class="col-md-1">No</th>
                                        <th class="col-md-6">Permissions</th>
                                        <th class="col-md-2">No. of Users</th>
                                        <th class="col-md-3">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($permissions as $permission)
                                        <tr>
                                            <td class="td">{{ $loop->iteration }}</td>
                                            <td class="td">{{ $permission->name }}</td>
                                            <td class="td">
                                                @php
                                                    $role_has_permissions = DB::table('role_has_permissions')
                                                        ->where('permission_id', $permission->id)
                                                        ->get();
                                                @endphp
                                                @if (count($role_has_permissions) != null)
                                                    <span
                                                        class="badge badge-primary">{{ count($role_has_permissions) }}</span>
                                                @endif
                                            </td>
                                            <td class="td">
                                                <div class="d-flex">
                                                    <a href="{{ route('permission.edit', $permission->id) }}"
                                                        class="btn text-white font-12 btn-primary btn-sm mx-1">Edit</a>
                                                    <form action="{{ route('permission.restore', $permission->id) }}"
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
    <script>
        $(document).ready(function() {
            $('#datatable').DataTable();
        });
    </script>
@endsection
