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
            </div>
        </div>
    </div>
</section>
<!-- End Featured Boxes Area -->
@endif
