<!-- Theme Config Js -->
<script src="{{ asset('backend/assets/js/config.js') }}"></script>

<!-- Vendor css -->
<link href="{{ asset('backend/assets/css/vendor.min.css') }}"
    rel="stylesheet"
    type="text/css" />

<!-- App css -->
<link href="{{ asset('backend/assets/css/app.min.css') }}"
    rel="stylesheet"
    type="text/css"
    id="app-style" />

<!-- Icons css -->
<link href="{{ asset('backend/assets/css/icons.min.css') }}"
    rel="stylesheet"
    type="text/css" />
<link href="https://cdn.datatables.net/2.3.6/css/dataTables.dataTables.min.css"
    rel="stylesheet"
    type="text/css" />
<!-- Sweet Alert css-->
<link href="/backend/assets/vendor/sweetalert2/sweetalert2.min.css"
    rel="stylesheet"
    type="text/css" />
<!-- DataTables CSS -->
<link rel="stylesheet"
    href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css">
<link rel="stylesheet"
    href="https://cdn.datatables.net/responsive/2.5.0/css/responsive.dataTables.min.css">

@stack('styles')
