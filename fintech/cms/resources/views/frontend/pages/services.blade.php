
 @extends('layouts.frontend.app')

@section('content')
<!-- Start Page Title Area -->
<div class="page-title-area item-bg2 jarallax" data-jarallax='{"speed": 0.3}'>
    <div class="container">
        <div class="page-title-content">
            <h2>Services</h2>
            <p>Top up online, see your journey and payment history. PAY AS YOU GO!</p>
        </div>
    </div>
</div>
<!-- End Page Title Area -->

<!-- Start Features Area -->
<section class="features-area ptb-70 bg-f6f4f8">
    <div class="container">
        <div class="section-title">
            <h2>{{$overview_title}}</h2>
            <div class="bar"></div>
            <p>{!! $overview_sub_title !!}</p>
        </div>
        @if($services->first())
            <div class="row">
                @foreach($services as $service)
                    <div class="col-md-3">
                        <div class="single-how-it-works services-box">
                            <img src="{{$service->image}}" alt="image">
                            <h3>{{$service->title}}</h3>
                            <p>{!!$service->description!!}</p>
                        </div>
                    </div>
                @endforeach
            </div>
        @endif
    </div>
</section>
<!-- End Features Area -->
@if($servicesection->first())
@foreach($servicesection as $service_section)
<section class="services-area ptb-70">
    <div class="container-fluid p-0">
        <div class="overview-box">
            <div class="overview-content">
                <div class="content left-content">
                    <h2>{{$service_section->title}}</h2>
                    <div class="bar"></div>
                    <p>{!!$service_section->description!!}</p>
                </div>
            </div>

            <div class="overview-image">
                <div class="image">
                    <img src="{{asset($service_section->image)}}" alt="image" class="img-fluid">
                </div>
            </div>
        </div>
    </div>
</section>
@endforeach
@endif
@endsection

@section('customscripts')
@endsection
