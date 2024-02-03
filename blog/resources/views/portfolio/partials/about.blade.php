<section>
    <div class="mt-4 px-6 lg:px-20">
        <h2 class="text-2xl font-bold text-gray-800 dark:text-white mb-4">👋 Hello,</h2>
        <h3 class="text-xl md:text-2xl font-bold text-gray-800 dark:text-white mb-4">I'm 
            @isset($portfolio->first_name)
                {{$portfolio->first_name}}
            @endisset
            @isset($portfolio->last_name)
                {{$portfolio->last_name}}
            @endisset
        </h3>
        <p class="text-gray-600 dark:text-gray-300 text-sm md:text-base leading-relaxed" data-aos="fade-up"
            data-aos-anchor-placement="top-center">
            @isset($portfolio->about)
            {!!$portfolio->about!!}
            @endisset
        </p>
    </div>
</section>