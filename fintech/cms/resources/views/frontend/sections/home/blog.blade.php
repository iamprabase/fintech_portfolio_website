<!-- Start Blog Area -->
@if($blogs->first())
<section class="blog-area ptb-70 pt-0">
    <div class="container">
        <div class="section-title">
            <h2>Our Blogs</h2>
            <div class="bar"></div>
            <!-- <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p> -->
        </div>
        <div class="row">
        @foreach($blogs as $blog)
            <div class="col-lg-4 col-md-6 offset-lg-0 offset-md-3">
                <div class="single-blog-post">
                    <div class="blog-image">
                        <a href="#">
                            @if($blog->image)
                                <img src="{{ asset($blog->image) }}" alt="image">
                            @endif
                        </a>
                        <div class="date">
                            <i class="far fa-calendar-alt"></i> {{date('F d Y', strtotime($blog->published_at))}}
                        </div>
                    </div>
                    <div class="blog-post-content">
                        <h3><a href="#">{{$blog->title}}</a></h3>
                        <span>by <a href="#">{{$blog->user->name}}</a></span>
                        <p>{!!$blog->description!!}</p>
                        <a href="#" class="read-more-btn">Read More <i class="fas fa-arrow-right"></i></a>
                    </div>
                </div>
            </div>
        @endforeach
            <!-- <div class="col-lg-4 col-md-6 offset-lg-0 offset-md-3">
                <div class="single-blog-post">
                    <div class="blog-image">
                        <a href="#">
                            <img src="{{ asset('frontend/img/2a.jpg') }}" alt="image">
                        </a>
                        <div class="date">
                            <i class="far fa-calendar-alt"></i> September 17, 2019
                        </div>
                    </div>
                    <div class="blog-post-content">
                        <h3><a href="#">Tips to Protecting Business and Family</a></h3>
                        <span>by <a href="#">admin</a></span>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Quis ipsum suspendisse ultrices gravida.</p>
                        <a href="#" class="read-more-btn">Read More <i class="fas fa-arrow-right"></i></a>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 offset-lg-0 offset-md-3">
                <div class="single-blog-post">
                    <div class="blog-image">
                        <a href="#">
                            <img src="{{ asset('frontend/img/3a.jpg') }}" alt="image">
                        </a>
                        <div class="date">
                            <i class="far fa-calendar-alt"></i> September 19, 2019
                        </div>
                    </div>
                    <div class="blog-post-content">
                        <h3><a href="#">Protect Your Workplace from Cyber Attacks</a></h3>
                        <span>by <a href="#">admin</a></span>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Quis ipsum suspendisse ultrices gravida.</p>
                        <a href="#" class="read-more-btn">Read More <i class="fas fa-arrow-right"></i></a>
                    </div>
                </div>
            </div> -->
        </div>
    </div>
</section>
@endif
<!-- End Blog Area -->
