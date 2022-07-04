<?php

namespace App\Http\Livewire\Customer;

use Livewire\Component;
use App\Models\Customer;
use App\Models\Address;
use Livewire\WithFileUploads;

class Edit extends Component
{   

    // use WithFileUploads;
    
    // public $first_name, $middle_name, $last_name, $dob, $sex, $phone_number, $picture, $hno, $woreda, $subCity, $city, $country, $nationality, $business_type, $group_id, $customer_edit_id;

    // public $rules = [
    //     'first_name' =>['required', 'string', 'max:255'],
    //     'middle_name' =>['required', 'string', 'max:255'],
    //     'last_name' =>['required', 'string', 'max:255'],
    //     'dob' => ['required', 'date'],
    //     'sex' => ['required','string'],
    //     'phone_number' => ['required', 'numeric','min:10'],
    //     'picture' => ['required', 'string', 'max:255'],
    //     // 'picture' => 'required|mimes:jpg,png,jpeg,svg,gif',
    //     'hno' => ['required', 'numeric'],
    //     'woreda' => ['required', 'numeric'],
    //     'subCity' => ['required', 'string', 'max:255'],
    //     'city' => ['required', 'string', 'max:255'],
    //     'country' => ['required', 'string', 'max:255'],
    //     'nationality' => ['required', 'string', 'max:255'],
    //     'business_type' => ['required', 'string', 'max:255'],
    //     'group_id' => ['required', 'numeric', 'max:255'],
    // ];

    // public function updated($property)
    // {
    //     $this->validateOnly($property);
    // }
    public $customer;
    public $editCustomer = false;
    public $formId;

    public function mount($customer)
    {
        $this->formId = $customer->id;
    }

    protected $rules = [
        'customer.first_name' =>['required', 'string', 'max:255'],
        'customer.middle_name' =>['required', 'string', 'max:255'],
        'customer.last_name' =>['required', 'string', 'max:255'],
        'customer.dob' => ['required', 'date'],
        'customer.sex' => ['required'],
        'customer.phone_number' => ['required', 'numeric','min:10'],
        'customer.picture' => ['required', 'string', 'max:255'],
        // 'picture' => 'required|mimes:jpg,png,jpeg,svg,gif',
        'customer.hno' => ['required', 'numeric'],
        'customer.woreda' => ['required', 'numeric'],
        'customer.subCity' => ['required', 'string', 'max:255'],
        'customer.city' => ['required', 'string', 'max:255'],
        'customer.country' => ['required', 'string', 'max:255'],
        'customer.nationality' => ['required', 'string', 'max:255'],
        'customer.business_type' => ['required', 'string', 'max:255'],
        'customer.group_id' => ['required', 'numeric', 'max:255'],
    ];

    public function updated($property)
    {
        this->validationOnly($property);
    }

    public function editCustomer()
    {
        $this->resetErrorBag();
        $this->editCustomer = true;
    }

    public function update()
    {   
        $savedAddress_1 = $this->customer->hno;
        $savedAddress_2 = $this->customer->woreda;
        $savedAddress_3 = $this->customer->subCity;
        $savedAddress_4 = $this->customer->city;
        $savedAddress_5 = $this->customer->country;

        $isAvailable = Address::where('hno', $savedAddress_1)
                              ->where('woreda', $savedAddress_2)
                              ->where('subCity', $savedAddress_3)
                              ->where('city', $savedAddress_4)
                              ->where('country', $savedAddress_5)
                              ->first();

        if($isAvailable == false){
            // creating new address
            Address::create([
                    'woreda' => $this->customer->woreda,
                    'hno'=> $this->customer->hno,
                    'subCity' => $this->customer->subCity,
                    'city' => $this->customer->city,
                    'country' => $this->customer->country,
            ]);
        }

        $findAddress = Address::where('hno', $savedAddress_1)
                              ->where('woreda', $savedAddress_2)
                              ->where('subCity', $savedAddress_3)
                              ->where('city', $savedAddress_4)
                              ->where('country', $savedAddress_5)
                              ->first();

        $this->customer->update([
            'first_name' => $this->customer->first_name,
            'middle_name' => $this->customer->middle_name,
            'last_name' => $this->customer->last_name,
            'dob' => $this->customer->dob,
            'sex' => $this->customer->sex,
            'phone_number' => $this->customer->phone_number,
            'picture' => $this->customer->picture,
            // 'picture' => time().$pictureName,
            'address_id' => $findAddress->id,
            'nationality' => $this->customer->nationality,
            'business_type' => $this->customer->business_type,
            'group_id' => $this->customer->group_id,
            'user_id' => auth()->user()->id,
        ]);

        $this->reset();
    }

    // public function editCustomer($id)
    // {
    //     // $customer = Customer::findById($id);
    //     $customer = Customer::where('id', $id)->first();

    //     $this->$customer_edit_id = $customer->id;
    //     $this->first_name = $customer->first_name;
    //     $this->middle_name = $customer->middle_name;
    //     $this->last_name = $customer->last_name;
    //     $this->dob = $customer->dob;
    //     $this->sex = $customer->sex;
    //     $this->phone_number = $customer->phone_number;
    //     $this->picture = $customer->picture;
    //     // 'picture = time().$pictureName;
    //     $this->address_id = $findAddress->id;
    //     $this->nationality = $customer->nationality;
    //     $this->business_type = $customer->business_type;
    //     $this->group_id = $customer->group_id;

    //     $this->dispatchBrowserEvent('show-edit-modal');
    // }

    // public function editCustomerData()
    // {

    // }

    public function render()
    {
        return view('livewire.customer.edit');
    }
}
