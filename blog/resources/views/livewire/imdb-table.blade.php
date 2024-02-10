<div class="bg-gray-900 p-4 rounded-lg shadow-lg overflow-hidden relative">
    <div class="mb-4">
        <input wire:input.debounce.500ms="updateSearch($event.target.value)" type="text"
            class="text-black px-4 py-2 rounded" placeholder="Search...">
    </div>
    <div class="overflow-x-auto">
        <table class="min-w-full bg-gray-800 text-white rounded-lg">
            <thead>
                <tr>
                    <th class="px-6 py-3 text-left text-sm font-semibold text-gray-200 uppercase tracking-wider"
                        wire:click="changeSort('rank')">Rank</th>
                    <th class="px-6 py-3 text-left text-sm font-semibold text-gray-200 uppercase tracking-wider"
                        wire:click="changeSort('title')">Title</th>
                    <th class="px-6 py-3 text-left text-sm font-semibold text-gray-200 uppercase tracking-wider"
                        wire:click="changeSort('genre')">Genre</th>
                    <th class="px-6 py-3 text-left text-sm font-semibold text-gray-200 uppercase tracking-wider"
                        wire:click="changeSort('year')">Year</th>
                    <th class="px-6 py-3 text-left text-sm font-semibold text-gray-200 uppercase tracking-wider"
                        wire:click="changeSort('runtime_minutes')">Runtime (Mins)</th>
                    <th class="px-6 py-3 text-left text-sm font-semibold text-gray-200 uppercase tracking-wider"
                        wire:click="changeSort('rating')">Rating</th>
                </tr>
            </thead>
            <tbody class="bg-gray-700 divide-y divide-gray-600">
                @foreach ($imdb as $movie)
                <tr>
                    <td class="px-6 py-4 whitespace-nowrap">{{ $movie->rank }}</td>
                    <td class="px-6 py-4 whitespace-nowrap">{{ $movie->title }}</td>
                    <td class="px-6 py-4 whitespace-nowrap">{{ $movie->genre }}</td>
                    <td class="px-6 py-4 whitespace-nowrap">{{ $movie->year }}</td>
                    <td class="px-6 py-4 whitespace-nowrap">{{ $movie->runtime_minutes }}</td>
                    <td class="px-6 py-4 whitespace-nowrap">{{ $movie->rating }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <div class="mt-4">
        {{ $imdb->links() }}
    </div>
</div>
