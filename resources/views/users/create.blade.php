@extends('layouts.app')

@section('content')
             <div class="container">
                     <form method="POST" action="{{'registerUser'}} " enctype="multipart/form-data">
                         @csrf
                         <div class="row g-4 mb-4">
                         <div class="col-sm-4">
                             <label for="First name" class="form-label">{{ __('First Name') }}</label>

                                 <input id="first_name" type="text" class="form-control @error('first_name') is-invalid @enderror" name="first_name" placeholder="{{ __('Enter first name')}}" autocomplete="first_name" autofocus wire:model="first_name">
 
                                 @error('first_name')
                                     <span class="invalid-feedback" role="alert">
                                         <strong>{{ $message }}</strong>
                                     </span>
                                 @enderror

                         </div>

                         <div class="col-sm-4">
                            <label for="Middle name" class="form-label">{{ __('Middle Name') }}</label>

                                <input id="middle_name" type="text" class="form-control @error('middle_name') is-invalid @enderror" name="middle_name" placeholder="{{ __('Enter middle name')}}"  required autocomplete="middle_name" autofocus required wire:model="middle_name">

                                @error('middle_name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror

                        </div>

                        <div class="col-sm-4">
                            <label for="Last name" class="form-label">{{ __('Last Name') }}</label>

                                <input id="last_name"  type="text" class="form-control @error('last_name') is-invalid @enderror" name="last_name" placeholder="{{ __('Enter last name')}}"  required autocomplete="last_name" autofocus required wire:model="last_name">

                                @error('last_name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror

                        </div>
                         
                     <div class="col-sm-4">    
                         <label for="dob" class="form-label">{{ __('Date of Birth') }}</label>

                         <input id="dob" type="date" class="form-control @error('dob') is-invalid @enderror" name="dob" value="{{ old('dob') }}" autocomplete="dob" placeholder="{{ __('Enter date of birth') }}" required wire:model="dob">

                         @error('dob')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                         @enderror
                     </div>

                     <div class="col-md-4">    
                        <label for="sex" class="form-label">{{ __('Sex') }}</label>
                            <div class="col-sm-4">
                            <input type="radio" name="sex" class="form-check-input" id="sex" value="{{ __('F') }}">
                            <label class="form-check-label" for="sex">Female</label>

                            <input type="radio" name="sex" class="form-check-input ms-2" id="sex" value="{{ __('M') }}">
                            <label class="form-check-label" for="sex">Male</label>
                        </div>
                    </div>

                        <div class="col-sm-4">
                            <label for="phone_number" class="form-label">{{ __('Phone number') }}</label>

                                <input id="phone_number"  placeholder="{{ __('Enter phone number') }}" type="number" class="form-control @error('phone_number') is-invalid @enderror" name="phone_number" value="{{ old('phone_number') }}" autocomplete="phone_number" required wire:model="phone_number">

                                @error('phone_number')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror

                        </div>

                        <div class="col-sm-12">
                            <label for="email" class="form-label">{{ __('Email') }}</label>

                                <input id="email"  placeholder="{{ __('Enter Email') }}" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" autocomplete="email" required wire:model="email">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror

                        </div>

                        <div class="col-sm-3">
                            <label for="hno" class="form-label">{{ __('House number') }}</label>
    
                                <input id="hno" type="number" class="form-control @error('hno') is-invalid @enderror" name="hno" placeholder="{{ __('Enter House number')}}" required autocomplete="hno" autofocus required wire:model="hno">
    
                                @error('hno')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            
                        </div>

                        <div class="col-sm-3">
                            <label for="woreda" class="form-label">{{ __('Woreda') }}</label>
    
                                <input id="woreda" type="text" class="form-control @error('woreda') is-invalid @enderror" name="woreda" placeholder="{{ __('Enter woreda')}}" required autocomplete="woreda" autofocus required wire:model="woreda">
    
                                @error('woreda')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            
                        </div>

                        <div class="col-sm-3">
                            <label for="subCity" class="form-label">{{ __('Subcity') }}</label>
    
                                <input id="subCity" type="text" class="form-control @error('subCity') is-invalid @enderror" name="subCity" placeholder="{{ __('Enter subCity')}}" required autocomplete="subCity" autofocus required wire:model="subCity">
    
                                @error('subCity')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            
                        </div>
            
                        <div class="col-sm-3">
                            <label for="city" class="form-label">{{ __('City') }}</label>
    
                                <input id="city" type="text" class="form-control @error('city') is-invalid @enderror" name="city" autocomplete="city" placeholder="{{ __('Enter the city name') }}" required wire:model="city">
    
                                @error('city')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                                
                        </div>
    
                        <div class="col-sm-4">
                            <label for="country" class="form-label">{{ __('Country') }}</label>
    
                                <input id="country" type="text" class="form-control @error('country') is-invalid @enderror" name="country" autocomplete="country" placeholder="{{ __('Enter the country name') }}" required wire:model="country">
    
                                @error('country')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror        
                        </div>

                        <div class="col-sm-4">
                        <label for="Nationality" class="form-label">{{ __('Nationality') }}</label>

                                 <input id="nationality" type="text" class="form-control @error('nationality') is-invalid @enderror" name="nationality" placeholder="{{ __('Enter nationality')}}"  required autocomplete="nationality" autofocus required wire:model="nationality">
 
                                 @error('nationality')
                                     <span class="invalid-feedback" role="alert">
                                         <strong>{{ $message }}</strong>
                                     </span>
                                 @enderror
                        </div>
 
                         <div class="col-sm-4">
                             <label for="picture" class="form-label">{{ __('Picture') }}</label>

                           <input name="picture" type="file" class="form-control" required wire:model="picture">
                                 @error('picture')
                                     <span class="invalid-feedback" role="alert">
                                         <strong>{{ $message }}</strong>
                                     </span>
                                 @enderror
                         </div>

                         <div class="col-sm-4">    
                            <label for="role" class="form-label">{{ __('Role') }}</label>
   
                                   <select class="form-control" id="role" name="role" required focus>
                                             
                                       <option value="loan_officer" selected>Loan officer</option>
                                       <option value="encoder" selected>Encoder</option> 
                                       <option value="manager" selected>Manager</option>
                                       <option value="admin" selected>Admin</option>        

                                   <option value="Select Role" disabled selected>Click to Select Category</option>       
                               </select>
                           </div>

                         <div class="col-sm-4">
                            <label for="password" class="form-label">{{ __('Password') }}</label>

                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                        </div>

                        <div class="col-sm-4">
                            <label for="password-confirm" class="form-label">{{ __('Confirm Password') }}</label>

                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                        </div>
    
          </div>
        <center>
             <button type="submit" class="btn btn-primary" wire:model="registerCustomer">
                {{ __('Register') }}
            </button>
        </center>
         </form>
        </div>
      </div>
@endsection