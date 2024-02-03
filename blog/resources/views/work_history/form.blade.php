<x-app-layout>
@include('partials.form', ['entity_type' => 'work_history', 'entity' => $work_history ?? null, 'entity_name' => 'Work History'])
</x-app-layout>