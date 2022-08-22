<?php

namespace App\Http\Livewire\Loan;

use Livewire\Component;
// use App\Models\Customer;
use App\Models\Loan;
use Illuminate\Http\Request;

class LoanInfo extends Component
{   
    public $loan;

    public function mount($loan)
    {
        $this->loan = $loan;
    }
    public function render()
    {   
        // $customer = Customer::where('id', $this->loan)->with('address')->first();
        $loan = Loan::where('id', $this->loan)->with('customer')->with('user')->with('collateral')->with('savings')->with('interest')->first();
        // dd($loan);
        return view('livewire.loan.loan-info', ['loa' => $loan])->layout('layouts.info');
    }
}