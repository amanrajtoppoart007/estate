@extends('admin.layout.base')
@include("admin.include.breadcrumb",["page_title"=>"Create Rent Inquiry"])
@section('content')
<div class="card">
    <div class="card-body">
        {{Form::open(['route'=>'rentEnquiry.store','id'=>'add_data_form','autocomplete'=>'off'])}}
        <div class="card card-info">
            <div class="card-header">
                <h6>Client Detail</h6>
            </div>
            <div class="card-body">

                <div class="form-group">
                    <label class="input-label">Photo</label>

                    <div class="d-flex align-items-center">
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
                <!-- End Form Group -->
                <div class="row hideme">
                    <div class="col-lg-6 col-sm-6 col-12 offset-lg-3 offset-sm-3">
                        <div class="text-center">
                            <div class="user_photo">
                                <img id="profile_image_grid" src="{{asset('theme/images/4.png')}}" style="width:250px;margin-bottom:10px;" alt="">
                                <div style="position: absolute;top:211px;right:72px;">
                                    <label class="btn btn-primary mb-0" for="profile_image">
                                        <i class="fa fa-upload" aria-hidden="true"></i>
                                    </label>
                                    <input id="profile_image" class="hide" type="file" name="photo_old">
                                    <a type="button" id="remove_profile_image" class="btn btn-danger text-white">
                                        <i class="fa fa-trash"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-6 col-sm-6 col-12">
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
                    <div class="col-lg-6 col-sm-6 col-12">
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
                </div>
                <div class="row">
                    <div class="col-lg-4 col-sm-4 col-12">
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
                    <div class="col-lg-4 col-sm-4 col-12">
                        <div class="form-group">
                            <label for="country_code">Nationality</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fa fa-flag"></i></span>
                                </div>
                                <select class="form-control" name="country_code" id="country_code">
                                    <option value="">Select Country</option>
                                    @foreach($countries as $country)
                                    <option value="{{$country->code}}">{{$country->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-sm-4 col-12">
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
            </div>
        </div>
        <div class="card card-info">
            <div class="card-header">
                <h6>Inquiry Detail</h6>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-lg-6 col-sm-6 col-12">
                        <div class="form-group">
                            <label>Category</label>
                            <select name="category" id="category" class="custom-select">
                                <option value="">Select Category</option>
                                <option value="residential">Residential</option>
                                <option value="commercial">Commercial</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-lg-6 col-sm-6 col-12">
                        <div class="form-group">
                            <label>Property Type</label>
                            <select name="property_type" id="property_type" class="custom-select">
                            </select>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-6 col-sm-6 col-12">
                        <div class="form-group">
                            <label>Preferred Location</label>
                            <input type="text" class="form-control" name="preferred_location" id="preferred_location" value="">
                        </div>
                    </div>
                    <div class="col-lg-6 col-sm-6 col-12">
                        <div class="form-group">
                            <label>No. Of Bedrooms</label>
                            <select class="custom-select" name="bedroom" id="bedroom">
                                <option value="">Select no.</option>
                                @for($i=1;$i<7;$i++) <option value="{{$i}}">{{$i}}</option>

                                    @endfor
                                    <option value="7+">7+</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-6 col-sm-6 col-12">
                        <div class="form-group">
                            <label>No. Of Bedrooms</label>
                            <input type="text" class="form-control numeric" name="budget" id="budget" value="">
                        </div>
                    </div>
                    <div class="col-lg-6 col-sm-6 col-12">
                        <div class="form-group">
                            <label>Tenancy Type</label>
                            <select name="tenancy_type" id="tenancy_type" class="custom-select">
                                <option value="">Select Tenancy</option>
                                <option value="family_husband_wife">Family (Husband & Wife)</option>
                                <option value="family_brother_sister">Family (Brother & Sister)</option>
                                <option value="company">Company</option>
                                <option value="bachelor">Bachelor</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-6 col-sm-6 col-12">
                        <div class="form-group">
                            <label>Number Of Tenants</label>
                            <input type="text" class="form-control numeric" name="tenant_count" id="tenant_count" value="">
                        </div>
                    </div>
                    <div class="col-lg-6 col-sm-6 col-12">
                        <div class="form-group">
                            <label>Agent</label>
                            <select name="agent_id" id="agent_id" class="custom-select">
                                <option value="">Select Agent</option>
                                @foreach($agents as $agent)
                                <option value="{{$agent->id}}">{{$agent->name}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-6 col-sm-6 col-12">
                        <div class="form-group">
                            <label>Source</label>
                            <select name="source" id="source" class="custom-select">
                                <option value="">Select Source</option>
                                <option value="website">Website</option>
                                <option value="walk_in">Walk In</option>
                                <option value="broker">Broker</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-lg-6 col-sm-6 col-12">
                        <div class="form-group">
                            <label>WebSite</label>
                            <input type="text" class="form-control" name="website" id="website" value="">
                        </div>
                    </div>
                </div>
            </div>
            <div class="form-group text-right">
                <input type="hidden" id="next_action_input" name="next_action" value="save">
                <button id="create_rent_breakdown" class="btn btn-primary submit_form_btn">Prepare BreakDown</button>
                <button id="create_rent_enquiry" class="btn btn-primary submit_form_btn">Save Detail</button>
            </div>
        </div>

        {{Form::close()}}
    </div>
</div>
@endsection
@section('script')
<script>
    $(document).ready(function() {
        $('.js-file-attach').each(function () {
            var customFile = new HSFileAttach($(this)).init();
        });
        function get_property_types() {
            $("#property_type").empty();
            let html = '<option value="">Select Type</option>';
            let residential_property_types = {
                'apartment': 'Apartment',
                'villa': 'Vila',
                'townhouse': 'Town House',
            };
            let commercial_property_types = {
                'office': 'Office',
                'shop': 'Shop',
                'retail': 'Retail',
                'warehouse': 'Ware House'
            }

            if ($("#category").val() === 'residential') {
                $.each(residential_property_types, function(index, item) {
                    html += `<option value="${index}">${item}</option>`;
                });
            }
            if ($("#category").val() === 'commercial') {
                $.each(commercial_property_types, function(index, item) {
                    html += `<option value="${index}">${item}</option>`;
                });
            }

            $("#property_type").html(html);
        }

        $("#category").on("change", function() {
            get_property_types();
        });
        $(document).on("click", ".submit_form_btn", function() {
            $("#next_action_input").val($(this).attr("id"));
        });

        $("#source").on("change", function(e) {
            e.preventDefault();
            let value = $(this).val();
            if (value === "website") {
                $("#website_grid").removeClass("d-none");
            } else {
                $("#website_grid").addClass("d-none");
            }
        });

        function render_image(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                reader.onload = function(e) {
                    $('#profile_image_grid').attr('src', e.target.result);
                }
                reader.readAsDataURL(input.files[0]);
            }
        }

        $("#profile_image").change(function() {
            render_image(this);
        });
        $("#remove_profile_image").click(function() {
            $('#profile_image_grid').attr('src', '/theme/images/4.png');
            var file = document.getElementById("profile_image");
            file.value = file.defaultValue;
        });
        $("#profile_image_grid").on('click', function() {
            $("#profile_image").click();
        });

        $("#add_data_form").on("submit", function(e) {
            e.preventDefault();
            let url = "{{route('rentEnquiry.store')}}";
            let params = new FormData(document.getElementById("add_data_form"));

            function fn_success(result) {
                toast('success', result.message, 'bottom-right');
                if (result.next_url) {
                    window.location.href = result.next_url;
                }
                $("#add_data_form")[0].reset();
                $('#profile_image_grid').attr('src', '/theme/images/4.png');
            }

            function fn_error(result) {
                toast('error', result.message, 'bottom-right');
            }
            $.fn_ajax_multipart(url, params, fn_success, fn_error);
        });



    });
</script>
@endsection
