@extends('admin.layout.app')
@section('breadcrumb')
<div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Property Sales</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}">Home</a></li>
              <li class="breadcrumb-item active">Property Sales</li>
            </ol>
          </div>
        </div>
      </div>
    </div>
@endsection
@section('content')
<div class="card">
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable">
                <thead>
                    <tr>
                        <th>Property</th>
                        <th>UnitCode</th>
                        <th>Buyer</th>
                        <th>Owner</th>
                        <th>Agent</th>
                        <th>Selling Price</th>
                        <th>Booking Amount</th>
                        <th>Created at</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                </thead>
            </table>
        </div>
    </div>
</div>
@endsection
@section('modal')
{{Form::open(['id'=>'upload_docs_form'])}}
<input type="hidden" name="property_sales_id" id="property_sales_id" value="">
<div class="modal" tabindex="-1" role="dialog" id="upload_docs_modal">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Upload Documents</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
         <div class="row">
             <div class="col-12 col-md-4 col-lg-4 col-xl-4">
                 <div class="form-group">
                     <label for="mulkia_by_owner">Mulkia By Owner</label>
                    <div class="input-group">
                        <div class="input-group-prepend">
                        <div class="input-group-text">@</div>
                        </div>
                        <input type="file" class="form-control" id="mulkia_by_owner" name="mulkia_by_owner" placeholder="">
                    </div>
                 </div>
             </div>
             <div class="col-12 col-md-4 col-lg-4 col-xl-4">
                 <div class="form-group">
                     <label for="mulkia_by_buyer">Mulkia By Buyer</label>
                    <div class="input-group">
                        <div class="input-group-prepend">
                        <div class="input-group-text">@</div>
                        </div>
                        <input type="file" class="form-control" id="mulkia_by_buyer" name="mulkia_by_buyer" placeholder="">
                    </div>
                 </div>
             </div>
             <div class="col-12 col-md-4 col-lg-4 col-xl-4">
                 <div class="form-group">
                    <label for="sell_agreement">Sale Agreement</label>
                    <div class="input-group">
                        <div class="input-group-prepend">
                        <div class="input-group-text">@</div>
                        </div>
                        <input type="file" class="form-control" id="sell_agreement" name="sell_agreement" placeholder="">
                    </div>
                 </div>
             </div>
         </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>
{{Form::close()}}
{{Form::open(['id'=>'complete_sell_form'])}}
<input type="hidden" name="id" id="id" value="">
<div class="modal" tabindex="-1" role="dialog" id="complete_sell_modal">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Upload Documents</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
         <div class="row">
             <div class="col-12 col-md-4 col-lg-4 col-xl-4">
                 <div class="form-group">
                    <label for="title_deed">Title Deed</label>
                    <div class="input-group">
                        <div class="input-group-prepend">
                        <div class="input-group-text">@</div>
                        </div>
                        <input type="file" class="form-control" id="title_deed" name="title_deed" placeholder="">
                    </div>
                 </div>
             </div>
         </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>
{{Form::close()}}
@endsection
@section('script')
<script>
     $(document).ready(function()
     {
        function renderStatusBtn(data)
        {
            let status   = null;
            let btnColor = null;
            let action    = '';
            switch (data.status) {
                case 0:
                    status   = 'INITIATED';
                    btnColor = 'danger';
                    action    = 'openUploadDocModalBtn';
                    break;
                case 1:
                    status   = 'REG_INIT';
                    btnColor = 'warning';
                    action   = 'openCompleteSellModalBtn';
                    break;
                case 2:
                    status   = 'REG/COMPLETE';
                    btnColor = 'success';
                    break;
            }
            return `<a href="javascript:void(0)"  data-status="${data.status}" data-id="${data.id}" class=" text-white btn btn-${btnColor} mr-3 ${action}">${status}</a>`;
        }
        function renderActionBtn(data)
        {
            return `<a target="_blank" href="${data.view_url}"  class="btn btn-primary"><i class="fa fa-eye text-white"></i></a>`;
        }
        $.ajaxSetup({ headers:{'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')}});
        var dataTable = $("#dataTable").dataTable({
                        dom   : '<"dt-buttons"Bf><"clear">lirtp',
                 processing   : true,
                   serverSide : true,
                    responsive: false,
                    stateSave: true,
                    "order": [[ 0, "desc" ]],
                        ajax  : {
                       url    : "{{route('propertySales.fetch')}}",
                       type   : "POST",
                       data   : null,
                       error  : function(jqXHR,textStatus,errorThrown)
                       {
                           $.swal(textStatus,errorThrown,'error');
                       }

                   },
                     columns : [
                                { data : "property_title", name : "property_title"},
                                { data : "unit_code", name : "unit_code"},
                                { data : "buyer_name",    name : "buyer_name"},
                                { data : "owner_name",    name : "owner_name"},
                                { data : "agent_name",    name : "agent_name"},
                                { data : "selling_price",name : "selling_price"},
                                { data : "booking_amount",name : "booking_amount"},
                                { data : "created_at",name : "created_at"},
                                { data : "status", name : 'status',
                                    render: function(data, type, row, meta) 
                                    {
                                      return renderStatusBtn(row);
                                    }
                                },
                                {
                                    data : null, name: 'action',searchable: false,orderable :false,
                                    render: function(data, type, row, meta) 
                                    {
                                    return renderActionBtn(row);
                                    }
                                }
                              ],
                              "buttons": ['colvis',
                              {
                                    extend: 'copyHtml5',
                                    exportOptions: {
                                        columns: [0,1,2,3,4]
                                    }
                                },
                              {
                                    extend: 'csvHtml5',
                                    exportOptions: {
                                        columns: [0,1,2,3,4]
                                    }
                                },
                              {
                                    extend: 'excelHtml5',
                                    exportOptions: {
                                        columns: [0,1,2,3,4]
                                    }
                                },
                              {
                                    extend: 'pdfHtml5',
                                    exportOptions: {
                                        columns: [0,1,2,3,4]
                                    }
                                },
                              {
                                    extend: 'print',
                                    title : 'State List',
                                    exportOptions: 
                                    {
                                        columns: [0,1,2,3,4]
                                    }
                                }
            ],
              });
              $(document).on('click','.openUploadDocModalBtn',function(e){
                  $("#property_sales_id").val($(this).attr('data-id'));
                  $("#upload_docs_modal").modal('show');
              });
              
              $("#upload_docs_form").on('submit',function(e){
                  e.preventDefault();
                  var url = "{{route('sale.upload.docs')}}";
                  var params = new FormData(document.getElementById('upload_docs_form'));
                  function fn_success(result)
                  {
                     toast('success',result.message,'top-right');
                     $("#upload_docs_modal").modal('hide');
                     $("#property_sales_id").val('');
                     $("#upload_docs_form")[0].reset();
                     dataTable.api().ajax.reload();
                  };
                  function fn_error(result)
                  {
                      
                      toast('error',result.message,'top-right');
                  };
                  $.fn_ajax_multipart(url,params,fn_success,fn_error);

              });
              $(document).on('click','.openCompleteSellModalBtn',function(e){
                  $("#id").val($(this).attr('data-id'));
                  $("#complete_sell_modal").modal('show');
              });
              $("#complete_sell_form").on('submit',function(e){
                  e.preventDefault();
                  var url = "{{route('complete.property.sell')}}";
                  var params = new FormData(document.getElementById('complete_sell_form'));
                  function fn_success(result)
                  {
                     toast('success',result.message,'top-right');
                     $("#complete_sell_modal").modal('hide');
                     $("#id").val('');
                     $("#complete_sell_form")[0].reset();
                     dataTable.api().ajax.reload();
                  };
                  function fn_error(result)
                  {
                      toast('error',result.message,'top-right');
                  };
                  $.fn_ajax_multipart(url,params,fn_success,fn_error);

              });
     });
</script>
@endsection