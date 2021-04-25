<!-- Navbar Vertical -->
<aside class="js-navbar-vertical-aside navbar navbar-vertical-aside navbar-vertical navbar-vertical-fixed navbar-expand-xl navbar-bordered  ">
    <div class="navbar-vertical-container">
        <div class="navbar-vertical-footer-offset">
            <div class="navbar-brand-wrapper justify-content-between" style="overflow: hidden;">
                <!-- Logo -->


                <a class="navbar-brand" href="../index.html" aria-label="Front">

                    <img class="navbar-brand-logo" style="
    width: 100%;
    min-width: 1.5rem;
    max-width: 3.5rem;" src="{{asset('assets/img/alhoor-logo.png')}}"  alt="Logo">
                    <img class="navbar-brand-logo-mini" src="{{asset('assets/img/AdminLTELogo.png')}}" alt="Logo">
                </a>

                <!-- End Logo -->

                <!-- Navbar Vertical Toggle -->
                <button type="button" class="js-navbar-vertical-aside-toggle-invoker navbar-vertical-aside-toggle btn btn-icon btn-xs btn-ghost-dark">
                    <i class="tio-clear tio-lg"></i>
                </button>
                <!-- End Navbar Vertical Toggle -->
            </div>

            <!-- Content -->
            <div class="navbar-vertical-content">
                <ul class="navbar-nav navbar-nav-lg nav-tabs">
                    <!-- Dashboards -->
                    <li class="nav-item">
                        <small class="nav-subtitle" title="Layouts">Dashboard</small>
                        <small class="tio-more-horizontal nav-subtitle-replacer"></small>
                    </li>

                    <li class="nav-item active">
                        <a class="js-nav-tooltip-link nav-link active" href="layouts.html" title="Dashboard" data-placement="left">
                            <span class="icon icon-soft-warning"> <i class="tio-dashboard-vs-outlined nav-icon"></i></span>
                            <span class="navbar-vertical-aside-mini-mode-hidden-elements text-truncate">Homepage</span>
                        </a>
                    </li>

                    <!-- End Dashboards -->

                    <li class="nav-item">
                        <small class="nav-subtitle" title="Property">Property</small>
                        <small class="tio-more-horizontal nav-subtitle-replacer"></small>
                    </li>



                    <!-- Lease -->
                    <li class="navbar-vertical-aside-has-menu ">
                        <a class="js-navbar-vertical-aside-menu-link nav-link nav-link-toggle " href="javascript:;" title="Products">

                            <span class="icon icon-soft-warning">
                              <i class="tio-home-outlined"></i>
                            </span>
                            <span class="navbar-vertical-aside-mini-mode-hidden-elements text-truncate">Leasing </span>
                        </a>

                        <ul class="js-navbar-vertical-aside-submenu nav nav-sub">
                            <li class="nav-item">
                                <a class="nav-link " href="{{route('rentEnquiry.create')}}" title="Add Rent Inquiry">
                                    <span class="tio-circle nav-indicator-icon"></span>
                                    <span class="text-truncate">Add Rent Inquiry</span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link " href="{{route('rentEnquiry.list')}}" title="Rent Inquiries">
                                    <span class="tio-circle nav-indicator-icon"></span>
                                    <span class="text-truncate">Rent Inquiries</span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link " href="{{route('rentEnquiry.list')}}" title="Rent Inquiries">
                                    <span class="tio-circle nav-indicator-icon"></span>
                                    <span class="text-truncate">Rent Inquiries</span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link " href="{{route('tenant.list')}}" title="Tenants">
                                    <span class="tio-circle nav-indicator-icon"></span>
                                    <span class="text-truncate">Tenants</span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link " href="{{route('buyer.list')}}" title="Buyers">
                                    <span class="tio-circle nav-indicator-icon"></span>
                                    <span class="text-truncate">Buyers</span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link " href="{{route('salesEnquiry.list')}}" title="Sales Inquiries">
                                    <span class="tio-circle nav-indicator-icon"></span>
                                    <span class="text-truncate">Sales Inquiries</span>
                                </a>
                            </li>

                        </ul>
                    </li>
                    <!-- End Lease -->
                    <!-- Property management -->
                    <li class="navbar-vertical-aside-has-menu ">
                        <a class="js-navbar-vertical-aside-menu-link nav-link nav-link-toggle"
                           href="javascript:;" title="Property Management">

                            <span class="icon icon-soft-warning">
                              <i class="tio-city"></i>
                            </span>
                            <span class="navbar-vertical-aside-mini-mode-hidden-elements text-truncate">Property Management </span>
                        </a>

                        <ul class="js-navbar-vertical-aside-submenu nav nav-sub">
                            <li class="nav-item">
                                <a class="nav-link " href="{{route('property.list')}}" title="Properties">
                                    <span class="tio-circle nav-indicator-icon"></span>
                                    <span class="text-truncate">Properties</span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link " href="{{route('owner.list')}}" title="Flat Owners">
                                    <span class="tio-circle nav-indicator-icon"></span>
                                    <span class="text-truncate">Flat Owners</span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link " href="{{route('property.create')}}" title="Add Property">
                                    <span class="tio-circle nav-indicator-icon"></span>
                                    <span class="text-truncate">Add Property</span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link " href="{{route('property.unit.list')}}" title="Unit Listing">
                                    <span class="tio-circle nav-indicator-icon"></span>
                                    <span class="text-truncate">Unit Listing</span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link " href="{{route('propertyType.list')}}" title="Buyers">
                                    <span class="tio-circle nav-indicator-icon"></span>
                                    <span class="text-truncate">Property Types</span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link " href="{{route('feature.list')}}" title="Sales Inquiries">
                                    <span class="tio-circle nav-indicator-icon"></span>
                                    <span class="text-truncate">Sales Inquiries</span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link " href="{{route('property.allotted')}}" title="Rented Property">
                                    <span class="tio-circle nav-indicator-icon"></span>
                                    <span class="text-truncate">Rented Property</span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link " href="{{route('agent.index')}}" title="Agents">
                                    <span class="tio-circle nav-indicator-icon"></span>
                                    <span class="text-truncate">Agents</span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link " href="{{route('developer.list')}}" title="Developers List">
                                    <span class="tio-circle nav-indicator-icon"></span>
                                    <span class="text-truncate">Developers List</span>
                                </a>
                            </li>


                        </ul>
                    </li>
                    <!-- End Property management -->



                    <li class="nav-item">
                        <small class="nav-subtitle" title="Management">Management</small>
                        <small class="tio-more-horizontal nav-subtitle-replacer"></small>
                    </li>
                    <!-- Work order -->
                    <li class="navbar-vertical-aside-has-menu ">
                        <a class="js-navbar-vertical-aside-menu-link nav-link nav-link-toggle"
                           href="javascript:;" title="Work Order">

                            <span class="icon icon-soft-warning">
                              <i class="tio-clock"></i>
                            </span>
                            <span class="navbar-vertical-aside-mini-mode-hidden-elements text-truncate">Work Order </span>
                        </a>

                        <ul class="js-navbar-vertical-aside-submenu nav nav-sub">
                            <li class="nav-item">
                                <a class="nav-link " href="{{route('maintenance.list')}}" title="Maintenances">
                                    <span class="tio-circle nav-indicator-icon"></span>
                                    <span class="text-truncate">Maintenances</span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link " href="{{route('task.list')}}" title="Task">
                                    <span class="tio-circle nav-indicator-icon"></span>
                                    <span class="text-truncate">Task</span>
                                </a>
                            </li>



                        </ul>
                    </li>
                    <!-- End Work order -->
                    <!-- Payroll -->
                    <li class="navbar-vertical-aside-has-menu ">
                        <a class="js-navbar-vertical-aside-menu-link nav-link nav-link-toggle"
                           href="javascript:;" title="Payroll">

                            <span class="icon icon-soft-warning">
                              <i class="tio-clock"></i>
                            </span>
                            <span class="navbar-vertical-aside-mini-mode-hidden-elements text-truncate">Payroll</span>
                        </a>

                        <ul class="js-navbar-vertical-aside-submenu nav nav-sub">
                            <li class="nav-item">
                                <a class="nav-link " href="{{route('department.list')}}" title="Departments">
                                    <span class="tio-circle nav-indicator-icon"></span>
                                    <span class="text-truncate">Departments</span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link " href="{{route('employee.list')}}" title="Employees">
                                    <span class="tio-circle nav-indicator-icon"></span>
                                    <span class="text-truncate">Employees</span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link " href="{{route('attendance.list')}}" title="Attendances">
                                    <span class="tio-circle nav-indicator-icon"></span>
                                    <span class="text-truncate">Attendances</span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link " href="{{route('salary.sheet.list')}}" title="Salary Sheets">
                                    <span class="tio-circle nav-indicator-icon"></span>
                                    <span class="text-truncate">Salary Sheets</span>
                                </a>
                            </li>



                        </ul>
                    </li>
                    <!-- End Payroll -->
                    <li class="nav-item">
                        <small class="nav-subtitle" title="Accounts">Accounts</small>
                        <small class="tio-more-horizontal nav-subtitle-replacer"></small>
                    </li>

                    <!-- Accounts -->
                    <li class="navbar-vertical-aside-has-menu ">
                        <a class="js-navbar-vertical-aside-menu-link nav-link nav-link-toggle"
                           href="javascript:;" title="Accounts">

                            <span class="icon icon-soft-warning">
                              <i class="tio-calculator"></i>
                            </span>
                            <span class="navbar-vertical-aside-mini-mode-hidden-elements text-truncate">Accounts </span>
                        </a>

                        <ul class="js-navbar-vertical-aside-submenu nav nav-sub">
                            <li class="nav-item">
                                <a class="nav-link " href="{{route('acc.chart.of.accounts')}}" title="Chart of Accounts">
                                    <span class="tio-circle nav-indicator-icon"></span>
                                    <span class="text-truncate">Chart of Accounts</span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link " href="{{route('acc.bank.accounts')}}" title="Flat Owners">
                                    <span class="tio-circle nav-indicator-icon"></span>
                                    <span class="text-truncate">Bank Accounts</span>
                                </a>
                            </li>



                        </ul>
                    </li>
                    <!-- End Accounts -->





                    <li class="nav-item">
                        <div class="nav-divider"></div>
                    </li>

                    <li class="nav-item">
                        <small class="nav-subtitle" title="Documentation">Settings</small>
                        <small class="tio-more-horizontal nav-subtitle-replacer"></small>
                    </li>
                    <!-- Other setting -->
                    <li class="navbar-vertical-aside-has-menu ">
                        <a class="js-navbar-vertical-aside-menu-link nav-link nav-link-toggle"
                           href="javascript:;" title="Other">

                            <span class="icon icon-soft-warning">
                              <i class="tio-pages"></i>
                            </span>
                            <span class="navbar-vertical-aside-mini-mode-hidden-elements text-truncate">Other </span>
                        </a>

                        <ul class="js-navbar-vertical-aside-submenu nav nav-sub">
                            <li class="nav-item">
                                <a class="nav-link " href="{{route('country.list')}}" title="Countries">
                                    <span class="tio-circle nav-indicator-icon"></span>
                                    <span class="text-truncate">Countries</span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link " href="{{route('state.list')}}" title="State/Emirates">
                                    <span class="tio-circle nav-indicator-icon"></span>
                                    <span class="text-truncate">State/Emirates</span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link " href="{{route('city.list')}}" title="Cities">
                                    <span class="tio-circle nav-indicator-icon"></span>
                                    <span class="text-truncate">Cities</span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link " href="{{route('city.list')}}" title="Cities">
                                    <span class="tio-circle nav-indicator-icon"></span>
                                    <span class="text-truncate">Cities</span>
                                </a>
                            </li>



                        </ul>
                    </li>

                    <!-- End other setting -->
                    <li class="nav-item ">
                        <a class="js-nav-tooltip-link nav-link " href="{{route('settings')}}" title="" data-placement="left" data-original-title="Setting">
                            <span class="icon icon-soft-warning"> <i class="tio-settings nav-icon"></i></span>
                            <span class="navbar-vertical-aside-mini-mode-hidden-elements text-truncate">Setting</span>
                        </a>
                    </li>



                    <li class="nav-item">
                        <small class="tio-more-horizontal nav-subtitle-replacer"></small>
                    </li>






                </ul>
            </div>
            <!-- End Content -->


        </div>
    </div>
</aside>
<!-- End Navbar Vertical -->
