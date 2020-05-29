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

            @foreach( $matchingUser as $matching )
                @php
                    $buddy_name = \App\Buddy::getName($matching->buddy_id);
                @endphp
                <a href="/buddies/{{ $matching->buddy_id }}"><h2>{{ $buddy_name }}</h2></a>
                <p>{{ $matching->common_interests }}</p>
            @endforeach

        <h1>All students</h1>
            @foreach( $users as $buddy )
                <h3><a href="/buddies/{{ $buddy->id }}">{{ $buddy->firstname }}</a></h3>
            @endforeach

    @endif
@endsection
