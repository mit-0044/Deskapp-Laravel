<?php
/**
 * @var  Arcanedev\LogViewer\Entities\Log                                                                     $log
 * @var  Illuminate\Pagination\LengthAwarePaginator|array<string|int, Arcanedev\LogViewer\Entities\LogEntry>  $entries
 * @var  string|null                                                                                          $query
 */
?>

@extends('log-viewer::bootstrap-4._master')
@section('css')
    <style>
        .card {
            border-radius: 10px !important;
        }

        .card-header,
        .card-footer {
            background: white;
        }

        tr {
            background: white;
        }

        #query:focus #search-btn span {
            background: #000;
        }
    </style>
@endsection
@section('content')
    <div class="pd-ltr-20 xs-pd-20-10">
        <div class="min-height-200px">
            <div class="page-header mb-4 d-flex justify-content-between">
                <div>
                    <a role="button" href="{{ url('log-viewer') }}" class="btn btn-outline-primary mr-1 px-4">All Log</a>
                    <a role="button" href="{{ url('log-viewer/logs') }}" class="btn btn-outline-primary active px-3">Log
                        Detail</a>
                </div>
                <h3 class="text-primary">@lang('Log') - {{ date('d-m-Y', strtotime($log->date)) }}</h3>
                <a role="button" href="{{ route('dashboard') }}" class="btn btn-primary">Dashboard</a>
            </div>
            <div class="row">
                <div class="col-lg-2">
                    {{-- Log Menu --}}
                    <div class="card-box mb-4">
                        <div class="card-header"><i class="fa fa-fw fa-flag"></i> @lang('Levels')</div>
                        <div class="list-group list-group-flush log-menu">
                            @foreach ($log->menu() as $levelKey => $item)
                                @if ($item['count'] === 0)
                                    <a
                                        class="list-group-item list-group-item-action d-flex justify-content-between align-items-center">
                                        <span class="level-name">{!! $item['icon'] !!} {{ $item['name'] }}</span>
                                        <span class="badge empty">{{ $item['count'] }}</span>
                                    </a>
                                @else
                                    <a href="{{ $item['url'] }}"
                                        class="list-group-item list-group-item-action d-flex justify-content-between align-items-center level-{{ $levelKey }}{{ $level === $levelKey ? ' active' : '' }}">
                                        <span class="level-name">{!! $item['icon'] !!} {{ $item['name'] }}</span>
                                        <span class="badge badge-level-{{ $levelKey }}">{{ $item['count'] }}</span>
                                    </a>
                                @endif
                            @endforeach
                        </div>
                    </div>
                </div>
                <div class="col-lg-10">
                    {{-- Log Details --}}
                    <div class="card mb-4">
                        <div class="card-header">
                            <div class="group-btns pull-right">
                                <a href="{{ route('log-viewer::logs.download', [$log->date]) }}" class="btn btn-success">
                                    <i class="fa fa-download"></i>&nbsp; @lang('Download')
                                </a>
                                <a href="#delete-log-modal" class="btn btn-danger" data-toggle="modal">
                                    <i class="fa fa-trash-o"></i>&nbsp; @lang('Delete')
                                </a>
                            </div>
                        </div>
                        <div class="table-responsive">
                            <table class="table table-condensed mb-0">
                                <tbody>
                                    <tr>
                                        <td>@lang('File path') :</td>
                                        <td colspan="7">{{ $log->getPath() }}</td>
                                    </tr>
                                    <tr>
                                        <td>@lang('Log entries') :</td>
                                        <td>
                                            <span class="badge badge-primary">{{ $entries->total() }}</span>
                                        </td>
                                        <td>@lang('Size') :</td>
                                        <td>
                                            <span class="badge badge-primary">{{ $log->size() }}</span>
                                        </td>
                                        <td>@lang('Created at') :</td>
                                        <td>
                                            <span class="badge badge-primary">{{ $log->createdAt() }}</span>
                                        </td>
                                        <td>@lang('Updated at') :</td>
                                        <td>
                                            <span class="badge badge-primary">{{ $log->updatedAt() }}</span>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>

                    {{-- Log Entries --}}
                    <div class="card mb-4">
                        <div class="col-md-12 my-3">
                            <table class="table data-table" id="datatable">
                                <thead>
                                    <tr>
                                        <th class="col-md-1">No</th>
                                        <th class="col-md-1">ENV</th>
                                        <th class="col-md-1">Level</th>
                                        <th class="col-md-1">Time</th>
                                        <th class="col-md-8">Header</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse($entries as $key => $entry)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td><span class="badge badge-env">{{ $entry->env }}</span></td>
                                            <td><span
                                                    class="badge badge-level-{{ $entry->level }}">{!! $entry->level() !!}</span>
                                            </td>
                                            <td><span
                                                    class="badge badge-secondary">{{ $entry->datetime->format('H:i:s') }}</span>
                                            </td>
                                            <td class="col-md-8">{{ $entry->header }}</td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="5" class="text-center">
                                                <span class="badge badge-secondary">@lang('The list of logs is empty!')</span>
                                            </td>
                                        </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('modals')
    {{-- DELETE MODAL --}}
    <div id="delete-log-modal" class="modal fade" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <form id="delete-log-form" action="{{ route('log-viewer::logs.delete') }}" method="POST">
                <input type="hidden" name="_method" value="DELETE">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <input type="hidden" name="date" value="{{ $log->date }}">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title text-blue">@lang('Delete log file')</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <p class="font-16 weight-500">@lang('Are you sure you want to delete this log file: :date ?', ['date' => $log->date])</p>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-danger"
                            data-loading-text="@lang('Loading')&hellip;">@lang('Delete')</button>
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">@lang('Cancel')</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection

<script src="{{ asset('jquery/jquery-3.6.4.js') }}"></script>
<script>
    $(document).ready(function() {
        $('#datatable').DataTable();
    });
</script>
@section('scripts')
    <script>
        $(function() {
            var deleteLogModal = $('div#delete-log-modal'),
                deleteLogForm = $('form#delete-log-form'),
                submitBtn = deleteLogForm.find('button[type=submit]');

            deleteLogForm.on('submit', function(event) {
                event.preventDefault();
                submitBtn.button('loading');

                $.ajax({
                    url: $(this).attr('action'),
                    type: $(this).attr('method'),
                    dataType: 'json',
                    data: $(this).serialize(),
                    success: function(data) {
                        submitBtn.button('reset');
                        if (data.result === 'success') {
                            deleteLogModal.modal('hide');
                            location.replace("{{ route('log-viewer::logs.list') }}");
                        } else {
                            alert('OOPS ! This is a lack of coffee exception !')
                        }
                    },
                    error: function(xhr, textStatus, errorThrown) {
                        alert('AJAX ERROR ! Check the console !');
                        console.error(errorThrown);
                        submitBtn.button('reset');
                    }
                });

                return false;
            });

            @unless (empty(log_styler()->toHighlight()))
                @php
                    $htmlHighlight = version_compare(PHP_VERSION, '7.4.0') >= 0 ? join('|', log_styler()->toHighlight()) : join(log_styler()->toHighlight(), '|');
                @endphp

                $('.stack-content').each(function() {
                    var $this = $(this);
                    var html = $this.html().trim()
                        .replace(/({!! $htmlHighlight !!})/gm, '<strong>$1</strong>');

                    $this.html(html);
                });
            @endunless
        });
    </script>
@endsection
