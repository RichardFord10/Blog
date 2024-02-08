<div>
    <table class="table-auto w-full">
        <thead>
            <tr>
                <th><button wire:click="changeSort('rank')">Rank</button></th>
                <th><button wire:click="changeSort('title')">Title</button></th>
                <th><button wire:click="changeSort('genre')">Genre</button></th>
                <th><button wire:click="changeSort('year')">Year</button></th>
                <th><button wire:click="changeSort('runtime_minutes')">Runtime</button></th>
                <th><button wire:click="changeSort('rating')">Rating</button></th>
                <!-- Add more sortable headers as needed -->
            </tr>
        </thead>
        <tbody>
            @foreach ($imdb as $movie)
            <tr>
                <td>{{ $movie->rank }}</td>
                <td>{{ $movie->title }}</td>
                <td>{{ $movie->genre }}</td>
                <td>{{ $movie->year }}</td>
                <td>{{ $movie->runtime_minutes }}</td>
                <td>{{ $movie->rating }}</td>
                <!-- Add more data columns as needed -->
            </tr>
            @endforeach
        </tbody>
    </table>
    {{$imdb->links() }}
</div>
