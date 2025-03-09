<x-guest-layout>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card shadow-lg border-0 rounded-lg mt-5">
                    <div class="card-header bg-primary text-white">
                        <h3 class="text-center font-weight-light my-2">{{ __('Create Account') }}</h3>
                    </div>
                    <div class="card-body p-4">
                        <div class="text-center mb-4">
                            <img src="{{ asset('images/logo.png') }}" alt="Logo" class="img-fluid mb-3" style="max-height: 80px;">
                            <h5 class="text-muted">Register a new account</h5>
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

                        <form method="POST" action="{{ route('register') }}" enctype="multipart/form-data">
                            @csrf

                            <div class="mb-3">
                                <label for="name" class="form-label">{{ __('Name') }}</label>
                                <div class="input-group">
                                    <span class="input-group-text"><i class="fas fa-user"></i></span>
                                    <input id="name" type="text" class="form-control @error('name') is-invalid @enderror"
                                        name="name" value="{{ old('name') }}" required autocomplete="name" autofocus
                                        placeholder="Enter your full name">
                                </div>
                                @error('name')
                                    <span class="invalid-feedback d-block" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="email" class="form-label">{{ __('Email Address') }}</label>
                                <div class="input-group">
                                    <span class="input-group-text"><i class="fas fa-envelope"></i></span>
                                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror"
                                        name="email" value="{{ old('email') }}" required autocomplete="email"
                                        placeholder="Enter your email address">
                                </div>
                                @error('email')
                                    <span class="invalid-feedback d-block" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="phone_number" class="form-label">{{ __('Phone Number') }}</label>
                                <div class="input-group">
                                    <span class="input-group-text"><i class="fas fa-phone"></i></span>
                                    <input id="phone_number" type="tel" class="form-control @error('phone_number') is-invalid @enderror"
                                        name="phone_number" value="{{ old('phone_number') }}" autocomplete="tel"
                                        placeholder="Enter your phone number">
                                </div>
                                @error('phone_number')
                                    <span class="invalid-feedback d-block" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="date_of_birth" class="form-label">{{ __('Date of Birth') }}</label>
                                <div class="input-group">
                                    <span class="input-group-text"><i class="fas fa-calendar"></i></span>
                                    <input id="date_of_birth" type="date" class="form-control @error('date_of_birth') is-invalid @enderror"
                                        name="date_of_birth" value="{{ old('date_of_birth') }}">
                                </div>
                                @error('date_of_birth')
                                    <span class="invalid-feedback d-block" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="address" class="form-label">{{ __('Address') }}</label>
                                <div class="input-group">
                                    <span class="input-group-text"><i class="fas fa-home"></i></span>
                                    <input id="address" type="text" class="form-control @error('address') is-invalid @enderror"
                                        name="address" value="{{ old('address') }}" autocomplete="street-address"
                                        placeholder="Enter your address">
                                </div>
                                @error('address')
                                    <span class="invalid-feedback d-block" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="row mb-3">
                                <div class="col-md-6">
                                    <label for="city" class="form-label">{{ __('City') }}</label>
                                    <input id="city" type="text" class="form-control @error('city') is-invalid @enderror"
                                        name="city" value="{{ old('city') }}" autocomplete="address-level2"
                                        placeholder="Enter your city">
                                    @error('city')
                                        <span class="invalid-feedback d-block" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="col-md-6">
                                    <label for="country" class="form-label">{{ __('Country') }}</label>
                                    <input id="country" type="text" class="form-control @error('country') is-invalid @enderror"
                                        name="country" value="{{ old('country') }}" autocomplete="country-name"
                                        placeholder="Enter your country">
                                    @error('country')
                                        <span class="invalid-feedback d-block" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="mb-3">
                                <label for="profile_picture" class="form-label">{{ __('Profile Picture') }}</label>
                                <input id="profile_picture" type="file" class="form-control @error('profile_picture') is-invalid @enderror"
                                    name="profile_picture" accept="image/*">
                                @error('profile_picture')
                                    <span class="invalid-feedback d-block" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="bio" class="form-label">{{ __('Bio') }}</label>
                                <textarea id="bio" class="form-control @error('bio') is-invalid @enderror"
                                    name="bio" rows="3" placeholder="Tell us about yourself">{{ old('bio') }}</textarea>
                                @error('bio')
                                    <span class="invalid-feedback d-block" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="password" class="form-label">{{ __('Password') }}</label>
                                <div class="input-group">
                                    <span class="input-group-text"><i class="fas fa-lock"></i></span>
                                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror"
                                        name="password" required autocomplete="new-password"
                                        placeholder="Create a password">
                                </div>
                                @error('password')
                                    <span class="invalid-feedback d-block" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="mb-4">
                                <label for="password_confirmation" class="form-label">{{ __('Confirm Password') }}</label>
                                <div class="input-group">
                                    <span class="input-group-text"><i class="fas fa-lock"></i></span>
                                    <input id="password_confirmation" type="password" class="form-control"
                                        name="password_confirmation" required autocomplete="new-password"
                                        placeholder="Confirm your password">
                                </div>
                            </div>

                            @if (Laravel\Jetstream\Jetstream::hasTermsAndPrivacyPolicyFeature())
                                <div class="mb-3">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" name="terms" id="terms" required>
                                        <label class="form-check-label" for="terms">
                                            {!! __('I agree to the :terms_of_service and :privacy_policy', [
                                                'terms_of_service' => '<a target="_blank" href="'.route('terms.show').'" class="text-decoration-none">'.__('Terms of Service').'</a>',
                                                'privacy_policy' => '<a target="_blank" href="'.route('policy.show').'" class="text-decoration-none">'.__('Privacy Policy').'</a>',
                                            ]) !!}
                                        </label>
                                    </div>
                                </div>
                            @endif

                            <div class="d-grid gap-2 mb-3">
                                <button type="submit" class="btn btn-primary btn-lg">
                                    <i class="fas fa-user-plus me-2"></i>{{ __('Register') }}
                                </button>
                            </div>

                            <div class="text-center">
                                <p>Already have an account?
                                    <a href="{{ route('login') }}" class="text-decoration-none">{{ __('Sign in here') }}</a>
                                </p>
                            </div>
                        </form>
                    </div>
                    <div class="card-footer text-center py-3 bg-light">
                        <div class="small">
                            <i class="fas fa-shield-alt me-1"></i>Your personal information is secure with us
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-guest-layout>
