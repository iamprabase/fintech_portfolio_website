<!-- Start Services Area -->
 @if(!empty($services))
<section class="services-area ptb-70 pt-0">
    <div class="container-fluid p-0">
        <div class="overview-box">
            <div class="overview-content">
                <div class="content left-content">
                    @if($service_title)
                    <span class="sub-title">Fast & Easy</span>
                        <h2>{{$service_title->value}}</h2>
                    <div class="bar"></div>
                    @endif
                    @if($service_sub_title)
                        <p>{{$service_sub_title->value}}</p>
                    @endif

                    <ul class="features-list">
                        @foreach($services as $service)
                            <li><span><i class="fas fa-check"></i> {{$service}}</span></li>
                        @endforeach
                    </ul>
                    @if($service_btn_title)
                        <a href="{{ $service_btn_redirect?$service_btn_redirect->value : '#' }}" class="btn btn-primary" target="_self">{{$service_btn_title->value}}</a>
                    @endif
                </div>
            </div>
            <div class="overview-image">
                <div class="image">
                    @if($service_image)
                        <img src="{{ asset($service_image->image) }}" alt="image">
                    @endif
                </div>
            </div>
        </div>
    </div>
</section>
@endif
<!-- End Services Area -->
