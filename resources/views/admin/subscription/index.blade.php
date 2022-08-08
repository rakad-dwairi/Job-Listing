@extends('layouts.admin')
@section('content')
    @can('subscription_create')
        <div style="margin-left: 10px;margin-bottom: 10px;" class="row">

            <!-- Button trigger modal -->
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
                send subsecription
            </button>
        </div>
    @endcan
    <div class="card">
        <div class="card-header">
            {{ trans('cruds.subscriptions.title_subscriptions') }} {{ trans('global.list') }}
        </div>

        @if(Session::has("success"))

            <div class="alert alert-info alert-dismissible fade show" role="alert">
              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
              <strong>{{ Session::get("success") }}</strong>
            </div>



        @endif
        <div class="card-body">
            <div class="table-responsive">
                <table class=" table table-bordered table-striped table-hover datatable datatable-Category">
                    <thead>
                        <tr>
                            <th>
                                {{ trans('cruds.subscriptions.fields.id') }}
                            </th>
                            <th>
                                {{ trans('cruds.subscriptions.fields.count_send') }}
                            </th>
                            <th>
                                {{ trans('cruds.subscriptions.fields.title') }}
                            </th>
                            <th>
                                {{ trans('cruds.subscriptions.fields.body') }}
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($subscription as $item)
                            <tr>
                                <td>{{ $item->id }}</td>
                                <td>{{ $item->count_send }}</td>
                                <td>{{ $item->title }}</td>
                                <td>{{ $item->body }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>


        </div>
    </div>






    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                <form action="{{ route("admin.subscriptions.send") }}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label for="exampleFormControlInput1">title</label>
                            <input type="title" class="form-control" name="title" id="exampleFormControlInput1"
                                placeholder="title">
                        </div>

                        <div class="form-group">
                            <label for="exampleFormControlTextarea1">Message</label>
                            <textarea class="form-control" id="exampleFormControlTextarea1" name="body" rows="3"></textarea>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button  class="btn btn-primary">Save changes</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
@section('scripts')
    @parent
    <script>
        $(function() {
            let dtButtons = $.extend(true, [], $.fn.dataTable.defaults.buttons)


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
