@php
    $notfilled = $errors->any() || empty($this->amount) || empty($this->interest_rate) || empty($this->starting_date) || empty($this->ending_date) || empty($this->description) || empty($this->value) ? true : false;
    // $filled = (!is_null($first_name) && !empty($first_name) && !is_null($middle_name) && !empty($middle_name) && !is_null($last_name) && !empty($last_name) && !is_null($dob) && !empty($dob) && !is_null($sex) && !empty($sex) && !is_null($phone_number) && !empty($phone_number) && !is_null($hno) && !empty($hno) && !is_null($woreda) && !empty($woreda) && !is_null($subCity) && !empty($subCity) && !is_null($city) && !empty($city) && !is_null($country) && !empty($country) && !is_null($nationality) && !empty($nationality) && !is_null($group_id) && !empty($group_id) && !is_null($business_type) && !empty($business_type) && !is_null($picture) && !empty($picture));
@endphp

{{--  start of register loan modal --}}

<div wire:ignore.self class="modal fade" id="issueLoan" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-xl" role="document">
       <div class="modal-content">
             <div class="modal-header justify-content-center">
                <center>
                    <h2 class="modal-title text-dark text-center "style=" justify-content-center">{{ __('Issue loan') }}</h2>
                </center>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
          <div class="modal-body">
            <div class="container-fluid">
                <form wire:submit.prevent='storeLoan'>
                    @csrf
                    <div class="row g-4 mb-4">
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
            
            </div>
                <center>
                    <button type="submit" class="btn btn-primary" wire:target="storeLoan" data-bs-dismiss="modal" wire:loading.attr="disabled" {{ $notfilled ? 'disabled' : '' }}>
                    {{ __('Issue') }}
                    </button>
                </center>
            </form>
         </div>
      </div>
    </div>
  </div>
</div>
 {{-- end of register loan modal --}}

 @push('scripts')
    <script>
        window.addEventListener('close-modal', e => {
            $('#issueLoan').modal('hide');
        });
    </script>
@endpush