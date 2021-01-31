<!--================Top Header Area =================-->
<!-- Start Navbar Area -->
<div class="navbar-area">
    <div class="luvion-responsive-nav">
        <div class="container">
            <div class="luvion-responsive-menu">
                <div class="logo">
                    @if($settings)
                    <a href="{{route('visitor.home')}}">
                            <img src="{{asset($settings->site_logo)}}" alt="logo">
                            <img src="{{asset($settings->site_logo)}}" alt="logo">
                    </a>
                    @endif
                </div>
            </div>
        </div>
    </div>
    <div class="luvion-nav">
        <div class="container">
            <nav class="navbar navbar-expand-md navbar-light">
                @if($settings)
                <a class="navbar-brand" href="{{route('visitor.home')}}">
                        <img src="{{asset($settings->site_logo)}}" alt="logo">
                        <img src="{{asset($settings->site_logo)}}" alt="logo">
                </a>
                @endif
                <div class="collapse navbar-collapse mean-menu" id="navbarSupportedContent">
                    <ul class="navbar-nav">
                        <li class="nav-item"><a href="{{route('visitor.home')}}" class="nav-link active">Home</a></li>
                        <li class="nav-item"><a href="{{route('visitor.services')}}" class="nav-link">Services</a>
                        </li>
                        <li class="nav-item"><a href="#" class="nav-link">Product <i class="fas fa-chevron-down"></i></a>
                        @if(!empty($all_products))
                            <ul class="dropdown-menu">
                                @foreach($all_products as $id=>$product)
                                    <li class="nav-item"><a href="{{route('visitor.product.get', [$id]) }}" class="nav-link">{{$product}}</a></li>
                                @endforeach
                            </ul>
                        @endif
                        </li>
                        <li class="nav-item"><a href="{{route('visitor.events')}}" class="nav-link">Events</a>
                        </li>
                        <li class="nav-item"><a href="{{route('visitor.aboutus')}}" class="nav-link">About Us <i class="fas fa-chevron-down"></i></a>
                            <ul class="dropdown-menu">
                                <li class="nav-item"><a href="{{ request()->is('aboutus*') ? '#about' : '/aboutus#about' }}" class="nav-link">About Fintech</a></li>
                                <li class="nav-item"><a href="{{ request()->is('aboutus*') ? '#mission' : '/aboutus#mission' }}" class="nav-link">Mission</a></li>
                                <li class="nav-item"><a href="{{ request()->is('aboutus*') ? '#vision' : '/aboutus#vision' }}" class="nav-link">Vision</a></li>
                                <li class="nav-item"><a href="{{ request()->is('aboutus*') ? '#values' : '/aboutus#values' }}" class="nav-link">Values</a></li>
                                <li class="nav-item"><a href="{{ request()->is('aboutus*') ? '#goals' : '/aboutus#goals' }}" class="nav-link">Goal</a></li>
                                <li class="nav-item"><a href="{{route('visitor.bod.get')}}" class="nav-link">Board of Directors</a></li>
                            </ul>
                        </li>
                        @if($blogs_count>0)
                          <li class="nav-item"><a href="{{route('visitor.blogs')}}" class="nav-link">Blogs</a></li>
                        @endif
                        <li class="nav-item"><a href="{{route('visitor.contactus')}}" class="nav-link">Contact Us</a></li>
                    </ul>
                </div>
            </nav>
        </div>
    </div>
</div>
<!-- End Navbar Area -->
