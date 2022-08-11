<?php

namespace App\Http\Livewire\Customer;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Customer;
use App\Models\GroupCustomer;
use App\Models\Address;
use App\Models\Loan;
use App\Models\Collateral;
use App\Models\Insurance;
use App\Models\Interest;
use Livewire\WithFileUploads;
use Carbon\Carbon;

class View extends Component
{
    use WithPagination;
    
    use WithFileUploads;

    protected $paginationTheme = 'bootstrap';

    public $search, $customer_id, $first_name, $middle_name, $last_name, $dob, $sex, $phone_number, $email, $picture, $hno, $woreda, $subCity, $city, $country, $nationality, $business_type, $group_name, $remark;
    
    public $loan_type, $amount, $collateral_type, $value, $cust_id, $description, $starting_date, $ending_date, $interest_rate, $interest_type;

    public $rules = [
        'first_name' =>['required', 'string', 'max:255'],
        'middle_name' =>['required', 'string', 'max:255'],
        'last_name' =>['required', 'string', 'max:255'],
        'dob' => ['required', 'date'],
        'sex' => ['required'],
        'phone_number' => ['required', 'numeric', 'min:10'],
        'email' => ['email'],
        'picture' => ['required', 'image'],
        'hno' => ['required', 'numeric'],
        'woreda' => ['required', 'string'],
        'subCity' => ['required', 'string', 'max:255'],
        'city' => ['required', 'string', 'max:255'],
        'country' => ['required', 'string', 'max:255'],
        'nationality' => ['required', 'string', 'max:255'],
        'business_type' => ['required', 'string', 'max:255'],
        'group_name' => ['string', 'max:255'],
        'remark' => ['string', 'max:255'],
        // Loan ,Collateral and Interest values validation
        'amount' => ['required', 'numeric'],
        'loan_type' => ['required', 'string'],
        'starting_date' => ['required', 'date'],
        'ending_date' => ['required', 'date'],
        'collateral_type' => ['required', 'string'],
        'value' => ['required','numeric'],
        'description' => ['required', 'string'],
        'interest_rate' => ['required', 'numeric'],
        'interest_type' => ['required', 'string'],
    ];

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function updated($property)
    {
        $this->validateOnly($property);
    }

    public function store()
    {   
        $hno = $this->hno;
        $woreda = $this->woreda;
        $subCity = $this->subCity;
        $city = $this->city;
        $country = $this->country;

        $isAvailable = Address::where('hno', $hno)
                              ->where('woreda', $woreda)
                              ->where('subCity', $subCity)
                              ->where('city', $city)
                              ->where('country', $country)
                              ->first();

        if($isAvailable == false){
            // creating new address
            Address::create([
                    'woreda' => $woreda,
                    'hno'=> $hno,
                    'subCity' => $subCity,
                    'city' => $city,
                    'country' => $country,
            ]);
        }

        $findAddress = Address::where('hno', $hno)
                              ->where('woreda', $woreda)
                              ->where('subCity', $subCity)
                              ->where('city', $city)
                              ->where('country', $country)
                              ->first();

        $groupAvailable = GroupCustomer::where('group_name', $this->group_name)
                                        ->first();

        if(!$groupAvailable && $this->group_name && $this->remark){
            $group = GroupCustomer::create([
                'group_name' => $this->group_name,
                'remark' => $this->remark,
            ]);
        }
                            
        $findGroup = GroupCustomer::where('group_name', $this->group_name)
                                    ->first();

        $picture = $this->picture->store('public/userPictures');

        if($findGroup == null) {

            $registerCustomer = Customer::create([
                'first_name' => $this->first_name,
                'middle_name' => $this->middle_name,
                'last_name' => $this->last_name,
                'dob' => $this->dob,
                'sex' => $this->sex,
                'phone_number' => $this->phone_number,
                'email' => $this->email,
                'picture' => $picture,
                'address_id' => $findAddress->id,
                'nationality' => $this->nationality,
                'business_type' => $this->business_type,
                'user_id' => auth()->user()->id,
                'group_id' => null,
    
            ]);
        }
        else{
            $registerCustomer = Customer::create([
                'first_name' => $this->first_name,
                'middle_name' => $this->middle_name,
                'last_name' => $this->last_name,
                'dob' => $this->dob,
                'sex' => $this->sex,
                'phone_number' => $this->phone_number,
                'email' => $this->email,
                'picture' => $picture,
                'address_id' => $findAddress->id,
                'nationality' => $this->nationality,
                'business_type' => $this->business_type,
                'user_id' => auth()->user()->id,
                'group_id' => $findGroup->id,
            ]);
        }
        if($registerCustomer){

            $this->reset();

            $this->dispatchBrowserEvent('close-modal');
    
            $this->dispatchBrowserEvent('respond', [
                'title' => 'Customer registered',
                'icon' => 'success',
                // 'iconColor' => 'green'
            ]);
        }
    }

    public function update()
    {
        $hno = $this->hno;
        $woreda = $this->woreda;
        $subCity = $this->subCity;
        $city = $this->city;
        $country = $this->country;

        $isAvailable = Address::where('hno', $hno)
                              ->where('woreda', $woreda)
                              ->where('subCity', $subCity)
                              ->where('city', $city)
                              ->where('country', $country)
                              ->first();

        if($isAvailable == false){
            // creating new address
            Address::create([
                    'hno'=> $hno,
                    'woreda' => $woreda,
                    'subCity' => $subCity,
                    'city' => $city,
                    'country' => $country,
            ]);
        }

        $findAddress = Address::where('hno', $hno)
                              ->where('woreda', $woreda)
                              ->where('subCity', $subCity)
                              ->where('city', $city)
                              ->where('country', $country)
                              ->first();

        $groupAvailable = GroupCustomer::where('group_name', $this->group_name)->first();

        if(!$groupAvailable && $this->group_name && $this->remark){
            $group = GroupCustomer::create([
                'group_name' => $this->group_name,
                'remark' => $this->remark,
            ]);
        }
                        
        $findGroup = GroupCustomer::where('group_name', $this->group_name)->first();

        if ($this->picture == null){
            $currentCustomer = Customer::find($this->customer_id);
            $picture = $currentCustomer->picture;
        }else{
            $picture = $this->picture->store('public/customerPictures');
        }
        
        if($findGroup == null) {

            Customer::where('id', $this->customer_id)->update([
                'first_name' => $this->first_name,
                'middle_name' => $this->middle_name,
                'last_name' => $this->last_name,
                'dob' => $this->dob,
                'sex' => $this->sex,
                'phone_number' => $this->phone_number,
                'email' => $this->email,
                'picture' => $picture,
                'address_id' => $findAddress->id,
                'nationality' => $this->nationality,
                'business_type' => $this->business_type,
                'group_id' => null,
            ]);

          }else{

            Customer::where('id', $this->customer_id)->update([
                'first_name' => $this->first_name,
                'middle_name' => $this->middle_name,
                'last_name' => $this->last_name,
                'dob' => $this->dob,
                'sex' => $this->sex,
                'phone_number' => $this->phone_number,
                'email' => $this->email,
                'picture' => $picture,
                'address_id' => $findAddress->id,
                'nationality' => $this->nationality,
                'business_type' => $this->business_type,
                'group_id' =>$findGroup->id,
            ]);
        }
        // $this->reset();

        $this->dispatchBrowserEvent('respond', [
            'title' => 'Customer data updated',
            'icon' => 'success',
            // 'iconColor' => 'green'
        ]);

    }

   public function editCustomer(int $customer_id)
    {
        $currentCustomer = Customer::find($customer_id);
        $customerAddress = Address::find($currentCustomer->address_id);
        $customerGroup = GroupCustomer::find($currentCustomer->group_id);

        if($currentCustomer)
        {
            $this->customer_id = $currentCustomer->id;
            $this->first_name = $currentCustomer->first_name;
            $this->middle_name = $currentCustomer->middle_name;
            $this->last_name = $currentCustomer->last_name;
            $this->dob = $currentCustomer->dob;
            $this->sex = $currentCustomer->sex;
            $this->phone_number = $currentCustomer->phone_number;
            $this->email = $currentCustomer->email;
            $this->hno = $customerAddress->hno;
            $this->woreda = $customerAddress->woreda;
            $this->subCity =$customerAddress->subCity;
            $this->city = $customerAddress->city;
            $this->country = $customerAddress->country;
            $this->business_type = $currentCustomer->business_type;
            $this->nationality = $currentCustomer->nationality;
            // $this->group_name => $customerGroup->group_name,
            // $this->remark  => $customerGroup->remark,

            if(!$customerGroup){
                $this->group_name = '';
                $this->remark = '';
            }else{
                $this->group_name = $customerGroup->group_name;
                $this->remark = $customerGroup->remark;
            }


            // $this->picture = $currentCustomer->picture;

        }else{
            return redirect()->to('/customers')->with('error', 'customer was not found');
        }
    }

    public function deleteCustomer(int $customer)
    {
        $isAvailable = Loan::where('cust_id',$customer)->where('status',0)->get();

        if($isAvailable->count() <= 0 ){
            $this->customer_id = $customer;
            $this->dispatchBrowserEvent('delete-modal');
        }else{
            $this->dispatchBrowserEvent('respond', [
                'title' => 'Customer has active loan!',
                'icon' => 'error',
            ]);
        }
    }

    public function destroy()
    {
        $customer = Customer::find($this->customer_id)->delete();

        $this->dispatchBrowserEvent('respond', [
            'title' => 'Customer deleted!',
            'icon' => 'success',
        ]);
    }

    public function issueLoan(int $customer)
    {
        $isAvailable = Loan::where('cust_id',$customer)->where('status',0)->get();

        if($isAvailable->count() <= 0 ){
            $this->customer_id = $customer;
            $this->dispatchBrowserEvent('open-modal');
        }else{
            $this->dispatchBrowserEvent('respond', [
                'title' => 'Customer has active loan!',
                'icon' => 'error',
            ]);
        }
    }

    public function storeLoan()
    {
        $collateral = Collateral::create([
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

        $Insurance = Insurance::create([
            'initial_deposit' => $this->amount * 0.1,
            'remaining_balance' => $this->amount * 0.1,
            // 'repayment_date' => $this->repayment_date,
        ]);

        Loan::create([
            'amount' => $this->amount,
            'total_debt' => $this->amount,
            'service_charge' => $this->amount * 0.02,
            'loan_type' => $this->loan_type,
            'interest_rate' => $this->interest_rate,
            'starting_date' => $this->starting_date,
            'ending_date' => $this->ending_date,
            'interest_date' => Carbon::now()->addDays(30),
            'cust_id' => $this->customer_id,
            'insu_id' => $Insurance->id,
            'int_id' => $findInterest->id,
            'coll_id' => $collateral->id,
            'user_id' => auth()->user()->id,
        ]);

        $this->dispatchBrowserEvent('respond', [
            'title' => 'Loan issued',
            'icon' => 'success',
            // 'iconColor' => 'green'
        ]);

        $this->reset();
    }

    public function render()
    {   
        $search = '%'.$this->search.'%';
        $customers = Customer::where('first_name','like', $search)
                                ->orWhere('phone_number', 'like', $search)       
                                ->paginate(6);
        return view('livewire.customer.view', ['customers' => $customers]);
    }
}
