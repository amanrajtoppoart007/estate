@extends('guest.layout.main')

@include('guest.include.header')

@section('head')

@endsection

@section('content')



<!-- Header Sub-Header Section -->

<section class="subheader subheader-listing-sidebar">

    <div class="container">

        <h1>All Properties</h1>

        <div class="breadcrumb right">Home <i class="fa fa-angle-right"></i> <a href="javascript:void(0)" class="current">Properties</a></div>

        <div class="clear"></div>

    </div>

</section>

<!-- End Sub-Header Section -->



<!-- Property View Page -->

<div class="container-fluid pt-5 pb-5">

    <div class="container">

        <div class="row">

            <div class="col-sm-8 col-12">

                <div class="property-listing-header">

                    <span class="property-count left">Showing  {{$propUnitTypes['count']}} out of {{$propUnitTypes['total']}} results</span>

                    <div class="property-layout-toggle right">

                        <a href="{{route('property.search',['view'=>'map'])}}" class="property-layout-toggle-item"><i class="fa fa-map"></i></a>

                        <a href="{{route('property.search',['view'=>'grid'])}}" class="property-layout-toggle-item active"><i class="fa fa-th-large"></i></a>

                        <a href="{{route('property.search',['view'=>'list'])}}" class="property-layout-toggle-item"><i class="fa fa-bars"></i></a>

                    </div>

                    <div class="clear"></div>

                </div><!-- end property listing header -->



                <div class="row">

                    @foreach($propUnitTypes['property_unit_types'] as $prop_unit_type)

                    <div class="col-lg-6 col-md-6">

                        <div class="property shadow-hover">

                            <a href="{{$prop_unit_type['view_url']}}" class="property-img">

                                <div class="img-fade"></div>

                                <div class="property-tag button status">For {{$prop_unit_type['mode']}}</div>

                                <div class="property-price">{!!$prop_unit_type['price']!!}</div>

                                <div class="property-color-bar"></div>

                                <img src="{{$prop_unit_type['image']}}" alt="{{$prop_unit_type['title']}}" />

                            </a>

                            <div class="property-content">

                                <div class="property-title">

                                    <h4><a href="{{$prop_unit_type['view_url']}}">{{$prop_unit_type['title']}}</a></h4>

                                    <p class="property-address"><i class="fa fa-map-marker icon"></i>{{$prop_unit_type['city_name']}}</p>

                                </div>

                                <table class="property-details">

                                    <tr>

                                        <td><i class="fa fa-bed"></i> {{$prop_unit_type['bedroom']}} Beds</td>

                                        <td><i class="fa fa-tint"></i> {{$prop_unit_type['bathroom']}} Baths</td>

                                        <td><i class="fa fa-expand"></i> {{$prop_unit_type['unit_size']}} Sq Ft</td>

                                    </tr>

                                </table>

                            </div>

                            <div class="property-footer">

                                <span class="left"><i class="fa fa-calendar-o icon"></i> {{$prop_unit_type['created_at']}}</span>

                                <div class="clear"></div>

                            </div>

                        </div>

                    </div>

                 @endforeach

                </div>

                {{$propUnitTypes['links']}}

            </div>

            <div class="col-sm-4 col-12">

                <div class="widget widget-sidebar sidebar-properties advanced-search">

                    <h4 class="text-center">ADVANCED SEARCH</h4>

                    <div class="widget-content box">

                        <form>

                            <input type="hidden" name="view" value="grid">

                            <label for="property-location">Location</label>

                            <div class="form-group">

                                <select id="property-location" class="form-control" name="city">

                                    <option value="">Any</option>

                                    @foreach($cities as $city)

                                      <option value="{{$city->id}}" {{($city->id==request()->city)?'selected':''}}>{{$city->name}}</option>

                                    @endforeach

                                </select>

                            </div>

                            <label for="property-status">Mode</label>

                            <div class="form-block">

                                <select id="property-status" class="form-control" name="mode">

                                    <option value="">Any</option>

                                    @php $modes = array('1'=>'Rent','2'=>'Sale'); @endphp

                                    @foreach($modes as $mkey=>$mval)

                                      <option value="{{$mkey}}" {{($mkey==request()->mode)?'selected':''}}>{{$mval}}</option>

                                    @endforeach

                                </select>

                            </div>

                            <label for="property-type">Property Type</label>

                            <div class="form-block">

                                <select id="property-type" class="form-control" name="property_type">

                                    <option value="">Any</option>

                                    @foreach($propertyTypes as $type)

                                    <option value="{{$type->id}}" {{($mkey==request()->property_type)?'selected':''}}>{{$type->title}}</option>

                                    @endforeach

                                </select>

                            </div>

                            <div class="form-block">

                                <label>Price</label>

                                <input type="hidden" name="price[min]" id="min_price" value="{{trim_price((request()->price)?request()->price['min']:1000)}}">

                                <input type="hidden" name="price[max]" id="max_price" value="{{trim_price((request()->price)?request()->price['max']:999999)}}">

                                <div id="custom_price_slider" class="custom-price-slider"></div>

                            </div>

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

                            <label>Baths</label>

                            <div class="form-block">

                                <select name="bathroom" id="property-baths" class="form-control">

                                    <option value="">Any</option>

                                    @foreach($numbers as $number)

                                     <option value="{{$number}}" {{($number==request()->bathroom)?'selected':''}}>{{$number}}</option>

                                    @endforeach

                                </select>

                            </div>

                            <div class="form-block">

                                <label>Area</label>

                                <input type="number" name="unit_size[min]" class="area-filter border" value="{{(request()->unit_size)?request()->unit_size['min']:2000}}" placeholder="Min" />

                                <input type="number" name="unit_size[max]" class="area-filter border" value="{{(request()->unit_size)?request()->unit_size['max']:10000}}" placeholder="Max" />

                                <div class="clear"></div>

                            </div>

                            <button type="submit" class="btn btn-primary btn-block btn-defaultmine">Find Properties</button>

                        </form>

                    </div>

                </div>

                <div class="widget widget-sidebar recent-properties">

                   @include('guest.common.quickLink')

                </div>

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