<div class="container mt-5">
    <div class="main-body">
        <div class="row gutters-sm">
            <div class="col-md-4 mb-3">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex flex-column align-items-center text-center">
                            <img src="{{ Storage::url($cust->picture) }}" alt="Admin" class="rounded-circle"
                                width="200">
                            <div class="mt-3">
                                <h4>{{ $cust->first_name }}{{ ' ' }}{{ $cust->middle_name }}</h4>
                                <p class="text-muted font-size-sm">
                                    {{ $cust->address->subCity }},{{ ' ' }}{{ $cust->address->city }},{{ ' ' }}{{ $cust->address->country }}
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-8">
                <div class="card mb-3">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-sm-3">
                                <h6 class="mb-0 text-bold">Full Name</h6>
                            </div>
                            <div class="col-sm-9 text-primary">
                                {{ $cust->first_name }}{{ ' ' }}{{ $cust->middle_name }}{{ ' ' }}{{ $cust->last_name }}
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-sm-3">
                                <h6 class="mb-0 text-bold">Email</h6>
                            </div>
                            <div class="col-sm-9 text-primary">
                                {{ $cust->email }}
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-sm-3">
                                <h6 class="mb-0 text-bold">Phone</h6>
                            </div>
                            <div class="col-sm-9 text-primary">
                                {{ $cust->phone_number }}
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-sm-3">
                                <h6 class="mb-0 text-bold">House number</h6>
                            </div>
                            <div class="col-sm-9 text-primary">
                                {{ $cust->address->hno }}
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-sm-3">
                                <h6 class="mb-0 text-bold">Woreda</h6>
                            </div>
                            <div class="col-sm-9 text-primary">
                                {{ $cust->address->woreda }}
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-sm-3">
                                <h6 class="mb-0 text-bold">Address</h6>
                            </div>
                            <div class="col-sm-9 text-primary">
                                {{ $cust->address->subCity }},{{ ' ' }}{{ $cust->address->city }},{{ ' ' }}{{ $cust->address->country }}
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-sm-3">
                                <h6 class="mb-0 text-bold">Sex</h6>
                            </div>
                            @if ($cust->sex == 'M')
                                <div class="col-sm-9 text-primary">
                                    Male
                                </div>
                            @else
                                <div class="col-sm-9 text-primary">
                                    Female
                                </div>
                            @endif
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-sm-3">
                                <h6 class="mb-0 text-bold">Date of birth</h6>
                            </div>
                            <div class="col-sm-9 text-primary">
                                {{ $cust->dob }}
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-sm-3">
                                <h6 class="mb-0 text-bold">nationality</h6>
                            </div>
                            <div class="col-sm-9 text-primary">
                                {{ $cust->nationality }}
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-sm-3">
                                <h6 class="mb-0 text-bold">Active loans</h6>
                            </div>
                            <div class="col-sm-9 text-primary">
                                {{ $loan->count() }}
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-sm-3">
                                <h6 class="mb-0 text-bold">Business type</h6>
                            </div>
                            <div class="col-sm-9 text-primary">
                                {{ $cust->business_type }}
                            </div>
                        </div>
                        <hr class="mb-3">
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="card mt-5">
    <div class="card-body">
        <div class="d-flex flex-column align-items-center text-center">
            <img src="{{ Storage::url($cust->file_attachment) }}" alt="Admin" width="600">
            <div class="mt-3">
                <h4>File attachment</h4>
            </div>
        </div>
    </div>
</div>
