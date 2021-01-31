@extends('layouts.frontend.app')

@section('content')
<!-- Start Page Title Area -->
<div class="page-title-area item-bg1 jarallax" data-jarallax='{"speed": 0.3}'>
  <div class="container">
    <div class="page-title-content">
      <h2>Blogs</h2>
    </div>
  </div>
</div>

<section class="blog-area ptb-70">
  <div class="container">
    <div class="row">
    @if($blogs->first())
    @foreach($blogs as $blog)
      <div class="col-lg-4 col-md-6">
        <div class="single-blog-post">
          <div class="blog-image">
            <a href="{{route('visitor.blog.show', [$blog->slug])}}">
              <img src="{{asset($blog->image)}}" alt="image">
            </a>

            <div class="date">
              <i class="far fa-calendar-alt"></i> {{date('F j, Y', strtotime($blog->published_at))}}
            </div>
          </div>

          <div class="blog-post-content">
            <h3><a href="{{route('visitor.blog.show', [$blog->slug])}}">{{$blog->title}}</a></h3>

            <span>by <a href="{{route('visitor.blog.show', [$blog->slug])}}">{{$blog->user->name}}</a></span>

            <p>{{$blog->short_description}}</p>

            <a href="{{route('visitor.blog.show', [$blog->slug])}}" class="read-more-btn">Read More <i class="fas fa-arrow-right"></i></a>
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
