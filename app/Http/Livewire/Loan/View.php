<?php

namespace App\Http\Livewire\Loan;
use Livewire\WithPagination;
use Livewire\Component;
use App\Models\Loan;
use App\Models\Customer;
use App\Models\Collateral;
use App\Models\Insurance;
use App\Models\WithdrawalReceipt;
use App\Models\CollectionReceipt;
use Illuminate\Support\Facades\Redirect;

class View extends Component
{   
    use WithPagination;

    public $search ,$loan_id, $loan_type ,$amount ,$interest_rate ,$starting_date ,$ending_date ,$collateral_type ,$value ,$penalty_rate ,$description, $net_amount, $initial_deposit, $collected_amount;

    protected $PaginationTheme = 'bootstrap';

    public $rules = [
        // Loan and collateral values validation
        'amount' => ['required', 'numeric'],
        'loan_type' => ['required', 'string'],
        'interest_rate' => ['required', 'numeric'],
        'starting_date' => ['required', 'date'],
        'ending_date' => ['required', 'date'],
        'collateral_type' => ['required', 'string'],
        'value' => ['required','numeric'],
        'penalty_rate' => ['required','numeric'],
        'description' => ['required', 'string'],
        'net_amount' => ['required', 'numeric'],
        'initial_deposit' => ['required', 'numeric'],

        'collected_amount' => ['required', 'numeric'],
    ];

    public function updated($property)
    {
        $this->validateOnly($property);
    }

    public function update()
    {   
        $currentCollateral = Loan::find($this->loan_id)->collateral;
        $Collateral = Collateral::find($currentCollateral);
        $loan = Loan::find($this->loan_id);

        if($this->collateral_type == null){
            $this->collateral_type = $Collateral->collateral_type;
        }

        $collateral = Collateral::find($currentCollateral)->update([
            'collateral_type' => $this->collateral_type,
            'value' => $this->value,
            'description' => $this->description,
            'user_id' => auth()->user()->id,
        ]);

        $Insurance = Insurance::where('id', $loan->insurance)->create([
            'initial_deposit' => $this->amount * 0.1,
            // 'repayment_date' => $this->repayment_date,
        ]);

        Loan::where('id', $this->loan_id)->update([
            'amount' => $this->amount,
            'service_charge' => $this->amount * 0.02,
            'loan_type' => $this->loan_type,
            'interest_rate' => $this->interest_rate,
            'starting_date' => $this->starting_date,
            'ending_date' => $this->ending_date,
            'insurance' => $Insurance->id,
            'collateral' => $collateral->id,

        ]);

        $this->dispatchBrowserEvent('respond', [
            'title' => 'Loan updated',
            'icon' => 'success',
            // 'iconColor' => 'green'
        ]);
    }

    public function editLoan(int $loan_id)
    {
        $currentLoan = Loan::find($loan_id);
        $customer = Customer::find($currentLoan->cust_id);
        $LoanCollateral = Collateral::find($currentLoan->collateral);

        if($currentLoan)
        {
            $this->loan_id = $currentLoan->id;
            $this->amount = $currentLoan->amount;
            $this->interest_rate = $currentLoan->interest_rate;
            $this->value = $LoanCollateral->value;
            $this->collateral_type = $currentLoan->collateral_type;
            $this->starting_date = $currentLoan->starting_date;
            $this->ending_date = $currentLoan->ending_date;
            $this->description = $LoanCollateral->description;

        }else{
            return redirect()->to('/loans')->with('error', 'loan was not found');
        }
    }

    public function withdraw(int $loan_id)
    {
        $loan = Loan::find($loan_id);
        $insurance = Insurance::find($loan->insurance);
        $WithdrawalReceipt = WithdrawalReceipt::where('loan_id', $loan_id);

        if($WithdrawalReceipt->count() > 0){
            $this->dispatchBrowserEvent('respond', [
                'title' => 'Loan has already been withdrawn',
                'icon' => 'error',
                // 'iconColor' => 'green'
            ]);
        }else{

            Loan::find($loan_id)->update([
                'net_amount' => $loan->amount - $loan->service_charge - $insurance->initial_deposit,
            ]);

            $withdrawal_receipt = WithdrawalReceipt::create([
                'loan_id' => $loan_id,
                'user_id' => auth()->user()->id,
            ]);
            return redirect(url('withdrawal/'.$withdrawal_receipt->id));
        }   
    }

    public function collect(int $loan_id)
    {
        $this->loan_id = $loan_id;
    }

    public function collectL()
    {   
        $loan = Loan::find($this->loan_id);
        $insurance = Insurance::find($loan->insurance);
        
        $collection_receipts = CollectionReceipt::create([
            'amount' => $this->collected_amount,
            'loan_id' => $loan->id,
            'ins_id' => $insurance->id,
            'user_id' => auth()->user()->id,
        ]);

        Insurance::find($loan->insurance)->update([
            'remaining_balance' => $insurance->remaining_balance + $this->collected_amount,
        ]);

        $this->dispatchBrowserEvent('respond', [
            'title' => 'Loan collected successfully',
            'icon' => 'success',
            // 'iconColor' => 'green'
        ]);

        return redirect(url('collect/'.$collection_receipts->id));
    }

    public function render()
    {   
        $search = '%'.$this->search.'%';

        $loans = Loan::where('id','like', $search)->paginate(5);;
        return view('livewire.loan.view',['loans' => $loans]);
    }
}
