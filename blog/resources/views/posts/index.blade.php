<x-app-layout>
    <div class="container-fluid mx-auto py-6 px-2 md:px-4">
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
            @foreach ($posts as $post)
            <a href="{{ route('posts.show', $post->id) }}">
                <div class="bg-white dark:bg-gray-700 rounded-lg shadow overflow-hidden mb-4">
                    <div class="p-4">
                        <h2 class="text-base md:text-lg font-heading font-bold text-gray-800 dark:text-white">
                            {{ $post->title }}</h2>
                            <p class="text-sm font-body text-gray-600 dark:text-gray-300 mt-2">{!! Str::limit($post->content, 10) !!}</p>
                        <!-- Add more post details here -->
                    </div>
                </div>
            </a>
            @endforeach
        </div>
    </div>
</x-app-layout>