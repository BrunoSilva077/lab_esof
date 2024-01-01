@extends('layouts.app')

@section('title')
    Login
@endsection

@section('content')
    <div class="container-form-global grid-container" id="container">
        <div class="grid-item item1"></div>
        <div class="grid-item item10">
            <div class="container-form">
                <div class="form-container sign-in">
                        <form method="POST" action="{{ route('login') }}">
                        <h1>Sign In</h1>
                        @csrf
                            <input type="email" name="email" value="{{ old('email') }}" placeholder="Email" required autocomplete="email" autofocus style="width:100%;">
                            <input type="password" name="password" placeholder="Password" required autocomplete="current-password" style="width:100%;">
                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                            @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                            @if (Route::has('password.request'))
                            <a href="{{ route('password.request') }}">Forgot your password?</a>
                            @endif
                            <button type="submit">Sign In</button>
                        </form>
                </div>
                <div class="toggle-container">
                    <div class="toggle">
                        <div class="toggle-panel toggle-rigth">
                            <h1>Hello, friend!</h1>
                            <p>Register with your personal details to use all of site features</p>
                            <a href="{{ route('register') }}"><button class="hidden" id="register">Sign Up</button></a>
                        </div>
                    </div>
                </div>
            </div>
         
        </div>
        <div class="grid-item item1"></div>
    </div>
    <!-- <script src="{{ asset('js/login.js') }}"></script> -->
@endsection