<x-app-layout>
    <div class="container mx-auto py-6">
        @include('components.dashboard-return')
        <div class="max-w-lg mx-auto">
            <!-- Heading -->
            @include('projects.partials.heading')
            <div class="bg-white dark:bg-gray-700 rounded-lg shadow overflow-hidden p-4">
            <form action="{{ isset($projects) ? route('projects.update', $projects->id) : route('projects.store') }}">
                <!-- Title -->
                @include('projects.partials.title')
                <!--  Description-->
                @include('projects.partials.description')
                <!-- Link -->
                @include('projects.partials.link')
                <!-- Image -->
                @include('projects.partials.image')
                <!-- Submit -->
                @include('projects.partials.submit')
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
