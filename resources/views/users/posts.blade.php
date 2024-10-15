@extends('layout.app')

@section('content')

    <div class="container mt-5">
        <h2 class="mb-4">Blog Posts Management</h2>
        
        <h4 class="mb-3">All Posts For{{$user->name}}</h4>
        <table class="table table-striped table-hover mt-4">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Title</th>
                    <th>Description</th>
                    <th>Writer</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($user->posts as $post)
                <tr onclick="window.location='{{ url('posts/' . $post->id) }}';" style="cursor: pointer;">
                    <td>{{$loop->iteration}}</td>
                    <td>{{\Str::limit($post->title,10)}}</td>
                    <td>{{ \Str::limit( $post->description,50)}}</td>
                    <td>{{$post->user->name}}</td>
                    <td onclick="event.stopPropagation();">
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
    </div>

    @endsection
