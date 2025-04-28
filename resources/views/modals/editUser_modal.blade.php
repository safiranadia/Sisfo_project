@foreach ($users as $user)
    <div class="modal fade" id="editUser{{ $user->id }}" tabindex="-1" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Edit User: {{ $user->name }}</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="{{ route('user.update', $user->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="modal-body">
                        <div class="mb-3">
                            <label for="name{{ $user->name }}" class="form-label">Name</label>
                            <input type="text" class="form-control @error('name') is-invalid @enderror"
                                id="name{{ $user->name }}" name="name" value="{{ old('name', $user->name) }}"
                                required>
                            @error('name')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="email{{ $user->email }}" class="form-label">Email</label>
                            <input type="email" class="form-control @error('email') is-invalid @enderror"
                                id="email{{ $user->email }}" name="email" value="{{ old('email', $user->email) }}"
                                required>
                            @error('email')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="password{{ $user->password }}" class="form-label">Password</label>
                            <input type="password" class="form-control @error('password') is-invalid @enderror"
                                id="password{{ $user->password }}" name="password" value="{{ old('password') }}">
                            @error('password')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                            <small class="text-muted">Kosongkan jika tidak ingin mengganti password</small>
                        </div>
                        <div class="mb-3">
                            <label for="password_confirmation" class="form-label">Password Confirmation</label>
                            <input type="password"
                                class="form-control @error('password_confirmation') is-invalid @enderror"
                                id="password_confirmation" name="password_confirmation"
                                value="{{ old('password_confirmation') }}">
                            @error('password_confirmation')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                            <small class="text-muted">Kosongkan jika tidak ingin mengganti password</small>
                        </div>
                        <div class="mb-3">
                            <label for="position{{ $user->position }}" class="form-label">Position</label>
                            <select class="form-select @error('position') is-invalid @enderror"
                                id="position{{ $user->position }}" name="position" required>
                                <option value="">Select Position</option>
                                @foreach ($users as $user)
                                    <option value="{{ $user->position }}"
                                        {{ old('position', $user->position) == $user->position ? 'selected' : '' }}>
                                        {{ $user->position }}
                                    </option>
                                @endforeach
                            </select>
                            @error('position')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="class{{ $user->class }}" class="form-label">Class</label>
                            <input type="text" class="form-control @error('class') is-invalid @enderror"
                                id="class{{ $user->class }}" name="class" value="{{ old('class', $user->class) }}">
                            @error('class')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="role{{ $user->role }}" class="form-label">Role</label>
                            <select class="form-select @error('role') is-invalid @enderror"
                                id="role{{ $user->role }}" name="role" required>
                                <option value="">Select Role</option>
                                @foreach ($users as $user)
                                    <option value="{{ $user->role }}"
                                        {{ old('role', $user->role) == $user->role ? 'selected' : '' }}>
                                        {{ $user->role }}
                                    </option>
                                @endforeach
                            </select>
                            @error('role')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Create User</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endforeach
