@extends('admin.layout.app')
@section('content')
    <h4 class="color-primary mb-4">Sliders</h4>
		<div class="submit_form color-secondery icon_primary p-5 bg-white">
			{{ Form::open(['action' => 'Admin\SliderController@store','id'=>'addSliderForm','enctype'=>'multipart/form-data','method'=>'POST','autocomplete'=>'off']) }}
				<div class="description">
					<h5 class="color-primary">Add New slider</h5>
					<hr>
					<div class="row">
						<div class="col-lg-12 col-md-12">
                             @php 
                                $pages     = ['guest_home'=>'GUEST HOME PAGE','guest_contact'=>'GUEST CONTACT PAGE','user_home'=>'USER HOME PAGE','admin_home'=>'ADMIN HOME PAGE'];
                                $position  = ['first'=>'FIRST','second'=>'SECOND','third'=>'THIRD','forth'=>'FORTH','fifth'=>'FIFTH'];
                             @endphp
                             <div class="row">
                                 <div class="col-3">
                                   <div class="form-group">
                                        {{Form::label('page','Page')}}
                                        {{ Form::select('page',array_merge([''=>'Select Page'],$pages),old('page'),['id'=>'page','class'=>'form-control']) }}
                                    </div>
                                 </div>
                                 <div class="col-3">
                                     <div class="form-group">
                                        {{Form::label('position','Position')}}
                                        {{ Form::select('position',array_merge([''=>'Select Position'],$position),old('position'),['id'=>'position','class'=>'form-control']) }}
                                     </div>
                                 </div>
                             </div>
                            <div class="table-responsive">
                                <table class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th>Image</th>
                                            <th>Title</th>
                                            <th>Short Description</th>
                                            <th>Long Description</th>
                                            <th><i class="fa fa-2x fa-plus"></i></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>
                                                {{ Form::file('image[]',['class'=>'form-control']) }}
                                            </td>
                                            <td>
                                                  {{ Form::text('title[]','',['class'=>'form-control']) }}
                                            </td>
                                            <td>
                                                {{ Form::text('short_description[]','',['class'=>'form-control']) }}
                                            </td>
                                            <td>
                                                {{ Form::text('description[]','',['class'=>'form-control']) }}
                                            </td>
                                            <td>
                                               <button class="btn btn-primary text-white addSliderImageBtn"><i class="fa fa-2x fa-plus"></i></button> 
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
						</div>
					</div>
				</div>
				{{ Form::submit('Save Change',['class'=>'btn btn-primary mt-4']) }}
			{{ Form::close() }}
		</div>
                    <h4 class="color-primary mb-4">Feature Listing</h4>
                    <div class="items_list bg_transparent color-secondery icon_default">
                        <table class="w-100">
                            <thead>
                                <tr class="bg-white">
                                    <th>Page</th>
                                    <th>Position</th>
                                    <th>Added Date</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody id="sliderList">
                                @if(count($sliders)>0)
                                 @foreach($sliders as $slider)
                                    <tr id="slider_{{$slider->id}}">
                                        <td>
                                            <div class="property_info d-table">
                                            <h5 id="slider_page_{{$slider->id}}" class="color-primary">{{ $slider->page }}</h5>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="property_info d-table">
                                            <h5 id="slider_position_{{$slider->id}}" class="color-primary">{{ $slider->position }}</h5>
                                            </div>
                                        </td>
                                        <td>{{ date('d-m-Y h:i A',strtotime($slider->created_at)) }}</td>
                                        <td>
                                        <a href="#" data-id="{{$slider->id}}" href="#" class="btn btn-primary mr-3 openSliderEditModalBtn">Edit</a>
                                            <a data-id="{{$slider->id}}" href="#" class="btn btn-danger deleteFeatureBtn">Delete</a>
                                        </td>
                                    </tr>
                                 @endforeach
                                @endif
                            </tbody>
                        </table>
                    </div>
{{ Form::open(['action' => 'Admin\SliderController@update','id'=>'editSliderForm','method'=>'POST','enctype'=>'multipart/form-data','autocomplete'=>'off']) }}
<div class="modal fade" id="editSliderModal" tabindex="-1" role="dialog" aria-labelledby="featureModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-xl" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="featureModalLabel">Edit Slider </h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
            {{ Form::hidden('id','',['id'=>'edit_id','class'=>'form-control','required']) }}
				<div class="description">
					<div class="row">
						<div class="col-lg-12 col-md-12">
                             @php 
                                $pages     = ['guest_home'=>'GUEST HOME PAGE','guest_contact'=>'GUEST CONTACT PAGE','user_home'=>'USER HOME PAGE','admin_home'=>'ADMIN HOME PAGE'];
                                $position  = ['first'=>'FIRST','second'=>'SECOND','third'=>'THIRD','forth'=>'FORTH','fifth'=>'FIFTH'];
                             @endphp
                             <div class="row">
                                 <div class="col-6">
                                   <div class="form-group">
                                        {{Form::label('page','Page')}}
                                        {{ Form::select('page',array_merge([''=>'Select Page'],$pages),old('page'),['id'=>'edit_page','class'=>'form-control']) }}
                                    </div>
                                 </div>
                                 <div class="col-6">
                                     <div class="form-group">
                                        {{Form::label('position','Position')}}
                                        {{ Form::select('position',array_merge([''=>'Select Position'],$position),old('position'),['id'=>'edit_position','class'=>'form-control']) }}
                                     </div>
                                 </div>
                             </div>
                            <div class="table-responsive">
                                <table class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th>Image</th>
                                            <th>Title</th>
                                            <th>Short Description</th>
                                            <th>Long Description</th>
                                            <th><i class="fa fa-2x fa-plus"></i></th>
                                        </tr>
                                    </thead>
                                    <tbody id="edit_slider_image_grid">
                                        <tr>
                                            <td>
                                                {{ Form::file('image[]',['class'=>'form-control']) }}
                                            </td>
                                            <td>
                                                  {{ Form::text('title[]','',['class'=>'form-control']) }}
                                            </td>
                                            <td>
                                                {{ Form::text('short_description[]','',['class'=>'form-control']) }}
                                            </td>
                                            <td>
                                                {{ Form::text('description[]','',['class'=>'form-control']) }}
                                            </td>
                                            <td>
                                               <button class="btn btn-primary text-white addSliderImageBtn"><i class="fa fa-2x fa-plus"></i></button> 
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
						</div>
					</div>
				</div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        {{ Form::submit('Save Changes',['class'=>'btn btn-primary']) }}
      </div>
    </div>
  </div>
</div>
{{ Form::close()}}
@endsection
@section('script')
<script>
     $(document).ready(function()
     {
         $(document).on('click','.deleteFeatureBtn',function(e){
           e.preventDefault();
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
                    'X-CSRF-TOKEN': '{{csrf_token()}}'
                }
            })
            $.ajax({
                type     : "POST",
                url      : "{{route('slider.delete')}}",
                data     : {id:id},
                dataType : 'json',
                success  : function(res)
				{
                    if(res.response=='success')
					{
						$.toast({
                        icon     : 'success',
                        heading  : 'Success',
                        loader   : true,
                        loaderBg : '#9EC600',
                        text     : res.message,
                        position : 'bottom-right',
                        stack    : false
                        });
                      $("#slider_"+id).remove();
                      reloadUrl($("#sliderList"));
                    }
					else
					{
                        $.toast({
                        icon     : 'error',
                        heading  : 'Error',
                        loader   : true,
                        loaderBg : '#9EC600',
                        text     : res.message,
                        position : 'bottom-right',
                        stack    : false
                        });
                    }
                },
                error: function(error)
				{
                    console.log(error);
                }
            });
  }
});
         });
     })
</script>
<script>
     $(document).ready(function()
     {
         $('#addSliderForm').on('submit',function(e){
           e.preventDefault();
           var form_data = new FormData(document.getElementById("addSliderForm"));
           $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': '{{csrf_token()}}'
                }
            })
            $.ajax({
                type        : "POST",
                url         : "{{route('slider.store')}}",
                data        : form_data,
                dataType    : 'json',
                contentType : false,
                cache       : false,
                processData : false,
                success  : function(res)
				{
                    if(res.response=='success')
					{
						$.toast({
                        icon     : 'success',
                        heading  : 'Success',
                        loader   : true,
                        loaderBg : '#9EC600',
                        text     : res.message,
                        position : 'bottom-right',
                        stack    : false
                        });
                        $($.parseHTML(`<tr id="slider_${res.data.id}">
                                        <td>
                                            <div class="property_info d-table">
                                            <h5 id="slider_page_${res.data.id}" class="color-primary">${res.data.title}</h5>
                                            </div>
                                        </td>
                                        <td>${res.data.created_at}</td>
                                        <td>
                                        <a data-id="${res.data.id}" href="#" class="btn btn-primary mr-3 openSliderEditModalBtn">Edit</a>
                                            <a data-id="${res.data.id}" href="#" class="btn btn-primary deleteFeatureBtn">Delete</a>
                                        </td>
                                    </tr>`)).prependTo($("#sliderList"));
                                    $("#addSliderForm")[0].reset();


                    }
					else
					{
                        $.toast({
                        icon     : 'error',
                        heading  : 'Error',
                        loader   : true,
                        loaderBg : '#9EC600',
                        text     : res.message,
                        position : 'bottom-right',
                        stack    : false
                        });
                    }
                },
                error: function(error)
				{
                    console.log(error);
                }
            });
         });
     })
</script>
<script>
     $(document).ready(function()
     {
         $('#editSliderForm').on('submit',function(e){
           e.preventDefault();
           var form_data = new FormData(document.getElementById("editSliderForm"));
           $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': '{{csrf_token()}}'
                }
            })
            $.ajax({
                 type       : "POST",
                url         : "{{route('slider.update')}}",
                data        : form_data,
                dataType    : 'json',
                contentType : false,
                cache       : false,
                processData : false,
                success  : function(res)
				{
                    if(res.response=='success')
					{
						$.toast({
                        icon     : 'success',
                        heading  : 'Success',
                        loader   : true,
                        loaderBg : '#9EC600',
                        text     : res.message,
                        position : 'bottom-right',
                        stack    : false
                        });
                        $("#editSliderModal").modal('hide');
                        $("#edit_slider_image_grid").empty();
                        $("editSliderForm")[0].reset();
                        $("#slider_page_"+res.data.id).text(res.data.page);
                        $("#slider_position_"+res.data.id).text(res.data.position);

                    }
					else
					{
                        $.toast({
                        icon     : 'error',
                        heading  : 'Error',
                        loader   : true,
                        loaderBg : '#9EC600',
                        text     : res.message,
                        position : 'bottom-right',
                        stack    : false
                        });
                    }
                },
                error: function(ERROR)
				{
                    console.log('Error:', ERROR);
                }
            });
         });
     })
</script>
<script>
     $(document).ready(function()
     {
         $(document).on('click','.openSliderEditModalBtn',function(e){
           e.preventDefault();
           $("#edit_slider_image_grid").empty();
           $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': '{{csrf_token()}}'
                }
            })
            $.ajax({
                type     : "POST",
                url      : "{{route('slider.show')}}",
                data     : {id : $(this).attr('data-id')},
                dataType : 'json',
                success  : function(res)
				{
                    if(res.response=='success')
					{
						$("#edit_id").val(res.data.id);
                        $("#edit_page").val(res.data.page);
                        $("#edit_position").val(res.data.position);
                        let $html = $($.parseHTML(`<tr>
                                            <td>
                                                <input class="form-control" name="image[]" type="file">
                                            </td>
                                            <td>
                                            <input class="form-control" name="title[]" type="text" value="">
                                            </td>
                                            <td>
                                                <input class="form-control" name="short_description[]" type="text" value="">
                                            </td>
                                            <td>
                                                <input class="form-control" name="description[]" type="text" value="">
                                            </td>
                                            <td>
                                               <button class="btn btn-primary text-white addSliderImageBtn"><i class="fa fa-2x fa-plus"></i></button> 
                                            </td>
                                        </tr>`));
                                        $("#edit_slider_image_grid").append($html);
                        if(res.data.slider_contents.length>0)
                        {
                            res.data.slider_contents.forEach(element => {
                                
                            console.log(element);
                            
                            let $html = $($.parseHTML(`<tr >
                                            <td>
                                                <img src="${res.base_url+element.image}" class="custom-img-thumbnail">
                                            </td>
                                            <td>
                                                  ${element.title}
                                            </td>
                                            <td>
                                            ${element.short_description}
                                            </td>
                                            <td>
                                            ${element.description}
                                            </td>
                                            <td>
                                               <a data-id="${element.id}" class="btn btn-danger text-white removeSliderImageBtn">
                                                <i class="fa fa-2x fa-times"></i>
                                               </a> 
                                            </td>
                                        </tr>`));
                                     $("#edit_slider_image_grid").append($html);
                                        });
                        } 
                        $("#editSliderModal").modal('show');
                    }
					else
					{
                        $("#edit_slider_image_grid").empty();
                        $.toast({
                        icon     : 'error',
                        heading  : 'Error',
                        loader   : true,
                        loaderBg : '#9EC600',
                        text     : res.message,
                        position : 'bottom-right',
                        stack    : false
                        });
                    }
                },
                error: function(ERROR)
				{
                    console.log('Error:', ERROR);
                }
            });
         });
     })
</script>
<script>
    $(document).ready(function(){
       $(document).on('click','.addSliderImageBtn',function(e){
           e.preventDefault();
           let $html = $($.parseHTML(`<tr>
                                            <td>
                                                <input class="form-control" name="image[]" type="file">
                                            </td>
                                            <td>
                                            <input class="form-control" name="title[]" type="text" value="">
                                            </td>
                                            <td>
                                                <input class="form-control" name="short_description[]" type="text" value="">
                                            </td>
                                            <td>
                                                <input class="form-control" name="description[]" type="text" value="">
                                            </td>
                                            <td>
                                               <button class="btn btn-primary text-white addSliderImageBtn"><i class="fa fa-2x fa-plus"></i></button> 
                                            </td>
                                        </tr>`));
            $(this).closest('tr').closest('tbody').append($html);
       });
    });
</script>
@endsection