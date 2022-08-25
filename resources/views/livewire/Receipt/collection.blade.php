<div class="wrapper">

    {{-- @include('components.preloder') --}}

    @include('components.navbar')

    @include('components.sidebar')

    <div class="content-wrapper">

        <div class="col-md-12 mt-5">
            <div class="card">
                <div class="card-header">

                    <input type="text" class="form-control form-control-sm me-2" placeholder="Search" wire:model="search"
                        style="max-width:20rem; float:left">
                    <input type="date" class="form-control form-control-sm" placeholder="Search" wire:model="search"
                        style="max-width:20rem; float:left">

                </div>

                <div class="card-body">

                    <table class="table table-hover mt-5">
                        <thead class="thead-inverse|thead-default">
                            <tr>
                                <th class="fw-bold">Id</th>
                                <th class="fw-bold">Loan ID</th>
                                <th class="fw-bold">Amount</th>
                                <th class="fw-bold">Collected by</th>
                                <th class="fw-bold">Collected at</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($collections as $collection)
                                <tr>
                                    <td>
                                        <p class="fw-normal mb-1">{{ $collection->id }}</p>
                                    </td>
                                    <td>
                                        <p class="fw-normal mb-1">{{ $collection->loan_id }}</p>
                                    </td>
                                    <td>
                                        <p class="fw-normal mb-1">{{ $collection->amount }}</p>
                                    </td>
                                    <td>
                                        <p class="fw-normal mb-1">
                                            {{ $collection->user->first_name }}{{ ' ' }}{{ $collection->user->last_name }}
                                        </p>
                                    </td>
                                    <td>
                                        <p class="fw-normal mb-1">{{ $collection->created_at }}</p>
                                    </td>

                                    <td>

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
                            <h5>{{ $collections->links() }}</h5>
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


    </div>
    </section>

</div>

@include('components.footer')

</div>
