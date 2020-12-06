@extends('admin.layout.base')
@section('content')


<!-- Content -->
    <div class="content container-fluid">
        <span class="float-right">Add Buyer</span>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}">Home</a></li>
                <li class="breadcrumb-item active" aria-current="page">Add Buyer</li>
            </ol>

        </nav>

        <div class="row gx-2 gx-lg-3 mt-3">
            <div class="col-lg-12 mb-3 mb-lg-0">

                <!-- Card -->
                <div class="card">
                    <!-- Header -->
                    <div class="card-header">
                        <div class="row justify-content-between align-items-center flex-grow-1">
                            <div class="col-sm-6 col-md-4 mb-3 mb-sm-0">
                                Buyer Detail
                            </div>
                        </div>
                        <!-- End Row -->
                    </div>
                    <!-- End Header -->

                    <div class="card-body">
                   {{Form::open(['id'=>'add_data_form','url'=>route('buyer.store'),'enctype'=>'multipart/form-data','autocomplete'=>'off'])}}
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
                               <input type="text" class="form-control" name="name" id="name" value="{{$user?$user->name:null}}">
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
                               <input type="text" class="form-control" name="email" id="email" value="{{$user ? $user->email : null }}">
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
                               <input type="text" class="form-control numeric" name="mobile" id="mobile" value="{{$user ? $user->mobile : null}}">
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
                       

                       <div class="col-6">
                            <div class="form-group">
                                <label class="input-label">Photo</label>

                                <div class="d-flex align-items-center">
                                    <!-- Avatar -->
                                    <label class="avatar avatar-xxl avatar-circle avatar-uploader mr-5" for="buyer_image">
                                        <img id="avatarProjectSettingsImg" class="avatar-img" src="{{asset('theme/images/4.png')}}" alt="Image Description">

                                        <input type="file" class="js-file-attach avatar-uploader-input" name="buyer_image" id="buyer_image"
                                               data-hs-file-attach-options='{
                                "textTarget": "#avatarProjectSettingsImg",
                                "mode": "image",
                                "targetAttr": "src",
                                "resetTarget": ".js-file-attach-reset-img",
                                "resetImg": "{{asset('theme/images/4.png')}}"
                             }'>

                                        <span class="avatar-uploader-trigger">
                        <i class="tio-edit avatar-uploader-icon shadow-soft"></i>
                      </span>
                                    </label>
                                    <!-- End Avatar -->

                                    <button type="button" class="js-file-attach-reset-img btn btn-white">Delete</button>
                                </div>
                            </div>


                        </div>
                   </div>
                   <div class="row">
                       <div class="col-sm-2 col-md-2 col-lg-3 col-xl-3">
                           <div class="form-group">
                               <label for="passport">PassPort</label>
                               
                               <div class="custom-file">

                                <input type="file" name="passport" class="js-file-attach custom-file-input" id="passport"
                                       data-hs-file-attach-options='{
              "textTarget": "[for=\"passport\"]"
           }'>
                                <label class="custom-file-label" for="passport">Choose file</label>
                            </div>
                           </div>
                       </div>
                       <div class="col-sm-2 col-md-2 col-lg-3 col-xl-3">
                           <div class="form-group">
                               <label for="visa">Visa</label>
                                  
                               <div class="custom-file">

                                <input type="file" name="visa" class="js-file-attach custom-file-input" id="visa"
                                       data-hs-file-attach-options='{
              "textTarget": "[for=\"visa\"]"
           }'>
                                <label class="custom-file-label" for="visa">Choose file</label>
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
                        <label for="country_id">Country</label>
                          <div class="form-group">
                             <select type="text" class="js-select2-custom" name="country_id" id="country_id">
                                 <option value="">Select Country</option>
                                 @foreach($countries as $country)
                                     <option value="{{$country->id}}">{{$country->name}}</option>
                                 @endforeach
                             </select>
                           </div>
                       </div>
                       <div class="col-sm-2 col-md-2 col-lg-3 col-xl-3">
                           <div class="form-group">
                               <label for="state_id">State</label>
                               <select  class="js-select2-custom" name="state_id" id="state_id"></select>
                           </div>
                       </div>
                       <div class="col-sm-2 col-md-2 col-lg-3 col-xl-3">
                           <div class="form-group">
                               <label for="city_id">City</label>
                               <select class="js-select2-custom" name="city_id" id="city_id"></select>
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
                               <input type="text" class="form-control" name="address" id="address" value="{{$user ? $user->address : null }}">
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
                <!-- End Card -->

            </div>
        </div>


    </div>
    <!-- End Content -->
@endsection
@section('script')
  <script>
       $(document).ready(function(){

        $('.js-select2-custom').each(function () {
          var select2 = $.HSCore.components.HSSelect2.init($(this));
        });

        $('.js-file-attach').each(function () {
            let customFile = new HSFileAttach($(this)).init();
        });

       $("#country_id").on("change",function(){
           $.get_state_list($("#country_id"),$("#state_id"));
       });
       $("#state_id").on("change",function(){
           $.get_city_list($("#state_id"),$("#city_id"));
       });

           
            
        $("#add_data_form").on('submit',function(e){
            e.preventDefault();
            let url = "{{route('buyer.store')}}";
            let params = new FormData(document.getElementById('add_data_form'));
            function fn_success(result)
            {
               toast('success',result.message,'bottom-right');
               $("#add_data_form")[0].reset();
            }
            function fn_error(result)
            {
                toast('error',result.message,'bottom-right');
            }
            $.fn_ajax_multipart(url,params,fn_success,fn_error);
        })
       });
  </script>
@endsection
