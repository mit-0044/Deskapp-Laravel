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
                            <h3 class="text-blue">Update Role</h3>
                            <div class="">
                                <a href="{{ route('role.index') }}" type="button"
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
                        @if ($roles)
                            @foreach ($roles as $role)
                                <form action="{{ route('role.update', $role->id) }}" method="POST">
                                    @csrf
                                    @method('put')
                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label>Name:<span class="text-danger font-20 mt-0">*</span></label>
                                                <input class="form-control" type="text" placeholder="Name" name="name"
                                                    value="{{ $role->name }}" />

                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label>Select Permissions<span
                                                        class="text-danger font-20 mt-0">*</span></label>
                                                <select class="custom-select2 form-control" multiple=""
                                                    name="permission_id[]">
                                                    @if ($permissions)
                                                        @foreach ($permissions as $permission)
                                                            <option value="{{ $permission->id }}">{{ $permission->name }}
                                                            </option>
                                                        @endforeach
                                                    @endif
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-8">
                                            <div class="form-group">
                                                <label>Permissions: &nbsp;</label> <br>
                                                @if ($role_has_permissions)
                                                    <form action="{{ route('role.destroy', $role->id) }}" method="post">
                                                        @csrf
                                                        @method('delete')
                                                        @php
                                                            foreach ($role_has_permissions as $val) {
                                                                $name = DB::table('permissions')
                                                                    ->where('id', '=', $val->permission_id)
                                                                    ->get();
                                                                $name = $name->toarray();
                                                                echo '<button type="submit" onclick="return confirm('Do you really want to delete the permission?');" name="permission_id" value=' . $name[0]->id . ' class="btn btn-danger m-1 btn-sm" onclick="return confirm(`Do you really want to delete ' . $name[0]->name . ' permission?`);">' . $name[0]->name . ' <i class="micon bi bi-trash3"></i> </span>';
                                                            }
                                                        @endphp
                                                    </form>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <button type="submit" class="btn btn-primary btn-lg" onclick="return confirm('Do you really want to submit the form?');">Update</button>
                                            <a role="button" href="{{ route('role.index') }}"
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
