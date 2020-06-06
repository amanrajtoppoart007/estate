@extends('admin.layout.app')
@section('head')
<link rel="stylesheet" href="{{asset('DataTable/datatables.min.css')}}">
    <style type="text/css">
        .addItem{
            float: right;
            position: absolute;
            margin-top: 11px;
            margin-left: 3px;
            font-size: 19px;
            color: #40941d;
            cursor: pointer;
        }
    </style>
@endsection
@section('breadcrumb')
  <div class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h1 class="m-0 text-dark">Invoice Create</h1>
            </div>
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}">Home</a></li>
                <li class="breadcrumb-item active">Invoice Create</li>
              </ol>
            </div>
          </div>
        </div>
      </div>
  @endsection
@section('content')



        <div class="card">
            <div class="card-header"> <h6> <strong>Invoice: {{$invoice_no}}</strong> <strong class="float-right">Party: </strong></h6>

            </div>
            <div class="card-body table-responsive">
              <form id="MainForm">
                <input type="hidden" name="invoice" value="">
              <table id="dataTables"  class="w-100 display table table-striped table-hover">
            <thead>
                <tr>

                    <th>Item</th>
                    <th>Unit Price</th>
                    <th>Quantity</th>
                    <th>Property</th>
                    <th>Amount</th>
                    </tr>
            </thead>
            <tbody id="tableBody">
                <tr>
                    <td>
                        <select id="row1" name="item[]" class=" item-select" style="width:100%"></select>
                    <i class="fa fa-plus-circle addItem" data-toggle="modal" data-target="#itemModal"></i>

                    </td>
                    <td><input class="form-control unitprice" name="unit[]"></td>
                    <td><input class="form-control qty" name="qty[]"></td>
                    <td>
                      <select name="property[]" data-unit="1" class="form-control select-property" style="width:100%"></select>
                      <select name="unit[]" id="unit1" class="form-control select-unit" style="width:100%"></select>
                    </td>
                    <td><input class="form-control amt" name="amt[]" readonly></td>
                </tr>

            </tbody>
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
    $('.select-property').change(function(event) {
        var unitid = $(this).data("unit");
        var property = $(this).val();
        $.ajax({
            url: "{{route('select.units.by.prop')}}",
            type: 'POST',
            dataType: 'json',
            data: {propid:property},
            cache: false,
            success: function(result) {
                $('#select_units').empty().trigger("change");
                var newOpt = '';
                var i = '0';
                $.each(result,function(i,result) {
                    if(i=='0'){
                        var status ='selected';
                    }else{
                        var status= '';
                    }
                    var x = i+1;
                    var flat = '';
                    if(result.flat_house_no!=null){
                        var flat = result.flat_house_no;
                    }
                    newOpt+='<option value="'+result.id+'" '+status+'>Unit '+x+' '+result.unitcode+'-'+flat+'</option>';
                    //newOpt+= new Option(result.id, result.unit_code, false, false);
                    i++;
                })
                // Append it to the select
                $("#unit"+unitid).append(newOpt).trigger('change');

            },
            error: function(result) {
                console.log(result);
            }
        });
    });
    $(".select-property").select2({
        placeholder: "Choose Property...",
        minimumInputLength: 2,
        ajax: {
            url: fetchProperty,
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
$("#addmore").click(function () {
    var id = uuidv4();
    var rowelements = '<tr><td> <select id="row'+id+'" name="item[]" class=" item-select" style="width:100%"></select> <i class="fa fa-plus-circle addItem"></i></td><td><input class="form-control unitprice" name="unit[]"></td><td><input class="form-control qty" name="qty[]"></td><td> <select name="property[]" data-unit="'+id+'" class="form-control select-property" style="width:100%"></select> <select name="unit[]" id="unit'+id+'" class="form-control select-unit" style="width:100%"></select></td><td><input class="form-control amt" name="amt[]" readonly></td></tr>';
    $('#tableBody').append(rowelements);
    callagain();
})
      $(document).ready(function(){

  $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });


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
        url: "{{route('invoice.create')}}",
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
 event.preventDefault();
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
 event.preventDefault();
});


    });




 </script>
@endsection
