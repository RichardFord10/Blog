<x-app-layout>
    <div class="container-fluid mx-auto py-6">

        <!-- Profile Section -->
        <div class="text-center max-w-4xl mx-auto p-4">
            <!-- Photo -->
            <div class="inline-block">
                <div class="h-48 w-48 rounded-full overflow-hidden shadow-sm mx-auto">
                @isset($portfolio->image)
                    <img src="{{ asset('storage/' . $portfolio->image) }}" alt="Profile Image"
                        class="w-full h-full object-cover object-center">
                @endisset
                </div>
            </div>

            <!-- About Me Text -->
            <div class="mt-4 px-6 lg:px-20">
                <h2 class="text-2xl font-bold text-gray-800 dark:text-white mb-4">👋 Hello,</h2>
                <h3 class="text-xl md:text-2xl font-bold text-gray-800 dark:text-white mb-4">I'm Richard Ford</h3>
                <p class="text-gray-600 dark:text-gray-300 text-sm md:text-base leading-relaxed" data-aos="fade-up"
                    data-aos-anchor-placement="top-center">
                    @isset($portfolio->about)
                    {!!$portfolio->about!!}
                    @endisset
                </p>
            </div>


            <!-- Work History Section -->
            <div class="mt-10 px-4">
                <h3 class="text-xl font-bold text-gray-800 dark:text-white mb-4 text-center">Work History</h3>
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4 justify-center">
                <!-- Tile -->
                @isset($work_history)
                    @foreach($work_history as $work)
                    <div class="bg-white dark:bg-gray-700 rounded-lg shadow overflow-hidden mb-4 flex flex-col h-full"
                        data-aos="fade-up" data-aos-anchor-placement="top-center">
                        <!-- Image Section -->
                        <img class="h-40 w-40 object-cover mt-2 mx-auto" src="{{ asset('storage/' . $work->image) }}"
                            alt="Work History Image">
                        <!-- Content Section -->
                        <div class="flex flex-col flex-grow p-4 text-center">
                            <h4 class="font-bold text-lg dark:text-white">{{ $work->title }}</h4>
                            <h4 class="font-bold text-lg dark:text-white mb-2">{{ $work->company }}</h4>
                            <p class="text-sm text-gray-600 dark:text-gray-300 flex-grow">{{ $work->description }}
                            </p>
                        </div>
                        <!-- Footer Section -->
                        <div class="border-t border-gray-200 dark:border-gray-600 px-4 py-2">
                            <p class="text-xs text-gray-500 dark:text-gray-400 text-right">
                                {{ $work->start_date }} - {{ $work->end_date ?? 'Present' }}
                            </p>
                        </div>
                    </div>
                    @endforeach
                @endisset
                </div>
            </div>

            <!-- Projects Section -->
            <div class="mt-10 px-4">
                <h3 class="text-xl font-bold text-gray-800 dark:text-white mb-4 text-center">Projects</h3>
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4 justify-center">
                @isset($projects)
                    @foreach($projects as $project)
                    <div data-aos="fade-up" data-aos-anchor-placement="top-center"
                        class="bg-white dark:bg-gray-700 rounded-lg shadow overflow-hidden mb-4 p-4">
                        <a target="_blank" href="{{ $project->link }}" class="block hover:underline">
                            <img class="h-40 w-40 object-cover mt-2 mx-auto"
                                src="{{ asset('storage/' . $project->image) }}" alt="Project Image">
                            <h4 class="font-bold text-lg dark:text-white">
                                {{ $project->title }}
                            </h4>
                            <p class="text-sm text-gray-600 dark:text-gray-300">{{ $project->description }}</p>
                            <div class="pt-4 mt-4 border-t border-gray-200 dark:border-gray-600">
                                <p class="text-xs text-gray-500 dark:text-gray-400 text-right flex-1">
                                    <!-- {{ $project->created_at->format('F j, Y') }} -->
                                </p>
                            </div>
                        </a>
                    </div>
                    @endforeach
                @endisset
                </div>
            </div>
            <!-- Socials Section -->
            <div class="mt-10 px-4">
                <h3 class="text-xl font-bold text-gray-800 dark:text-white mb-4 text-center">Socials</h3>
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4 justify-center">
                @isset($socials)
                    @foreach($socials as $social)
                    <div data-aos="fade-up" data-aos-anchor-placement="top-center"
                        class="bg-white dark:bg-gray-700 rounded-lg shadow overflow-hidden mb-4 p-4">
                        <a target="_blank" href="{{ $social->link }}" class="block hover:underline">
                            <img class="h-40 w-40 object-cover mt-2 mx-auto"
                                src="{{ asset('storage/' . $social->image) }}" alt="Project Image">
                            <h4 class="font-bold text-lg dark:text-white">
                                {{ $social->title }}
                            </h4>
                            <p class="text-sm text-gray-600 dark:text-gray-300">{{ $social->description }}</p>
                            <div class="pt-4 mt-4 border-t border-gray-200 dark:border-gray-600">
                                <p class="text-xs text-gray-500 dark:text-gray-400 text-right flex-1">
                                    <!-- {{ $social->created_at->format('F j, Y') }} -->
                                </p>
                            </div>
                        </a>
                    </div>
                    @endforeach
                @endisset
                </div>
            </div>
        </div>
        <footer class="bg-gray-800 text-white text-center p-4 mt-8">
            <div class="container mx-auto">
                <p>&copy; {{ date('Y') }} Richard Ford. All Rights Reserved.</p>
                <p>Made with ❤️</p>
                <p>
                    <a href="mailto:richardford10@gmail.com" class="text-indigo-400 hover:text-indigo-600">Contact</a>
                </p>
            </div>
        </footer>
    </div>
</x-app-layout>