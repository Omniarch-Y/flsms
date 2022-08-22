<?php

namespace App\Http\Livewire\Receipt;

use App\Models\Loan;
use Livewire\Component;
use Livewire\WithPagination;
use App\Models\CollectionReceipt;
use App\Models\penality;

class Collection extends Component
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

        $collections = CollectionReceipt::where('id', 'like', $search)->orWhere('created_at', 'like', $search)->orderBy('created_at', 'desc')->paginate(5);
        return view('livewire.Receipt.collection', ['collections' => $collections])->layout('layouts.main');
    }
}

