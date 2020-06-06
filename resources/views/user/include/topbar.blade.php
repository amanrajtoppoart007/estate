<div class="full-row top_bar py_10 bg-primary color-white">
		<div class="container-fluid">
			<div class="row">
				<div class="col-md-8 col-lg-8">
					<div class="left_top_bar">
						<div class="full-row deshbord_logo mr_20">

							<a class="float-left" href="{{ route('home') }}"><img src="{{asset('img/logo.png')}}" alt=""></a>
						</div>
						<div class="alam float-left mr_20 d-xs-none">
					  		<a class="color-default" href="#"><i class="fa fa-bell" aria-hidden="true"></i><sup class="color-white">10</sup></a>
					  	</div>
					  	<div class="comment float-left mr_20 d-xs-none">
					  		<a class="color-default" href="#"><i class="fa fa-comments" aria-hidden="true"></i><sup class="color-white">5</sup></a>
					  	</div>
					  	<div class="link_property mr_20 d-xs-none">
						  <a class="color-white" href="{{route('property.create')}}">+ Submit Property</a>
					  	</div>
					</div>
				</div>
				<div class="col-md-4 col-lg-4">
					<div class="right_top_bar float-right">
						<div class="balance float-left mr_20">
							<p>Balance: <span class="color-default">$34580.00</span></p>
						</div>
						<div class="profile_user d-inline-block mr_50">
							 @guest
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                            </li>
                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                        <div class="dropdown">
							  <a class="dropdown-toggle color-white" href="#" role="button" id="dropdownMenuLink2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
							  	<img src="{{asset('theme/default/images/team/01.jpg')}}" alt="">
							  {{ Auth::user()->name }}
							  </a>

							  <div class="dropdown-menu" aria-labelledby="dropdownMenuLink2">
							    <a class="dropdown-item" href="#">Profile</a>
							    
							     <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
							  </div>
							</div>
                           
                        @endguest
							
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>