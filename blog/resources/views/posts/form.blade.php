<x-app-layout>
@include('partials.form', ['entity_type' => 'posts', 'entity' => $post ?? null, 'entity_name' => 'Blog'])
</x-app-layout>