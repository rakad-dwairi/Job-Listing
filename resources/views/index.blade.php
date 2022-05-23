@extends('layouts.main')

@section('home')
    <section class="banner-area relative" id="home">
        <div class="overlay overlay-bg"></div>
        <div class="container">
            <div class="row fullscreen d-flex align-items-center justify-content-center">
                <div class="banner-content col-lg-12">
                    <h1 class="text-white">
                        <span>1500+</span> Jobs posted last week
                    </h1>
                    <form action="{{ route('search') }}" class="serach-form-area">
                        <div class="row justify-content-center form-wrap">
                            <div class="col-lg-4 form-cols">
                                <input type="text" class="form-control" name="search"
                                    placeholder="What are you looking for?">
                            </div>
                            <div class="col-lg-3 form-cols">
                                <div class="default-select" id="default-selects">
                                    <select name="location">
                                        <option value="0">All Areas</option>
                                        @foreach ($searchLocations as $id => $searchLocations)
                                            <option value="{{ $id }}">{{ $searchLocations }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-3 form-cols">
                                <div class="default-select" id="default-selects2">
                                    <select name="category">
                                        <option value="0">All Categories</option>
                                        @foreach ($searchCategories as $id => $searchCategories)
                                            <option value="{{ $id }}">{{ $searchCategories }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-2 form-cols">
                                <button type="submit" class="btn btn-info">
                                    <span class="lnr lnr-magnifier"></span> Search
                                </button>
                            </div>
                        </div>
                    </form>
                    <p class="text-white"> <span>Search by categories:</span>
                        @foreach ($searchByCategory as $id => $searchByCategory)
                            <a href="{{ route('categories.show', $id) }}"
                                class="text-white">{{ $searchByCategory }}</a>
                            @if (!$loop->last)
                                ,
                            @endif
                        @endforeach
                    </p>
                </div>
            </div>
        </div>
    </section>
@endsection

@section('content')
    <div class="col-lg-8 post-list">
        @foreach ($jobs as $job)
            <div class="single-post d-flex flex-row">
                <div class="thumb">
                    @if ($job->company->logo)
                        <img src="{{ $job->company->logo->getUrl() }}" alt="">
                    @endif
                </div>
                <div class="details">
                    <div class="title d-flex flex-row justify-content-between">
                        <div class="titles">
                            <a href="{{ route('jobs.show', $job->id) }}">
                                <h4>{{ $job->title }}</h4>
                            </a>
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

        <a class="text-uppercase loadmore-btn mx-auto d-block" href="{{ route('jobs.index') }}">Load More Job Posts</a>
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
