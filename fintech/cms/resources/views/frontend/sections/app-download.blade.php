
<!-- Start App Download Area -->
@if($info_title)
<section class="app-download-area">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-6 col-md-12">
                <div class="app-image">
                    <div class="main-image">
                        <img src="{{ asset('frontend/img/phone-app1.png') }}" class="wow fadeInLeft" data-wow-delay="0.6s" alt="image">
                        <img src="{{ asset('frontend/img/phone-app2.png') }}" class="wow fadeInUp" data-wow-delay="0.9s" alt="image">
                    </div>
                    <div class="main-mobile-image">
                        <img src="{{ asset('frontend/img/main-mobile.png') }}" class="wow fadeInUp" data-wow-delay="0.6s" alt="image">
                    </div>
                    <div class="circle-img">
                        <img src="{{ asset('frontend/img/circle.png') }}" alt="image">
                    </div>
                </div>
            </div>
            <div class="col-lg-6 col-md-12">
                <div class="app-download-content">
                @if($info_title)
                    <h2>{{$info_title->value}}</h2>
                @endif
                <div class="bar"></div>
                @if($info_sub_title)
                    <p>{{$info_sub_title->value}}</p>
                @endif

                    <div class="btn-box">
                        <a href="{{ $settings?$settings->app_store_link : '#' }}" class="app-store-btn">
                            <i class="fab fa-apple"></i>
                            Download on
                            <span>App Store</span>
                        </a>
                        <a href="{{ $settings?$settings->play_store_link : '#' }}" class="play-store-btn">
                            <i class="fab fa-google-play"></i>
                            Download on
                            <span>Google play</span>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endif
<!-- End App Download Area -->
