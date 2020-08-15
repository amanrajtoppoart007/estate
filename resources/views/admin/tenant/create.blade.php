@extends('admin.layout.app')
@section('breadcrumb')
<div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h4 class="m-0 text-dark">Add New Tenant</h4>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}">Home</a></li>
              <li class="breadcrumb-item active">Add New Tenant</li>
            </ol>
          </div>
        </div>
      </div>
    </div>
@endsection
@section('content')
    <div class="card">
        <div class="card-body">
          {{Form::open(['route'=>'tenant.store','id'=>'add_data_form','method'=>'post','autocomplete'=>'off','enctype'=>'multipart/form-data'])}}
            <input type="hidden" name="request_id" value="{{request()->request_id ? request()->request_id : null}}">
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
                                             <span class="input-group-text">
                                                 <i class="fa fa-window-maximize" aria-hidden="true"></i>
                                             </span>
                                         </div>
                                        <select name="tenant_type" id="tenant_type" class="form-control">
                                            <option value="">Select Tenancy</option>
                                            @php $tenancy_types =
                                                 [
                                                     'family_husband_wife'=>'Family(Husband-Wife)',
                                                     'family_brother_sister'=>'Family(Brother-Sister)',
                                                     'company'=>'Company',
                                                     'bachelor'=>'Bachelor',
                                                 ];
                                            @endphp
                                            @foreach($tenancy_types as $type=>$text)
                                                   @php  $selected = ($type== ($user ? $user->tenancy_type: null))?"selected":""; @endphp
                                                <option value="{{$type}}" {{$selected}}>{{$text}}</option>
                                            @endforeach
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
                                        <input class="form-control" name="tenant_name" id="tenant_name" type="text"  value="{{$user ? $user->name : null}}" autocomplete="off">
                                     </div>

                                    </div>
                                </div>
                                <div class="col-12 col-sm-6 col-md-6 col-lg-6 col-xl-6">
                                    <div class="form-group">
                                        <label for="email">Email <span class="text-danger">*</span></label>
                                         <div class="input-group">
                                         <div class="input-group-prepend">
                                             <span class="input-group-text"><i class="fas fa-envelope"></i></span>
                                         </div>
                                        <input type="text" name="email" id="email" class="form-control" autocomplete="off" value="{{$user ? $user->email : null}}">
                                     </div>
                                    </div>
                                </div>
                                <div class="col-12 col-sm-6 col-md-6 col-lg-6 col-xl-6">
                                    <div class="form-group">
                                        <label for="password">Password <span class="text-danger">*</span></label>
                                         <div class="input-group">
                                         <div class="input-group-prepend">
                                             <span class="input-group-text"><i class="fas fa-lock"></i></span>
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
                                                     <option value="">000</option>
                                                      @foreach($countries as $country)
                                                             @php  $selected = ($country->code==($user ? $user->country_code: null))?"selected":""; @endphp
                                                         <option value="{{$country->code}}" {{$selected}}>+{{$country->code}}</option>
                                                     @endforeach
                                                  </select>
                                             </span>
                                         </div>
                                        <input type="text" name="mobile" id="mobile" class="form-control numeric" autocomplete="off" value="{{$user ? $user->mobile : null}}">
                                     </div>
                                    </div>
                                </div>
                                 <div class="col-12 col-sm-6 col-md-6 col-lg-6 col-xl-6">
                                    <div class="form-group">
                                        <label for="country">Nationality <span class="text-danger">*</span></label>
                                         <div class="input-group">
                                         <div class="input-group-prepend">
                                             <span class="input-group-text"><i class="fas fa-flag"></i></span>
                                         </div>
                                             <select name="country" id="country" class="form-control">
                                                 <option>Select Country</option>
                                                 @foreach($countries as $country)
                                                     @php  $selected = ($country->code==($user ? $user->country_code: null))?"selected":""; @endphp
                                                     <option value="{{$country->id}}" {{$selected}}>{{$country->name}}</option>
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
                                             <span class="input-group-text"><i class="fas fa-building"></i></span>
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
                                             <span class="input-group-text">
                                                 <i class="fa fa-map-marker" aria-hidden="true"></i>
                                             </span>
                                         </div>
                                         <textarea type="text" name="address" id="address" class="form-control">
                                             {{$user ? $user->address:null}}
                                         </textarea>
                                     </div>
                                    </div>
                                </div>
                                <div class="col-12 col-sm-6 col-md-6 col-lg-6 col-xl-6">
                                    <div class="form-group">
                                        <label for="dob">Date Of Birth</label>
                                         <div class="input-group">
                                         <div class="input-group-prepend">
                                             <span class="input-group-text">
                                                 <i class="fa fa-birthday-cake" aria-hidden="true"></i>
                                             </span>
                                         </div>
                                         <input type="text" name="dob" id="dob" class="form-control" placeholder="DD-MM-YY (Optional)">
                                     </div>
                                    </div>
                                </div>
                                <div class="col-12 col-sm-6 col-md-6 col-lg-6 col-xl-6">
                                    <div class="form-group">
                                        <label for="tenant_count">Tenant Count <span class="text-danger">*</span> <small>(Including the applicant/primary tenant)</small></label>
                                         <div class="input-group">
                                         <div class="input-group-prepend">
                                             <span class="input-group-text">
                                                 <i class="fa fa-calculator" aria-hidden="true"></i>
                                             </span>
                                         </div>
                                         <input type="text" name="tenant_count" id="tenant_count" class="form-control numeric" placeholder="Enter number of tenants">
                                     </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-sm-12 col-md-4 col-lg-4 col-xl-4 text-right">
                            <img id="profile_image_grid" src="{{asset('theme/default/images/dashboard/4.png')}}"
                                 style="width: 250px;margin-bottom: 10px;" alt="">
                            <div style="position: absolute;top:211px;right:10px;">
                                <label class="btn btn-primary mb-0" for="profile_image">
                                    <i class="fa fa-upload" aria-hidden="true"></i>
                                </label>
                                <input id="profile_image" class="hide" type="file" name="profile_image">
                                <button type="button" id="remove_profile_image" class="btn btn-danger">
                                    <i class="fa fa-trash"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="card card-info company_extra_detail">
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
                                          <i class="fa fa-users" aria-hidden="true"></i>
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
                                          <i class="fa fa-file" aria-hidden="true"></i>
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
                               <i class="fa fa-file" aria-hidden="true"></i>
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
                                          <i class="fa fa-file" aria-hidden="true"></i>
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
                                <i class="fa fa-file" aria-hidden="true"></i>
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

          </div>
                </div>
            </div>
            <div class="card card-info extra_relation_detail">
                <div class="card-header">
                    <h6 id="extra_relation_detail_title">Family Detail</h6>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Name</th>
                                <th>Relation/Designation</th>
                                <th>Emirates  Id</th>
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
                                <td><input type="file" class="form-control"  name="rel_emirates_id[]"></td>
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
                        <div class="col-12 col-sm-6 col-md-3 col-lg-3 col-xl-3 bachelor_extra_detail">
                           <div class="form-group">
                               <label for="no_sharing_agreement">No sharing agreement</label>
                               <div class="input-group">
                                  <div class="input-group-prepend">
                                      <span class="input-group-text">
                                          <i class="fa fa-file" aria-hidden="true"></i>
                                      </span>
                                  </div>
                               <input type="file" class="form-control" name="no_sharing_agreement" id="no_sharing_agreement" value="">
                               </div>
                           </div>
                       </div>
                       <div class="col-12 col-sm-6 col-md-3 col-lg-3 col-xl-3 family_hs_extra_detail">
                           <div class="form-group">
                               <label for="marriage_certificate">Marriage Certificate</label>
                               <div class="input-group">
                                  <div class="input-group-prepend">
                                      <span class="input-group-text">
                                          <i class="fa fa-file" aria-hidden="true"></i>
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
                    <button type="button" id="save_and_allot_unit" class="btn btn-primary">Save & Allot Unit</button>
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

        @php
         if(!empty($user))
        {
            echo "tenancy_type_function();";
        }
        @endphp
        function applied_class_hide(elements)
        {
            elements.forEach(function(item){
                $(`.${item}`).hide();
            });

        }
        function applied_class_show(elements)
        {
            elements.forEach(function(item){
                $(`.${item}`).show();
            });
        }
        function tenancy_type_function()
        {
               let tenancy_type = $("#tenant_type").val();
				$("#tenant_count").val('').prop({readonly:false});
             	switch(tenancy_type)
				{
					case 'family_husband_wife':
						applied_class_show(['family_hs_extra_detail','extra_relation_detail']);
						applied_class_hide(['company_extra_detail','bachelor_extra_detail']);
						$("#extra_relation_detail_title").text("Family Detail");
					break;
					case 'family_brother_sister':
						applied_class_show(['extra_relation_detail']);
						applied_class_hide(['family_hs_extra_detail','company_extra_detail','bachelor_extra_detail']);
						$("#extra_relation_detail_title").text("Family Detail");
					break;
					case 'company':

						applied_class_show(['extra_relation_detail','company_extra_detail']);
						applied_class_hide(['family_hs_extra_detail','bachelor_extra_detail']);
						$("#extra_relation_detail_title").text("Employees Detail");
					break;
					case 'bachelor':
						applied_class_show(['bachelor_extra_detail']);
						applied_class_hide(['family_hs_extra_detail','extra_relation_detail','company_extra_detail']);
						$("#tenant_count").val(1).prop({readonly:true});
					break;
					default:
						applied_class_show(['bachelor_extra_detail']);
						applied_class_show(['family_hs_extra_detail','extra_relation_detail','company_extra_detail','bachelor_extra_detail']);
					break;

				}
        }
     $("#dob").datepicker({ footer: true, modal: true,format: 'dd-mm-yyyy', maxDate : '{{now()->addYear(18)->format('d-m-Y')}}', value : '{{now()->addYear(-18)->format('d-m-Y')}}'});
     let pickers =
               [
                   'emirates_id_exp_date',
                   'visa_exp_date',
                   'passport_exp_date',
                   'bank_passbook_exp_date',
               ];
           pickers.forEach(function(item){
               $(`#${item}`).datepicker({ footer: true, modal: true,format: 'dd-mm-yyyy', minDate : '{{now()->format('d-m-Y')}}'});
           });
		$("#tenant_type").on('change',function(e){
		    $("#family_detail_grid").html('');
			if(!$.trim($("#tenant_type").val()).length)
			{
				toast('error','Please select tenant type','bottom-right');
				$("#tenant_type").css({'border-color':'aqua'}).focus();
			}
			else
			{
				tenancy_type_function();

			}
		})
     $('#add_data_form').on("submit",function(e){
	  e.preventDefault();

      let params = new FormData($(this)[0]);
      let url    = '{{route('tenant.store')}}';
      function fn_success(result)
      {
          toast('success', result.message, 'bottom-right');
          window.location.href = result.next_url;

      }
      function fn_error(result)
      {
             if(result.response==="validation_error")
            {
                toast('error', result.message, 'bottom-right');
            }
            else
            {
                  toast('error', result.message, 'bottom-right');
            }
      }
    $.fn_ajax_multipart(url,params,fn_success,fn_error);
  });
		$("#save_and_allot_unit").on('click',function(e){
		    e.preventDefault();
            let params = new FormData($('#add_data_form')[0]);
            params.append('next_action','allot_unit');
            let url = '{{route('tenant.store')}}';

            function fn_success(result)
            {
                toast('success', result.message, 'bottom-right');
                window.location.href = result.next_url;

            }

            function fn_error(result) {
                if (result.response === "validation_error") {
                    toast('error', result.message, 'bottom-right');
                } else {
                    toast('error', result.message, 'bottom-right');
                }
            }

            $.fn_ajax_multipart(url, params, fn_success, fn_error);
        });

  function render_family_detail_form()
{
	var str = `<tr><td>#</td>
    <td> <input type="text" class="form-control" name="rel_name[]" value=""> </td>
    <td><input type="text" class="form-control" name="rel_relationship[]" value=""></td>
    <td><input type="file" class="form-control" name="rel_emirates_id[]"></td>
    <td><input type="file" class="form-control" name="rel_passport[]"></td>
    <td><input type="file" class="form-control" name="rel_visa[]"></td>
    <td>
        <a class="btn-sm btn-success text-white add_more_family_member"><i class="fa fa-plus"></i></a>
        <a class="btn-sm btn-danger text-white remove_tr"><i class="fa fa-times"></i></a>
    </td>
</tr>`;
		let html = $($.parseHTML(str));
		$("#family_detail_grid").append(html);

}

$("#tenant_count").on("change",function(){
    $("#family_detail_grid").html('');
     let counter = $("#tenant_count").val();
    if(counter>1)
    {
        for(i=0;i<(counter-1);i++)
        {
            render_family_detail_form();
        }
    }
});
$(document).on('click','.add_more_family_member',function(e){
    e.preventDefault();
    render_family_detail_form();
});
$(document).on('click','.remove_tr',function(e){
    e.preventDefault();
    $(this).closest('tr').remove();
});
function render_image(input)
  {
    if(input.files && input.files[0])
	{
      let reader = new FileReader();
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
   $("#profile_image_grid").on('click',function(){
      $("#profile_image").click();
  });
    });
</script>
@endsection
