<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Imdb; 
use Illuminate\Support\Facades\Log;

class ImdbTable extends Component
{
    use WithPagination; // Use the trait here

    public $sortBy = 'rank';
    public $sortDirection = 'asc';
    public $search = '';
    protected $paginationTheme = 'tailwind';

    public function updateSearch($search)
    {
        $this->search = $search;
        $this->resetPage();
    }

    public function render()
    {
        $searchTerm = '%'.$this->search.'%';
        $imdb = Imdb::query()
        ->where(function ($query) {
            $searchTerm = '%'.$this->search.'%';
            $query->where('title', 'like', $searchTerm)
                  ->orWhere('genre', 'like', $searchTerm)
                  ->orWhere('year', 'like', $this->search);
        })
        ->orderBy($this->sortBy, $this->sortDirection)
        ->paginate(10);
        Log::debug($imdb);
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
