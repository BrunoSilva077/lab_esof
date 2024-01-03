@extends('layouts.app')

@section('title')
    History Profile
@endsection

@section('content')
<div class="editprofilemenu">
    <div class="grid-container">
        <div class="grid-item item3 menuedit">
            <div class="sidemenuedit">
                <div class="profileinputline">
                    <a href="{{ route('editprofile') }}"><h3>Account<i class="fa-solid fa-box" style="opacity:1.0;"></i></h3></a>
                </div>
                <div class="profileinputline">
                    <a href="{{ route('favprofile') }}"><h3>Favorites<i class="fa-solid fa-heart"></i></h3></a>
                </div>
                <div class="profileinputline active">
                    <a href="{{ route('historyprofile') }}"><h3>History<i class="fa-solid fa-clock-rotate-left"></i></h3></a>
                </div>
            </div>
        </div>
        <div class="grid-item item9 menuedit">
            <div class="mainmenuedit">
                <div class="profileinputline">
                    <button class="btnsave">Save</button>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection('content')