<x-app-layout>
@include('partials.form', ['entity_type' => 'projects', 'entity' => $project ?? null, 'entity_name' => 'Project'])
</x-app-layout>
