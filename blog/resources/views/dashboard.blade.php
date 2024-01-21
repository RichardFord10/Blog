<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between w-full items-center">
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                Hello, {{ explode(' ', Auth::user()->name)[0] }}! 👋
            </h2>
            <!-- Alpine.js component for dropdown -->
            <div x-data="{ open: false }" @click.away="open = false" class="relative">
                <!-- Dropdown button -->
                <button @click="open = !open"
                    class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
                    Add
                </button>
                <!-- Dropdown menu -->
                <div x-show="open" class="absolute right-0 mt-2 py-2 w-48 bg-white dark:bg-gray-500 rounded-md shadow-xl z-20">
                    <a href="{{ route('projects.create') }}"
                        class="block px-4 text-white py-2 text-sm capitalize text-gray-700 hover:bg-green-500 hover:text-white">
                        Project
                    </a>
                    <a href="{{ route('work_history.create') }}"
                        class="block px-4 text-white py-2 text-sm capitalize text-gray-700 hover:bg-green-500 hover:text-white">
                        Work History
                    </a>
                    <a href="{{ route('posts.create') }}"
                        class="block px-4 text-white  py-2 text-sm capitalize text-gray-700 hover:bg-green-500 hover:text-white">
                        Post
                    </a>
                </div>
            </div>
        </div>
    </x-slot>


    <div class="flex justify-center mb-1">
        <h2 class="text-xl font-bold p-2 text-gray-800 dark:text-gray-200">Your Posts:</h2>
    </div>
    <!-- Posts Section -->
    <div class="py-2">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            @foreach ($posts as $post)
            <a href="{{ route('posts.show', $post->id) }}" class="flex-grow">
                <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg mb-6">
                    <div class="flex justify-center">
                        <h3
                            class="text-xl font-bold p-2 text-gray-800 dark:text-gray-200 border-b border-gray-300 dark:border-gray-700 pb-4 mb-1">
                            {{ $post->title }}</h3>
                    </div>
                    <div class="p-6 text-gray-900 dark:text-gray-100 flex justify-between items-center">
                        <p>
                        <p class="text-sm font-body text-gray-600 dark:text-gray-300 mt-2">{!!
                            Str::limit($post->content, 35) !!}</p>
                        <div class="button-group inline flex">
                            <a href="{{ route('posts.edit', $post->id) }}"
                                class="inline-block bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                                <i class="fas fa-pencil-alt"></i> Edit
                            </a>
                            &nbsp;
                            <form action="{{ route('posts.destroy', $post->id) }}" method="POST" class="inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit"
                                    class="inline-block bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded">
                                    <i class="fas fa-trash"></i> Delete
                                </button>

                            </form>
                        </div>
                    </div>
                </div>
            </a>
            @endforeach
        </div>
    </div>
</x-app-layout>