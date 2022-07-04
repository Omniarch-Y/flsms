<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Address;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (auth()->user()->role == 'loan_officer'){
            return view('Loan officer.home');
        }
        else if (auth()->user()->role == 'encoder'){
            return view('Encoder.home');
        }
        else return view('Manager.home');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('users.create');
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
            'woreda' => ['required'],
            'subCity' => ['required', 'string', 'max:255'],
            'city' => ['required', 'string', 'max:255'],
            'country' => ['required', 'string', 'max:255'],
            'nationality' => ['required', 'string', 'max:255'],
            'password' => ['required', 'confirmed', 'min:4'],
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
        $picture->storeAs('public\userPicture',time().$pictureName);
        
        //creating a new user
        $newUser= new User();
        $newUser->first_name = $request->first_name;
        $newUser->middle_name = $request->middle_name;
        $newUser->last_name = $request->last_name;
        $newUser->dob = $request->dob;
        $newUser->sex = $request->sex;
        $newUser->phone_number = $request->phone_number;
        $newUser->email = $request->email;
        $newUser->nationality = $request->nationality;
        $newUser->picture = time().$pictureName;
        $newUser->address_id = $findAddress->id;
        $newUser->password = Hash::make($request->password);
        $newUser->role = $request->role;
        $newUser->save();

        return redirect('/users')->with('success','User added successfully');
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
        //
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
        //
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
