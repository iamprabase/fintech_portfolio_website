<header class="app-header"><a class="app-header__logo" href="{{ route('admin.dashboard') }}">{{ config('app.name', 'Fintech Admin Panel') }}</a>
    <!-- Sidebar toggle button-->
    <a class="app-sidebar__toggle" href="#" data-toggle="sidebar" aria-label="Hide Sidebar"></a>
    <!-- Navbar Right Menu-->
    <ul class="app-nav">
        <!-- User Menu-->
        <li class="dropdown"><a class="app-nav__item" href="#" data-toggle="dropdown" aria-label="Open Profile Menu"><i class="fa fa-user fa-lg"></i></a>
            <ul class="dropdown-menu settings-menu dropdown-menu-right">
                <!-- <li><a class="dropdown-item" href="{{ route('admin.settings.get') }}"><i class="fa fa-cog fa-lg"></i> Settings</a></li> -->
                <li><a class="dropdown-item" href="{{ route('admin.profile.get', [auth()->id()]) }}"><i class="fa fa-user fa-lg"></i> Profile</a></li>
                <li><a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();document.getElementById('logout-form').submit();"><i class="fa fa-sign-out fa-lg"></i> {{ __('Logout') }}</a></li>
            </ul>
        </li>
    </ul>
</header>
<form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
    @csrf
</form>
