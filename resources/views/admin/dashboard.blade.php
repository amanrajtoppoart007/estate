@extends('admin.layout.app')
@section('breadcrumb')
<div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Dashboard</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item active">dashboard</li>
            </ol>
          </div>
        </div>
      </div>
    </div>
@endsection
@section('content')
  <div class="row">
          <div class="col-lg-3 col-6">
            <div class="small-box bg-info">
              <div class="inner">
              <h3>{{get_item_count('properties',[])}}</h3>

                <p>Total Properties</p>
              </div>
              <div class="icon">
                <i class="ion ion-bag"></i>
              </div>
            <a href="{{route('property.list')}}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <div class="col-lg-3 col-6">
            <div class="small-box bg-success">
              <div class="inner">
                <h3>{{get_item_count('tenants',[])}}</h3>

                <p>Total Tenant</p>
              </div>
              <div class="icon">
                <i class="ion ion-stats-bars"></i>
              </div>
              <a href="{{route('tenant.list')}}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <div class="col-lg-3 col-6">
            <div class="small-box bg-warning">
              <div class="inner">
                <h3>{{get_item_count('property_sales',[])}}</h3>
                <p>Total Property Sold</p>
              </div>
              <div class="icon">
                <i class="ion ion-person-add"></i>
              </div>
              <a href="{{route('propertySales.list')}}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <div class="col-lg-3 col-6">
            <div class="small-box bg-danger">
              <div class="inner">
                <h3>{{get_item_count('booking_request',[])}}</h3>

                <p>Total Enquiries</p>
              </div>
              <div class="icon">
                <i class="ion ion-pie-graph"></i>
              </div>
            <a href="{{route('booking-request.list')}}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
        </div>
    <div class="row">
          <div class="col-md-12">
            <div class="card">
              <div class="card-header">
                <h5 class="card-title">
                   <i class="fa fa-link" aria-hidden="true"></i> Quick Links
                </h5>

                <div class="card-tools">
                  <button type="button" class="btn btn-tool" data-card-widget="collapse">
                    <i class="fas fa-minus"></i>
                  </button>

                  <button type="button" class="btn btn-tool" data-card-widget="remove">
                    <i class="fas fa-times"></i>
                  </button>
                </div>
              </div>

              <div class="card-body">
                  @php $quick_links = get_quick_links(); @endphp
                  @foreach($quick_links as $link)
                      <a href="{{route('rentEnquiry.list')}}" class="btn btn-app bg-gradient-{{$link['bg_color']}} text-{{$link['color']}}">
                          <i class="{{$link['icon']}}" aria-hidden="true"></i>
                          <span>{{$link['title']}}</span>
                      </a>
                  @endforeach


              </div>



            </div>

          </div>

        </div>
@endsection
