<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Imdb; 
// use Illuminate\Support\Facades\Log;

class ImdbTable extends Component
{
    use WithPagination; 

    public $sortBy = 'rank';
    public $sortDirection = 'asc';
    public $search = '';
    public $paginationTheme = 'tailwind';

    public function updateSearch($search)
    {
        $this->search = $search;

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
        return view('livewire.imdb-table', compact('imdb'));
    }

    public function changeSort($field)
    {
    
        if ($this->sortDirection == 'asc' && $this->sortBy == $field) {
            $this->sortDirection = 'desc';
        } else {
            $this->sortDirection = 'asc';
            $this->sortBy = $field;
        }
    }
}
