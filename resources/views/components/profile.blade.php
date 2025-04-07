

<div class="relative" x-data="{ open: false }">
    <button @click="open = !open" class="flex flex-col items-center space-y-1 hover:scale-105 focus:outline-none">
        <img class="rounded-full h-9 w-9" src="{{ asset('storage/' . (Auth::user()->image ?? 'user_image/default.jpg')) }}" alt="User Avatar">
        <p class="text-gray-900 text-lg font-medium">{{ Auth::user()->name }}</p>
    </button>                    
    <div x-show="open" @click.outside="open = false" class="absolute right-0 mt-2 w-80 bg-white border rounded-lg shadow-lg z-50">
        <div class="p-4 border-b">
            <div class="flex items-center space-x-4">
                <img src="{{ asset('storage/' . (Auth::user()->image ?? 'user_image/default.jpg')) }}" alt="Profile Image" class="w-16 h-16 rounded-full">
                <div>
                    <h2 class="text-lg font-semibold text-gray-800">{{ Auth::user()->name }}</h2>
                    <p class="text-sm text-gray-600">{{ Auth::user()->email }}</p>
                </div>
            </div>
        </div>
        <nav class="p-2 space-y-1">
            <a href="{{ route('user.dashboard') }}" class="flex items-center p-2 rounded-md hover:bg-gray-100 text-gray-700">
                <svg class="w-5 h-5 mr-2" fill="currentColor" viewBox="0 0 24 24">
                    <path d="M3 5C3 3.9 3.9 3 5 3H9C10.1 3 11 3.9 11 5V9C11 10.1 10.1 11 9 11H5C3.9 11 3 10.1 3 9V5Z"/>
                    <path d="M13 5C13 3.9 13.9 3 15 3H19C20.1 3 21 3.9 21 5V9C21 10.1 20.1 11 19 11H15C13.9 11 13 10.1 13 9V5Z"/>
                    <path d="M3 15C3 13.9 3.9 13 5 13H9C10.1 13 11 13.9 11 15V19C11 20.1 10.1 21 9 21H5C3.9 21 3 20.1 3 19V15Z"/>
                    <path d="M13 15C13 13.9 13.9 13 15 13H19C20.1 13 21 13.9 21 15V19C21 20.1 20.1 21 19 21H15C13.9 21 13 20.1 13 19V15Z"/>
                </svg>
                Dashboard
            </a>
            <a href="#" class="flex items-center p-2 rounded-md hover:bg-gray-100 text-gray-700">
                <svg class="w-5 h-5 mr-2" fill="currentColor" viewBox="0 0 24 24">
                    <path d="M12 12c2.2 0 4-1.8 4-4s-1.8-4-4-4S8 5.8 8 8s1.8 4 4 4zm0 2c-2.7 0-8 1.3-8 4v2h16v-2c0-2.7-5.3-4-8-4z"/>
                </svg>
                Profil
            </a>
        </nav>
        <form method="POST" action="{{ route('logout') }}" class="p-2 border-t">
            @csrf
            <button type="submit" class="flex w-full items-center p-2 rounded-md hover:bg-red-100 text-red-600">
                <svg class="w-5 h-5 mr-2" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                    <path d="M9 12h12l-3 -3m0 6l3 -3M14 8V6a2 2 0 0 0 -2 -2H5a2 2 0 0 0 -2 2v12a2 2 0 0 0 2 2h7a2 2 0 0 0 2 -2v-2" />
                </svg>
                Logout
            </button>
        </form>
    </div>
</div>