@extends('tenant.layout.app')
@section('breadcrumb')
<div class="content-header">
    <div class="container-fluid">
    <div class="row mb-2">
        <div class="col-sm-6">
        <h1 class="m-0 text-dark">Maintenance Request</h1>
        </div>
        <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
        <li class="breadcrumb-item"><a href="{{route('tenant.dashboard')}}">Home</a></li>
            <li class="breadcrumb-item active">Maintenance Request</li>
        </ol>
        </div>
    </div>
    </div>
</div>
@endsection
@section('content')
   <div class="card">
       <div class="card-body">
           {{Form::open(['route'=>'tenant.maintenance.store','id'=>'add_data_form'])}}
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
                              <div class="input-group">
                                  <div class="input-group-prepend">
                                      <span class="input-group-text"><i class="fas fa-user"></i></span>
                                  </div>
                                  <select class="form-control select2" name="property_id" id="property_id">
                                      <option value="">Select Property</option>
                                      @foreach($buildings as $building)
                                          <option value="{{$building->id}}">{{$building->title}} ({{$building->city->name}})</option>
                                      @endforeach
                                  </select>
                              </div>
                          </div>
                      </div>
                      <div class="col-md-6">
                          <div class="form-group">
                              <label for="email">Unit/Flat No</label>
                              <div class="input-group">
                                  <div class="input-group-prepend">
                                      <span class="input-group-text"><i class="fas fa-envelope"></i></span>
                                  </div>
                                  <select class="form-control" name="property_unit_id" id="property_unit_id">
                                      <option value="">Select Unit</option>
                                  </select>
                              </div>
                          </div>
                      </div>
                  </div>
                  <div class="row">
                      <div class="col-md-6">
                          <div class="form-group">
                              <label for="category">Category</label>
                              <div class="input-group">
                                  <div class="input-group-prepend">
                                      <span class="input-group-text"><i class="fas fa-phone"></i></span>
                                  </div>
                                  <select  class="form-control select2" name="category" id="category">
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
                                      <div class="input-group">
                                          <div class="input-group-prepend">
                                              <span class="input-group-text"><i class="fa fa-calendar-day"></i></span>
                                          </div>
                                          <input type="text" class="form-control" name="appointment_date" id="appointment_date" value="{{now()->format('d-m-Y')}}"/>

                                      </div>
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
                                          <input type="text" class="form-control" name="name" id="name" value="{{auth('tenant')->user()->name}}"/>

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
                                          <input type="text" class="form-control numeric" name="contact" id="contact" value="{{auth('tenant')->user()->mobile}}"/>
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
                                  <div class="browse_submit">
                                      <input type="file" name="images[]" id="images" class="hide" value="" multiple>
                                      <label class="fileupload_label text-center w-100" for="images">Drag and Drop to
                                          Add Photo (770x390)</label>
                                  </div>
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
 @endsection
@section('head')
    <link rel="stylesheet" href="{{asset('plugin/datetimepicker/css/gijgo.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/plugins/select2/css/select2.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css')}}">
@endsection
@section('js')
    <script src="{{asset('plugin/datetimepicker/js/gijgo.min.js')}}"></script>
@endsection
@section('script')
    <script>
        $(document).ready(function(){
            $('.select2').select2({theme: 'bootstrap4'});
            $('#appointment_date').datepicker({ footer: true, modal: true,format: 'dd-mm-yyyy', minDate : '{{now()->format('d-m-Y')}}'});
            $('#appointment_time_from').timepicker({format: 'HH.MM'});
            $('#appointment_time_to').timepicker({format: 'HH.MM'});

            $("#add_data_form").on('submit',function(e){
                e.preventDefault();
                let url = "{{route('tenant.maintenance.store')}}";
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
                let url    = "{{route('tenant.get.unit.list')}}";
                let params = {property_id : $("#property_id").val()};
                function fn_success(result)
                {
                   toast('success',result.message,'bottom-right');

                   $.each(result.data,function(index,item){
                         $("#property_unit_id").append(`<option value="${item.id}">${item.unitcode} {${item.flat_house_no}}</option>`);
                   });
                   $("#property_unit_id").select2({
                       theme: 'bootstrap4'
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
