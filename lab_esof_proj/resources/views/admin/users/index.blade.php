@extends('layouts.app')

@section('title')
    AdminClients
@endsection

@section('content')
<div class="adclientmenu">
    <div class="grid-container">
        <div class="grid-item item2 adclient">
            <div class="sidemenuproduct">
                <a href="{{ route('adminclients') }}">
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
        <div class="grid-item item1 adclient"></div>
        <div class="grid-item item9 adclient">
            <div class="mainmenuclient">
                <div class="checkoutinputline">
                    <h3>Client id</h3>
                    <h3>Name</h3>
                    <h3>Email</h3>
                    <h3>Gender</h3>
                    <h3>Active</h3>
                    <h3>Password</h3>
                    <h3>Edit</h3>
                    <h3>Remove</h3>
                </div>
                <hr class="horizontal-adclient">
                    @forelse($users as $user)
                        <div class="checkoutinputline">

                        <h4>{{ $user->id }}</h4>

                        <h4>{{ $user->name }}</h4>
                        <h4>{{ $user->email }}</h4>
                        @if($user->gender)
                            <h4>Male</h4>
                        @else
                            <h4>Female</h4>
                        @endif    
                        @if($user->active)
                            <h4>True</h4>
                        @else
                            <h4>False</h4>
                        @endif
                        <h4>{{ $user->password }}</h4>
                     
                      
                        
                    @if($user->trashed())
                        <a style="visibility:hidden;">
                            <button></button>
                        </a>
                        <form action="{{ route('users.restore',['user' => $user]) }}" method="POST" style="width: 11.1%;">
                        @csrf
                            <button type="submit" style="width:100%">Restore</button>
                        </form>
                    @else
                        <a href="{{ route('edituser', ['user' => $user]) }}" class="checkoutinputline" style="text-decoration: none;">
                            <!-- Edit</a> -->
                            <button style="width:100%">Edit</button>
                        </a>
                        <form action="{{ route('users.destroy',['user' => $user]) }}" method="POST" style="width: 11.1%;">
                        @csrf
                            <button type="submit" style="width:100%">Remove</button>
                        </form>
                    @endif

                        </div>

                        @empty
                        <p>Nenhum cliente cadastrado.</p>
                    @endforelse

                    <!-- <h4>1</h4>
                    <h4>True</h4>
                    <h4>Joaquim Alberto</h4>
                    <h4>jquim@gmail.com</h4>
                    <h4>98736326</h4>
                    <h4>jquim2022</h4>
                    <button>Edit</button>
                    <button>Remove</button> -->
            </div>
        </div>
    </div>
</div>
@endsection('content')