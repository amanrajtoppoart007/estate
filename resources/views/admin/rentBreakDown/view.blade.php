@extends("admin.layout.app")
@include("admin.include.breadcrumb",["page_title"=>"View BreakDown"])
@section("content")
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
            <h6>Client Detail</h6>
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
                                       <td>{{date('d-m-Y',strtotime($item['cheque_date']))}}</td>
                                       <td>{{$item['paid_to']}}</td>
                                   </tr>
                               @endforeach
                             @endif
                            </tbody>
                    </table>
            </div>
        </div>


        </div>
    <div class="row">
        <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12 text-right">
            <div class="form-group">
                @if(empty($breakdown['tenant_id']))
                 <a href="{{route('edit.rent.breakdown',$breakdown['id'])}}"   class="btn btn-info"><i class="fa fa-print"></i>Edit BreakDown</a>
                @endif
                <a href="{{route('print.rent.breakdown',$breakdown['id'])}}" target="_blank"  class="btn btn-success"><i class="fa fa-print"></i>Print BreakDown</a>
                <button type="button" id="send_via_mail_btn" class="btn btn-info"><i class="fa fa-envelope"></i>Send BreakDown Via Email </button>
            </div>
        </div>
    </div>
@endsection
@section("script")
    <script>
        $(document).ready(function(){

            $("#send_via_mail_btn").on("click",function(){

                let url = "{{route('send.breakdown.mail')}}";
                let params = {
                    break_down_id : "{{$breakdown['id']}}",
                    rent_enquiry_id : "{{$breakdown['rent_enquiry_id']}}"
                };
                function fn_success(result)
                {
                    toast("success",result.message,"top-right");
                }
                function fn_error(result)
                {
                    toast("error",result.message,"top-right");
                }
                $.fn_ajax(url,params,fn_success,fn_error);
            })
        });
    </script>
    @if(request()->has("action"))
        @if(request()->action=="print")
        <script>
            $(document).ready(function(){
                $("#printThis").printThis({
                     header: "{{config('app.name')}}"
                 });
            });
        </script>
        @endif
    @endif
@endsection

