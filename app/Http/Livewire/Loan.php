<?php

namespace App\Http\Livewire;

use Livewire\Component;

class Loan extends Component
{
    public function render()
    {
        return view('livewire.loan')->layout('layouts.main');
    }
}
