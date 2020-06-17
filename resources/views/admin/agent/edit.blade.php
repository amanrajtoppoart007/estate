@extends('admin.layout.app')
@section('breadcrumb')
<div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h5 class="m-0 text-dark">Add Property Agent</h5>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}">Home</a></li>
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
         {{Form::open(['url'=>route('agent.update',$agent->id),'id'=>'edit_data_form'])}}
       <div class="card card-info">
           <div class="card-header">
               <h6>Agent Detail</h6>
           </div>
        <div class="card-body">
          <div class="row">
            <div class="col-sm-6 col-md-8 row">
                <div class="form-group col-md-6">
                    <label for="name">Name</label>
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fas fa-user"></i></span>
                        </div>
                    <input type="text" class="form-control" name="name" id="name" value="{{$agent['name']}}">
                    </div>
                </div>
                <div class="form-group col-md-6">
                    <label for="mobile">Mobile</label>
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fas fa-phone"></i></span>
                        </div>
                        <input type="text" class="form-control numeric" name="mobile" id="mobile" value="{{$agent['mobile']}}">
                    </div>
                </div>
                <div class="form-group col-md-6">
                    <label for="email">Email</label>
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fas fa-envelope-square"></i></span>
                        </div>
                        <input type="text" class="form-control" name="email" id="email" value="{{$agent['email']}}">
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
                      @php
                         if(!empty($agent->photo))
                         {
                             $img = route('get.doc',base64_encode($agent->photo));
                         }
                         else
                         {
                             $img = asset('theme/default/images/dashboard/4.png');
                         }
                      @endphp
                    <img id="profile_image_grid" src="{{$img}}" style="width:250px;margin-bottom:10px;" alt="">
                    <div class=" ml-5 d-table" style="margin-left:4rem!important;">
                      <label class="btn btn-primary mb-0 mr-3" for="profile_image">Upload File</label>
                      <input id="profile_image" class="hide" type="file" name="photo">
                      <button type="button" id="remove_profile_image" class="btn btn-danger">Delete Photo
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
                         @php
                             $emirates_id = 'javascript:void(0)';
                              if(!empty($agent->emirates_id_doc))
                              {
                                  $emirates_id = route('get.doc',base64_encode($agent->emirates_id_doc));
                              }
                         @endphp
                         <div class="input-group-append">
                               <span class="input-group-text">
                                   <a data-toggle="tooltip" title="Click to view the file" href="{{$emirates_id}}" {{($agent->emirates_id_doc)?'target=_blank':''}}>
                                       <i class="fa fa-file"></i>
                                   </a>
                               </span>
                         </div>
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
                                   @php
                                       $passport = 'javascript:void(0)';
                                        if(!empty($agent->passport))
                                        {
                                            $passport = route('get.doc',base64_encode($agent->passport));
                                        }
                                   @endphp
                                   <div class="input-group-append">
                                       <span class="input-group-text">
                                           <a data-toggle="tooltip" title="Click to view the file" href="{{$passport}}" {{($agent->passport)?'target=_blank':''}}>
                                               <i class="fa fa-file"></i>
                                           </a>
                                       </span>
                                   </div>
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
                                   @php
                                       $visa = 'javascript:void(0)';
                                        if(!empty($agent->visa))
                                        {
                                            $visa = route('get.doc',base64_encode($agent->visa));
                                        }
                                   @endphp
                                   <div class="input-group-append">
                                       <span class="input-group-text">
                                           <a data-toggle="tooltip" title="Click to view the file" href="{{$visa}}" {{($agent->visa)?'target=_blank':''}}>
                                               <i class="fa fa-file"></i>
                                           </a>
                                       </span>
                                   </div>
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
                     <input type="text" class="form-control" name="emirates_exp_date" id="emirates_exp_date" value="{{$agent->emirates_exp_date ? date('d-m-Y',strtotime($agent->emirates_exp_date)):null}}">
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
                               <input type="text" class="form-control" name="passport_exp_date" id="passport_exp_date" value="{{$agent->passport_exp_date ? date('d-m-Y',strtotime($agent->passport_exp_date)):null}}">
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
                               <input type="text" class="form-control" name="visa_exp_date" id="visa_exp_date" value="{{$agent->visa_exp_date ? date('d-m-Y',strtotime($agent->visa_exp_date)):null}}">
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
                             <input type="text" class="form-control" name="banking_name" id="banking_name"
                                    value="{{$agent['banking_name']}}">
                         </div>
                     </div>
          <div class="form-group col-md-4">
              <label for="bank_name">Bank Name</label>
              <div class="input-group">
                  <div class="input-group-prepend">
                      <span class="input-group-text"><i class="fas fa-money-check-alt"></i></span>
                  </div>
                  <input type="text" class="form-control" name="bank_name" id="bank_name" value="{{$agent['bank_name']}}">
              </div>
          </div>
         <div class="col-md-4"></div>
          <div class="form-group col-md-4">
              <label for="bank_swift_code">Bank Swift Code</label>
              <div class="input-group">
                  <div class="input-group-prepend">
                      <span class="input-group-text"><i class="fas fa-sort-numeric-up"></i></span>
                  </div>
                  <input type="text" class="form-control" name="bank_swift_code" id="bank_swift_code" value="{{$agent['bank_swift_code']}}">
              </div>
          </div>

          <div class="form-group col-md-4">
              <label for="bank_account">A/C Number</label>
              <div class="input-group">
                  <div class="input-group-prepend">
                      <span class="input-group-text"><i class="fas fa-file-invoice-dollar"></i></span>
                  </div>
                  <input type="text" class="form-control" name="bank_account" id="bank_account" value="{{$agent['bank_account']}}">
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
              <label for="country">Country</label>
              <div class="input-group">
                  <div class="input-group-prepend">
                      <span class="input-group-text"><i class="fas fa-flag"></i></span>
                  </div>
                  <input type="text" class="form-control" name="country" id="country" value="{{$agent['country']}}">
              </div>
          </div>
          <div class="form-group col-md-4">
              <label for="state">State</label>
              <div class="input-group">
                  <div class="input-group-prepend">
                      <span class="input-group-text"><i class="fas fa-map-marker"></i></span>
                  </div>
                  <input type="text" class="form-control" name="state" id="state" value="{{$agent['state']}}">
              </div>
          </div>
          <div class="col-md-4"></div>
          <div class="form-group col-md-4">
              <label for="city">City</label>
              <div class="input-group">
                  <div class="input-group-prepend">
                      <span class="input-group-text"><i class="fas fa-city"></i></span>
                  </div>
                  <input type="text" class="form-control" name="city" id="city" value="{{$agent['city']}}">
              </div>
          </div>
          <div class="form-group col-md-4">
              <label for="address">Address</label>
              <div class="input-group">
                  <div class="input-group-prepend">
                      <span class="input-group-text"><i class="fas fa-map-pin"></i></span>
                  </div>
                  <input type="text" class="form-control" name="address" id="address" value="{{$agent['address']}}">
              </div>
          </div>
        </div>
              </div>
          </div>



        <div class="row">
            <div class="col-md-12">
                <button class="btn btn-success float-right" type="submit">Update</button>
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
                var file = document.getElementById("profile_image");
                file.value = file.defaultValue;
            });
            $("#edit_data_form").on('submit',function(e){
                e.preventDefault();
                var url = "{{route('agent.update',$agent->id)}}";
                var params = new FormData(document.getElementById('edit_data_form'));
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
