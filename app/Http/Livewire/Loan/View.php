<?php

namespace App\Http\Livewire\Loan;
use Livewire\WithPagination;
use Livewire\Component;
use App\Models\Loan;
use App\Models\Customer;
use App\Models\Collateral;
use App\Models\Insurance;
use Illuminate\Support\Facades\Redirect;

class View extends Component
{   
    use WithPagination;

    public $search ,$loan_id ,$amount ,$interest_rate ,$starting_date ,$ending_date ,$collateral_type ,$value ,$penalty_rate ,$description, $net_amount, $initial_deposit;

    protected $PaginationTheme = 'bootstrap';

    public $rules = [
        // Loan and collateral values validation
        'amount' => ['required', 'numeric'],
        'interest_rate' => ['required', 'numeric'],
        'starting_date' => ['required', 'date'],
        'ending_date' => ['required', 'date'],
        'collateral_type' => ['required', 'string'],
        'value' => ['required','numeric'],
        'penalty_rate' => ['required','numeric'],
        'description' => ['required', 'string'],
        'net_amount' => ['required', 'numeric'],
        'initial_deposit' => ['required', 'numeric'],
    ];

    public function updated($property)
    {
        $this->validateOnly($property);
    }

    public function update()
    {   
        $currentCollateral = Loan::find($this->loan_id)->collateral;
        
        $collateral = Collateral::find($currentCollateral)->update([
            'collateral_type' => 'another wee',
            'value' => $this->value,
            'description' => $this->description,
            'user_id' => auth()->user()->id,
        ]);

        $Insurance = Insurance::create([
            'initial_deposit' => $this->net_amount * 0.5,
            // 'repayment_date' => $this->repayment_date,
        ]);

        Loan::where('id', $this->loan_id)->update([
            'amount' => $this->amount,
            'interest_rate' => $this->interest_rate,
            'starting_date' => $this->starting_date,
            'ending_date' => $this->ending_date,
            'insurance' => $Insurance->id,
            'net_amount' => $this->net_amount,
        ]);

        $this->dispatchBrowserEvent('respond', [
            'title' => 'Loan updated',
            'icon' => 'success',
            // 'iconColor' => 'green'
        ]);
        $data = Customer::find(1);
        $data2 = Customer::find(1);
        // $this->reset();
        // dd($data);
        // return redirect()->route('withdrawal')->with( ['data' => $currentCollateral] );
        return redirect(url('withdrawal/'.$data->id))->with( ['data' => $data2] );
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
            // $this->net_amount = $currentLoan->net_amount;
            $this->interest_rate = $currentLoan->interest_rate;
            $this->value = $LoanCollateral->value;
            $this->collateral_type = $currentLoan->collateral_type;
            $this->starting_date = $currentLoan->starting_date;
            $this->ending_date = $currentLoan->ending_date;
            $this->description = $LoanCollateral->description;
            $this->initial_deposit = '';
            

            // if(!$customerGroup){
            //     $this->group_name = '';
            //     $this->remark = '';
            // }else{
            //     $this->group_name = $customerGroup->group_name;
            //     $this->remark = $customerGroup->remark;
            // }


            // $this->picture = $currentCustomer->picture;

        }else{
            return redirect()->to('/loans')->with('error', 'loan was not found');
        }
    }

    public function render()
    {   
        $search = '%'.$this->search.'%';

        $loans = Loan::where('id','like', $search)->paginate(5);;
        return view('livewire.loan.view',['loans' => $loans]);
    }
}