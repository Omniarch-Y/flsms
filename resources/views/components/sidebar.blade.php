<aside class="main-sidebar sidebar-dark-primary elevation-4">

    @if (auth()->user()->role == 'loan_officer')
        <a href="/customers" class="brand-link">
            <i class="fa-solid fa-hand-holding-dollar ms-4 me-2"></i>
            <span class="brand-text font-weight-light">FLSMS</span>
        </a>
    @elseif(auth()->user()->role == 'manager')
        <a href="/users" class="brand-link">
            <i class="fa-solid fa-hand-holding-dollar ms-4 me-2"></i>
            <span class="brand-text font-weight-light">FLSMS</span>
        </a>
    @else
        <a href="/loans" class="brand-link">
            <i class="fa-solid fa-hand-holding-dollar ms-4 me-2"></i>
            <span class="brand-text font-weight-light">FLSMS</span>
        </a>
    @endif

    <div class="sidebar">

        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                data-accordion="false">

                @if (auth()->user()->role == 'loan_officer')
                    <li class="nav-item">
                        <a href="" data-bs-toggle="modal" data-bs-target="#registerCustomer" class="nav-link">
                            <i class="nav-icon fa-solid fa-person-circle-plus"></i>
                            <p>
                                Add Customer
                            </p>
                        </a>
                    </li>
                @endif

                @if (auth()->user()->role == 'manager')
                    <li class="nav-item">
                        <a href="" data-bs-toggle="modal" data-bs-target="#registerUser" class="nav-link">
                            <i class="nav-icon fa-solid fa-user-plus"></i>
                            <p>
                                Add User
                            </p>
                        </a>
                    </li>
                @endif

                @if (auth()->user()->role == 'manager')
                    <li class="nav-item">
                        <a href="/users" class="nav-link">
                            <i class="nav-icon fa-solid fa-users"></i>
                            <p>
                                Users
                            </p>
                        </a>
                    </li>
                @endif

                @if (auth()->user()->role == 'encoder')
                    <li class="nav-item">
                        <a href="/loans" class="nav-link">
                            <i class="nav-icon fas fa-home"></i>
                            <p>
                                Home
                                {{-- <span class="right badge badge-danger">New</span> --}}
                            </p>
                        </a>
                    </li>
                @endif

                @if (auth()->user()->role == 'manager')
                    <li class="nav-item">
                        <a href="#" class="nav-link">
                            <i class="nav-icon fa-solid fa-wallet"></i>
                            <p>
                                Loans
                                <i class="fas fa-angle-left right"></i>
                                <span class="badge badge-info right">6</span>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="/inactiveLoans" class="nav-link">
                                    <i class="nav-icon fa-brands fa-creative-commons-nc"></i>
                                    <p>
                                        Inactive Loans
                                    </p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="/activeLoans" class="nav-link">
                                    <i class="nav-icon fa-solid fa-sack-dollar"></i>
                                    <p>
                                        Active Loans
                                    </p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="/completedLoans" class="nav-link">
                                    <i class="nav-icon fas fa-dollar-sign"></i>
                                    <p>
                                        Completed Loans
                                    </p>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li class="nav-item">
                        <a href="/withdrawal" class="nav-link">
                            <i class="nav-icon fa-solid fa-arrow-up"></i>
                            <p>
                                Withdrawal record
                            </p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="/collection" class="nav-link">
                            <i class="nav-icon fa-solid fa-arrow-down"></i>
                            <p>
                                Collection record
                            </p>
                        </a>
                    </li>
                @endif
            </ul>
        </nav>
    </div>
</aside>
