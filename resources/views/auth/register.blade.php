@extends('layouts.landing.master')

@section('title')
Admin Register
@endsection

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-4 mt-4 text-center">
            <img class="mb-4" src="{{ asset('img/Main%20Logo.png') }}" alt="" width="72" height="57">
            <h3 class="mb-3">Register</h3>
            <hr class="hr-auth">
            <form method="POST" action="{{ route('register') }}" class="mb-5">
                @csrf
                <div class="form-floating mb-4">
                    <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" id="name" placeholder="Don Jhoe" value="{{ old('name') }}" required autocomplete="name" autofocus>
                    <label for="floatingInput">Nama Lengkap</label>

                    @error('name')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="form-floating mb-4">
                    <input type="email" class="form-control @error('email') is-invalid @enderror" name="email" id="email" placeholder="name@example.com" value="{{ old('email') }}" required autocomplete="email">
                    <label for="floatingInput">Email address</label>

                    @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="form-floating mb-4">
                    <input type="password" class="form-control @error('password') is-invalid @enderror" id="password" name="password" required autocomplete="new-password" placeholder="Password">
                    <label for="floatingPassword">Kata Sandi</label>

                    @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>


                <div class="form-floating mb-4">
                    <input type="password" class="form-control" id="password-confirm" name="password_confirmation" required autocomplete="new-password" placeholder="Konfirmasi Kata Sandi">
                    <label for="floatingPassword">Konfirmasi Kata Sandi</label>
                </div>            
                
                <button class="w-100 btn btn-lg btn-primary" type="submit">Daftar</button>
                
            </form>
        </div>
    </div>
</div>
@endsection
