<?php

namespace App\Http\Livewire\Customer;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Customer;
use App\Models\GroupCustomer;
use App\Models\Address;
use App\Models\Loan;
use App\Models\Collateral;
use Livewire\WithFileUploads;

class View extends Component
{
    use WithPagination;
    
    use WithFileUploads;

    protected $paginationTheme = 'bootstrap';

    public $search, $customer_id, $first_name, $middle_name, $last_name, $dob, $sex, $phone_number, $picture, $hno, $woreda, $subCity, $city, $country, $nationality, $business_type, $group_name, $remark;
    
    public $amount, $collateral_type, $value, $cust_id, $description, $starting_date, $ending_date, $interest_rate;

    public $rules = [
        'first_name' =>['required', 'string', 'max:255'],
        'middle_name' =>['required', 'string', 'max:255'],
        'last_name' =>['required', 'string', 'max:255'],
        'dob' => ['required', 'date'],
        'sex' => ['required'],
        'phone_number' => ['required', 'numeric', 'min:10'],
        'picture' => ['required', 'image'],
        'hno' => ['required', 'numeric'],
        'woreda' => ['required', 'numeric'],
        'subCity' => ['required', 'string', 'max:255'],
        'city' => ['required', 'string', 'max:255'],
        'country' => ['required', 'string', 'max:255'],
        'nationality' => ['required', 'string', 'max:255'],
        'business_type' => ['required', 'string', 'max:255'],
        'group_name' => ['string', 'max:255'],
        'remark' => ['string', 'max:255'],
        // Loan and collateral values validation
        'amount' => ['required', 'numeric'],
        'interest_rate' => ['required', 'numeric'],
        'starting_date' => ['required', 'date'],
        'ending_date' => ['required', 'date'],
        'collateral_type' => ['required', 'string'],
        'value' => ['required','numeric'],
        'description' => ['required', 'string'],
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
        $isAvailable = Address::where('hno', $this->hno)
                              ->where('woreda', $this->woreda)
                              ->where('subCity', $this->subCity)
                              ->where('city', $this->city)
                              ->where('country', $this->country)
                              ->first();

        if($isAvailable == false){
            // creating new address
            Address::create([
                    'woreda' => $this->woreda,
                    'hno'=> $this->hno,
                    'subCity' => $this->subCity,
                    'city' => $this->city,
                    'country' => $this->country,
            ]);
        }

        $findAddress = Address::where('hno', $this->hno)
                              ->where('woreda', $this->woreda)
                              ->where('subCity', $this->subCity)
                              ->where('city', $this->city)
                              ->where('country', $this->country)
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

            Customer::create([
                'first_name' => $this->first_name,
                'middle_name' => $this->middle_name,
                'last_name' => $this->last_name,
                'dob' => $this->dob,
                'sex' => $this->sex,
                'phone_number' => $this->phone_number,
                'picture' => $picture,
                'address_id' => $findAddress->id,
                'nationality' => $this->nationality,
                'business_type' => $this->business_type,
                'user_id' => auth()->user()->id,
                'group_id' => null,
    
            ]);
        }
        else{
            Customer::create([
                'first_name' => $this->first_name,
                'middle_name' => $this->middle_name,
                'last_name' => $this->last_name,
                'dob' => $this->dob,
                'sex' => $this->sex,
                'phone_number' => $this->phone_number,
                'picture' => $picture,
                'address_id' => $findAddress->id,
                'nationality' => $this->nationality,
                'business_type' => $this->business_type,
                'user_id' => auth()->user()->id,
                'group_id' => $findGroup->id,
    
            ]);
        }

        $this->dispatchBrowserEvent('respond', [
            'title' => 'Customer registered',
            'icon' => 'success',
            // 'iconColor' => 'green'
        ]);

        $this->reset();
        
        $this->dispatchBrowserEvent('close-modal');
    }

    public function update()
    {      
        $validateData = $this->validate([
            'first_name' =>['required', 'string', 'max:255'],
            'middle_name' =>['required', 'string', 'max:255'],
            'last_name' =>['required', 'string', 'max:255'],
            'dob' => ['required', 'date'],
            'sex' => ['required'],
            'phone_number' => ['required', 'numeric', 'min:10'],
            'hno' => ['required', 'numeric'],
            'woreda' => ['required', 'numeric'],
            'subCity' => ['required', 'string', 'max:255'],
            'city' => ['required', 'string', 'max:255'],
            'country' => ['required', 'string', 'max:255'],
            'nationality' => ['required', 'string', 'max:255'],
            'business_type' => ['required', 'string', 'max:255'],
            'group_id' => ['required', 'numeric', 'max:255'],
        ]);

        

        $savedAddress_1 = $this->hno;
        $savedAddress_2 = $this->woreda;
        $savedAddress_3 = $this->subCity;
        $savedAddress_4 = $this->city;
        $savedAddress_5 = $this->country;

        $isAvailable = Address::where('hno', $savedAddress_1)
                              ->where('woreda', $savedAddress_2)
                              ->where('subCity', $savedAddress_3)
                              ->where('city', $savedAddress_4)
                              ->where('country', $savedAddress_5)
                              ->first();

        if($isAvailable == false){
            // creating new address
            Address::create([
                    'hno'=> $this->hno,
                    'woreda' => $this->woreda,
                    'subCity' => $this->subCity,
                    'city' => $this->city,
                    'country' => $this->country,
            ]);
        }

        $findAddress = Address::where('hno', $savedAddress_1)
                              ->where('woreda', $savedAddress_2)
                              ->where('subCity', $savedAddress_3)
                              ->where('city', $savedAddress_4)
                              ->where('country', $savedAddress_5)
                              ->first();

        if ($this->picture == null){
            $currentCustomer = Customer::find($this->customer_id);
            $picture = $currentCustomer->picture;
        }else{
            $picture = $this->picture->store('public/customerPictures');
        }

        Customer::where('id', $this->customer_id)->update([
            'first_name' => $validateData['first_name'],
            'middle_name' => $validateData['middle_name'],
            'last_name' => $validateData['last_name'],
            'dob' => $validateData['dob'],
            'sex' => $validateData['sex'],
            'phone_number' => $validateData['phone_number'],
            'picture' => $picture,
            'address_id' => $findAddress->id,
            'nationality' => $validateData['nationality'],
            'business_type' => $validateData['business_type'],
            'group_id' => $validateData['group_id'],
        ]);

        $this->dispatchBrowserEvent('respond', [
            'title' => 'Customer data updated',
            'icon' => 'success',
            // 'iconColor' => 'green'
        ]);

        $this->reset();
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
            $this->hno = $customerAddress->hno;
            $this->woreda = $customerAddress->woreda;
            $this->subCity =$customerAddress->subCity;
            $this->city = $customerAddress->city;
            $this->country = $customerAddress->country;
            $this->business_type = $currentCustomer->business_type;
            $this->nationality = $currentCustomer->nationality;
            $this->group_id = 2;

            // if(!$customerGroup){
            //     $this->group_name = '';
            //     $this->remark = '';
            // }else{
            //     $this->group_name = $customerGroup->group_name;
            //     $this->remark = $customerGroup->remark;
            // }


            // $this->picture = $currentCustomer->picture;

        }else{
            return redirect()->to('/customers')->with('error', 'customer was not found');
        }
    }

    public function deleteCustomer(int $customer)
    {
        $this->customer_id = $customer;
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
            'collateral_type' => 'another wee',
            'value' => $this->value,
            'description' => $this->description,
            'user_id' => auth()->user()->id,
        ]);

        Loan::create([
            'amount' => $this->amount,
            'interest_rate' => $this->interest_rate,
            'starting_date' => $this->starting_date,
            'ending_date' => $this->ending_date,
            'cust_id' => $this->customer_id,
            'collateral' => $collateral->id,
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