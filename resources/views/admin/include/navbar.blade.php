  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-lightblue navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="javascript:void(0)"><i class="fas fa-bars"></i></a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="{{route('admin.dashboard')}}" class="nav-link">Home</a>
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
          <span class="dropdown-header">Admin Menu</span>
          <div class="dropdown-divider"></div>
          <a href="javascript:void(0)" onclick="event.preventDefault();document.getElementById('admin_logout_form').submit()" class="dropdown-item text-center"> Log Out</a>

          {{Form::open(['id'=>'admin_logout_form','route'=>'admin.logout','method'=>'post'])}}
          {{Form::close()}}
        </div>
      </li>
    </ul>
  </nav>
  <!-- /.navbar -->
