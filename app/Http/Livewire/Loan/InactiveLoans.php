<?php

namespace App\Http\Livewire\Loan;

use App\Models\Interest;
use App\Models\Loan;
use App\Models\WithdrawalReceipt;
use Livewire\Component;
use Carbon\Carbon;
use Livewire\WithPagination;

class InactiveLoans extends Component
{
    use WithPagination;

    protected $paginationTheme = 'bootstrap';

    use WithFileUploads;

    public $search, $loan_type, $amount, $starting_date, $ending_date, $collateral_type, $value, $penalty_rate, $description, $net_amount, $initial_deposit, $collected_amount, $interest_rate, $interest_type, $loan_period;
    public $loan_id, $total, $difference, $contract;

    public $rules = [
        // Loan and collateral values validation
        'amount' => ['required', 'numeric'],
        'loan_type' => ['required', 'string'],
        'starting_date' => ['required', 'date'],
        'ending_date' => ['required', 'date'],
        'collateral_type' => ['required', 'string'],
        'value' => ['required', 'numeric'],
        'penalty_rate' => ['required', 'numeric'],
        'description' => ['required', 'string'],
        'net_amount' => ['required', 'numeric'],
        'initial_deposit' => ['required', 'numeric'],

        'collected_amount' => ['required', 'numeric'],
        'contract' => ['required', 'image'],
        'interest_rate' => ['required', 'numeric'],
        'interest_type' => ['required', 'string'],
    ];

    public function updated($property)
    {
        $this->validateOnly($property);
    }

    public function update()
    {
        if ($this->loan_period < 1) {
            $period = $this->loan_period * 12;

            $current_date = Carbon::now();
            $ending_date = $current_date->addMonths($period);

        } else {
            $period = $this->loan_period;

            $current_date = Carbon::now();
            $ending_date = $current_date->addYears($this->loan_period);
        }

        $currentCollateral = Loan::find($this->loan_id)->coll_id;
        $Collateral = Collateral::find($currentCollateral);
        $loan = Loan::find($this->loan_id);

        // if( $this->loan_type == null && $this->starting_date == null &&  $this->ending_date == null && $this->int_id == null )

        // {    $loan = Loan::find($this->loan_id);

        //     $this->loan_type = $loan->loan_type;
        //     $this->starting_date = $loan->starting_date;
        //     $this->ending_date = $loan->ending_date;
        //     $this->int_id = $loan->int_id;
        // }

        if ($this->collateral_type == null) {
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

        if ($isAvailable == false) {
            // creating new Interest
            Interest::create([
                'interest_rate' => $interest_rate,
                'interest_type' => $interest_type,
            ]);
        }

        $findInterest = Interest::where('interest_rate', $interest_rate)
            ->where('interest_type', $interest_type)
            ->first();

        if ($interest_type == 'simple') {
            $monthly_payment = ($this->amount + ($this->loan_period * $interest_rate * $this->amount)) / ($this->loan_period * 12);
        } else {
            if ($this->loan_period < 1) {
                $pow = pow((1 + ($interest_rate / 12)), $this->loan_period * 12);
                $monthly_payment = ($this->amount * $pow) / ($this->loan_period * 12);
            } else {
                $monthly_payment = ($this->amount * pow((1 + $interest_rate), $this->loan_period)) / ($this->loan_period * 12);
            }
        }

        $Saving = Saving::where('id', $loan->saving_id)->update([
            'insurance_deposit' => $this->amount * 0.1,
            'remaining_balance' => $this->amount,
            'monthly_payment' => $monthly_payment,
            'payed_amount' => 0,
            'repayment_date' => Carbon::now()->addMonths(1),
        ]);

        if ($this->contract == null) {
            $currentLoan = Loan::find($this->loan_id);
            $contract = $currentLoan->contract;
        } else {
            $contract = $this->contract->store('public/contract');
        }

        Loan::where('id', $this->loan_id)->update([
            'amount' => $this->amount,
            'total_debt' => $this->amount,
            'service_charge' => $this->amount * 0.02,
            'loan_type' => $this->loan_type,
            'contract' => $contract,
            'starting_date' => $this->starting_date,
            'ending_date' => $this->ending_date,
            'int_id' => $findInterest->id,
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

        if ($WithdrawalReceipt->count() > 0) {

            $this->dispatchBrowserEvent('respond', [
                'title' => 'Loan has already been withdrawn',
                'icon' => 'error',
                // 'iconColor' => 'green'
            ]);

        } else {

            $this->dispatchBrowserEvent('editLoan-modal');

            $currentLoan = Loan::find($loan_id);
            $customer = Customer::find($currentLoan->cust_id);
            $LoanCollateral = Collateral::find($currentLoan->coll_id);

            if ($currentLoan) {
                $this->loan_id = $currentLoan->id;
                $this->amount = $currentLoan->amount;
                $this->interest_rate = $currentLoan->interest_rate;
                $this->value = $LoanCollateral->value;
                $this->collateral_type = $currentLoan->collateral_type;
                $this->starting_date = $currentLoan->starting_date;
                $this->ending_date = $currentLoan->ending_date;
                $this->description = $LoanCollateral->description;

            } else {
                return redirect()->to('/loans')->with('error', 'loan was not found');
            }
        }
    }

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

        $loans = Loan::where('id', 'like', $search)->where('status', 'inactive')->with('customer')->orderBy('created_at', 'desc')->paginate(5);
        return view('livewire.loan.inactive-loans', ['loans' => $loans])->layout('layouts.main');
    }
}
