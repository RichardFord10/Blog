<x-app-layout>
    <div x-data="createCsv" class="container-fluid mx-auto py-6">
        <div class="max-w-2xl mx-auto">
            <!-- CSV Upload Section -->
            <div x-show="showUploadForm" class="flex flex-col items-center mb-6">
                <h2 class="text-xl font-bold text-gray-800 dark:text-gray-200 mb-4">Upload CSV File</h2>
                <form action="{{ route('upload') }}" method="POST" enctype="multipart/form-data" class="text-center">
                    @csrf
                    <input type="file" name="csv_file" id="csv_file" class="hidden" required
                        onchange="this.form.submit()">
                    <label for="csv_file" class="cursor-pointer">
                        <div
                            class="flex flex-col items-center justify-center p-6 border-2 border-dashed rounded-lg hover:bg-gray-100 dark:hover:bg-gray-600 transition">
                            <svg class="text-gray-700 dark:text-gray-200 mb-3" fill="none" stroke="currentColor"
                                viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" width="36" height="36">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M7 8l5-5m0 0l5 5m-5-5v12"></path>
                            </svg>
                            <span class="block text-gray-700 dark:text-gray-200 text-sm font-bold">CSV file</span>
                        </div>

                    </label>
                </form>
            </div>


            <!-- Toggle Button -->
            <div class="flex flex-col items-center justify-center">
                <sup class="text-white mb-2"> - or - </sup>
                <button @click="toggleForms"
                    class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
                    <span x-text="showUploadForm ? 'Create New CSV' : 'Upload CSV'"></span>
                </button>
            </div>
            <!-- Table Creation Form -->
            <div x-show="showTableForm" class="mb-6 py-4" x-cloak>
                <div class="flex justify-center space-x-2 text-black">
                    <input x-ref="rowsInput" x-model="rows" type="number" class="border rounded py-2 px-3" placeholder="Rows (max 20)">
                    <input x-ref="columnsInput" x-model="columns" type="number" class="border rounded py-2 px-3"
                        placeholder="Columns (max 10)">
                </div>
            </div>

            <!-- Generated Table -->
            <div class="container mx-auto flex justify-center py-4 table-container" x-show="table.length" x-cloak>
                <table class="min-w-full table-auto text-center">
                    <thead class="bg-gray-200">
                        <tr>
                            <template x-for="colIndex in parseInt(columns)">
                                <th class="px-4 py-2 text-black" x-text="'Column ' + colIndex" contenteditable="true">
                                </th>
                            </template>
                        </tr>
                    </thead>
                    <tbody>
                        <template x-for="rowIndex in parseInt(rows)">
                            <tr>
                                <template x-for="colIndex in parseInt(columns)">
                                    <td class=" text-white border px-4 py-2" contenteditable="true"
                                        x-text="table[rowIndex-1]?.[colIndex-1] || ''"></td>
                                </template>
                            </tr>
                        </template>
                    </tbody>
                </table>
            </div>
            <div x-show="table.length > 0" class="flex justify-center mt-4" x-cloak>
                <button @click="checkCsvData ? downloadCSV() : adjustTable()"
                    class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline"
                    x-text="checkCsvData ? 'Download CSV' : 'Create'">
                </button>
            </div>
            <!-- CSV Table Section -->
            @if (!empty($data))
            <div class="container mx-auto flex justify-center py-4">
                <table class="min-w-full table-auto text-center">
                    <thead class="bg-gray-200">
                        <tr>
                            @if(!empty($headers))
                            @foreach($headers as $header)
                            <th class="px-4 py-2">{{$header}}</th>
                            @endforeach
                            @endif

                        </tr>
                    </thead>
                    <tbody class="mx-auto">
                        @foreach($data as $row)
                        <tr>
                            @foreach($row as $cell)
                            <td x-on:input="adjustTable()" class="text-black border px-4 py-2" contenteditable='true'>
                                {{ $cell }}</td>
                            @endforeach
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            @endif

            <!-- Download Button -->
            @if (!empty($data))
            <div class="flex justify-center">
                <button id="download"
                    class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
                    Download CSV
                </button>
            </div>
            @endif
        </div>
    </div>
</x-app-layout>
</div>