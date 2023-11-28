@extends('layouts.app')

@section('title')
    Contact
@endsection

@section('content')

<div class="container-contact">
    
    <div class="grid-container contact"> 
        
        <div class="FormContact">
            <div class="image-content">
                <div class="grid-item item6">
                    <img class="image-Contact" src="https://s2-techtudo.glbimg.com/6TQXms2SyXIAmkOdLVPbo3dzBSc=/0x0:695x500/600x0/smart/filters:gifv():strip_icc()/i.s3.glbimg.com/v1/AUTH_08fbf48bc0524877943fe86e43087e7a/internal_photos/bs/2018/k/L/0BRu9gQwC86mZBolRtlA/14102394-1135646693137679-7217462888662691348-n.jpg">
                </div>
            </div>
        </div>
        
        <div class="grid-item item6 cont">
            <div class="test">
                <div class="contact-title">
                    Contact Form:
                </div>
                <input type="text" class="input-contact" placeHolder="Name:"></input>
                <input type="text" class="input-contact" placeHolder="Email:"></input>
                <input type="text" class="input-contact" placeHolder="Phone Number:"></input>
                <input type="text" class="input-contact" placeHolder="Message:"></input>
                
            </div>
            <div class="button-div">
                <img src="https://cdn.pixabay.com/photo/2016/01/03/00/43/upload-1118928_960_720.png" class="img-up">
                <div class="send-file"> Send File
                
                </div>
                <button class="button-contact">Send Message</button> 
            </div> 
        </div>
    </div>
</div>

@endsection