<div>
    <div class="container mx-auto p-4 max-w-4xl">
        <a href="{{ route('posts.index') }}" class="inline-flex items-center">
            <i class="fa fa-chevron-left bold" aria-hidden="true"></i>
        </a>
        <div class="flex justify-between items-center">
            <div class="py-4 text-center w-full">
                {!! $entity->title !!}
            </div>
        </div>
        <div class="dark:bg-gray-800 rounded-lg shadow overflow-hidden mx-auto">
            <div class="p-4">
                <p class="font-body text-gray-600 dark:text-gray-300 mt-2">
                <article class="prose dark:prose-invert mx-auto items-center">
                    {!! $entity->content !!}</p>
                </article>
                <!-- Add more post details here -->
                <div class="mt-4 text-gray-600 dark:text-gray-300">
                    <div class="pt-4 mt-4 border-t border-gray-200 dark:border-gray-600">
                        <p class="text-xs text-center text-gray-500 dark:text-gray-400">
                            <sup>Author: {{ $entity->author->name ?? 'Not Available' }}</sup>
                            <sup>{{ \Carbon\Carbon::parse($entity->created_at)->format('F j, Y, g:i A') }}</sup>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>