<div>
    <div x-show="tab === 'about'" x-cloak>
        <!-- About Section -->
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4 justify-center">
                @foreach($portfolio as $info)
                <div class="bg-white dark:bg-gray-800 rounded-lg shadow overflow-hidden mb-4 flex flex-col h-full">
                    <div class="inline-block">
                        <div class="text-center">
                            @isset($info->image)
                            <div class="inline-block">
                                <img src="{{ asset('storage/' . $info->image) }}" alt="Profile Image"
                                    class="rounded-full object-cover object-center"
                                    style="max-width: 100px; max-height: 100px;">
                            </div>
                            @endisset
                            <div class="mt-2">
                                <h3 class="text-bold">
                                    @isset($info->first_name)
                                    {{$info->first_name}}
                                    @endisset
                                    @isset($info->last_name)
                                    {{$info->last_name}}
                                    @endisset
                                </h3>
                            </div>
                        </div>

                    </div>
                    <div class="flex flex-col flex-grow p-4 text-center">
                        <p class="text-sm text-gray-600 dark:text-gray-300 flex-grow">
                            {{ $info->about }}</p>
                        <div class="flex justify-end px-1 pb-2">
                            <div class="button-group inline flex">
                                <a href="{{ route('portfolio.edit', $info->id) }}"
                                    class="inline-block bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                                    <i class="fas fa-pencil-alt"></i> Edit
                                </a>
                                &nbsp;
                                <form action="{{ route('portfolio.destroy', $info->id) }}" method="POST" class="inline">
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
                    <div class="border-t border-gray-200 dark:border-gray-600 px-4 py-2">
                        <p class="text-xs text-gray-500 dark:text-gray-400 text-right">
                            {{ $info->created_at }}
                        </p>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</div>