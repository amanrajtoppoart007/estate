@extends('admin.layout.app')
@section('head')
<link rel="stylesheet" href="{{asset('plugin/datetimepicker/css/gijgo.min.css')}}">
@endsection
@section('js')
<script src="{{asset('plugin/datetimepicker/js/gijgo.min.js')}}"></script>
@endsection
@include("admin.include.breadcrumb",["page_title"=>"Rent BreakDown"])
@section('content')
<div class="submit_form color-secondery icon_primary p-5 bg-white">
   @php
   $tempdata = array();
   @endphp
   @if(count($breakdown_template)>0)
   @php
   $tempdata = json_decode($breakdown_template[0]->form_data);

   @endphp
   @endif
   @if(count($breakdown)>0)


   <div class="card">
      <div class="card-header">
         <h6> <i class="fa fa-envelope-open"  aria-hidden="true"></i> <strong>Already Sent Breakdowns</strong> <i class="fa fa-question-circle text-muted" title="Breakdown of renewal already sent to this tenant." aria-hidden="true"></i></h6>
      </div>
      <div class="card-body table-responsive">
         <table class="table border-0 border-th-td-none">
            <tr>
               <th>Sent by</th>
               <th>Time</th>
               <th>Email Status<i class="fa fa-question-circle text-muted" title="Breakdown email received by tenant confirmation" aria-hidden="true"></i></th>
               <th>View</th>
            </tr>
            <tbody>
               @foreach($breakdown as $olddata)
               <tr>
                  <td>{{$olddata->admin_id}}</td>
                  <td>{{$olddata->created_at}}</td>
                  <td>{{$olddata->email_delivered}}</td>
                  <td><a href="{{url()->current()}}?template={{$olddata->id}}" class="btn btn-success">View Breakdown</a></td>
               </tr>
               @endforeach
            </tbody>
         </table>
      </div>
   </div>
   @endif

   {{Form::open(['route'=>'tenancy.renewal.post','id'=>'add_data_form','method'=>'post'])}}
   <input type="hidden" name="property_unit_type_id" value="{{$current->property_unit_type_id}}">

   <input type="hidden" name="unit_id" value="{{$current->unit_id}}">
   <input type="hidden" name="property_id" value="{{$current->property_id}}">

   <input type="hidden" name="tenant_id" value="{{$tenant->id}}">
   <div class="card">
      <div class="card-header">
         <h6> <strong>Tenant Detail</strong> </h6>
      </div>
      <div class="card-body table-responsive">
         <table class="table border-0 border-th-td-none">
            <tbody>
               <tr>
                  <th>Name</th>
                  <td>{{$tenant->name}}
                     <input type="hidden" name="name" value="{{$tenant->name}}">
                     <input type="hidden" name="allotment" value="{{$current->id}}">
                  </td>
                  <th>Tenancy Type</th>
                  <td>{{($tenant->tenant_type)?ucwords(str_replace("_"," ",$tenant->tenant_type)):''}}
                     <input type="hidden" name="tenancy_type" value="{{($tenant->tenant_type)?ucwords(str_replace("_"," ",$tenant->tenant_type)):''}}">
                  </td>
                  <th>Number Of Tenants</th>
                  <td> <input type="hidden" name="no_tenant" value="{{($tenant->profile->tenant_count)?($tenant->profile->tenant_count):'0'}}">
                     {{($tenant->profile->tenant_count)?($tenant->profile->tenant_count):'0'}}
                  </td>
               </tr>
               <tr>
                  <th>Mobile Number</th>
                  <td>{{$tenant->mobile}}
                     <input type="hidden" name="mobile" value="{{$tenant->mobile}}">
                  </td>
                  <th>Email-Id</th>
                  <td>{{$tenant->email}}
                     <input type="hidden" name="mobile" value="{{$tenant->email}}">
                  </td>
                  <th></th>
                  <td></td>
               </tr>
            </tbody>
         </table>
      </div>
   </div>
   <div class="card">
      <div class="card-header">
         <h6> <strong>Property Details</strong> </h6>
      </div>
      <div class="card-body">
         <div class="row">
            <div class="col">
               <div class="form-group">
                  <label for="state_id">Property :</label>
                  {{$current->property['propcode']}}, {{$current->property['title']}}
                  <input type="hidden" name="property" value="{{$current->property['propcode']}}, {{$current->property['title']}}">
                  <input type="hidden" name="property_id" value="{{$current->property['id']}}">

               </div>
               <div class="form-group">
                  <label for="city_id">Unit :</label>
                  <input type="hidden" name="unit" value="{{$current->property_unit['unitcode']}}@if($current->property_unit!='')({{$current->property_unit->propertyUnitType['title']}})@endif">
                  {{$current->property_unit['unitcode']}}
                  @if($current->property_unit!='')
                   <input type="hidden" name="property_unit_type_id" value="{{$current->property_unit->propertyUnitType['id']}}">
                   <input type="hidden" name="unit_id" value="{{$current->property_unit->id}}">
                  ({{$current->property_unit->propertyUnitType['title']}})
                  @endif
               </div>
               <div class="form-group">
                  <label for="city_id">City :</label>
                  {{$current->property->city['name']}}
                  <input type="hidden" name="city" value="{{$current->property->city['name']}}">
               </div>
               <div class="form-group">
                  <label for="city_id">State :</label>
                  {{$current->property->city['name']}},
                  {{$current->property->city['state_name']}}
                  <input type="hidden" name="state" value="{{$current->property->city['name']}},{{$current->property->city['state_name']}}">


               </div>
            </div>
            <div class="col">
            </div>
         </div>
      </div>
   </div>
   <div class="card">
      <div class="card-header">
         <h6> <strong>Rent Detail</strong> </h6>
      </div>
      <div class="card-body">
         <div class="row">
            <div class="col-md-3">
               <div class="form-group">
                  <label for="rent_period_type">Rent Period</label>
                  <select  class="form-control" name="rent_period_type" id="rent_period_type">
                     <option value="">Select</option>
                     <option value="daily" @if(count($breakdown_template) && $tempdata->rent_period_type == 'daily') selected @endif>DAILY</option>
                     <option value="weekly" @if(count($breakdown_template) && $tempdata->rent_period_type == 'weekly') selected @endif>WEEKLY</option>
                     <option value="monthly" @if(count($breakdown_template) && $tempdata->rent_period_type == 'monthly') selected @endif>MONTHLY</option>
                     <option value="half_yearly" @if(count($breakdown_template) && $tempdata->rent_period_type == 'half_yearly') selected @endif>HALF YEARLY</option>
                     <option value="yearly" @if(count($breakdown_template) && $tempdata->rent_period_type == 'yearly') selected @endif>YEARLY</option>
                  </select>
               </div>
            </div>
            <div class="col-md-3">
               <div class="form-group">
                  <label for="rent_period">NO.Of <i id="rent_period_text"></i> </label>
                  <input type="text" class="form-control numeric" name="rent_period" id="rent_period" value="@if(count($breakdown_template)){{$tempdata->rent_period}}@endif">
               </div>
            </div>
            <div class="col-md-3">
               <div class="form-group">
                  <label for="lease_start">Lease Start Date</label>
                  <input type="text" class="form-control" name="lease_start" id="lease_start" value="@if(count($breakdown_template)){{$tempdata->lease_start}}@endif">
               </div>
            </div>
            <div class="col-md-3">
               <div class="form-group">
                  <label for="lease_end">Lease End Date</label>
                  <input type="text" class="form-control" name="lease_end" id="lease_end" value="@if(count($breakdown_template)){{$tempdata->lease_end}}@endif">
               </div>
            </div>
         </div>
         <div class="row">
            <div class="col-md-3">
               <div class="form-group">
                  <label for="rent_amount">Rent Amount</label>
                  <input type="text" class="form-control" name="rent_amount" id="rent_amount" value="@if(count($breakdown_template)){{$tempdata->rent_amount}}@endif">
               </div>
            </div>
            <div class="col-md-3">
               <div class="form-group">
                  <label for="installments">Installments</label>
                  <input type="text" class="form-control" name="installments" id="installments" value="@if(count($breakdown_template)){{$tempdata->installments}}@endif">
               </div>
            </div>
         </div>

      </div>
   </div>
   <div class="card card-body">
      <div class="row">
         <div class="col-md-4">
            <div class="form-group">
               <label for="security_deposit"> Parking</label>
            </div>
         </div>
         <div class="col-md-4">
            <div class="form-group">
               <label for="monthly_installment"> <input type="radio" name="parking" value="0"> No Parking</label>
            </div>
         </div>
         <div class="col-md-4">
            <div class="form-group">
               <label for="municipality_fees"> <input type="radio" name="parking" value="1"> With Parking</label>
            </div>
         </div>
      </div>
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
                  <td class="width200">Security Deposite</td>
                  <td class="padLeft100">
                      <input type="text" class="numeric" name="security_deposit[]" id="security_deposit_1" value="0" >
                  </td>

               </tr>
               <tr id="row4">
                  <td class="width200">Municipality Fees (2% From rent value)</td>
                  <td class="padLeft100">
                      <input type="text" class="numeric" name="municipality_fees[]" id="municipality_fees_1" value="0">
                  </td>
                   @if(count($breakdown_template)>0)
                       @if(count($tempdata->municipality_fees)>0)
                           @foreach($tempdata->municipality_fees as $val)
                               <td class="padLeft100">
                                   <input type="text" class="numeric" name="municipality_fees[]"  value="{{$val}}">
                               </td>
                           @endforeach
                       @endif
                   @endif
               </tr>
               <tr id="row5">
                  <td class="width200">Office Commission</td>
                  <td class="padLeft100">
                      <input type="text" class="numeric" name="brokerage[]" id="brokerage_1" value="0">
                  </td>

                   @if(count($breakdown_template)>0)
                       @if(count($tempdata->brokerage)>0)
                           @foreach($tempdata->brokerage as $val)
                               <td class="padLeft100">
                                   <input type="text" class="numeric" name="brokerage[]" id="brokerage_1" value="{{$val}}">

                               </td>
                           @endforeach
                       @endif
                   @endif
               </tr>
               <tr id="row6">
                  <td class="width200">Contract</td>
                  <td class="padLeft100">
                     <input type="text" class="numeric" name="contract[]" id="contract_1" value="0">
                  </td>
                   @if(count($breakdown_template)>0)
                       @if(count($tempdata->contract)>0)
                           @foreach($tempdata->contract as $val)
                               <td class="padLeft100">
                                   <input type="text" class="numeric" name="contract[]"  value="{{$val}}">


                               </td>
                           @endforeach
                       @endif
                   @endif
               </tr>
               <tr id="row7">
                  <td class="width200">Remote Deposite:</td>
                  <td class="padLeft100"><input type="text" class="numeric" name="remote_deposit[]" id="remote_deposit_1" value="0"></td>
               </tr>
               <tr id="row8">
                  <td class="width200">SEWA DEPOSITE:</td>
                  <td class="padLeft100"><input type="text" class="numeric" name="sewa_deposit[]" id="sewa_deposit_1" value="0"></td>
               </tr>
               <tr id="row9">
                  <td class="width200">MONTHLY INSTALLMENT:</td>
                  <td class="padLeft100">
                      <input type="text" name="monthly_installment[]" id="monthly_installment_1" class="numeric" readonly value="0"></td>
                   @if(count($breakdown_template)>0)
                       @if(count($tempdata->monthly_installment)>0)
                           @foreach($tempdata->monthly_installment as $val)
                               <td class="padLeft100">

                                   <input type="text" name="monthly_installment[]" class="numeric" readonly value="{{$val}}">

                               </td>
                           @endforeach
                       @endif
                   @endif

               </tr>
               <tr id="row10">
                  <td class="width200">TOTAL  PAYMENT:</td>


                   @if(count($breakdown_template)>0)
                       @if(count($tempdata->total_monthly_installment)>0)
                           @php $tm = '1'; @endphp
                           @foreach($tempdata->total_monthly_installment as $val)
                               <td class="padLeft100">
                                   <input type="text" class="numeric" name="total_monthly_installment[]" @if($tm=='1') id="total_monthly_installment_1" @endif  readonly value="{{$val}}">


                               </td>
                               @php $tm++; @endphp
                           @endforeach
                       @endif

                   @else
                       <td class="padLeft100">
                           <input type="text" class="numeric" name="total_monthly_installment[]" id="total_monthly_installment_1" readonly value="0">
                       </td>
                   @endif
               </tr>
            </table>
         </div>
      </div>
   </div>
   <button type="submit" class="btn btn-primary mt-4"><i class="fa fa-paper-plane"></i> Send Breakdown</button>
   <button type="button" class="btn btn-success mt-4 renew_tenancy_btn"><i class="fa fa-retweet"></i> Renew Tenancy</button>
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
                       set = 'st';
                       break;
                       case 2:
                       set = 'nd';
                       break;
                       case 3:
                       set = 'rd';
                       break;
                       default :
                       set = 'th';
                       break;
               }

               $(this).html(count+set);
               count++;
           });

       }
   // send contract renewal data function
       var  viewpdfroute = "{{route('renewal.breakdown.pdf',['breakdown'=>'123'])}}";
       var viewbreakdownPdf = viewpdfroute.slice(0,-3);
   $('#add_data_form').submit(function(event){
      event.preventDefault();
       var base_url = $('meta[name="base-url"]').attr('content');
       var params   = $("#add_data_form").serialize();
       var url      = '{{route("tenancy.breakdown.save.send")}}';
       function fn_success(result)
       {
           toast('success', result.message, 'bottom-right');
           window.location.href = viewbreakdownPdf+result.breakdown;

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

   $(document).on('click','.renew_tenancy_btn',function(event){
      event.preventDefault();
       var base_url = $('meta[name="base-url"]').attr('content');
       var params   = $("#add_data_form").serialize();
       var url      = '{{route("tenancy.renewal.post")}}';
       function fn_success(result)
       {
           toast('success', result.message, 'bottom-right');

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

   $("#installments,#rent_amount").on('change',function(e){
   $(".dyn").remove();
   let tr_count = parseInt($("#installment_table").find('tr:eq(2)').find('td').length);
   let installments= $("#installments").val();
   let rent_amount= $("#rent_amount").val();
   let amtPer =  rent_amount/installments;
           for(i=1;i<installments;i++)
           {
               $("#row2").append("<td class='inst dyn'></td>");
               $("#row3").append(`<td class="dyn"></td>`);
               $("#row4").append(`<td class="dyn"><input type="text" name="municipality_fees[]" id="municipality_fees_${tr_count}" value="0"></td>`);
               $("#row5").append(`<td class="dyn"><input type="text" name='brokerage[]' id="brokerage_${tr_count}" value="0"></td>`);
               $("#row6").append(`<td class="dyn"><input type="text" name="contract[]" id="contract_${tr_count}" value="0"></td>`);
               $("#row7").append("<td class='dyn'></td>");
               $("#row8").append("<td class='dyn'></td>");
               $("#row9").append(`<td class="dyn"><input type="text" id="monthly_installment_${tr_count}" name="monthly_installment[]" value="${amtPer}" readonly></td>`);
               $("#row10").append(`<td class="dyn"><input type="text" id="total_monthly_installment_${tr_count}" name="total_monthly_installment[]" value="${amtPer}"></td>`);
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
             case 'daily':
                rent_period_text = 'Days';
               break;
             case 'weekly':
                rent_period_text = 'Week';
               break;
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
          let municipality_fees = ($(`#municipality_fees_${i}`).val())?$(`#municipality_fees_${i}`).val():0;
          let brokerage = ($(`#brokerage_${i}`).val())?$(`#brokerage_${i}`).val():0;
          let contract = ($(`#contract_${i}`).val())?$(`#contract_${i}`).val():0;
          let sewa_deposit = ($(`#sewa_deposit_${i}`).val())?$(`#sewa_deposit_${i}`).val():0;
          let remote_deposit = ($(`#remote_deposit_${i}`).val())?$(`#remote_deposit_${i}`).val():0;
          let total = parseFloat(monthly_rent) + parseFloat(security_deposit) + parseFloat(municipality_fees) + parseFloat(brokerage) + parseFloat(contract) + parseFloat(sewa_deposit) + parseFloat(remote_deposit);
          $(`#monthly_installment_${i}`).val(monthly_rent);
          $(`#total_monthly_installment_${i}`).val(total);
      };

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
   });
</script>
@endsection
