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
                    <li><a href="#portfolio">Portfolio</a></li>
                    <li><a href="#recent-blog-posts">Recent Blogs</a></li>
                    <li><a href="#team">Team</a></li>
                    <li><a href="#contact">Contact</a></li>
                @endif

                <li>
                    <a href="{{ route('blog.index') }}"
                        class={{ Route::currentRouteName() == 'blog.index' ? 'active' : '' }}>Blogs</a>
                </li>
                @guest()
                    <li class="dropdown"><a href="#"><span>Authentication</span> <i
                                class="bi bi-chevron-down toggle-dropdown"></i></a>
                        <ul>
                            {{-- <li><a href="{{ route('sanctum.login') }}">Login</a></li> --}}
                            <li><a href="{{ route('login') }}">Login</a></li>
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
                            {{-- <li><a href="{{ route('sanctum.register') }}">Register</a></li> --}}
                            <li><a href="{{ route('register') }}">Register</a></li>
                        </ul>
                    </li>
                @else
                    <li class="dropdown"><a href="#"><span>{{ Auth::user()->name }}</span> <i
                                class="bi bi-chevron-down toggle-dropdown"></i></a>
                        <ul>
                            <li>
                                <a href="{{ route('dashboard.index') }}">Dashboard</a>
                            </li>
                            <li>
                                {{-- <form method="POST" action="{{ route('sanctum.logout') }}">
                                    @csrf
                                    <button type="submit" class="mx-3 btn btn-link">Logout</button>
                                </form> --}}
                            </li>
                        </ul>
                    </li>
                @endguest

            </ul>
            <i class="mobile-nav-toggle d-xl-none bi bi-list"></i>
        </nav>

        <a class="btn-getstarted" href="{{ route('home') }}">Get Started</a>

    </div>
</header>
