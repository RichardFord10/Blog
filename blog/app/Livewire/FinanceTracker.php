<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\FinanceTracker as Tracker;

class FinanceTracker extends Component
{
    public $date, $description, $category, $amount, $type;
    public $records; 
    
    public function mount()
    {
        $this->records = Tracker::all(); 
    }

    public function getTotalAmountAttribute()
    {
        return $this->records->sum('amount');
    }

    public function addRecord()
    {
        $this->validate([
            'date' => 'required|date',
            'description' => 'required|string',
            'category' => 'required|string',
            'amount' => 'required|numeric',
            'type' => 'required|in:income,expense'
        ]);

        $amount = $this->type === 'expense' ? -$this->amount : $this->amount;


        Tracker::create([
            'date' => $this->date,
            'description' => $this->description,
            'category' => $this->category,
            'amount' => $amount,
            'type' => $this->type,
        ]);


        $this->reset();

        $this->records = Tracker::all();
    }

    public function deleteRecord($recordId)
    {
        $record = Tracker::find($recordId);
        if ($record) {
            $record->delete();
            session()->flash('message', 'Record deleted successfully.');
        }

        $this->records = Tracker::all();
    }

    public function downloadCsv()
    {
        $fileName = 'finance_records_' . now()->format('YmdHis') . '.csv';

        header('Content-Type: text/csv');
        header('Content-Disposition: attachment; filename="' . $fileName . '"');

        $handle = fopen('php://output', 'w');

        fputcsv($handle, ['Date', 'Description', 'Category', 'Amount', 'Type']);

        foreach ($this->records as $record) {
            fputcsv($handle, [
                $record->date->format('m-d-y'),
                $record->description,
                $record->category,
                $record->amount,
                $record->type,
            ]);
        }

        fclose($handle);

        exit;
    }
    
    public function render()
    {
        return view('livewire.finance-tracker', [
            'records' => $this->records,
            'totalAmount' => $this->getTotalAmountAttribute(), 
        ]);
    }
}
