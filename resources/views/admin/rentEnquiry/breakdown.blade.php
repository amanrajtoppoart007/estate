@extends('admin.layout.app')
@section('head')
    <link rel="stylesheet" href="{{asset('plugin/datetimepicker/css/gijgo.min.css')}}">
@endsection
@include("admin.include.breadcrumb",["page_title"=>"Rent BreakDown"])
 @section('content')
<div class="submit_form color-secondery icon_primary p-5 bg-white">
    {{Form::open(['id'=>'add_data_form'])}}
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
                          @php $selected = ($property_unit->property->id==$prop->id)?"selected":"";  @endphp
                            <option value="{{$prop->id}}" {{$selected}}>{{$prop->title}}</option>
                       @endforeach
                      @endif
                  </select>
                </div>
              </div>
                  <div class="col-12 col-sm-4 col-md-4 col-lg-4 col-xl-4">
                      <div class="form-group">
                          <label for="unit_id">Property Unit</label>
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
                               <td>{{get_tenancy_type($enquiry->tenancy_type)}}</td>
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
                       <option value="monthly">MONTHLY</option>
                       <option value="half_yearly">HALF YEARLY</option>
                       <option value="yearly">YEARLY</option>
                    </select>
                  </div>
                </div>
                <div class="col-md-3">
                  <div class="form-group">
                    <label for="rent_period">NO.Of <i id="rent_period_text"></i> </label>
                    <input type="text" class="form-control numeric" name="rent_period" id="rent_period" value="">
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
        <table id="installment_table" class="mb-5">
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
        </table>
    </div>
        </div>
       </div>
    </div>
            <div class="form-group">
                <button type="button" class="btn btn-success">Create Tenant</button>
                <button type="submit" class="btn btn-primary">Preview</button>
                <button type="button" class="btn btn-info">Print BreakDown</button>
                <button type="button" class="btn btn-warning text-white">Send BreakDown By E-mail</button>
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


        $('#add_data_form').on("submit",function(event){
         event.preventDefault();
          let params   = $("#add_data_form").serialize();
          let url      = "{{route('save.rent.breakdown')}}";
          function fn_success(result)
          {
              toast('success', result.message, 'bottom-right');
              window.location.href = result.next_url;

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

      });
    </script>
  @endsection
