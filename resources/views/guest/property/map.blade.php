@extends('guest.layout.main')

@section('head')

@endsection

@section('content')



<style>

    .my-map-form {

        background-color: #F5F5F5;

        padding: 20px;

    }



    .container-fluid {

        overflow: hidden;

    }



    .navbar-light .navbar-nav .nav-link:hover {

        color: #48A0DC !important;

    }



    .navbar {

        height: 70px !important;

        background-color: #ffffff !important;

        box-shadow: 0 .5rem 1rem rgba(0,0,0,.15)!important;

    }



    .noUi-horizontal .noUi-tooltip{

        color: #48A0DC !important;

    }



    @media screen and (min-width: 250px) and (max-width: 768px) {

        .navbar {

            height: auto !important;

            padding-left: 15px !important;

            padding-right: 15px !important;

        }



        .container-fluid {

            padding-left: 15px !important;

            padding-right: 15px !important;

        }



        .no-pl {

            padding-left: 30px !important;

        }



        .py_80 {

            padding:20px 0px;

        }



        .logo-bottom {

			filter: brightness(0) invert(1);

		}



    }

</style>





<!-- Property View Page -->

<div class="container-fluid p-0" style="background-color: #ffffff;">

    <div class="row">

        <div class="col-sm-6 col-12 p-0">

           <div id="map" class="map_2"></div>

        </div>

        <div class="col-sm-6 col-12 mt-3 p-0">

            <div class="row">

                <div class="col-sm-12 col-12 mb-5 pl-5 no-pl nom-mb">

                    <div class="ft-widget-title color-primary">

                        <h4 class="title-h1">Property Search <a href="http://estate.demosoft.live/" style="float: right;margin-right: 40px;">Home</a></h4>

                    </div>

                </div>

            </div>

            <form id="property_search_form" class="my-map-form">

                <input type="hidden" name="view" value="map">

                <div class="row">

                    <div class="col-sm-12 col-12">

                        <div class="form-group">

                            <input type="text" class="form-control" name="search" id="search" placeholder="Enter Address, Street and City or Enter State, Zip code">

                        </div>

                    </div>

                </div>

                <div class="row">

                    <div class="col-sm-4 col-12">

                        <label for="property-location">City</label>

                        <div class="form-group">

                            <select id="property-location" class="form-control border" name="city">

                                <option value="">Any</option>

                                @foreach($cities as $city)

                                <option value="{{$city->id}}">{{$city->name}}</option>

                                @endforeach

                            </select>

                        </div>

                    </div>

                    <div class="col-sm-4 col-12">

                        <label for="mode">Mode</label>

                        <div class="form-block">

                            <select id="mode" class="form-control" name="mode">

                                <option value="">Any</option>

                                <option value="2">For Sale</option>

                                <option value="1">For Rent</option>

                            </select>

                        </div>

                    </div>

                    <div class="col-sm-4 col-12">

                        <label for="property-type">Property Type</label>

                        <div class="form-block">

                            <select id="property-type" class="form-control" name="property_type">

                                <option value="">Any</option>

                                @foreach($propertyTypes as $type)

                                <option value="{{$type->id}}">{{$type->title}}</option>

                                @endforeach

                            </select>

                        </div>

                    </div>

                </div>

                <div class="row">

                    <div class="col-sm-4 col-12">

                        <label>Beds</label>

                        <div class="form-block">

                            <select name="bedroom" id="property-beds" class="form-control">

                                <option value="">Any</option>

                                @php $numbers = array('1','2','3','4','5','6','7','7+') @endphp

                                @foreach($numbers as $number)

                                <option value="{{$number}}" {{($number==request()->bedroom)?'selected':''}}>{{$number}}</option>

                                @endforeach

                            </select>

                        </div>

                    </div>

                    <div class="col-sm-4 col-12">

                        <label>Baths</label>

                        <div class="form-block">

                            <select name="bathroom" id="property-baths" class="form-control">

                                <option value="">Any</option>

                                @foreach($numbers as $number)

                                <option value="{{$number}}" {{($number==request()->bathroom)?'selected':''}}>{{$number}}</option>

                                @endforeach

                            </select>

                        </div>

                    </div>

                    <div class="col-sm-4 col-12">

                        <div class="form-block">

                            <label>Area</label>

                            <input type="number" name="unit_size[min]" class="area-filter border" value="100" placeholder="Min" />

                            <input type="number" name="unit_size[max]" class="area-filter border" value="999999" placeholder="Max" />

                            <div class="clear"></div>

                        </div>

                    </div>

                </div>

                <div class="row">

                    <div class="col-sm-12 col-12">

                        <div class="form-block">

                            <label>Price</label>

                            <input type="hidden" name="price[min]" id="min_price" value="1000">

                            <input type="hidden" name="price[max]" id="max_price" value="999999">

                            <div id="custom_price_slider" class="custom-price-slider"></div>

                        </div>

                    </div>

                    

                </div>

                

                <div class="row p-2">

                    @foreach ($features as $feature)

                       <div class="col-3 col-sm-3 col-md-3 col-lg-3 col-xl-3">

                        <div class="form-check">

                        <input class="form-check-input" name="feature[]" type="checkbox" value="{{$feature->id}}" id="property_feature_{{$feature->id}}">

                            <label class="form-check-label" for="property_feature_{{$feature->id}}">

                                {{$feature->title}}

                            </label>

                        </div>

                    </div> 

                    @endforeach

                </div>

                <div class="row">

                    <div class="col-sm-4 col-6">

                        <div class="form-block">

                            <button type="button" class="btn btn-danger btn-block" id="search_form_reset_btn">Reset</button>

                        </div>

                    </div>

                    <div class="col-sm-4 col-6">

                        <div class="form-block">

                            <button type="submit" class="btn btn-secondary btn-block">Find Properties</button>

                        </div>

                    </div>

                </div>

                

            </form>

        </div>

    </div>

</div>

@endsection

@section('script')

<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBPZ-Erd-14Vf2AoPW2Pzlxssf6-2R3PPs"></script>

<script src="{{asset('theme/default/js/map/markerwithlabel_packed.js')}}"></script>

<script src="{{asset('theme/default/js/map/infobox.js')}}"></script>

<script src="{{asset('theme/default/js/map/markerclusterer_packed.js')}}"></script>

<script src="{{asset('theme/default/js/validate.js')}}"></script>

<script src="{{asset('theme/default/js/map/custom-map.js')}}"></script>

<script>

    (function($) {

        var _latitude = 25.276987;

        var _longitude = 55.296249;

        createHomepageGoogleMap(_latitude, _longitude);              

        $("#property_search_form").on('submit',function(e){

            e.preventDefault();

            var _latitude  = 25.276987;

            var _longitude = 55.296249;

            createHomepageGoogleMap(_latitude, _longitude); 

        });

    })(jQuery);

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

        $("#search_form_reset_btn").on('click',function(e){

          $("#property_search_form")[0].reset();

        })

      });

</script>

@endsection