<nav class="navbar navbar-expand-lg bg-white navbar-light shadow sticky-top p-0">
  <a href="{{ URL::to('User') }}" class="navbar-brand d-flex align-items-center text-center py-0 px-4 px-lg-5">
      <h1 class="m-0 text-primary">ITrainee</h1>
  </a>
  <button type="button" class="navbar-toggler me-4" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
      <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarCollapse">
      <div class="navbar-nav ms-auto p-4 p-lg-0">
          <a href="{{ URL::to('User') }}" class="nav-item nav-link active">Home</a>
          <div class="nav-item dropdown">
              <a href="#" class="nav-link">Positions</a>
          </div>
          <a href="{{ URL::to('about') }}" class="nav-item nav-link">About</a>
          <a href="{{ URL::to('Contact-Us') }}" class="nav-item nav-link">Contact</a>
      </div>
      <a href="{{ URL::to('Dashboard') }}" class="btn btn-primary rounded-0 py-4 px-lg-5 d-none d-lg-block">Dashboard<i class="fa fa-arrow-right ms-3"></i></a>
  </div>
</nav>
</header>

