<div>
    <div class="mb-4">
        <label for="active" class="inline-flex items-center">
            <!-- Hidden input to ensure a value is sent when checkbox is unchecked -->
            <input type="hidden" name="active" value="0" />
            <input type="checkbox" id="active" name="active" value="1"
                class="shadow border rounded text-blue-500 focus:outline-none focus:shadow-outline"
                {{ $entity->active ? 'checked' : '' }} />
            <span class="ml-2 text-gray-700 dark:text-gray-200 text-sm font-bold">Active</span>
        </label>
    </div>
</div>
