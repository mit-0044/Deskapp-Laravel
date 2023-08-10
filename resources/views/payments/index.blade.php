@extends('layouts.main')
@section('main')
    <div class="main-container">
        <div class="pd-ltr-20 xs-pd-20-10">
            <div class="min-height-200px">
                <div class="page-header">
                    <div class="row">
                        <div class="col-md-12 col-sm-12">
                            <div class="title">
                                <h4>Payment</h4>
                            </div>
                            <nav aria-label="breadcrumb" role="navigation">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item">
                                        <a href="{{ route('dashboard') }}">Home</a>
                                    </li>
                                    <li class="breadcrumb-item active" aria-current="page">
                                        Payment
                                    </li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 mb-30">
                        <div class="pd-20 card-box height-100-p">
                            <div class="row">
                                <div class="col-md-12 col-sm-12 d-flex justify-content-between">
                                    <div class="title">
                                        <h4 class="text-blue">Payment Methods</h4>
                                    </div>
                                    <div>
                                        <a href="{{ route('payment.add_method') }}"
                                            class="bg-light-blue btn text-blue weight-500"><i class="ion-plus-round"></i>
                                            Add</a>
                                        {{-- <a href="task-add" data-toggle="modal" data-target="#task-add"
                                            class="bg-light-blue btn text-blue weight-500"><i class="ion-plus-round"></i>
                                            Add</a> --}}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 mb-30">
                        <div class="pd-20 card-box height-100-p">
                            <div class="row">
                                <div class="col-md-12 col-sm-12">
                                    <div class="title">
                                        <h4 class="text-blue">Shop Fees</h4>
                                    </div>
                                    <div>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 mb-30">
                        <div class="pd-20 card-box height-100-p">
                            <div class="row">
                                <div class="col-md-12 col-sm-12">
                                    <div class="title">
                                        <h4 class="text-blue">Billing History</h4>
                                    </div>
                                    <div class="form-group mt-2">
                                        <a href="#">click to view your billing history</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade customscroll" id="task-add" tabindex="-1" role="dialog">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title text-blue" id="exampleModalLongTitle">Add Method</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close" data-toggle="tooltip"
                        data-placement="bottom" title="" data-original-title="Close Modal">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body pd-10">
                    <div class="col-md-12">
                        <form>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label class="">Cardholder Name</label>
                                        <div class="">
                                            <input type="text" class="form-control" placeholder="Cardholder Name" />
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="">Cardholder Number</label>
                                        <div class="">
                                            <input type="text" class="form-control" placeholder="Cardholder Name" />
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label class="">Expiry</label>
                                        <div class="">
                                            <input type="text" class="form-control" placeholder="MM/YY" />
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label class="">CVV</label>
                                        <div class="">
                                            <input type="text" class="form-control" placeholder="***" />
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary">
                        Add
                    </button>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">
                        Close
                    </button>
                </div>
            </div>
        </div>
    </div>
    <script>
        jQuery(document).ready(function() {
            jQuery('#ajaxSubmit').click(function(e) {
                e.preventDefault();
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
                    }
                });
                jQuery.ajax({
                    url: "{{ url('/chempionleague') }}",
                    method: 'post',
                    data: {
                        name: jQuery('#name').val(),
                        club: jQuery('#club').val(),
                        country: jQuery('#country').val(),
                        score: jQuery('#score').val(),
                    },
                    success: function(result) {
                        if (result.errors) {
                            jQuery('.alert-danger').html('');
                            jQuery.each(result.errors, function(key, value) {
                                jQuery('.alert-danger').show();
                                jQuery('.alert-danger').append('<li>' + value +
                                    '</li>');
                            });
                        } else {
                            jQuery('.alert-danger').hide();
                            $('#open').hide();
                            $('#myModal').modal('hide');
                        }
                    }
                });
            });
        });
    </script>
@endsection
