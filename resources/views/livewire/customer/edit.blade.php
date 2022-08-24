{{-- start of edit customer modal --}}

<div wire:ignore.self class="modal fade" id="editCustomer" tabindex="-1" role="dialog" aria-labelledby="modelTitleId"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-xl" role="document">
        <div class="modal-content">
            <div class="modal-header justify-content-center">
                <center>
                    <h2 class="modal-title text-dark text-center">{{ __('Update Customer') }}</h2>
                </center>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="container-fluid">
                    <form wire:submit.prevent='update' enctype="multipart/form-data">
                        @csrf
                        <div class="row g-4 mb-4">
                            <div class="col-sm-4">
                                <label for="First name" class="form-lable text-dark">{{ __('First Name') }}</label>

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
                                <label for="Middle name" class="form-lable text-dark">{{ __('Middle Name') }}</label>

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
                                <label for="Last name" class="form-lable text-dark">{{ __('Last Name') }}</label>

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
                                <label for="dob" class="form-lable text-dark">{{ __('Date of Birth') }}</label>

                                <input id="dob" type="date"
                                    class="form-control @error('dob') is-invalid @enderror" name="dob"
                                    autocomplete="dob" placeholder="{{ __('Enter date of birth') }}"
                                    wire:model.debounce.500ms="dob">

                                @error('dob')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="col-sm-4">
                                <label for="sex" class="form-lable text-dark lable_color">{{ __('Sex') }}</label>
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
                                <label for="phone_number" class="form-lable text-dark">{{ __('Phone number') }}</label>

                                <input id="phone_number" placeholder="{{ __('Enter phone number') }}" type="number"
                                    class="form-control @error('phone_number') is-invalid @enderror" name="phone_number"
                                    autocomplete="phone_number" wire:model.debounce.500ms="phone_number">

                                @error('phone_number')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror

                            </div>

                            <div class="col-sm-3">
                                <label for="hno" class="form-lable text-dark">{{ __('House number') }}</label>

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
                                <label for="woreda" class="form-lable text-dark">{{ __('Woreda') }}</label>

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
                                <label for="subCity" class="form-lable text-dark">{{ __('Subcity') }}</label>

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
                                <label for="city" class="form-lable text-dark">{{ __('City') }}</label>

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
                                <label for="country" class="form-lable text-dark">{{ __('Country') }}</label>

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
                                <label for="Nationality" class="form-lable text-dark">{{ __('Nationality') }}</label>

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
                                <label for="business_type" class="form-lable text-dark">{{ __('Buisness type') }}</label>

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
                                <label for="Group name" class="form-lable text-dark">{{ __(' Group name') }}</label>

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

                            <div class="col-sm-8">
                                <label for="Remark" class="form-lable text-dark">{{ __('Remark') }}</label>

                                <textarea id="remark" placeholder="{{ __('Enter remark') }}" type="text-field"
                                    class="form-control @error('remark') is-invalid @enderror" name="remark" value="{{ old('remark') }}"
                                    autocomplete="remark" wire:model="remark"></textarea>

                                @error('remark')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror

                            </div>

                            <div class="col-sm-4">
                                <label for="file_attachment" class="form-lable text-dark">{{ __('File attachment') }}</label>

                                <input name="file_attachment" type="file" class="form-control" wire:model="file_attachment">
                                @error('file_attachment')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="col-sm-4">
                                <label for="picture" class="form-lable text-dark">{{ __('Picture') }}</label>

                                <input name="picture" type="file" class="form-control" wire:model="picture">
                                @error('picture')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="col-sm-4">
                                <center>
                                @if ($picture)
                                    <img class="mb-6 me-5" src="{{ $picture->temporaryUrl() }}"
                                        style="max-width:10rem; min-height:10rem; float:right">
                                @endif
                            </center>
                            </div>

                        </div>
                        <center>
                            <button type="submit" class="btn btn-primary" wire:target="update"
                                data-bs-dismiss="modal" wire:loading.attr='disabled'>
                                {{ __('Update') }}
                            </button>
                        </center>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
{{-- end of edit customer modal --}}
