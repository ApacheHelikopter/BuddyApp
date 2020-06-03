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
        <main>
            <div class="max-w-7xl mx-auto py-6 sm:px-6 lg:px-32">
                <div class="px-4 py-6 sm:px-0">
                    <h1 class="text-3xl font-bold leading-tight text-gray-900">My Buddies</h1>
                    <div class="flex flex-col items-center sm:flex-row py-10 ">
                        @if(count($friends) == 0)
                            <h2>Search for a buddy and add them!</h2>
                        @else
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

                                @component('components/friendcard')
                                    @php
                                        $buddy_class = \App\Buddy::getClass($friend->buddy_id);
                                        $buddy_bio = \App\Buddy::getBio($friend->buddy_id);
                                        $buddy_status = \App\Buddy::getStatus($friend->buddy_id);
                                    @endphp

                                    @slot('buddyID')
                                        {{ $buddyId }}
                                    @endslot
                                    @slot('buddyName')
                                        {{ $buddy_name }}
                                    @endslot
                                    @slot('buddyStatus')
                                        {{ $buddy_status }}
                                    @endslot
                                    @slot('buddyClass')
                                        {{ $buddy_class }}
                                    @endslot
                                    @slot('buddyBio')
                                        {{ $buddy_bio }}
                                    @endslot
                                @endcomponent
                            @endforeach
                        @endif
                    </div>
                </div>
    @endif
@endsection
