@extends('layouts/app')

@section('title')
    {{ $buddy->firstname }} {{ $buddy->lastname }}
@endsection

@section('header')
    @component('components/header')
    @endcomponent
@endsection

@section('content')
    <h1>{{ $buddy->firstname }}</h1>
    <h2>Interests</h2>
    @foreach( $buddy->interests as $interest)
        <div>{{ $interest->interest }}</div>
    @endforeach

        @auth
            @if($me == $buddy->id)
                <h2>yo</h2>
            @endif
        @endauth
@endsection
