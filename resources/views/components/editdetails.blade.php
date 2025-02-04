<form class="mt-8" action="#" method="POST" enctype="multipart/form-data">
{{ csrf_field() }}
{{ method_field('patch') }}
    @component('components/uploadbtn')
    @endcomponent
  <div class="md:flex mb-6">
    <div class="md:w-1/2 px-3 mb-6 md:mb-0">
      <label class="block uppercase tracking-wide text-grey-darker text-xs font-bold mb-2" for="grid-first-name">
        First Name
      </label>
      <input class="appearance-none block w-full bg-grey-lighter text-grey-darker border border-red rounded py-3 px-4 mb-3" id="grid-first-name" type="text" name="firstname" value="{{ $firstname }}">
    </div>
    <div class="md:w-1/2 px-3">
      <label class="block uppercase tracking-wide text-grey-darker text-xs font-bold mb-2" for="grid-last-name">
        Last Name
      </label>
      <input class="appearance-none block w-full bg-grey-lighter text-grey-darker border border-grey-lighter rounded py-3 px-4" id="grid-last-name" type="text" name="lastname" value="{{ $lastname }}">
    </div>
  </div>
  <div class="md:flex mb-6">
    <div class="md:w-full px-3">
      <label class="block uppercase tracking-wide text-grey-darker text-xs font-bold mb-2" for="grid-bio">
        Bio
      </label>
      <textarea class="appearance-none block w-full bg-grey-lighter text-grey-darker border border-grey-lighter rounded py-3 px-4 mb-3" id="grid-bio" type="text" name="bio" cols="40" rows="5">{{ $bio }}</textarea>
      <p class="text-grey-dark text-xs italic">Make it as long and as crazy as you'd like</p>
    </div>
  </div>
  <div class="md:flex mb-6">
    <div class="md:w-1/2 px-3 mb-6">
      <label class="block uppercase tracking-wide text-grey-darker text-xs font-bold mb-2" for="grid-class">
        Class
      </label>
      <div class="relative">
        <select class="block appearance-none w-full bg-grey-lighter border border-grey-lighter text-grey-darker py-3 px-4 pr-8 rounded" id="grid-class" name="class">
          <option>1IMD</option>
          <option>2IMD</option>
          <option>3IMD</option>
        </select>
      </div>
    </div>
    <div class="md:w-1/2 px-3 mb-6">
      <label class="block uppercase tracking-wide text-grey-darker text-xs font-bold mb-2" for="grid-status">
        Buddy Status
      </label>
      <div class="relative">
        <select class="block appearance-none w-full bg-grey-lighter border border-grey-lighter text-grey-darker py-3 px-4 pr-8 rounded" id="grid-status" name="status">
          <option>Searching</option>
          <option>Guiding</option>
        </select>
      </div>
    </div>
    <div class="md:w-1/2 px-3">
      <label class="block uppercase tracking-wide text-grey-darker text-xs font-bold mb-2" for="grid-date">
        Birth date
      </label>
      <input class="appearance-none block w-full bg-grey-lighter text-grey-darker border border-grey-lighter rounded py-3 px-4" id="grid-date" type="date" name="birth_date" value="{{ $date }}">
    </div>
  </div>
  <div class="mt-6 px-3 lg:w-1/4 lg:mx-auto">
        <button type="submit" class="group relative w-full flex justify-center py-2 px-4 border border-transparent text-sm leading-5 font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-500 focus:outline-none focus:border-indigo-700 focus:shadow-outline-indigo active:bg-indigo-700 transition duration-150 ease-in-out">
          Save
        </button>
      </div>
</form>
