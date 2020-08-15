@extends('admin.layout.app')
@section('content')
<h4 class="color-primary mb-4">Tenant Information</h4>
<div class="dashboard_personal_info p-5 bg-white">
    {{Form::open(['route'=>'allot.property','id'=>'allot_property_to_tenant_form','class'=>'form2'])}}
     <input type="hidden" name="tenant_id" value={{$tenant->id}}>
     <h5 class="color-primary">Basic Detail</h5>
        <hr>
        <div class="row mt-4">
            <div class="col-lg-6 col-md-12">
                <dt>Tenant Type</dt>
                <dd class="px-1">{{ucwords(str_replace('_',' ',$tenant->tenant_type))}}</dd>
                <dt>Tenant Name</dt>
                <dd>{{$tenant->name}}</dd>
                <dt>Email Address</dt>
                <dd>{{$tenant->email}}</dd>
                <div class="d-inline">
                <dd>Phone Code</dd>
                <dt>{{($tenant->profile)?$tenant->profile->country_code:null}}</dt>
                <dt>Phone Number</dt>
                <dd>{{$tenant->mobile}}</dd>
                </div>
             <div class="more_info">
              <h5 class="color-primary">More Info</h5>
              <hr>
              <dt>Country</dt>
              <dd>{{$tenant->country->name}}</dd>
              <dt>City / State</dt>
              <dd>{{($tenant->profile)?$tenant->profile->city:null}}</dd>
               <dt>Zip Code</dt>
               <dd>{{($tenant->profile)?$tenant->profile->zip:null}}</dd>
              <dt>Address</dt>
              <dd>{{($tenant->profile)?$tenant->profile->address:null}}</dd>
              <dt>DOB</dt>
              <dd>{{($tenant->profile)?date('d-m-Y',strtotime($tenant->profile->dob)):null}}</dd>
              <dt>Number of tenants</dt>
              <dd>{{($tenant->profile)?$tenant->profile->tenant_count:null}}</dd>
            </div>
      </div>
      <div class="col-lg-5 col-md-12">
        <div class="user_photo" >
          <img class="profile_image" src="{{route('get.doc',base64_encode(($tenant->profile)?$tenant->profile->profile_image:null))}}"  alt="">
          <hr>
          <h5 class="color-primary">Documents</h5>
          <hr>
           <div class="row">
               @foreach($tenant->documents as $doc)
                <div class="col-6">
                <dt>{{Str::studly($doc['doc_type'])}}</dt>
                    @if($doc['file_type']=='jpeg'||$doc['file_type']=='jpg'||$doc['file_type']=='png')
                    <dd>
                     <img  class="img-thumbnail img250x150" src="{{route('get.doc',base64_encode($doc['file_url']))}}">
                     <a class="btn btn-outline-success" target="_blank" href="{{route('get.doc',base64_encode($doc['file_url']))}}">Download</a>
                   </dd>
                    @else
                    <dd><a target="_blank" href="{{route('get.doc',base64_encode($doc['file_url']))}}">View</a></dd>
                    @endif
                </div>

               @endforeach
           </div>
        </div>
      </div>
    </div>
    <h6>Extra Detail</h6>
    <div class="row" id="company_extra_detail">
        <div class="col">
            <dt>Company Name</dt>
            <dd>{{($tenant->profile)?$tenant->profile->company_name:null}}</dd>
        </div>
    </div>
    <div class="row" id="extra_relation_detail">
        <div class="col-md-12">
             @if(!empty($tenant->relations))
            <div class="card">
            <div class="card-header">
                <h5>Extra Details</h5>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Name</th>
                                <th>Relation/Designation</th>
                                <th>Amirates Id</th>
                                <th>Passport</th>
                                <th>Visa</th>
                            </tr>
                        </thead>
                        <tbody id="family_detail_grid">
                        @foreach($tenant->relations as $rel)
                            <tr>
                             <td>{{$rel->id}}</td>
                             <td>{{$rel->name}}</td>
                             <td>{{$rel->relationship}}</td>
                             <td><a target="_blank" class="btn btn-outline-primary" href="{{route('get.doc',base64_encode($rel->amirates_id))}}">View</a></td>
                             <td><a target="_blank" class="btn btn-outline-primary" href="{{route('get.doc',base64_encode($rel->passport))}}">View</a></td>
                             <td><a target="_blank" class="btn btn-outline-primary" href="{{route('get.doc',base64_encode($rel->visa))}}">View</a></td>
                            </tr>
                         @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        @endif
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="form-group">
            <a href="{{route('tenant.allot.property',$tenant->id)}}"  class="btn btn-success float-left">Allot Property</a>
            </div>
        </div>
    </div>
    {{Form::close()}}
</div>
@endsection
@section('script')

@endsection
