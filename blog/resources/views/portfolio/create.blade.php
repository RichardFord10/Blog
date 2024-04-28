<x-app-layout>
    <div class="container mx-auto py-6">
        <a href="{{ route('dashboard.index') }}" class="inline-block">
            <i class="ml-2 fa fa-chevron-left bold" aria-hidden="true"></i>
        </a>
        <div class="max-w-lg mx-auto">
            <div class="flex justify-center mb-6">
                <h2 class="text-xl font-bold text-gray-800 dark:text-gray-200">Add About Info</h2>
            </div>
            <form action="{{ route('portfolio.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="dark:bg-gray-700 rounded-lg shadow overflow-hidden p-4">
                    <!-- First Name Input -->
                    <div class="mb-4">
                        <label for="first_name" class="block text-gray-700 dark:text-gray-200 text-sm font-bold mb-2">First Name:</label>
                        <input type="text" id="first_name" name="first_name" placeholder="First Name" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 dark:text-gray-800 leading-tight focus:outline-none focus:shadow-outline" required>
                    </div>

                    <!-- Last Name Input -->
                    <div class="mb-4">
                        <label for="last_name" class="block text-gray-700 dark:text-gray-200 text-sm font-bold mb-2">Last Name:</label>
                        <input type="text" id="last_name" name="last_name" placeholder="Last Name" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 dark:text-gray-800 leading-tight focus:outline-none focus:shadow-outline" required>
                    </div>

                    <div class="flex items-start justify-center space-x-6">
                        <div class="bg-dark-800 rounded-lg hover:bg-gray-100 dark:hover:bg-gray-700 transition relative">
                            <label for="image" class="cursor-pointer block">
                                <div class="flex flex-col p-4 border-2 border-dashed rounded-lg hover:bg-gray-100 dark:hover:bg-gray-700 transition">
                                    <i class="fa fa-user"></i>
                                </div>
                            </label>
                            <input type="file" name="image" id="image" class="hidden" onchange="previewImage();">
                        </div>
                        <!-- Image Preview Container -->
                        <div id="image-preview" class="hidden">
                            <img id="preview-img" src="#" alt="Image preview" class="rounded-full" style="max-width: 50px; max-height: 50px;">
                        </div>
                    </div>

                    <div class="mb-4">
                        <label for="description" class="block text-gray-700 dark:text-gray-200 text-sm font-bold mb-2">Description:</label>
                        <textarea name="about" id="about" placeholder="About" class="shadow appearance-none border rounded w-full h-48 py-2 px-3 text-gray-700 dark:text-gray-800 leading-tight focus:outline-none focus:shadow-outline"></textarea>
                    </div>

                    <!-- Checkbox for 'Active' -->
                    <div class="mb-4">
                        <label for="active" class="inline-flex items-center">
                            <input type="checkbox" id="active" name="active" class="shadow border rounded text-blue-500 focus:outline-none focus:shadow-outline" />
                            <span class="ml-2 text-gray-700 dark:text-gray-200 text-sm font-bold">Active</span>
                        </label>
                    </div>

                    <div class="flex justify-center">
                        <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">Add About</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</x-app-layout>