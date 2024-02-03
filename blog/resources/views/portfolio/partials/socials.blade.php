<section>
    <div class="mt-10 px-4">
        <h3 class="text-xl font-bold text-gray-800 dark:text-white mb-4 text-center">Socials</h3>
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4 justify-center">
            @isset($socials)
            @foreach($socials as $social)
            <div data-aos="fade-up" data-aos-anchor-placement="top-center"
                class="bg-white dark:bg-gray-700 rounded-lg shadow overflow-hidden mb-4 p-4">
                <a target="_blank" href="{{ $social->link }}" class="block hover:underline">
                    <img class="h-40 w-40 object-cover mt-2 mx-auto" src="{{ asset('storage/' . $social->image) }}"
                        alt="Project Image">
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
</section>