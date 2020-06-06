@section('header')

<header class="header_three nav-on-top">

	<div class="container-fluid top-stripe">

		<div class="container">

			<div class="row">

				<div class="col-md-12 col-lg-12">

					<div class="top_header">

						<div class="row">

							<div class="col-md-6 col-xl-6">

								<div class="top_left icon_default">

									<ul>

										<li><i class="fa fa-phone blue-icon" aria-hidden="true"></i>{{pluck_single_value('system_settings','name','official_contact_number','value')}}</li>

										<li><i class="fa fa-envelope blue-icon" aria-hidden="true"></i>{{pluck_single_value('system_settings','name','official_email_id','value')}}</li>

									</ul>

								</div>

							</div>

							<div class="col-md-6 col-xl-6">

								<div class="currency float-right" style="display: flex;">

									<div class="dropdown hover_gray" style="margin-right:10px;">

										<a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Help and Support</a>

										<div class="dropdown-menu" aria-labelledby="dropdownMenuLink">

											<a class="dropdown-item" href="{{route('faq')}}">Faq</a>

											<a class="dropdown-item" href="{{route('terms-conditions')}}">Terms and Condition</a>

											<a class="dropdown-item" href="{{route('how-it-work')}}">How it works</a>

											<a class="dropdown-item" href="{{route('contact')}}">Contact</a>

										</div>

									</div>

									<div class="dropdown hover_gray" style="margin-right:10px;">

										<a class="dropdown-toggle" href="#" role="button" id="dropdownlanguage" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">EN</a>

										<div class="dropdown-menu" aria-labelledby="dropdownlanguage">

											<a class="dropdown-item" href="#!">AR</a>

										</div>

									</div>

								</div>

						</div>

					</div>

				</div>

			</div>

		</div>

	</div>

	</div>

	<div class="container">

		<!-- Top Navbar -->

		<div class="row top-navbar">

			<div class="col-sm-2 col-4">

			<a href="{{URL::to('/')}}">

					<img class="nav-logo" width="40%" src="{{asset('theme/default/images/logo/logo.png')}}" alt="">

				</a>

			</div>

			<div class="col-sm-7 col-8 d-none d-md-block">

				<form class="mx-2 w-100">

					<div class="input-group">

						<input type="text" onkeyup="search(this.value);" class="form-control border border-right-0" placeholder="Search...">

						<span class="input-group-append">

							<button class="btn btn-outline-secondary border border-left-0" type="button">

								<i class="fa fa-search"></i>

							</button>

						</span>

						

					</div>

					<div class="search-content">

							<div class="search-div">

								<div class="sk-fading-circle loader-container" style="display:none;">

									<div class="sk-circle1 sk-circle"></div>

									<div class="sk-circle2 sk-circle"></div>

									<div class="sk-circle3 sk-circle"></div>

									<div class="sk-circle4 sk-circle"></div>

									<div class="sk-circle5 sk-circle"></div>

									<div class="sk-circle6 sk-circle"></div>

									<div class="sk-circle7 sk-circle"></div>

									<div class="sk-circle8 sk-circle"></div>

									<div class="sk-circle9 sk-circle"></div>

									<div class="sk-circle10 sk-circle"></div>

									<div class="sk-circle11 sk-circle"></div>

									<div class="sk-circle12 sk-circle"></div>

								</div>

								<div class="clearfix"></div>

								<div class="search-data-container">

								</div>

							</div>

					  </div>

				</form>

			</div>

			<div class="col-sm-3 col-12 mob-hide">

				<div class="row">

					<div class="col-sm-12 col-12 justify-content-center align-self-center">

						<div class="row">

							<div class="col-12 col-sm-12 col-md-12 col-lg-12">

								<i class="fa fa-phone  icon-blue d-inline" aria-hidden="true"></i>

								<p class="para-text-call d-inline">{{pluck_single_value('system_settings','name','official_contact_number','value')}}</p>

							</div>

							<div class="col-12 col-sm-12 col-md-12 col-lg-12">

								<i class="fa fa-envelope icon-blue d-inline" aria-hidden="true"></i>

								<p class="para-text-mail d-inline">{{pluck_single_value('system_settings','name','official_email_id','value')}}</p>

							</div>

						</div>

					</div>

				</div>

			</div>

		</div>

		<!-- Top Navbar -->

	</div>

	<div class="container">

		<div class="row">

			<div class="col-md-12 col-lg-12">

				<!-- Main Navbar -->

				<nav class="navbar navbar-expand-lg navbar-light topbar2" id="header">

					<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">

						<span class="navbar-toggler-icon"></span>

					</button>

					<div class="container-fluid">

						<div class="collapse navbar-collapse" id="navbarNav">

							<ul class="navbar-nav  mr-auto">

								<li class="nav-item home-link">

									<a class="nav-link" href="{{url('/')}}">Home</a>

								</li>

								<li class="nav-item home-link">

									<a class="nav-link" href="{{route('property.search',['mode'=>2])}}">Home For Sale</a>

								</li>

								<li class="nav-item home-link">

									<a class="nav-link" href="{{route('property.search',['mode'=>1])}}">Home For Rent</a>

								</li>



								<li class="nav-item home-link">

									<a class="nav-link" href="{{route('property.agent.list')}}">Find Agents</a>

								</li>

								<li class="nav-item">

									<a class="nav-link" href="{{route('contact')}}">{{ __('Contact Us') }}</a>

								</li>

							</ul>

						</div>

					</div>

				</nav>

			</div>

		</div>

	</div>

</header>

@endsection