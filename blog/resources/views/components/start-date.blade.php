<div>
    <div class="mb-4">
        <label for="start_date" class="block text-gray-700 dark:text-gray-200 text-sm font-bold mb-2">Start
            Date:</label>
        <input type="date" name="start_date" id="start_date"
            class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 dark:text-gray-800 leading-tight focus:outline-none focus:shadow-outline"
            value="{{$entity->start_date ?? ''}}" required>
    </div>
</div>