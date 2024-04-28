<x-app-layout>
    <x-dashboard.x-data />
    <div class="flex justify-center w-full items-center py-2 dark:bg-gray-800">
        <!-- Dashboard Navigation -->
        <div class="w-full py-2 flex flex-col items-center">
            <!-- Greeting  -->
            <x-dashboard.greeting />
            <!-- Buttons  -->
            <x-dashboard.buttons />
        </div>
    </div>
    <!-- Tab Content -->
    <div class="container mx-auto py-4">
        <!-- About -->
        <x-dashboard.about :entity="$entity->portfolio->data" />
        <!-- Blogs -->
        <x-dashboard.blogs :entity="$entity->posts->data" />
        <!-- Work History -->
        <x-dashboard.work-history :entity="$entity->workHistories->data" />
        <!-- Projects -->
        <x-dashboard.projects :entity="$entity->projects->data" />
        <!-- Socials -->
        <x-dashboard.socials :entity="$entity->socials->data" />
        <!-- Skills -->
        <x-dashboard.skills :entity="$entity->skills->data" />
    </div>
</x-app-layout>