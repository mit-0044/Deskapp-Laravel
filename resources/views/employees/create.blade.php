@extends('layouts.main')
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
                        <form action="{{ route('employee.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <h4 class="text-blue mb-3">Personal Details</h4>
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>First Name:<span class="text-danger font-20 mt-0">*</span></label>
                                        <input class="form-control" type="text" placeholder="First Name" name="emp_fname"
                                            value="{{ old('emp_fname') }}" />
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group mt-1">
                                        <label>Middle Name:</label>
                                        <input class="form-control" type="text" placeholder="Middle Name"
                                            name="emp_midname" value="{{ old('emp_midname') }}" />
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Surname:<span class="text-danger font-20 mt-0">*</span></label>
                                        <input class="form-control" type="text" placeholder="Last Name"
                                            name="emp_surname" value="{{ old('emp_surname') }}" />
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Email Address:<span class="text-danger font-20 mt-0">*</span></label>
                                        <input class="form-control" type="email" placeholder="Email Address"
                                            name="emp_email" value="{{ old('emp_email') }}" />
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Mobile No.:<span class="text-danger font-20 mt-0">*</span></label>
                                        <input class="form-control" type="number" placeholder="Mobile No."
                                            name="emp_mobile" value="{{ old('emp_mobile') }}" />
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Gender:<span class="text-danger font-20 mt-0">*</span></label>
                                        <select class="form-control" title="Gender" name="emp_gender">
                                            <option selected disabled>Select Gender</option>
                                            <option value="Male" {{ old('emp_gender') == 'Male' ? 'selected' : '' }}>Male
                                            </option>
                                            <option value="Female" {{ old('emp_gender') == 'Female' ? 'selected' : '' }}>
                                                Female</option>
                                            <option value="Other" {{ old('emp_gender') == 'Other' ? 'selected' : '' }}>
                                                Other</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Blood Group:<span class="text-danger font-20 mt-0">*</span></label>
                                        <select class="form-control" title="Blood Group" name="emp_blood_group">
                                            <option selected disabled>Select Blood Group</option>
                                            <option value="A+" {{ old('emp_blood_group') == 'A+' ? 'selected' : '' }}>
                                                A+
                                            </option>
                                            <option value="A-" {{ old('emp_blood_group') == 'A-' ? 'selected' : '' }}>
                                                A-
                                            </option>
                                            <option value="B+" {{ old('emp_blood_group') == 'B+' ? 'selected' : '' }}>
                                                B+
                                            </option>
                                            <option value="B-" {{ old('emp_blood_group') == 'B-' ? 'selected' : '' }}>
                                                B-
                                            </option>
                                            <option value="AB+" {{ old('emp_blood_group') == 'AB+' ? 'selected' : '' }}>
                                                AB+
                                            </option>
                                            <option value="AB-" {{ old('emp_blood_group') == 'AB-' ? 'selected' : '' }}>
                                                AB-
                                            </option>
                                            <option value="O+" {{ old('emp_blood_group') == 'O+' ? 'selected' : '' }}>
                                                O+
                                            </option>
                                            <option value="O-" {{ old('emp_blood_group') == 'O-' ? 'selected' : '' }}>
                                                O-
                                            </option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Date of Birth:<span class="text-danger font-20 mt-0">*</span></label>
                                        <input class="form-control" type="date" placeholder="Birthdate" name="emp_dob"
                                            value="{{ old('emp_dob') }}" />
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Adharcard:<span class="text-danger font-20 mt-0">*</span></label>
                                        <input class="form-control" type="number" placeholder="Adharcard"
                                            name="emp_adharcard" value="{{ old('emp_adharcard') }}" />
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>PAN Card:<span class="text-danger font-20 mt-0">*</span></label>
                                        <input class="form-control emp_pancard" type="text" placeholder="PAN Card"
                                            name="emp_pancard" value="{{ old('emp_pancard') }}" />
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Image<span class="text-danger font-20 mt-0">*</span></label>
                                        <div class="custom-file">
                                            <input type="file" class="custom-file-input" accept="image/*"
                                                name="emp_image" value="{{ old('emp_image') }}" id="imageFile" />
                                            <label class="custom-file-label" id="imageFile">Choose file</label>
                                        </div>
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
                                            name="emp_emr_name_1" value="{{ old('emp_emr_name_1') }}" />
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Mobile No.:<span class="text-danger font-20 mt-0">*</span></label>
                                        <input class="form-control" type="number" placeholder="Mobile No."
                                            name="emp_emr_mobile_1" value="{{ old('emp_emr_mobile_1') }}" />
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Relationship:<span class="text-danger font-20 mt-0">*</span></label>
                                        <select class="form-control" title="Relationship" name="emp_emr_relationship_1">
                                            <option selected disabled>Select Relationship</option>
                                            <option value="Father"
                                                {{ old('emp_emr_relationship_1') == 'Father' ? 'selected' : '' }}>
                                                Father
                                            </option>
                                            <option value="Mother"
                                                {{ old('emp_emr_relationship_1') == 'Mother' ? 'selected' : '' }}>
                                                Mother
                                            </option>
                                            <option value="Brother"
                                                {{ old('emp_emr_relationship_1') == 'Brother' ? 'selected' : '' }}>
                                                Brother
                                            </option>
                                            <option value="Sister"
                                                {{ old('emp_emr_relationship_1') == 'Sister' ? 'selected' : '' }}>
                                                Sister
                                            </option>
                                            <option value="Spouse"
                                                {{ old('emp_emr_relationship_1') == 'Spouse' ? 'selected' : '' }}>
                                                Spouse
                                            </option>
                                            <option value="Daughter"
                                                {{ old('emp_emr_relationship_1') == 'Daughter' ? 'selected' : '' }}>
                                                Daughter</option>
                                            <option value="Son"
                                                {{ old('emp_emr_relationship_1') == 'Son' ? 'selected' : '' }}>Son
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
                                            name="emp_emr_name_2" value="{{ old('emp_emr_name_2') }}" />
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Mobile No.:</label>
                                        <input class="form-control" type="number" placeholder="Mobile No."
                                            name="emp_emr_mobile_2" value="{{ old('emp_emr_mobile_2') }}" />
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Relationship: </label>
                                        <select class="form-control" title="Relationship" name="emp_emr_relationship_2">
                                            <option selected disabled>Select Relationship</option>
                                            <option value="Father"
                                                {{ old('emp_emr_relationship_2') == 'Father' ? 'selected' : '' }}>
                                                Father
                                            </option>
                                            <option value="Mother"
                                                {{ old('emp_emr_relationship_2') == 'Mother' ? 'selected' : '' }}>
                                                Mother
                                            </option>
                                            <option value="Brother"
                                                {{ old('emp_emr_relationship_2') == 'Brother' ? 'selected' : '' }}>
                                                Brother
                                            </option>
                                            <option value="Sister"
                                                {{ old('emp_emr_relationship_2') == 'Sister' ? 'selected' : '' }}>
                                                Sister
                                            </option>
                                            <option value="Spouse"
                                                {{ old('emp_emr_relationship_2') == 'Spouse' ? 'selected' : '' }}>
                                                Spouse
                                            </option>
                                            <option value="Daughter"
                                                {{ old('emp_emr_relationship_2') == 'Daughter' ? 'selected' : '' }}>
                                                Daughter</option>
                                            <option value="Son"
                                                {{ old('emp_emr_relationship_2') == 'Son' ? 'selected' : '' }}>Son
                                            </option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <h4 class="text-blue mb-3">Residential Details</h4>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Address Line 1:<span class="text-danger font-20 mt-0">*</span></label>
                                        <input class="form-control" type="text" placeholder="Address Line 1"
                                            name="emp_address_line_1" value="{{ old('emp_address_line_1') }}" />
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group mt-1">
                                        <label>Address Line 2:</label>
                                        <input class="form-control" type="text" placeholder="Address Line 2"
                                            name="emp_address_line_2" value="{{ old('emp_address_line_2') }}" />
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label>Country:<span class="text-danger font-20 mt-0">*</span></label>
                                        <select class="custom-select countries" name="emp_country">
                                            <option selected disabled>Select Country</option>
                                            @if ($country)
                                                @foreach ($country as $country)
                                                    <option value="{{ $country->countryid }}">{{ $country->country }}
                                                    </option>
                                                @endforeach
                                            @endif
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label>State:<span class="text-danger font-20 mt-0">*</span></label>
                                        <select class="custom-select states" name="emp_state">
                                            <option selected disabled>Select State</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label>City:<span class="text-danger font-20 mt-0">*</span></label>
                                        <select class="custom-select cities" name="emp_city">
                                            <option selected disabled>Select City</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label>Pincode:<span class="text-danger font-20 mt-0">*</span></label>
                                        <input class="form-control" type="number" placeholder="Pincode"
                                            name="emp_pincode" value="{{ old('emp_pincode') }}" />
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <button type="submit" class="btn btn-primary btn-lg"
                                        onclick="return confirm('Do you really want to submit the form?');">Submit</button>
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
