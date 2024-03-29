@extends('layouts.admin')
@section('content')
    <div class="container rounded bg-white mt-5 mb-5">
        <div class="row">
            <div class="col-md-3 border-right">
                <div class="d-flex flex-column align-items-center text-center p-3 py-5"><img class="rounded-circle mt-5"
                        width="200px"
                        src="{{ auth()->user()->image != null ? "/Image/".auth()->user()->image : "https://st3.depositphotos.com/15648834/17930/v/600/depositphotos_179308454-stock-illustration-unknown-person-silhouette-glasses-profile.jpg" }}">

                    <span class="font-weight-bold change-photo"><i class="fa fa-pencil-square fa-2x"
                            aria-hidden="true"></i></span>
                    <span class="font-weight-bold">{{ auth()->user()->name }}</span>
                    <span class="text-black-50">{{ auth()->user()->email }}</span><span>
                    </span>
                </div>
            </div>


            <form action="{{ route('user.updateProfile', auth()->user()->id) }}" method="POST">
                @csrf
                <div class="col-md-9 border-right">
                    <div class="p-3 py-5">
                        <div class="d-flex justify-content-between align-items-center mb-3">
                            <h4 class="text-right">Profile Settings</h4>
                        </div>
                        <div class="row mt-2">
                            <div class="col-md-6"><label class="labels">Name</label><input name="name" type="text"
                                    class="form-control" placeholder="first name" value="{{ auth()->user()->name }}"></div>
                            <div class="col-md-6"><label class="labels">Email</label><input type="text" name="email"
                                    class="form-control" placeholder="enter Email" value="{{ auth()->user()->email }}">
                            </div>
                        </div>
                        <div class="row mt-3">

                            <div class="col-md-12"><label class="labels">Mobile Number</label><input name="phone"
                                    type="text" class="form-control" placeholder="like 07xxxxxxxx"
                                    value="{{ auth()->user()->phone }}">
                            </div>
                            <div class="col-md-12"><label class="labels">Address Line 1</label><input name="address1"
                                    type="text" class="form-control" placeholder="enter address line 1"
                                    value="{{ auth()->user()->address1 }}">
                            </div>
                            <div class="col-md-12"><label class="labels">Address Line 2</label><input name="address2"
                                    type="text" class="form-control" placeholder="enter address line 2"
                                    value="{{ auth()->user()->address2 }}">
                            </div>
                        </div>

                        <div class="mt-5 text-center"><button class="btn btn-primary profile-button" type="submit">Save
                                Profile</button></div>
                    </div>
            </form>
        </div>
    </div>
    </div>
    </div>
    </div>
    @include('admin.partials.updateImageModal')
@endsection
@section('scripts')
    @parent
@endsection
