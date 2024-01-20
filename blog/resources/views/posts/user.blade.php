<div class="container mx-auto py-6">
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
            @foreach ($posts as $post)
                <div class="bg-white dark:bg-gray-700 rounded-lg shadow overflow-hidden">
                    <div class="p-4">
                        <h2 class="text-lg font-heading font-bold text-gray-800 dark:text-white">{{ $post->title }}</h2>
                        <p class="font-body text-gray-600 dark:text-gray-300 mt-2">{{ $post->content }}</p>
                        <!-- Add more post details here -->
                    </div>
                </div>
            @endforeach
        </div>
    </div>