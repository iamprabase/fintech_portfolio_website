<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

        <title>{{ $settings?$settings->site_title:'' }} {{$settings?"-".$settings->site_sub_title:''}}  </title>
        @if($settings)
            <link rel="shortcut icon" href="{{asset($settings->site_icon)}}">
            <meta name="keywords" content="{{$settings->meta_keywords}}">
            <meta property="og:description" content="{{$settings->meta_description}}" />
            <meta property="og:title" content="{{$settings->meta_title}}" />
        @endif

        <!-- Bootstrap CSS -->
        <link rel="stylesheet" type="text/css" href="{{ asset('frontend/css/bootstrap.min.css') }}">
        <link rel="stylesheet" type="text/css" href="{{ asset('frontend/css/style.css') }}">
        <link rel="stylesheet" type="text/css" href="{{ asset('frontend/css/responsive.css') }}">
        <link rel="stylesheet" type="text/css" href="{{ asset('frontend/css/animate.min.css') }}">
        <link rel="stylesheet" type="text/css" href="{{ asset('frontend/css/magnific-popup.min.css') }}">
        <link rel="stylesheet" type="text/css" href="{{ asset('frontend/css/odometer.min.css') }}">
        
        <link rel=stylesheet href="{{ asset('frontend/css/meanmenu.css') }}">
        <link rel="stylesheet" type="text/css" href="{{ asset('frontend/css/owl.carousel.min.css') }}">
        <link rel="stylesheet" type="text/css" href="{{ asset('frontend/css/nice-select.css') }}">
        <link rel="stylesheet" type="text/css" href="{{ asset('frontend/css/slick.css') }}">
        <link rel="stylesheet" type="text/css" href="{{ asset('frontend/css/slick-theme.css') }}">
        <link rel="stylesheet" type="text/css" href="{{ asset('frontend/css/owl.carousel.min.css') }}">
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
        <link rel="stylesheet" type="text/css" href="{{ asset('frontend/css/slick.min.css') }}">
        @yield('customstyles')
</head>
<body>
    @include('layouts/frontend.partials.header')

    @yield('content')

    @include('layouts/frontend.partials.footer')
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous" ></script>
    <script src="{{ asset('frontend/js/jquery.min.js') }}"></script>
    
    <!-- <script type="text/javascript" src="//code.jquery.com/jquery-1.11.0.min.js"></script> -->
    <!-- <script type="text/javascript" src="//code.jquery.com/jquery-migrate-1.2.1.min.js"></script> -->
    <script src="{{ asset('frontend/js/jquery.nice-select.js') }}"></script>
    <script src="{{ asset('frontend/js/owl.carousel.min.js') }}"></script>
    <script type="text/javascript">
        $(document).ready(function() {
            $('select').niceSelect();
        });
        // $('.owl-carousel').owlCarousel({
        //     loop:true,
        //     margin:10,
        //     nav:true,
        //     responsive:{
        //         0:{
        //             items:1
        //         },
        //         600:{
        //             items:5
        //         },
        //         1000:{
        //             items:5
        //         }
        //     }
        // });
    </script>
    <script src="{{ asset('frontend/js/popper.min.js') }}" ></script>
    <script src="{{ asset('frontend/js/bootstrap.min.js') }}" ></script>
    <script src="{{ asset('frontend/js/jquery.meanmenu.js') }}" ></script>
    <script src="{{ asset('frontend/js/jquery.magnific-popup.min.js') }}" ></script>
    <script src="{{ asset('frontend/js/jquery.appear.min.js') }}" ></script>
    <script src="{{ asset('frontend/js/odometer.min.js') }}" ></script>
    <script src="{{ asset('frontend/js/parallax.min.js') }}" ></script>
    <script src="{{ asset('frontend/js/wow.min.js') }}" ></script>
    <!-- <script src="{{ asset('frontend/js/form-validator.min.js') }}" ></script> -->
    <!-- <script src="{{ asset('frontend/js/contact-form-script.js') }}" ></script> -->
    <script src="{{ asset('frontend/js/main.js') }}"></script>
    <script src="{{ asset('frontend/js/slick.js') }}" ></script>
    @yield('customscripts')
</body>
</html>
