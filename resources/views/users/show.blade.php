<x-layouts.app>
    <div class="container py-4">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card shadow-sm">
                    <div class="card-header bg-white d-flex justify-content-between align-items-center py-3">
                        <h1 class="h3 mb-0 text-gray-800">User Details</h1>
                        <a href="{{ route('users.index') }}" class="btn btn-outline-secondary btn-sm">
                            <i class="fas fa-arrow-left me-1"></i> Back to Users
                        </a>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-4 text-center mb-3">
                                <img src="{{ $user->profile_photo_url }}" alt="{{ $user->name }}" class="rounded-circle img-thumbnail" width="150">
                            </div>
                            <div class="col-md-8">
                                <h2 class="mb-3">{{ $user->name }}</h2>
                                <ul class="list-group list-group-flush">
                                    <li class="list-group-item d-flex justify-content-between align-items-center">
                                        <span><i class="fas fa-envelope me-2"></i> Email</span>
                                        <span>{{ $user->email }}</span>
                                    </li>
                                    <li class="list-group-item d-flex justify-content-between align-items-center">
                                        <span><i class="fas fa-user-tag me-2"></i> Role</span>
                                        <span class="badge bg-info text-dark">{{ $user->getRoleNames()->first() }}</span>
                                    </li>
                                    <li class="list-group-item d-flex justify-content-between align-items-center">
                                        <span><i class="fas fa-phone me-2"></i> Phone</span>
                                        <span>{{ $user->phone ?? 'N/A' }}</span>
                                    </li>
                                    <li class="list-group-item d-flex justify-content-between align-items-center">
                                        <span><i class="fas fa-map-marker-alt me-2"></i> Address</span>
                                        <span>{{ $user->address ?? 'N/A' }}</span>
                                    </li>
                                    <li class="list-group-item d-flex justify-content-between align-items-center">
                                        <span><i class="fas fa-city me-2"></i> City</span>
                                        <span>{{ $user->city ?? 'N/A' }}</span>
                                    </li>
                                    <li class="list-group-item d-flex justify-content-between align-items-center">
                                        <span><i class="fas fa-flag me-2"></i> State</span>
                                        <span>{{ $user->state ?? 'N/A' }}</span>
                                    </li>
                                    <li class="list-group-item d-flex justify-content-between align-items-center">
                                        <span><i class="fas fa-globe me-2"></i> Country</span>
                                        <span>{{ $user->country ?? 'N/A' }}</span>
                                    </li>
                                    <li class="list-group-item d-flex justify-content-between align-items-center">
                                        <span><i class="fas fa-map-pin me-2"></i> Zip Code</span>
                                        <span>{{ $user->zip_code ?? 'N/A' }}</span>
                                    </li>
                                    <li class="list-group-item d-flex justify-content-between align-items-center">
                                        <span><i class="fas fa-birthday-cake me-2"></i> Date of Birth</span>
                                        <span>{{ $user->date_of_birth ? $user->date_of_birth->format('M d, Y') : 'N/A' }}</span>
                                    </li>
                                    <li class="list-group-item d-flex justify-content-between align-items-center">
                                        <span><i class="fas fa-venus-mars me-2"></i> Gender</span>
                                        <span>{{ ucfirst($user->gender ?? 'N/A') }}</span>
                                    </li>
                                    <li class="list-group-item d-flex justify-content-between align-items-center">
                                        <span><i class="fas fa-calendar-alt me-2"></i> Registered</span>
                                        <span>{{ $user->created_at->format('M d, Y') }} ({{ $user->created_at->diffForHumans() }})</span>
                                    </li>
                                    <li class="list-group-item d-flex justify-content-between align-items-center">
                                        <span><i class="fas fa-check-circle me-2"></i> Email Verified</span>
                                        <span>
                                            @if($user->email_verified_at)
                                                <span class="text-success">Yes ({{ $user->email_verified_at->format('M d, Y') }})</span>
                                            @else
                                                <span class="text-danger">No</span>
                                            @endif
                                        </span>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        @if($user->bio)
                            <div class="mt-4">
                                <h4 class="mb-2">Bio</h4>
                                <p class="text-muted">{{ $user->bio }}</p>
                            </div>
                        @endif
                    </div>
                    <div class="card-footer bg-white">
                        <div class="d-flex justify-content-end gap-2">
                            <a href="{{ route('users.edit', $user) }}" class="btn btn-warning">
                                <i class="fas fa-edit me-1"></i> Edit
                            </a>
                            <form action="{{ route('users.destroy', $user) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this user?')">
                                    <i class="fas fa-trash me-1"></i> Delete
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-layouts.app>
