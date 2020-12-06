@extends("admin.layout.base")
@include("admin.include.breadcrumb",["page_title"=>"View Tenant Detail"])
@section("content")


<!-- Content -->
    <div class="content container-fluid">
        <span class="float-right">Owners</span>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item active" aria-current="page">View Tenant Detail</li>
            </ol>

        </nav>

        <div class="row gx-2 gx-lg-3 mt-3">
            <div class="col-lg-12 mb-3 mb-lg-0">
              <div class="card">
                  <div class="card-header bg-gradient-info">
                      <h6>Personal Detail</h6>
                  </div>
                  <div class="card-body">
                    <div class="row">

                      <div class="col-12 col-sm-6 col-md-3">
                        <div class="media align-items-center">
                          <span class="avatar avatar-circle bg-primary mr-3">
                              <i class="p-3 fa fa-code-branch text-white"></i>
                          </span>

                          <div class="media-body">
                            <h6 class="font-weight-bold">{{ucwords(str_replace('_',' ',$tenant->tenant_type))}}</h6>
                            <span class="info-box-text text-gray">Tenancy Type</span>
                          </div>
                        </div>
                      </div>

                      <div class="col-12 col-sm-6 col-md-3">
                        <div class="media align-items-center">
                          <span class="avatar avatar-circle bg-info mr-3">
                              <i class="p-3 fa fa-user text-white"></i>
                          </span>

                          <div class="media-body">
                            <h6 class="font-weight-bold">{{$tenant->name}}</h6>
                            <span class="info-box-text text-gray">Name</span>
                          </div>
                        </div>
                      </div>

                      <div class="col-12 col-sm-6 col-md-3">
                        <div class="media align-items-center">
                          <span class="avatar avatar-circle bg-success mr-3">
                              <i class="p-3 fa fa-envelope text-white"></i>
                          </span>

                          <div class="media-body">
                            <h6 class="font-weight-bold">{{$tenant->email}}</h6>
                            <span class="info-box-text text-gray">Email</span>
                          </div>
                        </div>
                      </div>

                      <div class="col-12 col-sm-6 col-md-3">
                        <div class="media align-items-center">
                          <span class="avatar avatar-circle bg-primary mr-3">
                              <i class="p-3 fa fa-mobile text-white"></i>
                          </span>

                          <div class="media-body">
                            <h6 class="font-weight-bold">{{($tenant->country_code)?'+'.$tenant->country_code:null}}{{$tenant->mobile}}</h6>
                            <span class="info-box-text text-gray">Contact No.</span>
                          </div>
                        </div>
                      </div>
                    </div>

                      <div class="row mt-3">

                      <div class="col-12 col-sm-6 col-md-3">
                        <div class="media align-items-center">
                          <span class="avatar avatar-circle bg-primary mr-3">
                              <i class="p-3 fa fa-flag text-white"></i>
                          </span>

                          <div class="media-body">
                            <h6 class="font-weight-bold">{{$tenant->country ? $tenant->country->name: null}}</h6>
                            <span class="info-box-text text-gray">Country</span>
                          </div>
                        </div>
                      </div>

                      {{--<div class="col-12 col-sm-6 col-md-3">
                        <div class="media align-items-center">
                          <span class="avatar avatar-circle bg-info mr-3">
                              <i class="p-3 fa fa-city text-white"></i>
                          </span>

                          <div class="media-body">
                            <h6 class="font-weight-bold">{{($tenant->city)?$tenant->city->name:null}}</h6>
                            <span class="info-box-text text-gray">City</span>
                          </div>
                        </div>
                      </div>--}}

                      {{--<div class="col-12 col-sm-6 col-md-3">
                        <div class="media align-items-center">
                          <span class="avatar avatar-circle bg-warning mr-3">
                              <i class="p-3 fa fa-map-marked text-white"></i>
                          </span>

                          <div class="media-body">
                            <h6 class="font-weight-bold">{{$tenant->address}}</h6>
                            <span class="info-box-text text-gray">Address</span>
                          </div>
                        </div>
                      </div>--}}

                     {{--<div class="col-12 col-sm-6 col-md-3">
                        <div class="media align-items-center">
                          <span class="avatar avatar-circle bg-warning mr-3">
                              <i class="p-3 fa fa-user text-white"></i>
                          </span>

                          <div class="media-body">
                            <h6 class="font-weight-bold">{{$tenant->zip}}</h6>
                            <span class="info-box-text text-gray">Zipcode</span>
                          </div>
                        </div>
                      </div>--}}



                      <div class="col-12 col-sm-6 col-md-3">
                        <div class="media align-items-center">
                          <span class="avatar avatar-circle bg-info mr-3">
                              <i class="p-3 fa fa-user text-white"></i>
                          </span>

                          <div class="media-body">
                            <h6 class="font-weight-bold">{{($tenant->dob)?date('d-m-Y',strtotime($tenant->dob)):null}}</h6>
                            <span class="info-box-text text-gray">DOB</span>
                          </div>
                        </div>
                      </div>

                      <div class="col-12 col-sm-6 col-md-3">
                        <div class="media align-items-center">
                          <span class="avatar avatar-circle bg-info mr-3">
                              <i class="p-3 fa fa-user text-white"></i>
                          </span>

                          <div class="media-body">
                            <h6 class="font-weight-bold">{{($tenant->tenant_count)?$tenant->tenant_count:1}}</h6>
                            <span class="info-box-text text-gray">No. Of Tenants</span>
                          </div>
                        </div>
                      </div>
                         

                    </div>
                  </div>
              </div>

              @if(!$tenant->documents->isEmpty())
                <div class="card mt-3">
                    <div class="card-header bg-gradient-info">
                        <h6>Documents</h6>
                    </div>
                    <div class="card-body">
                       <div class="table-responsive">
                            <table class="table">
                            <thead>
                              <tr>
                                  <th>Document</th>
                                  <th>View/Download</th>
                                  <th>Date Type</th>
                                  <th>Date</th>
                              </tr>
                            </thead>
                            <tbody>
                            @foreach($tenant->documents as $doc)
                                 <tr>
                                     <td>{{ucwords(strtolower($doc->document_title))}}</td>
                                     <td>
                                         @php
                                             if(!empty($doc->file_url))
                                             {
                                                 $url = route('get.doc',base64_encode($doc->file_url));
                                             }
                                             else
                                             {
                                                 $url = asset('theme/images/4.png');
                                             }
                                         @endphp
                                         <a target="_blank" class="btn btn-soft-primary" href="{{$url}}" >
                                             <i class="fa fa-eye"></i> View
                                         </a>
                                         <a target="_blank" class="btn btn-soft-info" href="{{$url}}"  download>
                                             <i class="fa fa-file-download"></i> Download
                                         </a>
                                     </td>
                                     <td>{{ucwords(strtolower($doc->date_key))}} </td>
                                     <td>{{$doc->date_value ? date("d-m-Y",strtotime($doc->date_value)): null}}</td>
                                 </tr>
                            @endforeach
                            </tbody>
                        </table>
                       </div>
                    </div>
                </div>
                @endif

                @if(!empty($tenant->company_name))
                  <div class="card">
                      <div class="card-header bg-gradient-orange">
                          <h6 class="text-white">Company Detail</h6>
                      </div>
                      <div class="card-body">
                          <div class="row" id="company_extra_detail">
                              <div class="col">
                                  <dt>Company Name</dt>
                                  <dd>{{($tenant->company_name)?$tenant->profile->company_name:null}}</dd>
                              </div>
                          </div>
                      </div>
                  </div>
                  @endif

                  @if(!empty($tenant->relations))
                    <div class="card mt-3">
                        <div class="card-header bg-gradient-info">
                            <h5>Extra Details</h5>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered">
                                    <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Name</th>
                                        <th>Relation/Designation</th>
                                        <th>Emirates Id</th>
                                        <th>Passport</th>
                                        <th>Visa</th>
                                    </tr>
                                    </thead>
                                    <tbody id="family_detail_grid">
                                    @foreach($tenant->relations as $rel)
                                        <tr>
                                            <td>{{$rel->id}}</td>
                                            <td>{{$rel->name}}</td>
                                            <td>{{$rel->relationship}}</td>
                                            <td>
                                                @if(!empty($rel->emirates_id))
                                                <a target="_blank" class="btn btn-outline-primary" href="{{route('get.doc',base64_encode($rel->emirates_id))}}">View</a>
                                                @else
                                                    <span class="text-warning">Document not uploaded</span>
                                                 @endif
                                            </td>
                                            <td>
                                                @if(!empty($rel->passport))
                                                <a target="_blank" class="btn btn-outline-primary" href="{{route('get.doc',base64_encode($rel->passport))}}">View</a>
                                                @else
                                                    <span class="text-danger">Document not uploaded</span>
                                                @endif
                                            </td>
                                            <td>
                                                @if(!empty($rel->visa))
                                                <a target="_blank" class="btn btn-outline-primary" href="{{route('get.doc',base64_encode($rel->visa))}}">View</a>
                                                @else
                                                 <span class="text-danger">Document not uploaded</span>
                                                @endif
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                @endif

                 @if($tenant->allotment->isEmpty())
                  <div class="row mt-3">
                      <div class="col-md-12">
                          <div class="form-group">
                          <a href="{{route('tenant.allot.property',$tenant->id)}}"  class="btn btn-success float-left">Allot Property</a>
                          </div>
                      </div>
                  </div>
               @else
                   <div class="card mt-3">
                       <div class="card-header bg-gradient-info">
                           <h6>Allotted Apartment</h6>
                       </div>
                       <div class="card-body">
                          <div class="row">
                              <div class="col-6 col-sm-3 col-md-3 col-lg-3 col-xl-3 my-1">
                                  <span class="font-weight-bold">Building</span>
                              </div>
                               <div class="col-6 col-sm-3 col-md-3 col-lg-3 col-xl-3 my-1">
                                   {{$allotment->property->title}}

                              </div>
                               <div class="col-6 col-sm-3 col-md-3 col-lg-3 col-xl-3 my-1">
                                  <span class="font-weight-bold">Flat Number</span>
                              </div>
                               <div class="col-6 col-sm-3 col-md-3 col-lg-3 col-xl-3 my-1">
                                  {{$allotment->property_unit->unitcode}}
                              </div>
                          </div>
                       </div>
                   </div>
               @endif

            </div>
          </div>
        </div>

@endsection
@section("script")
       <script>
       $(document).ready(function(){
            function switch_tenant_type(tenant_type)
        {
            switch(tenant_type)
				{
					case 'family_husband_wife':
						$("#family_hs_extra_detail").show();
						$("#extra_relation_detail").show();
						$("#company_extra_detail").hide();
						$("#bachelor_extra_detail").hide();
					break;
					case 'family_brother_sister':
						$("#family_hs_extra_detail").hide();
						$("#extra_relation_detail").show();
						$("#company_extra_detail").hide();
						$("#bachelor_extra_detail").hide();
					break;
					case 'company':
						$("#family_hs_extra_detail").hide();
						$("#extra_relation_detail").show();
						$("#company_extra_detail").show();
						$("#bachelor_extra_detail").hide();
					break;
					case 'bachelor':
						$("#family_hs_extra_detail").hide();
						$("#extra_relation_detail").hide();
						$("#company_extra_detail").hide();
						$("#bachelor_extra_detail").show();
					break;
					default:
						$("#family_hs_extra_detail").show();
						$("#extra_relation_detail").show();
						$("#company_extra_detail").show();
						$("#bachelor_extra_detail").show();
					break;

				}
        }
        switch_tenant_type('{{$tenant->tenant_type}}');
       })
   </script>
@endsection
