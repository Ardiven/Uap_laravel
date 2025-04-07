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
        @foreach($sidebars as $games)
        <li>
          <a href="{{ route('library.detail', $games->game->id) }}" class="flex items-center space-x-3 px-2 py-2 rounded hover:bg-gray-200 transition-all duration-200">
            <img src="{{ asset('storage/' . $games->game->image) }}" class="w-10 h-10 object-cover rounded" alt="{{ $games->game->title }}">
            <span class="truncate">{{ $games->game->title }}</span>
          </a>
        </li>
        @endforeach
      </ul>
    </aside>

    <!-- Main Content -->
    <main class="flex-1 p-4 overflow-y-auto">
    @if(Route::currentRouteName() == 'games.library')
      <h3 class="text-2xl font-bold mb-4 px-3">All My Games</h3>
      <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6 px-3 py-3">
      @foreach($sidebars as $game)
      <x-card
      :image="$game->game->image"
      :title="$game->game->title"
      :id="$game->game->id"
      :url="route('library.detail', $game->game->id)"  
      />
      @endforeach
    </div>
    @else
    
      <x-gamedetail
      :image="$details->game->image"
      :title="$details->game->title"
      :id="$details->game->id"
      :description="$details->game->description"
      :genres="$details->game->genres"
      :developer="$details->game->developer->name"
      :dev_image="$details->game->developer->image"
      :downloaded="$details->downloaded"
      :library="true"
      />
    @endif
  </main>
</div>
@endsection
