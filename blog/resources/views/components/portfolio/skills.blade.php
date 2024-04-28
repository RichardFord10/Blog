<div class="mt-10 px-4">
    <h3 class="text-xl font-bold text-gray-800 dark:text-white mb-4 text-center">Skills</h3>
    <div class="grid grid-cols-3 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-3 xl:grid-cols-5 gap-2 justify-center">
        @isset($entity)
        @foreach($entity as $skill)
        <div class="mb-2 flex justify-center items-center">
            <a target="_blank" href="{{ $skill->link }}" class="block hover:underline hover:text-blue-500">
                <!-- Adjusting the image size for different screen sizes -->
                <img class="h-50 w-50 object-cover rounded-lg" src="{{ asset('storage/' . $skill->image) }}" alt="Skill Image">
            </a>
        </div>
        @endforeach
        @endisset
    </div>
</div>