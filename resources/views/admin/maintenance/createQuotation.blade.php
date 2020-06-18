@extends('admin.layout.app')
@section('head')
<link rel="stylesheet" href="{{asset('DataTable/datatables.min.css')}}">
<style type="text/css">
    .addItem{
        float: right;
        position: absolute;
        margin-top: 11px;
        z-index: 4;
        margin-left: 106px;
        font-size: 19px;
        color: #40941d;
        cursor: pointer;
    }
    .table td, .table th {
        padding: 0.05rem;
        vertical-align: top;
        border-top: 1px solid #dee2e6;
    }
</style>
@endsection
@section('breadcrumb')
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark">Quotation Create</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}">Home</a></li>
                    <li class="breadcrumb-item active">Quotation Create</li>
                </ol>
            </div>
        </div>
    </div>
</div>
@endsection
@section('content')



<div class="card" style="font-size: 11px;">
    <div class="card-header"> <h6> <strong>Quotation: </strong> <strong class="float-right">: </strong></h6>

    </div>
    <div class="card-body table-responsive">
        <div class="row">

                <div class="col-md-2">
                    <label>Voucher No.</label>
                    <input type="text" class="form-control" name="voucher_number">
                </div>
            <div class="col-md-2">
                <label>Date</label>
                    <input type="text" class="form-control" name="date">
                </div>
            <div class="col-md-4">
                <label>Customer</label>
                    <input type="text" class="form-control" name="customer">
                </div>
            <div class="col-md-2">
                <label>Reference No.</label>
                    <input type="text" class="form-control" name="ref_no">
                </div>
            <div class="col-md-2">
                <label>Reference Date</label>
                    <input type="text" class="form-control" name="ref_date">
                </div>

        </div>
        <form id="MainForm">
            <input type="hidden" name="invoice" value="">
            <table id="dataTables"  class="w-100 display table table-striped table-hover">
                <thead>
                <tr>

                    <th>S.No.</th>
                    <th>Code</th>
                    <th>Item</th>
                    <th>Description</th>
                    <th>Ref Qty</th>
                    <th>Unit</th>
                    <th>Ref Rate</th>
                    <th>Ref Amt</th>
                    <th>Tax</th>
                    <th>Tax Amt</th>
                    <th>Net Amt</th>
                </tr>
                </thead>
                <tbody id="tableBody">
                <tr>
                    <td>
                        <i class="fa fa-plus-circle addItem" data-toggle="modal" data-target="#itemModal"></i>
                        <select id="row1" name="item[]" class=" item-select" style="width:100%"></select>

                    </td>
                    <td><input class="form-control unitprice" name="unit[]"></td>
                    <td><input class="form-control" name=""></td>
                    <td><input class="form-control" name="">
                    </td>
                    <td><input class="form-control" name=""></td>
                    <td><input class="form-control" name=""></td>
                    <td><input class="form-control" name=""></td>
                    <td><input class="form-control" name=""></td>
                    <td><input class="form-control" name=""></td>
                    <td><input class="form-control qty" name="qty[]"></td>

                    <td><input class="form-control amt" name="amt[]" readonly></td>
                </tr>

                </tbody>
                <tfoot>
                <tr>
                    <td>
                        <label>Total Amount</label>
                        <input type="text" class="form-control">
                    </td>
                    <td colspan="7"></td>

                    <td>
                        <label>Additions</label>
                        <input type="text" class="form-control">
                    </td>
                    <td>
                        <label>Deductions</label>
                        <input type="text" class="form-control">
                    </td>
                    <td>
                        <label>Net Amounts</label>
                        <input type="text" class="form-control">
                    </td>
                </tr>
                </tfoot>
            </table></form>
        <div class="row">
            <div class="col-md-2"><button type="button" class="btn btn-primary" id="addmore">Add more</button></div>
            <div class="col-md-10"></div>
        </div>
    </div>
</div>





@endsection
@section('modal')
<div class="modal fade" id="itemModal"  aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <form id="itemForm">
                <div class="modal-header">
                    <h4 class="modal-title">Create new item</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="row">

                        <div class="col-md-12">
                            <label>Item Title</label>
                            <input type="text" class="form-control" name="title" autocomplete="off">
                            <label>Per unit price</label>
                            <input type="text" class="form-control" name="price" autocomplete="off">
                        </div>

                    </div>
                </div>
                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Add Item</button>
                </div>
            </form>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
@endsection
@section('script')

<script>

    var paymentStore =  "{{route('store.invoice.payment')}}";
    var fetchitem =  "{{route('fetch.items.select2')}}";
    var fetchProperty =  "{{route('select2.property.post')}}";
    function uuidv4() {
        return 'xxxx-4xxx-yxxx'.replace(/[xy]/g, function(c) {
            var r = Math.random() * 16 | 0, v = c == 'x' ? r : (r & 0x3 | 0x8);
            return v.toString(16);
        });
    }
    function callagain(){
        $(".item-select").select2({
            placeholder: "Choose item...",
            minimumInputLength: 2,
            ajax: {
                url: fetchitem,
                dataType: "json",
                type: "POST",
                data: function(e) {
                    return {
                        q: $.trim(e.term),
                        //type: $(".item-select").val()
                    }
                },
                processResults: function(e) {
                    return {
                        results: e
                    }
                },
                cache: !0
            }
        });


    }
    callagain();
    $(document).on('click',".addItem",function () {
        $("#itemModal").modal('show');
    });

    $("#addmore").click(function () {
        var id = uuidv4();
        var rowelements = '<tr><td> <select id="row'+id+'" name="item[]" class=" item-select" style="width:100%"></select></td><td><input class="form-control unitprice" name="unit[]"></td> <td><input class="form-control" name=""></td>\n' +
            '                    <td><input class="form-control" name=""></td>\n' +
            '                    <td><input class="form-control" name=""></td>\n' +
            '                    <td><input class="form-control" name=""></td>\n' +
            '                    <td><input class="form-control" name=""></td>\n' +
            '                    <td><input class="form-control" name=""></td>\n' +
            '                    <td><input class="form-control" name=""></td><td><input class="form-control qty" name="qty[]"></td><td><input class="form-control amt" name="amt[]" readonly></td></tr>';
        $('#tableBody').append(rowelements);
        callagain();
    })
    $(document).ready(function(){

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
$('body').addClass('sidebar-collapse');

        $(".unitprice").change(function () {
            var qty = $(this).closest('tr').find('.qty').val();
            var unitprice = $(this).val();
            var amount = qty*parseFloat(unitprice);
            $(this).closest('tr').find('.amt').val(amount);

        });
        $(".qty").change(function () {
            var  qty = $(this).val();
            var unitprice = $(this).closest('tr').find('.unitprice').val();
            var amount = qty*parseFloat(unitprice);
            $(this).closest('tr').find('.amt').val(amount);

        })


        $(document).on('submit', '#MainForm', function(e) {
            //swal ( "Success" , result.msg,  "success" );
            var formData = new FormData($(this)[0]);


            $.ajax({
                url: "{{route('invoice.create.post')}}",
                type: 'POST',
                dataType: 'json',
                data: formData,
                cache : false,
                processData: false,
                contentType: false,
                success: function(result)
                {
                    //console.log(result);
                    if(result.status=='1'){

                        swal.fire( "Success" , result.msg,  "success" );
                        location.reload();

                    }else{
                        toast('error',result.msg,'top-center');
                    }
                },
                error: function(result)
                {
                    console.log(result);
                }
            });
            //console.log(formData);
            e.preventDefault();
        }); $(document).on('submit', '#itemForm', function(e) {
            //swal ( "Success" , result.msg,  "success" );
            var formData = new FormData($(this)[0]);


            $.ajax({
                url: "{{route('store.items')}}",
                type: 'POST',
                dataType: 'json',
                data: formData,
                cache : false,
                processData: false,
                contentType: false,
                success: function(result)
                {
                    //console.log(result);
                    if(result.status=='1'){

                        swal.fire( "Success" , result.msg,  "success" );
                        //location.reload();

                    }else{
                        toast('error',result.msg,'top-center');
                    }
                },
                error: function(result)
                {
                    console.log(result);
                }
            });
            //console.log(formData);
            e.preventDefault();
        });


    });




</script>
@endsection
