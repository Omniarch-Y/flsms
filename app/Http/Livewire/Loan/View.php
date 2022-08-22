<?php

namespace App\Http\Livewire\Loan;

use App\Models\Collateral;
use App\Models\CollectionReceipt;
use App\Models\Customer;
use App\Models\Interest;
use App\Models\Loan;
use App\Models\Penality;
use App\Models\Saving;
use App\Models\WithdrawalReceipt;
use Carbon\Carbon;
use Illuminate\Support\Facades\Redirect;
use Livewire\Component;
use Livewire\WithFileUploads;
use Livewire\WithPagination;

class View extends Component
{
    use WithPagination;

    use WithFileUploads;

    protected $paginationTheme = 'bootstrap';

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
            'remaining_balance' => $this->amount * 0.1,
            'monthly_payment' => $monthly_payment,
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

    public function acceptWithdrawal(int $loan_id)
    {
        $loan = Loan::find($loan_id);
        $WithdrawalReceipt = WithdrawalReceipt::where('loan_id', $loan_id);

        if ($WithdrawalReceipt->count() > 0) {
            $this->dispatchBrowserEvent('respond', [
                'title' => 'Loan has already been withdrawn',
                'icon' => 'error',
                // 'iconColor' => 'green'
            ]);
        } else {
            $this->loan_id = $loan_id;

            $this->dispatchBrowserEvent('withdrawal-modal');
        }
    }

    public function withdraw()
    {
        $loan = Loan::find($this->loan_id);
        $Saving = Saving::find($loan->saving_id);
        $WithdrawalReceipt = WithdrawalReceipt::where('loan_id', $loan->id);

        Loan::find($loan->id)->update([
            'net_amount' => $loan->amount - $loan->service_charge - $Saving->initial_deposit,
        ]);

        $withdrawal_receipt = WithdrawalReceipt::create([
            'loan_id' => $loan->id,
            'user_id' => auth()->user()->id,
        ]);
        return redirect(url('withdrawal/' . $withdrawal_receipt->id));
    }

    public function collect(int $loan_id)
    {
        $loan = Loan::find($loan_id);
        $this->loan_id = $loan->id;
        $WithdrawalReceipt = WithdrawalReceipt::where('loan_id', $loan_id);

        if ($WithdrawalReceipt->count() <= 0) {
            $this->dispatchBrowserEvent('respond', [
                'title' => 'Loan has not been withdrawn',
                'icon' => 'error',
                // 'iconColor' => 'green'
            ]);
        } else {

            $Saving = Saving::find($loan->saving_id);
            $current = Carbon::now()->format('Y-m-d');

            $repayment_date = Carbon::parse($Saving->repayment_date);

            $difference = $repayment_date->diffInDays($current);

            if ($repayment_date->isPast() && $difference >= 0) {

                $this->monthly_payment = $Saving->monthly_payment;
                $penality = (0.05 * $Saving->monthly_payment) * $difference;
                $this->penality = $penality;
                $this->total = $penality + $this->monthly_payment;
                $this->remaining_balance = $Saving->remaining_balance;
                $this->date = Carbon::now()->format('Y-m-d');
                $this->difference = $difference;

            } else {
                $this->monthly_payment = $Saving->monthly_payment;
                $this->penality = 0;
                $this->total = $this->monthly_payment;
                $this->remaining_balance = $Saving->remaining_balance;
                $this->date = Carbon::now()->format('Y-m-d');
            }

            $this->dispatchBrowserEvent('collect-modal');
        }
    }

    public function collectLoan()
    {
        if ($this->collected_amount < $this->total) {
            $this->dispatchBrowserEvent('respond', [
                'title' => 'Input requred amount',
                'icon' => 'error',
                // 'iconColor' => 'green'
            ]);
            $this->dispatchBrowserEvent('collect-modal');
        } else {

            $sudo = Carbon::now()->format('Y-m-d');
            $loan = Loan::find($this->loan_id);

            $saving = Saving::find($loan->saving_id);

            $collection_receipts = CollectionReceipt::create([
                'amount' => $this->collected_amount,
                'loan_id' => $loan->id,
                'saving_id' => $saving->id,
                'user_id' => auth()->user()->id,
            ]);

            $collected_amount = $this->collected_amount - $this->penality;
            $total_payed_amount = $saving->payed_amount + $collected_amount;

            Saving::find($loan->saving_id)->update([
                'payed_amount' => $total_payed_amount,
                'remaining_balance' => $loan->total_debt - $total_payed_amount,
                'repayment_date' => Carbon::parse($saving->repayment_date)->addDays(30),
            ]);

            if ($this->penality >= 0) {
                penality::create([
                    'amount' => $this->penality,
                    'reciept_id' => $collection_receipts->id,
                    'user_id' => auth()->user()->id,
                    'late_by' => $this->difference,
                ]);
            } else {

                $this->dispatchBrowserEvent('respond', [
                    'title' => 'Loan collected successfully',
                    'icon' => 'success',
                    // 'iconColor' => 'green'
                ]);
            }

            $this->dispatchBrowserEvent('respond', [
                'title' => 'Loan collected successfully',
                'icon' => 'success',
                // 'iconColor' => 'green'
            ]);

            // $this->reset();
            return redirect(url('collect/' . $collection_receipts->id));
        }

    }

    public function render()
    {
        $search = '%' . $this->search . '%';

        $loans = Loan::where('id', 'like', $search)->where('status', 'active')->with('customer')->orderBy('created_at', 'desc')->paginate(5);
        return view('livewire.loan.view', ['loans' => $loans]);
    }
}
