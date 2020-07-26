@extends('admin.layout.app')
@section('breadcrumb')
<div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Property Detail</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}">Home</a></li>
              <li class="breadcrumb-item active">Property Detail</li>
            </ol>
          </div>
        </div>
      </div>
    </div>
@endsection
    @section('content')
		<div class="card">
			<div class="card-body">
				<div class="row">
					<div class="col-6 col-sm-4 col-md-3 col-lg-3 col-xl-3">
						<dt><img src="{{$property->primary_image}}" class="img-thumbnail" width="100px" height="100px"></dt>
						<dd>
							<b>Code:</b> {{$property->propcode}}<br>
					   </dd>
					</div>
					<div class="col-6 col-sm-4 col-md-3 col-lg-3 col-xl-3">
						<dt>Title</dt>
						<dd>{{$property->title}}</dd>
					</div>
					<div class="col-6 col-sm-4 col-md-3 col-lg-3 col-xl-3">
						<dt>City</dt>
						<dd>{{$property->city->name}}</dd>
					</div>
					<div class="col-6 col-sm-4 col-md-3 col-lg-3 col-xl-3">
						<dt>State</dt>
						<dd>{{$property->state->name}}</dd>
					</div>
					<div class="col-6 col-sm-4 col-md-3 col-lg-3 col-xl-3">
						<dt>Address</dt>
						<dd> <small>{{$property->address}}</small></dd>
					</div>
					<div class="col-6 col-sm-4 col-md-3 col-lg-3 col-xl-3">
						<dt>Type</dt>
						<dd>@if($property->propertyType){{ $property->propertyType->unit_series }}@endif</dd>
					</div>
					<div class="col-6 col-sm-4 col-md-3 col-lg-3 col-xl-3">
						<dt>Property For</dt>
						<dd>
							@php
							$purpose = array('1'=>'For Rent','2'=>'For Sale')
							@endphp
							@foreach($purpose as $pKey=>$pVal)
							@if($pKey==$property->prop_for)
								{{$pVal}}
								@endif
							@endforeach
						</dd>
					</div>
					<div class="col-6 col-sm-4 col-md-3 col-lg-3 col-xl-3">
						<dt>Owner</dt>
						<dd>@if($property->owner){{ $property->owner->name}}@endif</dd>
					</div>
					<div class="col-6 col-sm-4 col-md-3 col-lg-3 col-xl-3">
						<dt>Owner Contact</dt>
						<dd>@if($property->owner){{ $property->owner->mobile}}@endif</dd>
					</div>
					<div class="col-6 col-sm-4 col-md-3 col-lg-3 col-xl-3">
						<dt>Agent</dt>
						<dd>@if($property->agent){{ $property->agent->name}}@endif</dd>
					</div>
					<div class="col-6 col-sm-4 col-md-3 col-lg-3 col-xl-3">
						<dt>Agent Contact</dt>
						<dd>@if($property->agent){{ $property->agent->mobile}}@endif</dd>
					</div>
					<div class="col-6 col-sm-4 col-md-3 col-lg-3 col-xl-3">
						<dt>Age Of Building/Property</dt>
						<dd>{{ $property->building_age}}</dd>
					</div>
                    <div class="col-6 col-sm-4 col-md-3 col-lg-3 col-xl-3">
						<dt>Total Units</dt>
						<dd>{{ $property->total_units}}</dd>
					</div>
                    <div class="col-6 col-sm-4 col-md-3 col-lg-3 col-xl-3">
						<dt>Total Floors</dt>
						<dd>{{ $property->total_floors}}</dd>
					</div>
                    <div class="col-6 col-sm-4 col-md-3 col-lg-3 col-xl-3">
						<dt>Total Flats</dt>
						<dd>{{ $property->total_flats}}</dd>
					</div>
                    <div class="col-6 col-sm-4 col-md-3 col-lg-3 col-xl-3">
						<dt>Total Shops</dt>
						<dd>{{ $property->total_shops}}</dd>
					</div>
				</div>
				<div class="row">
					<div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
						<div class="card">
							<div class="card-header">
								<div class="row">
									<div class="col">
                                      <button class="btn btn-primary" id="addUnitModalOpenBtn"> <i class="fa fa-plus"></i> Add New Unit</button>
                                      <button class="btn btn-primary"  data-toggle="modal" data-target="#allotUnitModal"> <i class="fa fa-plus"></i> AllotUnit</button>
									</div>
									<div class="col">
                                      <button class="btn btn-primary advanced_filter_btn float-right"> <i class="fa fa-search"></i> Advanced Filter</button>
									</div>
								</div>
							</div>
							<div class="card-body">
								<div class="d-none" id="advanced_filter_grid">
									{{Form::open(['id'=>'property_filter_search'])}}
									<input type="hidden" name="property" value="{{$property->id}}">
									<h5>Floor</h5>
									<ul class="unstyled">
									@for($i=0;$i<=19;$i++)
										<li class="d-inline">
											<label class="btn btn-secondary">
												<input class="" type="checkbox" name="floor[]" value="{{$i}}">
												<small class="form-check-label">{{$i}} Floor</small>
											</label>
										</li>
									@endfor
								</ul>
									<h5>Select Tenancy contract ending month</h5>
									<ul class="unstyled">
									@for($i=1;$i<=12;$i++)
										<li class="d-inline">
											<label class="btn btn-secondary">
												<input class="" type="checkbox" name="month[]" value="{{$i}}">
												<small class="form-check-label">{{date('F',mktime( 0, 0, 0, $i, 01, date('Y')))}}</small>
											</label>
										</li>
									@endfor
									</ul>
									<h5>Select Broker</h5>
									<ul class="unstyled">
									@foreach($agents as $agent)
										<li class="d-inline">
											<label class="btn btn-secondary">
												<input class="" type="checkbox" name="agent[]" value="{{$agent->id}}">
												<small class="form-check-label">{{$agent->name}}</small>
											</label>
										</li>
									@endforeach
									</ul>
									<h5>Search Keyword</h5>
									<div class="form-group col-md-4">
										<label class="label" for="custom_search"></label>
										<input type="text" class="form-control" name="custom_search" id="custom_search" value="">
									</div>
									{{Form::close()}}
								</div>
								<div class="table-responsive">
									<table class="table table-bordered" id="dataTable">
										<thead>
											<tr>
                                                <th>Flat/Unit</th>
                                                <th>No. Of BR.</th>
                                                <th>Owner</th>
                                                <th>Tenant</th>
                                                <th>Sell/Rent</th>
                                                <th>Sell/Rent Amount</th>
                                                <th>Lease Start</th>
                                                <th>Lease End</th>
                                                <th>Broker</th>
                                                <th>Flat Status</th>
                                                <th>Action</th>
                                            </tr>
										</thead>
                                        <tbody></tbody>
									</table>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col">
						<dt>Description</dt>
						<dd>
							{{$property->description}}
						</dd>
					</div>
				</div>
				<div class="row">
					<div class="col">
						<dt>Amenities</dt>
						<dd>
							<ul class="row">
								@php
									$selectedFeatures = explode(',',$property->feature);
								@endphp
								@if(count($features)>0)
									@foreach($features as $feature)
										@if(in_array($feature->id,$selectedFeatures))
											<li class="col">{{$feature->title}}</li>
										@endif
									@endforeach
								@endif
							</ul>
						</dd>
					</div>
				</div>
				<div class="row">
					<div class="col">
						<dt>Images</dt>
						<dd>
                          <div class="row" id="gallery">
							 @if(count($property->images)>0)
								@php $images = $property->images;@endphp
									@foreach($images as $image)
										<div id="property_image_{{$image->id}}" class="thumbnails_box mb_30 col-lg-2 col-md-4 col-6 db-images">
										<img class="img250x150" src="{{asset($image->image_url)}}">
									</div>
									@endforeach
							 @endif
						  </div>
						</dd>
					</div>
				</div>
			</div>
		</div>
	@endsection
@section('modal')
@include('admin.property.modal.addUnit')
@include('admin.property.modal.editUnit')
{{--  Property Info modal start--}}
@include('admin.property.modal.unit')
@include('admin.property.modal.allot',['property_units'=>$property->property_units])
{{--  Property Info modal end--}}
@endsection
@section('head')
    <link rel="stylesheet" href="{{asset('plugin/datetimepicker/css/gijgo.min.css')}}">
@endsection
@section('js')
    <script src="{{asset('assets/plugins/print/printThis.js')}}"></script>
    <script src="{{asset('plugin/datetimepicker/js/gijgo.min.js')}}"></script>
@endsection
@section('script')
 <script>
	 $(document).ready(function(){

	     let pickers =
               [
                   'purchase_date',
                   'edit_purchase_date',
               ];
           pickers.forEach(function(item){
               $(`#${item}`).datepicker({ footer: true, modal: true,format: 'dd-mm-yyyy', maxDate : '{{now()->format('d-m-Y')}}'});
           });


         $("#purpose").on("change",function(e){
             let value = parseInt($(this).val());
             if(value===1||value===3)
             {
                 $(".grid_rent_type").show();
             }
             else{
                 $(".grid_rent_type").hide();
             }
         });


	     $("#edit_purpose").on("change",function(e){
             let value = parseInt($(this).val());
             if(value===1||value===3)
             {
                 $(".edit_grid_rent_type").show();
             }
             else{
                 $(".edit_grid_rent_type").hide();
             }
         });

	     $("#print_btn").on('click',function(e){
	         $(".print_this").printThis();
         })
     let base_url = $('meta[name="base-url"]').attr('content');
		 function render_client(row)
		 {
			 if(row.client_name)
			 {
                 return row.client_name;
			 }
			 return null;
		 }
		 function render_allotment(row)
		 {
			 if(row.allotment_type)
			 {
                 return row.allotment_type;
			 }
			return null;
		 }
		 function render_unit_status(row)
		 {
		     if(row.unit_status.text=='RENTED'||row.unit_status.text=='SOLD')
             {
                 return `<a target="_blank" class="text-${row.unit_status.color}" href="${row.collection_route}">${row.unit_status.text}</a>`;
             }
			 return row.unit_status.text;
		 }
        function renderActionBtn(row)
        {
            return `<button type="button" data-id="${row.id}"  class="btn btn-info mr-3 editModalOpenBtn"><i class="fa fa-edit text-white"></i></button>
                    <button type="button" data-id="${row.id}"  class="btn btn-secondary  mr-3 viewUnitInfoModalOpenBtn"><i class="fa fa-eye text-white"></i>View</button>`;
        }

        $.ajaxSetup({ headers:{'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')}});
        let dataTable = $("#dataTable").dataTable({
                        dom   : 'lirtp',
                 processing   : true,
                   serverSide : true,

                    stateSave: true,
                    "order": [[ 0, "desc" ]],
                    rowId     : 'row_id',
                        ajax  :
                        {
                            url    : "{{route('property.unit.fetch')}}",
                            type   : "POST",
                            data   : function(d)
                            {
                                    let form_data = $('#property_filter_search').serializeArray();
                                    $.each(form_data, function(index, item)
                                    {
                                        d[item.name] = item.value;
                                    });
                            },
                            error  : function(jqXHR,textStatus,errorThrown)
                            {
                                $.swal(textStatus,errorThrown,'error');
                            }

                   },
                     columns : [
                                { data : "unitcode", name : 'unitcode'},
                                { data : "unit_title", name : 'unit_title'},
                                { data : "owner_name", name : 'owner_name' },
								{ data : "client_name", name: 'client_name',
								  render:function(data,type,row,meta)
								  {
									 return render_client(row);
								  }
								},
                                { data : "allotment_type", name : 'allotment_type',
								      render:function(data,type,row,meta)
									  {
                                             return render_allotment(row);
									  }
								 },
								 { data : "allotment_price", name : 'allotment_price' },

                         { data : "lease_start", name: 'lease_start',
								  render:function(data,type,row,meta)
								  {
									 return row.lease_start;
								  }
								},{ data : "lease_end", name: 'lease_end',
								  render:function(data,type,row,meta)
								  {
									 return row.lease_end;
								  }
								},
								 { data : "broker", name : 'broker' },
                                { data : "status", name: 'status',
									render:function (data,type,row,meta)
									{
										return render_unit_status(row);
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
            let params = {
                'id'          : $(this).attr('data-id'),
                'is_disabled' : $(this).attr('data-status')
            };
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
// unit allotment module
         $("#allot_alllotment_type").on('change',function(e){
             $("#allot_client_id").empty();
            let params = {
                'allotment_type'          : $("#allot_alllotment_type").val(),
            };
            function fn_success(result)
            {
                let clients = result.data;
                $.each(clients,function(i,item){
                    $("#allot_client_id").append(`<option value="${item.id}">${item.name}</option>`);
                })
            };
            function fn_error(result)
            {
                toast('error',result.message,'top-right');
            };
            $.fn_ajax('{{route('client.fetch')}}',params,fn_success,fn_error);
        });
         $("#allot_unit_form").on('submit',function(e){
             e.preventDefault();

            let params = $("#allot_unit_form").serialize();
            function fn_success(result)
            {
                let link = result.link;
                window.location.href = link;
            };
            function fn_error(result)
            {
                toast('error',result.message,'top-right');
            };
            $.fn_ajax('{{route('link.unit.allotment')}}',params,fn_success,fn_error);
        });


        $("#property_filter_search input").on('change',function(){
           dataTable.api().ajax.reload();
        });
        $("#property_filter_search").on('submit',function(e){
            e.preventDefault();
           dataTable.api().ajax.reload();
        });

		 $(document).on('click','.advanced_filter_btn',function(){
			 $("#advanced_filter_grid").toggleClass('d-none');
		 });
		 $('#addUnitModalOpenBtn').on('click',function(){
			 $("#addUnitModal").modal('show');
		 });
       /*** function to add new unit *********/
	$("#property_unit_type_id").on('change',function(e){
			 let id     = $(this).val();
			 let url    = "{{route('property.unit.type.view')}}";
			 let params = {'id':id};
			 function fn_success(result)
			 {
				$("#property_id").val(result.data.property_id);
				$("#title").val(result.data.title);
				$("#rent_type").val(result.data.rent_type);
				$("#unit_price").val(result.data.rental_amount);
				$("#unit_size").val(result.data.unit_size);
				$("#bedroom").val(result.data.bedroom);
				$("#bathroom").val(result.data.bathroom);
				$("#furnishing").val(result.data.furnishing);
				$("#balcony").val(result.data.balcony);
				$("#kitchen").val(result.data.kitchen);
				$("#parking").val(result.data.parking);
				$("#hall").val(result.data.hall);
				$("#addUnitModal").modal('show');
			 };
			 function fn_error(result)
			 {
               toast('error',result.message,'top-right');
			   $("#add_unit_form")[0].reset();
			 };
			$.fn_ajax(url,params,fn_success,fn_error);
		});
		$("#add_unit_form").on('submit',function(e){
			e.preventDefault();
          let url     = "{{route('property.unit.store')}}";
		  let params  = $("#add_unit_form").serialize();
		  function fn_success(result)
		  {
			  $("#add_unit_form")[0].reset();
              $("#addUnitModal").modal('hide');
			  dataTable.api().ajax.reload();
		  };
		  function fn_error(result)
		  {
             toast('error',result.message,'top-right');
		  };
		  $.fn_ajax(url,params,fn_success,fn_error);
		});
 /*** end function to add new unit *********/
        $(document).on('click','.editModalOpenBtn',function(){
			$("#edit_unit_data_form")[0].reset();
          let url    = "{{route('property-unit.view')}}";
		  let params = {"unit_id" : $(this).attr('data-id') };
		  function fn_success(result)
		  {
			  $("#edit_property_unit_id").val(result.data.id);
			  $("#edit_flat_house_no").val(result.data.flat_house_no);
			  $("#edit_floor_no").val(result.data.floor_no);
			  $("#edit_unit_size").val(result.data.unit_size);
			  $("#edit_bedroom").val(result.data.bedroom);
			  $("#edit_bathroom").val(result.data.bathroom);
			  $("#edit_furnishing").val(result.data.furnishing);
			  $("#edit_balcony").val(result.data.balcony);
			  $("#edit_kitchen").val(result.data.kitchen);
			  $("#edit_parking").val(result.data.parking);
			  $("#edit_hall").val(result.data.hall);
			  $("#edit_owner_id").val(result.data.owner_id);
			  $("#edit_agent_id").val(result.data.agent_id);
			  $("#edit_purpose").val(result.data.purpose);
			  $("#edit_unit_status").val(result.data.unit_status);
			  $("#edit_purchase_date").val(result.data.purchase_date);
			  $("#edit_purchase_cost").val(result.data.purchase_cost);
			  if(result.data.purpose==="1"||result.data.purpose==="3")
              {
                  $(".edit_grid_rent_type").show();
              }
			  $("#edit_rent_type").val(result.data.rent_type);
              $("#editModal").modal('show');
		  }
		  function fn_error(result)
		  {
             toast('error',result.message,'top-right');
		  }
		  $.fn_ajax(url,params,fn_success,fn_error);
		});
		/* ********* property unit detail view function *********** */
        $(document).on('click','.viewUnitInfoModalOpenBtn',function(){
            $("#unit_rent_installment_detail_grid").empty();
            $("#tenant_documents_detail_grid").empty();
            $("#tenant_relation_detail_grid").empty();
            let grids = ['unit_detail_table_grid','owner_detail_table_grid','allotment_detail_table_grid','tenant_detail_table_grid'];
            $.each(grids,function(index,item){
                $(`#${item}`).find('tbody').find('tr').find('td').text('');
            });
          let url    = "{{route('property.unit.detail')}}";
		  let params = {"unit_id" : $(this).attr('data-id') };
		  function fn_success(result)
		  {
			  $("#viewUnitInfoModal").modal('show');
			  $("#txt_property_title").text(result.data.property.title);
			  $("#txt_propcode").text(result.data.property.propcode);
			  $("#txt_unitcode").text(result.data.unitcode);
			  $("#txt_unit_type").text(result.data.title);
			  $("#txt_unit_size").text(result.data.unit_size);
			  $("#txt_bedroom").text(result.data.bedroom);
			  $("#txt_bathroom").text(result.data.bathroom);
			  $("#txt_balcony").text(result.data.balcony);
			  $("#txt_parking").text(result.data.parking);
			  $("#txt_hall").text(result.data.hall);
			  $("#txt_kitchen").text(result.data.kitchen);

			  $("#txt_owner_name").text(result.data.owner.name);
			  $("#txt_owner_email").text(result.data.owner.email);
			  $("#txt_owner_mobile").text(result.data.owner.mobile);
			  $("#txt_owner_passport").text((result.data.owner.passport)?'Submitted':'Not Submitted');
			  $("#txt_owner_visa").text((result.data.owner.visa)?'Submitted':'Not Submitted');
			  $("#txt_owner_emirates_id").text(result.data.owner.emirates_id);
			  $("#txt_owner_state").text(result.data.owner.state);
			  $("#txt_owner_country").text(result.data.owner.country);
			  $("#txt_owner_city").text(result.data.owner.city);
			  $("#txt_owner_address").text(result.data.owner.address);
			  //unit allotment detail
              if(!$.isEmpty(result.data))
              {
                  let unit_allotment = result.data.unit_allotment;

                  let tenant = unit_allotment.tenant;
                  let owner  = result.data.owner;
                  let agent  = result.data.agent;
                  $("#ur_tenant_name").text((tenant)?tenant.name:'');
                  $("#ur_owner_name").text((owner)?owner.name:'');
                  $("#ur_agent_name").text((agent)?agent.name:'');
                  $("#ur_rent_amount").text(unit_allotment.rent_amount);
                  $("#ur_rent_installment").text(unit_allotment.installments);
                  $("#ur_security_deposit").text(unit_allotment.security_deposit);
                  $("#ur_sewa_deposit").text(unit_allotment.sewa_deposit);
                  $("#ur_municipality_fees").text(unit_allotment.municipality_fees);
                  $("#ur_brokerage").text(unit_allotment.brokerage);
                  $("#ur_contract").text(unit_allotment.contract);
                  $("#ur_contract").text(unit_allotment.contract);
                  $("#ur_remote_deposit").text(unit_allotment.remote_deposit);
                  if(!$.isEmpty(result.data.unit_allotement))
                  {
                      let installments   = unit_allotment.rent_installments;
                      if(!$.isEmpty(installments))
                      {
                          let tr = '';
                          $.each(installments,function(index,item){
                              let status = (item.paid_date)?(item.paid_date):'UNPAID';
                               tr += `<tr><td>${item.amount}</td><td>${item.expected_date}</td><td>${status}</td></tr>`;
                          });
                          $("#unit_rent_installment_detail_grid").html(tr);
                      }
                  }
              }

                 if(result.data.allotment_type=='rent')
                 {
                     let tenant = result.data.client;
                     $("#td_tenant_name").text(tenant.name);
                     $("#td_tenant_mobile").text(tenant.mobile);
                     $("#td_tenant_email").text(tenant.email);
                     $("#td_tenant_country").text(tenant.country_name);
                     $("#td_tenant_city").text((tenant.profile)?tenant.profile.city:'');
                     $("#td_tenant_state").text((tenant.profile)?tenant.profile.state:'');
                     $("#td_tenant_address").text((tenant.profile)?tenant.profile.address:'');
                     let documents = tenant.documents;
                     if(!$.isEmpty(documents))
                      {
                          let tr = '';
                          $.each(documents,function(index,item){
                               tr += `<tr><td>${item.doc_type.toUpperCase()}</td><td>${item.created_at}</td></tr>`;
                          });
                          $("#tenant_documents_detail_grid").html(tr);
                      }
                     let relations = tenant.relations;
                     if(!$.isEmpty(relations))
                      {
                          let tr = '';
                          $.each(relations,function(index,item){
                               tr += `<tr><td>${item.name.toUpperCase()}</td><td>${item.relationship.toUpperCase()}</td></tr>`;
                          });
                          $("#tenant_relation_detail_grid").html(tr);
                      }
                 }

		  };
		  function fn_error(result)
		  {
             toast('error',result.message,'top-right');
		  };
		  $.fn_ajax(url,params,fn_success,fn_error);
		});
		/* ********* property unit detail view function ends *********** */
        $("#edit_unit_data_form").on('submit',function(e){
			e.preventDefault();
          let url     = "{{route('property-unit.update')}}";
		  let params  = $("#edit_unit_data_form").serialize();
		  let unit_id = $("#property_unit_id").val();
		  function fn_success(result)
		  {
			  dataTable.api().ajax.reload();
			  toast('success',result.message,'top-right');
              $("#editModal").modal('hide');
		  };
		  function fn_error(result)
		  {
             toast('error',result.message,'top-right');
		  };
		  $.fn_ajax(url,params,fn_success,fn_error);
		});
		/* ******* add unit form submit function******* */

		/* ******* end add unit form submit function******* */

		$(document).on('click','.delPropUnitTypeConfirmationBoxOpenBtn',function(e){
			 let id  = $(this).attr('data-property_unit_type_id');
			 let url = "{{route('property.unit.type.delete')}}";
			 let params = {'id':id};
			 function fn_success(result)
			 {
                toast('success',result.message,'top-right');
				$(`#property_unit_type_grid_${id}`).remove();
			 };
			 function fn_error(result)
			 {
               toast('error',result.message,'top-right');
			 };
			 Swal.fire({
				title: 'Are you sure?',
				text: "You won't be able to revert this!",
				type: 'warning',
				showCancelButton: true,
				confirmButtonColor: '#3085d6',
				cancelButtonColor: '#d33',
				confirmButtonText: 'Yes, delete it!'
              }).then((result) => {
				  if (result.value)
                   {
			          $.fn_ajax(url,params,fn_success,fn_error);
				   }
				   else
				   {
					   toast('warning','Action cancelled','top-right');
				   }
			  });
		});

	 });
 </script>
@endsection
