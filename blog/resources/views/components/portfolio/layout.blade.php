<x-app-layout>
    <div class="container-fluid mx-auto py-6">
        <!-- Profile Section -->
        <div class="text-center max-w-4xl mx-auto p-4">
            <!-- Photo -->
            <x-portfolio.photo :portfolio="$portfolio"/>
            <!-- About Me -->
            <x-portfolio.about :portfolio="$portfolio"/>
            <!-- Work History -->
            <x-portfolio.work-histories :work-histories="$workHistories"/>
            <!-- Projects -->
            <x-portfolio.projects :projects="$projects"/>
            <!-- Socials -->
            <x-portfolio.socials :socials="$socials"/>
        </div>
        <!-- Footer -->
        <x-portfolio.footer :portfolio="$portfolio"/>
    </div>
</x-app-layout>