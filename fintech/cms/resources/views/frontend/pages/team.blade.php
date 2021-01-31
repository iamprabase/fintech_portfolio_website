@extends('layouts.frontend.app')

@section('content')
<!-- Start Page Title Area -->
<div class="page-title-area item-bg1 jarallax" data-jarallax='{"speed": 0.3}'>
    <div class="container">
        <div class="page-title-content">
            <h2>Board of Directors</h2>
        </div>
    </div>
</div>
<!-- End Page Title Area -->
<section class="team-area ptb-70">
  <div class="container">
    <div class="row">
      @if($bods->first())
        @foreach($bods as $bod)
        <div class="col-lg-6 col-md-6">
          <div class="single-team-member">
            <div class="member-image">
              <img src="{{asset($bod->image)}}" alt="image" />
  
              <!-- <ul class="social">
                <li>
                  <a href="#" target="_blank"><i class="fab fa-facebook-f"></i></a>
                </li>
                <li>
                  <a href="#"><i class="fab fa-linkedin-in"></i></a>
                </li>
              </ul> -->
            </div>
  
            <div class="member-content">
              <h3>{{$bod->name}}</h3>
              <span>{{$bod->title}}</span>
              <!-- <p>
                Lorem Ipsum is simply dummy text of the printing and
                typesetting industry. Lorem Ipsum has been the
                industry's standard dummy text ever since the 1500s,
                when an unknown printer took a galley.
              </p> -->
            </div>
          </div>
        </div>
        @endforeach
      @endif

      
    </div>
  </div>
</section>

@endsection

@section('customscripts')
@endsection