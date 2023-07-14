@extends('layouts.landing.master')

@section('title')
Admin Login
@endsection

@section('content')
<div class="container vh-100">
    <div class="row justify-content-center">
        <div class="col-xs-12 col-sm-12 col-md-8 col-lg-4 col-xl-4 col-xxl-4 mt-4 text-center">
            <img class="mb-4" src="{{ asset('img/Main%20Logo.png') }}" alt="" width="72" height="57">
            <h3 class="mb-3">Login</h3>
            <hr class="hr-auth">
            <form method="POST" action="{{ route('login') }}">
                @csrf
                <div class="form-floating mb-4">
                    <input type="email" class="form-control @error('email') is-invalid @enderror" name="email" id="email" placeholder="name@example.com" value="{{ old('email') }}" required autocomplete="email" autofocus>
                    <label for="floatingInput">Email address</label>

                    @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="form-floating mb-4">
                    <input type="password" class="form-control @error('password') is-invalid @enderror" id="password" name="password" required autocomplete="current-password" placeholder="Password">
                    <label for="floatingPassword">Password</label>

                    @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                
                <div class="checkbox mb-3">
                    <label>
                        <input type="checkbox" class="form-check-input" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}> Remember me
                    </label>
                </div>                    
                
                <button class="w-100 btn btn-lg btn-primary" type="submit">Masuk</button>

                @if (Route::has('password.request'))
                    <a class="btn btn-link" href="{{ route('password.request') }}">
                        {{ __('Forgot Your Password?') }}
                    </a>
                @endif
                
            </form>
        </div>
    </div>
</div>
@endsection
