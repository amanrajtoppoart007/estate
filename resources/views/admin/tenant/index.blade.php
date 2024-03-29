@extends('admin.layout.app')
@section('content')
<h4 class="color-primary mb-4">All Tenants</h4>
<div class="items_list bg_transparent color-secondery icon_default">
    <a href="{{route('tenant.create')}}" class="btn btn-primary color-primary mb-4 float-right">Add New Tenant</a>
    <table id="dataTable"  class="w-100 display table table-striped table-hover">
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Email</th>
                <th>Broker</th>
                <th>Contract Status</th>
                <th>View Contract</th>
                <th>Status</th>
                <th>Action</th>
            </tr>
        </thead>
    </table>
</div>
@endsection
@section('script')
  <script>
     $(document).ready(function()
     {
      $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        })

        function responsiveToggle(dt) {
            $(dt.table().header()).find('th').toggleClass('all');
            dt.responsive.rebuild();
            dt.responsive.recalc();
        }
         function renderStatusBtn(data)
        {
            let status   = (parseInt(data.is_disabled))?'InActive':'Active';
            let btnColor = (parseInt(data.is_disabled))?'danger':'success';
            return `<a href="javascript:void(0)" data-status="${data.is_disabled}" data-id="${data.id}" class="btn btn-${btnColor} mr-3 changeStatusBtn">${status}</a>`;
        }
        let dataTable = $('#dataTable').DataTable({
              "order": [[ 0, "DESC" ]],
                  "dom": 'lBfrtip',
            responsive: true,
            "processing": true,
            "serverSide": true,
            "ajax": {
                url: "{{route('fetch.tenants')}}",
                type: "post",
                error: function() {
                    $(".users-error").html("");
                    $("#users").append('<tbody class="users-error"><tr><th colspan="3">No data found in the server</th></tr></tbody>');
                    $("#users_processing").css("display", "none");

                }
            },

            columns : [
                                { data : "id", name : "id"},
                                { data : "name", name : "name"},
                                { data : "email", name : "email",
                                     render: function(data, type, row, meta)
                                    {
                                      return `${row.mobile}  ${row.email}`;
                                    }
                                },
                                { data : null, name : "broker", render : function(data,type,row,meta){
                                    return null;
                                }},
                                { data : null, name : "contract_status",
                                render : function(data,type,row,meta){
                                    return null;
                                }
                                },
                                {
                                    data: null, name: "view_contract",
                                    render: function (data, type, row, meta) {
                                        return null;
                                    }
                                },
                                { data : "is_disabled", name : 'is_disabled',
                                    render: function(data, type, row, meta)
                                    {
                                      return renderStatusBtn(row);
                                    }
                                },
                                {
                                    data : null, name: 'action',searchable: false,orderable :false,
                                    render: function(data, type, row, meta)
                                    {
                                       return `<a href="${row.view_url}" class="btn btn-primary"><i class="fa fa-eye"></i></a><a href="${row.edit_url}" class="btn btn-info mr-3"><i class="fa fa-edit"></i></a>`;
                                    }
                                }
                              ],

            buttons: [

                'colvis',
                {
                    extend: 'collection',
                    text: 'Export',


                    buttons: [{
                            extend: 'print',
                             messageTop: 'All Tenant Lists',
                            exportOptions: {
                                columns: ':visible'
                            },
                            action: function(e, dt, button, config) {
                                responsiveToggle(dt);
                                $.fn.DataTable.ext.buttons.print.action(e, dt, button, config);
                                responsiveToggle(dt);
                            }
                        },
                        {
                            extend: 'pdf',
                            exportOptions: {
                                columns: ':visible'
                            }

                        }, {
                            extend: 'excelHtml5',
                            exportOptions: {
                                columns: ':visible'
                            }
                        }, {
                            extend: 'csv',
                            exportOptions: {
                                columns: ':visible'
                            }

                        }, {
                            extend: 'copy',
                            exportOptions: {
                                columns: ':visible'
                            }

                        },


                    ]
                }
            ]

        });
$(document).on('click','.changeStatusBtn',function(e){
    let statusBtn = $(this);
    e.preventDefault();
    var params = {
        'id'          : $(this).attr('data-id'),
        'is_disabled' : $(this).attr('data-status')
    }
    function fn_success(result)
    {
        statusBtn.replaceWith(renderStatusBtn(result.data));
    };
    function fn_error(result)
    {
        toast('error',result.message,'top-right');
    };
    $.fn_ajax('{{route('tenant.changeStatus')}}',params,fn_success,fn_error);
});

$("#sidebar-all-tenant").addClass("active");
     })
</script>

@endsection
