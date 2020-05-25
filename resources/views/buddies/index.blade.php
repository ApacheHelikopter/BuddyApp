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
        <h1>All Buddies</h1>
        @foreach( $users as $buddy )
            <h3><a href="/buddies/{{ $buddy->id }}">{{ $buddy->firstname }}</a></h3>
        @endforeach
    @endif
@endsection
