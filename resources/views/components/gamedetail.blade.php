@props(['title', 'developer', 'description', 'genres', 'image', 'screenshots'=>[], 'reviews'=>null, 'rating'=>null, 'id'=>null])

<main class="flex-1 bg-white px-8 py-10 overflow-auto no-scrollbar">
    <!-- Banner -->
    <div class="relative w-full h-[400px] mb-8 ">
      <img src="{{ asset('storage/' . $image) }}" alt="Game Banner"
           class="w-full h-full object-cover rounded-xl shadow-md">
      <div class="absolute bottom-4 left-6 bg-white/60 backdrop-blur-sm px-4 py-2 rounded">
        <h1 class="text-3xl font-bold">{{$title}}</h1>
        <p class="text-sm text-gray-700 font-semibold">{{$developer}}</p>
      </div>
    </div>

    <!-- Content -->
    <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
      <!-- Left Info -->
      <div class="md:col-span-2">
        <h2 class="text-2xl font-semibold mb-3">About This Game</h2>
        <p class="text-gray-700 leading-relaxed mb-6">
          {{$description}}
        </p>

        <!-- Genres -->
        <div class="flex flex-wrap gap-2 mb-6">
            @foreach ($genres as $genre)
            <a href="#" class="inline-block bg-gray-200 rounded-full px-3 py-1 text-xs font-medium text-gray-700 hover:bg-gray-950 hover:text-white cursor-pointer">
                {{ $genre->name }}
            </a>
            @endforeach
        </div>

        <!-- Screenshots -->
        <div class="flex gap-4 overflow-x-auto mb-6">
          @foreach ($screenshots as $screenshot)
          <img src="{{ asset('storage/' . $screenshot) }}"
               class="w-60 h-36 object-cover rounded-lg shadow-md" alt="">
        
        @endforeach
    </div>
      </div>

      <!-- Right Sidebar: Purchase Info -->
      <div class="bg-gray-100 p-6 rounded-lg shadow-md flex flex-col justify-between border border-gray-200">
        <div>
          <h3 class="text-xl font-bold mb-2">Available Now</h3>
          <p class="text-3xl font-semibold text-green-600 mb-4">FREE</p>

          <form method="POST" action="{{ route('library.add', $id) }}">
            @csrf
            <button class="bg-cyan-600 text-white px-4 py-2 rounded hover:bg-cyan-700">
                Add to Library
            </button>
        </form>
        

          <p class="text-sm text-gray-500 mt-2 text-center">Offer ends soon</p>
        </div>

        <div class="mt-6">
          <h4 class="text-sm font-semibold mb-1">Platform</h4>
          <p class="text-sm text-gray-700">Windows</p>
        </div>
      </div>
    </div>
  </main>
  @if(session('success'))
  <x-success>{{session('success')}}</x-success>
  @endif