@extends('layout.app')

@section('content')
<div class="container-fluid py-4">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card shadow">
                <!-- button add post -->
                <div class="card-header bg-primary text-white d-flex justify-content-between align-items-center" style="background-color: #526D82 !important;">
                    <h2 class="mb-0">Blog Posts Management</h2>
                    @can('create-post')
                    <a href="{{url('posts/create')}}" class="btn btn-light"><i class="fas fa-plus-circle me-2"></i>Add Post</a>
                    @endcan
                </div>
                <div class="card-body">
                    @if(session('delete'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            {{ session('delete') }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    @endif

                    <div class="table-responsive">
                        <table class="table table-hover">
                            <thead class="table-light">
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
                                <tr onclick="window.location='{{ url('posts/' . $post->id) }}';" style="cursor: pointer;">
                                    <td>{{$loop->iteration}}</td>
                                    <td>{{\Str::limit($post->title, 20)}}</td>
                                    <td>{{ \Str::limit($post->description, 50)}}</td>
                                    <td>{{$post->user->name}}</td>
                                    <td>
                                        <img src="{{ $post->image() }}" alt="{{ $post->title }}" class="img-thumbnail rounded-circle" style="width: 50px; height: 50px; object-fit: cover;">
                                    </td>
                                    <td onclick="event.stopPropagation();">
                                        @if(Gate::check('post-upate-delete', $post) || Gate::check('admin-controller'))
                                            <form action="{{ url('posts/'.$post->id.'/edit') }}" method="post" class="d-inline-block">
                                                @csrf
                                                @method('PUT')
                                                <button class="btn btn-edit"><i class="fas fa-edit"></i></button>
                                            </form>
                                            <form action="{{ url('posts/'.$post->id) }}" method="post" class="d-inline-block">
                                                @csrf
                                                @method('DELETE')
                                                <button class="btn btn-delete"><i class="fas fa-trash-alt"></i></button>
                                            </form>
                                        @endif
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>

                    <div class="d-flex justify-content-center mt-4">
                        {{ $posts->links() }}
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
