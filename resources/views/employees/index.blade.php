@extends('layouts.main')
@section('title', 'Employee')
@section('main')
    <div class="main-container">
        <div class="pd-ltr-20 xs-pd-20-10">
            <div class="min-height-200px">
                <div class="pd-10 card-box my-20">
                    <div class="col-md-12 pl-0 mt-2">
                        <div class="d-flex justify-content-between mb-20 col-md-12 pr-0">
                            <h3 class="text-blue">Employees</h3>
                            <a href="{{ route('employee.create') }}" role="button" class="btn btn-primary btn-lg ml-0">Add</a>
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
                        <div class="col-md-12 mb-3">
                            <table class="table data-table" id="datatable">
                                <thead class="table-dark">
                                    <tr class="">
                                        <th>ID</th>
                                        <th>Employee ID</th>
                                        <th>First Name</th>
                                        <th>Surname</th>
                                        <th>Gender</th>
                                        <th>Email</th>
                                        <th>Mobile</th>
                                        <th class="text-center">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @if ($employees)
                                        @foreach ($employees as $emp)
                                            <tr class="">
                                                <td>{{ $emp->id }}</td>
                                                <td>{{ $emp->emp_id }}</td>
                                                <td>{{ $emp->emp_fname }}</td>
                                                <td>{{ $emp->emp_surname }}</td>
                                                <td>{{ $emp->emp_gender }}</td>
                                                <td>{{ $emp->emp_email }}</td>
                                                <td>{{ $emp->emp_mobile }}</td>
                                                <td class="text-center">
                                                    <a role="button" href="{{ route('employee.edit', $emp->id) }}"
                                                        id="" class="btn btn-outline-primary btn-sm">Edit</a>
                                                    <a role="button" href="" id=""
                                                        class="btn btn-outline-danger btn-sm">Delete</a>
                                                </td>
                                            </tr>
                                        @endforeach
                                    @endif
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
