<!-- resources/views/auth/dashboard.blade.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.1.2/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-100">

    <!-- Sidebar & Content -->
    <div class="flex h-screen">
        @include('auth.components.sidebar')

        <div class="flex-1 p-6">
            <!-- Menampilkan konten berdasarkan halaman yang aktif -->
            @include('auth.components.content')
        </div>
    </div>

</body>
</html>
