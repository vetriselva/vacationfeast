@extends('layouts.auth')

@section('content')
{{-- <div class="bg-light align-items-center d-flex justify-content-center" style="min-height: 100vh !important">
    <div class="col-md-8 col-sm-10 col-10 col-lg-4">
        <form method="POST" action="{{ route('login') }}"> @csrf
            <div class="p-md-5 p-4 card">
                <div class="text-center">
                    <h4>Sign in</h3>
                    <p>Use your Vacation Feast Account</p>
                    @if ($message = Session::get('error'))
                        <small class="text-danger">{{ $message }}</small>
                    @endif
                </div>
                <div class="my-3">
                    <small>Email</small>
                    <input id="email" type="email"   class="form-control  rounded-0 @error('email') is-invalid @enderror"" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                </md-input-container>
                <div class="my-3">
                    <small>Password</small>
                    <input id="password"   type="password" class="form-control  rounded-0 @error('password') is-invalid @enderror"" name="password" value="{{ old('email') }}" required autocomplete="email" autofocus>
                </md-input-container>
                <div class="btxn text-end mt-3 p-0">
                    <button type="submit" class="md-raised btn btn-primary">Sign in</button>
                </div>
            </md-card>
        </form> 
    </div>  
</div> --}}
<div class="card">
    <div class="row align-items-center text-center">
        <div class="col-md-12">
            <form class="card-body" method="POST" action="{{ route('login') }}"> @csrf
                @if ($message = Session::get('error'))
                    <small class="text-danger">{{ $message }}</small>
                @endif
                <img  src="{{asset("public/images/logo/text-logo.png")}}" width="200px" class="img-fluid mb-4">
                <h3 class="text-primary mb-3"><b>Sign In</b></h3>
                <div class="input-group mb-3">
                    <span class="input-group-text"><i data-feather="mail"></i></span>
                    <input id="email" type="email"   class="form-control  @error('email') is-invalid @enderror"" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                </div>
                <div class="input-group mb-4">
                    <span class="input-group-text"><i data-feather="lock"></i></span>
                    <input id="password"   type="password" class="form-control @error('password') is-invalid @enderror"" name="password" value="{{ old('email') }}" required autocomplete="email" autofocus>

                </div>
                <div class="form-group text-left mt-2">
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="" id="flexCheckChecked" checked>
                        <label class="form-check-label" for="flexCheckChecked">
                            Save credentials
                        </label>
                    </div>
                </div>
                <button class="btn btn-block btn-primary mb-4 w-100">Sign In</button>
            </form>
        </div>
    </div>
</div>
@endsection
