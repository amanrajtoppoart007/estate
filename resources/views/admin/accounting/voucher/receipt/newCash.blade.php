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
                        <li class="breadcrumb-item active">New Cash</li>
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
            <h3 class="card-title">New Receipt Voucher Cash</h3>

            <div class="card-tools">

            </div>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
            <div class="row">
                <div class="col-md-12">
                    <table class="table table-bordered">
                        <tr>
                            <td style="width: 21%;">Voucher Date</td>
                            <td>20/09/2020</td>
                            <td></td>
                        </tr>
                        <tr>
                            <td style="width: 21%;">Voucher No.</td>
                            <td>4564</td>
                            <td></td>
                        </tr>
                        <tr>
                            <td style="width: 21%;">Received From Mr./M/s</td>
                            <td><select class="form-control">
                                    <option>Select Payer</option>
                                </select></td>
                            <td></td>
                        </tr>
                        <tr>
                            <td style="width: 21%;">Amount</td>
                            <td>0</td>
                            <td></td>
                        </tr>
                        <tr>
                            <td style="width: 21%;">The Sum of Dhs</td>
                            <td></td>
                            <td></td>
                        </tr>
                        <tr>
                            <td style="width: 21%;">Tower Name</td>
                            <td>
                                <select class="form-control" id="property" name="property" style="width: 100%">
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
                            <th>Description</th>
                            <th>Amount</th>
                            <th>Remark/Note</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                            <td>
                                <select class="form-control">
                                <option>Booking Fees</option>
                                </select>
                            </td>
                            <td>0</td>
                            <td><textarea class="form-control"></textarea></td>
                        </tr>  <tr>
                            <td>
                                <select class="form-control">
                                <option>Booking Fees</option>
                                </select>
                            </td>
                            <td>0</td>
                            <td><textarea class="form-control"></textarea></td>
                        </tr>  <tr>
                            <td>
                                <select class="form-control">
                                <option>Booking Fees</option>
                                </select>
                            </td>
                            <td>0</td>
                            <td><textarea class="form-control"></textarea></td>
                        </tr>  <tr>
                            <td>
                                <select class="form-control">
                                <option>Booking Fees</option>
                                </select>
                            </td>
                            <td>0</td>
                            <td><textarea class="form-control"></textarea></td>
                        </tr>  <tr>
                            <td>
                                <select class="form-control">
                                <option>Booking Fees</option>
                                </select>
                            </td>
                            <td>0</td>
                            <td><textarea class="form-control"></textarea></td>
                        </tr>


                        </tbody>
                    </table>
                </div>





            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-12">

                </div>
                <!-- /.col -->
            </div>


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
    let fetchProperty  = "{{route('select2.property.post')}}";
    let fetchUnitByProperty  = "{{route('select.units.by.prop')}}";
            $("#property").select2({
                placeholder: "Choose Tower...",
                minimumInputLength: 1,
                ajax: {
                    url: fetchProperty,
                    dataType: "json",
                    type : "POST",
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


            $('#property').change(function(event) {
                let property = $(this).val();
                $.ajax({
                    url: fetchUnitByProperty,
                    type: 'POST',
                    dataType: 'json',
                    data: {propid:property},
                    cache: false,
                    success: function(result) {
                        $('#select_units').empty().trigger("change");
                        let newOpt = '';
                        let i = '0';
                        $.each(result,function(i,result) {
                            if(i=='0'){
                                let status ='selected';
                            }else{
                                let status= '';
                            }
                            let x = i+1;
                            let flat = '';
                            if(result.flat_house_no!=null){
                                 flat = result.flat_house_no;
                            }
                            newOpt+='<option value="'+result.id+'" '+status+'>Unit '+x+' '+result.unitcode+'-'+flat+'</option>';
                            //newOpt+= new Option(result.id, result.unit_code, false, false);
                            i++;
                        })
                        // Append it to the select
                        $("#select_units").append(newOpt).trigger('change');
                        $("#select_units").select2();
                    },
                    error: function(result) {
                        console.log(result);
                    }
                });
            });
        });
    </script>
@endsection
