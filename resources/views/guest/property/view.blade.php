@extends("guest.layout.main")
@section("content")
     <!-- Property Slider -->
    <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
        <ol class="carousel-indicators">
            <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
        </ol>
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img src="assets/uploads/hero_section.jpg" class="d-block w-100 img-fluid" alt="...">
            </div>
            <div class="carousel-item">
                <img src="assets/uploads/hero_section.jpg" class="d-block w-100 img-fluid" alt="...">
            </div>
            <div class="carousel-item">
                <img src="assets/uploads/hero_section.jpg" class="d-block w-100 img-fluid" alt="...">
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
    <!-- End Property Slider -->

    <!-- Main Section -->
    <div class="container my-5">
        <div class="row">
            <div class="col-lg-8 col-sm-8 col-12">
                <div class="row">
                    <div class="col-lg-12 col-sm-12 col-12">
                        <p class="mb-0">
                            VILLA FOR SALE IN MEADOWS 1, MEADOWS
                        </p>
                        <h3>
                            Upgraded Family Home | Landscaped Garden
                        </h3>
                        <div class="row mt-4">
                            <div class="col-lg-6 col-sm-6 col-12">
                                <div class="row">
                                    <div class="col-lg-5 col-sm-5 col-12">
                                        <img src="assets/uploads/propertyType.svg" alt=""> Property Type:
                                    </div>
                                    <div class="col-lg-7 col-sm-7 col-12">
                                        <span class="pl-5 font-16">Villa</span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6 col-sm-6 col-12">
                                <div class="row">
                                    <div class="col-lg-5 col-sm-5 col-12">
                                        <img src="assets/uploads/bedRooms.svg" alt=""> Bedrooms:
                                    </div>
                                    <div class="col-lg-7 col-sm-7 col-12">
                                        <span class="pl-5 font-16">4 + Maid</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row mt-2">
                            <div class="col-lg-6 col-sm-6 col-12">
                                <div class="row">
                                    <div class="col-lg-5 col-sm-5 col-12">
                                        <img src="assets/uploads/propertySize.svg" alt=""> Property size:
                                    </div>
                                    <div class="col-lg-7 col-sm-7 col-12">
                                        <span class="pl-5 font-16">4,018 sqft / 373 sqm</span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6 col-sm-6 col-12">
                                <div class="row">
                                    <div class="col-lg-5 col-sm-5 col-12">
                                        <img src="assets/uploads/bathroom.svg" alt=""> Bathrooms:
                                    </div>
                                    <div class="col-lg-7 col-sm-7 col-12">
                                        <span class="pl-5 font-16">3</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row mt-2">
                            <div class="col-lg-6 col-sm-6 col-12">
                                <div class="row">
                                    <div class="col-lg-5 col-sm-5 col-12">
                                        <img src="assets/uploads/completion.svg" alt=""> Completion:
                                    </div>
                                    <div class="col-lg-7 col-sm-7 col-12">
                                        <span class="pl-5 font-16">Ready</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row mt-5 bg-light p-2">
                    <div class="col-lg-6 col-sm-6 col-12">
                        <div class="row">
                            <div class="col-lg-12 col-sm-12 col-12">
                                <h4>Location</h4>
                            </div>
                        </div>
                        <div class="row mt-4">
                            <div class="col-lg-4 col-sm-4 col-12">
                                <a href="">
                                    <img class="img-fluid rounded-circle" src="assets/uploads/Map.svg" alt="">
                                </a>
                            </div>
                            <div class="col-lg-8 col-sm-8 col-12">
                                <h6 class="my-3">Meadows 1</h6>
                                <button type="button" class="btn btn-success btn-sm">4.9/5</button>
                                <a href="#">2 Reviews</a>
                                <p class="mt-3">
                                    Dubai, Meadows
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 col-sm-6 col-12">
                        <div class="row">
                            <div class="col-lg-12 col-sm-12 col-12">
                                <h4>Location</h4>
                            </div>
                        </div>
                        <div class="row mt-4">
                            <div class="col-lg-4 col-sm-4 col-12">
                                <a href="">
                                    <img class="img-fluid img-thumbnail" src="assets/uploads/agent.jpg" alt="">
                                </a>
                            </div>
                            <div class="col-lg-8 col-sm-8 col-12">
                                <a href="" class="mb-3">Danny Abraham</a>
                                <div class="clearfix"></div>
                                <p class="mb-0">Senior Client Manager at Espace Real Estate</p>
                                <p class="colorOrange">
                                    Speaks English
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row mt-4">
                    <div class="col-lg-12 col-sm-12 col-12">
                        <h3>
                            Amenities
                        </h3>
                        <div class="row mt-4">
                            <div class="col-lg-4 col-sm-4 col-12">
                                Unfurnished
                            </div>
                            <div class="col-lg-4 col-sm-4 col-12">
                                Covered Parking
                            </div>
                            <div class="col-lg-4 col-sm-4 col-12">
                                Maids Room
                            </div>
                        </div>
                    </div>
                </div>
                <hr>
                <div class="row mt-4">
                    <div class="col-lg-12 col-sm-12 col-12">
                        <h3>
                            Description
                        </h3>
                        <div class="row mt-4">
                            <div class="col-lg-12 col-sm-12 col-12">
                                <p align="justify">
                                    New to the market with Espace Real Estate is this immaculate four-bedroom villa located in a prime location of Meadows 1. Situated on a back to back plot with views of the marina skyline, this property is a great addition to the market. The villa consists
                                    of four spacious bedrooms on the first floor. Two master bedrooms and two bedrooms which share a Jack and Jill bathroom. The ground floor consists of a spacious living, dining area, upgraded kitchen and family living
                                    room all of which have upgraded flooring. The layout of this property is one of the most popular throughout the community which has a BUA of 4,099 sqft. All of this sits on a fully landscaped plot of 5,813
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-sm-4 col-12 ">
                <div class="row">
                    <div class="col-lg-12 col-sm-12 col-12">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title">3,599,950 AED</h5>
                                <p class="card-text">
                                    Estimated
                                    <a href="">13,212 AED/month</a>
                                </p>
                                <div class="row">
                                    <div class="col-lg-6 col-sm-6 col-12">
                                        <button type="button" class="btn btn-success btn-lg btn-block">
                                            <i class="fa fa-phone" aria-hidden="true"></i> Call Now
                                        </button>
                                    </div>
                                    <div class="col-lg-6 col-sm-6 col-12">
                                        <button type="button" class="btn btn-danger btn-lg btn-block">
                                            <i class="fa fa-envelope" aria-hidden="true"></i> Email
                                        </button>
                                    </div>
                                </div>
                                <hr>
                                <p class="mt-4">
                                    AL Hoor has verified the accuracy and authenticity of this listing.
                                </p>
                                <hr>
                                <center>
                                    <button type="button" class="btn btn-outline-secondary">
                                        <i class="fa fa-heart-o" aria-hidden="true"></i> Save to Shortlist
                                    </button>
                                </center>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row mt-4">
                    <div class="col-lg-12 col-sm-12 col-12">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="text-center">Own this property from just</h4>
                                <p class="card-title text-center">
                                    <strong class="font-24">13,212</strong> AED/month
                                </p>
                                <p class="card-text text-center">
                                    Fixed rates from
                                    <strong>2.70%</strong>
                                </p>
                                <div class="row">
                                    <div class="col-lg-12 col-sm-12col-12">
                                        <button type="button" class="btn btn-outline-danger btn-block">
                                            Get pre-approved
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <hr>
    </div>
    <!-- End Main Section -->
@endsection
