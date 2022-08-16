{{-- start of delete customer modal --}}

<div wire:ignore.self class="modal fade" id="deleteCustomer" tabindex="-1" role="dialog" aria-labelledby="modelTitleId"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog modal-md modal-danger" role="document">
        <div class="modal-content">
            <div class="modal-header justify-content-center">
                <center>
                    <h4 class="modal-title text-dark text-center">{{ __('Delete customer') }}</h4>
                </center>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form wire:submit.prevent='destroy' enctype="multipart/form-data">
                @csrf
                <div class="modal-body">
                    <div class="container-fluid">

                        <h5>Are you you want to continue ?</h5>
                    </div>
                </div>
                <center>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-danger" wire:target="destroy" data-bs-dismiss="modal"
                            wire:loading.attr='disabled'>
                            {{ __('Yes') }}
                        </button>
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">No</button>
                    </div>

                </center>
            </form>
        </div>
    </div>
</div>

{{-- end of delete customer modal --}}
