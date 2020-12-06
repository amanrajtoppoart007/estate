@extends('admin.layout.base')
@section('content')




<!-- Content -->
    <div class="content container-fluid">
        <span class="float-right">Add Flat Owner</span>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}">Home</a></li>
                <li class="breadcrumb-item active" aria-current="page">Add Flat Owner</li>
            </ol>
        </nav>

        <div class="row gx-2 gx-lg-3 mt-3">
            <div class="col-lg-12 mb-3 mb-lg-0">

                <!-- Card -->
                


 <div class="card card-olive card-outline">
     <div class="card-body">
         {{Form::open(['route'=>'owner.store','id'=>'add_data_form','autocomplete'=>'off'])}}
         <input type="hidden" name="owner_type" value="flat_owner">
          <div class="card shadow-none">
              <div class="card-header">
                <span class="card-title">Owner Details</span>
              </div>
              <div class="card-body">
                  <div class="row">
            <div class="col-sm-6 col-md-8 row">
                <div class="col-sm-12 col-md-4 col-lg-4 col-xl-4">
                    <div class="form-group">
                        <label for="firm_type">Owner Type</label>
                        
                            <select class="js-select2-custom" name="firm_type" id="firm_type">
                                <option value="">Owner Type</option>
                                <option value="individual">individual</option>
                                <option value="company">Company</option>
                            </select>
                    </div>
                </div>
                <div class="col-sm-12 col-md-4 col-lg-4 col-xl-4">
                     <div class="form-group">
                        <label for="name">Name</label>
                            
                        <input type="text" class="form-control" name="name" id="name" value="">
                    </div>
                </div>
                <div class="col-sm-12 col-md-4 col-lg-4 col-xl-4">
                    <div class="form-group">
                        <label for="mobile">Mobile</label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                    <select name="country_code" class="js-select2-custom" id="country_code">
                                        @foreach($countries as $country)
                                            @php $selected = ($country->code==971)?"selected":null; @endphp
                                            <option value="{{$country->code}}" {{$selected}}>
                                                +{{$country->code}}</option>
                                        @endforeach
                                    </select>
                            </div>
                            <input type="text" class="form-control numeric" name="mobile" id="mobile" value="">
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
                            <input type="text" class="form-control" name="email" id="email" value="" data-inputmask="'alias': 'email'" inputmode="email" data-mask="">
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
                            <input type="text" class="form-control" name="emirates_id" id="emirates_id" value="">
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-6 col-md-4">
            	<div class="form-group">
                                <label class="input-label">Photo</label>

                                <div class="d-flex align-items-center">
                                    <!-- Avatar -->
                                    <label class="avatar avatar-xxl avatar-circle avatar-uploader mr-5" for="profile_image">
                                        <img id="avatarProjectSettingsImg" class="avatar-img" src="{{asset('theme/images/4.png')}}" alt="Image Description">

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
                               </div>
                           </div>
                       </div>
          </div>
          <div class="row">
            <div class="col-12 col-sm-6 col-md-3 col-lg-3 col-xl-3">
                 <div class="form-group">
                     <label for="emirates_exp_date">Emirates Id(Expiry Date) </label>
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
                       <div class="col-12 col-sm-6 col-md-3 col-lg-3 col-xl-3">
                           <div class="form-group">
                               <label for="poa_exp_date">Power Of Attorney (Issue Date)</label>
                               <input type="text" class="form-control js-flatpickr flatpickr-custom" name="poa_exp_date" id="poa_exp_date" data-hs-flatpickr-options='{
                                             "dateFormat": "d-m-Y"
                                           }' value="">
                               
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
             <div class="collapse card-body" id="auth_person_detail">
                 <div class="row">
                     <div class="col-12 col-sm-12 col-md-8 col-lg-8 col-xl-8">
                         <div class="row">
                             <div class="col-12 col-sm-4 col-md-4 col-lg-4 col-xl-4">
                                 <div class="form-group">
                                     <label for="auth_person_name">Name</label>
                                     <div class="input-group">
                                         <div class="input-group-prepend">
                                             <span class="input-group-text"><i class="fas fa-user"></i></span>
                                         </div>
                                         <input type="text" class="form-control" name="auth_person_name" id="auth_person_name" value="">
                                     </div>
                                 </div>
                             </div>
                             <div class="col-12 col-sm-4 col-md-4 col-lg-4 col-xl-4">
                               <div class="form-group">
                                     <label for="auth_person_designation">Designation/Relation</label>
                                     <div class="input-group">
                                         <div class="input-group-prepend">
                                             <span class="input-group-text"><i class="fas fa-user"></i></span>
                                         </div>
                                         <input type="text" class="form-control" name="auth_person_designation" id="auth_person_designation" value="">
                                     </div>
                                 </div>
                             </div>
                         </div>
                         <div class="row">

                             <div class="col-sm-12 col-md-4 col-lg-4 col-xl-4">
                                 <div class="form-group">
                                     <label for="auth_person_mobile">Mobile</label>
                                     <div class="input-group">
                                         <div class="input-group-prepend">
                                                 <select name="auth_person_country_code" class="js-select2-custom" id="auth_person_country_code">
                                                     @foreach($countries as $country)
                                                          @php $selected = ($country->code==971)?"selected":null; @endphp
                                                         <option value="{{$country->code}}" {{$selected}}>+{{$country->code}}</option>
                                                     @endforeach
                                                </select>
                                             
                                         </div>
                         <input type="text" class="form-control numeric" name="auth_person_mobile" id="auth_person_mobile" value="">
                                     </div>
                                 </div>
                             </div>
                             <div class="col-sm-12 col-md-4 col-lg-4 col-xl-4">
                                 <div class="form-group">
                                     <label for="auth_person_email">Email</label>
                                     <div class="input-group">
                                         <div class="input-group-prepend">
                                             <span class="input-group-text"><i
                                                     class="fas fa-envelope-square"></i></span>
                                         </div>
                                         <input type="text" class="form-control" name="auth_person_email" id="auth_person_email" value=""
                                                data-inputmask="'alias': 'email'" inputmode="email" data-mask="">
                                     </div>
                                 </div>
                             </div>
                         </div>
                     </div>
                     <div class="col-12 col-sm-12 col-md-4 col-lg-4 col-xl-4">
                     	<div class="form-group">
                                <label class="input-label">Photo</label>

                                <div class="d-flex align-items-center">
                                    <!-- Avatar -->
                                    <label class="avatar avatar-xxl avatar-circle avatar-uploader mr-5" for="auth_person_image">
                                        <img id="avatarProjectSettingsImg1" class="avatar-img" src="{{asset('theme/images/4.png')}}" alt="Image Description">

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
                 <div class="card mt-3 my-2">
            <div class="card-header">
                <h6 class="text-dark">Documents</h6>
            </div>
            <div class="card-body">
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
                                           }' value="">
                     
                     
                 </div>
              </div>
                 <div class="col-12 col-sm-6 col-md-3 col-lg-3 col-xl-3">
                           <div class="form-group">
                               <label for="auth_person_passport_exp_date">Passport (Expiry Date)</label>
                               <input type="text" class="form-control js-flatpickr flatpickr-custom" name="auth_person_passport_exp_date" id="auth_person_passport_exp_date" data-hs-flatpickr-options='{
                                             "dateFormat": "d-m-Y"
                                           }' value="">
                               
                           </div>
                       </div>
                       <div class="col-12 col-sm-6 col-md-3 col-lg-3 col-xl-3">
                           <div class="form-group">
                               <label for="auth_person_visa_exp_date">Visa (Expiry Date)</label>
                               <input type="text" class="form-control js-flatpickr flatpickr-custom" name="auth_person_visa_exp_date" id="auth_person_visa_exp_date" data-hs-flatpickr-options='{
                                             "dateFormat": "d-m-Y"
                                           }' value="">
                               
                           </div>
                       </div>

               <div class="col-12 col-sm-6 col-md-3 col-lg-3 col-xl-3">
                           <div class="form-group">
                               <label for="auth_poa_exp_date">Power Of Attorney (Issue Date)</label>
                               <input type="text" class="form-control js-flatpickr flatpickr-custom" name="auth_poa_exp_date" id="auth_poa_exp_date" data-hs-flatpickr-options='{
                                             "dateFormat": "d-m-Y"
                                           }' value="">
                               
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
                  <input type="text" class="form-control" name="bank_name" id="bank_name" value="">
              </div>
          </div>

          <div class="form-group col-md-4">
              <label for="banking_name">Account Holder Name</label>
              <div class="input-group">
                  <div class="input-group-prepend">
                      <span class="input-group-text"><i class="fas fa-user"></i></span>
                  </div>
                  <input type="text" class="form-control" name="banking_name" id="banking_name" value="">
              </div>
          </div>
          <div class="col-md-4"></div>
          <div class="form-group col-md-4">
              <label for="bank_swift_code">Bank Swift Code</label>
              <div class="input-group">
                  <div class="input-group-prepend">
                      <span class="input-group-text"><i class="fas fa-sort-numeric-up"></i></span>
                  </div>
                  <input type="text" class="form-control" name="bank_swift_code" id="bank_swift_code" value="">
              </div>
          </div>

          <div class="form-group col-md-4">
              <label for="bank_account">IBAN Number</label>
              <div class="input-group">
                  <div class="input-group-prepend">
                      <span class="input-group-text"><i class="fas fa-file-invoice-dollar"></i></span>
                  </div>
                  <input type="text" class="form-control" name="bank_account" id="bank_account" value="">
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
              <select type="text" class="js-select2-custom" name="country_id" id="country_id">
                  <option value="">Select Country</option>
                  @foreach($countries as $country)
                      <option value="{{$country->id}}">{{$country->name}}</option>
                  @endforeach
              </select>
          </div>
          <div class="form-group col-md-4">
              <label for="state_id">State</label>
              <select class="js-select2-custom" name="state_id" id="state_id"></select>
              
          </div>
          <div class="col-md-4"></div>
          <div class="form-group col-md-4">
              <label for="city_id">City</label>
              <select class="js-select2-custom" name="city_id" id="city_id"></select>
              
          </div>
          <div class="form-group col-md-4">
              <label for="address">Address</label>
              <div class="input-group">
                  <div class="input-group-prepend">
                      <span class="input-group-text"><i class="fas fa-map-pin"></i></span>
                  </div>
                  <input type="text" class="form-control" name="address" id="address" value="">
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
                        <input type="text" class="form-control" name="company_name" id="company_name" value="">
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
                        <input type="text" class="form-control" name="telephone_number" id="telephone_number" value="">
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
                            <input type="text" class="form-control" name="office_address" id="office_address" value="">
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
                            <input type="text" class="form-control" name="trade_license" id="trade_license" value="">
                        </div>
                    </div>
                </div>
                <div class="col-12 col-sm-6 col-md-4 col-lg-4 col-xl-4">
                    <div class="form-group">
                    <label for="license_expiry_date">Lincese Expiry Date</label>
                    <input type="text" class="form-control js-flatpickr flatpickr-custom" name="license_expiry_date" id="license_expiry_date" data-hs-flatpickr-options='{
                                             "dateFormat": "d-m-Y"
                                           }' value="">
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
        <div class="row mt-3">
            <input type="hidden" id="action" name="action" value="">
            <div class="col-md-12 text-right">
                <button id="action_save"  class="btn btn-success  save_action_btn" type="submit">Save</button>
                <button id="action_preview" class="btn btn-success  save_action_btn" type="submit">Preview</button>
                <button id="action_allocate_unit" class="btn btn-success  save_action_btn" type="submit">Allocate Unit</button>
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

           $(document).on("click",".save_action_btn",function(e){
               let action = $(this).attr("id");
               $("#action").val(action);
           });

           function activate_date_pickers() {
               let class_based_date_pickers = [
                   'purchase_date'
               ];
               class_based_date_pickers.forEach(function (item) {
                   $(`.${item}`).each(function (el) {
                       el.datepicker({
                           footer: true,
                           modal: true,
                           format: 'dd-mm-yyyy',
                           maxDate: '{{now()->format('d-m-Y')}}'
                       });
                   });

               });
           }


           $("#firm_type").on("change",function(){
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
            
            
            $("#add_data_form").on('submit',function(e){
                e.preventDefault();
                let url = "{{route('owner.store')}}";
                let params = new FormData(document.getElementById('add_data_form'));
                function fn_success(result)
                {
                   toast('success',result.message,'bottom-right');
                   $("#add_data_form")[0].reset();
                   let action = result.next_action;
                    switch (action) {
                        case "save":
                            break;
                        case "preview":
                            window.location.href = result.next_url;
                            break;
                        case "allocate_unit":
                            $("#allocate_unit_modal").modal("show");
                            break;
                        default:
                            break;

                    }
                }
                function fn_error(result)
                {
                    toast('error',result.message,'bottom-right');
                }
                $.fn_ajax_multipart(url,params,fn_success,fn_error);
            });

            $("#property_id").on("change",function(e){
                 $("#unit_id").html(null);
                let url = "{{route('owner.get.property.units')}}";
                let params = { property_id : $(this).val()};
                function success(result)
                {
                    let html = `<option value="">Select Flat</option>`;
                    $.each(result.data,function(index,item){
                        html+=`<option value="${item.id}">${item.flat_number}</option>`;
                    });
                    $("#unit_id").append(html);
                }
                function error(result)
                {
                    toast('error',result.message,'bottom-right');
                }
            });
       });
  </script>
@endsection
