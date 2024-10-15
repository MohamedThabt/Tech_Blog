@extends('layout.app')

@section('content')

<main class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card shadow-sm" style="border-color: #526D82;">
                <div class="card-header" style="background-color: #526D82; color: white;">
                    <h2 class="mb-0"><i class="fas fa-edit"></i> Add New Post </h2>
                </div>
                <div class="card-body">
                <form method="POST" action="{{url('posts')}}" enctype="multipart/form-data">
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
                            <input type="text" class="form-control" name="title" style="border-color: #526D82;" value="{{ old('title') }}">
                        </div>
                        <div class="mb-3">
                            <label for="description" class="form-label" style="color: #526D82;"><i class="fas fa-paragraph"></i> Description</label>
                            <textarea class="form-control" name="description" rows="5" style="border-color: #526D82;">{{ old('description') }}</textarea>
                        </div>
                        <div class="mb-3">
                            <label for="user_id" class="form-label" style="color: #526D82;"><i class="fas fa-user"></i> Users</label>
                            <!-- <select class="form-select" name="user_id" id="user_id" style="border-color: #526D82;">
                                <option value="">Select a user</option>
                                @foreach($users as $user)
                                    <option value="{{ $user->id }}" {{ old('user_id') == $user->id ? 'selected' : '' }}>
                                        {{ $user->name }}
                                    </option>
                                @endforeach
                            </select> -->
                            <input type="text" class="form-control" name="user_name" value="{{ $user->name }}" style="border-color: #526D82;" readonly>
                            <input type="hidden" name="user_id" value="{{ $user->id }}">
                            
                        </div>
                        <div class="mb-3">
                            <label for="image" class="form-label" style="color: #526D82;"><i class="fas fa-image"></i> Image</label>
                            <input type="file" class="form-control" name="image" id="image" style="border-color: #526D82;">
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