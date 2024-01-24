<x-app-layout>
    <div class="container mx-auto py-6">
    <a href="{{ route('dashboard') }}" class="inline-block">
            <i class="ml-2 fa fa-chevron-left bold" aria-hidden="true"></i>
        </a>
        <div class="max-w-lg mx-auto">
            <div class="flex justify-center mb-6">
                <h2 class="text-xl font-bold text-gray-800 dark:text-gray-200">Edit Work History</h2>
            </div>
            <div class="bg-white dark:bg-gray-700 rounded-lg shadow overflow-hidden p-4">
                <form action="{{ route('work_history.update', $work_history->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="mb-4">
                        <label for="title"
                            class="block text-gray-700 dark:text-gray-200 text-sm font-bold mb-2">Title:</label>
                        <input type="text" name="title" id="title" placeholder="Title"
                            class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 dark:text-gray-800 leading-tight focus:outline-none focus:shadow-outline"
                            value="{{$work_history->title}}" required>
                    </div>

                    <div class="mb-4">
                        <label for="description"
                            class="block text-gray-700 dark:text-gray-200 text-sm font-bold mb-2">Description:</label>
                        <textarea name="description" id="description" placeholder="Description"
                            class="shadow appearance-none border rounded w-full h-48 py-2 px-3 text-gray-700 dark:text-gray-800 leading-tight focus:outline-none focus:shadow-outline"
                            required>{{$work_history->description}}</textarea>
                    </div>

                    <div class="mb-4">
                        <label for="company"
                            class="block text-gray-700 dark:text-gray-200 text-sm font-bold mb-2">Company:</label>
                        <input type="text" name="company" id="company" placeholder="Company"
                            class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 dark:text-gray-800 leading-tight focus:outline-none focus:shadow-outline"
                            value="{{$work_history->company}}" required>
                    </div>

                    <div class="mb-4">
                        <label for="start_date"
                            class="block text-gray-700 dark:text-gray-200 text-sm font-bold mb-2">Start Date:</label>
                        <input type="date" name="start_date" id="start_date"
                            class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 dark:text-gray-800 leading-tight focus:outline-none focus:shadow-outline"
                            value="{{$work_history->start_date}}" required>
                    </div>

                    <div class="mb-4">
                        <label for="end_date" class="block text-gray-700 dark:text-gray-200 text-sm font-bold mb-2">End
                            Date:</label>
                        <input type="date" name="end_date" id="end_date"
                            class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 dark:text-gray-800 leading-tight focus:outline-none focus:shadow-outline"
                            value="{{$work_history->end_date}}">
                    </div>

                    <div class="mb-4">
                        <label for="image"
                            class="block text-gray-700 dark:text-gray-200 text-sm font-bold mb-2">Image:</label>

                        <!-- Display current image, if available -->
                        @if($work_history->image)
                        <img src="{{ asset('storage/' . $work_history->image) }}" alt="Current Image" class="mb-3"
                            style="max-width: 100px; max-height: 100px;">
                        @endif

                        <!-- File input for new image upload -->
                        <input type="file" name="image" id="image"
                            class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 dark:text-gray-800 leading-tight focus:outline-none focus:shadow-outline">

                        <!-- Note to user -->
                        <p class="text-xs text-gray-600 text-white">Leave blank if you don't want to change the image.</p>
                    </div>

                    <div class="flex justify-center">
                        <button type="submit"
                            class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
                            Save
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>