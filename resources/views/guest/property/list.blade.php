@extends('guest.layout.main')

@include('guest.include.header')

@section('head')

@endsection

@section('content')

<!-- Advanced Search -->
<div class="container-fluid mt-t pt-5 pb-3 filter-tab">
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

<!-- Property View Page -->

<div class="container-fluid pt-5 pb-5">

    <div class="container">

        <div class="row">

            <div class="col-sm-8 col-12">

                <div class="property-listing-header">

                    <span class="property-count left">Showing  {{$propUnitTypes['count']}} out of {{$propUnitTypes['total']}} results</span>

                    <div class="property-layout-toggle right">

                        <a href="{{route('property.search',['view'=>'map'])}}" class="property-layout-toggle-item"><i class="fa fa-map"></i></a>

                        <a href="{{route('property.search',['view'=>'grid'])}}" class="property-layout-toggle-item"><i class="fa fa-th-large"></i></a>

                        <a href="{{route('property.search',['view'=>'list'])}}" class="property-layout-toggle-item active"><i class="fa fa-bars"></i></a>

                    </div>

                    <div class="clear"></div>

                </div>

                @foreach($propUnitTypes['property_unit_types'] as $prop_unit_type)

                <div class="property property-row property-row-sidebar shadow-hover">

                <a href="{{$prop_unit_type['view_url']}}" class="property-img">

                        <div class="img-fade"></div>

                        <div class="property-tag button status">For {{$prop_unit_type['mode']}}</div>

                        <div class="property-price">{!!$prop_unit_type['price']!!}</div>

                        <div class="property-color-bar"></div>

                        <img src="{{$prop_unit_type['image']}}" alt="">

                    </a>

                    <div class="property-content">

                        <div class="property-title">

                        <h4><a href="{{$prop_unit_type['view_url']}}">{{$prop_unit_type['title']}}</a></h4>

                        <p class="property-address"><i class="fa fa-map-marker icon"></i>{{$prop_unit_type['city_name']}}</p>

                        <div class="clear"></div>

                        <p class="property-text">

                           {{ \Illuminate\Support\Str::limit($prop_unit_type['description'], 100, $end='...')}}</p>

                        </div>

                        <table class="property-details">

                        <tbody><tr>

                            <td><i class="fa fa-bed"></i> {{$prop_unit_type['bedroom']}} Beds</td>

                            <td><i class="fa fa-tint"></i> {{$prop_unit_type['bathroom']}} Baths</td>

                            <td><i class="fa fa-expand"></i> {{$prop_unit_type['unit_size']}} Sq Ft</td>

                        </tr>

                        </tbody></table>

                    </div>

                    <div class="property-footer">

                        <span class="left"><i class="fa fa-calendar-o icon"></i> {{$prop_unit_type['created_at']}}</span>

                        <span class="right">

                          <a href="{{$prop_unit_type['view_url']}}" class="button button-icon"><i class="fa fa-angle-right"></i>Details</a>

                        </span>

                        <div class="clear"></div>

                    </div>

                    <div class="clear"></div>

                </div>

          @endforeach

                {{$propUnitTypes['links']}}

            </div>

            <div class="col-sm-4 col-12">
                <div class="widget widget-sidebar recent-properties">

                   @include('guest.common.quickLink')

                </div>
                <img class="img-fluid img-thumbnail" src="https://camblycontent.files.wordpress.com/2017/02/advertising-word-block.jpg">

                <img class="img-fluid img-thumbnail mt-4" src="https://camblycontent.files.wordpress.com/2017/02/advertising-word-block.jpg">

                <img class="img-fluid img-thumbnail mt-4" src="https://camblycontent.files.wordpress.com/2017/02/advertising-word-block.jpg">
                <img class="img-fluid img-thumbnail mt-4" src="https://camblycontent.files.wordpress.com/2017/02/advertising-word-block.jpg">
            </div>

        </div>

    </div>

</div>

@endsection

@section('script')

  <script>

      $(document).ready(function(){

          var price_slider = document.getElementById('custom_price_slider');

            noUiSlider.create(price_slider, {

                connect: true,

                start: [ {{trim_price((request()->price)?request()->price['min']:1000)}}, {{trim_price((request()->price)?request()->price['max']:999999)}} ],

                step: 100,

                margin:600,

                range: {

                    'min': [1000],

                    'max': [999999]

                },

                tooltips: true,

                format: wNumb({

                    decimals: 0,

                    thousand: ',',

                    prefix: 'AED',

                }),

            });

        price_slider.noUiSlider.on('update', function (values, handle) {

            $("#min_price").val(get_int(values[0]));

            $("#max_price").val(get_int(values[1]));

        });

        function get_int(input)

        {

         var output = input.replace(",","");

             output = output.replace("AED","");

          return $.trim(output);

        }

      });

  </script>

@endsection
