<div>
    <div class="mt-10 px-4">
        <h3 class="text-xl font-bold text-gray-800 dark:text-white mb-4 text-center">Work History</h3>
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 justify-center">
            <!-- Tile -->
            @isset($workHistories)
            @foreach($workHistories as $work)
            <div class="bg-white dark:bg-gray-800 rounded-xl shadow-lg overflow-hidden mb-6 flex flex-col h-full"
                data-aos="fade-up" data-aos-anchor-placement="top-center">
                <!-- Image Section -->
                <img class="h-40 w-full object-cover rounded-t-lg" src="{{ asset('storage/' . $work->image) }}"
                    alt="Work History Image">
                <!-- Content Section -->
                <div class="flex flex-col flex-grow p-6 space-y-2 text-center">
                    <h4 class="font-bold text-xl dark:text-white">{{ $work->title }}</h4>
                    <h5 class="font-bold text-lg dark:text-white">{{ $work->company }}</h5>
                    <p class="text-sm text-gray-600 dark:text-gray-300 flex-grow leading-relaxed">{{ $work->description }}
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
</div>
