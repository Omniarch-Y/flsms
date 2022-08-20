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
        <section class="content" style="margin-top:4rem">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-xl-3 col-sm-6 col-12 mb-4">
                        <div class="card">
                            <div class="card-body">
                                <div class="d-flex justify-content-between px-md-1">
                                    <div>
                                        <h3 class="text-danger">{{ auth()->user()->count() }}</h3>
                                        <p class="mb-0">System users</p>
                                    </div>
                                    <div class="align-self-center">
                                        <i class="fas fa-user-gear text-danger fa-3x"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-sm-6 col-12 mb-4">
                        <div class="card">
                            <div class="card-body">
                                <div class="d-flex justify-content-between px-md-1">
                                    <div>
                                        <h3 class="text-success">{{ $users }}</h3>
                                        <p class="mb-0">Total customers</p>
                                    </div>
                                    <div class="align-self-center">
                                        <i class="far fa-user text-success fa-3x"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-sm-6 col-12 mb-4">
                        <div class="card">
                            <div class="card-body">
                                <div class="d-flex justify-content-between px-md-1">
                                    <div>
                                        <h3 class="text-warning">20 %</h3>
                                        <p class="mb-0">Highest interest rate</p>
                                    </div>
                                    <div class="align-self-center">
                                        <i class="fas fa-chart-pie text-warning fa-3x"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-sm-6 col-12 mb-4">
                        <div class="card">
                            <div class="card-body">
                                <div class="d-flex justify-content-between px-md-1">
                                    <div>
                                        <h3 class="text-info">{{ $activeLoans }}</h3>
                                        <p class="mb-0">Active loans</p>
                                    </div>
                                    <div class="align-self-center">
                                        <i class="fas fa-wallet text-info fa-3x"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-xl-6 col-md-12 mb-4">
                        <div class="card">
                            <div class="card-body">
                                <div class="d-flex justify-content-between p-md-1">
                                    <div class="d-flex flex-row">
                                        <div class="align-self-center">
                                            <h2 class="h1 mb-0 me-4">$76,456.00</h2>
                                        </div>
                                        <div>
                                            <h4>Total Sales</h4>
                                            <p class="mb-0">Monthly Sales Amount</p>
                                        </div>
                                    </div>
                                    <div class="align-self-center">
                                        <i class="far fa-heart text-danger fa-3x"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-6 col-md-12 mb-4">
                        <div class="card">
                            <div class="card-body">
                                <div class="d-flex justify-content-between p-md-1">
                                    <div class="d-flex flex-row">
                                        <div class="align-self-center">
                                            <h2 class="h1 mb-0 me-4">$36,000.00</h2>
                                        </div>
                                        <div>
                                            <h4>Total Cost</h4>
                                            <p class="mb-0">Monthly Cost</p>
                                        </div>
                                    </div>
                                    <div class="align-self-center">
                                        <i class="fas fa-wallet text-success fa-3x"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <livewire:user.view />

            </div>
        </section>

    </div>

    @include('components.footer')

</div>
