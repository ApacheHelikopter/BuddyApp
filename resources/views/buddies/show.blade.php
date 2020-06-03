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

    <div class="lg:px-32">

        <div class="flex flex-col justify-center items-center mx-auto max-w-6xl">
            <div style="background-image: url(https://images.unsplash.com/photo-1539185441755-769473a23570?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=1951&q=80"
                class="bg-gray-300 rounded-none h-48 w-full shadow-md bg-cover bg-center lg:rounded-b-lg">
            </div>
            <div class="h-auto -mt-40 overflow-hidden z-10">
                @if($buddy->profile_picture == 'mock.png')
                    <img class="rounded-full h-48 w-48" src="{{ asset('storage/public/'.$buddy->profile_picture) }}" alt="" />
                @else
                    <img class="rounded-full h-48 w-48" src="{{ asset('storage/profile_picture/'.$buddy->id.'/'.$buddy->profile_picture) }}" alt="" />
                @endif
            </div>
            <div class="w-11/12 h-auto bg-gray-200 mt-6 shadow-lg lg:rounded-lg lg:w-full">
                <h1 class="flex justify-center items-center mx-auto text-3xl font-bold text-gray-800 mt-8">{{ $buddy->firstname }} {{ $buddy->lastname }}</h1>
                @if($buddy->buddy_status === 'Searching')
                    <p class="text-center w-20 px-2 mx-auto text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">
                        {{ $buddy->buddy_status }}
                    </p>
                @elseif($buddy->buddy_status  === 'Guiding')
                    <p class="text-center w-16 px-2 mx-auto text-xs leading-5 font-semibold rounded-full bg-purple-200 text-purple-800">
                        {{ $buddy->buddy_status }}
                    </p>
                @endif
                <p class="text-center py-4 text-gray-600 lg:mx-auto lg:w-3/5 lg:max-w-5xl">{{ $buddy->bio }}</p>

                @if($me != $buddy->user_id)
                    @if($friendStatus=='Add buddy')
                        <a href="/add-friend/{{ $buddy->id }}" class="flex justify-center w-4/5 mx-auto items-center p-2 text-sm leading-5 font-semibold rounded bg-gray-700 text-white hover:border-gray-700 hover:bg-gray-400 hover:text-gray-700 lg:w-2/5">{{ $friendStatus }}</a>
                    @elseif($friendStatus=='Buddy request sent')
                        <p class="flex justify-center w-4/5 mx-auto items-center p-2 text-sm leading-5 font-semibold rounded bg-gray-500 text-white lg:w-2/5">{{ $friendStatus }}</p>
                    @elseif($friendStatus=='Remove buddy')
                        <a href="/remove-friend/{{ $buddy->id }}" class="flex justify-center w-4/5 mx-auto items-center p-2 text-sm leading-5 font-semibold rounded bg-gray-400 text-white lg:w-2/5">{{ $friendStatus }}</a>
                    @endif
                @endif

                <div class="p-4 lg:px-32">
                    <h2 class="text-xl font-bold text-gray-800">Info</h2>
                    <div class="flex flex-row mt-4">
                        <svg class="bi bi-house-door-fill" width="1.3em" height="1.3em" viewBox="0 0 16 16" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                            <path d="M6.5 10.995V14.5a.5.5 0 0 1-.5.5H2a.5.5 0 0 1-.5-.5v-7a.5.5 0 0 1 .146-.354l6-6a.5.5 0 0 1 .708 0l6 6a.5.5 0 0 1 .146.354v7a.5.5 0 0 1-.5.5h-4a.5.5 0 0 1-.5-.5V11c0-.25-.25-.5-.5-.5H7c-.25 0-.5.25-.5.495z"/>
                            <path fill-rule="evenodd" d="M13 2.5V6l-2-2V2.5a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5z"/>
                        </svg>
                        <p class="pl-4 font-semibold">{{ $buddy->class }}</p>
                    </div>

                    <div class="flex flex-row">
                        <svg class="bi bi-calendar" width="1.3em" height="1.3em" viewBox="0 0 16 16" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd" d="M1 4v10a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1V4H1zm1-3a2 2 0 0 0-2 2v11a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V3a2 2 0 0 0-2-2H2z"/>
                            <path fill-rule="evenodd" d="M3.5 0a.5.5 0 0 1 .5.5V1a.5.5 0 0 1-1 0V.5a.5.5 0 0 1 .5-.5zm9 0a.5.5 0 0 1 .5.5V1a.5.5 0 0 1-1 0V.5a.5.5 0 0 1 .5-.5z"/>
                        </svg>
                        <p class="pl-4 font-semibold">{{ $buddy->birth_date }}</p>
                    </div>

                    @if($me != $buddy->user_id)
                        <div class="flex flex-row">
                            @php
                                $buddy_common = \App\Buddy::getCommonInterests($buddy->id, Session::get('user')->id);
                            @endphp
                            <p class="font-semibold">You have
                                <span class="text-orange-800 font-semibold">
                                @if(empty($buddy_common[0]->common_interests))
                                    0
                                @else
                                    {{ $buddy_common[0]->common_interests }}
                                @endif
                                </span> common interests with {{ $buddy->firstname }}!
                            </p>
                        </div>
                    @endif
                </div>
                <div class="p-4 lg:px-32">
                    @if($me == $buddy->user_id)
                        <div class="flex justify-between">
                            <h2 class="text-xl font-bold text-gray-800">Interests</h2>
                            <a href="/buddies/{{ $buddy->id }}/interests" class="text-indigo-600 hover:text-indigo-900">Edit</a>
                        </div>
                    @else
                        <h2 class="text-xl font-bold text-gray-800">Interests</h2>
                    @endif
                    <div class="flex flex-wrap mt-4">
                        @foreach( $buddy->interests as $interest)
                            <div class="w-max max-w-xs p-2 mr-2 mb-4 text-center bg-indigo-300 text-indigo-700 rounded lg:w-1/4">{{ $interest->interest }}</div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>

        @if($me == $buddy->user_id)
        <div class="flex flex-col justify-center items-center mx-auto max-w-6xl">
            <h2 class="mt-12 text-3xl font-bold text-gray-800 mb-8">Buddy requests</h2>
            <div class="flex flex-col lg:flex-row">

            @foreach($friendRequests as $request)
                @php
                    $buddy_name = \App\Buddy::getName($request->acted_user);
                @endphp
                    <div class="w-auto mb-8 bg-gray-200 rounded shadow-lg h-auto text-center lg:mr-12 lg:w-64">
                        <div class="mx-12 my-4">
                            <a href="/buddies/{{ $request->acted_user }}" class="font-bold">{{ $buddy_name }}</a>
                        </div>
                        <div class="flex flex-row">
                            <a href="/accept-request/{{ $request->acted_user }}" class="flex-1 text-center bg-teal-300 text-teal-700">Accept</a>
                            <a href="/ignore-request/{{ $request->acted_user }}" class="flex-1 text-center bg-red-300 text-red-700">Ignore</a>
                        </div>
                    </div>


            @endforeach
            </div>
        </div>
        @endif


        @auth
            @if($me == $buddy->user_id)
                <div class="flex flex-col justify-center items-center mx-auto max-w-6xl mb-20">
                <h2 class="mt-12 text-3xl font-bold text-gray-800">Edit details</h2>
                    <div class="w-11/12 h-auto bg-gray-200 mt-12 shadow-lg lg:rounded-lg lg:w-full">

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
                    </div>
                </div>
            @endif
        @endauth


    @endsection
</div>

