@extends('admin.layout.app')
@section('head')
    <link rel="stylesheet" href="{{asset('plugin/datetimepicker/css/gijgo.min.css')}}">
@endsection
@include("admin.include.breadcrumb",["page_title"=>"Renew Tenancy BreakDown"])
@section('content')
    <div class="card">
        <div class="card-body">
   {{Form::open(['id'=>'add_data_form','autocomplete'=>'off'])}}
        <input type="hidden" name="rent_enquiry_id" value="">
            <input type="hidden" name="tenant_id" value="{{$allotment->tenant_id}}">
            <input type="hidden" name="property_id" value="{{$allotment->property_id}}">
            <input type="hidden" name="unit_id" value="{{$allotment->unit_id}}">
            <input type="hidden" name="unit_type" value="{{$allotment->breakdown->unit_type}}">
        <div class="card">
            <div class="card-header bg-gradient-cyan">
                <h6><strong>Property Allocation Detail</strong></h6>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-12 col-sm-4 col-md-4 col-lg-4 col-xl-4">
                        <div class="form-group">
                            <label for="property_id">Building Name</label>
                            {{$allotment->property->title}}

                        </div>
                    </div>
                    <div class="col-12 col-sm-4 col-md-4 col-lg-4 col-xl-4">
                        <div class="form-group">
                            <label for="unit_id">Flat Number</label>
                            {{$allotment->unit->flat_number}}
                        </div>
                    </div>
                    <div class="col-12 col-sm-4 col-md-4 col-lg-4 col-xl-4">
                        <div class="form-group">
                            <label for="unit_id">Unit Type</label>
                            {{strtoupper($allotment->breakdown->unit_type)}}
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
                        <td>{{$allotment->tenant->name}}</td>
                        <th>Mobile Number</th>
                        <td>{{$allotment->tenant->mobile}}</td>
                        <th>Nationality</th>
                        <td>{{$allotment->tenant->country ?$allotment->tenant->country->name : null}}</td>
                    </tr>
                    <tr>
                        <th>Tenancy Type</th>
                        <td>{{get_tenancy_type_title($allotment->breakdown->tenancy_type)}}</td>
                        <th>Number Of Tenants</th>
                        <td>{{$allotment->tenant->tenant_count}}</td>
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
                                @php $rent_period_types = ['monthly'=>'Monthly','half_yearly'=>'Half Yearly','yearly'=>'Yearly']; @endphp
                                @foreach($rent_period_types as $key=>$value)
                                    @php $selected = ($key==$allotment->breakdown->rent_period_type)?'selected':''; @endphp
                                    <option value="{{$key}}" {{$selected}}>{{$value}}</option>
                                @endforeach

                            </select>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="rent_period">NO.Of <i id="rent_period_text"></i> </label>
                            <input type="text" class="form-control numeric" name="rent_period" id="rent_period" value="{{$allotment->breakdown->rent_period}}">
                        </div>
                    </div>



                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="lease_start">Lease Start Date</label>
                            <input type="text" class="form-control" name="lease_start" id="lease_start" value="{{date('d-m-Y',strtotime($allotment->lease_start))}}"">
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="lease_end">Lease End Date</label>
                            <input type="text" class="form-control" name="lease_end" id="lease_end" value="{{date('d-m-Y',strtotime($allotment->lease_end))}}">
                        </div>
                    </div>

                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="tenancy_type">Tenancy Type</label>
                            <select class="form-control" name="tenancy_type" id="tenancy_type" readonly>
                                @php $tenancy_types = get_tenancy_types() @endphp
                                @foreach($tenancy_types as $key=>$value)
                                    @if($key==$allotment->breakdown->tenancy_type)
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
                                    @if(!empty($allotment->breakdown->unit_type))
                                        @php $selected = ($key==$allotment->breakdown->unit_type)?'selected':'';  @endphp
                                    <option value="{{$key}}" {{$selected}}>{{$value}}</option>
                                    @endif
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="rent_amount">Total Rent Amount</label>
                            <input type="text" class="form-control" name="rent_amount" id="rent_amount" value="{{$allotment->breakdown->rent_amount}}">
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="installments">Installments</label>
                            <input type="text" class="form-control" name="installments" id="installments" value="{{$allotment->breakdown->installments}}">
                        </div>
                    </div>

                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="parking">Parking <i id="parking"></i> </label>
                            <select class="form-control" name="parking" id="parking">
                                <option value="yes" {{$allotment->breakdown->parking==='yes'?'selected':null}}>Yes</option>
                                <option value="no" {{$allotment->breakdown->parking==='no'?'selected':null}}>No</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="parking_number">Parking number <i id="rent_period_text"></i> </label>
                            <input type="text" class="form-control numeric" name="parking_number" id="parking_number" value="{{$allotment->breakdown->parking_number}}">
                        </div>
                    </div>

                </div>
            </div>
        </div>

            <div class="card">
                <div class="card-header bg-gradient-cyan">
                    <h6>Rent BreakDown</h6>
                </div>
                <div class="card-body">
            <div class="row">
                <div class="col-md-12">
                    @if(!empty($allotment->breakdown))
                        <table id="installment_table" class="table table-borderless">
                            <tbody id="rent_breakdown_grid">
                            @php $breakdown_items = get_breakdown_items($allotment->breakdown->rent_break_down_items); @endphp
                            @foreach($breakdown_items as  $item=>$values)
                                <tr>
                                    <th>{{ucwords(str_replace("_"," ", $item))}}</th>
                                    @foreach($values as $key=>$value)
                                        <td>
                                            <label for="{{$item}}[]">
                                                <input type="text" class="form-control numeric" name="{{$item}}[]" value="{{$value}}">
                                            </label>
                                        </td>
                                    @endforeach
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    @endif
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
            <button type="submit" id="renew_breakdown" class="btn btn-primary submit_breakdown_button">Renew BreakDown</button>
            <button type="submit" id="preview" class="btn btn-primary submit_breakdown_button">Renew & View</button>
            <button type="submit" id="print_breakdown" class="btn btn-primary submit_breakdown_button">Renew & Print</button>
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
           /* minDate : '{{now()->format('d-m-Y')}}',*/
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
          let url      = "{{route('store.renewal.breakdown')}}";
          function fn_success(result)
          {
              toast('success', result.message, 'bottom-right');
              if(result.next_url)
              {
                  const inputElementVal = $("#next_action_input").val();
                  if(inputElementVal==="preview"||inputElementVal==="print_breakdown")
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

                 /************get list of cities via state id  */
           $('#state_id').on('change',function(e){
             $("#property_id").empty();
            $.get_city_list($("#state_id"),$("#city_id"));
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
