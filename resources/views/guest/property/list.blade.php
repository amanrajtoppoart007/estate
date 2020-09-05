@extends("guest.layout.main")
@section("content")
    <!-- Hero Section -->
    <div class="jumbotron inner-page-jumbotron">
        <div class="container">
            <div class="row">
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
                                            <button type="submit" class="btn btn-primary btn-block btn-Formsubmit">Submit</button>
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
                                            <button type="submit" class="btn btn-primary btn-block btn-Formsubmit">Submit</button>
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
                                            <button type="submit" class="btn btn-primary btn-block btn-Formsubmit">Submit</button>
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
                                            <button type="submit" class="btn btn-primary btn-block btn-Formsubmit">Submit</button>
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
                    <div class="col-lg-12 col-sm-12 col-12">
                        <div class="borderColumn">
                            <div class="row">
                                <div class="col-lg-4 col-sm-4 col-12">
                                    <img class="img-fluid propertyList-img" src="assets/uploads/property_image.webp" alt="">
                                </div>
                                <div class="col-lg-6 col-sm-6 col-12 pt-2">
                                    <h4>1,200,000 <strong class="colorOrange">AED</strong></h4>
                                    <p class="font-14">
                                        <i class="fa fa-map-marker" aria-hidden="true"></i> Executive Tower F, Executive Towers, Business Bay, Dubai
                                    </p>
                                    <ul class="propertyListing-ul">
                                        <li class="special-li">
                                            Apartment :
                                        </li>
                                        <li>
                                            2
                                            <img class="img-fluid img-24" src="assets/uploads/bed.svg" alt="">

                                        </li>
                                        <li>
                                            3
                                            <img class="img-fluid img-24" src="assets/uploads/bathroom.svg" alt="">
                                        </li>
                                        <li>
                                            1,605 sqft
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
                                    <a href="#" class="font-14 gold-font pt-3 mr-3">PREMIUM</a>
                                    <img class="img-fluid mt-2" src="assets/uploads/524-logo.webp" alt="">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row mt-2 justify-content-center align-self-center">
                    <div class="col-lg-12 col-sm-12 col-12">
                        <div class="borderColumn">
                            <div class="row">
                                <div class="col-lg-4 col-sm-4 col-12">
                                    <img class="img-fluid propertyList-img" src="assets/uploads/property_image.webp" alt="">
                                </div>
                                <div class="col-lg-6 col-sm-6 col-12 pt-2">
                                    <h4>1,200,000 <strong class="colorOrange">AED</strong></h4>
                                    <p class="font-14">
                                        <i class="fa fa-map-marker" aria-hidden="true"></i> Executive Tower F, Executive Towers, Business Bay, Dubai
                                    </p>
                                    <ul class="propertyListing-ul">
                                        <li class="special-li">
                                            Apartment :
                                        </li>
                                        <li>
                                            2
                                            <img class="img-fluid img-24" src="assets/uploads/bed.svg" alt="">

                                        </li>
                                        <li>
                                            3
                                            <img class="img-fluid img-24" src="assets/uploads/bathroom.svg" alt="">
                                        </li>
                                        <li>
                                            1,605 sqft
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
                                    <a href="#" class="font-14 gold-font pt-3 mr-3">PREMIUM</a>
                                    <img class="img-fluid mt-2" src="assets/uploads/524-logo.webp" alt="">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row mt-2 justify-content-center align-self-center">
                    <div class="col-lg-12 col-sm-12 col-12">
                        <div class="borderColumn">
                            <div class="row">
                                <div class="col-lg-4 col-sm-4 col-12">
                                    <img class="img-fluid propertyList-img" src="assets/uploads/property_image.webp" alt="">
                                </div>
                                <div class="col-lg-6 col-sm-6 col-12 pt-2">
                                    <h4>1,200,000 <strong class="colorOrange">AED</strong></h4>
                                    <p class="font-14">
                                        <i class="fa fa-map-marker" aria-hidden="true"></i> Executive Tower F, Executive Towers, Business Bay, Dubai
                                    </p>
                                    <ul class="propertyListing-ul">
                                        <li class="special-li">
                                            Apartment :
                                        </li>
                                        <li>
                                            2
                                            <img class="img-fluid img-24" src="assets/uploads/bed.svg" alt="">

                                        </li>
                                        <li>
                                            3
                                            <img class="img-fluid img-24" src="assets/uploads/bathroom.svg" alt="">
                                        </li>
                                        <li>
                                            1,605 sqft
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
                                    <a href="#" class="font-14 gold-font pt-3 mr-3">PREMIUM</a>
                                    <img class="img-fluid mt-2" src="assets/uploads/524-logo.webp" alt="">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row mt-2 justify-content-center align-self-center">
                    <div class="col-lg-12 col-sm-12 col-12">
                        <div class="borderColumn">
                            <div class="row">
                                <div class="col-lg-4 col-sm-4 col-12">
                                    <img class="img-fluid propertyList-img" src="assets/uploads/property_image.webp" alt="">
                                </div>
                                <div class="col-lg-6 col-sm-6 col-12 pt-2">
                                    <h4>1,200,000 <strong class="colorOrange">AED</strong></h4>
                                    <p class="font-14">
                                        <i class="fa fa-map-marker" aria-hidden="true"></i> Executive Tower F, Executive Towers, Business Bay, Dubai
                                    </p>
                                    <ul class="propertyListing-ul">
                                        <li class="special-li">
                                            Apartment :
                                        </li>
                                        <li>
                                            2
                                            <img class="img-fluid img-24" src="assets/uploads/bed.svg" alt="">

                                        </li>
                                        <li>
                                            3
                                            <img class="img-fluid img-24" src="assets/uploads/bathroom.svg" alt="">
                                        </li>
                                        <li>
                                            1,605 sqft
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
                                    <a href="#" class="font-14 gold-font pt-3 mr-3">PREMIUM</a>
                                    <img class="img-fluid mt-2" src="assets/uploads/524-logo.webp" alt="">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row mt-2 justify-content-center align-self-center">
                    <div class="col-lg-12 col-sm-12 col-12">
                        <div class="borderColumn">
                            <div class="row">
                                <div class="col-lg-4 col-sm-4 col-12">
                                    <img class="img-fluid propertyList-img" src="assets/uploads/property_image.webp" alt="">
                                </div>
                                <div class="col-lg-6 col-sm-6 col-12 pt-2">
                                    <h4>1,200,000 <strong class="colorOrange">AED</strong></h4>
                                    <p class="font-14">
                                        <i class="fa fa-map-marker" aria-hidden="true"></i> Executive Tower F, Executive Towers, Business Bay, Dubai
                                    </p>
                                    <ul class="propertyListing-ul">
                                        <li class="special-li">
                                            Apartment :
                                        </li>
                                        <li>
                                            2
                                            <img class="img-fluid img-24" src="assets/uploads/bed.svg" alt="">

                                        </li>
                                        <li>
                                            3
                                            <img class="img-fluid img-24" src="assets/uploads/bathroom.svg" alt="">
                                        </li>
                                        <li>
                                            1,605 sqft
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
                                    <a href="#" class="font-14 gold-font pt-3 mr-3">PREMIUM</a>
                                    <img class="img-fluid mt-2" src="assets/uploads/524-logo.webp" alt="">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row mt-2 justify-content-center align-self-center">
                    <div class="col-lg-12 col-sm-12 col-12">
                        <div class="borderColumn">
                            <div class="row">
                                <div class="col-lg-4 col-sm-4 col-12">
                                    <img class="img-fluid propertyList-img" src="assets/uploads/property_image.webp" alt="">
                                </div>
                                <div class="col-lg-6 col-sm-6 col-12 pt-2">
                                    <h4>1,200,000 <strong class="colorOrange">AED</strong></h4>
                                    <p class="font-14">
                                        <i class="fa fa-map-marker" aria-hidden="true"></i> Executive Tower F, Executive Towers, Business Bay, Dubai
                                    </p>
                                    <ul class="propertyListing-ul">
                                        <li class="special-li">
                                            Apartment :
                                        </li>
                                        <li>
                                            2
                                            <img class="img-fluid img-24" src="assets/uploads/bed.svg" alt="">

                                        </li>
                                        <li>
                                            3
                                            <img class="img-fluid img-24" src="assets/uploads/bathroom.svg" alt="">
                                        </li>
                                        <li>
                                            1,605 sqft
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
                                    <a href="#" class="font-14 gold-font pt-3 mr-3">PREMIUM</a>
                                    <img class="img-fluid mt-2" src="assets/uploads/524-logo.webp" alt="">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row mt-4">
                    <div class="col-lg-12 col-sm-12 col-12 text-center">
                        <nav aria-label="Page navigation example">
                            <ul class="pagination justify-content-center">
                                <li class="page-item"><a class="page-link" href="#">Previous</a></li>
                                <li class="page-item"><a class="page-link" href="#">1</a></li>
                                <li class="page-item"><a class="page-link" href="#">2</a></li>
                                <li class="page-item"><a class="page-link" href="#">3</a></li>
                                <li class="page-item"><a class="page-link" href="#">Next</a></li>
                            </ul>
                        </nav>
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
