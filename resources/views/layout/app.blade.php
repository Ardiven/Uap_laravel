<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'My Website')</title>
    @vite('resources/css/app.css')
</head>
<body class="bg-gray-100">
    @if(session('success'))
    <div class="flex items-center justify-center min-h-screen bg-gradient-to-b from-gray-50 to-gray-100">
        <div
            class="w-full max-w-2xl p-12 mx-4 text-center transition-all transform bg-white shadow-lg rounded-xl hover:shadow-xl">
            <!-- Success Icon -->
            <div class="flex items-center justify-center w-24 h-24 mx-auto mb-8 bg-green-100 rounded-full">
                <svg class="w-12 h-12 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                </svg>
            </div>

            <!-- Main Content -->
            <h1 class="mb-6 text-4xl font-extrabold text-green-600">
                {{session('success')}}
            </h1>
            <!-- Back to Home Button -->
            <div class="mt-12">
                <a href="{{ route('login') }}"
                    class="inline-block px-8 py-4 text-lg font-semibold text-white transition-colors duration-200 bg-green-600 rounded-lg hover:bg-green-700">
                    Return to login
                </a>
            </div>
        </div>
    </div>

    @endif
    @yield('navbar')
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