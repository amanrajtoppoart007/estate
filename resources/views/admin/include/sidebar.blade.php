<aside class="main-sidebar sidebar-dark-primary elevation-4">
  <a href="{{route('admin.dashboard')}}" class="brand-link">
      <img src="{{asset('assets/img/AdminLTELogo.png')}}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
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
             <i class="fa fa-info-circle"></i>
              <p>
               Rent Inquiry
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
                  <p>Rent Inquiry List</p>
                </a>
              </li>
            </ul>
          </li>
            <li class="nav-item has-treeview menu-close" id="sidebar-tenant">
            <a href="javascript:void(0)" class="nav-link">
              <i class="fa fa-info-circle"></i>
              <p>
               Sales Inquiry
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{route('salesEnquiry.create')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Add Sales Inquiry</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{route('salesEnquiry.list')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Sales Inquiry List</p>
                </a>
              </li>
            </ul>
          </li>
           <li class="nav-item has-treeview menu-close" id="sidebar-tenant">
            <a href="javascript:void(0)" class="nav-link">
              <i class="nav-icon fas fa-users"></i>
              <p>
                Tenant
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{route('tenant.list')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>All Tenant</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{route('tenant.create')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Add Tenant</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{route('tenancy.renewal.list')}}" class="nav-link">
                  <i class="far fa-circle nav-icon text-warning"></i>
                  <p>Renew Tenancy</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{route('tenant.remove.req')}}" class="nav-link">
                  <i class="far fa-circle nav-icon text-danger"></i>
                  <p>Remove Tenant Request</p>
                </a>
              </li>
            </ul>
          </li>
            <li class="nav-item">
            <a href="{{route('agent.index')}}" class="nav-link">
              <i class="nav-icon fa fa-at"></i>
              <p>
                Agents
              </p>
            </a>
          </li>
           <li class="nav-item has-treeview menu-close">
            <a href="javascript:void(0)" class="nav-link">
              <i class="nav-icon fa fa-users"></i>
              <p>
                Buyers
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{route('buyer.list')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Buyer List</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{route('buyer.create')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Add Buyers</p>
                </a>
              </li>
            </ul>
          </li>

            <li class="nav-item has-treeview menu-close">
                <a href="javascript:void(0)" class="nav-link">
                    <i class="nav-icon fa fa-users"></i>
                    <p>
                        Developers
                        <i class="right fas fa-angle-left"></i>
                    </p>
                </a>
                <ul class="nav nav-treeview">
                    <li class="nav-item">
                        <a href="{{route('developer.list')}}" class="nav-link">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Developers List</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{route('developer.create')}}" class="nav-link">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Add Developer</p>
                        </a>
                    </li>
                </ul>
            </li>

           <li class="nav-item has-treeview menu-close">
            <a href="javascript:void(0)" class="nav-link">
              <i class="nav-icon fa fa-users"></i>
              <p>
                Flat Owners
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{route('owner.list')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Flat Owner List</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{route('owner.create')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Add Flat Owner</p>
                </a>
              </li>
            </ul>
          </li>
           <li class="nav-item has-treeview menu-close">
            <a href="javascript:void(0)" class="nav-link">
              <i class="nav-icon fa fa-building"></i>
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
            </ul>
          </li>
          <li class="nav-item has-treeview menu-close">
            <a href="javascript:void(0)" class="nav-link">
              <i class="nav-icon fa fa-money-check-alt"></i>
              <p>
                Sales
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{route('propertySales.list')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Sales List</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{route('propertySales.buyer.list')}}" class="nav-link">
                  <i class="far fa-user nav-icon"></i>
                  <p>Buyer List</p>
                </a>
              </li>
            </ul>
          </li>

          <li class="nav-item has-treeview menu-close">
            <a href="javascript:void(0)" class="nav-link">
              <i class="nav-icon fa fa-credit-card"></i>
              <p>
                Accounting
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{route('acc.chart.of.accounts')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Chart of Accounts</p>
                </a>
              </li> <li class="nav-item">
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
              <i class="nav-icon fa fa-tasks"></i>
              <p>
                Maintenance  Request
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{route('maintenance.list')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Maintenance Request List</p>
                </a>
              </li>
                <li class="nav-item">
                <a title="Maintenance Request Quotation" href="{{route('maintenance.create')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Add Maintenance Request</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item has-treeview menu-close">
            <a href="javascript:void(0)" class="nav-link">
              <i class="nav-icon fa fa-tasks"></i>
              <p>
                Task
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
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
              <i class="nav-icon fa fa-building"></i>
              <p>
                Department
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{route('department.list')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Department List</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item has-treeview menu-close">
            <a href="javascript:void(0)" class="nav-link">
              <i class="nav-icon fa fa-address-card"></i>
              <p>
                Employee
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{route('employee.list')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Employee List</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{route('employee.create')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Add Employee</p>
                </a>
              </li>
            </ul>
          </li>
           <li class="nav-item has-treeview menu-close">
            <a href="javascript:void(0)" class="nav-link">
              <i class="nav-icon fa fa-align-justify"></i>
              <p>
                Attendance
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{route('attendance.list')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Attendance List</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{route('attendance.search')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Search Attendance</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{route('attendance.create')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Take Attendance</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item has-treeview menu-close">
            <a href="javascript:void(0)" class="nav-link">
              <i class="nav-icon fa fa-th-list"></i>
              <p>
                Designation
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{route('designation.list')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Designation List</p>
                </a>
              </li>
            </ul>
          </li>

          <li class="nav-item has-treeview menu-close">
            <a href="javascript:void(0)" class="nav-link">
              <i class="nav-icon fa fa-wallet"></i>
              <p>
                Salary
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{route('create.salary.sheet')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Create Salary Sheet</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{route('salary.sheet.list')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Salary Sheet List</p>
                </a>
              </li>
            </ul>
          </li>
 <li class="nav-item has-treeview menu-close">
            <a href="javascript:void(0)" class="nav-link active">
              <i class="nav-icon fa fa-cog"></i>
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

          <li class="nav-item">
            <a href="{{route('contact-request.list')}}" class="nav-link">
              <i class="nav-icon fa fa-question"></i>
              <p>
                Contact Requests
              </p>
            </a>
          </li>
        </ul>
      </nav>
    </div>
  </aside>
