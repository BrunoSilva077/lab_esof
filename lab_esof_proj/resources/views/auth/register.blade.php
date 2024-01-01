@extends('layouts.app')

@section('title')
    Register
@endsection

@section('content')
    <div class="container-form-global grid-container active" id="container">
        <div class="grid-item item1"></div>
        <div class="grid-item item10">
            <div class="container-form">
                <div class="form-container sign-up">
                    <form method="POST" action="{{ route('register') }}">
                    @csrf
                        <h1>Create Account</h1>
                        <input type="text" name="name" value="{{ old('name') }}" required autocomplete="name" placeholder="Name" autofocus style="width:100%;">
                        <input type="email" name="email" value="{{ old('email') }}" required autocomplete="email" placeholder="Email" style="width:100%;">
                        <input type="password" name="password" required autocomplete="new-password" placeholder="New Password" style="width:100%;">
                        <input type="password" class="form-control" name="password_confirmation" required autocomplete="new-password" placeholder="Confirm Password" style="width:100%;">
                        @error('name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
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
                        <button type="submit">Sign Up</button>
                    </form>
                </div>
                <div class="toggle-container">
                    <div class="toggle">
                        <div class="toggle-panel toggle-left">
                            <h1>Welcome Back!</h1>
                            <p>Enter your personal details to use all of site features</p>
                            <a href="{{ route('login') }}"><button class="hidden" id="login">Sign In</button></a>
                        </div>
                    </div>
                </div>
            </div>
         
        </div>
        <div class="grid-item item1"></div>
    </div>
    <!-- <script src="{{ asset('js/login.js') }}"></script> -->
@endsection