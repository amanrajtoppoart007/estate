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
                      <td>{{($tenant->profile)?($tenant->profile->tenant_count):'1'}}</td>
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
                   <h6> <strong>Property Allocation Detail</strong> </h6>
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
                        @foreach($types as $tkey=>$tvalue)
                            @php
                                $selected = null;
                                if(!empty($breakdown))
                                {
                                    $selected = ($tkey==$breakdown->rent_period_type) ? "selected" : null;
                                }
                             @endphp
                            <option value="{{$tkey}}" {{$selected}}>{{$tkey}}</option>
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
                </div>
                </div>
            </div>

    <div class="card card-body">
        <div class="row">
    <div class="col-md-12" style="overflow-x: scroll;">
        @if(!empty($breakdown))
            <table id="installment_table" class="table table-borderless">
                    <tbody>
                    @php $breakdown_items = get_breakdown_items($breakdown->rent_break_down_items); @endphp
                    @foreach($breakdown_items as  $item=>$values)
                        <tr>
                            <th>{{ucwords(str_replace("_"," ", $item))}}</th>
                            @foreach($values as $key=>$value)
                                <td>
                                    <input type="text" class="form-control numeric" name="{{$item}}[]" value="{{$value}}">
                                </td>
                            @endforeach
                        </tr>
                    @endforeach
                    </tbody>
            </table>
        @else
        <table id="installment_table" class="mb-5">
            <tbody>
            <tr id="row1">
                <td class="width200">Details of cash first payment</td>
                <td class="padLeft100">AED</td>
            </tr>
            <tr id="row2" class="text-danger text-center">
                <td class="width200"></td>
                <td class="padLeft100 inst text-center">1st</td>
            </tr>
            <tr id="row3">
                <td class="width200">Security Deposit</td>
                <td class="padLeft100"><input type="text" class="numeric" name="security_deposit[]" id="security_deposit_1" value="0" ></td>
            </tr>
            <tr id="row4">
                <td class="width200">Municipality Fees (4% from rent value)</td>
                <td class="padLeft100"><input type="text" class="numeric" name="municipality_fees[]" id="municipality_fees_1" value="0"></td>
            </tr>
            <tr id="row5">
                <td class="width200">Office Commission + VAT</td>
                <td class="padLeft100"><input type="text" class="numeric" name="brokerage[]" id="brokerage_1" value="0"></td>
            </tr>
            <tr id="row6">
                <td class="width200">Tenancy Contract</td>
                <td class="padLeft100">
                    <input type="text" class="numeric" name="contract[]" id="contract_1" value="0">

                </td>
            </tr>
            <tr id="row7">
                <td class="width200">Remote Deposit:</td>
                <td class="padLeft100"><input type="text" class="numeric" name="remote_deposit[]" id="remote_deposit_1" value="0"></td>
            </tr>
            <tr id="row8">
                <td class="width200">Sewa Deposit:</td>
                <td class="padLeft100"><input type="text" class="numeric" name="sewa_deposit[]" id="sewa_deposit_1" value="0"></td>
            </tr>
            <tr id="row9">
                <td class="width200">Monthly Installment:</td>
                <td class="padLeft100"><input type="text" name="monthly_installment[]" id="monthly_installment_1" class="numeric" readonly value="0"></td>
            </tr>
            <tr id="row10">
                <td class="width200">Total  Payment:</td>
                <td class="padLeft100"><input type="text" class="numeric" name="total_monthly_installment[]" id="total_monthly_installment_1" readonly value="0"></td>
            </tr>
            </tbody>
        </table>
            @endif
    </div>
        </div>
    </div>
            <button type="submit" class="btn btn-primary mt-4">Allocate Property</button>
          {{Form::close()}}
        </div>
  @endsection
  @section('script')
    <script>
      $(document).ready(function(){
          $( "#installment_table").delegate( "tr td input", "change", function() {
              calculateTotalFirstRent($(this).closest('td').index());
            });

          function generateInstNumber() {
              let count = 1;
              let set = '';
              $(".inst").each(function() {

                  switch (count) {
                      case 1:
                          set = 'st Installment';
                          break;
                          case 2:
                          set = 'nd Installment';
                          break;
                          case 3:
                          set = 'rd Installment';
                          break;
                          default :
                          set = 'th Installment';
                          break;
                  }

                  $(this).html(count+set);
                  count++;
              });

          }


 $("#installments,#rent_amount").on('change',function(e){
     $(".dyn").remove();
     let tr_count = parseInt($("#installment_table").find('tr:eq(2)').find('td').length);
     let installments= $("#installments").val();
     let rent_amount= $("#rent_amount").val();
     let amtPer =  rent_amount/installments;
              for(let i=1;i<installments;i++)
              {
                  let municipality_fees = (amtPer*4)/100;
                  console.log(municipality_fees);
                  let total_rent = amtPer + municipality_fees;
                  $("#row2").append(`<td class="inst dyn"></td>`);
                  $("#row3").append(`<td class="dyn"></td>`);
                  $("#row4").append(`<td class="dyn"><input type="text" name="municipality_fees[]" id="municipality_fees_${tr_count}" value="${municipality_fees}"></td>`);
                  $("#row5").append(`<td class="dyn"><input type="text" name='brokerage[]' id="brokerage_${tr_count}" value="0"></td>`);
                  $("#row6").append(`<td class="dyn"><input type="text" name="contract[]" id="contract_${tr_count}" value="0"></td>`);
                  $("#row7").append("<td class='dyn'></td>");
                  $("#row8").append("<td class='dyn'></td>");
                  $("#row9").append(`<td class="dyn"><input type="text" id="monthly_installment_${tr_count}" name="monthly_installment[]" value="${amtPer}" readonly></td>`);
                  $("#row10").append(`<td class="dyn"><input type="text" id="total_monthly_installment_${tr_count}" name="total_monthly_installment[]" value="${total_rent}"></td>`);
                  tr_count++;
              }
     generateInstNumber();
     calculateTotalFirstRent(1);
          });

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
         $("#rent_amount").on('change',function(){
           let amount = $("#rent_amount").val()*4/100;
           $("#municipality_fees").attr('readonly',true).val(amount);
         });

         function calculateTotalFirstRent(i)
         {
             let rent_amount = ($("#rent_amount"))?$("#rent_amount").val():0;
             if(!rent_amount)
             {
                 toast('error','please enter rent amount','top-right');
                 $("#rent_amount").focus();
                 return false;
             }
             let installment = parseFloat($("#installments").val());
             if(!installment)
             {
                 toast('error','please enter number of installments','top-right');
                 $("#installments").focus();
                 return false;
             }
             let monthly_rent = parseFloat(rent_amount)/installment;
             let security_deposit = ($(`#security_deposit_${i}`).val())?$(`#security_deposit_${i}`).val():0;
             let municipality_fees = (monthly_rent*4)/100;
             let brokerage = ($(`#brokerage_${i}`).val())?$(`#brokerage_${i}`).val():0;
             let contract = ($(`#contract_${i}`).val())?$(`#contract_${i}`).val():0;
             let sewa_deposit = ($(`#sewa_deposit_${i}`).val())?$(`#sewa_deposit_${i}`).val():0;
             let remote_deposit = ($(`#remote_deposit_${i}`).val())?$(`#remote_deposit_${i}`).val():0;
             let total = parseFloat(monthly_rent) + parseFloat(security_deposit) + parseFloat(municipality_fees) + parseFloat(brokerage) + parseFloat(contract) + parseFloat(sewa_deposit) + parseFloat(remote_deposit);
             $(`#monthly_installment_${i}`).val(monthly_rent);
             $(`#total_monthly_installment_${i}`).val(total);
             $(`#municipality_fees_${i}`).val(municipality_fees);
         }

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
         };

        let base_url = $('meta[name="base-url"]').attr('content');
        $('#add_data_form').submit(function(event){
         event.preventDefault();
          let base_url = $('meta[name="base-url"]').attr('content');
          let params   = $("#add_data_form").serialize();
          let url      = '{{route('allot.property')}}';
          function fn_success(result)
          {
              toast('success', result.message, 'bottom-right');
              window.location.href = result.next_url;

          };
          function fn_error(result)
          {
                if(result.response=='validation_error')
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
      });
    </script>
  @endsection
