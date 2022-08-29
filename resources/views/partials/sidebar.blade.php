<div class="container-xxl py-5">
    <div class="container">
        <h1 class="text-center mb-5 wow fadeInUp" data-wow-delay="0.1s">Explore By Category</h1>
        <div class="row g-4">
            @foreach($sidebarCategories as $category)

            @if($category->name == 'Cyber Security')
            <div class="col-lg-3 col-sm-6 wow fadeInUp" data-wow-delay="0.1s">
                <a class="cat-item rounded p-4" href="{{ route('categories.show', $category->id) }}">
                    <i class="fa-3x fa fa-envelope text-primary mb-4"></i>
                    <h6 class="mb-3">Cyber Security</h6>
                    <p class="mb-0">{{ $category->jobs_count }} Vacancy</p>
                </a>
            </div>
            @elseif($category->name == 'Web Developer')
            <div class="col-lg-3 col-sm-6 wow fadeInUp" data-wow-delay="0.1s">
                <a class="cat-item rounded p-4" href="{{ route('categories.show', $category->id) }}">
                    <i class="fa-3x fa fa fa-headphones text-primary mb-4"></i>
                    <h6 class="mb-3">Web Developer</h6>
                    <p class="mb-0">{{ $category->jobs_count }} Vacancy</p>
                </a>
            </div>
            @elseif($category->name == 'IT Project Managers')
            <div class="col-lg-3 col-sm-6 wow fadeInUp" data-wow-delay="0.1s">
                <a class="cat-item rounded p-4" href="{{ route('categories.show', $category->id) }}">
                    <i class="fa-3x fa fa-tasks text-primary mb-4"></i>
                    <h6 class="mb-3">IT Project Managers</h6>
                    <p class="mb-0">{{ $category->jobs_count }} Vacancy</p>
                </a>
            </div>
            @elseif($category->name == 'DataBase Adminstrators')
            <div class="col-lg-3 col-sm-6 wow fadeInUp" data-wow-delay="0.1s">
                <a class="cat-item rounded p-4" href="{{ route('categories.show', $category->id) }}">
                    <i class="fa-3x fa fa-handshake-o text-primary mb-4"></i>
                    <h6 class="mb-3">DataBase Adminstrators</h6>
                    <p class="mb-0">{{ $category->jobs_count }} Vacancy</p>
                </a>
            </div>
            @endif
            @endforeach
        </div>
    </div>
</div>


<!-- About Start -->
<div class="container-xxl py-5">
    <div class="container">
        <div class="row g-5 align-items-center">
            <div class="col-lg-6 wow fadeIn" data-wow-delay="0.1s">
                <div class="row g-0 about-bg rounded overflow-hidden">
                    <div class="col-6 text-start">
                        <img class="img-fluid w-100" src="/img/about-1.jpg">
                    </div>
                    <div class="col-6 text-start">
                        <img class="img-fluid" src="/img/about-2.jpg" style="width: 85%; margin-top: 15%;">
                    </div>
                    <div class="col-6 text-end">
                        <img class="img-fluid" src="/img/about-3.jpg" style="width: 85%;">
                    </div>
                    <div class="col-6 text-end">
                        <img class="img-fluid w-100" src="/img/about-4.jpg">
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
<!-- About End -->
