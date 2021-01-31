<!-- Start Blog Area -->
@if($blogs->first())
<section class="blog-area ptb-70 pt-0">
    <div class="container">
        <div class="section-title">
            <h2>Our Blogs</h2>
            <div class="bar"></div>
        </div>
        <div class="row">
        @foreach($blogs as $blog)
            <div class="col-lg-4 col-md-6 offset-lg-0 offset-md-3">
                <div class="single-blog-post">
                    <div class="blog-image">
                        <a href="{{route('visitor.blog.show',[$blog->slug])}}">
                            @if($blog->image)
                                <img src="{{ asset($blog->image) }}" alt="image">
                            @endif
                        </a>
                        <div class="date">
                            <i class="far fa-calendar-alt"></i> {{date('F d Y', strtotime($blog->published_at))}}
                        </div>
                    </div>
                    <div class="blog-post-content">
                        <h3><a href="{{route('visitor.blog.show',[$blog->slug])}}">{{$blog->title}}</a></h3>
                        <span>by <a href="{{route('visitor.blog.show',[$blog->slug])}}">{{$blog->user->name}}</a></span>
                        <p>{!!$blog->short_description!!}</p>
                        <a href="{{route('visitor.blog.show',[$blog->slug])}}" class="read-more-btn">Read More <i class="fas fa-arrow-right"></i></a>
                    </div>
                </div>
            </div>
        @endforeach
        </div>
    </div>
</section>
@endif
<!-- End Blog Area -->
