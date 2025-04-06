@props(['image','id', 'title', 'description' => null, 'genres' => null, 'developer' => null, 'dev_image' => null, 'rating' => null, 'dev'=> null, 'url' => null])

<div class="w-full max-w-xs bg-white rounded-lg shadow-md overflow-hidden flex flex-col">
    {{-- Gambar --}}
    @if ($image)
    <img class="w-full h-48 object-cover" src="{{ asset('storage/' . $image) }}" alt="{{ $title }}">
    @endif

    <div class="flex-1 px-4 py-3 flex flex-col justify-between">
        {{-- Title & Developer --}}
        <div class="flex items-start justify-between mb-3">
            <a href="{{route('games.show', $id)}}" class="font-bold text-lg leading-snug text-gray-900 hover:text-cyan-500">{{ $title }}</a>
            @if ($developer && $dev_image)
            <a href="#" class="flex flex-col items-center ml-2 hover:scale-105">
                <img class="h-10 w-10 rounded-full" src="{{ asset('storage/' . $dev_image) }}" alt="{{ $developer }}">
                <span class="text-xs text-gray-600 mt-1">{{ $developer }}</span>
            </a>
            @endif
        </div>

        {{-- Deskripsi --}}
        @if ($description)
        <p class="text-sm text-gray-700 mb-2 line-clamp-3">
            {{ $description }}
        </p>
        @endif

        {{-- Genre & Rating --}}
        <div class="mt-auto">
            @if ($genres)
            <div class="flex flex-wrap gap-1 mb-2">
                @foreach ($genres as $genre)
                    <a href="#" class="inline-block bg-gray-200 rounded-full px-3 py-1 text-xs font-medium text-gray-700 hover:bg-gray-950 hover:text-white cursor-pointer">
                        {{ $genre->name }}
                    </a>
                @endforeach
            </div>
            @endif

            @if ($rating)
            <div class="text-sm text-yellow-500 mb-3">⭐ {{ $rating }}</div>
            @endif

            {{-- Tombol Edit & Delete --}}
            @if($dev)
            <div class="flex justify-between items-center">
                <a href="#" class="text-sm text-white hover:text-white font-semibold rounded-md px-4 py-2 bg-gradient-to-br from-cyan-300 to-sky-600 hover:bg-gradient-to-r hover:scale-105">Edit</a>
                <form action="#" method="POST" onsubmit="return confirm('Yakin ingin menghapus?')">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="text-sm text-white hover:text-white font-semibold rounded-md px-4 py-2 bg-gradient-to-br from-rose-500 to-red-800 hover:bg-gradient-to-r hover:scale-105 cursor-pointer">Delete</button>
                </form>
            </div>
            @endif
        </div>
    </div>
</div>
