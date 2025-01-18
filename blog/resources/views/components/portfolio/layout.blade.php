<x-app-layout>
    <div class="container-fluid mx-auto py-6">
        <!-- Profile Section -->
        <div class="text-center max-w-4xl mx-auto p-4">
            <!-- Photo -->
            <x-portfolio.photo :entity="$entity->portfolio->data->first()" />
            <!-- About Me -->
            <div data-aos="fade-up" data-aos-anchor-placement="top-center">
                <x-portfolio.about :entity="$entity->portfolio->data" />
            </div>
            <!-- Work History -->
            <div data-aos="fade-up" data-aos-anchor-placement="top-center">
                <x-portfolio.work-histories :entity="$entity->workHistories->data" />
            </div>
            <!-- Projects -->
            <div data-aos="fade-up" data-aos-anchor-placement="top-center">
                <x-portfolio.projects :entity="$entity->projects->data" />
            </div>
            <!-- Socials -->
            <div data-aos="fade-up" data-aos-anchor-placement="top-center">
                <x-portfolio.socials :entity="$entity->socials->data" />
            </div>
            <!-- Skills -->
            <div>
                <x-portfolio.skills :entity="$entity->skills->data" />
            </div>
            <!-- Footer -->
            <x-portfolio.footer :entity="$entity->portfolio->data" />
</x-app-layout>