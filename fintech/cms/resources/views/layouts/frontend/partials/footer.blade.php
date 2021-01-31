<!-- Start Footer Area -->
<footer class="footer-area">
    <div class="container">
        <div class="row">
            <div class="col-lg-3 col-sm-6 col-md-6">
                <div class="single-footer-widget">
                    <div class="logo">
                        @if($settings)
                        <a href="{{route('visitor.home')}}">
                            <img src="{{asset($settings->site_logo_responsive)}}" alt="logo">
                        </a>
                        <p>{{$settings->footer_text}} </p>
                        @endif
                    </div>

                    <ul class="social-links">
                        <li><a href="{{ $settings?$settings->fb_link : '#' }}" target="_blank"><i class="fab fa-facebook-f"></i></a></li>
                        <li><a href="{{ $settings?$settings->twitter_link : '#' }}" target="_blank"><i class="fab fa-twitter"></i></a></li>
                        <li><a href="{{ $settings?$settings->insta_link : '#' }}" target="_blank"><i class="fab fa-instagram"></i></a></li>
                        <li><a href="{{ $settings?$settings->linked_link : '#' }}" target="_blank"><i class="fab fa-linkedin-in"></i></a></li>
                    </ul>
                </div>
            </div>
            <div class="col-lg-3 col-sm-6 col-md-6">
                <div class="single-footer-widget pl-5">
                    <h3>Quick Links</h3>

                    <ul class="list">
                        <li><a href="{{route('visitor.aboutus')}}">About Us</a></li>
                        <li><a href="{{route('visitor.services')}}">Services</a></li>
                        <li><a href="{{route('visitor.events')}}">Events</a></li>
                    </ul>
                </div>
            </div>
            <div class="col-lg-3 col-sm-6 col-md-6">
                <div class="single-footer-widget">
                    <h3>Products</h3>
                    @if(!empty($all_products))
                        <ul class="list">
                            @foreach($all_products as $id=>$product)
                            <li><a href="{{ route('visitor.product.get', [$id]) }}">{{$product}}</a></li>
                            @endforeach
                        </ul>
                    @endif
                </div>
            </div>
            <div class="col-lg-3 col-sm-6 col-md-6">
                <div class="single-footer-widget">
                    <h3>Address</h3>

                    <ul class="footer-contact-info">
                        <li><span>Location:</span> {{ $settings?$settings->location : "" }}</li>
                        <li><span>Email:</span> <a href='mailto:{{ $settings?$settings->email : "" }}'>{{ $settings?$settings->email : "" }}</a></li>
                        <li><span>Phone:</span> <a href='tel:{{ $settings?$settings->phone : "" }}'>{{ $settings?$settings->phone : "" }}</a></li>
                        <!-- <li><span>Fax:</span> <a href='tel:{{ $settings?$settings->fax : "" }}'>{{ $settings?$settings->fax : "" }}</a></li> -->
                    </ul>
                </div>
            </div>
        </div>
        <div class="copyright-area">
            <p>Copyright @2020 Fintech International. All rights reserved | Powered By : <a href="https://ihostnepal.com">iHostNepal</a></p>
        </div>
    </div>

    <div class="map-image"><img src="{{ asset('frontend/img/map.png')}}" alt="map"></div>
</footer>
<!-- End Footer Area -->
