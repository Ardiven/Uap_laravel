@props(['image', 'title', 'description' => null, 'genres' => null, 'developer' => null, 'dev_image' => null, 'rating' => null])

<div class="w-full max-w-xs bg-white rounded-lg shadow-md overflow-hidden flex flex-col">
    {{-- Gambar dengan ukuran tetap dan crop rapi --}}
    @if ($image)
    <img class="w-full h-48 object-cover" src="{{ asset('storage/' . $image) }}" alt="{{ $title }}">
    @endif

    <div class="flex-1 px-4 py-3 flex flex-col justify-between">
        {{-- Title dan Developer --}}
        <div class="flex items-start justify-between mb-3">
            <a href="#" class="font-bold text-lg leading-snug text-gray-900 hover:text-cyan-500">{{ $title }}</a>
            @if ($developer && $dev_image)
            <a  href="#" class="flex flex-col items-center ml-2">
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

        {{-- Genre dan Rating --}}
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
            <div class="text-sm text-yellow-500">⭐ {{ $rating }}</div>
            @endif
        </div>
    </div>
</div>
