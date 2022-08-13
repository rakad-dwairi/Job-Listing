@if(count($errors) > 0)
    <alert
        alert-title="Credentials do not Match"
        alert-type="error"
        :alert-messages="{{ collect($errors->all()) }}">
    </alert>
@endif

@if(session()->has('error'))
    <alert title="Credentials do not Match" alert-type="error" alert-title="{{ session('error') }}"></alert>
@elseif(session()->has('success'))
    <alert title="Signed in Successfully" alert-type="success" alert-title="{{ session('success') }}"></alert>
@endif
