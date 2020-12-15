@extends('admin.layout.app')
@section('head')
    <link rel="stylesheet" href="{{asset('plugin/datetimepicker/css/gijgo.min.css')}}">
@endsection
@include("admin.include.breadcrumb",["page_title"=>"Edit Rent BreakDown"])
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
            {{Form::open(['id'=>'edit_data_form','autocomplete'=>'off'])}}
            <input type="hidden" name="rent_enquiry_id" value="{{$breakdown['rent_enquiry_id']}}">
            <input type="hidden" name="tenant_id" value="{{$breakdown['tenant_id']}}">

            <input type="hidden" name="tenancy_type" id="tenancy_type" value="{{$breakdown['tenancy_type']}}">

            <input type="hidden" name="rent_breakdown_id" value="{{$breakdown['id']}}">
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
                                        @php $selected = ($prop->id==$breakdown['property_id'])?"selected":null;  @endphp
                                        <option value="{{$prop->id}}" {{$selected}}>{{$prop->title}}</option>
                                    @endforeach

                                </select>
                            </div>
                        </div>
                        <div class="col-12 col-sm-4 col-md-4 col-lg-4 col-xl-4">
                            <div class="form-group">
                                <label for="unit_id">Flat No.</label>
                                <select class="form-control" name="unit_id" id="unit_id">
                                    <option value="">Select Unit</option>
                                    @foreach($property_units as $unit)
                                        @php $selected = ($unit->id == $breakdown['unit_id'])?"selected":null;  @endphp
                                        <option value="{{$unit->id}}" {{$selected}}>{{$unit->flat_number}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>

                </div>
            </div>

            <div class="card">
                <div class="card-header bg-gradient-cyan">
                    <h6>Tenant Detail</h6>
                </div>
                <div class="card-body">
                    <table class="table table-borderless">
                        <tbody>
                        <tr>
                            <th>Name</th>
                            <td>{{$breakdown['name']}}</td>
                            <th>Mobile Number</th>
                            <td>{{$breakdown['mobile']}}</td>
                            <th>Nationality</th>
                            <td>{{$breakdown['country_name']}}</td>
                        </tr>
                        <tr>
                            <th>Tenancy Type</th>
                            <td>{{get_tenancy_type_title($breakdown['tenancy_type'])}}</td>
                            <th>Number Of Tenants</th>
                            <td>{{$breakdown['tenant_count']}}</td>
                            <th></th>
                            <td></td>
                        </tr>
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="card">
                <div class="card-header bg-gradient-cyan">
                    <h6><strong>Rent BreakDown</strong></h6>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="rent_frequency">Rent Period</label>
                                <select class="form-control" name="rent_frequency" id="rent_frequency">
                                    <option value="">Select</option>
                                    @php $period_types = rent_period_types();@endphp
                                    @foreach($period_types as $key=>$value)
                                        @php $selected = ($key==$breakdown['rent_frequency'])?"selected":null; @endphp
                                        <option value="{{$key}}" {{$selected}}>{{$value}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="rent_period">NO.Of <i id="rent_period_text"></i> </label>
                                <input type="text" class="form-control numeric" name="rent_period" id="rent_period"
                                       value="{{$breakdown['rent_period']}}">
                            </div>
                        </div>



                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="lease_start_date">Lease Start Date</label>
                                <input type="text" class="form-control" name="lease_start_date" id="lease_start_date"
                                       value="{{(!empty($breakdown['lease_start_date'])) ? date('d-m-Y',strtotime($breakdown['lease_start_date'])) :null }}">
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="lease_end_date">Lease End Date</label>
                                <input type="text" class="form-control" name="lease_end_date" id="lease_end_date"
                                       value="{{(!empty($breakdown['lease_end_date'])) ? date('d-m-Y',strtotime($breakdown['lease_end_date'])) :null }}">
                            </div>
                        </div>

                         <div class="col-md-3">
                        <div class="form-group">
                            <label for="unit_type">Flat Type</label>
                            <select class="form-control" name="unit_type" id="unit_type">
                                @php $unit_types = get_unit_types() @endphp
                                @if(!empty($breakdown))
                                    <option value="">Select Flat Type</option>
                                    @foreach($unit_types as $key=>$value)
                                        @php $selected = ($key==$breakdown['unit_type'])?'selected':null; @endphp
                                        <option value="{{$key}}" {{$selected}}>{{$value}}</option>
                                    @endforeach
                                @else
                                    <option value="">Select Flat Type</option>
                                    @foreach($unit_types as $key=>$value)
                                        <option value="{{$key}}">{{$value}}</option>
                                    @endforeach
                                @endif
                            </select>
                        </div>
                    </div>

                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="rent_amount">Rent Amount</label>
                                <input type="text" class="form-control" name="rent_amount" id="rent_amount"
                                       value="{{$breakdown['rent_amount']}}">
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="installments">Installments</label>
                                <input type="text" class="form-control" name="installments" id="installments"
                                       value="{{$breakdown['installments']}}">
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="total_rent_amount">Total Rent Amount</label>
                                <input type="text" class="form-control" name="total_rent_amount" id="total_rent_amount" value="{{$breakdown['total_rent_amount']}}">
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="parking">Parking <i id="parking"></i> </label>
                                <select class="form-control" name="parking" id="parking">
                                    <option value="yes" {{$breakdown['parking']=='yes'?'selected':null}}>Yes</option>
                                    <option value="no" {{$breakdown['parking']=='no'?'selected':null}}>No</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="parking_number">Parking number <i id="rent_period_text"></i> </label>
                                <input type="text" class="form-control numeric" name="parking_number"
                                       id="parking_number"
                                       value="{{$breakdown['parking']=='yes'?((!empty($breakdown['parking_number']))?$breakdown['parking_number']:null):null}}">
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
                                        <input type="text" name="security_deposit" id="security_deposit"
                                               value="{{$breakdown['security_deposit']}}">
                                    </label>


                                </td>
                            </tr>
                            <tr>
                                <th>Municipal Fees(4% from rent value)</th>
                                <td>
                                    <label for="municipality_fees"><input type="text" name="municipality_fees"
                                                                          id="municipality_fees"
                                                                          value="{{$breakdown['municipality_fees']}}"></label>
                                </td>
                            </tr>
                            <tr>
                                <th>Commission</th>
                                <td>
                                    <label for="brokerage">
                                        <input type="text" name="brokerage" id="brokerage"
                                               value="{{$breakdown['brokerage']}}">
                                    </label>

                                </td>
                            </tr>
                            <tr>
                                <th>Contract</th>
                                <td>
                                    <label for="">
                                        <input type="text" name="contract" id="contract"
                                               value="{{$breakdown['contract']}}">
                                    </label>

                                </td>
                            </tr>
                            <tr>
                                <th>SEWA Deposit</th>
                                <td>
                                    <label for=""><input type="text" name="sewa_deposit" id="sewa_deposit"
                                                         value="{{$breakdown['sewa_deposit']}}"></label>

                                </td>
                            </tr>
                            <tr>
                                <th>First Installment</th>
                                <td>
                                    <label for="first_installment">
                                        <input type="text" name="first_installment" id="first_installment"
                                               value="{{$breakdown['first_installment']}}">
                                    </label>

                                </td>
                            </tr>
                            <tr>
                                <th>Remote Deposit</th>
                                <td>
                                    <label for="remote_deposit">
                                        <input type="text" name="remote_deposit" id="remote_deposit" value="{{$breakdown['remote_deposit']}}">
                                    </label>
                                </td>
                            </tr>
                            <tr>
                                <th>Total First Payment</th>
                                <td>
                                    <label for="total_first_installment">
                                        <input type="text" name="total_first_installment" id="total_first_installment"
                                               value="{{$breakdown['total_first_installment']}}">
                                    </label>

                                </td>
                            </tr>
                            <tr>
                                <th>Advance</th>
                                <td>
                                    <label for="advance_payment">
                                        <input type="text" name="advance_payment" id="advance_payment" value="{{$breakdown['advance_payment']}}">
                                    </label>
                                </td>
                            </tr>
                             <tr>
                                <th>Balance</th>
                                <td>
                                    <label for="balance_amount">
                                        <input type="text" name="balance_amount" id="balance_amount" value="{{$breakdown['balance_amount']}}">
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
                              </tr>
                            </thead>
                            <tbody id="rent_installment_grid">
                            @if(!empty($breakdown['rent_installments']))
                                @php $i=0; @endphp
                               @foreach($breakdown['rent_installments'] as $item)
                                   <tr>
                                       <td>
                                           {{$item['installment']}}
                                           @php
                                              $id = '';
                                               if($i==0)
                                                   {
                                                       $id = 'id="rent_first_installment_input"';
                                                   }
                                               @endphp
                                           <input type="hidden" name="installment[{{$i}}][installment]"   value="{{$item['installment']}}"/>
                                       </td>
                                       <td>
                                           <input type="text" name="installment[{{$i}}][amount]" {!!$id!!} value="{{$item['amount']}}"/>
                                       </td>
                                       <td>
                                           <select class="bank_list" name="installment[{{$i}}][bank_name]">
                                               @foreach($banks as $bank)
                                                   @php $selected = ($bank->name==$item['bank_name'])?"selected":""; @endphp
                                                   <option value="{{$bank->name}}" {{$selected}}>{{$bank->name}}</option>
                                               @endforeach
                                           </select>
                                       </td>
                                       <td>
                                           <input type="text" name="installment[{{$i}}][cheque_no]" value="{{$item['cheque_no']}}"/>

                                       </td>
                                       <td>
                                           <input type="text" class="check_dates" name="installment[{{$i}}][cheque_date]" value="{{$item['cheque_date']}}"/>
                                       </td>
                                       <td>
                                           <input type="text" name="installment[{{$i}}][paid_to]" value="{{$item['paid_to']}}"/>
                                       </td>
                                   </tr>
                                   @php $i++; @endphp
                               @endforeach
                             @endif
                            </tbody>
                        </table>
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
                <button type="submit" id="preview" class="btn btn-primary submit_breakdown_button">Update & Preview
                </button>
                <button type="submit" id="print_breakdown" class="btn btn-info submit_breakdown_button">Update & Print
                    BreakDown
                </button>
                <button type="submit" id="send_breakdown_via_email"
                        class="btn btn-warning text-white submit_breakdown_button">Update & Send BreakDown By E-mail
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

            $('#edit_data_form').on("submit", function (event) {
                event.preventDefault();
                let params = $("#edit_data_form").serialize();
                let url = "{{route('update.rent.breakdown')}}";

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

        });
    </script>
@endsection
