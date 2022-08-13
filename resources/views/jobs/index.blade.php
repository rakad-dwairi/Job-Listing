@extends('layouts.main')


@section('banner', $banner)
@section('content')
<div class="col-lg-812 post-list">

    @if ($errors->any())
    @foreach ($errors->all() as $error)
    <div class="alert alert-danger" role="alert">

        <strong> {{$error}} </strong><br>
    </div>
    @endforeach
    @endif
    @if(Session::has('success'))
    <div class="alert alert-success" role="alert">
        <strong>{{ Session::get('success') }}</strong>
    </div>

    @elseif(Session::has('error'))

    <div class="alert alert-danger" role="alert">
        <strong>{{ Session::get('error') }}</strong>
    </div>
    @endif
    @foreach ($jobs as $job)

    
    <div class="tab-content">
        <div id="tab-1" class="tab-pane fade show p-0 active">
            <div class="job-item p-4 mb-4">
                <div class="row g-4">
                    <div class="col-sm-12 col-md-8 d-flex align-items-center">
                        @if ($job->company->logo)
                        <img src="{{ $job->company->logo->getUrl() }}" alt="" class="flex-shrink-0 img-fluid border rounded" style="width: 80px; height: 80px;">
                        @endif
                        <div class="text-start ps-4">
                            <h5 class="mb-3">{{ $job->company->name }}</h5>
                            <span class="text-truncate me-3"><i class="fa fa-map-marker text-primary me-2"></i>{{ $job->address }}</span>
                            <span class="text-truncate me-3"><i class="far fa-clock text-primary me-2"></i>{{$job->job_nature}}</span>
                            <span class="text-truncate me-0"><i class="far fa-money-bill-alt text-primary me-2"></i>{{ $job->salary }}</span>
                        </div>
                    </div>
                    <div class="col-sm-12 col-md-4 d-flex flex-column align-items-start align-items-md-end justify-content-center">
                        @auth
                         @if(auth()->user()->roles[0]->id != 1)
                        <div class="d-flex mb-3">
                            <a class="btn btn-light btn-square me-3" href=""><i class="far fa-heart text-primary"></i></a>
                                <button type="button" class="btn btn-primary button-applied-jbs" data-id="{{ $job->id }}"
                                    data-toggle="modal">
                                    Apply
                                </button>
                        </div>
                        @endif

                         @endauth
                        <small class="text-truncate"><i class="far fa-calendar-alt text-primary me-2"></i>Date Line: 01 Jan, 2045</small>
                    </div>
                </div>
            </div>
        </div>
    </div>




            <!-- Modal Applied Job -->
            <div class="modal fade" id="staticBackdrop-{{ $job->id }}" data-backdrop="static" data-keyboard="false"
                tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="staticBackdropLabel">Apply This Job</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <form action="{{ route('admin.appliedJobs.store') }}" enctype="multipart/form-data"
                                method="POST">
                                @csrf
                                <div class="input-group mb-3">
                                    <div class="custom-file">
                                        <input type="file" class="custom-file-input" id="resume" name="resume">
                                        <label class="custom-file-label" for="inputGroupFile02">Choose file</label>
                                    </div>
                                    <input type="hidden" name="job_id" value="{{ $job->id }}">
                                </div>
                                <p class="text-danger"> Note* the resume accept only pdf file </p>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button class="btn btn-primary">Apply</button>
                            </form>

                        </div>
                    </div>
                </div>
            </div>

    @endforeach

    <a class="btn btn-primary py-3 px-5 d-block loadlittle-btn mx-auto" href="{{ URL::to('User') }}">Browse More..</a>
</div>



@push('js')
<script src="https://code.jquery.com/jquery-3.6.0.slim.js"
    integrity="sha256-HwWONEZrpuoh951cQD1ov2HUK5zA5DwJ1DNUXaM6FsY=" crossorigin="anonymous"></script>
<script>
    $(".button-applied-jbs").on('click', function () {
        var id = $(this).data('id')
        $('#staticBackdrop-' + id).modal('show')
    })

</script>
@endpush
@endsection
