@extends("admin.layout.app")
@include("admin.include.breadcrumb",["page_title"=>"View RentEnquiry"])
@section("content")
    <div class="card">
        <div class="card-body">
            <div class="card">
                <div class="card-header">
                    Tenant Information
                </div>
                <div class="card-body">
                     <div class="row">
                         <div class="col-md-3"></div>
                         <div class="col-md-9">
                             <div class="row">
                                 <div class="col-6 col-sm-2 col-md-1 col-lg-1 col-xl-1">Name</div>
                                 <div class="col-6 col-sm-2 col-md-2 col-lg-2 col-xl-2">{{$enquiry->name}}</div>
                                 <div class="col-6 col-sm-2 col-md-1 col-lg-1 col-xl-1">Name</div>
                                 <div class="col-6 col-sm-2 col-md-2 col-lg-2 col-xl-2">{{$enquiry->name}}</div>
                             </div>
                         </div>
                     </div>
                </div>
            </div>
        </div>
    </div>
@endsection
