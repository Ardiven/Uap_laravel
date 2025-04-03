@extends('layout.app')

@section('content')
<x-navbar></x-navbar>
<div class="container mx-auto">
<div class="flex flex-wrap -mx-4">
    @foreach ($games as $game)
    <x-card 
        :image="$game->image"
        :title="$game->title"
        :description="$game->description"
    />
@endforeach

</div>
</div>



@endsection