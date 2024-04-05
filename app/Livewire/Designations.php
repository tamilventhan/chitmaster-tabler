<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Designation;
use Livewire\WithPagination;

class Designations extends Component
{

    use WithPagination;
    
    public $sortField = 'id'; // Default sorting field
    public $sortAsc = true; // Default sorting direction
    public $entries = 12;

    
    public function sortBy($field)
    {
        if ($this->sortField === $field) {
            $this->sortAsc = !$this->sortAsc;
        } else {
            $this->sortAsc = true;
        }

        $this->sortField = $field;
    }

    public function render()
    {
        $designations = Designation::orderBy($this->sortField, $this->sortAsc ? 'asc' : 'desc')->latest()->paginate($this->entries);

        return view('livewire.designations.index',compact('designations'))->layout('tablar::page');
    }
}
