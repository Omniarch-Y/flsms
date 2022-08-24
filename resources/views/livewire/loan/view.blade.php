<div class="col-md-12 mt-5">
    <div class="card">
        <div class="card-header">

            <input type="text" class="form-control form-control-sm" placeholder="Search" wire:model="search"
                style="max-width:20rem; float:left">

        </div>

        <div class="card-body">

            <table class="table table-hover mt-5">
                <thead class="thead-inverse|thead-default">
                    <tr>
                        <th class="fw-bold">Id</th>
                        <th class="fw-bold">Customer</th>
                        <th class="fw-bold">Collateral</th>
                        <th class="fw-bold">Net amount</th>
                        <th class="fw-bold">Starting date</th>
                        <th class="fw-bold">Ending date</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($loans as $loan)
                        <tr>
                            <td>
                                <p class="fw-normal mb-1">{{ $loan->id }}</p>
                            </td>
                            <td>
                                <p class="fw-normal mb-1">
                                    {{ $loan->customer->first_name }}{{ ' ' }}{{ $loan->customer->middle_name }}
                                </p>
                            </td>

                            <td>
                                <p class="fw-normal mb-1">{{ $loan->coll_id }}</p>
                            </td>
                            <td>
                                <p class="fw-normal mb-1">{{ $loan->net_amount }}</p>
                            </td>
                            <td>
                                <p class="fw-normal mb-1">{{ $loan->starting_date }}</p>
                            </td>
                            <td>
                                <p class="fw-normal mb-1">{{ $loan->ending_date }}</p>
                            </td>

                            <td>
                                <a class="btn btn-info btn-sm me-3"
                                    href="{{ url('loan-info' . '/' . $loan->id) }}">view</a>
                                <button type="button" class="btn btn-warning btn-sm me-3"
                                    wire:click='editLoan({{ $loan->id }})'><i class="fa-regular fa-pen-to-square"
                                        aria-hidden="true"></i></button>
                                @include('livewire.loan.edit')
                                <button type="button" class="btn btn-success btn-sm me-3" data-bs-toggle="modal"
                                    wire:click='acceptWithdrawal({{ $loan->id }})'>Withdraw</button>
                                @include('livewire.Receipt.withdrawalModal')
                                <button type="button" class="btn btn-info btn-sm"
                                    wire:click='collect({{ $loan->id }})'>Collect</button>
                                @include('livewire.loan.collect')
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td clospan="5"> No record found</td>
                        </tr>
                    @endforelse

                </tbody>
            </table>
            <div class="container" style="margin-top:1rem">
                <div class="d-flex justify-content-center align-items-center ">
                    <h5>{{ $loans->links() }}</h5>
                </div>
            </div>
        </div>
    </div>
</div>

@push('scripts')
    <script>
        // window.addEventListener('close-modal', e => {
        //     $('#registerCustomer').modal('hide');
        // });

        window.addEventListener('open-modal', e => {
            $('#issueLoan').modal('show');
        });

        window.addEventListener('editLoan-modal', e => {
            $('#editLoan').modal('show');
        });

        window.addEventListener('withdrawal-modal', e => {
            $('#withdrawalModal').modal('show');
        });

        window.addEventListener('collect-modal', e => {
            $('#collect').modal('show');
        });

        window.addEventListener('delete-modal', e => {
            $('#deleteCustomer').modal('show');
        });

        window.addEventListener('respond', e => {
            const Toast = Swal.mixin({
                toast: true,
                position: 'top-end',
                showConfirmButton: false,
                timer: 3000,
                timerProgressBar: true,
                didOpen: (toast) => {
                    toast.addEventListener('mouseenter', Swal.stopTimer)
                    toast.addEventListener('mouseleave', Swal.resumeTimer)
                }
            })

            Toast.fire({
                icon: e.detail.icon,
                title: e.detail.title
            })
        });
    </script>
@endpush
