@extends('layout.app')

@section('content')
<x-navbar></x-navbar>
<div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6 px-3 py-3">
    @foreach ($games as $game)
    <x-card 
        :image="$game->image"
        :title="$game->title"
        :description="$game->description"
        :genres="$game->genres"
        :developer="$game->developer->name"
        :dev_image="$game->developer->image"
    />
@endforeach



</div>

@endsection