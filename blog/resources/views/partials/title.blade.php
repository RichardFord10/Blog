<section>
    <div class="mb-4">
        <label for="title" class="block text-gray-700 dark:text-gray-200 text-sm font-bold mb-2">Title:</label>
        <input type="text" name="title" id="title" placeholder="Title"
            class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 dark:text-gray-800 leading-tight focus:outline-none focus:shadow-outline"
            value="{{$entity->title ?? ''}}" required>
    </div>
</section>