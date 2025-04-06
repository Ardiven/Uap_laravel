@extends('layout.app')
<x-navbar :menu="true"></x-navbar>
@section('content')

<div class="h-screen flex">
    <!-- Sidebar -->
    <aside class="w-64 bg-gray-900 text-white p-4 overflow-y-auto">
      <h2 class="text-xl font-bold mb-4">🎮 Library</h2>
  
      <!-- Search -->
      <input 
        type="text" 
        placeholder="Search games..." 
        class="w-full px-3 py-2 mb-4 rounded bg-gray-800 text-white focus:outline-none focus:ring focus:ring-cyan-500"
      >
  
      <!-- Game List -->
      <ul class="space-y-2">
        <li>
          <a href="#" class="flex items-center space-x-3 px-2 py-2 rounded hover:bg-gray-700 transition-all duration-200">
            <img src="https://via.placeholder.com/40x40" class="w-10 h-10 object-cover rounded" alt="Elden Ring">
            <span class="truncate">Elden Ring</span>
          </a>
        </li>
        <li>
          <a href="#" class="flex items-center space-x-3 px-2 py-2 rounded hover:bg-gray-700 transition-all duration-200">
            <img src="https://via.placeholder.com/40x40" class="w-10 h-10 object-cover rounded" alt="Cyberpunk">
            <span class="truncate">Cyberpunk 2077</span>
          </a>
        </li>
        <li>
          <a href="#" class="flex items-center space-x-3 px-2 py-2 rounded hover:bg-gray-700 transition-all duration-200 bg-gray-700 font-semibold">
            <img src="https://via.placeholder.com/40x40" class="w-10 h-10 object-cover rounded" alt="Stardew">
            <span class="truncate">Stardew Valley</span>
          </a>
        </li>
      </ul>
    </aside>
  
    <!-- Right area (main content) -->
    <main class="flex-1 bg-zinc-900 text-white px-8 py-10 overflow-y-auto">
    <!-- Banner -->
    <div class="relative w-full h-[400px] mb-8">
      <img src="https://cdn2.unrealengine.com/egs-gta-v-carousel-desktop-1248x702-1248x702-193013103.jpg" alt="Game Banner"
           class="w-full h-full object-cover rounded-xl shadow-md">
      <div class="absolute bottom-4 left-6 bg-black bg-opacity-50 px-4 py-2 rounded">
        <h1 class="text-3xl font-bold">Grand Theft Auto V</h1>
        <p class="text-sm text-gray-300">Rockstar Games</p>
      </div>
    </div>
  
    <!-- Content Section -->
    <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
      <!-- Left: Game Info -->
      <div class="md:col-span-2">
        <!-- Deskripsi -->
        <h2 class="text-2xl font-semibold mb-3">About This Game</h2>
        <p class="text-gray-300 leading-relaxed mb-6">
          When a young street hustler, a retired bank robber, and a terrifying psychopath find themselves entangled with
          some of the most frightening and deranged elements of the criminal underworld, the U.S. government, and the
          entertainment industry, they must pull off a series of dangerous heists to survive in a ruthless city.
        </p>
  
        <!-- Genre Tags -->
        <div class="flex flex-wrap gap-2 mb-6">
          <span class="bg-gray-700 text-sm px-3 py-1 rounded-full">Action</span>
          <span class="bg-gray-700 text-sm px-3 py-1 rounded-full">Adventure</span>
          <span class="bg-gray-700 text-sm px-3 py-1 rounded-full">Open World</span>
        </div>
  
        <!-- Screenshots Carousel (Opsional) -->
        <div class="flex gap-4 overflow-x-auto mb-6">
          <img src="https://cdn2.unrealengine.com/egs-gta-v-carousel-screenshot-01-1920x1080-2b5e51a16bc2.jpg"
               class="w-60 h-36 object-cover rounded-lg shadow-md" alt="">
          <img src="https://cdn2.unrealengine.com/egs-gta-v-carousel-screenshot-02-1920x1080-bd1686a1391e.jpg"
               class="w-60 h-36 object-cover rounded-lg shadow-md" alt="">
          <img src="https://cdn2.unrealengine.com/egs-gta-v-carousel-screenshot-03-1920x1080-ec2c73cb57ba.jpg"
               class="w-60 h-36 object-cover rounded-lg shadow-md" alt="">
        </div>
      </div>
  
      <!-- Right: Purchase Info -->
      <div class="bg-zinc-800 p-6 rounded-lg shadow-md flex flex-col justify-between">
        <div>
          <h3 class="text-xl font-bold mb-2">Available Now</h3>
          <p class="text-3xl font-semibold text-green-400 mb-4">FREE</p>
  
          <button class="w-full bg-blue-600 hover:bg-blue-700 transition-colors py-3 rounded-md text-white font-semibold text-center">
            GET
          </button>
  
          <p class="text-sm text-gray-400 mt-2 text-center">Offer ends soon</p>
        </div>
  
        <div class="mt-6">
          <h4 class="text-sm font-semibold mb-1">Platform</h4>
          <p class="text-sm text-gray-300">Windows</p>
        </div>
      </div>
    </div>
  </main>
  
  </div>
  