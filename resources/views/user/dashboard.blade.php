@extends('layout.app')
<x-navbar
:menu="true"
/>
@section('content')
<div class="min-h-screen bg-gray-50 text-gray-800 py-8 px-6">

    {{-- Header --}}
    <div class="flex flex-col md:flex-row justify-between items-center mb-10">
        <div class="flex items-center space-x-5">
            <img src="{{ asset('storage/' . (Auth::user()->image ?? 'user_image/default.jpg')) }}"
                 class="w-20 h-20 rounded-full object-cover shadow-md border-2 border-gray-300">
            <div>
                <h1 class="text-3xl font-bold">{{ Auth::user()->name }}</h1>
                <p class="text-gray-500">{{ Auth::user()->email }}</p>
            </div>
        </div>
        <a href="#"
           class="mt-4 md:mt-0 inline-block bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded shadow">
           Edit Profil
        </a>
    </div>

    {{-- Stats --}}
    <div class="grid grid-cols-2 sm:grid-cols-2 lg:grid-cols-4 gap-6 mb-10">
        <div class="bg-white border border-gray-200 p-6 rounded-lg shadow-sm hover:shadow transition">
            <h2 class="text-xl font-semibold mb-2 text-gray-700">🎮 Game Dimiliki</h2>
            <p class="text-3xl font-bold">{{ $games->count() }}</p>
        </div>
        <div class="bg-white border border-gray-200 p-6 rounded-lg shadow-sm hover:shadow transition">
            <h2 class="text-xl font-semibold mb-2 text-gray-700">🎮 Game Dimiliki</h2>
            <p class="text-3xl font-bold">{{ $games->count() }}</p>
        </div>
        <div class="bg-white border border-gray-200 p-6 rounded-lg shadow-sm hover:shadow transition">
            <h2 class="text-xl font-semibold mb-2 text-gray-700">📝 Ulasan Dibuat</h2>
            <p class="text-3xl font-bold">{{ $review->count() }}</p>
        </div>
        <div class="bg-white border border-gray-200 p-6 rounded-lg shadow-sm hover:shadow transition">
            <h2 class="text-xl font-semibold mb-2 text-gray-700">🕓 Total Jam Bermain</h2>
            <p class="text-3xl font-bold">{{round( $playtime, 1) }} jam</p>
        </div>
    </div>

    {{-- Navigasi Cepat --}}
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
        <a href="{{route('library')}}" class="bg-white border border-gray-200 hover:border-blue-500 p-6 rounded-lg shadow-sm transition">
            <h3 class="text-xl font-semibold mb-2 text-gray-800">📚 Library</h3>
            <p class="text-gray-500 text-sm">Lihat dan mainkan game yang kamu miliki.</p>
        </a>
        <a href="#" class="bg-white border border-gray-200 hover:border-yellow-500 p-6 rounded-lg shadow-sm transition">
            <h3 class="text-xl font-semibold mb-2 text-gray-800">📝 Ulasan Saya</h3>
            <p class="text-gray-500 text-sm">Lihat dan kelola ulasan game yang telah kamu buat.</p>
        </a>
        <a href="#" class="bg-white border border-gray-200 hover:border-gray-600 p-6 rounded-lg shadow-sm transition">
            <h3 class="text-xl font-semibold mb-2 text-gray-800">⚙️ Pengaturan Akun</h3>
            <p class="text-gray-500 text-sm">Edit email, password, dan lainnya.</p>
        </a>
    </div>

</div>
@endsection
