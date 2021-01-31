<!-- Start Feedback Area -->
@if($portfolios->first())
<section class="feedback-area ptb-70 bg-f7fafd">
    <div class="container">
        <div class="section-title">
            @if($portfolio_title)
                <h2>{{$portfolio_title->value}}</h2>
            @endif
            <div class="bar"></div>
            @if($portfolio_sub_title)
                <p>{{$portfolio_sub_title->value}}</p>
            @endif
        </div>
        <div class="feedback-slides">
            <div class="client-feedback">
                <div>
                    @foreach($portfolios as $portfolio)
                        <div class="item">
                            <div class="single-feedback">
                                <div class="client-img">
                                    <img src="{{ asset($portfolio->image) }}" alt="image">
                                </div>
                                <h3>{{$portfolio->name}}</h3>
                                <span>{{$portfolio->title}}</span>
                                <p>{!! $portfolio->description !!}</p>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
            <div class="client-thumbnails">
                <div>
                    @if($portfolios->first())
                    @foreach($portfolios as $portfolio)
                        <div class="item">
                            <div class="img-fill"><img src="{{ asset($portfolio->image) }}" alt="client"></div>
                        </div>
                    @endforeach
                    @endif
                </div>
                <button class="prev-arrow slick-arrow">
                <i class="fas fa-arrow-left"></i>
                </button>

                <button class="next-arrow slick-arrow">
                <i class="fas fa-arrow-right"></i>
                </button>
            </div>
        </div>
    </div>
</section>
@endif
<!-- End Feedback Area -->
