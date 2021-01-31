@extends('layouts.frontend.app')
@section('customstyles')
<style>
    .btn:focus, .btn:active, button:focus, button:active {
        outline: none !important;
        box-shadow: none !important;
    }

    #image-gallery .modal-footer{
        display: block;
    }

    .thumb{
        margin-top: 15px;
        margin-bottom: 15px;
    }
    
    .img-thumbnail{
        height: 250px;
        object-fit: cover;
    }
    
    .modal-content {
        background-color: unset;
        border: unset;
    }
    
    .modal-header{
        border-bottom: unset;
    }
    
    .modal-footer{
        border-top: unset;
        position: absolute;
    }
    
    .btn-secondary, button.close{
        background-color: #eeeff0c7;
        color: #333;
    }

    .close{
      border-radius: 50%;
      padding: 5px 10px!important;
    }

    .imgCaption>p {
      line-height: 1.7;
      margin-bottom: 15px;
      color: #f8fcff;
      font-weight: 700;
      font-size: 25px;
    }

    .imgContent{
      display: flex;
      justify-content: center;
      align-content: center;
      align-items: center;
    }

    .next-image{
      height: 100px;
    }
</style>
@endsection
@section('content')
 <!-- Start Page Title Area -->
<div class="page-title-area item-bg1 jarallax" data-jarallax='{"speed": 0.3}'>
    <div class="container">
        <div class="page-title-content">
            <h2>Events</h2>
        </div>
    </div>
</div>

<section class="about-area ptb-70">
<div class="container">
	<!-- <div class="row"> -->
		<div class="row  text-center text-lg-left">
            @if($events->first())
                @foreach($events as $event)
                    <div class="col-lg-3 col-md-4 col-xs-6 thumb">
                        <a class="thumbnail" href="#" data-image-id="" data-toggle="modal" data-title="{{$event->title}}"
                        data-image="{{asset($event->image)}}"
                        data-target="#image-gallery">
                            <img class="img-thumbnail"
                                src="{{asset($event->image)}}"
                                alt="Another alt text">
                        </a>
                    </div>
                @endforeach
            @endif
        </div>


        <div class="modal fade" id="image-gallery" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title" id="image-gallery-title"></h4>
                        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span><span class="sr-only">Close</span>
                        </button>
                    </div>
                    <div class="modal-body">
                      <div class="imgContent">
                      <div>
                        <button type="button" class="btn btn-secondary float-left next-image" id="show-previous-image"><i class="fa fa-arrow-left"></i>
                        </button>
                      </div>
                      <div>
                        <img id="image-gallery-image" class="img-responsive col-md-12" src="Event Image">
                      </div>
                      <div>
                        <button type="button" id="show-next-image" class="btn btn-secondary float-right next-image"><i class="fa fa-arrow-right"></i>
                        </button>
                      </div>
                      </div>
                      <div class="imgCaption text-center">
                        <p id="imgCaption">Image Caption </p>
                      </div>
                    </div>
                    <div class="modal-footer">
                        
                    </div>
                </div>
            </div>
        </div>
	<!-- </div> -->
</div>
</section>
@endsection

@section('customscripts')
<script>
let modalId = $('#image-gallery');

$(document)
  .ready(function () {

    loadGallery(true, 'a.thumbnail');

    //This function disables buttons when needed
    function disableButtons(counter_max, counter_current) {
      $('#show-previous-image, #show-next-image')
        .show();
      if (counter_max === counter_current) {
        $('#show-next-image')
          .hide();
      } else if (counter_current === 1) {
        $('#show-previous-image')
          .hide();
      }
    }

    /**
     *
     * @param setIDs        Sets IDs when DOM is loaded. If using a PHP counter, set to false.
     * @param setClickAttr  Sets the attribute for the click handler.
     */

    function loadGallery(setIDs, setClickAttr) {
      let current_image,
        selector,
        counter = 0;

      $('#show-next-image, #show-previous-image')
        .click(function () {
          if ($(this)
            .attr('id') === 'show-previous-image') {
            current_image--;
          } else {
            current_image++;
          }

          selector = $('[data-image-id="' + current_image + '"]');
          updateGallery(selector);
        });

      function updateGallery(selector) {
        let $sel = selector;
        current_image = $sel.data('image-id');
        $('#imgCaption')
          .text($sel.data('title'));
        $('#image-gallery-image')
          .attr('src', $sel.data('image'));
        disableButtons(counter, $sel.data('image-id'));
      }

      if (setIDs == true) {
        $('[data-image-id]')
          .each(function () {
            counter++;
            $(this)
              .attr('data-image-id', counter);
          });
      }
      $(setClickAttr)
        .on('click', function () {
          updateGallery($(this));
        });
    }
  });

// build key actions
$(document)
  .keydown(function (e) {
    switch (e.which) {
      case 37: // left
        if ((modalId.data('bs.modal') || {})._isShown && $('#show-previous-image').is(":visible")) {
          $('#show-previous-image')
            .click();
        }
        break;

      case 39: // right
        if ((modalId.data('bs.modal') || {})._isShown && $('#show-next-image').is(":visible")) {
          $('#show-next-image')
            .click();
        }
        break;

      default:
        return; // exit this handler for other keys
    }
    e.preventDefault(); // prevent the default action (scroll / move caret)
  });
</script>
@endsection
