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
                <div class="pd-10 card-box mb-20 mt-20">
                    <div class="col-md-12 pl-0 mt-2">
                        <div class="d-flex justify-content-between mb-20 col-md-12">
                            <h3 class="text-blue">Authentication Logs</h3>
                        </div>
                    </div>
                    <livewire:offline />
                    <div class="row">
                        <div class="col-md-12">
                            <table class="table" id="datatable">
                                <thead>
                                    <tr class="">
                                        <th class="col-md-1">ID</th>
                                        <th class="col-md-2">Name</th>
                                        <th class="col-md-2">Email</th>
                                        <th class="col-md-2">Login at</th>
                                        <th class="col-md-1">Login Status</th>
                                        <th class="col-md-4">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php
                                        // $data = $data->toArray();
                                    @endphp
                                    @foreach ($data as $data)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $data['name'] }}</td>
                                            <td>{{ $data['email'] }}</td>
                                            <td>{{ $data['login_at'] }}</td>
                                            <td>
                                                @if ($data->login_status == 1)
                                                    <span class="badge badge-pill badge-success"
                                                        data-color="">Active</span>
                                                @endif
                                                @if ($data->login_status = 0)
                                                    <span class="badge badge-pill badge-danger" data-color="">Logout</span>
                                                @endif
                                                @if ($data->logout_at = null)
                                                    <span class="badge badge-pill badge-warning" data-color="">Fresh</span>
                                                @endif
                                            </td>
                                            <td class="d-flex">
                                                <button class="mx-1 py-0 btn btn-info">Edit</button>
                                                <button class="mx-1 py-0 btn btn-primary">Update</button>
                                                <button class="mx-1 py-0 btn btn-danger">Delete</button>
                                                <select class="mx-1 py-0 custom-select col-md-4">
                                                    <option selected disabled>More</option>
                                                    <option value="Male">Male</option>
                                                    <option value="Female">Female</option>
                                                    <option value="Other">Other</option>
                                                </select>
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
