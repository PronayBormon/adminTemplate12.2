@extends('backend.master')

@push('title')
    Create User
@endpush

@section('content')
    <div class="page-container">
        <div class="row">
            <div class="col-12">
                <div class="card">

                    <div class="card-header border-bottom border-dashed d-flex align-items-center">
                        <h4 class="header-title">Create New User</h4>
                        <a href="{{ route('admin.users.index') }}"
                            class="btn btn-sm btn-secondary ms-auto">
                            Back to Users
                        </a>
                    </div>

                    <div class="card-body">
                        <form method="POST"
                            action="{{ route('admin.users.store') }}">
                            @csrf

                            <div class="row g-3">

                                <!-- Name -->
                                <div class="col-md-6">
                                    <label class="form-label">Name</label>
                                    <input type="text"
                                        name="name"
                                        class="form-control @error('name') is-invalid @enderror"
                                        value="{{ old('name') }}"
                                        placeholder="Enter full name">
                                    @error('name')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <!-- Email -->
                                <div class="col-md-6">
                                    <label class="form-label">Email</label>
                                    <input type="email"
                                        name="email"
                                        class="form-control @error('email') is-invalid @enderror"
                                        value="{{ old('email') }}"
                                        placeholder="Enter email">
                                    @error('email')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <!-- Password -->
                                <div class="col-md-6">
                                    <label class="form-label">Password</label>
                                    <input type="password"
                                        name="password"
                                        class="form-control @error('password') is-invalid @enderror"
                                        placeholder="Enter password">
                                    @error('password')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <!-- Confirm Password -->
                                <div class="col-md-6">
                                    <label class="form-label">Confirm Password</label>
                                    <input type="password"
                                        name="password_confirmation"
                                        class="form-control"
                                        placeholder="Confirm password">
                                </div>

                                <!-- Role -->
                                <div class="col-md-6">
                                    <label class="form-label">Role</label>
                                    <select name="role"
                                        class="form-select @error('role') is-invalid @enderror">
                                        <option value="">Select Role</option>
                                        <option value="admin">Admin</option>
                                        <option value="user">User</option>
                                    </select>
                                    @error('role')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <!-- Status -->
                                <div class="col-md-6">
                                    <label class="form-label">Status</label>
                                    <select name="status"
                                        class="form-select @error('status') is-invalid @enderror">
                                        <option value="1">Active</option>
                                        <option value="0">Inactive</option>
                                    </select>
                                    @error('status')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <!-- Submit -->
                                <div class="col-12 text-end">
                                    <button type="submit"
                                        class="btn btn-primary">
                                        Create User
                                    </button>
                                </div>

                            </div>
                        </form>
                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection
