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
        $designations = Designation::orderBy($this->sortField, $this->sortAsc ? 'asc' : 'desc')->latest()->paginate(12);

        return view('livewire.designations',compact('designations'))->layout('tablar::page');
    }
}
