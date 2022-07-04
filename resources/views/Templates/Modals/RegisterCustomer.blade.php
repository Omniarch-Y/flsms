{{-- <!-- Start of Modal for adding new Item -->
<div wire:ignore.self class="modal fade" id="registerCustomerr" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-xl" role="document">
       <div class="modal-content">
             <div class="modal-header justify-content-center">
                <center>
                    <h2 class="modal-title text-dark text-center "style=" justify-content-center">{{ __('Customer registration') }}</h2>
                </center>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
          <div class="modal-body">
<div class="container mt-5">
    <form wire:submit.prevent='store' enctype="multipart/form-data">
        @csrf
        <div class="row g-4 mb-4">
        <div class="col-sm-4">
            <label for="First name" class="form-label">{{ __('First Name') }}</label>

                <input id="first_name" type="text" class="form-control @error('first_name') is-invalid @enderror" name="first_name" placeholder="{{ __('Enter first name')}}" autocomplete="first_name" autofocus wire:model.debounce.500ms="first_name">

                @error('first_name')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror

        </div>

        <div class="col-sm-4">
           <label for="Middle name" class="form-label">{{ __('Middle Name') }}</label>

               <input id="middle_name" type="text" class="form-control @error('middle_name') is-invalid @enderror" name="middle_name" placeholder="{{ __('Enter middle name')}}"   autocomplete="middle_name" autofocus  wire:model.debounce.500ms="middle_name">

               @error('middle_name')
                   <span class="invalid-feedback" role="alert">
                       <strong>{{ $message }}</strong>
                   </span>
               @enderror

       </div>

       <div class="col-sm-4">
           <label for="Last name" class="form-label">{{ __('Last Name') }}</label>

               <input id="last_name"  type="text" class="form-control @error('last_name') is-invalid @enderror" name="last_name" placeholder="{{ __('Enter last name')}}"   autocomplete="last_name" autofocus  wire:model.debounce.500ms="last_name">

               @error('last_name')
                   <span class="invalid-feedback" role="alert">
                       <strong>{{ $message }}</strong>
                   </span>
               @enderror

       </div>
        
    <div class="col-sm-4">    
        <label for="dob" class="form-label">{{ __('Date of Birth') }}</label>

        <input id="dob" type="date" class="form-control @error('dob') is-invalid @enderror" name="dob" value="{{ old('dob') }}" autocomplete="dob" placeholder="{{ __('Enter date of birth') }}"  wire:model.debounce.500ms="dob">

        @error('dob')
           <span class="invalid-feedback" role="alert">
               <strong>{{ $message }}</strong>
           </span>
        @enderror
    </div>

    <div class="col-md-4">    
       <label for="sex" class="form-label">{{ __('Sex') }}</label>
           <div class="col-sm-4">
           <input type="radio" name="sex" class="form-check-input" id="sex" value="{{ __('F') }}" wire:model.debounce.500ms="sex">
           <label class="form-check-label" for="sex">Female</label>

           <input type="radio" name="sex" class="form-check-input ms-2" id="sex" value="{{ __('M') }}" wire:model.debounce.500ms="sex">
           <label class="form-check-label" for="sex">Male</label>
       </div>
   </div>

       <div class="col-sm-4">
           <label for="phone_number" class="form-label">{{ __('Phone number') }}</label>

               <input id="phone_number"  placeholder="{{ __('Enter phone number') }}" type="number" class="form-control @error('phone_number') is-invalid @enderror" name="phone_number" value="{{ old('phone_number') }}" autocomplete="phone_number"  wire:model.debounce.500ms="phone_number">

               @error('phone_number')
                   <span class="invalid-feedback" role="alert">
                       <strong>{{ $message }}</strong>
                   </span>
               @enderror

       </div>

       <div class="col-sm-3">
           <label for="hno" class="form-label">{{ __('House number') }}</label>

               <input id="hno" type="number" class="form-control @error('hno') is-invalid @enderror" name="hno" placeholder="{{ __('Enter House number')}}"  autocomplete="hno" autofocus  wire:model.debounce.500ms="hno">

               @error('hno')
                   <span class="invalid-feedback" role="alert">
                       <strong>{{ $message }}</strong>
                   </span>
               @enderror
           
       </div>

       <div class="col-sm-3">
           <label for="woreda" class="form-label">{{ __('Woreda') }}</label>

               <input id="woreda" type="number" class="form-control @error('woreda') is-invalid @enderror" name="woreda" placeholder="{{ __('Enter woreda')}}"  autocomplete="woreda" autofocus  wire:model.debounce.500ms="woreda">

               @error('woreda')
                   <span class="invalid-feedback" role="alert">
                       <strong>{{ $message }}</strong>
                   </span>
               @enderror
           
       </div>

       <div class="col-sm-3">
           <label for="subCity" class="form-label">{{ __('Subcity') }}</label>

               <input id="subCity" type="text" class="form-control @error('subCity') is-invalid @enderror" name="subCity" placeholder="{{ __('Enter subCity')}}"  autocomplete="subCity" autofocus  wire:model.debounce.500ms="subCity">

               @error('subCity')
                   <span class="invalid-feedback" role="alert">
                       <strong>{{ $message }}</strong>
                   </span>
               @enderror
           
       </div>

       <div class="col-sm-3">
           <label for="city" class="form-label">{{ __('City') }}</label>

               <input id="city" type="text" class="form-control @error('city') is-invalid @enderror" name="city" autocomplete="city" placeholder="{{ __('Enter the city name') }}"  wire:model.debounce.500ms="city">

               @error('city')
                   <span class="invalid-feedback" role="alert">
                       <strong>{{ $message }}</strong>
                   </span>
               @enderror
               
       </div>

       <div class="col-sm-4">
           <label for="country" class="form-label">{{ __('Country') }}</label>

               <input id="country" type="text" class="form-control @error('country') is-invalid @enderror" name="country" autocomplete="country" placeholder="{{ __('Enter the country name') }}"  wire:model.debounce.500ms="country">

               @error('country')
                   <span class="invalid-feedback" role="alert">
                       <strong>{{ $message }}</strong>
                   </span>
               @enderror        
       </div>

       <div class="col-sm-4">
       <label for="Nationality" class="form-label">{{ __('Nationality') }}</label>

                <input id="nationality" type="text" class="form-control @error('nationality') is-invalid @enderror" name="nationality" placeholder="{{ __('Enter nationality')}}"   autocomplete="nationality" autofocus  wire:model.debounce.500ms="nationality">

                @error('nationality')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror

       </div>

        <div class="col-sm-4">
           <label for="business_type" class="form-label">{{ __('Buisness type') }}</label>

               <input id="business_type" type="text" class="form-control @error('business_type') is-invalid @enderror" name="business_type" placeholder="{{ __('Enter Buisness type')}}"   autocomplete="business_type" autofocus  wire:model.debounce.500ms="business_type">

               @error('business_type')
                   <span class="invalid-feedback" role="alert">
                       <strong>{{ $message }}</strong>
                   </span>
               @enderror

       </div>

       <div class="col-sm-4">
           <label for="group_id" class="form-label lable_color">{{ __('Group') }}</label>

           <select class="form-control" id="group_id" name="group_id" focus wire:model.debounce.500ms="group_id">
               
               <option value="1" selected>weeee</option>
               
               <option value="Select Role" disabled selected>Click to Select Group</option>       
           </select>
       </div>

        <div class="col-sm-4">
            <label for="picture" class="form-label">{{ __('Picture') }}</label>

          <input name="picture" type="text" class="form-control" value="sfsd"  wire:model.debounce.500ms="picture">
                @error('picture')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
        </div>

</div>
<center>
<button type="submit" class="btn btn-primary" wire:target="store" wire:loading.attr='disabled'>
{{ __('Register') }}
</button>
</center>
</form>
</div>
</div>
</div>
</div>
</div> --}}