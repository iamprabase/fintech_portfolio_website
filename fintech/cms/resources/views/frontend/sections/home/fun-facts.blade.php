<!-- Start Fun Facts Area -->
@if($funfacts->first() || $contactus_title || $contactus_btn_title)
<section class="funfacts-area ptb-70 pt-0">
    <div class="container">
        @if($funfacts->first())
        <div class="section-title">
            @if($funfacts_title)
                <h2>{{$funfacts_title->value}}</h2>
            @endif
            <div class="bar"></div>
            @if($funfacts_sub_title)
                <p>{{$funfacts_sub_title->value}}</p>
            @endif
        </div>
        <div class="row">
            @foreach($funfacts as $funfact)
                <div class="col-lg-4 col-sm-4 col-md-4 col-6">
                    <div class="funfact">
                        <h3><span class="odometer" data-count="{{$funfact->value}}">00</span></h3>
                        <p>{{$funfact->key}}</p>
                    </div>
                </div>
            @endforeach
            <!-- <div class="col-lg-4 col-sm-4 col-md-4 col-6">
                <div class="funfact">
                    <h3><span class="odometer" data-count="1000">00</span></h3>
                    <p>Positive Feedback</p>
                </div>
            </div>
            <div class="col-lg-4 col-sm-4 col-md-4 col-6">
                <div class="funfact">
                    <h3><span class="odometer" data-count="256">00</span></h3>
                    <p>Trainings Conducted</p>
                </div>
            </div> -->
        </div>
        @endif
        @if( $contactus_title || $contactus_btn_title)
        <div class="contact-cta-box">
            @if($contactus_title)
                <h3>{{$contactus_title->value}}</h3>
            @endif
            @if($contactus_sub_title)
                <p>{{$contactus_sub_title->value}}</p>
            @endif
            @if($contactus_btn_title)
                <a href="{{$contactus_btn_redirect?$contactus_btn_redirect->value : '#'}}" class="btn btn-primary" target="_blank">{{$contactus_btn_title->value}}</a>
            @endif
        </div>
        <div class="map-bg">
            <img src="{{ asset('frontend/img/map.png') }}" alt="map">
        </div>
        @endif
    </div>
</section>
@endif
<!-- End Fun Facts Area -->
