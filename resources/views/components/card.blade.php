@props(['image', 'title', 'description'])

<div class="flex px-3 py-3">
    <div class="max-w-sm rounded overflow-hidden shadow-lg">
        <img class="w-full" src="{{ asset('storage/' . $image) }}" alt="{{ $title }}">
        <div class="px-6 py-4">
            <div class="font-bold text-xl mb-2">{{ $title }}</div>
            <p class="text-gray-700 text-base">
                {{ $description }}
            </p>
        </div>
    </div>
</div>
