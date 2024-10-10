@extends('layout.app')

@section('content')

    <div class="container mt-5">
        <h2 class="mb-4">Blog Posts Management</h2>
        
        <!-- Headline for All Posts -->
        <h4 class="mb-3">All Posts</h4>

        <!-- Add Post Button as Anchor -->
        <a href="{{url('posts/create')}}" class="btn-add-post mt-3">Add Post</a>

        <table class="table table-striped table-hover mt-4">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Title</th>
                    <th>Description</th>
                    <th>User</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>1</td>
                    <td>Optimizing Database Queries</td>
                    <td>Tips for improving database performance in high-traffic applications</td>
                    <td>Mohamed Thabet</td>
                    <td>
                        <form action="{{url('posts/1/edit')}}" method="post" class="d-inline-block">
                            <button class="btn btn-edit"><i class="fas fa-edit"></i></button>
                        </form>
                        <form action="{{url('posts/1')}}" method="post" class="d-inline-block">
                            <button class="btn btn-delete"><i class="fas fa-trash-alt"></i></button>
                        </form>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>

    @endsection