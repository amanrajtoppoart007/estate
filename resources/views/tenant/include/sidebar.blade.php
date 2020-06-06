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
            <a href="{{route('tenant.maintenance.list')}}" class="nav-link">
              <i class="nav-icon fa fa-question"></i>
              <p>
                Maintenance Requests
              </p>
            </a>
          </li>
        </ul>
      </nav>
    </div>
  </aside>
