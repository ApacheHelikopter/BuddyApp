@extends('layouts/start')

@section('title')
    Register
@endsection
@section('content')

    @if(Auth::check() and Session::has('user'))
        <h2>My Interests</h2>

        @foreach( $buddy->interests as $buddyInterest)
            <a href="/remove-interest/{{ $buddyInterest->id }}"><div class="btn">{{ $buddyInterest->interest }}</div></a>
        @endforeach
        <h2>Add interests</h2>

        @foreach( $allInterests as $interest)
            <a href="/add-interest/{{ $interest->id }}"><div class="btnAdd">{{ $interest->interest }}</div></a>
        @endforeach
    @endif

    <a href="/">NEXT</a>


@endsection
