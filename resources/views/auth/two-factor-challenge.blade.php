<x-guest-layout>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card shadow-lg border-0 rounded-lg mt-5">
                    <div class="card-header bg-primary text-white">
                        <h3 class="text-center font-weight-light my-2">{{ __('Two Factor Authentication') }}</h3>
                    </div>
                    <div class="card-body p-4">
                        <div class="text-center mb-4">
                            <div class="fw-bold text-primary mb-2 fs-2">
                                <i class="fas fa-shield-alt"></i>
                            </div>
                            <h5 class="text-muted">Security Verification</h5>
                        </div>

                        <div x-data="{ recovery: false }">
                            <div class="alert alert-info" x-show="! recovery">
                                <i class="fas fa-info-circle me-2"></i>
                                {{ __('Please confirm access to your account by entering the authentication code provided by your authenticator application.') }}
                            </div>

                            <div class="alert alert-warning" x-cloak x-show="recovery">
                                <i class="fas fa-exclamation-triangle me-2"></i>
                                {{ __('Please confirm access to your account by entering one of your emergency recovery codes.') }}
                            </div>

                            @if ($errors->any())
                                <div class="alert alert-danger">
                                    <ul class="mb-0">
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif

                            <form method="POST" action="{{ route('two-factor.login') }}">
                                @csrf

                                <div class="mb-3" x-show="! recovery">
                                    <label for="code" class="form-label">{{ __('Authentication Code') }}</label>
                                    <div class="input-group">
                                        <span class="input-group-text"><i class="fas fa-key"></i></span>
                                        <input id="code" class="form-control" type="text" inputmode="numeric"
                                            name="code" autofocus x-ref="code" autocomplete="one-time-code"
                                            placeholder="Enter your 6-digit code">
                                    </div>
                                </div>

                                <div class="mb-3" x-cloak x-show="recovery">
                                    <label for="recovery_code" class="form-label">{{ __('Recovery Code') }}</label>
                                    <div class="input-group">
                                        <span class="input-group-text"><i class="fas fa-unlock"></i></span>
                                        <input id="recovery_code" class="form-control" type="text"
                                            name="recovery_code" x-ref="recovery_code" autocomplete="one-time-code"
                                            placeholder="Enter your recovery code">
                                    </div>
                                </div>

                                <div class="d-flex justify-content-between align-items-center mt-4">
                                    <div>
                                        <button type="button" class="btn btn-link text-decoration-none p-0"
                                                x-show="! recovery"
                                                x-on:click="
                                                    recovery = true;
                                                    $nextTick(() => { $refs.recovery_code.focus() })
                                                ">
                                            <i class="fas fa-sync-alt me-1"></i>{{ __('Use a recovery code') }}
                                        </button>

                                        <button type="button" class="btn btn-link text-decoration-none p-0"
                                                x-cloak
                                                x-show="recovery"
                                                x-on:click="
                                                    recovery = false;
                                                    $nextTick(() => { $refs.code.focus() })
                                                ">
                                            <i class="fas fa-mobile-alt me-1"></i>{{ __('Use an authentication code') }}
                                        </button>
                                    </div>

                                    <button type="submit" class="btn btn-primary">
                                        <i class="fas fa-sign-in-alt me-1"></i>{{ __('Log in') }}
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="card-footer text-center py-3 bg-light">
                        <div class="small">
                            <i class="fas fa-lock me-1"></i>Enhanced security for your account
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-guest-layout>
