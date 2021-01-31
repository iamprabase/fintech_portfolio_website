@extends('layouts.frontend.app')

@section('content')
 <div class="page-title-area item-bg1 jarallax" data-jarallax='{"speed": 0.3}'>
    <div class="container">
        <div class="page-title-content">
            <h2>{{$product->title}}</h2>
        </div>
    </div>
</div>


<section class="payment-experience-area">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-5 col-md-12">
                <div class="payment-experience-content">
                    <h2>{{$product->title}}</h2>
                    <p>{!! $product->description !!}</p>
                </div>
            </div>

            <div class="col-lg-7 col-md-12">
                <div class="payment-experience-image text-center">
                    <img src="{{ asset($product->image) }}" alt="image">
                </div>
            </div>
        </div>

        <div class="row">
            {!! $product->description_details !!}
        </div>
    </div>
</section>


@include('frontend/sections.account-create')
@endsection
