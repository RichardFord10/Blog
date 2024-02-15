<div class="bg-gray-900 p-4 rounded-lg shadow-lg overflow-hidden relative">
    <div class="grid grid-cols-1 md:grid-cols-5 gap-4 mb-4">
        <input wire:model.defer="date" type="date" class="text-black px-4 py-2 rounded" placeholder="Date">
        <input wire:model.defer="description" type="text" class="text-black px-4 py-2 rounded" placeholder="Description">
        <input wire:model.defer="category" type="text" class="text-black px-4 py-2 rounded" placeholder="Category">
        <input wire:model.defer="amount" type="number" class="text-black px-4 py-2 rounded" placeholder="Amount">
        <select wire:model.defer="type" class="text-black px-4 py-2 rounded">
            <option value="">Select Type</option>
            <option value="income">Income</option>
            <option value="expense">Expense</option>
        </select>
        <button wire:click="addRecord" class="col-span-1 md:col-span-5 bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
            Add Record
        </button>
    </div>
    <div class="overflow-x-auto">
        <table class="min-w-full bg-gray-800 text-white rounded-lg">
            <thead>
                <tr>
                    <th class="px-6 py-3 text-left text-sm font-semibold text-gray-200 uppercase tracking-wider">Date</th>
                    <th class="px-6 py-3 text-left text-sm font-semibold text-gray-200 uppercase tracking-wider">Description</th>
                    <th class="px-6 py-3 text-left text-sm font-semibold text-gray-200 uppercase tracking-wider">Category</th>
                    <th class="px-6 py-3 text-left text-sm font-semibold text-gray-200 uppercase tracking-wider">Amount</th>
                    <th class="px-6 py-3 text-left text-sm font-semibold text-gray-200 uppercase tracking-wider">Type</th>
                </tr>
            </thead>
            <tbody class="bg-gray-700 divide-y divide-gray-600">
                @foreach ($records as $record)
                <tr>
                    <td class="px-6 py-4 whitespace-nowrap">{{ \Carbon\Carbon::parse($record->date)->format('m-d-y') }}</td>
                    <td class="px-6 py-4 whitespace-nowrap">{{ $record->description }}</td>
                    <td class="px-6 py-4 whitespace-nowrap">{{ $record->category }}</td>
                    <td class="px-6 py-4 whitespace-nowrap">${{ $record->amount }}</td>
                    <td class="px-6 py-4 whitespace-nowrap">{{ ucfirst($record->type) }}</td>
                    <td class="px-6 py-4 whitespace-nowrap text-right">
                    <button wire:click="deleteRecord({{ $record->id }})" class="text-red-500 hover:text-red-700">
                        <i class="fa fa-trash"></i>
                    </button>
                    </td>
                </tr>
                @endforeach
            </tbody>
            <tfoot class="bg-gray-900">
                <tr class="">
                    <td colspan="6" class="text-center px-6 py-4">
                        <span class="font-semibold">Total Amount:</span> {{ $totalAmount }}
                    </td>
                </tr>
            </tfoot>
        </table>
    </div>
</div>
