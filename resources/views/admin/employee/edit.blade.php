@extends('admin.layout.app')
@section('breadcrumb')
<div class="content-header">
    <div class="container-fluid">
    <div class="row mb-2">
        <div class="col-sm-6">
        <h1 class="m-0 text-dark">Edit Employee</h1>
        </div>
        <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
        <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}">Home</a></li>
            <li class="breadcrumb-item active">Edit Employee</li>
        </ol>
        </div>
    </div>
    </div>
</div>
@endsection
 @section('content')
   <div class="card">
       <div class="card-body">
           {{Form::open(['url'=>route('employee.update',$employee->id),'id'=>'edit_data_form'])}}
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
                                <input type="text" class="form-control" name="name" id="name" value="{{$employee->name}}">
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
                                <input type="text" class="form-control" name="email" id="email" value="{{$employee->email}}">
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
                                <input type="text" class="form-control" name="mobile" id="mobile" value="{{$employee->mobile}}">
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
                          @php
                         if(!empty($employee->photo))
                         {
                             $img = route('get.doc',base64_encode($employee->photo));
                         }
                         else
                         {
                             $img = asset('theme/default/images/dashboard/4.png');
                         }
                      @endphp
                      <img id="profile_image_grid" class="img-thumbnail profile_photo" src="{{$img}}" alt="">
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
                                  <input type="text" class="form-control" name="bank_name" id="bank_name" value="{{$employee->bank_name}}">
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
                                  <input type="text" class="form-control" name="bank_ifsc_code" id="bank_ifsc_code" value="{{$employee->bank_ifsc_code}}">
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
                                  <input type="text" name="iban_number" id="iban_number" class="form-control" value="{{$employee->iban_number}}">
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
                                  <input type="text" class="form-control" name="bank_account" id="bank_account" value="{{$employee->bank_account}}">
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
                                  <input type="text" class="form-control" name="emirates_id" id="emirates_id" value="{{$employee->emirates_id}}">
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
                                      @php $list = array('male'=>'Male','female'=>'Female','other'=>'Other') @endphp
                                      @foreach($list as $key=>$value)
                                        @php $selected = ($key==$employee->gender)?'selected=""':'';@endphp
                                        <option value="{{$key}}" {{$selected}}>{{$value}}</option>
                                      @endforeach
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
                                      @php $list = array('married'=>'Married','single'=>'Single','unulled'=>'unulled') @endphp
                                      @foreach($list as $key=>$value)
                                        @php $selected = ($key==$employee->civil_status)?'selected=""':'';@endphp
                                        <option value="{{$key}}" {{$selected}}>{{$value}}</option>
                                      @endforeach
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
                                <input type="text" class="form-control" name="age" id="age" value="{{$employee->age}}">
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
                                  <input type="text" class="form-control" name="dob" id="dob" value="{{($employee->dob)?date('d-m-Y',strtotime($employee->dob)):null}}">
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

                                  <select class="form-control" name="country_id" id="country_id">
                                      <option value="">Select Country</option>
                                      @foreach($countries as $country)
                                          @php $selected = ($country->id==$employee->country_id)?"selected":null; @endphp
                                          <option value="{{$country->id}}" {{$selected}}>{{$country->name}}</option>
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
                                @foreach($states as $state)
                                    @php $selected = ($state->id==$employee->state_id)?"selected":null; @endphp
                                    <option value="{{$state->id}}" {{$selected}}>{{$state->name}}</option>
                                @endforeach
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
                                      @foreach($cities as $city)
                                          @php $selected = ($city->id==$employee->city_id)?"selected":null; @endphp
                                          <option value="{{$city->id}}" {{$selected}}>{{$city->name}}</option>
                                      @endforeach
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
                                  <input type="text" class="form-control" name="address" id="address" value="{{$employee->address}}">
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
                                           @php $selected = ($department->id==$employee->department_id)?'selected':'';@endphp
                                          <option value="{{$department->id}}" {{$selected}}>{{$department->name}}</option>
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
                                          @php $selected= ($designation->id==$employee->designation_id)?'selected=""':'';@endphp
                                          <option value="{{$designation->id}}" {{$selected}}>{{$designation->name}}</option>
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
                                  <input type="text" class="form-control" name="id_number" id="id_number" value="{{$employee->id_number}}">
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
                                  <input type="text" class="form-control" name="official_email" id="official_email" value="{{$employee->official_email}}">
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
                                  <input type="text" class="form-control" name="joining_date" id="joining_date" value="{{($employee->joining_date)?date('d-m-Y',strtotime($employee->joining_date)):null}}">
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
                                      @php $list = array('1'=>'Active','0'=>'InActive') @endphp
                                      @foreach($list as $key=>$value)
                                        @php $selected = ($key==$employee->status)?'selected=""':'';@endphp
                                        <option value="{{$key}}" {{$selected}}>{{$value}}</option>
                                      @endforeach
                                  </select>
                              </div>
                          </div>
                      </div>
                      <div class="col-md-43">
                          <div class="form-group">
                              <label for="work_permit_number">Work Permit Number </label>
                              <div class="input-group">
                                  <div class="input-group-prepend">
                                      <span class="input-group-text"><i class="fas fa-calendar-alt"></i></span>
                                  </div>
                                <input type="text" name="work_permit_number" id="work_permit_number" class="form-control" value="{{$employee->work_permit_number}}">
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
                                  <input type="text" name="fixed_salary" id="fixed_salary" class="form-control" value="{{$employee->fixed_salary}}">
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
                                     @php $is_admins = array('1'=>'Yes','0'=>'No'); @endphp
                                     @foreach($is_admins as $key=>$value)
                                        @php $selected = ($key==$employee->is_admin)?'selected=""':''; @endphp
                                       <option value="{{$key}}" {{$selected}}>{{$value}}</option>
                                     @endforeach
                                  </select>
                              </div>
                          </div>
                      </div>
                       <div class="col-md-12 text-right">
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
           $('#dob').datepicker({ footer: true, modal: true,format: 'dd-mm-yyyy', maxDate : '{{now()->format('d-m-Y')}}'});
           $('#joining_date').datepicker({ footer: true, modal: true,format: 'dd-mm-yyyy', maxDate : '{{now()->format('d-m-Y')}}'});
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
                var url = "{{route('employee.update',$employee->id)}}";
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
