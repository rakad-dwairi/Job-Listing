@extends('layouts.main')

@section('home')
<section class="banner-area relative" id="home">
    <div class=""></div>
    <div class="container-xxl bg-white p-0">
    <div class="container-fluid p-0">
        <div class="owl-carousel header-carousel position-relative">
            <div class="owl-carousel-item position-relative">
                <img class="img-fluid"
                    src="https://www.soldevelo.com/blog/wp-content/uploads/What-makes-a-great-programmer-banner-1536x1024-1.jpeg"
                    alt="">
                <div class="position-absolute top-0 start-0 w-100 h-100 d-flex align-items-center"
                    style="background: rgba(43, 57, 64, .5);">
                    <div class="container">
                        <div class="row justify-content-start">
                            <div class="col-10 col-lg-8">
                                <h1 class="display-3 text-white animated slideInDown mb-4">Find The Perfect Training
                                    That You Deserved</h1>
                                <p class="fs-5 fw-medium text-white mb-4 pb-2">this platform is a great help for IT
                                    students to find the best places for practical training</p>
                                <a href="" class="btn btn-primary py-md-3 px-md-5 me-3 animated slideInLeft">See
                                    More</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="container-fluid bg-primary mb-5 wow fadeIn" data-wow-delay="0.1s" style="padding: 35px;">
        <div class="container">
            <form action="{{ route('search') }}">
                    <div class="row g-2">
                        <div class="col-md-10">
                            <div class="row g-2">
                                <div class="col-md-4">
                                    <input type="text" class="form-control border-0" name="search"
                                        placeholder="What are you looking for?">
                                </div>
                                <div class="col-md-4">
                                    <select name="location" id="default-selects" class="form-select border-0">
                                        <option value="0">All Areas</option>
                                        @foreach ($searchLocations as $id => $searchLocations)
                                        <option value="{{ $id }}">{{ $searchLocations }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-md-4">
                                    <select name="category" id="default-selects2" class="form-select border-0">
                                        
                                        @foreach ($searchCategories as $id => $searchCategories)
                                        <option value="{{ $id }}">{{ $searchCategories }}</option>
                                        @endforeach
                                    </select>
                                </div>                        
                            </div>
                        </div>
                        <div class="col-md-2">
                            <button type="submit" class="btn btn-dark border-0 w-100"> Search
                            </button>
                        </div>
                    </div>
            </form>
        </div>
    </div>


  
     <!-- Category Start -->
  {{--    <div class="container-xxl py-5">
        <div class="container">
            <h1 class="text-center mb-5 wow fadeInUp" data-wow-delay="0.1s">Explore By Category</h1>
            <div class="row g-4">
                @foreach($searchCategories as $category)     
                <div class="col-lg-3 col-sm-6 wow fadeInUp" data-wow-delay="0.1s">
                    <a class="cat-item rounded p-4" href="{{ route('categories.show', $category->id) }}">
                        <i class="fa-3x fa fa-envelope text-primary mb-4"></i>
                        <h6 class="mb-3">{{ $category->name }}</h6>
                        <p class="mb-0">{{ $category->jobs_count }}</p>
                    </a>
                </div>
                @endforeach

                <div class="col-lg-3 col-sm-6 wow fadeInUp" data-wow-delay="0.1s">
                    <a class="cat-item rounded p-4" href="">
                        <i class="fa-3x fa fa-envelope text-primary mb-4"></i>
                        <h6 class="mb-3">{{ $searchCategories }}</h6>
                        <p class="mb-0">12 Vacancy</p>
                    </a>
                </div>
                <div class="col-lg-3 col-sm-6 wow fadeInUp" data-wow-delay="0.3s">
                    <a class="cat-item rounded p-4" href="">
                        <i class="fa-3x fa fa-headphones text-primary mb-4"></i>
                        <h6 class="mb-3">{{ $searchCategories }}</h6>
                        <p class="mb-0">123 Vacancy</p>
                    </a>
                </div>
                <div class="col-lg-3 col-sm-6 wow fadeInUp" data-wow-delay="0.7s">
                    <a class="cat-item rounded p-4" href="">
                        <i class="fa fa-3x fa-tasks text-primary mb-4"></i>
                        <h6 class="mb-3">IT project managers</h6>
                        <p class="mb-0">123 Vacancy</p>
                    </a>
                </div>
                <div class="col-lg-3 col-sm-6 wow fadeInUp" data-wow-delay="0.3s">
                    <a class="cat-item rounded p-4" href="">
                        <i class="fa-3x fa fa-handshake-o text-primary mb-4"></i>
                        <h6 class="mb-3">Database administrators</h6>
                        <p class="mb-0">123 Vacancy</p>
                    </a>
                </div> 
            </div>
        </div>
    </div>--}}
    <!-- Category End -->

    {{-- <!-- About Start -->
    <div class="container-xxl py-5">
        <div class="container">
            <div class="row g-5 align-items-center">
                <div class="col-lg-6 wow fadeIn" data-wow-delay="0.1s">
                    <div class="row g-0 about-bg rounded overflow-hidden">
                        <div class="col-6 text-start">
                            <img class="img-fluid w-100" src="img/about-1.jpg">
                        </div>
                        <div class="col-6 text-start">
                            <img class="img-fluid" src="img/about-2.jpg" style="width: 85%; margin-top: 15%;">
                        </div>
                        <div class="col-6 text-end">
                            <img class="img-fluid" src="img/about-3.jpg" style="width: 85%;">
                        </div>
                        <div class="col-6 text-end">
                            <img class="img-fluid w-100" src="img/about-4.jpg">
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 wow fadeIn" data-wow-delay="0.5s">
                    <h1 class="mb-4">We Help To Get The Best Training And Find A Talent</h1>
                    <p><i class="fa fa-check text-primary me-3"></i>Take advantege of training period</p>
                    <p><i class="fa fa-check text-primary me-3"></i>Learn new skills and develop your previuos ones</p>
                    <p><i class="fa fa-check text-primary me-3"></i>increase your chances of employment</p>
                </div>
            </div>
        </div>
    </div>
    <!-- About End --> --}}


    </div>
</section>
@endsection

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
