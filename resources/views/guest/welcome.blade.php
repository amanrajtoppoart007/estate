@extends("guest.layout.main")
@section("content")
     <!-- Hero Section -->
    <div class="jumbotron hero-section">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-sm-12 col-12">
                    <h1 class="text-center text-white">Dubai's No.1 Property Site</h1>
                    <h2 class="text-center text-white">is now a Super Brand</h2>
                </div>
            </div>
            <div class="row mt-5">
                <div class="col-lg-12 col-sm-12 col-12">
                    <!-- Advance Search -->
                    <ul class="nav nav-pills advanced-tabs justify-content-center" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" data-toggle="tab" href="#BUY" role="tab">BUY</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" data-toggle="tab" href="#SELL" role="tab">SELL</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" data-toggle="tab" href="#PLOT" role="tab">PLOT</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" data-toggle="tab" href="#COMMERCIAL" role="tab">COMMERCIAL</a>
                        </li>
                    </ul>
                    <!-- Tab panes -->
                    <div class="tab-content mt-4">
                        <div class="tab-pane active" id="BUY" role="tabpanel">
                            <form>
                                <div class="row">
                                    <div class="col-lg-6 col-sm-4 col-12">
                                        <div class="form-group">
                                            <input type="text" class="form-control" placeholder="Enter location, Project or Landmark">
                                        </div>
                                    </div>
                                    <div class="col-lg-2 col-sm-3 col-12">
                                        <div class="form-group">
                                            <select class="custom-select">
                                                <option selected>Flat</option>
                                                <option value="1">One</option>
                                                <option value="2">Two</option>
                                                <option value="3">Three</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-lg-2 col-sm-3 col-12">
                                        <div class="form-group">
                                            <select class="custom-select">
                                                <option selected>Budget</option>
                                                <option value="1">One</option>
                                                <option value="2">Two</option>
                                                <option value="3">Three</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-lg-2 col-sm-3 col-12">
                                        <div class="form-group">
                                            <select class="custom-select">
                                                <option selected>All Furnishings</option>
                                                <option value="1">One</option>
                                                <option value="2">Two</option>
                                                <option value="3">Three</option>
                                            </select>
                                        </div>
                                    </div>

                                </div>
                                <div class="row">
                                    <div class="col-lg-3 col-sm-3 col-12">
                                        <div class="form-group">
                                            <select class="custom-select">
                                                <option selected>Rent</option>
                                                <option value="1">One</option>
                                                <option value="2">Two</option>
                                                <option value="3">Three</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-sm-6 col-12">
                                        <div class="row">
                                            <div class="col-lg-3 col-sm-3 col-12">
                                                <div class="form-group">
                                                    <input type="text" class="form-control" placeholder="Min. Price">
                                                </div>
                                            </div>
                                            <div class="col-lg-3 col-sm-3 col-12">
                                                <div class="form-group">
                                                    <input type="text" class="form-control" placeholder="Max. Price">
                                                </div>
                                            </div>
                                            <div class="col-lg-3 col-sm-3 col-12">
                                                <div class="form-group">
                                                    <input type="text" class="form-control" placeholder="Min. Bed">
                                                </div>
                                            </div>
                                            <div class="col-lg-3 col-sm-3 col-12">
                                                <div class="form-group">
                                                    <input type="text" class="form-control" placeholder="Max. Bed">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-3 col-sm-2 col-12">
                                        <div class="form-group">
                                            <button type="submit" class="btn btn-primary btn-block btn-form-submit">Submit</button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <div class="tab-pane" id="SELL" role="tabpanel">
                            <form>
                                <div class="row">
                                    <div class="col-lg-3 col-sm-3 col-12">
                                        <div class="form-group">
                                            <select class="custom-select">
                                                <option selected>Flat</option>
                                                <option value="1">One</option>
                                                <option value="2">Two</option>
                                                <option value="3">Three</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-lg-3 col-sm-3 col-12">
                                        <div class="form-group">
                                            <select class="custom-select">
                                                <option selected>Budget</option>
                                                <option value="1">One</option>
                                                <option value="2">Two</option>
                                                <option value="3">Three</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-lg-4 col-sm-4 col-12">
                                        <div class="form-group">
                                            <input type="text" class="form-control" placeholder="Enter location, Project or Landmark">
                                        </div>
                                    </div>
                                    <div class="col-lg-2 col-sm-2 col-12">
                                        <div class="form-group">
                                            <button type="submit" class="btn btn-primary btn-block btn-form-submit">Submit</button>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-3 col-sm-3 col-12">
                                        <div class="form-group">
                                            <select class="custom-select">
                                                <option selected>All Furnishings</option>
                                                <option value="1">One</option>
                                                <option value="2">Two</option>
                                                <option value="3">Three</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-lg-3 col-sm-3 col-12">
                                        <div class="form-group">
                                            <select class="custom-select">
                                                <option selected>Rent</option>
                                                <option value="1">One</option>
                                                <option value="2">Two</option>
                                                <option value="3">Three</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-sm-6 col-12">
                                        <div class="row">
                                            <div class="col-lg-3 col-sm-3 col-12">
                                                <div class="form-group">
                                                    <input type="text" class="form-control" placeholder="Min. Price">
                                                </div>
                                            </div>
                                            <div class="col-lg-3 col-sm-3 col-12">
                                                <div class="form-group">
                                                    <input type="text" class="form-control" placeholder="Max. Price">
                                                </div>
                                            </div>
                                            <div class="col-lg-3 col-sm-3 col-12">
                                                <div class="form-group">
                                                    <input type="text" class="form-control" placeholder="Min. Bed">
                                                </div>
                                            </div>
                                            <div class="col-lg-3 col-sm-3 col-12">
                                                <div class="form-group">
                                                    <input type="text" class="form-control" placeholder="Max. Bed">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <div class="tab-pane" id="PLOT" role="tabpanel">
                            <form>
                                <div class="row">
                                    <div class="col-lg-3 col-sm-3 col-12">
                                        <div class="form-group">
                                            <select class="custom-select">
                                                <option selected>Flat</option>
                                                <option value="1">One</option>
                                                <option value="2">Two</option>
                                                <option value="3">Three</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-lg-3 col-sm-3 col-12">
                                        <div class="form-group">
                                            <select class="custom-select">
                                                <option selected>Budget</option>
                                                <option value="1">One</option>
                                                <option value="2">Two</option>
                                                <option value="3">Three</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-lg-4 col-sm-4 col-12">
                                        <div class="form-group">
                                            <input type="text" class="form-control" placeholder="Enter location, Project or Landmark">
                                        </div>
                                    </div>
                                    <div class="col-lg-2 col-sm-2 col-12">
                                        <div class="form-group">
                                            <button type="submit" class="btn btn-primary btn-block btn-form-submit">Submit</button>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-3 col-sm-3 col-12">
                                        <div class="form-group">
                                            <select class="custom-select">
                                                <option selected>All Furnishings</option>
                                                <option value="1">One</option>
                                                <option value="2">Two</option>
                                                <option value="3">Three</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-lg-3 col-sm-3 col-12">
                                        <div class="form-group">
                                            <select class="custom-select">
                                                <option selected>Rent</option>
                                                <option value="1">One</option>
                                                <option value="2">Two</option>
                                                <option value="3">Three</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-sm-6 col-12">
                                        <div class="row">
                                            <div class="col-lg-3 col-sm-3 col-12">
                                                <div class="form-group">
                                                    <input type="text" class="form-control" placeholder="Min. Price">
                                                </div>
                                            </div>
                                            <div class="col-lg-3 col-sm-3 col-12">
                                                <div class="form-group">
                                                    <input type="text" class="form-control" placeholder="Max. Price">
                                                </div>
                                            </div>
                                            <div class="col-lg-3 col-sm-3 col-12">
                                                <div class="form-group">
                                                    <input type="text" class="form-control" placeholder="Min. Bed">
                                                </div>
                                            </div>
                                            <div class="col-lg-3 col-sm-3 col-12">
                                                <div class="form-group">
                                                    <input type="text" class="form-control" placeholder="Max. Bed">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <div class="tab-pane" id="COMMERCIAL" role="tabpanel">
                            <form>
                                <div class="row">
                                    <div class="col-lg-3 col-sm-3 col-12">
                                        <div class="form-group">
                                            <select class="custom-select">
                                                <option selected>Flat</option>
                                                <option value="1">One</option>
                                                <option value="2">Two</option>
                                                <option value="3">Three</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-lg-3 col-sm-3 col-12">
                                        <div class="form-group">
                                            <select class="custom-select">
                                                <option selected>Budget</option>
                                                <option value="1">One</option>
                                                <option value="2">Two</option>
                                                <option value="3">Three</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-lg-4 col-sm-4 col-12">
                                        <div class="form-group">
                                            <input type="text" class="form-control" placeholder="Enter location, Project or Landmark">
                                        </div>
                                    </div>
                                    <div class="col-lg-2 col-sm-2 col-12">
                                        <div class="form-group">
                                            <button type="submit" class="btn btn-primary btn-block btn-form-submit">Submit</button>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-3 col-sm-3 col-12">
                                        <div class="form-group">
                                            <select class="custom-select">
                                                <option selected>All Furnishings</option>
                                                <option value="1">One</option>
                                                <option value="2">Two</option>
                                                <option value="3">Three</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-lg-3 col-sm-3 col-12">
                                        <div class="form-group">
                                            <select class="custom-select">
                                                <option selected>Rent</option>
                                                <option value="1">One</option>
                                                <option value="2">Two</option>
                                                <option value="3">Three</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-sm-6 col-12">
                                        <div class="row">
                                            <div class="col-lg-3 col-sm-3 col-12">
                                                <div class="form-group">
                                                    <input type="text" class="form-control" placeholder="Min. Price">
                                                </div>
                                            </div>
                                            <div class="col-lg-3 col-sm-3 col-12">
                                                <div class="form-group">
                                                    <input type="text" class="form-control" placeholder="Max. Price">
                                                </div>
                                            </div>
                                            <div class="col-lg-3 col-sm-3 col-12">
                                                <div class="form-group">
                                                    <input type="text" class="form-control" placeholder="Min. Bed">
                                                </div>
                                            </div>
                                            <div class="col-lg-3 col-sm-3 col-12">
                                                <div class="form-group">
                                                    <input type="text" class="form-control" placeholder="Max. Bed">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                    <!-- End -->
                </div>
            </div>
        </div>
    </div>
    <!-- End -->

    <!-- Special Gallery -->
    <div class="container-fluid section-light pt-4">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-sm-12 col-12">
                    <h2 class="text-center">Top Property Collections For You</h2>
                </div>
            </div>
            <div class="row mt-4">
                <div class="col-lg-6 col-sm-6 col-12">
                    <img class="img-fluid specialGallery-img" src="{{asset('theme/images/special_gallery/1.jpg')}}" alt="">
                    <a href="" class="para-overlay">Our New Projects</a>
                </div>
                <div class="col-lg-3 col-sm-3 col-12">
                    <img class="img-fluid specialGallery-img" src="{{asset('theme/images/special_gallery/2.jpg')}}" alt="">
                    <a href="" class="para-overlay1">Ready to Move Flats</a>
                </div>
                <div class="col-lg-3 col-sm-3 col-12">
                    <img class="img-fluid specialGallery-img" src="{{asset('theme/images/special_gallery/2.jpg')}}" alt="">
                    <a href="" class="para-overlay1">Budget Homes</a>
                </div>
            </div>
            <div class="row special-row">
                <div class="col-lg-3 col-sm-3 col-12">
                    <img class="img-fluid specialGallery-img" src="{{asset('theme/images/special_gallery/2.jpg')}}" alt="">
                    <a href="" class="para-overlay1">Rental Furniture</a>
                </div>
                <div class="col-lg-3 col-sm-3 col-12">
                    <img class="img-fluid specialGallery-img" src="{{asset('theme/images/special_gallery/2.jpg')}}" alt="">
                    <a href="" class="para-overlay1">Owner Properties</a>
                </div>
                <div class="col-lg-6 col-sm-6 col-12">
                    <img class="img-fluid specialGallery-img" src="{{asset('theme/images/special_gallery/1.jpg')}}" alt="">
                    <a href="" class="para-overlay">Exclusive Properties</a>
                </div>
            </div>
        </div>
    </div>
    <!-- End Special Gallery -->

    <!-- Help Section -->
    <div class="container-fluid py-4">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-sm-12 col-12">
                    <h2 class="text-center">See how Al Hoor can Help</h2>
                </div>
            </div>
            <div class="row mt-4">
                <div class="col-lg-4 col-sm-4 col-12 offset-lg-2 offset-sm-2">
                    <div class="box-shadow text-center pb-3">
                        <img src="{{asset('theme/images/Icon_1.svg')}}" alt="">
                        <p class="text-center px-5">
                            With over 1 million + homes for sale available on the website, Al Hoor can match you with a house you will want to call home.
                        </p>
                        <button class="btn btn-primary btn-Orange">Find a Home</button>
                    </div>
                </div>
                <div class="col-lg-4 col-sm-4 col-12">
                    <div class="box-shadow text-center pb-3">
                        <img src="{{asset('theme/images/Icon_2.svg')}}" alt="">
                        <p class="text-center px-5">
                            With over 1 million + homes for sale available on the website, Al Hoor can match you with a house you will want to call home.
                        </p>
                        <button class="btn btn-primary btn-Blue">Find a Rental</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Help Section -->

    <!-- Preffered Choice -->
    <div class="container-fluid section-light mt-5 py-4">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-sm-12 col-12">
                    <h2 class="text-center">What Makes Us The Preffered Choice</h2>
                </div>
            </div>
            <div class="row mt-5">
                <div class="col-lg-3 col-sm-3 col-12 text-center">
                    <img class="img-fluid" src="{{asset('theme/images/preferred_icons/preffered_icon1.svg')}}" alt="">
                    <h4 class="mt-5">Maximum Choices</h4>
                    <p class="mt-4">
                        15 lac + 8 counting. New properties every hour to help buyers to find the right home.
                    </p>
                </div>
                <div class="col-lg-3 col-sm-3 col-12 text-center">
                    <img class="img-fluid" src="{{asset('theme/images/preferred_icons/preffered_icon2.svg')}}" alt="">
                    <h4 class="mt-5">Buyers Trust Us</h4>
                    <p class="mt-4">
                        12 million users visit us every month for their buying and renting needs.
                    </p>
                </div>
                <div class="col-lg-3 col-sm-3 col-12 text-center">
                    <img class="img-fluid" src="{{asset('theme/images/preferred_icons/preffered_icon3.svg')}}" alt="">
                    <h4 class="mt-5">Seller Prefer Us</h4>
                    <p class="mt-4">
                        27,000 new properties posted daily, making us the biggest platform to sell & rent properties.
                    </p>
                </div>
                <div class="col-lg-3 col-sm-3 col-12 text-center">
                    <img class="img-fluid" src="{{asset('theme/images/preferred_icons/preffered_icon4.svg')}}" alt="">
                    <h4 class="mt-5">Expert Guidance</h4>
                    <p class="mt-4">
                        Advice from the largest panel of industry experts to help you make smart property decisions.
                    </p>
                </div>
            </div>
        </div>
    </div>
    <!-- End Preffered Choice -->
@endsection
