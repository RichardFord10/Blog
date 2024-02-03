<x-app-layout>
    <div class="container mx-auto py-6">
        @include('components.dashboard-return')
        <div class="max-w-lg mx-auto">
            <!-- Heading -->
            @include('work_history.partials.heading')
            <div class="bg-white dark:bg-gray-700 rounded-lg shadow overflow-hidden p-4">
                <form action="{{ route('work_history.store') }}" method="POST" enctype="multipart/form-data">
                    <!-- Title -->
                    @include('work_history.partials.title')
                    <!-- Description -->
                    @include('work_history.partials.description')
                    <!-- Company -->
                    @include('work_history.partials.company')
                    <!-- Start Date -->
                    @include('work_history.partials.start-date')
                    <!-- End Date -->
                    @include('work_history.partials.end-date')
                    <!-- Image -->
                    @include('work_history.partials.image')
                    <!-- Submit Button -->
                    @include('work_history.partials.submit')
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
