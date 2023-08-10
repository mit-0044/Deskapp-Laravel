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
                        <div class="col-md-12 col-sm-12">
                            <div class="title">
                                <h4>Note</h4>
                            </div>
                            <nav aria-label="breadcrumb" role="navigation">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item">
                                        <a href="{{ route('dashboard') }}">Home</a>
                                    </li>
                                    <li class="breadcrumb-item">
                                        <a href="{{ route('note.index') }}">Note</a>
                                    </li>
                                    <li class="breadcrumb-item active" aria-current="page">
                                        View
                                    </li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>
                <div class="pd-10 card-box my-20">
                    <div class="col-md-12 pl-0 mt-2">
                        <div class="d-flex justify-content-between mb-20 col-md-12 pr-0">
                        </div>
                    </div>
                    <div class="row">
                        @foreach ($notes as $note)
                            <div class="col-md-12 ml-4 mb-4">
                                <div class="d-flex">
                                    <p class="weight-500 font-18 mb-1 text-blue">Project:&nbsp;</p>
                                    <p class="weight-500 font-18 mb-1">{{ $projects[0]->name }}</p>
                                </div>
                                <div class="d-flex">
                                    <p class="weight-500 font-18 mb-1 text-blue">Note:&nbsp;</p>
                                    <p class="weight-500 font-18 mb-1">{{ $note->note_text }}</p>
                                </div>
                            </div>
                            <div class="col-md-12 d-flex mb-20 ml-4">
                                <a href="{{ route('note.edit', $note->id) }}" type="button"
                                    class="btn btn-primary mx-1 btn-lg" id="update_btn">Update</a>
                                <a href="{{ route('note.index') }}" type="button"
                                    class="btn btn-secondary mx-1 btn-lg cancel_btn">Cancel</a>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="{{ asset('jquery/jquery-3.6.4.js') }}"></script>
@section('script')
    <script>
        $(document).ready(function() {});
    </script>
@endsection
@endsection
