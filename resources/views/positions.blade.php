@extends('layouts.secondaryMain')

@section('content')

  <!-- About Start -->
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
                <h1 class="mb-4">We Help To Get The Best Job And Find A Talent</h1>
                <p class="mb-4">Tempor erat elitr rebum at clita. Diam dolor diam ipsum sit. Aliqu diam amet diam et eos. Clita erat ipsum et lorem et sit, sed stet lorem sit clita duo justo magna dolore erat amet</p>
                <p><i class="fa fa-check text-primary me-3"></i>Tempor erat elitr rebum at clita</p>
                <p><i class="fa fa-check text-primary me-3"></i>Aliqu diam amet diam et eos</p>
                <p><i class="fa fa-check text-primary me-3"></i>Clita duo justo magna dolore erat amet</p>
                <a class="btn btn-primary py-3 px-5 mt-3" href="">Read More</a>
            </div>
           
            @foreach($jobs as $job)
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
                            <button type="button" class="btn btn-primary button-applied-jbs" data-id="{{ $job->id }}"
                                data-toggle="modal">
                                Apply
                            </button>
                    </div>
                    @endif

                     @endauth
                    <small class="text-truncate"><i class="far fa-calendar-alt text-primary me-2"></i>{{  $job->expired_date ?? 'Open Date' }}</small>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>
<!-- About End -->

@endsection