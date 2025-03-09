<x-guest-layout>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card shadow-lg border-0 rounded-lg mt-5">
                    <div class="card-header bg-primary text-white">
                        <h3 class="text-center font-weight-light my-2">{{ __('Reset Password') }}</h3>
                    </div>
                    <div class="card-body p-4">
                        <div class="text-center mb-4">
                            <img src="{{ asset('images/logo.png') }}" alt="Logo" class="img-fluid mb-3" style="max-height: 80px;">
                            <h5 class="text-muted">Forgot your password?</h5>
                            <p class="mb-4">
                                {{ __('No problem. Just let us know your email address and we will email you a password reset link that will allow you to choose a new one.') }}
                            </p>
                        </div>

                        @if (session('status'))
                            <div class="alert alert-success mb-4">
                                {{ session('status') }}
                            </div>
                        @endif

                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul class="mb-0">
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif

                        <form method="POST" action="{{ route('password.email') }}">
                            @csrf

                            <div class="mb-4">
                                <label for="email" class="form-label">{{ __('Email Address') }}</label>
                                <div class="input-group">
                                    <span class="input-group-text"><i class="fas fa-envelope"></i></span>
                                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror"
                                        name="email" value="{{ old('email') }}" required autocomplete="email" autofocus
                                        placeholder="Enter your email address">
                                </div>
                                @error('email')
                                    <span class="invalid-feedback d-block" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="d-grid gap-2 mb-3">
                                <button type="submit" class="btn btn-primary btn-lg">
                                    <i class="fas fa-paper-plane me-2"></i>{{ __('Email Password Reset Link') }}
                                </button>
                            </div>

                            <div class="text-center">
                                <a href="{{ route('login') }}" class="text-decoration-none">
                                    <i class="fas fa-arrow-left me-1"></i>{{ __('Back to login') }}
                                </a>
                            </div>
                        </form>
                    </div>
                    <div class="card-footer text-center py-3 bg-light">
                        <div class="small">
                            <i class="fas fa-lock me-1"></i>Secure password reset process
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-guest-layout>
