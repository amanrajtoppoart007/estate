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
                                        <label for="tenant_type">Tenant Type</label>
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
                                        <label for="tenant_name">Tenant Name</label>
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
                                        <label for="email">Email</label>
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
                                        <label for="mobile">Mobile</label>
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
                                        <label for="country">Country</label>
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
                                        <label for="city">City</label>
                                         <div class="input-group">
                                         <div class="input-group-prepend">
                                             <span class="input-group-text"><i class="fas fa-user"></i></span>
                                         </div>
                                         <input type="text" name="city" class="form-control" value="">
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
                    <h6>Address Detail</h6>
                </div>
            </div>
            <div class="card card-info">
                <div class="card-header">
                    <h6>Company Detail</h6>
                </div>
            </div>
            <div class="card card-info">
                <div class="card-header">
                    <h6>Documents</h6>
                </div>
            </div>
            <div class="card card-info">
                <div class="card-header">
                    <h6>Family Detail</h6>
                </div>
            </div>
        {{Form::close()}}
        </div>
    </div>
@endsection
