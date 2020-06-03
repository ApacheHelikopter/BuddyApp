@if(Auth::check() and Session::has('user'))
<nav class="bg-gray-800">
  <div class="max-w-7xl mx-auto px-2 sm:px-6 lg:px-32">
    <div class="relative flex items-center justify-between h-16">
      <div class="absolute inset-y-0 left-0 flex items-center sm:hidden">
        <button class="inline-flex items-center justify-center p-2 rounded-md text-gray-400 hover:text-white hover:bg-gray-700 focus:outline-none focus:bg-gray-700 focus:text-white transition duration-150 ease-in-out" aria-label="Main menu" aria-expanded="false">
          <svg class="block h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"/>
          </svg>
          <svg class="hidden h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
          </svg>
        </button>
      </div>
      <div class="flex-1 flex items-center justify-center sm:items-stretch sm:justify-start">
        <div class="flex-shrink-0">
          <a href="/buddies"><img class="block lg:hidden h-8 w-auto" src="{{ asset('images/IMDBUDDY_logoHeader.png')}}"  alt="IMDBuddy" /></a>
          <a href="/buddies"><img class="hidden lg:block h-8 w-auto" src="{{ asset('images/IMDBUDDY_logoHeader.png')}}"  alt="IMDBuddy" /></a>
        </div>
        <div class="hidden sm:block sm:ml-6">
          <div class="flex">
            <a href="/buddies" class="px-3 py-2 rounded-md text-sm font-medium leading-5 text-white bg-gray-900 focus:outline-none focus:text-white focus:bg-gray-700 transition duration-150 ease-in-out">Find a buddy</a>
            <a href="/mybuddies" class="ml-4 px-3 py-2 rounded-md text-sm font-medium leading-5 text-gray-300 hover:text-white hover:bg-gray-700 focus:outline-none focus:text-white focus:bg-gray-700 transition duration-150 ease-in-out">My buddies</a>          </div>
        </div>
      </div>
      <div class="absolute inset-y-0 right-0 flex items-center pr-2 sm:static sm:inset-auto sm:ml-6 sm:pr-0">
        <a class="p-1 border-2 border-transparent text-gray-400 rounded-full hover:text-white focus:outline-none focus:text-white focus:bg-gray-700 transition duration-150 ease-in-out cursor-pointer" href="/logout" aria-label="Logout">

          <svg class="h-6 w-6" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
            <path d="M16 17l5-5-5-5M19.8 12H9M10 3H4v18h6"/>
          </svg>
        </a>

        <!-- Profile dropdown -->
        <div class="ml-3 relative">
          <div>
            <a class="flex text-sm border-2 border-white rounded-full focus:outline-none focus:border-white transition duration-150 ease-in-out cursor-pointer" id="user-menu" href="/buddies/{{ Session::get('user')->id }}" aria-label="User menu" aria-haspopup="true">
                @if(Session::get('user')->profile_picture == 'mock.png')
                    <img class="h-8 w-8 rounded-full" src="{{ asset('storage/public/'.Session::get('user')->profile_picture) }}" alt="" />
                @else
                    <img class="h-8 w-8 rounded-full" src="{{ asset('storage/profile_picture/'.Session::get('user')->id.'/'.Session::get('user')->profile_picture) }}" alt="" />
                @endif
            </a>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!--
    Mobile menu, toggle classes based on menu state.

    Menu open: "block", Menu closed: "hidden"
  -->
  <div class="hidden sm:hidden">
    <div class="px-2 pt-2 pb-3">
      <a href="/buddies" class="block px-3 py-2 rounded-md text-base font-medium text-white bg-gray-900 focus:outline-none focus:text-white focus:bg-gray-700 transition duration-150 ease-in-out">Find a buddy</a>
      <a href="/mybuddies" class="mt-1 block px-3 py-2 rounded-md text-base font-medium text-gray-300 hover:text-white hover:bg-gray-700 focus:outline-none focus:text-white focus:bg-gray-700 transition duration-150 ease-in-out">My buddies</a>
    </div>
  </div>
</nav>
@endif
