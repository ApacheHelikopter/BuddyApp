@extends('layouts/app')

@section('title')
    {{ $buddy->firstname }} {{ $buddy->lastname }}
@endsection

@section('header')
    @component('components/header')
    @endcomponent
@endsection

@section('content')

    @if (\Session::has('green'))
        @component('components/alert')
            @slot('type') green @endslot
            <ul>
                <li>
                    {!! \Session::get('green') !!}
                </li>
            </ul>
        @endcomponent
    @endif

    @if (\Session::has('red'))
        @component('components/alert')
            @slot('type') red @endslot
            <ul>
                <li>
                    {!! \Session::get('red') !!}
                </li>
            </ul>
        @endcomponent
    @endif

    @if( $errors->any() )
        @component('components/alert')
            @slot('type') red @endslot
            <ul>
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>

        @endcomponent
    @endif

    <img class="h-20 w-20" src="{{ asset('storage/profile_picture/'.$buddy->id.'/'.$buddy->profile_picture) }}" alt="" />
    <h1>{{ $buddy->firstname }}</h1>

    <h2>Interests</h2>
    @if($me == $buddy->user_id)
        <a href="/buddies/{{ $buddy->id }}/interests">EDIT</a>
    @endif
    @foreach( $buddy->interests as $interest)
        <div>{{ $interest->interest }}</div>
    @endforeach


    @if($me != $buddy->user_id)
        @if($friendStatus=='Add buddy')
            <a href="/add-friend/{{ $buddy->id }}">{{ $friendStatus }}</a>
        @elseif($friendStatus=='Buddy request sent')
            <p>{{ $friendStatus }}</p>
        @elseif($friendStatus=='Remove buddy')
            <a href="/remove-friend/{{ $buddy->id }}">{{ $friendStatus }}</a>
        @endif
    @endif



    @auth
        @if($me == $buddy->user_id)
            @component('components/editdetails')
                @slot('firstname')
                    {{ $buddy->firstname }}
                @endslot
                @slot('lastname')
                    {{ $buddy->lastname }}
                @endslot
                @slot('bio')
                    {{ $buddy->bio }}
                @endslot
                @slot('date')
                    {{ $buddy->birth_date }}
                @endslot
                @slot('id')
                    {{ $buddy->id }}
                @endslot
            @endcomponent
        @endif
    @endauth

    @if($me == $buddy->user_id)
        @foreach($friendRequests as $request)
            @php
                $buddy_name = \App\Buddy::getName($request->acted_user);
            @endphp
            <a href="/buddies/{{ $request->acted_user }}">{{ $buddy_name }}</a>
            <a href="/accept-request/{{ $request->acted_user }}">Accept</a>
            <a href="/ignore-request/{{ $request->acted_user }}">Ignore</a>
        @endforeach
    @endif
@endsection

