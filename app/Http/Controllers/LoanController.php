<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Loan;
use App\Models\Collateral;


class LoanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('loans.create');
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
            'cust_id' => ['required', 'numeric'],
            'amount' => ['required', 'numeric'],
            'interest_rate' => ['required', 'numeric'],
            'starting_date' => ['required', 'date'],
            'ending_date' => ['required', 'date'],
            'collateral_type' => ['required',],
            'description' => ['required',],
            'value' => ['required'],
        ]);

        $loan = Loan::where('cust_id', $request->cust_id)->where('status',0)->count();

        if ($loan >= 1){
            return redirect('/customer')->with('success','User has unpaid loan');
        }

        $newCollateral = new Collateral();
        $newCollateral->collateral_type = $request->collateral_type;
        $newCollateral->description = $request->description;
        $newCollateral->value = $request->value;
        $newCollateral->user_id = auth()->user()->id;
        $newCollateral->save();

        $newLoan = new Loan();
        $newLoan->amount = $request->amount;
        $newLoan->interest_rate = $request->interest_rate;
        $newLoan->starting_date = $request->starting_date;
        $newLoan->ending_date = $request->ending_date;
        $newLoan->collateral = $newCollateral->id;
        $newLoan->cust_id = $request->cust_id;
        $newLoan->user_id = auth()->user()->id;
        $newLoan->save();

        return redirect('/customers')->with('success','Loan issued successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function showWithdrawal($id)
    {
        $we = Loan::find($id);

        return view('livewire.loan.withdrawal_receipt', ['data' => $we]);
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
