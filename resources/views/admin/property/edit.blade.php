@extends('admin.layout.app')
@section('head')
  <link rel="stylesheet" href="{{asset('assets/plugins/icheck-bootstrap/icheck-bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('plugin/datetimepicker/css/gijgo.min.css')}}">
    <style>
    .owner_type_company_grid
    {
        display:none;
    }
</style>
@endsection
@section('breadcrumb')
<div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Edit Property</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}">Home</a></li>
              <li class="breadcrumb-item active">Edit Property</li>
            </ol>
          </div>
        </div>
      </div>
    </div>
@endsection
    @section('content')
<div class="submit_form color-secondery icon_primary p-5 bg-white">
  <form action="{{route('property.update',['id'=>$property->id])}}" enctype="multipart/form-data" method="POST" id="edit_data_form" autocomplete="off">
  @csrf
<div class="property-location mt-4">
		<h5 class="color-primary">Property Location</h5>
		<hr>
	<div class="row">
		<div class="col-lg-12 col-md-12">
			<div class="form-group">
				<label>Building Name <span class="text-danger">*</span></label>

				<input type="text" name="title" id="title" class="form-control" value="{{$property->title}}">
			</div>
        </div>
		<div class="col-md-4">
		<div class="form-group">
			<label for="owner_id">Developer <span class="text-danger">*</span></label>
			<select class="form-control" name="owner_id" id="owner_id">
				<option value="">Select Developer</option>
				@foreach($owners as $owner)
						@if($owner->id==(old('owner_id')?old('owner_id'):$property->owner_id))
						<option value="{{ $owner->id }}" selected>{{ $owner->name }}</option>
						@else
						<option value="{{ $owner->id }}">{{ $owner->name }}</option>
						@endif
					@endforeach
			</select>
		</div>
		{{--<div class="form-group">
			<label for="agent_id">Agent</label>
			<select class="form-control" name="agent_id" id="agent_id">
				<option value="">Select Agent</option>
				@foreach($agents as $agent)
						@if($agent->id==(old('agent_id')?old('agent_id'):$property->agent_id))
						<option value="{{ $agent->id }}" selected>{{ $agent->name }}</option>
						@else
						<option value="{{ $agent->id }}">{{ $agent->name }}</option>
						@endif
					@endforeach
			</select>
		</div>--}}
			<div class="form-group">
			<label>Property Type <span class="text-danger">*</span></label>
				<select class="form-control" name="type" id="type">
					<option value="">Select Property Type</option>
					@foreach($propertyTypes as $type)
						@if($type->id==(old('type')?old('type'):$property->type))
						<option value="{{ $type->id }}" selected>{{ $type->title }}</option>
						@else
						<option value="{{ $type->id }}">{{ $type->title }}</option>
						@endif
					@endforeach
				</select>
			</div>

			<div class="form-group">
			<label>Purpose <span class="text-danger">*</span></label>
				<select class="form-control" name="prop_for" id="prop_for">
					<option value="">Select Purpose</option>
					@php
						$purpose = array('1'=>'For Rent','2'=>'For Sale','3'=>'Rent & Sale')
					@endphp
					@foreach($purpose as $pKey=>$pVal)
						@if($pKey==old('prop_for')?old('prop_for'):$property->prop_for)
						<option value="{{$pKey}}" selected>{{$pVal}}</option>
						@else
						<option value="{{$pKey}}">{{$pVal}}</option>
						@endif
					@endforeach
				</select>
			</div>

			<div class="form-group">
			<label>Country <span class="text-danger">*</span></label>
				<select class="form-control" name="country_id" id="country_id">
					<option value="">Select Country</option>
					@foreach($countries as $country)
						@if($country->id==(old('country_id')?old('country_id'):$property->country_id))
						<option value="{{ $country->id }}" selected>{{ $country->name }}</option>
						@else
						<option value="{{ $country->id }}">{{ $country->name }}</option>
						@endif
					@endforeach
				</select>
			</div>
			<div class="form-group">
				<label>State <span class="text-danger">*</span></label>
				<select class="form-control" name="state_id" id="state_id" >
					<option value="">Select State</option>
				@foreach($states as $state)
						@if($state->id==(old('state_id')?old('state_id'):$property->state_id))
							<option value="{{ $state->id }}" selected>{{ $state->name }}</option>
						@endif
					@endforeach
				</select>
			</div>
			<div class="form-group">
			<label>City <span class="text-danger">*</span></label>
			<select class="form-control" name="city_id" id="city_id">
				<option value="">Select City</option>
				@foreach($cities as $city)
				@if($city->id==(old('city_id')?old('city_id'):$property->city_id))
					<option value="{{ $city->id }}" selected>{{$city->name}}</option>
					@endif
				@endforeach
			</select>
		</div>
		</div>
		<div class="col-md-8">
			<div class="single-map">
				<div id="map"></div>
			</div>
		</div>
	</div>
		<div class="row d-none">
			<div class="col-6">
				<div class="form-group">
					<label for="latitude"></label>
					<input type="text" name="latitude" id="latitude" class="form-control" value="{{old('latitude')?old('latitude'):$property->latitude}}" placeholder="Latitude">
				</div>
			</div>
			<div class="col-6">
				<div class="form-group">
					<label for="longitude"></label>
					<input type="text" name="longitude" id="longitude" class="form-control" value="{{old('longitude')?old('longitude'):$property->longitude}}" placeholder="Longitude">

				</div>
			</div>
		</div>
		<div class="row mt-2">
			<div class="col-lg-8 col-md-8">
				<div class="form-group">
					<label>Area <span class="text-danger">*</span></label>
				<input type="text" name="address" id="address" class="form-control" value="{{old('address')?old('address'):$property->address}}">
				</div>
			</div>
			<div class="col-lg-4 col-md-4">
				<div class="form-group">
					<label>Zip Code</label>
					<input type="text"  class="form-control" name="zip" id="zip" value="{{old('zip')?old('zip'):$property->zip}}">
				</div>
			</div>
		</div>
</div>
<div class="description">
	<h5 class="color-primary">Building Details</h5>
	<hr>
	<div class="row">
		<div class="col-12 col-sm-6 col-md-3 col-lg-3 col-xl-3">
			<div class="form-group">
				<label>Property Code <span class="text-danger">*</span></label>
			<input type="text" name="propcode" id="prop_code" class="form-control" value="{{old('propcode')?old('propcode'):$property->propcode}}" autocomplete="off" readonly>
			</div>
		</div>
		<div class="col-12 col-sm-6 col-md-3 col-lg-3 col-xl-3">
					<div class="form-group">
					<label>Completion Date <span class="text-danger">*</span></label>
						<input type="text" name="completion_date" id="completion_date" class="form-control" value="{{ $property->completion_date}}" autocomplete="off">
					</div>
				</div>
				<div class="col-12 col-sm-6 col-md-3 col-lg-3 col-xl-3">
					<div class="form-group">
					<label>Total Floors <span class="text-danger">*</span></label>
					<input type="text" name="total_floors" id="total_floors" class="form-control numeric" value="{{ $property->total_floors}}" autocomplete="off">
					</div>
				</div>
				<div class=" col-12 col-sm-6 col-md-3 col-lg-3 col-xl-3">
					<div class="form-group">
					<label>Total Number Of Flats <span class="text-danger">*</span></label>
					<input type="text" name="total_flats" id="total_flats" class="form-control numeric" value="{{ $property->total_flats}}" autocomplete="off">
					</div>
				</div>
				<div class=" col-12 col-sm-6 col-md-3 col-lg-3 col-xl-3">
					<div class="form-group">
					<label>Total Number Of Shops <span class="text-danger">(If Any)</span></label>
					<input type="text" name="total_shops" id="total_shops" class="form-control numeric" value="{{ $property->total_shops}}" autocomplete="off">
					</div>
				</div>
{{--
		<div class="col-lg-4 col-md-4">
			<div class="form-group">
				<label>Category</label>
				<select class="form-control" name="category_id" id="category_id">
					<option value="">Select Category</option>
					@php
					$categories = array('1'=>'Residential Rent','2'=>'Commercial Rent','3'=>'Residential Rent','4'=>'Commercial Sale')
					@endphp
					@foreach($categories as $cKey=>$cVal)
					@if($cKey==(old('category_id')?old('category_id'):$property->category_id))
					<option value="{{ $cKey }}" selected>{{ $cVal }}</option>
					@else
					<option value="{{ $cKey }}">{{ $cVal }}</option>
					@endif
					@endforeach
				</select>
			</div>
		</div>--}}

	</div>
</div>

<div class="additional_feature mt-4">
	<h5 class="color-primary">Additional Features</h5>
	<div class="row">
		<div class="col-lg-12">
			<ul class="check_submit row">
				@php
					$selectedFeatures = explode(',',$property->feature);
				@endphp
				@if(count($features)>0)
					@foreach($features as $feature)
					<li class="icheck icheck-success col-md-3">
						@if(in_array($feature->id,$selectedFeatures))
							<input id="feature_{{ $feature->id }}" name="feature[]" class="hide" type="checkbox" value="{{ $feature->id }}" checked>
						@else
							<input id="feature_{{ $feature->id }}" name="feature[]" class="hide" type="checkbox" value="{{ $feature->id }}">
						@endif
						<label for="feature_{{ $feature->id }}">{{ $feature->title }}</label>
					</li>
					@endforeach
				@endif
			</ul>
		</div>

	</div>
</div>
<div class="card-card-body">
	<h5 class="color-primary">Floor Plans <span class="text-danger">*</span></h5>
       <div class="table-responsive">
		   	<table class="table table-bordered">
		<thead>
			<tr>
                <th>Series</th>
                <th>Floor</th>
                <th>No. Of Br</th>
                <th>Size in Sqft</th>
                <th>No Of Bath</th>
                <th>No Of Parking</th>
                <th>No Of Balcony</th>
                <th>Floor Plan</th>
                <th>Action</th>
			</tr>
		</thead>
		<tbody id="propertyUnitTypeGrid">
			@foreach($property->propertyUnitTypes as $prop_unit_type)
			<tr>
			<td><input type="hidden" name="property_unit_type_id[]" value="{{$prop_unit_type->id}}" readonly>
				<select class="form-control width_150px" name="unit_series[]">
                    @for($i=1;$i<9;$i++)
                        @php $selected = ($i==$prop_unit_type->unit_series)?"selected":null; @endphp
                        <option value="{{$i}}" {{$selected}}>Series {{$i}}</option>
                    @endfor
                </select>
            </td>
			<td>
                <select class="form-control width_100px" name="floor[]">
                    @for($i=1;$i<300;$i++)
                        @php $selected = ($i==$prop_unit_type->floor)?"selected":null; @endphp
                        <option value="{{$i}}" {{$selected}}> {{$i}}</option>
                    @endfor
                </select>
            </td>
			<td>
				<select class="form-control width_100px" name="bedroom[]">
                    @php $bedrooms = ["studio"=>"Studio","1"=>"1","2"=>"2","3"=>"3","4"=>"4","5"=>"5","6"=>"6","7"=>"7","7+"=>"7+","NA"=>"NA"]; @endphp
						   @foreach($bedrooms as $bKey=>$bValue)
                               @php $selected = ($bKey==$prop_unit_type->bedroom)?"selected":null; @endphp
                                <option value="{{$bKey}}">{{$bValue}}</option>
                               @endforeach
						</select>
			</td>
			<td><input class="form-control width_100px" name="unit_size[]" value="{{$prop_unit_type->unit_size}}"></td>
			<td>
				<select class="form-control width_80px" name="bathroom[]">
					 @php $bathrooms = ["1"=>"1","2"=>"2","3"=>"3","4"=>"4","5"=>"5","6"=>"6","7"=>"7","7+"=>"7+","NA"=>"NA"]; @endphp
                    @foreach($bathrooms as $bKey=>$bValue)
                        @php $selected = ($bKey==$prop_unit_type->bathroom)?"selected":null; @endphp
                        <option value="{{$bKey}}">{{$bValue}}</option>
                    @endforeach
				</select>
			</td>
			<td>
				<select class="form-control width_80px" name="parking[]">
					@php $parkings = ["1"=>"1","2"=>"2","3"=>"3","4"=>"4","5"=>"5","6"=>"6","7"=>"7","7+"=>"7+","NA"=>"NA"]; @endphp
                    @foreach($parkings as $pKey=>$pValue)
                        @php $selected = ($pKey==$prop_unit_type->parking)?"selected":null; @endphp
                        <option value="{{$pKey}}">{{$pValue}}</option>
                    @endforeach
				</select>
			</td>
			<td>
				<select class="form-control width_80px" name="balcony[]">
					@php $list = ["1"=>"1","2"=>"2","3"=>"3","4"=>"4","5"=>"5","6"=>"6","7"=>"7","7+"=>"7+","NA"=>"NA"]; @endphp
                    @foreach($list as $lKey=>$lValue)
                        @php $selected = ($lKey==$prop_unit_type->bolcony)?"selected":null; @endphp
                        <option value="{{$lKey}}">{{$lValue}}</option>
                    @endforeach
				</select>
			</td>
                <td>
                    <div class="form-group">
                        <div class="input-group">
                            <input type="file" class="form-control width_100px" name="floor_plan[]" value="">
                            <div class="input-group-prepend">
                                <div class="input-group-text">
                                    <a target="_blank" href="{{asset($prop_unit_type->floor_plan)}}">
                                        <i class="fa fa-file"></i>
                                    </a>

                                </div>
                            </div>
                        </div>
                    </div>
                </td>
			<td>
				{{--<button type="button" data-property_unit_type_id="{{$prop_unit_type->id}}" class="btn btn-danger btn-disabled"><i class="fa fa-times text-white" disabled="disabled"></i></button>--}}
			</td>
			</tr>
			@endforeach
		</tbody>
	</table>
	   </div>
	<div class="row mt-2" id="addMorePropertyUnitTypeDiv">
		<div class="col-md-2">
			<button type="button" id="addMorePropertyUnitTypeBtn" class="btn btn-primary"><i class="fa fa-plus text-white"></i> Add more</button>
		</div>

	</div>
</div>
<div class="upload_media mt-5">
	<h5 class="color-primary">Add Photos </h5>
	<hr>
	<div class="row">
		<div class="col-md-12">
			<div class="browse_submit">
				<input type="file" name="images[]" id="images" class="hide" value="" multiple>
				<label class="fileupload_label text-center w-100" for="images">Click Here To Add Photo (770x390)</label>
			</div>

		</div>

		<div class="col-lg-12">
			<div class="property_thumbnails mt-5">
				<div class="row" id="gallery">
					@if(count($property->images)>0)
					@php $images = $property->images;@endphp
						@foreach($images as $image)
				<div id="property_image_{{$image->id}}" class="thumbnails_box  m-2 col-lg-2 col-md-4 col-6 db-images">
							<img class="img250x150" src="{{asset($image->image_url)}}">
						<i data-id="{{$image->id}}" class="fa fa-window-close text-dark deleteImage"></i>
						</div>
						@endforeach
					@endif
				</div>
			</div>
		</div>
	</div>
</div>
<div class="description mt-4">
	<h5 class="color-primary">Description</h5>
	<hr>
	<div class="row">
		<div class="col-lg-12 col-md-12">
			<div class="form-group">
				<label>Description </label>
				<textarea name="description" id="description" class="form-control" placeholder="Write Details...">{{old('description')?old('description'):$property->description}}</textarea>
			</div>
		</div>
	</div>
</div>
					<div class="form-group">
						<input type="submit" name="name" class="btn btn-primary" value="Save Data">
					</div>
				</form>
			</div>
    @endsection
	@section('script')
    <script src="{{asset('plugin/datetimepicker/js/gijgo.min.js')}}"></script>
	<script src="https://maps.googleapis.com/maps/api/js?key={{get_systemSetting('map_api_key')}}"></script>
    <script src="{{asset('theme/default/js/map/map.scripts.js')}}"></script>
    <script>
    (function($){

		let _latitude  = '{{old('latitude')?old('latitude'):$property->latitude}}';
		let _longitude = '{{old('longitude')?old('longitude'):$property->longitude}}';
             _latitude = (_latitude)?_latitude:25.204850;
		    _longitude = (_longitude)?_longitude:55.270862;
        init(_latitude, _longitude);
    })(jQuery);
    </script>
    <script type="text/javascript">
	$(document).ready(function(){

	    let pickers = ["completion_date"];
           pickers.forEach(function(item){
               $(`#${item}`).datepicker({ footer: true, modal: true,format: 'dd-mm-yyyy', maxDate : '{{now()->format('d-m-Y')}}'});
           });

		$("#property_unit_type").on('change',function(){
			if($(this).val()==1)
			{
				$("#addMorePropertyUnitTypeDiv").hide();
			}
			else
			{
				$("#addMorePropertyUnitTypeDiv").show();
			}
		});
		function addRow()
		{
            let option = '';

         for(let i=1;i<200;i++)
         {
             option +=`<option value="${i}">${i}</option>`;
         }
          let html = `<tr>
					<td> <select class="form-control width_100px" name="unit_series[]">
                              <option value="1">Series 1</option>
                              <option value="2">Series 2</option>
                              <option value="3">Series 3</option>
                              <option value="4">Series 4</option>
                              <option value="5">Series 5</option>
                              <option value="6">Series 6</option>
                              <option value="7">Series 7</option>
                              <option value="8">Series 8</option>
                         </select>
                           </td>
					<td>
                <select class="form-control width_100px" name="floor[]">
                    ${option}
                </select>
                         </td>
					<td>
						<select class="form-control width_100px" name="bedroom[]">
						   <option value="1">1</option>
						   <option value="2">2</option>
						   <option value="3">3</option>
						   <option value="4">4</option>
						   <option value="5">5</option>
						   <option value="6">6</option>
						   <option value="7">7+</option>
                           <option value="NA">NA</option>
					      <option value="studio">Studio</option>
						</select>
					</td>
					<td><input class="form-control width_100px" name="unit_size[]" value=""></td>
					<td>
					<select class="form-control width_80px" name="bathroom[]">
					      <option value="1">1</option>
					      <option value="2">2</option>
					      <option value="3">3</option>
					      <option value="4">4</option>
					      <option value="5">5</option>
					      <option value="6">6</option>
					      <option value="7">7</option>
					      <option value="7+">7+</option>
					      <option value="none">None</option>
					      <option value="NA">NA</option>
					   </select>
					</td>
					<td>
					   <select class="form-control width_80px" name="parking[]">
					      <option value="1">1</option>
					      <option value="2">2</option>
					      <option value="3">3</option>
					      <option value="4">4</option>
					      <option value="5">5</option>
					      <option value="6">6</option>
					      <option value="7">7</option>
					      <option value="7+">7+</option>
					      <option value="NA">NA</option>
					   </select>
					</td>
					<td>
					   <select class="form-control width_80px" name="balcony[]">
					      <option value="1">1</option>
					      <option value="2">2</option>
					      <option value="3">3</option>
					      <option value="4">4</option>
					      <option value="5">5</option>
					      <option value="6">6</option>
					      <option value="7">7</option>
					      <option value="7+">7+</option>
					      <option value="NA">NA</option>
					   </select>
					</td>
					<td><input type="file" class="form-control width_150px" name="floor_plan[]" value=""></td>
						<td>
							<button  class="btn btn-danger removeRowBtn" type="button"><i class="fa fa-times text-white"></i></button>
						</td>
					</tr>`;
					$("#propertyUnitTypeGrid").append(html);

		}
		$("#addMorePropertyUnitTypeBtn").on('click',function(){
			addRow();
		});
		$(document).on('click','.removeRowBtn',function(e){
			e.preventDefault();
			$(this).closest('tr').remove();
		});
	$("#edit_data_form").on('submit',function(e){
		e.preventDefault();
		var params = new FormData(document.getElementById('edit_data_form'));
		var url    = '{{route('property.update',['id'=>$property->id])}}';
		function fn_success(result)
		{
			if(result.response=='success')
			{
				toast('success', result.message, 'top-right');
				window.location.href=window.location.href;
			}
		};
		function fn_error(result)
		{
            toast('error', result.message, 'top-right');
		};
		$.fn_ajax_multipart(url,params,fn_success,fn_error);
	});
$("#prop_code, #state_id, #city_id").on('change',function(e){
     $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            })

            var type  = "POST";
            var url   = "{{route('property.code.gen')}}";
            $.ajax({
                type  : type,
                url   : url,
                data  : {
                'state_id' : $("#state_id option:selected").text(),
				'city_id'  : $("#city_id option:selected").text(),
                'code'     : $("#prop_code").val()
            },
                dataType: 'json',
                success: function(data)
				{
                    if(data.status=='1')
					{
						$("#prop_code").val(data.code).prop('readonly',true);
                    }
					else
					{
                    }
                },
                error: function(data)
				{
                    console.log('Error:', data);
                }
            });

});
$(document).on('click','.deleteImage',function(e){
	id = $(this).attr('data-id');
	Swal.fire({
				title: 'Are you sure?',
				text: "You won't be able to revert this!",
				type: 'warning',
				showCancelButton: true,
				confirmButtonColor: '#3085d6',
				cancelButtonColor: '#d33',
				confirmButtonText: 'Yes, delete it!'
              }).then((result) => {
                   if (result.value) {
    $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            })

            var type  = "POST";
            var url   = "{{route('ajax.delete.image')}}";
            $.ajax({
                type  : type,
                url   : url,
                data  : {id : id},
                dataType : 'json',
                success  : function(result)
				{
                    if(result.response=='success')
					{
						$("#property_image_"+id).remove();
                    }
					else
					{
						toast('error', result.message, 'top-right');
                    }
                },
                error: function(result)
				{
                    console.log('Error:', result);
                }
            });
  }
});

});
$("#country_id").on('change',function(e){
	if(!$.trim($("#country_id").val()).length)
	{
		 $("#country_id").css({'border-color':'red'}).focus();
         toast('error', 'Please select country', 'top-right');
						return false;
	}
	else
	{
              $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': '{{csrf_token()}}'
                }
            })
            $.ajax({
                type     : "POST",
                url      : "{{route('ajax.get.states')}}",
                data     : {'country_id' : $("#country_id").val()},
                dataType : 'json',
                success  : function(res)
				{
                    if(res.response=='success')
					{
						$("#state_id").html('');
						$("#state_id").append($('<option></option>').text('Select State').val(''));
						$.each(res.data,function(index,obj){
                              $("#state_id").append($('<option/>').text(obj.name).val(obj.id));
						});
						$("#state_id").css({'border-color':'green'}).focus();
                    }
					else
					{
                        $("#alert-code").addClass('hideme');
                    }
                },
                error: function(ERROR)
				{
                    console.log('Error:', ERROR);
                }
            });
	}
});
$("#state_id").on('change',function(e){
	if(!$.trim($("#state_id").val()).length)
	{
		 $("#state_id").css({'border-color':'red'}).focus();
         toast('error', 'Please select state', 'top-right');
		return false;
	}
	else
	{
              $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': '{{csrf_token()}}'
                }
            })
            $.ajax({
                type     : "POST",
                url      : "{{route('ajax.get.cities')}}",
                data     : {'state_id' : $("#state_id").val()},
                dataType : 'json',
                success  : function(res)
				{
                    if(res.response=='success')
					{
						$("#city_id").html('');
						$("#city_id").append($('<option></option>').text('Select City').val(''));
						$.each(res.data,function(index,obj){
                              $("#city_id").append($('<option/>').text(obj.name).val(obj.id));
						});
						$("#city_id").css({'border-color':'green'}).focus();
                    }
					else
					{
                        toast('error',res.message, 'top-right');
                    }
                },
                error: function(ERROR)
				{
                    console.log('Error:', ERROR);
                }
            });
	}
});
	});

	</script>
	<script>
		$(function() {
    // Multiple images preview in browser
    var imagesPreview = function(input, placeToInsertImagePreview) {

        if (input.files) {
            var filesAmount = input.files.length;

            for (i = 0; i < filesAmount; i++) {
                var reader = new FileReader();

                reader.onload = function(event)
				{
					let parentDiv = $($.parseHTML('<div>')).attr({'class':'thumbnails_box  m-2 col-lg-2 col-md-4 col-6'});
                    $($.parseHTML('<img>')).attr({'src':event.target.result,'class':'img250x150'}).appendTo(parentDiv);
                    parentDiv.appendTo(placeToInsertImagePreview);
                }

                reader.readAsDataURL(input.files[i]);
            }
        }

    };

    $('#images').on('change', function() {
		if($("div#gallery").length>0)
		{
		  let len =	$("#gallery").find('div').length;
		  $.each($("#gallery").find('div'),function(){
			  if(!$(this).hasClass('db-images'))
			  {
				  $(this).remove();
			  }
		  });
		}
        imagesPreview(this, 'div#gallery');
    });
});
	</script>
	<script>
$(function()
{
	$("input[type='submit']").click(function(e)
	{
		var $fileUpload = $("input[type='file']");
		let max         = 6;
		if(parseInt($fileUpload.get(0).files.length)>max)
		{
		   alert(`You can only upload a maximum of ${max}  files`);
		   let len =	$("#gallery").find('div').length;
		  $.each($("#gallery").find('div'),function(){
			  if(!$(this).hasClass('db-images'))
			  {
				  $(this).remove();
			  }
		  });
		   $("#images").val('');
		   e.preventDefault();
		}
	});
});
	</script>
    @endsection
