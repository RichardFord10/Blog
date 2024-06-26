<div>
    <div class="mt-10 px-4">
        <h3 class="text-xl font-bold text-gray-800 dark:text-white mb-4 text-white text-center">Projects</h3>
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 justify-center">
            @isset($entity)
            @foreach($entity as $project)
            <div data-aos="fade-up" data-aos-anchor-placement="top-center" class="dark:bg-gray-800 rounded-xl shadow-lg overflow-hidden mb-6 p-6 transition-shadow duration-300 hover:shadow-xl">
                <a target="_blank" href="{{ $project->link }}" class="block hover:underline hover:text-blue-500">
                    <img class="h-45 w-full object-cover rounded-lg mt-2 mx-auto" src="{{ asset('storage/' . $project->image) }}" alt="Project Image">
                    <h4 class="font-bold text-lg dark:text-white mt-4">
                        {{ $project->title }}
                    </h4>
                    <p class="text-sm text-white dark:text-gray-300 mt-2">{!! $project->description!!}</p>
                    <div class="pt-4 mt-4 border-t border-gray-200 dark:border-gray-600">
                        <p class="text-xs text-gray-500 dark:text-gray-400 text-right flex-1">
                            <!-- Dynamic date here -->
                        </p>
                    </div>
                </a>
            </div>
            @endforeach
            @endisset
        </div>
    </div>
</div>