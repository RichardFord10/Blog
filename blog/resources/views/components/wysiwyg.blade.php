<div>
    <div class="mb-4">
        <label for="{{ $field }}" class="block text-gray-700 dark:text-gray-200 text-sm font-bold mb-2">
            {{ $label }}
        </label>
        <textarea name="{{ $field }}" id="{{ $field }}" placeholder="{{ $label }}"
            class="shadow appearance-none border rounded w-full h-48 py-2 px-3 text-gray-700 dark:text-gray-800 leading-tight focus:outline-none focus:shadow-outline">
            {{ $value }}
        </textarea>
    </div>
</div>