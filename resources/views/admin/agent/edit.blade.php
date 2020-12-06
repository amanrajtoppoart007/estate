@extends('admin.layout.base')
@section('content')


<!-- Content -->
    <div class="content container-fluid">
        <span class="float-right">Edit Agent</span>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}">Home</a></li>
                <li class="breadcrumb-item"><a href="{{route('agent.index')}}">Agents</a></li>
                <li class="breadcrumb-item active" aria-current="page">Edit Agent</li>
            </ol>
        </nav>

        <div class="row gx-2 gx-lg-3 mt-3">
            <div class="col-lg-12 mb-3 mb-lg-0">

                <!-- Card -->
                

 <div class="card card-olive card-outline shadow-none">
     <div class="card-body">
         {{Form::open(['route'=>'owner.store','id'=>'edit_data_form'])}}
         <input type="hidden" name="id" value="{{$agent->id}}">
          <div class="card card-lightblue">
              <div class="card-header">
                  <h6>Agent Detail</h6>
              </div>
              <div class="card-body">
                  <div class="row">
            <div class="col-sm-6 col-md-8 ">
                <div class="row">
                    <div class="col-12 col-sm-6 col-md-6 col-lg-6 col-xl-6">
                            <div class="form-group">
                                <label for="owner_type">Agent Type</label>
                                
                                    <select   class="js-select2-custom" name="agent_type" id="agent_type">
                                        <option value="">Agent Type</option>
                                        @php $array = ['individual'=>'Individual','company'=>'Company']; @endphp
                                        @foreach($array as $key=>$value)
                                            @php $selected = ($key==$agent->agent_type)?'selected':null; @endphp
                                            <option value="{{$key}}" {{$selected}}>{{$value}}</option>
                                            @endforeach
                                    </select>
                            </div>
                        </div>
                <div class="col-12 col-sm-6 col-md-6 col-lg-6 col-xl-6">
                    <div class="form-group">
                        <label for="name"><span class="agent_type">Company</span> Name</label>
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fas fa-user"></i></span>
                        </div>
                        <input type="text" class="form-control" name="name" id="name" value="{{$agent->name}}">
                    </div>
                </div>
                </div>

                <div class="col-md-6">
                    <div class="form-group">
                        <label for="mobile">Mobile No.</label>
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <select name="country_code" class="js-select2-custom" id="country_code">
                                    @foreach($countries as $country)
                                        @php $selected = ($country['country_code']===$agent->country_code)?"selected":null; @endphp
                                        <option value="{{$country['country_code']}}" {{$selected}}>+{{$country['country_code']}}</option>
                                    @endforeach
                                </select>
                        </div>
                        <input type="text" class="form-control numeric" name="mobile" id="mobile" value="{{$agent->mobile}}">
                    </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="email">Email</label>
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fas fa-envelope-square"></i></span>
                        </div>
                        <input type="text" class="form-control" name="email" id="email" value="{{$agent->email}}" data-inputmask="'alias': 'email'" inputmode="email" data-mask="">
                    </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="password">Password</label>
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fas fa-unlock-alt"></i></span>
                        </div>
                        <input type="text" class="form-control" name="password" id="password" value="">
                    </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="license_expiry_date">License Expiry Date</label>
                        
                        <input type="text" class="form-control js-flatpickr  flatpickr-custom" name="license_expiry_date" id="license_expiry_date" data-hs-flatpickr-options='{
                                             "dateFormat": "d-m-Y"
                                           }' value="{{$agent->license_expiry_date? date('d-m-Y',strtotime($agent->license_expiry_date)): null}}">
                    
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="form-group">
                        <label for="address">Company Address</label>
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fas fa-map-marked"></i></span>
                        </div>
                        <textarea rows="3" type="text" class="form-control" name="address" id="address">{{$agent->address}}</textarea>
                    </div>
                    </div>
                </div>
                </div>
            </div>
            <div class="col-sm-6 col-md-4">

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

                <div class="form-group">
                                <label class="input-label">Photo</label>

                                <div class="d-flex align-items-center">
                                    <!-- Avatar -->
                                    <label class="avatar avatar-xxl avatar-circle avatar-uploader mr-5" for="profile_image">
                                        <img id="avatarProjectSettingsImg" class="avatar-img" src="{{$img}}" alt="Image Description">

                                        <input type="file" class="js-file-attach avatar-uploader-input" name="photo" id="profile_image"
                                               data-hs-file-attach-options='{
                                "textTarget": "#avatarProjectSettingsImg",
                                "mode": "image",
                                "targetAttr": "src",
                                "resetTarget": ".js-file-attach-reset-img",
                                "resetImg": "{{asset('theme/images/4.png')}}"
                             }'>

                                        <span class="avatar-uploader-trigger">
                        <i class="tio-edit avatar-uploader-icon shadow-soft"></i>
                      </span>
                                    </label>
                                    <!-- End Avatar -->

                                    <button type="button" class="js-file-attach-reset-img btn btn-white">Delete</button>
                                </div>
                            </div>
            </div>
        </div>
              </div>
          </div>

          <div class="card card-lightblue">
              <div class="card-header">
                 <h6>Owner Detail</h6>
              </div>
              <div class="card-body">
                  <div class="row">
            <div class="col-sm-6 col-md-8">
                <div class="row">
                    <div class="form-group col-md-12">
                    <label for="owner_name">Owner Name</label>
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fas fa-user"></i></span>
                        </div>
                        <input type="text" class="form-control" name="owner_name" id="owner_name" value="{{$agent->owner_name}}">
                    </div>
                </div>

                <div class="form-group col-md-6">
                    <label for="owner_mobile">Mobile No.</label>
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <select name="owner_country_code"  class=" js-select2-custom w-100">
                                      @foreach($countries as $country)
                                        @php $selected = ($country['country_code']===$agent->owner_country_code) ? "selected":"";@endphp
                                        <option value="{{$country['country_code']}}" {{$selected}}>+{{$country['country_code']}}</option>
                                    @endforeach
                               </select>
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
            </div>
            <div class="col-sm-6 col-md-4">
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
                
                <div class="form-group">
                                <label class="input-label">Photo</label>

                                <div class="d-flex align-items-center">
                                    <!-- Avatar -->
                                    <label class="avatar avatar-xxl avatar-circle avatar-uploader mr-5" for="owner_profile_image">
                                        <img id="avatarProjectSettingsImg1" class="avatar-img" src="{{$img}}" alt="Image Description">

                                        <input type="file" class="js-file-attach avatar-uploader-input" name="owner_photo" id="owner_profile_image"
                                               data-hs-file-attach-options='{
                                "textTarget": "#avatarProjectSettingsImg1",
                                "mode": "image",
                                "targetAttr": "src",
                                "resetTarget": ".js-file-attach-reset-img",
                                "resetImg": "{{asset('theme/images/4.png')}}"
                             }'>

                                        <span class="avatar-uploader-trigger">
                        <i class="tio-edit avatar-uploader-icon shadow-soft"></i>
                      </span>
                                    </label>
                                    <!-- End Avatar -->

                                    <button type="button" class="js-file-attach-reset-img btn btn-white">Delete</button>
                                </div>
                            </div>
            </div>
        </div>
  <div class="row mt-2">
      <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
          <div class="card card-lightblue">
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
                                         <div class="custom-file">

                                <input type="file" name="emirates_id_doc" id="emirates_id_doc" class="js-file-attach custom-file-input"
                                       data-hs-file-attach-options='{
              "textTarget": "[for=\"emirates_id_doc\"]"
           }'>
                                <label class="custom-file-label" for="emirates_id_doc">Choose file</label>
                            </div>
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
                                  <div class="custom-file">

                                <input type="file" name="passport" id="passport" class="js-file-attach custom-file-input"
                                       data-hs-file-attach-options='{
              "textTarget": "[for=\"passport\"]"
           }'>
                                <label class="custom-file-label" for="passport">Choose file</label>
                            </div>
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
                                         <div class="custom-file">

                                <input type="file" name="visa" id="visa" class="js-file-attach custom-file-input"
                                       data-hs-file-attach-options='{
              "textTarget": "[for=\"visa\"]"
           }'>
                                <label class="custom-file-label" for="visa">Choose file</label>
                            </div>
                              </div>
                          </div>
                      </div>
                  </div>
                  <div class="row">
                      <div class="col-12 col-sm-6 col-md-3 col-lg-3 col-xl-3">
                          <div class="form-group">
                              <label for="emirates_exp_date">Emirates Id </label>
                              <input type="text" class="form-control js-flatpickr flatpickr-custom" name="emirates_exp_date" id="emirates_exp_date" data-hs-flatpickr-options='{
                                             "dateFormat": "d-m-Y"
                                           }' value="">
                              
                          </div>
                      </div>
                      <div class="col-12 col-sm-6 col-md-3 col-lg-3 col-xl-3">
                          <div class="form-group">
                              <label for="passport_exp_date">Passport (Expiry Date)</label>
                              <input type="text" class="form-control js-flatpickr flatpickr-custom" name="passport_exp_date" id="passport_exp_date" data-hs-flatpickr-options='{
                                             "dateFormat": "d-m-Y"
                                           }' value="">
                             
                          </div>
                      </div>
                      <div class="col-12 col-sm-6 col-md-3 col-lg-3 col-xl-3">
                          <div class="form-group">
                              <label for="visa_exp_date">Visa (Expiry Date)</label>
                              <input type="text" class="form-control js-flatpickr flatpickr-custom" name="visa_exp_date" id="visa_exp_date" data-hs-flatpickr-options='{
                                             "dateFormat": "d-m-Y"
                                           }' value="">
                              
                          </div>
                      </div>
                  </div>
              </div>
          </div>
      </div>
</div>
</div>
</div>

         <div class="card mt-3">
             <div class="card-header">
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
                                     <label for="auth_person_designation">Designation</label>
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
                                                 <select name="auth_person_country_code" class="js-select2-custom" id="auth_person_country_code">
                                                    <option value="">Select</option>
                                                     @foreach($countries as $country)
                                                         @if(!empty($agent->authorised_person->auth_person_country_code))
                                                         @php $selected = ($country['country_code']===$agent->authorised_person->auth_person_country_code)?'selected':''; @endphp
                                                         @else
                                                             @php $selected = ($country['country_code']==971)?'selected':''; @endphp
                                                         @endif
                                                         <option
                                                             value="{{$country['country_code']}}" {{$selected}}>{{$country['country_code']}}</option>
                                                     @endforeach
                                               </select>
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
                         
                         <div class="form-group text-right">
                                <label class="input-label">Photo</label>

                                <div class="d-flex align-items-center">
                                    <!-- Avatar -->
                                    <label class="avatar avatar-xxl avatar-circle avatar-uploader mr-5" for="auth_person_image">
                                        <img id="avatarProjectSettingsImg2" class="avatar-img" src="{{$img_auth}}" alt="Image Description">

                                        <input type="file" class="js-file-attach avatar-uploader-input" name="auth_person_image" id="auth_person_image"
                                               data-hs-file-attach-options='{
                                "textTarget": "#avatarProjectSettingsImg2",
                                "mode": "image",
                                "targetAttr": "src",
                                "resetTarget": ".js-file-attach-reset-img",
                                "resetImg": "{{asset('theme/images/4.png')}}"
                             }'>

                                        <span class="avatar-uploader-trigger">
                        <i class="tio-edit avatar-uploader-icon shadow-soft"></i>
                      </span>
                                    </label>
                                    <!-- End Avatar -->

                                    <button type="button" class="js-file-attach-reset-img btn btn-white">Delete</button>
                                </div>
                            </div>
                     </div>
                 </div>
                 <div class="card mt-3 my-2">
            <div class="card-header">
                <h6 class="text-white">Documents</h6>
            </div>
            <div class="card-body">
                @php
                       $auth_emirates_id = $auth_emirates_id_exp_date = $auth_passport = $auth_passport_exp_date = $auth_visa = $auth_visa_exp_date = $auth_poa =  $auth_poa_exp_date = null;
                    if(!empty($agent->authorised_person->documents))
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
                     <div class="custom-file">

                                <input type="file" name="auth_person_emirates_id_doc" id="auth_person_emirates_id_doc" class="js-file-attach custom-file-input"
                                       data-hs-file-attach-options='{
              "textTarget": "[for=\"auth_person_emirates_id_doc\"]"
           }'>
                                <label class="custom-file-label" for="auth_person_emirates_id_doc">Choose file</label>
                            </div>
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
                               <div class="custom-file">

                                <input type="file" name="auth_person_passport" id="auth_person_passport" class="js-file-attach custom-file-input"
                                       data-hs-file-attach-options='{
              "textTarget": "[for=\"auth_person_passport\"]"
           }'>
                                <label class="custom-file-label" for="auth_person_passport">Choose file</label>
                            </div>
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
                               <div class="custom-file">

                                <input type="file" name="auth_person_visa" id="auth_person_visa" class="js-file-attach custom-file-input"
                                       data-hs-file-attach-options='{
              "textTarget": "[for=\"auth_person_visa\"]"
           }'>
                                <label class="custom-file-label" for="auth_person_visa">Choose file</label>
                            </div>
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
                               <div class="custom-file">

                                <input type="file" name="auth_person_power_of_attorney" id="auth_person_power_of_attorney" class="js-file-attach custom-file-input"
                                       data-hs-file-attach-options='{
              "textTarget": "[for=\"auth_person_power_of_attorney\"]"
           }'>
                                <label class="custom-file-label" for="auth_person_power_of_attorney">Choose file</label>
                            </div>
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
                     <input type="text" class="form-control js-flatpickr flatpickr-custom" name="auth_person_emirates_exp_date" id="auth_person_emirates_exp_date" data-hs-flatpickr-options='{
                                             "dateFormat": "d-m-Y"
                                           }' value="{{$auth_emirates_id_exp_date}}">
                     
                 </div>
              </div>
                 <div class="col-12 col-sm-6 col-md-3 col-lg-3 col-xl-3">
                           <div class="form-group">
                               <label for="auth_person_passport_exp_date">Passport (Expiry Date)</label>
                               <input type="text" class="form-control js-flatpickr flatpickr-custom" name="auth_person_passport_exp_date" id="auth_person_passport_exp_date" data-hs-flatpickr-options='{
                                             "dateFormat": "d-m-Y"
                                           }' value="{{$auth_passport_exp_date}}">
                               
                           </div>
                       </div>
                       <div class="col-12 col-sm-6 col-md-3 col-lg-3 col-xl-3">
                           <div class="form-group">
                               <label for="auth_person_visa_exp_date">Visa (Expiry Date)</label>
                               <input type="text" class="form-control js-flatpickr flatpickr-custom" name="auth_person_visa_exp_date" id="auth_person_visa_exp_date" data-hs-flatpickr-options='{
                                             "dateFormat": "d-m-Y"
                                           }' value="{{$auth_visa_exp_date}}">
                               
                           </div>
                       </div>
                       <div class="col-12 col-sm-6 col-md-3 col-lg-3 col-xl-3">
                           <div class="form-group">
                               <label for="auth_poa_exp_date">Power Of Attorney (Expiry Date)</label>
                               <input type="text" class="form-control js-flatpickr flatpickr-custom" name="auth_poa_exp_date" id="auth_poa_exp_date" data-hs-flatpickr-options='{
                                             "dateFormat": "d-m-Y"
                                           }' value="{{$auth_poa_exp_date}}">
                               
                           </div>
                       </div>
          </div>
            </div>
        </div>
             </div>
         </div>


        <div class="card mt-3">
            <div class="card-header">
                <h6 class="card-title">Account Detail</h6>
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
        <div class="card card-lightblue">
            <div class="card-header">
                <h6 class="card-title">Billing Address</h6>
            </div>
            <div class="card-body">

        <div class="row">
          <div class="form-group col-md-4">
              <label for="country_id">Country</label>
              
              <select class="js-select2-custom" name="country_id" id="country_id">
                  <option value="">Select Country</option>
                  @foreach($countries as $country)
                      @php $selected = ($country['id']==$agent->country_id)?"selected":null; @endphp
                      <option value="{{$country['id']}}" {{$selected}}>{{$country['country_name']}}</option>
                  @endforeach
              </select>
          </div>
          <div class="form-group col-md-4">
              <label for="state_id">Emirates/State</label>
              
              <select  class="js-select2-custom" name="state_id" id="state_id">
                  @foreach($states as $state)
                      @php $selected = ($state->id==$agent->state_id)?"selected":null; @endphp
                      <option value="{{$state->id}}" {{$selected}}>{{$state->name}}</option>
                  @endforeach
              </select>
          </div>
          <div class="col-md-4"></div>
          <div class="form-group col-md-4">
              <label for="city_id">City</label>
              
              <select  class="js-select2-custom" name="city_id" id="city_id">
                  @foreach($cities as $city)
                      @php $selected = ($city->id==$agent->city_id)?"selected":null; @endphp
                      <option value="{{$city->id}}" {{$selected}}>{{$city->name}}</option>
                  @endforeach
              </select>
          </div>
        </div>
            </div>
        </div>

         <div class="card card-lightblue agent_type_company_grid">
             <div class="card-header">
                 <h4 class="card-title">Documents</h4>
             </div>
             <div class="card-body">
                 <div class="table-responsive">
                     <table class="table">
                         <thead class="bg-lightblue">
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
                                  <div class="custom-file">

                                <input type="file" name="trade_license" id="trade_license" class="js-file-attach custom-file-input"
                                       data-hs-file-attach-options='{
              "textTarget": "[for=\"trade_license\"]"
           }'>
                                <label class="custom-file-label" for="trade_license">Choose file</label>
                            </div>
                              </td>
                          </tr>
                          <tr>
                              <td>
                                  <input type="text" class="form-control" value="vat-number" readonly>
                              </td>
                              <td>
                                  <div class="custom-file">

                                <input type="file" name="vat_number" id="vat_number" class="js-file-attach custom-file-input"
                                       data-hs-file-attach-options='{
              "textTarget": "[for=\"vat_number\"]"
           }'>
                                <label class="custom-file-label" for="vat_number">Choose file</label>
                            </div>
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

                <!-- End Card -->

            </div>
        </div>


    </div>
    <!-- End Content -->
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
       (function($){

        $('.js-select2-custom').each(function () {
          var select2 = $.HSCore.components.HSSelect2.init($(this));
        });

        $('.js-file-attach').each(function () {
          var customFile = new HSFileAttach($(this)).init();
        });

        $('.js-flatpickr').each(function () {
          $.HSCore.components.HSFlatpickr.init($(this));
        });

           $("#country_id").on("change",function(){
               $.get_state_list($("#country_id"),$("#state_id"));
           });
           $("#state_id").on("change",function(){
               $.get_city_list($("#state_id"),$("#city_id"));
           });

           function change_agent_type()
           {
               let type = $("#agent_type").val();
               if(type==="company")
               {
                   $(".agent_type").text("Company");
                   $(".agent_type_company_grid").show();
               }
               else
               {
                   $(".agent_type").text("Agent");
                   $(".agent_type_company_grid").hide();
               }
           }
           change_agent_type();

           $("#agent_type").on("change",function(){
              change_agent_type();
           });

           

           $('[data-mask]').inputmask();

            
            $("#edit_data_form").on('submit',function(e){
                e.preventDefault();
                let url = "{{route('agent.update',$agent->id)}}";
                let params = new FormData(document.getElementById('edit_data_form'));
                function fn_success(result)
                {
                   toast('success',result.message,'bottom-right');
                }
                function fn_error(result)
                {
                    toast('error',result.message,'bottom-right');
                }
                $.fn_ajax_multipart(url,params,fn_success,fn_error);
            });


       })(jQuery);
  </script>
@endsection
