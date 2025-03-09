<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>User Management System</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary mb-4 shadow-sm">
        <div class="container">
            <a class="navbar-brand fw-bold" href="{{ route('dashboard') }}">
                <i class="bi bi-people-fill me-2"></i>User Management
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav me-auto">
                    <li class="nav-item">
                        <a class="nav-link {{ request()->routeIs('dashboard') ? 'active fw-bold' : '' }}" href="{{ route('dashboard') }}">
                            <i class="bi bi-speedometer2 me-1"></i>Dashboard
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ request()->routeIs('users.*') ? 'active fw-bold' : '' }}" href="{{ route('users.index') }}">
                            <i class="bi bi-person-lines-fill me-1"></i>Users
                        </a>
                    </li>
                </ul>
                <div class="d-flex">
                    <div class="dropdown">
                        <button class="btn btn-light dropdown-toggle" type="button" id="userDropdown" data-bs-toggle="dropdown" aria-expanded="false">
                            <i class="bi bi-person-circle me-1"></i>
                            {{ Auth::user()->name ?? 'Account' }}
                        </button>
                        <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="userDropdown">
                            <li><a class="dropdown-item" href="#"><i class="bi bi-person me-2"></i>Profile</a></li>
                            <li><a class="dropdown-item" href="#"><i class="bi bi-gear me-2"></i>Settings</a></li>
                            <li><hr class="dropdown-divider"></li>
                            <li>
                                <form method="POST" action="{{ route('logout') }}">
                                    @csrf
                                    <button type="submit" class="dropdown-item text-danger">
                                        <i class="bi bi-box-arrow-right me-2"></i>Logout
                                    </button>
                                </form>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </nav>

    <div class="container">
        @if(session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <i class="bi bi-check-circle-fill me-2"></i>{{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        {{ $slot }}
    </div>

    @stack('scripts')

</body>
</html>
