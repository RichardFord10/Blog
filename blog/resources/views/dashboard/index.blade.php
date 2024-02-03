<x-app-layout>
    <!-- x-data -->
    @include('dashboard.partials.x-data')
        <div class="flex justify-center w-full items-center py-2 bg-white dark:bg-gray-800">
            <!-- Dashboard Navigation -->
            <div class="w-full py-2 flex flex-col items-center">
                <!-- Greeting (aligned left) -->
                @include('dashboard.partials.greeting')
                <!-- Buttons (centered) -->
                @include('dashboard.partials.buttons')
            </div>
        </div>
        <!-- Tab Content -->
        <div class="container mx-auto py-4">
            <!-- About -->
            @include('dashboard.partials.about')
            <!-- Blogs -->
            @include('dashboard.partials.blogs')
            <!-- Work History -->
            @include('dashboard.partials.work-history')
            <!-- Projects -->
            @include('dashboard.partials.projects')
            <!-- Socials -->
            @include('dashboard.partials.socials')
        </div>
    </div>
</x-app-layout>