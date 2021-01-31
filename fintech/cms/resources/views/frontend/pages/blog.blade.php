@extends('layouts.frontend.app')

@section('content')
<!-- Start Page Title Area -->
<div class="page-title-area item-bg1 jarallax" data-jarallax='{"speed": 0.3}'>
    <div class="container">
        <div class="page-title-content">
            <h2>{{$blog->title}}</h2>
            <p>{{$blog->short_description}}</p>
        </div>
    </div>
</div>
<section class="blog-details-area ptb-70">
  <div class="container">
    <div class="row">
      <div class="col-lg-8 col-md-12">
        <div class="blog-details">
          <div class="article-image">
            <img src="{{$blog->image}}" alt="image">
          </div>

          <div class="article-content">
            <div class="entry-meta">
              <ul>
                <li><span>Posted On:</span> <a href="#">{{date('F j, Y', strtotime($blog->published_at))}}</a></li>
                <li><span>Posted By:</span> <a href="#">{{$blog->user->name}}</a></li>
              </ul>
            </div>

            <h3>{{$blog->title}}</h3>

            <p>{!! $blog->description !!}</p>

          </div>
        </div>
      </div>

      <div class="col-lg-4 col-md-12">
        <aside class="widget-area" id="secondary">
          <!-- <section class="widget widget_search">
            <form class="search-form">
              <label>
                <span class="screen-reader-text">Search for:</span>
                <input type="search" class="search-field" placeholder="Search...">
              </label>
              <button type="submit"><i class="fas fa-search"></i></button>
            </form>
          </section> -->

          <section class="widget widget_luvion_posts_thumb">
            <h3 class="widget-title">Recent Posts</h3>

            @if($recent_posts->first()) 
              @foreach($recent_posts as $recent_post)
                <article class="item">
                  <a href="{{route('visitor.blog.show',[$recent_post->slug])}}" class="thumb">
                    <span class="fullimage cover" role="img" style="background-image: url({{asset($recent_post->image)}})"></span>
                  </a>
                  <div class="info">
                    <time datetime="{{$recent_post->published_at}}">{{date('F j, Y', strtotime($recent_post->published_at))}}</time>
                    <h4 class="title usmall"><a href="{{route('visitor.blog.show',[$recent_post->slug])}}">{{$recent_post->title}}</a></h4>
                  </div>
                  <div class="clear"></div>
                </article>
              @endforeach
            @endif
          
          </section>
        </aside>
      </div>
    </div>
  </div>
</section>

@endsection

@section('customscripts')
@endsection