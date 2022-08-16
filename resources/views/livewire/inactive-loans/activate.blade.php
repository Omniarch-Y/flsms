{{-- start of delete customer modal --}}

<div wire:ignore.self class="modal fade" id="activateModal" tabindex="-1" role="dialog" aria-labelledby="modelTitleId"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog modal-md modal-danger" role="document">
        <div class="modal-content">
            <div class="modal-header justify-content-center">
                <center>
                    <h4 class="modal-title text-dark text-center">{{ __('Activate Loan') }}</h4>
                </center>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form wire:submit.prevent='activateLoan' enctype="multipart/form-data">
                @csrf
                <div class="modal-body">
                    <div class="container-fluid">

                        <h5>Continue activating loan ?</h5>
                    </div>
                </div>
                <center>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-success" wire:target="activateLoan" data-bs-dismiss="modal"
                            wire:loading.attr='disabled'>
                            {{ __('Yes') }}
                        </button>
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">{{ __('No') }}</button>
                    </div>

                </center>
            </form>
        </div>
    </div>
</div>

{{-- end of delete customer modal --}}
