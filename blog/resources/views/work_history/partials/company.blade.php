<section>
    <div class="mb-4">
        <label for="company" class="block text-gray-700 dark:text-gray-200 text-sm font-bold mb-2">Company:</label>
        <input type="text" name="company" id="company" placeholder="Company"
            class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 dark:text-gray-800 leading-tight focus:outline-none focus:shadow-outline"
            value="{{$work_history->company ?? ''}}" required>
    </div>
</section>