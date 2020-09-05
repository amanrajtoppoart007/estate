@extends("guest.layout.main")
@section("content")
    <!-- Top Filter -->
    <div class="container-fluid bgGray pt-3">
        <div class="row">
            <div class="col-lg-12 col-sm-12 col-12">
                <div class="row">
                    <div class="col-lg-2 col-sm-2 col-4">
                        <div class="form-group">
                            <select class="custom-select">
                                <option selected>Any Price</option>
                                <option value="1">One</option>
                                <option value="2">Two</option>
                                <option value="3">Three</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-lg-2 col-sm-2 col-4">
                        <div class="form-group">
                            <select class="custom-select">
                                <option selected>All Beds</option>
                                <option value="1">One</option>
                                <option value="2">Two</option>
                                <option value="3">Three</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-lg-2 col-sm-2 col-4">
                        <div class="form-group">
                            <select class="custom-select">
                                <option selected>All Home Types</option>
                                <option value="1">One</option>
                                <option value="2">Two</option>
                                <option value="3">Three</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-lg-2 col-sm-2 col-4">
                        <div class="form-group">
                            <select class="custom-select">
                                <option selected>All For Sale</option>
                                <option value="1">One</option>
                                <option value="2">Two</option>
                                <option value="3">Three</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-lg-2 col-sm-2 col-4">
                        <div class="form-group">
                            <select class="custom-select">
                                <option selected>Keywords</option>
                                <option value="1">One</option>
                                <option value="2">Two</option>
                                <option value="3">Three</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-lg-2 col-sm-2 col-4">
                        <div class="form-group">
                            <select class="custom-select">
                                <option selected>More</option>
                                <option value="1">One</option>
                                <option value="2">Two</option>
                                <option value="3">Three</option>
                            </select>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row justify-content-center align-self-center">
            <div class="col-lg-6 col-sm-6 col-12 bg-light ">
                <div class="row">
                    <div class="col-lg-8 col-sm-8 col-12">
                        <h4 class="pt-4 pl-4 mb-0">Usk, WA Homes For Sale & Real Estate</h4>
                        <p class="pl-4">19 homes available on Trulia</p>
                    </div>
                    <div class="col-lg-4 col-sm-4 col-12">
                        <div class="form-group pt-4">
                            <select class="custom-select">
                                <option selected>Just For You</option>
                                <option value="1">One</option>
                                <option value="2">Two</option>
                                <option value="3">Three</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="row mt-2">
                    <div class="col-lg-6 col-sm-6 col-12">
                        <div class="card">
                            <img src="assets/uploads/property_image.webp" class="img-fluid propertyList-img" alt="...">
                            <div class="card-body">
                                <h5 class="card-title">1,200,000 <strong class="colorOrange">AED</strong></h5>
                                <p class="font-14">
                                    <i class="fa fa-map-marker" aria-hidden="true"></i> Executive Tower F, Executive Towers, Business Bay, Dubai
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 col-sm-6 col-12">
                        <div class="card">
                            <img src="assets/uploads/property_image.webp" class="img-fluid propertyList-img" alt="...">
                            <div class="card-body">
                                <h5 class="card-title">1,200,000 <strong class="colorOrange">AED</strong></h5>
                                <p class="font-14">
                                    <i class="fa fa-map-marker" aria-hidden="true"></i> Executive Tower F, Executive Towers, Business Bay, Dubai
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row mt-2">
                    <div class="col-lg-6 col-sm-6 col-12">
                        <div class="card">
                            <img src="assets/uploads/property_image.webp" class="img-fluid propertyList-img" alt="...">
                            <div class="card-body">
                                <h5 class="card-title">1,200,000 <strong class="colorOrange">AED</strong></h5>
                                <p class="font-14">
                                    <i class="fa fa-map-marker" aria-hidden="true"></i> Executive Tower F, Executive Towers, Business Bay, Dubai
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 col-sm-6 col-12">
                        <div class="card">
                            <img src="assets/uploads/property_image.webp" class="img-fluid propertyList-img" alt="...">
                            <div class="card-body">
                                <h5 class="card-title">1,200,000 <strong class="colorOrange">AED</strong></h5>
                                <p class="font-14">
                                    <i class="fa fa-map-marker" aria-hidden="true"></i> Executive Tower F, Executive Towers, Business Bay, Dubai
                                </p>
                            </div>
                        </div>
                    </div>
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
