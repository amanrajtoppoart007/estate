@extends('admin.layout.app')
@section('head')
    <link rel="stylesheet" href="{{asset('plugin/datetimepicker/css/gijgo.min.css')}}">
@endsection
@include("admin.include.breadcrumb",["page_title"=>"Edit Rent BreakDown"])
 @section('content')
<div class="submit_form color-secondary icon_primary p-5 bg-white">
    {{Form::open(['id'=>'edit_data_form','autocomplete'=>'off'])}}
    <input type="hidden" name="rent_enquiry_id" value="{{$enquiry->id}}">
    <input type="hidden" name="tenant_id" value="{{$enquiry->tenant_id}}">
    <input type="hidden" name="rent_breakdown_id" value="{{$enquiry->rent_breakdown->id}}">
            <div class="card">
                <div class="card-header bg-gradient-cyan">
                   <h6> <strong>Property Allocation Detail</strong> </h6>
                </div>
                <div class="card-body">
              <div class="row">
              <div class="col-12 col-sm-4 col-md-4 col-lg-4 col-xl-4">
                <div class="form-group">
                  <label for="city_id">City</label>
                  <select class="form-control" name="city_id" id="city_id">
                      <option value="">Select City</option>
                      @foreach($cities as $city)
                          @php $selected = ($enquiry->rent_breakdown->city_id)?"selected":null;  @endphp
                        <option value="{{$city->id}}" {{$selected}}>{{$city->name}}</option>
                      @endforeach
                  </select>
                </div>
              </div>
                  <div class="col-12 col-sm-4 col-md-4 col-lg-4 col-xl-4">
                  <div class="form-group">
                  <label for="property_id">Building Name</label>
                  <select class="form-control" name="property_id" id="property_id">
                      <option value="">Select Building</option>
                      @foreach($properties as $prop)
                            @php $selected = ($prop->id==$enquiry->rent_breakdown->property_id)?"selected":null;  @endphp
                            <option value="{{$prop->id}}" {{$selected}}>{{$prop->title}}</option>
                       @endforeach

                  </select>
                </div>
              </div>
                  <div class="col-12 col-sm-4 col-md-4 col-lg-4 col-xl-4">
                      <div class="form-group">
                          <label for="unit_id">Flat No.</label>
                          <select class="form-control" name="unit_id" id="unit_id">
                              <option value="">Select Unit</option>
                              @foreach($property_units as $unit)
                                  @php $selected = ($unit->id == $enquiry->rent_breakdown->unit_id)?"selected":null;  @endphp
                                  <option value="{{$unit->id}}" {{$selected}}>{{$unit->flat_number}}</option>
                              @endforeach
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
                <h6> <strong>Rent BreakDown</strong> </h6>
              </div>
              <div class="card-body">
                <div class="row">
                  <div class="col-md-3">
                  <div class="form-group">
                    <label for="rent_period_type">Rent Period</label>
                    <select  class="form-control" name="rent_period_type" id="rent_period_type">
                       <option value="">Select</option>
                       @php $period_types = rent_period_types();@endphp
                        @foreach($period_types as $key=>$value)
                            @php $selected = ($key==$enquiry->rent_breakdown->rent_period_type)?"selected":null; @endphp
                            <option value="{{$key}}" {{$selected}}>{{$value}}</option>
                        @endforeach
                    </select>
                  </div>
                </div>
                <div class="col-md-3">
                  <div class="form-group">
                    <label for="rent_period">NO.Of <i id="rent_period_text"></i> </label>
                    <input type="text" class="form-control numeric" name="rent_period" id="rent_period" value="{{$enquiry->rent_breakdown->rent_period}}">
                  </div>
                </div>

                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="parking">Parking <i id="parking"></i> </label>
                            <select class="form-control" name="parking" id="parking">
                                <option value="yes" {{$enquiry->rent_breakdown->parking=='yes'?'selected':null}}>Yes</option>
                                <option value="no" {{$enquiry->rent_breakdown->parking=='no'?'selected':null}}>No</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="parking_number">Parking number <i id="rent_period_text"></i> </label>
                            <input type="text" class="form-control numeric" name="parking_number" id="parking_number"
                                   value="{{$enquiry->rent_breakdown->parking=='yes'?((!empty($enquiry->rent_breakdown->parking_number))?$enquiry->rent_breakdown->parking_number:null):null}}">
                        </div>
                    </div>

                <div class="col-md-3">
                  <div class="form-group">
                    <label for="lease_start">Lease Start Date</label>
                    <input type="text" class="form-control" name="lease_start" id="lease_start" value="{{(!empty($enquiry->rent_breakdown->lease_start_date)) ? date('d-m-Y',strtotime($enquiry->rent_breakdown->lease_start_date)) :null }}">
                  </div>
                </div>
                <div class="col-md-3">
                  <div class="form-group">
                    <label for="lease_end">Lease End Date</label>
                    <input type="text" class="form-control" name="lease_end" id="lease_end" value="{{(!empty($enquiry->rent_breakdown->lease_end_date)) ? date('d-m-Y',strtotime($enquiry->rent_breakdown->lease_end_date)) :null }}">
                  </div>
                </div>
                <div class="col-md-3">
                  <div class="form-group">
                    <label for="rent_amount">Total Rent Amount</label>
                    <input type="text" class="form-control" name="rent_amount" id="rent_amount" value="{{$enquiry->rent_breakdown->rent_amount}}">
                  </div>
                </div>
                <div class="col-md-3">
                  <div class="form-group">
                    <label for="installments">Installments</label>
                    <input type="text" class="form-control" name="installments" id="installments" value="{{$enquiry->rent_breakdown->installments}}">
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
    <div class="col-md-12" style="overflow-x: scroll;">
        <table class="table table-bordered" id="installment_table">
            <tbody>
              @php $breakdown_items = get_breakdown_items($enquiry->rent_breakdown->rent_break_down_items); @endphp
              @if(!empty($breakdown_items))
                  @php $i=1 @endphp
                  @foreach($breakdown_items as  $item_key=>$item_values)
                      <tr id="row{{$i}}">
                          <th>{{snake_case_string_to_word(get_breakdown_item_title($item_key))}}</th>
                          @foreach($item_values as $key=>$value)
                              <td>
                                  <input type="text" class="form-control numeric" name="{{$item_key}}[]" value="{{$value}}">
                              </td>
                          @endforeach
                      </tr>
                      @php $i++ @endphp
                  @endforeach
              @endif
              </tbody>
        </table>
    </div>
        </div>
       </div>
    </div>
            <div class="form-group">
                <input type="hidden" id="next_action_input" name="next_action" value="">
                <button type="submit" id="preview" class="btn btn-primary submit_breakdown_button">Preview</button>
                <button type="submit" id="print_breakdown" class="btn btn-info submit_breakdown_button">Print BreakDown</button>
                <button type="submit" id="send_breakdown_via_email" class="btn btn-warning text-white submit_breakdown_button">Send BreakDown By E-mail</button>
            </div>
          {{Form::close()}}
        </div>
  @endsection
  @section('js')
  <script src="{{asset('plugin/datetimepicker/js/gijgo.min.js')}}"></script>
  @endsection
  @section('script')
    <script>
      $(document).ready(function(){

          $(document).on("click",".submit_breakdown_button",function(){
              $("#next_action_input").val($(this).attr("id"));
          })
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
                  $("#row4").append(`<td class="dyn"><input class="form-control" type="text" name="municipality_fees[]" id="municipality_fees_${tr_count}" value="${municipality_fees}"></td>`);
                  $("#row5").append(`<td class="dyn"><input class="form-control" type="text" name='brokerage[]' id="brokerage_${tr_count}" value="0"></td>`);
                  $("#row6").append(`<td class="dyn"><input class="form-control" type="text" name="contract[]" id="contract_${tr_count}" value="0"></td>`);
                  $("#row7").append("<td class='dyn'></td>");
                  $("#row8").append("<td class='dyn'></td>");
                  $("#row9").append(`<td class="dyn"><input class="form-control" type="text" id="monthly_installment_${tr_count}" name="monthly_installment[]" value="${amtPer}" readonly></td>`);
                  $("#row10").append(`<td class="dyn"><input class="form-control" type="text" id="total_monthly_installment_${tr_count}" name="total_monthly_installment[]" value="${total_rent}"></td>`);
                  tr_count++;
              }
     generateInstNumber();
     calculateTotalFirstRent(1);
          });
function rent_period_type_text(rent_period_type)
{
    let rent_period_text;
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
              return rent_period_text;
}
        $("#rent_period_type").on('change',function(){
              let rent_period_type = $(this).val();
              $("#rent_period_text").text(rent_period_type_text(rent_period_type));
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
                }
                function fn_error(result)
                {
                  toast('error',result.message,'bottom-right');
                }
                $.fn_ajax(url,params,fn_success,fn_error);
         }


        $('#edit_data_form').on("submit",function(event){
         event.preventDefault();
          let params   = $("#edit_data_form").serialize();
          let url      = "{{route('update.rent.breakdown')}}";
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
        $("#rent_period_text").text(rent_period_type_text('{{$enquiry->rent_breakdown->rent_period_type}}'));

      });
    </script>
  @endsection
