<x-app-layout>
    <div class="container mx-auto py-6">
        @include('components.dashboard-return')
        <div class="max-w-lg mx-auto">
            <!-- Header -->
            @include('socials.partials.header')
            <div class="bg-white dark:bg-gray-700 rounded-lg shadow overflow-hidden p-4">
                <form action="{{ isset($socials) ? route('socials.update', $socials->id) : route('socials.store') }}"
                    method="POST" enctype="multipart/form-data">
                    <!-- Title -->
                    @include('socials.partials.title')
                    <!-- Description -->
                    @include('socials.partials.description')
                    <!-- Link -->
                    @include('socials.partials.link')
                    <!-- Image -->
                    @include('socials.partials.image')
                    <!-- Submit -->
                    @include('socials.partials.submit')
                </form>
            </div>
        </div>
    </div>
</x-app-layout>