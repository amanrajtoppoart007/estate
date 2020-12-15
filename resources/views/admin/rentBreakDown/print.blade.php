@extends("admin.layout.print")
@section("content")
    <div class="row justify-content-center">
        <div class=" col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
            <div class="card">
                <div class="card-header">
                    <div class="row">
                        <div class="col-6 col-sm-8 co-md-8 col-lg-8 col-xl-8 card-title">
                            <span class="mt-5">
                                <h5>Al Hoor Real Estate</h5>
                                <h6>Leading Real Estate brand in Dubai</h6>
                            </span>
                        </div>
                        <div class="col-6 col-sm-4 col-md-4 col-lg-4 text-left">
                            <img style="width: 43%;height: 75%;" class="card-img-top" src="{{asset('assets/img/alhoor-logo.png')}}" alt="">
                        </div>
                    </div>
                </div>
        <div class="card-body">
            <div class="card">
        <div class="card-header bg-gradient-dark">
            <h6>Property Detail</h6>
        </div>
        <div class="card-body">
           <div class="row">
               <div class="col-6 col-sm-6 col-md-3 col-lg-3 col-xl-3 mb-1"> <span class="font-weight-bold">Building</span></div>
               <div class="col-6 col-sm-6 col-md-3 col-lg-3 col-xl-3 mb-1">{{$breakdown['property_title'] }}</div>

           </div>
            <div class="row">
                 <div class="col-6 col-sm-6 col-md-3 col-lg-3 col-xl-3 mb-1"> <span class="font-weight-bold">Flat No.</span></div>
                <div class="col-6 col-sm-6 col-md-3 col-lg-3 col-xl-3 mb-1">{{$breakdown['flat_number'] }}</div>
            </div>
        </div>
    </div>
    <div class="card">
        <div class="card-header bg-gradient-dark">
            <h6>Client Detail</h6>
        </div>
        <div class="card-body">
            <div class="row">
               <div class="col-6 col-sm-6 col-md-3 col-lg-3 col-xl-3 mb-1"> <span class="font-weight-bold">Name</span></div>
               <div class="col-6 col-sm-6 col-md-3 col-lg-3 col-xl-3 mb-1">{{$breakdown['name']}}</div>
               <div class="col-6 col-sm-6 col-md-3 col-lg-3 col-xl-3 mb-1"> <span class="font-weight-bold">Mobile No.</span></div>
               <div class="col-6 col-sm-6 col-md-3 col-lg-3 col-xl-3 mb-1">{{$breakdown['mobile']}}</div>
           </div>
            <div class="row">
               <div class="col-6 col-sm-6 col-md-3 col-lg-3 col-xl-3 mb-1"> <span class="font-weight-bold">Tenancy Type</span></div>
               <div class="col-6 col-sm-6 col-md-3 col-lg-3 col-xl-3 mb-1">{{get_tenancy_type_title($breakdown['tenancy_type'])}}</div>
               <div class="col-6 col-sm-6 col-md-3 col-lg-3 col-xl-3 mb-1"> <span class="font-weight-bold">Nationality</span></div>
               <div class="col-6 col-sm-6 col-md-3 col-lg-3 col-xl-3 mb-1">{{$breakdown['country_name'] }}</div>
           </div>
            <div class="row">
                 <div class="col-6 col-sm-6 col-md-3 col-lg-3 col-xl-3 mb-1"> <span class="font-weight-bold">No Of Tenants</span></div>
                <div class="col-6 col-sm-6 col-md-3 col-lg-3 col-xl-3 mb-1">{{$breakdown['tenant_count']}}</div>
            </div>
        </div>
    </div>
    <div class="card">
        <div class="card-header bg-gradient-dark">
            <h6>Rent Detail</h6>
        </div>
        <div class="card-body">
           <div class="row">
               <div class="col-6 col-sm-6 col-md-3 col-lg-3 col-xl-3 mb-1"> <span class="font-weight-bold">Rent Frequency</span></div>
               <div class="col-6 col-sm-6 col-md-3 col-lg-3 col-xl-3 mb-1">{{$breakdown['rent_frequency']}}</div>
               <div class="col-6 col-sm-6 col-md-3 col-lg-3 col-xl-3 mb-1"> <span class="font-weight-bold">Rent Period</span></div>
               <div class="col-6 col-sm-6 col-md-3 col-lg-3 col-xl-3 mb-1">{{$breakdown['rent_period'] }}</div>
           </div>
            <div class="row">
               <div class="col-6 col-sm-6 col-md-3 col-lg-3 col-xl-3 mb-1"> <span class="font-weight-bold">Parking</span></div>
               <div class="col-6 col-sm-6 col-md-3 col-lg-3 col-xl-3 mb-1">{{$breakdown['parking']}}</div>
               <div class="col-6 col-sm-6 col-md-3 col-lg-3 col-xl-3 mb-1"> <span class="font-weight-bold">Parking No</span></div>
               <div class="col-6 col-sm-6 col-md-3 col-lg-3 col-xl-3 mb-1">{{$breakdown['parking_number']}}</div>
           </div>
            <div class="row">
                 <div class="col-6 col-sm-6 col-md-3 col-lg-3 col-xl-3 mb-1"> <span class="font-weight-bold">Lease Start Date</span></div>
                <div class="col-6 col-sm-6 col-md-3 col-lg-3 col-xl-3 mb-1">{{$breakdown['lease_start_date'] ? date("d-m-Y",strtotime($breakdown['lease_start_date'])) : null }}</div>
                <div class="col-6 col-sm-6 col-md-3 col-lg-3 col-xl-3 mb-1"> <span class="font-weight-bold">Lease End Date</span></div>
                <div class="col-6 col-sm-6 col-md-3 col-lg-3 col-xl-3 mb-1">{{$breakdown['lease_end_date'] ? date("d-m-Y",strtotime($breakdown['lease_end_date'])) : null }}</div>
            </div>
             <div class="row">
               <div class="col-6 col-sm-6 col-md-3 col-lg-3 col-xl-3 mb-1"> <span class="font-weight-bold">Rent Amount</span></div>
               <div class="col-6 col-sm-6 col-md-3 col-lg-3 col-xl-3 mb-1">{{$breakdown['rent_amount']}}</div>
               <div class="col-6 col-sm-6 col-md-3 col-lg-3 col-xl-3 mb-1"> <span class="font-weight-bold">Installments</span></div>
               <div class="col-6 col-sm-6 col-md-3 col-lg-3 col-xl-3 mb-1">{{$breakdown['installments']}}</div>
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
              </tbody>
          </table>
          </div>
        </div>
    </div>
            <div class="card">
                <div class="card-header">
                    Required Documents and Terms & Conditions
                </div>
                <div class="card-body">

                    <div id="family_husband_wife" style="display: none">
                        <h6>For Family: Husband and Wife</h6>
                        <ul>
                        <li>Original Emirates ID of the Lessee</li>
                        <li>Husband and wife passport and visa page copy.</li>
                        <li>If the spouse doesn't have a valid visa,  sign the pledge to bring wife/husband visa.</li>
                        <li>Copy of Marriage certificate.</li>
                        <li>If the spouse is sponsored by company.</li>
                        <li>Bank salary transfer statement for the last 3 months. (hard copy not required)</li>
                    </ul>
                    </div>
                    <div id="family_brother_sister" style="display: none">
                        <h6>For family: Sisters/Brothers</h6>
                        <ul>
                        <li>Original Emirates ID of the Lessee</li>
                        <li>Passport and visa page copy of the siblings.</li>
                        <li>Bank salary transfer statement for the last 3 months. (hard copy not required).</li>
                        <li>Undertaking letter that the lessee will stay with his/her family member only. (family name and documents).</li>
                    </ul>
                    </div>

                    <div id="bachelor" style="display: none">
                        <h6>For Bachelor</h6>
                        <ul>
                            <li>Original Emirates ID of the Lessee.</li>
                            <li>Lessee passport and visa page copy.</li>
                            <li>Bank statement for 3 Month (hard copy not required).</li>
                            <li>Undertaking letter stating the number of tenants with their document.</li>
                            <li>Accomplished bachelor form from Municipality.</li>
                        </ul>
                    </div>
                    <div id="company" style="display: none">
                        <h6>For Company</h6>
                        <ul>
                            <li>Copy of the trade license.</li>
                            <li>Copy of the company’s Memorandum of Association.</li>
                            <li>Original Emirates ID of the manager.</li>
                            <li>Copy of Valid Passport, Visa & Emirates ID of the partners.</li>
                            <li>Copy of Valid Passport, Visa & Emirates ID for the labors/staffs/Employees.</li>
                            <li>Arabic letter showing the number of residents that will stay in the flat.</li>
                            <li class="text-danger">*All documents must be signed and stamped by the company’s manager.</li>
                        </ul>
                    </div>
                    <div class="d-print-none">
                        <h6>Terms and condition (for new tenant)</h6>
                        <ol>
                            <li>Booking amount is non-refundable</li>
                            <li>Security Deposit, commission & first payment must be paid in cash or by current dated
                                cheque.
                            </li>
                            <li>If the first payment is paid by cheque, contract will be register after the cheque is
                                cleared
                            </li>
                            <li>The tenant must notify if he/she will renew or vacate the flat at least two months
                                before the contract expires.
                            </li>
                            <li>If the tenant fails to notify within two months, it means the tenant agrees to renew on
                                the same terms and condition.
                            </li>
                            <li>If the tenant will choose to terminate his/her lease after renewal, 2 months penalty
                                will be applied.
                            </li>
                            <li>Management fee of 1500 + vat will be applied every renewal.</li>
                        </ol>
                    </div>

                </div>
            </div>
        </div>
    </div>
        </div>
    </div>
    <div class="row d-print-none">
        <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12 text-right">
            <div class="form-group">
                <button type="button" id="print_btn" class="btn btn-success"><i class="fa fa-print"></i>Print BreakDown</button>
            </div>
        </div>
    </div>
@endsection
@section("js")
    <script src="{{asset('plugin/print/printThis.js')}}"></script>
@endsection
@section("script")

    <script>
        $(document).ready(function(){
            @if(!empty($breakdown['tenancy_type']))
             $("#{{$breakdown['tenancy_type']}}").show();
           @endif

            window.addEventListener("load", window.print());
            $("#print_btn").on("click",function(){
                 window.print();
            });

        });
    </script>

@endsection
