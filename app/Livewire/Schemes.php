<?php

namespace App\Livewire;

use App\Models\Scheme;
use Livewire\Component;
use Livewire\WithPagination;

class Schemes extends Component
{
    use WithPagination;

    public $sortField = 'id';
    public $sortAsc = true;
    public $entries = 12;
    
    public function sortBy($field)
    {
        $this->sortField = $field === $this->sortField ? $this->sortField : $field;
        $this->sortAsc = $this->sortField === $field ? !$this->sortAsc : true;
    }
    
    public function render()
    {
        $schemes = Scheme::orderBy($this->sortField, $this->sortAsc ? 'asc' : 'desc')->latest()->paginate($this->entries);

        return view('livewire.schemes.index',compact('schemes'))->layout('tablar::page');
    }
}
