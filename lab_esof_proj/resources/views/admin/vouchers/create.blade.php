@extends('layouts.app')

@section('title')
    Add Voucher
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
                <form action=" {{ route('store') }}" method="POST">
                    @csrf
                    <div class="profileinputline">
                        <h2>Voucher</h2>
                    </div>
                    <div class="profileinputline">
                        <h3>Id Voucher</h3>
                        <input type="text" name="id" value="" disabled>              
                    </div>
                    <div class="profileinputline">
                        <h3>Cod Voucher</h3>
                        <input type="text" name="cod_voucher" value="">              
                    </div>
                    <div class="profileinputline">
                        <h3>Tipo Percentual</h3>
                        <input type="text" name="tipo_percentual" value="">
                    </div>
                    <div class="profileinputline">
                        <h3>Valor Desconto</h3>
                        <input type="text" name="valor_desconto" value="">
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