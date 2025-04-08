@extends('layout.app')

@section('content')
@php
  $user = Auth::guard('developer')->user();
@endphp

<div x-data="{ openSidebar: window.innerWidth >= 768, activeSection: 'dashboard' }"
     x-init="$watch('openSidebar', value => { 
         if(window.innerWidth < 768) 
           document.body.style.overflow = value ? 'hidden' : 'auto' 
     })"
     class="flex flex-col md:flex-row min-h-screen relative">

  <!-- Overlay on Mobile -->
  <div 
    x-show="openSidebar && window.innerWidth < 768" 
    @click="openSidebar = false" 
    class="fixed inset-0 backdrop-blur bg-white/0 z-40 transition-opacity duration-300"
    x-transition.opacity
  ></div>

  <!-- Sidebar -->
  <aside 
    class="bg-white shadow-lg transition-all duration-300 ease-in-out z-50"
    :class="{
      'fixed inset-y-0 left-0 w-64': openSidebar && window.innerWidth < 768,
      'hidden': !openSidebar && window.innerWidth < 768,
      'w-64 static': window.innerWidth >= 768
    }"
    @resize.window="openSidebar = window.innerWidth >= 768"
  >
    <div class="p-4 flex items-center justify-between border-b bg-white shadow-sm">
      <div class="flex items-center space-x-3">
        <img 
          src="https://www.svgrepo.com/show/499962/music.svg" 
          class="h-6 sm:h-9 transition-opacity duration-300"
          :class="{ 'opacity-100': openSidebar || window.innerWidth >= 768, 'opacity-0': !openSidebar && window.innerWidth < 768 }"
          alt="Landwind Logo">

        <h1 
          class="text-xl font-bold text-cyan-500 transition-all duration-300"
          :class="{ 'opacity-100 block': openSidebar || window.innerWidth >= 768, 'opacity-0 hidden': !openSidebar && window.innerWidth < 768 }"
        >
          UAP Landwind
        </h1>
      </div>

      <!-- Close button di mobile -->
      <button 
        @click="openSidebar = false" 
        class="md:hidden p-2 rounded-full hover:bg-gray-100 transition-colors duration-200"
      >
        <svg xmlns="http://www.w3.org/2000/svg" 
             class="h-6 w-6 text-gray-700" 
             fill="none" viewBox="0 0 24 24" stroke="currentColor">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
        </svg>
      </button>
    </div>

    <nav class="py-4">
      <ul class="space-y-2">
        <!-- Dashboard -->
        <li>
          <a href="#" @click.prevent="activeSection = 'dashboard'; if(window.innerWidth < 768) openSidebar = false"
             class="flex items-center space-x-3 px-4 py-2 hover:bg-gray-100 rounded-lg transition-colors"
             :class="{ 'bg-gray-100': activeSection === 'dashboard' }">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0l-2-2m2 2V4a1 1 0 00-1-1h-3a1 1 0 00-1 1z" />
            </svg>
            <span class="text-gray-700" x-show="openSidebar || window.innerWidth >= 768">Dashboard</span>
          </a>
        </li>
    
        <!-- Games -->
        <li>
          <a href="#" @click.prevent="activeSection = 'orders'; if(window.innerWidth < 768) openSidebar = false"
             class="flex items-center space-x-3 px-4 py-2 hover:bg-gray-100 rounded-lg transition-colors"
             :class="{ 'bg-gray-100': activeSection === 'orders' }">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-6 9l2 2 4-4" />
            </svg>
            <span class="text-gray-700" x-show="openSidebar || window.innerWidth >= 768">Games</span>
          </a>
        </li>
    
        <!-- Profile -->
        <li>
          <a href="#" @click.prevent="activeSection = 'profile'; if(window.innerWidth < 768) openSidebar = false"
             class="flex items-center space-x-3 px-4 py-2 hover:bg-gray-100 rounded-lg transition-colors"
             :class="{ 'bg-gray-100': activeSection === 'profile' }">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
            </svg>
            <span class="text-gray-700" x-show="openSidebar || window.innerWidth >= 768">Profile</span>
          </a>
        </li>
    
        <!-- Logout -->
        <li>
          <form method="POST" action="{{ route('developer.logout') }}" @submit="if(window.innerWidth < 768) openSidebar = false">
            @csrf
            <button type="submit"
                    class=" cursor-pointer w-full flex items-center space-x-3 px-4 py-2 hover:bg-gray-100 rounded-lg transition-colors text-left">
              <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-red-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                      d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a2 2 0 11-4 0v-1m0-8v-1a2 2 0 114 0v1" />
              </svg>
              <span class="text-red-500" x-show="openSidebar || window.innerWidth >= 768">Logout</span>
            </button>
          </form>
        </li>
      </ul>
    </nav>
    
  </aside>

  <!-- Main Content -->
  <main class="flex-1 p-4 md:p-6 overflow-y-auto z-0 relative">
    <!-- Mobile Header -->
    <div class="md:hidden flex justify-between items-center mb-4">
      <a class="flex items-center hover:scale-105">
        <img src="https://www.svgrepo.com/show/499962/music.svg" class="h-6 mr-3 sm:h-9" alt="Landwind Logo">
        <span class="self-center text-xl font-semibold whitespace-nowrap dark:text-white ">Landwind</span>
    </a>
      <button @click="openSidebar = true" class="p-2 rounded-full hover:bg-gray-200">
        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16m-7 6h7" />
        </svg>
      </button>
    </div>

    <!-- Sections -->
    <div x-show="activeSection === 'dashboard'" class="space-y-6 ">
      <header>
          <h1 class="text-2xl font-bold text-gray-800">Welcome Back, John Doe!</h1>
          <p class="text-gray-600">Here's what's happening with your account today.</p>
      </header>
      <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-4">
          <div class="bg-white p-4 rounded-lg shadow-md">
              <h2 class="text-lg font-semibold text-gray-700">Total Games Published</h2>
              <p class="text-2xl font-bold text-green-600">{{$games->count()}}</p>
          </div>
          <div class="bg-white p-4 rounded-lg shadow-md">
              <h2 class="text-lg font-semibold text-gray-700">Pending Games</h2>
              <p class="text-2xl font-bold text-yellow-600">3</p>
          </div>
          <div class="bg-white p-4 rounded-lg shadow-md">
              <h2 class="text-lg font-semibold text-gray-700">Total Games Downloaded</h2>
              <p class="text-2xl font-bold text-blue-600">{{$gamesDownload->sum('download_count')}}</p>
          </div>
      </div>
  </div>
  <div x-show="activeSection === 'orders'" class="space-y-6 h-screen">
    <header>
        <h1 class="text-2xl font-bold text-gray-800">Your Orders</h1>
        <p class="text-gray-600">View and manage your recent orders.</p>
    </header>
  
    <div class="bg-white p-4 rounded-lg shadow-md">
      <!-- Atur tinggi maksimum dan scroll hanya pada bagian isi tabel -->
      <div class="overflow-auto no-scrollbar max-h-[75vh]">
        <table class="min-w-full divide-y divide-gray-200">
          <thead class="bg-gray-50 sticky top-0 z-10">
            <tr>
              <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider bg-gray-50">Name</th>
              <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider bg-gray-50">Date</th>
              <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider bg-gray-50">Status</th>
              <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider bg-gray-50">Download</th>
              <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider bg-gray-50">Actions</th>
            
            </tr>
          </thead>
          <tbody class="divide-y divide-gray-200">
            @foreach ($games as $game)
              <tr>
                <td class="px-4 py-3 whitespace-nowrap text-sm text-gray-900">{{$game->title}}</td>
                <td class="px-4 py-3 whitespace-nowrap text-sm text-gray-900">{{ $game->created_at->format('d-m-Y') }}</td>
                <td class="px-4 py-3 whitespace-nowrap text-sm text-green-600">Completed</td>
                <td class="px-4 py-3 whitespace-nowrap text-sm text-gray-900">$100.00</td>
                <td class="px-4 py-3 whitespace-nowrap text-sm text-gray-900 space-x-2">
                  <a href="#" class="text-blue-600 hover:underline">Edit</a>
                  <form action="#" method="POST" class="inline">
                      @csrf
                      @method('DELETE')
                      <button type="submit" onclick="return confirm('Are you sure?')" class="text-red-600 hover:underline">
                          Delete
                      </button>
                  </form>
                </td>                    
              </tr>
              @endforeach
          </tbody>
        </table>
      </div>
    </div>
  </div>
    <!-- Profile Section -->
    <div x-show="activeSection === 'profile'" class="space-y-6">
      <header>
          <h1 class="text-2xl font-bold text-gray-800">Your Profile</h1>
          <p class="text-gray-600">Update your personal information and settings.</p>
      </header>
      <div class="bg-white p-4 rounded-lg shadow-md">
        <form class="space-y-4" method="POST" enctype="multipart/form-data" action="{{route('developer.profile.update')}}">
          <!-- CSRF Token kalau pakai Laravel -->
          <input type="hidden" name="_token" value="{{ csrf_token() }}">
        
          <!-- Full Name -->
          <div>
            <label for="name" class="block text-sm font-medium text-gray-700">Full Name</label>
            <input type="text" name="name" id="name" value="{{ old('name', $user->name) }}" 
                   class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm 
                          focus:outline-none focus:ring-green-500 focus:border-green-500 sm:text-sm" 
                   placeholder="John Doe">
          </div>
        
          <!-- Email Address -->
          <div>
            <label for="email" class="block text-sm font-medium text-gray-700">Email Address</label>
            <input type="email" name="email" id="email" value="{{ old('email', $user->email) }}" 
                   class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm 
                          focus:outline-none focus:ring-green-500 focus:border-green-500 sm:text-sm" 
                   placeholder="john.doe@example.com">
          </div>
        
          <!-- Profile Image Upload -->
          <div>
            <label for="image" class="block text-sm font-medium text-gray-700">Profile Image</label>
            <input type="file" name="image" id="image"
                   class="mt-1 block w-full text-sm text-gray-500 
                          file:mr-4 file:py-2 file:px-4
                          file:rounded-md file:border-0
                          file:text-sm file:font-semibold
                          file:bg-green-50 file:text-green-700
                          hover:file:bg-green-100">
            <!-- Optional preview -->
            @if ($user->image)
              <img src="{{ asset('storage/' . $user->image) }}" alt="Profile Image" class="mt-2 w-20 h-20 rounded-full">
            @endif
          </div>
        
          <!-- Password -->
          <div>
            <label for="password" class="block text-sm font-medium text-gray-700">New Password</label>
            <input type="password" name="password" id="password" 
                   class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm 
                          focus:outline-none focus:ring-green-500 focus:border-green-500 sm:text-sm" 
                   placeholder="Leave blank if unchanged">
          </div>
          @if(session('error'))
          <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative" role="alert">
            <span class="block sm:inline">{{ session('error') }}</span>
          </div>
          @endif
        
          <!-- Submit -->
          <button type="submit" 
                  class="w-full sm:w-auto inline-flex justify-center py-2 px-4 border border-transparent 
                         shadow-sm text-sm font-medium rounded-md text-white bg-green-600 
                         hover:bg-green-700 focus:outline-none focus:ring-2 
                         focus:ring-offset-2 focus:ring-green-500">
            Save Changes
          </button>
        </form>
        
      </div>
  </div>
  </main>
</div>
@endsection
