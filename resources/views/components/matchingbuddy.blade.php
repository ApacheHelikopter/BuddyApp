<div class="max-w-sm rounded overflow-hidden shadow-lg h-auto mr-0 mb-8 sm:mr-20">
  <img class="w-full h-48 object-cover" src="https://images.unsplash.com/photo-1591037001540-65c4f4189ed0?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=633&q=80" alt="Sunset in the mountains">
  <div class="px-6 py-4">
  @if($buddyStatus == 'Searching')
    <span class="inline-block bg-teal-200 text-teal-600 text-xs px-2 rounded-full uppercase font-semibold tracking-wide">{{ $buddyStatus }}</span>
  @elseif($buddyStatus == 'Guiding')
    <span class="inline-block bg-purple-200 text-purple-600 text-xs px-2 rounded-full uppercase font-semibold tracking-wide">{{ $buddyStatus }}</span>
  @endif

    <div class="font-bold text-xl mb-1">
        {{ $buddyName }}
    </div>
    <p class="text-gray-700 text-base mb-2">
      {{ $buddyBio }}
    </p>
    <p class="pt-4">You have <span class="text-orange-800 font-semibold">{{ $commonInterests }}</span> interests in common!</p>
  </div>
  <div class="text-center pb-6">
    <a href="/buddies/{{ $buddyID }}" class="flex-1"><span class="inline-block bg-teal-200 rounded-full px-3 py-1 text-sm font-semibold text-teal-500 mr-2">View profile</span></a>
  </div>
</div>
