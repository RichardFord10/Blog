<x-app-layout>
    <div class="container mx-auto py-6">
    <a href="{{ route('dashboard.index') }}" class="inline-block">
            <i class="ml-2 fa fa-chevron-left bold" aria-hidden="true"></i>
        </a>
        <div class="max-w-lg mx-auto">
            <div class="flex justify-center mb-6">
                <h2 class="text-xl font-bold text-gray-800 dark:text-gray-200">Add Social</h2>
            </div>      
            <div class="bg-white dark:bg-gray-700 rounded-lg shadow overflow-hidden p-4">
                <form action="{{ route('socials.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-4">
                        <label for="title" class="block text-gray-700 dark:text-gray-200 text-sm font-bold mb-2">Title:</label>
                        <input type="text" name="title" id="title" placeholder="Title"
                               class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 dark:text-gray-800 leading-tight focus:outline-none focus:shadow-outline" required>
                    </div>

                    <div class="mb-4">
                        <label for="description" class="block text-gray-700 dark:text-gray-200 text-sm font-bold mb-2">Description:</label>
                        <textarea name="description" id="description" placeholder="Description"
                                  class="shadow appearance-none border rounded w-full h-48 py-2 px-3 text-gray-700 dark:text-gray-800 leading-tight focus:outline-none focus:shadow-outline" required></textarea>
                    </div>

                    <div class="mb-4">
                        <label for="link" class="block text-gray-700 dark:text-gray-200 text-sm font-bold mb-2">Link:</label>
                        <input name="link" id="link" placeholder="Link"
                        class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 dark:text-gray-800 leading-tight focus:outline-none focus:shadow-outline" required>
                    </div>

                    <div class="mb-4">
                        <label for="image" class="block text-gray-700 dark:text-gray-200 text-sm font-bold mb-2">Image:</label>
                        <input type="file" name="image" id="image"
                               class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 dark:text-gray-800 leading-tight focus:outline-none focus:shadow-outline">
                    </div>
                    <div class="flex justify-center">
                    <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">Add Social</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
