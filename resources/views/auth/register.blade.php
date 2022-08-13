{{-- @extends('layouts.app')
@section('content')
    <div class="content">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <img src="/images/undraw_remotely_2j6y.svg" alt="Image" class="img-fluid">
                </div>
                <div class="col-md-6 contents">
                    <div class="row justify-content-center">
                        @if (session()->has('message'))
                            <p class="alert alert-info">
                                {{ session()->get('message') }}
                            </p>
                        @endif
                        <div class="col-md-8">
                            <div class="mb-4">
                                <h3>Register</h3>
                                <p class="mb-4">If You Are Looking For Job The Job-Listing System Is The Best Way</p>
                            </div>
                            <form method="POST" action="{{ route('register') }}">
                                @csrf
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">
                                            <i class="fa fa-user"></i>
                                        </span>
                                    </div>
                                    <input name="name" type="text"
                                        class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" required
                                        autofocus placeholder="{{ trans('global.register') }}"
                                        value="{{ old('name', null) }}">
                                    @if ($errors->has('name'))
                                        <div class="invalid-feedback">
                                            {{ $errors->first('name') }}
                                        </div>
                                    @endif
                                </div>
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">
                                            <i class="fa fa-user"></i>
                                        </span>
                                    </div>
                                    <input name="email" type="text"
                                        class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" required
                                        autofocus placeholder="{{ trans('global.login_email') }}"
                                        value="{{ old('email', null) }}">
                                    @if ($errors->has('email'))
                                        <div class="invalid-feedback">
                                            {{ $errors->first('email') }}
                                        </div>
                                    @endif
                                </div>
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="fa fa-lock"></i></span>
                                    </div>
                                    <input name="password" type="password"
                                        class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" required
                                        placeholder="{{ trans('global.login_password') }}">
                                    @if ($errors->has('password'))
                                        <div class="invalid-feedback">
                                            {{ $errors->first('password') }}
                                        </div>
                                    @endif
                                </div>
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="fa fa-lock"></i></span>
                                    </div>
                                    <input name="password_confirmation" type="password"
                                        class="form-control{{ $errors->has('password_confirmation') ? ' is-invalid' : '' }}" required
                                        placeholder="password confirmation">
                                    @if ($errors->has('password_confirmation'))
                                        <div class="invalid-feedback">
                                            {{ $errors->first('password_confirmation') }}
                                        </div>
                                    @endif
                                </div>
                                <div class="d-flex mb-5 align-items-center">
                                    <label class="control control--checkbox mb-0"><span class="caption">Remember me</span>
                                        <input type="checkbox" checked="checked" />
                                        <div class="control__indicator"></div>
                                    </label>
                                </div>

                                <button class="btn btn-block btn-primary"> Log In </button>

                            </form>
                        </div>
                    </div>

                </div>

            </div>
        </div>
    </div>
@endsection --}}


@extends('layouts.Admin_app')
@section('page.title', 'Innovate Jo')
@section('content')
  <div class="login-form-container">
          <div >
            <figure class="avatar image is-96x96">
              <img class="is-rounded" src="{{ asset('material') }}/img/avatar.svg">
            </figure>
            <p class="mb-12 is-size-3 has-text-black has-text-weight-bold has-text-centered">Find the job you are looking for</p>
            <form method="POST" action="{{ route('register') }}" enctype="multipart/form-data">
              @csrf

              <div class="mt-8 field">
                <div class="control has-icons-left has-icons-right">
                  <input name="name" type="text" class="border-white input form-element line-input has-text-centered is-white has-text-weight-semibold" placeholder="{{ trans('global.register') }}"
                  value="{{ old('name', null) }}" required autofocus>
                </div>
                @if ($errors->has('name'))
                <div class="invalid-feedback">
                    {{ $errors->first('name') }}
                </div>
            @endif
              </div>

              

              <div class="mt-8 field">
                <div class="control has-icons-left has-icons-right">
                  <input id="email" type="email" class="border-white input form-element line-input has-text-centered is-white has-text-weight-semibold" name="email" placeholder="Email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                </div>
                @error('email')
                <span class="invalid-feedback" role="alert">
                  <strong>{{ $message }}</strong>
                </span>
                @enderror
              </div>






              <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text">
                        <i class="fa fa-user"></i>
                    </span>
                </div>
                <input name="email" type="text"
                    class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" required
                    autofocus placeholder="{{ trans('global.login_email') }}"
                    value="{{ old('email', null) }}">
                @if ($errors->has('email'))
                    <div class="invalid-feedback">
                        {{ $errors->first('email') }}
                    </div>
                @endif
            </div>










              <div class="mb-8 field">
                <div class="control has-icons-left has-icons-right">
                  <input id="password" type="password" class="border-white input form-element line-input has-text-centered is-white has-text-weight-semibold" name="password" placeholder="Password" required autocomplete="current-password">
                </div>
                @error('password')
                <span class="invalid-feedback" role="alert">
                  <strong>{{ $message }}</strong>
                </span>
                @enderror
              </div>
              <div class="mt-6 field has-text-centered mb2-5-minus">
                <button class="px-6 button is-primary is-rounded is-fullwidth has-text-weight-bold is-medium">
                  Login
                </button>
              </div>
            </form>
          </div>


  </div>
@endsection

@section('scripts')
  <script>
    const inputs = document.querySelectorAll(".input");
    function addcl(){
      let parent = this.parentNode.parentNode;
      parent.classList.add("focus");
    }

    function remcl(){
      let parent = this.parentNode.parentNode;
      if(this.value == ""){
        parent.classList.remove("focus");
      }
    }


    inputs.forEach(input => {
      input.addEventListener("focus", addcl);
      input.addEventListener("blur", remcl);
    });
  </script>
@endsection