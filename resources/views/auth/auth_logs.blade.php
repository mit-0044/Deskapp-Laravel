<script src="{{ asset('jquery/jquery.min.js') }}"></script>
@extends('layouts.main')
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
                            <table class="table data-table" id="datatable">
                                <thead>
                                    <tr class="">
                                        <th>ID</th>
                                        <th>User ID</th>
                                        <th>Login at</th>
                                        <th>Login Status</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @if ($data)
                                        @foreach ($data as $data)
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td>{{ $data['authenticatable_id'] }}</td>
                                                <td>{{ $data['login_at'] }}</td>
                                                <td>
                                                    @if ($data['login_successful'] == 1)
                                                        Yes
                                                    @else
                                                        No
                                                    @endif
                                                </td>
                                                <td>
                                                    <a role="button" href="{{ route('auth.auth_logs_view', $data->id) }}"
                                                        id="" class="btn btn-info btn-sm">View</a>
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
