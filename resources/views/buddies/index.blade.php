@extends('layouts/app')

@section('title')
    Find a buddy
@endsection

@section('header')
    @if(Auth::check() and Session::has('user'))
        @component('components/header')
        @endcomponent
    @endif
@endsection

@section('content')
    @if(Auth::check() and Session::has('user'))

        <h1>Best matching buddies</h1>
            @foreach( $users as $buddy )
                <h3><a href="/buddies/{{ $buddy->id }}">{{ $buddy->firstname }}</a></h3>
            @endforeach

            @foreach( $matchingUser as $matching )
            <h2>{{ $matching->interests_count }}</h2>
            <hp>{{ $matching->firstname}}</p>
            @endforeach

        <h1>All Buddies</h1>
            @foreach( $users as $buddy )
                <h3><a href="/buddies/{{ $buddy->id }}">{{ $buddy->firstname }}</a></h3>
            @endforeach

    @endif
@endsection
