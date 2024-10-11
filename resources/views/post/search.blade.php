
@extends('layout.app')

@section('content')

<!-- main section  -->
<main class="container my-5">
        <h1 class="text-center mb-5">Welcome to CodeCraft Insights</h1>
        @foreach ($posts as $post)
        <div class="row">
            <div class="col-md-8 mx-auto">
                <article class="card mb-4">
                    <div class="card-body">
                        <h2 class="card-title">{{$post->title}}</h2>
                        <p class="card-text">{{ \Str::limit( $post->description,50)}}</p>
                        <a href="{{route('posts.show',$post->id)}}" class="btn btn-primary">Read More</a>
                    </div>
                    <div class="card-footer text-muted">
                    {{ $post->user->name ." ".$post->created_at->diffForHumans()}}
                    </div>
                </article>
            </div>
        </div>
        @endforeach
        <div class="d-flex justify-content-center mt-4">
            {{ $posts->links() }}
        </div>
    </main>

    
    <!-- footer section -->
    <footer class="py-3 mt-5">
        <div class="container text-center">
            <p>&copy; 2024 CodeCraft Insights. Created by Mohamed Thabet, Backend Engineer.</p>
            <div class="social-icons">
                <a href="#" class="text-white me-3"><i class="fab fa-facebook-f"></i></a>
                <a href="#" class="text-white me-3"><i class="fab fa-twitter"></i></a>
                <a href="#" class="text-white me-3"><i class="fab fa-linkedin-in"></i></a>
                <a href="#" class="text-white"><i class="fab fa-github"></i></a>
            </div>
        </div>
    </footer>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>

@endsection