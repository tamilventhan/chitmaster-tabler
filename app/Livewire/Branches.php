<?php

namespace App\Livewire;

use App\Models\Branch;
use Livewire\Component;
use Livewire\WithPagination;

class Branches extends Component
{
    use WithPagination;

    public $sortField = 'id'; // Default sorting field
    public $sortAsc = true; // Default sorting direction
    public $entries = 12;
    
    public function sortBy($field)
    {
        $this->sortField = $field === $this->sortField ? $this->sortField : $field;
        $this->sortAsc = $this->sortField === $field ? !$this->sortAsc : true;
    }

    public function render()
    {

        $branches = Branch::with(['company', 'createdBy', 'updatedBy'])
                    ->orderBy($this->sortField, $this->sortAsc ? 'asc' : 'desc')
                    ->latest()
                    ->paginate($this->entries);

        return view('livewire.branches',compact('branches'))->layout('tablar::page');
    }
}
