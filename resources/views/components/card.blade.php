@props(['image', 'title', 'description'])


    

<div class="w-full sm:w-1/2 lg:w-1/3 p-4">
    <div class="card bg-white shadow-lg rounded-lg flex flex-col min-h-full">
        <!-- Gambar Fit -->
        <img src="{{ asset('storage/' . $image) }}" class="w-full h-48 object-cover rounded-t-lg" alt="{{ $title }}">

        <div class="p-4 flex flex-col flex-grow">
            <h5 class="text-lg font-semibold">{{ $title }}</h5>
            <!-- Deskripsi dengan flex-grow agar bisa sesuaikan panjang -->
            <p class="text-gray-700">{{ Str::limit($description, 100) }}</p>
        </div>
    </div>
</div>


