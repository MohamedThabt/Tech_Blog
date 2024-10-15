@extends('layout.app')

@section('content')


    <!-- Hero Section -->
    <header class="py-5 text-white" style="background-color: #526D82;">
        <div class="container text-center">
            <h1 class="display-4 fw-bold">Welcome to Tech Blog</h1>
            <p class="lead">Explore the latest in technology and programming</p>
        </div>
    </header>

    <!-- Main Content -->
    <main class="container py-5">
        <div class="row g-4">
            <!-- Blog Posts -->
            <div class="col-lg-8">
                <div class="row row-cols-1 row-cols-md-2 g-4">
                    @foreach ($posts as $post)
                    <div class="col">
                        <article class="card h-100 shadow">
                            <img src="{{ $post->image() }}" class="card-img-top" alt="{{ $post->title }}" style="height: 200px; object-fit: cover;">
                            <div class="card-body d-flex flex-column">
                                <h2 class="card-title h5">{{$post->title}}</h2>
                                <p class="card-text text-muted small">
                                    <i class="fas fa-user me-2"></i>{{ $post->user->name }}
                                    <i class="fas fa-calendar-alt ms-3 me-2"></i>{{ $post->created_at->format('M d, Y') }}
                                </p>
                                <p class="card-text flex-grow-1">{{ \Str::limit($post->description, 100) }}</p>
                                <a href="{{route('posts.show',$post->id)}}" class="btn btn-primary mt-auto" style="background-color: #526D82; border-color: #526D82;">Read More <i class="fas fa-arrow-right ms-1"></i></a>
                            </div>
                        </article>
                    </div>
                    @endforeach
                </div>
                <!-- Pagination -->
                <div class="d-flex justify-content-center mt-4">
                    {{ $posts->links() }}
                </div>
            </div>
            <!-- Sidebar -->
            <div class="col-lg-4">
                <div class="card mb-4 shadow">
                    <div class="card-header text-white" style="background-color: #526D82;">
                        <h3 class="h5 mb-0">About Tech Blog</h3>
                    </div>
                    <div class="card-body">
                        <p>Tech Blog is your go-to source for the latest technology news, programming tips, and industry insights.</p>
                    </div>
                </div>
                <div class="card shadow">
                    <div class="card-header text-white" style="background-color: #526D82;">
                        <h3 class="h5 mb-0">Categories</h3>
                    </div>
                    <div class="card-body">
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item"><a href="#" class="text-decoration-none">Web Development</a></li>
                            <li class="list-group-item"><a href="#" class="text-decoration-none">Mobile Apps</a></li>
                            <li class="list-group-item"><a href="#" class="text-decoration-none">Artificial Intelligence</a></li>
                            <li class="list-group-item"><a href="#" class="text-decoration-none">Cybersecurity</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </main>

    <!-- Footer -->
    <footer class="bg-dark text-white py-4">
        <div class="container">
            <div class="row gy-4">
                <div class="col-md-6">
                    <h5>Tech Blog</h5>
                    <p>Empowering developers with cutting-edge insights and knowledge.</p>
                </div>
                <div class="col-md-6 text-md-end">
                    <h5>Connect With Us</h5>
                    <div>
                        <a href="https://www.facebook.com/mohamed.thabet.545" class="text-white me-3" target="_blank" ><i class="fab fa-facebook-f fa-lg"></i></a>
                        <a href="https://twitter.com/Mohamed13546660" class="text-white me-3" target="_blank" ><i class="fab fa-twitter fa-lg"></i></a>
                        <a href="https://www.linkedin.com/in/mohamed-thabet-5694462a0" class="text-white me-3" target="_blank" ><i class="fab fa-linkedin-in fa-lg"></i></a>
                        <a href="https://github.com/MohamedThabt" class="text-white" target="_blank" ><i class="fab fa-github fa-lg"></i></a>

                    </div>
                </div>
            </div>
            <hr>
            <div class="text-center">
                <p class="mb-0">&copy; 2024 Tech Blog. Created by Mohamed Thabet, Backend Engineer.</p>
            </div>
        </div>
    </footer>
@endsection