<header id="header" id="home">
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
</header>