<x-app-layout>
    <div x-data="{ 
            tab: 'posts', 
            getAddRoute() { 
                return (this.tab === 'posts') ? '{{ route('posts.create') }}' 
                    : (this.tab === 'workHistory') ? '{{ route('work_history.create') }}' 
                    : (this.tab === 'socials') ? '{{ route('socials.create') }}'
                    : (this.tab === 'about') ? '{{ route('portfolio.create') }}'
                    : '{{ route('projects.create') }}'; 
            } 
        }" class="container-fluid">
        <div class="flex justify-center w-full items-center py-2 bg-white dark:bg-gray-800">
            <div class="w-full py-2 flex flex-col items-center">
                <!-- Greeting (aligned left) -->
                <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                    Hello, {{ explode(' ', Auth::user()->name)[0] }}! 👋
                </h2>
                <!-- Buttons (centered) -->
                <div class="flex space-x-2 mt-2 container-fluid">
                <button @click="tab = 'about'" :class="{ 'bg-blue-700': tab === 'about' }"
                        class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">About</button>
                    <button @click="tab = 'posts'" :class="{ 'bg-blue-700': tab === 'posts' }"
                        class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Posts</button>
                    <button @click="tab = 'workHistory'" :class="{ 'bg-blue-700': tab === 'workHistory' }"
                        class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Work
                        History</button>
                    <button @click="tab = 'projects'" :class="{ 'bg-blue-700': tab === 'projects' }"
                        class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Projects</button>
                    <button @click="tab = 'socials'" :class="{ 'bg-blue-700': tab === 'socials' }"
                        class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Socials</button>
                    <a :href="getAddRoute()"
                        class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline text-center">Add</a>
                </div>
            </div>
        </div>
        <!-- Tab Content -->
        <div class="container mx-auto py-4">
            <!-- Posts Section -->
            <div x-show="tab === 'posts'">
                <div class="py-2">
                    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                        @foreach ($posts as $post)
                        <a href="{{ route('posts.show', $post->slug) }}" class="flex-grow">
                            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg mb-6">
                                <div class="flex justify-center">
                                    <h3
                                        class="text-xl font-bold p-2 text-gray-800 dark:text-gray-200 border-b border-gray-300 dark:border-gray-700 pb-4 mb-1">
                                        {{ strip_tags($post->title) }}</h3>
                                </div>
                                <div class="p-4 text-gray-900 dark:text-gray-100 flex justify-between items-center">
                                    <p class="text-sm font-body text-gray-600 dark:text-gray-300 mt-2">
                                        {!! Str::limit(strip_tags($post->content), 100) !!}
                                    <div class="button-group inline flex">
                                        <a href="{{ route('posts.edit', $post->id) }}"
                                            class="inline-block bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                                            <i class="fas fa-pencil-alt"></i> Edit
                                        </a>
                                        &nbsp;
                                        <form action="{{ route('posts.destroy', $post->id) }}" method="POST"
                                            class="inline">
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
                        </a>
                        @endforeach
                    </div>
                </div>
            </div>
            <div x-show="tab === 'workHistory'" x-cloak>
                <!-- Work History Section -->
                <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                    <h3 class="text-xl font-bold text-gray-800 dark:text-white mb-4 text-center">Work History</h3>
                    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4 justify-center">
                        @foreach($work_histories as $work)
                        <div
                            class="bg-white dark:bg-gray-700 rounded-lg shadow overflow-hidden mb-4 flex flex-col h-full">
                            <img class="h-40 w-40 object-cover mt-2 mx-auto" src="{{ asset('storage/' . $work->image) }}"
                                alt="Work History Image">
                            <div class="flex flex-col flex-grow p-4 text-center">
                                <h4 class="font-bold text-lg dark:text-white">{{ $work->title }}</h4>
                                <h4 class="font-bold text-lg dark:text-white mb-2">{{ $work->company }}</h4>
                                <p class="text-sm text-gray-600 dark:text-gray-300 flex-grow">
                                    {{ $work->description }}
                                </p>
                                <div class="flex justify-end px-1 pb-2">
                                    <div class="button-group inline flex">
                                        <a href="{{ route('work_history.edit', $work->id) }}"
                                            class="inline-block bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                                            <i class="fas fa-pencil-alt"></i> Edit
                                        </a>
                                        &nbsp;
                                        <form action="{{ route('work_history.destroy', $work->id) }}" method="POST"
                                            class="inline">
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
                                    {{ $work->start_date }} - {{ $work->end_date ?? 'Present' }}
                                </p>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>

            <!-- Projects Tab Content -->
            <div x-show="tab === 'projects'" x-cloak>
                <!-- Projects Section -->
                <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                    <h3 class="text-xl font-bold text-gray-800 dark:text-white mb-4 text-center">Projects</h3>
                    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4 justify-center">
                        @foreach($projects as $project)
                        <div
                            class="bg-white dark:bg-gray-700 rounded-lg shadow overflow-hidden mb-4 flex flex-col h-full">
                            <img class="h-40 w-40 object-cover mt-2 mx-auto" src="{{ asset('storage/' . $project->image) }}"
                                alt="Project Image">
                            <div class="flex flex-col flex-grow p-4 text-center">
                                <h4 class="font-bold text-lg dark:text-white">{{ $project->title }}</h4>
                                <p class="text-sm text-gray-600 dark:text-gray-300 flex-grow">
                                    {{ $project->description }}</p>
                                <div class="flex justify-end px-1 pb-2">
                                    <div class="button-group inline flex">
                                        <a href="{{ route('projects.edit', $project->id) }}"
                                            class="inline-block bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                                            <i class="fas fa-pencil-alt"></i> Edit
                                        </a>
                                        &nbsp;
                                        <form action="{{ route('projects.destroy', $project->id) }}" method="POST"
                                            class="inline">
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
                                    {{ $project->created_at }}
                                </p>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
            <!-- Projects Tab Content -->
            <div x-show="tab === 'socials'" x-cloak>
                <!-- Projects Section -->
                <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                    <h3 class="text-xl font-bold text-gray-800 dark:text-white mb-4 text-center">Socials</h3>
                    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4 justify-center">
                        @foreach($socials as $social)
                        <div
                            class="bg-white dark:bg-gray-700 rounded-lg shadow overflow-hidden mb-4 flex flex-col h-full">
                            <img class="h-40 w-40 object-cover mt-2 mx-auto" src="{{ asset('storage/' . $social->image) }}"
                                alt="Project Image">
                            <div class="flex flex-col flex-grow p-4 text-center">
                                <h4 class="font-bold text-lg dark:text-white">{{ $social->title }}</h4>
                                <p class="text-sm text-gray-600 dark:text-gray-300 flex-grow">
                                    {{ $social->description }}</p>
                                <div class="flex justify-end px-1 pb-2">
                                    <div class="button-group inline flex">
                                        <a href="{{ route('socials.edit', $social->id) }}"
                                            class="inline-block bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                                            <i class="fas fa-pencil-alt"></i> Edit
                                        </a>
                                        &nbsp;
                                        <form action="{{ route('socials.destroy', $social->id) }}" method="POST"
                                            class="inline">
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
                                    {{ $social->created_at }}
                                </p>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
            <div x-show="tab === 'about'" x-cloak>
                <!-- About Section -->
                <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                    <h3 class="text-xl font-bold text-gray-800 dark:text-white mb-4 text-center">About</h3>
                    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4 justify-center">
                        @foreach($abouts as $info)
                        <div
                            class="bg-white dark:bg-gray-700 rounded-lg shadow overflow-hidden mb-4 flex flex-col h-full">
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
                                        <form action="{{ route('portfolio.destroy', $info->id) }}" method="POST"
                                            class="inline">
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
    </div>
</x-app-layout>