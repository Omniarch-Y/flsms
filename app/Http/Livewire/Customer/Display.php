<?php

namespace App\Http\Livewire\Customer;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Customer;
use App\Models\Address;
use Livewire\WithFileUploads;


class Display extends Component
{
    use WithPagination;
    use WithFileUploads;

    // $picture = $this->picture->store('public/userPicture');

    protected $paginationTheme = 'bootstrap';

    public $search, $customer_id, $first_name, $middle_name, $last_name, $dob, $sex, $phone_number, $picture, $hno, $woreda, $subCity, $city, $country, $nationality, $business_type, $group_id;
    

    public $rules = [
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

        $this->dispatchBrowserEvent('created', [
            'title' => 'Customer registered',
            'icon' => 'success',
            // 'iconColor' => 'green'
        ]);
        $this->reset();
        $this->dispatchBrowserEvent('close-modal');

        $this->reset();
    }

    public function update()
    {      
        $validateData = $this->validate();

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

        if ($this->picture == null){
            $currentCustomer = Customer::find($this->customer_id);
            $picture = $currentCustomer->picture;
        }else{
            $picture = $this->picture->store('public/userPicture');
        }

        Customer::where('id', $this->customer_id)->update([
            'first_name' => $validateData['first_name'],
            'middle_name' => $validateData['middle_name'],
            'last_name' => $validateData['last_name'],
            'dob' => $validateData['dob'],
            'sex' => $validateData['sex'],
            'phone_number' => $validateData['phone_number'],
            'picture' => $picture,
            // 'picture' => time().$pictureName,
            'address_id' => $findAddress->id,
            'nationality' => $validateData['nationality'],
            'business_type' => $validateData['business_type'],
            'group_id' => $validateData['group_id'],
            // 'user_id' => auth()->user()->id,
        ]);

        $this->dispatchBrowserEvent('updated', [
            'title' => 'Customer data updated',
            'icon' => 'success',
            // 'iconColor' => 'green'
        ]);

        // $this->dispatchBrowserEvent('close-modal');

        $this->reset();
    }

   public function editCustomer(int $customer_id)
    {
        $currentCustomer = Customer::find($customer_id);
        $customerAddress = Address::find($currentCustomer->address_id);


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
            $this->group_id = $currentCustomer->group_id;
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

        $this->dispatchBrowserEvent('deleted', [
            'title' => 'Customer deleted!',
            'icon' => 'success',
            // 'iconColor' => 'green'
        ]);
    }

    public function render()
    {   
        $search = '%'.$this->search.'%';
        $customers = Customer::where('first_name','like', $search)
                                ->orWhere('phone_number', 'like', $search)       
                                ->paginate(10);
        return view('livewire.customer.display', ['customers' => $customers]);
    }
}