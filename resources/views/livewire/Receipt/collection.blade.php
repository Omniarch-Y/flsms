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

                {{-- <div class="row">
                    <div class="col-lg-3 col-6">

                        <div class="small-box bg-info">
                            <div class="inner">
                                <h3>150</h3>
                                <p>New Orders</p>
                            </div>
                            <div class="icon">
                                <i class="ion ion-bag"></i>
                            </div>
                            <a href="#" class="small-box-footer">More info <i
                                    class="fas fa-arrow-circle-right"></i></a>
                        </div>
                    </div>

                    <div class="col-lg-3 col-6">

                        <div class="small-box bg-success">
                            <div class="inner">
                                <h3>53<sup style="font-size: 20px">%</sup></h3>
                                <p>Bounce Rate</p>
                            </div>
                            <div class="icon">
                                <i class="ion ion-stats-bars"></i>
                            </div>
                            <a href="#" class="small-box-footer">More info <i
                                    class="fas fa-arrow-circle-right"></i></a>
                        </div>
                    </div>

                    <div class="col-lg-3 col-6">

                        <div class="small-box bg-warning">
                            <div class="inner">
                                <h3>44</h3>
                                <p>User Registrations</p>
                            </div>
                            <div class="icon">
                                <i class="ion ion-person-add"></i>
                            </div>
                            <a href="#" class="small-box-footer">More info <i
                                    class="fas fa-arrow-circle-right"></i></a>
                        </div>
                    </div>

                    <div class="col-lg-3 col-6">

                        <div class="small-box bg-danger">
                            <div class="inner">
                                <h3>65</h3>
                                <p>Unique Visitors</p>
                            </div>
                            <div class="icon">
                                <i class="ion ion-pie-graph"></i>
                            </div>
                            <a href="#" class="small-box-footer">More info <i
                                    class="fas fa-arrow-circle-right"></i></a>
                        </div>
                    </div>

                </div> --}}

                <div class="col-md-12 mt-5">
                    <div class="card">
                        <div class="card-header">

                            <input type="text" class="form-control form-control-sm me-2" placeholder="Search"
                                wire:model="search" style="max-width:20rem; float:left">
                                <input type="date" class="form-control form-control-sm" placeholder="Search"
                                wire:model="search" style="max-width:20rem; float:left">

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
                                                <p class="fw-normal mb-1">{{ $collection->user->first_name }}{{' '}}{{ $collection->user->last_name }}</p>
                                            </td>
                                            <td>
                                                <p class="fw-normal mb-1">{{ $collection->created_at }}</p>
                                            </td>

                                            <td>

                                                <button type="button" class="btn btn-success btn-sm me-3">View</button>
                                                {{-- wire:click='activateModal({{ $loan->id }})' --}}
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
