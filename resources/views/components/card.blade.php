<div class="flex px-3 py-3">
    <div class="max-w-sm rounded overflow-hidden shadow-lg bg-white">
        <img class="w-full" src="{{ $image }}" alt="{{ $name }}">
        <div class="px-6 py-4">
            <div class="font-bold text-xl mb-2">{{ $name }}</div>
            <p class="text-gray-700 text-base">
                {{ $description }}
            </p>

            {{-- ⭐ Bagian Rating dengan Float --}}
            @if(isset($rating))
                <div class="flex items-center mt-2">
                    @php
                        $fullStars = floor($rating);  // Jumlah bintang penuh
                        $halfStar = ($rating - $fullStars) >= 0.5; // Cek apakah ada setengah bintang
                        $emptyStars = 5 - $fullStars - ($halfStar ? 1 : 0); // Bintang kosong
                    @endphp

                    {{-- Bintang Penuh --}}
                    @for ($i = 0; $i < $fullStars; $i++)
                        <svg class="w-5 h-5 text-yellow-500" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                            <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.286 3.968a1 1 0 00.95.69h4.174c.969 0 1.371 1.24.588 1.81l-3.38 2.457a1 1 0 00-.364 1.118l1.287 3.969c.3.92-.755 1.688-1.54 1.118L10 14.347l-3.352 2.51c-.784.57-1.838-.197-1.539-1.118l1.287-3.969a1 1 0 00-.364-1.118l-3.38-2.457c-.783-.57-.38-1.81.588-1.81h4.174a1 1 0 00.95-.69l1.286-3.968z"></path>
                        </svg>
                    @endfor

                    {{-- Bintang Setengah --}}
                    @if($halfStar)
                        <svg class="w-5 h-5 text-yellow-500" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                            <defs>
                                <linearGradient id="half" x1="0" x2="1" y1="0" y2="0">
                                    <stop offset="50%" stop-color="currentColor" />
                                    <stop offset="50%" stop-color="gray" />
                                </linearGradient>
                            </defs>
                            <path fill="url(#half)" d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.286 3.968a1 1 0 00.95.69h4.174c.969 0 1.371 1.24.588 1.81l-3.38 2.457a1 1 0 00-.364 1.118l1.287 3.969c.3.92-.755 1.688-1.54 1.118L10 14.347l-3.352 2.51c-.784.57-1.838-.197-1.539-1.118l1.287-3.969a1 1 0 00-.364-1.118l-3.38-2.457c-.783-.57-.38-1.81.588-1.81h4.174a1 1 0 00.95-.69l1.286-3.968z"></path>
                        </svg>
                    @endif

                    {{-- Bintang Kosong --}}
                    @for ($i = 0; $i < $emptyStars; $i++)
                        <svg class="w-5 h-5 text-gray-300" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                            <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.286 3.968a1 1 0 00.95.69h4.174c.969 0 1.371 1.24.588 1.81l-3.38 2.457a1 1 0 00-.364 1.118l1.287 3.969c.3.92-.755 1.688-1.54 1.118L10 14.347l-3.352 2.51c-.784.57-1.838-.197-1.539-1.118l1.287-3.969a1 1 0 00-.364-1.118l-3.38-2.457c-.783-.57-.38-1.81.588-1.81h4.174a1 1 0 00.95-.69l1.286-3.968z"></path>
                        </svg>
                    @endfor

                    {{-- Menampilkan Angka Rating --}}
                    <span class="ml-2 text-gray-600 text-sm">{{ number_format($rating, 1) }}</span>
                </div>
            @endif
        </div>

        {{-- 🏷️ Menampilkan Tags / Genre --}}
        @if (!empty($genres))
            <div class="px-6 py-4">
                @foreach ($genres as $genre)
                    <span class="inline-block bg-gray-200 rounded-full px-3 py-1 text-sm font-semibold text-gray-700 mr-2 mt-2">
                        {{ $genre->name }}
                    </span>
                @endforeach
            </div>
        @endif
    </div>
</div>
