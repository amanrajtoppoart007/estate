@extends('admin.layout.app')
@section('head')
    <link rel="stylesheet" href="{{asset('plugin/datetimepicker/css/gijgo.min.css')}}">
@endsection
@include("admin.include.breadcrumb",["page_title"=>"Create Rent BreakDown"])
@section('content')
    <div class="card">
        <div class="card-body">
            <input type="hidden" name="min_date" value="{{now()->format('d-m-Y')}}">
            <input type="hidden" name="max_date" value="{{now()->format('d-m-Y')}}">
            <input type="hidden" name="calculate_end_date_url" id="calculate_end_date_url" value="{{route('calculate.endDate')}}">
            <input type="hidden" name="vacant_unit_list_url" id="vacant_unit_list_url" value="{{route('get.vacant.unit.list')}}">
            <input type="hidden" name="breakdown_items_url" id="breakdown_items_url" value="{{route('get.breakdown.constants')}}">
            <input type="hidden" name="bank_list_url" id="bank_list_url" value="{{route('get.bank.list')}}">
            <input type="hidden" name="get_unit_type_url" id="get_unit_type_url" value="{{route('property.unit.detail')}}">
            {{Form::open(['id'=>'add_data_form','autocomplete'=>'off'])}}
            <input type="hidden" name="rent_enquiry_id" value="{{$query['rent_enquiry_id']}}">
            <input type="hidden" name="tenant_id" value="{{$query['tenant_id']}}">
            <input type="hidden" name="tenancy_type" id="tenancy_type" value="{{$query['tenancy_type']}}">

            <div class="card">
                <div class="card-header bg-gradient-cyan">
                    <h6>Tenant Detail</h6>
                </div>
                <div class="card-body">
                    <table class="table table-borderless">
                        <tbody>
                        <tr>
                            <th>Name</th>
                            <td>{{$query['name']}}</td>
                            <th>Mobile Number</th>
                            <td>{{$query['mobile']}}</td>
                            <th>Nationality</th>
                            <td>{{$query['country_name']??null}}</td>
                        </tr>
                        <tr>
                            <th>Tenancy Type</th>
                            <td>{{$query['tenancy_type']}}</td>
                            <th>Number Of Tenants</th>
                            <td>{{$query['tenant_count']}}</td>
                            <th>Unit Type</th>
                            <td>{!!$query['bedroom']!=='studio'?$query['bedroom'].'&nbsp;BR':$query['bedroom']!!} </td>
                        </tr>
                        </tbody>
                    </table>
                </div>
            </div>

            <div class="card">
                <div class="card-header bg-gradient-cyan">
                    <h6><strong>Property Allocation Detail</strong></h6>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-12 col-sm-4 col-md-4 col-lg-4 col-xl-4">
                            <div class="form-group">
                                <label for="property_id">Building Name</label>
                                <select class="form-control" name="property_id" id="property_id">
                                    <option value="">Select Building</option>
                                    @foreach($properties as $prop)
                                        <option value="{{$prop->id}}">{{$prop->title}}</option>
                                    @endforeach

                                </select>
                            </div>
                        </div>
                        <div class="col-12 col-sm-4 col-md-4 col-lg-4 col-xl-4">
                            <div class="form-group">
                                <label for="unit_id">Flat No.</label>
                                <select class="form-control" name="unit_id" id="unit_id">
                                    <option value="">Select Unit</option>
                                </select>
                            </div>
                        </div>
                    </div>

                </div>
            </div>


            <div class="card">
                <div class="card-header bg-gradient-cyan">
                    <h6><strong>Rent BreakDown</strong></h6>
                </div>
                <div class="card-body">
                    <div class="card">
                        <div class="card-header">
                            For Lease End Date Calculation Only
                        </div>
                        <div class="body">
                            <div class="row m-2">
                                <div class="col-md-3">
                            <div class="form-group">
                                <label for="rent_frequency">Rent Period</label>
                                <select class="form-control" name="rent_frequency" id="rent_frequency">
                                    <option value="">Select</option>
                                    @php $period_types = rent_period_types();@endphp
                                    @foreach($period_types as $key=>$value)
                                        <option value="{{$key}}">{{$value}}</option>
                                    @endforeach
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
                                <label for="lease_start_date">Lease Start Date</label>
                                <input type="text" class="form-control" name="lease_start_date" id="lease_start_date" value="">
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="lease_end_date">Lease End Date</label>
                                <input type="text" class="form-control" name="lease_end_date" id="lease_end_date" value="">
                            </div>
                        </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                         <div class="col-md-3">
                        <div class="form-group">
                            <label for="unit_type">No. Of Bedrooms</label>
                            <select class="form-control" name="unit_type" id="unit_type">
                                @php $unit_types = get_unit_types() @endphp
                                    <option value="">Select Bedrooms</option>
                                    @foreach($unit_types as $key=>$value)
                                        <option value="{{$key}}">{{$value}}</option>
                                    @endforeach
                            </select>
                        </div>
                    </div>

                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="rent_amount">Rent Amount</label>
                                <input type="text" class="form-control" name="rent_amount" id="rent_amount" value="">
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="installments">Installments</label>
                                <input type="text" class="form-control" name="installments" id="installments" value="">
                            </div>
                        </div>
                        {{--<div class="col-md-3">
                            <div class="form-group">
                                <label for="total_rent_amount">Total Rent Amount</label>
                                <input type="text" class="form-control" name="total_rent_amount" id="total_rent_amount" value="">
                            </div>
                        </div>--}}
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
                                <input type="text" class="form-control numeric" name="parking_number" id="parking_number" value="">
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="card">
                <div class="card-header bg-gradient-dark">
                    <h6>Detail Of Cash First Payment</h6>
                </div>
                <div class="card-body">
                    <div class="container">
                        <table class="table table-borderless" id="breakdown_item_grid">
                            <tbody>
                            <tr>
                                <th>Security Deposit</th>
                                <td>
                                    <label for="security_deposit">
                                        <input type="text" name="security_deposit" id="security_deposit" value="">
                                    </label>


                                </td>
                            </tr>
                            <tr>
                                <th>Municipal Fees(4% from rent value)</th>
                                <td>
                                    <label for="municipality_fees">
                                        <input type="text" name="municipality_fees" id="municipality_fees" value="">
                                    </label>
                                </td>
                            </tr>
                            <tr>
                                <th>Commission</th>
                                <td>
                                    <label for="brokerage">
                                        <input type="text" name="brokerage" id="brokerage" value="">
                                    </label>

                                </td>
                            </tr>
                            <tr>
                                <th>Tenancy Contract</th>
                                <td>
                                    <label for="">
                                        <input type="text" name="contract" id="contract" value="">
                                    </label>

                                </td>
                            </tr>
                            <tr>
                                <th>SEWA Deposit</th>
                                <td>
                                    <label for="sewa_deposit">
                                        <input type="text" name="sewa_deposit" id="sewa_deposit" value="">
                                    </label>

                                </td>
                            </tr>
                            <tr>
                                <th>First Installment</th>
                                <td>
                                    <label for="first_installment">
                                        <input type="text" name="first_installment" id="first_installment" value="">
                                    </label>

                                </td>
                            </tr>
                            <tr>
                                <th>Remote Deposit</th>
                                <td>
                                    <label for="remote_deposit">
                                        <input type="text" name="remote_deposit" id="remote_deposit" value="">
                                    </label>
                                </td>
                            </tr>
                            <tr>
                                <th>Total First Payment</th>
                                <td>
                                    <label for="total_first_installment">
                                        <input type="text" name="total_first_installment" id="total_first_installment" value="">
                                    </label>

                                </td>
                            </tr>
                            <tr>
                                <th>Advance</th>
                                <td>
                                    <label for="advance_payment">
                                        <input type="text" name="advance_payment" id="advance_payment" value="">
                                    </label>
                                </td>
                            </tr>
                             <tr>
                                <th>Balance</th>
                                <td>
                                    <label for="balance_amount">
                                        <input type="text" name="balance_amount" id="balance_amount" value="">
                                    </label>
                                </td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            <div class="card">
                <div class="card-header">
                    Check Payment Of Installments
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered">
                            <thead>
                              <tr>
                                  <th>Installment</th>
                                  <th>Amount</th>
                                  <th>Bank Name</th>
                                  <th>Cheque No.</th>
                                  <th>Cheque Date</th>
                                  <th>Name</th>
                                  <th>Remark</th>
                                  <th>Action</th>
                              </tr>
                            </thead>
                            <tbody id="rent_installment_grid">

                            </tbody>
                        </table>
                        <div class="form-group">
                            <button id="addMoreChequesBtn" type="button" class="btn btn-primary">Add More Cheques</button>
                        </div>
                    </div>
                </div>
            </div>

            <div class="form-group">
                <input type="hidden" id="security_deposit_constant" name="security_deposit_constant" value="">
                <input type="hidden" id="municipality_fees_constant" name="municipality_fees_constant" value="">
                <input type="hidden" id="brokerage_constant" name="brokerage_constant" value="">
                <input type="hidden" id="contract_constant" name="contract_constant" value="">
                <input type="hidden" id="remote_deposit_constant" name="remote_deposit_constant" value="">
                <input type="hidden" id="sewa_deposit_constant" name="sewa_deposit_constant" value="">
                <input type="hidden" id="next_action_input" name="next_action" value="">
                <button type="submit" id="preview" class="btn btn-primary submit_breakdown_button">Create & Preview
                </button>
                <button type="submit" id="print_breakdown" class="btn btn-info submit_breakdown_button">Create & Print
                    BreakDown
                </button>
                <button type="submit" id="send_breakdown_via_email"
                        class="btn btn-warning text-white submit_breakdown_button">Create & Send BreakDown By E-mail
                </button>
            </div>
            {{Form::close()}}
        </div>
    </div>
@endsection
@section('js')
    <script src="{{asset('plugin/datetimepicker/js/gijgo.min.js')}}"></script>
    <script src="{{asset('js/breakdown.js')}}"></script>
@endsection
@section('script')
    <script>
        $(document).ready(function () {

            $(document).on("click", ".submit_breakdown_button", function () {
                $("#next_action_input").val($(this).attr("id"));
            });

            $('#add_data_form').on("submit", function (event) {
                event.preventDefault();
                  let csrf_token = $('meta[name="csrf-token"]').attr('content');
                  jQuery.ajaxSetup({ headers: { 'X-CSRF-TOKEN': csrf_token, } });
                let params = $("#add_data_form").serialize();
                let url = "{{route('store.breakdown.data')}}";

                function fn_success(result) {
                    toast('success', result.message, 'bottom-right');
                    if (result.next_url) {
                        if ($("#next_action_input").val() === "send_breakdown_via_email") {
                            $.ajax({
                                url: result.next_url,
                                type: "GET",
                                success: function (result) {
                                    toast('success', result.message, 'bottom-right');
                                },
                                error: function (result) {
                                    toast('error', result.message, 'bottom-right');
                                }
                            })
                        } else {
                            window.location.href = result.next_url;
                        }
                    }

                }

                function fn_error(result) {
                    toast('error', result.message, 'bottom-right');
                }

                $.fn_ajax(url, params, fn_success, fn_error);
            });





            /************ get list of property unit types  ***************/



        });
    </script>
@endsection
