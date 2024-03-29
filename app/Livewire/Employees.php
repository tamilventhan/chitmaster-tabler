<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\User;

class Employees extends Component
{
    public function render()
    {

        $employees =User::paginate(12);
        
        return view('livewire.employees',compact('employees'))->layout('tablar::page');
    }
}
