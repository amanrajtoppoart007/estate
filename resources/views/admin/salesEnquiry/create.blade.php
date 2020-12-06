@extends('admin.layout.base')
@include("admin.include.breadcrumb",["page_title"=>"Create Sales Enquiry"])
@section('content')
   
<!-- Content -->
    <div class="content container-fluid">
        <span class="float-right">Create Sales Enquiry</span>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}">Home</a></li>
                <li class="breadcrumb-item active" aria-current="page">Create Sales Enquiry</li>
            </ol>

        </nav>

        <div class="row gx-2 gx-lg-3 mt-3">
          {{Form::open(['route'=>'rentEnquiry.store','id'=>'add_data_form','autocomplete'=>'off'])}}
          <div class="col-lg-12 mb-3 mb-lg-0">
            <div class="card card-info">
                <div class="card-header">
                    <h6>Client Detail</h6>
                </div>
                <div class="card-body">
                   <div class="row">
            <div class="col-sm-6 col-md-8 row">
                <div class="col-sm-12 col-md-4 col-lg-4 col-xl-4">
                     <div class="form-group">
                        <label for="name">Name</label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-user"></i></span>
                            </div>
                            <input type="text" class="form-control" name="name" id="name" value="">
                        </div>
                    </div>
                </div>
                <div class="col-sm-12 col-md-4 col-lg-4 col-xl-4">
                    <div class="form-group">
                        <label for="email">Email</label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-envelope-square"></i></span>
                            </div>
                            <input type="text" class="form-control" name="email" id="email" value="" data-inputmask="'alias': 'email'" inputmode="email" data-mask="">
                        </div>
                    </div>
                </div>
                <div class="col-sm-12 col-md-4 col-lg-4 col-xl-4">
                    <div class="form-group">
                        <label for="mobile">Mobile</label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-phone"></i></span>
                            </div>
                            <input type="text" class="form-control numeric" name="mobile" id="mobile" value="">
                        </div>
                    </div>
                </div>
                <div class="col-sm-12 col-md-4 col-lg-4 col-xl-4">
                            <div class="form-group">
                                <label for="country_code">Nationality</label>
                                
                                    
                                <select  class="js-select2-custom" name="country_code" id="country_code">
                                    <option value="">Select Country</option>
                                    @foreach($countries as $country)
                                        <option value="{{$country->code}}">{{$country->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>


                <div class="col-sm-12 col-md-4 col-lg-4 col-xl-4">
                    <div class="form-group">
                    <label for="address">Address</label>
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fa fa-map-marker"></i></span>
                        </div>
                        <input type="text" class="form-control" name="address" id="address" value="">
                    </div>
                </div>
                </div>
            </div>
            <div class="col-sm-6 col-md-4">
                

                <div class="form-group">
                                <label class="input-label">Photo</label>

                                <div class="d-flex align-items-center">
                                    <!-- Avatar -->
                                    <label class="avatar avatar-xxl avatar-circle avatar-uploader mr-5" for="photo">
                                        <img id="avatarProjectSettingsImg" class="avatar-img" src="{{asset('theme/images/4.png')}}" alt="Image Description">

                                        <input type="file" class="js-file-attach avatar-uploader-input" name="photo" id="photo"
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
                </div>
            </div>
          </div>
          <div class="col-lg-12 mb-3 mb-lg-0">
             <div class="card card-info">
                <div class="card-header">
                    <h6>Inquiry Detail</h6>
                </div>
                <div class="card-body">
                    <table class="table">
                        <tbody>
                        <tr>
                            <th>Category</th>
                            <td>
                                <select name="category" id="category" class="js-select2-custom">
                                    <option value="">Select Category</option>
                                    <option value="residential">Residential</option>
                                    <option value="commercial">Commercial</option>
                                    <option value="land">Land</option>
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <th>Property Type</th>
                            <td>
                                <select name="property_type" id="property_type" class="js-select2-custom">
                                    <option value="">Select Category</option>
                                    <option value="apartment">Apartment</option>
                                    <option value="villa">Villa</option>
                                    <option value="townhouse">TownHouse</option>
                                    <option value="office">Office</option>
                                    <option value="retail">Retail</option>
                                    <option value="shop">Shop</option>
                                    <option value="warehouse">WareHouse</option>
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <th>Preferred City</th>
                            <td>
                                <select name="preferred_city" id="preferred_city" style="width: 100%"  class="js-select2-custom">
                                    <option value="">Select City</option>
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <th>Preferred Location</th>
                            <td>
                                <input type="text" class="form-control" name="preferred_location" id="preferred_location" value="">
                            </td>
                        </tr>
                        <tr>
                            <th>No. Of Bedrooms</th>
                            <td>
                                <select class="js-select2-custom" name="bedroom" id="bedroom">
                                    <option value="">Select no.</option>
                                    @for($i=1;$i<7;$i++)
                                        <option value="{{$i}}">{{$i}}</option>
                                    @endfor
                                    <option value="7+">7+</option>
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <th>Budget</th>
                            <td>
                                <input type="text" class="form-control numeric" name="budget" id="budget" value="">
                            </td>
                        </tr>

                        <tr>
                            <th>Agent</th>
                            <td>
                                <select name="agent_id" id="agent_id" class="js-select2-custom">
                                    <option value="">Select Agent</option>
                                    @foreach($agents as $agent)
                                        <option value="{{$agent->id}}">{{$agent->name}}</option>
                                    @endforeach
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <th>Source</th>
                            <td>
                                <select name="source" id="source" class="js-select2-custom">
                                    <option value="">Select Source</option>
                                    <option value="website">Website</option>
                                    <option value="walk_in">Walk In</option>
                                    <option value="broker">Broker</option>
                                </select>
                            </td>
                        </tr>
                        <tr id="website_grid" class="d-none">
                            <th>WebSite</th>
                            <td>
                                 <input type="text" class="form-control" name="website" id="website" value="">
                            </td>
                        </tr>
                        </tbody>
                    </table>
                </div>
            </div>
          </div>
            <div class="col-lg-12 mb-3 mb-lg-0">

              <div class="card card-info">
            <div class="card-header">
                <h6>Documents</h6>
            </div>
            <div class="card-body">
          <div class="row">
            <div class="col-12 col-sm-6 col-md-3 col-lg-3 col-xl-3">
                 <div class="form-group">
                     <label for="emirates_id_doc">Emirates Id </label>
                        
                     <div class="custom-file">

                                <input type="file" name="emirates_id_doc" class="js-file-attach custom-file-input" id="emirates_id_doc"
                                       data-hs-file-attach-options='{
              "textTarget": "[for=\"emirates_id_doc\"]"
           }'>
                                <label class="custom-file-label" for="emirates_id_doc">Choose file</label>
                            </div>
                 </div>
              </div>
                 <div class="col-12 col-sm-6 col-md-3 col-lg-3 col-xl-3">
                           <div class="form-group">
                               <label for="passport">Passport</label>
                                  
                               <div class="custom-file">

                                <input type="file" name="passport" class="js-file-attach custom-file-input" id="passport"
                                       data-hs-file-attach-options='{
              "textTarget": "[for=\"passport\"]"
           }'>
                                <label class="custom-file-label" for="passport">Choose file</label>
                            </div>
                           </div>
                       </div>
                       <div class="col-12 col-sm-6 col-md-3 col-lg-3 col-xl-3">
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

          </div>
          <div class="row">
            <div class="col-12 col-sm-6 col-md-3 col-lg-3 col-xl-3">
                 <div class="form-group">
                     <label for="emirates_exp_date">Validity </label>
                     <input type="text" name="emirates_exp_date" value="" id="emirates_exp_date" class="js-flatpickr form-control flatpickr-custom"
                                           data-hs-flatpickr-options='{
                                             "dateFormat": "d-m-Y"
                                           }'>

                 </div>
              </div>
                 <div class="col-12 col-sm-6 col-md-3 col-lg-3 col-xl-3">
                           <div class="form-group">
                               <label for="passport_exp_date">Validity</label>
                                  
                               <input type="text" name="passport_exp_date" value="" id="passport_exp_date" class="js-flatpickr form-control flatpickr-custom"
                                           data-hs-flatpickr-options='{
                                             "dateFormat": "d-m-Y"
                                           }'>
                           </div>
                       </div>
                       <div class="col-12 col-sm-6 col-md-3 col-lg-3 col-xl-3">
                           <div class="form-group">
                               <label for="visa_exp_date">Validity</label>
                                  
                               <input type="text" name="visa_exp_date" value="" id="visa_exp_date" class="js-flatpickr form-control flatpickr-custom"
                                           data-hs-flatpickr-options='{
                                             "dateFormat": "d-m-Y"
                                           }'>
                               
                           </div>
                       </div>

          </div>
          <div class="row">
            <div class="col-12">
              <div class="form-group text-right">
                <button class="btn btn-primary">Save</button>
            </div>
            </div>
          </div>
            </div>
        </div>

                

            </div>
            {{Form::close()}}
        </div>


    </div>
    <!-- End Content -->
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
        (function($){
          $('.js-select2-custom').each(function () {
          var select2 = $.HSCore.components.HSSelect2.init($(this));
        });

        $('.js-file-attach').each(function () {
            let customFile = new HSFileAttach($(this)).init();
        });

        $('.js-flatpickr').each(function () {
          $.HSCore.components.HSFlatpickr.init($(this));
        });


             $("#source").on("change",function(e){
                e.preventDefault();
                let value = $(this).val();
                if(value==="website")
                {
                    $("#website_grid").removeClass("d-none");
                }
                else
                {
                     $("#website_grid").addClass("d-none");
                }
            });


            function render_image(input) {
                if (input.files && input.files[0]) {
                    let reader = new FileReader();
                    reader.onload = function (e) {
                        
                    }
                    reader.readAsDataURL(input.files[0]);
                }
            }

            

            $("#add_data_form").on("submit",function(e){
                e.preventDefault();
                let url = "{{route('salesEnquiry.store')}}";
                let params = new FormData(document.getElementById("add_data_form"));
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
            });

            $('#preferred_city').select2({
                ajax: {
                    url: "{{route('select2.city.search')}}",
                    data: function (params) {
                        // Query parameters will be ?search=[term]&type=public
                        return {
                            search: params.term,
                        };
                    },
                    processResults: function (result) {
                        return {
                            results: result.data
                        };
                    }
                }
            });

        })(jQuery);
    </script>
@endsection
