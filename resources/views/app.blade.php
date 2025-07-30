<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <title>My Inertia App</title>

    {{-- Tambahkan ini untuk memuat daftar route Laravel ke JavaScript --}}
    @routes

    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <!-- SweetAlert2 CDN -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

</head>

<body class="antialiased bg-slate-900 text-white">
    @inertia
</body>

</html>