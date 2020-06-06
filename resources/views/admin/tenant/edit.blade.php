@extends('admin.layout.app')
@section('content')
<h4 class="color-primary mb-4">Tenant Information</h4>
<div class="dashboard_personal_info p-5 bg-white">
    {{Form::open(['route'=>'tenant.store','id'=>'edit_data_form','class'=>'form2','enctype'=>"multipart/form-data"])}}
     <input type="hidden" name="tenant_id" value={{$tenant->id}}>
    <h5 class="color-primary">Basic Detail</h5>
        <hr>
        <div class="row mt-4">
            <div class="col-lg-6 col-md-12">
                <div class="form-group">
                       <label><strong>Tenant Type</strong></label> 
                        <?php 
                           $array = array('family_husband_wife'=>'Family(Husband & Wife)','family_brother_sister'=>'Family(Brother & Sister)','company'=>'Company','bachelor'=>'Bachelor');
                           $tenant_type = '';
                           foreach($array as $tkey=>$tval){
                               if(($tkey==$tenant->tenant_type))
                               {
                                   $tenant_type = $tval;
                               }    
                        ?>
                        <div class="px-1">{{$tenant_type}}</div>
                           <?php } ?>
                              <input type="hidden" name="tenant_type" value="{{$tenant->tenant_type}}">
                </div>
                <div class="form-group">
                    <label>Tenant Name</label>
                <input type="text" class="form-control"  name="tenant_name" value="{{$tenant->name}}"  autocomplete="off">
                </div>
                <div class="form-group">
                    <label>Email Address</label>
                    <input type="text" name="email" class="form-control"  value="{{$tenant->email}}" autocomplete="off">
                </div>
                <div class="form-group position-relative">
                    <label>Phone Number</label>
                    <select name="country_code" class="phone_code">
                        @foreach($countries as $country)
                         <?php $selected = ($country->code==$tenant->profile->country_code)?'selected=""':'';?>
                         <option value="{{$country->code}}">{{$country->code}}</option>
                        @endforeach	
                    </select>
                    <input autocomplete="off" style="padding-left: 82px;" type="text" name="mobile" value="{{$tenant->mobile}}" class="form-control numeric">
                </div>
        <div class="more_info">
          <h5 class="color-primary">More Info</h5>
          <hr>
          <div class="form-group">
            <label>Country</label>
            <select name="country" class="form-control">
				<option>Select Country</option>
                @foreach($countries as $country)
                <?php $selected = ($country->id==$tenant->profile->country)?'selected=""':'';?>
				<option value="{{$country->id}}" {{$selected}}>{{$country->name}}</option>
				@endforeach								
            </select>
          </div>
          
          <div class="row">
            <div class="col-lg-6">
              <div class="form-group">
                <label>City / State</label>
                <input type="text" name="city" class="form-control" value="{{$tenant->profile->mobile}}">
              </div>
            </div>
            <div class="col-lg-6">
              <div class="form-group">
                <label>Zip Code</label>
                <input type="text" name="zip" class="form-control numeric" value="{{$tenant->profile->zip}}">
              </div>
            </div>
          </div>
          <div class="form-group">
            <label>Address</label>
            <textarea  name="address" class="form-control" placeholder="Enter address">{{$tenant->profile->address}}</textarea>
          </div>
          <div class="form-group">
            <label>DOB</label>
            <input type="text" name="dob" class="form-control" placeholder="DD-MM-YY (Optional)" value="{{date('d-m-Y',strtotime($tenant->profile->dob))}}">
          </div>
          
          <div class="form-group">
            <label>Number of tenants </label>
          <input type="text" name="tenant_count" class="form-control numeric" placeholder="Enter number of tenants" required="" value="{{$tenant->profile->tenant_count}}">
          </div>
        </div>
      </div>
      <div class="col-lg-5 col-md-12">
        <div class="user_photo" >
             @php
                if(!empty($tenant->profile))
                {
                    $img = route('get.doc',base64_encode($tenant->profile->profile_image));
                }
                else 
                {
                    $img = asset('theme/default/images/dashboard/4.png');
                } 
            @endphp
          <img id="profile_image_grid" src="{{$img}}" style="width: 250px;margin-bottom: 10px;" alt="">
          <div class="d-table">
            <label class="btn btn-primary mb-0 mr-2" for="profile_image">Upload File</label>
            <input id="profile_image" class="hide" type="file" name="profile_image">
            <button type="button" id="remove_profile_image" class="btn btn-primary">Delete Photo
            </button>
          </div>
          <hr>
          <h5 class="color-primary">Documents</h5>
          <hr>
          <div class="form-group">
            <label>Passport</label>
            <input type="file" name="passport" class="choose_file form-control">
          </div>
          <div class="form-group">
            <label>Visa</label>
            <input type="file" name="visa" class="choose_file form-control">
          </div>
          <div class="form-group">
            <label for="emirates_id">UAE Identity Card (ID)</label>
            <input type="file" name="emirates_id" class="choose_file form-control">
          </div>
          <div class="form-group">
            <label for="bank_passbook">Bank Salary Transfer Statement (Last 3 month)</label>
            <input  type="file" name="bank_passbook" class="choose_file form-control">
          </div>
          <div class="form-group">
            <label for="last_sewa_id">Previous SEWA final closing bill</label>
            <input type="file" name="last_sewa_id" class="choose_file form-control">
          </div>
        </div>
      </div>
    </div>
			<h6>Extra Detail</h6>
			<div class="row" id="company_extra_detail">
				<div class="col">
					<div class="form-group">
                      <label>Company Name</label>
                      <input class="form-control"  name="company_name" type="text" autocomplete="off">
                   </div>
				</div>
				<div class="col">
					<div class="form-group">
					<label for="trade_licence">Trade Certificate *</label>
					  <input type="file" name="trade_license" class="choose_file form-control">
					</div>
				</div>
			</div>
			<div class="row" id="bachelor_extra_detail">
				<div class="col-6">
					<div class="form-group">
						<label>No sharinge agreement</label>
						<input type="file" name="no_sharing_agreement" class="choose_file form-control">
					</div>
				</div>
			</div>
			<div class="row" id="family_hs_extra_detail">
				<div class="col-6">
					<div class="form-group">
						<label for="marriage_certificate">Merrige Certificate *</label>
						<input type="file" name="marriage_certificate" class="choose_file form-control">
					</div>
				</div>
			</div>
		
    <div class="row" id="extra_relation_detail">
        <div class="col-md-12">
            <div class="card">
            <div class="card-header">
                <h5>Family Details</h5>
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
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="form-group">
                <button type="submit" class="btn btn-success float-left">Save</button>
            </div>
        </div>
    </div>
    {{Form::close()}}
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
        function switch_tenant_type(tenant_type)
        {
            switch(tenant_type)
				{
					case 'family_husband_wife':
						$("#family_hs_extra_detail").show();
						$("#extra_relation_detail").show();
						$("#company_extra_detail").hide();
						$("#bachelor_extra_detail").hide();
					break;
					case 'family_brother_sister':
						$("#family_hs_extra_detail").hide();
						$("#extra_relation_detail").show();
						$("#company_extra_detail").hide();
						$("#bachelor_extra_detail").hide();
					break;
					case 'company':
						$("#family_hs_extra_detail").hide();
						$("#extra_relation_detail").show();
						$("#company_extra_detail").show();
						$("#bachelor_extra_detail").hide();
					break;
					case 'bachelor':
						$("#family_hs_extra_detail").hide();
						$("#extra_relation_detail").hide();
						$("#company_extra_detail").hide();
						$("#bachelor_extra_detail").show();
					break;
					default:
						$("#family_hs_extra_detail").show();
						$("#extra_relation_detail").show();
						$("#company_extra_detail").show();
						$("#bachelor_extra_detail").show();	
					break;

				}
        }
      let start_date =  $('input[name="dob"]').datepicker({ footer: true, modal: true,format: 'dd-mm-yyyy',
            maxDate : '{{now()->format('d-m-Y')}}',
            value   : '{{date('Y-m-d',strtotime($tenant->profile->dob))}}', 
		});
		$("#tenant_type").on('change',function(e){
			if(!$.trim($("#tenant_type").val()).length)
			{
				toast('error','Please select tenant type','bottom-right');
				$("#tenant_type").css({'border-color':'aqua'}).focus();
			}
			else
			{
                let tenant_type = $("#tenant_type").val();
                switch_tenant_type(tenant_type);		
			}
		})
         $('#edit_data_form').submit(function(event){
	  event.preventDefault();
 
      var params = new FormData($(this)[0]);
      var url    = '{{route('tenant.update',$tenant->id)}}';
      function fn_success(result)
      {
          toast('success', result.message, 'bottom-right');
          window.location.href = result.next_url;
         
      }
      function fn_error(result)
      {
             if(result.response=='validation_error')
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
  function render_family_detail_form()
{
	var str = `<tr><td>#</td>
    <td> <input type="text" class="form-control" name="rel_name[]" value=""> </td>
    <td><input type="text" class="form-control" name="rel_relationship[]" value=""></td>
    <td><input type="file" class="form-control" name="rel_amirates_id[]"></td>
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
   $("#profile_image_grid").on('click',function(){
      $("#profile_image").click();
  });
  switch_tenant_type('{{$tenant->tenant_type}}');
    });
</script>
@endsection