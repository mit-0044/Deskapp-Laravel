@extends('layouts.main')
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
                            <h3 class="text-dark">Debit Card Application Form</h3>
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
                        <form action="{{ route('debit_card.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <h4 class="text-blue mb-3">Personal Details</h4>
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>First Name:<span class="text-danger font-20 mt-0">*</span></label>
                                        <input class="form-control" type="text" placeholder="First Name" name="arg_fname"
                                            value="{{ old('arg_fname') }}" />
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Middle Name:<span class="text-danger font-20 mt-0">*</span></label>
                                        <input class="form-control" type="text" placeholder="Middle Name"
                                            name="arg_midname" value="" />
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Surname:<span class="text-danger font-20 mt-0">*</span></label>
                                        <input class="form-control" type="text" placeholder="Surname" name="arg_surname"
                                            value="{{ old('arg_surname') }}" />
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Email Address:<span class="text-danger font-20 mt-0">*</span></label>
                                        <input class="form-control" type="email" placeholder="Email Address"
                                            name="arg_email" value="{{ old('arg_email') }}" />
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Mobile No.:<span class="text-danger font-20 mt-0">*</span></label>
                                        <input class="form-control" type="text" placeholder="Mobile No."
                                            name="arg_mobile" value="{{ old('arg_mobile') }}"
                                            oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1');" />
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Date of Birth:<span class="text-danger font-20 mt-0">*</span></label>
                                        <input class="form-control" type="date" placeholder="Birthdate" name="arg_dob"
                                            value="{{ old('arg_dob') }}" />
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>IFSC Code:<span class="text-danger font-20 mt-0">*</span></label>
                                        <div class="form-group d-flex">
                                            <input class="form-control mr-2 pr-5" type="text" placeholder="IFSC Code"
                                                name="arg_ifsc" value="{{ old('arg_ifsc') }}" />
                                            <button type="button" class="btn btn-dark get_bank_branch_btn">SEARCH</button>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Bank Name:<span class="text-danger font-20 mt-0">*</span></label>
                                        <input class="form-control" type="text" placeholder="Bank Name" name="arg_bank"
                                            value="{{ old('arg_bank') }}" readonly />
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Branch Name:<span class="text-danger font-20 mt-0">*</span></label>
                                        <input class="form-control" type="text" placeholder="Branch Name"
                                            name="arg_branch" value="{{ old('arg_branch') }}" readonly />
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Account No.:<span class="text-danger font-20 mt-0">*</span></label>
                                        <input class="form-control" type="text" placeholder="Account No."
                                            name="arg_account" value="{{ old('arg_account') }}"
                                            oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1');" />
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Confirm Account No.:<span class="text-danger font-20 mt-0">*</span></label>
                                        <input class="form-control" type="password" placeholder="Confirm Account No."
                                            name="arg_confirm_account" value="{{ old('arg_confirm_account') }}"
                                            oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1');" />
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="form-group">
                                        <label class="weight-600">Account Type:<span
                                                class="text-danger font-20 mt-0">*</span></label><br>
                                        <div class="custom-control custom-radio">
                                            <input type="radio" id="savings" name="arg_account_type" value="1"
                                                class="custom-control-input" checked>
                                            <label class="custom-control-label" for="savings">Savings account</label>
                                        </div>
                                        <div class="custom-control custom-radio mb-5">
                                            <input type="radio" id="current" name="arg_account_type" value="2"
                                                class="custom-control-input">
                                            <label class="custom-control-label" for="current">Current account</label>
                                        </div>
                                        <div class="custom-control custom-radio mb-5">
                                            <input type="radio" id="salary" name="arg_account_type" value="3"
                                                class="custom-control-input">
                                            <label class="custom-control-label" for="salary"> Salary account</label>
                                        </div>
                                        <div class="custom-control custom-radio">
                                            <input type="radio" id="FD" name="arg_account_type" value="4"
                                                class="custom-control-input">
                                            <label class="custom-control-label" for="FD">Fixed deposit
                                                account</label>
                                        </div>
                                        <div class="custom-control custom-radio mb-5">
                                            <input type="radio" id="RC" name="arg_account_type" value="5"
                                                class="custom-control-input">
                                            <label class="custom-control-label" for="RC"> Recurring deposit
                                                account</label>
                                        </div>
                                        <div class="custom-control custom-radio mb-5">
                                            <input type="radio" id="NRI" name="arg_account_type" value="6"
                                                class="custom-control-input">
                                            <label class="custom-control-label" for="NRI">NRI accounts</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-2 pl-0">
                                    <div class="form-group">
                                        <label class="weight-600">Debit Card Type<span
                                                class="text-danger font-20 mt-0">*</span></label>
                                        <div class="custom-control custom-checkbox mb-5">
                                            <input type="checkbox" class="custom-control-input" id="New"
                                                name="arg_card_type[]" value="1"
                                                {{ !empty(old('arg_card_type')) ? 'checked' : '' }} />
                                            <label class="custom-control-label" for="New">New</label>
                                        </div>
                                        <div class="custom-control custom-checkbox mb-5">
                                            <input type="checkbox" class="custom-control-input" id="Internation"
                                                name="arg_card_type[]" value="2"
                                                {{ !empty(old('arg_card_type')) ? 'checked' : '' }} />
                                            <label class="custom-control-label" for="Internation">Internation</label>
                                        </div>
                                        <div class="custom-control custom-checkbox mb-5">
                                            <input type="checkbox" class="custom-control-input" id="Business"
                                                name="arg_card_type[]" value="3"
                                                {{ !empty(old('arg_card_type')) ? 'checked' : '' }} />
                                            <label class="custom-control-label" for="Business">Business</label>
                                        </div>
                                        <div class="custom-control custom-checkbox mb-5">
                                            <input type="checkbox" class="custom-control-input" id="MasterCard"
                                                name="arg_card_type[]" value="4"
                                                {{ !empty(old('arg_card_type')) ? 'checked' : '' }} />
                                            <label class="custom-control-label" for="MasterCard">MasterCard</label>
                                        </div>
                                        <div class="custom-control custom-checkbox mb-5">
                                            <input type="checkbox" class="custom-control-input" id="Visa"
                                                name="arg_card_type[]" value="5"
                                                {{ !empty(old('arg_card_type')) ? 'checked' : '' }} />
                                            <label class="custom-control-label" for="Visa">Visa</label>
                                        </div>
                                        <div class="custom-control custom-checkbox mb-5">
                                            <input type="checkbox" class="custom-control-input" id="Contactless"
                                                name="arg_card_type[]" value="6"
                                                {{ !empty(old('arg_card_type')) ? 'checked' : '' }} />
                                            <label class="custom-control-label" for="Contactless">Contactless</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-2 pl-0">
                                    <div class="form-group">
                                        <label class="weight-600">Service Types<span
                                                class="text-danger font-20 mt-0">*</span></label>
                                        <div class="custom-control custom-checkbox mb-5">
                                            <input type="checkbox" class="custom-control-input" id="SelfServiceBanking"
                                                name="arg_service_type[]" value="1"
                                                {{ !empty(old('arg_service_type')) ? 'checked' : '' }} />
                                            <label class="custom-control-label" for="SelfServiceBanking">Self Service
                                                Banking</label>
                                        </div>
                                        <div class="custom-control custom-checkbox mb-5">
                                            <input type="checkbox" class="custom-control-input" id="AppBanking"
                                                name="arg_service_type[]" value="2"
                                                {{ !empty(old('arg_service_type')) ? 'checked' : '' }} />
                                            <label class="custom-control-label" for="AppBanking">App Banking</label>
                                        </div>
                                        <div class="custom-control custom-checkbox mb-5">
                                            <input type="checkbox" class="custom-control-input" id="MobileBanking"
                                                name="arg_service_type[]" value="3"
                                                {{ !empty(old('arg_service_type')) ? 'checked' : '' }} />
                                            <label class="custom-control-label" for="MobileBanking">Mobile Banking</label>
                                        </div>
                                        <div class="custom-control custom-checkbox mb-5">
                                            <input type="checkbox" class="custom-control-input" id="Netbanking"
                                                name="arg_service_type[]" value="4"
                                                {{ !empty(old('arg_service_type')) ? 'checked' : '' }} />
                                            <label class="custom-control-label" for="Netbanking">Net Banking</label>
                                        </div>
                                        <div class="custom-control custom-checkbox mb-5">
                                            <input type="checkbox" class="custom-control-input" id="ATMBanking"
                                                name="arg_service_type[]" value="5"
                                                {{ !empty(old('arg_service_type')) ? 'checked' : '' }} />
                                            <label class="custom-control-label" for="ATMBanking">ATM Banking</label>
                                        </div>
                                        <div class="custom-control custom-checkbox mb-5">
                                            <input type="checkbox" class="custom-control-input" id="SMSBanking"
                                                name="arg_service_type[]" value="6"
                                                {{ !empty(old('arg_service_type')) ? 'checked' : '' }} />
                                            <label class="custom-control-label" for="SMSBanking">SMS Banking</label>
                                        </div>
                                        <div class="custom-control custom-checkbox mb-5">
                                            <input type="checkbox" class="custom-control-input" id="DoorStepBanking"
                                                name="arg_service_type[]" value="7"
                                                {{ !empty(old('arg_service_type')) ? 'checked' : '' }} />
                                            <label class="custom-control-label" for="DoorStepBanking">Door Step
                                                Banking</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group col-md-12 pl-0">
                                        <label>Upload Documents<span class="text-danger font-20 mt-0">*</span></label>
                                        <label class="text-danger">Only Image and PDF files are allowed</label>
                                        <div class="custom-file">
                                            <input type="file" class="custom-file-input" accept="image/*"
                                                name="arg_documents[]" id="imageFile" multiple
                                                value="{{ old('arg_documents') }}" />
                                            <label class="custom-file-label" id="imageFile">Choose file</label>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-4 pr-0">
                                            <p class="my-auto">Required Documents:</p>
                                            <li class="text-danger weight-500">Adharcard</li>
                                            <li class="text-danger weight-500">Bank Passbook</li>
                                            <li class="text-danger weight-500">Address Proof</li>
                                        </div>
                                        <div class="col-md-8 pl-0 block-file-selection">
                                            <p class="my-auto">Selected files:</p>
                                            <div id="fileselect"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <h4 class="text-blue my-3">Residential Details</h4>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Address Line 1:<span class="text-danger font-20 mt-0">*</span></label>
                                        <input class="form-control" type="text" placeholder="Address Line 1"
                                            name="arg_address_line_1" value="{{ old('arg_address_line_1') }}" />
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group mt-1">
                                        <label>Address Line 2:</label>
                                        <input class="form-control" type="text" placeholder="Address Line 2"
                                            name="arg_address_line_2" value="{{ old('arg_address_line_2') }}" />
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label>Country:<span class="text-danger font-20 mt-0">*</span></label>
                                        <select class="custom-select countries" name="arg_country">
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
                                        <select class="custom-select states" name="arg_state">
                                            <option selected disabled>Select State</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label>City:<span class="text-danger font-20 mt-0">*</span></label>
                                        <select class="custom-select cities" name="arg_city">
                                            <option selected disabled>Select City</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label>Pincode:<span class="text-danger font-20 mt-0">*</span></label>
                                        <input class="form-control" type="text" placeholder="Pincode"
                                            name="arg_pincode" value="{{ old('arg_pincode') }}"
                                            oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1');" />
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <button type="submit" class="btn btn-primary btn-lg"
                                        onclick="return confirm('Do you really want to submit the form?');">Submit</button>
                                    <a role="button" href="{{ route('debit_card.index') }}"
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
        var fileInput = document.getElementById('imageFile');
        var fileListDisplay = document.getElementById('fileselect');
        var fileList = [];
        var renderFileList, sendFile;

        fileInput.addEventListener('change', function(event) {
            fileList = [];
            for (var i = 0; i < fileInput.files.length; i++) {
                fileList.push(fileInput.files[i]);
            }
            renderFileList();
        });
        renderFileList = function() {
            fileListDisplay.innerHTML = '';
            fileList.forEach(function(file, index) {
                var fileDisplayEl = document.createElement('li');
                fileDisplayEl.className = "m-0";
                fileDisplayEl.innerHTML =
                    `${file.name}`;
                fileListDisplay.appendChild(fileDisplayEl);
            });
        };

        $('input[name=arg_confirm_account]').on("cut copy paste", function(e) {
            e.preventDefault();
        });
    </script>
    <script type="text/javascript">
        $(document).ready(function() {
            $('.get_bank_branch_btn').click(function() {
                id = $('input[name=arg_ifsc]').val();
                $.ajax({
                    type: "POST",
                    url: "{{ url('get_bank_branch') }}/" + id,
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
                        $('input[name=arg_bank]').val(data[0].bank_name);
                        $('input[name=arg_branch]').val(data[0].bank_branch);
                    }
                });
            });
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
