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

                    <!-- <div class="item">
                        <div class="single-feedback">
                            <div class="client-img">
                                <img src="{{ asset('frontend/img/2.jpg') }}" alt="image">
                            </div>
                            <h3>John Smith</h3>
                            <span>Web Developer</span>
                            <p>Quis ipsum suspendisse ultrices gravida. Risus commodo viverra maecenas accumsan lacus vel facilisis. Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
                        </div>
                    </div>

                    <div class="item">
                        <div class="single-feedback">
                            <div class="client-img">
                                <img src="{{ asset('frontend/img/3.jpg') }}" alt="image">
                            </div>
                            <h3>Maxwel Warner</h3>
                            <span>Web Developer</span>
                            <p>Quis ipsum suspendisse ultrices gravida. Risus commodo viverra maecenas accumsan lacus vel facilisis. Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
                        </div>
                    </div>

                    <div class="item">
                        <div class="single-feedback">
                            <div class="client-img">
                                <img src="{{ asset('frontend/img/4.jpg') }}" alt="image">
                            </div>
                            <h3>Ross Taylor</h3>
                            <span>Web Developer</span>
                            <p>Quis ipsum suspendisse ultrices gravida. Risus commodo viverra maecenas accumsan lacus vel facilisis. Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
                        </div>
                    </div>

                    <div class="item">
                        <div class="single-feedback">
                            <div class="client-img">
                                <img src="{{ asset('frontend/img/5.jpg') }}" alt="image">
                            </div>
                            <h3>James Anderson</h3>
                            <span>Web Developer</span>
                            <p>Quis ipsum suspendisse ultrices gravida. Risus commodo viverra maecenas accumsan lacus vel facilisis. Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
                        </div>
                    </div>

                    <div class="item">
                        <div class="single-feedback">
                            <div class="client-img">
                                <img src="{{ asset('frontend/img/1.jpg') }}" alt="image">
                            </div>
                            <h3>Steven Smith</h3>
                            <span>Web Developer</span>
                            <p>Quis ipsum suspendisse ultrices gravida. Risus commodo viverra maecenas accumsan lacus vel facilisis. Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
                        </div>
                    </div>

                    <div class="item">
                        <div class="single-feedback">
                            <div class="client-img">
                                <img src="{{ asset('frontend/img/2.jpg') }}" alt="image">
                            </div>
                            <h3>Steven Lucy</h3>
                            <span>Web Developer</span>
                            <p>Quis ipsum suspendisse ultrices gravida. Risus commodo viverra maecenas accumsan lacus vel facilisis. Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
                        </div>
                    </div>

                    <div class="item">
                        <div class="single-feedback">
                            <div class="client-img">
                                <img src="{{ asset('frontend/img/3.jpg') }}" alt="image">
                            </div>
                            <h3>John Terry</h3>
                            <span>Web Developer</span>
                            <p>Quis ipsum suspendisse ultrices gravida. Risus commodo viverra maecenas accumsan lacus vel facilisis. Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
                        </div>
                    </div> -->
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

                    <!-- <div class="item">
                        <div class="img-fill"><img src="{{ asset('frontend/img/2.jpg') }}" alt="client"></div>
                    </div>

                    <div class="item">
                        <div class="img-fill"><img src="{{ asset('frontend/img/3.jpg') }}" alt="client"></div>
                    </div>

                    <div class="item">
                        <div class="img-fill"><img src="{{ asset('frontend/img/4.jpg') }}" alt="client"></div>
                    </div>

                    <div class="item">
                        <div class="img-fill"><img src="{{ asset('frontend/img/5.jpg') }}" alt="client"></div>
                    </div>

                    <div class="item">
                        <div class="img-fill"><img src="{{ asset('frontend/img/1.jpg') }}" alt="client"></div>
                    </div>

                    <div class="item">
                        <div class="img-fill"><img src="{{ asset('frontend/img/2.jpg') }}" alt="client"></div>
                    </div>

                    <div class="item">
                        <div class="img-fill"><img src="{{ asset('frontend/img/3.jpg') }}" alt="client"></div>
                    </div> -->
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
