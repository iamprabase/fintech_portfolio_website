<!-- Start How It Works Area -->
@if($working_process_images->first())
<section class="how-it-works-area ptb-70">
    <div class="container">
        <div class="section-title">
            @if($working_process_title)
            <h2>{{$working_process_title->value}}</h2>
            @endif
            <div class="bar"></div>
            @if($working_process_subtitle)
            <p>{{$working_process_subtitle->value}}</p>
            @endif
        </div>
        <div class="row">
            @foreach($working_process_images as $working_process_image)
                <div class="col-lg-4 col-sm-6 col-md-6">
                    <div class="single-how-it-works">
                        <img src="{{ asset($working_process_image->image) }}" alt="image">
                        <h3>{{$working_process_image->title}} </h3>
                        <p>{{$working_process_image->sub_title}}</p>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>
<!-- End How It Works Area -->
@endif
