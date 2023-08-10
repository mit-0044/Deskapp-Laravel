@extends('layouts.main')
@section('main')
    <div class="main-container">
        <div class="pd-ltr-20 xs-pd-20-10">
            <div class="min-height-200px">
                <div class="page-header">
                    <div class="row">
                        <div class="col-md-12 col-sm-12">
                            <div class="title">
                                <h4>Profile</h4>
                            </div>
                            <nav aria-label="breadcrumb" role="navigation">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item">
                                        <a href="{{ route('dashboard') }}">Home</a>
                                    </li>
                                    <li class="breadcrumb-item active" aria-current="page">
                                        Profile
                                    </li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 mb-30">
                        <div class="pd-20 card-box height-100-p">
                            <div class="profile-photo">
                                <a href="modal" data-toggle="modal" data-target="#modal" class="edit-avatar"><i
                                        class="fa fa-pencil"></i></a>
                                <img src="{{ asset('images/photo2.jpg') }}" alt class="avatar-photo" />
                                <div class="modal fade" id="modal" tabindex="-1" role="dialog"
                                    aria-labelledby="modalLabel" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered" role="document">
                                        <div class="modal-content">
                                            <div class="modal-body pd-5">
                                                <div class="img-container">
                                                    <img id="image" src="{{ asset('images/photo2.jpg') }}"
                                                        alt="Picture" />
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <input type="submit" value="Update" class="btn btn-primary" />
                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">
                                                    Close
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <h5 class="text-center h4 mb-0">{{ auth()->user()->name }}</h5>
                            <p class="text-center text-muted font-15 weight-500">{{ auth()->user()->type }}</p>
                            <div class="profile-info">
                                <h5 class="mb-20 h5 text-blue">Contact Information</h5>
                                <ul>
                                    <li>
                                        <span>Email Address:</span>
                                        {{ auth()->user()->email }}
                                    </li>
                                    <li>
                                        <span>IP Address:</span>
                                        {{ auth()->user()->last_login_ip }}
                                    </li>
                                    <li>
                                        <span>Account Created:</span>
                                        {{ $created_at }} <br>
                                        ({{ $created_ago }})
                                    </li>
                                    <li>
                                        <span>Last Updated:</span>
                                        {{ $updated_at }} <br>
                                        ({{ $updated_ago }})
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-8 col-lg-8 col-md-8 col-sm-12 mb-30">
                        <div class="card-box height-100-p overflow-hidden">
                            <div class="profile-tab height-100-p">
                                <div class="card-box height-100-p">
                                    <div class="pd-20">
                                        @if ($errors->any())
                                            <div class="alert alert-danger">
                                                <ul>
                                                    @foreach ($errors->all() as $error)
                                                        <li>{{ $error }}</li>
                                                    @endforeach
                                                </ul>
                                            </div><br />
                                        @endif
                                        <div class="d-flex">
                                            <div class="col-md-8">
                                                <h3 class="text-blue mb-3">Edit Information</h3>
                                                <form action="{{ route('profile.update', auth()->user()->id) }}"
                                                    method="post">
                                                    @csrf
                                                    @method('patch')
                                                    <div class="form-group">
                                                        <label>Name</label>
                                                        <input class="form-control" type="text" placeholder="Name"
                                                            name="name" value="{{ auth()->user()->name }}" required />
                                                    </div>
                                                    <div role="alert" class="alert alert-info mb-3">
                                                        <i class="fa fa-info-circle"></i>
                                                        <em class="font-16 weight-500">
                                                            You can't change your email address. if you want to
                                                            change, ask to your administrator.
                                                        </em>
                                                    </div>
                                                    <div class="form-group">
                                                        <label>Email</label>
                                                        <input class="form-control" type="email" placeholder="Email"
                                                            name="email" value="{{ auth()->user()->email }}" required
                                                            readonly />
                                                    </div>
                                                    @if (Auth()->user()->email_verified_at == null)
                                                        <div class="form-group">
                                                            <a href="{{ route('verification.notice') }}" type="button"
                                                                class="btn btn-primary">Verify
                                                                Email</a>
                                                        </div>
                                                    @else
                                                        <div class="form-group">
                                                            <button type="submit" class="btn btn-primary">Update</button>
                                                        </div>
                                                    @endif
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
