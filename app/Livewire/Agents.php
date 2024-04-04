<?php

namespace App\Livewire;

use App\Models\Agent;
use Livewire\Component;
use Livewire\WithPagination;

class Agents extends Component
{
    use WithPagination;

    public $sortField = 'id'; // Default sorting field
    public $sortAsc = true; // Default sorting direction
    public $entries = '12';
    
    public function sortBy($field)
    {
        $this->sortField = $field === $this->sortField ? $this->sortField : $field;
        $this->sortAsc = $this->sortField === $field ? !$this->sortAsc : true;
    }
    
    public function render()
    {
        $agents = Agent::orderBy($this->sortField, $this->sortAsc ? 'asc' : 'desc')->latest()->paginate($this->entries);

        return view('livewire.agents',compact('agents'))->layout('tablar::page');
    }
}
