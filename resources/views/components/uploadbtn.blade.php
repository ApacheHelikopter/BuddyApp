<div class="flex w-full items-center justify-center bg-grey-lighter mb-8">
    <label class="w-30 flex flex-col items-center px-4 py-6 bg-indigo-600 text-white rounded-lg shadow-lg tracking-wide uppercase border border-blue cursor-pointer" for="file-upload">
        <svg class="w-8 h-8" fill="currentColor" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
            <path d="M16.88 9.1A4 4 0 0 1 16 17H5a5 5 0 0 1-1-9.9V7a3 3 0 0 1 4.52-2.59A4.98 4.98 0 0 1 17 8c0 .38-.04.74-.12 1.1zM11 11h3l-4-4-4 4h3v3h2v-3z" />
        </svg>
        <span class="mt-2 text-xs leading-normal" id="file-upload-filename">Select a profile picture</span>
        <input type='file' class="hidden" accept="image/*" id="file-upload" name="profile_picture"/>
    </label>
</div>
<script>
    var input = document.getElementById( 'file-upload' );
    var infoArea = document.getElementById( 'file-upload-filename' );

    input.addEventListener( 'change', showFileName );

    function showFileName( event ) {
        let input = event.srcElement;
        let fileName = input.files[0].name;
        infoArea.textContent = 'File name: ' + fileName;
    }
</script>
