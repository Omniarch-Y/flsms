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
                    <form wire:submit.prevent='collectL'>
                        @csrf
                        <div class="row g-4 mb-4">

                            <div class="col-sm-12">
                                <label for="collected_amount" class="form-lable text-dark">{{ __('Amount') }}</label>

                                <input id="collected_amount" type="number"
                                    class="form-control @error('collected_amount') is-invalid @enderror"
                                    name="collected_amount" placeholder="{{ __('Enter collected amount') }}"
                                    required autocomplete="collected_amount" autofocus required
                                    wire:model="collected_amount">

                                @error('collected_amount')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror

                            </div>

                            <input id="collected_amount" type="text"
                                     @error('collected_amount') is-invalid @enderror"
                                    name="collected_amount" placeholder="{{ __('Enter requested collected_amount') }}"
                                    required autocomplete="collected_amount" autofocus required
                                    wire:model="play" readonly style="border:none; color:red">
                            {{-- <div class="col-sm-4">
                                <label for="Penality" class="form-lable text-dark">{{ __('Penality') }}</label>

                                <input id="penality" type="number"
                                    class="form-control @error('penality') is-invalid @enderror"
                                    name="penality" placeholder="{{ __('Enter interest rate') }}" required
                                    autocomplete="penality" autofocus required wire:model="penality">

                                @error('penality')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror

                            </div> --}}

                        </div>
                        <center>
                            <button type="submit" class="btn btn-primary" wire:target="collectL"
                                data-bs-dismiss="modal" wire:loading.attr="disabled">
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
