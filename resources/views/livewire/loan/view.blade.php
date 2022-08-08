<div class="col-md-12 mt-5">
    <div class="card">
        <div class="card-header">

            <input type="text" class="form-control form-control-sm" placeholder="Search" wire:model="search"
                style="max-width:20rem; float:left">

        </div>

        <div class="card-body">

            {{-- <table class="table align-middle mb-0 bg-white">
                            <thead class="bg-light">
                              <tr>
                                <th>Name</th>
                                <th>Title</th>
                                <th>Status</th>
                                <th>Position</th>
                                <th>Actions</th>
                              </tr>
                            </thead>
                            <tbody>
                              <tr>
                                <td>
                                  <div class="d-flex align-items-center">
                                    <img
                                        src="https://mdbootstrap.com/img/new/avatars/8.jpg"
                                        alt=""
                                        style="width: 45px; height: 45px"
                                        class="rounded-circle"
                                        />
                                    <div class="ms-3">
                                      <p class="fw-bold mb-1">John Doe</p>
                                      <p class="text-muted mb-0">john.doe@gmail.com</p>
                                    </div>
                                  </div>
                                </td>
                                <td>
                                  <p class="fw-normal mb-1">Software engineer</p>
                                  <p class="text-muted mb-0">IT department</p>
                                </td>
                                <td>
                                  <span class="badge badge-success rounded-pill d-inline">Active</span>
                                </td>
                                <td>Senior</td>
                                <td>
                                  <button type="button" class="btn btn-link btn-sm btn-rounded">
                                    Edit
                                  </button>
                                </td>
                              </tr>
                              <tr>
                                <td>
                                  <div class="d-flex align-items-center">
                                    <img
                                        src="https://mdbootstrap.com/img/new/avatars/6.jpg"
                                        class="rounded-circle"
                                        alt=""
                                        style="width: 45px; height: 45px"
                                        />
                                    <div class="ms-3">
                                      <p class="fw-bold mb-1">Alex Ray</p>
                                      <p class="text-muted mb-0">alex.ray@gmail.com</p>
                                    </div>
                                  </div>
                                </td>
                                <td>
                                  <p class="fw-normal mb-1">Consultant</p>
                                  <p class="text-muted mb-0">Finance</p>
                                </td>
                                <td>
                                  <span class="badge badge-primary rounded-pill d-inline"
                                        >Onboarding</span
                                    >
                                </td>
                                <td>Junior</td>
                                <td>
                                  <button
                                          type="button"
                                          class="btn btn-link btn-rounded btn-sm fw-bold"
                                          data-mdb-ripple-color="dark"
                                          >
                                    Edit
                                  </button>
                                </td>
                              </tr>
                              <tr>
                                <td>
                                  <div class="d-flex align-items-center">
                                    <img
                                        src="https://mdbootstrap.com/img/new/avatars/7.jpg"
                                        class="rounded-circle"
                                        alt=""
                                        style="width: 45px; height: 45px"
                                        />
                                    <div class="ms-3">
                                      <p class="fw-bold mb-1">Kate Hunington</p>
                                      <p class="text-muted mb-0">kate.hunington@gmail.com</p>
                                    </div>
                                  </div>
                                </td>
                                <td>
                                  <p class="fw-normal mb-1">Designer</p>
                                  <p class="text-muted mb-0">UI/UX</p>
                                </td>
                                <td>
                                  <span class="badge badge-warning rounded-pill d-inline">Awaiting</span>
                                </td>
                                <td>Senior</td>
                                <td>
                                  <button
                                          type="button"
                                          class="btn btn-link btn-rounded btn-sm fw-bold"
                                          data-mdb-ripple-color="dark"
                                          >
                                    Edit
                                  </button>
                                </td>
                              </tr>
                            </tbody>
                          </table> --}}

            <table class="table table-hover mt-5">
                <thead class="thead-inverse|thead-default">
                    <tr>
                        <th></th>
                        <th>Id</th>
                        <th>Customer</th>
                        <th>Collateral</th>
                        <th>Net amount</th>
                        <th>Starting date</th>
                        <th>Ending date</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($loans as $loan)
                        <tr>
                            <td></td>
                            <td>{{ $loan->id }}</td>
                            <td>{{ $loan->cust_id }}</td>
                            <td>{{ $loan->collateral }}</td>
                            <td>{{ $loan->net_amount }}</td>
                            <td>{{ $loan->starting_date }}</td>
                            <td>{{ $loan->ending_date }}</td>
                            <td>
                                <button class="btn btn-secondary btn-sm">view</button>
                                <button type="button" class="btn btn-warning btn-sm" data-bs-toggle="modal"
                                    data-bs-target="#editLoan" wire:click='editLoan({{ $loan->id }})'><i
                                        class="fa-regular fa-pen-to-square" aria-hidden="true"></i></button>
                                @include('livewire.loan.edit')
                                <button type="button" class="btn btn-success btn-sm"
                                    wire:click='withdraw({{ $loan->id }})'>Withdraw</button>
                                @include('livewire.loan.collect')
                                <button type="button" class="btn btn-info btn-sm" data-bs-toggle="modal"
                                    data-bs-target="#collect" wire:click='collect({{ $loan->id }})'>Collect</button>
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
            <div class="container " style="margin-top:1rem">
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
