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
                                <select class="form-control">
                                    <option>Select Tower</option>
                                </select>
                            </td>
                            <td></td>
                        </tr>
                        <tr>
                            <td style="width: 21%;">Flat Number</td>
                            <td>
                                <select class="form-control">
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
                            <th>Type</th>
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


        });
    </script>
@endsection
