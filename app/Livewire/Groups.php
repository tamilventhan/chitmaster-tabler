<?php

namespace App\Livewire;

use App\Models\Group;
use Livewire\Component;
use Livewire\WithPagination;

class Groups extends Component
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
        $groups = Group::orderBy($this->sortField, $this->sortAsc ? 'asc' : 'desc')->latest()->paginate($this->entries);

        return view('livewire.groups.index',compact('groups'))->layout('tablar::page');
    }
}
