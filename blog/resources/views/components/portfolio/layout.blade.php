<x-app-layout>

    <div class="container-fluid mx-auto py-6">
        <!-- Profile Section -->
        <div class="text-center max-w-4xl mx-auto p-4">
            <!-- Photo -->
            <x-portfolio.photo :entity="$entity->portfolio->data"/>
            <!-- About Me -->
            <x-portfolio.about :entity="$entity->portfolio->data"/>
            <!-- Work History -->
            <x-portfolio.work-histories :entity="$entity->workHistories->data"/>
            <!-- Projects -->
            <x-portfolio.projects :entity="$entity->projects->data"/>
            <!-- Socials -->
            <x-portfolio.socials :entity="$entity->socials->data"/>
        </div>
        <!-- Footer -->
        <x-portfolio.footer :entity="$entity->portfolio->data"/>
    </div>
</x-app-layout>