@extends('layouts.main')
@section('css')
    <style>
        .btn-outline-primary {
            margin-top: 37px !important;
        }
    </style>
@endsection
@section('main')
    <div class="main-container">
        <div class="pd-ltr-20 xs-pd-20-10">
            <div class="min-height-200px">
                <div class="page-header">
                    <div class="row">
                        <div class="col-md-12 col-sm-12 d-flex justify-content-between">
                            <div>
                                <div class="title">
                                    <h4>Document</h4>
                                </div>
                                <nav aria-label="breadcrumb" role="navigation">
                                    <ol class="breadcrumb">
                                        <li class="breadcrumb-item">
                                            <a href="{{ route('dashboard') }}">Home</a>
                                        </li>
                                        <li class="breadcrumb-item">
                                            <a href="{{ route('document.index') }}">Document</a>
                                        </li>
                                        <li class="breadcrumb-item active" aria-current="page">
                                            Edit
                                        </li>
                                    </ol>
                                </nav>
                            </div>
                            <div class="mt-1">
                                <a href="{{ route('document.index') }}" role="button"
                                    class="btn btn-primary btn-lg">Back</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="pd-10 card-box mb-20 mt-20">
                    <div class="col-md-12 pl-0 my-2">
                        <div class="d-flex justify-content-between mb-20 col-md-12">
                            <h3 class="text-blue">Edit Document</h3>
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
                        @if ($documents)
                            @foreach ($documents as $document)
                                <form action="{{ route('document.update', $document->id) }}" method="POST"
                                    enctype="multipart/form-data">
                                    @csrf
                                    @method('put')
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Project: <span class="text-danger font-20 mt-0">*</span></label>
                                                <select class="form-control" name="project_id">
                                                    <option selected disabled>Select Project</option>
                                                    @foreach ($projects as $project)
                                                        <option value="{{ $project->id }}"
                                                            @if ($project->id == $document->project_id) selected @endif>
                                                            {{ $project->name }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group col-md-12 px-0">
                                                <label>Document<span class="text-danger font-20 mt-0">*</span></label>
                                                <div class="custom-file">
                                                    <input type="file" class="custom-file-input" name="document"
                                                        id="imageFile" value="{{ $document->document }}" />
                                                    <label class="custom-file-label fileName" for="imageFile">Choose
                                                        file</label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-2">
                                            <a href="http://localhost:8000/storage/project_documents/{{ $document->document }}"
                                                target="_blank" class="btn btn-outline-primary">VIEW</a>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Document Name: <span
                                                        class="text-danger font-20 mt-0">*</span></label>
                                                <input class="form-control" type="text" placeholder="Document Name"
                                                    name="name" value="{{ $document->name }}" />
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Description: </label>
                                                <textarea class="form-control" type="text" placeholder="Description" name="description" />{{ $document->description }}</textarea>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <button type="submit" class="btn btn-primary btn-lg"
                                                onclick="return confirm('Do you really want to submit the form?');">Update</button>
                                            <a href="{{ route('document.index') }}"
                                                class="btn btn-secondary btn-lg">Cancel</a>
                                        </div>
                                    </div>
                                </form>
                            @endforeach
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="{{ asset('jquery/jquery-3.6.4.js') }}"></script>
    <script>
        $(document).ready(function() {
            $('#imageFile').change(function() {
                var fileName = $(this).val().split('\\').pop();
                $(this).next('.custom-file-label').addClass("selected").html(fileName);
            })
        })
    </script>
@endsection
