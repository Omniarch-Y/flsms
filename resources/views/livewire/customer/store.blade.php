@php
$notfilled = $errors->any() || empty($this->first_name) || empty($this->middle_name) || empty($this->last_name) || empty($this->dob) || empty($this->phone_number) || empty($this->hno) || empty($this->woreda) || empty($this->subCity) || empty($this->city) || empty($this->country) || empty($this->nationality) || empty($this->business_type) ? true : false;
// $filled = (!is_null($first_name) && !empty($first_name) && !is_null($middle_name) && !empty($middle_name) && !is_null($last_name) && !empty($last_name) && !is_null($dob) && !empty($dob) && !is_null($sex) && !empty($sex) && !is_null($phone_number) && !empty($phone_number) && !is_null($hno) && !empty($hno) && !is_null($woreda) && !empty($woreda) && !is_null($subCity) && !empty($subCity) && !is_null($city) && !empty($city) && !is_null($country) && !empty($country) && !is_null($nationality) && !empty($nationality) && !is_null($group_id) && !empty($group_id) && !is_null($business_type) && !empty($business_type) && !is_null($picture) && !empty($picture));
@endphp

{{-- start of register customer modal --}}

<div wire:ignore.self class="modal fade" id="registerCustomer" tabindex="-1" role="dialog" aria-labelledby="modelTitleId"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-xl" role="document">
        <div class="modal-content">
            <div class="modal-header justify-content-center">
                <center>
                    <h2 class="modal-title text-dark text-center">{{ __('Customer registration') }}</h2>
                </center>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="container-fluid">
                    <form wire:submit.prevent='store' enctype="multipart/form-data">
                        @csrf
                        <div class="row g-4 mb-4">
                            <div class="col-sm-4">
                                <label for="First name" class="form-label">{{ __('First Name') }}</label>

                                <input id="first_name" type="text"
                                    class="form-control @error('first_name') is-invalid @enderror" name="first_name"
                                    placeholder="{{ __('Enter first name') }}" autocomplete="first_name" autofocus
                                    wire:model.debounce.500ms="first_name">

                                @error('first_name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror

                            </div>

                            <div class="col-sm-4">
                                <label for="Middle name" class="form-label">{{ __('Middle Name') }}</label>

                                <input id="middle_name" type="text"
                                    class="form-control @error('middle_name') is-invalid @enderror" name="middle_name"
                                    placeholder="{{ __('Enter middle name') }}" autocomplete="middle_name" autofocus
                                    wire:model.debounce.500ms="middle_name">

                                @error('middle_name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror

                            </div>

                            <div class="col-sm-4">
                                <label for="Last name" class="form-label">{{ __('Last Name') }}</label>

                                <input id="last_name" type="text"
                                    class="form-control @error('last_name') is-invalid @enderror" name="last_name"
                                    placeholder="{{ __('Enter last name') }}" autocomplete="last_name" autofocus
                                    wire:model.debounce.500ms="last_name">

                                @error('last_name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror

                            </div>

                            <div class="col-sm-4">
                                <label for="dob" class="form-label">{{ __('Date of Birth') }}</label>

                                <input id="dob" type="date"
                                    class="form-control @error('dob') is-invalid @enderror" name="dob"
                                    value="{{ old('dob') }}" autocomplete="dob"
                                    placeholder="{{ __('Enter date of birth') }}" wire:model.debounce.500ms="dob">

                                @error('dob')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="col-sm-4">
                                <label for="sex" class="form-label lable_color">{{ __('Sex') }}</label>
                                <div class="row ms-1">

                                    <div class="form-check col-sm-6">
                                        <input class="form-check-input" type="radio" name="sex" id="sex"
                                            value="{{ 'F' }}" wire:model.debounce.500ms="sex" required>
                                        <label class="form-check-label" for="sex">Female</label>
                                    </div>

                                    <div class="form-check col-sm-6">
                                        <input class="form-check-input" type="radio" name="sex" id="sex"
                                            value="{{ 'M' }}" wire:model.debounce.500ms="sex" required>
                                        <label class="form-check-label" for="sex">Male</label>
                                    </div>
                                </div>
                                @error('sex')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="col-sm-4">
                                <label for="phone_number" class="form-label">{{ __('Phone number') }}</label>

                                <input id="phone_number" placeholder="{{ __('Enter phone number') }}" type="number"
                                    class="form-control @error('phone_number') is-invalid @enderror"
                                    name="phone_number" value="{{ old('phone_number') }}"
                                    autocomplete="phone_number" wire:model.debounce.500ms="phone_number">

                                @error('phone_number')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror

                            </div>

                            <div class="col-sm-12">
                                <label for="email" class="form-label">{{ __('Email') }}</label>

                                <input id="email" placeholder="{{ __('Enter Email') }}" type="email"
                                    class="form-control @error('email') is-invalid @enderror" name="email"
                                    value="{{ old('email') }}" autocomplete="email"
                                    wire:model.debounce.500ms="email">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror

                            </div>

                            <div class="col-sm-3">
                                <label for="hno" class="form-label">{{ __('House number') }}</label>

                                <input id="hno" type="number"
                                    class="form-control @error('hno') is-invalid @enderror" name="hno"
                                    placeholder="{{ __('Enter House number') }}" autocomplete="hno" autofocus
                                    wire:model.debounce.500ms="hno">

                                @error('hno')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror

                            </div>

                            <div class="col-sm-3">
                                <label for="woreda" class="form-label">{{ __('Woreda') }}</label>

                                <input id="woreda" type="text"
                                    class="form-control @error('woreda') is-invalid @enderror" name="woreda"
                                    placeholder="{{ __('Enter woreda') }}" autocomplete="woreda" autofocus
                                    wire:model.debounce.500ms="woreda">

                                @error('woreda')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror

                            </div>

                            <div class="col-sm-3">
                                <label for="subCity" class="form-label">{{ __('Subcity') }}</label>

                                <input id="subCity" type="text"
                                    class="form-control @error('subCity') is-invalid @enderror" name="subCity"
                                    placeholder="{{ __('Enter subCity') }}" autocomplete="subCity" autofocus
                                    wire:model.debounce.500ms="subCity">

                                @error('subCity')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror

                            </div>

                            <div class="col-sm-3">
                                <label for="city" class="form-label">{{ __('City') }}</label>

                                <input id="city" type="text"
                                    class="form-control @error('city') is-invalid @enderror" name="city"
                                    autocomplete="city" placeholder="{{ __('Enter the city name') }}"
                                    wire:model.debounce.500ms="city">

                                @error('city')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror

                            </div>

                            <div class="col-sm-4">
                                <label for="country" class="form-label">{{ __('Country') }}</label>

                                <input id="country" type="text"
                                    class="form-control @error('country') is-invalid @enderror" name="country"
                                    autocomplete="country" placeholder="{{ __('Enter the country name') }}"
                                    wire:model.debounce.500ms="country">

                                @error('country')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="col-sm-4">
                                <label for="Nationality" class="form-label">{{ __('Nationality') }}</label>

                                <input id="nationality" type="text"
                                    class="form-control @error('nationality') is-invalid @enderror"
                                    name="nationality" placeholder="{{ __('Enter nationality') }}"
                                    autocomplete="nationality" autofocus wire:model.debounce.500ms="nationality">

                                @error('nationality')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror

                            </div>

                            <div class="col-sm-4">
                                <label for="business_type" class="form-label">{{ __('Buisness type') }}</label>

                                <input id="business_type" type="text"
                                    class="form-control @error('business_type') is-invalid @enderror"
                                    name="business_type" placeholder="{{ __('Enter Buisness type') }}"
                                    autocomplete="business_type" autofocus wire:model.debounce.500ms="business_type">

                                @error('business_type')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror

                            </div>

                            <div class="col-sm-4">
                                <label for="Group name" class="form-label">{{ __(' Group name') }}</label>

                                <input id="group_name" type="text"
                                    class="form-control @error('group_name') is-invalid @enderror" name="group_name"
                                    placeholder="{{ __('Enter group name') }}" autocomplete="group_name" autofocus
                                    wire:model.debounce.500ms="group_name">

                                @error('group_name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror

                            </div>

                            <div class="col-sm-5">
                                <label for="Remark" class="form-label">{{ __('Remark') }}</label>

                                <textarea id="remark" placeholder="{{ __('Enter remark') }}" type="text-field"
                                    class="form-control @error('remark') is-invalid @enderror" name="remark" value="{{ old('remark') }}"
                                    autocomplete="remark" wire:model="remark"></textarea>

                                @error('remark')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror

                            </div>

                            <div class="col-sm-3">
                                <label for="picture" class="form-label">{{ __('Picture') }}</label>

                                <input name="picture" type="file" class="form-control" wire:model="picture"
                                    required>
                                @error('picture')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="col-sm-12">
                                @if ($picture)
                                    <img class="mb-6 ms-5" src="{{ $picture->temporaryUrl() }}"
                                        style="max-width:10rem;min-height:10rem;">
                                @endif
                            </div>

                        </div>
                        <center>
                            <button type="submit" class="btn btn-primary" wire:target="store"
                                data-bs-dismiss="modal" data-backdrop="static" data-keyboard="false"
                                wire:loading.attr="disabled" {{ $notfilled ? 'disabled' : '' }}>
                                {{ __('Register') }}
                            </button>
                        </center>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
{{-- end of store customer modal --}}
