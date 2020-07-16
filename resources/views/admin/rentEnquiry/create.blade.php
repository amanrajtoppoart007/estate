@extends('admin.layout.app')
@section('breadcrumb')
<div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h4 class="m-0 text-dark">Create Rent Inquiry</h4>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}">Home</a></li>
              <li class="breadcrumb-item active">Create Rent Inquiry</li>
            </ol>
          </div>
        </div>
      </div>
    </div>
@endsection
@section('content')
    <div class="card">
        <div class="card-body">
            {{Form::open(['route'=>'rentEnquiry.store','id'=>'add_data_form','autocomplete'=>'off'])}}
            <div class="card card-info">
                <div class="card-header">
                    <h6>Client Detail</h6>
                </div>
                <div class="card-body">
                   <div class="row">
            <div class="col-sm-6 col-md-8 row">
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
                                <label for="country_code">Nationality</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="fa fa-flag"></i></span>
                                    </div>
                                    <select  class="form-control" name="country_code" id="country_code">
                                        <option value="">Select Country</option>
                                        @foreach($countries as $country)
                                            <option value="{{$country->code}}">{{$country->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>


                <div class="col-sm-12 col-md-4 col-lg-4 col-xl-4">
                    <div class="form-group">
                    <label for="address">Address</label>
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fa fa-map-marker"></i></span>
                        </div>
                        <input type="text" class="form-control" name="address" id="address" value="">
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
                          <i class="fa fa-upload" aria-hidden="true"></i>
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
                    <h6>Inquiry Detail</h6>
                </div>
                <div class="card-body">
                    <table class="table">
                        <tbody>
                        <tr>
                            <th>Category</th>
                            <td>
                                <select name="category" id="category" class="form-control">
                                    <option value="">Select Category</option>
                                    <option value="residential">Residential</option>
                                    <option value="commercial">Commercial</option>
                                    <option value="land">Land</option>
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <th>Property Type</th>
                            <td>
                                <select name="property_type" id="property_type" class="form-control">
                                    <option value="">Select Category</option>
                                    <option value="apartment">Apartment</option>
                                    <option value="villa">Villa</option>
                                    <option value="townhouse">TownHouse</option>
                                    <option value="office">Office</option>
                                    <option value="retail">Retail</option>
                                    <option value="shop">Shop</option>
                                    <option value="warehouse">WareHouse</option>
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <th>Preferred Location</th>
                            <td>
                                <input type="text" class="form-control" name="preferred_location" id="preferred_location" value="">
                            </td>
                        </tr>
                        <tr>
                            <th>No. Of Bedrooms</th>
                            <td>
                                <input type="text" class="form-control numeric" name="bedroom" id="bedroom" value="">
                            </td>
                        </tr>
                        <tr>
                            <th>Budget</th>
                            <td>
                                <input type="text" class="form-control numeric" name="budget" id="budget" value="">
                            </td>
                        </tr>
                        <tr>
                            <th>Tenancy Type</th>
                            <td>
                                <select name="tenancy_type" id="tenancy_type" class="form-control">
                                    <option value="">Select Tenancy</option>
                                    <option value="family_husband_wife">Family (Husband & Wife)</option>
                                    <option value="family_brother_sister">Family (Brother & Sister)</option>
                                    <option value="company">Company</option>
                                    <option value="bachelor">Bachelor</option>
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <th>Number Of Tenants</th>
                            <td>
                                <input type="text" class="form-control numeric" name="tenant_count" id="tenant_count" value="">
                            </td>
                        </tr>
                        <tr>
                            <th>Agent</th>
                            <td>
                                <select name="agent_id" id="agent_id" class="form-control">
                                    <option value="">Select Agent</option>
                                    @foreach($agents as $agent)
                                        <option value="{{$agent->id}}">{{$agent->name}}</option>
                                    @endforeach
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <th>Source</th>
                            <td>
                                <select name="source" id="source" class="form-control">
                                    <option value="">Select Source</option>
                                    <option value="website">Website</option>
                                    <option value="walk_in">Walk In</option>
                                    <option value="broker">Broker</option>
                                </select>
                            </td>
                        </tr>
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="form-group text-right">
                <button class="btn btn-primary">Save</button>
            </div>
            {{Form::close()}}
        </div>
    </div>
@endsection
@section('script')
    <script>
        $(document).ready(function(){
            function render_image(input) {
                if (input.files && input.files[0]) {
                    var reader = new FileReader();
                    reader.onload = function (e) {
                        $('#profile_image_grid').attr('src', e.target.result);
                    }
                    reader.readAsDataURL(input.files[0]);
                }
            }

            $("#profile_image").change(function () {
                render_image(this);
            });
            $("#remove_profile_image").click(function () {
                $('#profile_image_grid').attr('src', '/theme/default/images/dashboard/4.png');
                var file = document.getElementById("profile_image");
                file.value = file.defaultValue;
            });
            $("#profile_image_grid").on('click', function () {
                $("#profile_image").click();
            });

            $("#add_data_form").on("submit",function(e){
                e.preventDefault();
                let url = "{{route('rentEnquiry.store')}}";
                let params = new FormData(document.getElementById("add_data_form"));
                function fn_success(result)
                {
                   toast('success',result.message,'bottom-right');
                   $("#add_data_form")[0].reset();
                   $('#profile_image_grid').attr('src', '/theme/default/images/dashboard/4.png');
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
