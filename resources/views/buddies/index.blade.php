@extends('layouts/app')

@section('title')
    Find a buddy
@endsection

@section('header')
    @component('components/header')
    @endcomponent
@endsection

@section('content')
    <h1>All Buddies</h1>
    @foreach( $users as $buddy )
        <h3><a href="/buddies/{{ $buddy->id }}">{{ $buddy->firstname }}</a></h3>
    @endforeach
@endsection
