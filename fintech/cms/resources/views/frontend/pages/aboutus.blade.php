
 @extends('layouts.frontend.app')

@section('content')
 <!-- Start Page Title Area -->
<div class="page-title-area item-bg1 jarallax" data-jarallax='{"speed": 0.3}'>
    <div class="container">
        <div class="page-title-content">
            <h2>About Us</h2>
        </div>
    </div>
</div>
<!-- End Page Title Area -->

<!-- Start About Area -->
@if($profile)
<section class="about-area ptb-70" id="about">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-6 col-md-12">
                <div class="about-content">
                    <span>Company Profile</span>
                    <h1>{{$profile->title}}</h1>
                    <p>{!!$profile->description!!}</p>
                </div>
            </div>
            @if($profile->image)
                <div class="col-lg-6 col-md-12">
                    <div class="about-image">
                        <img src="{{asset($profile->image)}}" alt="profile image">
                    </div>
                </div>
            @endif
            <!-- @if($profile->bullets->first())
            <div class="overview-content">
                <div class="content">
                <ul class="features-list listing">
                    @foreach($profile->bullets as $bullets)
                        <li><span class="listing"><i class="fas fa-check"></i>  {{$bullets->point}}</span></li>
                    @endforeach
                </ul>

                </div>
            </div>
            @endif -->
        </div>
    </div>
</section>
@endif
<!-- End About Area -->

<!-- Start Mission Area -->
@if($mission)
<section class="services-area ptb-70 bg-f7fafd" id="mission">
<div class="container-fluid p-0">
    <div class="overview-box">
        <div class="overview-image">
            @if($mission->image)
                <div class="image">
                    <img src="{{asset($mission->image)}}" alt="mission image">
                </div>
            @endif
        </div>

        <div class="overview-content">
            <div class="content">
                <span class="sub-title">Mission Statement</span>
                <h2>{{$mission->title}}</h2>
                <div class="bar"></div>
                <p>{!!$mission->description!!}</p>
                @if($mission->bullets->first())
                <ul class="features-list listing">
                    @foreach($mission->bullets as $bullets)
                        <li><span class="listing"><i class="fas fa-check"></i>  {{$bullets->point}}</span></li>
                    @endforeach
                </ul>
                @endif
            </div>
        </div>
    </div>
</div>
</section>
@endif
<!-- End Mission Area -->

<!-- Start Vision Area -->
@if($vision)
<section class="services-area ptb-70" id="vision">
    <div class="container-fluid p-0">
        <div class="overview-box">
            <div class="overview-content">
                <div class="content left-content">
                    <span class="sub-title">Vision Statement</span>
                    <h2>{{$vision->title}}</h2>
                    <div class="bar"></div>
                    <p>{!!$vision->description!!}</p>
                    @if($vision->bullets->first())
                    <ul class="features-list listing">
                        @foreach($vision->bullets as $bullets)
                            <li><span class="listing"><i class="fas fa-check"></i>  {{$bullets->point}}</span></li>
                        @endforeach
                    </ul>
                    @endif
                </div>
            </div>
            @if($vision->image)
            <div class="overview-image">
                <div class="image">
                    <img src="{{asset($vision->image)}}" alt="image" class="img-fluid">
                </div>
            </div>
            @endif
        </div>
    </div>
</section>
@endif
<!-- End Vision Area -->

<!-- Start Values Area -->
@if($values)
<section class="services-area ptb-70 bg-f7fafd" id="values">
    <div class="container-fluid p-0">
        <div class="overview-box">
            @if($values->image)
            <div class="overview-image">
                <div class="image">
                    <img src="{{asset($values->image)}}" alt="image">
                </div>
            </div>
            @endif

            <div class="overview-content">
                <div class="content">
                    <span class="sub-title">Values</span>
                    <h2>{{$values->title}}</h2>
                    <div class="bar"></div>
                    <p>{!! $values->description !!}</p>

                    @if($values->bullets->first())
                    <ul class="features-list listing">
                        @foreach($values->bullets as $bullets)
                            <li><span class="listing"><i class="fas fa-check"></i>  {{$bullets->point}}</span></li>
                        @endforeach
                    </ul>
                    @endif
                </div>
            </div>
        </div>
    </div>
</section>
@endif
<!-- End Values Area -->

<!-- Start Goals Area -->
@if($goals)
<section class="services-area ptb-70" id="goals">
<div class="container-fluid p-0">
    <div class="overview-box">
        <div class="overview-content">
            <div class="content left-content">
                <span class="sub-title">Goals</span>
                <h2>{{$goals->title}}</h2>
                <div class="bar"></div>
                <p>{!! $goals->description !!}</p>
                @if($goals->bullets->first())
                <ul class="features-list listing">
                    @foreach($goals->bullets as $bullets)
                        <li><span class="listing"><i class="fas fa-check"></i>  {{$bullets->point}}</span></li>
                    @endforeach
                </ul>
                @endif
            </div>
        </div>

        <div class="overview-image">
            <div class="image">
                <img src="{{asset('frontend/img/1a.jpg')}}" alt="image" class="img-fluid">
            </div>
        </div>
    </div>
</div>
</section>
@endif
<!-- End Goals Area -->

<!-- Start Account Create Area -->
@include('frontend/sections.account-create')
<!-- End Account Create Area -->
@endsection

@section('customscripts')
@endsection
