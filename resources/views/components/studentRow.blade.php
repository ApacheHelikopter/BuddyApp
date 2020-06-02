<tr>
    <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">
    <div class="flex items-center">
        <div class="flex-shrink-0 h-10 w-10">
        <img class="h-10 w-10 rounded-full" src="{{ asset('storage/profile_picture/'.$buddyID.'/'.$buddyPicture) }}" alt="" />
        </div>
        <div class="ml-4">
        <div class="text-sm leading-5 font-medium text-gray-900">{{ $buddyName }}</div>
        <div class="text-sm leading-5 text-gray-500">bernardlane@example.com</div>
        </div>
    </div>
    </td>
    <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">
    <div class="text-sm leading-5 text-gray-900">Director</div>
    <div class="text-sm leading-5 text-gray-500">Human Resources</div>
    </td>
    <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">
    <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">
        Active
    </span>
    </td>
    <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200 text-sm leading-5 text-gray-500">
        {{ $buddyClass }}
    </td>
    <td class="px-6 py-4 whitespace-no-wrap text-right border-b border-gray-200 text-sm leading-5 font-medium">
        <a href="/buddies/{{ $buddyID }}" class="text-indigo-600 hover:text-indigo-900">View profile</a>
    </td>
</tr>
