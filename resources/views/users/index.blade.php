@extends('layout.app')

@section('content')

    <div class="container mt-5">
        <h2 class="mb-4">Uesrs Management</h2>
        
        
        <h4 class="mb-3">All Users</h4>

        <!-- Add Post Button as Anchor -->
        <a href="{{route('users.create')}}" class="btn-add-post mt-3">Add User</a>
        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif
        <table class="table table-striped table-hover mt-4">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Role</th>
                    <th>Posts</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($users as $user)
                <tr>
                    <td>{{$loop->iteration}}</td>
                    <td>{{$user->name}}</td>
                    <td>{{$user->email}}</td>
                    <td>
                        @if($user->type === 'admin')
                        <span class="badge bg-primary">Admin</span>
                        @else
                        <span class="badge bg-secondary">Writer</span>
                        @endif
                    </td>
                    <td>
                        <a href="{{route('user.posts', $user->id)}}" class="btn btn-sm btn-info"><i class="fas fa-eye"></i> View Posts</a>
                    </td>
                    <td>
                        <form action="{{ route('users.edit', $user->id) }}" method="get" class="d-inline-block">
                            <button class="btn btn-edit"><i class="fas fa-edit"></i></button>
                        </form>
                        <form action="{{route('users.destroy', $user->id)}}" method="post" class="d-inline-block">
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
            {{ $users->links() }}
        </div>
    </div>

    @endsection
