<?php

namespace App\Http\Livewire\Loan;

use App\Models\Loan;
use Livewire\Component;
use Livewire\WithPagination;

class CompletedLoans extends Component
{
    use WithPagination;

    protected $paginationTheme = 'bootstrap';

    public $search, $loan_id;

    public function activateModal(int $loan_id)
    {
        $this->loan_id = $loan_id;
        $this->dispatchBrowserEvent('activate-modal');
    }

    public function activateLoan()
    {
        $inactiveLoan = Loan::find($this->loan_id)->update([
            'status' => 'active',
        ]);

        $this->dispatchBrowserEvent('respond', [
            'title' => 'Loan activated successfully!',
            'icon' => 'success',
        ]);
    }

    public function render()
    {
        $search = '%' . $this->search . '%';

        $loans = Loan::where('id', 'like', $search)->where('status', 'completed')->with('customer')->orderBy('created_at', 'desc')->paginate(5);
        return view('livewire.loan.completed-loans', ['loans' => $loans])->layout('layouts.main');
    }
}
