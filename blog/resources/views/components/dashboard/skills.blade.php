<div>
    <div x-show="tab === 'skills'" x-cloak>
        <!-- Projects Section -->
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4 justify-center">
                @foreach($entity as $skill)
                <div class="dark:bg-gray-800 rounded-lg shadow overflow-hidden mb-4 flex flex-col h-full">
                    <img class="h-40 w-40 object-cover mt-2 mx-auto" src="{{ asset('storage/' . $skill->image) }}" alt="Project Image">
                    <div class="flex flex-col flex-grow p-4 text-center">
                        <h4 class="font-bold text-lg dark:text-white">{{ $skill->title }}</h4>
                        <div class="flex inline-flex justify-center px-1 mt-2 mb-2">
                            <div class="button-group inline-flex text-center">
                                <a href="{{ route('skills.edit', $skill->id) }}" class="inline-block bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                                    <i class="fas fa-pencil-alt"></i> Edit
                                </a>
                                &nbsp;
                                <form action="{{ route('skills.destroy', $skill->id) }}" method="POST" class="inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="inline-block bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded">
                                        <i class="fas fa-trash"></i> Delete
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="border-t border-gray-200 dark:border-gray-600 px-4 py-2">
                        <p class="text-xs text-gray-500 dark:text-gray-400 text-right">
                            {{ $skill->created_at }}
                        </p>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</div>