<x-app-layout>
    <div class="container mx-auto p-4">
        <div class="bg-white dark:bg-gray-700 rounded-lg shadow overflow-hidden">
            <div class="p-4">
                <h1 class="text-lg font-heading font-bold text-gray-800 dark:text-white">{{ $post->title }}</h1>
                <p class="font-body text-gray-600 dark:text-gray-300 mt-2">{!! $post->content !!}</p>
                <!-- Add more post details here -->
                <div class="mt-4 text-gray-600 dark:text-gray-300">
                    <span>
                    </span>
                    <div class="pt-4 mt-4 border-t border-gray-200 dark:border-gray-600">
                        <p class="text-xs text-gray-500 dark:text-gray-400">
                        <sup>Author: {{ $post->author->name ?? 'Not Available' }}</sup>
                        <sup>{{ \Carbon\Carbon::parse($post->created_at)->format('F j, Y, g:i A') }}</sup>

                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
