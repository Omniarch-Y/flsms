<?php

namespace App\Http\Livewire\Loan;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Loan;
use App\Models\Customer;
use App\Models\Collateral;
use App\Models\Insurance;
use App\Models\Interest;
use App\Models\WithdrawalReceipt;
use App\Models\CollectionReceipt;
use Illuminate\Support\Facades\Redirect;
use Carbon\Carbon;

class View extends Component
{   
    use WithPagination;
    
    protected $paginationTheme = 'bootstrap';

    public $search ,$loan_id, $loan_type ,$amount ,$starting_date ,$ending_date ,$collateral_type ,$value ,$penalty_rate ,$description, $net_amount, $initial_deposit, $collected_amount, $interest_rate, $interest_type;

    public $rules = [
        // Loan and collateral values validation
        'amount' => ['required', 'numeric'],
        'loan_type' => ['required', 'string'],
        'starting_date' => ['required', 'date'],
        'ending_date' => ['required', 'date'],
        'collateral_type' => ['required', 'string'],
        'value' => ['required','numeric'],
        'penalty_rate' => ['required','numeric'],
        'description' => ['required', 'string'],
        'net_amount' => ['required', 'numeric'],
        'initial_deposit' => ['required', 'numeric'],

        'collected_amount' => ['required', 'numeric'],

        'interest_rate' => ['required', 'numeric'],
        'interest_type' => ['required', 'string'],
    ];

    public function updated($property)
    {
        $this->validateOnly($property);
    }

    public function update()
    {   
        $currentCollateral = Loan::find($this->loan_id)->coll_id;
        $Collateral = Collateral::find($currentCollateral);
        $loan = Loan::find($this->loan_id);

        if($this->collateral_type == null){
            $this->collateral_type = $Collateral->collateral_type;
        }

        $collateral = Collateral::where('id', $currentCollateral)->update([
            'collateral_type' => $this->collateral_type,
            'value' => $this->value,
            'description' => $this->description,
            'user_id' => auth()->user()->id,
        ]);

        $interest_rate = $this->interest_rate;
        $interest_type = $this->interest_type;

        $isAvailable = Interest::where('interest_rate', $interest_rate)
                                ->where('interest_type', $interest_type)
                                ->first();

        if($isAvailable == false){
            // creating new Interest
            Interest::create([
                    'interest_rate'=> $interest_rate,
                    'interest_type' => $interest_type,
            ]);
        }

        $findInterest = Interest::where('interest_rate', $interest_rate)
                              ->where('interest_type', $interest_type)
                              ->first();

        $Insurance = Insurance::where('id', $loan->insurance)->create([
            'initial_deposit' => $this->amount * 0.1,
            // 'repayment_date' => $this->repayment_date,
        ]);

        Loan::where('id', $this->loan_id)->update([
            'amount' => $this->amount,
            'total_debt' => $this->amount,
            'service_charge' => $this->amount * 0.02,
            'loan_type' => $this->loan_type,
            'starting_date' => $this->starting_date,
            'ending_date' => $this->ending_date,
            'insu_id' => $Insurance->id,
            'int_id' => $findInterest->id,
            // 'coll_id' => $collateral->id,
        ]);

        $this->dispatchBrowserEvent('respond', [
            'title' => 'Loan updated',
            'icon' => 'success',
            // 'iconColor' => 'green'
        ]);
    }

    public function editLoan(int $loan_id)
    {       
        $WithdrawalReceipt = WithdrawalReceipt::where('loan_id', $loan_id);

        if($WithdrawalReceipt->count() > 0){

            $this->dispatchBrowserEvent('respond', [
                'title' => 'Loan has already been withdrawn',
                'icon' => 'error',
                // 'iconColor' => 'green'
            ]);

        }else{

            $this->dispatchBrowserEvent('editLoan-modal');

            $currentLoan = Loan::find($loan_id);
            $customer = Customer::find($currentLoan->cust_id);
            $LoanCollateral = Collateral::find($currentLoan->coll_id);
    
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
    }

    public function withdraw(int $loan_id)
    {
        $loan = Loan::find($loan_id);
        $insurance = Insurance::find($loan->insu_id);
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
                // 'total_debt' => $loan->amount - $loan->service_charge - $insurance->initial_deposit,
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
        $WithdrawalReceipt = WithdrawalReceipt::where('loan_id', $loan_id);

            if($WithdrawalReceipt->count() <= 0){
                $this->dispatchBrowserEvent('respond', [
                    'title' => 'Loan has not been withdrawn',
                    'icon' => 'error',
                    // 'iconColor' => 'green'
                ]);
            }else{
        
                    $starting_date = Carbon::now();
                    $ending_date = $starting_date->addYears(1);
                dd($ending_date);

                    $loan = Loan::find($loan_id);
                    $insurance = Insurance::find($loan->insu_id);
                    $current = Carbon::now()->format('Y-m-d');

                    $repayment_date = Carbon::parse($insurance->repayment_date);

                    $difference = $repayment_date->diffInDays($current);
                    dd($repayment_date->isPast(), $difference, $current, $insurance->repayment_date, $repayment_date);

                if($repayment_date->isPast() &&  $difference == 0)
                {

                }else if($repayment_date->isPast() &&  $difference >= 0){

                }else{

                }

                $this->loan_id = $loan_id;
                $this->play = "wee";
                $this->dispatchBrowserEvent('collect-modal', [
                    'title' => 'Loan has already been withdrawn',
                    'icon' => 'error',
                // 'iconColor' => 'green'
            ]);
        }   
    }

    public function collectL()
    {   
        $sudo = Carbon::now()->format('Y-m-d');
        // $l = $sudo->format('Y-m-d');
        $in = Carbon::parse($sudo)->format('Y-m-d');
        $loan = Loan::where('id', 1)->get();
        $loans = Loan::where('interest_date', $sudo)->get();
        dd($loan->interest_date);
        $loan = Loan::find($this->loan_id);
        $insurance = Insurance::find($loan->insu_id);
        
        $collection_receipts = CollectionReceipt::create([
            'amount' => $this->collected_amount,
            'loan_id' => $loan->id,
            'insu_id' => $insurance->id,
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

        $loans = Loan::where('id','like', $search)->where('status','active')->with('customer')->orderBy('created_at', 'desc')->paginate(5);
        return view('livewire.loan.view',['loans' => $loans]);
    }
}
