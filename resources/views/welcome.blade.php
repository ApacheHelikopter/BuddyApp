<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'IMDBuddy') }}</title>

    <!-- Styles -->
    <link href="{{ mix('css/app.css') }}" rel="stylesheet">
</head>
<body class="bg-gray-100 h-screen antialiased leading-none">
<div class="flex flex-col">

    <div class="relative bg-white overflow-hidden">
    <div class="max-w-screen-xl mx-auto ">
        <div class="relative z-10 pb-8 bg-white sm:pb-16 md:pb-20 lg:max-w-2xl lg:w-full lg:pb-28 xl:pb-32">
        <svg class="hidden lg:block absolute right-0 inset-y-0 h-full w-48 text-white transform translate-x-1/2" fill="currentColor" viewBox="0 0 100 100" preserveAspectRatio="none">
            <polygon points="50,0 100,0 50,100 0,100" />
        </svg>

        <div class="relative pt-6 px-4 sm:px-6 lg:px-8">
            <nav class="relative flex items-center justify-between sm:h-10 lg:justify-start">
            <div class="flex items-center flex-grow flex-shrink-0 lg:flex-grow-0">
                <div class="flex items-center justify-between w-full md:w-auto">
                <a href="#">
                    <img class="h-8 w-auto sm:h-10" src="{{ asset('images/IMDBUDDY_logo2.png')}}" alt="IMDBuddy" />
                </a>
                <div class="-mr-2 flex items-center md:hidden">
                    <button type="button" class="inline-flex items-center justify-center p-2 rounded-md text-gray-400 hover:text-gray-500 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 focus:text-gray-500 transition duration-150 ease-in-out">
                    <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                    </svg>
                    </button>
                </div>
                </div>
            </div>
            <div class="hidden md:block md:ml-10 md:pr-4">
                <a href="#readMore" class="font-medium text-gray-500 hover:text-gray-900 focus:outline-none focus:text-gray-900 transition duration-150 ease-in-out">About</a>
                <a href="#readMore" class="ml-8 font-medium text-gray-500 hover:text-gray-900 focus:outline-none focus:text-gray-900 transition duration-150 ease-in-out">Features</a>
                <a href="/buddies" class="ml-8 font-medium text-gray-500 hover:text-gray-900 focus:outline-none focus:text-gray-900 transition duration-150 ease-in-out">My buddies</a>
                <a href="/login" class="ml-8 font-medium text-indigo-600 hover:text-indigo-900 focus:outline-none focus:text-indigo-700 transition duration-150 ease-in-out">Log in</a>
            </div>
            </nav>
        </div>

        <!--
            Mobile menu, show/hide based on menu open state.

            Entering: "duration-150 ease-out"
            From: "opacity-0 scale-95"
            To: "opacity-100 scale-100"
            Leaving: "duration-100 ease-in"
            From: "opacity-100 scale-100"
            To: "opacity-0 scale-95"
        -->
        <div class="absolute top-0 inset-x-0 p-2 transition transform origin-top-right md:hidden">
            <div class="rounded-lg shadow-md">
            <div class="rounded-lg bg-white shadow-xs overflow-hidden">
                <div class="px-5 pt-4 flex items-center justify-between">
                <div>
                    <img class="h-8 w-auto" src="{{ asset('images/IMDBUDDY_logo2.png')}}"  alt="IMDBuddy" />
                </div>
                <div class="-mr-2">
                    <button type="button" class="inline-flex items-center justify-center p-2 rounded-md text-gray-400 hover:text-gray-500 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 focus:text-gray-500 transition duration-150 ease-in-out">
                    <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                    </button>
                </div>
                </div>
                <div class="px-2 pt-2 pb-3">
                <a href="#readMore" class="block px-3 py-2 rounded-md text-base font-medium text-gray-700 hover:text-gray-900 hover:bg-gray-50 focus:outline-none focus:text-gray-900 focus:bg-gray-50 transition duration-150 ease-in-out">About</a>
                <a href="#readMore" class="mt-1 block px-3 py-2 rounded-md text-base font-medium text-gray-700 hover:text-gray-900 hover:bg-gray-50 focus:outline-none focus:text-gray-900 focus:bg-gray-50 transition duration-150 ease-in-out">Features</a>
                <a href="/buddies" class="mt-1 block px-3 py-2 rounded-md text-base font-medium text-gray-700 hover:text-gray-900 hover:bg-gray-50 focus:outline-none focus:text-gray-900 focus:bg-gray-50 transition duration-150 ease-in-out">My buddies</a>
                </div>
                <div>
                <a href="/login" class="block w-full px-5 py-3 text-center font-medium text-indigo-600 bg-gray-50 hover:bg-gray-100 hover:text-indigo-700 focus:outline-none focus:bg-gray-100 focus:text-indigo-700 transition duration-150 ease-in-out">
                    Log in
                </a>
                </div>
            </div>
            </div>
        </div>

        <div class="mt-10 mx-auto max-w-screen-xl px-4 sm:mt-12 sm:px-6 md:mt-16 lg:mt-20 lg:px-8 xl:mt-28">
            <div class="sm:text-center lg:text-left">
            <h2 class="text-4xl tracking-tight leading-10 font-extrabold text-gray-900 sm:text-5xl sm:leading-none md:text-6xl">
                Find your matching
                <br class="xl:hidden" />
                <span class="text-indigo-600">IMD BUDDY</span>
            </h2>
            <p class="mt-3 text-base text-gray-500 sm:mt-5 sm:text-lg sm:max-w-xl sm:mx-auto md:mt-5 md:text-xl lg:mx-0">
                With this new IMD tool you will now have an easier way of meeting and making best buddies who have the same interests as you
            <div class="mt-5 sm:mt-8 sm:flex sm:justify-center lg:justify-start">
                <div class="rounded-md shadow">
                <a href="/register" class="w-full flex items-center justify-center px-8 py-3 border border-transparent text-base leading-6 font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-500 focus:outline-none focus:shadow-outline transition duration-150 ease-in-out md:py-4 md:text-lg md:px-10">
                    Get started
                </a>
                </div>
                <div class="mt-3 sm:mt-0 sm:ml-3">
                <a href="#readMore" class="w-full flex items-center justify-center px-8 py-3 border border-transparent text-base leading-6 font-medium rounded-md text-indigo-700 bg-indigo-100 hover:text-indigo-600 hover:bg-indigo-50 focus:outline-none focus:shadow-outline focus:border-indigo-300 transition duration-150 ease-in-out md:py-4 md:text-lg md:px-10">
                    Read more
                </a>
                </div>
            </div>
            </div>
        </div>
        </div>
    </div>
    <div class="lg:absolute lg:inset-y-0 lg:right-0 lg:w-1/2">
        <img class="h-56 w-full object-cover sm:h-72 md:h-96 lg:w-full lg:h-full" src="https://scontent-bru2-1.xx.fbcdn.net/v/t1.0-9/53265485_2594277740601085_1095933902838562816_o.jpg?_nc_cat=102&_nc_sid=cdbe9c&_nc_oc=AQnvbA2AxjD_IkCFLD7gX__4xgmxtHup0QxBQf5eUqTuAALNw1vq1OJRsDQiq-dWTvYB8OyAjU2giMFB9CEBRIdg&_nc_ht=scontent-bru2-1.xx&oh=e22f1be7dc0e0e6dd1c47fb346ca1ea8&oe=5EFD6C0A" alt="IMD Image" />
    </div>
    </div>
    <div class="py-40 bg-white" id="readMore">
  <div class="max-w-screen-xl mx-auto px-4 sm:px-6 lg:px-8">
    <div class="lg:text-center">
      <p class="text-base leading-6 text-indigo-600 font-semibold tracking-wide uppercase">Features</p>
      <h3 class="mt-2 text-3xl leading-8 font-extrabold tracking-tight text-gray-900 sm:text-4xl sm:leading-10">
        A quicker way to make friends
      </h3>
      <p class="mt-4 max-w-2xl text-xl leading-7 text-gray-500 lg:mx-auto">
        Our advanced algorithm connects all your interests to the right student in IMD. Learn more about our features and start buddying today.
      </p>
    </div>

    <div class="mt-10">
      <ul class="md:grid md:grid-cols-2 md:col-gap-8 md:row-gap-10">
        <li>
          <div class="flex">
            <div class="flex-shrink-0">
              <div class="flex items-center justify-center h-12 w-12 rounded-md bg-indigo-500 text-white">
                <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 12a9 9 0 01-9 9m9-9a9 9 0 00-9-9m9 9H3m9 9a9 9 0 01-9-9m9 9c1.657 0 3-4.03 3-9s-1.343-9-3-9m0 18c-1.657 0-3-4.03-3-9s1.343-9 3-9m-9 9a9 9 0 019-9"/>
                </svg>
              </div>
            </div>
            <div class="ml-4">
              <h5 class="text-lg leading-6 font-medium text-gray-900">Everyone included</h5>
              <p class="mt-2 text-base leading-6 text-gray-500">
                With this matching system we don't create a barrier between the different IMD years and their expertise. We bring them together.
              </p>
            </div>
          </div>
        </li>
        <li class="mt-10 md:mt-0">
          <div class="flex">
            <div class="flex-shrink-0">
              <div class="flex items-center justify-center h-12 w-12 rounded-md bg-indigo-500 text-white">
                <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 6l3 1m0 0l-3 9a5.002 5.002 0 006.001 0M6 7l3 9M6 7l6-2m6 2l3-1m-3 1l-3 9a5.002 5.002 0 006.001 0M18 7l3 9m-3-9l-6-2m0-2v2m0 16V5m0 16H9m3 0h3"/>
                </svg>
              </div>
            </div>
            <div class="ml-4">
              <h5 class="text-lg leading-6 font-medium text-gray-900">Balanced matching system</h5>
              <p class="mt-2 text-base leading-6 text-gray-500">
                Your interests will help us in finding your best match throughout the whole of IMD. The algorithm collects all data and matches you with a buddy.
              </p>
            </div>
          </div>
        </li>
        <li class="mt-10 md:mt-0">
          <div class="flex">
            <div class="flex-shrink-0">
              <div class="flex items-center justify-center h-12 w-12 rounded-md bg-indigo-500 text-white">
                <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"/>
                </svg>
              </div>
            </div>
            <div class="ml-4">
              <h5 class="text-lg leading-6 font-medium text-gray-900">Connect to eachother</h5>
              <p class="mt-2 text-base leading-6 text-gray-500">
                When signed up you can start adding buddies to your friends list. Add as many as you like with the same interests and connect with eachother.
              </p>
            </div>
          </div>
        </li>
        <li class="mt-10 md:mt-0">
          <div class="flex">
            <div class="flex-shrink-0">
              <div class="flex items-center justify-center h-12 w-12 rounded-md bg-indigo-500 text-white">
                <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 8h10M7 12h4m1 8l-4-4H5a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v8a2 2 0 01-2 2h-3l-4 4z"/>
                </svg>
              </div>
            </div>
            <div class="ml-4">
              <h5 class="text-lg leading-6 font-medium text-gray-900">Message your buddy</h5>
              <p class="mt-2 text-base leading-6 text-gray-500">
                This feature is currently still in development, but we'd love for you and your buddy to be able to chat with eachother.
              </p>
            </div>
          </div>
        </li>
      </ul>
    </div>
  </div>
</div>
    <div class="bg-gray-50">
    <div class="max-w-screen-xl mx-auto py-12 px-4 sm:px-6 lg:py-16 lg:px-8 lg:flex lg:items-center lg:justify-between">
        <h2 class="text-3xl leading-9 font-extrabold tracking-tight text-gray-900 sm:text-4xl sm:leading-10">
        Ready to socialize?
        <br />
        <span class="text-indigo-600">Start meeting your new buddies today.</span>
        </h2>
        <div class="mt-8 flex lg:flex-shrink-0 lg:mt-0">
        <div class="inline-flex rounded-md shadow">
            <a href="/register" class="inline-flex items-center justify-center px-5 py-3 border border-transparent text-base leading-6 font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-500 focus:outline-none focus:shadow-outline transition duration-150 ease-in-out">
            Get started
            </a>
        </div>
        <div class="ml-3 inline-flex rounded-md shadow">
            <a href="#readMore" class="inline-flex items-center justify-center px-5 py-3 border border-transparent text-base leading-6 font-medium rounded-md text-indigo-600 bg-white hover:text-indigo-500 focus:outline-none focus:shadow-outline transition duration-150 ease-in-out">
            Learn more
            </a>
        </div>
        </div>
    </div>
    </div>
</div>
</body>
</html>
