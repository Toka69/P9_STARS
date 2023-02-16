@csrf
<div class="custom-file rounded">
    <p class="text-white mb-2">
        Add or change the photo
    </p>
    <input type="file" name="file" class="custom-file-input" id="chooseFile" style="color: white">
    <x-input-error :messages="$errors->get('file')" class="mt-2" />
</div>
