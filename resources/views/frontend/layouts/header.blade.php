<header id="header"
    class="header d-flex align-items-center {{ Route::currentRouteName() == 'home' ? 'fixed-top' : 'sticky-top' }}"
    style = "{{ Route::currentRouteName() != 'home' ? 'background-color: rgba(40, 58, 90, 0.9);' : '' }}">
    <div class="container-fluid container-xl position-relative d-flex align-items-center">

        <a href="{{ route('home') }}" class="logo d-flex align-items-center me-auto">
            <img src="{{ asset('assets/frontend/img/logo.webp') }}" alt="">
            <h1 class="sitename">Blog</h1>
        </a>

        <nav id="navmenu" class="navmenu">
            <ul>
                @if (Route::currentRouteName() == 'home')
                    <li><a href="#hero" class="active">Home</a></li>
                    <li><a href="#portfolio">Photos</a></li>
                    <li><a href="#recent-blog-postst">Recent Blogs</a></li>
                @endif
                <li><a href="{{ route('blog.index') }}">Blogs</a></li>
                <li class="dropdown"><a href="#"><span>Authentication</span> <i
                            class="bi bi-chevron-down toggle-dropdown"></i></a>
                    <ul>
                        <li><a href="{{ route('login') }}">Login</a></li>
                        <li><a href="{{ route('register') }}">Register</a></li>
                    </ul>
                </li>

            </ul>
            <i class="mobile-nav-toggle d-xl-none bi bi-list"></i>
        </nav>

        <a class="btn-getstarted" href="#hero">Get Started</a>

    </div>
</header>
