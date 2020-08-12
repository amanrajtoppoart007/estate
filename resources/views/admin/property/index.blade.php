@extends('admin.layout.app')
@section('breadcrumb')
<div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Property Listing</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}">Home</a></li>
              <li class="breadcrumb-item active">Property Listing</li>
            </ol>
          </div>
        </div>
      </div>
    </div>
@endsection
@section('content')
    <div class="items_list bg_transparent color-secondery icon_default">
        <a href="{{route('property.create')}}" class="btn btn-primary color-primary mb-4 float-right">Add Property</a>
        <div class="table-responsive">
            <table class="table" id="dataTable">
                <thead>
                    <tr>
                        <th>Image</th>
                        <th>Properties</th>
                        <th>status</th>
                        <th>Action</th>
                    </tr>
                </thead>
            </table>
        </div>
    </div>
@endsection
@section('script')
  <script>
     $(document).ready(function()
     {
         var base_url = $('meta[name="base-url"]').attr('content');
         function renderStatusBtn(data)
        {
            let status   = (parseInt(data.is_disabled))?'InActive':'Active';
            let btnColor = (parseInt(data.is_disabled))?'danger':'success';
            return `<a href="javascript:void(0)" data-status="${data.is_disabled}" data-id="${data.id}" class="btn btn-${btnColor} mr-3 changeStatusBtn">${status}</a>`;
        }
        function renderActionBtn(data)
        {
            return `<a href="${data.edit_url}"  class="btn btn-info mr-3"><i class="fa fa-edit text-white"></i></a>
            <a href="${data.view_url}"  class="btn btn-secondary  mr-3"><i class="fa fa-eye text-white"></i>View</a>`;
        }
        function renderImage(data)
        {
            return `<img class="img-thumbnail" src="${data.primary_image}">`;
        }
        function renderTitle(data)
        {
           return `<h6 class="color-primary">${data.title}</h6><span class="location"><i class="fa fa-map-marker" aria-hidden="true"></i> ${data.address}</span>`;
        }
        function renderPropertyMode(data)
        {
          let mode = null;
          switch (data.property_for)
          {
            case 1:
              mode = 'Rent';
              break;
            case 2:
              mode = 'Sale';
              break;
            default:
              mode = null;
              break;
          }
            return mode;
        }
        $.ajaxSetup({ headers:{'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')}});
        var dataTable = $("#dataTable").dataTable({
                        dom   : '<"dt-buttons"Bf><"clear">lirtp',
                 processing   : true,
                   serverSide : true,

                    stateSave: true,
                    "order": [[ 0, "desc" ]],
                    rowId     : 'row_id',
                        ajax  : {
                       url    : "{{route('property.fetch')}}",
                       type   : "POST",
                       data   : null,
                       error  : function(jqXHR,textStatus,errorThrown)
                       {
                           $.swal(textStatus,errorThrown,'error');
                       }

                   },
                     columns : [
                                { data :"primary_image", name : 'image',
                                render: function(data, type, row, meta)
                                    {
                                      return renderImage(row);
                                    }
                                },
                                { data : "title", name : 'title',
                                render: function(data, type, row, meta)
                                    {
                                      return renderTitle(row);
                                    }
                                },

                                { data : "is_disabled", name : 'is_disabled',searchable: false,orderable: false,
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
                  $.fn_ajax('{{route('property.changeStatus')}}',params,fn_success,fn_error);
              });

     })
</script>
<script type="text/javascript">
   $("#sidebar-listing-property").addClass("active");
 </script>
@endsection
