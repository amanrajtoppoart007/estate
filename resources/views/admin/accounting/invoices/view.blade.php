@extends('admin.layout.app')
@section('head')
<link rel="stylesheet" href="{{asset('DataTable/datatables.min.css')}}">
@endsection
@section('breadcrumb')
  <div class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h1 class="m-0 text-dark">Invoices View/Pay</h1>
            </div>
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}">Home</a></li>
                <li class="breadcrumb-item active">Invoice View/Pay</li>
              </ol>
            </div>
          </div>
        </div>
      </div>
  @endsection	
@section('content')

       
      
        <div class="card">
            <div class="card-header"> <h6> <strong>Invoice: {{$invoice_no}}</strong> <strong class="float-right">Party: {{$invoice[0]->party->name}}</strong></h6> 
            
            </div>
            <div class="card-body table-responsive">
              <form id="MainForm">
                <input type="hidden" name="invoice" value="{{$invoice_no}}">
              <table id="dataTables"  class="w-100 display table table-striped table-hover">
            <thead>
                <tr>
                    <th>S.No.</th>
                    <th>Item</th>
                    <th>Property</th>
                    <th>Unit Price</th>
                    <th>QTY</th>
                    <th>Amount</th>
                    </tr>
            </thead>
            <tbody>
                @php $i = '1'; $grandtotal = '0'; @endphp
                @foreach($invoice_data as $item)
                <tr>
                    <td>{{$i}}</td>
                    <td>{{$item->item->name}}</td>
                    <td>{{$item->unit->unitcode}}</td>
                    <td>{{number_format($item->unit_price,2)}}</td>
                    <td>{{$item->qty}}</td>
                    <td>{{number_format($item->amount,2)}}</td>
                </tr>

                @php $i++;  $grandtotal = $grandtotal+$item->amount; @endphp
                @endforeach
                    <tr>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td class="float-right"><b>Total</b></td>
                        <td><b>{{number_format($grandtotal,2)}}</b>
                        <input type="hidden" name="grand_total" value="{{$grandtotal}}">
                        </td>
                    </tr>

                @if(count($payment)>0)
                   <tr>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td class="float-right"><b>Payment Status: </b></td>
                        <td class="text-green">Paid</td>
                    </tr>
                    
                    @else
 <tr>
                        <td>
                          <label>Payment Mode</label>
                            <select class="form-control" name="mode" required>
                       
                        <option value="1">Cash</option>    
                        <option value="2">Check</option>    
                        <option value="3">Wire Transfer</option>    
                        </select><br>
                        <label>Bank Account</label>
                         <select class="form-control" name="account" required>

                                @foreach ($bank_acc as $acc)
                                <option value="{{$acc->id}}">{{$acc->title}}</option>
                                    
                                @endforeach
                            </select>
                    </td>
                        <td>
                          <label>Reference/Check Number</label>
                            <input type="text" autocomplete="off" class="form-control" name="ref" placeholder="Reference/check number etc">
                        <br>
                        <label>Transaction No. On bank</label>
                        <input type="text" class="form-control" autocomplete="off" placeholder="Transaction no." name="ref2">
                        </td>
                        <td colspan="2">
                           <textarea rows="6" class="form-control" placeholder="Remark/Note" name="remark"></textarea>
                        </td>
                        <td>
                            
                        </td>
                        <td><input type="submit" class="btn btn-success mt-4" value="Receive Payment"></td>
                    </tr>
                    @endif
            </tbody>
        </table></form>
            </div>
        </div>
        
     
      
     
       
@endsection
@section('script')

 <script>

var paymentStore =  "{{route('store.invoice.payment')}}";

      $(document).ready(function(){
  $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
    $(document).on('submit', '#MainForm', function(e) { 
       //swal ( "Success" , result.msg,  "success" );   
    var formData = new FormData($(this)[0]);


    $.ajax({
        url: paymentStore,
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
            
     location.reload(); 
             
          }else{
            toast('error',result.msg,'top-center');
          }
        },
        error: function(result)
        {
            console.log(result);
        }
    });
        //console.log(formData);
 event.preventDefault();
});


    });
          
  
          
   
 </script>
@endsection