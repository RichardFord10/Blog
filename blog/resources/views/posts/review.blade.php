<x-app-layout>
    <div class="container mx-auto p-4">
    <div class="py-4">{!! $post->title !!}</div>
        <div class="bg-white dark:bg-gray-700 rounded-lg shadow overflow-hidden">
            <div class="p-4">
                <p class="font-body text-gray-600 dark:text-gray-300 mt-2">{!! $post->content !!}</p>
                <div class="mt-4 text-gray-600 dark:text-gray-300">
                    <span>
                    </span>
                    <div class="pt-4 mt-4 border-t border-gray-200 dark:border-gray-600">
                    <p class="text-xs text-gray-500 dark:text-gray-400">
                        <sup>Author: {{ Auth::user()->name ?? 'Not Available' }}</sup>
                        </p>
                    </div>
                </div>
            </div>
        </div>
        <form class="flex justify-center" method="POST" action="{{ route('posts.confirm') }}">
    @csrf
    <button type="submit" class="bg-blue-500 hover:bg-blue-700 mt-4 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">Confirm Post</button>

</form>
    </div>
</x-app-layout>