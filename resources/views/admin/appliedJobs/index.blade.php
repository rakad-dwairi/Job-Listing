@extends('layouts.admin')
@section('content')
    @can('category_create')
        <div style="margin-bottom: 10px;" class="row">

        </div>
    @endcan
    <div class="card">
        <div class="card-header">
            {{ trans('cruds.allied_jobs.title_singular') }} {{ trans('global.list') }}
        </div>

        <div class="card-body">
            <div class="table-responsive">
                <table class=" table table-bordered table-striped table-hover datatable datatable-Category">
                    <thead>
                        <tr>
                            <th width="10">

                            </th>

                            <th>
                                {{ trans('cruds.allied_jobs.fields.resume') }}
                            </th>
                            <th>
                                {{ trans('cruds.allied_jobs.fields.user_id') }}
                            </th>
                            <th>
                                {{ trans('cruds.allied_jobs.fields.job_id') }}
                            </th>
                            <th>
                                {{ trans('cruds.allied_jobs.fields.status') }}
                            </th>

                            <th>
                                &nbsp;
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($appliedJob as $item)
                            {{-- <td> {{ $item->id }} </td> --}}
                            <tr>
                                <td>

                                </td>
                                @can('applied_job_delete')
                                    <td>
                                        <form action="{{ route('admin.appliedJob.downloadResume') }}" method="POST">
                                            <input type="hidden" name="email" value="{{ $item->users->email }}">
                                            <input type="hidden" name="file_name" value="{{ $item->resume }}">
                                            <input type="hidden" name="id" value="{{ $item->id }}">
                                            @csrf
                                            <button class="btn btn-primary"> <i class="fa fa-download" aria-hidden="true"></i>
                                            </button>
                                        </form>
                                    </td>
                                @else
                                    <td> <a class="btn btn-warning" href="{{ asset('storage/' . $item->users->email . '/' . $item->resume) }}" download> <i
                                                class="fa fa-download" aria-hidden="true"></i> </a> </td>
                                @endcan

                                <td> {{ $item->users->email }} </td>
                                <td> {{ $item->jobs->title }} </td>
                                <td>
                                    <h4 class="badge badge-{{ $item->status > 0 ? 'success' : 'danger' }}">
                                        {{ $item->status > 0 ? 'Seen' : 'Not Seen' }} </h4>
                                </td>

                                <td>




                                    @can('applied_job_delete')
                                        <form action="{{ route('admin.appliedJobs.destroy', $item->id) }}" method="POST"
                                            onsubmit="return confirm('{{ trans('global.areYouSure') }}');"
                                            style="display: inline-block;">
                                            <input type="hidden" name="email" value="{{ $item->users->email }}">
                                            <input type="hidden" name="file_name" value="{{ $item->resume }}">
                                            <input type="hidden" name="_method" value="DELETE">
                                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                            <input type="submit" class="btn btn-xs btn-danger"
                                                value="{{ trans('global.delete') }}">
                                        </form>
                                    @endcan
                                </td>
                        @endforeach
                        </tr>
                    </tbody>
                </table>
            </div>


        </div>
    </div>
@endsection
@section('scripts')
    @parent
    <script>
        $(function() {
            let dtButtons = $.extend(true, [], $.fn.dataTable.defaults.buttons)
            @can('applied_job_delete')
                let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
                let deleteButton = {
                    text: deleteButtonTrans,
                    url: "{{ route('admin.categories.massDestroy') }}",
                    className: 'btn-danger',
                    action: function(e, dt, node, config) {
                        var ids = $.map(dt.rows({
                            selected: true
                        }).nodes(), function(entry) {
                            return $(entry).data('entry-id')
                        });

                        if (ids.length === 0) {
                            alert('{{ trans('global.datatables.zero_selected') }}')

                            return
                        }

                        if (confirm('{{ trans('global.areYouSure') }}')) {
                            $.ajax({
                                    headers: {
                                        'x-csrf-token': _token
                                    },
                                    method: 'POST',
                                    url: config.url,
                                    data: {
                                        ids: ids,
                                        _method: 'DELETE'
                                    }
                                })
                                .done(function() {
                                    location.reload()
                                })
                        }
                    }
                }
                dtButtons.push(deleteButton)
            @endcan

            $.extend(true, $.fn.dataTable.defaults, {
                order: [
                    [1, 'desc']
                ],
                pageLength: 100,
            });
            $('.datatable-Category:not(.ajaxTable)').DataTable({
                buttons: dtButtons
            })
            $('a[data-toggle="tab"]').on('shown.bs.tab', function(e) {
                $($.fn.dataTable.tables(true)).DataTable()
                    .columns.adjust();
            });
        })
    </script>
@endsection
