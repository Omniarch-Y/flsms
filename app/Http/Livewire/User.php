<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\User as Users;
use App\Models\Customer;
use App\Models\Loan;

class User extends Component
{
    public $allUsers;

    public function render()
    {   
        $allUsers = Users::all()->count();
        $allCustomers = Customer::all()->count();
        $activeLoans = Loan::where('status', 0)->get()->count();
        return view('livewire.user',['users' => $allUsers] ,compact('allUsers','allCustomers','activeLoans'))->layout('layouts.main');
    }
}