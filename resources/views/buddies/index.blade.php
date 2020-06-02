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

    <main>
    <div class="max-w-7xl mx-auto py-6 sm:px-6 lg:px-8">
      <div class="px-4 py-6 sm:px-0">
        <div class="rounded-lg h-96">
        <h1 class="text-3xl font-bold leading-tight text-gray-900">Best matching buddies</h1>

        <div class="flex flex-row py-10">

            @foreach( $matchingUser as $matching )
                @component('components/matchingbuddy')
                    @php
                        $buddy_name = \App\Buddy::getName($matching->buddy_id);
                        $buddy_class = \App\Buddy::getClass($matching->buddy_id);
                        $buddy_bio = \App\Buddy::getBio($matching->buddy_id);
                    @endphp

                    @slot('buddyID')
                        {{ $matching->buddy_id }}
                    @endslot
                    @slot('buddyName')
                        {{ $buddy_name }}
                    @endslot
                    @slot('buddyClass')
                        {{ $buddy_class }}
                    @endslot
                    @slot('buddyBio')
                        {{ $buddy_bio }}
                    @endslot
                    @slot('commonInterests')
                        {{ $matching->common_interests }}
                    @endslot
                @endcomponent
            @endforeach

        </div>

        <h1 class="text-3xl font-bold leading-tight text-gray-900">All students</h1>

            <div class="flex flex-col py-10">
                <div class="-my-2 py-2 overflow-x-auto sm:-mx-6 sm:px-6 lg:-mx-8 lg:px-8">
                    <div class="align-middle inline-block min-w-full shadow overflow-hidden sm:rounded-lg border-b border-gray-200">
                    <table class="min-w-full">
                        <thead>
                        <tr>
                            <th class="px-6 py-3 border-b border-gray-200 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">
                            Name
                            </th>
                            <th class="px-6 py-3 border-b border-gray-200 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">
                            Title
                            </th>
                            <th class="px-6 py-3 border-b border-gray-200 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">
                            Status
                            </th>
                            <th class="px-6 py-3 border-b border-gray-200 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">
                            Role
                            </th>
                            <th class="px-6 py-3 border-b border-gray-200 bg-gray-50"></th>
                        </tr>
                        </thead>
                        <tbody class="bg-white">
                            @foreach( $users as $buddy )

                                @component('components/studentRow')
                                    @php
                                        $buddy_name = \App\Buddy::getName($buddy->id);
                                        $buddy_class = \App\Buddy::getClass($buddy->id);
                                        $buddy_bio = \App\Buddy::getBio($buddy->id);
                                        $buddy_picture = \App\Buddy::getProfilePicture($buddy->id);
                                    @endphp

                                    @slot('buddyID')
                                        {{ $buddy->id }}
                                    @endslot
                                    @slot('buddyName')
                                        {{ $buddy_name }}
                                    @endslot
                                    @slot('buddyClass')
                                        {{ $buddy_class }}
                                    @endslot
                                    @slot('buddyBio')
                                        {{ $buddy_bio }}
                                    @endslot
                                    @slot('buddyPicture')
                                        {{ $buddy_picture }}
                                    @endslot
                                    @slot('commonInterests')
                                        {{ $matching->common_interests }}
                                    @endslot
                                @endcomponent
                            @endforeach
                        </tbody>
                    </table>
                    </div>
                </div>
            </div>

      </div>
    </div>
  </main>



    @endif
@endsection
