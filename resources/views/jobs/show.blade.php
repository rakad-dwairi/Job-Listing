@extends('layouts.main')

@section('banner', 'Job: '.$job->title)

@section('content')


<div class="col-lg-8 post-list">
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
    <div class="single-post d-flex flex-row">
        <div class="thumb">
            @if($job->company && $job->company->logo)
                <img src="{{ $job->company->logo->getUrl() }}" alt="{{ $job->company->name }}">
            @endif
        </div>
        <div class="details">
            <div class="title d-flex flex-row justify-content-between">
                <div class="titles">
                    <a href="#"><h4>{{ $job->title }}</h4></a>
                    @if($job->company)
                        <h6>{{ $job->company->name }}</h6>		
                    @endif			
                </div>
            </div>
            <p>
                {{ $job->short_description }}
            </p>
            <h5>Job Nature: {{ $job->job_nature }}</h5>
            <p class="address"><span class="lnr lnr-map"></span> {{ $job->address }}</p>
            <p class="address"><span class="lnr lnr-database"></span> {{ $job->salary }}</p>
            @auth 
            @if(auth()->user()->roles[0]->id != 1) 
            
                                <!-- Button Applied Job -->
                                <button type="button" class="btn btn-primary button-applied-jbs" data-id="{{ $job->id }}"
                                    data-toggle="modal">
                                    Apply
                                </button>
            
            
                                @endif
            
            @endauth
        </div>
    </div>	
    <div class="single-post job-details">
        <h4 class="single-title">Whom we are looking for</h4>
        <p>
            {{ $job->full_description }}
        </p>
    </div>
    <div class="single-post job-experience">
        <h4 class="single-title">Experience Requirements</h4>
        <p>
            {{ $job->requirements }}
        </p>
    </div>													
</div>


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
                            <input type="hidden" name="job_id"  value="{{ $job->id }}">
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


    @push('js')
<script src="https://code.jquery.com/jquery-3.6.0.slim.js"
        integrity="sha256-HwWONEZrpuoh951cQD1ov2HUK5zA5DwJ1DNUXaM6FsY=" crossorigin="anonymous"></script>
<script>
    $(".button-applied-jbs").on('click', function() {
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