  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand-md navbar-primary navbar-dark">
    <div class="container">
        <!-- Left navbar links -->
        <a href="{{URL::to('/tenant/home')}}" class="navbar-brand">
        <img src="{{asset('assets/img/alhoor-logo.png')}}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
        <span class="brand-text font-weight-light">{{config('app.name')}}</span>
      </a>
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="javascript:void(0)"><i class="fas fa-bars"></i></a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="{{route('tenant.dashboard')}}" class="nav-link">Home</a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="javascript:void(0)" class="nav-link">Contact</a>
      </li>
    </ul>
    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">

      <!-- Notifications Dropdown Menu -->
      <li class="nav-item dropdown">
        <a class="nav-link" data-toggle="dropdown" href="javascript:void(0)">
          <i class="fa fa-cogs"></i>
        </a>
        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
          <span class="dropdown-header">Tenant Menu</span>
          <div class="dropdown-divider"></div>
          <a href="javascript:void(0)" class="dropdown-item text-center"> Profile</a>
          <div class="dropdown-divider"></div>
          {{Form::open(['route'=>'tenant.logout'])}}
            <button type="submit" class="dropdown-item dropdown-footer">Log Out</button>
          {{Form::close()}}
        </div>
      </li>
      <li class="nav-item">
        <a class="nav-link" data-widget="control-sidebar" data-slide="true" href="javascript:void(0)"><i
            class="fas fa-th-large"></i></a>
      </li>
    </ul>
    </div>
  </nav>
  <!-- /.navbar -->
