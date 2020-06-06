@extends('admin.layout.app')
@section('breadcrumb')
<div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Property Sale Detail</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}">Home</a></li>
              <li class="breadcrumb-item active">Property Sale Detail</li>
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
               <h6>Buyer Detail</h6>
             </div>
             <div class="card-body table-responsive">
                 <table class="table border-th-td-none">
                   <tbody>
                     <tr>
                       <th>Name</th>
                       <td>{{$data->buyer_name}}</td>
                       <th>Email</th>
                       <td>{{$data->buyer->email}}</td>
                       <th>Mobile</th>
                       <td>{{$data->buyer->mobile}}</td>
                     </tr>
                     <tr>
                       <th>PassPort</th>
                       <td>{!!($data->buyer->passport)?'<span class="text-success">Submitted</span>':'<span class="text-danger">Not Submitted</span>'!!}</td>
                       <th>Visa</th>
                       <td>{!!($data->buyer->visa)?'<span class="text-success">Submitted</span>':'<span class="text-danger">Not Submitted</span>'!!}</td>
                       <th>Emirates Id</th>
                       <td>{{$data->buyer->emirates_id}}</td>
                     </tr>
                     <tr>
                       <th>Country</th>
                       <td>{{$data->buyer->country}}</td>
                       <th>State</th>
                       <td>{{$data->buyer->state}}</td>
                       <th>City</th>
                       <td>{{$data->buyer->city}}</td>
                     </tr>
                     <tr>
                       <th>Address</th>
                       <td>{{$data->buyer->address}}</td>
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
                   <h6>Property Detail</h6> 
             </div>
             <div class="card-body">
              <div class="row">
                <div class="col-12 col-sm-12 col-md-12 col-lg-12 table-responsive">
                    <table class="table border-th-td-none">
                        <tbody>
                          <tr>
                            <th>Property</th>
                          <td>{{$data->property->title}}</td>
                            <th>Property Code</th>
                            <td>{{$data->property->propcode}}</td>
                            <th>Unit Code</th>
                            <td>{{$data->property_unit->unitcode}}</td>
                            <th>Type</th>
                            <td>{{$data->property_unit->title}}</td>
                          </tr>
                          <tr>
                            <th>Size (Sqrt)</th>
                            <td>{{$data->property_unit->unit_size}}</td>
                            <th>Bedroom</th>
                            <td>{{$data->property_unit->bedroom}}</td>
                            <th>Bathroom</th>
                            <td>{{$data->property_unit->bathroom}}</td>
                            <th>Balcony</th>
                            <td>{{$data->property_unit->balcony}}</td>
                          </tr>
                        
                          <tr>
                            <th>Parking</th>
                            <td>{{$data->property_unit->parking}}</td>
                            <th>Hall</th>
                            <td>{{$data->property_unit->hall}}</td>
                            <th>Kithchen</th>
                            <td>{{$data->property_unit->kitchen}}</td>
                            <th>Price</th>
                            <td>{{$data->property_unit->rental_amount}}</td>
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
                       <td>{{$data->owner->name}}</td>
                       <th>Email</th>
                       <td>{{$data->owner->email}}</td>
                       <th>Mobile</th>
                       <td>{{$data->owner->mobile}}</td>
                     </tr>
                     <tr>
                       <th>PassPort</th>
                       <td>{!!($data->owner->passport)?'<span class="text-success">Submitted</span>':'<span class="text-danger">Not Submitted</span>'!!}</td>
                       <th>Visa</th>
                       <td>{!!($data->owner->visa)?'<span class="text-success">Submitted</span>':'<span class="text-danger">Not Submitted</span>'!!}</td>
                       <th>Emirates Id</th>
                       <td>{{$data->owner->emirates_id}}</td>
                     </tr>
                     <tr>
                       <th>Country</th>
                       <td>{{$data->owner->country}}</td>
                       <th>State</th>
                       <td>{{$data->owner->state}}</td>
                       <th>City</th>
                       <td>{{$data->owner->city}}</td>
                     </tr>
                     <tr>
                       <th>Address</th>
                       <td>{{$data->owner->address}}</td>
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
                     <td>{{$data->selling_price}}</td>
                     <th>Booking Amount</th>
                     <td>{{$data->booking_amount}}</td>
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