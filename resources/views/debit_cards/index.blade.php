@extends('layouts.main')
@section('title', 'Employee')
@section('main')
    <div class="main-container">
        <div class="pd-ltr-20 xs-pd-20-10">
            <div class="min-height-200px">
                <div class="pd-10 card-box my-20">
                    <div class="col-md-12 pl-0 mt-2">
                        <div class="d-flex justify-content-between mb-20 col-md-12 pr-0">
                            <h3 class="text-blue">Applications</h3>
                            <a href="{{ route('debit_card.create') }}" role="button"
                                class="btn btn-primary btn-lg ml-0">ADD</a>
                        </div>
                    </div>
                    @if (session()->has('add'))
                        <div class="alert alert-success">
                            {{ session()->get('add') }}
                        </div>
                    @endif
                    @if (session()->has('update'))
                        <div class="alert alert-info">
                            {{ session()->get('update') }}
                        </div>
                    @endif
                    @if (session()->has('delete'))
                        <div class="alert alert-danger">
                            {{ session()->get('danger') }}
                        </div>
                    @endif

                    <div class="row">
                        <div class="col-md-12 mb-3">
                            <table class="table data-table" id="datatable">
                                <thead>
                                    <tr class="">
                                        <th>ID</th>
                                        <th>Application ID</th>
                                        <th>First Name</th>
                                        <th>Surname</th>
                                        <th>Mobile No.</th>
                                        <th>Email</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @if ($cards)
                                        @foreach ($cards as $card)
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td>{{ $card->arg_id }}</td>
                                                <td>{{ $card->arg_fname }}</td>
                                                <td>{{ $card->arg_surname }}</td>
                                                <td>{{ $card->arg_mobile }}</td>
                                                <td>{{ $card->arg_email }}</td>
                                                <td class="text-center">
                                                    @if ($card->arg_status == NULL)
                                                        <span class="badge badge-pill badge-primary"
                                                            data-color="text-white">Incomplete</span>
                                                    @elseif ($card->arg_status == 1)
                                                    <span class="badge badge-pill badge-primary"
                                                        data-color="text-white">Pending</span>
                                                    @elseif ($card->arg_status == 2)
                                                    <span class="badge badge-pill badge-warning"
                                                        data-color="text-white">In progress</span>
                                                    @elseif ($card->arg_status == 3)
                                                        <span class="badge badge-pill badge-success"
                                                            data-color="text-dark">Accepted</span>
                                                    @elseif ($card->arg_status == 4)
                                                        <span class="badge badge-pill badge-danger"
                                                            data-color="text-white">Rejected</span>
                                                    @endif
                                                </td>
                                                <td class="text-center">
                                                    <div class="table-actions text-center">
                                                        <a href="{{ route('debit_card.show', $card->id) }}"
                                                            data-color="#265ed7"><i class="icon-copy dw dw-edit2"></i></a>
                                                        <a href="#" data-color="#e95959"><i
                                                                class="icon-copy dw dw-delete-3"></i></a>
                                                    </div>
                                                </td>
                                            </tr>
                                        @endforeach
                                    @endif
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="{{ asset('jquery/jquery-3.6.4.js') }}"></script>
@endsection
