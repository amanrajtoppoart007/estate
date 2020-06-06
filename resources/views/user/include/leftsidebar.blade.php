<div class="col-md-1 col-xl-2 bg-primary">
                    <div class="row">
                        <div class="full-row deshbord_sidebar flat_small py_30 w-100">
                            <h6 class="color-default border_gray pb_15 m-0 px_15"><span>Overview</span></h6>
                            <ul class="mt_10">
                                <li class="{{ (request()->is('/home')) ? 'active' : '' }}">
                                    <a href="{{ route('home') }}"><i class="flaticon-dashboard"></i><span>Dashboard</span></a>
                                </li>
                            </ul>
                              <h6 class="color-default border_gray pb_15 pt_50 m-0 px_15"><span>Manage Tenant</span></h6>
                            <ul class="mt_10">
                                <li id="sidebar-add-tenant">
                                    <a href="{{route('tenant.create')}}"><i class="flaticon-seller"></i><span>Add Tenants</span></a>
                                </li>
                                 <li id="sidebar-all-tenant">
                                    <a href="{{route('tenant.list')}}"><i class="flaticon-seller"></i><span>All Tenants</span></a>
                                </li>

                            </ul>
                            
                            
                        </div>
                    </div>
                </div>