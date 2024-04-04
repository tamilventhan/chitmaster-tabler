<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Subscriber;
use Livewire\WithPagination;

class Subscribers extends Component
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
        $subscribers = Subscriber::orderBy($this->sortField, $this->sortAsc ? 'asc' : 'desc')->latest()->paginate($this->entries);

        return view('livewire.subscribers',compact('subscribers'))->layout('tablar::page');
    }
}
