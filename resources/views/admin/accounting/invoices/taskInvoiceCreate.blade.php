@extends('admin.layout.app')
@section('head')
<link rel="stylesheet" href="{{asset('plugin/datetimepicker/css/gijgo.min.css')}}">
@endsection
@section('js')
<script src="{{asset('plugin/print/printThis.js')}}"></script>
@endsection
@section('breadcrumb')
  <div class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h1 class="m-0 text-dark">Task to invoice</h1>
            </div>
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}">Home</a></li>
                <li class="breadcrumb-item active">Task Invoice</li>
              </ol>
            </div>
          </div>
        </div>
      </div>
  @endsection	
@section('content')

       
      
        <div class="card">
            <div class="card-header"> <h6> <strong>Create invoice from task</strong> </h6> </div>
            <div class="card-body table-responsive">
              <form id="rentInvoiceform">
                <div class="row">
                    <div class="col-md-4"><b>Inovice: {{$invoice_no}}</b>
                    <input type="hidden" name="invoice" value="{{$invoice_no}}">
                   
                    <input type="hidden" name="installment_id" value="-">
                    </div>
                    <div class="col-md-3"><b>Party: XXXXXX</b>
                    <input type="hidden" name="party" value="{{$assigned->assignee_id}}">
                    <input type="hidden" name="party_type" value="{{$assigned->assignee_type}}">
                    </div>
                    <div class="col-md-3">
                      
                      <label>Reference</label>&nbsp;
                      <input type="text" autocomplete="off" name="reference" class="form-control">
                  
                    </div>
                    <div class="col-md-2">
               
                      <label>Expected Date</label>&nbsp;
                      <input type="text" id="expected" class="form-control" name="expected" >
                      
                    </div>
                </div>
                
                <table class="table border">
                    <thead>
                        <tr>
                            <th>Item</th>
                            <th>Property</th>
                            <th>Amount</th>
                            
                        </tr>
                    </thead>
                    <tbody>
                     <tr>
                         <td>{{$item->name}}
                          <input type="hidden" name="item" value="{{$item->id}}"> 
                        </td>
                         <td>
                            Unit - {{$task->property_unit->unitcode}} 
                            (Property - {{$task->property_unit->property->propcode}})
                           <input type="hidden" name="property" value="{{$task->property_id}}">
                           <input type="hidden" name="unit" value="{{$task->property_unit_id}}">
                           <input type="hidden" name="task_id" value="{{$task->id}}">
                           
                           
                           </td>
                         <td>
                           <input type="text" autocomplete="off" class="form-control numeric amount" required name="amount" value="">
                        </td>
                    </tr> 
                    <tr>
                        <td colspan="2" class="text-right">Total</td>
                        <td>
                            <strong id="total_amount_text"></strong>
                        <input type="hidden" id="total_amount" name="total_amount"  readonly>
                        </td>
                    </tr>
                    </tbody>
                </table>
                 <div class="row mt-5">
                     <div class="col-md-8">
                      <textarea class="form-control" name="remark"></textarea>
                     </div>
                    <div class="col-md-4 ">
                        <button type="submit" class="btn btn-success float-right">Save & Send</button></div>
                </div>
                </form>
            </div>
        </div>
        
     
      
     
       
@endsection
@section('script')
@section('modal')

@endsection
 <script src="{{asset('plugin/datetimepicker/js/gijgo.min.js')}}"></script>
 <script>
   
   var insertinvoice = "{{route('store.task.invoice')}}";
   var viewInvoiceRoute    = "{{route('acc.invoice.view',['invoice'=>'123'])}}";
var viewInvoice = viewInvoiceRoute.slice(0,-3);
      $(document).ready(function(){

 $('#expected').datepicker({ footer: true, modal: true,format: 'dd-mm-yyyy',
            minDate : '{{date("d-m-Y")}}'           
         });
          $(".amount").keyup(function() {
              $(".amount").each(function() {
             
                $("#total_amount_text").html($(this).val());
                $("#total_amount").val($(this).val());
                });
          })
   $(document).on('submit', '#rentInvoiceform', function(e) {  
   jQuery.ajaxSetup({
                  headers: {
                      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                  }
              });
    var formData = new FormData($(this)[0]);

    $.ajax({
        url: insertinvoice,
        type: 'POST',
        dataType: 'json',
        data: formData,
        cache : false,
        processData: false,
        contentType: false,
        success: function(result)
        {
          //console.log(result);
          if(result.status=='1'){
            alert(result.msg);
            viewInvoice
             window.location.replace(viewInvoice+result.invoice);
           setTimeout(function(){ location.reload(); }, 1000);
             
          }else{
            toast('error',result.msg,'top-center');
          }
        },
        error: function(result)
        {
            console.log(result);
        }
    });
        console.log(formData);
 event.preventDefault();
});
        
          
      })
 </script>
@endsection