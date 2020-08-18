@extends('admin.layout.app')
@section('breadcrumb')
<div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h4 class="m-0 text-dark">View Property Agent</h4>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}">Home</a></li>
              <li class="breadcrumb-item active">View property agent</li>
            </ol>
          </div>
        </div>
      </div>
    </div>
@endsection
@section('content')
    <div class="card">
        <div class="card-body">
            <div class="card">
                <div class="card-header bg-primary">
                    <h6>Agent Detail</h6>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-12 col-sm-6 col-md-6 col-lg-6 col-xl-6 table-responsive">
                          <table class="table table-borderless">
                              <tbody>
                                 <tr>
                                     <th>Name</th>
                                     <td>{{$agent->name}}</td>
                                     <th>Email</th>
                                     <td>{{$agent->email}}</td>
                                     <th></th>
                                     <td></td>
                                 </tr>
                                 <tr>
                                     <th>Mobile</th>
                                     <td>{{$agent->mobile}}</td>
                                     <th>Account Created</th>
                                     <td>{{date("d-m-Y",strtotime($agent->created_at))}}</td>
                                     <th>Created By</th>
                                     <td>{{$agent->admin ? $agent->admin->name : null}}</td>
                                 </tr>
                              </tbody>
                          </table>
                        </div>
                        <div class="col-12 col-sm-6 col-md-6 col-lg-6 col-xl-6">
                         @php
                         if(!empty($agent->photo))
                         {
                             $img = route('get.doc',base64_encode($agent->photo));
                         }
                         else
                         {
                             $img = asset('theme/images/4.png');
                         }
                      @endphp
                            <img class="border-dark" id="profile_image_grid" src="{{$img}}" style="width:250px;margin-bottom:10px;" alt="">
                        </div>
                    </div>
                </div>
            </div>
            <div class="card">
                <div class="card-header bg-primary">
                    <h6>Documents</h6>
                </div>
                <div class="card-body table-responsive">
                    <table class="table table-borderless">
                        <thead>
                        <tr>
                            <th>Document</th>
                            <th>Link/View</th>
                            <th> Date</th>
                        </tr>
                        </thead>
                        <tbody>
                        @if(!empty($agent->documents))
                            @php
                                $documents =   extract_doc_keys($agent->documents,'file_url','document_title','date_key','date_value');
                            @endphp
                            @foreach($documents as $doc)
                                <tr>
                                    <th>{{ucwords(strtolower($doc['document_title']))}}</th>
                                    <th>
                                        @php
                                            if(!empty($doc['file_url']))
                                            {
                                                $url = route('get.doc',base64_encode($doc['file_url']));
                                            }
                                            else
                                            {
                                                $url = asset('theme/images/4.png');
                                            }
                                        @endphp
                                        <a target="_blank" class="btn btn-primary" href="{{$url}}">
                                            <i class="fa fa-eye"></i>View
                                        </a>
                                        <a target="_blank" class="btn btn-info" href="{{$url}}" download>
                                            <i class="fa fa-file-download"></i>Download
                                        </a>
                                    </th>
                                    <th>
                                       {{ucwords(strtolower($doc['date_key']))}} : {{$doc['date_value'] ? date("d-m-Y",strtotime($doc['date_value'])): null}}
                                    </th>
                                </tr>
                            @endforeach
                        @endif
                        </tbody>
                    </table>
                </div>
            </div>
     @if(!empty($agent->authorised_person))
            <div class="card">
                <div class="card-header bg-primary">
                     <h6>Authorised Person Detail</h6>
                </div>
                <div class="card-body">
                   <div class="row">
                       <div class="col-12 col-sm-8 col-md-8 col-lg-8 col-xl-8">
                           <table class="table table-borderless">
                              <tbody>
                                 <tr>
                                     <th>Name</th>
                                     <td>{{$agent->authorised_person->name}}</td>
                                     <th>Email</th>
                                     <td>{{$agent->authorised_person->email}}</td>
                                     <th></th>
                                     <td></td>
                                 </tr>
                                 <tr>
                                     <th>Mobile</th>
                                     <td>{{$agent->authorised_person->mobile}}</td>
                                     <th>Account Created</th>
                                     <td>{{date("d-m-Y",strtotime($agent->authorised_person->created_at))}}</td>
                                     <th></th>
                                     <td></td>
                                 </tr>
                              </tbody>
                          </table>
                       </div>
                   </div>

                    @if(!empty($agent->authorised_person->documents))
                    <div class="row">
                        <div class="col-12 col-sm-12 col-lg-12 col-xl-12">
               <div class="card">
                <div class="card-header bg-warning">
                    <h6 class="text-white">Documents</h6>
                </div>
                <div class="card-body table-responsive">
                    <table class="table table-borderless">
                        <thead>
                        <tr>
                            <th>Document</th>
                            <th>Link/View</th>
                            <th> Date</th>
                        </tr>
                        </thead>
                        <tbody>
                            @php
                                $documents =   extract_doc_keys($agent->authorised_person->documents,'file_url','document_title','date_key','date_value');
                            @endphp
                            @foreach($documents as $doc)
                                <tr>
                                    <th>{{str_replace("Auth_person_","",ucwords(strtolower($doc['document_title'])))}}</th>
                                    <th>
                                        @php
                                            if(!empty($doc['file_url']))
                                            {
                                                $url = route('get.doc',base64_encode($doc['file_url']));
                                            }
                                            else
                                            {
                                                $url = asset('theme/images/4.png');
                                            }
                                        @endphp
                                        <a target="_blank" class="btn btn-primary" href="{{$url}}">
                                            <i class="fa fa-eye"></i>View
                                        </a>
                                        <a target="_blank" class="btn btn-info" href="{{$url}}" download>
                                            <i class="fa fa-file-download"></i>Download
                                        </a>
                                    </th>
                                    <th>
                                       {{ucwords(strtolower($doc['date_key']))}} : {{$doc['date_value'] ? date("d-m-Y",strtotime($doc['date_value'])): null}}
                                    </th>
                                </tr>
                            @endforeach

                        </tbody>
                    </table>
                </div>
            </div>
                        </div>
                    </div>
                        @endif
                </div>
            </div>
     @endif



            <div class="card">
                <div class="card-header bg-primary">
                    <h6>Account Detail</h6>
                </div>
                <div class="card-body table-responsive">
                    <table class="table table-borderless">
                        <tbody>
                        <tr>
                            <th>Bank Name</th>
                            <td>{{ucwords($agent->bank_name)}}</td>
                            <th>Account Holder Name</th>
                            <td>{{$agent->banking_name	}}</td>
                            <th>Bank Swift Code</th>
                            <td>{{$agent->bank_swift_code}}</td>
                            <th>IBAN Number</th>
                            <td>{{$agent->bank_account}}</td>
                        </tr>
                        </tbody>
                    </table>
                </div>
            </div>

            <div class="card">
                <div class="card-header bg-primary">
                    <h6>Billing Address Detail</h6>
                </div>
                <div class="card-body table-responsive">
                   <table class="table table-borderless">
                        <tbody>
                        <tr>
                            <th>Country</th>
                            <td>{{ucwords($agent->country ?$agent->country->name : null )}}</td>
                            <th>State</th>
                            <td>{{$agent->state ? $agent->state->name :null }}</td>
                            <th>City</th>
                            <td>{{$agent->city ?$agent->city->name : null}}</td>
                            <th>Address</th>
                            <td>{{$agent->address}}</td>
                        </tr>
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="form-group">
                <a href="{{route('agent.edit',$agent->id)}}" class="btn btn-info">Edit Agent</a>
            </div>
        </div>
    </div>
@endsection
