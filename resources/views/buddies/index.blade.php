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
    <div class="max-w-7xl mx-auto py-6 sm:px-6 lg:px-32">
      <div class="px-4 py-6 sm:px-0">
        <div class="rounded-lg h-96">
            <h1 class="text-3xl font-bold leading-tight text-gray-900">Best matching buddies</h1>

            <div class="flex flex-col items-center sm:flex-row py-10 ">

                @if(count($matchingUser) == 0)
                    <div class="flex flex-col">
                        <p>You don't have any matching buddies yet 😥</p>
                        <p>Add or edit your interests <a href="/buddies/{{ Session::get('user')->id }}/interests" class="font-bold">here</a></p>
                    </div>
                @else
                    @foreach( $matchingUser as $matching )
                        @component('components/matchingbuddy')
                            @php
                                $buddy_name = \App\Buddy::getName($matching->buddy_id);
                                $buddy_class = \App\Buddy::getClass($matching->buddy_id);
                                $buddy_bio = \App\Buddy::getBio($matching->buddy_id);
                                $buddy_status = \App\Buddy::getStatus($matching->buddy_id);
                            @endphp

                            @slot('buddyID')
                                {{ $matching->buddy_id }}
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
                            @slot('buddyCommon')
                                {{ $matching->common_interests }}
                            @endslot
                        @endcomponent
                    @endforeach
                @endif

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
                                Common interests
                                </th>
                                <th class="px-6 py-3 border-b border-gray-200 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">
                                Buddy Status
                                </th>
                                <th class="px-6 py-3 border-b border-gray-200 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">
                                Class
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
                                            $buddy_status = \App\Buddy::getStatus($buddy->id);
                                            $buddy_common = \App\Buddy::getCommonInterests($buddy->id, Session::get('user')->id);
                                        @endphp

                                        @slot('buddyID')
                                            {{ $buddy->id }}
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

                                        @if(empty($buddy_common[0]->common_interests))
                                            @slot('buddyCommon')
                                                {{ 0 }}
                                            @endslot
                                        @else
                                            @slot('buddyCommon')
                                                {{ $buddy_common[0]->common_interests }}
                                            @endslot
                                        @endif

                                        @slot('buddyPicture')
                                            {{ $buddy_picture }}
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
