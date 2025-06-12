<form method="POST" action="{{ route('profile.update') }}" enctype="multipart/form-data">
    @csrf
    @method('PUT')
    <div class="modal-header">
        <h5 class="modal-title">Edit Profile</h5>
        <a href="#" class="close" data-bs-dismiss="modal"><em class="icon ni ni-cross-sm"></em></a>
    </div>
    <div class="modal-body modal-body-lg">
        <ul class="nk-nav nav nav-tabs">
            <li class="nav-item">
                <a class="nav-link active" data-bs-toggle="tab" href="#personal">Personal</a>
            </li>
        </ul>
        <div class="tab-content">
            <div class="tab-pane active" id="personal">
                <div class="row gy-4">
                    <div class="col-md-6">
                        <label class="form-label" for="name">Full Name</label>
                        <input type="text" class="form-control" id="name" name="name"
                            value="{{ old('name', $user->name) }}" required>
                    </div>
                    <div class="col-md-6">
                        <label class="form-label" for="username">Username</label>
                        <input type="text" class="form-control" id="username" name="username"
                            value="{{ old('username', $user->username) }}" required>
                    </div>
                    <div class="col-md-6">
                        <label class="form-label" for="email">Email</label>
                        <input type="email" class="form-control" id="email" name="email"
                            value="{{ old('email', $user->email) }}" required>
                    </div>
                    <div class="col-md-6">
                        <label class="form-label" for="no_telp">Phone Number</label>
                        <input type="text" class="form-control" id="no_telp" name="no_telp"
                            value="{{ old('no_telp', $user->no_telp) }}">
                    </div>
                    <div class="col-md-6">
                        <label class="form-label" for="image">Profile Image</label>
                        <input type="file" class="form-control" id="image" name="image" accept="image/*">
                        @if ($user->image)
                            <small class="text-muted">Current: {{ $user->image }}</small>
                        @endif
                    </div>
                    <div class="col-md-6">
                        <label class="form-label" for="password">New Password</label>
                        <input type="password" class="form-control" id="password" name="password"
                            placeholder="Leave blank if unchanged">
                    </div>
                    <div class="col-md-6">
                        <label class="form-label" for="password_confirmation">Confirm Password</label>
                        <input type="password" class="form-control" id="password_confirmation"
                            name="password_confirmation">
                    </div>
                </div>
            </div>
        </div>
        <div class="mt-4 d-flex justify-content-end gap-3">
            <button type="submit" class="btn btn-primary">Update Profile</button>
            <button type="button" class="btn btn-light" data-bs-dismiss="modal">Cancel</button>
        </div>
    </div>
</form>
