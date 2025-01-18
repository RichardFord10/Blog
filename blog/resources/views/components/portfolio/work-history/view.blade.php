<x-portfolio.return />
<div class="mt-10 px-4">
    <h3 class="text-xl font-bold text-gray-800 dark:text-white mb-4 text-center">
        {{ $entity->title }} at {{ $entity->company }}
    </h3>
    @isset($entity)
    <div class="max-w-2xl mx-auto" data-aos="fade-up" data-aos-anchor-placement="top-center">
        <!-- Card -->
        <div class="dark:bg-gray-800 rounded-xl shadow-lg overflow-hidden mb-6 transition-shadow duration-300 hover:shadow-xl">
            <!-- Centered image with limited width -->
            <div class="flex justify-center">
                <img class="object-cover mt-8 rounded-lg" src="{{ asset('storage/' . $entity->image) }}" alt="Work Image" style="max-width: 600px; max-height: 400px;">
            </div>
            <!-- Content -->
            <div class="p-6">
                <div class="flex flex-col">
                    <p class="text-lg text-gray-600 dark:text-gray-300 mt-2">{!! $entity->description !!}</p>
                </div>
                <div class="pt-4 mt-4 border-t border-gray-200 dark:border-gray-600 flex justify-center items-center">
                    <p class="text-xs text-gray-500 dark:text-gray-400">
                        <b>{{ $entity->start_date }} - {{ $entity->end_date ?? 'Current' }}</b>
                    </p>
                </div>
            </div>
        </div>
    </div>
    @endisset
</div>