@php
$notfilled = $errors->any() || empty($this->amount) || empty($this->interest_rate) || empty($this->description) || empty($this->value) ? true : false;
// $filled = (!is_null($first_name) && !empty($first_name) && !is_null($middle_name) && !empty($middle_name) && !is_null($last_name) && !empty($last_name) && !is_null($dob) && !empty($dob) && !is_null($sex) && !empty($sex) && !is_null($phone_number) && !empty($phone_number) && !is_null($hno) && !empty($hno) && !is_null($woreda) && !empty($woreda) && !is_null($subCity) && !empty($subCity) && !is_null($city) && !empty($city) && !is_null($country) && !empty($country) && !is_null($nationality) && !empty($nationality) && !is_null($group_id) && !empty($group_id) && !is_null($business_type) && !empty($business_type) && !is_null($picture) && !empty($picture));
@endphp

{{-- start of register loan modal --}}

<div wire:ignore.self class="modal fade" id="issueLoan" tabindex="-1" role="dialog" aria-labelledby="modelTitleId"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-xl" role="document">
        <div class="modal-content">
            <div class="modal-header justify-content-center">
                <center>
                    <h2 class="modal-title text-dark text-center "style=" justify-content-center">
                        {{ __('Issue loan') }}</h2>
                </center>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="container-fluid">
                    <form wire:submit.prevent='storeLoan'>
                        @csrf
                        <div class="row g-4 mb-4">
                            <div class="col-sm-4">
                                <label for="loan_type" class="form-lable text-dark lable_color">{{ __('Loan type') }}</label>

                                <select class="form-control" id="loan_type" name="loan_type" required focus
                                    wire:model="loan_type">

                                    <option value="" hidden selected>Select loan type</option>
                                    <option value="personal" selected>Personal</option>
                                    <option value="buisness" selected>Buisness</option>

                                </select>
                            </div>

                            <div class="col-sm-4">
                                <label for="amount" class="form-lable text-dark">{{ __('Amount') }}</label>

                                <input id="amount" type="number"
                                    class="form-control @error('amount') is-invalid @enderror" name="amount"
                                    placeholder="{{ __('Enter requested amount') }}" required autocomplete="amount"
                                    autofocus required wire:model="amount">

                                @error('amount')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror

                            </div>

                            <div class="col-sm-4">
                                <label for="interest_rate"
                                    class="form-lable text-dark lable_color">{{ __('Interest Rate') }}</label>

                                <select class="form-control" id="interest_rate" name="interest_rate" required focus
                                    wire:model="interest_rate">

                                    <option value="" hidden selected>Select interest rate</option>
                                    <option value="0.05" selected>5%</option>
                                    <option value="0.1" selected>10%</option>
                                    <option value="0.15" selected>15%</option>
                                    <option value="0.2" selected>20%</option>

                                </select>
                            </div>

                            <div class="col-sm-4">
                                <label for="interest_type"
                                    class="form-lable text-dark lable_color">{{ __('Interest Type') }}</label>

                                <select class="form-control" id="interest_type" name="interest_type" required focus
                                    wire:model="interest_type">

                                    <option value="" hidden selected>Select interest type</option>
                                    <option value="simple" selected>Simple</option>
                                    <option value="compound" selected>Compound</option>
                                    
                                </select>
                            </div>

                            <div class="col-sm-4">
                                <label for="Loan period"
                                    class="form-lable text-dark lable_color">{{ __('Loan period') }}</label>

                                <select class="form-control" id="loan_period" name="loan_period" required focus
                                    wire:model="loan_period">

                                   
                                    <option value="" hidden selected>Select loan period</option>
                                    <option value="10" selected>10 Years</option>
                                    <option value="9" selected>9 Years</option>
                                    <option value="8" selected>8 Years</option>
                                    <option value="7" selected>7 Years</option>
                                    <option value="6" selected>6 Years</option>
                                    <option value="5" selected>5 Years</option>
                                    <option value="4" selected>4 Years</option>
                                    <option value="3" selected>3 Years</option>
                                    <option value="2" selected>2 Years</option>
                                    <option value="1" selected>1 Year</option>
                                    <option value="0.2" selected>6 month</option>
                                    <option value="0.25" selected>3 month</option>

                                </select>
                            </div>

                            <div class="col-sm-4">
                                <label for="collateral_type"
                                    class="form-lable text-dark lable_color">{{ __('Collateral type') }}</label>

                                <select class="form-control" id="collateral_type" name="collateral_type" required focus
                                    wire:model="collateral_type">

                                    <option value="" hidden selected>Select loan type</option>
                                    <option value="1" selected>Property</option>
                                    <option value="1" selected>Car</option>
                                    <option value="1" selected>Equipment</option>

                                </select>
                            </div>

                            <div class="col-sm-4">
                                <label for="collateral_value" class="form-lable text-dark">{{ __('Collateral value') }}</label>

                                <input id="value" placeholder="{{ __('Enter collateral value') }}"
                                    type="number" class="form-control @error('value') is-invalid @enderror"
                                    name="value" value="{{ old('value') }}" autocomplete="value" required
                                    wire:model="value">

                                @error('value')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror

                            </div>

                            <div class="col-sm-4">
                                <label for="description"
                                    class="form-lable text-dark">{{ __('Collateral description') }}</label>

                                <textarea id="description" placeholder="{{ __('Enter collateral description') }}" type="text-field"
                                    class="form-control @error('description') is-invalid @enderror" name="description"
                                    value="{{ old('description') }}" autocomplete="description" required wire:model="description"></textarea>

                                @error('description')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror

                            </div>

                        </div>
                        <center>
                            <button type="submit" class="btn btn-primary" wire:target="storeLoan"
                                data-bs-dismiss="modal" wire:loading.attr="disabled"
                                {{ $notfilled ? 'disabled' : '' }}>
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
