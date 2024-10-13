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

    /* Make the html and body full height */
    html, body {
        height: 100%;
        margin: 0;
    }

    body {
        background-color: var(--background-color);
        color: var(--text-color);
        display: flex;
        flex-direction: column;
        min-height: 100vh; /* Full height for the body */
    }

    main {
        flex-grow: 1; /* Main content should grow and fill available space */
    }

    .navbar {
        background-color: var(--primary-color);
    }

    .nav-link, .navbar-brand {
        color: white !important;
    }

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

    footer {
        background-color: var(--secondary-color);
        color: white;
        padding: 10px 0;
        text-align: center;
    }

    main {
        flex-grow: 1;
    }

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

    /* Add Post Button Styling */
    .btn-add-post {
        background: linear-gradient(135deg, #526D82, #7593a8);
        color: white;
        border: none;
        padding: 10px 20px;
        text-decoration: none;
        display: inline-block;
        font-weight: bold;
        border-radius: 8px;
        box-shadow: 0px 4px 6px rgba(0, 0, 0, 0.1);
    }

    /* Hover effect without animation */
    .btn-add-post:hover {
        opacity: 0.9;
        box-shadow: 0px 6px 8px rgba(0, 0, 0, 0.15);
    }
</style>


</head>
<body>
<!-- navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark">
        <div class="container">
            <a class="navbar-brand" href="{{url('/')}}"><i class="fas fa-code me-2"></i>Thech_Blog</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link active" href="{{url('/')}}">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{url('posts/index')}}">Posts</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('users.index')}}">Users</a>
                    </li>
                </ul>
                <form class="d-flex" action="{{url('posts/search')}}" method="get">
                    <input class="form-control me-2" type="search"  name ="search" placeholder="Search" aria-label="Search">
                    <button class="btn btn-outline-light" type="submit"><i class="fas fa-search"></i></button>
                </form>
            </div>
        </div>
    </nav>



@yield('content')
</body>
</html>