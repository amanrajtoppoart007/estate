@extends('admin.layout.base')
@section('content')


<!-- Content -->
    <div class="content container-fluid">
        <span class="float-right">Features</span>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}">Home</a></li>
                <li class="breadcrumb-item active" aria-current="page">Features</li>
            </ol>
        </nav>

        <div class="row gx-2 gx-lg-3 mt-3">
            <div class="col-lg-12 mb-3 mb-lg-0">

                <!-- Card -->
                <div class="card">
                  <div class="card-header">
                   <h6>Add New Feature</h6> 
             </div>
                    
                    <div class="card-body">
                      
    <div class="submit_form color-secondery icon_primary bg-white">
      {{ Form::open(['action' => 'Admin\FeatureController@store','id'=>'addFeatureForm','method'=>'POST','autocomplete'=>'off']) }}
        <div class="description">
          <div class="row">
            <div class="col-lg-4 col-md-6">
              <div class="form-group">
                {{Form::label('title','Title')}}
                                {{ Form::text('title','',['id'=>'title','class'=>'form-control']) }}
                                @error('title')
                                   <div class="alert alert-danger">
                                       {{ $message }}
                                   </div>
                                @enderror
              </div>
            </div>
          </div>
        </div>
        {{ Form::submit('Save Change',['class'=>'btn btn-primary mt-4']) }}
      </form>
    </div>
  </div>
</div>
<div class="card mt-3">
                  <div class="card-header">
                   <h6>Feature Listing</h6> 
             </div>
                    
                    <div class="card-body">
                    <table class="table table-bordered">
                      <thead>
                          <tr>
                              <th>Title</th>
                              <th>Added Date</th>
                              <th>Action</th>
                          </tr>
                      </thead>
                      <tbody id="featureList">
                          @if(count($features)>0)
                              @foreach($features as $feature)
                              <tr id="feature_{{$feature->id}}">
                                  <td>
                                      <div class="property_info d-table">
                                      <h5 id="feature_title_{{$feature->id}}" class="color-primary">{{ $feature->title }}</h5>
                                      </div>
                                  </td>
                                  <td>{{ date('d-m-Y h:i A',strtotime($feature->created_at)) }}</td>
                                  <td>
                                  <a data-id="{{$feature->id}}" href="#" class="btn btn-soft-primary mr-1 openFeatureEditModalBtn">Edit</a>
                                      <a data-id="{{$feature->id}}" href="#" class="btn btn-soft-danger deleteFeatureBtn">Delete</a>
                                  </td>
                              </tr>
                              @endforeach
                          @endif
                      </tbody>
                  </table>
                </div>

                    
                </div>
                <!-- End Card -->

            </div>
        </div>


    </div>
    <!-- End Content -->
{{ Form::open(['action' => 'Admin\FeatureController@update','id'=>'editFeatureForm','method'=>'POST','autocomplete'=>'off']) }}
<div class="modal fade" id="editFeatureModal" tabindex="-1" role="dialog" aria-labelledby="featureModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="featureModalLabel">Edit Feature </h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
            {{ Form::hidden('id','',['id'=>'edit_id','class'=>'form-control','required']) }}
          <div class="row">
            <div class="col-lg-12 col-md-12">
              <div class="form-group">
                {{Form::label('title','Title')}}
                                {{ Form::text('title','',['id'=>'edit_title','class'=>'form-control','required']) }}
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
</form>

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
                url      : "{{route('feature.delete')}}",
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
                      $("#feature_"+id).remove();
                      reloadUrl($("#featureList"));
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
         $('#addFeatureForm').on('submit',function(e){
           e.preventDefault();
           $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': '{{csrf_token()}}'
                }
            })
            $.ajax({
                type     : "POST",
                url      : "{{route('feature.store')}}",
                data     : $("#addFeatureForm").serialize(),
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
                        $("#title").val('');
                        $($.parseHTML(`<tr id="feature_${res.data.id}">
                                        <td>
                                            <div class="property_info d-table">
                                            <h5 id="feature_title_${res.data.id}" class="color-primary">${res.data.title}</h5>
                                            </div>
                                        </td>
                                        <td>${res.data.created_at}</td>
                                        <td>
                                        <a data-id="${res.data.id}" href="#" class="btn btn-soft-primary mr-3 openFeatureEditModalBtn">Edit</a>
                                            <a data-id="${res.data.id}" href="#" class="btn btn-soft-primary deleteFeatureBtn">Delete</a>
                                        </td>
                                    </tr>`)).prependTo($("#featureList"));


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
         $('#editFeatureForm').on('submit',function(e){
           e.preventDefault();
           $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': '{{csrf_token()}}'
                }
            })
            $.ajax({
                type     : "POST",
                url      : "{{route('feature.update')}}",
                data     : $("#editFeatureForm").serialize(),
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
                        $("#editFeatureModal").modal('hide');
                        $("#edit_id").val('');
                        $("#edit_title").val('');
                        $("#feature_title_"+res.data.id).text(res.data.title);

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
         $(document).on('click','.openFeatureEditModalBtn',function(e){
           e.preventDefault();
           $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': '{{csrf_token()}}'
                }
            })
            $.ajax({
                type     : "POST",
                url      : "{{route('feature.show')}}",
                data     : {id : $(this).attr('data-id')},
                dataType : 'json',
                success  : function(res)
				{
                    if(res.response=='success')
					{
						$("#edit_id").val(res.data.id);
                        $("#edit_title").val(res.data.title);
                        $("#editFeatureModal").modal('show');
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
@endsection
