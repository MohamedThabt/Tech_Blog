@extends('layout.app')

@section('content')

<!-- Main Section -->
<main class="container my-5">
    <div class="row">
        <div class="col-lg-8 mx-auto">
            @if($posts->isEmpty())
                <div class="alert alert-info text-center" role="alert">
                    <h4 class="alert-heading">No Posts Yet!</h4>
                    <p>There are currently no posts available. Check back soon for exciting content about software development and technology!</p>
                </div>
            @else
                @foreach ($posts as $post)
                <article class="card mb-4 shadow-sm">
                    <div class="card-body">
                        <h2 class="card-title h4">{{$post->title}}</h2>
                        <p class="card-text text-muted">
                            <small>
                                <i class="fas fa-user me-2"></i>{{ $post->user->name }}
                                <i class="fas fa-calendar-alt ms-3 me-2"></i>{{ $post->created_at->format('M d, Y') }}
                                <i class="fas fa-clock ms-3 me-2"></i>{{ $post->created_at->diffForHumans() }}
                            </small>
                        </p>
                        <p class="card-text">{{ \Str::limit($post->description, 150) }}</p>
                        <a href="{{ route('posts.show', $post->id) }}" class="btn btn-primary" style="background-color: #526D82; border-color: #526D82;">Read More <i class="fas fa-arrow-right ms-1"></i></a>
                    </div>
                </article>
                @endforeach
                
                <div class="d-flex justify-content-center mt-4">
                    {{ $posts->links() }}
                </div>
            @endif
        </div>
    </div>
</main>


@endsection

@push('scripts')
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>
@endpush