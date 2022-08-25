<div class="wrapper">

    {{-- @include('components.preloder') --}}

    @include('components.navbar')

    @include('components.sidebar')

    <div class="content-wrapper">

        {{-- <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Dashboard</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">Dashboard v1</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div> --}}

        <section class="content">
            <div class="container-fluid">

                <div class="col-md-12 mt-5">
                    <div class="card">
                        <div class="card-header">

                            <input type="text" class="form-control form-control-sm me-2" placeholder="Search"
                                wire:model="search" style="max-width:20rem; float:left">
                            <input type="date" class="form-control form-control-sm" placeholder="Search"
                                wire:model="search" style="max-width:20rem; float:left">

                        </div>

                        <div class="card-body">

                            <table class="table table-hover mt-5">
                                <thead class="thead-inverse|thead-default">
                                    <tr>
                                        <th class="fw-bold">Id</th>
                                        <th class="fw-bold">Loan ID</th>
                                        <th class="fw-bold">Amount</th>
                                        <th class="fw-bold">Service charge</th>
                                        <th class="fw-bold">Withdrawn by</th>
                                        <th class="fw-bold">Withdrawn at</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($withdrawals as $withdrawal)
                                        <tr>
                                            <td>
                                                <p class="fw-normal mb-1">{{ $withdrawal->id }}</p>
                                            </td>
                                            <td>
                                                <p class="fw-normal mb-1">{{ $withdrawal->loan_id }}</p>
                                            </td>
                                            <td>
                                                <p class="fw-normal mb-1">{{ $withdrawal->loan->net_amount }}</p>
                                            </td>
                                            <td>
                                                <p class="fw-normal mb-1">{{ $withdrawal->loan->service_charge }}</p>
                                            </td>
                                            <td>
                                                <p class="fw-normal mb-1">
                                                    {{ $withdrawal->user->first_name }}{{ ' ' }}{{ $withdrawal->user->last_name }}
                                                </p>
                                            </td>
                                            <td>
                                                <p class="fw-normal mb-1">{{ $withdrawal->created_at }}</p>
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
                                    <h5>{{ $withdrawals->links() }}</h5>
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
