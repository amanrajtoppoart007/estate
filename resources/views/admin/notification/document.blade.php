@extends('admin.layout.app')
@include("admin.include.breadcrumb",["page_title"=>"Document Notification"])
@section('content')
    <div class="card">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table" id="dataTable">
                    <thead>
                    <tr>
                        <th>Sr.</th>
                        <th>User</th>
                        <th>Document</th>
                        <th>Date Type</th>
                        <th>Date Value</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>

                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
@section('script')
    <script>
        $(document).ready(function(){


        function renderActionBtn(row)
        {
            return `<button type="button" data-id="${row.id}"  class="btn btn-primary"><i class="fa fa-paper-plane" aria-hidden="true"></i></button>`;
        }
        $.ajaxSetup({ headers:{'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')}});

            function checkboxes(row)
            {
                return `<input type="checkbox" class="form-control input-sm" name="document_id[]" value="${row.id}">`;
            }

            let dataTable = $("#dataTable").dataTable({
                        dom   : '<"dt-buttons"Bf><"clear">lirtp',
                 processing   : true,
                   serverSide : true,
                    responsive: false,
                    stateSave: true,
                    "order": [[ 0, "desc" ]],
                        ajax  : {
                       url    : "{{route('document.fetch')}}",
                       type   : "POST",
                       data   : function(d){
                        d.expiry_date = "expiry_date"
                       },
                       error  : function(jqXHR,textStatus,errorThrown)
                       {
                           $.swal(textStatus,errorThrown,'error');
                       }

                   },
                     columns : [
                                { data : "id", name : "id",
                                    render :function(data, type, row, meta)
                                    {
                                        return checkboxes(row)
                                    }
                                },
                                { data : "archive_type", name : "archive_type"},
                                { data : "file_url", name : "file_url"},
                                { data : "date_key", name : "date_key" },
                                { data : "date_value", name : "date_value"},
                                {
                                    data : null, name: "action",searchable: false,orderable :false,
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
        });
    </script>
@endsection
