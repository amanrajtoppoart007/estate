@extends('admin.layout.app')
@section('head')
  <link rel="stylesheet" href="{{asset('assets/plugins/icheck-bootstrap/icheck-bootstrap.min.css')}}">
  <link rel="stylesheet" href="{{asset('plugin/datetimepicker/css/gijgo.min.css')}}">
@endsection
@include("admin.include.breadcrumb",["page_title"=>"Edit Property"])
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
				<label for="title">Building Name <span class="text-danger">*</span></label>
				<input type="text" name="title" id="title" class="form-control" value="{{$property->title}}">
			</div>
        </div>
		<div class="col-md-4">
		<div class="form-group">
			<label for="owner_id">Developer <span class="text-danger">*</span></label>
			<select class="form-control" name="owner_id" id="owner_id">
				<option value="">Select Developer</option>
				@foreach($owners as $owner)
						@if($owner->id==$property->owner_id))
						<option value="{{ $owner->id }}" selected>{{ $owner->name }}</option>
						@else
						<option value="{{ $owner->id }}">{{ $owner->name }}</option>
						@endif
					@endforeach
			</select>
		</div>

			<div class="form-group">
			<label for="type">Property Type <span class="text-danger">*</span></label>
				<select class="form-control" name="type" id="type">
					<option value="">Select Property Type</option>
					@foreach($propertyTypes as $type)
						@if($type->id==$property->type))
						<option value="{{ $type->id }}" selected>{{ $type->title }}</option>
						@else
						<option value="{{ $type->id }}">{{ $type->title }}</option>
						@endif
					@endforeach
				</select>
			</div>

			<div class="form-group">
			<label for="prop_for">Purpose <span class="text-danger">*</span></label>
				<select class="form-control" name="prop_for" id="prop_for">
					<option value="">Select Purpose</option>
					@php
						$purpose = array('1'=>'For Rent','2'=>'For Sale','3'=>'Rent & Sale')
					@endphp
					@foreach($purpose as $pKey=>$pVal)
						@if($pKey==$property->prop_for)
						<option value="{{$pKey}}" selected>{{$pVal}}</option>
						@else
						<option value="{{$pKey}}">{{$pVal}}</option>
						@endif
					@endforeach
				</select>
			</div>

			<div class="form-group">
			<label for="country_id">Country <span class="text-danger">*</span></label>
				<select class="form-control" name="country_id" id="country_id">
					@foreach($countries as $country)
                        @if($country->code==971)
						@php $selected =  ($country->id==$property->country_id)?'selected':null; @endphp
						<option value="{{ $country->id }}" {{$selected}}>{{ $country->name }}</option>
                        @endif
					@endforeach
				</select>
			</div>

			<div class="form-group">
			<label for="city_id">City <span class="text-danger">*</span></label>
			<select class="form-control" name="city_id" id="city_id">
				<option value="">Select City</option>
				@foreach($cities as $city)
				@php $selected = ($city->id==$property->city_id)?'selected':null; @endphp
					<option value="{{$city->id }}" {{$selected}}>{{$city->name}}</option>
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
					<label for="address">Area <span class="text-danger">*</span></label>
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
				<label for="prop_code">Property Code <span class="text-danger">*</span></label>
			<input type="text" name="propcode" id="prop_code" class="form-control" value="{{old('propcode')?old('propcode'):$property->propcode}}" autocomplete="off" readonly>
			</div>
		</div>
		<div class="col-12 col-sm-6 col-md-3 col-lg-3 col-xl-3">
					<div class="form-group">
					<label for="completion_date">Completion Date <span class="text-danger">*</span></label>
						<input type="text" name="completion_date" id="completion_date" class="form-control" value="{{ $property->completion_date}}" autocomplete="off">
					</div>
				</div>
				<div class="col-12 col-sm-6 col-md-3 col-lg-3 col-xl-3">
					<div class="form-group">
					<label for="total_floors">Total Floors <span class="text-danger">*</span></label>
					<input type="text" name="total_floors" id="total_floors" class="form-control numeric" value="{{ $property->total_floors}}" autocomplete="off">
					</div>
				</div>
				<div class=" col-12 col-sm-6 col-md-3 col-lg-3 col-xl-3">
					<div class="form-group">
					<label for="total_flats">Total Number Of Flats <span class="text-danger">*</span></label>
					<input type="text" name="total_flats" id="total_flats" class="form-control numeric" value="{{ $property->total_flats}}" autocomplete="off">
					</div>
				</div>
				<div class=" col-12 col-sm-6 col-md-3 col-lg-3 col-xl-3">
					<div class="form-group">
					<label for="total_shops">Total Number Of Shops <span class="text-danger">(If Any)</span></label>
					<input type="text" name="total_shops" id="total_shops" class="form-control numeric" value="{{ $property->total_shops}}" autocomplete="off">
					</div>
				</div>


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
                <th>Floor (From - To)</th>
                <th>No. Of Br</th>
                <th>Size in SqFt</th>
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
				<select class="form-control width_105px" name="unit_series[]">
                    @for($i=1;$i<9;$i++)
                        @php $selected = ($i==$prop_unit_type->unit_series)?"selected":null; @endphp
                        <option value="{{$i}}" {{$selected}}>Series {{$i}}</option>
                    @endfor
                </select>
            </td>
			<td class="width_200px">
                <select class="form-control width_80px d-inline" name="floor_from[]">
                    @for($i=1;$i<300;$i++)
                        @php $selected = ($i==$prop_unit_type->floor_from)?"selected":null; @endphp
                        <option value="{{$i}}" {{$selected}}> {{$i}}</option>
                    @endfor
                </select>
                <select class="form-control width_80px d-inline" name="floor_to[]">
                    @for($i=1;$i<300;$i++)
                        @php $selected = ($i==$prop_unit_type->floor_to)?"selected":null; @endphp
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
	<script src="https://maps.googleapis.com/maps/api/js?key={{get_systemSetting('map_api_key')}}&libraries=places"></script>
    <script src="{{asset('map/map.scripts.js')}}"></script>
    <script>
           let autocomplete;
    function initAutocomplete() {

        autocomplete = new google.maps.places.Autocomplete(
            document.getElementById('address'), {types: ['establishment']});

        //autocomplete.setFields(['address_component']);

        autocomplete.addListener('place_changed', fillInAddress);
    }

   function fillInAddress() {
  // Get the place details from the autocomplete object.
  let place = autocomplete.getPlace();

  let _latitude = autocomplete.getPlace().geometry.location.lat();
  let _longitude = autocomplete.getPlace().geometry.location.lng();
  init(_latitude, _longitude);

  document.getElementById('latitude').value = _latitude;
  document.getElementById('longitude').value = _longitude;

}
initAutocomplete();
    (function($){

		let _latitude  = '{{old('latitude')?old('latitude'):$property->latitude}}';
		let _longitude = '{{old('longitude')?old('longitude'):$property->longitude}}';
             _latitude = (_latitude)?_latitude:25.204850;
		    _longitude = (_longitude)?_longitude:55.270862;
        init(_latitude, _longitude);
    })(jQuery);
    </script>
    <script type="text/javascript">
	(function($){

	    let pickers = ["completion_date"];
           pickers.forEach(function(item){
               $(`#${item}`).datepicker({ footer: true, modal: true,format: 'dd-mm-yyyy', maxDate : '{{now()->format('d-m-Y')}}'});
           });


		function addRow()
		{
            let option = '';

         for(let i=1;i<200;i++)
         {
             option +=`<option value="${i}">${i}</option>`;
         }
          let html = `<tr>
					<td> <select class="form-control width_105px" name="unit_series[]">
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
					<td class="width_200px">
                      <select class="form-control width_80px d-inline" name="floor_from[]">
                        ${option}
                     </select>
                    <select class="form-control width_80px d-inline" name="floor_to[]">
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
		let params = new FormData(document.getElementById('edit_data_form'));
		let url    = '{{route('property.update',['id'=>$property->id])}}';
		function fn_success(result)
		{
			if(result.response==='success')
			{
				toast('success', result.message, 'top-right');
				window.location.href=window.location.href;
			}
		}
		function fn_error(result)
		{
            toast('error', result.message, 'top-right');
		}
		$.fn_ajax_multipart(url,params,fn_success,fn_error);
	});
$("#prop_code, #country_id, #city_id").on('change',function(e){
     $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            })

            let type  = "POST";
            let url   = "{{route('property.code.gen')}}";
            $.ajax({
                type  : type,
                url   : url,
                data  : {
                'country_id' : $("#country_id option:selected").text(),
				'city_id'    : $("#city_id option:selected").text(),
                'code'       : $("#prop_code").val()
            },
                dataType: 'json',
                success: function(result)
				{
                    if(result.status==='1')
					{
						$("#prop_code").val(result.code).prop('readonly',true);
                    }
					else
					{
					    console.log(result);
                    }
                },
                error: function(result)
				{
                    console.log('Error:', result);
                }
            });

});
$(document).on('click','.deleteImage',function(e){
	let id = $(this).attr('data-id');
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

            let type  = "POST";
            let url   = "{{route('ajax.delete.image')}}";
            $.ajax({
                type  : type,
                url   : url,
                data  : {id : id},
                dataType : 'json',
                success  : function(result)
				{
                    if(result.response==='success')
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


	})(jQuery);

	</script>
	<script>
		$(function() {
    // Multiple images preview in browser
    let imagesPreview = function(input, placeToInsertImagePreview) {

        if (input.files) {
            let filesAmount = input.files.length;

            for (let i = 0; i < filesAmount; i++) {
                let reader = new FileReader();

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
(function($)
{
	$("input[type='submit']").on('click',function(e)
	{
		let $fileUpload = $("input[type='file']");
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
})(jQuery);
	</script>
    @endsection
