@extends('admin.layout.app')
@section("head")
    <link rel="stylesheet" href="{{asset('assets/plugins/icheck-bootstrap/icheck-bootstrap.min.css')}}">
@endsection
@include("admin.include.breadcrumb",["page_title"=>"Document Notification"])
@section('content')
    <div class="card">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table" id="dataTable">
                    <thead>
                    <tr>
                        <th>
                            <span class="icheck icheck-warning">
                                 <input  id="select_all_row" type="checkbox" class="hide select_all_row" value="">
                                <label for="select_all_row"></label>
                           </span>
                        </th>
                        <th>User</th>
                        <th>Document</th>
                        <th>Date Type</th>
                        <th>Date Value</th>
                    </tr>
                    </thead>
                    <tbody>

                    </tbody>
                </table>
            </div>
        </div>
        <div class="card-footer">
            <div class="form-group">
                <button id="send_notification_button" type="button" class="btn btn-outline-success">
                    Send Notification
                </button>
            </div>
        </div>
    </div>
@endsection
@section('script')
    <script>
        $(document).ready(function(){


             $(document).on("click",".select_all_row",function(){
                let cnt = $("#dataTable").find("tr").length;
                if($(".select_all_row").is(":checked"))
                {
                    for(let i=0;i<cnt;i++)
                    {
                      $("#dataTable").find("tr:eq("+i+")").find("td:eq(0)").find("input[type='checkbox']").prop("checked",true);
                    }
                }
                else
                {
                   for(let j=0;j<cnt;j++)
                  {
                    $("#dataTable").find("tr:eq("+j+")").find("td:eq(0)").find("input[type='checkbox']").prop("checked",false);
                  }
                }

            });


        function renderActionBtn(row)
        {
            return `<button type="button" data-id="${row.id}"  class="btn btn-primary"><i class="fa fa-paper-plane" aria-hidden="true"></i></button>`;
        }
        $.ajaxSetup({ headers:{'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')}});

            function checkboxes(row)
            {
                let checked = $(".select_all_row").is(":checked") ? "checked": null;

                return `<span class="icheck icheck-warning">
                         <input id="document_${row.id}" type="checkbox" class="hide" name="document_id[]" value="${row.id}" ${checked}>
                          <label for="document_${row.id}"></label>
                       </span>`;
            }


            $("#send_notification_button").on("click",function(){
                let len=$("#dataTable").find("tr").find("td:eq(0)").find("input[type='checkbox']:checked").length;
                if(!len)
                {
                   toast('error','Please select at least on row!','top-right');
                }
                else
                {
                    let url    = "{{route('send.document.expiry.notification')}}";
                    let params = new FormData();
                    let cnt    = $("#dataTable").find("tr").length;
                    for(let i=0;i<cnt;i++)
                    {
                        let checkbox = $("#dataTable").find("tr:eq("+i+")").find("td:eq(0)").find("input[type='checkbox']");
                      if(checkbox.is(":checked"))
                      {
                          params.append("document[]",checkbox.val());
                      }
                    }
                    function fn_success(result)
                    {
                        toast('success',result.message,'top-right');
                    }
                    function fn_error(result)
                    {
                        toast('error',result.message,'top-right');
                    }
                    $.fn_ajax_multipart(url,params,fn_success,fn_error);
                }

            })

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
                                { data : "file_url", name : "file_url",
                                    render:function(data,type,row,meta)
                                    {
                                        return `<a class="btn btn-info" target="_blank" href="${row.document_view_url}"><i class="fa fa-file"></i>View</a>
                                       <a class="btn btn-info"  href="${row.document_view_url}" download><i class="fa fa-file-download"></i>Download</a>`;
                                    }
                                },
                                { data : "date_key", name : "date_key" },
                                { data : "date_value", name : "date_value"},
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
