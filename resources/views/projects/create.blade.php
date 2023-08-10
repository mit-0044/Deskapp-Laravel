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
                        <div class="col-md-12 col-sm-12 d-flex justify-content-between">
                            <div>
                                <div class="title">
                                    <h4>Project</h4>
                                </div>
                                <nav aria-label="breadcrumb" Project="navigation">
                                    <ol class="breadcrumb">
                                        <li class="breadcrumb-item">
                                            <a href="{{ route('dashboard') }}">Home</a>
                                        </li>
                                        <li class="breadcrumb-item">
                                            <a href="{{ route('project.index') }}">Project</a>
                                        </li>
                                        <li class="breadcrumb-item active" aria-current="page">
                                            Create
                                        </li>
                                    </ol>
                                </nav>
                            </div>
                            <div class="mt-1">
                                <a href="{{ route('project.index') }}" class="btn btn-primary btn-lg">Back</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="pd-10 card-box mb-20 mt-20">
                    <div class="col-md-12 pl-0 my-2">
                        <div class="d-flex justify-content-between mb-20 col-md-12">
                            <h3 class="text-blue">Create Project</h3>
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
                        <form action="{{ route('project.store') }}" method="POST">
                            @csrf
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Project Name: <span class="text-danger font-20 mt-0">*</span></label>
                                        <input class="form-control" type="text" placeholder="Name" name="name"
                                            value="{{ old('name') }}" />
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Client: <span class="text-danger font-20 mt-0">*</span></label>
                                        <select class="custom-select client_id" name="client_id">
                                            <option selected disabled>Select Client</option>
                                            @if ($clients)
                                                @foreach ($clients as $client)
                                                    <option value="{{ $client->id }}">{{ $client->first_name }}
                                                        {{ $client->last_name }}
                                                    </option>
                                                @endforeach
                                            @endif
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Budget: <span class="text-danger font-20 mt-0">*</span></label>
                                        <input class="form-control" type="number" placeholder="Budget" name="budget"
                                            value="{{ old('budget') }}" />
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Start Date: <span class="text-danger font-20 mt-0">*</span></label>
                                        <input class="form-control" type="date" placeholder="Start Date"
                                            name="start_date" value="{{ old('start_date') }}" />
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>End Date: <span class="text-danger font-20 mt-0">*</span></label>
                                        <input class="form-control" type="date" placeholder="End Date" name="end_date"
                                            value="{{ old('end_date') }}" />
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Project Status: <span class="text-danger font-20 mt-0">*</span></label>
                                        <select class="custom-select" name="project_status_id">
                                            <option selected disabled>Select Project Status</option>
                                            @if ($projectStatuses)
                                                @foreach ($projectStatuses as $projectStatus)
                                                    <option value="{{ $projectStatus->id }}">{{ $projectStatus->name }}
                                                    </option>
                                                @endforeach
                                            @endif
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Description:</label>
                                        <textarea class="form-control" type="text" placeholder="Description" name="description"
                                            value="{{ old('description') }}" /></textarea>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <button type="submit" class="btn btn-primary btn-lg"
                                        onclick="return confirm('Do you really want to submit the form?');">Submit</button>
                                    <a Project="button" href="{{ route('project.index') }}"
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
@endsection
