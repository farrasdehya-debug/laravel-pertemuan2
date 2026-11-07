<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Admin Panel') - MyProfile</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <style>
        body {
            background-color: #f8f9fa;
            margin: 0;
            font-family: -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, "Helvetica Neue", Arial, sans-serif;
        }

        /* Top Yellow Header Bar (Image 1) */
        .admin-topbar {
            background-color: #ffc107;
            height: 60px;
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 0 24px;
            position: fixed;
            top: 0;
            left: 0;
            right: 0;
            z-index: 1030;
            box-shadow: 0 2px 4px rgba(0,0,0,0.08);
        }

        .admin-brand {
            display: flex;
            align-items: center;
            text-decoration: none;
            gap: 12px;
        }

        .admin-brand img {
            height: 42px;
            width: auto;
            object-fit: contain;
        }

        .admin-brand-text {
            display: flex;
            flex-direction: column;
            line-height: 1.1;
        }

        .admin-brand-univ {
            font-size: 0.65rem;
            font-weight: 700;
            letter-spacing: 0.8px;
            color: #0b3954;
            text-transform: uppercase;
        }

        .admin-brand-prodi {
            font-size: 0.95rem;
            font-weight: 900;
            letter-spacing: 0.5px;
            color: #0b3954;
            text-transform: uppercase;
        }

        .admin-top-nav {
            display: flex;
            align-items: center;
            gap: 20px;
        }

        .admin-top-nav a,
        .admin-top-nav button {
            color: #212529;
            text-decoration: none;
            font-weight: 500;
            font-size: 0.95rem;
            background: none;
            border: none;
            padding: 0;
            cursor: pointer;
            transition: color 0.15s;
        }

        .admin-top-nav a:hover,
        .admin-top-nav button:hover {
            color: #000;
            text-decoration: underline;
        }

        /* Sidebar (Image 1) */
        .admin-sidebar {
            width: 220px;
            height: calc(100vh - 60px);
            position: fixed;
            top: 60px;
            left: 0;
            background-color: #343a40;
            color: #fff;
            padding-top: 20px;
            z-index: 1020;
        }

        .admin-sidebar-title {
            padding: 0 20px 15px 20px;
            font-size: 1.15rem;
            font-weight: 600;
            color: #ffffff;
            border-bottom: 1px solid #495057;
            margin-bottom: 10px;
        }

        .admin-sidebar .nav-link {
            color: #ced4da;
            padding: 12px 20px;
            font-weight: 500;
            display: flex;
            align-items: center;
            transition: all 0.2s ease-in-out;
            text-decoration: none;
        }

        .admin-sidebar .nav-link:hover {
            background-color: #495057;
            color: #ffffff;
        }

        .admin-sidebar .nav-link.active {
            background-color: #495057;
            color: #ffc107;
            font-weight: 600;
            border-left: 4px solid #ffc107;
        }

        /* Main Content */
        .admin-main {
            margin-left: 220px;
            margin-top: 60px;
            padding: 35px 40px;
            min-height: calc(100vh - 60px);
            display: flex;
            flex-direction: column;
            justify-content: space-between;
        }

        .admin-footer {
            margin-top: 50px;
            padding-top: 20px;
            border-top: 1px solid #e9ecef;
            text-align: center;
            color: #6c757d;
            font-size: 0.9rem;
        }

        @media (max-width: 768px) {
            .admin-sidebar {
                width: 100%;
                position: relative;
                height: auto;
                top: 60px;
            }

            .admin-main {
                margin-left: 0;
                padding: 20px;
            }
        }
    </style>
</head>
<body>
    <!-- Top Yellow Bar -->
    <header class="admin-topbar">
        <a href="{{ route('admin.home') }}" class="admin-brand">
            <img src="{{ asset('images/unpam-logo.png') }}" alt="Logo UNPAM">
            <div class="admin-brand-text">
                <span class="admin-brand-univ">Universitas Pamulang</span>
                <span class="admin-brand-prodi">Sistem Informasi</span>
            </div>
        </a>

        <div class="admin-top-nav">
            <a href="{{ route('admin.home') }}">Dashboard</a>
            <form action="{{ route('admin.logout') }}" method="POST" class="d-inline">
                @csrf
                <button type="submit">Logout</button>
            </form>
        </div>
    </header>

    <!-- Left Sidebar -->
    <aside class="admin-sidebar shadow-sm">
        <div class="admin-sidebar-title">
            Admin Menu
        </div>
        <ul class="nav flex-column">
            <li class="nav-item">
                <a class="nav-link {{ request()->routeIs('admin.home') ? 'active' : '' }}" href="{{ route('admin.home') }}">
                    Dashboard
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ request()->routeIs('admin.project.*') ? 'active' : '' }}" href="{{ route('admin.project.index') }}">
                    Data Project
                </a>
            </li>
        </ul>
    </aside>

    <!-- Main Content Area -->
    <main class="admin-main">
        <div>
            @if (session('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {{ session('success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif

            @if (session('error'))
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    {{ session('error') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif

            @yield('content')
        </div>

        <footer class="admin-footer">
            &copy; {{ date('Y') }} MyProfile. All rights reserved.
        </footer>
    </main>

    @stack('scripts')
</body>
</html>
