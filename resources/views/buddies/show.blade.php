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
    @foreach( $buddy->interests as $interest)
        <div>{{ $interest->interest }}</div>
    @endforeach

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
@endsection

