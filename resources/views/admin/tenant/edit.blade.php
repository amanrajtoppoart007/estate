@extends('admin.layout.app')
@include("admin.include.breadcrumb",["page_title"=>"Edit Tenant"])

@section('content')
    <div class="card">
        <div class="card-body">
          {{Form::open(['id'=>'edit_data_form','method'=>'post','autocomplete'=>'off'])}}
            <input type="hidden" name="tenant_id" value="{{$tenant->id}}">
             <div class="card card-info">
                <div class="card-header">
                    <h6>Basic Detail</h6>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-12 col-sm-12 col-md-8 col-lg-8 col-xl-8">
                            <div class="row">
                                <div class="col-12 col-sm-6 col-md-6 col-lg-6 col-xl-6">
                                    <div class="form-group">
                                        <label  for="tenant_type">Tenant Type <span class="text-danger">*</span></label>
                                        <div class="input-group">
                                         <div class="input-group-prepend">
                                             <span class="input-group-text">
                                                  <i class="fa fa-window-maximize" aria-hidden="true"></i>
                                             </span>
                                         </div>
                                        <select name="tenant_type" id="tenant_type" class="form-control">
                                            <option value="">Select Tenancy</option>

                                            @php $tenancy  = get_tenancy_types();@endphp
                                            @foreach($tenancy as $key=>$value)
                                                @php $selected = ($key==$tenant->tenant_type)?'selected':''; @endphp
                                                <option value="{{$key}}" {{$selected}}>{{$value}}</option>
                                            @endforeach
                                        </select>
                                     </div>

                                    </div>
                                </div>
                                <div class="col-12 col-sm-6 col-md-6 col-lg-6 col-xl-6">
                                    <div class="form-group">
                                        <label for="name">Tenant Name <span class="text-danger">*</span></label>
                                         <div class="input-group">
                                         <div class="input-group-prepend">
                                             <span class="input-group-text"><i class="fas fa-user"></i></span>
                                         </div>
                                        <input class="form-control" name="name" id="name" type="text"  value="{{$tenant->name}}" autocomplete="off">
                                     </div>

                                    </div>
                                </div>
                                <div class="col-12 col-sm-6 col-md-6 col-lg-6 col-xl-6">
                                    <div class="form-group">
                                        <label for="email">Email <span class="text-danger">*</span></label>
                                         <div class="input-group">
                                         <div class="input-group-prepend">
                                             <span class="input-group-text"><i class="fas fa-envelope"></i></span>
                                         </div>
                                        <input type="text" name="email" id="email" class="form-control" autocomplete="off" value="{{$tenant->email}}">
                                     </div>
                                    </div>
                                </div>
                                <div class="col-12 col-sm-6 col-md-6 col-lg-6 col-xl-6">
                                    <div class="form-group">
                                        <label for="password">Password <span class="text-danger">*</span></label>
                                         <div class="input-group">
                                         <div class="input-group-prepend">
                                             <span class="input-group-text"><i class="fas fa-lock"></i></span>
                                         </div>
                                       <input type="text" name="password" class="choose_file form-control" autocomplete="off" value="">
                                     </div>
                                    </div>
                                </div>
                                <div class="col-12 col-sm-6 col-md-6 col-lg-6 col-xl-6">
                                    <div class="form-group">
                                        <label for="mobile">Mobile <span class="text-danger">*</span></label>
                                         <div class="input-group">
                                         <div class="input-group-prepend">
                                             <span class="input-group-text">
                                                 <select  name="country_code" id="country_code" class="phone_code">

                                                      @foreach($countries as $country)
                                                          @php $selected = ($tenant->country->code==$country->code)?'selected':''; @endphp
                                                         <option value="{{$country->id}}" {{$selected}}>+{{$country->code}}</option>
                                                     @endforeach
                                                  </select>

                                             </span>
                                         </div>
                                        <input type="text" name="mobile" id="mobile" class="form-control numeric" autocomplete="off" value="{{$tenant->mobile}}">
                                     </div>
                                    </div>
                                </div>
                                 <div class="col-12 col-sm-6 col-md-6 col-lg-6 col-xl-6">
                                    <div class="form-group">
                                        <label for="country_id">Nationality <span class="text-danger">*</span></label>
                                         <div class="input-group">
                                         <div class="input-group-prepend">
                                             <span class="input-group-text"><i class="fas fa-flag"></i></span>
                                         </div>
                                             <select name="country_id" id="country_id" class="form-control">
                                                 <option>Select Country</option>
                                                 @foreach($countries as $country)
                                                          @php $selected = ($tenant->country->code==$country->code)?'selected':''; @endphp
                                                         <option value="{{$country->id}}" {{$selected}}>{{$country->name}}</option>
                                                     @endforeach
                                             </select>

                                     </div>
                                    </div>
                                </div>

                                <div class="col-12 col-sm-6 col-md-6 col-lg-6 col-xl-6">
                                    <div class="form-group">
                                        <label for="dob">Date Of Birth</label>
                                         <div class="input-group">
                                         <div class="input-group-prepend">
                                             <span class="input-group-text">
                                                 <i class="fa fa-birthday-cake" aria-hidden="true"></i>
                                             </span>
                                         </div>
                                         <input type="text" name="dob" id="dob" class="form-control" value="{{$tenant->dob ? date('d-m-Y',strtotime($tenant->dob)) : null}}" placeholder="DD-MM-YY (Optional)">
                                     </div>
                                    </div>
                                </div>
                                <div class="col-12 col-sm-6 col-md-6 col-lg-6 col-xl-6">
                                    <div class="form-group">
                                        <label for="tenant_count">Tenant Count <span class="text-danger">*</span> <small>(Including the applicant/primary tenant)</small></label>
                                         <div class="input-group">
                                         <div class="input-group-prepend">
                                             <span class="input-group-text">
                                                 <i class="fa fa-calculator" aria-hidden="true"></i>
                                             </span>
                                         </div>
                                         <input type="text" name="tenant_count" id="tenant_count" class="form-control numeric" placeholder="Enter number of tenants" value="{{$tenant->tenant_count}}">
                                     </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-sm-12 col-md-4 col-lg-4 col-xl-4 text-right">
                            @php
                                if(!empty($tenant->profile_image))
                                {
                                    $img = route('get.doc',base64_encode($tenant->profile_image));
                                }
                                else
                                {
                                    $img = asset('theme/images/4.png');
                                }
                            @endphp
                            <img id="profile_image_grid" src="{{$img}}" style="width: 250px;margin-bottom: 10px;" alt="">
                             <div style="position: absolute;top:211px;right:10px;">
                                <label class="btn btn-primary mb-0" for="profile_image">
                                    <i class="fa fa-upload" aria-hidden="true"></i>
                                </label>
                                <input id="profile_image" class="hide" type="file" name="profile_image">
                                <button type="button" id="remove_profile_image" class="btn btn-danger">
                                    <i class="fa fa-trash"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
@php
                 $passport = $no_sharing_agreement = $trade_license = $trade_license_exp_date = $marriage_certificate = $emirates_id = $visa = $bank_passbook = $poa = $emirates_id_exp_date = $passport_exp_date = $visa_exp_date= $poa_exp_date =  null;
                         if(!empty($tenant->documents))
                             {
                                 $documents =   extract_doc_keys($tenant->documents,'file_url','document_title','date_key','date_value');

                         foreach($documents as $doc)
                          {
                              if($doc['document_title']=='emirates_id')
                                  {
                                      $emirates_id              = $doc['file_url'];
                                      $emirates_id_exp_date    = $doc['date_value'];
                                  }
                               if($doc['document_title']=='passport')
                                  {
                                      $passport          = $doc['file_url'];
                                      $passport_exp_date = $doc['date_value'];
                                  }
                               if($doc['document_title']=='visa')
                                  {
                                      $visa          = $doc['file_url'];
                                      $visa_exp_date = $doc['date_value'];
                                  }

                               if($doc['document_title']=='power_of_attorney')
                                  {
                                      $poa         = $doc['file_url'];
                                      $poa_exp_date = $doc['date_value'];
                                  }
                               if($doc['document_title']=='marriage_certificate')
                                  {
                                      $marriage_certificate         = $doc['file_url'];

                                  }
                               if($doc['document_title']=='no_sharing_agreement')
                                  {
                                      $no_sharing_agreement         = $doc['file_url'];

                                  }

                                if($doc['document_title']=='bank_passbook')
                                  {
                                      $bank_passbook         = $doc['file_url'];

                                  }

                                if($doc['document_title']=='trade_license')
                                  {
                                      $trade_license         = $doc['file_url'];
                                      $trade_license_exp_date = $doc['date_value'] ? date('d-m-Y',strtotime($doc['date_value'])) : null;

                                  }
                          }
                             }
                         if(!empty($emirates_id))
                        {
                            $emirates_id = route('get.doc',base64_encode($emirates_id));
                        }
                         if(!empty($passport))
                       {
                           $passport = route('get.doc',base64_encode($passport));
                       }
                       if(!empty($visa))
                       {
                           $visa = route('get.doc',base64_encode($visa));
                       }
                       if(!empty($poa))
                       {
                           $poa = route('get.doc',base64_encode($poa));
                       }
                       if(!empty($bank_passbook))
                       {
                           $bank_passbook = route('get.doc',base64_encode($bank_passbook));
                       }
                       if(!empty($no_sharing_agreement))
                       {
                           $no_sharing_agreement = route('get.doc',base64_encode($no_sharing_agreement));
                       }
                       if(!empty($marriage_certificate))
                       {
                           $marriage_certificate = route('get.doc',base64_encode($marriage_certificate));
                       }
                @endphp
            <div class="card card-info company_extra_detail">
                <div class="card-header">
                    <h6>Company Detail</h6>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-12 col-sm-6 com-md-3 col-lg-3 col-xl-3">
                            <div class="form-group">
                               <label for="company_name">Company Name</label>
                               <div class="input-group">
                                  <div class="input-group-prepend">
                                      <span class="input-group-text">
                                          <i class="fa fa-users"></i>
                                      </span>
                                  </div>
                               <input type="text" class="form-control" name="company_name" id="company_name" value="{{$tenant->company_name}}">
                               </div>
                           </div>
                        </div>
                        <div class="col-12 col-sm-6 com-md-3 col-lg-3 col-xl-3">
                            <div class="form-group">
                               <label for="trade_licence">Trade Certificate</label>
                               <div class="input-group">
                                  <div class="input-group-prepend">
                                      <span class="input-group-text">
                                          <i class="fa fa-file" aria-hidden="true"></i>
                                      </span>
                                  </div>
                               <input type="file" class="form-control" name="trade_licence" id="trade_licence" value="">
                                   @php
                                       $trade_licence = 'javascript:void(0)';
                                        if(!empty($tenant->trade_lincense))
                                        {
                                            $trade_licence = route('get.doc',base64_encode($tenant->trade_lincense));
                                        }
                                   @endphp
                                   <div class="input-group-append">
                                       <span class="input-group-text">
                                           <a data-toggle="tooltip" title="Click to view the file" href="{{$trade_licence}}" {{($tenant->trade_lincense)?'target=_blank':''}}>
                                               <i class="fa fa-file"></i>
                                           </a>
                                       </span>
                                   </div>
                               </div>
                           </div>
                        </div>
                        <div class="col-12 col-sm-6 com-md-3 col-lg-3 col-xl-3">
                            <div class="form-group">
                               <label for="trade_license_exp_date">Trade Certificate Expiry Date</label>
                               <div class="input-group">
                                  <div class="input-group-prepend">
                                      <span class="input-group-text">
                                          <i class="fa fa-file" aria-hidden="true"></i>
                                      </span>
                                  </div>
                               <input type="text" class="form-control" name="trade_license_exp_date" id="trade_license_exp_date" value="{{$trade_license_exp_date}}">
                               </div>
                           </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card card-info">
                <div class="card-header">
                    <h6>Documents</h6>
                </div>
                <div class="card-body">
                    <div class="row">
            <div class="col-12 col-sm-6 col-md-3 col-lg-3 col-xl-3">
                 <div class="form-group">
                     <label for="emirates_id">Emirates Id </label>
                     <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text">
                                <i class="fa fa-file" aria-hidden="true"></i>
                            </span>
                        </div>
                     <input type="file" class="form-control" name="emirates_id" id="emirates_id" value="">

                         <div class="input-group-append">
                               <span class="input-group-text">
                                   <a data-toggle="tooltip" title="Click to view the file" href="{{$emirates_id ? $emirates_id : 'javascript:void(0)'}}" {{($emirates_id)?'target=_blank':''}}>
                                       <i class="fa fa-file"></i>
                                   </a>
                               </span>
                         </div>
                     </div>
                 </div>
              </div>
                 <div class="col-12 col-sm-6 col-md-3 col-lg-3 col-xl-3">
                           <div class="form-group">
                               <label for="passport">Passport</label>
                               <div class="input-group">
                                  <div class="input-group-prepend">
                                      <span class="input-group-text">
                                          <i class="fa fa-passport"></i>
                                      </span>
                                  </div>
                               <input type="file" class="form-control" name="passport" id="passport" value="">

                                   <div class="input-group-append">
                                       <span class="input-group-text">
                                           <a data-toggle="tooltip" title="Click to view the file" href="{{$passport ? $passport : 'javascript:void(0)'}}" {{($passport)?'target=_blank':''}}>
                                               <i class="fa fa-file"></i>
                                           </a>
                                       </span>
                                   </div>
                               </div>
                           </div>
                       </div>
                       <div class="col-12 col-sm-6 col-md-3 col-lg-3 col-xl-3">
                           <div class="form-group">
                               <label for="visa">Visa</label>
                               <div class="input-group">
                                  <div class="input-group-prepend">
                                      <span class="input-group-text">
                                          <i class="fab fa-cc-visa"></i>
                                      </span>
                                  </div>
                               <input type="file" class="form-control" name="visa" id="visa" value="">

                                   <div class="input-group-append">
                                       <span class="input-group-text">
                                           <a data-toggle="tooltip" title="Click to view the file" href="{{$visa ? $visa : 'javascript:void(0)'}}" {{($visa)?'target=_blank':''}}>
                                               <i class="fa fa-file"></i>
                                           </a>
                                       </span>
                                   </div>
                               </div>
                           </div>
                       </div>
                       <div class="col-12 col-sm-6 col-md-3 col-lg-3 col-xl-3">
                           <div class="form-group">
                               <label for="bank_passbook">Bank Statement</label>
                               <div class="input-group">
                                  <div class="input-group-prepend">
                                      <span class="input-group-text">
                                          <i class="fa fa-file" aria-hidden="true"></i>
                                      </span>
                                  </div>
                               <input type="file" class="form-control" name="bank_passbook" id="bank_passbook" value="">

                                   <div class="input-group-append">
                                       <span class="input-group-text">
                                           <a data-toggle="tooltip" title="Click to view the file" href="{{$bank_passbook ? $bank_passbook : 'javascript:void(0)'}}" {{($bank_passbook)?'target=_blank':''}}>
                                               <i class="fa fa-file"></i>
                                           </a>
                                       </span>
                                   </div>
                               </div>
                           </div>
                       </div>
          </div>
          <div class="row">
            <div class="col-12 col-sm-6 col-md-3 col-lg-3 col-xl-3">
                 <div class="form-group">
                     <label for="emirates_id_exp_date">Emirates Id(Expiry Date) </label>
                     <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text">
                                <i class="fa fa-file" aria-hidden="true"></i>
                            </span>
                        </div>
                     <input type="text" class="form-control" name="emirates_id_exp_date" id="emirates_id_exp_date" value="{{$emirates_id_exp_date ? date('d-m-Y',strtotime($emirates_id_exp_date)):null}}">
                     </div>
                 </div>
              </div>
                 <div class="col-12 col-sm-6 col-md-3 col-lg-3 col-xl-3">
                           <div class="form-group">
                               <label for="passport_exp_date">Passport (Expiry Date)</label>
                               <div class="input-group">
                                  <div class="input-group-prepend">
                                      <span class="input-group-text">
                                          <i class="fa fa-passport"></i>
                                      </span>
                                  </div>
                               <input type="text" class="form-control" name="passport_exp_date" id="passport_exp_date" value="{{$passport_exp_date ? date('d-m-Y',strtotime($passport_exp_date)):null}}">
                               </div>
                           </div>
                       </div>
                       <div class="col-12 col-sm-6 col-md-3 col-lg-3 col-xl-3">
                           <div class="form-group">
                               <label for="visa_exp_date">Visa (Expiry Date)</label>
                               <div class="input-group">
                                  <div class="input-group-prepend">
                                      <span class="input-group-text">
                                          <i class="fab fa-cc-visa"></i>
                                      </span>
                                  </div>
                               <input type="text" class="form-control" name="visa_exp_date" id="visa_exp_date" value="{{$visa_exp_date ? date('d-m-Y',strtotime($visa_exp_date)):null}}">
                               </div>
                           </div>
                       </div>

          </div>
                </div>
            </div>

            <div class="card card-info extra_relation_detail" {{($tenant->tenant_count>1)?'':'style=display:block'}}>
                <div class="card-header">
                    <h6 id="extra_relation_detail_title">Family Detail</h6>
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
                                <th>add/remove</th>
                            </tr>
                        </thead>
                        <tbody id="family_detail_grid">
                        @if(!empty($tenant->relations))
                          @foreach($tenant->relations as $relation)
                              @php
                                $rel_emirates_id =  $rel_passport = $rel_visa = null;
                                   if(!empty($relation->emirates_id))
                                   {
                                       $rel_emirates_id = route('get.doc',base64_encode($relation->emirates_id));
                                   }
                                   if(!empty($relation->passport))
                                   {
                                       $rel_passport = route('get.doc',base64_encode($relation->passport));
                                   }
                                   if(!empty($relation->visa))
                                   {
                                       $rel_visa = route('get.doc',base64_encode($relation->visa));
                                   }
                              @endphp
                            <tr>
                                <td><input type="hidden" name="rel_id[]" value="{{$relation->id}}"> # </td>
                                <td> <input type="text" class="form-control"  name="rel_name[]" value="{{$relation->name}}"> </td>
                                <td><input type="text" class="form-control"  name="rel_relationship[]" value="{{$relation->relationship}}"></td>
                                <td>
                                    <div class="input group">
                                        <input type="file" class="form-control"  name="rel_emirates_id[]">
                                        <div class="input-group-append">
                                           <span class="input-group-text">
                                               <a data-toggle="tooltip" title="Click to view the file"
                                                  href="{{$rel_emirates_id}}" {{($relation->emirates_id)?'target=_blank':''}}>
                                                   <i class="fa fa-file"></i>
                                               </a>
                                           </span>
                                        </div>
                                    </div>

                                </td>
                                <td>
                                    <div class="input group">
                                        <input type="file" class="form-control"  name="rel_passport[]">
                                        <div class="input-group-append">
                                           <span class="input-group-text">
                                               <a data-toggle="tooltip" title="Click to view the file"
                                                  href="{{$rel_passport}}" {{($relation->passport)?'target=_blank':''}}>
                                                   <i class="fa fa-file"></i>
                                               </a>
                                           </span>
                                        </div>
                                    </div>

                                </td>
                                <td>
                                    <div class="input group">
                                        <input type="file" class="form-control"  name="rel_visa[]">
                                        <div class="input-group-append">
                                           <span class="input-group-text">
                                               <a data-toggle="tooltip" title="Click to view the file"
                                                  href="{{$rel_visa}}" {{($relation->visa)?'target=_blank':''}}>
                                                   <i class="fa fa-file"></i>
                                               </a>
                                           </span>
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    <a class="btn-sm btn-success text-white add_more_family_member"><i class="fa fa-plus"></i></a>
                                    <a class="btn-sm btn-danger text-white"><i class="fa fa-times"></i></a>
                                </td>
                            </tr>
                          @endforeach
                        @else
                        <tr>
                              <td><input type="hidden" name="rel_id[]" value=""> #</td>
                              <td><input type="text" class="form-control" name="rel_name[]" value=""></td>
                              <td><input type="text" class="form-control" name="rel_relationship[]" value=""></td>
                              <td><input type="file" class="form-control" name="rel_emirates_id[]"></td>
                              <td><input type="file" class="form-control" name="rel_passport[]"></td>
                              <td><input type="file" class="form-control" name="rel_visa[]"></td>
                              <td>
                                  <a class="btn-sm btn-success text-white add_more_family_member"><i
                                          class="fa fa-plus"></i></a>
                                  <a class="btn-sm btn-danger text-white"><i class="fa fa-times"></i></a>
                              </td>
                          </tr>
                            @endif
                        </tbody>
                    </table>
                </div>
                </div>
            </div>

            <div class="card card-info">
                <div class="card-header">
                    <h6>Extra Detail</h6>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-12 col-sm-6 col-md-3 col-lg-3 col-xl-3 bachelor_extra_detail">
                           <div class="form-group">
                               <label for="no_sharing_agreement">No sharing agreement</label>
                               <div class="input-group">
                                  <div class="input-group-prepend">
                                      <span class="input-group-text">
                                          <i class="fa fa-file" aria-hidden="true"></i>
                                      </span>
                                  </div>
                               <input type="file" class="form-control" name="no_sharing_agreement" id="no_sharing_agreement" value="">

                                   <div class="input-group-append">
                                       <span class="input-group-text">
                                           <a data-toggle="tooltip" title="Click to view the file"
                                              href="{{$no_sharing_agreement}}" {{($no_sharing_agreement)?'target=_blank':''}}>
                                               <i class="fa fa-file"></i>
                                           </a>
                                       </span>
                                   </div>
                               </div>
                           </div>
                       </div>
                       <div class="col-12 col-sm-6 col-md-3 col-lg-3 col-xl-3 family_hs_extra_detail">
                           <div class="form-group">
                               <label for="marriage_certificate">Marriage Certificate</label>
                               <div class="input-group">
                                  <div class="input-group-prepend">
                                      <span class="input-group-text">
                                          <i class="fa fa-file" aria-hidden="true"></i>
                                      </span>
                                  </div>
                               <input type="file" class="form-control" name="marriage_certificate" id="marriage_certificate" value="">
                                   <div class="input-group-append">
                                       <span class="input-group-text">
                                           <a data-toggle="tooltip" title="Click to view the file"
                                              href="{{$marriage_certificate}}" {{($marriage_certificate)?'target=_blank':''}}>
                                               <i class="fa fa-file"></i>
                                           </a>
                                       </span>
                                   </div>
                               </div>
                           </div>
                       </div>
                    </div>
                </div>
            </div>
                <div class="form-group text-right">
                    <button class="btn btn-primary">Save</button>
                </div>
        {{Form::close()}}
        </div>
    </div>
@endsection
 @section('head')
    <link rel="stylesheet" href="{{asset('plugin/datetimepicker/css/gijgo.min.css')}}">
@endsection
@section('js')
<script src="{{asset('assets/plugins/inputmask/jquery.inputmask.bundle.js')}}"></script>
<script src="{{asset('plugin/datetimepicker/js/gijgo.min.js')}}"></script>
@endsection
@section('script')
<script>
    $(document).ready(function(){


        function applied_class_hide(elements)
        {
            elements.forEach(function(item){
                $(`.${item}`).hide();
            });

        }
        function applied_class_show(elements)
        {
            elements.forEach(function(item){
                $(`.${item}`).show();
            });
        }
     $("#dob").datepicker({ footer: true, modal: true,format: 'dd-mm-yyyy', maxDate : '{{now()->addYears(18)->format('d-m-Y')}}', value : '{{now()->addYear(-18)->format('d-m-Y')}}'});
     let pickers =
               [
                   'emirates_id_exp_date',
                   'visa_exp_date',
                   'passport_exp_date',
                   'bank_passbook_exp_date',
               ];
           pickers.forEach(function(item){
               $(`#${item}`).datepicker({ footer: true, modal: true,format: 'dd-mm-yyyy'/*, minDate : '{{now()->format('d-m-Y')}}'*/});
           });
		$("#tenant_type").on('change',function(e){
		    $("#family_detail_grid").html('');
			if(!$.trim($("#tenant_type").val()).length)
			{
				toast('error','Please select tenant type','bottom-right');
				$("#tenant_type").css({'border-color':'aqua'}).focus();
			}
			else
			{
				let tenant_type = $("#tenant_type").val();
				$("#tenant_count").val('').prop({readonly:false});
				display(tenant_type);

			}
		})
        function display(tenant_type)
        {
            switch(tenant_type)
				{
					case 'family_husband_wife':
						applied_class_show(['family_hs_extra_detail','extra_relation_detail']);
						applied_class_hide(['company_extra_detail','bachelor_extra_detail']);
						$("#extra_relation_detail_title").text("Family Detail");
					break;
					case 'family_brother_sister':
						applied_class_show(['extra_relation_detail']);
						applied_class_hide(['family_hs_extra_detail','company_extra_detail','bachelor_extra_detail']);
						$("#extra_relation_detail_title").text("Family Detail");
					break;
					case 'company':

						applied_class_show(['extra_relation_detail','company_extra_detail']);
						applied_class_hide(['family_hs_extra_detail','bachelor_extra_detail']);
						$("#extra_relation_detail_title").text("Employees Detail");
					break;
					case 'bachelor':
						applied_class_show(['bachelor_extra_detail']);
						applied_class_hide(['family_hs_extra_detail','extra_relation_detail','company_extra_detail']);
						$("#tenant_count").val(1).prop({readonly:true});
					break;
					default:
						applied_class_show(['bachelor_extra_detail']);
						applied_class_show(['family_hs_extra_detail','extra_relation_detail','company_extra_detail','bachelor_extra_detail']);
					break;

				}
        }
     $('#edit_data_form').on("submit",function(e){
	  e.preventDefault();

      let params = new FormData($(this)[0]);
      let url    = '{{route('tenant.update',['id'=>$tenant->id])}}';
      function fn_success(result)
      {
          toast('success', result.message, 'bottom-right');
          window.location.href = result.next_url;

      }
      function fn_error(result)
      {
             if(result.response==='validation_error')
            {
                toast('error', result.message, 'bottom-right');
            }
            else
            {
                  toast('error', result.message, 'bottom-right');
            }
      }
    $.fn_ajax_multipart(url,params,fn_success,fn_error);
  });
  function render_family_detail_form()
{
	let str = `<tr><td>#</td>
    <td> <input type="text" class="form-control" name="rel_name[]" value=""> </td>
    <td><input type="text" class="form-control" name="rel_relationship[]" value=""></td>
    <td><input type="file" class="form-control" name="rel_emirates_id[]"></td>
    <td><input type="file" class="form-control" name="rel_passport[]"></td>
    <td><input type="file" class="form-control" name="rel_visa[]"></td>
    <td>
        <a class="btn-sm btn-success text-white add_more_family_member"><i class="fa fa-plus"></i></a>
        <a class="btn-sm btn-danger text-white remove_tr"><i class="fa fa-times"></i></a>
    </td>
</tr>`;
		let html = $($.parseHTML(str));
		$("#family_detail_grid").append(html);

}

$("#tenant_count").on("change",function(){
    $("#family_detail_grid").html('');
     let counter = $("#tenant_count").val();
    if(counter>1)
    {
        for(i=0;i<(counter-1);i++)
        {
            render_family_detail_form();
        }
    }
});
$(document).on('click','.add_more_family_member',function(e){
    e.preventDefault();
    render_family_detail_form();
});
$(document).on('click','.remove_tr',function(e){
    e.preventDefault();
    $(this).closest('tr').remove();
});
function render_image(input)
  {
    if(input.files && input.files[0])
	{
      let reader = new FileReader();
      reader.onload = function (e) {
        $('#profile_image_grid').attr('src', e.target.result);
      }
      reader.readAsDataURL(input.files[0]);
    }
  }
  $("#profile_image").change(function(){
    render_image(this);
  });
  $("#remove_profile_image").click(function(){
    $('#profile_image_grid').attr('src', '/theme/images/4.png');
    let file = document.getElementById("profile_image");
    file.value = file.defaultValue;
  });
   $("#profile_image_grid").on('click',function(){
      $("#profile_image").click();
  });

   display('{{$tenant->tenant_type}}');
    });
</script>
@endsection
