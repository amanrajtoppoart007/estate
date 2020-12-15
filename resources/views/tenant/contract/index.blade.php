@extends("tenant.layout.app")
@section("content")

    <div class="my-5">
        <div class="card">
            <div class="card-header">
                <h6>Tenancy Contracts</h6>
            </div>
            <div class="card-body">
                <table class="table" id="dataTable">
                    <thead>
                      <tr>
                          <th>Flat No.</th>
                          <th>Owner</th>
                          <th>Breakdown</th>
                          <th>Signature Date</th>
                          <th>Effective From</th>
                          <th>Effective Update</th>
                      </tr>
                    </thead>
                </table>
            </div>
        </div>
    </div>
@endsection
@section("script")
    <script>
        $(document).ready(function(){
                     $.ajaxSetup({ headers:{'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')}});
        let dataTable = $("#dataTable").dataTable({
                        dom   : '<"dt-buttons"Bf><"clear">lirtp',
                 processing   : true,
                   serverSide : true,
                    responsive: false,
                    stateSave: true,
                    "order": [[ 0, "desc" ]],
                        ajax  : {
                       url    : "{{route('tenant.contract.fetch')}}",
                       type   : "POST",
                       data   : null,
                       error  : function(jqXHR,textStatus,errorThrown)
                       {
                           $.swal(textStatus,errorThrown,'error');
                       }

                   },
                     columns : [
                                { data : "flat_number", name : "flat_number"},
                                { data : "owner_name", name : "owner_name"},
                                { data : "breakdown_url", name : "breakdown_url",
                                    render:function(data, type, row, meta)
                                    {
                                       return `<a class="btn btn-success" href="${row.breakdown_url}" type="button">View</a>`;
                                    }
                                },
                                { data : "signature_date", name : "signature_date"},
                                { data : "effective_from", name : "effective_from" },
                                { data : "effective_upto", name : "effective_upto" },
                              ],
                              "buttons": ['colvis',
                              {
                                    extend: 'copyHtml5',
                                    exportOptions: {
                                        columns: [0,1,2,3,4,5]
                                    }
                                },
                              {
                                    extend: 'csvHtml5',
                                    exportOptions: {
                                        columns: [0,1,2,3,4,5]
                                    }
                                },
                              {
                                    extend: 'excelHtml5',
                                    exportOptions: {
                                        columns: [0,1,2,3,4,5]
                                    }
                                },
                              {
                                    extend: 'pdfHtml5',
                                    exportOptions: {
                                        columns: [0,1,2,3,4,5]
                                    }
                                },
                              {
                                    extend: 'print',
                                    title : 'State List',
                                    exportOptions:
                                    {
                                        columns: [0,1,2,3,4,5]
                                    }
                                }
            ],
              });
        });
    </script>
@endsection
