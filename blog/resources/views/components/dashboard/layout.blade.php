<x-app-layout>
    <x-dashboard.x-data/>
        <div class="flex justify-center w-full items-center py-2 bg-white dark:bg-gray-800">
            <!-- Dashboard Navigation -->
            <div class="w-full py-2 flex flex-col items-center">
                <!-- Greeting  -->
                <x-dashboard.greeting/>
                    <!-- Buttons  -->
                <x-dashboard.buttons/>
            </div>
        </div>
        <!-- Tab Content -->
        <div class="container mx-auto py-4">
            <!-- About -->
            <x-dashboard.about :portfolio="$portfolio"/>
            <!-- Blogs -->
            <x-dashboard.blogs :posts="$posts"/>
            <!-- Work History -->
            <x-dashboard.work-history :work-histories="$workHistories"/>
            <!-- Projects -->
            <x-dashboard.projects :projects="$projects"/>
            <!-- Socials -->
            <x-dashboard.socials :socials="$socials"/>
        </div>
</x-app-layout>