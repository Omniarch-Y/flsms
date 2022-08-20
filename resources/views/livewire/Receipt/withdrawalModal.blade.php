{{-- start of delete customer modal --}}

<div wire:ignore.self class="modal fade" id="withdrawalModal" tabindex="-1" role="dialog" aria-labelledby="modelTitleId"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog modal-md modal-danger" role="document">
        <div class="modal-content">
            <div class="modal-header justify-content-center">
                <center>
                    <h4 class="modal-title text-dark text-center">{{ __('Withdraw Loan') }}</h4>
                </center>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form wire:submit.prevent='withdraw' enctype="multipart/form-data">
                @csrf
                <div class="modal-body">
                    <div class="container-fluid">

                        <h5>Continue withdrawing loan ?</h5>
                    </div>
                </div>
                <center>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-success" wire:target="withdraw" data-bs-dismiss="modal"
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
