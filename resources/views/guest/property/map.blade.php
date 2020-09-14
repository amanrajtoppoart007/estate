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
                    <div class="col-lg-6 col-sm-6 col-12">
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
                <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m12!1m3!1d120638.07295390202!2d72.9153536!3d19.1102976!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!5e0!3m2!1sen!2sin!4v1599148473217!5m2!1sen!2sin" width="100%" height="100%" frameborder="0" style="border:0;"
                    allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
            </div>
        </div>
    </div>
    <!-- End -->
@endsection
