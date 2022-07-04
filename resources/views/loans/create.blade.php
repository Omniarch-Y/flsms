@extends('layouts.app')

@section('content')
             <div class="container">
                     <form method="POST" action="{{'issueLoan'}} " enctype="multipart/form-data">
                         @csrf
                         <div class="row g-4 mb-4">
                         <div class="col-sm-4">
                             <label for="Customer" class="form-label">{{ __('Customer Id') }}</label>

                                 <input id="cust_id" type="number" class="form-control @error('cust_id') is-invalid @enderror" name="cust_id" placeholder="{{ __('Enter customer id')}}" autocomplete="cust_id" autofocus wire:model="cust_id">
 
                                 @error('cust_id')
                                     <span class="invalid-feedback" role="alert">
                                         <strong>{{ $message }}</strong>
                                     </span>
                                 @enderror

                         </div>

                         <div class="col-sm-4">
                            <label for="amount" class="form-label">{{ __('Amount') }}</label>

                                <input id="amount" type="number" class="form-control @error('amount') is-invalid @enderror" name="amount" placeholder="{{ __('Enter requested amount')}}"  required autocomplete="amount" autofocus required wire:model="amount">

                                @error('amount')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror

                        </div>

                        <div class="col-sm-4">
                            <label for="Interest rate" class="form-label">{{ __('Interest rate') }}</label>

                                <input id="interest_rate"  type="number" class="form-control @error('interest_rate') is-invalid @enderror" name="interest_rate" placeholder="{{ __('Enter interest rate')}}"  required autocomplete="interest_rate" autofocus required wire:model="interest_rate">

                                @error('interest_rate')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror

                        </div>
                         
                     <div class="col-sm-4">    
                         <label for="starting date" class="form-label">{{ __('Starting date') }}</label>

                         <input id="starting_date" type="date" class="form-control @error('starting_date') is-invalid @enderror" name="starting_date" value="{{ old('starting_date') }}" autocomplete="starting_date" placeholder="{{ __('Enter starting date') }}" required wire:model="starting_date">

                         @error('starting_date')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                         @enderror
                     </div>

                     <div class="col-sm-4">    
                        <label for="Ending date" class="form-label">{{ __('Ending date') }}</label>

                        <input id="ending_date" type="date" class="form-control @error('ending_date') is-invalid @enderror" name="ending_date" value="{{ old('ending_date') }}" autocomplete="ending_date" placeholder="{{ __('Enter ending date') }}" required wire:model="ending_date">

                        @error('ending_date')
                           <span class="invalid-feedback" role="alert">
                               <strong>{{ $message }}</strong>
                           </span>
                        @enderror
                    </div>

                    <div class="col-sm-4">
                        <label for="collateral_type" class="form-label lable_color">{{ __('Collateral type') }}</label>

                        <select class="form-control" id="collateral_type" name="collateral_type" required focus wire:model="collateral_type">
                            
                            <option value="1" selected>weeee</option>
                            
                            <option value="Select Role" disabled selected>Click to Select Group</option>       
                        </select>
                    </div>
                    


                        <div class="col-sm-4">
                            <label for="collateral_value" class="form-label">{{ __('Collateral value') }}</label>

                                <input id="value"  placeholder="{{ __('Enter collateral value') }}" type="number" class="form-control @error('value') is-invalid @enderror" name="value" value="{{ old('value') }}" autocomplete="value" required wire:model="value">

                                @error('value')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror

                        </div>

                        <div class="col-sm-4">
                            <label for="description" class="form-label">{{ __('Collateral description') }}</label>
    
                                <textarea id="description"  placeholder="{{ __('Enter collateral description') }}" type="text-field" class="form-control @error('description') is-invalid @enderror" name="description" value="{{ old('description') }}" autocomplete="description" required wire:model="description"></textarea>
    
                                @error('description')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
    
                        </div>
 
                         {{-- <div class="col-sm-4">
                             <label for="picture" class="form-label">{{ __('Picture') }}</label>

                           <input name="picture" type="file" class="form-control" required wire:model="picture">
                                 @error('picture')
                                     <span class="invalid-feedback" role="alert">
                                         <strong>{{ $message }}</strong>
                                     </span>
                                 @enderror
                         </div> --}}
                         
                            <div class="col-md-4">
                             <button type="submit" class="btn btn-primary" wire:model="issueLoan">
                                {{ __('Issue') }}
                            </button>
                        </div>
                         
          </div>

         </form>
        </div>
      </div>
@endsection

 <!--End of Modal for adding new Item -->