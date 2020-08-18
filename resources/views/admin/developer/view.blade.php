@extends('admin.layout.app')
@section('breadcrumb')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h4 class="m-0 text-dark">View Property Developer</h4>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}">Home</a></li>
                        <li class="breadcrumb-item active">View property developer</li>
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
                    <h6>Owner Detail</h6>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-12 col-sm-6 col-md-6 col-lg-6 col-xl-6">
                            <table class="table table-borderless">
                                <tbody>
                                <tr>
                                    <th>OwnerType</th>
                                    <td>{{ucwords($owner->firm_type)}}</td>
                                    <th>Name</th>
                                    <td>{{$owner->name}}</td>
                                    <th>Email</th>
                                    <td>{{$owner->email}}</td>
                                </tr>
                                <tr>
                                    <th>Emirates Id</th>
                                    <td>{{$owner->emirates_id}}</td>
                                    <th>Mobile</th>
                                    <td>{{$owner->mobile}}</td>
                                    <th></th>
                                    <td></td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                        <div class="col-12 col-sm-6 col-md-6 col-lg-6 col-xl-6">
                            @php
                                if(!empty($owner->photo))
                                {
                                    $img = route('get.doc',base64_encode($owner->photo));
                                }
                                else
                                {
                                    $img = asset('theme/images/4.png');
                                }
                            @endphp
                            <img class="border-dark" id="profile_image_grid" src="{{$img}}"
                                 style="width:250px;margin-bottom:10px;" alt="">
                        </div>
                    </div>
                </div>
            </div>
            <div class="card">
                <div class="card-header bg-primary">
                    <h6>Documents</h6>
                </div>
                <div class="card-body">
                    <table class="table table-borderless">
                        <thead>
                        <tr>
                            <th>Document</th>
                            <th>Link/View</th>
                            <th> Date</th>
                        </tr>
                        </thead>
                        <tbody>
                        @if(!$owner->documents->isEmpty())
                            @php
                                $documents =   extract_doc_keys($owner->documents,'file_url','document_title','date_key','date_value');
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
                                        <a target="_blank" class="btn btn-primary" href="{{$url}}"
                                                alt="{{ucwords(strtolower($doc['document_title']))}}">
                                            <i class="fa fa-eye"></i>View
                                        </a>
                                         <a target="_blank" class="btn btn-info" href="{{$url}}"
                                           alt="{{ucwords(strtolower($doc['document_title']))}}" download>
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

            <div class="card">
                <div class="card-header bg-primary">
                    <h6>Account Detail</h6>
                </div>
                <div class="card-body">
                    <table class="table table-borderless">
                        <tbody>
                        <tr>
                            <th>Bank Name</th>
                            <td>{{ucwords($owner->bank_name)}}</td>
                            <th>Account Holder Name</th>
                            <td>{{$owner->banking_name	}}</td>
                            <th>Bank Swift Code</th>
                            <td>{{$owner->bank_swift_code}}</td>
                            <th>IBAN Number</th>
                            <td>{{$owner->bank_account}}</td>
                        </tr>
                        </tbody>
                    </table>
                </div>
            </div>

            <div class="card">
                <div class="card-header bg-primary">
                    <h6>Billing Address Detail</h6>
                </div>
                <div class="card-body">
                    <table class="table table-borderless">
                        <tbody>
                        <tr>
                            <th>Country</th>
                            <td>{{ucwords($owner->country ? $owner->country->name : null )}}</td>
                            <th>State</th>
                            <td>{{$owner->state ? $owner->state->name : null}}</td>
                            <th>City</th>
                            <td>{{$owner->city? $owner->city->name : null}}</td>
                            <th>Address</th>
                            <td>{{$owner->address}}</td>
                        </tr>
                        </tbody>
                    </table>
                </div>
            </div>
            @if(!empty($owner->authorised_person))
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
                                     <td>{{$owner->authorised_person->name}}</td>
                                     <th>Email</th>
                                     <td>{{$owner->authorised_person->email}}</td>
                                     <th></th>
                                     <td></td>
                                 </tr>
                                 <tr>
                                     <th>Mobile</th>
                                     <td>{{$owner->authorised_person->mobile}}</td>
                                     <th>Account Created</th>
                                     <td>{{date("d-m-Y",strtotime($owner->authorised_person->created_at))}}</td>
                                     <th></th>
                                     <td></td>
                                 </tr>
                              </tbody>
                          </table>
                       </div>
                   </div>

                    @if(!empty($owner->authorised_person->documents))
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
                                $documents =   extract_doc_keys($owner->authorised_person->documents,'file_url','document_title','date_key','date_value');
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
        </div>
    </div>
@endsection
