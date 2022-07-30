{{-- start of edit loan modal --}}

<div wire:ignore.self class="modal fade" id="editLoan" tabindex="-1" role="dialog" aria-labelledby="modelTitleId"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-xl" role="document">
        <div class="modal-content">
            <div class="modal-header justify-content-center">
                <center>
                    <h2 class="modal-title text-dark text-center "style=" justify-content-center">
                        {{ __('Update loan') }}</h2>
                </center>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="container-fluid">
                    <form wire:submit.prevent='update'>
                        @csrf
                        <div class="row g-4 mb-4">
                            <div class="col-sm-4">
                                <label for="amount" class="form-label">{{ __('Amount') }}</label>

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
                                <label for="Interest rate" class="form-label">{{ __('Interest rate') }}</label>

                                <input id="interest_rate" type="number"
                                    class="form-control @error('interest_rate') is-invalid @enderror"
                                    name="interest_rate" placeholder="{{ __('Enter interest rate') }}" required
                                    autocomplete="interest_rate" autofocus required wire:model="interest_rate">

                                @error('interest_rate')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror

                            </div>

                            <div class="col-sm-4">
                                <label for="starting date" class="form-label">{{ __('Starting date') }}</label>

                                <input id="starting_date" type="date"
                                    class="form-control @error('starting_date') is-invalid @enderror"
                                    name="starting_date" value="{{ old('starting_date') }}"
                                    autocomplete="starting_date" placeholder="{{ __('Enter starting date') }}"
                                    required wire:model="starting_date">

                                @error('starting_date')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="col-sm-4">
                                <label for="Ending date" class="form-label">{{ __('Ending date') }}</label>

                                <input id="ending_date" type="date"
                                    class="form-control @error('ending_date') is-invalid @enderror" name="ending_date"
                                    value="{{ old('ending_date') }}" autocomplete="ending_date"
                                    placeholder="{{ __('Enter ending date') }}" required wire:model="ending_date">

                                @error('ending_date')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="col-sm-4">
                                <label for="collateral_type"
                                    class="form-label lable_color">{{ __('Collateral type') }}</label>

                                <select class="form-control" id="collateral_type" name="collateral_type" required focus
                                    wire:model="collateral_type">

                                    <option value="1" selected>weeee</option>

                                    <option value="Select Role" disabled selected>Click to Select Group</option>
                                </select>
                            </div>

                            <div class="col-sm-4">
                                <label for="collateral_value" class="form-label">{{ __('Collateral value') }}</label>

                                <input id="value" placeholder="{{ __('Enter collateral value') }}" type="number"
                                    class="form-control @error('value') is-invalid @enderror" name="value"
                                    value="{{ old('value') }}" autocomplete="value" required wire:model="value">

                                @error('value')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror

                            </div>

                            <div class="col-sm-4">
                                <label for="description"
                                    class="form-label">{{ __('Collateral description') }}</label>

                                <textarea id="description" placeholder="{{ __('Enter collateral description') }}" type="text-field"
                                    class="form-control @error('description') is-invalid @enderror" name="description"
                                    value="{{ old('description') }}" autocomplete="description" required wire:model="description"></textarea>

                                @error('description')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror

                            </div>

                            {{-- <div class="col-sm-4">
                                <label for="initial_diposit" class="form-label">{{ __('Insurance initial deposit') }}</label>

                                <input id="initial_diposit" placeholder="{{ __('Enter initial diposit') }}" type="number"
                                    class="form-control @error('initial_diposit') is-invalid @enderror" name="initial_diposit"
                                    value="{{ old('initial_diposit') }}" autocomplete="initial_diposit" required wire:model="initial_diposit">

                                @error('initial_diposit')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror

                            </div> --}}

                            <div class="col-sm-4">
                                <label for="net_amount" class="form-label">{{ __('Net amount') }}</label>

                                <input id="net_amount" placeholder="{{ __('Enter initial diposit') }}" type="number"
                                    class="form-control @error('net_amount') is-invalid @enderror" name="net_amount"
                                    value="{{ old('net_amount') }}" autocomplete="net_amount" required wire:model="net_amount">

                                @error('net_amount')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror

                            </div>

                            <div class="col-sm-4">
                                <label for="initial_deposit" class="form-label">{{ __('Insurance initial deposit') }}</label>

                                <input id="initial_deposit" placeholder="{{ __('Enter initial diposit') }}" type="number"
                                    class="form-control @error('initial_deposit') is-invalid @enderror" name="initial_deposit"
                                    value="{{ old('initial_deposit') }}" autocomplete="initial_deposit" required wire:model="initial_deposit">

                                @error('initial_deposit')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror

                            </div>

                        </div>
                        <center>
                            <button type="submit" class="btn btn-primary" wire:target="update"
                                data-bs-dismiss="modal" wire:loading.attr="disabled">
                                {{ __('Update') }}
                            </button>
                        </center>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
{{-- end of edit loan modal --}}