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

    // public function activateModal(int $loan_id)
    // {
    //     $this->loan_id = $loan_id;
    //     $this->dispatchBrowserEvent('activate-modal');
    // }

    // public function activateLoan()
    // {
    //     $inactiveLoan = Loan::find($this->loan_id)->update([
    //         'status' => 'active',
    //     ]);

    //     $this->dispatchBrowserEvent('respond', [
    //         'title' => 'Loan activated successfully!',
    //         'icon' => 'success',
    //     ]);
    // }

    public function render()
    {
        $search = '%' . $this->search . '%';

        $withdrawals = WithdrawalReceipt::where('id', 'like', $search)->orWhere('created_at', 'like', $search)->with('user')->with('loan')->orderBy('created_at', 'desc')->paginate(5);
        return view('livewire.receipt.withdrawal', ['withdrawals' => $withdrawals])->layout('layouts.main');
    }
}

