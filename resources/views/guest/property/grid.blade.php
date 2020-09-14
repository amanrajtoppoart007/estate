@extends("guest.layout.main")
@section("link")
    <link rel="stylesheet" href="{{asset('plugin/bootstrap-select/css/bootstrap-select.min.css')}}">
    <link rel="stylesheet" href="{{asset('plugin/country-select/css/bootstrap-select-country.min.css')}}">
@endsection
@section("content")
    <!-- Hero Section -->
    <div class="jumbotron inner-page-jumbotron">
        <div class="container">
            @include("guest.filter.filter")
        </div>
    </div>
    <!-- End -->

    <!-- Top Filters -->
    <div class="container mt-4">
        <div class="row">
            <div class="col-lg-7 col-sm-7 col-12">
                <h5 class="mb-0">Properties for sale in UAE</h5>
                <small>36178 results</small>
            </div>
            <div class="col-lg-3 col-sm-3 col-6 mob-mt20">
                <div class="input-group mb-3">
                    <div class="input-group-prepend mob-hide">
                        <label class="input-group-text" for="shortBy">Short By:</label>
                    </div>
                    <select class="custom-select" id="shortBy">
                        <option selected value="Featured">Featured</option>
                        <option value="Newest">Newest</option>
                        <option value="Price (Low)">Price (Low)</option>
                        <option value="Price (High)">Price (High)</option>
                        <option value="Beds (Least)">Beds (Least)</option>
                        <option value="Beds (Most)">Beds (Most)</option>
                    </select>
                </div>
            </div>
            <div class="col-lg-2 col-sm-2 col-6 mob-mt20">
                <a href="mapView.html" type="button" class="btn btn-outline-secondary btn-block btn-h50">
                    <i class="fa fa-map-marker" aria-hidden="true"></i> Map View
                    <span class="badge badge-danger">New</span>
                </a>
            </div>
        </div>
        <hr />
    </div>
    <!-- End Top Filters -->

    <!-- Property listings -->
    <div class="container my-5">
        <div class="row">
            <div class="col-lg-9 col-sm-9 col-12">
                <div class="row">
                    @foreach($listings['data'] as $unit)
                    <div class="col-lg-6 col-sm-6 col-12 my-1">
                        <div class="card">
                            <img src="{{$unit['primary_image']}}" class="img-fluid propertyList-img" alt="{{$unit['title']}}">
                            <div class="card-body">
                                <h5 class="card-title">{{$unit['price']}}</h5>
                                <p class="font-14">
                                    <i class="fa fa-map-marker" aria-hidden="true"></i> {{$unit['full_address']}}
                                </p>
                                <p class="card-text">

                                </p>
                                <h5 class="colorOrange">Apartment :</h5>
                                <ul class="propertyListing-ul">
                                    <li>
                                        2
                                        <img class="img-fluid img-24" src="{{asset('theme/images/bed.svg')}}" alt="Number Of Beds">

                                    </li>
                                    <li>
                                        3
                                        <img class="img-fluid img-24" src="{{asset('theme/images/bathroom.svg')}}" alt="Number Of Baths">
                                    </li>
                                    <li>
                                        {{$unit['unit_size']}} SqFt
                                    </li>
                                </ul>
                                <button type="button" class="btn btn-outline-secondary mb-2 enquiry_call_btn">
                                    <i class="fa fa-phone" aria-hidden="true"></i>
                                    Call
                                </button>
                                <button type="button" class="btn btn-outline-secondary mb-2 enquiry_email_btn">
                                    <i class="fa fa-envelope" aria-hidden="true"></i>
                                    Email
                                </button>
                                <button type="button" class="btn btn-outline-secondary mb-2 add_to_favorite_list_btn">
                                    <i class="fa fa-heart" aria-hidden="true"></i>
                                    Save
                                </button>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>

                <div class="row mt-4">
                    <div class="col-lg-12 col-sm-12 col-12 text-center">
                         <!-----------pagination section ---------->
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-sm-3 col-12">
                <div class="card">
                    <h5 class="px-3 py-2">Popular searches</h5>
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item">
                            <a href="">Properties for sale</a>
                        </li>
                        <li class="list-group-item">
                            <a href="">Apartments for sale</a>
                        </li>
                        <li class="list-group-item">
                            <a href="">Villas for sale</a>
                        </li>
                        <li class="list-group-item">
                            <a href="">Townhouses for sale</a>
                        </li>
                        <li class="list-group-item">
                            <a href="">Penthouses for sale</a>
                        </li>
                        <li class="list-group-item">
                            <a href="">Compounds for sale</a>
                        </li>
                        <li class="list-group-item">
                            <a href="">Duplexes for sale</a>
                        </li>
                        <li class="list-group-item">
                            <a href="">Land for sale</a>
                        </li>
                        <li class="list-group-item">
                            <a href="">Bungalows for sale</a>
                        </li>
                        <li class="list-group-item">
                            <a href="">Hotel apartments for sale</a>
                        </li>
                        <li class="list-group-item">
                            <a href="">1 bedroom properties for sale</a>
                        </li>
                        <li class="list-group-item">
                            <a href="">2 bedroom properties for sale</a>
                        </li>
                        <li class="list-group-item">
                            <a href="">3 bedroom properties for sale</a>
                        </li>
                        <li class="list-group-item">
                            <a href="">4 bedroom properties for sale</a>
                        </li>
                        <li class="list-group-item">
                            <a href="">5 bedroom properties for sale</a>
                        </li>
                    </ul>
                </div>
                <div class="card mt-4">
                    <h5 class="px-3 py-2">Nearby Areas</h5>
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item">
                            <a href="">Properties for sale in Dubai</a>
                        </li>
                        <li class="list-group-item">
                            <a href="">Properties for sale in Abu Dhabi</a>
                        </li>
                        <li class="list-group-item">
                            <a href="">Properties for sale in Sharjah</a>
                        </li>
                        <li class="list-group-item">
                            <a href="">Properties for sale in Ras Al Khaimah</a>
                        </li>
                        <li class="list-group-item">
                            <a href="">Properties for sale in Ajman</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <!-- End Property listings -->
@endsection
@include("guest.property.modal")
@section("js")
    <script src="{{asset('plugin/bootstrap-select/js/bootstrap-select.min.js')}}"></script>
    <script src="{{asset('plugin/country-select/js/bootstrap-select-country.min.js')}}"></script>
@endsection
@include("guest.property.script")
