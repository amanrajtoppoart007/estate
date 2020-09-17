<div class="row mt-5">
                <div class="col-lg-6 col-sm-6 col-12 offset-lg-3 offset-sm-3">
                    <!-- Advance Search -->
                    <ul class="nav nav-pills advanced-tabs justify-content-center" role="tablist">
                        @php
                            $individual = (!empty(request()->agent_type)) ? ((request()->agent_type=='individual')? 'active':'' ) : 'active';
                            $company    = (!empty(request()->agent_type)) ? ((request()->agent_type=='company')? 'active':'' ) : '';
                        @endphp
                        <li class="nav-item">
                            <a class="nav-link {{$individual}}" data-toggle="tab" href="#INDIVIDUAL" role="tab">AGENTS</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link {{$company}}" data-toggle="tab" href="#COMPANY" role="tab">COMPANIES</a>
                        </li>
                    </ul>
                    <!-- Tab panes -->
                    <div class="tab-content mt-4">
                        <div class="tab-pane {{$individual}}" id="INDIVIDUAL" role="tabpanel">
                            <form method="get" action="{{route('agent.search')}}">
                                <input type="hidden" name="agent_type" value="individual">
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
                        <div class="tab-pane {{$company}} " id="COMPANY" role="tabpanel">
                            <form method="get" action="{{route('agent.search')}}">
                                <input type="hidden" name="agent_type" value="company">
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
