<div class="app-sidebar__overlay" data-toggle="sidebar"></div>
<aside class="app-sidebar">
    <div class="app-sidebar__user">
        <!-- <img class="app-sidebar__user-avatar" src="https://s3.amazonaws.com/uifaces/faces/twitter/jsa/48.jpg" alt="User Profile Image"> -->
        <i class="fa fa-user" style="font-size: 30px;margin-right: 10px;" ></i>
        <div>
            <p class="app-sidebar__user-name">{{ auth()->user()->name }}</p>
            <!-- <p class="app-sidebar__user-designation">Frontend Developer</p> -->
        </div>
    </div>
    <ul class="app-menu">
        <li><a class="app-menu__item {{ request()->is('admin') ? 'active' : '' }}" href="{{ route('admin.dashboard') }}"><i class="app-menu__icon fa fa-dashboard"></i><span class="app-menu__label">Dashboard</span></a></li>

        <li class="treeview {{ request()->is('admin/homepage') || request()->is('admin/portfolio') || request()->is('admin/portfolio/*') || request()->is('admin/info') || request()->is('admin/info/*') || request()->is('admin/boardofdirectors') || request()->is('admin/boardofdirectors/*') ? 'is-expanded' : '' }}"><a class="app-menu__item" href="#" data-toggle="treeview"><i class="app-menu__icon fa fa-th-list"></i><span class="app-menu__label">HomePage</span><i class="treeview-indicator fa fa-angle-right"></i></a>
          <ul class="treeview-menu">
            <li><a class="app-menu__item {{ request()->is('admin/homepage') ? 'active' : '' }}" href="{{ route('admin.home.get') }}"><i class="app-menu__icon fa fa-home"></i><span class="app-menu__label">Home</span></a></li>

            <li><a class="app-menu__item {{ request()->is('admin/portfolio') || request()->is('admin/portfolio/*')  ? 'active' : '' }}" href="{{ route('admin.portfolio.get') }}"><i class="app-menu__icon fa fa-briefcase"></i><span class="app-menu__label">Portfolio</span></a></li>

            <li><a class="app-menu__item {{ request()->is('admin/info') || request()->is('admin/info/*')  ? 'active' : '' }}" href="{{ route('admin.info.get') }}"><i class="app-menu__icon fa fa-info-circle"></i><span class="app-menu__label">App Download Area</span></a></li>

            <li><a class="app-menu__item {{ request()->is('admin/boardofdirectors') || request()->is('admin/boardofdirectors/*')  ? 'active' : '' }}" href="{{ route('admin.bod.get') }}"><i class="app-menu__icon fa fa-users"></i><span class="app-menu__label">Board Of Directors</span></a></li>

          </ul>
        </li>

        <li><a class="app-menu__item {{ request()->is('admin/pageslider') ? 'active' : '' }}" href="{{ route('admin.pageslider.get') }}"><i class="app-menu__icon fa fa-image"></i><span class="app-menu__label">Page Slider</span></a></li>

        <li><a class="app-menu__item {{ request()->is('admin/services') || request()->is('admin/services/*')  ? 'active' : '' }}" href="{{ route('admin.services.get') }}"><i class="app-menu__icon fa fa-th"></i><span class="app-menu__label">Services</span></a></li>

        <li><a class="app-menu__item {{ request()->is('admin/products') || request()->is('admin/products/*')  ? 'active' : '' }}" href="{{ route('admin.products.get') }}"><i class="app-menu__icon fa fa-product-hunt"></i><span class="app-menu__label">Products</span></a></li>
        
        <li><a class="app-menu__item {{ request()->is('admin/events') || request()->is('admin/events/*')  ? 'active' : '' }}" href="{{ route('admin.events.get') }}"><i class="app-menu__icon fa fa-users"></i><span class="app-menu__label">Events</span></a></li>

        <li><a class="app-menu__item {{ request()->is('admin/aboutus') || request()->is('admin/aboutus/*')  ? 'active' : '' }}" href="{{ route('admin.aboutus.get') }}"><i class="app-menu__icon fa fa-users"></i><span class="app-menu__label">About Us</span></a></li>

        <li><a class="app-menu__item {{ request()->is('admin/contactus') || request()->is('admin/contactus/*')  ? 'active' : '' }}" href="{{ route('admin.contactus.get') }}"><i class="app-menu__icon fa fa-phone"></i><span class="app-menu__label">Contact Us</span></a></li>

        <li><a class="app-menu__item {{ request()->is('admin/blogs') || request()->is('admin/blogs/*')  ? 'active' : '' }}" href="{{ route('admin.blog.get') }}"><i class="app-menu__icon fa fa-book"></i><span class="app-menu__label">Blog </span></a></li>

        <li><a class="app-menu__item {{ request()->is('admin/setting') ? 'active' : '' }}" href="{{ route('admin.settings.get') }}"><i class="app-menu__icon fa fa-cogs"></i><span class="app-menu__label">Site Settings</span></a></li>
    </ul>
</aside>
