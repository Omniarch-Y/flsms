<?php

namespace App\Http\Livewire\User;

use Livewire\Component;
use App\Models\User;
use App\Models\Address;
use Livewire\WithFileUploads;
use Livewire\WithPagination;
use Illuminate\Support\Facades\Hash;

class View extends Component
{      
    use WithPagination;
    
    use WithFileUploads;

    protected $paginationTheme = 'bootstrap';

    public $search, $user_id, $first_name, $middle_name, $last_name, $dob, $sex, $email, $password, $password_confirmation, $phone_number, $picture, $role, $hno, $woreda, $subCity, $city, $country, $nationality;

    public $rules = [
        'first_name' =>['required', 'string', 'max:255'],
        'middle_name' =>['required', 'string', 'max:255'],
        'last_name' =>['required', 'string', 'max:255'],
        'dob' => ['required', 'date'],
        'sex' => ['required'],
        'phone_number' => ['required', 'numeric', 'min:10'],
        'email' => ['required', 'email'],
        'picture' => ['required', 'image'],
        'hno' => ['required', 'numeric'],
        'woreda' => ['required', 'numeric'],
        'subCity' => ['required', 'string', 'max:255'],
        'city' => ['required', 'string', 'max:255'],
        'country' => ['required', 'string', 'max:255'],
        'nationality' => ['required', 'string', 'max:255'],
        'role' => ['required', 'string', 'max:255'],
        'password' => ['required', 'confirmed', 'min:4'],
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

        $picture = $this->picture->store('public/userPictures');

        User::create([
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
            'role' => $this->role,
            'password' => Hash::make($this->password),
            'user_id' => auth()->user()->id,
        ]);

        $this->dispatchBrowserEvent('respond', [
            'title' => 'User registered',
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
            'email' => ['required', 'email'],
            'hno' => ['required', 'numeric'],
            'woreda' => ['required', 'numeric'],
            'subCity' => ['required', 'string', 'max:255'],
            'city' => ['required', 'string', 'max:255'],
            'country' => ['required', 'string', 'max:255'],
            'nationality' => ['required', 'string', 'max:255'],
            'role' => ['required', 'string', 'max:255'],
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
            $currentUser = User::find($this->user_id);
            $picture = $currentUser->picture;
        }else{
            $picture = $this->picture->store('public/userPictures');
        }

        User::where('id', $this->user_id)->update([
            'first_name' => $validateData['first_name'],
            'middle_name' => $validateData['middle_name'],
            'last_name' => $validateData['last_name'],
            'dob' => $validateData['dob'],
            'sex' => $validateData['sex'],
            'phone_number' => $validateData['phone_number'],
            'email' => $validateData['email'],
            'picture' => $picture,
            'address_id' => $findAddress->id,
            'nationality' => $validateData['nationality'],
            'role' => $validateData['role'],
        ]);

        $this->dispatchBrowserEvent('respond', [
            'title' => 'User data updated',
            'icon' => 'success',
            // 'iconColor' => 'green'
        ]);

        $this->reset();
    }

    public function editUser(int $user_id) 
    {
        $user = User::find($user_id);
        $address = Address::find($user->address_id);

        if($user){
            $this->user_id = $user->id;
            $this->first_name = $user->first_name;
            $this->middle_name = $user->middle_name;
            $this->last_name = $user->last_name;
            $this->sex = $user->sex;
            $this->dob = $user->dob;
            $this->phone_number = $user->phone_number;
            $this->email = $user->email;
            $this->hno = $address->hno;
            $this->woreda = $address->woreda;
            $this->subCity = $address->subCity;
            $this->city = $address->city;
            $this->country = $address->country;
            $this->nationality = $user->nationality;
            $this->role = $user->role;
        }else{
            return redirect()->to('/users')->with('error', 'user was not found');
        }
    }

    public function deleteUser(int $user)
    {
        $authUser = auth()->user()->id;

        if($user !== $authUser){
            $this->user_id = $user;
            $this->dispatchBrowserEvent('deleteUser');
        }else {
            $this->dispatchBrowserEvent('respond', [
                'title' => 'Invalid action!',
                'icon' => 'error',
                // 'iconColor' => 'green'
            ]);
        }
    }

    public function destroy()
    {
        $user = User::find($this->user_id)->delete();

        $this->dispatchBrowserEvent('respond', [
            'title' => 'User deleted!',
            'icon' => 'success',
            // 'iconColor' => 'green'
        ]);
    }

    public function render()
    {
        $search = '%'.$this->search.'%';
        $users = User::where('first_name','like', $search)
                                ->orWhere('phone_number', 'like', $search)       
                                ->paginate(10);
        return view('livewire.user.view', ['users' => $users]);
    }
}