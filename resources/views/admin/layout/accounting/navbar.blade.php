<!-- Navbar -->
<nav class="main-header navbar navbar-expand-md navbar-light navbar-white">
    <div class="container">
        <a href="{{route('admin.dashboard')}}" class="navbar-brand">
            <img src="{{asset('assets/img/AdminLTELogo.png')}}" alt="Al Hoor" class="brand-image img-circle elevation-3"
                 style="opacity: .8">
            <span class="brand-text font-weight-light">Al Hoor</span>
        </a>

        <button class="navbar-toggler order-1" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse order-3" id="navbarCollapse">
            <!-- Left navbar links -->
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" data-widget="pushmenu" href="#"><i class="fas fa-bars"></i></a>
                </li>
                <li class="nav-item">
                    <a href="{{route('accounting.dashboard')}}" class="nav-link">Home</a>
                </li>

                <li class="nav-item dropdown">
                    <a id="dropdownSubMenu1" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="nav-link dropdown-toggle">Transactions</a>
                    <ul aria-labelledby="dropdownSubMenu1" class="dropdown-menu border-0 shadow">
                        <li><a href="#" class="dropdown-item">Menu 1 </a></li>
                        <li><a href="#" class="dropdown-item">Menu 2</a></li>

                        <li class="dropdown-divider"></li>

                        <!-- Level two dropdown-->
                        <li class="dropdown-submenu dropdown-hover">
                            <a id="dropdownSubMenu2" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="dropdown-item dropdown-toggle">Lease Contract</a>
                            <ul aria-labelledby="dropdownSubMenu2" class="dropdown-menu border-0 shadow">
                                <li>
                                    <a tabindex="-1" href="{{route('contracts.lease.new')}}" class="dropdown-item">New Lease Contract</a>
                                </li>



                                <li><a href="#" class="dropdown-item">Renew Existing Contract</a></li>
                                <li><a href="#" class="dropdown-item">All Lease Contract</a></li>
                            </ul>
                        </li>
                        <!-- End Level two -->
                    </ul>
                </li>
                <li class="nav-item dropdown">
                    <a id="dropdownSubMenu1" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="nav-link dropdown-toggle">Voucher</a>
                    <ul aria-labelledby="dropdownSubMenu1" class="dropdown-menu border-0 shadow">

                        <li class="dropdown-submenu dropdown-hover">
                            <a id="receiptSubMenu2" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="dropdown-item dropdown-toggle">Receipt Voucher</a>
                            <ul aria-labelledby="receiptSubMenu2" class="dropdown-menu border-0 shadow">
                                <li class="dropdown-submenu">
                                    <a id="receiptCashSubMenu3" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="dropdown-item dropdown-toggle">Cash</a>
                                    <ul aria-labelledby="receiptCashSubMenu3" class="dropdown-menu border-0 shadow">
                                        <li><a href="{{route('new.receipt.cash')}}" class="dropdown-item">Create New</a></li>
                                        <li><a href="{{route('all.receipt')}}" class="dropdown-item">View/Edit</a></li>
                                    </ul>
                                </li>
                                <li class="dropdown-submenu">
                                    <a id="receiptCheckSubMenu3" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="dropdown-item dropdown-toggle">Check</a>
                                    <ul aria-labelledby="receiptCheckSubMenu3" class="dropdown-menu border-0 shadow">
                                        <li><a href="{{route('new.receipt.cheque')}}" class="dropdown-item">Create New</a></li>
                                        <li><a href="{{route('all.receipt')}}" class="dropdown-item">View/Edit</a></li>
                                    </ul>
                                </li>





                            </ul>
                        </li>
                        <li class="dropdown-divider"></li>

                        <!-- Level two dropdown-->
                        <li class="dropdown-submenu dropdown-hover">
                            <a id="paymentSubMenu2" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="dropdown-item dropdown-toggle">Payment Voucher</a>
                            <ul aria-labelledby="paymentSubMenu2" class="dropdown-menu border-0 shadow">
                                <li class="dropdown-submenu">
                                    <a id="dropdownSubMenu3" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="dropdown-item dropdown-toggle">Cash</a>
                                    <ul aria-labelledby="dropdownSubMenu3" class="dropdown-menu border-0 shadow">
                                        <li><a href="#" class="dropdown-item">Create New</a></li>
                                        <li><a href="#" class="dropdown-item">View/Edit</a></li>
                                    </ul>
                                </li>
                                <li class="dropdown-submenu">
                                    <a id="paymentCashSubMenu3" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="dropdown-item dropdown-toggle">Check</a>
                                    <ul aria-labelledby="paymentCashSubMenu3" class="dropdown-menu border-0 shadow">
                                        <li><a href="#" class="dropdown-item">Create New</a></li>
                                        <li><a href="#" class="dropdown-item">View/Edit</a></li>
                                    </ul>
                                </li>





                            </ul>
                        </li>
                        <!-- End Level two -->
                    </ul>
                </li>
            </ul>


        </div>

        <!-- Right navbar links -->
        <ul class="order-1 order-md-3 navbar-nav navbar-no-expand ml-auto">
            <!-- Messages Dropdown Menu -->


            <li class="nav-item">
                <a class="nav-link" data-widget="control-sidebar" data-slide="true" href="#"><i
                        class="fas fa-th-large"></i></a>
            </li>
            <li class="nav-item dropdown">
                <a class="nav-link" data-toggle="dropdown" href="javascript:void(0)">
                    <i class="fa fa-cogs"></i>
                </a>
                <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                    <span class="dropdown-header">Admin Menu</span>
                    <div class="dropdown-divider"></div>
                    {{--<a href="javascript:void(0)" class="dropdown-item text-center"> Profile</a>
                    <div class="dropdown-divider"></div>--}}
                    {{Form::open(['route'=>'logout'])}}
                    <button type="submit" class="dropdown-item dropdown-footer">Log Out</button>
                    {{Form::close()}}
                </div>
            </li>
        </ul>
    </div>
</nav>
<!-- /.navbar -->
