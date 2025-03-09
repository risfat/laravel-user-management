<x-layouts.app>
    <div class="container py-5">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card shadow">
                    <div class="card-header bg-primary text-white">
                        <h2 class="mb-0">Edit User: {{ $user->name }}</h2>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('users.update', $user) }}">
                            @csrf
                            @method('PUT')

                            <div class="row mb-3">
                                <div class="col-md-6">
                                    <label for="name" class="form-label">Name</label>
                                    <input type="text" class="form-control" name="name" id="name" value="{{ old('name', $user->name) }}" required>
                                </div>
                                <div class="col-md-6">
                                    <label for="email" class="form-label">Email</label>
                                    <input type="email" class="form-control" id="email" value="{{ $user->email }}" readonly>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <div class="col-md-6">
                                    <label for="phone" class="form-label">Phone</label>
                                    <input type="tel" class="form-control" name="phone" id="phone" value="{{ old('phone', $user->phone) }}">
                                </div>
                                <div class="col-md-6">
                                    <label for="date_of_birth" class="form-label">Date of Birth</label>
                                    <input type="date" class="form-control" name="date_of_birth" id="date_of_birth" value="{{ old('date_of_birth', $user->date_of_birth ? $user->date_of_birth->format('Y-m-d') : '') }}">
                                </div>
                            </div>

                            <div class="row mb-3">
                                <div class="col-md-6">
                                    <label for="password" class="form-label">New Password (optional)</label>
                                    <input type="password" class="form-control" name="password" id="password">
                                </div>
                                <div class="col-md-6">
                                    <label for="password_confirmation" class="form-label">Confirm New Password</label>
                                    <input type="password" class="form-control" name="password_confirmation" id="password_confirmation">
                                </div>
                            </div>

                            <div class="row mb-3">
                                <div class="col-md-12">
                                    <label for="address" class="form-label">Address</label>
                                    <textarea class="form-control" name="address" id="address" rows="3">{{ old('address', $user->address) }}</textarea>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <div class="col-md-6">
                                    <label for="role" class="form-label">Role</label>
                                    <select class="form-select" name="role" id="role" required>
                                        @foreach($roles as $role)
                                        <option value="{{ $role->name }}" {{ $currentRole === $role->name ? 'selected' : '' }}>
                                            {{ $role->name }}
                                        </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <div class="col-md-6">
                                    <label for="created_at" class="form-label">Created At</label>
                                    <input type="text" class="form-control" id="created_at" value="{{ $user->created_at }}" readonly>
                                </div>
                                <div class="col-md-6">
                                    <label for="updated_at" class="form-label">Updated At</label>
                                    <input type="text" class="form-control" id="updated_at" value="{{ $user->updated_at }}" readonly>
                                </div>
                            </div>

                            <div class="d-grid gap-2">
                                <button type="submit" class="btn btn-primary btn-lg">Update User</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-layouts.app>
