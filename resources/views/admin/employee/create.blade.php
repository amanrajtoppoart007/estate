@extends('admin.layout.app')
@section('breadcrumb')
<div class="content-header">
    <div class="container-fluid">
    <div class="row mb-2">
        <div class="col-sm-6">
        <h1 class="m-0 text-dark">Add Employee</h1>
        </div>
        <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
        <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}">Home</a></li>
            <li class="breadcrumb-item active">Add Employee</li>
        </ol>
        </div>
    </div>
    </div>
</div>
@endsection
 @section('content')
   <div class="card">
       <div class="card-body">
           {{Form::open(['route'=>'employee.store','id'=>'add_data_form','autocomplete'=>'off'])}}
             <div class="row">
               <div class="col-md-12 col-lg-6">
                  <div class="card card-info">
                      <div class="card-header">
                          <h6>Basic Detail</h6>
                      </div>
                      <div class="card-body">
                          <div class="row">
                      <div class="col-md-6">
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
                      <div class="col-md-6">
                          <div class="form-group">
                              <label for="email">Email</label>
                              <div class="input-group">
                                  <div class="input-group-prepend">
                                      <span class="input-group-text"><i class="fas fa-envelope"></i></span>
                                  </div>
                                  <input type="text" class="form-control" name="email" id="email" value="">
                              </div>
                          </div>
                      </div>
                  </div>
                  <div class="row">
                      <div class="col-md-6">
                          <div class="form-group">
                              <label for="mobile">Mobile</label>
                              <div class="input-group">
                                  <div class="input-group-prepend">
                                      <span class="input-group-text"><i class="fas fa-phone"></i></span>
                                  </div>
                                  <input type="number" minlength="10" class="form-control numeric" name="mobile" id="mobile" value="">
                              </div>
                          </div>
                      </div>
                      <div class="col-md-6">
                          <div class="form-group">
                              <label for="password">Password</label>
                              <div class="input-group">
                                  <div class="input-group-prepend">
                                      <span class="input-group-text"><i class="fas fa-lock"></i></span>
                                  </div>
                                  <input type="text" class="form-control" name="password" id="password" value="">
                              </div>
                          </div>
                      </div>
                  </div>
                      </div>
                  </div>
               </div>
               <div class="col-md-12 col-lg-6">
                  <div class="card">
                      <div class="card-img-top">
                      <img id="profile_image_grid" class="img-thumbnail profile_photo" src="{{asset('theme/default/images/dashboard/4.png')}}" alt="">
                      <input type="file" name="photo" id="profile_image" style="display:none;">
                      </div>
                      <div class="card-footer">
                        <div class="d-inline">
                            <label for="profile_image" class="btn btn-primary">
                                <i class="fa fa-upload"></i>
                            </label>
                            <label id="remove_profile_image" class="btn btn-danger">
                                <i class="fa fa-trash"></i>
                            </label>
                        </div>
                      </div>
                  </div>

               </div>
               <div class="col-md-12 col-lg-6">
                   <div class="card card-info">
                       <div class="card-header">
                           <h6>Account Detail</h6>
                       </div>
                       <div class="card-body">
                           <div class="row">
                      <div class="col-md-6">
                          <div class="form-group">
                              <label for="bank_name">Bank Name</label>
                              <div class="input-group">
                                  <div class="input-group-prepend">
                                      <span class="input-group-text"><i class="fas fa-piggy-bank"></i></span>
                                  </div>
                                  <input type="text" class="form-control" name="bank_name" id="bank_name" value="">
                              </div>
                          </div>
                      </div>
                      <div class="col-md-6">
                          <div class="form-group">
                              <label for="bank_ifsc_code">IFSC CODE</label>
                              <div class="input-group">
                                  <div class="input-group-prepend">
                                      <span class="input-group-text"><i class="fas fa-barcode"></i></span>
                                  </div>
                                  <input type="text" class="form-control" name="bank_ifsc_code" id="bank_ifsc_code" value="">
                              </div>
                          </div>
                      </div>
                               <div class="col-md-6">
                                   <div class="form-group">
                                       <label for="iban_number">IBAN NUMBER </label>
                                       <div class="input-group">
                                           <div class="input-group-prepend">
                                               <span class="input-group-text"><i class="fas fa-calendar-alt"></i></span>
                                           </div>
                                           <input type="text" name="iban_number" id="iban_number" class="form-control"
                                                  value="">
                                       </div>
                                   </div>
                               </div>
                  </div>
                  <div class="row">
                      <div class="col-md-6">
                          <div class="form-group">
                              <label for="bank_account">Bank Account No.</label>
                              <div class="input-group">
                                  <div class="input-group-prepend">
                                      <span class="input-group-text"><i class="fas fa-sort-numeric-up"></i></span>
                                  </div>
                                  <input type="text" class="form-control" name="bank_account" id="bank_account" value="">
                              </div>
                          </div>
                      </div>
                      <div class="col-md-6">
                          <div class="form-group">
                              <label for="emirates_id">Emirate Id</label>
                              <div class="input-group">
                                  <div class="input-group-prepend">
                                      <span class="input-group-text"><i class="fas fa-sort-numeric-up"></i></span>
                                  </div>
                                  <input type="text" class="form-control" name="emirates_id" id="emirates_id" value="">
                              </div>
                          </div>
                      </div>
                  </div>
                       </div>
                   </div>
               </div>
               <div class="col-md-12 col-lg-6">
                   <div class="card card-info">
                       <div class="card-header">
                           <h6>Extra Detail</h6>
                       </div>
                       <div class="card-body">
                           <div class="row">
                      <div class="col-md-6">
                          <div class="form-group">
                              <label for="gender">Gender</label>
                              <div class="input-group">
                                  <div class="input-group-prepend">
                                      <span class="input-group-text"><i class="fas fa-genderless"></i></span>
                                  </div>
                                  <select class="form-control" name="gender" id="gender">
                                      <option value="">Select Gender</option>
                                      <option value="male">Male</option>
                                      <option value="female">Female</option>
                                      <option value="other">Other</option>
                                  </select>
                              </div>
                          </div>
                      </div>
                      <div class="col-md-6">
                          <div class="form-group">
                              <label for="civil_status">Civil Status</label>
                              <div class="input-group">
                                  <div class="input-group-prepend">
                                      <span class="input-group-text"><i class="fas fa-genderless"></i></span>
                                  </div>
                                  <select class="form-control" name="civil_status" id="civil_status">
                                      <option value="">Select</option>
                                      <option value="married">Married</option>
                                      <option value="single">Single</option>
                                      <option value="unulled">unulled</option>
                                  </select>
                              </div>
                          </div>
                      </div>
                  </div>
                  <div class="row">
                      <div class="col-md-6">
                          <div class="form-group">
                              <label for="age">Age</label>
                              <div class="input-group">
                                  <div class="input-group-prepend">
                                      <span class="input-group-text"><i class="fas fa-sort-numeric-up-alt"></i></span>
                                  </div>
                                  <input type="number" class="form-control numeric" name="age" id="age" value="">
                              </div>
                          </div>
                      </div>
                      <div class="col-md-6">
                          <div class="form-group">
                              <label for="dob">Date Of Birth</label>
                              <div class="input-group">
                                  <div class="input-group-prepend">
                                      <span class="input-group-text"><i class="fas fa-calendar-alt"></i></span>
                                  </div>
                                  <input type="text" class="form-control" name="dob" id="dob" value="{{now()->addYear(-18)->format('d-m-Y')}}">
                              </div>
                          </div>
                      </div>
                  </div>
                       </div>
                   </div>
               </div>
               <div class="co-md-12 col-lg-6">
                   <div class="card card-info">
                       <div class="card-header">
                           <h6>Address Detail</h6>
                       </div>
                       <div class="card-body">
                           <div class="row">
                      <div class="col-md-6">
                          <div class="form-group">
                              <label for="country_id">Country</label>
                              <div class="input-group">
                                  <div class="input-group-prepend">
                                      <span class="input-group-text"><i class="fas fa-flag"></i></span>
                                  </div>
                                  <select type="text" class="form-control" name="country_id" id="country_id">
                                       <option value="">Select Country</option>
                                       @foreach($countries as $country)
                                           <option value="{{$country->id}}">{{$country->name}}</option>
                                       @endforeach
                                   </select>
                              </div>
                          </div>
                      </div>
                      <div class="col-md-6">
                          <div class="form-group">
                              <label for="state_id">State</label>
                              <div class="input-group">
                                  <div class="input-group-prepend">
                                      <span class="input-group-text"><i class="fas fa-street-view"></i></span>
                                  </div>
                                  <select class="form-control" name="state_id" id="state_id">
                                  </select>
                              </div>
                          </div>
                      </div>
                  </div>
                  <div class="row">
                      <div class="col-md-6">
                          <div class="form-group">
                              <label for="city_id">City</label>
                              <div class="input-group">
                                  <div class="input-group-prepend">
                                      <span class="input-group-text"><i class="fas fa-city"></i></span>
                                  </div>
                                  <select class="form-control" name="city_id" id="city_id">
                                  </select>
                              </div>
                          </div>
                      </div>
                      <div class="col-md-6">
                          <div class="form-group">
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
                   </div>
               </div>
               <div class="col-md-12 col-lg-6">
                  <div class="card card-info">
                      <div class="card-header">
                         <h6>Employee Detail</h6>
                      </div>
                      <div class="card-body">
                       <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="department_id">Department</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="fa fa-building"></i></span>
                                    </div>
                                    <select class="form-control" name="department_id" id="department_id">
                                        <option value="">Select Department</option>
                                        @foreach ($departments as $department)
                                          <option value="{{$department->id}}">{{$department->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="civil_status">Designation</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="fas fa-user"></i></span>
                                    </div>
                                    <select class="form-control" name="designation_id" id="designation_id">
                                        <option value="">Select Designation</option>
                                        @foreach ($designations as $designation)
                                          <option value="{{$designation->id}}">{{$designation->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                          <div class="form-group">
                              <label for="id_number">Id Number </label>
                              <div class="input-group">
                                  <div class="input-group-prepend">
                                      <span class="input-group-text"><i class="fas fa-sort-numeric-up"></i></span>
                                  </div>
                                  <input type="text" class="form-control" name="id_number" id="id_number" value="">
                              </div>
                          </div>
                      </div>
                        <div class="col-md-6">
                          <div class="form-group">
                              <label for="official_email">Email(Office Work) </label>
                              <div class="input-group">
                                  <div class="input-group-prepend">
                                      <span class="input-group-text"><i class="fas fa-sort-numeric-up"></i></span>
                                  </div>
                                  <input type="text" class="form-control" name="official_email" id="official_email" value="">
                              </div>
                          </div>
                      </div>

                    </div>
                      </div>
                  </div>
               </div>
               <div class="col-md-12 col-lg-12">
                   <div class="row">
                       <div class="col-md-4">
                          <div class="form-group">
                              <label for="joining_date">Office Joining Date </label>
                              <div class="input-group">
                                  <div class="input-group-prepend">
                                      <span class="input-group-text"><i class="fas fa-calendar-alt"></i></span>
                                  </div>
                                <input type="text" class="form-control" name="joining_date" id="joining_date" value="{{now()->format('d-m-Y')}}">
                              </div>
                          </div>
                      </div>
                       <div class="col-md-4">
                          <div class="form-group">
                              <label for="status">Employee Status </label>
                              <div class="input-group">
                                  <div class="input-group-prepend">
                                      <span class="input-group-text"><i class="fas fa-calendar-alt"></i></span>
                                  </div>
                                  <select type="text" class="form-control" name="status" id="status">
                                      <option value="">Select Status</option>
                                      <option value="1">Active</option>
                                      <option value="0">InActive</option>
                                  </select>
                              </div>
                          </div>
                      </div>
                       <div class="col-md-4">
                          <div class="form-group">
                              <label for="work_permit_number">Work Permit Number </label>
                              <div class="input-group">
                                  <div class="input-group-prepend">
                                      <span class="input-group-text"><i class="fas fa-calendar-alt"></i></span>
                                  </div>
                                  <input type="text" name="work_permit_number" id="work_permit_number" class="form-control" value="">
                              </div>
                          </div>
                      </div>

                       <div class="col-md-3">
                          <div class="form-group">
                              <label for="fixed_salary">Fixed Salary </label>
                              <div class="input-group">
                                  <div class="input-group-prepend">
                                      <span class="input-group-text"><i class="fas fa-calendar-alt"></i></span>
                                  </div>
                                  <input type="text" name="fixed_salary" id="fixed_salary" class="form-control" value="">
                              </div>
                          </div>
                      </div>
                       <div class="col-md-3">
                          <div class="form-group">
                              <label for="is_admin">Is Admin</label>
                              <div class="input-group">
                                  <div class="input-group-prepend">
                                      <span class="input-group-text"><i class="fas fa-calendar-alt"></i></span>
                                  </div>
                                  <select type="text" name="is_admin" id="is_admin" class="form-control">
                                     <option value="">Select IsAdmin</option>
                                     <option value="1">Yes</option>
                                     <option value="0">No</option>
                                  </select>
                              </div>
                          </div>
                      </div>
                       <div class="col-md-6 text-right">
                          <div class="form-group float-right">
                              <label for="submit_button">&nbsp;</label>
                              <div class="input-group">
                                  <button type="submit" class="btn btn-success" name="submit_button" id="submit_button">Save Details</button>
                              </div>
                          </div>
                      </div>
                   </div>
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

           $('#dob').datepicker({ footer: true, modal: true,format: 'dd-mm-yyyy', maxDate : '{{now()->addYear(-18)->format('d-m-Y')}}'});
           $('#joining_date').datepicker({ footer: true, modal: true,format: 'dd-mm-yyyy', maxDate : '{{now()->addDays(1)->format('d-m-Y')}}'});
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
            $("#add_data_form").on('submit',function(e){
                e.preventDefault();
                var url = "{{route('employee.store')}}";
                var params = new FormData(document.getElementById('add_data_form'));
                function fn_success(result)
                {
                   toast('success',result.message,'bottom-right');
                   $("#add_data_form")[0].reset();
                };
                function fn_error(result)
                {
                    toast('error',result.message,'bottom-right');
                };
                $.fn_ajax_multipart(url,params,fn_success,fn_error);
            });
       });
  </script>
@endsection
