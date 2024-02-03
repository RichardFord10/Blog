<section>
    <div class="mb-4">
        <label for="image" class="block text-gray-700 dark:text-gray-200 text-sm font-bold mb-2">Image:</label>
        <input type="file" name="image" id="image"
            class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 dark:text-gray-800 leading-tight focus:outline-none focus:shadow-outline">
    </div>
    @if(isset($work_history) && isset($work_history->image))
    <img src="{{ asset('storage/' . $work_history->image) }}" alt="Current Image" class="mb-3"
        style="max-width: 100px; max-height: 100px;">
    @endif
    <sup class="text-xs text-gray-600 text-white">Leave blank if you don't want to change the image.</sup>
</section>