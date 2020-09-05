@extends('admin.layout.app')
  @section('head')
    <link rel="stylesheet" href="{{asset('plugin/datetimepicker/css/gijgo.min.css')}}">
  @endsection
    @php
      $unit = $property_unit ? $property_unit : null;
    @endphp
  @section('js')
  <script src="{{asset('plugin/datetimepicker/js/gijgo.min.js')}}"></script>
  @endsection
@include("admin.include.breadcrumb",["page_title"=>"Property Allotment"])
@section('content')
<div class="submit_form color-secondery icon_primary p-5 bg-white">
    {{Form::open(['route'=>'allot.property','id'=>'add_data_form'])}}
            <input type="hidden" name="tenant_id" value="{{$tenant->id}}">

    <div class="card">
                <div class="card-header bg-gradient-navy">
                   <h6> <strong>Allocate Property</strong> </h6>
                </div>
                <div class="card-body">
              <div class="row">
              <div class="col">
                <div class="form-group">
                  <label for="city_id">City</label>
                  <select class="form-control" name="city_id" id="city_id">
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

            </div>
              <div class="row">
                <div class="col-md-6">
                  <div class="form-group">
                  <label for="property_id">Property</label>
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
              <div class="col-md-3">
                  <div class="form-group">
                  <label for="property_unit_type_id">Property Unit Type</label>
                  <select class="form-control" name="property_unit_type_id" id="property_unit_type_id">
                      @if(!empty($property_unit->property->propertyUnitTypes))
                      @foreach($property_unit->property->propertyUnitTypes as $propertyUnitType)
                          @if(!empty($property_unit->propertyUnitType->id))
                           @php $selected = ($property_unit->propertyUnitType->id==$propertyUnitType->id)?"selected":"";  @endphp
                          @else
                              @php $selected = null; @endphp
                              @endif
                          <option value="{{$propertyUnitType->id}}">{{$propertyUnitType->title}}</option>
                      @endforeach
                      @else
                          <option value="">Select Property Unit</option>
                       @endif
                  </select>
                </div>
              </div>
              <div class="col-md-3">
                  <div class="form-group">
                  <label for="unit_id">Property Unit</label>
                  <select class="form-control" name="unit_id" id="unit_id">
                      @if(!empty($property_unit->property->property_units))
                       @foreach($property_unit->property->property_units as $unit)
                           @php $selected = ($property_unit->id==$unit->id)?"selected":"";  @endphp
                          <option value="{{$unit->id}}">{{$unit->unitcode}}</option>
                      @endforeach
                          @endif
                  </select>
                </div>
              </div>
              </div>
            </div>
          </div>

           <div class="card">
              <div class="card-header bg-gradient-navy"><h6> <strong>Owner Detail</strong> </h6></div>
                <div class="card-body table-responsive">
                <table class="table border-0 border-th-td-none">
                  <tbody>
                    <tr>
                      <th>Name</th>
                      <td>{{$property_unit ? ($property_unit->owner ? $property_unit->owner->name:null): null}}</td>
                      <th>Nationality</th>
                      <td>{{$property_unit ? ($property_unit->owner ? $property_unit->owner->country:null) : null}}</td>
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
            </div>

            <div class="card">
              <div class="card-header bg-gradient-navy"><h6> <strong>Tenant Detail</strong> </h6></div>
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
                <h6> <strong>Rent Detail</strong> </h6>
              </div>
              <div class="card-body">
                <div class="row">
                  <div class="col-md-3">
                  <div class="form-group">
                    <label for="rent_period_type">Rent Period</label>
                    <select  class="form-control" name="rent_period_type" id="rent_period_type">
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
                    <input type="text" class="form-control numeric" name="rent_period" id="rent_period" value="{{$breakdown ?$breakdown->rent_period : 0}}">
                  </div>
                </div>
                <div class="col-md-3">
                  <div class="form-group">
                    <label for="lease_start">Lease Start Date</label>
                    <input type="text" class="form-control" name="lease_start" id="lease_start" value="{{!empty($breakdown) ? ($breakdown->lease_start_date ? date('d-m-Y',strtotime($breakdown->lease_start_date)) : null) :null }}">
                  </div>
                </div>
                <div class="col-md-3">
                  <div class="form-group">
                    <label for="lease_end">Lease End Date</label>
                    <input type="text" class="form-control" name="lease_end" id="lease_end" value="{{ !empty($breakdown) ? ($breakdown->lease_end_date ? date('d-m-Y',strtotime($breakdown->lease_end_date)) : null) :null }}">
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
                    <input type="text" class="form-control" name="rent_amount" id="rent_amount" value="{{ !empty($breakdown) ? $breakdown->rent_amount :null}}">
                  </div>
                </div>
                <div class="col-md-3">
                  <div class="form-group">
                    <label for="installments">Installments</label>
                    <input type="text" class="form-control" name="installments" id="installments" value="{{(!empty($breakdown)) ? $breakdown->installments : null }}">
                  </div>
                </div>

                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="parking">Parking <i id="parking"></i> </label>
                            <select class="form-control" name="parking" id="parking">
                                <option value="yes" {{ !empty($breakdown) ? ($breakdown->parking=="yes" ? "selected": null) : null}}>Yes</option>
                                <option value="no"  {{ !empty($breakdown) ? ($breakdown->parking=="no" ?  "selected": null) : null}}>No</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="parking_number">Parking number <i id="rent_period_text"></i> </label>
                            <input type="text" class="form-control numeric" name="parking_number" id="parking_number" value="{{!empty($breakdown) ? ($breakdown->parking=="yes" ? $breakdown->parking_number: null) : null}}">
                        </div>
                    </div>

                </div>
                </div>
            </div>

    <div class="card card-body">
        <div class="row">
    <div class="col-md-12" style="overflow-x: scroll;">
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
                                    <input type="text" class="form-control numeric" name="{{$item}}[]" value="{{$value}}" {{$readonly}}>
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
  @endsection
  @section('script')
      @if(!empty($breakdown))
    <script>
        (function($){


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
                    toast('error','Please select tenancy type','bottom-right');
                    $("#tenancy_type").css({'border-color':'aqua'}).focus();
                    return false;
                }
               if(!$.trim($("#unit_type").val()))
                {
                    toast('error','Please select unit type','bottom-right');
                    $("#unit_type").css({'border-color':'aqua'}).focus();
                    return false;
                }
               if(!$.trim($("#rent_amount").val()))
                {
                    toast('error','Please enter total rent amount','bottom-right');
                    $("#rent_amount").css({'border-color':'aqua'}).focus();
                    return false;
                }
               if(!$.trim($("#installments").val()))
                {
                    toast('error','Please enter no. of installments','bottom-right');
                    $("#installments").css({'border-color':'aqua'}).focus();
                    return false;
                }
                 get_breakdown_config();


            });
            $.render_breakdown_heading();

        $("#rent_period_type").on('change',function(){
              let rent_period_type = $(this).val();
              let rent_period_text = null;
              switch (rent_period_type)
              {
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
            minDate : '{{now()->format('d-m-Y')}}',
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
                    toast('error','Please select rent period type','bottom-right');
                    $('#rent_period_type').css({'border-color':'aqua'}).focus();
                    return false;
                }
                if(!$.trim($('#rent_period').val()))
                {
                    toast('error','Please select Enter rent period','bottom-right');
                    $('#rent_period').css({'border-color':'aqua'}).focus();
                    return false;
                }
                if(!$.trim($('#lease_start').val()))
                {
                    toast('error','Please select Enter rent start date','bottom-right');
                    $('#lease_start').css({'border-color':'aqua'}).focus();
                    return false;
                }
                let url    = '{{route('calculate.endDate')}}';
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

        $("#add_data_form").on("submit",function(e){
           e.preventDefault();
          let params   = $("#add_data_form").serialize();
          let url      = '{{route('allot.property')}}';
          function fn_success(result)
          {
              toast('success', result.message, 'bottom-right');
              window.location.href = result.next_url;

          }
          function fn_error(result)
          {
                if(result.response==='validation_error')
                {
                    toast('error', result.message, 'bottom-right');
                }
                else
                {
                      toast('error', result.message, 'bottom-right');
                }
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
            let params = {
              'city_id' : $(this).val(),
            };
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
          $('#property_id').on('change',function(e)
           {
             $("#property_unit_type_id").empty();
            let params = {
              'property_id' : $(this).val(),
            };
            function fn_success(result)
            {
                 if(result.response==="success")
                 {
                    $("#property_unit_type_id").append('<option value="">Select Unit Type</option>');
                     $.each(result.data,function(i,item)
                     {

                       let option = `<option value="${item.id}">Series ${item.unit_series}</option>`;
                       $("#property_unit_type_id").append(option);
                     });
                 }
            }
            function fn_error(result)
            {
               toast('error', result.message, 'bottom-right');
            }
            $.fn_ajax('{{route('allotment.get.propertyUnitTypes.list')}}',params,fn_success,fn_error);
           });
           /************ get list of property unit***************/
          $('#property_unit_type_id').on('change',function(e)
           {
             $("#unit_id").empty();
            let params = {
              'property_unit_type_id' : $(this).val(),
            }
            function fn_success(result)
            {
                 if(result.response==="success")
                 {
                    $("#unit_id").append('<option value="">Select Unit</option>');
                     $.each(result.data,function(i,item)
                     {
                       let option = `<option value="${item.id}">${item.unitcode}</option>`;
                       $("#unit_id").append(option);
                     });
                 }
            }
            function fn_error(result)
            {
               toast('error', result.message, 'bottom-right');
            }
            $.fn_ajax('{{route('get.getPropertyUnit.list')}}',params,fn_success,fn_error);
           });
      })(jQuery);
    </script>
      @else
          <script src="{{asset('js/breakdown.js')}}"></script>
          <script>

        (function ($) {

            $.render_breakdown_heading();
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
                    toast('error','Please select tenancy type','bottom-right');
                    $("#tenancy_type").css({'border-color':'aqua'}).focus();
                    return false;
                }
               if(!$.trim($("#unit_type").val()))
                {
                    toast('error','Please select unit type','bottom-right');
                    $("#unit_type").css({'border-color':'aqua'}).focus();
                    return false;
                }
               if(!$.trim($("#rent_amount").val()))
                {
                    toast('error','Please enter total rent amount','bottom-right');
                    $("#rent_amount").css({'border-color':'aqua'}).focus();
                    return false;
                }
               if(!$.trim($("#installments").val()))
                {
                    toast('error','Please enter no. of installments','bottom-right');
                    $("#installments").css({'border-color':'aqua'}).focus();
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
            minDate : '{{now()->format('d-m-Y')}}',
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
                    toast('error','Please select rent period type','bottom-right');
                    $('#rent_period_type').css({'border-color':'aqua'}).focus();
                    return false;
                }
                if(!$.trim($('#rent_period').val()))
                {
                    toast('error','Please select Enter rent period','bottom-right');
                    $('#rent_period').css({'border-color':'aqua'}).focus();
                    return false;
                }
                if(!$.trim($('#lease_start').val()))
                {
                    toast('error','Please select Enter rent start date','bottom-right');
                    $('#lease_start').css({'border-color':'aqua'}).focus();
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
                    let options = `<option value="">Select Unit</option>`;
                     $.each(result.data,function(i,item)
                     {
                        options += `<option value="${item.id}">${item.unitcode}</option>`;

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
      @endif
  @endsection
