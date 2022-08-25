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

    public function render()
    {
        $search = '%' . $this->search . '%';

        $collections = CollectionReceipt::where('id', 'like', $search)->orWhere('created_at', 'like', $search)->orderBy('created_at', 'desc')->paginate(5);
        return view('livewire.Receipt.collection', ['collections' => $collections])->layout('layouts.main');
    }
}

