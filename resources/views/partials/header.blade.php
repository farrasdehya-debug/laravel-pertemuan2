<nav class="navbar navbar-expand-lg navbar-dark bg-primary shadow-sm py-2">
    <div class="container">
        <a class="navbar-brand fw-bold" href="{{ url('/') }}">
            MyProfile
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto align-items-lg-center">
                <li class="nav-item">
                    <a href="{{ url('/') }}" class="nav-link {{ request()->is('/') ? 'active fw-semibold' : '' }}">Home</a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('project.index') }}" class="nav-link {{ request()->is('project*') ? 'active fw-semibold' : '' }}">Projects</a>
                </li>
                <li class="nav-item">
                    <a href="{{ url('/about') }}" class="nav-link {{ request()->is('about*') ? 'active fw-semibold' : '' }}">About</a>
                </li>
                <li class="nav-item">
                    <a href="{{ url('/contact') }}" class="nav-link {{ request()->is('contact*') ? 'active fw-semibold' : '' }}">Contact</a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('admin.home') }}" class="nav-link {{ request()->is('admin*') ? 'active fw-semibold' : '' }}">Admin</a>
                </li>
            </ul>
        </div>
    </div>
</nav>
