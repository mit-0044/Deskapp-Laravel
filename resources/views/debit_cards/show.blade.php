@extends('layouts.main')
@section('title', 'Employee')
@section('css')
    <style>
        #content1::after {
            content: "\a";
            white-space: pre;
        }
    </style>
@endsection
@section('main')
    <div class="main-container">
        <div class="pd-ltr-20 xs-pd-20-10">
            <div class="min-height-200px">
                <div class="pd-10 card-box my-20">
                    <div class="col-md-12 pl-0 mt-2">
                        <div class="d-flex justify-content-end mb-20 col-md-12 pr-0">
                            <a href="{{ route('debit_card.index') }}" type="button"
                                class="btn btn-secondary mx-1 btn-lg">Back</a>
                        </div>
                    </div>
                    <div class="row">
                        @if ($cards)
                            @php
                                $arg_card_type = explode(',', $cards[0]->arg_card_type);
                                $arg_service_type = explode(',', $cards[0]->arg_service_type);
                                $arg_document = json_decode($cards[0]->arg_document);
                            @endphp
                            @foreach ($cards as $card)
                                <div class="col-md-12 ml-4 mb-20">
                                    <div class="h4 d-flex justify-content-center">
                                        <p class="weight-700 font-24 mb-1 text-blue">Application ID:&nbsp;</p>
                                        <p class="weight-500 font-24 mb-1">{{ $card->arg_id }}</p>
                                    </div>
                                    <div class="d-flex">
                                        <p class="weight-700 font-18 mb-1 text-blue">Name:&nbsp;</p>
                                        <p class="weight-500 font-18 mb-1">{{ $card->arg_fname }}
                                            {{ $card->arg_midname }} {{ $card->arg_surname }}</p>
                                    </div>
                                    <div class="d-flex">
                                        <p class="weight-700 font-18 mb-1 text-blue">Email Address:&nbsp;</p>
                                        <p class="weight-500 font-18 mb-1">{{ $card->arg_email }}</p>
                                    </div>
                                    <div class="d-flex">
                                        <p class="weight-700 font-18 mb-1 text-blue">Mobile No.:&nbsp;</p>
                                        <p class="weight-500 font-18 mb-1">{{ $card->arg_mobile }}</p>
                                    </div>
                                    <div class="d-flex">
                                        <p class="weight-700 font-18 mb-1 text-blue">Debit Card Type:&nbsp;</p>
                                        <p class="weight-500 font-18 mb-1">
                                            @if (in_array(1, $arg_card_type))
                                                New, <br>
                                            @endif
                                            @if (in_array(2, $arg_card_type))
                                                International, <br>
                                            @endif
                                            @if (in_array(3, $arg_card_type))
                                                Buisness, <br>
                                            @endif
                                            @if (in_array(4, $arg_card_type))
                                                MasterCard, <br>
                                            @endif
                                            @if (in_array(5, $arg_card_type))
                                                Visa, <br>
                                            @endif
                                            @if (in_array(6, $arg_card_type))
                                                Contactless
                                            @endif
                                        </p>
                                    </div>
                                    {{-- <div class="d-flex col-md-12 pl-0 ml-0 mb-1">
                                        <p id="content1" class="weight-700 font-18 text-blue">Documents:&nbsp;</p>
                                        <div class="col-md-2">
                                            @foreach ($arg_document as $docs)
                                                <a href="http://localhost:8000/storage/credit_card_documents/{{ $docs }}"
                                                    class="btn-link weight-500 font-18 mb-1"
                                                    target="_blank">{{ $docs }}</a>
                                            @endforeach
                                        </div>
                                    </div> --}}
                                    <div class="d-flex">
                                        <p class="weight-700 font-18 mb-1 text-blue">Status:&nbsp;</p>
                                        <p class="weight-500 font-18 mb-1">
                                            @if ($card->arg_status == null)
                                                Incomplete
                                            @elseif ($card->arg_status == 1)
                                                Pending
                                            @elseif ($card->arg_status == 2)
                                                In progress
                                            @elseif ($card->arg_status == 3)
                                                Accepted
                                            @elseif ($card->arg_status == 4)
                                                Rejected
                                            @endif
                                        </p>
                                    </div>
                                    <div class="d-flex">
                                        <p class="weight-700 font-18 mb-1 text-blue">Address: &nbsp;</p>
                                        <p class="weight-500 font-18 mb-1">
                                            {{ $card->arg_address_line_1 }},
                                            {{ $card->arg_address_line_2 }},
                                            {{ $city }},
                                            {{ $state }},
                                            {{ $country }},
                                            {{ $card->arg_pincode }}</p>
                                    </div>
                                </div>
                                <div class="col-md-12 ml-3 mb-20">
                                    <select class="custom-select col-md-3" name="arg_status">
                                        <option selected disabled>Select Status</option>
                                        <option value="" @if ($card->arg_status == null) selected @endif>Incomplete
                                        </option>
                                        <option value="1" @if ($card->arg_status == 1) selected @endif>Pending
                                        </option>
                                        <option value="2" @if ($card->arg_status == 2) selected @endif>In
                                            Progress</option>
                                        <option value="3" @if ($card->arg_status == 3) selected @endif>Accepted
                                        </option>
                                        <option value="4" @if ($card->arg_status == 4) selected @endif>Rejected
                                        </option>
                                    </select>
                                    <a href="{{ route('debit_card.edit', $card->id) }}" type="button"
                                        class="btn btn-primary mx-1 btn-lg update_btn">Update</a>
                                    <button type="button" class="btn btn-success mx-1 btn-lg change_status_btn">Change
                                        Status</button>
                                    <button type="button" class="btn btn-primary mx-1 btn-lg update_status_btn">Update
                                        Status</button>
                                    <a href="" type="button"
                                        class="btn btn-danger mx-1 btn-lg reject_btn">Reject</a>
                                </div>
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
            $('select[name=arg_status]').hide()
            $('.update_status_btn').hide()
            $('.change_status_btn').click(function() {
                $('.update_btn').hide()
                $('.reject_btn').hide()
                $('.change_status_btn').hide()
                $('select[name=arg_status]').show()
                $('.update_status_btn').show()
            })
        });
    </script>
@endsection
