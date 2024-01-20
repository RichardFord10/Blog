<x-app-layout>
    <div class="container mx-auto py-6">
        <div class="max-w-2xl mx-auto">
            <div class="flex justify-center">
                <!-- Create CSV Button with right margin -->
                <a id="create-csv" href="{{ route('csv') }}"
                    class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline mr-2">
                    Create CSV
</a>

                <!-- Upload CSV Button -->
                <a id="" href="{{ route('csv.upload') }}"
                    class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
                    Upload CSV
</a>
            </div>
        </div>
    </div>
</x-app-layout>
