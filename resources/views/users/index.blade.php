@extends('layout.app')

@section('content')
<div class="container-fluid py-4">
    <div class="row justify-content-center">
        <div class="col-lg-10">
            <div class="card shadow">
                <div class="card-header bg-primary text-white d-flex justify-content-between align-items-center" style="background-color: #526D82 !important;">
                    <h2 class="mb-0">Users Management</h2>
                    <a href="{{ route('users.create') }}" class="btn btn-light"><i class="fas fa-user-plus me-2"></i>Add User</a>
                </div>
                <div class="card-body">
                    @if(session('success'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            {{ session('success') }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    @endif

                    <div class="table-responsive">
                        <table class="table table-hover">
                            <thead class="table-light">
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
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $user->name }}</td>
                                    <td>{{ $user->email }}</td>
                                    <td>
                                        @if($user->type === 'admin')
                                            <span class="badge bg-primary">Admin</span>
                                        @else
                                            <span class="badge bg-secondary">Writer</span>
                                        @endif
                                    </td>
                                    <td>
                                        <a href="{{ route('user.posts', $user->id) }}" class="btn btn-sm btn-info">
                                            <i class="fas fa-eye me-1"></i> View Posts
                                        </a>
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
                                        </div>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>

                    <div class="d-flex justify-content-center mt-4">
                        {{ $users->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script>
    // Enable Bootstrap tooltips
    var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'))
    var tooltipList = tooltipTriggerList.map(function (tooltipTriggerEl) {
        return new bootstrap.Tooltip(tooltipTriggerEl)
    })
</script>
@endpush