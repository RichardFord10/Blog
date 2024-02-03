<x-app-layout>
    <div class="container-fluid mx-auto py-6 px-2 md:px-4">
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
            @foreach ($posts as $post)
            <a href="{{ route('posts.show', $post->slug) }}" class="flex flex-col">
                <div class="bg-white dark:bg-gray-700 rounded-lg shadow overflow-hidden mb-4 flex flex-col h-full">
                    <div class="p-4 flex-grow">
                        <h2 class="text-base md:text-lg font-heading font-bold text-gray-800 dark:text-white truncate">
                        {{ strip_tags($post->title) }}</h2>
                        <p class="text-sm font-body text-gray-600 dark:text-gray-300 mt-2 truncate">{{ Str::limit(strip_tags($post->content), 100) }}</p>
                        <!-- Add more post details here -->
                    </div>
                    <div class="pt-2 border-t border-gray-200 dark:border-gray-600">
                        <p class="text-xs text-gray-500 dark:text-gray-400 text-left flex-1 ml-1 align-middle">
                            <sup>Author: {{ $post->author->name ?? 'Not Available' }}</sup>
                            <sup>{{ \Carbon\Carbon::parse($post->created_at)->format('F j, Y, g:i A') }}</sup>                        
                        </p>
                    </div>
                </div>
            </a>
            @endforeach
        </div>
    </div>
</x-app-layout>
