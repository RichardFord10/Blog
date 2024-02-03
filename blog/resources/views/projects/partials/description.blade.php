<section>
    <div class="mb-4">
        <label for="description"
            class="block text-gray-700 dark:text-gray-200 text-sm font-bold mb-2">Description:</label>
        <textarea name="description" id="description" placeholder="Description"
            class="shadow appearance-none border rounded w-full h-48 py-2 px-3 text-gray-700 dark:text-gray-800 leading-tight focus:outline-none focus:shadow-outline"
            required>{{$project->description ?? ''}}</textarea>
    </div>
</section>