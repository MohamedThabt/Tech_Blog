@extends('layout.app')

@section('content')
<main class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card shadow-sm" style="border-color: #526D82;">
                <div class="card-header" style="background-color: #526D82; color: white;">
                    <h2 class="mb-0"><i class="fas fa-user-plus"></i> Add New User</h2>
                </div>
                <div class="card-body">
                    <form method="POST" action="{{ route('users.store') }}">
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
                            <label for="name" class="form-label" style="color: #526D82;"><i class="fas fa-user"></i> Name</label>
                            <input type="text" class="form-control" id="name" name="name" style="border-color: #526D82;" value="{{ old('name') }}" required>
                        </div>
                        <div class="mb-3">
                            <label for="email" class="form-label" style="color: #526D82;"><i class="fas fa-envelope"></i> Email</label>
                            <input type="email" class="form-control" id="email" name="email" style="border-color: #526D82;" value="{{ old('email') }}" required>
                        </div>
                        <div class="mb-3">
                            <label for="password" class="form-label" style="color: #526D82;"><i class="fas fa-lock"></i> Password</label>
                            <input type="password" class="form-control" id="password" name="password" style="border-color: #526D82;" required>
                        </div>
                        <div class="mb-3">
                            <label for="password_confirmation" class="form-label" style="color: #526D82;"><i class="fas fa-lock"></i> Confirm Password</label>
                            <input type="password" class="form-control" id="password_confirmation" name="password_confirmation" style="border-color: #526D82;" required>
                        </div>
                        <div class="mb-3">
                            <label for="type" class="form-label" style="color: #526D82;"><i class="fas fa-user-tag"></i> Role</label>
                            <select class="form-select" id="type" name="type" style="border-color: #526D82;" required>
                                <option value="">Select a role</option>
                                <option value="writer" {{ old('type') == 'writer' ? 'selected' : '' }}>Writer</option>
                                <option value="admin" {{ old('type') == 'admin' ? 'selected' : '' }}>Admin</option>
                            </select>
                        </div>
                        <button type="submit" class="btn btn-lg w-100" style="background-color: #526D82; color: white;">
                            <i class="fas fa-user-plus"></i> Create User
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</main>


@endsection
