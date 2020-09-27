@extends('admin.layout.app')
@section('js')
<script src="{{asset('plugin/print/printThis.js')}}"></script>
@endsection
@section('breadcrumb')
  <div class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h1 class="m-0 text-dark">Allotted Property</h1>
            </div>
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}">Home</a></li>
                <li class="breadcrumb-item active">Allotted Property</li>
              </ol>
            </div>
          </div>
        </div>
      </div>
  @endsection
@section('content')
<div class="card card-olive card-outline">
    <div class="card-body">
        <div class="row mb-2">
    <div class="col-md-2"><button id="printBtn" class="btn btn-primary"> <i class="fa fa-print"></i></button></div>
    <div class="col-md-6"></div>
    <div class="col-md-4 "><button class="btn  btn-danger float-right" data-toggle="modal" data-target="#modal_evict">Evict</button> <button data-toggle="modal" data-target="#modal_Move" class="btn btn-warning mr-2 text-white float-right">Move Out</button></div>
</div>

      <div id="print_this">
        <div class="card">
            <div class="card-header"> <h6> <strong>Tenant Detail</strong> </h6> </div>
            <div class="card-body table-responsive">
                <table class="table border-th-td-none">
                    <tbody>
                        <tr>
                            <th>Name </th>
                            <td>{{$allotment->tenant->name}}</td>
                            <th>Mobile</th>
                            <td>{{$allotment->tenant->mobile}}</td>
                            <th>Email</th>
                            <td>{{$allotment->tenant->email}}</td>
                            <th>Tenancy Type</th>
                            <td>{{$allotment->tenant->tenant_type}}</td>
                        </tr>
                        <tr>
                            <th>Tenancy Started At</th>
                            <td>{{$allotment->lease_start}}</td>
                            <th>Tenancy End At</th>
                            <td>{{$allotment->lease_end}}</td>
                            <th>Rent Type</th>
                            <td>{{$allotment->property_unit_type->rent_type}}</td>
                            <th></th>
                            <td></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
        <div class="card">
            <div class="card-header"> <h6> <strong>Flat Information</strong> </h6> </div>
            <div class="card-body">
                <table class="table border-th-td-none">
                    <tbody>
                        <tr>
                            <th>Property</th>
                            <td>{{$allotment->property->title}}</td>
                            <th>Unit/Flat No</th>
                            <td>{{$allotment->property_unit->unitcode}}</td>
                            <th>Rent Amount</th>
                            <td>{{$allotment->rent_amount}} AED</td>
                            <th>Payments</th>
                            <td>{{$allotment->installments}}</td>
                        </tr>
                        <tr>
                           <th>Property Type</th>
                           <td>{{$allotment->property_unit_type->title}}</td>
                           <th>Bedroom</th>
                           <td>{{$allotment->property_unit_type->bedroom}}</td>
                           <th>Bathroom</th>
                           <td>{{$allotment->property_unit_type->bathroom}}</td>
                           <th>Parking</th>
                           <td>{{$allotment->property_unit_type->parking}}</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
        <div class="card">
            <div class="card-header"> <h6> <strong>Installment Detail</strong> </h6> </div>
            <div class="card-body">
                <table class="table">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Rent Amount</th>
                            <th>Municipality Fees</th>
                            <th>Office Commission</th>
                            <th>Contract</th>
                            <th>Total</th>
                            <th>Paid Amount</th>
                            <th>Payment Date</th>
                            <th>Paid Date</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php $i=1;@endphp
                        @foreach($allotment->rent_installments as $installment)
                          <tr>
                          <td>#{{$i}}</td>
                          <td>{{$installment->amount}}</td>
                          <td>{{$installment->municipality_fees}}</td>
                          <td>{{$installment->brokerage}}</td>
                          <td>{{$installment->contract}}</td>
                          <td>{{$installment->total_amount}}</td>
                          <td>{{$installment->paid_amount}}</td>
                          <td></td>
                          <td>{{($installment->paid_date)?$installment->paid_date->format('d-m-Y'):null}}</td>

                          <td>
                              @if(empty($installment->status))
                               <a class="text-danger">UNPAID</a>
                              @else
                                <span class="text-success" href="javascript:void(0)">PAID</span>
                              @endif
                          </td>
                          <td>
                              @if(empty($installment->status))
                               <a class="btn btn-success btn-xs" href="{{route('rent.invoice.create',['id'=>base64_encode($installment->id)])}}" > Collect Payment</a>
                              @else
                               -
                              @endif
                          </td>
                          </tr>
                          @php $i++ @endphp
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
      </div>
    </div>
</div>

@endsection
@section('script')
@section('modal')
<div class="modal fade" id="modal_evict">
        <div class="modal-dialog modal-lg">
          <div class="modal-content">
            <form id="evictform">
            <div class="modal-header bg-danger">
              <h4 class="modal-title">Request for Eviction</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">

                  <label>Reason</label>
                  <textarea name="remark" class="form-control"></textarea>
                  <input type="hidden" name="tenant" value="{{$allotment->tenant->id}}">
                  <input type="hidden" name="unit" value="{{$allotment->property_unit->id}}">

            </div>
            <div class="modal-footer  justify-content-between">
              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
              <button type="submit" class="btn btn-danger">Send</button>
            </div>
             </form>
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>
      <!-- /.modal -->
<div class="modal fade" id="modal_Move">
        <div class="modal-dialog modal-lg">
          <div class="modal-content">
             <form id="moveout_form">
            <div class="modal-header bg-warning">
              <h4 class="modal-title">Request for Moveout</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">

                  <label>Reason</label>
                  <textarea name="remark" class="form-control"></textarea>
                  <input type="hidden" name="tenant" value="{{$allotment->tenant->id}}">
                  <input type="hidden" name="unit" value="{{$allotment->property_unit->id}}">

            </div>
            <div class="modal-footer  justify-content-between">
              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
              <button type="submit" class="btn btn-warning">Send</button>
            </div>
            </form>
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>
      <!-- /.modal -->
@endsection
 <script>
   var eviction_store = "{{route('store.eviction')}}";
   var moveout_store = "{{route('store.moveout')}}";
      $(document).ready(function(){

           $(document).on('submit', '#evictform', function(e) {
   jQuery.ajaxSetup({
                  headers: {
                      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                  }
              });
    var formData = new FormData($(this)[0]);

    $.ajax({
        url: eviction_store,
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
             toast('success',result.msg,'top-center');
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
   $(document).on('submit', '#moveout_form', function(e) {
   jQuery.ajaxSetup({
                  headers: {
                      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                  }
              });
    var formData = new FormData($(this)[0]);

    $.ajax({
        url: moveout_store,
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
          $("#printBtn").on('click',function(){
             $("#print_this").printThis();
          })

      })
 </script>
@endsection
