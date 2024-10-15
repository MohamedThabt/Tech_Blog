@extends('layout.app')

@section('content')
<div class="container my-5">
    <div class="row justify-content-center">
        <div class="col-md-6"> <!-- Changed from col-md-8 to col-md-6 for a narrower form -->
            <div class="card shadow-lg" style="background-color: #f0f4f8; border: none; border-radius: 15px; overflow: hidden;">
                <div class="card-header py-3" style="background-color: #526D82; color: white; font-weight: bold; font-size: 1.2rem;">
                    {{ __('Login') }}
                </div>

                <div class="card-body p-4">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <div class="mb-4">
                            <label for="email" class="form-label fw-bold" style="color: #526D82;">
                                {{ __('Email Address') }}
                            </label>
                            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" 
                                   name="email" value="{{ old('email') }}" required autocomplete="email" autofocus
                                   style="border-color: #526D82; border-radius: 8px; padding: 10px;">
                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="mb-4">
                            <label for="password" class="form-label fw-bold" style="color: #526D82;">
                                {{ __('Password') }}
                            </label>
                            <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" 
                                   name="password" required autocomplete="current-password"
                                   style="border-color: #526D82; border-radius: 8px; padding: 10px;">
                            @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="d-grid">
                            <button type="submit" class="btn btn-lg" style="background-color: #526D82; color: white; border-radius: 8px;">
                                {{ __('Login') }}
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
    .social-icons a {
        display: inline-block;
        width: 40px;
        height: 40px;
        line-height: 40px;
        text-align: center;
        background-color: rgba(255, 255, 255, 0.1);
        border-radius: 50%;
        transition: all 0.3s ease;
    }
    .social-icons a:hover {
        background-color: #526D82;
        transform: translateY(-3px);
    }
</style>
@endsection