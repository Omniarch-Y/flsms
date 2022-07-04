<?php

namespace App\Http\Livewire\Customer;

use Livewire\Component;
use App\Models\Customer;
use App\Models\Address;
use Livewire\WithFileUploads;

class Store extends Component
{   
    use WithFileUploads;
    
    public $first_name, $middle_name, $last_name, $dob, $sex, $phone_number, $picture, $hno, $woreda, $subCity, $city, $country, $nationality, $business_type, $group_id;

    public $rules = [
        'first_name' =>['required', 'string', 'max:255'],
        'middle_name' =>['required', 'string', 'max:255'],
        'last_name' =>['required', 'string', 'max:255'],
        'dob' => ['required', 'date'],
        'sex' => ['required'],
        'phone_number' => ['required', 'numeric', 'min:10'],
        // 'picture' => ['required', 'string', 'max:255'],
        'picture' => 'required|mimes:jpg,png,jpeg,svg,gif',
        'hno' => ['required', 'numeric'],
        'woreda' => ['required', 'numeric'],
        'subCity' => ['required', 'string', 'max:255'],
        'city' => ['required', 'string', 'max:255'],
        'country' => ['required', 'string', 'max:255'],
        'nationality' => ['required', 'string', 'max:255'],
        'business_type' => ['required', 'string', 'max:255'],
        'group_id' => ['required', 'numeric', 'max:255'],
    ];

    public function updated($property)
    {
        $this->validateOnly($property);
    }

    public function store()
    {   
        // $validatedData = $this->validate();

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
                    'woreda' => $this->woreda,
                    'hno'=> $this->hno,
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

        // $picture = $this->file('picture');
        // $pictureName= $picture->getClientOriginalName();
        // $picture->storeAs('public\customerPictures',time().$pictureName);

        // $pictureName = Carbon::now()->timestamp.'.'.$this->picture->extension();
        // $this->picture->storeAs('public\customerPictures',$pictureName);

        $picture = $this->picture->store('public/userPicture');

        Customer::create([
            'first_name' => $this->first_name,
            'middle_name' => $this->middle_name,
            'last_name' => $this->last_name,
            'dob' => $this->dob,
            'sex' => $this->sex,
            'phone_number' => $this->phone_number,
            'picture' => $picture,
            // 'picture' => time().$pictureName,
            'address_id' => $findAddress->id,
            'nationality' => $this->nationality,
            'business_type' => $this->business_type,
            'group_id' => $this->group_id,
            'user_id' => auth()->user()->id,
        ]);

        session()->flash('message', 'Post successfully updated.');

        $this->dispatchBrowserEvent('close-modal');

        $this->reset();
    }

    public function render()
    {
        return view('livewire.customer.store');
    }
}