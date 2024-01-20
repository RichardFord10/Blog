<x-app-layout>
    <div class="container-fluid mx-auto py-6">

        <!-- Profile Section -->
        <div class="text-center">
            <!-- Photo -->
            <div class="inline-block">
                <div class="h-48 w-48 rounded-full overflow-hidden shadow-sm mx-auto">
                    <img src="{{ asset('images/profile.jpg') }}" alt="Profile Image" class="w-full h-full object-cover object-center">
                </div>
            </div>

            <!-- About Me Text -->
            <div class="mt-4 px-6">
                <h2 class="text-2xl font-bold text-gray-800 dark:text-white mb-4">Hi 👋 I'm Richard Ford</h2>
                <p class="text-gray-600 dark:text-gray-300">
                    I'm a web developer with a background
                    in digital marketing. I can
                    bring a unique blend of technical expertise and marketing acumen to the table. My proficiency
                    spans
                    across PHP, Python, JavaScript, and full-stack development, with a strong foundation in
                    frameworks
                    like Drupal, Flask, and Node.js. My journey began in a warehouse, where I cultivated my passion
                    for
                    programming and self-taught my way into the tech world. Today, I leverage my skills at Bucknell
                    University, creating user-centric web solutions. Reach out to let me know how I can help you reach
                    your technical goals!
                </p>
            </div>
        </div>

        <!-- Work History Section -->
        <div class="mt-10 px-4">
            <h3 class="text-xl font-bold text-gray-800 dark:text-white mb-4 text-center">Work History</h3>
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4 justify-center">
                <!-- Work History Tiles -->
                <!-- Work History Tile 1
                        <div class="bg-white dark:bg-gray-700 rounded-lg shadow overflow-hidden mb-4 p-4">
                            <h4 class="font-bold text-lg dark:text-white">Web Developer at Bucknell University</h4>
                            <p class="text-sm text-gray-600 dark:text-gray-300">Full-stack development, specializing in
                                Drupal
                                and PHP.</p>
                        </div>
                        Work History Tile 2
                        <div class="bg-white dark:bg-gray-700 rounded-lg shadow overflow-hidden mb-4 p-4">
                            <h4 class="font-bold text-lg dark:text-white">Web Developer at <a href="https://www.linkedin.com/company/best-cigar-prices/jobs/">bestcigarprices.com</a></h4>
                            <p class="text-sm text-gray-600 dark:text-gray-300">LAMP stack development with a focus on
                                e-commerce solutions.</p>
                        </div>
                        Work History Tile 2
                        <div class="bg-white dark:bg-gray-700 rounded-lg shadow overflow-hidden mb-4 p-4">
                            <h4 class="font-bold text-lg dark:text-white">Analyst/Programmer at New Global Marketing</h4>
                            <p class="text-sm text-gray-600 dark:text-gray-300">Working within a marketing team to automate process and email workflows using python.</p>
                        </div> -->
                @foreach(\App\Models\WorkHistory::all() as $work)
                <div class="bg-white dark:bg-gray-700 rounded-lg shadow overflow-hidden mb-4 p-4">
                    <div class="flex flex-col md:flex-row md:items-center">
                        <!-- For smaller screens (mobile) -->

                        <img class="h-40 w-100 object-cover md:hidden" src="{{ asset($work->image) }}" alt="Work History Image">

                        <!-- For larger screens (desktop) -->
                        <img class="hidden md:block h-40 w-48 object-cover" src="{{ asset($work->image) }}" alt="Work History Image">

                        <div class="mt-4 md:mt-0 md:ml-6 block">
                            <h4 class="font-bold text-lg dark:text-white">{{ $work->title }} at {{ $work->company }}
                            </h4>
                            <p class="text-sm text-gray-600 dark:text-gray-300">{{ $work->description }}</p>
                            <sup>{{ $work->start_date }} - {{ $work->end_date ?? 'Present' }}</sup>
                        </div>
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
                <a target="_blank" href="{{ $project->link }}">
                    <div class="bg-white dark:bg-gray-700 rounded-lg shadow overflow-hidden mb-4 p-4">
                        <h4 class="font-bold text-lg dark:text-white">
                            {{ $project->title }}
                        </h4>
                </a>
                <p class="text-sm text-gray-600 dark:text-gray-300">{{ $project->description }}</p>
            </div>
            @endforeach
        </div>
    </div>
    </div>

    </div>
</x-app-layout>