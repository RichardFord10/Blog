<div>
    <div class="container mx-auto p-8 max-w-4xl">
        <div class="py-4 text-center">{!! $entity->title !!}</div>
        <div class="dark:bg-gray-700 rounded-lg shadow overflow-hidden mx-2">
            <div class="p-4">
                <article class="prose dark:prose-invert mx-auto items-center">
                    {!! $entity->content !!}
                </article>
                <div class="mt-4 text-gray-600 dark:text-gray-300">
                    <div class="pt-7 mt-4 border-t border-gray-200 dark:border-gray-600">
                        <p class="text-xs text-center text-gray-500 dark:text-gray-400">
                            <sup>Author: {{ Auth::user()->name ?? 'Not Available' }}</sup>
                        </p>
                    </div>
                </div>
            </div>
        </div>
        <form class="flex justify-center" method="POST" action="{{ route('posts.confirm') }}">
            @csrf
            <button type="submit" class="bg-blue-500 hover:bg-blue-700 mt-4 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
                Confirm Post
            </button>
        </form>
    </div>
</div>