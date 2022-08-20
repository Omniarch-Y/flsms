@php
$notfilled = $errors->any() || empty($this->collected_amount) ? true : false;
// $filled = (!is_null($first_name) && !empty($first_name) && !is_null($middle_name) && !empty($middle_name) && !is_null($last_name) && !empty($last_name) && !is_null($dob) && !empty($dob) && !is_null($sex) && !empty($sex) && !is_null($phone_number) && !empty($phone_number) && !is_null($hno) && !empty($hno) && !is_null($woreda) && !empty($woreda) && !is_null($subCity) && !empty($subCity) && !is_null($city) && !empty($city) && !is_null($country) && !empty($country) && !is_null($nationality) && !empty($nationality) && !is_null($group_id) && !empty($group_id) && !is_null($business_type) && !empty($business_type) && !is_null($picture) && !empty($picture));
@endphp

{{-- start of collect modal --}}

<div wire:ignore.self class="modal fade" id="collect" tabindex="-1" role="dialog" aria-labelledby="modelTitleId"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-md" role="document">
        <div class="modal-content">
            <div class="modal-header justify-content-center">
                <center>
                    <h2 class="modal-title text-dark text-center "style=" justify-content-center">
                        {{ __('Collect') }}</h2>
                </center>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="container-fluid">
                    <form wire:submit.prevent='collectLoan'>
                        @csrf
                        <div class="row g-4 mb-4">

                            <div class="col-sm-12">
                                <label for="collected_amount" class="form-lable text-dark">{{ __('Amount') }}</label>

                                <input id="collected_amount" type="text"
                                    class="form-control @error('collected_amount') is-invalid @enderror"
                                    name="collected_amount" placeholder="{{ __('Enter collected amount') }}"
                                    autocomplete="collected_amount" autofocus wire:model="collected_amount">

                                @error('collected_amount')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror

                            </div>

                            <div class="row mt-4 text-bold">
                                <div class="col-sm-6">
                                    <h5 class="text-bold">Monthly payment -</h5>
                                </div>
                                <div class="col-sm-2">
                                    <input id="collected_amount" type="text" class="text-bold"
                                        wire:model="monthly_payment" readonly
                                        style="border:none; color:green; font-size:20px">
                                </div>

                            </div>
                            <div class="row mt-4 text-bold">
                                <div class="col-sm-6">
                                    <h5 class="text-bold">Penality -</h5>
                                </div>
                                <div class="col-sm-2">
                                    <input id="collected_amount" type="text" class="text-bold" wire:model="penality"
                                        readonly style="border:none; color:red; font-size:20px">
                                </div>

                            </div>
                            <div class="row mt-4 text-bold">
                                <div class="col-sm-6">
                                    <h5 class="text-bold">Total payment -</h5>
                                </div>
                                <div class="col-sm-2">
                                    <input id="collected_amount" type="text" class="text-bold" wire:model="total"
                                        readonly style="border:none; color:green; font-size:20px">
                                </div>

                            </div>
                            <div class="row mt-4 text-bold">
                                <div class="col-sm-6">
                                    <h5 class="text-bold">Remaining balance -</h5>
                                </div>
                                <div class="col-sm-2">
                                    <input id="collected_amount" type="text" class="text-bold"
                                        wire:model="remaining_balance" readonly
                                        style="border:none; color:green; font-size:20px">
                                </div>

                            </div>
                            <div class="row mt-4 mb-4 text-bold">
                                <div class="col-sm-6">
                                    <h5 class="text-bold">Date -</h5>
                                </div>
                                <div class="col-sm-2">
                                    <input id="date" type="text" class="text-bold"
                                        wire:model="date" readonly
                                        style="border:none; color:green; font-size:20px">
                                </div>

                            </div>
                        </div>
                        <center>
                            <button type="submit" class="btn btn-primary" wire:target="collectLoan"
                                data-bs-dismiss="modal" wire:loading.attr="disabled" {{ $notfilled ? 'disabled' : '' }}>
                                {{ __('Submit') }}
                            </button>
                        </center>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
{{-- end of collect modal --}}
