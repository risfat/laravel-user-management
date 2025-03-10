<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel User Management') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="font-sans antialiased">
    <!-- Navigation -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary shadow-sm sticky-top">
        <div class="container">
            <a class="navbar-brand" href="{{ url('/') }}">
                <img src="{{ asset('images/logo.png') }}" alt="Logo" height="30" class="d-inline-block align-text-top me-2">
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav me-auto">
                    <li class="nav-item">
                        <a class="nav-link active" href="{{ url('/') }}">Home</a>
                    </li>
                </ul>
                <div class="d-flex">
                    @if (Route::has('login'))
                        <div class="navbar-nav">
                            @auth
                                <a href="{{ route('dashboard') }}" class="nav-link">Dashboard</a>
                            @else
                                <a href="{{ route('login') }}" class="nav-link">Log in</a>
                                @if (Route::has('register'))
                                    <a href="{{ route('register') }}" class="nav-link">Register</a>
                                @endif
                            @endauth
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </nav>

    <!-- Hero Section -->
    <div class="bg-light py-5">
        <div class="container">
            <div class="row align-items-center g-5 py-5">
                <div class="col-lg-6">
                    <h1 class="display-4 fw-bold lh-1 mb-3">User Management System</h1> </br>
                    <p class="lead">Efficiently manage your users with our comprehensive user management system. Control access, track activity, and streamline user operations with our intuitive interface.</p>
                    </br>
                    <div class="d-grid gap-2 d-md-flex justify-content-md-start">
                        @if (Route::has('register'))
                            <a href="{{ route('register') }}" class="btn btn-primary btn-lg px-4 me-md-2">Get Started</a>
                        @endif
                        <a href="{{ route('login') }}" class="btn btn-outline-secondary btn-lg px-4">Log In</a>
                    </div>
                </div>
                <div class="col-lg-6">
                    <img src="{{ asset('images/illustration.svg') }}" class="d-block mx-lg-auto img-fluid rounded shadow" alt="User Management Dashboard" width="700" height="500" loading="lazy">
                </div>
            </div>
        </div>
    </div>

    <!-- Features Section -->
    <div class="container py-5">
        <h2 class="text-center mb-5">Key Features</h2>
        <div class="row g-4 py-5 row-cols-1 row-cols-lg-3">
            <div class="col d-flex align-items-start">
                <div class="icon-square text-bg-light d-inline-flex align-items-center justify-content-center fs-4 flex-shrink-0 me-3">
                    <i class="bi bi-people-fill"></i>
                </div>
                <div>
                    <h3 class="fs-2">User Management</h3>
                    <p>Create, update, and delete user accounts with ease. Assign roles and permissions to control access to different parts of your application.</p>
                </div>
            </div>
            <div class="col d-flex align-items-start">
                <div class="icon-square text-bg-light d-inline-flex align-items-center justify-content-center fs-4 flex-shrink-0 me-3">
                    <i class="bi bi-shield-lock-fill"></i>
                </div>
                <div>
                    <h3 class="fs-2">Authentication</h3>
                    <p>Secure login system with password reset functionality, two-factor authentication, and session management.</p>
                </div>
            </div>
            <div class="col d-flex align-items-start">
                <div class="icon-square text-bg-light d-inline-flex align-items-center justify-content-center fs-4 flex-shrink-0 me-3">
                    <i class="bi bi-graph-up"></i>
                </div>
                <div>
                    <h3 class="fs-2">Activity Tracking</h3>
                    <p>Monitor user activity and generate reports to gain insights into user behavior and system usage.</p>
                </div>
            </div>
        </div>
    </div>

    <!-- Call to Action -->
    <div class="container py-5">
        <div class="p-5 mb-4 bg-primary text-white rounded-3">
            <div class="container-fluid py-5">
                <h2 class="display-5 fw-bold">Ready to get started?</h2>
                <p class="col-md-8 fs-4">Join thousands of organizations that trust our user management system to handle their authentication and authorization needs.</p>
                @if (Route::has('register'))
                    <a href="{{ route('register') }}" class="btn btn-light btn-lg">Sign Up Now</a>
                @endif
            </div>
        </div>
    </div>

    <!-- Footer -->
    <footer class="bg-dark text-white py-4">
        <div class="container">
            <div class="row">
                <div class="col-md-6 mb-3">
                    <h5>Laravel User Management</h5>
                    <p class="text-muted">Simplifying user management for businesses of all sizes.</p>
                </div>
                <div class="col-md-6 mb-3">
                    <h5>Subscribe to our newsletter</h5>
                    <p class="text-muted">Monthly digest of what's new and exciting from us.</p>
                    <form>
                        <div class="d-flex flex-column flex-sm-row w-100 gap-2">
                            <label for="newsletter" class="visually-hidden">Email address</label>
                            <input id="newsletter" type="email" class="form-control" placeholder="Email address">
                            <button class="btn btn-primary" type="button">Subscribe</button>
                        </div>
                    </form>
                </div>
            </div>
            <div class="d-flex flex-column flex-sm-row justify-content-between pt-4 mt-4 border-top">
                <p>&copy; {{ date('Y') }} {{ config('app.name', 'Laravel User Management') }}. All rights reserved.</p>
                <ul class="list-unstyled d-flex">
                    <li class="ms-3"><a class="text-muted" href="#"><i class="bi bi-twitter"></i></a></li>
                    <li class="ms-3"><a class="text-muted" href="#"><i class="bi bi-instagram"></i></a></li>
                    <li class="ms-3"><a class="text-muted" href="#"><i class="bi bi-facebook"></i></a></li>
                    <li class="ms-3"><a class="text-muted" href="#"><i class="bi bi-github"></i></a></li>
                </ul>
            </div>
        </div>
    </footer>

    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
</body>
</html>
