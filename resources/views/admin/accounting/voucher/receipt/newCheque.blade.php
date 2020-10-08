@extends('admin.layout.accounting')
@section('breadcrumb')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Receipt Voucher</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}">Home</a></li>
                        <li class="breadcrumb-item active">Accounting</li>
                        <li class="breadcrumb-item active">Voucher</li>
                        <li class="breadcrumb-item active">Receipt</li>
                        <li class="breadcrumb-item active">New Cheque Voucher</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('content')
    <!-- card 1 -->
    <div class="card card-default">
        <div class="card-header">
            <h3 class="card-title">New Receipt Voucher Cheque</h3>

            <div class="card-tools">

            </div>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
            <form id="mainForm">
                <div class="row">
                    <div class="col-md-12">
                        <table class="table table-bordered">
                            <tr>
                                <td style="width: 21%;">Voucher Date</td>
                                <td>{{date('d/m/Y')}}
                                </td>
                                <td></td>
                            </tr>
                            <tr>
                                <td style="width: 21%;">Voucher No.</td>
                                <td>{{$new_no}}
                                    <input type="hidden" name="voucher_number" value="{{$new_no}}">
                                </td>
                                <td></td>
                            </tr>
                            <tr>
                                <td style="width: 21%;">Received From Mr./M/s</td>
                                <td>
                                    <select id="select_tenant" name="payer" class="form-control" style="width:100%;">
                                        <option>Select Payer</option>
                                    </select></td>
                                <td></td>
                            </tr>
                            <tr>
                                <td style="width: 21%;">Amount
                                    <input type="hidden" name="total_amount" id="total_amount">
                                </td>
                                <td id="totalAmtTd">0

                                </td>
                                <td></td>
                            </tr>
                            <tr>
                                <td style="width: 21%;">The Sum of Dhs</td>
                                <td><input type="text" name="dhs" class="form-control"></td>
                                <td></td>
                            </tr>
                            <tr>
                                <td style="width: 21%;">Tower Name</td>
                                <td>
                                    <select class="form-control" id="property" name="tower" style="width: 100%">
                                        <option>Select Tower</option>
                                    </select>
                                </td>
                                <td></td>
                            </tr>
                            <tr>
                                <td style="width: 21%;">Flat Number</td>
                                <td>
                                    <select class="form-control" id="select_units" name="unit" style="width: 100%">
                                        <option>Select Flat</option>
                                    </select>
                                </td>
                                <td></td>
                            </tr>
                            <tr>
                                <td style="width: 21%;">Being</td>
                                <td></td>
                                <td></td>
                            </tr>
                        </table>
                    </div>


                </div>
                <div class="row">
                    <div class="col-md-12">
                        <table class="table table-bordered">
                            <thead>
                            <tr>
                                <th>Bank</th>
                                <th>Cheque No.</th>
                                <th>Cheque Date</th>
                                <th>Amount</th>
                                <th>Description</th>
                                <th>Remark/Note</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody id="itembody">
                            <tr id="firstrow">
                                <td>
                                    <select class="form-control">
                                        <option>ADCB</option>
                                        <option>XYZ</option>
                                    </select>
                                </td>
                                <td><input type="text" name="cheque_no[]" class="form-control"></td>
                                <td><input type="text" name="cheque_date[]" class="form-control"></td>
                                <td><input type="number" class="form-control amount decimal" name="amount[]"></td>
                                <td>
                                    <select class="form-control vDescription" name="type[]">

                                    </select>
                                </td>
                                <td><textarea rows="1" name="remark[]" class="form-control"></textarea></td>
                                <td>
                                    <button type="button" data-target="firstrow"
                                            class="btn btn-sm removeRow bg-gradient-danger"><i class="fa fa-times"></i>
                                    </button>
                                </td>
                            </tr>
                            <tfoot>
                            <tr>
                                <td colspan="7">
                                    <button type="button" class="btn btn-sm btn-success" id="addmore"><i class="fa fa-plus"></i> Add more
                                    </button>
                                </td>

                            </tr>
                            </tfoot>
                            </tbody></table>


                    </div>


                </div>
                <!-- /.row -->
                <div class="row">
                    <div class="col-12">
                        <button type="submit" class="btn btn-primary float-right">Submit</button>
                    </div>
                    <!-- /.col -->
                </div>

            </form>
            <!-- /.row -->
        </div>
        <!-- /.card-body -->
        <div class="card-footer">

        </div>
    </div>
    <!-- /.card 1-->

@endsection
@section('script')
    <script>
        $(document).ready(function () {

            $.ajaxSetup({headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')}});
            let td = "@foreach($trans_des as $td)<option value='{{$td}}'>{{str_replace('_', ' ', $td)}}</option>@endforeach";
            $(".vDescription").append(td);
            $("#addmore").click(function () {
                let uuid = uuidv4();
                $("#itembody").append('<tr id="' + uuid + '"><td> <select class="form-control"><option>ADCB</option><option>XYZ</option> </select></td><td><input type="text" name="cheque_no[]" class="form-control"></td><td><input type="text" name="cheque_date[]" class="form-control"></td><td><input type="number" class="form-control amount decimal" name="amount[]"></td><td> <select class="form-control vDescription" name="type[]">' + td + '</select></td><td><textarea rows="1" name="remark[]" class="form-control"></textarea></td><td> <button type="button" data-target="' + uuid + '" class="btn btn-sm removeRow bg-gradient-danger"><i class="fa fa-times"></i> </button></td></tr>');
            });


            $(document).on("click", "button.removeRow", function () {

                let target = $(this).data('target');

                $("#" + target).remove();
            });
            $(document).on("change", ".amount", function () {
                let totalAmt = 0;
                let thisval = 0 ;
                $('.amount').each(function () {
                    thisval  = $(this).val().length>0 ? $(this).val() : 0;
                    totalAmt = totalAmt + parseFloat(thisval);
                });
                totalAmt =  parseFloat(totalAmt).toFixed(2);
                $("#total_amount").val(totalAmt);
                $("#totalAmtTd").html(totalAmt);
            });

            let fetchProperty = "{{route('select2.property.post')}}";
            let fetchUnitByProperty = "{{route('select.units.by.prop')}}";
            let fetchtenant = "{{route('select2.tenant.post')}}";
            let createVoucher = "{{route('new.cheque.voucher.store')}}";

            $("#select_tenant").select2({
                placeholder: "Choose Payer...",
                minimumInputLength: 1,
                ajax: {
                    url: fetchtenant,
                    dataType: "json",
                    type: "POST",
                    data: function (e) {
                        return {
                            q: $.trim(e.term)
                        }
                    },
                    processResults: function (e) {
                        return {
                            results: e
                        }
                    },
                    cache: !0
                }
            });
            $("#property").select2({
                placeholder: "Choose Tower...",
                minimumInputLength: 1,
                ajax: {
                    url: fetchProperty,
                    dataType: "json",
                    type: "POST",
                    data: function (e) {
                        return {
                            q: $.trim(e.term)
                        }
                    },
                    processResults: function (e) {
                        return {
                            results: e
                        }
                    },
                    cache: !0
                }
            });


            $('#property').change(function (event) {
                let property = $(this).val();
                $.ajax({
                    url: fetchUnitByProperty,
                    type: 'POST',
                    dataType: 'json',
                    data: {propid: property},
                    cache: false,
                    success: function (result) {
                        $('#select_units').empty().trigger("change");
                        let newOpt = '';
                        let i = '0';
                        $.each(result, function (i, result) {
                            if (i == '0') {
                                let status = 'selected';
                            } else {
                                let status = '';
                            }
                            let x = i + 1;
                            let flat = '';
                            if (result.flat_house_no != null) {
                                flat = result.flat_house_no;
                            }
                            newOpt += '<option value="' + result.id + '" ' + status + '>Unit ' + x + ' ' + result.unitcode + '-' + flat + '</option>';
                            //newOpt+= new Option(result.id, result.unit_code, false, false);
                            i++;
                        })
                        // Append it to the select
                        $("#select_units").append(newOpt).trigger('change');
                        $("#select_units").select2();
                    },
                    error: function (result) {
                        console.log(result);
                    }
                });
            });

            $(document).on('submit', '#mainForm', function (e) {

                var formData = new FormData($(this)[0]);

                $.ajax({

                    url: createVoucher,

                    type: 'POST',

                    dataType: 'json',

                    data: formData,

                    cache: false,

                    processData: false,

                    contentType: false,

                    success: function (result) {

                        //console.log(result);

                        if (result.status == '1') {

                            $("#modalAddAcc").modal('hide');

                            alert(result.msg);

                            location.reload();




                        } else {
                            if(result.error_type=='validation'){

                            }else{
                                toast('error', result.msg, 'top-center');
                            }


                        }

                    },

                    error: function (result) {

                        console.log(result);

                    }

                });


                e.preventDefault();

            });
        });


        jQuery(document).ready(function () {
            Khagesh.setPage("newCashVoucher"); //Set current page
            Khagesh.init(); //Initialise plugins and elements
        });
    </script>
@endsection
