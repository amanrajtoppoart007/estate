@extends('admin.layout.app')
@section('breadcrumb')
<div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h4 class="m-0 text-dark">Edit Property Owner</h4>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}">Home</a></li>
              <li class="breadcrumb-item active">Edit property owner</li>
            </ol>
          </div>
        </div>
      </div>
    </div>
@endsection
@section('content')
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
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-user"></i></span>
                            </div>
                            <select class="form-control" name="firm_type" id="firm_type">
                                <option value="">Firm Type</option>
                                @php $types = ['individual'=>'individual','company'=>'Company']; @endphp
                                @foreach($types as $key=>$value)
                                    @php $selected = ($key===$owner->firm_type)?'selected':'';@endphp
                                    <option value="{{$key}}" {{$selected}}>{{$value}}</option>
                                @endforeach
                            </select>
                        </div>
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
                                <span class="input-group-text">
                                    <select  name="country_code" id="country_code">
                                        <option value="">Select</option>
                                        @php $country_codes = array('971'=>'UAE','91'=>'INDIA') @endphp
                                        @foreach($countries as $country)
                                            @php $selected = ($country->code==$owner->country_code)?'selected':''; @endphp
                                            <option value="{{$country->code}}" {{$selected}}>{{$country->code}}</option>
                                        @endforeach
                                    </select>
                                </span>
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
                <div class="text-center">
                  <div class="user_photo">
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
                    <img id="profile_image_grid" src="{{$img}}" style="width:250px;margin-bottom:10px;" alt="">
                    <div style="position:absolute;top:211px;right:72px;">
                      <label class="btn btn-primary mb-0" for="profile_image">
                          <i class="fa fa-upload"></i>
                      </label>
                      <input id="profile_image" class="hide" type="file" name="photo">
                      <a type="button" id="remove_profile_image" class="btn btn-danger text-white">
                          <i class="fa fa-trash"></i>
                      </a>
                    </div>
                  </div>
                </div>
            </div>
         </div>
              </div>
          </div>
       <div class="card card-info">
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
                     <input type="file" class="form-control" name="emirates_id_doc" id="emirates_id_doc" value="">
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
                               <input type="file" class="form-control" name="passport" id="passport" value="">
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
                               <input type="file" class="form-control" name="visa" id="visa" value="">
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
                               <input type="file" class="form-control" name="power_of_attorney" id="power_of_attorney" value="">
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
                     <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text">
                                <i class="fa fa-passport"></i>
                            </span>
                        </div>
                     <input type="text" class="form-control" name="emirates_exp_date" id="emirates_exp_date" value="{{($emirates_id_exp_date)?date('d-m-Y',strtotime($emirates_id_exp_date)):null}}">
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
                               <input type="text" class="form-control" name="passport_exp_date" id="passport_exp_date" value="{{($passport_exp_date)?date('d-m-Y',strtotime($passport_exp_date)):null}}">
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
                               <input type="text" class="form-control" name="visa_exp_date" id="visa_exp_date" value="{{($visa_exp_date)?date('d-m-Y',strtotime($visa_exp_date)):null}}">
                               </div>
                           </div>
                       </div>
                       <div class="col-12 col-sm-6 col-md-3 col-lg-3 col-xl-3">
                           <div class="form-group">
                               <label for="poa_exp_date">Power Of Attorney (Issue Date)</label>
                               <div class="input-group">
                                  <div class="input-group-prepend">
                                      <span class="input-group-text">
                                          <i class="fab fa-cc-visa"></i>
                                      </span>
                                  </div>
                               <input type="text" class="form-control" name="poa_exp_date" id="poa_exp_date" value="{{($poa_exp_date)?date('d-m-Y',strtotime($poa_exp_date)):null}}">
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
                                 <input type="checkbox" id="authorised_person_required"  name="authorised_person_required" {{$owner->authorised_person? "checked":null}}>
                                 <label for="authorised_person_required" id="add_auth_person_detail_btn" data-toggle="collapse" data-target="#auth_person_detail" aria-expanded="false" aria-controls="auth_person_detail">
                                     Add Authorised person
                                 </label>
                             </span>
                         </button>

                     </div>
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
                                             <span class="input-group-text">
                                                 <select name="auth_person_country_code" id="auth_person_country_code">
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
                                             </span>
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
                         <div class="text-center">
                             <div class="user_photo">
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
        <div class="card card-info">
            <div class="card-header">
                <h6>Billing Address Detail</h6>
            </div>
            <div class="card-body">
        <div class="row">
          <div class="form-group col-md-4">
              <label for="country_id">Country</label>
              <div class="input-group">
                  <div class="input-group-prepend">
                      <span class="input-group-text"><i class="fas fa-flag"></i></span>
                  </div>
                  <select  class="form-control" name="country_id" id="country_id">
                      <option value="">Select Country</option>
                      @foreach($countries as $country)
                          @php $selected = ($country->id==$owner->country_id)?"selected":null; @endphp
                          <option value="{{$country->id}}" {{$selected}}>{{$country->name}}</option>
                      @endforeach
                  </select>
              </div>
          </div>
          <div class="form-group col-md-4">
              <label for="state_id">State</label>
              <div class="input-group">
                  <div class="input-group-prepend">
                      <span class="input-group-text"><i class="fas fa-map-marker"></i></span>
                  </div>
                  <select class="form-control" name="state_id" id="state_id">
                      <option value="">Select State</option>
                      @foreach($states as $state)
                          @php $selected = ($state->id==$owner->state_id)?"selected":null; @endphp
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
                  <select class="form-control" name="city_id" id="city_id">
                      <option value="">Select City</option>
                      @foreach($cities as $city)
                          @php $selected = ($city->id==$owner->city_id)?"selected":null; @endphp
                          <option value="{{$city->id}}" {{$selected}}>{{$city->name}}</option>
                      @endforeach
                  </select>
              </div>
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


        <div class="card card-info owner_type_company_grid">
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
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fas fa-map-pin"></i></span>
                        </div>
                        <input type="text" class="form-control" name="license_expiry_date" id="license_expiry_date" value="{{$owner->license_expiry_date}}">
                    </div>
                </div>
                </div>
            </div>
        </div>
            </div>
        </div>

        <div class="card card-info owner_type_company_grid">
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
                             <input type="file" name="trade_license" class="form-control">
                         </td>
                     </tr>
                     <tr>
                         <td>
                             <input type="text" name="vat_number_doc" class="form-control" value="vat_number" readonly>
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
        </div>
        <div class="row">
            <div class="col-md-12 text-right">
                <button class="btn btn-success active" type="submit">Save</button>
            </div>
        </div>
        {{Form::close()}}
     </div>
 </div>
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
       $(document).ready(function(){

           $("#country_id").on("change",function(){
               $.get_state_list($("#country_id"),$("#state_id"));
           });
           $("#state_id").on("change",function(){
               $.get_city_list($("#state_id"),$("#city_id"));
           });

           let pickers = ['emirates_exp_date','visa_exp_date','passport_exp_date','poa_exp_date',
               'auth_person_emirates_exp_date',
               'auth_person_visa_exp_date',
               'auth_person_passport_exp_date',
               'auth_poa_exp_date',
               'license_expiry_date'
           ];
           pickers.forEach(function(item){
               $(`#${item}`).datepicker({ footer: true, modal: true,format: 'dd-mm-yyyy', minDate : '{{now()->format('d-m-Y')}}'});
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
