@extends('admin.layout.app')
@section('breadcrumb')
<div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h4 class="m-0 text-dark">Edit Property Agent (Company)</h4>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}">Home</a></li>
                <li class="breadcrumb-item"><a href="{{route('agent.index')}}">Agents</a></li>
              <li class="breadcrumb-item active">Add property Agent</li>
            </ol>
          </div>
        </div>
      </div>
    </div>
@endsection
@section('content')
 <div class="card">
     <div class="card-body">
         {{Form::open(['route'=>'owner.store','id'=>'edit_data_form'])}}
         <input type="hidden" name="id" value="{{$agent->id}}">
          <div class="card card-info">
              <div class="card-header">
                 <h4>Company Detail</h4>
              </div>
              <div class="card-body">
                  <div class="row">
            <div class="col-sm-6 col-md-8 row">
                <div class="col-sm-12 col-md-4 col-lg-4 col-xl-4">
                            <div class="form-group">
                                <label for="owner_type">Agent Type</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="fas fa-user"></i></span>
                                    </div>
                                    <select   class="form-control" name="agent_type" id="agent_type" disabled>
                                        <option value="">Owner Type</option>
                                        <option value="individual">individual</option>
                                        <option value="company" selected>Company</option>
                                    </select>
                                    <input type="hidden" name="agent_type" value="company">
                                </div>
                            </div>
                        </div>
                <div class="form-group col-md-8">
                    <label for="name">Company Name</label>
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fas fa-user"></i></span>
                        </div>
                        <input type="text" class="form-control" name="name" id="name" value="{{$agent->name}}">
                    </div>
                </div>

                <div class="form-group col-md-6">
                    <label for="mobile">Telephone Number</label>
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text">
                             <select name="country_code" id="country_code">
                                    @foreach($countries as $country)
                                        @php $selected = ($country->cod===$agent->country_code)?"selected":null; @endphp
                                        <option value="{{$country->code}}" {{$selected}}>+{{$country->code}}</option>
                                    @endforeach
                                </select>
                            </span>
                        </div>
                        <input type="text" class="form-control numeric" name="mobile" id="mobile" value="{{$agent->mobile}}">
                    </div>
                </div>
                <div class="form-group col-md-6">
                    <label for="email">Email</label>
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fas fa-envelope-square"></i></span>
                        </div>
                        <input type="text" class="form-control" name="email" id="email" value="{{$agent->email}}" data-inputmask="'alias': 'email'" inputmode="email" data-mask="">
                    </div>
                </div>
                <div class="form-group col-md-6">
                    <label for="password">Password</label>
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fas fa-unlock-alt"></i></span>
                        </div>
                        <input type="text" class="form-control" name="password" id="password" value="">
                    </div>
                </div>
                <div class="form-group col-md-6">
                    <label for="license_expiry_date">License Expiry Date</label>
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fas fa-unlock-alt"></i></span>
                        </div>
                        <input type="text" class="form-control" name="license_expiry_date" id="license_expiry_date" value="{{$agent->license_expiry_date? date('d-m-Y',strtotime($agent->license_expiry_date)): null}}">
                    </div>
                </div>
                <div class="form-group col-md-12">
                    <label for="address">Company Address</label>
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fas fa-unlock-alt"></i></span>
                        </div>
                        <textarea rows="3" type="text" class="form-control" name="address" id="address">
                            {{$agent->address}}
                        </textarea>
                    </div>
                </div>
            </div>
            <div class="col-sm-6 col-md-4">
                <div class="text-center">
                  <div class="user_photo">
                       @php
                         if(!empty($agent->photo))
                         {
                             $img = route('get.doc',base64_encode($agent->photo));
                         }
                         else
                         {
                             $img = asset('theme/images/4.png');
                         }
                      @endphp
                    <img id="profile_image_grid" src="{{$img}}" style="width:250px;margin-bottom:10px;" alt="">
                    <div style="position:absolute;top:211px;right:72px;">
                      <label class="btn btn-primary mb-0" for="profile_image">
                          <i class="fa fa-upload"></i>
                      </label>
                      <input id="profile_image" class="hide" type="file" name="photo">
                      <button type="button" id="remove_profile_image" class="btn btn-danger font-weight-bold">
                          <i class="fa fa-trash"></i>
                      </button>
                    </div>
                  </div>
                </div>
            </div>
        </div>
              </div>
          </div>

          <div class="card card-info">
              <div class="card-header">
                 <h4>Owner Detail</h4>
              </div>
              <div class="card-body">
                  <div class="row">
            <div class="col-sm-6 col-md-8 row">
                <div class="form-group col-md-12">
                    <label for="owner_name">Owner Name</label>
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fas fa-user"></i></span>
                        </div>
                        <input type="text" class="form-control" name="owner_name" id="owner_name" value="{{$agent->owner_name}}">
                    </div>
                </div>
                <div class="form-group position-relative col-md-6">
                    <label>Country Code Number</label>
                    <select name="country_code" class="form-control" class="phone_code">
                        @foreach($countries as $country)
                            @php $selected = ($country->code==$agent->owner_country_code) ? "selected":"";@endphp
                          <option value="{{$country->code}}" {{$selected}}>+{{$country->code}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group col-md-6">
                    <label for="owner_mobile">Telephone Number</label>
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fas fa-phone"></i></span>
                        </div>
                        <input type="text" class="form-control numeric" name="owner_mobile" id="owner_mobile" value="{{$agent->owner_mobile}}">
                    </div>
                </div>
                <div class="form-group col-md-6">
                    <label for="owner_email">Email</label>
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fas fa-envelope-square"></i></span>
                        </div>
                        <input type="text" class="form-control" name="owner_email" id="owner_email" value="{{$agent->owner_email}}" data-inputmask="'alias': 'email'" inputmode="email" data-mask="">
                    </div>
                </div>
            </div>
            <div class="col-sm-6 col-md-4">
                <div class="text-center">
                  <div class="user_photo">
                       @php
                         if(!empty($agent->owner_photo))
                         {
                             $img = route('get.doc',base64_encode($agent->owner_photo));
                         }
                         else
                         {
                             $img = asset('theme/images/4.png');
                         }
                      @endphp
                    <img id="owner_profile_image_grid" src="{{$img}}" style="width:250px;margin-bottom:10px;" alt="">
                      <div style="position:absolute;top:211px;right:72px;">
                          <label class="btn btn-primary mb-0" for="owner_profile_image">
                              <i class="fa fa-upload"></i>
                          </label>
                          <input id="owner_profile_image" class="hide" type="file" name="owner_photo">
                          <button type="button" id="remove_owner_profile_image" class="btn btn-danger font-weight-bold">
                              <i class="fa fa-trash"></i>
                          </button>
                      </div>
                  </div>
                </div>
            </div>
        </div>
  <div class="row mt-2">
      <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
          <div class="card card-warning">
              <div class="card-header">
                  <h6 class="text-white">Documents</h6>
              </div>
              <div class="card-body">
                  <div class="row">
                      <div class="col-12 col-sm-6 col-md-3 col-lg-3 col-xl-3">
                          <div class="form-group">
                              <label for="emirates_id_doc">Emirates Id</label>
                              <div class="input-group">
                                  <div class="input-group-prepend">
                                    <span class="input-group-text">
                                    <i class="fa fa-passport"></i>
                                    </span>
                                  </div>
                                  @php
                                      $emirates_id_doc =   'javascript:void(0)';
                                       if(!empty($agent->emirates_id_doc))
                                       {
                                           $emirates_id_doc = route('get.doc',base64_encode($agent->emirates_id_doc));
                                       }
                                  @endphp
                                  <input type="file" class="form-control" name="emirates_id_doc"
                                         id="emirates_id_doc" value="">
                                  @if(!empty($agent->emirates_id_doc))
                                     <div class="input-group-append" data-toggle="tooltip" title="click to view file">
                                         <div class="input-group-text">
                                             <a href="{{$emirates_id_doc}}" target="{{($agent->emirates_id_doc)?'_blank':'#'}}">
                                                 <i class="fa fa-file"></i>
                                             </a>
                                         </div>
                                     </div>
                                 @endif
                              </div>
                          </div>
                      </div>
                      <div class="col-12 col-sm-6 col-md-3 col-lg-3 col-xl-3">
                          <div class="form-group">
                              <label for="passport">Passport </label>
                              <div class="input-group">
                                  <div class="input-group-prepend">
                                    <span class="input-group-text">
                                    <i class="fa fa-passport"></i>
                                    </span>
                                  </div>
                                  @php
                                      $passport =   'javascript:void(0)';
                                       if(!empty($agent->passport))
                                       {
                                           $passport = route('get.doc',base64_encode($agent->passport));
                                       }
                                  @endphp
                                  <input type="file" class="form-control" name="passport" id="passport" value="">
                                  @if(!empty($agent->passport))
                                     <div class="input-group-append" data-toggle="tooltip" title="click to view file">
                                         <div class="input-group-text">
                                             <a href="{{$passport}}" target="{{($agent->passport)?'_blank':'#'}}">
                                                 <i class="fa fa-file"></i>
                                             </a>
                                         </div>
                                     </div>
                                 @endif
                              </div>
                          </div>
                      </div>
                      <div class="col-12 col-sm-6 col-md-3 col-lg-3 col-xl-3">
                          <div class="form-group">
                              <label for="visa">Visa </label>
                              <div class="input-group">
                                  <div class="input-group-prepend">
                                    <span class="input-group-text">
                                    <i class="fab fa-cc-visa"></i>
                                    </span>
                                  </div>
                                  <input type="file" class="form-control" name="visa" id="visa"
                                         value="">
                              </div>
                          </div>
                      </div>
                  </div>
                  <div class="row">
                      <div class="col-12 col-sm-6 col-md-3 col-lg-3 col-xl-3">
                          <div class="form-group">
                              <label for="emirates_exp_date">Emirates Id </label>
                              <div class="input-group">
                                  <div class="input-group-prepend">
                                    <span class="input-group-text">
                                    <i class="fa fa-passport"></i>
                                    </span>
                                  </div>
                                  <input type="text" class="form-control" name="emirates_exp_date"
                                         id="emirates_exp_date" value="">
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
                                  <input type="text" class="form-control" name="passport_exp_date"
                                         id="passport_exp_date" value="">
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
                                  <input type="text" class="form-control" name="visa_exp_date"
                                         id="visa_exp_date" value="">
                              </div>
                          </div>
                      </div>
                  </div>
              </div>
          </div>
      </div>
</div>
</div>
</div>

         <div class="card card-info">
             <div class="card-header">
                 <div class="row">
                     <div class="col">
                         <h6> Authorized Person Detail</h6>
                     </div>
                     <div class="col text-right">
                         <button type="button" class="btn btn-info">
                         <span class="icheck icheck-success">
                                 <input type="checkbox" id="authorised_person_required"  name="authorised_person_required" {{$agent->authorised_person? "checked":null}}>
                                 <label for="authorised_person_required" id="add_auth_person_detail_btn" data-toggle="collapse" data-target="#auth_person_detail" aria-expanded="false" aria-controls="auth_person_detail">
                                     Add Authorised person
                                 </label>
                             </span>
                         </button>
                     </div>
                 </div>
             </div>
             <div class="collapse card-body {{$agent->authorised_person? "show":null}}" id="auth_person_detail">
                 <div class="row">
                     <div class="col-12 col-sm-12 col-md-8 col-lg-8 col-xl-8">
                         <div class="row">
                             <div class="col-12 col-sm-6 col-md-6 col-lg-6 col-xl-6">
                                 <div class="form-group">
                                     <label for="auth_person_name">Name</label>
                                     <div class="input-group">
                                         <div class="input-group-prepend">
                                             <span class="input-group-text"><i class="fas fa-user"></i></span>
                                         </div>
                                         <input type="text" class="form-control" name="auth_person_name" id="auth_person_name" value="{{($agent->authorised_person)?$agent->authorised_person->name:null}}">
                                     </div>
                                 </div>
                             </div>
                             <div class="col-12 col-sm-6 col-md-6 col-lg-6 col-xl-6">
                               <div class="form-group">
                                     <label for="auth_person_designation">Designation/Relation</label>
                                     <div class="input-group">
                                         <div class="input-group-prepend">
                                             <span class="input-group-text"><i class="fas fa-user"></i></span>
                                         </div>
                                         <input type="text" class="form-control" name="auth_person_designation" id="auth_person_designation" value="{{($agent->authorised_person)?$agent->authorised_person->designation:null}}">
                                     </div>
                                 </div>
                             </div>
                         </div>
                         <div class="row">

                             <div class="col-12 col-sm-6 col-md-6 col-lg-6 col-xl-6">
                                 <div class="form-group">
                                     <label for="auth_person_mobile">Mobile</label>
                                     <div class="input-group">
                                         <div class="input-group-prepend">
                                             <span class="input-group-text">
                                                 <select name="auth_person_country_code" id="auth_person_country_code">
                                                    <option value="">Select</option>
                                                     @foreach($countries as $country)
                                                         @if(!empty($agent->authorised_person->auth_person_country_code))
                                                         @php $selected = ($country->code==$agent->authorised_person->auth_person_country_code)?'selected':''; @endphp
                                                         @else
                                                             @php $selected = ($country->code==971)?'selected':''; @endphp
                                                         @endif
                                                         <option
                                                             value="{{$country->code}}" {{$selected}}>{{$country->code}}</option>
                                                     @endforeach
                                               </select>
                                             </span>
                                         </div>
                         <input type="text" class="form-control numeric" name="auth_person_mobile" id="auth_person_mobile" value="{{($agent->authorised_person)?$agent->authorised_person->mobile:null}}">
                                     </div>
                                 </div>
                             </div>
                             <div class="col-12 col-sm-6 col-md-6 col-lg-6 col-xl-6">
                                 <div class="form-group">
                                     <label for="auth_person_email">Email</label>
                                     <div class="input-group">
                                         <div class="input-group-prepend">
                                             <span class="input-group-text"><i
                                                     class="fas fa-envelope-square"></i></span>
                                         </div>
                                         <input type="text" class="form-control" name="auth_person_email" id="auth_person_email" value="{{($agent->authorised_person)?$agent->authorised_person->email:null}}"
                                                data-inputmask="'alias': 'email'" inputmode="email" data-mask="">
                                     </div>
                                 </div>
                             </div>
                         </div>
                     </div>
                     <div class="col-12 col-sm-12 col-md-4 col-lg-4 col-xl-4">
                         <div class="text-center">
                             <div class="user_photo">
                                 @php
                                     if(!empty($agent->authorised_person->photo))
                                     {
                                         $img_auth = route('get.doc',base64_encode($agent->authorised_person->photo));
                                     }
                                     else
                                     {
                                         $img_auth = asset('theme/images/4.png');
                                     }
                                 @endphp
                                 <img id="auth_person_image_grid" src="{{$img_auth}}" style="width:250px;margin-bottom:10px;" alt="">
                                 <div style="position:absolute;top:211px;right:72px;">
                                     <label class="btn btn-primary mb-0" for="auth_person_image">
                                         <i class="fa fa-upload"></i>
                                     </label>
                                     <input id="auth_person_image" class="hide" type="file" name="auth_person_image">
                                     <button type="button" id="remove_auth_person_image" class="btn btn-danger text-white">
                                         <i class="fa fa-trash"></i>
                                     </button>
                                 </div>
                             </div>
                         </div>
                     </div>
                 </div>
                 <div class="card card-warning my-2">
            <div class="card-header">
                <h6 class="text-white">Documents</h6>
            </div>
            <div class="card-body">
                @php
                       $auth_emirates_id = $auth_emirates_id_exp_date = $auth_passport = $auth_passport_exp_date = $auth_visa = $auth_visa_exp_date = $auth_poa =  $auth_poa_exp_date = null;
                    if(!$agent->authorised_person->documents->isEmpty())
                        {
                            $documents =   extract_doc_keys($agent->authorised_person->documents,'file_url','document_title','date_key','date_value');
                            foreach($documents as $doc)
                          {
                              if($doc['document_title']=='auth_person_emirates_id_doc')
                                  {
                                      $auth_emirates_id           = $doc['file_url'];
                                      $auth_emirates_id_exp_date   = $doc['date_value'] ? date("d-m-Y",strtotime($doc['date_value'])) : null;
                                  }
                               if($doc['document_title']=='auth_person_passport')
                                  {
                                      $auth_passport          = $doc['file_url'];
                                      $auth_passport_exp_date = $doc['date_value'] ? date("d-m-Y",strtotime($doc['date_value'])) : null;
                                  }
                               if($doc['document_title']=='auth_person_visa')
                                  {
                                      $auth_visa          = $doc['file_url'];
                                      $auth_visa_exp_date = $doc['date_value'] ? date("d-m-Y",strtotime($doc['date_value'])) : null;
                                  }

                               if($doc['document_title']=='auth_person_power_of_attorney')
                                  {
                                      $auth_poa         = $doc['file_url'];
                                      $auth_poa_exp_date = $doc['date_value'] ? date("d-m-Y",strtotime($doc['date_value'])) : null;
                                  }
                          }
                        }
                       if(!empty($auth_emirates_id))
                       {
                           $auth_emirates_id = route('get.doc',base64_encode($auth_emirates_id));
                       }
                       if(!empty($auth_passport))
                       {
                           $auth_passport = route('get.doc',base64_encode($auth_passport));
                       }
                       if(!empty($auth_visa))
                       {
                           $auth_visa = route('get.doc',base64_encode($auth_visa));
                       }
                       if(!empty($auth_poa))
                       {
                           $auth_poa = route('get.doc',base64_encode($auth_poa));
                       }
                     @endphp
          <div class="row">
            <div class="col-12 col-sm-6 col-md-3 col-lg-3 col-xl-3">
                 <div class="form-group">
                     <label for="auth_person_emirates_id_doc">Emirates Id(scanned copy) </label>
                     <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text">
                                <i class="fa fa-passport"></i>
                            </span>
                        </div>
                     <input type="file" class="form-control" name="auth_person_emirates_id_doc" id="auth_person_emirates_id_doc" value="">
                         @if(!empty($auth_emirates_id))
                             <div class="input-group-append" data-toggle="tooltip" title="click to view file">
                                 <div class="input-group-text">
                                     <a href="{{$auth_emirates_id}}" target="{{($auth_emirates_id)?'_blank':'#'}}">
                                         <i class="fa fa-file"></i>
                                     </a>
                                 </div>
                             </div>
                         @endif
                     </div>
                 </div>
              </div>
                 <div class="col-12 col-sm-6 col-md-3 col-lg-3 col-xl-3">
                           <div class="form-group">
                               <label for="auth_person_passport">Passport (scanned copy)</label>
                               <div class="input-group">
                                  <div class="input-group-prepend">
                                      <span class="input-group-text">
                                          <i class="fa fa-passport"></i>
                                      </span>
                                  </div>
                               <input type="file" class="form-control" name="auth_person_passport" id="auth_person_passport" value="">
                                   @if(!empty($auth_passport))
                                       <div class="input-group-append" data-toggle="tooltip" title="click to view file">
                                           <div class="input-group-text">
                                               <a href="{{$auth_passport}}" target="{{($auth_passport)?'_blank':'#'}}">
                                                   <i class="fa fa-file"></i>
                                               </a>
                                           </div>
                                       </div>
                                   @endif
                               </div>
                           </div>
                       </div>
                       <div class="col-12 col-sm-6 col-md-3 col-lg-3 col-xl-3">
                           <div class="form-group">
                               <label for="auth_person_visa">Visa (scanned copy)</label>
                               <div class="input-group">
                                  <div class="input-group-prepend">
                                      <span class="input-group-text">
                                          <i class="fab fa-cc-visa"></i>
                                      </span>
                                  </div>
                               <input type="file" class="form-control" name="auth_person_visa" id="auth_person_visa" value="">
                                   @if(!empty($auth_visa))
                                       <div class="input-group-append" data-toggle="tooltip" title="click to view file">
                                           <div class="input-group-text">
                                               <a href="{{$auth_visa}}" target="{{($auth_visa)?'_blank':'#'}}">
                                                   <i class="fa fa-file"></i>
                                               </a>
                                           </div>
                                       </div>
                                   @endif
                               </div>
                           </div>
                       </div>
                       <div class="col-12 col-sm-6 col-md-3 col-lg-3 col-xl-3">
                           <div class="form-group">
                               <label for="auth_person_power_of_attorney">Power Of Attorney (scanned copy)</label>
                               <div class="input-group">
                                  <div class="input-group-prepend">
                                      <span class="input-group-text">
                                          <i class="fab fa-cc-visa"></i>
                                      </span>
                                  </div>
                               <input type="file" class="form-control" name="auth_person_power_of_attorney" id="auth_person_power_of_attorney" value="">
                                   @if(!empty($auth_poa))
                                       <div class="input-group-append" data-toggle="tooltip" title="click to view file">
                                           <div class="input-group-text">
                                               <a href="{{$auth_poa}}" target="{{($auth_poa)?'_blank':'#'}}">
                                                   <i class="fa fa-file"></i>
                                               </a>
                                           </div>
                                       </div>
                                   @endif
                               </div>
                           </div>
                       </div>
          </div>
          <div class="row">
            <div class="col-12 col-sm-6 col-md-3 col-lg-3 col-xl-3">
                 <div class="form-group">
                     <label for="auth_person_emirates_exp_date">Emirates Id(Expiry Date) </label>
                     <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text">
                                <i class="fa fa-passport"></i>
                            </span>
                        </div>
                     <input type="text" class="form-control" name="auth_person_emirates_exp_date" id="auth_person_emirates_exp_date" value="{{$auth_emirates_id_exp_date}}">
                     </div>
                 </div>
              </div>
                 <div class="col-12 col-sm-6 col-md-3 col-lg-3 col-xl-3">
                           <div class="form-group">
                               <label for="auth_person_passport_exp_date">Passport (Expiry Date)</label>
                               <div class="input-group">
                                  <div class="input-group-prepend">
                                      <span class="input-group-text">
                                          <i class="fa fa-passport"></i>
                                      </span>
                                  </div>
                               <input type="text" class="form-control" name="auth_person_passport_exp_date" id="auth_person_passport_exp_date" value="{{$auth_passport_exp_date}}">
                               </div>
                           </div>
                       </div>
                       <div class="col-12 col-sm-6 col-md-3 col-lg-3 col-xl-3">
                           <div class="form-group">
                               <label for="auth_person_visa_exp_date">Visa (Expiry Date)</label>
                               <div class="input-group">
                                  <div class="input-group-prepend">
                                      <span class="input-group-text">
                                          <i class="fab fa-cc-visa"></i>
                                      </span>
                                  </div>
                               <input type="text" class="form-control" name="auth_person_visa_exp_date" id="auth_person_visa_exp_date" value="{{$auth_visa_exp_date}}">
                               </div>
                           </div>
                       </div>
                       <div class="col-12 col-sm-6 col-md-3 col-lg-3 col-xl-3">
                           <div class="form-group">
                               <label for="auth_poa_exp_date">Power Of Attorney (Expiry Date)</label>
                               <div class="input-group">
                                  <div class="input-group-prepend">
                                      <span class="input-group-text">
                                          <i class="fab fa-cc-visa"></i>
                                      </span>
                                  </div>
                               <input type="text" class="form-control" name="auth_poa_exp_date" id="auth_poa_exp_date" value="{{$auth_poa_exp_date}}">
                               </div>
                           </div>
                       </div>
          </div>
            </div>
        </div>
             </div>
         </div>


        <div class="card card-info">
            <div class="card-header">
                <h4 class="card-title">Account Detail</h4>
            </div>
            <div class="card-body">

        <div class="row">
            <div class="form-group col-md-4">
              <label for="banking_name">Account Holder Name</label>
              <div class="input-group">
                  <div class="input-group-prepend">
                      <span class="input-group-text"><i class="fas fa-user"></i></span>
                  </div>
                  <input type="text" class="form-control" name="banking_name" id="banking_name" value="{{$agent->banking_name}}">
              </div>
          </div>
          <div class="form-group col-md-4">
              <label for="bank_name">Bank Name</label>
              <div class="input-group">
                  <div class="input-group-prepend">
                      <span class="input-group-text"><i class="fas fa-money-check-alt"></i></span>
                  </div>
                  <input type="text" class="form-control" name="bank_name" id="bank_name" value="{{$agent->bank_name}}">
              </div>
          </div>
            <div class="col-md-4"></div>
          <div class="form-group col-md-4">
              <label for="bank_swift_code">Bank Swift Code</label>
              <div class="input-group">
                  <div class="input-group-prepend">
                      <span class="input-group-text"><i class="fas fa-sort-numeric-up"></i></span>
                  </div>
                  <input type="text" class="form-control" name="bank_swift_code" id="bank_swift_code" value="{{$agent->bank_swift_code}}">
              </div>
          </div>

          <div class="form-group col-md-4">
              <label for="bank_account">A/C Number</label>
              <div class="input-group">
                  <div class="input-group-prepend">
                      <span class="input-group-text"><i class="fas fa-file-invoice-dollar"></i></span>
                  </div>
                  <input type="text" class="form-control" name="bank_account" id="bank_account" value="{{$agent->bank_account}}">
              </div>
          </div>

        </div>
            </div>
        </div>
        <div class="card card-info">
            <div class="card-header">
                <h4 class="card-title">Billing Address</h4>
            </div>
            <div class="card-body">

        <div class="row">
          <div class="form-group col-md-4">
              <label for="country_id">Country</label>
              <div class="input-group">
                  <div class="input-group-prepend">
                      <span class="input-group-text"><i class="fas fa-flag"></i></span>
                  </div>
                  <select class="form-control" name="country_id" id="country_id">
                      <option value="">Select Country</option>
                      @foreach($countries as $country)
                          @php $selected = ($country->id==$agent->country_id)?"selected":null; @endphp
                          <option value="{{$country->id}}" {{$selected}}>{{$country->name}}</option>
                      @endforeach
                  </select>
              </div>
          </div>
          <div class="form-group col-md-4">
              <label for="state_id">Emirates/State</label>
              <div class="input-group">
                  <div class="input-group-prepend">
                      <span class="input-group-text"><i class="fas fa-map-marker"></i></span>
                  </div>
                  <select  class="form-control" name="state_id" id="state_id">
                      @foreach($states as $state)
                          @php $selected = ($state->id==$agent->state_id)?"selected":null; @endphp
                          <option value="{{$state->id}}" {{$selected}}>{{$state->name}}</option>
                      @endforeach
                  </select>
              </div>
          </div>
          <div class="col-md-4"></div>
          <div class="form-group col-md-4">
              <label for="city_id">City</label>
              <div class="input-group">
                  <div class="input-group-prepend">
                      <span class="input-group-text"><i class="fas fa-city"></i></span>
                  </div>
                  <select  class="form-control" name="city_id" id="city_id">
                      @foreach($cities as $city)
                          @php $selected = ($city->id==$agent->city_id)?"selected":null; @endphp
                          <option value="{{$city->id}}" {{$selected}}>{{$city->name}}</option>
                      @endforeach
                  </select>
              </div>
          </div>
        </div>
            </div>
        </div>

         <div class="card card-info">
             <div class="card-header">
                 <h4 class="card-title">Documents</h4>
             </div>
             <div class="card-body">
                 <div class="table-responsive">
                     <table class="table">
                         <thead class="bg-warning">
                         <tr>
                             <th>Document Type</th>
                             <th>Upload Document</th>
                         </tr>
                         </thead>
                         <tbody>
                          <tr>
                              <td>
                                  <input type="text" class="form-control" value="trade-license" readonly>
                              </td>
                              <td>
                                  <input type="file" name="trade_license" class="form-control">
                              </td>
                          </tr>
                          <tr>
                              <td>
                                  <input type="text" class="form-control" value="vat-number" readonly>
                              </td>
                              <td>
                                  <input type="file" name="vat_number" class="form-control">
                              </td>
                          </tr>
                         </tbody>
                     </table>
                 </div>
             </div>
         </div>
        <div class="row">
            <div class="col-md-12">
                <button class="btn btn-success float-right" type="submit">Save</button>
            </div>
        </div>
        {{Form::close()}}
     </div>
 </div>
@endsection
 @section('head')
    <link rel="stylesheet" href="{{asset('plugin/datetimepicker/css/gijgo.min.css')}}">
     <link rel="stylesheet" href="{{asset('assets/plugins/icheck-bootstrap/icheck-bootstrap.min.css')}}">
@endsection
@section('js')
<script src="{{asset('assets/plugins/inputmask/jquery.inputmask.bundle.js')}}"></script>
<script src="{{asset('plugin/datetimepicker/js/gijgo.min.js')}}"></script>
@endsection
@section('script')
  <script>
       $(document).ready(function(){

           let pickers =
               [
                   'emirates_exp_date',
                   'visa_exp_date',
                   'passport_exp_date',
                   'license_expiry_date',
               ];
           pickers.forEach(function(item){
               $(`#${item}`).datepicker({ footer: true, modal: true,format: 'dd-mm-yyyy', minDate : '{{now()->format('d-m-Y')}}'});
           });

           $('[data-mask]').inputmask();

           function render_image(input,element)
            {
                if(input.files && input.files[0])
                {
                let reader = new FileReader();
                reader.onload = function (e) {
                    $(`#${element}`).attr('src', e.target.result);
                }
                reader.readAsDataURL(input.files[0]);
                }
            }
            $("#profile_image").change(function(){
                render_image(this,'profile_image_grid');
            });
            $("#owner_profile_image").change(function(){
                render_image(this,'owner_profile_image_grid');
            });
            $("#remove_profile_image").click(function(){
                $('#profile_image_grid').attr('src', '/theme/images/4.png');
                let file = document.getElementById("profile_image");
                file.value = file.defaultValue;
            });
            $("#remove_owner_profile_image").click(function () {
               $('#owner_profile_image_grid').attr('src', '/theme/images/4.png');
               let file = document.getElementById("owner_profile_image");
               file.value = file.defaultValue;
           });
            $("#edit_data_form").on('submit',function(e){
                e.preventDefault();
                let url = "{{route('agent.store')}}";
                let params = new FormData(document.getElementById('edit_data_form'));
                function fn_success(result)
                {
                   toast('success',result.message,'bottom-right');
                   $('#profile_image_grid').attr('src', '/theme/images/4.png');
                   $('#owner_profile_image_grid').attr('src', '/theme/images/4.png');
                   $("#edit_data_form")[0].reset();
                }
                function fn_error(result)
                {
                    toast('error',result.message,'bottom-right');
                }
                $.fn_ajax_multipart(url,params,fn_success,fn_error);
            });


       });
  </script>
@endsection
