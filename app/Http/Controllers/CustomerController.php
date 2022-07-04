<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Customer;
use App\Models\Address;

class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('livewire.loan-officer.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('customers.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    public function store(Request $request)
    {
        $request->validate([
            'first_name' =>['required', 'string', 'max:255'],
            'middle_name' =>['required', 'string', 'max:255'],
            'last_name' =>['required', 'string', 'max:255'],
            'dob' => ['required', 'date'],
            'sex' => ['required'],
            'phone_number' => ['required', 'numeric','min:10'],
            'picture' => 'required|mimes:jpg,png,jpeg,svg,gif',
            'hno' => ['required', 'numeric'],
            'woreda' => ['required', 'numeric'],
            'subCity' => ['required', 'string', 'max:255'],
            'city' => ['required', 'string', 'max:255'],
            'country' => ['required', 'string', 'max:255'],
            'nationality' => ['required', 'string', 'max:255'],
            'business_type' => ['required', 'string', 'max:255'],
            'group_id' => ['required', 'numeric', 'max:255'],

        ]);

        $savedAddress_1 = $request->hno;
        $savedAddress_2 = $request->woreda;
        $savedAddress_3 = $request->subCity;
        $savedAddress_4 = $request->city;
        $savedAddress_5 = $request->country;

        $isAvailable = Address::where('hno',$savedAddress_1)->where('woreda',$savedAddress_2)->where('subCity',$savedAddress_3)->where('city',$savedAddress_4)->where('country',$savedAddress_5)->first();
        
        if($isAvailable == false){
            // creating new address
            $newAddress = new Address();
            $newAddress->woreda = $request->woreda;
            $newAddress->hno = $request->hno;
            $newAddress->subCity = $request->subCity;
            $newAddress->city = $request->city;
            $newAddress->country = $request->country;
            $newAddress->save();
        }

        $findAddress = Address::where('hno',$savedAddress_1)->where('woreda',$savedAddress_2)->where('subCity',$savedAddress_3)->where('city',$savedAddress_4)->where('country',$savedAddress_5)->first();

        //image storing logic
        $picture = $request->file('picture');
        $pictureName= $picture->getClientOriginalName();
        $picture->storeAs('public\customerPictures',time().$pictureName);
        
        //creating a new user
        $newCustomer= new Customer();
        $newCustomer->first_name = $request->first_name;
        $newCustomer->middle_name = $request->middle_name;
        $newCustomer->last_name = $request->last_name;
        $newCustomer->dob = $request->dob;
        $newCustomer->sex = $request->sex;
        // $newUser->password = Hash::make($request->password);
        $newCustomer->phone_number = $request->phone_number;
        $newCustomer->nationality = $request->nationality;
        $newCustomer->picture = time().$pictureName;
        $newCustomer->address_id = $findAddress->id;
        $newCustomer->group_id = $request->group_id;
        $newCustomer->user_id = auth()->user()->id;
        $newCustomer->business_type = $request->business_type;
        $newCustomer->save();

        return redirect('/home')->with('success','Customer added successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function edit($id)
    {
        $custom = Customer::find($id);
        $address = Address::find($custom->address_id);

        return view('livewire.loan-officer.customer',compact('custom','address'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $customer = Customer::find($id);

        if($request->picture==null){
            $customer->picture= $customer->picture;
        }else {
            $picture = $request->file('picture');
            $pictureName= $picture->getClientOriginalName();
            $picture->storeAs('public\customerImages',time().$pictureName);

            $customer->picture= time().$pictureName;
        }
        
        $savedAddress_1 = $request->hno;
        $savedAddress_2 = $request->woreda;
        $savedAddress_3 = $request->subCity;
        $savedAddress_4 = $request->city;
        $savedAddress_5 = $request->country;

        $isAvailable = Address::where('hno',$savedAddress_1)->where('woreda',$savedAddress_2)->where('subCity',$savedAddress_3)->where('city',$savedAddress_4)->where('country',$savedAddress_5)->first();
    
        if($isAvailable == false){
            // creating new address
            $newAddress = new Address();
            $newAddress->hno = $request->hno;
            $newAddress->woreda = $request->woreda;
            $newAddress->subCity = $request->subCity;
            $newAddress->city = $request->city;
            $newAddress->country = $request->country;
            $newAddress->save();
        }
        
        $findAddress = Address::where('hno',$savedAddress_1)->where('woreda',$savedAddress_2)->where('subCity',$savedAddress_3)->where('city',$savedAddress_4)->where('country',$savedAddress_5)->first();

        $customer->first_name = $request->first_name;
        $customer->middle_name = $request->middle_name;
        $customer->last_name = $request->last_name;
        $customer->dob = $request->dob;
        // $newUser->password = Hash::make($request->password);
        $customer->phone_number = $request->phone_number;
        $customer->nationality = $request->nationality;
        $customer->picture = time().$pictureName;
        $customer->address_id = $findAddress->id;
        $customer->group_id = 1;
        $customer->user_id = auth()->user()->id;
        $customer->business_type = $request->business_type;
        $customer->save();
        
        return redirect('/home')->with('success', 'Customer updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
