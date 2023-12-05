@extends('layouts.app')

@section('title')
    Login
@endsection

@section('content')
<div class="editprofilemenu">
    <div class="grid-container">
        <div class="grid-item item3 menuedit">
            <div class="sidemenuedit">
                <div class="profileinputline active">
                    <h3>Orders<i class="fa-solid fa-box" style="opacity:1.0;"></i></h3>
                </div>
                <div class="profileinputline">
                    <h3>Clients<i class="fa-solid fa-user"></i></h3>
                </div>
                <div class="profileinputline">
                    <h3>Products<i class="fa-solid fa-cart-shopping"></i></h3>
                </div>
            </div>
        </div>
        <div class="grid-item item9 menuedit">
            <div class="mainmenuedit">
                <div class="profileinputline">
                    <h2>Personal</h2>
                </div>
                <div class="profileinputline">
                    <h3>First Name</h3>
                    <input type="text" placeholder="Rui" disabled>              
                </div>
                <div class="profileinputline">
                    <h3>Last Name</h3>
                    <input type="text" placeholder="Silva" disabled>
                </div>
                <div class="profileinputline">
                   <h3>Email</h3>
                   <input type="email" placeholder="RuiSilva@gmail.com">
                </div>
                <div class="profileinputline">
                   <h3>Birthday</h3>
                   <input type="date" placeholder="RuiSilva@gmail.com">
                </div>
                <div class="profileinputline radio">
                    <h3>Gender</h3>
                    <input type="radio" name="radio" class="sizeradio"checked>Male
                    <div class="space"></div>
                    <input type="radio" name="radio" class="sizeradio">Female
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
                    <input type="text" placeholder="">              
                </div>
                <div class="profileinputline">
                    <h3>New Password</h3>
                    <input type="text" placeholder="">
                </div>
                <div class="profileinputline">
                   <h3>Confirm Password</h3>
                   <input type="email" placeholder="">
                </div>
                <div class="profileinputline">
                    <button class="btnsave">Save</button>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection('content')