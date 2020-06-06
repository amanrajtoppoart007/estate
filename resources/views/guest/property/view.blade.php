@extends('guest.layout.main')

@include('guest.include.header')

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

<div class="container py-4">
    <div class="row">
        <div class="col-sm-8 col-12">
            <img class="img-fluid" src="https://www.propertyfinder.ae/property/76b368c9f0898bb5c0079e1e6af3fd35/856/550/MODE/c53997/7430526-a83c9o.webp">
            <button type="button" class="btn btn-light btn-image">Show 15 photos</button>
            <button type="button" class="btn btn-light btn-image1">View on Map</button>
        </div>
        <div class="col-sm-4 col-12 mob-hide">
            <div class="row">
                <div class="col-sm-12 col-12">
                    <img class="img-fluid" src="https://www.propertyfinder.ae/property/21705e42c2906c934ad7ba65f6817d7b/416/272/MODE/238581/7430526-c8533o.webp">
                </div>
                <div class="col-sm-12 col-12 mt-2">
                    <img class="img-fluid" src="https://www.propertyfinder.ae/property/d47eea54aaabb0570ffe6759380d063c/416/272/MODE/f0ac2c/7430526-37e13o.webp">
                </div>
            </div>
        </div>
    </div>
</div>

<div class="container-fluid pt-5 pb-5" style="background-color: #EBF1F5;">

    <div class="container">

        <div class="row">

            <div class="col-sm-8 col-12">

                <div class="property-single-item property-main">

                    @if(($prop_unit_type))

                    @php

                    $img = asset('theme/default/images/thumbnail/01.jpg');

                    if(!empty($prop_unit_type->property->images))

                    {

                    $images = object_to_array($prop_unit_type->property->images);

                    if(!empty($images))

                    {

                    $img = asset($images[0]['image_thumb']);

                    }

                    }

                    $prop_for[1] = 'Rent';

                    $prop_for[2] = 'Sale';

                    if($prop_unit_type->property->prop_for==1)

                    {

                    $property_mode = 'Rent';

                    $price = $prop_unit_type->rental_amount.' <small>AED</small>/<small>'.$prop_unit_type->rent_type.'</small>';

                    }

                    else

                    {

                    $property_mode = 'Sale';

                    $price = $prop_unit_type->rental_amount.' <small>AED</small>';

                    }

                    @endphp

                    <div class="property-header">

                        <div class="property-title">

                            <h4>{{ucwords($prop_unit_type->property->title)}}</h4>

                            <!-- <div class="property-price-single right"> <small>{!!$price!!}</small></div> -->

                            <p class="property-address"><i class="fa fa-map-marker icon"></i>{{ $prop_unit_type->property->full_address }}</p>

                            <div class="clear"></div>

                        </div>

                        <div class="property-single-tags">

                            <div class="property-tag button status">For {{$property_mode}}</div>

                            <div class="property-type right">Property Type: <a href="javascript:void(0)">{{$prop_unit_type->property->propertyType->title}}</a></div>

                        </div>

                    </div>



                    <table class="property-details-single">

                        <tr>

                            <td><i class="fa fa-bed"></i> <span>{{$prop_unit_type->bedroom}}</span> Beds</td>

                            <td><i class="fa fa-tint"></i> <span>{{$prop_unit_type->bathroom}}</span> Baths</td>

                            <td><i class="fa fa-expand"></i> <span>{{$prop_unit_type->unit_size}}</span> Sq Ft</td>

                            <td><i class="fa fa-car"></i> <span>{{($prop_unit_type->parking)?'1':'0'}}</span> Parking</td>

                        </tr>

                    </table>



                    <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                        <ol class="carousel-indicators">
                            <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                            <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                            <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
                        </ol>
                        <div class="carousel-inner">
                            <div class="carousel-item active">
                            <img src="https://www.propertyfinder.ae/property/76b368c9f0898bb5c0079e1e6af3fd35/856/550/MODE/c53997/7430526-a83c9o.webp" class="d-block w-100" alt="...">
                            </div>
                            <div class="carousel-item">
                            <img src="https://www.propertyfinder.ae/property/76b368c9f0898bb5c0079e1e6af3fd35/856/550/MODE/c53997/7430526-a83c9o.webp" class="d-block w-100" alt="...">
                            </div>
                            <div class="carousel-item">
                            <img src="https://www.propertyfinder.ae/property/76b368c9f0898bb5c0079e1e6af3fd35/856/550/MODE/c53997/7430526-a83c9o.webp" class="d-block w-100" alt="...">
                            </div>
                        </div>
                        <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="sr-only">Previous</span>
                        </a>
                        <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="sr-only">Next</span>
                        </a>
                    </div>

                </div>

                <div class="widget property-single-item property-description content">

                    <h4> Description</h4>

                    <p>{{$prop_unit_type->property->description}}</p>

                </div>

                @php $agent = ($prop_unit_type->property->agent)?json_decode(json_encode($prop_unit_type->property->agent),true):[]; @endphp

                @if(!empty($agent))

                <div class="widget property-single-item property-agent">

                    <h2 class="agent-heading">Agent</h2>

                    <div class="agent">
                        <div class="row">
                            <div class="col-sm-3 col-12">
                                <div class="card">
                                    <img class="img-fluid" src="https://images.unsplash.com/photo-1506794778202-cad84cf45f1d?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=1534&q=80" class="card-img-top" alt="...">
                                    <div class="card-body card-nopad">
                                        <a href="#" class="btn btn-outline-primary btn-100">68 Properties</a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-3 col-12">
                                <h4><a href="javascript:void(0)"> {{($agent)?$agent['name']:''}}</a></h4>
                                <p><i class="fa fa-check text-success" aria-hidden="true"></i> Verified Agent</p>
                                <p><i class="fa fa-envelope icon"></i> {{($agent)?$agent['email']:''}}</p>
                                <p><i class="fa fa-phone icon"></i> {{($agent)?$agent['mobile']:''}}</p>
                                <hr />
                                <ul class="social-icons">

                                    <li><a href="javascript:void(0)"><i class="fa fa-facebook"></i></a></li>

                                    <li><a href="javascript:void(0)"><i class="fa fa-instagram"></i></a></li>

                                    <li><a href="javascript:void(0)"><i class="fa fa-twitter"></i></a></li>

                                    <li><a href="javascript:void(0)"><i class="fa fa-google-plus"></i></a></li>

                                    <li><a href="javascript:void(0)"><i class="fa fa-linkedin"></i></a></li>

                                </ul>
                            </div>
                            <div class="col-sm-6 col-12">
                                <div class="row">
                                    <div class="col-sm-6 col-6">
                                        <a href="javascript:void(0)" class="btn btn-success btn-sm">
                                            Contact Agent
                                        </a>
                                    </div>
                                    <div class="col-sm-6 col-6">
                                        <a href="javascript:void(0)" class="btn btn-danger btn-sm">
                                            Agent Details
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>

                </div><!-- end agent -->

                @endif



                <div class="property_summary">

                    <h5 class="color-primary">Property Summary</h5>

                    <div class="table overflow-x-scroll">

                        <table class="table table-striped color-secondery">

                            <tbody>

                                <tr>

                                    <td>Property Id :</td>

                                    <td>{{$prop_unit_type->property->propcode}}</td>

                                    <td>Listing Type :</td>

                                    <td>{{$prop_unit_type->property->propertyType->title}}</td>

                                </tr>

                                <tr>

                                    <td>Property Type:</td>

                                    <td>villa</td>

                                    <td>Current Owner :</td>

                                    <td>{{($prop_unit_type->property->owner)?$prop_unit_type->property->owner->name:''}}</td>

                                </tr>

                            </tbody>

                        </table>

                    </div>

                </div>

                @if(!empty($prop_unit_type->property->feature))

                @php

                $amnities = explode(',',$prop_unit_type->property->feature);

                $i =0;

                @endphp

                <div class="property_amnities">

                    <h5 class="color-primary">Amnities</h5>

                    <ul class="row more_details">

                        @foreach($features as $feature)

                        @if(in_array($feature->id,$amnities))

                        <li class="col-md-12 col-lg-4">

                            <i class="fa fa-check"></i>{{$feature->title}}

                        </li>

                        @endif

                        @endforeach

                    </ul>

                </div>

                @endif

                <div class="property_location mb-5">

                    <div class="single-map">

                        <h5 class="color-primary">Property Location</h5>

                        <div id="map"></div>

                    </div>

                </div>



                @if(!empty($rel_prop_unit_types['property_unit_types']))

                <div class="widget property-single-item property-related">

                    <h4>

                        Related Properties

                    </h4>



                    <div class="row">

                        @foreach($rel_prop_unit_types['property_unit_types'] as $property)



                        <div class="col-lg-6 col-md-6">

                            <div class="property shadow-hover">

                                <a href="{{$property['view_url']}}" class="property-img">

                                    <div class="img-fade"></div>

                                    <div class="property-tag button status">For {{$property['mode']}}</div>

                                    <div class="property-price">{!!$property['price']!!}</div>

                                    <div class="property-color-bar"></div>

                                    <img src="{{$property['image']}}" alt="{{$property['title']}}" />

                                </a>

                                <div class="property-content">

                                    <div class="property-title">

                                        <h4><a href="{{$property['view_url']}}">{{$property['title']}}</a></h4>

                                        <p class="property-address"><i class="fa fa-map-marker icon"></i>123 Smith Dr, Annapolis, MD</p>

                                    </div>

                                    <table class="property-details">

                                        <tr>

                                            <td><i class="fa fa-bed"></i> {{$property['bedroom']}} Beds</td>

                                            <td><i class="fa fa-tint"></i> {{$property['bathroom']}} Baths</td>

                                            <td><i class="fa fa-expand"></i>{{$property['unit_size']}} Sq Ft</td>

                                        </tr>

                                    </table>

                                </div>
                                

                                <div class="property-footer">

                                    <span class="left"><i class="fa fa-calendar-o icon"></i> {{$property['created_at']}}</span>

                                    <div class="clear"></div>

                                </div>

                            </div>

                        </div>

                        @endforeach

                    </div>

                </div>

                @endif

            </div>



            <div class="col-sm-4 col-12">


                <div class="widget widget-sidebar recent-properties pb-3">
                    <div class="card mb-5 card-sticky">
                        <div class="card-body">
                            <h2 class="card-title">13,50,000 AED</h2>
                            <hr />
                            <div class="row">
                                <div class="col-sm-6 col-12">
                                    <button class="btn btn-secondary btn-block" style="display: inline;">Call Now</button>
                                </div>
                                <div class="col-sm-6 col-12">
                                    <button class="btn btn-info btn-block" style="display: inline;">Email</button>
                                </div>
                            </div>
                            <hr />
                            <p class="text-center" style="line-height: 1.2em;">
                                Al Hoor has verified the accuracy and authenticity of this listing.
                            </p>
                            <button type="button" class="btn btn-danger btn-sm text-center btn-block"> <i class="fa fa-check" aria-hidden="true"></i> Verified</button>
                        </div>
                    </div>
                    <h4>

                        Recent Properties

                    </h4>

                    <div class="widget-content">

                        @foreach($recents['property_unit_types'] as $property)

                        <div class="recent-property">

                            <div class="row">

                                <div class="col-lg-4 col-md-4 col-sm-4">

                                    <a href="{{$property['view_url']}}" alt="{{$property['title']}}" />

                                    <img src="{{$property['image']}}" alt="{{$property['title']}}">

                                    </a>

                                </div>

                                <div class="col-lg-8 col-md-8 col-sm-8">

                                    <h5><a href="{{$property['view_url']}}">{{$property['title']}}</a></h5>

                                    <p>{!!$property['price']!!}</p>

                                </div>

                            </div>

                        </div>

                        @endforeach

                    </div><!-- end widget content -->

                </div><!-- end widget -->

                <div class="widget widget-sidebar recent-properties">

                    <h4>Quick Links</h4>

                    <div class="widget-content box mt-2">

                        <ul class="bullet-list">

                            <li><a href="javascript:void(0)">Featured Properties</a></li>

                            <li><a href="javascript:void(0)">Featured Agents</a></li>

                            <li><a href="javascript:void(0)">Terms & Conditions</a></li>

                            <li><a href="javascript:void(0)">Privacy Policy</a></li>

                            <li><a href="javascript:void(0)">Frequently Asked Questions</a></li>

                            <li><a href="javascript:void(0)">Login</a></li>

                            <li><a href="javascript:void(0)">Submit a Property</a></li>

                        </ul>

                    </div>

                </div>

            </div>

        </div>

        @endif

    </div>

</div>

@endsection

@section('script')

<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBPZ-Erd-14Vf2AoPW2Pzlxssf6-2R3PPs"></script>

<script src="{{asset('theme/default/js/map.scripts.js')}}"></script>

<script>
    (function($) {

        var _latitude = '{{old('
        latitude ')?old('
        latitude '):$prop_unit_type->property->latitude}}';

        var _longitude = '{{old('
        longitude ')?old('
        longitude '):$prop_unit_type->property->longitude}}';

        var _title = '{{old('
        address ')?old('
        address '):$prop_unit_type->property->address}}';

        _latitude = (_latitude) ? _latitude : 25.204850;

        _longitude = (_longitude) ? _longitude : 55.270862;

        _title = (_title) ? _title : '';

        init(_latitude, _longitude, _title);

    })(jQuery);

    $(document).ready(function() {

        $("#booking_request_form").on('submit', function(e) {

            e.preventDefault();

            var params = $("#booking_request_form").serialize();

            var url = '{{route('bookingRequest.store')}}';

            function fn_success(result)

            {

                $("#booking_request_form")[0].reset();

                toast('success', result.message, 'bottom-right');

                $("#booking_request_modal").modal("hide");

            };

            function fn_error(result)

            {

                toast('error', result.message, 'bottom-right');

            };

            $.fn_ajax(url, params, fn_success, fn_error);

        });

    });
</script>

@endsection