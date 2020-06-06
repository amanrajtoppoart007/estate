@extends('admin.layout.app')
@section('head')
<link rel="stylesheet" href="{{asset('DataTable/datatables.min.css')}}">
@endsection
@section('content')
    <h4 class="color-primary mb-4">Tenant Moveout/Evict</h4>
    <div class="items_list bg_transparent color-secondery icon_default">
        <table id="dataTable"  class="w-100 display table table-striped table-hover">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Tenant</th>
                    <th>Property</th>
                    <th>Remark</th>
                    <th>Status</th>
                    <th>Action</th>
                </tr>
            </thead>
        </table>
    </div>            
@endsection
@section('script')
<script src="{{asset('DataTable/datatables.min.js')}}"></script>
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
        var dataTable = $('#dataTable').DataTable({
      "order": [[ 0, "DESC" ]],

            responsive: true,
            "processing": true,
            "serverSide": true,
            "ajax": {
                url: "{{route('fetch.remove.req')}}",
                type: "post",
                error: function() {
                    $(".users-error").html("");
                    $("#users").append('<tbody class="users-error"><tr><th colspan="3">No data found in the server</th></tr></tbody>');
                    $("#users_processing").css("display", "none");

                }
            },

            "aoColumns": [{
                    data: 'id'
                },
                {
                    data: 'name'
                },
                {
                    data: 'unitcode'
                },
                {
                    data: 'remark'
                },
 {
                    data: null
                },
 {
                    data: null
                }

               
            ],
            "columnDefs": [
      {
                    targets: 5,
                    orderable: false,
                    visible: true,
                    /*This will hide particular column*/
                    render: function(data, type, row, meta) 
                    {
                        return '<button class="btn btn-success mr-3" data-id="'+data.id+'" data-action="1">Accept</button><button class="btn btn-danger mr-3" data-id="'+data.id+'" data-action="2">Reject</button>';
                    }
                },


                {
                    "targets": 0,
                    orderable: true,
                    "data": "id",
                    render: function( type, row, data, meta) {
                        return data.id;
                    }
                },

                {
                    "targets": 4,
                    orderable: true,
                    "data": "id",
                    render: function( type, row, data, meta) {
                        if(data.status=='0'){
                            var status = 'PENDING';
                        }else if(data.status=='1'){
                            var status = 'ACCEPTED';
                        }else{
                            var status = 'IGNORED';
                        }
                        return status;
                    }
                }


            ],


            "dom": 'lBfrtip',
            buttons: [

                'colvis',
                {
                    extend: 'collection',
                    text: 'Export',


                    buttons: [{
                            extend: 'print',
                             messageTop: 'Tenant remove request',
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
$('#dataTable tbody').on( 'click', 'button.btn-success, button.btn-danger', function () {
                $(this).parents('tr').hide(1000);
               var id = $(this).data('id');
               var action = $(this).data('action');
                           var formData = {
                               id: id,
                               action:action
                           }
                          
                           $.ajax({
                               type: "POST",
                               url: "{{route('update.remove.actions')}}",
                               data: formData,
                               dataType: 'json',
                               success: function(data) {
                                 if(data.status=='1'){
                                   dataTable.row( $(this).parents('tr') ).draw(false);
                                  alert(data.msg);
                                 }else{
                                    alert(data.msg);
                                 }
                               },
                               error: function(data) {
                                   console.log('Error:', data);
                               }
                           });
                    });






        // $("#sidebar-tasks").addClass("active"); 
     })
</script>

@endsection