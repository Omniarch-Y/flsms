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
                                <button type="button" class="btn btn-warning btn-sm me-3"
                                    wire:click='editLoan({{ $loan->id }})'><i class="fa-regular fa-pen-to-square"
                                        aria-hidden="true"></i></button>
                                @include('livewire.inactive-loans.edit')
                                <button type="button" class="btn btn-success btn-sm me-3"
                                    wire:click='activateModal({{ $loan->id }})'>Activate</button>
                                @include('livewire.inactive-loans.activate')
                                <button type="button" class="btn btn-danger btn-sm me-3"
                                    wire:click='deleteLoan({{ $loan->id }})'><i class="fa fa-trash"
                                        aria-hidden="true"></i></button>
                                @include('livewire.inactive-loans.delete')
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
        window.addEventListener('activate-modal', e => {
            $('#activateModal').modal('show');
        });

        window.addEventListener('editLoan-modal', e => {
            $('#editLoan').modal('show');
        });
        
        window.addEventListener('activate-modal', e => {
            $('#activateModal').modal('show');
        });

        window.addEventListener('delete-modal', e => {
            $('#deleteLoan').modal('show');
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
