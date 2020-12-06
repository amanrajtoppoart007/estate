@extends('admin.layout.base')
@include("admin.include.breadcrumb",["page_title"=>"Edit Rent Inquiry"])
@section('content')
    <div class="card">
        <div class="card-body">
            {{Form::open(['id'=>'edit_data_form','autocomplete'=>'off'])}}
            <input type="hidden" name="rent_enquiry_id" value="{{$rent_enquiry->id}}">
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
                            <input type="text" class="form-control" name="name" id="name" value="{{$rent_enquiry->name}}">
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
                            <input type="text" class="form-control" name="email" id="email" value="{{$rent_enquiry->email}}" data-inputmask="'alias': 'email'" inputmode="email" data-mask="">
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
                            <input type="text" class="form-control numeric" name="mobile" id="mobile" value="{{$rent_enquiry->mobile}}">
                        </div>
                    </div>
                </div>
                <div class="col-sm-12 col-md-4 col-lg-4 col-xl-4">
                            <div class="form-group">
                                <label for="country_code">Nationality</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="fa fa-flag"></i></span>
                                    </div>
                                    <select  class="form-control" name="country_code" id="country_code">
                                        <option value="">Select Country</option>
                                        @foreach($countries as $country)
                                            @php $selected = ($rent_enquiry->country_code==$country->code)?"selected":null; @endphp
                                            <option value="{{$country->code}}" {{$selected}}>{{$country->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>


                <div class="col-sm-12 col-md-4 col-lg-4 col-xl-4">
                    <div class="form-group">
                    <label for="address">Address</label>
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fa fa-map-marker"></i></span>
                        </div>
                        <input type="text" class="form-control" name="address" id="address" value="{{$rent_enquiry->address}}">
                    </div>
                </div>
                </div>
            </div>
            <div class="col-sm-6 col-md-4">
                

                <div class="d-flex align-items-center float-right">
                        <!-- Avatar -->
                        <label class="avatar avatar-xl avatar-circle avatar-uploader mr-5" for="avatarUploader">
                            <img id="avatarProjectSettingsImg" class="avatar-img" src="{{asset('theme/images/4.png')}}" alt="Image Description">

                            <input type="file" class="js-file-attach avatar-uploader-input" name="photo" id="avatarUploader"
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
                                <select name="category" id="category" class="form-control">
                                    @php $categories = ['residential'=>'Residential','commercial'=>'Commercial','commercial_and_residential'=>'Commercial & Residential']; @endphp
                                    <option value="">Select Category</option>
                                    @foreach($categories as $cat_key=>$cat_value)
                                        @php $selected = ($cat_key==$rent_enquiry->category) ? "selected":null; @endphp
                                        <option value="{{$cat_key}}" {{$selected}}>{{$cat_value}}</option>
                                    @endforeach
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <th>Property Type</th>
                            <td>
                                <select name="property_type" id="property_type" class="form-control">
                                    <option value="">Select Types</option>
                                    @php $types = ['apartment'=>'Apartment','villa'=>'Villa','townhouse'=>'TownHouse','office'=>'Office','retail'=>'Retail','shop'=>'Shop','warehouse'=>'WareHouse']; @endphp
                                    @foreach($types as $type_key=>$type_value)
                                        @php $selected = ($type_key==$rent_enquiry->property_type) ? "selected":null; @endphp
                                        <option value="{{$type_key}}" {{$selected}}>{{$type_value}}</option>
                                    @endforeach
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <th>Preferred Location</th>
                            <td>
                                <input type="text" class="form-control" name="preferred_location" id="preferred_location" value="{{$rent_enquiry->preferred_location}}">
                            </td>
                        </tr>
                        <tr>
                            <th>No. Of Bedrooms</th>
                            <td>
                                <select class="form-control" name="bedroom" id="bedroom">
                                    <option value="">Select no.</option>
                                    @for($i=1;$i<7;$i++)
                                        @php $selected = ($i==$rent_enquiry->bedroom)?"selected":null; @endphp
                                        <option value="{{$i}}" {{$selected}}>{{$i}}</option>
                                    @endfor
                                    <option value="7+" {{$rent_enquiry->bedroom=='7+'?'selected':null}}>7+</option>
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <th>Budget</th>
                            <td>
                                <input type="text" class="form-control numeric" name="budget" id="budget" value="{{$rent_enquiry->budget}}">
                            </td>
                        </tr>
                        <tr>
                            <th>Tenancy Type</th>
                            <td>
                                <select name="tenancy_type" id="tenancy_type" class="form-control">
                                    <option value="">Select Tenancy</option>
                                    @php $tenancy_types = get_tenancy_types() @endphp
                                    @foreach($tenancy_types as $key=>$value)
                                        @php  $selected = ($key==$rent_enquiry->tenancy_type)?"selected":null; @endphp
                                        <option value="{{$key}}" {{$selected}}>{{$value}}</option>
                                    @endforeach
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <th>Number Of Tenants</th>
                            <td>
                                <input type="text" class="form-control numeric" name="tenant_count" id="tenant_count" value="{{$rent_enquiry->tenant_count}}">
                            </td>
                        </tr>
                        <tr>
                            <th>Agent</th>
                            <td>
                                <select name="agent_id" id="agent_id" class="form-control">
                                    <option value="">Select Agent</option>
                                    @foreach($agents as $agent)
                                        @php $selected = ($rent_enquiry->agent_id===$agent->id)?"selected":null; @endphp
                                        <option value="{{$agent->id}}" {{$selected}}>{{$agent->name}}</option>
                                    @endforeach
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <th>Source</th>
                            <td>
                                <select name="source" id="source" class="form-control">
                                    <option value="">Select Source</option>
                                    @php $sources = get_rent_enquiry_sources() @endphp
                                     @foreach($sources as $skey=>$svalue)
                                        @php $selected = ($rent_enquiry->source===$skey)?"selected":null; @endphp
                                        <option value="{{$skey}}" {{$selected}}>{{$svalue}}</option>
                                    @endforeach
                                </select>
                            </td>
                        </tr>
                        <tr id="website_grid" class="{{$rent_enquiry->source=='website'?'':'d-none'}}">
                            <th>WebSite</th>
                            <td>
                                 <input type="text" class="form-control" name="website" id="website" value="{{$rent_enquiry->website}}">
                            </td>
                        </tr>
                        </tbody>
                    </table>
                    <div class="form-group text-right">
                        <input type="hidden" id="next_action_input" name="next_action" value="save">
                        @if(empty($rent_enquiry->rent_breakdown))
                          <button id="create_rent_breakdown" class="btn btn-primary submit_form_btn">Prepare BreakDown</button>
                        @else
                            <button id="edit_rent_breakdown" class="btn btn-primary submit_form_btn">Save & Edit BreakDown</button>
                        @endif
                        <button id="create_rent_enquiry" class="btn btn-primary submit_form_btn">Save Detail</button>
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
            $('.js-file-attach').each(function () {
            var customFile = new HSFileAttach($(this)).init();
        });

            $(document).on("click",".submit_form_btn",function(){
                $("#next_action_input").val($(this).attr("id"));
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
            

            $("#edit_data_form").on("submit",function(e){
                e.preventDefault();
                let url = "{{route('rentEnquiry.update')}}";
                let params = new FormData(document.getElementById("edit_data_form"));
                function fn_success(result)
                {
                   toast('success',result.message,'bottom-right');
                   if(result.next_url)
                   {
                       window.location.href = result.next_url;
                   }
                }
                function fn_error(result)
                {
                   toast('error',result.message,'bottom-right');
                }
                $.fn_ajax_multipart(url,params,fn_success,fn_error);
            });
        });
    </script>
@endsection
