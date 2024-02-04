<section>
    <div class="container mx-auto py-6">
        <x-dashboard.return/>
        <div class="max-w-lg mx-auto">
            <!-- Heading -->
            @include('partials.heading')
            <div class="bg-white dark:bg-gray-700 rounded-lg shadow overflow-hidden p-4">
                <form method="POST" enctype="multipart/form-data"
                    action="{{ isset($entity) ? route($entity_type.'.update', $entity->id) : route($entity_type.'.store') }}">
                    @csrf
                    @if(isset($entity))
                    @method('PUT')
                    @endif
                    <!-- Title -->
                    @include('partials.title')
                    <!-- WYSIWYG -->
                    @include('partials.wysiwyg')
                    <!-- Company -->
                    @if($entity_type == 'work_history')
                        @include('partials.company')
                    @endif
                    <!-- Link -->
                    @if($entity_type == 'projects' || $entity_type == 'socials')
                        @include('partials.link')
                    @endif
                    <!-- Start Date -->
                    @if($entity_type == 'work_history')
                        @include('partials.start-date')
                    <!-- End Date -->
                        @include('partials.end-date')
                    @endif
                    <!-- Image -->
                    @if($entity_type != 'posts')
                        @include('partials.image')
                    @endif
                    <!-- Submit Button -->
                    @include('partials.submit')
                </form>
            </div>
        </div>
    </div>
</section>
