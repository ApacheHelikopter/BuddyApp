<tr>
    <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">
    <div class="flex items-center">
        <div class="flex-shrink-0 h-10 w-10">
            @if($buddyPicture == 'mock.png')
                <img class="h-10 w-10 rounded-full" src="{{ asset('storage/public/'.$buddyPicture) }}" alt="" />
            @else
                <img class="h-10 w-10 rounded-full" src="{{ asset('storage/profile_picture/'.$buddyID.'/'.$buddyPicture) }}" alt="" />
            @endif
        </div>
        <div class="ml-4">
        <div class="text-sm leading-5 font-medium text-gray-900">{{ $buddyName }}</div>
        </div>
    </div>
    </td>
    <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">
    <div class="text-sm leading-5 text-gray-900">{{ $buddyCommon }}</div>
    </td>
    <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">
    @if($buddyStatus == 'Searching')
    <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">
        {{ $buddyStatus }}
    </span>
    @elseif($buddyStatus == 'Guiding')
    <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-purple-100 text-purple-800">
        {{ $buddyStatus }}
    </span>
    @endif
    </td>
    <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200 text-sm leading-5 text-gray-900">
        {{ $buddyClass }}
    </td>
    <td class="px-6 py-4 whitespace-no-wrap text-right border-b border-gray-200 text-sm leading-5 font-medium">
        <a href="/buddies/{{ $buddyID }}" class="text-indigo-600 hover:text-indigo-900">View profile</a>
    </td>
</tr>
