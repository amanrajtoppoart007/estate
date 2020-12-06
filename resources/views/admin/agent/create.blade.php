@extends('admin.layout.base')
@section('content')



<!-- Content -->
    <div class="content container-fluid">
        <span class="float-right">Add Property Agent</span>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}">Home</a></li>
                <li class="breadcrumb-item"><a href="{{route('agent.index')}}">Agents</a></li>
                <li class="breadcrumb-item active" aria-current="page">Add Property Agent</li>
            </ol>
        </nav>

        <div class="row gx-2 gx-lg-3 mt-3">
            <div class="col-lg-12 mb-3 mb-lg-0">

                <!-- Card -->
                

 <div class="card">
     <div class="card-body">
         {{Form::open(['route'=>'owner.store','id'=>'add_data_form','autocomplete'=>'off'])}}
          <div class="card card-info">
              <div class="card-header">
                 <h4> <span class="agent_type">Company</span> Detail</h4>
              </div>
              <div class="card-body">
                  <div class="row">
            <div class="col-sm-6 col-md-8 row">
                <div class="col-sm-12 col-md-4 col-lg-4 col-xl-4">
                            <div class="form-group">
                                <label for="agent_type">Broker Type</label>
                                
                                <select   class="js-select2-custom" name="agent_type" id="agent_type">
                                    <option value="">Owner Type</option>
                                    <option value="individual">individual</option>
                                    <option value="company" selected>Company</option>
                                </select>
                                
                            </div>
                        </div>
                <div class="form-group col-md-8">
                    <label for="name"> <span class="agent_type">Company</span> Name</label>
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fas fa-user"></i></span>
                        </div>
                        <input type="text" class="form-control" name="name" id="name" value="">
                    </div>
                </div>

                <div class="form-group col-md-6">
                    <label for="mobile">Contact Number</label>
                    <div class="input-group">
                        <div class="input-group-prepend">
                            
                                <select name="country_code" class="js-select2-custom" id="country_code">
                                    @foreach($countries as $country)
                                        <option value="{{$country->code}}">+{{$country->code}}</option>
                                    @endforeach
                                </select>
                            
                        </div>
                        <input type="text" class="form-control numeric" name="mobile" id="mobile" value="">
                    </div>
                </div>
                <div class="form-group col-md-6">
                    <label for="email">Email</label>
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fas fa-envelope-square"></i></span>
                        </div>
                        <input type="text" class="form-control" name="email" id="email" value="" data-inputmask="'alias': 'email'" inputmode="email" data-mask="">
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
                    <input type="text" class="form-control js-flatpickr  flatpickr-custom" name="license_expiry_date" id="license_expiry_date" data-hs-flatpickr-options='{
                                             "dateFormat": "d-m-Y"
                                           }' value="">
                </div>
                <div class="form-group col-md-12">
                    <label for="address"> <span class="agent_type">Company</span> Address</label>
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fas fa-unlock-alt"></i></span>
                        </div>
                        <textarea rows="3" type="text" class="form-control" name="address" id="address"></textarea>
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

          <div class="card card-info agent_type_company_grid">
              <div class="card-header">
                 <h4>Company Owner Detail</h4>
              </div>
              <div class="card-body">

                  <div class="row">
                      <div class="col-12 col-sm-8 col-md-8 col-lg-8 col-xl-8">
                          <div class="row">
                      <div class="col-12 col-sm-4 col-md-4 col-lg-4 col-xl-4">
                           <div class="form-group">
                               <label for="owner_name">Owner Name</label>
                               <div class="input-group">
                                   <div class="input-group-prepend">
                                       <span class="input-group-text"><i class="fas fa-user"></i></span>
                                   </div>
                                   <input type="text" class="form-control" name="owner_name" id="owner_name" value="">
                               </div>
                           </div>
                      </div>
                      <div class="col-12 col-sm-5 col-md-5 col-lg-5 col-xl-5">
                          <label for="owner_mobile">Telephone Number</label>
                          <div class="input-group">
                              <div class="input-group-prepend">
                            
                                <select name="country_code" class="phone_code js-select2-custom">
                                  @foreach($countries as $country)
                                        <option value="{{$country->code}}">+{{$country->code}}</option>
                                    @endforeach
                                </select>
                              </div>
                              <input type="text" class="form-control numeric" name="owner_mobile" id="owner_mobile"
                                     value="">
                          </div>
                      </div>
                      <div class="col-12 col-sm-4 col-md-4 col-lg-4 col-xl-4">
                          <div class="form-group">
                              <label for="owner_email">Email</label>
                              <div class="input-group">
                                  <div class="input-group-prepend">
                                      <span class="input-group-text"><i class="fas fa-envelope-square"></i></span>
                                  </div>
                                  <input type="text" class="form-control" name="owner_email" id="owner_email" value=""
                                         data-inputmask="'alias': 'email'" inputmode="email" data-mask="">
                              </div>
                          </div>
                      </div>
                  </div>
                      </div>
                      <div class="col-12 col-sm-4 col-md-4 col-lg-4 col-xl-4">
                        <div class="form-group">
                                <label class="input-label">Photo</label>

                                <div class="d-flex align-items-center">
                                    <!-- Avatar -->
                                    <label class="avatar avatar-xxl avatar-circle avatar-uploader mr-5" for="owner_profile_image">
                                        <img id="avatarProjectSettingsImg1" class="avatar-img" src="{{asset('theme/images/4.png')}}" alt="Image Description">

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
                                     <i class="fa fa-file" aria-hidden="true"></i>
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
                              <label for="passport">Passport </label>
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

         <div class="card card-info">
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
                                        <img id="avatarProjectSettingsImg2" class="avatar-img" src="{{asset('theme/images/4.png')}}" alt="Image Description">

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
                 <div class="card card-warning my-2">
            <div class="card-header">
                <h6 class="text-white">Documents</h6>
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
                  <input type="text" class="form-control" name="banking_name" id="banking_name" value="">
              </div>
          </div>
          <div class="form-group col-md-4">
              <label for="bank_name">Bank Name</label>
              <div class="input-group">
                  <div class="input-group-prepend">
                      <span class="input-group-text"><i class="fas fa-money-check-alt"></i></span>
                  </div>
                  <input type="text" class="form-control" name="bank_name" id="bank_name" value="">
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
        <div class="card card-info">
            <div class="card-header">
                <h4 class="card-title">Billing Address</h4>
            </div>
            <div class="card-body">

        <div class="row">
          <div class="form-group col-md-4">
              <label for="country_id">Country</label>
              
                  <select class="js-select2-custom" name="country_id" id="country_id">
                      <option value="">Select Country</option>
                      @foreach($countries as $country)
                          <option value="{{$country->id}}">{{$country->name}}</option>
                      @endforeach
                  </select>
              
          </div>
          <div class="form-group col-md-4">
              <label for="state_id">Emirates/State</label>
              <select class="js-select2-custom" name="state_id" id="state_id">
                  </select>
              
          </div>
          <div class="col-md-4"></div>
          <div class="form-group col-md-4">
              <label for="city">City</label>
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

         <div class="card card-info agent_type_company_grid">
             <div class="card-header">
                 <h4 class="card-title">Documents</h4>
             </div>
             <div class="card-body">
                 <div class="table-responsive">
                     <table class="table">
                         <thead>
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
            <div class="col-md-12 text-right">
                <input type="hidden" name="action" id="action" value="">
                <button id="action_save" class="btn btn-success  submit_action_btn submit_form_btn mx-1" type="submit">Save</button>
                <button id="action_preview" class="btn btn-success  submit_action_btn submit_form_btn mx-1" type="submit">Preview</button>
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

           $("#agent_type").on("change",function(){
              change_agent_type();
           });

           $(document).on("click",".submit_form_btn",function(){

               let action = $(this).attr("id");
               $("#action").val(action);
           });


           $('[data-mask]').inputmask();
           
            
            $("#add_data_form").on('submit',function(e){
                e.preventDefault();
                let url = "{{route('agent.store')}}";
                let params = new FormData(document.getElementById('add_data_form'));
                function fn_success(result)
                {
                   toast('success',result.message,'bottom-right');
                   let next_action = $("#action").val();
                    if (next_action === "action_preview") {
                        if (result.data.next_route) {
                            window.location.href = result.data.next_route;
                        }
                    }
                   $('#profile_image_grid').attr('src', '/theme/images/4.png');
                   $('#owner_profile_image_grid').attr('src', '/theme/images/4.png');
                   $("#add_data_form")[0].reset();
                }
                function fn_error(result)
                {
                    toast('error',result.message,'bottom-right');
                }
                $.fn_ajax_multipart(url,params,fn_success,fn_error);
            });

          change_agent_type();
       })(jQuery);
  </script>
@endsection
