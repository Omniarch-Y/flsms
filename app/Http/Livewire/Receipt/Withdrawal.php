<?php

namespace App\Http\Livewire\Receipt;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\WithdrawalReceipt;

class Withdrawal extends Component
{
    use WithPagination;

    protected $paginationTheme = 'bootstrap';

    public $search, $loan_id;

    public function render()
    {
        $search = '%' . $this->search . '%';

        $withdrawals = WithdrawalReceipt::where('id', 'like', $search)->orWhere('created_at', 'like', $search)->with('user')->with('loan')->orderBy('created_at', 'desc')->paginate(5);
        return view('livewire.Receipt.withdrawal', ['withdrawals' => $withdrawals])->layout('layouts.main');
    }
}

