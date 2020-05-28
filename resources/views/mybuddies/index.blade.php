@extends('layouts/app')

@section('title')
    My buddies
@endsection

@section('header')
    @if(Auth::check() and Session::has('user'))
        @component('components/header')
        @endcomponent
    @endif
@endsection

@section('content')
    @if(Auth::check() and Session::has('user'))
        <h1>My Buddies</h1>
        @foreach( $friends as $friend )
            @php
                if(auth()->user()->id != $friend->buddy_id){
                    $buddy_name = \App\Buddy::getName($friend->buddy_id);
                    $buddyId = $friend->buddy_id;
                } else{
                    $buddy_name = \App\Buddy::getName($friend->friend_id);
                    $buddyId = $friend->friend_id;
                }
            @endphp
            <h3><a href="/buddies/{{ $buddyId }}">{{ $buddy_name }}</a></h3>
        @endforeach
    @endif
@endsection
