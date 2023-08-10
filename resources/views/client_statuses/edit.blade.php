@extends('layouts.main')
@section('title', 'Debit Card')
@section('css')
    <style>
        input[name=arg_ifsc] {
            text-transform: uppercase;
        }

        input[name=arg_bank] {
            pointer-events: none;
        }

        input[name=arg_branch] {
            pointer-events: none;
        }

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
                <div class="pd-10 card-box mb-20 mt-20">
                    <div class="col-md-12 pl-0 my-2">
                        <div class="d-flex justify-content-between mb-20 col-md-12">
                            <h3 class="text-blue">Client Status</h3>
                            <div class="">
                                <a href="{{ route('client-status.index') }}" type="button"
                                    class="btn btn-secondary mx-1 btn-lg">Back</a>
                            </div>
                        </div>
                    </div>
                    @if (session('error'))
                        <div class="row">
                            <div class="col-md-6 ml-3">
                                <div class="alert alert-danger" role="alert">
                                    {{ session()->get('error') }}
                                </div>
                            </div>
                        </div>
                    @endif
                    <div class="col-md-12 mb-3">
                        @if ($clientStatus)
                            @foreach ($clientStatus as $clientStatus)
                                <form action="{{ route('client-status.update', $clientStatus->id) }}" method="POST">
                                    @csrf
                                    @method('put')
                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label>Name:<span class="text-danger font-20 mt-0">*</span></label>
                                                <input class="form-control" type="text" placeholder="Name" name="name"
                                                    value="{{ $clientStatus->name }}" />

                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <button type="submit" class="btn btn-primary btn-lg" onclick="return confirm('Do you really want to submit the form?');">Update</button>
                                            <a role="button" href="{{ route('client-status.index') }}"
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
@endsection
