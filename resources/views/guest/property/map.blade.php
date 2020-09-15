@extends("guest.layout.main")
@section("content")
    <!-- Top Filter -->
    <div class="container-fluid bgGray pt-3">

        <div class="row">
            <div class="col-lg-12 col-sm-12 col-12">
                <div class="row">
                    <div class="col-lg-2 col-sm-2 col-4">
                        <div class="form-group">
                            <label>
                                <input class="form-control" name="budget" value="" placeholder="Budget">
                            </label>

                        </div>
                    </div>
                    <div class="col-lg-2 col-sm-2 col-4">
                        <div class="form-group">
                            <select class="custom-select">
                                <option value="">No. Of Bedrooms</option>
                                @php $beds = get_bedrooms();@endphp
                                @foreach($beds as $key=>$value)
                                    <option value="{{$key}}">{{$value}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="col-lg-2 col-sm-2 col-4">
                        <div class="form-group">
                            <select class="custom-select" name="property_type">
                                <option value="">Type</option>
                                @php $types = get_property_types(); @endphp
                                @foreach($types as $key=>$value)
                                    <option value="{{$key}}">{{$value}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="col-lg-2 col-sm-2 col-4">
                        <div class="form-group">
                            <select class="custom-select" name="mode">
                                <option value="">Property For</option>
                               @php $modes = get_property_purpose_modes(); @endphp
                                @foreach($modes as $key=>$value)
                                    <option value="{{$key}}">{{$value}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="col-lg-2 col-sm-2 col-4">
                        <div class="form-group">
                            <label>
                                <input class="custom-select" name="keyword" value="" placeholder="Address or City Or Emirate">
                            </label>
                        </div>
                    </div>
                    <div class="col-lg-2 col-sm-2 col-4">
                        <div class="form-group">
                                <select class="custom-select">
                                    <option value="">No. Of Bathrooms</option>
                                    @php $baths = get_bathrooms(); @endphp
                                    @foreach($baths as $key=>$value)
                                        <option value="{{$key}}">{{$value}}</option>
                                    @endforeach
                                </select>

                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row justify-content-center align-self-center">
            <div class="col-lg-6 col-sm-6 col-12 bg-light ">

                <div class="row mt-2">
                    @foreach($listings['data'] as $unit)
                    <div class="col-lg-6 col-sm-6 col-12 my-1">
                        <div class="card">
                            <img src="{{$unit['primary_image']}}" class="img-fluid propertyList-img" alt="{{$unit['title']}}">
                            <div class="card-body">
                                <h5 class="card-title">{{$unit['price']}}</h5>
                                <p class="font-14">
                                    <i class="fa fa-map-marker" aria-hidden="true"></i> {{$unit['full_address']}}
                                </p>
                            </div>
                        </div>
                    </div>
                    @endforeach


                </div>

                <div class="row my-4">
                    <div class="col-lg-12 col-sm-12 col-12 text-center">
                        <button class="btn btn-primary btn-Orange">Load more...</button>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 col-sm-6 col-12 px-0">
                <div id="map"></div>
            </div>
        </div>
    </div>
    <!-- End -->
@endsection
@section("js")

<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBPZ-Erd-14Vf2AoPW2Pzlxssf6-2R3PPs"></script>
<script src="{{asset('theme/map/markerwithlabel_packed.js')}}"></script>
<script src="{{asset('theme/map/infobox.js')}}"></script>
<script src="{{asset('theme/map/markerclusterer_packed.js')}}"></script>
<script src="{{asset('theme/map/custom-map.js')}}"></script>
@endsection
@section("script")
<script>
    (function($) {
        let _latitude = 25.276987;
        let _longitude = 55.296249;
        createHomepageGoogleMap(_latitude, _longitude);
        $("#property_search_form").on('submit',function(e){
            e.preventDefault();
            let _latitude  = 25.276987;
            let _longitude = 55.296249;
            createHomepageGoogleMap(_latitude, _longitude);
        });
    })(jQuery);
    $(document).ready(function(){
          let price_slider = document.getElementById('custom_price_slider');
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
         let output = input.replace(",","");
             output = output.replace("AED","");
          return $.trim(output);
        }
        $("#search_form_reset_btn").on('click',function(e){
          $("#property_search_form")[0].reset();
        })
      });
</script>
@endsection
