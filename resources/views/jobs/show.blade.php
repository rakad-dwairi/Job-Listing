@extends('layouts.UserMain')

@section('banner', 'Job: '.$job->title)

@section('content')


<div class="">
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
    <div class="container-xxl py-5 wow fadeInUp" data-wow-delay="0.1s">
        <div class="container">
            <div class="row gy-5 gx-4">
                <div class="col-lg-8">
                    <div class="d-flex align-items-center mb-5">
                        @if ($job->company->logo)
                        <img class="flex-shrink-0 img-fluid border rounded" src="{{ $job->company->logo->getUrl() }}" alt="" style="width: 80px; height: 80px;">
                        @endif
                        <div class="text-start ps-4">
                            <h3 class="mb-3">{{ $job->company->name }} </h3>
                            <span class="text-truncate me-3"><i class="fa fa-map-marker text-primary me-2"></i>{{ $job->address }}</span>
                            <span class="text-truncate me-3"><i class="far fa-clock text-primary me-2"></i>{{$job->job_nature}}</span>
                            <span class="text-truncate me-0"><i class="far fa-money-bill-alt text-primary me-2"></i>{{ $job->salary }}</span>
                        </div>
                    </div>

                    <div class="mb-5">
                        <h4 class="mb-3">Job description</h4>
                        <p>{{ $job->full_description }}</p>
                        <h4 class="mb-3">Responsibility</h4>
                        <ul class="list-unstyled">
                            <li><i class="fa fa-angle-right text-primary me-2"></i>{{ $job->requirements }}</li>
                        </ul>
                    </div>
    
                    <div class="">
                        <h4 class="mb-4">Apply For The Job</h4>
                        <div
                        class="col-sm-12 col-md-4 d-flex flex-column align-items-start align-items-md-end justify-content-center">
                        @auth
                        @if(auth()->user()->roles[0]->id != 1)
                        <div class="d-flex mb-3">
                            <button style="padding: 0.5rem 6rem !important;" type="button" class="btn btn-primary btn-lg button-applied-jbs" data-id="{{ $job->id }}"
                                data-toggle="modal">
                                Apply
                            </button>
                        </div>
                        @endif

                        @endauth
                    </div>
                    </div>
                </div>
    
                <div class="col-lg-4">
                    <div class="bg-light rounded p-5 mb-4 wow slideInUp" data-wow-delay="0.1s">
                        <h4 class="mb-4">Job Summery</h4>
                        <p><i class="fa fa-angle-right text-primary me-2"></i>Published On: {{ $job->created_at }}</p>
                        <p><i class="fa fa-angle-right text-primary me-2"></i>Vacancy: 123 Position</p>
                        <p><i class="fa fa-angle-right text-primary me-2"></i>Job Nature: {{$job->job_nature}}</p>
                        <p><i class="fa fa-angle-right text-primary me-2"></i>Salary: {{ $job->salary }} <span style="font-size: 13px" class="text-muted">JOD</span> </p>
                        <p><i class="fa fa-angle-right text-primary me-2"></i>Location: {{ $job->address }}</p>
                        <p class="m-0"><i class="fa fa-angle-right text-primary me-2"></i>Date Line: {{ $job->expired_date }}</p>
                    </div>
                    <div class="bg-light rounded p-5 wow slideInUp" data-wow-delay="0.1s">
                        <h4 class="mb-4">Company Detail</h4>
                        <p class="m-0">Ipsum dolor ipsum accusam stet et et diam dolores, sed rebum sadipscing elitr vero dolores. Lorem dolore elitr justo et no gubergren sadipscing, ipsum et takimata aliquyam et rebum est ipsum lorem diam. Et lorem magna eirmod est et et sanctus et, kasd clita labore.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>



<!-- Modal Applied Job -->
<div class="modal fade" id="staticBackdrop-{{ $job->id }}" data-backdrop="static" data-keyboard="false" tabindex="-1"
    aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="staticBackdropLabel">Apply This Job</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{ route('admin.appliedJobs.store') }}" enctype="multipart/form-data" method="POST">
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


@push('js')
<script src="https://code.jquery.com/jquery-3.6.0.slim.js"
    integrity="sha256-HwWONEZrpuoh951cQD1ov2HUK5zA5DwJ1DNUXaM6FsY=" crossorigin="anonymous"></script>
<script>
    $(".button-applied-jbs").on('click', function () {
        var id = $(this).data('id')
        $('#staticBackdrop-' + id).modal('show')
    })


    if ($('#resume').get(1).files.length > 0) {
        // console.log("No files selected.");
        alert("selected")
    }
</script>
@endpush
@endsection