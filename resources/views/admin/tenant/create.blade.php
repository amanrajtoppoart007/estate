@extends('admin.layout.app')
@section('content')
    <div class="card">
        <div class="card-body">
          {{Form::open(['route'=>'tenant.store','method'=>'post','autocomplete'=>'off'])}}
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
                                             <span class="input-group-text"><i class="fas fa-user"></i></span>
                                         </div>
                                        <select name="tenant_type" id="tenant_type" class="form-control">
                                            <option value="">Select Tenancy</option>
                                            <option value="family_husband_wife">Family(Husband-Wife)</option>
                                            <option value="family_brother_sister">Family(Brother-Sister)</option>
                                            <option value="company">Company</option>
                                            <option value="bachelor">Bachelor</option>
                                        </select>
                                     </div>

                                    </div>
                                </div>
                                <div class="col-12 col-sm-6 col-md-6 col-lg-6 col-xl-6">
                                    <div class="form-group">
                                        <label for="tenant_name">Tenant Name <span class="text-danger">*</span></label>
                                         <div class="input-group">
                                         <div class="input-group-prepend">
                                             <span class="input-group-text"><i class="fas fa-user"></i></span>
                                         </div>
                                        <input class="form-control" name="tenant_name" id="tenant_name" type="text"  value="" autocomplete="off">
                                     </div>

                                    </div>
                                </div>
                                <div class="col-12 col-sm-6 col-md-6 col-lg-6 col-xl-6">
                                    <div class="form-group">
                                        <label for="email">Email <span class="text-danger">*</span></label>
                                         <div class="input-group">
                                         <div class="input-group-prepend">
                                             <span class="input-group-text"><i class="fas fa-user"></i></span>
                                         </div>
                                        <input type="text" name="email" id="email" class="form-control" autocomplete="off" value="">
                                     </div>
                                    </div>
                                </div>
                                <div class="col-12 col-sm-6 col-md-6 col-lg-6 col-xl-6">
                                    <div class="form-group">
                                        <label for="password">Password <span class="text-danger">*</span></label>
                                         <div class="input-group">
                                         <div class="input-group-prepend">
                                             <span class="input-group-text"><i class="fas fa-user"></i></span>
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
                                                         <option value="{{$country->code}}">+{{$country->code}}</option>
                                                     @endforeach
                                                  </select>
                                             </span>
                                         </div>
                                        <input type="text" name="mobile" id="mobile" class="form-control numeric" autocomplete="off" value="">
                                     </div>
                                    </div>
                                </div>
                                 <div class="col-12 col-sm-6 col-md-6 col-lg-6 col-xl-6">
                                    <div class="form-group">
                                        <label for="country">Nationality <span class="text-danger">*</span></label>
                                         <div class="input-group">
                                         <div class="input-group-prepend">
                                             <span class="input-group-text"><i class="fas fa-user"></i></span>
                                         </div>
                                             <select name="country" id="country" class="form-control">
                                                 <option>Select Country</option>
                                                 @foreach($countries as $country)
                                                     <option value="{{$country->id}}">{{$country->name}}</option>
                                                 @endforeach
                                             </select>
                                     </div>
                                    </div>
                                </div>
                                <div class="col-12 col-sm-6 col-md-6 col-lg-6 col-xl-6">
                                    <div class="form-group">
                                        <label for="city">City <span class="text-danger">*</span></label>
                                         <div class="input-group">
                                         <div class="input-group-prepend">
                                             <span class="input-group-text"><i class="fas fa-user"></i></span>
                                         </div>
                                         <input type="text" name="city" class="form-control" value="">
                                     </div>
                                    </div>
                                </div>
                                <div class="col-12 col-sm-6 col-md-6 col-lg-6 col-xl-6">
                                    <div class="form-group">
                                        <label for="address">Address <span class="text-danger">*</span></label>
                                         <div class="input-group">
                                         <div class="input-group-prepend">
                                             <span class="input-group-text"><i class="fas fa-user"></i></span>
                                         </div>
                                         <textarea type="text" name="address" id="address" class="form-control">
                                         </textarea>
                                     </div>
                                    </div>
                                </div>
                                <div class="col-12 col-sm-6 col-md-6 col-lg-6 col-xl-6">
                                    <div class="form-group">
                                        <label for="dob">Date Of Birth</label>
                                         <div class="input-group">
                                         <div class="input-group-prepend">
                                             <span class="input-group-text"><i class="fas fa-user"></i></span>
                                         </div>
                                         <input type="text" name="dob" id="dob" class="form-control" placeholder="DD-MM-YY (Optional)">
                                     </div>
                                    </div>
                                </div>
                                <div class="col-12 col-sm-6 col-md-6 col-lg-6 col-xl-6">
                                    <div class="form-group">
                                        <label for="tenant_count">Tenant Count <span class="text-danger">*</span></label>
                                         <div class="input-group">
                                         <div class="input-group-prepend">
                                             <span class="input-group-text"><i class="fas fa-user"></i></span>
                                         </div>
                                         <input type="text" name="tenant_count" class="form-control numeric" placeholder="Enter number of tenants">
                                     </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-sm-12 col-md-4 col-lg-4 col-xl-4 text-right">
                            <img id="profile_image_grid" src="{{asset('theme/default/images/dashboard/4.png')}}"
                                 style="width: 250px;margin-bottom: 10px;" alt="">
                            <div>
                                <label class="btn btn-primary mb-0 mr-2" for="profile_image">Upload Icon</label>
                                <input id="profile_image" class="hide" type="file" name="profile_image">
                                <button type="button" id="remove_profile_image" class="btn btn-danger">Delete Icon
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="card card-info">
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
                                          <i class="fa fa-passport"></i>
                                      </span>
                                  </div>
                               <input type="text" class="form-control" name="company_name" id="company_name" value="">
                               </div>
                           </div>
                        </div>
                        <div class="col-12 col-sm-6 com-md-3 col-lg-3 col-xl-3">
                            <div class="form-group">
                               <label for="trade_licence">Trade Certificate</label>
                               <div class="input-group">
                                  <div class="input-group-prepend">
                                      <span class="input-group-text">
                                          <i class="fa fa-passport"></i>
                                      </span>
                                  </div>
                               <input type="file" class="form-control" name="trade_licence" id="trade_licence" value="">
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
                                <i class="fa fa-passport"></i>
                            </span>
                        </div>
                     <input type="file" class="form-control" name="emirates_id" id="emirates_id" value="">
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
                               </div>
                           </div>
                       </div>
                       <div class="col-12 col-sm-6 col-md-3 col-lg-3 col-xl-3">
                           <div class="form-group">
                               <label for="bank_passbook">Bank Statement</label>
                               <div class="input-group">
                                  <div class="input-group-prepend">
                                      <span class="input-group-text">
                                          <i class="fab fa-cc-visa"></i>
                                      </span>
                                  </div>
                               <input type="file" class="form-control" name="bank_passbook" id="bank_passbook" value="">
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
                                <i class="fa fa-passport"></i>
                            </span>
                        </div>
                     <input type="text" class="form-control" name="emirates_id_exp_date" id="emirates_id_exp_date" value="">
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
                               <label for="bank_passbook_exp_date">Bank Statement (Expiry Date)</label>
                               <div class="input-group">
                                  <div class="input-group-prepend">
                                      <span class="input-group-text">
                                          <i class="fab fa-cc-visa"></i>
                                      </span>
                                  </div>
                               <input type="text" class="form-control" name="bank_passbook_exp_date" id="bank_passbook_exp_date" value="">
                               </div>
                           </div>
                       </div>
          </div>
                </div>
            </div>
            <div class="card card-info">
                <div class="card-header">
                    <h6>Family Detail</h6>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Name</th>
                                <th>Relation/Designation</th>
                                <th>Amirates Id</th>
                                <th>Passport</th>
                                <th>Visa</th>
                                <th>add/remove</th>
                            </tr>
                        </thead>
                        <tbody id="family_detail_grid">
                            <tr>
                                <td>#</td>
                                <td> <input type="text" class="form-control"  name="rel_name[]" value=""> </td>
                                <td><input type="text" class="form-control"  name="rel_relationship[]" value=""></td>
                                <td><input type="file" class="form-control"  name="rel_amirates_id[]"></td>
                                <td><input type="file" class="form-control"  name="rel_passport[]"></td>
                                <td><input type="file" class="form-control"  name="rel_visa[]"></td>
                                <td>
                                    <a class="btn-sm btn-success text-white add_more_family_member"><i class="fa fa-plus"></i></a>
                                    <a class="btn-sm btn-danger text-white"><i class="fa fa-times"></i></a>
                                </td>
                            </tr>
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
                        <div class="col-12 col-sm-6 col-md-3 col-lg-3 col-xl-3">
                           <div class="form-group">
                               <label for="no_sharing_agreement">No sharing agreement</label>
                               <div class="input-group">
                                  <div class="input-group-prepend">
                                      <span class="input-group-text">
                                          <i class="fab fa-cc-visa"></i>
                                      </span>
                                  </div>
                               <input type="file" class="form-control" name="no_sharing_agreement" id="no_sharing_agreement" value="">
                               </div>
                           </div>
                       </div>
                       <div class="col-12 col-sm-6 col-md-3 col-lg-3 col-xl-3">
                           <div class="form-group">
                               <label for="marriage_certificate">Marriage Certificate</label>
                               <div class="input-group">
                                  <div class="input-group-prepend">
                                      <span class="input-group-text">
                                          <i class="fab fa-cc-visa"></i>
                                      </span>
                                  </div>
                               <input type="file" class="form-control" name="marriage_certificate" id="marriage_certificate" value="">
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
