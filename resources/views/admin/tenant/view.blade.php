@extends("admin.layout.app")
@include("admin.include.breadcrumb",["page_title"=>"View Tenant Detail"])
@section("content")
  <div class="card">
      <div class="card-header bg-gradient-info">
          <h6>Personal Detail</h6>
      </div>
      <div class="card-body">
        <div class="row">
            <div class="col-12 col-sm-6 col-md-3">
            <div class="info-box">
              <span class="info-box-icon bg-gradient-indigo elevation-1">
                  <i class="fa fa-code-branch"></i>
              </span>

              <div class="info-box-content">
                <h6 class="font-weight-bold">{{ucwords(str_replace('_',' ',$tenant->tenant_type))}}</h6>
                <span class="info-box-text text-gray">Tenancy Type</span>
              </div>
            </div>
          </div>

          <div class="col-12 col-sm-6 col-md-3">
            <div class="info-box">
              <span class="info-box-icon bg-info elevation-1">
                  <i class="fa fa-user"></i>
              </span>
              <div class="info-box-content">
                <h6 class="font-weight-bold">{{$tenant->name}}</h6>
                <span class="info-box-text text-gray">Name</span>
              </div>
            </div>
          </div>
             <div class="col-12 col-sm-6 col-md-3">
            <div class="info-box">
              <span class="info-box-icon bg-success elevation-1">
                  <i class="fa fa-envelope"></i>
              </span>
              <div class="info-box-content">
                <h6 class="font-weight-bold">{{$tenant->email}}</h6>
                <span class="info-box-text text-gray">Email</span>
              </div>
            </div>
          </div>
             <div class="col-12 col-sm-6 col-md-3">
            <div class="info-box">
              <span class="info-box-icon bg-primary elevation-1">
                  <i class="fa fa-mobile"></i>
              </span>
              <div class="info-box-content">
                <h6 class="font-weight-bold">{{($tenant->country_code)?'+'.$tenant->country_code:null}}{{$tenant->mobile}}</h6>
                <span class="info-box-text text-gray">Contact No.</span>
              </div>
            </div>
          </div>
          <div class="clearfix hidden-md-up"></div>

         <div class="col-12 col-sm-6 col-md-3">
            <div class="info-box">
              <span class="info-box-icon bg-gradient-fuchsia elevation-1">
                  <i class="fa fa-flag"></i>
              </span>
              <div class="info-box-content">
                <h6 class="font-weight-bold">{{$tenant->country ? $tenant->country->name: null}}</h6>
                <span class="info-box-text text-gray">Country</span>
              </div>
            </div>
          </div>


              <div class="col-12 col-sm-6 col-md-3">
            <div class="info-box">
              <span class="info-box-icon bg-info elevation-1">
                  <i class="fa fa-user"></i>
              </span>
              <div class="info-box-content">
                <h6 class="font-weight-bold">{{($tenant->dob)?date('d-m-Y',strtotime($tenant->dob)):null}}</h6>
                <span class="info-box-text text-gray">DOB</span>
              </div>
            </div>
          </div>

             <div class="col-12 col-sm-6 col-md-3">
            <div class="info-box">
              <span class="info-box-icon bg-info elevation-1">
                  <i class="fa fa-user"></i>
              </span>
              <div class="info-box-content">
                <h6 class="font-weight-bold">{{($tenant->tenant_count)?$tenant->tenant_count:1}}</h6>
                <span class="info-box-text text-gray">No. Of Tenants</span>
              </div>
            </div>
          </div>

        </div>
      </div>
  </div>
    @if(!$tenant->documents->isEmpty())
    <div class="card">
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
                             <a target="_blank" class="btn btn-primary" href="{{$url}}" >
                                 <i class="fa fa-eye"></i>View
                             </a>
                             <a target="_blank" class="btn btn-info" href="{{$url}}"  download>
                                 <i class="fa fa-file-download"></i>Download
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
      <div class="card">
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
    <div class="row">
        <div class="col-md-12">
            <div class="form-group">
            <a href="{{route('tenant.allot.property',$tenant->id)}}"  class="btn btn-success float-left">Allot Property</a>
            </div>
        </div>
    </div>
 @else
     <div class="card">
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
                    {{$allotment->property_unit->flat_number}}
                </div>
                <div class="col-6 col-sm-3 col-md-3 col-lg-3 col-xl-3 my-1">
                    <span class="font-weight-bold">Address</span>
                </div>
                 <div class="col-6 col-sm-3 col-md-3 col-lg-3 col-xl-3 my-1">
                    {{$allotment->property->address}}
                </div>
            </div>
            @if($tenant->tenancy_contract->isEmpty())
             <div class="row">
                <div class="col">
                    <div class="form-group">
                        <button data-toggle="modal" data-target="#uploadTenancyContractModal" class="btn btn-primary" type="button">Upload Tenancy Contract</button>
                    </div>
                </div>
             </div>
             @else
                <div class="row">
                    <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
                        <table class="table">
                            <thead>
                               <tr>
                                   <th>Effective From</th>
                                   <th>Effective Upto</th>
                                   <th>Signature Date</th>
                                   <th>Tenancy Contract</th>
                               </tr>
                            </thead>
                            <tbody>
                               @foreach($tenant->tenancy_contract as $contract)
                                   <tr>
                                       <td>{{date("d-m-Y",strtotime($contract->effective_from))}}</td>
                                       <td>{{date("d-m-Y",strtotime($contract->effective_upto))}}</td>
                                       <td>{{date("d-m-Y",strtotime($contract->signature_date))}}</td>
                                       <td>
                                           <a href="{{route('get.doc',base64_encode($contract->contract_doc_url))}}" class="btn btn-primary">View</a>
                                           <a href="{{route('get.doc',base64_encode($contract->contract_doc_url))}}" class="btn btn-primary" download>Download</a>
                                       </td>
                                   </tr>
                               @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
             @endif

         </div>
     </div>
 @endif
@endsection
@section("modal")

    <form method="post" action="{{route('tenancy.contract.store')}}" enctype="multipart/form-data" id="uploadTenancyContractForm">
        @csrf
        <input type="hidden" name="breakdown_id" value="{{$allotment->breakdown->id}}">
        <input type="hidden" name="unit_id" value="{{$allotment->unit_id}}">
        <input type="hidden" name="tenant_id" value="{{$allotment->tenant_id}}">
        <input type="hidden" name="unit_allotment_id" value="{{$allotment->id}}">
        <div class="modal" tabindex="-1" role="dialog" id="uploadTenancyContractModal">
  <div class="modal-dialog modal-xl" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Upload Tenancy Contract</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="row">
            <div class="col-12 col-sm-4 col-md-4 col-lg-4 col-xl-4">
                <div class="form-group">
                    <label for="effective_from">Effective From</label>
                    <div class="input-group">
                        <div class="input-group-prepend">
                         <span class="input-group-text">
                             <i class="fa fa-calendar" aria-hidden="true"></i>
                         </span>
                        </div>
                        <input type="text" name="effective_from" id="effective_from" class="form-control" placeholder="DD-MM-YY" autocomplete="off">
                    </div>
                </div>
            </div>
            <div class="col-12 col-sm-4 col-md-4 col-lg-4 col-xl-4">
                <div class="form-group">
                    <label for="effective_upto">Effective From</label>
                    <div class="input-group">
                        <div class="input-group-prepend">
                         <span class="input-group-text">
                             <i class="fa fa-calendar" aria-hidden="true"></i>
                         </span>
                        </div>
                        <input type="text" name="effective_upto" id="effective_upto" class="form-control" placeholder="DD-MM-YY" autocomplete="off">
                    </div>
                </div>
            </div>
            <div class="col-12 col-sm-4 col-md-4 col-lg-4 col-xl-4">
                <div class="form-group">
                    <label for="signature_date">Signature Date</label>
                    <div class="input-group">
                        <div class="input-group-prepend">
                         <span class="input-group-text">
                             <i class="fa fa-calendar" aria-hidden="true"></i>
                         </span>
                        </div>
                        <input type="text" name="signature_date" id="signature_date" class="form-control" placeholder="DD-MM-YY" autocomplete="off">
                    </div>
                </div>
            </div>
            <div class="col-12 col-sm-4 col-md-4 col-lg-4 col-xl-4">
                <div class="form-group">
                    <label for="effective_upto">Tenancy Contract</label>
                    <div class="input-group">
                        <div class="input-group-prepend">
                         <span class="input-group-text">
                             <i class="fa fa-file" aria-hidden="true"></i>
                         </span>
                        </div>
                        <input type="file" name="tenancy_contract" id="tenancy_contract" class="form-control" autocomplete="off">
                    </div>
                </div>
            </div>
        </div>
      </div>
      <div class="modal-footer">
        <button type="submit" class="btn btn-primary">Upload Contract</button>
        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
    </form>
@endsection
@section('head')
    <link rel="stylesheet" href="{{asset('plugin/datetimepicker/css/gijgo.min.css')}}">
@endsection
@section('js')
<script src="{{asset('plugin/datetimepicker/js/gijgo.min.js')}}"></script>
@endsection
@section("script")
       <script>
       $(document).ready(function(){


           let pickers =
               [
                   'effective_from',
                   'effective_upto',
                   'signature_date',
               ];
           pickers.forEach(function(item){
               $(`#${item}`).datepicker({ footer: true, modal: true,format: 'dd-mm-yyyy',/* minDate : '{{now()->format('d-m-Y')}}'*/});
           });


           $("#uploadTenancyContractForm").on("submit",function(e){
               e.preventDefault();
               const url = "{{route('tenancy.contract.store')}}";
               const params = new FormData(document.getElementById("uploadTenancyContractForm"));
               function fn_success(result)
               {
                   toast("success",result.message,"top-right");
                   $("#uploadTenancyContractModal").modal("hide");
                   window.location.href=window.location.href;
               }
               function fn_error(result)
               {
                   toast("error",result.message,"top-right");
               }

               $.fn_ajax_multipart(url,params,fn_success,fn_error);

           });

           let family_hs_extra_detail = $("#family_hs_extra_detail");
           let extra_relation_detail = $("#extra_relation_detail");
           let company_extra_detail = $("#company_extra_detail");
           let bachelor_extra_detail = $("#bachelor_extra_detail");
            function switch_tenant_type(tenant_type)
        {
            switch(tenant_type)
				{
					case 'family_husband_wife':
						family_hs_extra_detail.show();
						extra_relation_detail.show();
						company_extra_detail.hide();
						bachelor_extra_detail.hide();
					break;
					case 'family_brother_sister':
						family_hs_extra_detail.hide();
						extra_relation_detail.show();
						company_extra_detail.hide();
						bachelor_extra_detail.hide();
					break;
					case 'company':
						family_hs_extra_detail.hide();
						extra_relation_detail.show();
						company_extra_detail.show();
						bachelor_extra_detail.hide();
					break;
					case 'bachelor':
						family_hs_extra_detail.hide();
						extra_relation_detail.hide();
						company_extra_detail.hide();
						bachelor_extra_detail.show();
					break;
					default:
						family_hs_extra_detail.show();
						extra_relation_detail.show();
						company_extra_detail.show();
						bachelor_extra_detail.show();
					break;

				}
        }
        switch_tenant_type('{{$tenant->tenant_type}}');
       });
   </script>
@endsection
