@extends('layouts.app')

@section('title')
    Login
@endsection

@section('content')
    <div class="container-form-global grid-container" id="container">
        <div class="grid-item item1"></div>
        <div class="grid-item item10">
            <div class="container-form">
                <div class="form-container sign-up">
                    <form method="POST" action="{{ route('register') }}">
                    @csrf
                        <h1>Create Account</h1>
                        <input type="text" placeholder="Name" required autocomplete="name">
                        <input type="email" placeholder="Email" required autocomplete="email">
                        <input type="password" placeholder="Password" required>
                        <button type="submit">Sign Up</button>
                    </form>
                </div>
                <div class="form-container sign-in">
                        <h1>Sign In</h1>
                        <form method="POST" action="{{ route('login') }}">
                        @csrf
                            <input type="email" name="email" value="{{ old('email') }}" placeholder="Email" required autocomplete="email" autofocus>
                            <input type="password" name="password" placeholder="PassWord" required autocomplete="current-password">
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
                        <div class="toggle-panel toggle-left">
                            <h1>Welcome Back!</h1>
                            <p>Enter your personal details to use all of site features</p>
                            <button class="hidden" id="login">Sign In</button>
                        </div>
                        <div class="toggle-panel toggle-rigth">
                            <h1>Hello, friend!</h1>
                            <p>Register with your personal details to use all of site features</p>
                            <button class="hidden" id="register">Sign Up</button>
                        </div>
                    </div>
                </div>
            </div>
         
        </div>
        <div class="grid-item item1"></div>
    </div>
    <script src="{{ asset('js/login.js') }}"></script>
@endsection