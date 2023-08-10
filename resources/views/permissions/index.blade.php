@extends('layouts.main')
@section('main')
    <div class="main-container">
        <div class="pd-ltr-20 xs-pd-20-10">
            <div class="min-height-200px">
                <div class="page-header">
                    <div class="row">
                        <div class="col-md-12 d-flex justify-content-between">
                            <div>
                                <div class="title">
                                    <h4>Permissions</h4>
                                </div>
                                <nav aria-label="breadcrumb" role="navigation">
                                    <ol class="breadcrumb">
                                        <li class="breadcrumb-item">
                                            <a href="{{ route('dashboard') }}">Home</a>
                                        </li>
                                        <li class="breadcrumb-item active" aria-current="page">
                                            Permissions
                                        </li>
                                    </ol>
                                </nav>
                            </div>
                            <div class='my-auto'>
                                <a href="{{ route('permission.show_deleted') }}" role="button"
                                    class="btn btn-danger btn-lg ml-0">Deleted Permissions</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="pd-10 card-box mb-20 mt-20">
                    <div class="col-md-12 pl-0 mt-2">
                        <div class="d-flex justify-content-between mb-20 col-md-12">
                            <h3 class="text-blue">Permissions</h3>
                            <a href="{{ route('permission.create') }}" role="button"
                                class="btn btn-primary btn-lg ml-0">ADD</a>
                        </div>
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
                            <table class="table data-table">
                                <thead>
                                    <tr class="">
                                        <th class="col-md-1">No</th>
                                        <th class="col-md-6">Permissions</th>
                                        <th class="col-md-6">No. of Users</th>
                                        <th class="col-md-2">Action</th>
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
                                                    <form action="{{ route('permission.destroy', $permission->id) }}"
                                                        method="post">
                                                        @csrf
                                                        @method('delete')
                                                        <button type="submit"
                                                            class="btn font-12 btn-danger btn-sm mx-1">Delete</button>
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
