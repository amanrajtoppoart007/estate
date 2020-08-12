@extends('admin.layout.app')
@section('breadcrumb')
<div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h4 class="m-0 text-dark">Add Property Agent (Individual Type)</h4>
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
                  <h6>Agent Detail</h6>
              </div>
              <div class="card-body">
                  <div class="row">
            <div class="col-sm-6 col-md-8 row">
                <div class="col-sm-12 col-md-6 col-lg-6 col-xl-6">
                            <div class="form-group">
                                <label for="agent_type">Broker Type</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="fas fa-user"></i></span>
                                    </div>
                                    <select   class="form-control" name="agent_type" id="agent_type" disabled>
                                        <option value="">Broker Type</option>
                                        <option value="individual" selected>individual</option>
                                    </select>
                                    <input type="hidden" name="agent_type" value="individual">
                                </div>
                            </div>
                        </div>
                <div class="form-group col-md-6">
                    <label for="name">Name</label>
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fas fa-user"></i></span>
                        </div>
                        <input type="text" class="form-control" name="name" id="name" value="">
                    </div>
                </div>
                <div class="form-group col-md-6">
                    <label for="mobile">Mobile</label>
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
            </div>
            <div class="col-sm-6 col-md-4">
                <div class="text-center">
                  <div class="user_photo">
                    <img id="profile_image_grid" src="{{asset('theme/default/images/dashboard/4.png')}}" style="width:250px;margin-bottom:10px;" alt="">
                    <div style="position:absolute;top:211px;right:72px;">
                      <label class="btn btn-primary mb-0" for="profile_image">
                          <i class="fa fa-upload"></i>
                      </label>
                      <input id="profile_image" class="hide" type="file" name="photo">
                      <button type="button" id="remove_profile_image" class="btn btn-danger">
                          <i class="fa fa-trash"></i>
                      </button>
                    </div>
                  </div>
                </div>
            </div>
        </div>
              </div>
          </div>
         <div class="card card-info">
              <div class="card-header">
                  <h6 class="text-white">Documents</h6>
              </div>
              <div class="card-body">
                  <div class="row">
                      <div class="col-12 col-sm-6 col-md-3 col-lg-3 col-xl-3">
                          <div class="form-group">
                              <label for="emirates_id_doc">Emirates Id </label>
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
                              <label for="passport">Passport</label>
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
                              <label for="visa">Visa</label>
                              <div class="input-group">
                                  <div class="input-group-prepend">
                                    <span class="input-group-text">
                                    <i class="fab fa-cc-visa"></i>
                                    </span>
                                  </div>
                                  <input type="file" class="form-control" name="visa" id="visa"
                                         value="">
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
                                    <i class="fa fa-file" aria-hidden="true"></i>
                                    </span>
                                  </div>
                                  <input type="text" class="form-control" name="emirates_exp_date"
                                         id="emirates_exp_date" value="">
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
                                  <input type="text" class="form-control" name="passport_exp_date"
                                         id="passport_exp_date" value="">
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
        <div class="card card-info">
            <div class="card-header">
                <h6>Account Detail</h6>
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
            <div class="form-group col-md-4"></div>
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
                 <h6>Address Detail</h6>
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
              <label for="state_id">State</label>
              <div class="input-group">
                  <div class="input-group-prepend">
                      <span class="input-group-text"><i class="fas fa-map-marker"></i></span>
                  </div>
                  <select  class="form-control" name="state_id" id="state_id">
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
        <div class="row">
            <div class="col-md-12 text-right">
                <input type="hidden" name="action" id="action" value="">
                <button id="action_save" class="btn btn-success  submit_form_btn mx-1" type="submit">Save</button>
                <button  id="action_preview" class="btn btn-success  submit_form_btn mx-1" type="submit">Preview</button>
            </div>
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

           $("#country_id").on("change",function(){
               $.get_state_list($("#country_id"),$("#state_id"));
           });

           $("#state_id").on("change",function(){
               $.get_city_list($("#state_id"),$("#city_id"));
           });

            $(document).on("click",".submit_form_btn",function(e){
               e.stopPropagation();
               let action = $(this).attr("id");
               $("#action").val(action);
               e.enableEventPropagation();

           });

           $('[data-mask]').inputmask();

           let pickers =
               [
                   'emirates_exp_date',
                   'visa_exp_date',
                   'passport_exp_date',
               ];
           pickers.forEach(function(item){
               $(`#${item}`).datepicker({ footer: true, modal: true,format: 'dd-mm-yyyy', minDate : '{{now()->format('d-m-Y')}}'});
           });

           function render_image(input)
            {
                if(input.files && input.files[0])
                {
                var reader = new FileReader();
                reader.onload = function (e) {
                    $('#profile_image_grid').attr('src', e.target.result);
                }
                reader.readAsDataURL(input.files[0]);
                }
            }
            $("#profile_image").change(function(){
                render_image(this);
            });
            $("#remove_profile_image").click(function(){
                $('#profile_image_grid').attr('src', '/theme/default/images/dashboard/4.png');
                let file = document.getElementById("profile_image");
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
