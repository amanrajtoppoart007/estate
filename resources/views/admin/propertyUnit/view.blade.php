@extends('admin.layout.app')
@section('breadcrumb')
<div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Unit Listing</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}">Home</a></li>
              <li class="breadcrumb-item active">Unit Listing</li>
            </ol>
          </div>
        </div>
      </div>
    </div>
@endsection
@section('content')
 <div class="card">
      <div class="card-body">
          <div class="card card-primary">
             <div class="card-header">
                   <h6>Property Detail</h6> 
             </div>
             <div class="card-body">
              <div class="row">
                <div class="col-12 col-sm-12 col-md-12 col-lg-12 table-responsive">
                    <table class="table border-th-td-none">
                        <tbody>
                          <tr>
                            <th>Property</th>
                          <td id="txt_property_title"> {{$property_unit['property_title']}}</td>
                            <th>Property Code</th>
                            <td id="txt_propcode">{{$property_unit['propcode']}}</td>
                            <th>Unit Code</th>
                            <td id="txt_unitcode">{{$property_unit['unitcode']}}</td>
                            <th>Type</th>
                            <td id="txt_unit_type">{{$property_unit['unit_type']}}</td>
                          </tr>
                          <tr>
                            <th>Size (Sqrt)</th>
                            <td id="txt_unit_size">{{$property_unit['unit_size']}}</td>
                            <th>Bedroom</th>
                            <td id="txt_bedroom">{{$property_unit['bedroom']}}</td>
                            <th>Bathroom</th>
                            <td id="txt_bathroom">{{$property_unit['bathroom']}}</td>
                            <th>Balcony</th>
                            <td id="txt_balcony">{{$property_unit['balcony']}}</td>
                          </tr>
                        
                          <tr>
                            <th>Parking</th>
                            <td id="txt_parking">{{$property_unit['parking']}}</td>
                            <th>Hall</th>
                            <td id="txt_hall">{{$property_unit['hall']}}</td>
                            <th>Kithchen</th>
                            <td id="txt_kitchen">{{$property_unit['kitchen']}}</td>
                            <th>Unit Status</th>
                            <td id="txt_price" class="bg-{{$property_unit['unit_status']['color']}}">{{$property_unit['unit_status']['text']}}</td>
                          </tr>
                        </tbody>
                    </table>
                </div>
              </div>
             </div>
          </div> 
          <div class="card card-primary">
             <div class="card-header">
                <h6>Owner Detail</h6>
             </div>
             <div class="card-body table-responsive">
               <table class="table border-th-td-none">
                   <tbody>
                     <tr>
                       <th>Name</th>
                       <td id="txt_owner_name">{{$property_unit['owner_name']}}</td>
                       <th>Email</th>
                       <td id="txt_owner_email">{{$property_unit['owner_email']}}</td>
                       <th>Mobile</th>
                       <td id="txt_owner_mobile">{{$property_unit['owner_mobile']}}</td>
                     </tr>
                     <tr>
                       <th>PassPort</th>
                       <td id="txt_owner_passport"><a target="_blank" href="{{$property_unit['owner_passport']}}"> <i class="fa fa-file"></i></a></td>
                       <th>Visa</th>
                       <td id="txt_owner_visa"><a target="_blank" href="{{$property_unit['owner_visa']}}"> <i class="fa fa-file"></i></a></td>
                       <th>Emirates Id</th>
                       <td id="txt_owner_emirates_id">{{$property_unit['owner_emirates_id']}}</td>
                     </tr>
                     <tr>
                       <th>Country</th>
                       <td id="txt_owner_country">{{$property_unit['owner_country']}}</td>
                       <th>State</th>
                       <td id="txt_owner_state">{{$property_unit['owner_state']}}</td>
                       <th>City</th>
                       <td id="txt_owner_city">{{$property_unit['owner_city']}}</td>
                     </tr>
                     <tr>
                       <th>Address</th>
                       <td id="txt_owner_address">{{$property_unit['owner_address']}}</td>
                       <th></th>
                       <td></td>
                       <th></th>
                       <td></td>
                     </tr>
                   </tbody>
                 </table>
             </div>
		  </div> 
		   <div class="card">
                <div class="card-header bg-primary">
                        <h6>Client/Tenant Detail</h6>
               </div>
			  <div class="card-body">
				<table class="table border-th-td-none">
						<tbody>
							<tr>
                                <th>Name</th>
                                <td id="txt_buyer_name">{{$property_unit['client_name']}}</td>
                                <th>Email</th>
                                <td id="txt_buyer_email" >{{$property_unit['client_email']}}</td>
                                <th>Mobile</th>
                                <td id="txt_buyer_mobile">{{$property_unit['client_mobile']}}</td>
							</tr>
							
							<tr>
                                <th>Country</th>
                                <td id="txt_buyer_country"></td>
                                <th>State</th>
                                <td id="txt_buyer_state"></td>
                                <th>City</th>
                                <td id="txt_buyer_city"></td>
							</tr>
							<tr>
                                <th>Address</th>
                                <td id="txt_buyer_address"></td>
                                <th></th>
                                <td></td>
                                <th></th>
                                <td></td>
							</tr>
						</tbody>
					</table>
             </div>
          </div>
          <div class="card card-primary">
             <div class="card-header">
                <h6>Payment Detail</h6>
             </div>
             <div class="card-body table-responsive">
               <table class="table border-th-td-none">
                 <tbody>
                   <tr>
                     <th>Selling Price</th>
                     <td></td>
                     <th>Booking Amount</th>
                     <td></td>
                     <th></th>
                     <td></td>
                     <th></th>
                     <td></td>
                   </tr>
                 </tbody>
               </table>
             </div>
          </div> 
      </div>
 </div>
@endsection
