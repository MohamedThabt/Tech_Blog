@extends('layout.app')

@section('content')

    <div class="container mt-5">
        <h2 class="mb-4">Blog Posts Management</h2>
        
        <!-- Headline for All Posts -->
        <h4 class="mb-3">All Posts</h4>

        <!-- Add Post Button as Anchor -->
        <a href="{{url('posts/create')}}" class="btn-add-post mt-3">Add Post</a>
        @if(session('delete'))
            <div class="alert alert-success">
                {{ session('delete') }}
            </div>
        @endif
        <table class="table table-striped table-hover mt-4">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Title</th>
                    <th>Description</th>
                    <th>Writer</th>
                    <th>Image</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($posts as $post)
                <tr>
                    <td>{{$loop->iteration}}</td>
                    <td>{{\Str::limit($post->title,10)}}</td>
                    <td>{{ \Str::limit( $post->description,50)}}</td>
                    <td>{{$post->user->name}}</td>
                    <td>
                            <img src="{{ $post->image() }}" alt="{{ $post->title }}" class="img-fluid rounded-circle" style="width: 50px; height: 50px; object-fit: cover;">
                    </td>
                    <td >
                        <form action="{{url('posts/'.$post->id.'/edit')}}" method="post" class="d-inline-block">
                            @csrf
                            @method('PUT')
                            <button class="btn btn-edit"><i class="fas fa-edit"></i></button>
                        </form>
                        <form action="{{url('posts/'.$post->id)}}" method="post" class="d-inline-block">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-delete"><i class="fas fa-trash-alt"></i></button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        <div class="d-flex justify-content-center mt-4">
            {{ $posts->links() }}
        </div>
    </div>

    @endsection
