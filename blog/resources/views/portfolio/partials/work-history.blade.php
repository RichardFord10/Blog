<section>
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
</section>