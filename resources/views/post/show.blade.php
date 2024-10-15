@extends('layout.app')

@section('content')
<main class="container my-5">
    <article class="blog-post">
        <header class="text-center mb-5">
            <h1 class="display-4 fw-bold mb-3">{{$post->title}}</h1>
            <p class="text-muted">
                <span class="me-3">
                    <i class="fas fa-user-circle me-2"></i>
                    <span class="fw-bold">{{ $post->user->name }}</span>
                </span>
                <span>
                    <i class="fas fa-calendar-alt ms-3 me-2"></i>{{ $post->created_at->format('M d, Y') }}
                    <i class="fas fa-clock ms-3 me-2"></i>{{ $post->created_at->diffForHumans() }}
                </span>
            </p>
        </header>

        <div class="row align-items-center mb-5">
            <div class="col-md-6 mb-4 mb-md-0">
                <img src="{{ $post->image() }}" class="img-fluid rounded shadow" alt="{{ $post->title }}">
            </div>
            <div class="col-md-6">
                <h2 class="h3 mb-3">{{$post->title}}</h2>
                <p class="lead mb-4">{{$post->description}}</p>
                <a href="{{ route('home') }}" class="btn btn-primary">
                    <i class="fas fa-home me-2"></i>Home
                </a>
            </div>
        </div>

        <div id="full-content" class="post-content mt-5">
            {!! $post->content !!}
        </div>
    </article>
</main>
@endsection

@push('styles')
<style>
    body {
        background-color: #f8f9fa;
        color: #333;
        line-height: 1.6;
    }
    .container {
        max-width: 1140px;
    }
    .display-4 {
        font-size: 2.5rem;
        color: #2c3e50;
    }
    .lead {
        font-size: 1.1rem;
        color: #34495e;
    }
    .post-content {
        font-size: 1.1rem;
        line-height: 1.8;
    }
    .post-content p {
        margin-bottom: 1.5rem;
    }
    .shadow {
        box-shadow: 0 0.5rem 1rem rgba(0, 0, 0, 0.15) !important;
    }
    @media (min-width: 768px) {
        .display-4 {
            font-size: 3rem;
        }
    }
</style>
@endpush