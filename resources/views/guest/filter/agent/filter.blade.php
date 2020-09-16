{{Form::open(['route'=>'agent.search'])}}
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

{{Form::close()}}
