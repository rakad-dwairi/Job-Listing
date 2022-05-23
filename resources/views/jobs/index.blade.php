@extends('layouts.main')

@section('banner', $banner)

@section('content')
<div class="col-lg-8 post-list">
    @foreach($jobs as $job)
        <div class="single-post d-flex flex-row">
            <div class="thumb">
                @if($job->company->logo)
                    <img src="{{ $job->company->logo->getUrl() }}" alt="">
                @endif
            </div>
            <div class="details">
                <div class="title d-flex flex-row justify-content-between">
                    <div class="titles">
                        <a href="{{ route('jobs.show', $job->id) }}"><h4>{{ $job->title }}</h4></a>
                        <h6>{{ $job->company->name }}</h6>					
                    </div>
                </div>
                <p>
                    {{ $job->short_description }}
                </p>
                <h5>Job Nature: {{ $job->job_nature }}</h5>
                <p class="address"><span class="lnr lnr-map"></span> {{ $job->address }}</p>
                <p class="address"><span class="lnr lnr-database"></span> {{ $job->salary }}</p>
                    <!-- Button Applied Job -->
                    <button type="button" class="btn btn-primary button-applied-jbs" data-id="{{ $job->id }}"
                        data-toggle="modal">
                        Apply
                    </button>

                        <!-- Modal Applied Job -->
                        <div class="modal fade" id="staticBackdrop-{{ $job->id }}" data-backdrop="static"
                            data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="staticBackdropLabel">Apply This Job</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <form action="{{ route('admin.appliedJobs.store') }}"  enctype="multipart/form-data"
                                            method="POST">
                                            @csrf
                                        <div class="input-group mb-3">
                                                <div class="custom-file">
                                                    <input type="file" class="custom-file-input" id="resume" name="resume">
                                                    <label class="custom-file-label" for="inputGroupFile02">Choose file</label>
                                                </div>
                                                <input type="hidden" name="job_id" value="{{ $job->id }}">
                                            </div>
                                            <p class="text-danger"> Note* the resume accept only pdf file  </p>
                                        </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                        <button class="btn btn-primary">Apply</button>
                                        </form>
    
                                    </div>
                                </div>
                            </div>
                        </div>
            </div>
        </div>
    @endforeach
    {{ $jobs->appends(request()->query())->links() }}
</div>	

@push('js')
<script src="https://code.jquery.com/jquery-3.6.0.slim.js"
        integrity="sha256-HwWONEZrpuoh951cQD1ov2HUK5zA5DwJ1DNUXaM6FsY=" crossorigin="anonymous"></script>
<script>
    $(".button-applied-jbs").on('click', function() {
        var id = $(this).data('id')
        $('#staticBackdrop-' + id).modal('show')
    })
</script>
@endpush
@endsection