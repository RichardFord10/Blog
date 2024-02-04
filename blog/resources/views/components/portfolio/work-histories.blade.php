<div>
    <div class="mt-10 px-4">
        <h3 class="text-xl font-bold text-gray-800 dark:text-white mb-4 text-center">Work History</h3>
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 justify-center">
            @isset($workHistories)
            @foreach($workHistories as $work)
            <div data-aos="fade-up" data-aos-anchor-placement="top-center"
                class="bg-white dark:bg-gray-800 rounded-xl shadow-lg overflow-hidden mb-6 p-6 transition-shadow duration-300 hover:shadow-xl">
                    <img class="h-40 w-full object-cover rounded-t-lg mt-2 mx-auto" src="{{ asset('storage/' . $work->image) }}"
                        alt="Work Image">
                    <h4 class="font-bold text-lg dark:text-white mt-4">
                        {{ $work->title }}
                    </h4>
                    <h5 class="font-bold text-lg dark:text-white">{{ $work->company }}</h5>
                    <p class="text-sm text-gray-600 dark:text-gray-300 mt-2">{{ $work->description }}</p>
                    <div class="pt-4 mt-4 border-t border-gray-200 dark:border-gray-600">
                        <p class="text-xs text-gray-500 dark:text-gray-400 text-right flex-1">
                            <!-- Dynamic date here -->
                        </p>
                    </div>
            </div>
            @endforeach
            @endisset
        </div>
    </div>
</div>