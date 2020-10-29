@extends('admin.layout.app')
@section('head')
    <link rel="stylesheet" href="{{asset('plugin/datetimepicker/css/gijgo.min.css')}}">
@endsection
@include("admin.include.breadcrumb",["page_title"=>"Rent BreakDown"])
@section('content')
    <div class="card">
        <div class="card-body">
                    {{Form::open(['id'=>'add_data_form','autocomplete'=>'off'])}}
        <input type="hidden" name="rent_enquiry_id" value="{{$enquiry->id}}">
        <div class="card">
            <div class="card-header bg-gradient-cyan">
                <h6><strong>Property Allocation Detail</strong></h6>
            </div>
            <div class="card-body">
                <div class="row">

                    <div class="col-12 col-sm-4 col-md-4 col-lg-4 col-xl-4">
                        <div class="form-group">
                            <label for="city_id">City</label>
                            <select class="form-control" name="city_id" id="city_id">
                                 <option value="">Select City</option>
                                @foreach($cities as $city)
                                    <option value="{{$city->id}}">{{$city->name}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="col-12 col-sm-4 col-md-4 col-lg-4 col-xl-4">
                        <div class="form-group">
                            <label for="property_id">Building Name</label>
                            <select class="form-control" name="property_id" id="property_id">
                                @if(!empty($property_unit))
                                    @foreach($properties as $prop)
                                        <option value="{{$prop->id}}">{{$prop->title}}</option>
                                    @endforeach
                                @endif
                            </select>
                        </div>
                    </div>
                    <div class="col-12 col-sm-4 col-md-4 col-lg-4 col-xl-4">
                        <div class="form-group">
                            <label for="unit_id">Flat No.</label>
                            <select class="form-control" name="unit_id" id="unit_id">
                            </select>
                        </div>
                    </div>
                </div>

            </div>
        </div>

        <div class="card">
            <div class="card-header bg-gradient-cyan">
                <h6>Client Detail</h6>
            </div>
            <div class="card-body">
                <table class="table table-borderless">
                    <tbody>
                    <tr>
                        <th>Name</th>
                        <td>{{$enquiry->name}}</td>
                        <th>Mobile Number</th>
                        <td>{{$enquiry->mobile}}</td>
                        <th>Nationality</th>
                        <td>{{$enquiry->country ?$enquiry->country->name : null}}</td>
                    </tr>
                    <tr>
                        <th>Tenancy Type</th>
                        <td>{{get_tenancy_type_title($enquiry->tenancy_type)}}</td>
                        <th>Number Of Tenants</th>
                        <td>{{$enquiry->tenant_count}}</td>
                        <th></th>
                        <td></td>
                    </tr>
                    </tbody>
                </table>
            </div>
        </div>
        <div class="card">
            <div class="card-header bg-gradient-cyan">
                <h6><strong>Rent BreakDown</strong></h6>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="rent_period_type">Rent Period</label>
                            <select class="form-control" name="rent_period_type" id="rent_period_type">
                                <option value="">Select</option>
                                <option value="monthly">MONTHLY</option>
                                <option value="half_yearly">HALF YEARLY</option>
                                <option value="yearly">YEARLY</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="rent_period">NO.Of <i id="rent_period_text"></i> </label>
                            <input type="text" class="form-control numeric" name="rent_period" id="rent_period"
                                   value="">
                        </div>
                    </div>



                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="lease_start">Lease Start Date</label>
                            <input type="text" class="form-control" name="lease_start" id="lease_start" value="">
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="lease_end">Lease End Date</label>
                            <input type="text" class="form-control" name="lease_end" id="lease_end" value="">
                        </div>
                    </div>

                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="tenancy_type">Tenancy Type</label>
                            <select class="form-control" name="tenancy_type" id="tenancy_type" readonly>
                                @php $tenancy_types = get_tenancy_types() @endphp
                                @foreach($tenancy_types as $key=>$value)
                                    @if($key==$enquiry->tenancy_type)
                                    <option value="{{$key}}">{{$value}}</option>
                                    @endif
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="unit_type">Unit Type</label>
                            <select class="form-control" name="unit_type" id="unit_type">
                                <option value="">Select Unit Type</option>
                                @php $unit_types = get_unit_types() @endphp
                                @foreach($unit_types as $key=>$value)
                                    <option value="{{$key}}">{{$value}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="rent_amount">Total Rent Amount</label>
                            <input type="text" class="form-control" name="rent_amount" id="rent_amount" value="">
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="installments">Installments</label>
                            <input type="text" class="form-control" name="installments" id="installments" value="">
                        </div>
                    </div>

                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="parking">Parking <i id="parking"></i> </label>
                            <select class="form-control" name="parking" id="parking">
                                <option value="yes">Yes</option>
                                <option value="no">No</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="parking_number">Parking number <i id="rent_period_text"></i> </label>
                            <input type="text" class="form-control numeric" name="parking_number" id="parking_number"
                                   value="">
                        </div>
                    </div>


                </div>
            </div>
        </div>

        <div class="card">
            <div class="card-header bg-gradient-cyan">
                <h6>Rent Installment Detail</h6>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-12 table-responsive">
                        <table id="installment_table" class="table">
                            <tbody id="rent_breakdown_grid">

                            </tbody>
                        </table>
                    </div>
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
            <input type="hidden" id="next_action_input" name="next_action" value="">
            <button type="submit" id="create_tenant" class="btn btn-success submit_breakdown_button">Create Tenant</button>
            <button type="submit" id="preview" class="btn btn-primary submit_breakdown_button">Preview</button>
            <button type="submit" id="print_breakdown" class="btn btn-info submit_breakdown_button">Print BreakDown</button>
            <button type="submit" id="send_breakdown_via_email" class="btn btn-warning text-white submit_breakdown_button">Send BreakDown By E-mail</button>
        </div>
        {{Form::close()}}
        </div>
    </div>
@endsection
@section('js')
    <script src="{{asset('plugin/datetimepicker/js/gijgo.min.js')}}"></script>
    <script src="{{asset('js/breakdown.js')}}"></script>
@endsection
@section("script")
    <script>

        (function ($) {

            $("#city_id").select2();

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

            $(document).on("change","#rent_breakdown_grid tr td input",function(){

              let index =  $(this).index();
              $.calculate_column_breakdown(index);
            });

              let  get_breakdown_config =  function(){

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
               if(!$.trim($("#tenancy_type").val()))
                {
                    $("#tenancy_type").css({'border-color':'red'}).trigger("focus");
                    return false;
                }
               if(!$.trim($("#unit_type").val()))
                {
                    $("#unit_type").css({'border-color':'red'}).trigger("focus");
                    return false;
                }
               if(!$.trim($("#rent_amount").val()))
                {
                    $("#rent_amount").css({'border-color':'red'}).trigger("focus");
                    return false;
                }
               if(!$.trim($("#installments").val()))
                {
                    $("#installments").css({'border-color':'red'}).trigger("focus");
                    return false;
                }
                 get_breakdown_config();


            });
            $.render_breakdown_heading();
            $(document).on("click", ".submit_breakdown_button", function () {
                $("#next_action_input").val($(this).attr("id"));
            });

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


          let start_date =  $('#lease_start').datepicker({ footer: true, modal: true,format: 'dd-mm-yyyy',
            /*minDate : '{{now()->format('d-m-Y')}}',*/
            change : function(e)
            {
                calculateEndDate();
            }
         });
         $("#rent_period,#rent_period_type").on('change',function(){
           calculateEndDate();
         });


         function calculateEndDate()
         {
           if(!$.trim($('#rent_period_type').val()))
                {
                    $('#rent_period_type').css({'border-color':'aqua'}).trigger("focus");
                    return false;
                }
                if(!$.trim($('#rent_period').val()))
                {
                    $('#rent_period').css({'border-color':'aqua'}).trigger("focus");
                    return false;
                }
                if(!$.trim($('#lease_start').val()))
                {
                    $('#lease_start').css({'border-color':'aqua'}).trigger("focus");
                    return false;
                }
                let url    = "{{route('calculate.endDate')}}";
                let params = {
                   'rent_period_type': $("#rent_period_type").val(),
                   'rent_period'     : $("#rent_period").val(),
                   'lease_start'     : $("#lease_start").val(),
                }
                function fn_success(result)
                {
                  let minDate = $("#lease_start").val();
                  $('#lease_end').datepicker().destroy();
                   $('#lease_end').datepicker({footer: true, modal: true,format: 'dd-mm-yyyy',value:`${result.endDate}`,minDate:`${minDate}`});
                };
                function fn_error(result)
                {
                  toast('error',result.message,'bottom-right');
                };
                $.fn_ajax(url,params,fn_success,fn_error);
         }

   $('#add_data_form').on("submit",function(e){
         e.preventDefault();
          let params   = $("#add_data_form").serialize();
          let url      = "{{route('save.rent.breakdown')}}";
          function fn_success(result)
          {
              toast('success', result.message, 'bottom-right');
              if(result.next_url)
              {
                  if($("#next_action_input").val()==="send_breakdown_via_email")
                  {
                        $.ajax({
                            url : result.next_url,
                            type : "GET",
                            success :function(result)
                            {
                                toast('success', result.message, 'bottom-right');
                            },
                            error :function(result)
                            {
                                 toast('error', result.message, 'bottom-right');
                            }
                        })
                  }
                  else
                  {
                         window.location.href = result.next_url;
                  }
              }

          }
          function fn_error(result)
          {
                toast('error', result.message, 'bottom-right');
          }
        $.fn_ajax(url,params,fn_success,fn_error);
  });



           /************ get list of property   ***************/

           $('#city_id').on('change',function(e){
            let params = {'city_id' : $(this).val()};
            function fn_success(result)
            {
                 if(result.response==="success")
                 {
                     $("#property_id").empty();
                     $("#property_id").append(`<option value="">Select Property</option>`);
                     $.each(result.data,function(i,item)
                     {
                       let option = `<option value="${item.id}">${item.title}</option>`;
                       $("#property_id").append(option);
                       $("#property_id").select2();
                     });
                 }
            }
            function fn_error(result)
            {
               toast('error', result.message, 'bottom-right');
            }
            $.fn_ajax('{{route('allotment.city-wise.property.list')}}',params,fn_success,fn_error);
           });

           /************ get list of property unit types  ***************/
           $("#property_id").on('change',function(e) {
             $("#unit_id").html('');
            let params = {'property_id' : $(this).val()};
            function fn_success(result)
            {
                    let options = `<option value="">Select Flat</option>`;
                     $.each(result.data,function(i,item)
                     {
                        options += `<option value="${item.id}">${item.flat_number}</option>`;

                     });
                     $("#unit_id").html(options);
                     $("#unit_id").select2();

            }
            function fn_error(result)
            {
               toast('error', result.message, 'bottom-right');
            }
            $.fn_ajax('{{route('get.vacant.unit.list')}}',params,fn_success,fn_error);
           });

        })(jQuery);
    </script>
@endsection
