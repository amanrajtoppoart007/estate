@extends('tenant.layout.app')
@section('js')
<script src="{{asset('plugin/print/printThis.js')}}"></script>
@endsection
@include("tenant.include.breadcrumb",["page_title"=>"Allotted Property Detail"])
@section('content')

    <div class="card">
        <div class="card-header">
            <div class="row">
                <div class="col-md-2">
                    <button id="printBtn" class="btn btn-primary"><i class="fa fa-print"></i></button>
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

@section('script')
 <script>
   $(document).ready(function(){
       $("#printBtn").on('click',function(){
             $("#printThis").printThis();
          });
   });
 </script>
@endsection
