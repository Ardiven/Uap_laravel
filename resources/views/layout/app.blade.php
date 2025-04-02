<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'My Website')</title>
    @vite('resources/css/app.css')
</head>
<body class="bg-gray-100 ">
    <!-- Container Utama -->
    <div class="container mx-auto p-4">
        @yield('content')
    </div>
    <!-- Footer -->
    <footer class="bg-gray-200 text-center py-4 mt-6">
        <p class="text-gray-600">© {{ date('Y') }} MySchool. All rights reserved.</p>
    </footer>
</body>
</html>