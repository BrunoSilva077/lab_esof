<script src="{{ asset('js/navbar.js') }}"></script>
<footer>
     <div class="grid-container">
            <div class="grid-item item7 footer">
                <div class="textnewsletter">
                    <div class="newsletter">
                        <h1>Subscribe newsletter</h1>
                        <p>Subscribe to our newsletter for exclusive information on our Events, Promotions and Offers.</p>
                        <a href="{{ route('newsletter') }}"class="newsletter" style="text-decoration:none">
                        <h2 class="lowres">@ SUBSCRIBE TO OUR NEWSLETTER</h2>
                        </a>
                    </div>
                </div>
            </div>
            <div class="grid-item item4 footer">
                <a href="{{ route('newsletter') }}"class="newsletter" style="text-decoration:none">
                    <h2>@ SUBSCRIBE TO OUR NEWSLETTER</h2>
                </a>
            </div>
            <div class="grid-item item12 footer">
                <div class="footerColumn">
                    <div class="horizontal-line">
                    </div>
                    <div class="logo-footer">
                        <h1></h1>
                    </div>
                    <ul class="ul-container-footer">
                        <li class="btn"><a href="{{route('home')}}">Home</a></li>
                        <li class="btn"><a href="{{route('products.index')}}">Products</a></li>
                        <li class="btn"><a href="{{route('about')}}">About us</a></li>
                        <li class="btn"><a href="{{route('contact')}}">Contact us</a></li>
                    </ul>
                    <div class="horizontal-line2"></div>
                    <h1 class="therights">© 2023 PROTOTYPE. ALL RIGHTS RESERVED</h1>
                </div>
            </div>
    </div>
</footer>