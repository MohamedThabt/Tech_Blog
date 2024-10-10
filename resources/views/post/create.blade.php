@extends('layout.app')

@section('content')

<main class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card shadow-sm" style="border-color: #526D82;">
                <div class="card-header" style="background-color: #526D82; color: white;">
                    <h2 class="mb-0"><i class="fas fa-edit"></i> Add New Post</h2>
                </div>
                <div class="card-body">
                    <form method="POST" action="{{url('posts.create')}}">
                        <div class="mb-3">
                            <label for="title" class="form-label" style="color: #526D82;"><i class="fas fa-heading"></i> Title</label>
                            <input type="text" class="form-control" id="title" required style="border-color: #526D82;">
                        </div>
                        <div class="mb-3">
                            <label for="description" class="form-label" style="color: #526D82;"><i class="fas fa-paragraph"></i> Description</label>
                            <textarea class="form-control" id="description" rows="5" required style="border-color: #526D82;"></textarea>
                        </div>
                        <div class="mb-3">
                            <label for="user" class="form-label" style="color: #526D82;"><i class="fas fa-user"></i> User</label>
                            <input type="text" class="form-control" id="user" required style="border-color: #526D82;">
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