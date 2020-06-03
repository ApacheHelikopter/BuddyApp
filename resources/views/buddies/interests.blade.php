@extends('layouts/app')

@section('title')
    Edit interests
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

                <h1 class="text-3xl font-bold leading-tight text-gray-900">My Interests</h1>
                <div class="flex flex-col lg:flex-row">
                    @foreach( $buddy->interests as $buddyInterest)
                        <a href="/remove-interest/{{ $buddyInterest->id }}"><div class="bg-indigo-300 text-indigo-700 text-center p-2 my-2 lg:w-auto lg:mr-4">{{ $buddyInterest->interest }}</div></a>
                    @endforeach
                </div>

                <h2 class="text-3xl font-bold leading-tight text-gray-900 mt-12">Add interests</h2>
                <div class="flex flex-col lg:flex-row">
                    @foreach( $allInterests as $interest)
                        <a href="/add-interest/{{ $interest->id }}"><div class="bg-teal-300 text-teal-800 text-center p-2 my-2 lg:w-auto lg:mr-4">{{ $interest->interest }}</div></a>
                    @endforeach
                </div>
                @if(count($buddy->interests) > 4)
                    <div class="mt-12 lg:w-24">
                        <a href="/buddies/{{ Session::get('user')->id }}" class="group relative w-full flex justify-center py-2 px-4 border border-transparent text-sm leading-5 font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-500 focus:outline-none focus:border-indigo-700 focus:shadow-outline-indigo active:bg-indigo-700 transition duration-150 ease-in-out">Finish</a>
                    </div>
                @else
                    <div class="mt-12 lg:w-24">
                        <a href="/buddies/{{ Session::get('user')->id }}" class="group relative w-full flex justify-center py-2 px-4 border border-transparent text-sm leading-5 font-medium rounded-md text-white bg-indigo-200 focus:outline-none focus:shadow-outline-indigo active:bg-indigo-700 transition duration-150 ease-in-out">Finish</a>
                    </div>
                    <p>You need atleast 5 different interests to match with a buddy!</p>
                @endif
            </div>
        </div>
    </main>
    @endif
@endsection

