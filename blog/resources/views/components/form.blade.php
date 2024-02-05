<div>
    <div class="container mx-auto py-6">
        <x-dashboard.return/>
        <div class="max-w-lg mx-auto">
            <!-- Heading -->
            <x-heading :entity="$entity"/>
            <div class="bg-white dark:bg-gray-700 rounded-lg shadow overflow-hidden p-4">
                <form method="POST" enctype="multipart/form-data"
                    action="{{ isset($entity) ? route($entityType.'.update', $entity->id) : route($entityType.'.store') }}">
                    @csrf
                    @if(isset($entity))
                    @method('PUT')
                    @endif
                    <!-- Title -->
                    <x-title :entity="$entity"/>
                    <!-- WYSIWYG -->
                    <x-wysiwyg :entity="$entity"
                                :entity-type="$entityType"/>
                    <!-- Company -->
                    @if($entityType == 'work_history')
                        <x-company :entity="$entity"/>
                    @endif
                    <!-- Link -->
                    @if($entityType == 'projects' || $entityType == 'socials')
                        <x-link :entity="$entity"/>
                    @endif
                    <!-- Start Date -->
                    @if($entityType == 'work_history')
                        <x-start-date :entity="$entity"/>
                    <!-- End Date -->
                        <x-end-date :entity="$entity"/>
                    @endif
                    <!-- Image -->
                    @if($entityType != 'posts')
                        <x-image :entity="$entity"/>
                    @endif
                    <!-- Submit Button -->
                    <x-submit :entity="$entity"/>
                </form>
            </div>
        </div>
    </div>
</div>