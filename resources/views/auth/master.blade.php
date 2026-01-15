<!DOCTYPE html>
<html lang="en"
    data-layout="">

<head>
    <meta charset="utf-8" />
    <title>Log In | Welcome to website</title>

    <meta name="viewport"
        content="width=device-width, initial-scale=1.0">
    <meta name="description"
        content="Login page">
    <meta name="author"
        content="Coderthemes">

    <!-- Favicon -->
    <link rel="shortcut icon"
        href="{{ asset('backend/assets/images/favicon.ico') }}">

    <!-- Theme Config -->
    <script src="{{ asset('backend/assets/js/config.js') }}"></script>

    <!-- Vendor CSS -->
    <link href="{{ asset('backend/assets/css/vendor.min.css') }}"
        rel="stylesheet" />

    <!-- App CSS -->
    <link href="{{ asset('backend/assets/css/app.min.css') }}"
        rel="stylesheet"
        id="app-style" />

    <!-- Icons -->
    <link href="{{ asset('backend/assets/css/icons.min.css') }}"
        rel="stylesheet" />
</head>

<body>

    <div class="auth-bg d-flex min-vh-100">
        @yield('content')
    </div>

    <!-- Vendor JS -->
    <script src="{{ asset('backend/assets/js/vendor.min.js') }}"></script>

    <!-- App JS -->
    <script src="{{ asset('backend/assets/js/app.js') }}"></script>

</body>

</html>
