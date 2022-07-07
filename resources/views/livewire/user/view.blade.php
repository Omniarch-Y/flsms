<div class="container mt-5">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">

                        <input type="text" class="form-control form-control-sm" placeholder="Search" wire:model="search" style="max-width:20rem; float:left">

                    <button class="btn btn-sm btn-outline-primary" data-bs-toggle="modal" data-bs-target="#registerUser" style="float:right">Add user</button>
                    @include('livewire.user.store')
                </div>

                <div class="card-body">
                    {{-- <div> --}}
                        @if (session()->has('message'))
                        <center>
                            <div class="alert alert-success text-center col-sm-6">
                                {{ session('message') }}
                            </div>
                        </center>
                        @endif
                    {{-- </div> --}}

                    <table class="table table-hover mt-5">
                        <thead class="thead-inverse|thead-default">
                           <tr>
                              <th></th>
                              <th>Name</th>
                              <th>Sex</th>
                              <th>Date of birth</th>
                              <th>Phone</th>
                              <th>Email</th>
                              <th>role</th>
                              <th>Nationality</th>
                              <th></th>  
                           </tr>
                        </thead>
                        <tbody>
                           @forelse ($users as $user )
                           <tr>
                            
                              <td scope="row"><img src="{{ Storage::url($user->picture) }}" style="max-width:3rem;min-height:3rem;"></td>
                              <td>{{ $user->first_name }}{{' '}}{{ $user->middle_name }}{{' '}}{{ $user->last_name }}</td>
                              <td>{{ $user->sex }}</td>
                              <td>{{ $user->dob }}</td>
                              <td>{{ $user->phone_number }}</td>
                              <td>{{ $user->email }}</td>
                              <td>{{ $user->role }}</td>
                              <td>{{ $user->nationality }}</td>
                              <td>
                                  <button class="btn btn-secondary btn-sm">view</button>
                                  <button type="button" class="btn btn-warning btn-sm" data-bs-toggle="modal" data-bs-target="#editUser" wire:click='editUser({{ $user->id }})'>Edit</button>
                                  @include('livewire.user.edit')
                                  <button type="button" class="btn btn-danger btn-sm" data-bs-toggle="modal" data-swal-template="#my-template" data-bs-target="#deleteUser" wire:click='deleteUser({{ $user->id}})'>Delete</button>
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

        window.addEventListener('open-modal', event => {
            $('#registerCustomer').modal('show');
        });

        window.addEventListener('deleted', e => {
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

        window.addEventListener('created', e => {
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
        window.addEventListener('updated', e => {
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