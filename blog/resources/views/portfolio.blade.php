<x-app-layout>
    <div class="container-fluid mx-auto py-6">

        <!-- Profile Section -->
        <div class="text-center">
            <!-- Photo -->
            <div class="inline-block">
                <div class="h-48 w-48 rounded-full overflow-hidden shadow-sm mx-auto">
                    <img src="{{ asset('images/profile2.jpg') }}" alt="Profile Image"
                        class="w-full h-full object-cover object-center">
                </div>
            </div>

            <!-- About Me Text -->
            <div class="mt-4 px-6">
                <h2 class="text-2xl font-bold text-gray-800 dark:text-white mb-4">👋 Hello,</h2>
                <h3 class="text-xl md:text-2xl font-bold text-gray-800 dark:text-white mb-4">I'm Richard Ford</h3>
                <p class="text-gray-600 dark:text-gray-300 text-sm md:text-base leading-relaxed">
                    I'm a web developer with roots in digital marketing. I offer a distinctive mix of coding prowess and
                    strategic marketing insight.
                    <br><br>
                    Skilled in full-stack development, I operate fluently through PHP, Python, JavaScript, Bash, along
                    with databases like Postgresql and Mysql, with expertise in frameworks such as Codeigniter, Laravel,
                    and Drupal.
                    <br><br>
                    My journey began in a warehouse as an order picker, where I cultivated my passion for finding more
                    elegant
                    solutions to problems. This eventually led me to learn programming, opening my way into the
                    tech world. Today, I leverage my skills at Bucknell University creating web solutions that
                    prioritize user experience.
                    Reach out to let me know how I can help you reach your technical goals!
                </p>
            </div>
        </div>
        <!-- Work History Section -->
        <div class="mt-10 px-4">
            <h3 class="text-xl font-bold text-gray-800 dark:text-white mb-4 text-center">Work History</h3>
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4 justify-center">
                <!-- Work History Tiles -->
                @foreach(\App\Models\WorkHistory::all() as $work)
                <div class="bg-white dark:bg-gray-700 rounded-lg shadow overflow-hidden mb-4 flex flex-col h-full">
                    <!-- Image Section -->
                    <img class="h-40 w-40 object-cover mt-2 mx-auto" src="{{ asset('storage/' . $work->image) }}"
                        alt="Work History Image">
                    <!-- Content Section -->
                    <div class="flex flex-col flex-grow p-4 text-center">
                        <h4 class="font-bold text-lg dark:text-white">{{ $work->title }}</h4>
                         <h4 class="font-bold text-lg dark:text-white mb-2">{{ $work->company }}</h4>
                        <p class="text-sm text-gray-600 dark:text-gray-300 flex-grow">{{ $work->description }}</p>
                    </div>
                    <!-- Footer Section -->
                    <div class="border-t border-gray-200 dark:border-gray-600 px-4 py-2">
                        <p class="text-xs text-gray-500 dark:text-gray-400 text-right">
                            {{ $work->start_date }} - {{ $work->end_date ?? 'Present' }}
                        </p>
                    </div>
                </div>
                @endforeach
            </div>
        </div>


        <!-- Projects Section -->
        <div class="mt-10 px-4">
            <h3 class="text-xl font-bold text-gray-800 dark:text-white mb-4 text-center">Projects</h3>
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4 justify-center">
                @foreach(\App\Models\Projects::all() as $project)
                <div class="bg-white dark:bg-gray-700 rounded-lg shadow overflow-hidden mb-4 p-4">
                <img class="h-40 w-40 object-cover mt-2 mx-auto" src="{{ asset('storage/' . $project->image) }}"
                                alt="Project Image">
                    <a target="_blank" href="{{ $project->link }}" class="block hover:underline">
                        <h4 class="font-bold text-lg dark:text-white">
                            {{ $project->title }}
                        </h4>
                    </a>
                    <p class="text-sm text-gray-600 dark:text-gray-300">{{ $project->description }}</p>
                    <!-- Footer section for author and time -->
                    <div class="pt-4 mt-4 border-t border-gray-200 dark:border-gray-600">
                        <p class="text-xs text-gray-500 dark:text-gray-400 text-right flex-1">
                            {{ $project->created_at->format('F j, Y') }}
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