@extends('admin.layout.base')
@section('content')



<!-- Content -->
    <div class="content container-fluid">
        <span class="float-right">Maintenance Request</span>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}">Home</a></li>
                <li class="breadcrumb-item active" aria-current="page">Maintenance Request</li>
            </ol>
        </nav>

        <div class="row gx-2 gx-lg-3 mt-3">
            <div class="col-lg-12 mb-3 mb-lg-0">

                <!-- Card -->
               
   <div class="card">
       <div class="card-body">
           {{Form::open(['route'=>'maintenance.store','id'=>'add_data_form'])}}
             <div class="row">
               <div class="col-md-12 col-lg-12">
                  <div class="card card-info">
                      <div class="card-header">
                          <h6>Maintenance Request Detail</h6>
                      </div>
                      <div class="card-body">
                          <div class="row">
                      <div class="col-md-6">
                          <div class="form-group">
                              <label for="name">Building Name</label>
                              
                                  <select class="js-select2-custom" name="property_id" id="property_id">
                                      <option value="">Select Property</option>
                                      @foreach($buildings as $building)
                                          <option value="{{$building->id}}">{{$building->title}} ({{$building->city->name}})</option>
                                      @endforeach
                                  </select>
                          </div>
                      </div>
                      <div class="col-md-6">
                          <div class="form-group">
                              <label for="email">Unit/Flat No</label>
                              
                                  <select class="js-select2-custom" name="property_unit_id" id="property_unit_id">
                                      <option value="">Select Unit</option>
                                  </select>
                          </div>
                      </div>
                  </div>
                  <div class="row">
                      <div class="col-md-6">
                          <div class="form-group">
                              <label for="category">Category</label>
                              <select  class="js-select2-custom" name="category" id="category">
                                      <option value="">Select Category</option>
                                      @foreach($categories as $category)
                                          <option value="{{Illuminate\Support\Str::slug($category->title)}}">{{$category->title}}</option>
                                      @endforeach
                                  </select>
                          </div>
                      </div>
                  </div>
                      </div>
                  </div>
                   <div class="card card-info">
                      <div class="card-header">
                          <h6>Description</h6>
                      </div>
                      <div class="card-body">
                          <div class="row">
                              <div class="col-md-12">
                                  <textarea rows="8" name="description" class="form-control"
                                            placeholder="Please enter work description here"></textarea>
                              </div>
                          </div>
                      </div>
                  </div>
                    <div class="card card-info">
                      <div class="card-header">
                          <h6>Appointment Timing</h6>
                      </div>
                      <div class="card-body">
                          <div class="row">
                              <div class="col-12 col-sm-4 col-md-4 col-lg-4 col-xl-4">
                                  <div class="form-group">
                                      <label for="appointment_date">Date</label>
                                      <input type="text" class="form-control js-flatpickr flatpickr-custom" name="appointment_date" id="appointment_date" data-hs-flatpickr-options='{
                                             "dateFormat": "d-m-Y"
                                           }' value="{{now()->format('d-m-Y')}}">
                                  </div>
                              </div>
                              <div class="col-12 col-sm-4 col-md-4 col-lg-4 col-xl-4">
                                  <div class="form-group">
                                      <label for="appointment_time_from">From</label>
                                      <div class="input-group">
                                          <div class="input-group-prepend">
                                              <span class="input-group-text"><i class="fa fa-clock"></i></span>
                                          </div>
                                          <input type="text" class="form-control" name="appointment_time_from" id="appointment_time_from" value="{{now()->format('H:i')}}"/>
                                      </div>
                                  </div>
                              </div>
                              <div class="col-12 col-sm-4 col-md-4 col-lg-4 col-xl-4">
                                  <div class="form-group">
                                      <label for="appointment_time_to">To</label>
                                      <div class="input-group">
                                          <div class="input-group-prepend">
                                              <span class="input-group-text"><i class="fa fa-clock"></i></span>
                                          </div>
                                          <input type="text" class="form-control" name="appointment_time_to" id="appointment_time_to" value=""/>
                                      </div>
                                  </div>
                              </div>
                          </div>
                      </div>
                  </div>
                   <div class="card card-info">
                      <div class="card-header">
                          <h6>Contact Detail</h6>
                      </div>
                      <div class="card-body">
                          <div class="row">
                              <div class="col-12 col-sm-4 col-md-4 col-lg-4 col-xl-4">
                                  <div class="form-group">
                                      <label for="name">Name</label>
                                      <div class="input-group">
                                          <div class="input-group-prepend">
                                              <span class="input-group-text"><i class="fa fa-calendar-day"></i></span>
                                          </div>
                                          <input type="text" class="form-control" name="name" id="name" value=""/>

                                      </div>
                                  </div>
                              </div>
                              <div class="col-12 col-sm-4 col-md-4 col-lg-4 col-xl-4">
                                  <div class="form-group">
                                      <label for="contact">Contact Number</label>
                                      <div class="input-group">
                                          <div class="input-group-prepend">
                                              <span class="input-group-text"><i class="fa fa-clock"></i></span>
                                          </div>
                                          <input type="text" class="form-control numeric" name="contact" id="contact" value=""/>
                                      </div>
                                  </div>
                              </div>
                              <div class="col-12 col-sm-4 col-md-4 col-lg-4 col-xl-4">
                                  <div class="form-group">
                                      <label for="emergency_contact">Emergency Contact Number</label>
                                      <div class="input-group">
                                          <div class="input-group-prepend">
                                              <span class="input-group-text"><i class="fa fa-clock"></i></span>
                                          </div>
                                          <input type="text" class="form-control numeric" name="emergency_contact" id="emergency_contact" value=""/>
                                      </div>
                                  </div>
                              </div>
                          </div>
                      </div>
                  </div>

                   <div class="card card-info">
                      <div class="card-header">
                          <h6>Upload Images</h6>
                      </div>
                      <div class="card-body">
                          <div class="row">
                              <div class="col-md-12">

                                  <!-- File Attachment Input -->
  <label class="custom-file-boxed" for="customFileInputBoxedEg">
    <span id="customFileBoxedEg">Browse your device and upload photos(770x390)</span>
    <small class="d-block text-muted">Maximum file size 10MB</small>

    <input id="customFileInputBoxedEg" name="images[]" id="images"  type="file" multiple class="js-file-attach custom-file-boxed-input"
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
                  </div>

               </div>
           </div>
            <div class="row justify-content-end">
                <div class="col-md-6 text-right">
                    <div class="form-group">
                        <label for="submit">&nbsp;</label>
                        <button id="submit" type="submit" class="btn btn-success form-control">Create Maintenance Word Order</button>
                    </div>
                </div>
            </div>
           {{Form::close()}}
       </div>
   </div>
                <!-- End Card -->

            </div>
        </div>


    </div>
    <!-- End Content -->
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
          $('.js-select2-custom').each(function () {
          var select2 = $.HSCore.components.HSSelect2.init($(this));
        });

        $('.js-file-attach').each(function () {
          var customFile = new HSFileAttach($(this)).init();
        });

        $('.js-flatpickr').each(function () {
          $.HSCore.components.HSFlatpickr.init($(this));
        });

            
            $('#appointment_time_from').timepicker({format: 'HH.MM'});
            $('#appointment_time_to').timepicker({format: 'HH.MM'});

            $("#add_data_form").on('submit',function(e){
                e.preventDefault();
                let url = "{{route('maintenance.store')}}";
                let params = new FormData(document.getElementById('add_data_form'));
                function fn_success(result)
                {
                   toast('success',result.message,'bottom-right');
                   $("#add_data_form")[0].reset();
                   $("#gallery").empty();
                };
                function fn_error(result)
                {
                    toast('error',result.message,'bottom-right');
                };
                $.fn_ajax_multipart(url,params,fn_success,fn_error);
            });
            $("#property_id").on('change',function(e){
                e.preventDefault();
                $("#property_unit_id").html('');
                let url    = "{{route('get.unit.list')}}";
                let params = {property_id : $("#property_id").val()};
                function fn_success(result)
                {
                   toast('success',result.message,'bottom-right');

                   $.each(result.data,function(index,item){
                         $("#property_unit_id").append(`<option value="${item.id}">${item.unitcode} {${item.flat_number}}</option>`);
                   });
                   
                };
                function fn_error(result)
                {
                    toast('error',result.message,'bottom-right');
                };
                $.fn_ajax(url,params,fn_success,fn_error);
            });
        });
    </script>
    <script>
	$(function() {
		// Multiple images preview in browser
		let imagesPreview = function(input, placeToInsertImagePreview) {

			if (input.files) {
				let filesAmount = input.files.length;

				for (i = 0; i < filesAmount; i++) {
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
@endsection
