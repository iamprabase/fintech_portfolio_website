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
            <!-- <div class="col-lg-4 col-sm-6 col-md-6">
                <div class="single-how-it-works">
                    <img src="{{ asset('frontend/img/2.png') }}" alt="image">
                    <h3>2. Create an Account</h3>
                    <p>Ipsum suspendisse ultrices gravida. Risus commodo viverra maecenas accumsan lacus vel adipiscing aliqua.</p>
                </div>
            </div>
            <div class="col-lg-4 col-sm-6 col-md-6">
                <div class="single-how-it-works">
                    <img src="{{ asset('frontend/img/3.png') }}" alt="image">
                    <h3>3. Set up Auto top-up</h3>
                    <p>Ipsum suspendisse ultrices gravida. Risus commodo viverra maecenas accumsan lacus vel adipiscing aliqua.</p>
                </div>
            </div>
            <div class="col-lg-4 col-sm-6 col-md-6">
                <div class="single-how-it-works">
                    <img src="{{ asset('frontend/img/4.png') }}" alt="image">
                    <h3>4. Verify your identity</h3>
                    <p>Ipsum suspendisse ultrices gravida. Risus commodo viverra maecenas accumsan lacus vel adipiscing aliqua.</p>
                </div>
            </div>
            <div class="col-lg-4 col-sm-6 col-md-6">
                <div class="single-how-it-works">
                    <img src="{{ asset('frontend/img/5.png') }}" alt="image">
                    <h3>5. Pay for your transfer</h3>
                    <p>Ipsum suspendisse ultrices gravida. Risus commodo viverra maecenas accumsan lacus vel adipiscing aliqua.</p>
                </div>
            </div>
            <div class="col-lg-4 col-sm-6 col-md-6">
                <div class="single-how-it-works">
                    <img src="{{ asset('frontend/img/6.png') }}" alt="image">
                    <h3>6. That’s it</h3>
                    <p>Ipsum suspendisse ultrices gravida. Risus commodo viverra maecenas accumsan lacus vel adipiscing aliqua.</p>
                </div>
            </div> -->
        </div>
    </div>
</section>
<!-- End How It Works Area -->
@endif
