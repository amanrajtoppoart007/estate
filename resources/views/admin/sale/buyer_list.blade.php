@extends('admin.layout.app')
@section('breadcrumb')
<div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Buyer List</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}">Home</a></li>
              <li class="breadcrumb-item active">Buyer List</li>
            </ol>
          </div>
        </div>
      </div>
    </div>
@endsection
@section('content')
  <div class="card">
      <div class="card-header bg-primary">
          <div class="row">
              <div class="col">
                  <h5>Select buyer to intiate property sale</h5>
              </div>
              <div class="col">
              <a href="{{route('buyer.create')}}" class="btn btn-success float-right">Add Buyer</a>
              </div>
          </div>
      </div>
      <div class="card-body">
         <div class="row">
            @foreach($buyers as $buyer)
            <div class="col-12 col-sm-6 col-md-3 col-lg-3 col-xl-3">
                <div class="card">
                    <div class="card-header bg-info">
                        {{$buyer->name}}
                        <a data-toggle="tooltip" title="Click here to initiate sale procedure" href="{{route('buyer.sale.property',$buyer->id)}}" class="btn btn-warning float-right"><i class="fas fa-hand-pointer"></i> Click To Init</a>
                    </div>
                    <div class="card-body">
                        <table class="table border-th-td-none cutom-property-unit">
                            <tbody>
                                <tr>
                                    <th>Mobile</th>
                                    <td>{{$buyer->mobile}}</td>
                                </tr>
                                <tr>
                                    <th>City</th>
                                    <td>{{$buyer->city}}</td>
                                </tr>
                                <tr>
                                    <th>State</th>
                                    <td>{{$buyer->state}}</td>
                                </tr>
                                <tr>
                                    <th>Country</th>
                                    <td>{{$buyer->country}}</td>
                                </tr>
                                <tr>
                                    <th>Address</th>
                                    <td>{{$buyer->address}}</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
			  </div>
            @endforeach
         </div>
      </div>
  </div>
@endsection