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
   {{Form::open(['route'=>'maintenance.update','id'=>'edit_data_form','method'=>'post','autocomplete'=>'off'])}}
   <input type="hidden" name="maintenance_work_order_id" value="{{$maintenance->id}}">
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
                                    @foreach($employees as $employee)
                                        @php $selected = ($maintenance->assignee_id==$employee->id)?'selected':''; @endphp
                                        <option value="{{$employee->id}}" {{$selected}}>{{$employee->name}}</option>
                                    @endforeach
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <th>Assistant Assignee</th>
                            <td>
                                <select name="asst_assignee_id" id="asst_assignee_id" class="form-control">
                                    <option value="">Select Assistant</option>
                                    @foreach($employees as $employee)
                                        @php $selected = ($maintenance->asst_assignee_id==$employee->id)?'selected':''; @endphp
                                        <option value="{{$employee->id}}" {{$selected}}>{{$employee->name}}</option>
                                    @endforeach
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
                                <a href="{{route('maintenance.quotation.create')}}" class="btn btn-primary">Create Quotation</a>
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
                          <th>#</th>
                          <th>Status</th>
                          <th>Date</th>
                          <th>Remark</th>
                      </tr>
                    </thead>
                    <tbody>
                    @if(!$maintenance->maintenance_work_progress->isEmpty())
                        @foreach($maintenance->maintenance_work_progress as $progress)
                        <tr>
                          <td>
                              {{ucwords(str_replace("_"," ",$progress->status_type))}}
                              <input type="hidden" name="status[status_type][]" value="{{$progress->status_type}}">
                          </td>
                          <td>
                              <select class="form-control" name="status[work_status][]">
                                  <option value="">Select Status</option>
                                  @foreach($status_list as $stat_key=>$stat_val)
                                      @php $selected = ($stat_key==$progress->work_status)?'selected':'';  @endphp
                                      <option value="{{$stat_key}}" {{$selected}}>{{$stat_val}}</option>
                                  @endforeach
                              </select>
                          </td>
                          <td>
                              <input class="form-control select_date" type="text" name="status[completed_at][]" value="{{$progress->completed_at ? date('d-m-Y',strtotime($progress->completed_at)):null}}">
                          </td>
                          <td>
                              <input class="form-control" name="status[remark][]" value="{{$progress->remark}}">
                          </td>
                      </tr>
                        @endforeach
                        @else
                      <tr>
                          <td>
                              Information Received
                              <input type="hidden" name="status[status_type][]" value="information_received">
                          </td>
                          <td>
                              <select class="form-control" name="status[work_status][]">
                                  <option value="">Select Status</option>
                                  @foreach($status_list as $stat_key=>$stat_val)
                                      <option value="{{$stat_key}}">{{$stat_val}}</option>
                                  @endforeach
                              </select>
                          </td>
                          <td>
                              <input class="form-control select_date" type="text" name="status[completed_at][]">
                          </td>
                          <td>
                              <input class="form-control" name="status[remark][]">
                          </td>
                      </tr>
                     <tr>
                          <td>
                              Appointment
                              <input type="hidden" name="status[status_type][]" value="appointment">
                          </td>
                          <td>
                              <select class="form-control" name="status[work_status][]">
                                  <option value="">Select Status</option>
                                  @foreach($status_list as $stat_key=>$stat_val)
                                      <option value="{{$stat_key}}">{{$stat_val}}</option>
                                  @endforeach
                              </select>
                          </td>
                          <td>
                              <input class="form-control select_date" type="text" name="status[completed_at][]">
                          </td>
                          <td>
                              <input class="form-control"  name="status[remark][]">
                          </td>
                      </tr>
                    <tr>
                          <td>
                              Material Request (If Any)
                              <input type="hidden" name="status[status_type][]" value="material_requested">
                          </td>
                          <td>
                              <select class="form-control" name="status[work_status][]">
                                  <option value="">Select Status</option>
                                  @foreach($status_list as $stat_key=>$stat_val)
                                      <option value="{{$stat_key}}">{{$stat_val}}</option>
                                  @endforeach
                              </select>
                          </td>
                          <td>
                              <input class="form-control select_date" type="text" name="status[completed_at][]">
                          </td>
                          <td>
                              <input class="form-control" name="status[remark][]">
                          </td>
                      </tr>
                    <tr>
                          <td>Quotation  Approval (If Owner/Admin)
                              <input type="hidden" name="status[status_type][]" value="quotation_approval">
                          </td>
                          <td>
                              <select class="form-control" name="status[work_status][]">
                                  <option value="">Select Status</option>
                                  @foreach($status_list as $stat_key=>$stat_val)
                                      <option value="{{$stat_key}}">{{$stat_val}}</option>
                                  @endforeach
                              </select>
                          </td>
                          <td>
                              <input class="form-control select_date" type="text" name="status[completed_at][]">
                          </td>
                          <td>
                              <input class="form-control" name="status[remark][]">
                          </td>
                      </tr>

                    <tr>
                          <td>
                              Completion Of Work
                              <input type="hidden" name="status[status_type][]" value="work_completion">
                          </td>
                          <td>
                              <select class="form-control" name="status[work_status][]">
                                  <option value="">Select Status</option>
                                  @foreach($status_list as $stat_key=>$stat_val)
                                      <option value="{{$stat_key}}">{{$stat_val}}</option>
                                  @endforeach
                              </select>
                          </td>
                          <td>
                              <input class="form-control select_date" type="text" name="status[completed_at][]" value="">
                          </td>
                          <td>
                              <input class="form-control" name="status[remark][]" value="">
                          </td>
                      </tr>
                     <tr>
                          <td>
                              Closing
                              <input type="hidden" name="status[status_type][]" value="work_closing">
                          </td>
                          <td>
                              <select class="form-control" name="status[work_status][]">
                                  <option value="">Select Status</option>
                                  @foreach($status_list as $stat_key=>$stat_val)
                                      <option value="{{$stat_key}}">{{$stat_val}}</option>
                                  @endforeach
                              </select>
                          </td>
                          <td>
                              <input class="form-control select_date" type="text" name="status[completed_at][]" value="">
                          </td>
                          <td>
                              <input class="form-control" name="status[remark][]" value="">
                          </td>
                      </tr>
                        @endif
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
   <div class="card card-body">
       <div class="form-group text-right">
           <button class="btn btn-primary" type="submit">Update</button>
       </div>
   </div>
    {{Form::close()}}
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

		$("#edit_data_form").on("submit",function(e){
		    e.preventDefault();
		    let url = "{{route('maintenance.update')}}";
		    let params = new FormData(document.getElementById('edit_data_form'));
		    function success(result)
            {
                toast('success',result.message,'top-right');
                window.location.href=window.location.href;
            }
            function error(result)
            {
                toast('error',result.message,'top-right');
            }
            $.fn_ajax_multipart(url,params,success,error);
        })
	});
    </script>
@endsection

