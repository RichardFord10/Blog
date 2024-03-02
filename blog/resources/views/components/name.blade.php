<div>
    <!-- First Name Input -->
    <div class="mb-4">
        <label for="first_name" class="block text-gray-700 dark:text-gray-200 text-sm font-bold mb-2">First
            Name:</label>
        <input type="text" id="first_name" name="first_name" placeholder="First Name"
            class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 dark:text-gray-800 leading-tight focus:outline-none focus:shadow-outline"
            value="{{ isset($entity->first_name) ? $entity->first_name : '' }}" required>
    </div>

    <!-- Last Name Input -->
    <div class="mb-4">
        <label for="last_name" class="block text-gray-700 dark:text-gray-200 text-sm font-bold mb-2">Last Name:</label>
        <input type="text" id="last_name" name="last_name" placeholder="Last Name"
            class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 dark:text-gray-800 leading-tight focus:outline-none focus:shadow-outline"
            value="{{ isset($entity->last_name) ? $entity->last_name : '' }}" required>
    </div>
</div>

