@extends('layouts.frontend.app')

@section('customstyles')
<style>
.html {
  height: 100%;
}
.slick-container {
  height: 50%;
}
.slick-dots {
    position: absolute;
    bottom: 25px!important;
    
}
.slick-slider, .slick-list, .slick-track {
  height: 100%;
}
.slick-dotted.slick-slider {
    margin-bottom: 0px!important; 
}

  .slider {
        width: 100%;
        margin: 0px auto;
    }

    .slick-slide {
      margin: 0px 20px;
    }

    .slick-slide img {
      width: 100%;
      max-height: 85vh!important;
    }
    
    .slick-slider { display: table; table-layout: fixed; width: 100%; }

    .slick-prev:before,
    .slick-next:before {
      color: black;
    }


    .slick-slide {
      transition: all ease-in-out .3s;
      opacity: .2;
    }
    
    .slick-active {
      opacity: .5;
    }

    .slick-current {
      opacity: 1;
    } 

    .slick-dots li button {
      font-size: 10px;
      line-height: 0;
      display: block;
      width: 20px;
      height: 20px;
      padding: 5px;
      cursor: pointer;
      color: #e0292900;
      border: 0;
      outline: none;
      background: #f7f7f7;
      border-radius: 50%;
    }
    .slick-list.draggable{
         max-height: 85vh!important;
    }

    .modal-backdrop
    {
        opacity:0.5 !important;
    }
    .modal-header
    {
        border-bottom: 1px solid #e9ecef00!important;
    }
    .close{
      font-size: 35px!important;
      color: #ffffff00;
    }

    .modal-body{
          padding: 0px!important;
    }
    
    /*.flex-child {*/
    /*  flex: 1;*/
    /*  overflow: hidden;*/
    /*}*/
</style>
@endsection

@section('content')
    @include('frontend/sections.main-banner')
    @include('frontend/sections.featured-boxes')
    @include('frontend/sections.works-area')
    @include('frontend/sections.services')
    @include('frontend/sections.fun-facts')
    @include('frontend/sections.feedback')
    @include('frontend/sections.app-download')
    @include('frontend/sections.blog')
    @include('frontend/sections.account-create')
    @if($pageSlider->first())
      <div id="myModal" class="modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        </div>
        <div class="modal-body">
          <div class="slider offset-md-3 col-md-6">
            @foreach($pageSlider as $slider)
            <div class"offset-md-3 col-md-6">
              <img src="{{asset($slider->image)}}" alt="Slider Image">
            </div>
            @endforeach
          </div>
        </div>
      </div>
    @endif
    @endsection

@section('customscripts')
<script>
  @if($pageSlider->first())
  $(document).ready(function(){
    $('#myModal').modal('show');
    $('.close').click(function() {
      $('#myModal').modal('hide');
    });
    $('.slider').slick({
      dots: true,
      autoplay: true,
      autoplaySpeed: 10000,
      arrows : false,
    }); 
  });
  @endif
</script>
@endsection
