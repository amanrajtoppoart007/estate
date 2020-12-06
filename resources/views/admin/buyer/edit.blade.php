@extends('admin.layout.base')
@section('content')

<!-- Content -->
    <div class="content container-fluid">
        <span class="float-right">Buyers</span>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}">Home</a></li>
                <li class="breadcrumb-item active" aria-current="page">Edit Buyer</li>
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
            {{Form::open(['id'=>'edit_data_form','url'=>route('buyer.update',$buyer->id),'enctype'=>'multipart/form-data'])}}
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
                            <input type="text" class="form-control" name="name" id="name" value="{{$buyer->name}}">
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
                            <input type="text" class="form-control" name="email" id="email" value="{{$buyer->email}}">
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
                            <input type="text" class="form-control numeric" name="mobile" id="mobile"
                                   value="{{$buyer->mobile}}">
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

                    <div class="form-group">
                                <label class="input-label">Photo</label>

                                <div class="d-flex align-items-center">
                                    <!-- Avatar -->
                                    <label class="avatar avatar-xxl avatar-circle avatar-uploader mr-5" for="buyer_image">
                                        @php
                                            if(!empty($buyer->buyer_image))
                                            {
                                                $img = route('get.doc',base64_encode($buyer->buyer_image));
                                            }
                                            else
                                            {
                                                $img = asset('theme/images/4.png');
                                            }
                                        @endphp
                                        <img id="avatarProjectSettingsImg" class="avatar-img" src="{{$img}}" alt="Image Description">

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
                        <div class="input-group">
                            
                            @php
                                $passport = $visa =  'javascript:void(0)';
                              if(!empty($buyer->passport))
                              {
                                  $passport = route('get.doc',base64_encode($buyer->passport));
                              }
                              if(!empty($buyer->visa))
                              {
                                  $visa = route('get.doc',base64_encode($buyer->visa));
                              }

                            @endphp
                            <div class="custom-file">

                                    <input type="file" name="passport" class="js-file-attach custom-file-input" id="passport"
                                           data-hs-file-attach-options='{
                  "textTarget": "[for=\"passport\"]"
               }'>
                                    <label class="custom-file-label" for="passport">Choose file</label>
                                </div>
                            <div class="input-group-append" data-toggle="tooltip" title="click to view file">
                                <div class="input-group-text">
                                    <a href="{{$passport}}" target="_blank"><i class="fa fa-file"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-2 col-md-2 col-lg-3 col-xl-3">
                    <div class="form-group">
                        <label for="visa">Visa</label>
                        <div class="input-group">
                            <div class="custom-file">

                                    <input type="file" name="visa" class="js-file-attach custom-file-input" id="visa"
                                           data-hs-file-attach-options='{
                  "textTarget": "[for=\"visa\"]"
               }'>
                                    <label class="custom-file-label" for="visa">Choose file</label>
                            </div>
                            
                            <div class="input-group-append" data-toggle="tooltip" title="click to view file">
                                <div class="input-group-text">
                                    <a href="{{$visa}}" target="_blank"><i class="fa fa-file"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-2 col-md-2 col-lg-3 col-xl-3">
                    <div class="form-group">
                        <label for="emirates_id">Emirates Id</label>
                        <input type="text" class="form-control" name="emirates_id" id="emirates_id"
                                   value="{{$buyer->emirates_id}}">
                        
                    </div>
                </div>

            </div>
            <div class="row">
                <div class="col-sm-2 col-md-2 col-lg-3 col-xl-3">
                    <div class="form-group">
                        <label for="country_id">Country</label>
                        
                        <select class="js-select2-custom" name="country_id" id="country_id">
                            <option value="">Select Country</option>
                            @foreach($countries as $country)
                                @php $selected = ($country->id==$buyer->country_id)?"selected":null; @endphp
                                <option value="{{$country->id}}" {{$selected}}>{{$country->name}}</option>
                            @endforeach
                        </select>
                        
                    </div>
                </div>
                <div class="col-sm-2 col-md-2 col-lg-3 col-xl-3">
                    <div class="form-group">
                        <label for="state_id">State</label>
                        <select class="js-select2-custom" name="state_id" id="state_id">
                            @foreach($states as $state)
                                @php $selected = ($state->id==$buyer->state_id)?"selected":null; @endphp
                                <option value="{{$state->id}}" {{$selected}}>{{$state->name}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="col-sm-2 col-md-2 col-lg-3 col-xl-3">
                    <div class="form-group">
                        <label for="city_id">City</label>
                        <select class="js-select2-custom" name="city_id" id="city_id">
                            @foreach($cities as $city)
                                @php $selected = ($city->id==$buyer->city_id)?"selected":null; @endphp
                                <option value="{{$city->id}}" {{$selected}}>{{$city->name}}</option>
                            @endforeach
                        </select>
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
                            <input type="text" class="form-control" name="address" id="address"
                                   value="{{$buyer->address}}">
                        </div>
                    </div>
                </div>
            </div>
            <div class="row justify-content-end">
                <div class="col-md-2">
                    <div class="form-group float-right">
                        <label for="password">&nbsp;</label>
                        <div class="input-group">
                            <button class="btn btn-success" type="submit">Save Detail</button>
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
        $(document).ready(function () {
            $('[data-toggle="tooltip"]').tooltip();
            $('.js-select2-custom').each(function () {
                var select2 = $.HSCore.components.HSSelect2.init($(this));
            });

            $('.js-file-attach').each(function () {
                let customFile = new HSFileAttach($(this)).init();
            });

            
            $("#edit_data_form").on('submit', function (e) {
                e.preventDefault();
                var url = "{{route('buyer.update',$buyer->id)}}";
                var params = new FormData(document.getElementById('edit_data_form'));

                function fn_success(result) {
                    toast('success', result.message, 'bottom-right');
                };

                function fn_error(result) {
                    toast('error', result.message, 'bottom-right');
                };
                $.fn_ajax_multipart(url, params, fn_success, fn_error);
            })
        });
    </script>
@endsection
