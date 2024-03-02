<x-portfolio.return />
<div class="mt-10 px-4">
    <h3 class="text-xl font-bold text-gray-800 dark:text-white mb-4 text-center">{{ $entity->title }} at {{ $entity->company }}</h3>
    @isset($entity)
    <div data-aos="fade-up" data-aos-anchor-placement="top-center" class="bg-white dark:bg-gray-800 rounded-xl shadow-lg overflow-hidden mb-6 transition-shadow duration-300 hover:shadow-xl">
        <!-- Full-width image -->
        <img class="w-full object-cover" src="{{ asset('storage/' . $entity->image) }}" alt="Work Image" style="max-height: 400px;">
        <div class="p-6"> 
            <div class="flex flex-col">
                <p class="text-lg text-gray-600 dark:text-gray-300 mt-2">{!! $entity->description !!}</p>
            </div>
            <div class="pt-4 mt-4 border-t border-gray-200 dark:border-gray-600 flex justify-center items-center">
                <p class="text-xs text-gray-500 dark:text-gray-400 ">
                    <b>{{ $entity->start_date }} - {{ $entity->end_date ?? 'Current' }}</b>
                </p>
            </div>
        </div>
    </div>
    @endisset
</div>
