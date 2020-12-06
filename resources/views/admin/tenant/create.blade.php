@extends('admin.layout.base')
@include("admin.include.breadcrumb",["page_title"=>"Create Tenant"])
@section('content')
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item"><a href="#">Tenant</a></li>
            <li class="breadcrumb-item active" aria-current="page">Add new tenant</li>
        </ol>
    </nav>
    <div class="">
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
                                        
                                        <select name="tenant_type" id="tenant_type" class="js-select2-custom">
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
                                <div class="col-12 col-sm-6 col-md-6 col-lg-6 col-xl-6">
                                    <div class="form-group">
                                        <label for="name">Tenant Name <span class="text-danger">*</span></label>
                                         <div class="input-group">
                                         <div class="input-group-prepend">
                                             <span class="input-group-text"><i class="fas fa-user"></i></span>
                                         </div>
                                        <input class="form-control" name="name" id="name" type="text"  value="{{$user ? $user->name : null}}" autocomplete="off">
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
                                             
                                                 <select  name="country_code" id="country_code" class="phone_code js-select2-custom">
                                                      @foreach($codes as $code)
                                                         <option value="{{$code->code}}">+{{$code->code}}</option>
                                                     @endforeach
                                                  </select>
                                         </div>
                                        <input type="text" name="mobile" id="mobile" class="form-control numeric" autocomplete="off" value="{{$user ? $user->mobile : null}}">
                                     </div>
                                    </div>
                                </div>
                                
                                <div class="col-12 col-sm-6 col-md-6 col-lg-6 col-xl-6">
                                    <label for="country_id">Nationality <span class="text-danger">*</span></label>
                                    <div class="form-group">
                                        <select name="country_id" id="country_id" class="js-select2-custom">
                                            <option value="">Select Country</option>
                                                 @foreach($countries as $country)
                                                     @if(!empty($user))
                                                       @php  $selected = ($country->code===$user->country_code)?"selected":""; @endphp
                                                     @else
                                                         @php $selected = null; @endphp
                                                         @endif
                                                     <option value="{{$country->id}}" {{$selected}}>{{$country->name}}</option>
                                                 @endforeach
                                        </select>
                                    </div>

                                </div>

                                <div class="col-12 col-sm-6 col-md-6 col-lg-6 col-xl-6">
                                    <div class="form-group">
                                        <label for="dob">Date Of Birth</label>                                         
                                        <input type="text" name="dob" id="dob" value="{{now()->addYear(-18)->format('d-m-Y')}}" class="js-flatpickr form-control flatpickr-custom" placeholder="DD-MM-YY (Optional)"
                                           data-hs-flatpickr-options='{
                                             "dateFormat": "d-m-Y"
                                           }'>
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
                            <div class="form-group">
                                <label class="input-label">Photo</label>

                                <div class="d-flex align-items-center">
                                    <!-- Avatar -->
                                    <label class="avatar avatar-xxl avatar-circle avatar-uploader mr-5" for="profile_image">
                                        <img id="avatarProjectSettingsImg" class="avatar-img" src="{{asset('theme/images/4.png')}}" alt="Image Description">

                                        <input type="file" class="js-file-attach avatar-uploader-input" name="profile_image" id="profile_image"
                                               data-hs-file-attach-options='{
                                "textTarget": "#avatarProjectSettingsImg",
                                "mode": "image",
                                "targetAttr": "src",
                                "resetTarget": ".js-file-attach-reset-img",
                                "resetImg": "{{asset('theme/images/4.png')}}"
                             }'>

                                        <span class="avatar-uploader-trigger">
                        <i class="tio-edit avatar-uploader-icon shadow-soft"></i>
                      </span>
                                    </label>
                                    <!-- End Avatar -->

                                    <button type="button" class="js-file-attach-reset-img btn btn-white">Delete</button>
                                </div>
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
                            <label for="trade_license">Trade Certificate</label>
                            <div class="custom-file">

                                <input type="file" name="trade_license" class="js-file-attach custom-file-input" id="trade_license"
                                       data-hs-file-attach-options='{
              "textTarget": "[for=\"trade_license\"]"
           }'>
                                <label class="custom-file-label" for="trade_license">Choose file</label>
                            </div>

                        </div>
                        <div class="col-12 col-sm-6 com-md-3 col-lg-3 col-xl-3">
                            <div class="form-group">
                               <label for="trade_license_exp_date">Trade Certificate Expiry Date</label>
                               <input type="text" name="trade_license_exp_date" id="trade_license_exp_date" class="js-flatpickr form-control flatpickr-custom"
                                           data-hs-flatpickr-options='{
                                             "dateFormat": "d-m-Y"
                                           }'>
                               
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


                <label for="emirates_id">Emirates Id</label>
                <div class="custom-file">

                    <input type="file" name="emirates_id" class="js-file-attach custom-file-input" id="emirates_id"
                           data-hs-file-attach-options='{
              "textTarget": "[for=\"emirates_id\"]"
           }'>
                    <label class="custom-file-label" for="emirates_id">Choose file</label>
                </div>

              </div>
                 <div class="col-12 col-sm-6 col-md-3 col-lg-3 col-xl-3">


                     <label for="passport">Passport</label>
                     <div class="custom-file">

                         <input type="file" name="passport" class="js-file-attach custom-file-input" id="passport"
                                data-hs-file-attach-options='{
              "textTarget": "[for=\"passport\"]"
           }'>
                         <label class="custom-file-label" for="passport">Choose file</label>
                     </div>


                       </div>
                       <div class="col-12 col-sm-6 col-md-3 col-lg-3 col-xl-3">
                           <label for="visa">Visa</label>
                           <div class="custom-file">

                               <input type="file" name="visa" class="js-file-attach custom-file-input" id="visa"
                                      data-hs-file-attach-options='{
              "textTarget": "[for=\"visa\"]"
           }'>
                               <label class="custom-file-label" for="visa">Choose file</label>
                           </div>


                       </div>
                       <div class="col-12 col-sm-6 col-md-3 col-lg-3 col-xl-3">

                           <label for="bank_passbook">Bank Statement</label>
                           <div class="custom-file">

                               <input type="file" name="bank_passbook" class="js-file-attach custom-file-input" id="bank_passbook"
                                      data-hs-file-attach-options='{
              "textTarget": "[for=\"bank_passbook\"]"
           }'>
                               <label class="custom-file-label" for="bank_passbook">Choose file</label>
                           </div>




                       </div>
          </div>
          <div class="row mt-3">
            <div class="col-12 col-sm-6 col-md-3 col-lg-3 col-xl-3">
                 <div class="form-group">
                     <label for="emirates_id_exp_date">Emirates Id(Expiry Date) </label>
                     <input type="text" name="emirates_id_exp_date" id="emirates_id_exp_date" class="js-flatpickr form-control flatpickr-custom"
                                           data-hs-flatpickr-options='{
                                             "dateFormat": "d-m-Y"
                                           }'>
                     
                 </div>
              </div>
                 <div class="col-12 col-sm-6 col-md-3 col-lg-3 col-xl-3">
                           <div class="form-group">
                               <label for="passport_exp_date">Passport (Expiry Date)</label>
                               <input type="text" name="passport_exp_date" id="passport_exp_date" class="js-flatpickr form-control flatpickr-custom"
                                           data-hs-flatpickr-options='{
                                             "dateFormat": "d-m-Y"
                                           }'>
                           </div>
                       </div>
                       <div class="col-12 col-sm-6 col-md-3 col-lg-3 col-xl-3">
                           <div class="form-group">
                               <label for="visa_exp_date">Visa (Expiry Date)</label>
                               <input type="text" name="visa_exp_date" id="visa_exp_date" class="js-flatpickr form-control flatpickr-custom"
                                           data-hs-flatpickr-options='{
                                             "dateFormat": "d-m-Y"
                                           }'>
                               
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
                                <td>


                                    <div class="custom-file">

                                        <input type="file" name="rel_emirates_id[]" class="js-file-attach custom-file-input" id="rel_emirates_id1"
                                               data-hs-file-attach-options='{
              "textTarget": "[for=\"rel_emirates_id1\"]"
           }'>
                                        <label class="custom-file-label" for="rel_emirates_id1">File</label>
                                    </div>

                                </td>
                                <td>

                                    <div class="custom-file">

                                        <input type="file" name="rel_passport[]" class="js-file-attach custom-file-input" id="rel_passport1"
                                               data-hs-file-attach-options='{
              "textTarget": "[for=\"rel_passport1\"]"
           }'>
                                        <label class="custom-file-label" for="rel_passport1">File</label>
                                    </div>

                                </td>
                                <td>

                                    <div class="custom-file">

                                        <input type="file" name="rel_visa[]" class="js-file-attach custom-file-input" id="rel_visa1"
                                               data-hs-file-attach-options='{
              "textTarget": "[for=\"rel_visa1\"]"
           }'>
                                        <label class="custom-file-label" for="rel_visa1">File</label>
                                    </div>
                                </td>
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


                            <label for="no_sharing_agreement">No sharing agreement</label>
                            <div class="custom-file">

                                <input type="file" name="no_sharing_agreement" class="js-file-attach custom-file-input" id="no_sharing_agreement"
                                       data-hs-file-attach-options='{
              "textTarget": "[for=\"trade_license\"]"
           }'>
                                <label class="custom-file-label" for="no_sharing_agreement">Choose file</label>
                            </div>




                        </div>
                       <div class="col-12 col-sm-6 col-md-3 col-lg-3 col-xl-3 family_hs_extra_detail">


                           <label for="marriage_certificate">Marriage Certificate</label>
                           <div class="custom-file">

                               <input type="file" name="marriage_certificate" class="js-file-attach custom-file-input" id="marriage_certificate"
                                      data-hs-file-attach-options='{
              "textTarget": "[for=\"trade_license\"]"
           }'>
                               <label class="custom-file-label" for="marriage_certificate">Choose file</label>
                           </div>

                       </div>
                    </div>
                </div>
                <div class="form-group text-right">
                    {{--@if(empty($tenant->rent_breakdown))
                     <a href="{{route('')}}" class="btn btn-primary">Prepare BreakDown</a>
                    @endif--}}
                    <button class="btn btn-primary">Save</button>
                    <button type="button" id="save_and_allot_unit" class="btn btn-primary">Save & Allot Unit</button>
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
        $('.js-select2-custom').each(function () {
          var select2 = $.HSCore.components.HSSelect2.init($(this));
        });

        $('.js-flatpickr').each(function () {
          $.HSCore.components.HSFlatpickr.init($(this));
        });

        $('.js-file-attach').each(function () {
            let customFile = new HSFileAttach($(this)).init();
        });

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
	let str = `<tr><td>#</td>
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
    $('#profile_image_grid').attr('src', '/theme/images/4.png');
    let file = document.getElementById("profile_image");
    file.value = file.defaultValue;
  });
   $("#profile_image_grid").on('click',function(){
      $("#profile_image").click();
  });
    });
</script>
@endsection
