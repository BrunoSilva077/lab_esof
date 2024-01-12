@extends('layouts.app')

@section('title')
    Edit Voucher
@endsection

@section('content')
<div class="editprofilemenu">
    <div class="grid-container">
    <div class="grid-item item2 adproduct prod">
            <div class="sidemenuproduct prod">
            <a href="{{ route('adminorders') }}">
                <div class="checkoutinputline">
                    <h3>Orders<i class="fa-solid fa-box"></i></h3>
                </div>
            </a>
            <a href="{{ route('adminclients') }}">
                <div class="checkoutinputline active">
                    <h3>Clients<i class="fa-solid fa-user"></i></h3>
                </div>
            </a>
            <a href="{{ route('adminproducts') }}">
                <div class="checkoutinputline">
                    <h3>Products<i class="fa-solid fa-cart-shopping"></i></h3>
                </div>
            </a>
            <a href="{{ route('adminimages') }}">
                <div class="checkoutinputline ">
                    <h3>Images<i class="fa-solid fa-image"></i></h3>
                </div>
            </a>
            <a href="{{ route('adminvouchers') }}">
                <div class="checkoutinputline">
                    <h3>Vouchers<i class="fas fa-tag"></i></h3>
                </div>
            </a>
            <a href="{{ route('admincategories') }}">
                    <div class="checkoutinputline">
                        <h3>Categories</h3>
                    </div>
                </a>
                <a href="{{ route('adminbrands') }}">
                    <div class="checkoutinputline">
                        <h3>Brands</h3>
                    </div>
                </a>
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
 
                <form action=" {{ route('updateuser', ['user' => $user]) }}" method="POST">
                    @csrf
                    <div class="profileinputline">
                        <h2>User</h2>
                    </div>
                    <div class="profileinputline">
                        <h3>Last update</h3>
                        <input type="text" name="updated" value="{{ $user->updated_at }}" disabled>              
                    </div>
                    <div class="profileinputline">
                        <h3>Name</h3>
                        <input type="text" name="name" value="{{ $user->name }}">             
                    </div>
                    <div class="profileinputline">
                        <h3>Birthday</h3>
                        <input type="date" name="birthday" value="{{ $user->birthday }}">              
                    </div>
                    <div class="profileinputline">
                        <h3>Email</h3>
                        <input type="email" name="email" value="{{ $user->email }}">
                    </div>
                    <div class="profileinputline radio">
                        <h3>Gender</h3>
                        <input type="radio" name="gender" class="sizeradio" value="true"{{ $user->gender === true ? 'checked' : '' }}>Male
                        <div class="space"></div>
                        <input type="radio" name="gender" class="sizeradio" value="false"{{ $user->gender === false ? 'checked' : '' }}>Female
                    </div>
                    <div class="profileinputline radio">
                        <h3>Admin</h3>
                        <input type="radio" name="admin" class="sizeradio" value="true"{{ $user->is_admin === true ? 'checked' : '' }}>True
                        <div class="space"></div>
                        <input type="radio" name="admin" class="sizeradio" value="false"{{ $user->is_admin === false ? 'checked' : '' }}>False
                    </div>
                    
                    <div class="profileinputline">
                        <button class="btnsave" type="submit">Save</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection('content')