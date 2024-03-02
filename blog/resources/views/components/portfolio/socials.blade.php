<div class="mt-10 px-4">
    <h3 class="text-xl font-bold text-gray-800 dark:text-white mb-4 text-center">Socials</h3>
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 justify-center">
        @isset($entity)
        @foreach($entity as $social)
        <div data-aos="fade-up" data-aos-anchor-placement="top-center"
            class="bg-white dark:bg-gray-800 rounded-xl shadow-lg overflow-hidden mb-6 p-6 transition-shadow duration-300 hover:shadow-xl">
            <a target="_blank" href="{{ $social->link }}" class="block hover:underline hover:text-blue-500">
                <img class="h-45 w-full object-cover rounded-t-lg mt-2 mx-auto" src="{{ asset('storage/' . $social->image) }}"
                    alt="Social Image">
                <h4 class="font-bold text-lg dark:text-white mt-4">
                    {{ $social->title }}
                </h4>
                <p class="text-sm text-gray-600 dark:text-gray-300 mt-2">{!! $social->description !!}</p>
                <div class="pt-4 mt-4 border-t border-gray-200 dark:border-gray-600">
                    <p class="text-xs text-gray-500 dark:text-gray-400 text-right flex-1">
                        <!-- date here -->
                    </p>
                </div>
            </a>
        </div>
        @endforeach
        @endisset
    </div>
</div>
