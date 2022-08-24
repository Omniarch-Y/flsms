<div class="container mt-5">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">

                    <input type="text" class="form-control form-control-sm" placeholder="Search" wire:model="search"
                        style="max-width:20rem; float:left">

                    <button class="btn btn-sm btn-outline-primary" data-bs-toggle="modal" data-bs-target="#registerUser"
                        style="float:right">Add user</button>
                    @include('livewire.user.store')
                </div>

                <div class="card-body">

                    @if (session()->has('message'))
                        <center>
                            <div class="alert alert-success text-center col-sm-6">
                                {{ session('message') }}
                            </div>
                        </center>
                    @endif

                    <table class="table table-hover mt-5">
                        <thead class="thead-inverse|thead-default">
                            <tr>
                                <th></th>
                                <th class="fw-bold">Name</th>
                                <th class="fw-bold">Sex</th>
                                <th class="fw-bold">Date of birth</th>
                                <th class="fw-bold">Phone</th>
                                <th class="fw-bold">role</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($users as $user)
                                <tr>

                                    <td scope="row"><img src="{{ Storage::url($user->picture) }}"
                                            style="max-width:3rem;min-height:3rem;" class="rounded-circle"></td>
                                    <td>
                                        <p class="fw-normal mb-1">
                                            {{ $user->first_name }}{{ ' ' }}{{ $user->middle_name }}{{ ' ' }}{{ $user->last_name }}
                                        </p>
                                        <p class="text-muted mb-0">{{ $user->email }}</p>
                                    </td>
                                    <td>
                                        <p class="fw-normal mb-1">{{ $user->sex }}</p>
                                    </td>
                                    <td>
                                        <p class="fw-normal mb-1">{{ $user->dob }}</p>
                                    </td>
                                    <td>
                                        <p class="fw-normal mb-1">{{ $user->phone_number }}</p>
                                    </td>
                                    <td>
                                        <p class="fw-normal mb-1">{{ $user->role }}</p>
                                    </td>
                                    <td>
                                        <a class="btn btn-info btn-sm me-5 "
                                            href="{{ url('user-info' . '/' . $user->id) }}">view</a>
                                        <button type="button" class="btn btn-warning btn-sm me-3"
                                            data-bs-toggle="modal" data-bs-target="#editUser"
                                            wire:click='editUser({{ $user->id }})'><i
                                                class="fa-regular fa-pen-to-square" aria-hidden="true"></i></button>
                                        @include('livewire.user.edit')
                                        <button type="button" class="btn btn-danger btn-sm"
                                            wire:click='deleteUser({{ $user->id }})'><i class="fa fa-trash"
                                                aria-hidden="true"></i></button>
                                        @include('livewire.user.delete')
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
                            <h5>{{ $users->links() }}</h5>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@push('scripts')
    <script>
        window.addEventListener('close-modal', event => {
            $('#registerCustomer').modal('hide');
        });


        window.addEventListener('hide-deleteUser', event => {
            $('#deleteUser').modal('hide');
        });

        window.addEventListener('deleteUser', event => {
            $('#deleteUser').modal('show');
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
