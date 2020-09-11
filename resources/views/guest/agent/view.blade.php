@extends("guest.layout.main")
@section("content")
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item"><a href="#">Library</a></li>
            <li class="breadcrumb-item active" aria-current="page">Data</li>
        </ol>
    </nav>

    <!-- Main Section -->
    <div class="container my-5">
        <div class="row">
            <div class="col-lg-8 col-sm-8 col-12 bg-light py-3">
                <div class="row">
                    <div class="col-lg-5 col-sm-5 col-12">
                         @php
                         if(!empty($agent->photo))
                         {
                             $img = route('get.doc',base64_encode($agent->photo));
                         }
                         else
                         {
                             $img = asset('theme/images/4.png');
                         }
                      @endphp
                        <img class="img-fluid" src="{{$img}}" alt="">
                    </div>
                    <div class="col-lg-7 col-sm-7 col-12">
                        <h2 class="mb-0">{{$agent->name}}</h2>

                        <ul class="agentCard-ul pl-0">
                            <li>
                                Nationality : <strong>{{$agent->country->name}}</strong>
                            </li>

                        </ul>
                    </div>
                </div>
                <hr>
                <div class="row">
                    <div class="col-lg-12 col-sm-12 col-12">
                        <h4 class="mb-4">PERSONAL INFORMATION</h4>
                        <div class="row">
                            <div class="col-lg-6 col-sm-6 col-12">
                                <ul class="agentView-ul pl-0">
                                    <li>
                                        ACTIVE LISTINGS :
                                        <a href=""> {{$agent->property_units->count()}} Property</a>
                                    </li>
                                    <li>
                                        BRN# :
                                        <strong></strong>
                                    </li>
                                    <li>
                                        ACTIVE SINCE :
                                        <strong>{{$agent->created_at->diffForHumans()}}</strong>
                                    </li>

                                </ul>
                            </div>
                            <div class="col-lg-6 col-sm-6 col-12">
                                <ul class="agentView-ul pl-0">
                                    <li>
                                        Nationality : <strong>{{$agent->country->name}}</strong>
                                    </li>
                                    <li>
                                        Language : <strong></strong>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <hr>
                <div class="row">
                    <div class="col-lg-12 col-sm-12 col-12">
                        <ul class="nav nav-tabs nav-justified agentUlTabs" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active" data-toggle="tab" href="#about" role="tab">About Me</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" data-toggle="tab" href="#properties" role="tab">My Properties</a>
                            </li>
                        </ul>
                        <!-- Tab panes -->
                        <div class="tab-content mt-4">
                            <div class="tab-pane active" id="about" role="tabpanel">
                                <p>

                                </p>
                            </div>
                            <div class="tab-pane" id="properties" role="tabpanel">

                                @if(!empty($properties['data']))
                                    @foreach($properties['data'] as $property)
                                    <div class="row mt-5">
                                        <div class="col-lg-12 col-sm-12 col-12">
                                            <div class="borderColumn">
                                                <div class="row">
                                                    <div class="col-lg-4 col-sm-4 col-12">
                                                        <img class="img-fluid propertyList-img" src="{{$property['primary_image']}}" alt="">
                                                    </div>
                                                    <div class="col-lg-6 col-sm-6 col-12 pt-2">
                                                        <h4>{{$property['price']}}</h4>
                                                        <p class="font-14">
                                                            <i class="fa fa-map-marker" aria-hidden="true"></i> {{$property['full_address']}}
                                                        </p>
                                                        <ul class="propertyListing-ul">
                                                            <li class="special-li">
                                                                Apartment :
                                                            </li>
                                                            <li>
                                                                {{$property['bedroom']}}
                                                                <img class="img-fluid img-24" src="{{asset('theme/images/bed.svg')}}" alt="">

                                                            </li>
                                                            <li>
                                                                {{$property['bathroom']}}
                                                                <img class="img-fluid img-24" src="{{asset('theme/images/bathroom.svg')}}" alt="">
                                                            </li>
                                                            <li>
                                                                {{$property['unit_size']}} SqFt
                                                            </li>
                                                        </ul>
                                                        <button type="button" class="btn btn-outline-secondary mb-2">
                                                            <i class="fa fa-phone" aria-hidden="true"></i>
                                                            Call
                                                        </button>
                                                        <button type="button" class="btn btn-outline-secondary mb-2">
                                                            <i class="fa fa-envelope" aria-hidden="true"></i>
                                                            Email
                                                        </button>
                                                        <button type="button" class="btn btn-outline-secondary mb-2">
                                                            <i class="fa fa-heart" aria-hidden="true"></i>
                                                            Save
                                                        </button>
                                                    </div>
                                                    <div class="col-lg-2 col-sm-2 col-12 pr-4">
                            `                                <a href="#" class="font-14 gold-font pt-3 mr-3">PREMIUM</a>
                                                        <img class="img-fluid mt-2" src="{{asset('theme/images/524-logo.webp')}}" alt="">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    @endforeach
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-sm-4 col-12">
                <div class="card">
                    <div class="card-body">
                        <h4 class="text-center">CONTACT THIS AGENT</h4>
                        <div class="row mt-4">
                            <div class="col-lg-12 col-sm-12 col-12">
                                <button type="button" class="btn btn-outline-danger btn-block">
                                   Call Agent
                                </button>
                            </div>
                            <div class="col-lg-12 col-sm-12 col-12 mt-2">
                                <button type="button" class="btn btn-outline-danger btn-block">
                                    Email Agent
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card mt-2">
                    <div class="card-body">
                        <h4 class="text-center">COMPANY</h4>
                        <hr />
                        <div class="row">
                            <div class="col-lg-5 col-sm-5 col-5">
                                <img class="img-fluid" src="{{asset('theme/images/3229-logo.webp')}}" alt="">
                            </div>
                            <div class="col-lg-7 col-sm-7 col-7">
                                <strong class="colorOrange">Caldwell Banker</strong>
                                <div class="clearfix"></div>
                                <a href="">View Profile</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Main Section -->
@endsection
