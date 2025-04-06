@extends('layout.app')
<x-navbar :menu="true"></x-navbar>

@section('content')

<div class="h-screen flex bg-gray-100 text-gray-900">
    <!-- Sidebar -->
    <aside class="w-64 bg-white border-r border-gray-200 p-4 overflow-y-auto">
      <h2 class="text-xl font-bold mb-4">🎮 Library</h2>

      <!-- Search -->
      <input 
        type="text" 
        placeholder="Search games..." 
        class="w-full px-3 py-2 mb-4 rounded border border-gray-300 focus:outline-none focus:ring-2 focus:ring-cyan-500"
      >

      <!-- Game List -->
      <ul class="space-y-2">
        <li>
          <a href="#" class="flex items-center space-x-3 px-2 py-2 rounded hover:bg-gray-200 transition-all duration-200">
            <img src="https://via.placeholder.com/40x40" class="w-10 h-10 object-cover rounded" alt="Elden Ring">
            <span class="truncate">Elden Ring</span>
          </a>
        </li>
        <li>
          <a href="#" class="flex items-center space-x-3 px-2 py-2 rounded hover:bg-gray-200 transition-all duration-200">
            <img src="https://via.placeholder.com/40x40" class="w-10 h-10 object-cover rounded" alt="Cyberpunk">
            <span class="truncate">Cyberpunk 2077</span>
          </a>
        </li>
        <li>
          <a href="#" class="flex items-center space-x-3 px-2 py-2 rounded bg-gray-200 font-semibold">
            <img src="https://via.placeholder.com/40x40" class="w-10 h-10 object-cover rounded" alt="Stardew">
            <span class="truncate">Stardew Valley</span>
          </a>
        </li>
      </ul>
    </aside>

    <!-- Main Content -->
    <main class="flex-1 bg-white px-8 py-10 overflow-y-auto">
      <!-- Banner -->
      <div class="relative w-full h-[400px] mb-8">
        <img src="https://cdn2.unrealengine.com/egs-gta-v-carousel-desktop-1248x702-1248x702-193013103.jpg" alt="Game Banner"
             class="w-full h-full object-cover rounded-xl shadow-md">
        <div class="absolute bottom-4 left-6 bg-white bg-opacity-80 px-4 py-2 rounded">
          <h1 class="text-3xl font-bold">Grand Theft Auto V</h1>
          <p class="text-sm text-gray-700">Rockstar Games</p>
        </div>
      </div>

      <!-- Content -->
      <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
        <!-- Left Info -->
        <div class="md:col-span-2">
          <h2 class="text-2xl font-semibold mb-3">About This Game</h2>
          <p class="text-gray-700 leading-relaxed mb-6">
            When a young street hustler, a retired bank robber, and a terrifying psychopath find themselves entangled...
          </p>

          <!-- Genres -->
          <div class="flex flex-wrap gap-2 mb-6">
            <span class="bg-gray-200 text-sm px-3 py-1 rounded-full">Action</span>
            <span class="bg-gray-200 text-sm px-3 py-1 rounded-full">Adventure</span>
            <span class="bg-gray-200 text-sm px-3 py-1 rounded-full">Open World</span>
          </div>

          <!-- Screenshots -->
          <div class="flex gap-4 overflow-x-auto mb-6">
            <img src="https://cdn2.unrealengine.com/egs-gta-v-carousel-screenshot-01-1920x1080-2b5e51a16bc2.jpg"
                 class="w-60 h-36 object-cover rounded-lg shadow-md" alt="">
            <img src="https://cdn2.unrealengine.com/egs-gta-v-carousel-screenshot-02-1920x1080-bd1686a1391e.jpg"
                 class="w-60 h-36 object-cover rounded-lg shadow-md" alt="">
            <img src="https://cdn2.unrealengine.com/egs-gta-v-carousel-screenshot-03-1920x1080-ec2c73cb57ba.jpg"
                 class="w-60 h-36 object-cover rounded-lg shadow-md" alt="">
          </div>
        </div>

        <!-- Right Sidebar: Purchase Info -->
        <div class="bg-gray-100 p-6 rounded-lg shadow-md flex flex-col justify-between border border-gray-200">
          <div>
            <h3 class="text-xl font-bold mb-2">Available Now</h3>
            <p class="text-3xl font-semibold text-green-600 mb-4">FREE</p>

            <button class="w-full bg-cyan-600 hover:bg-cyan-700 transition-colors py-3 rounded-md text-white font-semibold text-center">
              GET
            </button>

            <p class="text-sm text-gray-500 mt-2 text-center">Offer ends soon</p>
          </div>

          <div class="mt-6">
            <h4 class="text-sm font-semibold mb-1">Platform</h4>
            <p class="text-sm text-gray-700">Windows</p>
          </div>
        </div>
      </div>
    </main>
</div>

@endsection
