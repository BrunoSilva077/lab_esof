@extends('layouts.app')

@section('title')
    Edit Voucher
@endsection

@section('content')
<div class="editprofilemenu">
    <div class="grid-container">
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
                    
                    <div class="profileinputline">
                        <button class="btnsave" type="submit">Save</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection('content')