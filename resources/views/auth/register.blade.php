@extends('layout.app')

@section('content')
<div class="container my-4">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card shadow-sm">
                <div class="card-header text-white py-2">
                    <h5 class="mb-0">{{ __('Register') }}</h5>
                </div>

                <div class="card-body bg-light">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                        <div class="mb-3">
                            <label for="name" class="form-label small">{{ __('Name') }}</label>
                            <input id="name" type="text" class="form-control form-control-sm @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>
                            @error('name')
                                <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="email" class="form-label small">{{ __('Email Address') }}</label>
                            <input id="email" type="email" class="form-control form-control-sm @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">
                            @error('email')
                                <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="password" class="form-label small">{{ __('Password') }}</label>
                            <input id="password" type="password" class="form-control form-control-sm @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">
                            @error('password')
                                <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="password-confirm" class="form-label small">{{ __('Confirm Password') }}</label>
                            <input id="password-confirm" type="password" class="form-control form-control-sm" name="password_confirmation" required autocomplete="new-password">
                        </div>

                        <div class="d-grid">
                            <button type="submit" class="btn btn-primary">
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
<footer class="bg-dark text-white py-3">
    <div class="container">
        <div class="row gy-3">
            <div class="col-md-6">
                <h6 class="mb-1">Tech Blog</h6>
                <p class="small mb-0">Empowering developers with cutting-edge insights and knowledge.</p>
            </div>
            <div class="col-md-6 text-md-end">
                <h6 class="mb-1">Connect With Us</h6>
                <div class="social-icons">
                    <a href="https://www.facebook.com/mohamed.thabet.545" class="text-white me-2" target="_blank"><i class="fab fa-facebook-f"></i></a>
                    <a href="https://twitter.com/Mohamed13546660" class="text-white me-2" target="_blank"><i class="fab fa-twitter"></i></a>
                    <a href="https://www.linkedin.com/in/mohamed-thabet-5694462a0" class="text-white me-2" target="_blank"><i class="fab fa-linkedin-in"></i></a>
                    <a href="https://github.com/MohamedThabt" class="text-white" target="_blank"><i class="fab fa-github"></i></a>
                </div>
            </div>
        </div>
        <hr class="my-2">
        <div class="text-center">
            <p class="small mb-0">&copy; 2024 Tech Blog. Created by Mohamed Thabet, Backend Engineer.</p>
        </div>
    </div>
</footer>

<style>
    body {
        display: flex;
        flex-direction: column;
        min-height: 100vh;
    }
    .container {
        flex: 1 0 auto;
    }
    footer {
        flex-shrink: 0;
    }
    .card {
        border: none;
        border-radius: 10px;
        overflow: hidden;
    }
    .card-header {
        background-color: var(--primary-dark);
        padding: 0.75rem 1rem;
    }
    .card-body {
        padding: 1.25rem;
    }
    .form-label {
        font-weight: 600;
        color: var(--text-color);
        margin-bottom: 0.25rem;
    }
    .form-control {
        border-radius: 6px;
        padding: 0.4rem 0.75rem;
        border: 1px solid var(--accent-color);
    }
    .form-control:focus {
        border-color: var(--primary-color);
        box-shadow: 0 0 0 0.15rem rgba(82, 109, 130, 0.25);
    }
    .btn-primary {
        background-color: var(--primary-color);
        border-color: var(--primary-color);
        padding: 0.5rem 1rem;
        font-weight: 600;
        border-radius: 6px;
        transition: all 0.3s ease;
    }
    .btn-primary:hover {
        background-color: var(--primary-dark);
        border-color: var(--primary-dark);
        transform: translateY(-1px);
        box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
    }
    .social-icons a {
        display: inline-block;
        width: 30px;
        height: 30px;
        line-height: 30px;
        text-align: center;
        background-color: rgba(255, 255, 255, 0.1);
        border-radius: 50%;
        transition: all 0.3s ease;
    }
    .social-icons a:hover {
        background-color: var(--primary-color);
        transform: translateY(-2px);
    }
</style>
@endsection