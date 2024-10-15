@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card" style="background-color: #f0f4f8; border: 1px solid #526D82;">
                <div class="card-header" style="background-color: #526D82; color: white; font-weight: bold;">
                    {{ __('Login') }}
                </div>

                <div class="card-body">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <div class="row mb-3">
                            <label for="email" class="col-md-4 col-form-label text-md-end" style="color: #526D82;">
                                {{ __('Email Address') }}
                            </label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" 
                                       name="email" value="{{ old('email') }}" required autocomplete="email" autofocus
                                       style="border-color: #526D82;">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="password" class="col-md-4 col-form-label text-md-end" style="color: #526D82;">
                                {{ __('Password') }}
                            </label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" 
                                       name="password" required autocomplete="current-password"
                                       style="border-color: #526D82;">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3 ">
                            <div class="col-md-6 offset-md-4 ">
                            </div>
                        </div>

                        <div class="row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn" style="background-color: #526D82; color: white;">
                                    {{ __('Login') }}
                                </button>
                            </div>
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
@endsection
