<?php

namespace App\Http\Livewire;

use Livewire\Component;

class InactiveLoans extends Component
{
    public function render()
    {
        return view('livewire.inactive-loans')->layout('layouts.main');;
    }
}
