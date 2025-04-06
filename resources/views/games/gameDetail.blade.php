@extends('layout.app')
<x-navbar :menu="true"></x-navbar>
@section('content')
<x-gamedetail
:image="$game->image"
:title="$game->title"
:id="$game->id"
:description="$game->description"
:genres="$game->genres"
:developer="$game->developer->name"
:dev_image="$game->developer->image"
:url="route('games.show', $game->id)"
/>

@endsection