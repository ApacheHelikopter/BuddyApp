@extends('layouts/start')

@section('title')
    Login
@endsection
@section('content')
<div class="min-h-screen flex items-center justify-center bg-gray-50 py-12 px-4 sm:px-6 lg:px-8">
  <div class="max-w-md w-full">
    <div>
      <img class="mx-auto h-20 w-auto" src="{{ asset('images/IMDBUDDY_logo2.png')}}" alt="IMDBuddy" />
      <h2 class="mt-6 text-center text-3xl leading-9 font-extrabold text-gray-900">
        Log in to your account
      </h2>
    </div>
    <form class="mt-8" action="#" method="POST">
    {{ csrf_field() }}

      <input type="hidden" name="remember" value="true" />
        <div class="rounded-md shadow-sm">
            <div>
                <input aria-label="Email address" name="email" type="email" value="{{ old('email') }}" required class="appearance-none rounded-none relative block w-full px-3 py-2 border border-gray-300 placeholder-gray-500 text-gray-900 rounded-t-md focus:outline-none focus:shadow-outline-blue focus:border-blue-300 focus:z-10 sm:text-sm sm:leading-5" placeholder="Email address" />
            </div>
            <div class="-mt-px">
                <input aria-label="Password" name="password" type="password" required class="appearance-none rounded-none relative block w-full px-3 py-2 border border-gray-300 placeholder-gray-500 text-gray-900 rounded-b-md focus:outline-none focus:shadow-outline-blue focus:border-blue-300 focus:z-10 sm:text-sm sm:leading-5" placeholder="Password" />
            </div>
        </div>

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

      <div class="mt-6 flex items-center justify-between">

        <div class="text-sm leading-5">
          <a href="/register" class="font-medium text-indigo-600 hover:text-indigo-500 focus:outline-none focus:underline transition ease-in-out duration-150">
            No account yet?
          </a>
        </div>

        <div class="text-sm leading-5">
          <a href="#" class="font-medium text-indigo-600 hover:text-indigo-500 focus:outline-none focus:underline transition ease-in-out duration-150">
            Forgot your password?
          </a>
        </div>
      </div>

      <div class="mt-6">
        <button type="submit" class="group relative w-full flex justify-center py-2 px-4 border border-transparent text-sm leading-5 font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-500 focus:outline-none focus:border-indigo-700 focus:shadow-outline-indigo active:bg-indigo-700 transition duration-150 ease-in-out">
          <span class="absolute left-0 inset-y-0 flex items-center pl-3">
            <svg class="h-5 w-5 text-indigo-500 group-hover:text-indigo-400 transition ease-in-out duration-150" fill="currentColor" viewBox="0 0 20 20">
              <path fill-rule="evenodd" d="M5 9V7a5 5 0 0110 0v2a2 2 0 012 2v5a2 2 0 01-2 2H5a2 2 0 01-2-2v-5a2 2 0 012-2zm8-2v2H7V7a3 3 0 016 0z" clip-rule="evenodd" />
            </svg>
          </span>
          Log in
        </button>
      </div>
    </form>
  </div>
</div>
@endsection
