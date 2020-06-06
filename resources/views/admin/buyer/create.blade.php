@extends('admin.layout.app')
@section('breadcrumb')
<div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Add Buyer</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}">Home</a></li>
              <li class="breadcrumb-item active">Add Buyer</li>
            </ol>
          </div>
        </div>
      </div>
    </div>
@endsection
@section('content')
    <div class="card card-primary">
        <div class="card-header">Buyer Detail</div>
                <div class="card-body">
                   {{Form::open(['id'=>'add_data_form','url'=>route('buyer.store'),'enctype'=>'multipart/form-data'])}}
                   <div class="row">
                       <div class="col-md-6">
                           <div class="form-group">
                               <label for="name">Name</label>
                               <div class="input-group">
                                  <div class="input-group-prepend">
                                      <span class="input-group-text">
                                          <i class="fa fa-user"></i>
                                      </span>
                                  </div>
                               <input type="text" class="form-control" name="name" id="name" value="">
                               </div>
                           </div>
                           <div class="form-group">
                               <label for="email">Email</label>
                               <div class="input-group">
                                  <div class="input-group-prepend">
                                      <span class="input-group-text">
                                          <i class="fa fa-envelope"></i>
                                      </span>
                                  </div>
                               <input type="text" class="form-control" name="email" id="email" value="">
                               </div>
                           </div>
                           <div class="form-group">
                               <label for="mobile">Mobile</label>
                               <div class="input-group">
                                  <div class="input-group-prepend">
                                      <span class="input-group-text">
                                          <i class="fa fa-phone"></i>
                                      </span>
                                  </div>
                               <input type="text" class="form-control numeric" name="mobile" id="mobile" value="">
                               </div>
                           </div>
                           <div class="form-group">
                               <label for="password">Password</label>
                               <div class="input-group">
                                  <div class="input-group-prepend">
                                      <span class="input-group-text">
                                          <i class="fa fa-lock"></i>
                                      </span>
                                  </div>
                               <input type="text" class="form-control" name="password" id="password" value="">
                               </div>
                           </div>
                           
                       </div>
                       <div class="col-md-6">
                           <div class="card" style="width: 18rem;">
                                  <img id="image_grid" class="card-img-top" src="{{asset('theme/default/images/dashboard/4.png')}}" alt="Card image cap">
                                  <div class="card-footer">
                                    <div class="d-inline">
                                        <label for="image" class="btn btn-success">Upload</label>
                                        <label class="btn btn-danger" id="remove_image">Remove</label>
                                    </div>
                                    <input type="file" class="d-none" name="buyer_image" id="image">
                                  </div>
                            </div>
                       </div>
                   </div>
                   <div class="row">
                       <div class="col-sm-2 col-md-2 col-lg-3 col-xl-3">
                           <div class="form-group">
                               <label for="passport">PassPort</label>
                               <div class="input-group">
                                  <div class="input-group-prepend">
                                      <span class="input-group-text">
                                          <i class="fa fa-passport"></i>
                                      </span>
                                  </div>
                               <input type="file" class="form-control" name="passport" id="passport" value="">
                               </div>
                           </div>
                       </div>
                       <div class="col-sm-2 col-md-2 col-lg-3 col-xl-3">
                           <div class="form-group">
                               <label for="visa">Visa</label>
                               <div class="input-group">
                                  <div class="input-group-prepend">
                                      <span class="input-group-text">
                                          <i class="fab fa-cc-visa"></i>
                                      </span>
                                  </div>
                               <input type="file" class="form-control" name="visa" id="visa" value="">
                               </div>
                           </div>
                       </div>
                       <div class="col-sm-2 col-md-2 col-lg-3 col-xl-3">
                           <div class="form-group">
                               <label for="emirates_id">Emirates Id</label>
                               <div class="input-group">
                                  <div class="input-group-prepend">
                                      <span class="input-group-text">
                                          <i class="fa fa-sort-numeric-up-alt"></i>
                                      </span>
                                  </div>
                               <input type="text" class="form-control" name="emirates_id" id="emirates_id" value="">
                               </div>
                           </div>
                       </div>
                       
                   </div>
                   <div class="row">
                       <div class="col-sm-2 col-md-2 col-lg-3 col-xl-3">
                          <div class="form-group">
                               <label for="country">Country</label>
                               <div class="input-group">
                                  <div class="input-group-prepend">
                                      <span class="input-group-text">
                                          <i class="fa fa-flag"></i>
                                      </span>
                                  </div>
                               <input type="text" class="form-control" name="country" id="country" value="">
                               </div>
                           </div> 
                       </div>
                       <div class="col-sm-2 col-md-2 col-lg-3 col-xl-3">
                           <div class="form-group">
                               <label for="state">State</label>
                               <div class="input-group">
                                  <div class="input-group-prepend">
                                      <span class="input-group-text">
                                          <i class="fa fa-signal"></i>
                                      </span>
                                  </div>
                               <input type="text" class="form-control" name="state" id="state" value="">
                               </div>
                           </div>
                       </div>
                       <div class="col-sm-2 col-md-2 col-lg-3 col-xl-3">
                           <div class="form-group">
                               <label for="city">City</label>
                               <div class="input-group">
                                  <div class="input-group-prepend">
                                      <span class="input-group-text">
                                          <i class="fa fa-city"></i>
                                      </span>
                                  </div>
                               <input type="text" class="form-control" name="city" id="city" value="">
                               </div>
                           </div>
                       </div>
                       <div class="col-sm-2 col-md-2 col-lg-3 col-xl-3">
                           <div class="form-group">
                               <label for="address">Address</label>
                               <div class="input-group">
                                  <div class="input-group-prepend">
                                      <span class="input-group-text">
                                          <i class="fa fa-location-arrow"></i>
                                      </span>
                                  </div>
                               <input type="text" class="form-control" name="address" id="address" value="">
                               </div>
                           </div>
                       </div>
                   </div>
                   <div class="row justify-content-end">
                       <div class="col-md-2">
                           <div class="form-group float-right">
                               <label for="password">&nbsp;</label>
                               <div class="input-group">
                                   <button class="btn btn-success" type="submit" >Save Detail</button>
                               </div>
                           </div>
                       </div>
                   </div>
                   {{Form::close()}}
                </div>
            </div>
@endsection
@section('script')
  <script>
       $(document).ready(function(){
           function render_image(input)
            {
                if(input.files && input.files[0])
                {
                var reader = new FileReader();
                reader.onload = function (e) {
                    $('#image_grid').attr('src', e.target.result);
                }
                reader.readAsDataURL(input.files[0]);
                }
            }
            $("#image").change(function(){
                render_image(this);
            });
            $("#remove_image").click(function(){
                $('#image_grid').attr("src", "{{asset('theme/default/images/dashboard/4.png')}}");
                var file = document.getElementById("image");
                file.value = file.defaultValue;
            });
            $("#add_data_form").on('submit',function(e){
                e.preventDefault();
                var url = "{{route('buyer.store')}}";
                var params = new FormData(document.getElementById('add_data_form'));
                function fn_success(result)
                {
                   toast('success',result.message,'bottom-right');
                   $("#add_data_form")[0].reset();
                   $('#image_grid').attr("src", "{{asset('theme/default/images/dashboard/4.png')}}");
                };
                function fn_error(result)
                {
                    toast('error',result.message,'bottom-right');
                };
                $.fn_ajax_multipart(url,params,fn_success,fn_error);
            })
       });
  </script>
@endsection