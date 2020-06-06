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

			<div class="col-sm-12 col-sm-8">
				<nav class="navbar navbar-expand-lg navbar-light topbar2" id="header">
					<a href="{{URL::to('/')}}">

						<!-- <img class="nav-logo" src="{{asset('theme/default/images/logo/Alhoor_RealEstate_logo.png')}}" alt="" style="width: 40%;"> -->
						<h6>Al Hoor Real Estate</h6>
					</a>
					<a href="javascript:void(0);" class="filter-anchor">Filter</a>
					<button class="navbar-toggler mob-custom" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">

						<span class="navbar-toggler-icon"></span>

					</button>
					<div class="collapse navbar-collapse" id="navbarNav">

						<ul class="navbar-nav ml-auto">

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
				</nav>
			</div>

		</div>

		<!-- Top Navbar -->

	</div>

</header>

@endsection