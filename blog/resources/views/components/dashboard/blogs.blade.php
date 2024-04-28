<div>
    <div x-show="tab === 'posts'">
        <div class="py-2">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                @foreach ($entity as $post)
                <a href="{{ route('posts.show', $post->slug) }}" class="flex-grow">
                    <div class="dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg mb-6">
                        <div class="flex justify-center">
                            <h3 class="text-xl font-bold p-2 text-gray-800 dark:text-gray-200 border-b border-gray-300 dark:border-gray-700 pb-4 mb-1">
                                {{ strip_tags($post->title) }}
                            </h3>
                        </div>
                        <div class="p-4 text-gray-900 dark:text-gray-100 flex justify-between items-center">
                            <p class="text-sm font-body text-gray-600 dark:text-gray-300 mt-2">
                                {!! Str::limit(strip_tags($post->content), 100) !!}
                            <div class="button-group inline flex">
                                <a href="{{ route('posts.edit', $post->id) }}" class="inline-block bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                                    <i class="fas fa-pencil-alt"></i> Edit
                                </a>
                                &nbsp;
                                <form action="{{ route('posts.destroy', $post->id) }}" method="POST" class="inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="inline-block bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded">
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
    </div>
</div>