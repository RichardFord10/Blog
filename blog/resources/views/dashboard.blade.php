<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between w-full items-center">
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                Hello, {{ explode(' ', Auth::user()->name)[0] }}! 👋
            </h2>
            <div class="flex gap-2">
            <a href="{{ route('projects.create') }}"
                    class="inline-block bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                    Add Project
                </a>
                <a href="{{ route('work_history.create') }}"
                    class="inline-block bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                    Add Work History
                </a>
                <a href="{{ route('posts.create') }}"
                    class="inline-block bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded">
                    Create Post
                </a>
            </div>
        </div>

    </x-slot>
    <div class="flex justify-center mb-6">
        <h2 class="text-xl font-bold p-2 text-gray-800 dark:text-gray-200">Your Posts:</h2>
    </div>
    <!-- Posts Section -->
    <div class="py-2">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            @foreach ($posts as $post)
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg mb-6">
                <div class="p-6 text-gray-900 dark:text-gray-100 flex justify-between items-center">
                    <a href="{{ route('posts.show', $post->id) }}" class="flex-grow">
                        <h3 class="font-semibold text-lg">{{ $post->title }}</h3>
                        <p>{{ $post->content }}</p>
                    </a>
                    <div class="button-group">
                        <a href="{{ route('posts.edit', $post->id) }}"
                            class="inline-block bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                            <i class="fas fa-pencil-alt"></i> Edit
                        </a>
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
            @endforeach
        </div>
    </div>
</x-app-layout>