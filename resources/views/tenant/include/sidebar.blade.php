<aside class="main-sidebar sidebar-dark-primary elevation-4">
  <a href="{{route('tenant.dashboard')}}" class="brand-link">
      <img src="{{asset('assets/img/AdminLTELogo.png')}}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">ESTATE</span>
    </a>
    <div class="sidebar">
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="{{asset('assets/img/user2-160x160.jpg')}}" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="javascript:void(0)" class="d-block">{{Auth::guard('tenant')->user()->name}}</a>
        </div>
      </div>
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">

            <li class="nav-item">
            <a href="{{URL::to('tenant/home')}}" class="nav-link">
              <i class="nav-icon fa fa-question"></i>
              <p>
               Home
              </p>
            </a>
          </li>
            <li class="nav-item">
            <a href="{{route('tenant.rent.index')}}" class="nav-link">
              <i class="nav-icon fa fa-question"></i>
              <p>
               Rent
              </p>
            </a>
          </li>

            <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-circle"></i>
              <p>
                Tenancy Contract
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{route('tenant.contract.index')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>List</p>
                </a>
              </li>

              <li class="nav-item">
                <a href="{{route('tenant.contract.index')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Renewal</p>
                </a>
              </li>
            </ul>
          </li>

            <li class="nav-item">
            <a href="{{route('tenant.maintenance.list')}}" class="nav-link">
              <i class="nav-icon fa fa-question"></i>
              <p>
               Documents
              </p>
            </a>
          </li>


            <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-circle"></i>
              <p>
                Maintenance Request
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{route('tenant.maintenance.list')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>List</p>
                </a>
              </li>

              <li class="nav-item">
                <a href="{{route('tenant.maintenance.create')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Create New</p>
                </a>
              </li>
            </ul>
          </li>

            <li class="nav-item">
            <a href="{{route('tenant.support.faq')}}" class="nav-link">
              <i class="nav-icon fa fa-question"></i>
              <p>
                Frequently Asked Questions
              </p>
            </a>
          </li>
        </ul>
      </nav>
    </div>
  </aside>
