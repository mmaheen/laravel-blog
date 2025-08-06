<header id="header"
    class="header d-flex align-items-center {{ Route::currentRouteName() == 'home' ? 'fixed-top' : 'sticky-top' }}"
    style = "{{ Route::currentRouteName() != 'home' ? 'background-color: rgba(40, 58, 90, 0.9);' : '' }}">
    <div class="container-fluid container-xl position-relative d-flex align-items-center">

        <a href="{{ route('home') }}" class="logo d-flex align-items-center me-auto">
            <!-- Uncomment the line below if you also wish to use an image logo -->
            <img src="{{ asset('assets/frontend/img/logo.webp') }}" alt="">
            <h1 class="sitename">Blog</h1>
        </a>

        <nav id="navmenu" class="navmenu">
            <ul>
                <li><a href="#hero" class="active">Home</a></li>
                <li><a href="#portfolio">Portfolio</a></li>
                <li><a href="#team">Team</a></li>
                <li><a href="{{ route('blog.index') }}">Blog</a></li>
                <li class="dropdown"><a href="#"><span>Authentication</span> <i
                            class="bi bi-chevron-down toggle-dropdown"></i></a>
                    <ul>
                        <li><a href="#">Login</a></li>
                        {{-- <li class="dropdown"><a href="#"><span>Deep Dropdown</span> <i
                                    class="bi bi-chevron-down toggle-dropdown"></i></a>
                            <ul>
                                <li><a href="#">Deep Dropdown 1</a></li>
                                <li><a href="#">Deep Dropdown 2</a></li>
                                <li><a href="#">Deep Dropdown 3</a></li>
                                <li><a href="#">Deep Dropdown 4</a></li>
                                <li><a href="#">Deep Dropdown 5</a></li>
                            </ul>
                        </li> --}}
                        <li><a href="#">Register</a></li>
                    </ul>
                </li>
                <li><a href="#contact">Contact</a></li>
            </ul>
            <i class="mobile-nav-toggle d-xl-none bi bi-list"></i>
        </nav>

        <a class="btn-getstarted" href="#hero">Get Started</a>

    </div>
</header>
