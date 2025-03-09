<x-guest-layout>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card shadow-lg border-0 rounded-lg mt-5">
                    <div class="card-header bg-primary text-white">
                        <h3 class="text-center font-weight-light my-2">{{ __('Verify Email Address') }}</h3>
                    </div>
                    <div class="card-body p-4">
                        <div class="text-center mb-4">
                            <div class="fw-bold text-primary mb-2 fs-2">
                                <i class="fas fa-envelope-open-text"></i>
                            </div>
                            <h5 class="text-muted">Email Verification Required</h5>
                        </div>

                        <div class="alert alert-info">
                            <i class="fas fa-info-circle me-2"></i>
                            {{ __('Before continuing, could you verify your email address by clicking on the link we just emailed to you? If you didn\'t receive the email, we will gladly send you another.') }}
                        </div>

                        @if (session('status') == 'verification-link-sent')
                            <div class="alert alert-success">
                                <i class="fas fa-check-circle me-2"></i>
                                {{ __('A new verification link has been sent to the email address you provided in your profile settings.') }}
                            </div>
                        @endif

                        <div class="row mt-4">
                            <div class="col-md-6 mb-3">
                                <form method="POST" action="{{ route('verification.send') }}">
                                    @csrf
                                    <div class="d-grid">
                                        <button type="submit" class="btn btn-primary">
                                            <i class="fas fa-paper-plane me-2"></i>{{ __('Resend Verification Email') }}
                                        </button>
                                    </div>
                                </form>
                            </div>
                            <div class="col-md-6">
                                <div class="d-grid">
                                    <a href="{{ route('profile.show') }}" class="btn btn-outline-secondary">
                                        <i class="fas fa-user-edit me-2"></i>{{ __('Edit Profile') }}
                                    </a>
                                </div>
                            </div>
                        </div>

                        <div class="text-center mt-4">
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
                                <button type="submit" class="btn btn-link text-decoration-none">
                                    <i class="fas fa-sign-out-alt me-1"></i>{{ __('Log Out') }}
                                </button>
                            </form>
                        </div>
                    </div>
                    <div class="card-footer text-center py-3 bg-light">
                        <div class="small">
                            <i class="fas fa-shield-alt me-1"></i>Verifying your email helps us keep your account secure
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-guest-layout>
