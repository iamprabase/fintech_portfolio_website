<!-- Start Featured Boxes Area -->
@if($featured->first())
<section class="featured-boxes-area">
    <div class="container">
        <div class="featured-boxes-inner">
            <div class="row m-0">
                @foreach($featured as $object)
                    <div class="col-lg-3 col-sm-6 col-md-6 p-0">
                        <div class="single-featured-box">
                            <div class="icon color-fb7756">
                                <img src="{{asset($object->image)}}" alt="01">
                            </div>
                            <h3>{{$object->title}}</h3>
                        </div>
                    </div>
                @endforeach
                <!-- <div class="col-lg-3 col-sm-6 col-md-6 p-0">
                    <div class="single-featured-box">
                        <div class="icon color-facd60">
                            <img src="{{ asset('frontend/img/noun_smart transportation_-1-01.svg') }}" alt="02">
                        </div>
                        <h3>Smart Bus (Public Transport)</h3>
                    </div>
                </div>
                <div class="col-lg-3 col-sm-6 col-md-6 p-0">
                    <div class="single-featured-box">
                        <div class="icon color-1ac0c6">
                            <img src="{{ asset('frontend/img/noun_Smart City_3085652-01.svg') }}" alt="03">
                        </div>
                        <h3>Smart City (Digital City)</h3>
                    </div>
                </div>
                <div class="col-lg-3 col-sm-6 col-md-6 p-0">
                    <div class="single-featured-box">
                        <div class="icon color-new">
                           <img src="{{asset('frontend/img/Group41-01.svg') }}" alt="04">
                        </div>
                        <h3>Electronic Ticketing</h3>
                    </div>
                </div> -->
            </div>
        </div>
    </div>
</section>
<!-- End Featured Boxes Area -->
@endif
