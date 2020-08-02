@extends('admin.layout.app')
@section('breadcrumb')
<div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h4 class="m-0 text-dark">Create Sales Inquiry</h4>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}">Home</a></li>
              <li class="breadcrumb-item active">Create Sales Inquiry</li>
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
                            <th>Preferred City</th>
                            <td>
                                <select name="preferred_city" id="preferred_city" class="form-control">
                                    <option value="">Select City</option>
                                    @foreach($cities as $city)
                                        <option value="{{$city->id}}">{{$city->name}}</option>
                                    @endforeach
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
                                <select class="form-control" name="bedroom" id="bedroom">
                                    <option value="">Select no.</option>
                                    @for($i=1;$i<7;$i++)

                                        <option value="{{$i}}">{{$i}}</option>

                                        @endfor
                                    <option value="7+">7+</option>
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <th>Budget</th>
                            <td>
                                <input type="text" class="form-control numeric" name="budget" id="budget" value="">
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
                        <tr id="website_grid" class="d-none">
                            <th>WebSite</th>
                            <td>
                                 <input type="text" class="form-control" name="website" id="website" value="">
                            </td>
                        </tr>
                        </tbody>
                    </table>
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
                     <label for="emirates_id_doc">Emirates Id </label>
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

          </div>
          <div class="row">
            <div class="col-12 col-sm-6 col-md-3 col-lg-3 col-xl-3">
                 <div class="form-group">
                     <label for="emirates_exp_date">Validity </label>
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
                               <label for="passport_exp_date">Validity</label>
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
                               <label for="visa_exp_date">Validity</label>
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
            <div class="form-group text-right">
                <button class="btn btn-primary">Save</button>
            </div>
            {{Form::close()}}
        </div>
    </div>
@endsection
 @section('head')
    <link rel="stylesheet" href="{{asset('plugin/datetimepicker/css/gijgo.min.css')}}">
@endsection
@section('js')
<script src="{{asset('assets/plugins/inputmask/jquery.inputmask.bundle.js')}}"></script>
<script src="{{asset('plugin/datetimepicker/js/gijgo.min.js')}}"></script>
@endsection
@section('script')
    <script>
        $(document).ready(function(){

             $("#source").on("change",function(e){
                e.preventDefault();
                let value = $(this).val();
                if(value==="website")
                {
                    $("#website_grid").removeClass("d-none");
                }
                else
                {
                     $("#website_grid").addClass("d-none");
                }
            });

            let pickers =
               [
                   'emirates_exp_date',
                   'visa_exp_date',
                   'passport_exp_date',
               ];
           pickers.forEach(function(item){
               $(`#${item}`).datepicker({ footer: true, modal: true,format: 'dd-mm-yyyy', minDate : '{{now()->format('d-m-Y')}}'});
           });

            function render_image(input) {
                if (input.files && input.files[0]) {
                    let reader = new FileReader();
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
                let file = document.getElementById("profile_image");
                file.value = file.defaultValue;
            });
            $("#profile_image_grid").on('click', function () {
                $("#profile_image").click();
            });

            $("#add_data_form").on("submit",function(e){
                e.preventDefault();
                let url = "{{route('salesEnquiry.store')}}";
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
