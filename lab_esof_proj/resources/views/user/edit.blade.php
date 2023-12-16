@extends('layouts.app')

@section('title')
    Edit Profile
@endsection

@section('content')
<div class="editprofilemenu">
    <div class="grid-container">
        <div class="grid-item item3 menuedit">
            <div class="sidemenuedit">
                <div class="profileinputline active">
                    <a href="{{ route('editprofile', ['user' => auth()->user()]) }}"><h3>Account<i class="fa-solid fa-box" style="opacity:1.0;"></i></h3></a>
                </div>
                <div class="profileinputline">
                    <a href="{{ route('editprofile', ['user' => auth()->user()]) }}"><h3>Favorites<i class="fa-solid fa-heart"></i></h3></a>
                </div>
                <div class="profileinputline">
                    <a href="{{ route('editprofile', ['user' => auth()->user()]) }}"><h3>History<i class="fa-solid fa-clock-rotate-left"></i></h3></a>
                </div>
            </div>
        </div>
        <div class="grid-item item9 menuedit">
            <div class="mainmenuedit">
            @if($message = Session::get('success'))
                <div class="alert alert-success">
                    <p>{{ $message }}</p>
                </div>
            @endif 
            @if ($errors->any())
                <div class="alert alert-danger">
                    <strong>Whoops!</strong> There were some problems with your input.<br><br>
                        <ul>
                            @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                            @endforeach 
                        </ul>
                </div>
            @endif
                <form action=" {{ route('updateprofile', ['user' => $user]) }}" method="POST">
                    @csrf
                    <div class="profileinputline">
                        <h2>Personal</h2>
                    </div>
                    <div class="profileinputline">
                        <h3>Name</h3>
                        <input type="text" name="name" placeholder="{{ Auth::user()->name }}" disabled>              
                    </div>
                    <div class="profileinputline">
                    <h3>Email</h3>
                    <input type="email" name="email" value="{{ Auth::user()->email }}">
                    </div>
                    <div class="profileinputline">
                    <h3>Birthday</h3>
                    <input type="date" name="birthday" value="{{ Auth::user()->birthday }}">
                    </div>
                    <div class="profileinputline radio">
                        <h3>Gender</h3>
                        <input type="radio" name="radio" class="sizeradio" value="true"{{ Auth::user()->gender === true ? 'checked' : '' }}>Male
                        <div class="space"></div>
                        <input type="radio" name="radio" class="sizeradio" value="false"{{ Auth::user()->gender === false ? 'checked' : '' }}>Female
                    </div>
                    <div class="profileinputline">
                        <button class="btnsave">Save</button>
                    </div>
                    <hr class="horizontal-menuedit">
                    <div class="profileinputline">
                        <h2>Change Password</h2>
                    </div>
                    <div class="profileinputline">
                        <h3>Current Password</h3>
                        <input type="password" placeholder="" name="current_password">              
                    </div>
                    <div class="profileinputline">
                        <h3>New Password</h3>
                        <input type="password" placeholder="" name="new_password">
                    </div>
                    <div class="profileinputline">
                    <h3>Confirm Password</h3>
                    <input type="password" placeholder="" name="new_password_confirmation">
                    </div>
                    <div class="profileinputline">
                        <button class="btnsave">Save</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection('content')