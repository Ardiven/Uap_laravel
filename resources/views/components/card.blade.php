@props(['image', 'title', 'description' => null, 'genres' => null, 'developer' => null, 'dev_image' => null, 'rating' => null])

<div class="flex px-3 py-3">
    <div class="max-w-sm rounded overflow-hidden shadow-lg">
        @if ($image)
        <img class="w-full" src="{{ asset('storage/' . $image) }}" alt="{{ $title }}">
        @endif

        <div class="px-6 py-4">
            <div class="flex items-center justify-between mb-2">
                <div class="font-bold text-xl">{{ $title }}</div>

                @if ($developer && $dev_image)
                <div class="flex-shrink-0 text-center">
                    <a href="#" class="flex flex-col items-center">
                        <img class="h-10 w-10 rounded-full mb-1" src="{{ asset('storage/' . $dev_image) }}" alt="{{ $developer }}">
                        <span class="text-sm font-medium text-gray-700">{{ $developer }}</span>
                    </a>
                </div>
                @endif
            </div>

            @if ($description)
            <p class="text-gray-700 text-base">
                {{ $description }}
            </p>
            @endif
        </div>

        @if ($genres || $rating)
        <div class="px-6 py-4">
            @if ($genres)
                @foreach ($genres as $genre)
                    <span class="inline-block bg-gray-200 rounded-full px-3 py-1 text-sm font-semibold text-gray-700 mr-2 mt-3">
                        {{ $genre->name }}
                    </span>
                @endforeach
            @endif

            @if ($rating)
            <div class="text-sm text-yellow-500 pt-4">⭐ {{ $rating }}</div>
            @endif
        </div>
        @endif
    </div>
</div>
