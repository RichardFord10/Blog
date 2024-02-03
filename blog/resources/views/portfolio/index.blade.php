<x-app-layout>
    <div class="container-fluid mx-auto py-6">
        <!-- Profile Section -->
        <div class="text-center max-w-4xl mx-auto p-4">
            <!-- Photo -->
            @include('portfolio.partials.photo')
            <!-- About Me -->
            @include('portfolio.partials.about')
            <!-- Work History -->
            @include('portfolio.partials.work-history')
            <!-- Projects -->
            @include('portfolio.partials.projects')
            <!-- Socials -->
            @include('portfolio.partials.socials')
        </div>
        <!-- Footer -->
        @include('portfolio.partials.footer')
    </div>
</x-app-layout>