@extends('admin.layout.base')
@section('content')


<!-- Content -->
    <div class="content container-fluid">
        <span class="float-right">Add Building</span>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}">Home</a></li>
                <li class="breadcrumb-item active" aria-current="page">Add Building</li>
            </ol>
        </nav>

        <div class="row gx-2 gx-lg-3 mt-3">
            <div class="col-lg-12 mb-3 mb-lg-0">

                <!-- Card -->
                <div class="card">
                    
                    <div class="card-body">
                    	<form id="add_data_form" enctype="multipart/form-data" method="POST" autocomplete="off">
						@csrf
						<div class="property-location mt-4">
							<h5 class="color-primary">Building Location</h5>
							<hr>
							 <div class="row">
				                 <div class="col-lg-12 col-md-12">
				                     <div class="form-group">
				                         <label>Building Name</label>
				                         <span class="ml-2 text-danger">*</span>
				                         <input type="text" name="title" id="title" class="form-control" value="{{old('title')}}">
				                     </div>
				                 </div>
								 <div class="col-md-4">
									 <div class="form-group">
										 <label for="owner_id">Developer  <span class="ml-2 text-danger">*</span></label>
										 <select class="js-select2-custom" name="owner_id" id="owner_id">
											  <option value="">Select Developer</option>
											 @foreach ($owners as $owner)
										      <option value="{{$owner->id}}">{{$owner->name}}</option>
											 @endforeach
										 </select>
									 </div>

									<div class="form-group">
										<label>Property Types  <span class="ml-2 text-danger">*</span></label>
										<select class="js-select2-custom @error('type') is-invalid @enderror" name="type" id="type">
											<option value="">Select Property Type</option>
											@foreach($propertyTypes as $type)
											@if($type->id==old('type'))
											<option value="{{ $type->id }}" selected>{{ $type->title }}</option>
											@else
											<option value="{{ $type->id }}">{{ $type->title }}</option>
											@endif
											@endforeach
										</select>
									</div>
										<div class="form-group">
										<label>Purpose  <span class="ml-2 text-danger">*</span></label>
										<select class="js-select2-custom" name="prop_for" id="prop_for">

											@php
											$purpose = get_property_purpose_modes()
											@endphp
											@foreach($purpose as $pKey=>$pVal)
											@if($pKey==old('prop_for'))
											<option value="{{$pKey}}" selected>{{$pVal}}</option>
											@else
											<option value="{{$pKey}}">{{$pVal}}</option>
											@endif
											@endforeach
										</select>
									</div>
									 <div class="form-group">
										<label>Country  <span class="ml-2 text-danger">*</span></label>
										<select class="js-select2-custom" name="country_id" id="country_id">
											@foreach($countries as $country)
											@if($country->code==971)
											<option value="{{ $country->id }}" selected>{{ $country->name }}</option>
											@endif
											@endforeach
										</select>

									</div>

									<div class="form-group">
										<label>City  <span class="ml-2 text-danger">*</span></label>
										<select class="js-select2-custom" name="city_id" id="city_id">
											<option value="">Select City</option>
				                            @foreach($cities as $city)
				                                @php  $selected = ($city->id==old('city_id'))?"selected":null; @endphp
				                                    <option value="{{ $city->id }}" {{$selected}}>{{$city->name}}</option>
				                            @endforeach
										</select>

									</div>
								 </div>
								 <div class="col-md-8 col-lg-8">
									 <div class="mb-3">
										<div class="single-map">
											<div id="map"></div>
										</div>
									</div>
								 </div>
							 </div>
							<div class="row d-none">
								<div class="col-6">
									<div class="form-group">
										<label for="latitude"></label>
										<input type="text" name="latitude" id="latitude" class="form-control" value="" placeholder="Latitude">

									</div>
								</div>
								<div class="col-6">
									<div class="form-group">
										<label for="longitude"></label>
										<input type="text" name="longitude" id="longitude" class="form-control" value="" placeholder="Longitude">

									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-lg-8 col-md-8">
									<div class="form-group">
										<label>Area  <span class="ml-2 text-danger">*</span></label>
										<input type="text" name="address" id="address" class="form-control" value="{{old('address')}}">
									</div>
								</div>
				                <div class="col-lg-4 col-md-4">
									<div class="form-group">
										<label>Land Mark </label>
										<input type="text" class="form-control" name="landmark" id="landmark" value="{{old('landmark')}}">
									</div>
								</div>
								<div class="col-lg-4 col-md-4">
									<div class="form-group">
										<label>Zip Code </label>
										<input type="text" class="form-control" name="zip" id="zip" value="{{old('zip')}}">
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
										<label>Property Code  <span class="ml-2 text-danger">*</span></label>
										<input type="text" name="propcode" id="prop_code" class="form-control" value="{{ old('propcode')}}" autocomplete="off" readonly>
									</div>
								</div>
								<div class="col-12 col-sm-6 col-md-3 col-lg-3 col-xl-3">
									<div class="form-group">
									<label>Completion Date  <span class="ml-2 text-danger">*</span></label>
									<input type="text" name="completion_date" id="completion_date" class="form-control js-flatpickr  flatpickr-custom" value="{{ old('building_age')}}" autocomplete="off">
									</div>
								</div>
								<div class="col-12 col-sm-6 col-md-3 col-lg-3 col-xl-3">
									<div class="form-group">
									<label>Total Floors  <span class="ml-2 text-danger">*</span></label>
									<input type="text" name="total_floors" id="total_floors" class="form-control numeric" value="{{ old('total_floors')}}" autocomplete="off">
									</div>
								</div>
								<div class=" col-12 col-sm-6 col-md-3 col-lg-3 col-xl-3">
									<div class="form-group">
									<label>Total Number Of Flats  <span class="ml-2 text-danger">*</span></label>
									<input type="text" name="total_flats" id="total_flats" class="form-control numeric" value="{{ old('total_flats')}}" autocomplete="off">
									</div>
								</div>
								<div class=" col-12 col-sm-6 col-md-3 col-lg-3 col-xl-3">
									<div class="form-group">
									<label>Total Number Of Shops <span class="text-danger">(If Any)</span></label>
									<input type="text" name="total_shops" id="total_shops" class="form-control numeric" value="{{ old('total_shops')}}" autocomplete="off">
									</div>
								</div>
							</div>
						</div>
		<div class="additional_feature mt-4">
			<h5 class="color-primary">Floor Plans  <span class="ml-2 text-danger">*</span></h5>
			<div class="table-responsive">
				<table class="table table-bordered">
				<thead>
					<tr>
						<th>Series</th>
						<th>Floor (From - to)</th>
						<th>No. Of Br</th>
						<th>Size in Sqft</th>
						<th>No Of Bath</th>
						<th>No Of Parking</th>
						<th>No Of Balcony</th>
						<th>Floor Plan</th>
						<th>Action</th>
					</tr>
					</thead>
					<tbody id="property_unit_type_grid"></tbody>
				</table>
			</div>
			<div class="row mt-2" id="addMorePropertyUnitTypeDiv">
				<div class="col-md-2">
					<button type="button" id="addMorePropertyUnitTypeBtn" class="btn btn-primary"><i class="fa fa-plus text-white"></i> Add more</button>
				</div>

			</div>
			<div class="additional_feature mt-4">
			<h5 class="color-primary">Additional Features</h5>
			<div class="row">
				<div class="col-lg-12">
					<ul class="row">
						@if(count($features)>0)
						@foreach($features as $feature)
						<li class="icheck icheck-success col-md-3">
							<input id="feature_{{ $feature->id }}" name="feature[]" class="hide" type="checkbox" value="{{ $feature->id }}">
							<label for="feature_{{ $feature->id }}">{{ $feature->title }}</label>
						</li>
						@endforeach
						@endif
					</ul>
				</div>
				<div class="col-lg-12">
					@error('feature')
					<div class="alert alert-danger">{{ $message }}</div>
					@enderror
				</div>
			</div>
		</div>


			<div class="upload_media mt-5">
				<h5 class="color-primary">Upload Building Pictures  <span class="ml-2 text-danger" title="At least one image is required">*</span></h5>
				<hr>
				<div class="row">
					<div class="col-md-12">
						<!-- File Attachment Input -->
  <label class="custom-file-boxed" for="customFileInputBoxedEg">
    <span id="customFileBoxedEg">Browse your device and upload documents</span>
    <small class="d-block text-muted">Maximum file size 10MB</small>

    <input id="customFileInputBoxedEg" name="images[]" type="file" class="js-file-attach custom-file-boxed-input"
           data-hs-file-attach-options='{
             "textTarget": "#customFileBoxedEg"
           }'>
  </label>
  <!-- End File Attachment Input -->


						
					</div>

					<div class="col-lg-12">
						<div class="property_thumbnails mt-5">
							<div class="row" id="gallery">
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="description mt-4">
			<h5 class="color-primary">Description </h5>
			<hr>
			<div class="row">
				<div class="col-lg-12 col-md-12">
					<div class="form-group">
						<label>Description  <span class="ml-2 text-danger">*</span></label>
						<textarea name="description" size="500" id="description" class="form-control" placeholder="Write Details...">{{old('title')}}</textarea>

					</div>
				</div>
			</div>
		  </div>

			<div class="form-group">
				<input type="submit" name="name" class="btn btn-primary" value="Save Building">
			</div>
	</form>
                    </div>

                    
                </div>
                <!-- End Card -->

            </div>
        </div>


    </div>
    <!-- End Content -->
@endsection
@section('js')
<script src="{{asset('plugin/datetimepicker/js/gijgo.min.js')}}"></script>
<script src="{{asset('map/map.scripts.js')}}"></script>
<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key={{get_systemSetting('map_api_key')}}&libraries=places"></script>
@endsection

@section('script')

<script>
	$('.js-select2-custom').each(function () {
      var select2 = $.HSCore.components.HSSelect2.init($(this));
    });

    $('.js-file-attach').each(function () {
      var customFile = new HSFileAttach($(this)).init();
    });

    $('.js-flatpickr').each(function () {
          $.HSCore.components.HSFlatpickr.init($(this));
        });
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
    function geo_locate() {
        if (navigator.geolocation) {
            navigator.geolocation.getCurrentPosition(function (position) {
                let geolocation = {
                    lat: position.coords.latitude,
                    lng: position.coords.longitude
                };
                let circle = new google.maps.Circle(
                    {center: geolocation, radius: position.coords.accuracy});
                autocomplete.setBounds(circle.getBounds());
            });
        }
    }

	(function($) {
		let _latitude = 25.204850;
		let _longitude = 55.270862;
		init(_latitude, _longitude);
	})(jQuery);
</script>
<script type="text/javascript">

	let propAddLink = "{{route('property.store')}}";
	(function($) {
		
	
	    addRow();

	    

		$(document).on('click','.removeRowBtn',function(e){
			e.preventDefault();
			let primary_tr = $(this).closest('tr');
            if($("#property_unit_type_grid").find('tr').index(primary_tr)!=0)
			{
				$(this).closest('tr').remove();
			}
		});


	$("#addMorePropertyUnitTypeBtn").on('click',function(){
			addRow();
		});
     function addRow(){

         let option = '';

         for(let i=1;i<200;i++)
         {
             option +=`<option value="${i}">${i}</option>`;
         }
          let html = `<tr>
					<td style="width:150px"> <select class="js-select2-custom" name="unit_series[]">
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
                <select class="js-select2-custom d-inline" name="floor_from[]">
                    ${option}
                </select>
               <select class="js-select2-custom d-inline" name="floor_to[]">
                    ${option}
                </select>
                         </td>
					<td>
						<select class="js-select2-custom" name="bedroom[]">
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
					<select class="js-select2-custom" name="bathroom[]">
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
					   <select class="js-select2-custom" name="parking[]">
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
					   <select class="js-select2-custom" name="balcony[]">
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
					<td><div class="custom-file">

                                <input type="file" name="floor_plan[]" class="js-file-attach custom-file-input"
                                       data-hs-file-attach-options='{
              "textTarget": "[for=\"floor_plan\"]"
           }'>
                                <label class="custom-file-label" for="floor_plan">Choose file</label>
                            </div></td>
					
						<td>
							<button  class="btn btn-danger removeRowBtn" type="button"><i class="fa fa-times text-white"></i></button>
						</td>
					</tr>`;
					$("#property_unit_type_grid").append(html);
		}
		$("#prop_code,#country_id,#city_id").on('change', function(e){

			$.ajaxSetup({headers:{'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')}});
			$.ajax({
				type : "POST",
				url  : "{{route('property.code.gen')}}",
				data :
                    {
					'country_id': $("#country_id option:selected").text(),
					'city_id'   : $("#city_id option:selected").text(),
					'code'      : $("#prop_code").val()
				    },
				dataType: 'json',
				success: function(result)
                {
					if(result.status === '1')
					{
						$("#prop_code").val(result.code).prop('readonly', true);
					}
					else
                    {

                    }
				},
				error: function(data) {
					console.log('Error:', data);
				}
			});

		});

		$("#add_data_form").on('submit',function(e){
		e.preventDefault();
		let params = new FormData(document.getElementById('add_data_form'));
		let url    = '{{route('property.store')}}';
		function fn_success(result)
		{
			if(result.response==='success')
			{
				toast('success', result.message, 'top-right');
				$("#add_data_form")[0].reset();
				$("#gallery").empty();
			}
		}
		function fn_error(result)
		{
            toast('error', result.message, 'top-right');
		}
		$.fn_ajax_multipart(url,params,fn_success,fn_error);
	});
			$('.js-select2-custom').each(function () {
			    var select2 = $.HSCore.components.HSSelect2.init($(this));
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
						let parentDiv = $($.parseHTML('<div>')).attr({'class': 'm-2 col-lg-2 col-md-4 col-6'});
						$($.parseHTML('<img>')).attr({'src':event.target.result,'class':'img250x150'}).appendTo(parentDiv);
						parentDiv.appendTo(placeToInsertImagePreview);
					}

					reader.readAsDataURL(input.files[i]);
				}
			}

		};

		$('#images').on('change', function() {
			if ($("div#gallery").length > 0) {
				$("#gallery").empty();
			}
			imagesPreview(this, 'div#gallery');
		});
	});
</script>
<script>
	$(function() {
		$("input[type='submit']").click(function(e) {
			let $fileUpload = $("input[type='file']");
			let max = 6;
			if (parseInt($fileUpload.get(0).files.length) > max) {
				alert(`You can only upload a maximum of ${max}  files`);
				$("#gallery").empty();
				$("#images").val('');
				e.preventDefault();
			}
		});
	});
</script>
@endsection
