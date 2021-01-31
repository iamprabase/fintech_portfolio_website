@extends('layouts.frontend.app')

@section('content')
<!-- Start Page Title Area -->
  <div class="page-title-area item-bg2 jarallax" data-jarallax='{"speed": 0.3}'>
      <div class="container">
          <div class="page-title-content">
              <h2>Contact Us</h2>
          </div>
      </div>
  </div>
  <!-- End Page Title Area -->

<!-- Start Contact Area -->
  <section class="contact-area ptb-70">
      <div class="container">
          <div class="section-title">
              <h2>Get In Touch With Us</h2>
              <div class="bar"></div>
              <p>Fill out the form and we'll be in touch with you as soon as possible.</p>
          </div>

          <div class="row">
              <div class="col-lg-5 col-md-12">
                  <div class="contact-info">
                      <ul>
                          <li>
                              <div class="icon">
                                  <i class="fas fa-map-marker-alt"></i>
                              </div>
                              <span>Address</span>
                              {{$settings?$settings->location:null}}
                          </li>

                          <li>
                              <div class="icon">
                                  <i class="fas fa-envelope"></i>
                              </div>
                              <span>Email</span>
                              <a href="mailto:{{$settings?$settings->email:null}}">{{$settings?$settings->email:null}}</a>
                          </li>

                          <li>
                              <div class="icon">
                                  <i class="fas fa-phone-volume"></i>
                              </div>
                              <span>Phone</span>
                              <a href="tel:{{$settings?$settings->phone:null}}">{{$settings?$settings->phone:null}}</a>
                          </li>
                      </ul>
                  </div>
              </div>

              <div class="col-lg-7 col-md-12">
                  <div class="contact-form">
                      <form action="{{ route('visitor.contactus') }}" method="POST" id="contactForm">
                          @csrf
                          <div class="row">
                              <div class="col-lg-6 col-md-6">
                                  <div class="form-group">
                                      <input type="text" name="name" id="name" class="form-control" required data-error="Please enter your name" placeholder="Name">
                                      <div class="help-block with-errors"></div>
                                  </div>
                              </div>

                              <div class="col-lg-6 col-md-6">
                                  <div class="form-group">
                                      <input type="email" name="email" id="email" class="form-control" required data-error="Please enter your email" placeholder="Email">
                                      <div class="help-block with-errors"></div>
                                  </div>
                              </div>

                              <div class="col-lg-6 col-md-6">
                                  <div class="form-group">
                                      <input type="text" name="phone_number" id="phone_number" required data-error="Please enter your number" class="form-control" placeholder="Phone">
                                      <div class="help-block with-errors"></div>
                                  </div>
                              </div>

                              <div class="col-lg-6 col-md-6">
                                  <div class="form-group">
                                      <input type="text" name="msg_subject" id="msg_subject" class="form-control" required data-error="Please enter your subject" placeholder="Subject">
                                      <div class="help-block with-errors"></div>
                                  </div>
                              </div>

                              <div class="col-lg-12 col-md-12">
                                  <div class="form-group">
                                      <textarea name="message" class="form-control" id="message" cols="30" rows="6" required data-error="Write your message" placeholder="Your Message"></textarea>
                                      <div class="help-block with-errors"></div>
                                  </div>
                              </div>

                              <div class="col-lg-12 col-md-12">
                                  <button type="submit" class="btn btn-primary">Send Message</button>
                                  <div id="msgSubmit" class="h3 text-center hidden"></div>
                                  <div class="clearfix"></div>
                              </div>
                          </div>
                      </form>
                  </div>
              </div>
          </div>
      </div>

      <div class="bg-map"><img src="{{asset('frontend/img/map.png')}}" alt="image"></div>
  </section>
  <!-- End Contact Area -->
<!-- Start Account Create Area -->
@endsection

@section('customscripts')
<script>
$('#contactForm').submit(function(e){
    e.preventDefault();
    let current = $(this);
    let name = current.find('#name').val();
    let email = current.find('#email').val();
    let phone_number = current.find('#phone_number').val();
    let msg_subject = current.find('#msg_subject').val();
    let message = current.find('#message').val();

    $.ajax({
        headers: {
            'X-CSRF-TOKEN':  "{{ csrf_token() }}"
        },
        method: "POST",
        url: "{{route('visitor.contactus.post')}}",
        data: {
            name : name,
            email : email,
            phone_number : phone_number,
            msg_subject : msg_subject,
            message : message,
        },
        beforeSend: function(){
            current.find('.btn').prop("disabled", "disabled");
        },
        success: function(response){
            if(response.status === 200) alert("Submitted successfully");
            else alert("Some error occured while submitting.");
        },
        error: function(xhr){
            console.log(xhr.responseText);
            alert("Sorry Your request cannot be processed.");

        },
        complete: function(){
            current.find('.btn').prop("disabled", false);
            current[0].reset();
        },
    });
});
</script>
@endsection
