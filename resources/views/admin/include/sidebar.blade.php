<aside class="main-sidebar sidebar-light-blue elevation-4">
    <a href="{{route('admin.dashboard')}}" class="brand-link">
        <img src="{{asset('assets/img/AdminLTELogo.png')}}" alt="AdminLTE Logo"
             class="brand-image img-circle elevation-3" style="opacity: .8">
        <span class="brand-text font-weight-light">ESTATE</span>
    </a>
    <div class="sidebar" style="scrollbar-color: #007bff white;">
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="{{asset('assets/img/user2-160x160.jpg')}}" class="img-circle elevation-2" alt="User Image">
            </div>
            <div class="info">
                <a href="javascript:void(0)" class="d-block">{{Auth::guard('admin')->user()->name}}</a>
            </div>
        </div>
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <li class="nav-item has-treeview menu-close" id="sidebar-tenant">
                    <a href="javascript:void(0)" class="nav-link">
                        <img src="{{asset('assets/img/icons/rental.png')}}" alt="">
                        <p>
                            Leasing
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{route('rentEnquiry.create')}}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Add Rent Inquiry</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{route('rentEnquiry.list')}}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Rent Inquiries</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{route('tenant.list')}}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Tenants</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{route('buyer.list')}}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Buyers</p>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a href="{{route('salesEnquiry.list')}}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Sales Inquiries</p>
                            </a>
                        </li>
                    </ul>
                </li>

                <li class="nav-item has-treeview menu-close">
                    <a href="javascript:void(0)" class="nav-link">
                        <img src="{{asset('assets/img/icons/building.png')}}" alt="">
                        <p>
                            Property Management
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{route('property.list')}}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Properties</p>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a href="{{route('owner.list')}}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Flat Owners</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{route('property.create')}}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Add Property</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{route('property.unit.list')}}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Unit Listing</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{route('propertyType.list')}}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Property Types</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{route('feature.list')}}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Features</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{route('property.allotted')}}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Rented Property</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{route('agent.index')}}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Agents</p>
                            </a>
                        </li>


                        <li class="nav-item">
                            <a href="{{route('developer.list')}}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Developers List</p>
                            </a>
                        </li>

                    </ul>
                </li>


                <li class="nav-item has-treeview menu-close">
                    <a href="javascript:void(0)" class="nav-link">
                        <img src="{{asset('assets/img/icons/accounting.png')}}" alt="">
                        <p>
                            Accounts
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{route('acc.chart.of.accounts')}}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Chart of Accounts</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{route('acc.bank.accounts')}}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Bank Accounts</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{route('acc.invoices')}}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Invoices</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{route('acc.bills')}}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Bills</p>
                            </a>
                        </li>


                    </ul>
                </li>

                <li class="nav-item has-treeview menu-close">
                    <a href="javascript:void(0)" class="nav-link">
                        <img src="{{asset('assets/img/icons/maintenance.png')}}" alt="">
                        <p>
                            Work Order
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{route('maintenance.list')}}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Maintenances</p>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a href="{{route('task.list')}}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Task</p>
                            </a>
                        </li>
                    </ul>
                </li>


                <li class="nav-item has-treeview menu-close">
                    <a href="javascript:void(0)" class="nav-link">
                        <img src="{{asset('assets/img/icons/department.png')}}" alt="">
                        <p>
                            Payroll
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{route('department.list')}}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Departments</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{route('employee.list')}}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Employees</p>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a href="{{route('attendance.list')}}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Attendances </p>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a href="{{route('designation.list')}}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Designations </p>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a href="{{route('salary.sheet.list')}}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Salary Sheets</p>
                            </a>
                        </li>

                    </ul>
                </li>


                <li class="nav-item has-treeview menu-close">
                    <a href="javascript:void(0)" class="nav-link active">
                        <img src="{{asset('assets/img/icons/gear.png')}}" alt="">
                        <p>
                            Setting
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{route('country.list')}}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Countries</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{route('state.list')}}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>State/Emirates</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{route('city.list')}}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Cities</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{route('settings')}}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Settings</p>
                            </a>
                        </li>
                    </ul>
                </li>




                <li class="nav-item has-treeview menu-close">
                    <a href="javascript:void(0)" class="nav-link">
                        <img src="{{asset('assets/img/icons/maintenance.png')}}" alt="">
                        <p>
                            Notification & Reminders
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{route('contact-request.list')}}" class="nav-link">
                                <img src="{{asset('assets/img/icons/request.png')}}" alt="">
                                <p>
                                    Contact Enquiries
                                </p>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a href="{{route('expiry.warning.document.list')}}" class="nav-link">
                                <img src="{{asset('assets/img/icons/power.png')}}" alt="">
                                <p>
                                    Document Renewal
                                </p>
                            </a>
                        </li>

                    </ul>
                </li>

            </ul>
        </nav>
    </div>
</aside>
