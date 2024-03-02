
<div>
    <div class="mt-10 px-4">
        <h3 class="text-xl font-bold text-gray-800 dark:text-white mb-4 text-center">Work History</h3>
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 justify-center">
            @isset($entity)
            @foreach($entity as $work)
            <!-- Use flex to create a column layout and make it full height -->
            <a href="{{ route('work-history.show', $work->id) }}">
            <div data-aos="fade-up" data-aos-anchor-placement="top-center" class="flex flex-col h-full bg-white dark:bg-gray-800 rounded-xl shadow-lg overflow-hidden mb-6 p-6 transition-shadow duration-300 hover:shadow-xl">
                <img class="h-45 w-full object-cover rounded-t-lg mt-2 mx-auto" src="{{ asset('storage/' . $work->image) }}" alt="Work Image">
                <div class="flex-1"> <!-- flex-1 will make the inner div grow and fill available space -->
                    <h4 class="font-bold text-lg dark:text-white mt-4">
                        {{ $work->title }}
                    </h4>
                    <h5 class="font-bold text-lg dark:text-white">{{ $work->company }}</h5>
                    <!-- <p class="text-sm text-gray-600 dark:text-gray-300 mt-2">{!! $work->description !!}</p> -->
                </div>
                <!-- Use mt-auto to automatically margin the top and push the footer to the bottom -->
                <div class="pt-4 mt-auto border-t border-gray-200 dark:border-gray-600">
                    <p class="text-xs text-gray-500 dark:text-gray-400 items-center">
                        {{ $work->start_date }} - {{ $work->end_date ?? 'current' }}
                    </p>
                </div>
            </div>
            </a>
            @endforeach
            @endisset
        </div>
    </div>
</div>