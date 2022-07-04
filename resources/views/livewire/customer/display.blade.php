<div class="container mt-5">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">

                        <input type="text" class="form-control form-control-sm" placeholder="Search" wire:model="search" style="max-width:20rem; float:left">

                    <button class="btn btn-sm btn-outline-primary" data-bs-toggle="modal" data-bs-target="#registerCustomer" style="float:right">Add customer</button>
                    @include('livewire.customer.store')
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
                              <th>Nationality</th>
                              <th></th>  
                           </tr>
                        </thead>
                        <tbody>
                           @forelse ($customers as $customer )
                           <tr>
                            
                              <td scope="row"><img class="mb-6 ms-5" src="{{ Storage::url($customer->picture) }}" style="max-width:3rem;min-height:3rem;"></td>
                              <td>{{ $customer->first_name }}{{' '}}{{ $customer->middle_name }}{{' '}}{{ $customer->last_name }}</td>
                              <td>{{ $customer->sex }}</td>
                              <td>{{ $customer->dob }}</td>
                              <td>{{ $customer->phone_number }}</td>
                              <td>{{ $customer->nationality }}</td>
                              <td>
                                  <button class="btn btn-secondary btn-sm">view</button>
                                  {{-- <livewire:customer.edit :customer=$customer :wire:key="'edit-customer' . now() . $customer->id"> --}}
                                  <button type="button" class="btn btn-warning btn-sm" data-bs-toggle="modal" data-bs-target="#editCustomer" wire:click='editCustomer({{ $customer->id }})'>Edit</button>
                                  @include('livewire.customer.edit')
                                  <button type="button" class="btn btn-danger btn-sm" data-bs-toggle="modal" data-swal-template="#my-template" data-bs-target="#deleteCustomer" wire:click='deleteCustomer({{ $customer->id}})'>Delete</button>
                                  @include('livewire.customer.delete')
                                  <button class="btn btn-success btn-sm">Loan</button>
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
                            <h5>{{ $customers->links() }}</h5>
                     </div>
                 </div>
             </div>
         </div>
      </div>
   </div>
</div>



{{-- <livewire:customer.edit/> --}}
@push('scripts')
    <script>
        // window.addEventListener('close-modal', event => {
        //     $('#registerCustomer').modal('hide');
        // });

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

{{-- <script>
    // window.addEventListener('close-modal', event => {
    //     $('#registerCustomer').modal('hide');
    // });
    window.addEventListener('deleted', e => {
        Swal.fire({
            position: 'top-end',
            icon: e.detail.icon,
            title: e.detail.title,
            showConfirmButton: false,
            timer: 1500
        });
    });
</script> --}}