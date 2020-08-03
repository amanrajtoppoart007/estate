@extends('admin.layout.app')
@section('breadcrumb')
<div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h4 class="m-0 text-dark">Add Property Owner</h4>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}">Home</a></li>
              <li class="breadcrumb-item active">Add property owner</li>
            </ol>
          </div>
        </div>
      </div>
    </div>
@endsection
@section('content')
 <div class="card" style="box-shadow: none;">
     <div class="card-body">
         {{Form::open(['route'=>'owner.store','id'=>'add_data_form','autocomplete'=>'off'])}}
         <input type="hidden" name="owner_type" value="flat_owner">
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
                                <option value="">Owner Type</option>
                                <option value="individual">individual</option>
                                <option value="company">Company</option>
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
                            <input type="text" class="form-control" name="name" id="name" value="">
                        </div>
                    </div>
                </div>
                <div class="col-sm-12 col-md-4 col-lg-4 col-xl-4">
                            <div class="form-group">
                                <label for="country_code">Country Code</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="fas fa-code"></i></span>
                                    </div>
                                    <select  class="form-control" name="country_code" id="country_code">
                                        <option value="">Country Code</option>
                                        <option value="971">971 (UAE)</option>
                                        <option value="91">91 (INDIA)</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                <div class="col-sm-12 col-md-4 col-lg-4 col-xl-4">
                    <div class="form-group">
                        <label for="mobile">Mobile</label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-phone"></i></span>
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
                <div class="text-center">
                  <div class="user_photo">
                    <img id="profile_image_grid" src="{{asset('theme/default/images/dashboard/4.png')}}" style="width:250px;margin-bottom:10px;" alt="">
                    <div style="position: absolute;top:211px;right:72px;">
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
                     <input type="text" class="form-control" name="emirates_exp_date" id="emirates_exp_date" value="">
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
                               <input type="text" class="form-control" name="passport_exp_date" id="passport_exp_date" value="">
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
                               <input type="text" class="form-control" name="visa_exp_date" id="visa_exp_date" value="">
                               </div>
                           </div>
                       </div>
                       <div class="col-12 col-sm-6 col-md-3 col-lg-3 col-xl-3">
                           <div class="form-group">
                               <label for="poa_exp_date">Power Of Attorney (Expiry Date)</label>
                               <div class="input-group">
                                  <div class="input-group-prepend">
                                      <span class="input-group-text">
                                          <i class="fab fa-cc-visa"></i>
                                      </span>
                                  </div>
                               <input type="text" class="form-control" name="poa_exp_date" id="poa_exp_date" value="">
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
                         <h6>Authorized Person Detail</h6>
                     </div>
                     <div class="col">
                         <input type="checkbox" class="d-none" name="authorised_person_required" id="authorised_person_required" value="1">
                         <button type="button" id="add_auth_person_detail_btn" class="btn btn-warning float-right text-white" data-toggle="collapse" data-target="#auth_person_detail" aria-expanded="false" aria-controls="auth_person_detail">Add Authorised person</button>
                     </div>
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
                             <div class="col-12 col-sm-4 col-md-4 col-lg-4 col-xl-4">
                                 <div class="form-group">
                                     <label for="auth_person_country_code">Country Code</label>
                                     <div class="input-group">
                                         <div class="input-group-prepend">
                                             <span class="input-group-text"><i class="fas fa-code"></i></span>
                                         </div>
                                         <select class="form-control" name="auth_person_country_code"
                                                 id="auth_person_country_code">
                                             <option value="">Country Code</option>
                                             <option value="971">971 (UAE)</option>
                                             <option value="91">91 (INDIA)</option>
                                         </select>
                                     </div>
                                 </div>
                             </div>
                             <div class="col-sm-12 col-md-4 col-lg-4 col-xl-4">
                                 <div class="form-group">
                                     <label for="auth_person_mobile">Mobile</label>
                                     <div class="input-group">
                                         <div class="input-group-prepend">
                                             <span class="input-group-text"><i class="fas fa-phone"></i></span>
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
                         <div class="text-center">
                             <div class="user_photo" style="height: 250px;">
                                 <img id="auth_person_image_grid" src="{{asset('theme/default/images/dashboard/4.png')}}"
                                      style="width:250px;margin-bottom:10px;" alt="">
                                 <div style="position:absolute;top:211px;right:72px;">
                                     <label class="btn btn-primary mb-0" for="auth_person_image">
                                         <i class="fa fa-upload" aria-hidden="true"></i>
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
                     <input type="text" class="form-control" name="auth_person_emirates_exp_date" id="auth_person_emirates_exp_date" value="">
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
                               <input type="text" class="form-control" name="auth_person_passport_exp_date" id="auth_person_passport_exp_date" value="">
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
                               <input type="text" class="form-control" name="auth_person_visa_exp_date" id="auth_person_visa_exp_date" value="">
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
                               <input type="text" class="form-control" name="auth_poa_exp_date" id="auth_poa_exp_date" value="">
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
        <div class="card card-info">
            <div class="card-header">
                <h6>Billing Address Detail</h6>
            </div>
            <div class="card-body">
        <div class="row">
          <div class="form-group col-md-4">
              <label for="country">Country</label>
              <div class="input-group">
                  <div class="input-group-prepend">
                      <span class="input-group-text"><i class="fas fa-flag"></i></span>
                  </div>
                  <input type="text" class="form-control" name="country" id="country" value="">
              </div>
          </div>
          <div class="form-group col-md-4">
              <label for="state">State</label>
              <div class="input-group">
                  <div class="input-group-prepend">
                      <span class="input-group-text"><i class="fas fa-map-marker"></i></span>
                  </div>
                  <input type="text" class="form-control" name="state" id="state" value="">
              </div>
          </div>
          <div class="col-md-4"></div>
          <div class="form-group col-md-4">
              <label for="city">City</label>
              <div class="input-group">
                  <div class="input-group-prepend">
                      <span class="input-group-text"><i class="fas fa-city"></i></span>
                  </div>
                  <input type="text" class="form-control" name="city" id="city" value="">
              </div>
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
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fas fa-map-pin"></i></span>
                        </div>
                        <input type="text" class="form-control" name="license_expiry_date" id="license_expiry_date" value="">
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
            <input type="hidden" id="action" name="action" value="">
            <div class="col-md-12 text-right">
                <button id="action_save"  class="btn btn-success  save_action_btn" type="submit">Save</button>
                <button id="action_preview" class="btn btn-success  save_action_btn" type="submit">Preview</button>
                {{--<button id="action_allocate_unit" class="btn btn-success  save_action_btn" type="submit">Allocate Unit</button>--}}
            </div>
        </div>
        {{Form::close()}}
     </div>
 </div>
@endsection
@section('modal')
    @include("admin.owner.allocate")
@endsection
 @section('head')
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

           $(document).on("click",".save_action_btn",function(e){
               e.stopPropagation();
               let action = $(this).attr("id");
               $("#action").val(action);
               e.enableEventPropagation();

           });

           $("#add_auth_person_detail_btn").on("click",function(){
              if($("#authorised_person_required").is(":checked")) {
                  $("#authorised_person_required").prop({"checked": false});
              }
               else
              {
                  $("#authorised_person_required").prop({"checked": true});
              }
           });
           let pickers =
               [
                   'emirates_exp_date',
                   'visa_exp_date',
                   'passport_exp_date',
                   'poa_exp_date',
                   'auth_person_emirates_exp_date',
                   'auth_person_visa_exp_date',
                   'auth_person_passport_exp_date',
                   'auth_poa_exp_date',
                   'license_expiry_date',
               ];
           pickers.forEach(function(item){
               $(`#${item}`).datepicker({ footer: true, modal: true,format: 'dd-mm-yyyy', minDate : '{{now()->format('d-m-Y')}}'});
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
                $('#profile_image_grid').attr('src', '/theme/default/images/dashboard/4.png');
                let file = document.getElementById("profile_image");
                file.value = file.defaultValue;
            });
            $("#remove_auth_person_image").click(function(){
                $('#auth_person_image_grid').attr('src', '/theme/default/images/dashboard/4.png');
                let file = document.getElementById("profile_image");
                file.value = file.defaultValue;
            });
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
                        html+=`<option value="${item.id}">${item.flat_house_no}</option>`;
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
