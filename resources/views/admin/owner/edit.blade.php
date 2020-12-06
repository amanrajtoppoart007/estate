@extends('admin.layout.base')
@section('content')
<!-- Content -->
    <div class="content container-fluid">
        <span class="float-right">Edit Property Owner</span>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}">Home</a></li>
                <li class="breadcrumb-item active" aria-current="page">Edit Property Owner</li>
            </ol>
        </nav>

        <div class="row gx-2 gx-lg-3 mt-3">
            <div class="col-lg-12 mb-3 mb-lg-0">

                <!-- Card -->
                <div class="card" style="box-shadow: none;">
     <div class="card-body">
         {{Form::open(['route'=>'owner.store','id'=>'edit_data_form','autocomplete'=>'off'])}}
         <input type="hidden" name="owner_id" id="owner_id" value="{{$owner->id}}">
         <input type="hidden" name="owner_type" value="{{$owner->owner_type}}">
          <div class="card card-info">
              <div class="card-header">
                <h6>Owner Details</h6>
              </div>
              <div class="card-body">
                  <div class="row">
            <div class="col-sm-6 col-md-8 row">
                 <div class="col-sm-12 col-md-4 col-lg-4 col-xl-4">
                    <div class="form-group">
                        <label for="firm_type">Owner Type</label>
                        
                          <select class="js-select2-custom" name="firm_type" id="firm_type">
                              <option value="">Firm Type</option>
                              @php $types = ['individual'=>'individual','company'=>'Company']; @endphp
                              @foreach($types as $key=>$value)
                                  @php $selected = ($key===$owner->firm_type)?'selected':'';@endphp
                                  <option value="{{$key}}" {{$selected}}>{{$value}}</option>
                              @endforeach
                          </select>
                    </div>
                </div>
                <div class="col-sm-12 col-md-4 col-lg-4 col-xl-4">
                     <div class="form-group">
                        <label for="name">Name</label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-user"></i></span>
                            </div>
                            <input type="text" class="form-control" name="name" id="name" value="{{$owner->name}}">
                        </div>
                    </div>
                </div>

                <div class="col-sm-12 col-md-4 col-lg-4 col-xl-4">
                    <div class="form-group">
                        <label for="mobile">Mobile</label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <select  name="country_code" class="js-select2-custom" id="country_code">
                                    <option value="">Select</option>
                                    @php $country_codes = array('971'=>'UAE','91'=>'INDIA') @endphp
                                    @foreach($countries as $country)
                                        @php $selected = ($country->code==$owner->country_code)?'selected':''; @endphp
                                        <option value="{{$country->code}}" {{$selected}}>{{$country->code}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <input type="text" class="form-control numeric" name="mobile" id="mobile" value="{{$owner->mobile}}">
                        </div>
                    </div>
                </div>
                <div class="col-sm-12 col-md-4 col-lg-4 col-xl-4">
                    <div class="form-group">
                        <label for="email">Email</label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-envelope-square"></i></span>
                            </div>
                            <input type="text" class="form-control" name="email" id="email" value="{{$owner->email}}" data-inputmask="'alias': 'email'" inputmode="email" data-mask="">
                        </div>
                    </div>
                </div>
                <div class="col-sm-12 col-md-4 col-lg-4 col-xl-4">
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
                <div class="col-sm-12 col-md-4 col-lg-4 col-xl-4">
                    <div class="form-group">
                        <label for="emirates_id">Emirates Id</label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-id-card-alt"></i></span>
                            </div>
                            <input type="text" class="form-control" name="emirates_id" id="emirates_id" value="{{$owner->emirates_id}}">
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-6 col-md-4">
              @php
                         if(!empty($owner->photo))
                         {
                             $img = route('get.doc',base64_encode($owner->photo));
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
       <div class="card mt-3">
            <div class="card-header">
                <h6>Documents</h6>
                @php
                 $passport = $visa = $poa = $emirates_id_exp_date = $passport_exp_date = $visa_exp_date= $poa_exp_date =  null;
                         if(!empty($owner->documents))
                             {
                                 $documents =   extract_doc_keys($owner->documents,'file_url','document_title','date_key','date_value');

                         foreach($documents as $doc)
                          {
                              if($doc['document_title']=='emirates_id_doc')
                                  {
                                      $emirates_id_doc         = $doc['file_url'];
                                      $emirates_id_exp_date = $doc['date_value'] ? date("d-m-Y",strtotime($doc['date_value'])) : null;
                                  }
                               if($doc['document_title']=='passport')
                                  {
                                      $passport          = $doc['file_url'];
                                      $passport_exp_date = $doc['date_value'] ? date("d-m-Y",strtotime($doc['date_value'])) : null;
                                  }
                               if($doc['document_title']=='visa')
                                  {
                                      $visa          = $doc['file_url'];
                                      $visa_exp_date = $doc['date_value'] ? date("d-m-Y",strtotime($doc['date_value'])) : null;
                                  }

                               if($doc['document_title']=='power_of_attorney')
                                  {
                                      $poa         = $doc['file_url'];
                                      $poa_exp_date = $doc['date_value'] ? date("d-m-Y",strtotime($doc['date_value'])) : null;
                                  }
                          }
                             }
                         if(!empty($emirates_id_doc))
                        {
                            $emirates_id_doc = route('get.doc',base64_encode($emirates_id_doc));
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
                @endphp
            </div>
            <div class="card-body">
          <div class="row">
            <div class="col-12 col-sm-6 col-md-3 col-lg-3 col-xl-3">
                 <div class="form-group">
                     <label for="emirates_id_doc">Emirates Id(scanned copy) </label>
                     <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text">
                                <i class="fa fa-passport"></i>
                            </span>
                        </div>
                     <div class="custom-file">

                                <input type="file" name="emirates_id_doc" id="emirates_id_doc" class="js-file-attach custom-file-input"
                                       data-hs-file-attach-options='{
              "textTarget": "[for=\"emirates_id_doc\"]"
           }'>
                                <label class="custom-file-label" for="emirates_id_doc">Choose file</label>
                            </div>
                         @if(!empty($emirates_id_doc))
                             <div class="input-group-append" data-toggle="tooltip" title="click to view file">
                                 <div class="input-group-text">
                                     <a href="{{$emirates_id_doc}}"
                                        target="{{($emirates_id_doc)?'_blank':'#'}}">
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
                               <label for="passport">Passport (scanned copy)</label>
                               <div class="input-group">
                                  <div class="input-group-prepend">
                                      <span class="input-group-text">
                                          <i class="fa fa-passport"></i>
                                      </span>
                                  </div>
                               <div class="custom-file">

                                <input type="file" name="passport" id="passport" class="js-file-attach custom-file-input"
                                       data-hs-file-attach-options='{
              "textTarget": "[for=\"passport\"]"
           }'>
                                <label class="custom-file-label" for="passport">Choose file</label>
                            </div>
                                   @if(!empty($passport))
                                       <div class="input-group-append" data-toggle="tooltip" title="click to view file">
                                           <div class="input-group-text">
                                               <a href="{{$passport}}" target="{{($passport)?'_blank':'#'}}"><i class="fa fa-file"></i></a>
                                           </div>
                                       </div>
                                   @endif
                               </div>
                           </div>
                       </div>
                       <div class="col-12 col-sm-6 col-md-3 col-lg-3 col-xl-3">
                           <div class="form-group">
                               <label for="visa">Visa (scanned copy)</label>
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
                                   @if(!empty($visa))
                                       <div class="input-group-append" data-toggle="tooltip" title="click to view file">
                                           <div class="input-group-text">
                                               <a href="{{$visa}}" target="{{($visa)?'_blank':'#'}}"><i class="fa fa-file"></i></a>
                                           </div>
                                       </div>
                                   @endif
                               </div>
                           </div>
                       </div>
                       <div class="col-12 col-sm-6 col-md-3 col-lg-3 col-xl-3">
                           <div class="form-group">
                               <label for="power_of_attorney">Power Of Attorney (scanned copy)</label>
                               <div class="input-group">
                                  <div class="input-group-prepend">
                                      <span class="input-group-text">
                                          <i class="fab fa-cc-visa"></i>
                                      </span>
                                  </div>
                               <div class="custom-file">

                                <input type="file" name="power_of_attorney" id="power_of_attorney" class="js-file-attach custom-file-input"
                                       data-hs-file-attach-options='{
              "textTarget": "[for=\"power_of_attorney\"]"
           }'>
                                <label class="custom-file-label" for="power_of_attorney">Choose file</label>
                            </div>
                                   @if(!empty($poa))
                                       <div class="input-group-append" data-toggle="tooltip" title="click to view file">
                                           <div class="input-group-text">
                                               <a href="{{$poa}}" target="{{($poa)?'_blank':'#'}}"><i class="fa fa-file"></i></a>
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
                     <label for="emirates_exp_date">Emirates Id(Expiry Date) </label>
                     <input type="text" class="form-control js-flatpickr flatpickr-custom" name="emirates_exp_date" id="emirates_exp_date" value="{{($emirates_id_exp_date)?date('d-m-Y',strtotime($emirates_id_exp_date)):null}}" data-hs-flatpickr-options='{
                                             "dateFormat": "d-m-Y"
                                           }'>
                     
                 </div>
              </div>
                 <div class="col-12 col-sm-6 col-md-3 col-lg-3 col-xl-3">
                           <div class="form-group">
                               <label for="passport_exp_date">Passport (Expiry Date)</label>
                               <input type="text" class="form-control js-flatpickr flatpickr-custom" name="passport_exp_date" id="passport_exp_date" data-hs-flatpickr-options='{
                                             "dateFormat": "d-m-Y"
                                           }' value="{{($passport_exp_date)?date('d-m-Y',strtotime($passport_exp_date)):null}}">
                               
                           </div>
                       </div>
                       <div class="col-12 col-sm-6 col-md-3 col-lg-3 col-xl-3">
                           <div class="form-group">
                               <label for="visa_exp_date">Visa (Expiry Date)</label>
                               <input type="text" class="form-control js-flatpickr flatpickr-custom" name="visa_exp_date" id="visa_exp_date" data-hs-flatpickr-options='{
                                             "dateFormat": "d-m-Y"
                                           }' value="{{($visa_exp_date)?date('d-m-Y',strtotime($visa_exp_date)):null}}">
                               
                           </div>
                       </div>
                       <div class="col-12 col-sm-6 col-md-3 col-lg-3 col-xl-3">
                           <div class="form-group">
                               <label for="poa_exp_date">Power Of Attorney (Issue Date)</label>
                               <input type="text" class="form-control js-flatpickr flatpickr-custom" name="poa_exp_date" id="poa_exp_date" data-hs-flatpickr-options='{
                                             "dateFormat": "d-m-Y"
                                           }' value="{{($poa_exp_date)?date('d-m-Y',strtotime($poa_exp_date)):null}}">
                               
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
                                 <input type="checkbox" id="authorised_person_required"  name="authorised_person_required">
                                 <label for="authorised_person_required" id="add_auth_person_detail_btn" data-toggle="collapse" data-target="#auth_person_detail" aria-expanded="false" aria-controls="auth_person_detail">
                                     Add Authorised person
                                 </label>
                             </span>
                         </button>

                     </div>
             </div>
             <div class="collapse card-body {{$owner->authorised_person? "show":null}}" id="auth_person_detail">
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
                                         <input type="text" class="form-control" name="auth_person_name" id="auth_person_name" value="{{($owner->authorised_person)?$owner->authorised_person->name:null}}">
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
                                         <input type="text" class="form-control" name="auth_person_designation" id="auth_person_designation" value="{{($owner->authorised_person)?$owner->authorised_person->designation:null}}">
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
                                                         @if(!empty($owner->authorised_person->auth_person_country_code))
                                                         @php $selected = ($country->code==$owner->authorised_person->auth_person_country_code)?'selected':''; @endphp
                                                         @else
                                                             @php $selected = ($country->code==971)?'selected':''; @endphp
                                                         @endif
                                                         <option
                                                             value="{{$country->code}}" {{$selected}}>{{$country->code}}</option>
                                                     @endforeach
                                               </select>
                                             
                                         </div>
                         <input type="text" class="form-control numeric" name="auth_person_mobile" id="auth_person_mobile" value="{{($owner->authorised_person)?$owner->authorised_person->mobile:null}}">
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
                                         <input type="text" class="form-control" name="auth_person_email" id="auth_person_email" value="{{($owner->authorised_person)?$owner->authorised_person->email:null}}"
                                                data-inputmask="'alias': 'email'" inputmode="email" data-mask="">
                                     </div>
                                 </div>
                             </div>
                         </div>
                     </div>
                     <div class="col-12 col-sm-12 col-md-4 col-lg-4 col-xl-4">
                         @php
                                     if(!empty($owner->authorised_person->photo))
                                     {
                                         $img_auth = route('get.doc',base64_encode($owner->authorised_person->photo));
                                     }
                                     else
                                     {
                                         $img_auth = asset('theme/images/4.png');
                                     }
                                 @endphp

                         <div class="form-group">
                                <label class="input-label">Photo</label>

                                <div class="d-flex align-items-center">
                                    <!-- Avatar -->
                                    <label class="avatar avatar-xxl avatar-circle avatar-uploader mr-5" for="auth_person_image">
                                        <img id="avatarProjectSettingsImg1" class="avatar-img" src="{{$img_auth}}" alt="Image Description">

                                        <input type="file" class="js-file-attach avatar-uploader-input" name="auth_person_image" id="auth_person_image"
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
                 <div class="card my-2">
            <div class="card-header">
                <h6 class="text-dark">Documents</h6>
            </div>
            <div class="card-body">
                @php
                       $auth_emirates_id = $auth_emirates_id_exp_date = $auth_passport = $auth_passport_exp_date = $auth_visa = $auth_visa_exp_date = $auth_poa =  $auth_poa_exp_date = null;
                    if(!empty($owner->authorised_person->documents))
                        {
                            $documents =   extract_doc_keys($owner->authorised_person->documents,'file_url','document_title','date_key','date_value');
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
                <h6 class="my-2">Account Detail</h6>
            </div>
        <div class="card-body">
        <div class="row">
          <div class="form-group col-md-4">
              <label for="bank_name">Bank Name</label>
              <div class="input-group">
                  <div class="input-group-prepend">
                      <span class="input-group-text"><i class="fas fa-money-check-alt"></i></span>
                  </div>
                  <input type="text" class="form-control" name="bank_name" id="bank_name" value="{{$owner->bank_name}}">
              </div>
          </div>

          <div class="form-group col-md-4">
              <label for="banking_name">Account Holder Name</label>
              <div class="input-group">
                  <div class="input-group-prepend">
                      <span class="input-group-text"><i class="fas fa-user"></i></span>
                  </div>
                  <input type="text" class="form-control" name="banking_name" id="banking_name" value="{{$owner->banking_name}}">
              </div>
          </div>
          <div class="col-md-4"></div>
          <div class="form-group col-md-4">
              <label for="bank_swift_code">Bank Swift Code</label>
              <div class="input-group">
                  <div class="input-group-prepend">
                      <span class="input-group-text"><i class="fas fa-sort-numeric-up"></i></span>
                  </div>
                  <input type="text" class="form-control" name="bank_swift_code" id="bank_swift_code" value="{{$owner->bank_swift_code}}">
              </div>
          </div>

          <div class="form-group col-md-4">
              <label for="bank_account">IBAN Number</label>
              <div class="input-group">
                  <div class="input-group-prepend">
                      <span class="input-group-text"><i class="fas fa-file-invoice-dollar"></i></span>
                  </div>
                  <input type="text" class="form-control" name="bank_account" id="bank_account" value="{{$owner->bank_account}}">
              </div>
          </div>

        </div>
            </div>
        </div>
        <div class="card mt-3">
            <div class="card-header">
                <h6>Billing Address Detail</h6>
            </div>
            <div class="card-body">
        <div class="row">
          <div class="form-group col-md-4">
              <label for="country_id">Country</label>
                <select  class="js-select2-custom" name="country_id" id="country_id">
                    <option value="">Select Country</option>
                    @foreach($countries as $country)
                        @php $selected = ($country->id==$owner->country_id)?"selected":null; @endphp
                        <option value="{{$country->id}}" {{$selected}}>{{$country->name}}</option>
                    @endforeach
                </select>
              
          </div>
          <div class="form-group col-md-4">
              <label for="state_id">State</label>
              
              <select class="js-select2-custom" name="state_id" id="state_id">
                  <option value="">Select State</option>
                  @foreach($states as $state)
                      @php $selected = ($state->id==$owner->state_id)?"selected":null; @endphp
                      <option value="{{$state->id}}" {{$selected}}>{{$state->name}}</option>
                  @endforeach
              </select>
              
          </div>
          <div class="col-md-4"></div>
          <div class="form-group col-md-4">
              <label for="city_id">City</label>
              
              <select class="js-select2-custom" name="city_id" id="city_id">
                  <option value="">Select City</option>
                  @foreach($cities as $city)
                      @php $selected = ($city->id==$owner->city_id)?"selected":null; @endphp
                      <option value="{{$city->id}}" {{$selected}}>{{$city->name}}</option>
                  @endforeach
              </select>
              
          </div>
          <div class="form-group col-md-4">
              <label for="address">Address</label>
              <div class="input-group">
                  <div class="input-group-prepend">
                      <span class="input-group-text"><i class="fas fa-map-pin"></i></span>
                  </div>
                  <input type="text" class="form-control" name="address" id="address" value="{{$owner->address}}">
              </div>
          </div>
        </div>
            </div>
        </div>


        <div class="card mt-3 owner_type_company_grid">
            <div class="card-header">
                <h6>Company Detail</h6>
            </div>
            <div class="card-body">
        <div>
            <div class="row">
                <div class="col-12 col-sm-6 col-md-4 col-lg-4 col-xl-4">
                    <div class="form-group">
                    <label for="company_name">Company Name</label>
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fas fa-flag"></i></span>
                        </div>
                        <input type="text" class="form-control" name="company_name" id="company_name" value="{{$owner->company_name}}">
                    </div>
                </div>
                </div>
                <div class="col-12 col-sm-6 col-md-4 col-lg-4 col-xl-4">
                  <div class="form-group">
                    <label for="telephone_number">Telephone Number</label>
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fas fa-city"></i></span>
                        </div>
                        <input type="text" class="form-control" name="telephone_number" id="telephone_number" value="{{$owner->telephone_number}}">
                    </div>
                </div>
                </div>
                <div class="col-12 col-sm-6 col-md-4 col-lg-4 col-xl-4">
                    <div class="form-group">
                        <label for="office_address">Office Address</label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-map-pin"></i></span>
                            </div>
                            <input type="text" class="form-control" name="office_address" id="office_address" value="{{$owner->office_address}}">
                        </div>
                    </div>
                </div>
                <div class="col-12 col-sm-6 col-md-4 col-lg-4 col-xl-4">
                    <div class="form-group">
                        <label for="trade_license">Trade License</label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-map-marker"></i></span>
                            </div>
                            <input type="text" class="form-control" name="trade_license" id="trade_license" value="{{$owner->trade_license}}">
                        </div>
                    </div>
                </div>
                <div class="col-12 col-sm-6 col-md-4 col-lg-4 col-xl-4">
                    <div class="form-group">
                    <label for="license_expiry_date">Lincese Expiry Date</label>
                    
                        <input type="text" class="form-control js-flatpickr flatpickr-custom" name="license_expiry_date" id="license_expiry_date" data-hs-flatpickr-options='{
                                             "dateFormat": "d-m-Y"
                                           }' value="{{$owner->license_expiry_date}}">
                    
                </div>
                </div>
            </div>
        </div>
            </div>
        </div>

        <div class="card mt-3 owner_type_company_grid">
            <div class="card-header">
                <h6>Upload Documents</h6>
            </div>
    <div class="card-body">
        <div class="row">
         <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
             <table class="table table-bordered">
                 <thead>
                     <tr>
                         <th>Document Type</th>
                         <th>Document</th>
                     </tr>
                 </thead>
                 <tbody>
                     <tr>
                         <td>
                             <input type="text" name="trade_license_doc" class="form-control" value="trade_license" readonly>
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
                             <input type="text" name="vat_number_doc" class="form-control" value="vat_number" readonly>
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
        </div>
        <div class="row">
            <div class="col-md-12 text-right">
                <button class="btn btn-success active" type="submit">Save</button>
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
     <link rel="stylesheet" href="{{asset('assets/plugins/icheck-bootstrap/icheck-bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('plugin/datetimepicker/css/gijgo.min.css')}}">
    <style>
    .owner_type_company_grid
    {
        display:none;
    }
</style>
@endsection
@section('js')
<script src="{{asset('assets/plugins/inputmask/jquery.inputmask.bundle.js')}}"></script>
<script src="{{asset('plugin/datetimepicker/js/gijgo.min.js')}}"></script>
@endsection
@section('script')
  <script>
    $('.js-select2-custom').each(function () {
      var select2 = $.HSCore.components.HSSelect2.init($(this));
    });

    $('.js-file-attach').each(function () {
      var customFile = new HSFileAttach($(this)).init();
    });

    $('.js-flatpickr').each(function () {
          $.HSCore.components.HSFlatpickr.init($(this));
        });
       $(document).ready(function(){

           $("#country_id").on("change",function(){
               $.get_state_list($("#country_id"),$("#state_id"));
           });
           $("#state_id").on("change",function(){
               $.get_city_list($("#state_id"),$("#city_id"));
           });


           $("#owner_type").on("change",function(){
               if($(this).val()==='individual')
               {
                   $(".owner_type_company_grid").hide();
               }
               else
               {
                   $(".owner_type_company_grid").show();
               }
           });
           $('[data-mask]').inputmask();
           function render_image(input,target)
            {
                if(input.files && input.files[0])
                {
                let reader = new FileReader();
                reader.onload = function (e) {
                    $(`#${target}`).attr('src', e.target.result);
                }
                reader.readAsDataURL(input.files[0]);
                }
            }
            $("#profile_image").change(function(){
                render_image(this,'profile_image_grid');
            });
            $("#auth_person_image").change(function(){
                render_image(this,'auth_person_image_grid');
            });
            $("#remove_profile_image").click(function(){
                $('#profile_image_grid').attr('src', '/theme/images/4.png');
                let file = document.getElementById("profile_image");
                file.value = file.defaultValue;
            });
            $("#remove_auth_person_image").click(function(){
                $('#auth_person_image_grid').attr('src', '/theme/images/4.png');
                let file = document.getElementById("profile_image");
                file.value = file.defaultValue;
            });
            $("#edit_data_form").on('submit',function(e){
                e.preventDefault();
                let url = "{{route('owner.update',['id'=>$owner->id])}}";
                let params = new FormData(document.getElementById('edit_data_form'));
                function fn_success(result)
                {
                   toast('success',result.message,'bottom-right');
                };
                function fn_error(result)
                {
                    toast('error',result.message,'bottom-right');
                };
                $.fn_ajax_multipart(url,params,fn_success,fn_error);
            })
       });
  </script>
@endsection
