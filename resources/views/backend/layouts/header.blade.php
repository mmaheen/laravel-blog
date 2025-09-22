<!--**********************************
            Nav header start
        ***********************************-->
<div class="nav-header">
    <div class="brand-logo">
        <a href="{{ route('home') }}">
            <b class="logo-abbr"><img src="{{ asset('assets/backend/images/logo.png') }}" alt=""> </b>
            <span class="logo-compact"><img src="{{ asset('assets/backend/images/logo-compact.png') }}"
                    alt=""></span>
            <span class="brand-title">
                <img src="{{ asset('assets/backend/images/logo-text.png') }}" alt="">
            </span>
        </a>
    </div>
</div>
<!--**********************************
            Nav header end
        ***********************************-->

<!--**********************************
            Header start
        ***********************************-->
<div class="header">
    <div class="header-content clearfix">

        <div class="nav-control">
            <div class="hamburger">
                <span class="toggle-icon"><i class="icon-menu"></i></span>
            </div>
        </div>
        <div class="header-left">
            <div class="input-group icons">
                <div class="input-group-prepend">
                    <span class="input-group-text bg-transparent border-0 pr-2 pr-sm-3" id="basic-addon1"><i
                            class="mdi mdi-magnify"></i></span>
                </div>
                <input type="search" class="form-control" placeholder="Search Dashboard" aria-label="Search Dashboard">
                <div class="drop-down   d-md-none">
                    <form action="#">
                        <input type="text" class="form-control" placeholder="Search">
                    </form>
                </div>
            </div>
        </div>
        <div class="header-right">
            <ul class="clearfix">
                <li class="icons dropdown d-none d-md-flex">
                    <span class="log-user">{{ ucfirst(Auth::user()->name) }}</span>
                </li>
                <li class="icons dropdown">
                    <div class="user-img c-pointer position-relative" data-toggle="dropdown">
                        <span class="activity active"></span>
                        @php
                            $userImage = userImage(Auth::user()->image, Auth::user()->name);
                        @endphp
                        <img src="{{ $userImage['src'] }}" alt="{{ $userImage['alt'] }}" height="40" width="40">
                    </div>
                    <div class="drop-down dropdown-profile   dropdown-menu">
                        <div class="dropdown-content-body">
                            <ul>
                                <li>
                                    <a href="#"><i class="icon-user"></i>
                                        <span>{{ ucfirst(Auth::user()->name) }}</span></a>
                                </li>
                                <hr class="my-2">
                                <form action="{{ route('dashboard.logout') }}" method="POST">
                                    @csrf
                                    <li>
                                        <button type="submit" class="btn btn-danger btn-block">
                                            <i class="icon-key"></i>
                                            <span>Logout</span>
                                        </button>
                                    </li>
                                </form>
                            </ul>
                        </div>
                    </div>
                </li>
            </ul>
        </div>
    </div>
</div>
<!--**********************************
            Header end ti-comment-alt
        ***********************************-->
