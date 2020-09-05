@extends("guest.layout.main")
@section("content")
     <!-- Hero Section -->
    <div class="jumbotron agentSection">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-sm-12 col-12">
                    <h1 class="text-center text-white">Great agents find great properties.</h1>
                </div>
            </div>
            <div class="row mt-5">
                <div class="col-lg-6 col-sm-6 col-12 offset-lg-3 offset-sm-3">
                    <!-- Advance Search -->
                    <ul class="nav nav-pills advanced-tabs justify-content-center" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" data-toggle="tab" href="#BUY" role="tab">AGENTS</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" data-toggle="tab" href="#SELL" role="tab">COMPANIES</a>
                        </li>
                    </ul>
                    <!-- Tab panes -->
                    <div class="tab-content mt-4">
                        <div class="tab-pane active" id="BUY" role="tabpanel">
                            <form>
                                <div class="row">
                                    <div class="col-lg-8 col-sm-8 col-12">
                                        <div class="form-group">
                                            <div class="form-group">
                                                <input type="text" class="form-control" placeholder="Enter Location or Agent Name">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-4 col-sm-4 col-12">
                                        <div class="form-group">
                                            <button type="submit" class="btn btn-primary btn-block btn-agent">Find</button>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-4 col-sm-4 col-12">
                                        <div class="form-group">
                                            <select class="custom-select">
                                                <option selected>Service Needed</option>
                                                <option value="1">One</option>
                                                <option value="2">Two</option>
                                                <option value="3">Three</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-lg-4 col-sm-4 col-12">
                                        <div class="form-group">
                                            <select class="custom-select">
                                                <option selected>Languages</option>
                                                <option value="1">One</option>
                                                <option value="2">Two</option>
                                                <option value="3">Three</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-lg-4 col-sm-4 col-12">
                                        <div class="form-group">
                                            <select class="custom-select">
                                                <option selected>Nationality</option>
                                                <option value="1">One</option>
                                                <option value="2">Two</option>
                                                <option value="3">Three</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>

                            </form>
                        </div>
                        <div class="tab-pane" id="SELL" role="tabpanel">
                            <form>
                                <div class="row">
                                    <div class="col-lg-8 col-sm-8 col-12">
                                        <div class="form-group">
                                            <div class="form-group">
                                                <input type="text" class="form-control" placeholder="Enter Location or Agent Name">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-4 col-sm-4 col-12">
                                        <div class="form-group">
                                            <button type="submit" class="btn btn-primary btn-block btn-agent">Find</button>
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

    <!-- Thumbnail List of Agents -->
    <div class="container my-5 pb-5">
        <div class="row">
            <div class="col-lg-12 col-sm-12 col-12">
                <h2 class="text-center mb-5">Verified Agents</h2>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-3 col-sm-3 col-12">
                <div class="card cardBox-Shadow">
                    <a class="cardAnchor" href="agentView.html">
                        <img src="{{asset('theme/images/agent.jpg')}}" class="card-img-top" alt="...">
                        <div class="card-body p-0 pt-2">
                            <h5 class="card-title mb-0 text-center">Slava Shidlovskiy</h5>
                            <h6 class=" text-center">Senior Property Consultant</h6>
                            <hr>
                            <ul class="agentCard-ul">
                                <li>
                                    Nationality : <strong>Russia</strong>
                                </li>
                                <li>
                                    Language : <strong>English, Russian</strong>
                                </li>
                            </ul>
                            <hr class="mb-0">
                            <div class="row">
                                <div class="col-lg-6 col-sm-6 col-12 pr-0">
                                    <button type="button" class="btn btn-primary btnOrange btn-block">
                                    <strong class="font-24">3</strong>
                                    <div class="clearfix"></div>
                                    <small>For Rent</small>
                                </button>
                                </div>
                                <div class="col-lg-6 col-sm-6 col-12 pl-0">
                                    <button type="button" class="btn btn-primary btnBlue btn-block">
                                    <strong class="font-24">19</strong>
                                    <div class="clearfix"></div>
                                    <small>For Sale</small>
                                </button>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
            </div>
            <div class="col-lg-3 col-sm-3 col-12">
                <div class="card cardBox-Shadow">
                    <a class="cardAnchor" href="agentView.html">
                        <img src="{{asset('theme/images/agent.jpg')}}" class="card-img-top" alt="...">
                        <div class="card-body p-0 pt-2">
                            <h5 class="card-title mb-0 text-center">Slava Shidlovskiy</h5>
                            <h6 class=" text-center">Senior Property Consultant</h6>
                            <hr>
                            <ul class="agentCard-ul">
                                <li>
                                    Nationality : <strong>Russia</strong>
                                </li>
                                <li>
                                    Language : <strong>English, Russian</strong>
                                </li>
                            </ul>
                            <hr class="mb-0">
                            <div class="row">
                                <div class="col-lg-6 col-sm-6 col-12 pr-0">
                                    <button type="button" class="btn btn-primary btnOrange btn-block">
                                    <strong class="font-24">3</strong>
                                    <div class="clearfix"></div>
                                    <small>For Rent</small>
                                </button>
                                </div>
                                <div class="col-lg-6 col-sm-6 col-12 pl-0">
                                    <button type="button" class="btn btn-primary btnBlue btn-block">
                                    <strong class="font-24">19</strong>
                                    <div class="clearfix"></div>
                                    <small>For Sale</small>
                                </button>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
            </div>
            <div class="col-lg-3 col-sm-3 col-12">
                <div class="card cardBox-Shadow">
                    <a class="cardAnchor" href="agentView.html">
                        <img src="{{asset('theme/images/agent.jpg')}}" class="card-img-top" alt="...">
                        <div class="card-body p-0 pt-2">
                            <h5 class="card-title mb-0 text-center">Slava Shidlovskiy</h5>
                            <h6 class=" text-center">Senior Property Consultant</h6>
                            <hr>
                            <ul class="agentCard-ul">
                                <li>
                                    Nationality : <strong>Russia</strong>
                                </li>
                                <li>
                                    Language : <strong>English, Russian</strong>
                                </li>
                            </ul>
                            <hr class="mb-0">
                            <div class="row">
                                <div class="col-lg-6 col-sm-6 col-12 pr-0">
                                    <button type="button" class="btn btn-primary btnOrange btn-block">
                                    <strong class="font-24">3</strong>
                                    <div class="clearfix"></div>
                                    <small>For Rent</small>
                                </button>
                                </div>
                                <div class="col-lg-6 col-sm-6 col-12 pl-0">
                                    <button type="button" class="btn btn-primary btnBlue btn-block">
                                    <strong class="font-24">19</strong>
                                    <div class="clearfix"></div>
                                    <small>For Sale</small>
                                </button>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
            </div>
            <div class="col-lg-3 col-sm-3 col-12">
                <div class="card cardBox-Shadow">
                    <a class="cardAnchor" href="agentView.html">
                        <img src="{{asset('theme/images/agent.jpg')}}" class="card-img-top" alt="...">
                        <div class="card-body p-0 pt-2">
                            <h5 class="card-title mb-0 text-center">Slava Shidlovskiy</h5>
                            <h6 class=" text-center">Senior Property Consultant</h6>
                            <hr>
                            <ul class="agentCard-ul">
                                <li>
                                    Nationality : <strong>Russia</strong>
                                </li>
                                <li>
                                    Language : <strong>English, Russian</strong>
                                </li>
                            </ul>
                            <hr class="mb-0">
                            <div class="row">
                                <div class="col-lg-6 col-sm-6 col-12 pr-0">
                                    <button type="button" class="btn btn-primary btnOrange btn-block">
                                    <strong class="font-24">3</strong>
                                    <div class="clearfix"></div>
                                    <small>For Rent</small>
                                </button>
                                </div>
                                <div class="col-lg-6 col-sm-6 col-12 pl-0">
                                    <button type="button" class="btn btn-primary btnBlue btn-block">
                                    <strong class="font-24">19</strong>
                                    <div class="clearfix"></div>
                                    <small>For Sale</small>
                                </button>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
            </div>
        </div>
        <div class="row mt-2">
            <div class="col-lg-3 col-sm-3 col-12">
                <div class="card cardBox-Shadow">
                    <a class="cardAnchor" href="agentView.html">
                        <img src="{{asset('theme/images/agent.jpg')}}" class="card-img-top" alt="...">
                        <div class="card-body p-0 pt-2">
                            <h5 class="card-title mb-0 text-center">Slava Shidlovskiy</h5>
                            <h6 class=" text-center">Senior Property Consultant</h6>
                            <hr>
                            <ul class="agentCard-ul">
                                <li>
                                    Nationality : <strong>Russia</strong>
                                </li>
                                <li>
                                    Language : <strong>English, Russian</strong>
                                </li>
                            </ul>
                            <hr class="mb-0">
                            <div class="row">
                                <div class="col-lg-6 col-sm-6 col-12 pr-0">
                                    <button type="button" class="btn btn-primary btnOrange btn-block">
                                    <strong class="font-24">3</strong>
                                    <div class="clearfix"></div>
                                    <small>For Rent</small>
                                </button>
                                </div>
                                <div class="col-lg-6 col-sm-6 col-12 pl-0">
                                    <button type="button" class="btn btn-primary btnBlue btn-block">
                                    <strong class="font-24">19</strong>
                                    <div class="clearfix"></div>
                                    <small>For Sale</small>
                                </button>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
            </div>
            <div class="col-lg-3 col-sm-3 col-12">
                <div class="card cardBox-Shadow">
                    <a class="cardAnchor" href="agentView.html">
                        <img src="{{asset('theme/images/agent.jpg')}}" class="card-img-top" alt="...">
                        <div class="card-body p-0 pt-2">
                            <h5 class="card-title mb-0 text-center">Slava Shidlovskiy</h5>
                            <h6 class=" text-center">Senior Property Consultant</h6>
                            <hr>
                            <ul class="agentCard-ul">
                                <li>
                                    Nationality : <strong>Russia</strong>
                                </li>
                                <li>
                                    Language : <strong>English, Russian</strong>
                                </li>
                            </ul>
                            <hr class="mb-0">
                            <div class="row">
                                <div class="col-lg-6 col-sm-6 col-12 pr-0">
                                    <button type="button" class="btn btn-primary btnOrange btn-block">
                                    <strong class="font-24">3</strong>
                                    <div class="clearfix"></div>
                                    <small>For Rent</small>
                                </button>
                                </div>
                                <div class="col-lg-6 col-sm-6 col-12 pl-0">
                                    <button type="button" class="btn btn-primary btnBlue btn-block">
                                    <strong class="font-24">19</strong>
                                    <div class="clearfix"></div>
                                    <small>For Sale</small>
                                </button>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
            </div>
            <div class="col-lg-3 col-sm-3 col-12">
                <div class="card cardBox-Shadow">
                    <a class="cardAnchor" href="agentView.html">
                        <img src="{{asset('theme/images/agent.jpg')}}" class="card-img-top" alt="...">
                        <div class="card-body p-0 pt-2">
                            <h5 class="card-title mb-0 text-center">Slava Shidlovskiy</h5>
                            <h6 class=" text-center">Senior Property Consultant</h6>
                            <hr>
                            <ul class="agentCard-ul">
                                <li>
                                    Nationality : <strong>Russia</strong>
                                </li>
                                <li>
                                    Language : <strong>English, Russian</strong>
                                </li>
                            </ul>
                            <hr class="mb-0">
                            <div class="row">
                                <div class="col-lg-6 col-sm-6 col-12 pr-0">
                                    <button type="button" class="btn btn-primary btnOrange btn-block">
                                    <strong class="font-24">3</strong>
                                    <div class="clearfix"></div>
                                    <small>For Rent</small>
                                </button>
                                </div>
                                <div class="col-lg-6 col-sm-6 col-12 pl-0">
                                    <button type="button" class="btn btn-primary btnBlue btn-block">
                                    <strong class="font-24">19</strong>
                                    <div class="clearfix"></div>
                                    <small>For Sale</small>
                                </button>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
            </div>
            <div class="col-lg-3 col-sm-3 col-12">
                <div class="card cardBox-Shadow">
                    <a class="cardAnchor" href="agentView.html">
                        <img src="{{asset('theme/images/agent.jpg')}}" class="card-img-top" alt="...">
                        <div class="card-body p-0 pt-2">
                            <h5 class="card-title mb-0 text-center">Slava Shidlovskiy</h5>
                            <h6 class=" text-center">Senior Property Consultant</h6>
                            <hr>
                            <ul class="agentCard-ul">
                                <li>
                                    Nationality : <strong>Russia</strong>
                                </li>
                                <li>
                                    Language : <strong>English, Russian</strong>
                                </li>
                            </ul>
                            <hr class="mb-0">
                            <div class="row">
                                <div class="col-lg-6 col-sm-6 col-12 pr-0">
                                    <button type="button" class="btn btn-primary btnOrange btn-block">
                                    <strong class="font-24">3</strong>
                                    <div class="clearfix"></div>
                                    <small>For Rent</small>
                                </button>
                                </div>
                                <div class="col-lg-6 col-sm-6 col-12 pl-0">
                                    <button type="button" class="btn btn-primary btnBlue btn-block">
                                    <strong class="font-24">19</strong>
                                    <div class="clearfix"></div>
                                    <small>For Sale</small>
                                </button>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
            </div>
        </div>
        <div class="row mt-5">
            <div class="col-lg-12 col-sm-12 col-12 text-center">
                <button type="button" class="btn btn-outline-secondary px-5 btnBordered-Blue">Load more</button>
            </div>
        </div>
    </div>
    <!-- End Thumbnail List of Agents -->
@endsection
