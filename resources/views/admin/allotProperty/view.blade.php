@extends('admin.layout.app')
@section('js')
<script src="{{asset('plugin/print/printThis.js')}}"></script>
@endsection
@include("admin.include.breadcrumb",["page_title"=>"Allotted Property Detail"])

@section('content')

    <div class="card">
        <div class="card-header">
            <div class="row">
                <div class="col-md-2">
                    <button id="printBtn" class="btn btn-primary"><i class="fa fa-print"></i></button>
                </div>
                <div class="col-md-6"></div>
                <div class="col-md-4 ">
                    <button class="btn  btn-danger float-right" data-toggle="modal" data-target="#modal_evict">Evict
                    </button>
                    <button data-toggle="modal" data-target="#modal_Move"
                            class="btn btn-warning mr-2 text-white float-right">Move Out
                    </button>
                </div>
            </div>
        </div>
        <div class="card-body">
            <div id="printThis">
    <div class="card">
        <div class="card-header bg-gradient-dark">
            <h6>Property Detail</h6>
        </div>
        <div class="card-body">
           <div class="row">
               <div class="col-6 col-sm-6 col-md-3 col-lg-3 col-xl-3 mb-2"> <span class="font-weight-bold">Building</span></div>
               <div class="col-6 col-sm-6 col-md-3 col-lg-3 col-xl-3 mb-2">{{$breakdown['property_title'] }}</div>

           </div>
            <div class="row">
                 <div class="col-6 col-sm-6 col-md-3 col-lg-3 col-xl-3 mb-2"> <span class="font-weight-bold">Flat No.</span></div>
                <div class="col-6 col-sm-6 col-md-3 col-lg-3 col-xl-3 mb-2">{{$breakdown['flat_number']}}</div>
            </div>
        </div>
    </div>
    <div class="card">
        <div class="card-header bg-gradient-dark">
            <h6>Tenant Detail</h6>
        </div>
        <div class="card-body">
            <div class="row">
               <div class="col-6 col-sm-6 col-md-3 col-lg-3 col-xl-3 mb-2"> <span class="font-weight-bold">Name</span></div>
               <div class="col-6 col-sm-6 col-md-3 col-lg-3 col-xl-3 mb-2">{{$breakdown['name']}}</div>
               <div class="col-6 col-sm-6 col-md-3 col-lg-3 col-xl-3 mb-2"> <span class="font-weight-bold">Mobile No.</span></div>
               <div class="col-6 col-sm-6 col-md-3 col-lg-3 col-xl-3 mb-2">{{$breakdown['mobile']}}</div>
           </div>
            <div class="row">
               <div class="col-6 col-sm-6 col-md-3 col-lg-3 col-xl-3 mb-2"> <span class="font-weight-bold">Tenancy Type</span></div>
               <div class="col-6 col-sm-6 col-md-3 col-lg-3 col-xl-3 mb-2">{{get_tenancy_type_title($breakdown['tenancy_type'])}}</div>
               <div class="col-6 col-sm-6 col-md-3 col-lg-3 col-xl-3 mb-2"> <span class="font-weight-bold">Nationality</span></div>
               <div class="col-6 col-sm-6 col-md-3 col-lg-3 col-xl-3 mb-2">{{$breakdown['country_name']}}</div>
           </div>
            <div class="row">
                 <div class="col-6 col-sm-6 col-md-3 col-lg-3 col-xl-3 mb-2"> <span class="font-weight-bold">No Of Tenants</span></div>
                <div class="col-6 col-sm-6 col-md-3 col-lg-3 col-xl-3 mb-2">{{$breakdown['tenant_count']}}</div>
            </div>
        </div>
    </div>
    <div class="card">
        <div class="card-header bg-gradient-dark">
            <h6>Rent Detail</h6>
        </div>
        <div class="card-body">
           <div class="row">
               <div class="col-6 col-sm-6 col-md-3 col-lg-3 col-xl-3 mb-2"> <span class="font-weight-bold">Rent Frequency</span></div>
               <div class="col-6 col-sm-6 col-md-3 col-lg-3 col-xl-3 mb-2">{{$breakdown['rent_frequency']}}</div>
               <div class="col-6 col-sm-6 col-md-3 col-lg-3 col-xl-3 mb-2"> <span class="font-weight-bold">Rent Period</span></div>
               <div class="col-6 col-sm-6 col-md-3 col-lg-3 col-xl-3 mb-2">{{$breakdown['rent_period']}}</div>
           </div>
            <div class="row">
               <div class="col-6 col-sm-6 col-md-3 col-lg-3 col-xl-3 mb-2"> <span class="font-weight-bold">Parking</span></div>
               <div class="col-6 col-sm-6 col-md-3 col-lg-3 col-xl-3 mb-2">{{$breakdown['parking']}}</div>
               <div class="col-6 col-sm-6 col-md-3 col-lg-3 col-xl-3 mb-2"> <span class="font-weight-bold">Parking No</span></div>
               <div class="col-6 col-sm-6 col-md-3 col-lg-3 col-xl-3 mb-2">{{$breakdown['parking_number']}}</div>
           </div>
            <div class="row">
                 <div class="col-6 col-sm-6 col-md-3 col-lg-3 col-xl-3 mb-2"> <span class="font-weight-bold">Lease Start Date</span></div>
                <div class="col-6 col-sm-6 col-md-3 col-lg-3 col-xl-3 mb-2">{{$breakdown['lease_start_date'] ? date("d-m-Y",strtotime($breakdown['lease_start_date'])) : null }}</div>
                <div class="col-6 col-sm-6 col-md-3 col-lg-3 col-xl-3 mb-2"> <span class="font-weight-bold">Lease End Date</span></div>
                <div class="col-6 col-sm-6 col-md-3 col-lg-3 col-xl-3 mb-2">{{$breakdown['lease_end_date'] ? date("d-m-Y",strtotime($breakdown['lease_end_date'])) : null }}</div>
            </div>
             <div class="row">
               <div class="col-6 col-sm-6 col-md-3 col-lg-3 col-xl-3 mb-2"> <span class="font-weight-bold">Rent Amount</span></div>
               <div class="col-6 col-sm-6 col-md-3 col-lg-3 col-xl-3 mb-2">{{$breakdown['rent_amount']}}</div>
               <div class="col-6 col-sm-6 col-md-3 col-lg-3 col-xl-3 mb-2"> <span class="font-weight-bold">Installments</span></div>
               <div class="col-6 col-sm-6 col-md-3 col-lg-3 col-xl-3 mb-2">{{$breakdown['installments']}}</div>
           </div>
        </div>
    </div>

        <div class="card">
        <div class="card-header bg-gradient-dark">
            <h6>Detail Of Cash First Payment</h6>
        </div>
        <div class="card-body">
          <div class="container">
              <table class="table table-borderless">
              <tbody>
               <tr>
                   <th>Security Deposit</th>
                   <td>
                       {{$breakdown['security_deposit']}}
                   </td>
               </tr>
              <tr>
                   <th>Municipal Fees(4% from rent value)</th>
                   <td>{{$breakdown['municipality_fees']}}</td>
               </tr>
              <tr>
                   <th>Commission</th>
                   <td>{{$breakdown['brokerage']}}</td>
               </tr>
              <tr>
                   <th>Contract</th>
                   <td>{{$breakdown['contract']}}</td>
               </tr>
              <tr>
                   <th>SEWA Deposit</th>
                   <td>{{$breakdown['sewa_deposit']}}</td>
               </tr>
              <tr>
                   <th>First Installment</th>
                   <td>{{$breakdown['first_installment']}}</td>
               </tr>
              <tr>
                   <th>Remote Deposit</th>
                   <td>{{$breakdown['remote_deposit']}}</td>
               </tr>
              <tr>
                   <th>Total First Payment</th>
                   <td>{{$breakdown['total_first_installment']}}</td>
               </tr>
              <tr>
                   <th>Advance</th>
                   <td>{{$breakdown['advance_payment']}}</td>
               </tr>
              <tr>
                   <th>Balance</th>
                   <td>{{$breakdown['balance_amount']}}</td>
               </tr>
              </tbody>
          </table>
          </div>
        </div>
    </div>

        <div class="card">
            <div class="card-header bg-gradient-dark">
                <h6>Cheque Payment Detail</h6>
            </div>
            <div class="card-body">
              <table class="table table-bordered">
                <thead>
                  <tr>
                      <th>Installment</th>
                      <th>Amount</th>
                      <th>Bank Name</th>
                      <th>Cheque No.</th>
                      <th>Cheque Date</th>
                      <th>Name</th>
                  </tr>
                </thead>
                  <tbody id="rent_installment_grid">
                            @if(!empty($breakdown['rent_installments']))
                               @foreach($breakdown['rent_installments'] as $item)
                                   <tr>
                                       <td>{{$item['installment']}}</td>
                                       <td>{{$item['amount']}}</td>
                                       <td>{{$item['bank_name']}}</td>
                                       <td>{{$item['cheque_no']}}</td>
                                       <td>{{$item['cheque_date']}}</td>
                                       <td>{{$item['paid_to']}}</td>
                                   </tr>
                               @endforeach
                             @endif
                            </tbody>
                    </table>
            </div>
        </div>


        </div>
        </div>
    </div>

@endsection
@section('modal')
<div class="modal fade" id="modal_evict">
        <div class="modal-dialog modal-lg">
          <div class="modal-content">
            <form id="evict_form">
            <div class="modal-header bg-danger">
              <h4 class="modal-title">Request for Eviction</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">

                  <label for="remark">Reason</label>
                  <textarea name="remark" id="remark" class="form-control"></textarea>
                  <input type="hidden" name="tenant" value="{{$breakdown['tenant_id']}}">
                  <input type="hidden" name="unit" value="{{$breakdown['unit_id']}}">

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
              <h4 class="modal-title">Request for Move Out</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">

                  <label>Reason</label>
                  <textarea name="remark" class="form-control"></textarea>
                  <input type="hidden" name="tenant" value="{{$breakdown['tenant_id']}}">
                  <input type="hidden" name="unit" value="{{$breakdown['unit_id']}}">

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
@section('script')
 <script>
   let eviction_store = "{{route('store.eviction')}}";
   let moveout_store = "{{route('store.moveout')}}";
      $(document).ready(function(){

           $(document).on('submit', '#evict_form', function(e) {
   jQuery.ajaxSetup({
                  headers: {
                      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                  }
              });
    let formData = new FormData($(this)[0]);

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

          if(result.status==='1'){
             toast('success',result.msg,'top-center');
            setTimeout(function(){ location.reload(); }, 1000);

          }else{
             toast('error',result.msg,'top-center');
          }
        },
        error: function(result)
        {

        }
    });
});
   $(document).on('submit', '#moveout_form', function(e) {
   jQuery.ajaxSetup({
                  headers: {
                      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                  }
              });
    let formData = new FormData($(this)[0]);

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
          if(result.status==='1'){
            alert(result.msg);

           setTimeout(function(){ location.reload(); }, 1000);

          }else{
            toast('error',result.msg,'top-center');
          }
        },
        error: function(result)
        {
        }
    });
});
          $("#printBtn").on('click',function(){
             $("#print_this").printThis();
          })

      })
 </script>
@endsection
