@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card shadow-lg">
                <div class="card-header text-white">
                    <h4 class="mb-0">{{ __('Register') }}</h4>
                </div>

                <div class="card-body bg-light">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                        <div class="mb-4">
                            <label for="name" class="form-label">{{ __('Name') }}</label>
                            <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>
                            @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="mb-4">
                            <label for="email" class="form-label">{{ __('Email Address') }}</label>
                            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">
                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="mb-4">
                            <label for="password" class="form-label">{{ __('Password') }}</label>
                            <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">
                            @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="mb-4">
                            <label for="password-confirm" class="form-label">{{ __('Confirm Password') }}</label>
                            <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                        </div>

                        <div class="d-grid">
                            <button type="submit" class="btn btn-primary btn-lg">
                                {{ __('Register') }}
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
 <!-- Footer -->
 <footer class="bg-dark text-white py-4">
        <div class="container">
            <div class="row gy-4">
                <div class="col-md-6">
                    <h5>Tech Blog</h5>
                    <p>Empowering developers with cutting-edge insights and knowledge.</p>
                </div>
                <div class="col-md-6 text-md-end">
                    <h5>Connect With Us</h5>
                    <div>
                        <a href="https://www.facebook.com/mohamed.thabet.545" class="text-white me-3" target="_blank" ><i class="fab fa-facebook-f fa-lg"></i></a>
                        <a href="https://twitter.com/Mohamed13546660" class="text-white me-3" target="_blank" ><i class="fab fa-twitter fa-lg"></i></a>
                        <a href="https://www.linkedin.com/in/mohamed-thabet-5694462a0" class="text-white me-3" target="_blank" ><i class="fab fa-linkedin-in fa-lg"></i></a>
                        <a href="https://github.com/MohamedThabt" class="text-white" target="_blank" ><i class="fab fa-github fa-lg"></i></a>

                    </div>
                </div>
            </div>
            <hr>
            <div class="text-center">
                <p class="mb-0">&copy; 2024 Tech Blog. Created by Mohamed Thabet, Backend Engineer.</p>
            </div>
        </div>
    </footer>

<style>
    .card {
        border: none;
        border-radius: 15px;
        overflow: hidden;
    }
    .card-header {
        background-color:  var(--primary-dark);
        padding: 1.5rem;
    }
    .card-body {
        padding: 2rem;
    }
    .form-label {
        font-weight: 600;
        color: var(--text-color);
    }
    .form-control {
        border-radius: 8px;
        padding: 0.75rem 1rem;
        border: 1px solid var(--accent-color);
    }
    .form-control:focus {
        border-color: var(--primary-color);
        box-shadow: 0 0 0 0.2rem rgba(82, 109, 130, 0.25);
    }
    .btn-primary {
        background-color: var(--primary-color);
        border-color: var(--primary-color);
        padding: 0.75rem 1.5rem;
        font-weight: 600;
        border-radius: 8px;
        transition: all 0.3s ease;
    }
    .btn-primary:hover {
        background-color: var(--primary-dark);
        border-color: var(--primary-dark);
        transform: translateY(-2px);
        box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
    }
</style>
@endsection