
@extends('layout.app')

@section('content')

<!-- main section  -->
<main class="container my-5">
        <h1 class="text-center mb-5">Welcome to CodeCraft Insights</h1>
        <div class="row">
            <div class="col-md-8 mx-auto">
                <article class="card mb-4">
                    <div class="card-body">
                        <h2 class="card-title">{{$post->title}}</h2>
                        <p class="card-text">{{$post->description}}</p>
                    </div>
                    <div class="card-footer text-muted">
                    {{ $post->user->name ." ".$post->created_at->diffForHumans()}}
                    </div>
                </article>
            </div>
        </div>
    </main>

    
    <!-- footer section -->

    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>

@endsection