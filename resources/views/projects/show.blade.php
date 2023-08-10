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
                        <div class="col-md-12 d-flex justify-content-between">
                            <div>
                                <div class="title">
                                    <h4>Project</h4>
                                </div>
                                <nav aria-label="breadcrumb" role="navigation">
                                    <ol class="breadcrumb">
                                        <li class="breadcrumb-item">
                                            <a href="{{ route('dashboard') }}">Home</a>
                                        </li>
                                        <li class="breadcrumb-item">
                                            <a href="{{ route('project.index') }}">Project</a>
                                        </li>
                                        <li class="breadcrumb-item active" aria-current="page">
                                            View
                                        </li>
                                    </ol>
                                </nav>
                            </div>
                            <div class="my-auto">
                                <a href="{{ route('project.index') }}" class="btn btn-primary btn-lg">Back</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="pd-10 card-box my-20">
                    <div class="col-md-12 pl-0 mt-2">
                        <div class="d-flex justify-content-between mb-20 col-md-12 pr-0">
                            <h3 class="text-blue">Project Details</h3>
                        </div>
                    </div>
                    <div class="row mx-3">
                        <table class="table table-bordered">
                            <tbody>
                                @if ($projects)
                                    @foreach ($projects as $project)
                                        <tr>
                                            <th class="col-md-3">ID</th>
                                            <td>{{ $project->id }}</td>
                                        </tr>
                                        <tr>
                                            <th class="col-md-3">Name</th>
                                            <td>{{ $project->name }}</td>
                                        </tr>
                                        <tr>
                                            <th class="col-md-3">Description</th>
                                            <td>{{ $project->description }}</td>
                                        </tr>
                                        <tr>
                                            <th class="col-md-3">Start Date</th>
                                            <td>{{ date('d-m-Y', strtotime($project->start_date)) }}</td>
                                        </tr>
                                        <tr>
                                            <th class="col-md-3">Budget</th>
                                            <td>{{ $project->budget }}</td>
                                        </tr>
                                        <tr>
                                            <th class="col-md-3">Client Name</th>
                                            <td>{{ $client }}</td>
                                        </tr>
                                        <tr>
                                            <th class="col-md-3">Project Status</th>
                                            <td>{{ $project_status }}</td>
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
    <script src="{{ asset('jquery/jquery-3.6.4.js') }}"></script>
@endsection
