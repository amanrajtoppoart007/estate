@extends('admin.layout.app')
@section('content')
<h4 class="color-primary mb-4">Upcoming Tenancy Renewal</h4>
<div class="items_list bg_transparent color-secondery icon_default">
    <a href="{{route('tenant.create')}}" class="btn btn-primary color-primary mb-4 float-right">Add New Tenant</a>
    <table id="dataTable"  class="w-100 display table table-striped table-hover">
        <thead>
            <tr>
            
                <th>Tenant Name</th>
                <th>Property</th>
                <th>Contact</th>
                <th>Contract Expire</th>
              
               
                <th>Action</th>
            </tr>
        </thead>
    </table>
</div>             
@endsection
@section('script')
  <script>
var breakDownRoute = "{{route('tenancy.renew.breakdown',['id'=>'1'])}}";
var breakDownLink = breakDownRoute.slice(0,-1);
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
        var dataTable = $('#dataTable').DataTable({
      "order": [[ 0, "DESC" ]],

            responsive: true,
            "processing": true,
            "serverSide": true,
            "ajax": {
                url: "{{route('tenant.renewal.fetch')}}",
                type: "post",
                error: function() {
                    $(".users-error").html("");
                    $("#users").append('<tbody class="users-error"><tr><th colspan="3">No data found in the server</th></tr></tbody>');
                    $("#users_processing").css("display", "none");

                }
            },

            "aoColumns": [{ data: 'tenant.name'},
                {data: 'property.title'},
                {data: 'tenant.email'},
                {data: 'lease_end'},
             
                {data:'id'}],
            "columnDefs": [
               {
                    targets: 1,
                    orderable: false,
                    visible: true,
                    /*This will hide particular column*/
                    render: function(data, type, row, meta) 
                    {
                        return row.property.propcode+'-'+row.property.title;
                    }
                },
               {
                    targets: 2,
                    orderable: false,
                    visible: true,
                    /*This will hide particular column*/
                    render: function(data, type, row, meta) 
                    {
                        return '<i class="fa fa-phone fa-rotate-90 fa-11"></i> '+row.tenant.mobile+'<br><i class="fa fa-envelope fa-11"></i> '+row.tenant.email;
                    }
                },
               {
                    targets: 4,
                    orderable: false,
                    visible: true,
                    /*This will hide particular column*/
                    render: function(data, type, row, meta) 
                    {
                        return `<a href="${breakDownLink}${row.id}" class="btn btn-primary mr-3">Payment Breakdowns</a>`;
                    }
                },
              


            ],


            "dom": 'lBfrtip',
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


$("#sidebar-tenant").addClass("menu-open"); 
$("#sidebar-all-tenant").addClass("active"); 
     })
</script>

@endsection