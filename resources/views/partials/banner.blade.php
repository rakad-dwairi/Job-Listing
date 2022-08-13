@hasSection ('banner')
   {{-- <section class="banner-area relative" id="home">
        <div class="overlay overlay-bg"></div>
        <div class="container">
            <div class="row d-flex align-items-center justify-content-center">
                <div class="about-content col-lg-12">
                    <h1 class="text-white">
                        @yield('banner')
                    </h1>
                    <p class="text-white link-nav"><a href="{{ route('home') }}">Home </a>  <span class="lnr lnr-arrow-right"></span>  <a href="{{ url()->full() }}"> @yield('banner')</a></p>
                </div>
            </div>
        </div>
    </section>--}}



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
@endif 