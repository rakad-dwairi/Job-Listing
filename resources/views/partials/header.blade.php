{{-- <header id="header" id="home">
    <div class="container">
        <div class="row align-items-center justify-content-between d-flex">
          <div id="logo">
            <a href="{{ route('home') }}"><img src="{{ asset('img/logo.png') }}" alt="" title="" /></a>
          </div>
          @auth 
          <div>
            <a class="btn btn-light text-dark" href="/admin">Home</a>
          </div>
          @else 
          
          <a class="btn btn-light text-dark" href="/login">Login</a>

          @endauth
        </div>
    </div>
</header> --}}

<nav class="navbar navbar-expand-lg bg-white navbar-light shadow sticky-top p-0">
  <a href="index.html" class="navbar-brand d-flex align-items-center text-center py-0 px-4 px-lg-5">
      <h1 class="m-0 text-primary">ITrainee</h1>
  </a>
  <button type="button" class="navbar-toggler me-4" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
      <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarCollapse">
      <div class="navbar-nav ms-auto p-4 p-lg-0">
          <a href="index.html" class="nav-item nav-link active">Home</a>
          <div class="nav-item dropdown">
              <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">Positions</a>
              <div class="dropdown-menu rounded-0 m-0">
                  <a href="job-list.html" class="dropdown-item">List</a>
                  <a href="job-detail.html" class="dropdown-item">Category</a>
              </div>
          </div>
          <a href="about.html" class="nav-item nav-link">About</a>
          <a href="contact.html" class="nav-item nav-link">Contact</a>
      </div>
      <a href="" class="btn btn-primary rounded-0 py-4 px-lg-5 d-none d-lg-block">Post A Position<i class="fa fa-arrow-right ms-3"></i></a>
  </div>
</nav>