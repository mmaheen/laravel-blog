<div class="nk-sidebar">
    <div class="nk-nav-scroll">
        <ul class="metismenu" id="menu">
            <li class="nav-label">Dashboard</li>
            <li>
                <a class="has-arrow" href="javascript:void()" aria-expanded="false">
                    <i class="icon-speedometer menu-icon"></i><span class="nav-text">Dashboard</span>
                </a>
                <ul aria-expanded="false">
                    <li><a href="{{ route('dashboard.index') }}">Dashboard Home</a></li>
                </ul>
            </li>

            <li class="nav-label">Create Content</li>
            <li>
                <a class="has-arrow" href="javascript:void()" aria-expanded="false">
                    <i class="icon-note menu-icon"></i><span class="nav-text">Forms</span>
                </a>
                <ul aria-expanded="false">
                    <li><a href="{{ route('dashboard.blogs.create') }}">Blog</a></li>
                    <li><a href="{{ route('dashboard.photos.create') }}">Photos</a></li>
                </ul>
            </li>

            <li class="nav-label">Table</li>
            <li>
                <a class="has-arrow" href="javascript:void()" aria-expanded="false">
                    <i class="icon-menu menu-icon"></i><span class="nav-text">Table</span>
                </a>
                <ul aria-expanded="false">
                    <li><a href="{{ route('dashboard.blogs.index') }}" aria-expanded="false">Blog</a></li>
                    <li><a href="{{ route('dashboard.photos.index') }}" aria-expanded="false">Photos</a></li>
                </ul>
            </li>

        </ul>
    </div>
</div>
