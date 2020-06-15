@extends('admin.layout.app')
@section('breadcrumb')
<div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Maintenance Work Detail</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}">Home</a></li>
              <li class="breadcrumb-item active">Maintenance Work Detail</li>
            </ol>
          </div>
        </div>
      </div>
    </div>
@endsection
@section('content')
    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-12 col-sm-12 col-md-6 col-lg-6 col-xl-6">
                    <table class="table">
                        <tbody>
                        <tr>
                            <th>Building Name</th>
                            <td>{{$maintenance->property->title}}</td>
                        </tr>
                        <tr>
                            <th>Flat Number</th>
                            <td>{{$maintenance->property_unit->unitcode}}</td>
                        </tr>
                        <tr>
                            <th>Category</th>
                            <td>{{$maintenance->category}}</td>
                        </tr>
                        <tr>
                            <th>Description</th>
                            <td>{{$maintenance->description}}</td>
                        </tr>
                        <tr>
                            <th>Appointment</th>
                            <td>
                                {{$maintenance->appointment_date}}
                                From <span class="font-weight-bold">{{$maintenance->appointment_time_from}}</span>
                                To <span class="font-weight-bold">{{$maintenance->appointment_time_to}}</span>
                            </td>
                        </tr>
                        </tbody>
                    </table>
                </div>
                <div class="col">
                    <div class="row">
                        @foreach($maintenance->images as $image)
                            <div class="col-6 col-sm-6 col-md-4 col-lg-4 col-xl-4">
                                @php   $url = ($image->file_url)?route('get.doc',base64_encode($image->file_url)):asset('theme/default/images/dashboard/4.png'); @endphp
                                <img src="{{$url}}" alt="" class="img250x150 m-1">
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="card">
        <div class="card-header">
            <h6 class="card-title">Work Order Detail</h6>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-12 col-sm-12 col-md-8 col-lg-8 col-xl-8">
                    <table class="table">
                        <tbody>
                        <tr>
                            <th>Assignee Name</th>
                            <td>
                                <select name="assignee_id" id="assignee_id" class="form-control">
                                    <option value="">Select Assignee</option>
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <th>Assistant Assignee</th>
                            <td>
                                <select name="assistant" id="assistant" class="form-control">
                                    <option value="">Select Assistant</option>
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <th>Due Date</th>
                            <td></td>
                        </tr>
                        <tr>
                            <th>Required Material</th>
                            <td>
                                <textarea name="required_material" id="required_material" cols="30" rows="10"></textarea>
                            </td>
                        </tr>
                        <tr>
                            <th>OwnerShip</th>
                            <td>
                                <select name="ownership" id="ownership" class="form-control">
                                    <option value=""></option>
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <button class="btn btn-primary">Create Quotation</button>
                            </td>
                            <td>
                                <button class="btn btn-primary">View Quotation</button>
                            </td>
                        </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <div class="card">
        <div class="card-header">
            <h6 class="card-title">Status Update</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table">
                    <thead>
                      <tr>
                          <th></th>
                          <th>Status</th>
                          <th>Date</th>
                          <th>Remark</th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr>
                          <td>Information Recieved</td>
                          <td>
                              <select class="form-control" name="" id="">
                                  <option value="">Select Status</option>
                                  <option value="1">Completed</option>
                              </select>
                          </td>
                          <td>
                              <input class="form-control select_date" type="text">
                          </td>
                          <td>
                              <input class="form-control" name="" id="">
                          </td>
                      </tr>
                     <tr>
                          <td>Appointment</td>
                          <td>
                              <select class="form-control" name="" id="">
                                  <option value="">Select Status</option>
                                  <option value="1">Completed</option>
                              </select>
                          </td>
                          <td>
                              <input class="form-control select_date" type="text">
                          </td>
                          <td>
                              <input class="form-control" name="" id="">
                          </td>
                      </tr>
                    <tr>
                          <td>Material Request (If Any)</td>
                          <td>
                              <select class="form-control" name="" id="">
                                  <option value="">Select Status</option>
                                  <option value="1">Completed</option>
                              </select>
                          </td>
                          <td>
                              <input class="form-control select_date" type="text">
                          </td>
                          <td>
                              <input class="form-control" name="" id="">
                          </td>
                      </tr>
                    <tr>
                          <td>Quotation  Approval (If Owner/Admin)</td>
                          <td>
                              <select class="form-control" name="" id="">
                                  <option value="">Select Status</option>
                                  <option value="1">Completed</option>
                              </select>
                          </td>
                          <td>
                              <input class="form-control select_date" type="text">
                          </td>
                          <td>
                              <input class="form-control" name="" id="">
                          </td>
                      </tr>
                     <tr>
                          <td>Quotation  Approval (If Owner/Admin)</td>
                          <td>
                              <select class="form-control" name="" id="">
                                  <option value="">Select Status</option>
                                  <option value="1">Completed</option>
                              </select>
                          </td>
                          <td>
                              <input class="form-control select_date" type="text">
                          </td>
                          <td>
                              <input class="form-control" name="" id="">
                          </td>
                      </tr>
                    <tr>
                          <td>Completion Of Work </td>
                          <td>
                              <select class="form-control" name="" id="">
                                  <option value="">Select Status</option>
                                  <option value="1">Completed</option>
                              </select>
                          </td>
                          <td>
                              <input class="form-control select_date" type="text">
                          </td>
                          <td>
                              <input class="form-control" name="" id="">
                          </td>
                      </tr>
                     <tr>
                          <td>Closing </td>
                          <td>
                              <select class="form-control" name="" id="">
                                  <option value="">Select Status</option>
                                  <option value="1">Completed</option>
                              </select>
                          </td>
                          <td>
                              <input class="form-control select_date" type="text">
                          </td>
                          <td>
                              <input class="form-control" name="" id="">
                          </td>
                      </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <div class="card">
        <div class="card-header">
            <h6>Work Completion Images</h6>
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
       $(".select_date").each(function(){
           $(this).datepicker({ footer: true, modal: true,format: 'dd-mm-yyyy', minDate : '{{now()->format('d-m-Y')}}'});
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

