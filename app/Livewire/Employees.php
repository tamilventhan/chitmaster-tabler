<?php

namespace App\Livewire;

use App\Models\User;
use Livewire\Component;
use Livewire\WithPagination;

class Employees extends Component
{
    use WithPagination;
    
    public function render()
    {

        $employees =User::paginate(12);
        
        return view('livewire.employees.index',compact('employees'))->layout('tablar::page');
    }
}
