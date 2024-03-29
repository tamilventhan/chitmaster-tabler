<?php

namespace App\Livewire;

use App\Models\Company;
use Livewire\Component;
use Livewire\WithPagination;

class Companies extends Component
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
        $companies = Company::orderBy($this->sortField, $this->sortAsc ? 'asc' : 'desc')->latest()->paginate(12);

        return view('livewire.companies',compact('companies'))->layout('tablar::page');
    }
}
