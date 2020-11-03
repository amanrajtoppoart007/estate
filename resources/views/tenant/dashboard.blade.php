@extends('tenant.layout.app')
@include("tenant.include.breadcrumb",["page_title"=>"Dashboard"])
@section('content')
    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-md-4">
                    <div class="card card-widget widget-user">
                        <div class="widget-user-header bg-info">
                            <h3 class="widget-user-username">{{auth('tenant')->user()->name}}</h3>
                            <h5 class="widget-user-desc">{{auth('tenant')->user()->email}}</h5>
                        </div>
                        <div class="widget-user-image">
                            <img class="img-circle elevation-2" src="{{asset('assets/img/user1-128x128.jpg')}}"
                                 alt="User Avatar">
                        </div>
                        <div class="card-footer">
                            <div class="row">
                                <div class="col-sm-4 border-right">
                                    <div class="description-block">
                                        <h5 class="description-header">{{date('d-M-y',strtotime(auth('tenant')->user()->created_at))}}</h5>
                                        <span class="description-text">Member since</span>
                                    </div>
                                </div>

                                <div class="col-sm-4 border-right">
                                    <div class="description-block">
                                        <h5 class="description-header">{{auth('tenant')->user()->tenant_code}}</h5>
                                        <span class="description-text">Tenant Code</span>
                                    </div>

                                </div>

                                <div class="col-sm-4">
                                    <div class="description-block">
                                        <h5 class="description-header">{{auth('tenant')->user()->mobile}}</h5>
                                        <span class="description-text">Mobile</span>
                                    </div>

                                </div>

                            </div>

                        </div>
                    </div>

                </div>
            </div>

            <div class="row">
                <div class="col-12 col-sm-6 col-md-3">
                    <div class="card bg-info">
                        <div class="card-body">
                            <div class="d-flex align-items-center">
                                <div class="icon mb-0 mb-md-2 mb-xl-0 mr-2">
                                    <i class="mdi mdi-star-circle"></i>
                                </div>
                                <p class="font-weight-medium mb-0">Tenancy Contracts</p>
                            </div>
                            <div class="d-flex align-items-center mt-3 flex-wrap">
                                <h3 class="font-weight-normal mb-0 mr-2">59467</h3>

                            </div>
                            <small class="font-weight-medium d-block mt-2">Go to section</small>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-sm-6 col-md-3 ">
                    <div class="card bg-info">
                        <div class="card-body">
                            <div class="d-flex align-items-center">
                                <div class="icon mb-0 mb-md-2 mb-xl-0 mr-2">
                                    <i class="mdi mdi-truck"></i>
                                </div>
                                <p class="font-weight-medium mb-0">Update Details</p>
                            </div>
                            <div class="d-flex align-items-center mt-3 flex-wrap">
                                <h3 class="font-weight-normal mb-0 mr-2">28085</h3>

                            </div>
                            <small class="font-weight-medium d-block mt-2">Go to section</small>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-sm-6 col-md-3 ">
                    <div class="card bg-info">
                        <div class="card-body">
                            <div class="d-flex align-items-center">
                                <div class="icon mb-0 mb-md-2 mb-xl-0 mr-2">
                                    <i class="mdi mdi-basket"></i>
                                </div>
                                <p class="font-weight-medium mb-0">Payment History</p>
                            </div>
                            <div class="d-flex align-items-center mt-3 flex-wrap">
                                <h3 class="font-weight-normal mb-0 mr-2">39645</h3>

                            </div>
                            <small class="font-weight-medium d-block mt-2">Go To Section</small>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-sm-6 col-md-3 ">
                    <div class="card bg-info">
                        <div class="card-body">
                            <div class="d-flex align-items-center">
                                <div class="icon mb-0 mb-md-2 mb-xl-0 mr-2">
                                    <i class="mdi mdi-package-down"></i>
                                </div>
                                <p class="font-weight-medium mb-0">Renew Tenancy Contract</p>
                            </div>
                            <div class="d-flex align-items-center mt-3 flex-wrap">
                                <h3 class="font-weight-normal mb-0 mr-2">44148</h3>

                            </div>
                            <small class="font-weight-medium d-block mt-2">Go To Section</small>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-sm-6 col-md-3 ">
                    <div class="card bg-info">
                        <div class="card-body">
                            <div class="d-flex align-items-center">
                                <div class="icon mb-0 mb-md-2 mb-xl-0 mr-2">
                                    <i class="mdi mdi-package-down"></i>
                                </div>
                                <p class="font-weight-medium mb-0">Break Contract</p>
                            </div>
                            <div class="d-flex align-items-center mt-3 flex-wrap">
                                <h3 class="font-weight-normal mb-0 mr-2">44148</h3>

                            </div>
                            <small class="font-weight-medium d-block mt-2">Go To Section</small>
                        </div>
                    </div>
                </div>

                <div class="col-12 col-sm-6 col-md-3 ">
                    <div class="card bg-info">
                        <div class="card-body">
                            <div class="d-flex align-items-center">
                                <div class="icon mb-0 mb-md-2 mb-xl-0 mr-2">
                                    <i class="mdi mdi-package-down"></i>
                                </div>
                                <p class="font-weight-medium mb-0">Maintenance</p>
                            </div>
                            <div class="d-flex align-items-center mt-3 flex-wrap">
                                <h3 class="font-weight-normal mb-0 mr-2">44148</h3>

                            </div>
                            <small class="font-weight-medium d-block mt-2">Go To Section</small>
                        </div>
                    </div>
                </div>

                <div class="col-12 col-sm-6 col-md-3">
                    <div class="card bg-info">
                        <div class="card-body">
                            <div class="d-flex align-items-center">
                                <div class="icon mb-0 mb-md-2 mb-xl-0 mr-2">
                                    <i class="mdi mdi-package-down"></i>
                                </div>
                                <p class="font-weight-medium mb-0">Vacating</p>
                            </div>
                            <div class="d-flex align-items-center mt-3 flex-wrap">
                                <h3 class="font-weight-normal mb-0 mr-2">44148</h3>

                            </div>
                            <small class="font-weight-medium d-block mt-2">Go To Section</small>
                        </div>
                    </div>
                </div>

                <div class="col-12 col-sm-6 col-md-3 ">
                    <div class="card bg-info">
                        <div class="card-body">
                            <div class="d-flex align-items-center">
                                <div class="icon mb-0 mb-md-2 mb-xl-0 mr-2">
                                    <i class="mdi mdi-package-down"></i>
                                </div>
                                <p class="font-weight-medium mb-0">Quotations</p>
                            </div>
                            <div class="d-flex align-items-center mt-3 flex-wrap">
                                <h3 class="font-weight-normal mb-0 mr-2">44148</h3>

                            </div>
                            <small class="font-weight-medium d-block mt-2">Go To Section</small>
                        </div>
                    </div>
                </div>

                <div class="col-12 col-sm-6 col-md-3 ">
                    <div class="card bg-info">
                        <div class="card-body">
                            <div class="d-flex align-items-center">
                                <div class="icon mb-0 mb-md-2 mb-xl-0 mr-2">
                                    <i class="mdi mdi-package-down"></i>
                                </div>
                                <p class="font-weight-medium mb-0">Refunds</p>
                            </div>
                            <div class="d-flex align-items-center mt-3 flex-wrap">
                                <h3 class="font-weight-normal mb-0 mr-2">44148</h3>

                            </div>
                            <small class="font-weight-medium d-block mt-2">Go To Section</small>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-sm-6 col-md-3 ">
                    <div class="card bg-info">
                        <div class="card-body">
                            <div class="d-flex align-items-center">
                                <div class="icon mb-0 mb-md-2 mb-xl-0 mr-2">
                                    <i class="mdi mdi-package-down"></i>
                                </div>
                                <p class="font-weight-medium mb-0">Frequently asked questions</p>
                            </div>
                            <div class="d-flex align-items-center mt-3 flex-wrap">
                                <h3 class="font-weight-normal mb-0 mr-2">44148</h3>

                            </div>
                            <small class="font-weight-medium d-block mt-2">Go To Section</small>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-sm-6 col-md-3 ">
                    <div class="card bg-info">
                        <div class="card-body">
                            <div class="d-flex align-items-center">
                                <div class="icon mb-0 mb-md-2 mb-xl-0 mr-2">
                                    <i class="mdi mdi-package-down"></i>
                                </div>
                                <p class="font-weight-medium mb-0">Refer a friend</p>
                            </div>
                            <div class="d-flex align-items-center mt-3 flex-wrap">
                                <h3 class="font-weight-normal mb-0 mr-2">44148</h3>

                            </div>
                            <small class="font-weight-medium d-block mt-2">Go To Section</small>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-sm-6 col-md-3 ">
                    <div class="card bg-info">
                        <div class="card-body">
                            <div class="d-flex align-items-center">
                                <div class="icon mb-0 mb-md-2 mb-xl-0 mr-2">
                                    <i class="mdi mdi-package-down"></i>
                                </div>
                                <p class="font-weight-medium mb-0">Support</p>
                            </div>
                            <div class="d-flex align-items-center mt-3 flex-wrap">
                                <h3 class="font-weight-normal mb-0 mr-2">44148</h3>
                            </div>
                            <small class="font-weight-medium d-block mt-2">Go To Section</small>
                        </div>
                    </div>
                </div>

            </div>

        </div>
    </div>
@endsection
