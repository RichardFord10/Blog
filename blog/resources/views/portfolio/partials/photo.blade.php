<section>
    <div class="inline-block">
        <div class="h-48 w-48 rounded-full overflow-hidden shadow-sm mx-auto">
            @isset($portfolio->image)
            <img src="{{ asset('storage/' . $portfolio->image) }}" alt="Profile Image"
                class="w-full h-full object-cover object-center">
            @endisset
        </div>
    </div>
</section>