<div class="container mt-5">
    <div class="main-body">

        <div class="row gutters-sm">
            <div class="col-md-4 mb-3">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex flex-column align-items-center text-center">
                            <img src="{{ Storage::url($loa->customer->picture) }}" alt="Admin" class="rounded-circle"
                                width="200">
                            <div class="mt-3">
                                <h4>{{ $loa->first_name }}{{ ' ' }}{{ $loa->middle_name }}</h4>
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
                                <h6 class="mb-0 text-bold">Customer Name</h6>
                            </div>
                            <div class="col-sm-9 text-primary">
                                {{ $loa->customer->first_name }}{{ ' ' }}{{ $loa->customer->middle_name }}{{ ' ' }}{{ $loa->customer->last_name }}
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-sm-3">
                                <h6 class="mb-0 text-bold">Customer ID</h6>
                            </div>
                            <div class="col-sm-9 text-primary text-bold" style="font-size: 15px;">
                                {{ $loa->cust_id }}
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-sm-3">
                                <h6 class="mb-0 text-bold">Lone type</h6>
                            </div>
                            <div class="col-sm-9 text-primary">
                                {{ $loa->loan_type }}
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-sm-3">
                                <h6 class="mb-0 text-bold">Amount</h6>
                            </div>
                            <div class="col-sm-9 text-primary">
                                {{ $loa->amount }}
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-sm-3">
                                <h6 class="mb-0 text-bold">Service charge</h6>
                            </div>
                            <div class="col-sm-9 text-primary">
                                {{ $loa->service_charge}}
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-sm-3">
                                <h6 class="mb-0 text-bold">Net amount</h6>
                            </div>
                            <div class="col-sm-9 text-primary">
                                {{ $loa->net_amount }}
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-sm-3">
                                <h6 class="mb-0 text-bold">Total debt</h6>
                            </div>
                            <div class="col-sm-9 text-primary">
                                {{ $loa->total_debt }}
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-sm-3">
                                <h6 class="mb-0 text-bold">Status</h6>
                            </div>
                            <div class="col-sm-9 text-primary">
                                {{ $loa->status }}
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-sm-3">
                                <h6 class="mb-0 text-bold">Starting date</h6>
                            </div>
                            <div class="col-sm-9 text-primary">
                                {{ $loa->starting_date }}
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-sm-3">
                                <h6 class="mb-0 text-bold">Ending date</h6>
                            </div>
                            <div class="col-sm-9 text-primary">
                                {{ $loa->ending_date }}
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-sm-3">
                                <h6 class="mb-0 text-bold">Interest date</h6>
                            </div>
                            <div class="col-sm-9 text-primary">
                                {{ $loa->interest_date }}
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-sm-3">
                                <h6 class="mb-0 text-bold">Interest rate</h6>
                            </div>
                            <div class="col-sm-9 text-primary">
                                {{ $loa->interest->interest_rate * 100 }} %
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-sm-3">
                                <h6 class="mb-0 text-bold">Interest type</h6>
                            </div>
                            <div class="col-sm-9 text-primary">
                                {{ $loa->interest->interest_type }}
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
            <img src="{{ Storage::url($loa->contract) }}" alt="Admin" width="600">
            <div class="mt-3">
                <h4>Contrat</h4>
            </div>
        </div>
    </div>
</div>
