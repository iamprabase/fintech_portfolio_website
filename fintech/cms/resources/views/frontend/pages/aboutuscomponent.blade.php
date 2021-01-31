@extends('layouts.frontend.app')

@section('content')
<!-- Start Page Title Area -->
      <div class="page-title-area item-bg1 jarallax" data-jarallax='{"speed": 0.3}'>
          <div class="container">
              <div class="page-title-content">
                  <h2>About Us</h2>
                  <p>Lorem ipsum dolor sit amet</p>
              </div>
          </div>
      </div>
      <!-- End Page Title Area -->

      <!-- Start About Area -->
      <section class="about-area ptb-70">
          <div class="container">
              <div class="row align-items-center">
                  <div class="col-lg-6 col-md-12">
                      <div class="about-image">
                          <img src="{{ asset('frontend/img/Group22.png') }}" alt="image">
                      </div>
                  </div>

                  <div class="col-lg-6 col-md-12">
                      <div class="about-content">
                          <span>How we were founded</span>
                          <h2>Easy, fee-free banking for entrepreneurs</h2>
                          <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.</p>
                          <p>Every month they moved their money the old way – which wasted their time and money. So they invented a beautifully simple workaround that became a billion-dollar business.</p>
                      </div>
                  </div>
              </div>
          </div>
      </section>
      <!-- End About Area -->


      <!-- Start Ready To Talk Area -->
      <section class="ready-to-talk">
          <div class="container">
              <div class="ready-to-talk-content">
                  <h3>Ready to talk?</h3>
                  <p>Our team is here to answer your question about Luvion</p>
                  <a href="#" class="btn btn-primary">Contact Us</a>
                  <span><a href="#">Or, get started now with a free trial</a></span>
              </div>
          </div>
      </section>
      <!-- End Ready To Talk Area -->

      <!-- Start Partner Area -->
      <div class="partner-area">
          <div class="container">

              <h3>More that 1.5 million businesses and organizations use Yatra Card</h3>

              <div class="partner-inner">
                  <div class="row align-items-center">
                      <div class="col-md-3">
                          <a href="#">
                              <img src="{{ asset('frontend/img/partner1.png') }}" alt="partner">
                          </a>
                      </div>
                        <div class="col-md-3">
                          <a href="#">
                              <img src="{{ asset('frontend/img/partner2.png') }}" alt="partner">
                          </a>
                      </div>
                        <div class="col-md-3">
                          <a href="#">
                              <img src="{{ asset('frontend/img/partner3.png') }}" alt="partner">
                          </a>
                      </div>
                        <div class="col-md-3">
                          <a href="#">
                              <img src="{{ asset('frontend/img/partner4.png') }}" alt="partner">
                          </a>
                      </div>

                      <div class="col-md-3">
                          <a href="#">
                              <img src="{{ asset('frontend/img/partner4.png') }}" alt="partner">
                          </a>
                      </div>
                        <div class="col-md-3">
                          <a href="#">
                              <img src="{{ asset('frontend/img/partner3.png') }}" alt="partner">
                          </a>
                      </div>
                        <div class="col-md-3">
                          <a href="#">
                              <img src="{{ asset('frontend/img/partner2.png') }}" alt="partner">
                          </a>
                      </div>
                        <div class="col-md-3">
                          <a href="#">
                              <img src="{{ asset('frontend/img/partner1.png') }}" alt="partner">
                          </a>
                      </div>


                  </div>
              </div>
          </div>
      </div>
      <!-- End Partner Area -->


<section class="payment-experience-area bg-f4fcff ptb-70">
          <div class="container">
              <div class="row align-items-center">
                  <div class="col-lg-5 col-md-12">
                      <div class="payment-experience-content">
                          <h2>Create seamless payment experiences</h2>
                          <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Quis ipsum suspendisse ultrices gravida. Risus commodo viverra maecenas accumsan lacus vel.</p>
                          <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Quis ipsum suspendisse ultrices gravida. Risus commodo viverra maecenas accumsan lacus vel.</p>
                          <a href="#" class="link-btn">Start with payments</a>
                      </div>
                  </div>

                  <div class="col-lg-7 col-md-12">
                      <div class="payment-experience-image text-center">
                          <img src="{{ asset('frontend/img/features-img1.png') }}" alt="image">
                      </div>
                  </div>
              </div>

              <div class="row">
                  <div class="col-lg-3 col-sm-6 col-md-6">
                      <div class="single-payment-experience-box">
                          <div class="icon">
                              <i class="fas fa-chart-line"></i>
                          </div>
                          <h3>Faster Growth</h3>
                          <p>Labore et dolore magna aliqua. Quis ipsum suspendisse ultrices gravida. Risus commodo viverra maecenas accumsan.</p>
                      </div>
                  </div>

                  <div class="col-lg-3 col-sm-6 col-md-6">
                      <div class="single-payment-experience-box">
                          <div class="icon">
                              <i class="fab fa-audible"></i>
                          </div>
                          <h3>Amazing Experiences</h3>
                          <p>Labore et dolore magna aliqua. Quis ipsum suspendisse ultrices gravida. Risus commodo viverra maecenas accumsan.</p>
                      </div>
                  </div>

                  <div class="col-lg-3 col-sm-6 col-md-6">
                      <div class="single-payment-experience-box">
                          <div class="icon">
                              <i class="fas fa-credit-card"></i>
                          </div>
                          <h3>Global Payments</h3>
                          <p>Labore et dolore magna aliqua. Quis ipsum suspendisse ultrices gravida. Risus commodo viverra maecenas accumsan.</p>
                      </div>
                  </div>

                  <div class="col-lg-3 col-sm-6 col-md-6">
                      <div class="single-payment-experience-box">
                          <div class="icon">
                              <i class="fab fa-expeditedssl"></i>
                          </div>
                          <h3>Secure Payments</h3>
                          <p>Labore et dolore magna aliqua. Quis ipsum suspendisse ultrices gravida. Risus commodo viverra maecenas accumsan.</p>
                      </div>
                  </div>
              </div>
          </div>
      </section>


<!-- Start App Download Area -->
<section class="app-download-area">
  <div class="container">
      <div class="row align-items-center">
          <div class="col-lg-6 col-md-12">
              <div class="app-image">
                  <div class="main-image">
                      <img src="{{ asset('frontend/img/mobile-app1.png') }}" class="wow fadeInLeft" data-wow-delay="0.6s" alt="image">
                      <img src="{{ asset('frontend/img/mobile-app2.png') }}" class="wow fadeInUp" data-wow-delay="0.9s" alt="image">
                  </div>
                  <div class="main-mobile-image">
                      <img src="{{ asset('frontend/img/main-mobile.png') }}" class="wow fadeInUp" data-wow-delay="0.6s" alt="image">
                  </div>
                  <div class="circle-img">
                      <img src="{{ asset('frontend/img/circle.png') }}" alt="image">
                  </div>
              </div>
          </div>
          <div class="col-lg-6 col-md-12">
              <div class="app-download-content">
                  <h2>You can find all the thing you need to payout</h2>
                  <div class="bar"></div>
                  <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip.</p>
                  <div class="btn-box">
                      <a href="#" class="app-store-btn">
                          <i class="fab fa-apple"></i>
                          Download on
                          <span>App Store</span>
                      </a>
                      <a href="#" class="play-store-btn">
                          <i class="fab fa-google-play"></i>
                          Download on
                          <span>Google play</span>
                      </a>
                  </div>
              </div>
          </div>
      </div>
  </div>
</section>
<!-- End App Download Area -->

      <!-- Start Services Area -->
      <section class="services-area ptb-70">
          <div class="container-fluid p-0">
              <div class="overview-box">
                  <div class="overview-content">
                      <div class="content left-content">
                          <span class="sub-title">Price Transparency</span>
                          <h2>Large or enterprise level businesses</h2>
                          <div class="bar"></div>
                          <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>

                          <ul class="features-list">
                              <li><span><i class="fas fa-check"></i> Corporate Cards</span></li>
                              <li><span><i class="fas fa-check"></i> International Payments</span></li>
                              <li><span><i class="fas fa-check"></i> Automated accounting</span></li>
                              <li><span><i class="fas fa-check"></i> Request Features</span></li>
                              <li><span><i class="fas fa-check"></i> Premium Support</span></li>
                              <li><span><i class="fas fa-check"></i> Direct Debit</span></li>
                          </ul>

                          <a href="#" class="btn btn-primary">Create Account</a>
                      </div>
                  </div>

                  <div class="overview-image">
                      <div class="image">
                          <img src="{{ asset('frontend/img/1a.jpg') }}" alt="image">
                      </div>
                  </div>
              </div>
          </div>
      </section>
      <!-- End Services Area -->

<!-- Start Account Create Area -->
<section class="account-create-area">
  <div class="container">
      <div class="account-create-content">
          <h2>Apply for an account in minutes</h2>
          <p>Get your yatra account today!</p>
          <a href="#" class="btn btn-primary">Get Your Yatra Account</a>
      </div>
  </div>
</section>
<!-- End Account Create Area -->

  <!-- Start Services Area -->
      <section class="services-area ptb-70 bg-f7fafd">
          <div class="container-fluid p-0">
              <div class="overview-box">
                  <div class="overview-image">
                      <div class="image">
                          <img src="{{ asset('frontend/img/2a.jpg') }}" alt="image">
                      </div>
                  </div>

                  <div class="overview-content">
                      <div class="content">
                          <span class="sub-title">Automated Accounting</span>
                          <h2>Save 24 hours per week on accounting</h2>
                          <div class="bar"></div>
                          <p>Sed do eiusmod tempor incididunt ut labore et dolore magna aliqua, lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>

                          <ul class="features-list">
                              <li><span><i class="fas fa-check"></i> Easy transfers</span></li>
                              <li><span><i class="fas fa-check"></i> Deposit checks instantly</span></li>
                              <li><span><i class="fas fa-check"></i> A powerful open API</span></li>
                              <li><span><i class="fas fa-check"></i> Coverage around the world</span></li>
                              <li><span><i class="fas fa-check"></i> Business without borders</span></li>
                              <li><span><i class="fas fa-check"></i> Affiliates and partnerships</span></li>
                          </ul>

                          <a href="#" class="btn btn-primary">Learn More</a>
                      </div>
                  </div>
              </div>
          </div>
      </section>
      <!-- End Services Area -->

      <!-- Start Comparisons Area -->
      <section class="comparisons-area ptb-70 bg-f6f4f8">
          <div class="container">
              <div class="section-title">
                  <h2>Compare us with others</h2>
                  <div class="bar"></div>
                  <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
              </div>

              <div class="comparisons-table table-responsive">
                  <table class="table">
                      <thead>
                          <tr>
                              <th scope="col">Packages</th>
                              <th scope="col">Freelancer</th>
                              <th scope="col">Householder</th>
                              <th scope="col">Business Man</th>
                          </tr>
                      </thead>

                      <tbody>
                          <tr>
                              <td>Control payout timing</td>
                              <td><i class="fas fa-check"></i></td>
                              <td><i class="fas fa-check"></i></td>
                              <td><i class="fas fa-check"></i></td>
                          </tr>
                          <tr>
                              <td>Transparent payouts</td>
                              <td><i class="fas fa-check"></i></td>
                              <td><i class="fas fa-times"></i></td>
                              <td><i class="fas fa-check"></i></td>
                          </tr>
                          <tr>
                              <td>Automate evidence submission</td>
                              <td><i class="fas fa-times"></i></td>
                              <td><i class="fas fa-check"></i></td>
                              <td><i class="fas fa-check"></i></td>
                          </tr>
                          <tr>
                              <td>Collaboration notes</td>
                              <td><i class="fas fa-check"></i></td>
                              <td><i class="fas fa-times"></i></td>
                              <td><i class="fas fa-times"></i></td>
                          </tr>
                          <tr>
                              <td>Deposit tagging</td>
                              <td><i class="fas fa-check"></i></td>
                              <td><i class="fas fa-check"></i></td>
                              <td><i class="fas fa-times"></i></td>
                          </tr>
                          <tr>
                              <td>Technical support over IRC</td>
                              <td><i class="fas fa-check"></i></td>
                              <td><i class="fas fa-check"></i></td>
                              <td><i class="fas fa-check"></i></td>
                          </tr>
                          <tr>
                              <td>24×7 support</td>
                              <td><i class="fas fa-times"></i></td>
                              <td><i class="fas fa-check"></i></td>
                              <td><i class="fas fa-check"></i></td>
                          </tr>
                      </tbody>
                  </table>
              </div>
          </div>
      </section>
      <!-- End Comparisons Area -->

      <!-- Start Features Area -->
<section class="features-section ptb-70 bg-f7fafd">
  <div class="container">
      <div class="section-title">
          <h2>Our Features</h2>
          <div class="bar"></div>
          <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
      </div>
  </div>
  <div class="container-fluid">
      <div class="row align-items-center">
          <div class="col-lg-5 col-md-12">
              <div class="features-box-list">
                  <div class="row">
                      <div class="col-lg-12 col-sm-6 col-md-6">
                          <div class="features-box">
                              <div class="icon">
                                  <i class="fas fa-cog"></i>
                              </div>
                              <h3>Incredible infrastructure</h3>
                              <p>Lorem ipsum dolor amet, adipiscing, sed do eiusmod tempor incididunt ut labore dolore magna aliqua.</p>
                          </div>
                      </div>
                      <div class="col-lg-12 col-sm-6 col-md-6">
                          <div class="features-box">
                              <div class="icon bg-f78acb">
                                  <i class="far fa-envelope"></i>
                              </div>
                              <h3>Email notifications</h3>
                              <p>Lorem ipsum dolor amet, adipiscing, sed do eiusmod tempor incididunt ut labore dolore magna aliqua.</p>
                          </div>
                      </div>
                      <div class="col-lg-12 col-sm-6 col-md-6">
                          <div class="features-box">
                              <div class="icon bg-cdf1d8">
                                  <i class="fas fa-th-list"></i>
                              </div>
                              <h3>Simple dashboard</h3>
                              <p>Lorem ipsum dolor amet, adipiscing, sed do eiusmod tempor incididunt ut labore dolore magna aliqua.</p>
                          </div>
                      </div>
                      <div class="col-lg-12 col-sm-6 col-md-6">
                          <div class="features-box">
                              <div class="icon bg-c679e3">
                                  <i class="fas fa-info-circle"></i>
                              </div>
                              <h3>Information retrieval</h3>
                              <p>Lorem ipsum dolor amet, adipiscing, sed do eiusmod tempor incididunt ut labore dolore magna aliqua.</p>
                          </div>
                      </div>
                  </div>
              </div>
          </div>
          <div class="col-lg-7 col-md-12">
              <div class="features-image">
                  <img src="{{ asset('frontend/img/features-img1.png') }}" alt="image">
              </div>
          </div>
      </div>
  </div>
</section>
<!-- End Features Area -->

      <!-- Start Invoicing Area -->
      <section class="invoicing-area ptb-70">
          <div class="container-fluid">
              <div class="row align-items-center">
                  <div class="col-lg-6 col-md-12">
                      <div class="invoicing-content">
                          <h2>Easy Payment to borrow free get a better filling at home</h2>
                          <div class="bar"></div>
                          <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip.</p>
                          <a href="#" class="btn btn-primary">Get Started</a>
                      </div>
                  </div>

                  <div class="col-lg-6 col-md-12">
                      <div class="invoicing-image">
                          <div class="main-image">
                              <img src="{{ asset('frontend/img/a.png') }}" class="wow zoomIn" data-wow-delay="0.7s" alt="image">
                              <img src="{{ asset('frontend/img/b.png') }}" class="wow fadeInLeft" data-wow-delay="1s" alt="image">
                              <img src="{{ asset('frontend/img/c.png') }}" class="wow fadeInLeft" data-wow-delay="1.3s" alt="image">
                              <img src="{{ asset('frontend/img/d.png') }}" class="wow fadeInRight" data-wow-delay="1s" alt="image">
                          </div>

                          <div class="main-mobile-image">
                              <img src="{{ asset('frontend/img/main-pic.png') }}" class="wow zoomIn" data-wow-delay="0.7s" alt="image">
                          </div>

                          <div class="circle-image">
                              <img src="{{ asset('frontend/img/circle1.png') }}" alt="image">
                              <img src="{{ asset('frontend/img/circle2.png') }}" alt="image">
                          </div>
                      </div>
                  </div>
              </div>
          </div>
      </section>
      <!-- End Invoicing Area -->

<section class="team-area ptb-70">
          <div class="container">
              <div class="row">
                  <div class="col-lg-6 col-md-6">
                      <div class="single-team-member">
                          <div class="member-image">
                              <img src="assets/img/team-img1.jpg" alt="image">

                              <ul class="social">
                                  <li><a href="#" target="_blank"><i class="fab fa-facebook-f"></i></a></li>
                                  <li><a href="#"><i class="fab fa-linkedin-in"></i></a></li>
                              </ul>
                          </div>

                          <div class="member-content">
                              <h3>James Anderson</h3>
                              <span>CEO & Founder</span>
                              <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley.</p>
                          </div>
                      </div>
                  </div>

                  <div class="col-lg-6 col-md-6">
                      <div class="single-team-member">
                          <div class="member-image">
                              <img src="assets/img/team-img2.jpg" alt="image">

                              <ul class="social">
                                  <li><a href="#" target="_blank"><i class="fab fa-facebook-f"></i></a></li>
                                  <li><a href="#"><i class="fab fa-linkedin-in"></i></a></li>
                              </ul>
                          </div>

                          <div class="member-content">
                              <h3>Sarah Taylor</h3>
                              <span>Co-Founder</span>
                              <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley.</p>
                          </div>
                      </div>
                  </div>

                  <div class="col-lg-6 col-md-6">
                      <div class="single-team-member">
                          <div class="member-image">
                              <img src="assets/img/team-img3.jpg" alt="image">

                              <ul class="social">
                                  <li><a href="#" target="_blank"><i class="fab fa-facebook-f"></i></a></li>
                                  <li><a href="#"><i class="fab fa-linkedin-in"></i></a></li>
                              </ul>
                          </div>

                          <div class="member-content">
                              <h3>Steven Smith</h3>
                              <span>Web Developer</span>
                              <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley.</p>
                          </div>
                      </div>
                  </div>

                  <div class="col-lg-6 col-md-6">
                      <div class="single-team-member">
                          <div class="member-image">
                              <img src="assets/img/team-img4.jpg" alt="image">

                              <ul class="social">
                                  <li><a href="#" target="_blank"><i class="fab fa-facebook-f"></i></a></li>
                                  <li><a href="#"><i class="fab fa-linkedin-in"></i></a></li>
                              </ul>
                          </div>

                          <div class="member-content">
                              <h3>John Capabel</h3>
                              <span>Programer</span>
                              <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley.</p>
                          </div>
                      </div>
                  </div>
              </div>
          </div>
      </section>
      <!-- End Team Area -->
      <!-- End About Area -->
@endsection

@section('customscripts')
@endsection
