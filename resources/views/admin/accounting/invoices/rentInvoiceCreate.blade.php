@extends('admin.layout.app')
@section('js')
<script src="{{asset('plugin/print/printThis.js')}}"></script>
@endsection
@section('breadcrumb')
  <div class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h1 class="m-0 text-dark">Rent Invoice</h1>
            </div>
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}">Home</a></li>
                <li class="breadcrumb-item active">Rent Invoice</li>
              </ol>
            </div>
          </div>
        </div>
      </div>
  @endsection
@section('content')



        <div class="card">
            <div class="card-header"> <h6> <strong>Create Rent Invoice</strong> </h6> </div>
            <div class="card-body table-responsive">
              <form id="rentInvoiceform">
                <div class="row">
                    <div class="col-md-4"><b>Inovice: {{$invoice_no}}</b>
                    <input type="hidden" name="invoice" value="{{$invoice_no}}">
                    <input type="hidden" name="expected" value="{{$installment->expected_date}}">
                    <input type="hidden" name="installment_id" value="{{$installment->id}}">
                    </div>
                    <div class="col-md-4"><b>Party: {{$tenant->name}}</b>
                    <input type="hidden" name="party" value="{{$tenant->tenant_id}}">
                    <input type="hidden" name="party_type" value="tenant">
                    </div>
                    <div class="col-md-4">
                      <div class="form-inline">
                      <label>Reference</label>&nbsp;
                      <input type="text" name="reference" class="form-control">
                      </div>
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
                           <input type="hidden" name="property" value="{{$installment->property_unit_allotment->property_unit->property_id}}">
                           <input type="hidden" name="unit" value="{{$installment->property_unit_allotment->property_unit->id}}">


                           {{$installment->property_unit_allotment->property_unit->unitcode}}</td>
                         <td>{{$installment->total_amount}}
                           <input type="hidden" name="amount" value="{{$installment->total_amount}}">
                        </td>
                    </tr>
                    <tr>
                        <td colspan="2" class="text-right">Total</td>
                        <td>{{$installment->total_amount}}
                        <input type="hidden" name="total_amount" value="{{$installment->total_amount}}">
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
 <script>

   var insertinvoice = "{{route('store.rent.invoice')}}";
   var viewInvoiceRoute    = "{{route('acc.invoice.view',['invoice'=>'123'])}}";
var viewInvoice = viewInvoiceRoute.slice(0,-3);
      $(document).ready(function(){


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
