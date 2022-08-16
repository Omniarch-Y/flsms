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
                               
                                <button type="button" class="btn btn-success btn-sm me-3"
                                    wire:click='activateModal({{ $loan->id }})'>Activate</button>
                                @include('livewire.inactive-loans.activate')
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
