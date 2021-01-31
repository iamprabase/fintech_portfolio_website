<!-- Start Main Banner Area -->
<div class="main-banner-section jarallax" data-jarallax='{"speed": 0.3}' @if($hero_images) @if($hero_images->back_hero_active) style="background-image: url('{{ asset($hero_images->hero_back)}}');" @endif @endif>
    <div class="d-table">
        <div class="d-table-cell">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-6 col-md-12">
                        <div class="banner-content">
                            @if($hero_images)
                                <h1>{{$hero_images->hero_title}}</h1>
                                <p>{{$hero_images->hero_sub_title}} </p>
                            @endif
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-12">
                        <div class="banner-sub-image">
                            @if($hero_images)
                                @if($hero_images->front_hero_active)
                                    <img src="{{ asset($hero_images->hero_front) }}">
                                @endif
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- End Main Banner Area -->
