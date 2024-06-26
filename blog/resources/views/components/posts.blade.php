<div>
    <div class="container-fluid mx-auto py-6 px-2 md:px-4">
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
            @foreach ($entity as $post)
            <a href="{{ route('posts.show', $post->slug) }}" class="flex flex-col">
                <div class="bg-gray-800 rounded-lg shadow overflow-hidden mb-4 flex flex-col h-full">
                    <div class="p-4 flex-grow">
                        <h2 class="text-base md:text-lg font-heading font-bold text-white truncate">
                            {{ strip_tags($post->title) }}
                        </h2>
                        <p class="text-sm font-body text-gray-300 mt-2 truncate">
                            {{ Str::limit(strip_tags($post->content), 100) }}
                        </p>
                    </div>
                    <div class="pt-2 border-t border-gray-600">
                        <p class="text-xs text-gray-400 text-left flex-1 ml-1 align-middle">
                            <sup>Author: {{ $post->author->name ?? 'Not Available' }}</sup>
                            <sup>{{ \Carbon\Carbon::parse($post->created_at)->format('F j, Y, g:i A') }}</sup>
                        </p>
                    </div>
                </div>
            </a>
            @endforeach
        </div>
    </div>
</div>