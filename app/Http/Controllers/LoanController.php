<?php

namespace App\Http\Controllers;

use App\Models\CollectionReceipt;
use App\Models\Loan;
use App\Models\Penality;
use App\Models\Customer;
use App\Models\Saving;
use App\Models\WithdrawalReceipt;
use Illuminate\Http\Request;

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

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function showWithdrawal($id)
    {
        $withdrawal = WithdrawalReceipt::find($id);
        $loan = Loan::find($withdrawal->loan_id);
        $customer = Customer::find($loan->cust_id);

        return view('livewire.Receipt.withdrawal_receipt', compact('loan','customer','withdrawal'));
    }

    public function showCollect($id)
    {
        $collection = CollectionReceipt::where('id',$id)->with('user')->with('loan')->first();
        $loan = Loan::find($collection->loan_id);
        $customer = Customer::find($loan->cust_id);
        $saving = Saving::find($collection->saving_id);
        $penality = Penality::where('reciept_id', $id);

        return view('livewire.Receipt.collection_receipt', compact('loan','saving','collection','penality','customer'));
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
