@extends('layouts.main')
@section('title', 'Employee')
@section('css')
    <style>
        .emp_pancard {
            text-transform: uppercase;
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
                            <h3 class="text-dark">Employee Details</h3>
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
                        @if ($employee)
                            @foreach ($employee as $emp)
                                <form action="{{ route('employee.update', $emp->id) }}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    @method('patch')
                                    <h4 class="text-blue mb-3">Personal Details</h4>
                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label>First Name:<span class="text-danger font-20 mt-0">*</span></label>
                                                <input class="form-control" type="text" placeholder="First Name"
                                                    name="emp_fname" value="{{ $emp->emp_fname }}" />
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group mt-1">
                                                <label>Middle Name:</label>
                                                <input class="form-control" type="text" placeholder="Middle Name"
                                                    name="emp_midname" value="{{ $emp->emp_midname }}" />
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label>Surname:<span class="text-danger font-20 mt-0">*</span></label>
                                                <input class="form-control" type="text" placeholder="Surname"
                                                    name="emp_surname" value="{{ $emp->emp_surname }}" />
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label>Email Address:<span class="text-danger font-20 mt-0">*</span></label>
                                                <input class="form-control" type="email" placeholder="Email Address"
                                                    name="emp_email" value="{{ $emp->emp_email }}" />
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label>Mobile No.:<span class="text-danger font-20 mt-0">*</span></label>
                                                <input class="form-control" type="number" placeholder="Mobile No."
                                                    name="emp_mobile" value="{{ $emp->emp_mobile }}" />
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label>Gender:<span class="text-danger font-20 mt-0">*</span></label>
                                                <select class="form-control" title="Gender" name="emp_gender">
                                                    <option disabled>Select Gender</option>
                                                    <option value="Male" @if ($emp->emp_gender == 'Male') selected @endif>Male</option>
                                                    <option value="Female" @if ($emp->emp_gender == 'Female') selected @endif>Female</option>
                                                    <option value="Other" @if ($emp->emp_gender == 'Other') selected @endif>Other</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label>Blood Group:<span class="text-danger font-20 mt-0">*</span></label>
                                                <select class="form-control" title="Blood Group" name="emp_blood_group">
                                                    <option selected disabled>Select Blood Group</option>
                                                    <option value="A+"
                                                        @if ($emp->emp_blood_group == 'A+') selected @endif>
                                                        A+
                                                    </option>
                                                    <option value="A-"
                                                        @if ($emp->emp_blood_group == 'A-') selected @endif>
                                                        A-
                                                    </option>
                                                    <option value="B+"
                                                        @if ($emp->emp_blood_group == 'B+') selected @endif>
                                                        B+
                                                    </option>
                                                    <option value="B-"
                                                        @if ($emp->emp_blood_group == 'B-') selected @endif>
                                                        B-
                                                    </option>
                                                    <option value="AB+"
                                                        @if ($emp->emp_blood_group == 'AB+') selected @endif>
                                                        AB+
                                                    </option>
                                                    <option value="AB-"
                                                        @if ($emp->emp_blood_group == 'AB-') selected @endif>
                                                        AB-
                                                    </option>
                                                    <option value="O+"
                                                        @if ($emp->emp_blood_group == 'O+') selected @endif>
                                                        O+
                                                    </option>
                                                    <option value="O-"
                                                        @if ($emp->emp_blood_group == 'O-') selected @endif>
                                                        O-
                                                    </option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label>Date of Birth:<span class="text-danger font-20 mt-0">*</span></label>
                                                <input class="form-control" type="date" placeholder="Birthdate"
                                                    name="emp_dob" value="{{ $emp->emp_dob }}" />
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label>Adharcard:<span class="text-danger font-20 mt-0">*</span></label>
                                                <input class="form-control" type="number" placeholder="Adharcard"
                                                    name="emp_adharcard" value="{{ $emp->emp_adharcard }}" />
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label>PAN Card:<span class="text-danger font-20 mt-0">*</span></label>
                                                <input class="form-control emp_pancard" type="text"
                                                    placeholder="PAN Card" name="emp_pancard"
                                                    value="{{ $emp->emp_pancard }}" />
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label>Image</label>
                                                <div class="custom-file">
                                                    <input type="file" class="custom-file-input" accept="image/*"
                                                        name="emp_image" value="{{ $emp->emp_image }}" id="imageFile" />
                                                    <label class="custom-file-label" id="imageFile">Choose file</label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-2 my-auto">
                                            <div class="form-group my-auto">
                                                <button type="button" class="btn btn-outline-primary mt-3"
                                                    data-toggle="modal" data-target="#Medium-modal">VIEW</button>
                                            </div>
                                        </div>
                                    </div>
                                    <h4 class="text-blue mb-3">Emergency Contact Details:</h4>
                                    <span class="col-md-12 row h5 text-primary">Emergency Contact 1</span>
                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label>Name:<span class="text-danger font-20 mt-0">*</span></label>
                                                <input class="form-control" type="text" placeholder="Name"
                                                    name="emp_emr_name_1" value="{{ $emp->emp_emr_name_1 }}" />
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label>Mobile No.:<span class="text-danger font-20 mt-0">*</span></label>
                                                <input class="form-control" type="number" placeholder="Mobile No."
                                                    name="emp_emr_mobile_1" value="{{ $emp->emp_emr_mobile_1 }}" />
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label>Relationship:<span class="text-danger font-20 mt-0">*</span></label>
                                                <select class="form-control" title="Relationship"
                                                    name="emp_emr_relationship_1">
                                                    <option lected disabled>Select Relationship</option>
                                                    <option value="Father"
                                                        @if ($emp->emp_emr_relationship_1 == 'Father') selected @endif>
                                                        Father</option>
                                                    <option value="Mother"
                                                        @if ($emp->emp_emr_relationship_1 == 'Mother') selected @endif>
                                                        Mother</option>
                                                    <option value="Brother"
                                                        @if ($emp->emp_emr_relationship_1 == 'Brother') selected @endif>
                                                        Brother</option>
                                                    <option value="Sister"
                                                        @if ($emp->emp_emr_relationship_1 == 'Sister') selected @endif>
                                                        Sister</option>
                                                    <option value="Spouse"
                                                        @if ($emp->emp_emr_relationship_1 == 'Spouse') selected @endif>
                                                        Spouse</option>
                                                    <option value="Daughter"
                                                        @if ($emp->emp_emr_relationship_1 == 'Daughter') selected @endif>
                                                        Daughter</option>
                                                    <option value="Son"
                                                        @if ($emp->emp_emr_relationship_1 == 'Son') selected @endif>
                                                        Son
                                                    </option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <span class="col-md-12 row h5 text-primary">Emergency Contact 2</span>
                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label>Name:</label>
                                                <input class="form-control" type="text" placeholder="Name"
                                                    name="emp_emr_name_2" value="{{ $emp->emp_emr_name_2 }}" />
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label>Mobile No.:</label>
                                                <input class="form-control" type="number" placeholder="Mobile No."
                                                    name="emp_emr_mobile_2" value="{{ $emp->emp_emr_mobile_2 }}" />
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label>Relationship: </label>
                                                <select class="form-control" title="Relationship"
                                                    name="emp_emr_relationship_2">
                                                    <option selected disabled>Select Relationship</option>
                                                    <option value="Father"
                                                        @if ($emp->emp_emr_relationship_1 == 'Father') selected @endif>
                                                        Father</option>
                                                    <option value="Mother"
                                                        @if ($emp->emp_emr_relationship_1 == 'Mother') selected @endif>
                                                        Mother</option>
                                                    <option value="Brother"
                                                        @if ($emp->emp_emr_relationship_1 == 'Brother') selected @endif>
                                                        Brother</option>
                                                    <option value="Sister"
                                                        @if ($emp->emp_emr_relationship_1 == 'Sister') selected @endif>
                                                        Sister</option>
                                                    <option value="Spouse"
                                                        @if ($emp->emp_emr_relationship_1 == 'Spouse') selected @endif>
                                                        Spouse</option>
                                                    <option value="Daughter"
                                                        @if ($emp->emp_emr_relationship_1 == 'Daughter') selected @endif>
                                                        Daughter</option>
                                                    <option value="Son"
                                                        @if ($emp->emp_emr_relationship_1 == 'Son') selected @endif>
                                                        Son
                                                    </option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <h4 class="text-blue mb-3">Residential Details</h4>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Address Line 1:<span
                                                        class="text-danger font-20 mt-0">*</span></label>
                                                <input class="form-control" type="text" placeholder="Address Line 1"
                                                    name="emp_address_line_1" value="{{ $emp->emp_address_line_1 }}" />
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group mt-1">
                                                <label>Address Line 2:</label>
                                                <input class="form-control" type="text" placeholder="Address Line 2"
                                                    name="emp_address_line_2" value="{{ $emp->emp_address_line_2 }}" />
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label>Country:<span class="text-danger font-20 mt-0">*</span></label>
                                                <select class="custom-select countries" name="emp_country">
                                                    <option disabled>Select Country</option>
                                                    @if ($country)
                                                        @foreach ($country as $country)
                                                            <option value="{{ $country->countryid }}"
                                                                @if ($emp->emp_country == $country->countryid) selected @endif>
                                                                {{ $country->country }}</option>
                                                        @endforeach
                                                    @endif
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label>State:<span class="text-danger font-20 mt-0">*</span></label>
                                                <select class="custom-select states" name="emp_state">
                                                    <option disabled>Select State</option>
                                                    @if ($state)
                                                        @foreach ($state as $state)
                                                            <option value="{{ $state->id }}"
                                                                @if ($emp->emp_state == $state->id) selected @endif>
                                                                {{ $state->statename }}</option>
                                                        @endforeach
                                                    @endif
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label>City:<span class="text-danger font-20 mt-0">*</span></label>
                                                <select class="custom-select cities" name="emp_city">
                                                    <option selected disabled>Select City</option>
                                                    @if ($city)
                                                        @foreach ($city as $city)
                                                            <option value="{{ $city->id }}"
                                                                @if ($emp->emp_city == $city->id) selected @endif>
                                                                {{ $city->city }}</option>
                                                        @endforeach
                                                    @endif
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label>Pincode:<span class="text-danger font-20 mt-0">*</span></label>
                                                <input class="form-control" type="number" placeholder="Pincode"
                                                    name="emp_pincode" value="{{ $emp->emp_pincode }}" />
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <button type="submit" class="btn btn-primary btn-lg"
                                                onclick="return confirm('Do you really want to submit the form?');">Update</button>
                                            <a role="button" href="{{ route('employee.index') }}"
                                                class="btn btn-secondary btn-lg">Cancel</a>
                                        </div>
                                    </div>
                                </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-4 col-sm-12 mb-30">
        <div class="modal fade" id="Medium-modal" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel"
            aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title" id="myLargeModalLabel">Image</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                    </div>
                    <div class="modal-body">
                        <div class="col-md-12">
                            <div class="form-group">
                                <img src="http://localhost:8000/{{ $emp->emp_image }}" alt="{{ $emp->emp_image }}">
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endforeach
    @endif

    <script src="{{ asset('jquery/jquery-3.6.4.js') }}"></script>
    <script type="text/javascript">
        $('#imageFile').change(function(e) {
            var i = $(this).next('label').clone();
            var file = e.target.files[0].name;
            $(this).next('label').text(file);
        });
        $(document).ready(function() {
            $('.countries').change(function() {
                id = $(this).val();
                $.ajax({
                    type: "POST",
                    url: "{{ url('get_states') }}/" + id,
                    data: {
                        id: id,
                        _token: '{{ csrf_token() }}'
                    },
                    dataType: 'json',
                    beforeSend: function() {
                        $(".states option:gt(0)").remove();
                        $(".cities option:gt(0)").remove();
                        $('.states').find("option:eq(0)").html("Please wait..");
                    },
                    success: function(data) {
                        console.log(data);
                        $('.states').find("option:eq(0)").html("Select State");
                        $(data).each(function() {
                            var option = $('<option />');
                            option.attr('value', this.id).text(this.statename);
                            $('.states').append(option);
                        });
                    }
                });
            });
            $('.states').change(function() {
                id = $(this).val();
                $.ajax({
                    type: "POST",
                    url: "{{ url('get_cities') }}/" + id,
                    data: {
                        id: id,
                        _token: '{{ csrf_token() }}'
                    },
                    dataType: 'json',
                    beforeSend: function() {
                        $(".cities option:gt(0)").remove();
                        $('.cities').find("option:eq(0)").html("Please wait..");
                    },
                    success: function(data) {
                        console.log(data);
                        $('.cities').find("option:eq(0)").html("Select City");
                        $(data).each(function() {
                            var option = $('<option />');
                            option.attr('value', this.id).text(this.city);
                            $('.cities').append(option);
                        });
                    }
                });
            });
        });
    </script>
@endsection
