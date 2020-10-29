@extends("admin.layout.app")
@section('head')
    <link rel="stylesheet" href="{{asset('plugin/datetimepicker/css/gijgo.min.css')}}">
@endsection
@section('js')
    <script src="{{asset('plugin/datetimepicker/js/gijgo.min.js')}}"></script>
@endsection
@include("admin.include.breadcrumb",["page_title"=>"Property Allotment"])
@section('content')
    <div class="card">
        <div class="card-body">
        {{Form::open(['route'=>'allot.property','id'=>'add_data_form'])}}
        <input type="hidden" name="tenant_id" value="{{$tenant->id}}">
        <input type="hidden" name="rent_breakdown_id" value="{{$breakdown ? $breakdown->id:null}}">

        <div class="card">
            <div class="card-header bg-gradient-navy">
                <h6><strong>Allocate Property</strong></h6>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="city_id">City</label>
                            <select class="form-control" name="city_id" id="city_id">
                                <option value="">Select City</option>
                                @foreach($cities as $city)
                                    @if(!empty($property_unit->property))
                                        @php $selected = ($property_unit->property->city_id==$city->id)?"selected":"";  @endphp
                                    @else
                                        @php  $selected = null; @endphp
                                    @endif
                                    <option value="{{$city->id}}" {{$selected}}>{{$city->name}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="property_id">Building Name</label>
                            <select class="form-control" name="property_id" id="property_id">
                                @if(!empty($property_unit))
                                    @foreach($properties as $prop)
                                        @php $selected = ($property_unit->property->id==$prop->id)?"selected":"";  @endphp
                                        <option value="{{$prop->id}}" {{$selected}}>{{$prop->title}}</option>
                                    @endforeach
                                @endif
                            </select>
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="unit_id">Flat No.</label>
                            <select class="form-control" name="unit_id" id="unit_id">
                                <option value="">Select Flat</option>
                                @if(!empty($property_unit))
                                    @foreach($unit_list as $flat)
                                        @php $selected = ($property_unit->id==$flat->id)?"selected":""; @endphp
                                        <option value="{{$flat->id}}" {{$selected}}> {{$flat->flat_number ?? $flat->unitcode }}</option>
                                    @endforeach
                                @else
                                    @foreach($unit_list as $flat)
                                        <option value="{{$flat->id}}"> {{$flat->flat_number ?? $flat->unitcode }}</option>
                                    @endforeach
                                @endif
                            </select>
                        </div>
                    </div>


                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="agent_id">Agent</label>
                            <select class="form-control" name="agent_id" id="agent_id">
                                <option value="">Select Agent</option>
                                  @foreach($agents as $agent)
                                    <option value="{{$agent->id}}">{{$agent->name}}</option>
                                  @endforeach
                            </select>
                        </div>
                    </div>

                </div>
            </div>
        </div>

       {{-- <div class="card">
            <div class="card-header bg-gradient-navy"><h6><strong>Owner Detail</strong></h6></div>
            <div class="card-body table-responsive">
                <table class="table border-0 border-th-td-none">
                    <tbody>
                    <tr>
                        <th>Name</th>
                        <td>{{$property_unit ? ($property_unit->owner ? $property_unit->owner->name:null): null}}</td>
                        <th>Nationality</th>
                        <td>{{$property_unit ? ($property_unit->owner ? $property_unit->owner->country->name:null) : null}}</td>
                        <th>Mobile</th>
                        <td>{{$property_unit ? ($property_unit->owner ? $property_unit->owner->mobile: null): null}}</td>
                    </tr>
                    <tr>
                        <th>Email Id</th>
                        <td>{{$property_unit ? ($property_unit->owner ? $property_unit->owner->email: null): null}}</td>
                        <th></th>
                        <td></td>
                        <th></th>
                        <td></td>
                    </tr>
                    </tbody>
                </table>
            </div>
        </div>--}}

        <div class="card">
            <div class="card-header bg-gradient-navy"><h6><strong>Tenant Detail</strong></h6></div>
            <div class="card-body table-responsive">
                <table class="table border-0 border-th-td-none">
                    <tbody>
                    <tr>
                        <th>Name</th>
                        <td>{{$tenant->name}}</td>
                        <th>Tenancy Type</th>
                        <td>{{($tenant->tenant_type)?ucwords(str_replace("_"," ",$tenant->tenant_type)):''}}</td>
                        <th>Number Of Tenants</th>
                        <td>{{($tenant->tenant_count)?$tenant->tenant_count:1}}</td>
                    </tr>
                    <tr>
                        <th>Mobile Number</th>
                        <td>{{$tenant->mobile}}</td>
                        <th>Email-Id</th>
                        <td>{{$tenant->email}}</td>
                        <th></th>
                        <td></td>
                    </tr>
                    </tbody>
                </table>
            </div>
        </div>


        <div class="card">
            <div class="card-header bg-gradient-navy">
                <h6><strong>Rent Detail</strong></h6>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="rent_period_type">Rent Period</label>
                            <select class="form-control" name="rent_period_type" id="rent_period_type">
                                <option value="">Select</option>
                                @php $types = get_rent_period_types() @endphp
                                @foreach($types as $key=>$value)
                                    @php
                                        $selected = null;
                                        if(!empty($breakdown))
                                        {
                                            $selected = ($key==$breakdown->rent_period_type) ? "selected" : null;
                                        }
                                    @endphp
                                    <option value="{{$key}}" {{$selected}}>{{$value}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="rent_period">NO.Of <i id="rent_period_text"></i> </label>
                            <input type="text" class="form-control numeric" name="rent_period" id="rent_period"
                                   value="{{$breakdown ?$breakdown->rent_period : 0}}">
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="lease_start">Lease Start Date</label>
                            <input type="text" class="form-control" name="lease_start" id="lease_start"
                                   value="{{!empty($breakdown) ? ($breakdown->lease_start_date ? date('d-m-Y',strtotime($breakdown->lease_start_date)) : null) :null }}">
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="lease_end">Lease End Date</label>
                            <input type="text" class="form-control" name="lease_end" id="lease_end"
                                   value="{{ !empty($breakdown) ? ($breakdown->lease_end_date ? date('d-m-Y',strtotime($breakdown->lease_end_date)) : null) :null }}">
                        </div>
                    </div>

                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="tenancy_type">Tenancy Type</label>
                            <select class="form-control" name="tenancy_type" id="tenancy_type">
                                @php $tenancy_types = get_tenancy_types() @endphp
                                @if(!empty($breakdown))
                                    @foreach($tenancy_types as $key=>$value)
                                        @if($key==$breakdown->tenancy_type)
                                            <option value="{{$key}}" selected>{{$value}}</option>
                                        @endif
                                    @endforeach
                                @else
                                    <option value="">Select Tenancy Type</option>
                                    @foreach($tenancy_types as $key=>$value)
                                        <option value="{{$key}}">{{$value}}</option>
                                    @endforeach
                                @endif
                            </select>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="unit_type">Unit Type</label>
                            <select class="form-control" name="unit_type" id="unit_type">
                                @php $unit_types = get_unit_types() @endphp
                                @if(!empty($breakdown))
                                    <option value="">Select Unit Type</option>
                                    @foreach($unit_types as $key=>$value)
                                        @php $selected = ($key==$breakdown->unit_type)?'selected':null; @endphp
                                        <option value="{{$key}}" {{$selected}}>{{$value}}</option>
                                    @endforeach
                                @else
                                    <option value="">Select Unit Type</option>
                                    @foreach($unit_types as $key=>$value)
                                        <option value="{{$key}}">{{$value}}</option>
                                    @endforeach
                                @endif
                            </select>
                        </div>
                    </div>

                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="rent_amount">Total Rent Amount</label>
                            <input type="text" class="form-control" name="rent_amount" id="rent_amount"
                                   value="{{ !empty($breakdown) ? $breakdown->rent_amount :null}}">
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="installments">Installments</label>
                            <input type="text" class="form-control" name="installments" id="installments"
                                   value="{{(!empty($breakdown)) ? $breakdown->installments : null }}">
                        </div>
                    </div>

                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="parking">Parking <i id="parking"></i> </label>
                            <select class="form-control" name="parking" id="parking">
                                <option
                                    value="yes" {{ !empty($breakdown) ? ($breakdown->parking=="yes" ? "selected": null) : null}}>
                                    Yes
                                </option>
                                <option
                                    value="no" {{ !empty($breakdown) ? ($breakdown->parking=="no" ?  "selected": null) : null}}>
                                    No
                                </option>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="parking_number">Parking number <i id="rent_period_text"></i> </label>
                            <input type="text" class="form-control numeric" name="parking_number" id="parking_number"
                                   value="{{!empty($breakdown) ? ($breakdown->parking=="yes" ? $breakdown->parking_number: null) : null}}">
                        </div>
                    </div>

                </div>
            </div>
        </div>

        <div class="card card-body">
            <div class="row">
                <div class="col-md-12">
                    @if(!empty($breakdown))
                        <table id="installment_table" class="table table-borderless">
                            <tbody id="rent_installment_grid">
                            @php $breakdown_items = get_breakdown_items($breakdown->rent_break_down_items); @endphp
                            @foreach($breakdown_items as  $item=>$values)
                                <tr>
                                    <th>{{ucwords(str_replace("_"," ", $item))}}</th>
                                    @foreach($values as $key=>$value)
                                        <td>
                                            @php $readonly = ($breakdown->tenancy_type=='company')?'':'readonly'; @endphp
                                            <input type="text" class="form-control numeric" name="{{$item}}[]"
                                                   value="{{$value}}" {{$readonly}}>
                                        </td>
                                    @endforeach
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    @else
                        <table id="installment_table" class="table">
                            <tbody id="rent_breakdown_grid">

                            </tbody>
                        </table>
                    @endif
                </div>
            </div>
        </div>

        <div class="form-group">
            <input type="hidden" id="security_deposit_constant" name="security_deposit_constant" value="">
            <input type="hidden" id="municipality_fees_constant" name="municipality_fees_constant" value="">
            <input type="hidden" id="brokerage_constant" name="brokerage_constant" value="">
            <input type="hidden" id="contract_constant" name="contract_constant" value="">
            <input type="hidden" id="remote_deposit_constant" name="remote_deposit_constant" value="">
            <input type="hidden" id="sewa_deposit_constant" name="sewa_deposit_constant" value="">
            <button type="submit" class="btn btn-primary mt-4">Allocate Property</button>
        </div>
        {{Form::close()}}
        </div>
    </div>
@endsection
@section('script')
     <script src="{{asset('js/breakdown.js')}}"></script>
    <script>
          (function ($) {
              $("#city_id").select2();
              $("#agent_id").select2();
            $("#rent_period_type").on('change', function () {
                    let rent_period_type = $(this).val();
                    let rent_period_text = null;
                    switch (rent_period_type) {
                        case 'monthly':
                            rent_period_text = 'Month';
                            break;
                        case 'half_yearly':
                            rent_period_text = 'Half Years';
                            break;
                        case 'yearly':
                            rent_period_text = 'Years';
                            break;
                    }
                    $("#rent_period_text").text(rent_period_text);
                });
            $('#lease_start').datepicker({
                    footer: true, modal: true, format: 'dd-mm-yyyy',
                    /*minDate: '{{now()->format('d-m-Y')}}',*/
                    change: function () {
                        calculateEndDate();
                    }
                });

             $("#rent_period,#rent_period_type").on('change', function () {
                    calculateEndDate();
                });

                function calculateEndDate() {
                    if (!$.trim($('#rent_period_type').val())) {
                        $('#rent_period_type').css({'border-color': 'aqua'}).trigger("focus");
                        return false;
                    }
                    if (!$.trim($('#rent_period').val())) {
                        $('#rent_period').css({'border-color': 'aqua'}).trigger("focus");
                        return false;
                    }
                    if (!$.trim($('#lease_start').val())) {
                        $('#lease_start').css({'border-color': 'aqua'}).trigger("focus");
                        return false;
                    }
                    let url = '{{route('calculate.endDate')}}';
                    let params = {
                        'rent_period_type': $("#rent_period_type").val(),
                        'rent_period': $("#rent_period").val(),
                        'lease_start': $("#lease_start").val(),
                    }

                    function fn_success(result) {
                        let minDate = $("#lease_start").val();
                        $('#lease_end').datepicker().destroy();
                        $('#lease_end').datepicker({
                            footer: true,
                            modal: true,
                            format: 'dd-mm-yyyy',
                            value: `${result.endDate}`,
                            minDate: `${minDate}`
                        });
                    }

                    function fn_error(result) {
                        toast('error', result.message, 'bottom-right');
                    }
                    $.fn_ajax(url, params, fn_success, fn_error);
                }

                let get_breakdown_config = function () {

                    $("#security_deposit_constant").val('');
                    $("#municipality_fees_constant").val('');
                    $("#brokerage_constant").val('');
                    $("#contract_constant").val('');
                    $("#remote_deposit_constant").val('');
                    $("#sewa_deposit_constant").val('');

                    let params = {
                        tenancy_type: $("#tenancy_type").val(),
                        unit_type: $("#unit_type").val(),
                    };

                    let url = "{{route('get.breakdown.constants')}}";

                    function fn_success(result) {
                        if (result.data) {
                            let config = result.data;
                            $("#security_deposit_constant").val(config.security_deposit);
                            $("#municipality_fees_constant").val(config.municipality_fees);
                            $("#brokerage_constant").val(config.brokerage);
                            $("#contract_constant").val(config.contract);
                            $("#remote_deposit_constant").val(config.remote_deposit);
                            $("#sewa_deposit_constant").val(config.sewa_deposit);
                            $.render_break_down_items();

                        }
                    }

                    function fn_error(result) {
                        toast("error", result.message, "top-right");

                    }

                    $.fn_ajax(url, params, fn_success, fn_error);
                };

                $("#tenancy_type,#unit_type,#rent_amount,#installments").on("change", function () {
                    if (!$.trim($("#tenancy_type").val())) {
                        $("#tenancy_type").css({'border-color': 'aqua'}).trigger("focus");
                        return false;
                    }
                    if (!$.trim($("#unit_type").val())) {
                        $("#unit_type").css({'border-color': 'aqua'}).trigger("focus");
                        return false;
                    }
                    if (!$.trim($("#rent_amount").val())) {
                        $("#rent_amount").css({'border-color': 'aqua'}).trigger("focus");
                        return false;
                    }
                    if (!$.trim($("#installments").val())) {
                        $("#installments").css({'border-color': 'aqua'}).trigger("focus");
                        return false;
                    }
                    get_breakdown_config();
                });

                $("#add_data_form").on("submit", function (e) {
                    e.preventDefault();
                    let params = $("#add_data_form").serialize();
                    let url = '{{route('allot.property')}}';

                    function fn_success(result) {
                        toast('success', result.message, 'bottom-right');
                        window.location.href = result.next_url;

                    }

                    function fn_error(result) {
                        if (result.response === 'validation_error') {
                            toast('error', result.message, 'bottom-right');
                        } else {
                            toast('error', result.message, 'bottom-right');
                        }
                    }

                    $.fn_ajax(url, params, fn_success, fn_error);
                });


                $('#city_id').on('change', function (e) {
                    let params = {
                        'city_id': $(this).val(),
                    };

                    function fn_success(result) {
                        if (result.response === "success") {
                            $("#property_id").empty();
                            $("#property_id").append(`<option value="">Select Property</option>`);
                            $.each(result.data, function (i, item) {
                                let option = `<option value="${item.id}">${item.title}</option>`;
                                $("#property_id").append(option);
                            });

                            $("#property_id").select2();
                        }
                    }

                    function fn_error(result) {
                        toast('error', result.message, 'bottom-right');
                    }

                    $.fn_ajax('{{route('allotment.city-wise.property.list')}}', params, fn_success, fn_error);
                });


                /************ get list of property unit types  ***************/
                $("#property_id").on('change', function (e) {
                    $("#unit_id").html('');
                    let params = {'property_id': $(this).val()};

                    function fn_success(result) {
                        let options = `<option value="">Select Unit</option>`;
                        $.each(result.data, function (i, item) {
                            options += `<option value="${item.id}">${item.flat_number}</option>`;

                        });
                        $("#unit_id").html(options);
                        $("#unit_id").select2();

                    }

                    function fn_error(result) {
                        toast('error', result.message, 'bottom-right');
                    }

                    $.fn_ajax('{{route('get.vacant.unit.list')}}', params, fn_success, fn_error);
                });


                $(document).on("change", "#rent_breakdown_grid tr td input", function () {

                    let index = $(this).index();
                    $.calculate_column_breakdown(index);
                });
                $(document).on("click", ".submit_breakdown_button", function () {
                    $("#next_action_input").val($(this).attr("id"));
                });
     $(document).on("change","#unit_id",function(){
          let url    = "{{route('property.unit.detail')}}";
		  let params = {"unit_id" : $(this).val() };
		  function fn_success(result)
		  {
		      let $value;
		      switch (result.data.bedroom)
              {
                  case "1":
                      $value = `<option value="one_br">1 Br</option>`;
                      break;
                  case "2":
                      $value = `<option value="two_br">2 Br</option>`;
                      break;
                  case "3":
                       $value = `<option value="three_br">3 Br</option>`;
                       break;
                  case "studio":
                      $value = `<option value="studio">Studio</option>`;
                      break;
                  default:
                      $value = "";
                      break;
              }
               $("#unit_type").html('');
		        $("#unit_type").html($value);
		        $("#unit_type").prop({readOnly:true});
		  }
		  function fn_error(result)
		  {
             toast('error',result.message,'top-right');
		  }
		  $.fn_ajax(url,params,fn_success,fn_error);
		});
                 @if(empty($breakdown))
                 $.render_breakdown_heading();
                @endif

     })(jQuery);
    </script>
@endsection

