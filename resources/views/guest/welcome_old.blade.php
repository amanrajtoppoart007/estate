@extends('guest.layout.main')

@include('guest.include.header')

@section('content')
<!-- Advanced Search -->
<div class="container-fluid mt-t mb-5 pt-5 pb-3 filter-tab">
	<div class="container container-shadow mt-4 pt-5 mb-5">
		<div class="row">
			<div class="col-sm-12 col-12">
				 {{Form::open(['route'=>'property.search','method'=>'get'])}}
					<div class="row">
						<div class="col-sm-3 col-12">
							<select class="custom-select advanced-search-fields" name="mode" id="mode">
                                <option selected disabled value="">Purpose</option>
								<option value=1"">Rent</option>
								<option value="2">Sale</option>
								<option value="3">Rent & Sale</option>
							</select>
						</div>
						<div class="col-sm-9 col-12 mob-mb-10">
							<div class="input-group">
								<input type="text" name="location" id="location" class="form-control advanced-search-fields" placeholder="Add more locations">
								<div class="input-group-append">
									<button type="submit" class="btn btn-default1" type="button"> Find </button>
								</div>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-sm-3 col-12">
							<select class="custom-select advanced-search-fields" name="property_type" id="property_type">
								<option selected disabled value="">Property Type</option>
								 @foreach($propertyTypes as $prop_type)
								<option value="{{$prop_type->id}}">{{$prop_type->title}}</option>
                                @endforeach
							</select>
						</div>
						<div class="col-sm-3 col-12">
							<select class="custom-select advanced-search-fields" name="rent_interval">
								<option selected disabled value="">Rent Period</option>
                                <option value="monthly">Monthly</option>
                                <option value="yearly">Yearly</option>
                                <option value="half_yearly">Half Yearly</option>
							</select>
						</div>
						<div class="col-sm-6 col-12">
							<div class="row">
								<div class="col-sm-3 col-12">
									<select class="custom-select advanced-search-fields" name="price[min]" id="min_price">
										<option selected disabled value="">Min. price</option>
                                        <option value="10000">10000</option>
                                        <option value="20000">20000</option>
                                        <option value="30000">30000</option>
                                        <option value="40000">40000</option>
                                        <option value="50000">50000</option>
                                        <option value="60000">60000</option>
									</select>
								</div>
								<div class="col-sm-3 col-12">
									<select class="custom-select advanced-search-fields" name="price[max]" id="max_price">
										<option selected disabled value="">Max. price</option>
										<option value="20000">20000</option>
                                        <option value="30000">30000</option>
                                        <option value="40000">40000</option>
                                        <option value="50000">50000</option>
                                        <option value="60000">60000</option>
                                        <option value="70000">70000</option>
									</select>
								</div>
								<div class="col-sm-3 col-12">
									<select class="custom-select advanced-search-fields" name="bedroom[min]" id="min_beds">
										<option selected disabled value="">Min. bed</option>
                                        <option value="1">1</option>
                                        <option value="2">2</option>
                                        <option value="3">3</option>
                                        <option value="5">4</option>
                                        <option value="5">5</option>
                                        <option value="6">6</option>
									</select>
								</div>
								<div class="col-sm-3 col-12">
									<select class="custom-select advanced-search-fields" name="bedroom[max]" id="max_beds">
										<option selected disabled value="">Max. bed</option>
                                        <option value="2">2</option>
                                        <option value="3">3</option>
                                        <option value="4">4</option>
                                        <option value="5">5</option>
                                        <option value="6">6</option>
                                        <option value="7">7</option>
                                        <option value="7+">7+</option>
									</select>
								</div>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-sm-3 col-12">
							<div class="row">
								<div class="col-sm-6 col-12">
									<select class="custom-select advanced-search-fields" name="area[min]" id="min_area_id">
										<option selected disabled value="">Min. area</option>
                                        <option value="1000">1000</option>
                                        <option value="2000">2000</option>
                                        <option value="3000">3000</option>
                                        <option value="4000">4000</option>
                                        <option value="5000">5000</option>
                                        <option value="6000">6000</option>
                                        <option value="7000">7000</option>
                                        <option value="8000">8000</option>
                                        <option value="9000">9000</option>
									</select>
								</div>
								<div class="col-sm-6 col-12">
									<select class="custom-select advanced-search-fields" name="area[max]" id="max_area">
										<option selected disabled value="">Max. area</option>
                                        <option value="2000">2000</option>
                                        <option value="3000">3000</option>
                                        <option value="4000">4000</option>
                                        <option value="5000">5000</option>
                                        <option value="6000">6000</option>
                                        <option value="7000">7000</option>
                                        <option value="8000">8000</option>
                                        <option value="9000">9000</option>
									</select>
								</div>
							</div>
						</div>
						<div class="col-sm-3 col-12">
							<select class="custom-select advanced-search-fields" name="furnishing" id="furnishing">
								<option selected disabled value="">All furnishings</option>
								<option value="furnished"></option>
								<option value="semi-furnished"></option>
							</select>
						</div>
						<div class="col-sm-3 col-12">
							<select class="custom-select advanced-search-fields" name="state_id" id="state_id">
								<option selected disabled value="">Emirates</option>
								@foreach($states as $state)
                                    <option value="{{$state->id}}">{{$state->name}}</option>
                                @endforeach
							</select>
						</div>
						<div class="col-sm-3 col-12">
							<select class="custom-select advanced-search-fields" name="city_id" id="city_id">
								<option selected disabled value="">Al hoor</option>
								<option>...</option>
							</select>
							<div class="row">
								<div class="col-sm-4 offset-sm-8 col-12">
									<input type="reset" class="reset-input btn-danger text-white" value="Reset">
								</div>
							</div>
						</div>
					</div>
				{{Form::close()}}
			</div>
		</div>
	</div>
</div>
<!-- End Advanced Search -->

<!-- Special Section -->
<!-- <div class="container mb-5">
	<div class="row">
		<div class="col-lg-6 col-12">
			<div class="half-box">
				<div class="right-box">
					<h1 class="halfbox-titlelight">FIND YOUR</h1>
					<h1 class="halfbox-titlebold">NEIGHBOURHOOD</h1>
					<p class="halfbox-para">Discover the best community to live</p>
					<button type="button" class="btn btn-dark btn-sm btn-right">Know more</button>
				</div>
			</div>
		</div>
		<div class="col-lg-6 col-12">
			<div class="row">
				<div class="col-sm-12">
					<div class="mini-box">
						<h1 class="minibox-titlelight">FIND YOUR</h1>
						<h1 class="minibox-titlebold">NEIGHBOURHOOD</h1>
						<p class="minibox-para">Discover the best community to live</p>
						<button type="button" class="btn btn-dark btn-sm">Know more</button>
					</div>
				</div>
			</div>
			<div class="row mt-1">
				<div class="col-sm-12">
					<div class="mini-box1">
						<h1 class="minibox-titlelight">FIND YOUR</h1>
						<h1 class="minibox-titlebold">NEIGHBOURHOOD</h1>
						<p class="minibox-para">Discover the best community to live</p>
						<button type="button" class="btn btn-dark btn-sm">Know more</button>
					</div>
				</div>
			</div>
		</div>
	</div>
</div> -->
<!-- End Special Section -->

<!-- Tab Section -->
<!-- <div class="container nomb-mob pt-2 pb-5 mb-5" style="background-color: #323746;">
	<div class="row">
		<div class="col-lg-12 col-12">
			<div class="text-center">
				<ul class="nav nav-tabs rentalsale-tab" role="tablist">
					<li class="nav-item">
						<a class="nav-link active" data-toggle="tab" href="#rental" role="tab">RENTAL</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" data-toggle="tab" href="#sale" role="tab">SALE</a>
					</li>
				</ul>
			</div>
			<div class="tab-content mt-5">
				<div class="tab-pane active" id="rental" role="tabpanel">
					<div class="row">
						<div class="col-sm-2 col-6">
							<div class="text-center">
								<img class="img-fluid white-image" src="https://hod.co/public/default/frontend/custom/images/tenanticon-1.png">
								<p class="image-para">EJARI Registration</p>
							</div>
						</div>
						<div class="col-sm-2 col-6">
							<div class="text-center">
								<img class="img-fluid white-image" src="https://hod.co/public/default/frontend/custom/images/tenanticon-2.png">
								<p class="image-para">Unified Tenancy Contract</p>
							</div>
						</div>
						<div class="col-sm-2 col-6">
							<div class="text-center">
								<img class="img-fluid white-image" src="https://hod.co/public/default/frontend/custom/images/tenanticon-3.png">
								<p class="image-para">Rental Increase Index</p>
							</div>
						</div>
						<div class="col-sm-2 col-6">
							<div class="text-center">
								<img class="img-fluid white-image" src="https://hod.co/public/default/frontend/custom/images/tenanticon-4.png">
								<p class="image-para">Rental Laws</p>
							</div>
						</div>
						<div class="col-sm-2 col-6">
							<div class="text-center">
								<img class="img-fluid white-image" src="https://hod.co/public/default/frontend/custom/images/tenanticon-1.png">
								<p class="image-para">Ask The Expert</p>
							</div>
						</div>
						<div class="col-sm-2 col-6">
							<div class="text-center">
								<img class="img-fluid white-image" src="https://hod.co/public/default/frontend/custom/images/tenanticon-2.png">
								<p class="image-para">Rental Committee</p>
							</div>
						</div>
					</div>
				</div>
				<div class="tab-pane" id="sale" role="tabpanel">
					<div class="row">
						<div class="col-sm-2 col-6">
							<div class="text-center">
								<img class="img-fluid white-image" src="https://hod.co/public/default/frontend/custom/images/tenanticon-1.png">
								<p class="image-para">FORM F (MOU FOR SALE)</p>
							</div>
						</div>
						<div class="col-sm-2 col-6">
							<div class="text-center">
								<img class="img-fluid white-image" src="https://hod.co/public/default/frontend/custom/images/tenanticon-2.png">
								<p class="image-para">Real Estate Regulations</p>
							</div>
						</div>
						<div class="col-sm-2 col-6">
							<div class="text-center">
								<img class="img-fluid white-image" src="https://hod.co/public/default/frontend/custom/images/tenanticon-3.png">
								<p class="image-para">Sellers and Buyers Guide</p>
							</div>
						</div>
						<div class="col-sm-2 col-6">
							<div class="text-center">
								<img class="img-fluid white-image" src="https://hod.co/public/default/frontend/custom/images/tenanticon-4.png">
								<p class="image-para">Mortgage Calculator</p>
							</div>
						</div>
						<div class="col-sm-2 col-6">
							<div class="text-center">
								<img class="img-fluid white-image" src="https://hod.co/public/default/frontend/custom/images/tenanticon-1.png">
								<p class="image-para">Ask The Expert</p>
							</div>
						</div>
						<div class="col-sm-2 col-6">
							<div class="text-center">
								<img class="img-fluid white-image" src="https://hod.co/public/default/frontend/custom/images/tenanticon-2.png">
								<p class="image-para">Developer Tracking</p>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div> -->
<!-- End Tab Section -->

<!-- My Work -->

<!-- Tab Section -->

<!-- <section class="full-row containerfluid-light mt-4 mb-5 pb-2">

	<div class="container">

		<div class="row top50">

			<div class="col-sm-3 offset-sm-1 col-12">

				<div class="card text-center service-card pb-5">

					<i class="fa fa-home fa-icon justify-content-center align-self-center" aria-hidden="true"></i>

					<div class="card-body">

						<h5 class="card-title">Sell Property</h5>

						<p class="card-text">Morbi accumsan ipsum velit Nam nec tellus a odio tincidunt

							auctor a ornare odio sedlon maurisvitae erat consequat auctor</p>

					</div>

				</div>

			</div>

			<div class="col-sm-3 col-12">

				<div class="card text-center service-card pb-5">

					<i class="fa fa-users fa-icon justify-content-center align-self-center" aria-hidden="true"></i>

					<div class="card-body">

						<h5 class="card-title">Expert Agents</h5>

						<p class="card-text">Morbi accumsan ipsum velit Nam nec tellus a odio tincidunt

							auctor a ornare odio sedlon maurisvitae erat consequat auctor</p>

					</div>

				</div>

			</div>

			<div class="col-sm-3 col-12">

				<div class="card text-center service-card pb-5">

					<i class="fa fa-file-text-o fa-icon justify-content-center align-self-center" aria-hidden="true"></i>

					<div class="card-body">

						<h5 class="card-title">Daily Listings</h5>

						<p class="card-text">Morbi accumsan ipsum velit Nam nec tellus a odio tincidunt

							auctor a ornare odio sedlon maurisvitae erat consequat auctor</p>

					</div>

				</div>

			</div>

		</div>

	</div>

</section> -->



<!-- Property Slider -->

<!-- <section class="module no-padding properties featured">

	<div class="container">

		<div class="row">

			<div class="col-md-12 col-lg-12">

				<div class="main-title-one">

					<h2 class="title color-primary">Featured Properties</h2>

					<p class="sub-title color-secondery py_60">All of our featured property of this month are include </p>

				</div>

			</div>

		</div>

	</div>



	<div class="slider-nav slider-nav-properties-featured mb-5">

		<span class="slider-prev"><i class="fa fa-angle-left"></i></span>

		<span class="slider-next"><i class="fa fa-angle-right"></i></span>

	</div>



	<div class="slider-wrap">

		<div class="slider slider-featured">

			@foreach($propertyUnitTypes['property_unit_types'] as $prop_unit_type)

			<div class="property property-hidden-content slide">

				<a href="{{$prop_unit_type['view_url']}}" class="property-content">

					<div class="property-title">

						<h4>{{ucwords($prop_unit_type['title'])}}</h4>

						<p class="property-address"><i class="fa fa-map-marker icon"></i>{{$prop_unit_type['city_name']}}</p>

					</div>

					<table class="property-details">

						<tr>

							<td><i class="fa fa-bed"></i> {{$prop_unit_type['bedroom']}} Beds</td>

							<td><i class="fa fa-tint"></i> {{$prop_unit_type['bathroom']}} Baths</td>

							<td><i class="fa fa-expand"></i> {{$prop_unit_type['unit_size']}} Sq Ft</td>

						</tr>

					</table>

				</a>

				<a href="{{$prop_unit_type['view_url']}}" class="property-img">

					<div class="img-fade"></div>

					<div class="property-tag button status">{{$prop_unit_type['mode']}}</div>

					<div class="property-price">{!!$prop_unit_type['price']!!}</div>

					<div class="property-color-bar"></div>

					<img src="{{$prop_unit_type['image']}}" alt="{{ucwords($prop_unit_type['title'])}}" />

				</a>

			</div>

			@endforeach

		</div>

	</div>

</section> -->

<!--	Featured Properties

=======================================================-->

<!-- <div class="container pt-5 pb-5">

	<div class="row">

		<div class="col-sm-7 col-12">

			<div class="thumbnail_two overlay_two overfollow mx-n13 pp-place">

				<img class="place-image" src="{{asset('theme/default/images/studiobg.jpg')}}" alt="">

				<div class="thum_two_text color-white hover_white">

					<h4><a href="javascript:void(0)">STUDIO APARTMENTS</a></h4>

				</div>

			</div>

		</div>

		<div class="col-sm-5 col-12">

			<div class="thumbnail_two overlay_two overfollow mx-n13 pp-place">

				<img class="place-image" src="{{asset('theme/default/images/familyhomes.jpg')}}" alt="">

				<div class="thum_two_text color-white hover_white">

					<h4><a href="#!">FAMILY HOMES</a></h4>

				</div>

			</div>

		</div>

	</div>

</div> -->



<!--	Property For Sale

============================================================-->

<section class="full-row pt-3">

	<!-- Property For Sale -->

	<div class="container">

		<div class="row">

			<div class="col-md-12 col-lg-12 text-center pb-5">

				<h4 class="text-dark title-h4">Property For Sale</h4>

			</div>

		</div>

		<div class="row">

			<div class="col-md-12 col-lg-12">

				<div class="owl-carousel carousel-main">

					@if(count($propertyForSale['property_unit_types'])>0)

					@foreach($propertyForSale['property_unit_types'] as $prop_unit_type)

					<div class="thumbnail_one mb_30">

						<div class="image_area overlay_one overfollow custom-property-img fproprty">

							<img class="property-featured-image" src="{{$prop_unit_type['image']}}" alt="{{$prop_unit_type['title']}}">

							{{-- <div class="Featured">Featured</div> --}}

							<div class="sale sale_position bg-primary">For {{$prop_unit_type['mode']}}</div>

						</div>

						<div class="price_box">

							<div class="price_position text-dark price_btn btn-block">

								<span>{!!$prop_unit_type['price']!!}</span>

							</div>

						</div>

						<div class="thum_one_content">

							<div class="thum_title color-secondery">

								<h6 title="{{$prop_unit_type['title']}}" class="hover_primary">

									<a class="para-link property-detail-text" href="{{$prop_unit_type['view_url']}}">

										{{$prop_unit_type['title']}}

									</a>

								</h6>

								<p title="Property address">

									<i class="fa fa-map-marker" aria-hidden="true"></i>

									{{$prop_unit_type['city_name']}}

								</p>

							</div>

							<div class="thum_data bg-primary custom-amenities-grid">

								<hr />

								<ul class="nav nav-pills nav-fill list-inline mx-auto justify-content-center">

									<li class="list-inline-item" title="Number of beds"><span class="fa fa-bed"> {{$prop_unit_type['bedroom']}}</span></li>

									<li class="list-inline-item" title="Number of bathrooms"><span class="fa fa-bath"> {{$prop_unit_type['bathroom']}} </span></li>

									<li class="list-inline-item" title="Total area"><span class="fa fa-square"> {{$prop_unit_type['unit_size']}} </span></li>

								</ul>

								<hr />

							</div>

							<div class="ft_area p_20">

								<div title="Listed at" class="post_author"><i class="fa fa-clock" aria-hidden="true"></i>{{$prop_unit_type['created_at']}}</div>

								<a href="{{$prop_unit_type['view_url']}}" class="btn btn-sm custom-border-btn btn-outline-dark pull-right">View Property</a>

							</div>

						</div>

					</div>

					@endforeach

					@endif

				</div>

			</div>

		</div>

	</div>



	<!-- Property For Rent -->

	<div class="container mt-5">

		<div class="row">

			<div class="col-md-12 col-lg-12 text-center pb-5">

				<h4 class="text-dark title-h4">Property For Rent</h4>

			</div>

		</div>

		<div class="row">

			<div class="col-md-12 col-lg-12">

				<div class="owl-carousel carousel-main">

					@if(count($propertyForRent['property_unit_types'])>0)

					@foreach($propertyForRent['property_unit_types'] as $prop_unit_type)

					<div class="thumbnail_one mb_30">

						<div class="image_area overlay_one overfollow custom-property-img fproprty">

							<img class="property-featured-image" src="{{$prop_unit_type['image']}}" alt="{{$prop_unit_type['title']}}">

							{{-- <div class="Featured">Featured</div> --}}

							<div class="sale sale_position bg-primary">For {{$prop_unit_type['mode']}}</div>

						</div>

						<div class="price_box">

							<div class="price_position text-dark price_btn btn-block">

								<span>{!!$prop_unit_type['price']!!}</span>

							</div>

						</div>

						<div class="thum_one_content">

							<div class="thum_title color-secondery">

								<h6 title="{{$prop_unit_type['title']}}" class="hover_primary">

									<a class="para-link property-detail-text" href="{{$prop_unit_type['view_url']}}">

										{{$prop_unit_type['title']}}

									</a>

								</h6>

								<p title="Property address">

									<i class="fa fa-map-marker" aria-hidden="true"></i>

									{{$prop_unit_type['city_name']}}

								</p>

							</div>

							<div class="thum_data bg-primary custom-amenities-grid">

								<hr />

								<ul class="nav nav-pills nav-fill list-inline mx-auto justify-content-center">

									<li class="list-inline-item" title="Number of beds"><span class="fa fa-bed"> {{$prop_unit_type['bedroom']}}</span></li>

									<li class="list-inline-item" title="Number of bathrooms"><span class="fa fa-bath"> {{$prop_unit_type['bathroom']}} </span></li>

									<li class="list-inline-item" title="Total area"><span class="fa fa-square"> {{$prop_unit_type['unit_size']}} Sq Ft </span></li>

								</ul>

								<hr />

							</div>

							<div class="ft_area p_20">

								<div title="Listed at" class="post_author"><i class="fa fa-clock" aria-hidden="true"></i>{{$prop_unit_type['created_at']}}</div>

								<a title="{{$prop_unit_type['title']}}" href="{{$prop_unit_type['view_url']}}" class="btn btn-sm custom-border-btn btn-outline-dark pull-right">View Property</a>

							</div>

						</div>

					</div>

					@endforeach

					@endif

				</div>

			</div>

		</div>

	</div>

</section>



<!--	Popular Place

============================================================-->

<div class="container mb-5">

	<div class="row">

		<div class="col-md-12 col-lg-12">

			<div class="main-title-one">

				<h2 class="title color-primary title-h4">Popular Places</h2>

				<p class="sub-title color-secondery py_60">Here are the list of cities where we are able to provice suitable property for you in U.A.E.</p>

			</div>

		</div>

	</div>

	<div class="col-lg-12">

		<div class="row">

			@if(count($states)>0)

			@foreach ($states as $state)

			@php

			$img = asset('theme/default/images/thumbnail/01.jpg');

			if(!empty($state->image))

			{

			$img = asset($state->image);

			}

			@endphp

			<div class="col-md-6 col-lg-3 pb-1">

				<div class="thumbnail_two overlay_two overfollow mx-n13 pp-place">

					<img class="place-image" src="{{$img}}" alt="{{ucfirst($state->name)}}">

					<div class="thum_two_text color-white hover_white">

						<h4><a href="{{route('property.search.state',[$state->id,kebab_case($state->name)])}}" style="text-transform: uppercase;">{{ucfirst($state->name)}}</a></h4>

					</div>

				</div>

			</div>

			@endforeach

			<div class="col-md-6 col-lg-3 pb-1">

				<div class="thumbnail_two overlay_two overfollow mx-n13 pp-place">

					<img class="place-image" src="{{asset('img/show_all.png')}}" alt="Show from all cities">

					<div class="thum_two_text color-white hover_white">

						<h4><a href="{{route('property.search')}}">Show From All</a></h4>

					</div>

				</div>

			</div>

			@endif

		</div>

	</div>

</div>

<!--	Text Block One

======================================================-->

<!-- <section class="full-row bg-gray">

	<div class="container">

		<div class="row">

			<div class="col-md-12 col-lg-12">

				<div class="main-title-one">

					<h2 class="title color-primary title-h4">What We Do</h2>

					<p class="sub-title color-secondery py_60">We listed our oppertunity and servies as a real estate company</p>

				</div>

			</div>

		</div>

		<div class="text-box-one">

			<div class="row what_we_do">

				<div class="col-sm-3 offset-sm-1 col-12">

					<div class="box-one p-4 text-center rounded icon_default icon_font">

						<i class="flaticon-rent" aria-hidden="true"></i>

						<h3 class="hover_primary py_15 m-0 title-text"><a class="anchor-title" href="javascript:void(0)">Selling Service</a></h3>

						<p class="color-secondery para-text" align="justify">At {{ config('app.name', 'Laravel') }}, we feel that the real estate business should be a decorous affair, which must end up in win-win transactions. We focus largely on customer satisfaction, as we believe in the phrase “Once a client, Always a client”.</p>

					</div>

				</div>

				<div class="col-sm-3 col-12">

					<div class="box-one p-4 text-center rounded icon_default icon_font">

						<i class="flaticon-for-rent" aria-hidden="true"></i>

						<h3 class="hover_primary py_15 m-0 title-text"><a class="anchor-title" href="javascript:void(0)">Rental Service</a></h3>

						<p class="color-secondery para-text" align="justify">We aim to help you find an ideal place to live within your budget and fulfilling all your preferences. We are dedicated to provide you advance and innovative platform, also we completely understand how important is to connect with true specialized to get your job done.</p>

					</div>

				</div>

				<div class="col-sm-3 col-12">

					<div class="box-one p-4 text-center rounded icon_default icon_font">

						<i class="flaticon-list" aria-hidden="true"></i>

						<h3 class="hover_primary py_15 m-0 title-text"><a class="anchor-title" href="javascript:void(0)">Property Maintenance Service</a></h3>

						<p class="color-secondery para-text" align="justify">estate.com is a unique digital platform which offers 360 degree solution to our customers for all their property needs. The portal is completely devoted to meet every requirement of the customer. At estate.com we provide credible information with maximum properties on our portal.</p>

					</div>

				</div>

			</div>

		</div>

	</div>

</section> -->

<!--	Happy Living

============================================================-->

<!-- <section class="full-row living bg_one overlay_three">

	<div class="container">

		<div class="row">

			<div class="col-md-12 col-lg-6">

				<div class="living-list color-white pr-4">

					<h3 class="pb_30">Make life for happy living</h3>

					<ul>

						<li class="pb_30 icon_default icon_font">

							<i class="flaticon-reward" aria-hidden="true"></i>

							<h5 class="pb_20">Experience Quality</h5>

							<p>Ad non vivamus Elementum eget fringilla venenatis quisque, maecenas adipiscing aliquet justo. Libero. Gravida. Sapien, dolor nostra sem. Rutrum conubia inceptos egestas dolor class.</p>

						</li>

						<li class="pb_30 icon_default icon_font">

							<i class="flaticon-real-estate" aria-hidden="true"></i>

							<h5 class="pb_20">Experience Quality</h5>

							<p>Ad non vivamus Elementum eget fringilla venenatis quisque, maecenas adipiscing aliquet justo. Libero. Gravida. Sapien, dolor nostra sem. Rutrum conubia inceptos egestas dolor class.</p>

						</li>

						<li class="pb_30 icon_default icon_font">

							<i class="flaticon-seller" aria-hidden="true"></i>

							<h5 class="pb_20">Experience Quality</h5>

							<p>Ad non vivamus Elementum eget fringilla venenatis quisque, maecenas adipiscing aliquet justo. Libero. Gravida. Sapien, dolor nostra sem. Rutrum conubia inceptos egestas dolor class.</p>

						</li>

					</ul>

				</div>

			</div>

		</div>

	</div>

</section> -->

<!--	How It Work

============================================================-->

<!-- <section class="full-row">

	<div class="container">

		<div class="row">

			<div class="col-md-12 col-lg-12">

				<div class="main-title-one">

					<h2 class="title color-primary">How It Works</h2>

					<p class="sub-title color-secondery py_60">Process to get your right one, almost easy, flexible and fun.</p>

				</div>

			</div>

		</div>

		<div class="text-box-two">

			<div class="row how_it_work">

				<div class="col-sm-3 offset-sm-1 col-12">

					<div class="box-two p_30 icon_default icon_font color-secondery rounded mb-4">

						<i class="flaticon-home blue-icon" aria-hidden="true"></i>

						<h5 class="color-primary py-2 m-0">Search Your Home</h5>

						<p class="pt_15">Search a suitable home in our website ,view all available facilities and click on submit a query button in property detail page.</p>

					</div>

				</div>

				<div class="col-sm-3 col-12">

					<div class="box-two p_30 icon_default icon_font color-secondery rounded mb-4">

						<i class="flaticon-contact blue-icon" aria-hidden="true"></i>

						<h5 class="color-primary py-2 m-0">Let's Contact With Us</h5>

						<p class="pt_15">Select your home or appartment and let’s contact with us. Ask what answer you need. You can also contact with the agent if you have any question.</p>

					</div>

				</div>

				<div class="col-sm-3 col-12">

					<div class="box-two p_30 icon_default icon_font color-secondery rounded mb-4">

						<i class="flaticon-payment blue-icon" aria-hidden="true"></i>

						<h5 class="color-primary py-2 m-0">Make a Deal and Payment</h5>

						<p class="pt_15">Sign upi online and move in as soon as you ready! We complete your property deal in our office. After the deal you can pay the instalment or rent in online.</p>

					</div>

				</div>

			</div>

		</div>

	</div>

</section> -->



<!--	Blog

============================================================-->



<!--	Massage Box One

============================================================-->

<!-- <div class="full-row massage bg-darkblue py-5">

	<div class="container">

		<div class="row">

			<div class="col-mg-12 col-lg-12">

				<div class="alinment color-white">

					<h3 class="massage_one">How to Become Easy and Flexible to Living in UAE. Get A Comfortable Appartment in Budget.</h3>

				</div>

			</div>

		</div>

	</div>

</div> -->

@endsection

@section('script')

<script>
	$(document).ready(function() {

		$("#search_form_reset_btn").on('click', function(e) {

			e.preventDefault();

			$("#search_form")[0].reset();

			$("#extraFeatureCollapse").collapse('hide');



		});

		$(document).on('click', '.select_property_mode', function(e) {

			e.preventDefault();

			$("#mode").val($(this).attr('data-mode'));



		});



		$("#state_id").on('change', function(e) {

			$("#city_id").empty();

			var params = {

				'state_id': $(this).val(),

			};



			function fn_success(result) {

				let option = $($.parseHTML(`<option value="">Select Location</option>`));

				$("#city_id").append(option);

				$.each(result.data, function(key, item) {

					let $option = $($.parseHTML(`<option value="${item.id}">${item.name}</option>`));

					$("#city_id").append($option);

				});

			};



			function fn_error(result) {

				if (result.response == "validation_error") {

					$.validation_errors(result);

				} else {

					toast('error', result.message, 'bottom-right');

				}

			};

			$.fn_ajax('fetch/cities', params, fn_success, fn_error);

		});

	});
</script>

@endsection
