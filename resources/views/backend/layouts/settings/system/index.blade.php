@extends('backend.master')

@push('title')
    System Settings
@endpush
@push('styles')
    <!-- dropzone css -->
    <link rel="stylesheet"
        href="/backend/assets/vendor/dropzone/dropzone.css"
        type="text/css" />
@endpush

@section('content')
    <div class="page-container">
        <div class="row">
            <div class="col-12">
                <div class="card">

                    <div class="card-header border-bottom border-dashed">
                        <h4 class="header-title mb-0">System Settings</h4>
                    </div>

                    <div class="card-body">
                        <form action="{{ route('admin.dashboard.system.settings.update') }}"
                            method="POST"
                            enctype="multipart/form-data">
                            @csrf

                            <div class="row">
                                {{-- LEFT COLUMN --}}
                                <div class="col-lg-6">

                                    <h5 class="mb-3">Basic Information</h5>

                                    <div class="mb-3">
                                        <label class="form-label">Site Name</label>
                                        <input type="text"
                                            name="site_name"
                                            class="form-control"
                                            value="{{ old('site_name', $data->site_name) }}">
                                    </div>

                                    <div class="mb-3">
                                        <label class="form-label">Site Tagline</label>
                                        <input type="text"
                                            name="site_tagline"
                                            class="form-control"
                                            value="{{ old('site_tagline', $data->site_tagline) }}">
                                    </div>

                                    <div class="mb-3">
                                        <label class="form-label">Contact Email</label>
                                        <input type="email"
                                            name="contact_email"
                                            class="form-control"
                                            value="{{ old('contact_email', $data->contact_email) }}">
                                    </div>

                                    <div class="mb-3">
                                        <label class="form-label">Support Email</label>
                                        <input type="email"
                                            name="support_email"
                                            class="form-control"
                                            value="{{ old('support_email', $data->support_email) }}">
                                    </div>

                                    <div class="mb-3">
                                        <label class="form-label">Phone</label>
                                        <input type="text"
                                            name="phone"
                                            class="form-control"
                                            value="{{ old('phone', $data->phone) }}">
                                    </div>

                                    <div class="mb-3">
                                        <label class="form-label">Address</label>
                                        <textarea name="address"
                                            class="form-control"
                                            rows="3">{{ old('address', $data->address) }}</textarea>
                                    </div>
                                </div>

                                {{-- RIGHT COLUMN --}}
                                <div class="col-lg-6">

                                    <h5 class="mb-3">Branding</h5>

                                    {{-- Light Logo --}}
                                    <x-chunk-upload name="logo"
                                        label="Light Logo"
                                        :value="$data->logo" />

                                    {{-- Dark Logo --}}
                                    <x-chunk-upload name="dark_logo"
                                        label="Dark Logo"
                                        :value="$data->dark_logo" />

                                    {{-- <div class="mb-3">
                                        <label class="form-label">Primary Color</label>
                                        <input type="color"
                                            name="primary_color"
                                            class="form-control form-control-color"
                                            value="{{ $data->primary_color }}">
                                    </div>

                                    <div class="mb-3">
                                        <label class="form-label">Secondary Color</label>
                                        <input type="color"
                                            name="secondary_color"
                                            class="form-control form-control-color"
                                            value="{{ $data->secondary_color }}">
                                    </div>

                                    <h5 class="mt-4 mb-3">System Controls</h5>

                                    <div class="form-check form-switch mb-2">
                                        <input class="form-check-input"
                                            type="checkbox"
                                            name="maintenance_mode"
                                            value="1"
                                            {{ $data->maintenance_mode ? 'checked' : '' }}>
                                        <label class="form-check-label">Maintenance Mode</label>
                                    </div>

                                    <div class="form-check form-switch mb-2">
                                        <input class="form-check-input"
                                            type="checkbox"
                                            name="allow_registration"
                                            value="1"
                                            {{ $data->allow_registration ? 'checked' : '' }}>
                                        <label class="form-check-label">Allow Registration</label>
                                    </div>

                                    <div class="form-check form-switch mb-2">
                                        <input class="form-check-input"
                                            type="checkbox"
                                            name="email_verification"
                                            value="1"
                                            {{ $data->email_verification ? 'checked' : '' }}>
                                        <label class="form-check-label">Email Verification</label>
                                    </div> --}}

                                </div>
                            </div>

                            <div class="text-end mt-4">
                                <button type="submit"
                                    class="btn btn-primary px-4">
                                    Save Settings
                                </button>
                            </div>

                        </form>
                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection
@push('script')
@endpush
