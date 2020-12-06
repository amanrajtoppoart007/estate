@extends('admin.layout.base')
@section('content')



<!-- Content -->
    <div class="content container-fluid">
        <span class="float-right">View Property Agent</span>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}">Home</a></li>
                <li class="breadcrumb-item active" aria-current="page">View Property Agent</li>
            </ol>
        </nav>

        <div class="row gx-2 gx-lg-3 mt-3">
            <div class="col-lg-12 mb-3 mb-lg-0">

                <!-- Card -->
    <div class="card">
        <div class="card-body">
            <div class="card">
                <div class="card-header">
                    <h6>Agent Detail</h6>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-12 col-sm-6 col-md-6 col-lg-6 col-xl-6">
                          <table class="table table-borderless">
                              <tbody>
                                 <tr>
                                     <th class="font-weight-bold">Name</th>
                                     <td>{{$agent->name}}</td>
                                     <th class="font-weight-bold">Email</th>
                                     <td>{{$agent->email}}</td>
                                     <th></th>
                                     <td></td>
                                 </tr>
                                 <tr>
                                     <th class="font-weight-bold">Mobile</th>
                                     <td>{{$agent->mobile}}</td>
                                     <th class="font-weight-bold">Account Created</th>
                                     <td>{{date("d-m-Y",strtotime($agent->created_at))}}</td>
                                     <th class="font-weight-bold">Created By</th>
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
             <div class="card mt-3">
                <div class="card-header">
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
                                        <a target="_blank" class="btn btn-soft-primary" href="{{$url}}">
                                            <i class="fa fa-eye"></i> View
                                        </a>
                                        <a target="_blank" class="btn btn-soft-info" href="{{$url}}" download>
                                            <i class="fa fa-file-download"></i> Download
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
            <div class="card mt-3">
                <div class="card-header bg-primary">
                     <h6>Authorised Person Detail</h6>
                </div>
                <div class="card-body">
                   <div class="row">
                       <div class="col-12 col-sm-8 col-md-8 col-lg-8 col-xl-8">
                           <table class="table table-borderless">
                              <tbody>
                                 <tr>
                                     <th class="font-weight-bold">Name</th>
                                     <td>{{$agent->authorised_person->name}}</td>
                                     <th class="font-weight-bold">Email</th>
                                     <td>{{$agent->authorised_person->email}}</td>
                                     <th></th>
                                     <td></td>
                                 </tr>
                                 <tr>
                                     <th class="font-weight-bold">Mobile</th>
                                     <td>{{$agent->authorised_person->mobile}}</td>
                                     <th class="font-weight-bold">Account Created</th>
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
               <div class="card mt-3">
                <div class="card-header">
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
                        @if(!empty($agent->documents))
                            @php
                                $documents =   extract_doc_keys($agent->authorised_person->documents,'file_url','document_title','date_key','date_value');
                            @endphp
                            @foreach($documents as $doc)
                                <tr>
                                    <th class="font-weight-bold">{{str_replace("Auth_person_","",ucwords(strtolower($doc['document_title'])))}}</th>
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
                                        <a target="_blank" class="btn btn-soft-primary" href="{{$url}}">
                                            <i class="fa fa-eye"></i> View
                                        </a>
                                        <a target="_blank" class="btn btn-soft-info" href="{{$url}}" download>
                                            <i class="fa fa-file-download"></i> Download
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
                        </div>
                    </div>
                        @endif
                </div>
            </div>
     @endif

            <div class="card mt-3">
                <div class="card-header">
                    <h6>Account Detail</h6>
                </div>
                <div class="card-body">
                    <table class="table table-borderless">
                        <tbody>
                        <tr>
                            <th class="font-weight-bold">Bank Name</th>
                            <td>{{ucwords($agent->bank_name)}}</td>
                            <th class="font-weight-bold">Account Holder Name</th>
                            <td>{{$agent->banking_name  }}</td>
                            <th class="font-weight-bold">Bank Swift Code</th>
                            <td>{{$agent->bank_swift_code}}</td>
                            <th class="font-weight-bold">IBAN Number</th>
                            <td>{{$agent->bank_account}}</td>
                        </tr>
                        </tbody>
                    </table>
                </div>
            </div>

            <div class="card mt-3">
                <div class="card-header">
                    <h6>Billing Address Detail</h6>
                </div>
                <div class="card-body">
                   <table class="table table-borderless">
                        <tbody>
                        <tr>
                            <th class="font-weight-bold">Country</th>
                            <td>{{ucwords($agent->country ?$agent->country->name : null )}}</td>
                            <th class="font-weight-bold">State</th>
                            <td>{{$agent->state ? $agent->state->name :null }}</td>
                            <th class="font-weight-bold">City</th>
                            <td>{{$agent->city ?$agent->city->name : null}}</td>
                            <th class="font-weight-bold">Address</th>
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
                <!-- End Card -->

            </div>
        </div>


    </div>
    <!-- End Content -->


@endsection
