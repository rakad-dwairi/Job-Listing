@extends('layouts.Admin_app')
@section('page.title', 'Innovate Jo')
@section('content')
<div class="login-form-container">
    <div>
        <figure class="avatar image is-96x96">
            <img class="is-rounded" src="{{ asset('material') }}/img/avatar.svg">
        </figure>
        <p class="mb-12 is-size-3 has-text-black has-text-weight-bold has-text-centered">Find the job you are looking
            for</p>
        <form method="POST" action="{{ route('register') }}" enctype="multipart/form-data">
            @csrf

            <div class="mt-8 field">
                <div class="control has-icons-left has-icons-right">
                    <input name="name" type="text"
                        class="border-white input form-element line-input has-text-centered is-white has-text-weight-semibold"
                        placeholder="{{ trans('global.name') }}" value="{{ old('name', null) }}" required autofocus>
                </div>
                @if ($errors->has('name'))
                <div class="invalid-feedback">
                    {{ $errors->first('name') }}
                </div>
                @endif
            </div>



            <div class="mt-8 field">
                <div class="control has-icons-left has-icons-right">
                    <input id="email" type="email"
                        class="border-white input form-element line-input has-text-centered is-white has-text-weight-semibold"
                        name="email" placeholder="Email" value="{{ old('email') }}" required autocomplete="email"
                        autofocus>
                </div>
                @error('email')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>




            <div class="mt-8 field">

                <div class="control has-icons-left has-icons-right">
                    <input id="password" type="password"
                        class="border-white input form-element line-input has-text-centered is-white has-text-weight-semibold"
                        name="password" placeholder="Password" required autocomplete="current-password">
                </div>
                @if ($errors->has('password'))
                <div class="invalid-feedback">
                    {{ $errors->first('password') }}
                </div>
                @endif
            </div>

            <div class="mb-8 field">
                <div class="control has-icons-left has-icons-right">
                    <input name="password_confirmation" type="password"
                        class="border-white input form-element line-input has-text-centered is-white has-text-weight-semibold"
                        required placeholder="password confirmation">
                </div>
                @if ($errors->has('password_confirmation'))
                <div class="invalid-feedback">
                    {{ $errors->first('password_confirmation') }}
                </div>
                @endif
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

    function addcl() {
        let parent = this.parentNode.parentNode;
        parent.classList.add("focus");
    }

    function remcl() {
        let parent = this.parentNode.parentNode;
        if (this.value == "") {
            parent.classList.remove("focus");
        }
    }


    inputs.forEach(input => {
        input.addEventListener("focus", addcl);
        input.addEventListener("blur", remcl);
    });
</script>
@endsection