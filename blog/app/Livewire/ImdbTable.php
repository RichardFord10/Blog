<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Imdb; 
use Illuminate\Support\Facades\Log;

class ImdbTable extends Component
{
    public $sortBy = 'rank';
    public $sortDirection = 'asc';
    protected $paginationTheme = 'tailwind';


    public function mount()
    {
        // Log that the mount method was called
        Log::debug('ImdbTable mount method called.');

        // You can add any additional setup code here
    }

    public function render()
    {
        $imdb = Imdb::orderBy($this->sortBy, $this->sortDirection)->paginate(10);
        return view('livewire.imdb-table', compact('imdb'));
    }

    public function changeSort($field)
    {
        Log::debug("Sorting by field: {$field}");
    
        if ($this->sortDirection == 'asc' && $this->sortBy == $field) {
            $this->sortDirection = 'desc';
        } else {
            $this->sortDirection = 'asc';
            $this->sortBy = $field;
        }
    }
}
