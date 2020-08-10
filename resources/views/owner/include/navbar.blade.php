  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-primary navbar-dark">
    <!-- Left navbar links -->
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
    @php
        $items = get_owner_notifications();
        $notifications = $items['notifications'] ? $items['notifications'] : [];
        $total_notification = $items['total'] ? $items['total'] :0;

    @endphp
        @if(!empty($notifications))
        <li class="nav-item dropdown">
        <a class="nav-link" data-toggle="dropdown" href="#" aria-expanded="true">
          <i class="far fa-comments"></i>
          <span class="badge badge-danger navbar-badge">{{$total_notification }}</span>
        </a>
        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
            @foreach($notifications as $notification)
          <a href="#" class="dropdown-item">
            <!-- Message Start -->
            <div class="media">
              <img src="{{asset('assets/img/user1-128x128.jpg')}}" alt="User Avatar" class="img-size-50 mr-3 img-circle">
              <div class="media-body">
                <p class="text-sm">{{$notification->data ? $notification->data['title'] : null}}</p>
                <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i>{{ $notification->created_at ? $notification->created_at->diffForHumans() : null }}</p>
              </div>
            </div>
            <!-- Message End -->
          </a>
          <div class="dropdown-divider"></div>
            @endforeach
          <a href="#" class="dropdown-item dropdown-footer">See All Messages</a>
        </div>
      </li>
        @endif

      <!-- Notifications Dropdown Menu -->
      <li class="nav-item dropdown">
        <a class="nav-link" data-toggle="dropdown" href="javascript:void(0)">
          <i class="fa fa-cogs"></i>
        </a>
        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
          <span class="dropdown-header">Admin Menu</span>
          <div class="dropdown-divider"></div>
          <a href="javascript:void(0)" class="dropdown-item text-center"> Profile</a>
          <div class="dropdown-divider"></div>
          {{Form::open(['route'=>'owner.logout'])}}
            <button type="submit" class="dropdown-item dropdown-footer">Log Out</button>
          {{Form::close()}}
        </div>
      </li>
      <li class="nav-item">
        <a class="nav-link" data-widget="control-sidebar" data-slide="true" href="javascript:void(0)"><i
            class="fas fa-th-large"></i></a>
      </li>
    </ul>
  </nav>
  <!-- /.navbar -->
