<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tech Blog</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
    <style>
        :root {
            --primary-color: #526D82;
            --secondary-color: #27374D;
            --background-color: #f8f9fa;
            --text-color: #333;
            --accent-color: #9DB2BF;
            --primary-light: #7593a8;
            --primary-dark: #3e5262;
        }

        /* Global Styles */
        html, body {
            height: 100%;
            margin: 0;
        }

        body {
            background-color: var(--background-color);
            color: var(--text-color);
            display: flex;
            flex-direction: column;
            min-height: 100vh;
        }

        main {
            flex-grow: 1;
        }

        /* Navbar Styles */
        .navbar {
            background-color: var(--primary-color);
        }

        .nav-link, .navbar-brand {
            color: white !important;
            transition: color 0.3s ease;
        }

        .nav-link:hover, .navbar-brand:hover {
            color: var(--accent-color) !important;
        }

        .navbar-nav .nav-item {
            position: relative;
        }

        .navbar-nav .nav-item::after {
            content: '';
            position: absolute;
            width: 0;
            height: 2px;
            bottom: 0;
            left: 50%;
            background-color: var(--accent-color);
            transition: all 0.3s ease;
        }

        .navbar-nav .nav-item:hover::after {
            width: 100%;
            left: 0;
        }

        /* Dropdown Styles */
        .dropdown-menu {
            background-color: var(--primary-color);
            border: none;
        }

        .dropdown-item {
            color: white !important;
            transition: color 0.3s ease;
        }

        .dropdown-item:hover {
            color: var(--accent-color) !important;
            background-color: var(--primary-color);
        }

        /* Button Styles */
        .btn-primary {
            background-color: var(--secondary-color);
            border-color: var(--secondary-color);
        }

        .btn-primary:hover {
            background-color: #1f2937;
            border-color: #1f2937;
        }

        .btn-primary:active, .btn-primary:focus {
            background-color: #3e5c76 !important;
            border-color: #3e5c76 !important;
            box-shadow: 0 0 0 0.25rem rgba(62, 92, 118, 0.5) !important;
        }

        /* Card Styles */
        .card {
            transition: transform 0.3s;
            border-color: var(--primary-color);
            background-color: #ffffff;
        }

        .card:hover {
            transform: translateY(-5px);
        }

        .card-header {
            background-color: var(--primary-color);
            color: white;
        }

        /* Table Styles */
        .table {
            background-color: white;
        }

        .table thead {
            background-color: var(--primary-color);
            color: white;
        }

        .btn-edit {
            color: var(--primary-color);
        }

        .btn-delete {
            color: #dc3545;
        }

        .btn-edit:hover, .btn-delete:hover {
            opacity: 0.8;
        }

        /* Footer Styles */
        footer {
            background-color: var(--secondary-color);
            color: white;
            padding: 10px 0;
            text-align: center;
        }
    </style>
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-dark">
    <div class="container">
        <a class="navbar-brand" href="{{url('/')}}"><i class="fas fa-code me-2"></i>Tech_Blog</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link active" href="{{url('/')}}">Home</a>
                </li>
                @auth
                <li class="nav-item">
                    <a class="nav-link" href="{{url('posts/index')}}">Posts</a>
                </li>
                @can('admin-controller')
                <li class="nav-item">
                    <a class="nav-link" href="{{route('users.index')}}">Users</a>
                </li>
                @endcan
                @endauth
            </ul>
            <form class="d-flex" action="{{url('posts/search')}}" method="get">
                <input class="form-control me-2" type="search" name="search" placeholder="Search" aria-label="Search">
                <button class="btn btn-outline-light" type="submit"><i class="fas fa-search"></i></button>
            </form>
            <ul class="navbar-nav ms-auto">
                @guest
                    @if (Route::has('login'))
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                        </li>
                    @endif

                    @if (Route::has('register'))
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                        </li>
                    @endif
                @else
                <li class="nav-item dropdown">
                    <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                        <i class="fas fa-user"></i> {{ Auth::user()->name }} 
                        @if(Auth::user()->type == 'admin')
                            <span class="badge bg-success">Admin</span>
                        @elseif(Auth::user()->type == 'writer')
                            <span class="badge bg-info">Writer</span>
                        @endif
                    </a>
                    <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="{{ route('logout') }}"
                        onclick="event.preventDefault();
                                    document.getElementById('logout-form').submit();">
                            {{ __('Logout') }}
                        </a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>
                    </div>
                </li>
                @endguest
            </ul>
        </div>
    </div>
</nav>

@yield('content')

<!-- Bootstrap JS CDN -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>
</body>
</html>
