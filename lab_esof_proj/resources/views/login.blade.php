@extends('layouts.app')

@section('title')
    Login
@endsection

@section('content')
    <div class="container-form-global">
        <div class="container-form">
            <div class="form-container sign-up">
                <form action="">
                    <h1>Create Account</h1>
                    <input type="text" placeholder="Name">
                    <input type="email" placeholder="Email">
                    <input type="password" placeholder="Password">
                    <button type="submit">Sign Up</button>
                </form>
            </div>
            <div class="form-container sign-in">
                <form action="">
                    <h1>Sign In</h1>
                    <input type="email" placeholder="Email">
                    <input type="password" placeholder="Password">
                    <a href="#">Forgot your password?</a>
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
@endsection