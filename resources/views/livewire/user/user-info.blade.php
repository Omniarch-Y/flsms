<div class="container mt-5">
    <div class="main-body">
        <div class="row gutters-sm">
            <div class="col-md-4 mb-3">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex flex-column align-items-center text-center">
                            <img src="{{ Storage::url($usr->picture) }}" alt="Admin" class="rounded-circle"
                                width="200">
                            <div class="mt-3">
                                <h4>{{ $usr->first_name }}{{ ' ' }}{{ $usr->middle_name }}</h4>
                                <p class="text-primary mb-1">{{ $usr->role }}</p>
                                <p class="text-muted font-size-sm">
                                    {{ $usr->address->subCity }},{{ ' ' }}{{ $usr->address->city }},{{ ' ' }}{{ $usr->address->country }}
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
                                {{ $usr->first_name }}{{ ' ' }}{{ $usr->middle_name }}{{ ' ' }}{{ $usr->last_name }}
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-sm-3">
                                <h6 class="mb-0 text-bold">Email</h6>
                            </div>
                            <div class="col-sm-9 text-primary">
                                {{ $usr->email }}
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-sm-3">
                                <h6 class="mb-0 text-bold">Phone</h6>
                            </div>
                            <div class="col-sm-9 text-primary">
                                {{ $usr->phone_number }}
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-sm-3">
                                <h6 class="mb-0 text-bold">House number</h6>
                            </div>
                            <div class="col-sm-9 text-primary">
                                {{ $usr->address->hno }}
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-sm-3">
                                <h6 class="mb-0 text-bold">Woreda</h6>
                            </div>
                            <div class="col-sm-9 text-primary">
                                {{ $usr->address->woreda }}
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-sm-3">
                                <h6 class="mb-0 text-bold">Address</h6>
                            </div>
                            <div class="col-sm-9 text-primary">
                                {{ $usr->address->subCity }},{{ ' ' }}{{ $usr->address->city }},{{ ' ' }}{{ $usr->address->country }}
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-sm-3">
                                <h6 class="mb-0 text-bold">Sex</h6>
                            </div>
                            @if ($usr->sex == 'M')
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
                                {{ $usr->dob }}
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-sm-3">
                                <h6 class="mb-0 text-bold">nationality</h6>
                            </div>
                            <div class="col-sm-9 text-primary">
                                {{ $usr->nationality }}
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-sm-3">
                                <h6 class="mb-0 text-bold">Role</h6>
                            </div>
                            <div class="col-sm-9 text-primary">
                                {{ $usr->role }}
                            </div>
                        </div>
                        <hr>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
