@extends('admin.layout.app')
@section('breadcrumb')
<div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h4 class="m-0 text-dark">Add Property Agent</h4>
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
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="fas fa-user"></i></span>
                                    </div>
                                    <select   class="form-control" name="agent_type" id="agent_type">
                                        <option value="">Owner Type</option>
                                        <option value="individual">individual</option>
                                        <option value="company" selected>Company</option>
                                    </select>
                                </div>
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
                            <span class="input-group-text">
                                <select name="country_code" id="country_code">
                                    @foreach($countries as $country)
                                        <option value="{{$country->code}}">+{{$country->code}}</option>
                                    @endforeach
                                </select>
                            </span>
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
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fas fa-unlock-alt"></i></span>
                        </div>
                        <input type="text" class="form-control" name="license_expiry_date" id="license_expiry_date" value="">
                    </div>
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
                <div class="text-center">
                  <div class="user_photo">
                    <img id="profile_image_grid" src="{{asset('theme/images/4.png')}}" style="width:250px;margin-bottom:10px;" alt="">
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
                            <span class="input-group-text">
                                <select name="country_code" class="phone_code">
                                  @foreach($countries as $country)
                                        <option value="{{$country->code}}">+{{$country->code}}</option>
                                    @endforeach
                                </select>
                            </span>
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
                          <div class="text-center">
                          <div class="user_photo">
                            <img id="owner_profile_image_grid" src="{{asset('theme/images/4.png')}}" style="width:250px;margin-bottom:10px;" alt="">
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
                                     <i class="fa fa-file" aria-hidden="true"></i>
                                    </span>
                                  </div>
                                  <input type="file" class="form-control" name="emirates_id_doc"
                                         id="emirates_id_doc" value="">
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
                                  <input type="file" class="form-control" name="passport" id="passport"
                                         value="">
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
                                  <input type="file" class="form-control" name="visa" id="visa" value="">
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
                                    <i class="fa fa-file" aria-hidden="true"></i>
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
                                 <input type="checkbox" id="authorised_person_required"  name="authorised_person_required">
                                 <label for="authorised_person_required" id="add_auth_person_detail_btn" data-toggle="collapse" data-target="#auth_person_detail" aria-expanded="false" aria-controls="auth_person_detail">
                                     Add Authorised person
                                 </label>
                             </span>
                         </button>

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

                             <div class="col-sm-12 col-md-4 col-lg-4 col-xl-4">
                                 <div class="form-group">
                                     <label for="auth_person_mobile">Mobile</label>
                                     <div class="input-group">
                                         <div class="input-group-prepend">
                                             <span class="input-group-text">
                                                 <select name="auth_person_country_code" id="auth_person_country_code">
                                                     @foreach($countries as $country)
                                                          @php $selected = ($country->code==971)?"selected":null; @endphp
                                                         <option value="{{$country->code}}" {{$selected}}>+{{$country->code}}</option>
                                                     @endforeach
                                                </select>
                                             </span>
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
                                 <img id="auth_person_image_grid" src="{{asset('theme/images/4.png')}}"
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
                               <label for="auth_poa_exp_date">Power Of Attorney (Issue Date)</label>
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
              <div class="input-group">
                  <div class="input-group-prepend">
                      <span class="input-group-text"><i class="fas fa-flag"></i></span>
                  </div>
                  <select class="form-control" name="country_id" id="country_id">
                      <option value="">Select Country</option>
                      @foreach($countries as $country)
                          <option value="{{$country->id}}">{{$country->name}}</option>
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
                  <select class="form-control" name="state_id" id="state_id">
                  </select>
              </div>
          </div>
          <div class="col-md-4"></div>
          <div class="form-group col-md-4">
              <label for="city">City</label>
              <div class="input-group">
                  <div class="input-group-prepend">
                      <span class="input-group-text"><i class="fas fa-city"></i></span>
                  </div>
                  <select class="form-control" name="city_id" id="city_id">
                  </select>
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

         <div class="card card-info agent_type_company_grid">
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
            <div class="col-md-12 text-right">
                <input type="hidden" name="action" id="action" value="">
                <button id="action_save" class="btn btn-success  submit_action_btn submit_form_btn mx-1" type="submit">Save</button>
                <button id="action_preview" class="btn btn-success  submit_action_btn submit_form_btn mx-1" type="submit">Preview</button>
            </div>
        </div>
        {{Form::close()}}
     </div>
 </div>
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

           let pickers =
               [
                   'emirates_exp_date',
                   'visa_exp_date',
                   'passport_exp_date',
                   'license_expiry_date',
                   'auth_person_emirates_exp_date',
                   'auth_person_passport_exp_date',
                   'auth_person_visa_exp_date',
               ];
           pickers.forEach(function(item){
               $(`#${item}`).datepicker({ footer: true, modal: true,format: 'dd-mm-yyyy', minDate : '{{now()->format('d-m-Y')}}'});
           });

           $("#auth_poa_exp_date").datepicker({ footer: true, modal: true,format: 'dd-mm-yyyy', maxDate : '{{now()->format('d-m-Y')}}'});

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
