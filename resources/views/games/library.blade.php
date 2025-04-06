@extends('layout.app')
<x-navbar :menu="true"></x-navbar>

@section('content')

<div class="h-screen flex bg-gray-100 text-gray-900 overflow-hidden">
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
        @foreach($library as $library)
        <li>
          <a href="#" class="flex items-center space-x-3 px-2 py-2 rounded hover:bg-gray-200 transition-all duration-200">
            <img src="{{ asset('storage/' . $library->game->image) }}" class="w-10 h-10 object-cover rounded" alt="{{ $library->game->title }}">
            <span class="truncate">{{ $library->game->title }}</span>
          </a>
        </li>
        @endforeach
      </ul>
    </aside>

    <!-- Main Content -->
    
</div>

@endsection
