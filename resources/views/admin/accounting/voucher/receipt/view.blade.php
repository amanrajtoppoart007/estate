@extends('admin.layout.accounting')
@section('css')
    <style>
    .spanBox{

        border: 1px solid;
        padding: 2px 9px 2px 9px;
    }
    </style>
@endsection
@section('breadcrumb')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">View Receipt Voucher [Static Example]</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}">Home</a></li>
                        <li class="breadcrumb-item active">Accounting</li>
                        <li class="breadcrumb-item active">Voucher</li>
                        <li class="breadcrumb-item active">View Receipt Voucher</li>
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
            <h3 class="card-title">Receipt Voucher</h3>

            <div class="card-tools">
                <button class="btn btn-sm btn-primary" id="printVoucher">Print</button>
            </div>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
            <div class="row">
                <div class="col-md-3">
                   Dhs F<br>
                    <span class="spanBox">----</span><span class="spanBox">00</span>
                </div>
                <div class="col-md-6 text-center">
                    <h5>Receipt Voucher/Cash</h5>
                </div>
                <div class="col-md-3">
                    Voucher No. <b>78</b>
                    <br>
                    Voucher Date 08/07/2020

                </div>




            </div>
            <!-- /.row -->
            <div class="row mt-2">
                <div class="col-3">
                Received From Mr./M/S
                </div>
                <div class="col-6">

                </div>
                <div class="col-3">

                </div>
                <!-- /.col -->
            </div>
            <div class="row mt-2">
                <div class="col-3">
               The sum of Dhs
                </div>
                <div class="col-6">

                </div>
                <div class="col-3">

                </div>
                <!-- /.col -->
            </div>
            <div class="row mt-2">
                <div class="col-3">
                    Beign
                </div>
                <div class="col-6">

                </div>
                <div class="col-3">

                </div>
                <!-- /.col -->
            </div>
            <div class="row mt-2">
                <div class="col-3">
                    Flat No.
                </div>
                <div class="col-3">

                </div>
                <div class="col-3">
                Tower Name
                </div>
                <div class="col-3">
                </div>
                <!-- /.col -->
            </div>
            <div class="row mt-2">
                    <table class="table table-bordered">
                        <thead>
                        <tr>
                            <th>Description</th>
                            <th>Amount</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                            <td>Maintenance Fee</td>
                            <td>454.00</td>
                        </tr>
                        <tr>
                            <td>Registration Fee</td>
                            <td>454.00</td>
                        </tr>
                        <tr>
                            <td>Contract Fee</td>
                            <td>454.00</td>
                        </tr>
                        </tbody>
                    </table>
            </div>

            <!-- /.row -->
        </div>
        <!-- /.card-body -->
        <div class="card-footer">

        </div>
    </div>
    <!-- /.card 1-->
    <!-- card 2 -->
    <div class="card card-default">
        <div class="card-header">
            <h3 class="card-title">Receipt Voucher</h3>

            <div class="card-tools">
            <button class="btn btn-sm btn-primary">Print</button>
            </div>
        </div>
        <!-- /.card-header -->
        <div class="card-body" id="printVoucherArea">
            <div class="row">
                <div class="col-md-3">
                    Dhs F<br>
                    <span class="spanBox">----</span><span class="spanBox">00</span>
                </div>
                <div class="col-md-6 text-center">
                    <h5>Receipt Voucher/Cheque</h5>
                </div>
                <div class="col-md-3">
                    Voucher No. <b>78</b>
                    <br>
                    Voucher Date 08/07/2020

                </div>




            </div>
            <!-- /.row -->
            <div class="row mt-2">
                <div class="col-3">
                    Received From Mr./M/S
                </div>
                <div class="col-6">

                </div>
                <div class="col-3">

                </div>
                <!-- /.col -->
            </div>
            <div class="row mt-2">
                <div class="col-3">
                    The sum of Dhs
                </div>
                <div class="col-6">

                </div>
                <div class="col-3">

                </div>
                <!-- /.col -->
            </div>
            <div class="row mt-2">
                <div class="col-3">
                    Beign
                </div>
                <div class="col-6">

                </div>
                <div class="col-3">

                </div>
                <!-- /.col -->
            </div>
            <div class="row mt-2">
                <div class="col-3">
                    Flat No.
                </div>
                <div class="col-3">

                </div>
                <div class="col-3">
                    Tower Name
                </div>
                <div class="col-3">
                </div>
                <!-- /.col -->
            </div>
            <div class="row mt-2">
                <table class="table table-bordered">
                    <thead>
                    <tr>
                        <th>Bank</th>
                        <th>Cheque No.</th>
                        <th>Cheque Date</th>
                        <th>Amount</th>
                        <th>Description</th>
                        <th>Amount</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <td>ADCB</td>
                        <td>76876878</td>
                        <td>01/10/2020</td>
                        <td>500.00</td>
                        <td>Maintenance Fee</td>
                        <td>454.00</td>
                    </tr> <tr>
                        <td>ADCB</td>
                        <td>76876878</td>
                        <td>01/10/2020</td>
                        <td>500.00</td>
                        <td>Maintenance Fee</td>
                        <td>454.00</td>
                    </tr> <tr>
                        <td>ADCB</td>
                        <td>76876878</td>
                        <td>01/10/2020</td>
                        <td>500.00</td>
                        <td>Maintenance Fee</td>
                        <td>454.00</td>
                    </tr> <tr>
                        <td>ADCB</td>
                        <td>76876878</td>
                        <td>01/10/2020</td>
                        <td>500.00</td>
                        <td>Maintenance Fee</td>
                        <td>454.00</td>
                    </tr>

                    </tbody>
                </table>
            </div>

            <!-- /.row -->
        </div>
        <!-- /.card-body -->
        <div class="card-footer">

        </div>
    </div>
    <!-- /.card 2-->

@endsection
@section('script')
    <script src="{{asset('plugin/print/printThis.js')}}"></script>
    <script>
        $(document).ready(function () {

            $.ajaxSetup({headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')}});

            $("#printVoucher").click(function(){
             
                $("#printVoucherArea").printThis({
                    debug: true,               // show the iframe for debugging
                    importCSS: true,            // import parent page css
                    importStyle: false,         // import style tags
                    printContainer: true,       // print outer container/$.selector
                    loadCSS: "",                // path to additional css file - use an array [] for multiple
                    pageTitle: "Receipt Print out",              // add title to print page
                    removeInline: false,        // remove inline styles from print elements
                    removeInlineSelector: "*",  // custom selectors to filter inline styles. removeInline must be true
                    printDelay: 333,            // variable print delay
                    header: null,               // prefix to html
                    footer: null,               // postfix to html
                    base: false,                // preserve the BASE tag or accept a string for the URL
                    formValues: true,           // preserve input/form values
                    canvas: false,              // copy canvas content
                    doctypeString: '...',       // enter a different doctype for older markup
                    removeScripts: false,       // remove script tags from print content
                    copyTagClasses: true,      // copy classes from the html & body tag
                    beforePrintEvent: null,     // function for printEvent in iframe
                    beforePrint: null,          // function called before iframe is filled
                    afterPrint: null            // function called before iframe is removed
                });
            });
        });
    </script>
@endsection
