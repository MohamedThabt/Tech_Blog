@extends('layout.app')

@section('content')

<main class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card shadow-sm" style="border-color: #526D82;">
                <div class="card-header" style="background-color: #526D82; color: white;">
                    <h2 class="mb-0"><i class="fas fa-edit"></i> Edit  Post</h2>
                </div>
                <div class="card-body">
                    <form method="POST" action="{{url('posts/'.$post->id)}}">
                        @method('PUT')
                        @csrf
                        @if($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                        @if(session('success'))
                            <div class="alert alert-success">
                                {{ session('success') }}
                            </div>
                        @endif
                        <div class="mb-3">
                            <label for="title" class="form-label" style="color: #526D82;"><i class="fas fa-heading"></i> Title</label>
                            <input type="text" class="form-control" name="title" style="border-color: #526D82;" value="{{ $post->title }}">
                        </div>
                        <div class="mb-3">
                            <label for="description" class="form-label" style="color: #526D82;"><i class="fas fa-paragraph"></i> Description</label>
                            <textarea class="form-control" name="description" rows="5" style="border-color: #526D82;">{{$post->description}}</textarea>
                        </div>
                        <div class="mb-3">
                            <label for="user" class="form-label" style="color: #526D82;"><i class="fas fa-user"></i> User</label>
                            <input type="text" class="form-control" name="user" style="border-color: #526D82;" value="{{ $post->user }}">
                        </div>
                        <button type="submit" class="btn btn-lg w-100" style="background-color: #526D82; color: white;">
                            <i class="fas fa-save"></i> Save Post
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</main>

@endsection