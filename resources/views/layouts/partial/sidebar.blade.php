<div class="sidebar" data-color="blue" data-image="{{ asset('backend/img/sidebar-1.jpg') }}">

    <div class="logo">
        <a href="{{ route('dashboard') }}" class="simple-text">
           @yield('title')
        </a>
    </div>
    <div class="sidebar-wrapper">
        <ul class="nav">
            <li class="{{Request::is('admin/dashboard*')?'active': ''}}">
                <a href="{{ route('dashboard') }}">
                    <i class="material-icons">dashboard</i>
                    <p>Dashboard</p>
                </a>
            </li>
            <li class=" {{Request::is('admin/slider*')?'active': ''}} ">
                <a href=" {{route('slider.index')}} ">
                    <i class="material-icons">slideshow</i>
                    <p>Sliders</p>
                </a>
            </li>
            <li class="{{Request::is('admin/category*')?'active': ''}} ">
                <a href="{{route('category.index')}}">
                    <i class="material-icons">content_paste</i>
                    <p>Categories</p>
                </a>
            </li>
            <li class="{{Request::is('admin/product*')?'active': ''}}">
                <a href="{{route('product.index')}}">
                    <i class="material-icons">library_books</i>
                    <p>Products</p>
                </a>
            </li>

            <li class="{{Request::is('admin/event*')?'active': ''}}">
                <a href="{{route('event.index')}}">
                    <i class="material-icons">event_seat</i>
                    <p>Events</p>
                </a>
            </li>

            <li class="{{Request::is('admin/quotation*')?'active': ''}}">
                <a href="{{route('quotation.index')}}">
                    <i class="material-icons">local_printshop</i>
                    <p>Quotation</p>
                </a>
            </li>

            <li class="{{Request::is('admin/project*')?'active': ''}}">
                <a href="{{route('project.index')}}">
                    <i class="material-icons">work_outline</i>
                    <p>Projects</p>
                </a>
            </li>
            
            <li class="{{ Request::is('admin/contact*') ? 'active': '' }}">
                <a href="{{ route('contact.index') }}">
                    <i class="material-icons">message</i>
                    <p>Message</p>
                </a>
            </li>

            <li class="{{Request::is('admin/partner*')?'active': ''}}">
                <a href="{{route('partner.index')}}">
                    <i class="material-icons">person_tie</i>
                    <p>Partners</p>
                </a>
            </li>

            <li class="{{Request::is('admin/about*')?'active': ''}}">
                <a href="{{route('about.index')}}">
                    <i class="material-icons">info_variant</i>
                    <p>About Us</p>
                </a>
            </li>

        </ul>
    </div>
</div>
