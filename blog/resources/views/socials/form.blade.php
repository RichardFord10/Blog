<x-app-layout>
@include('partials.form', ['entity_type' => 'socials', 'entity' => $socials ?? null, 'entity_name' => 'Social'])
</x-app-layout>