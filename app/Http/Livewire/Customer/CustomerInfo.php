<?php

namespace App\Http\Livewire\Customer;

use Livewire\Component;
use App\Models\Customer;
use App\Models\Loan;
use Illuminate\Http\Request;

class CustomerInfo extends Component
{   
    public $customer, $s;

    public function mount($s)
    {
        $this->s = $s;
    }
    public function render()
    {   
        $customer = Customer::where('id', $this->s)->with('address')->first();
        $loan = Loan::where('cust_id', $this->s)->where('status','active')->get();
        return view('livewire.customer.customer-info', ['cust' => $customer,'loan' => $loan])->layout('layouts.info');
    }
}