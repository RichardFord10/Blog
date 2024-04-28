<div>
    <div class="mt-4 px-6 lg:px-20">
        <h2 class="text-2xl font-bold text-gray-800 text-white dark:text-white mb-4" data-aos-once="true" data-aos="fade-up" data-aos-delay="50" data-aos-anchor-placement="top-bottom">👋 Hello</h2>
        <h3 class="text-xl md:text-2xl font-bold text-white text-gray-800 dark:text-white mb-4" data-aos-once="true">I'm
            @isset($entity->first_name)
            {{$entity->first_name}}
            @endisset
            @isset($entity->last_name)
            {{$entity->last_name}}
            @endisset
        </h3>
        <p class="text-gray-600 dark:text-gray-300 text-xl md:text-base ">
            @isset($entity->description)
            {!!$entity->description!!}
            @endisset
        </p>
    </div>
</div>