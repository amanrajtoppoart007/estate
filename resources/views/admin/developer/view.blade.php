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
                <div class="card-header bg-gradient-gray">
                    <h6>Owner Detail</h6>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-12 col-sm-9 col-md-9 col-lg-9 col-xl-9">

                            <div class="row">
                                <div class="col-6 col-sm-6 col-md-2 col-lg-2 col-xl-2 mb-2">
                                   <span class="font-weight-bold">Owner Type</span>
                                </div>
                                <div class="col-6 col-sm-6 col-md-2 col-lg-2 col-xl-2 mb-2">{{ucwords($owner->firm_type)}}</div>
                                <div class="col-6 col-sm-6 col-md-1 col-lg-1 col-xl-1 mb-2">
                                    <span class="font-weight-bold">Name</span>
                                </div>
                                <div class="col-6 col-sm-6 col-md-2 col-lg-2 col-xl-2 mb-2">{{$owner->name}}</div>
                                <div class="col-6 col-sm-6 col-md-1 col-lg-1 col-xl-1 mb-2"><span class="font-weight-bold">Email</span></div>
                                <div class="col-6 col-sm-6 col-md-3 col-lg-3 col-xl-3 mb-2">{{$owner->email}}</div>
                            </div>
                             <div class="row">
                                <div class="col-6 col-sm-6 col-md-2 col-lg-2 col-xl-2 mb-2"><span class="font-weight-bold">Emirates Id</span></div>
                                <div class="col-6 col-sm-6 col-md-2 col-lg-2 col-xl-2 mb-2">{{$owner->emirates_id}}</div>
                                <div class="col-6 col-sm-6 col-md-1 col-lg-1 col-xl-1 mb-2"><span class="font-weight-bold">Mobile</span></div>
                                <div class="col-6 col-sm-6 col-md-2 col-lg-2 col-xl-2 mb-2">{{$owner->mobile}}</div>
                                <div class="col-6 col-sm-6 col-md-2 col-lg-2 col-xl-2 mb-2"></div>
                                <div class="col-6 col-sm-6 col-md-2 col-lg-2 col-xl-2 mb-2"></div>
                            </div>
                        </div>
                        <div class="col-12 col-sm-3 col-md-3 col-lg-3 col-xl-3 text-right">
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
                <div class="card-header bg-gradient-gray">
                    <h6>Documents</h6>
                </div>
                <div class="card-body table-responsive">
                    <table class="table table-bordered">
                        <thead>
                        <tr>
                            <th>Document</th>
                            <th>Action</th>
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
                                    <th>{{snake_case_string_to_word($doc['document_title'])}}</th>
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
                                        <a target="_blank" class="btn btn-outline-secondary" href="{{$url}}">
                                            <img src="{{asset('assets/img/icons/vision.png')}}" alt="View File">
                                        </a>
                                         <a target="_blank" class="btn btn-outline-success" href="{{$url}}" download>
                                            <img src="{{asset('assets/img/icons/download.png')}}" alt="View File">
                                        </a>
                                    </th>
                                    <th>
                                       {{snake_case_string_to_word($doc['date_key'])}} : {{$doc['date_value'] ? date("d-m-Y",strtotime($doc['date_value'])): null}}
                                    </th>
                                </tr>
                            @endforeach
                        @endif
                        </tbody>
                    </table>
                </div>
            </div>

            <div class="card">
                <div class="card-header bg-gradient-gray">
                    <h6>Account Detail</h6>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-6 col-sm-6 col-md-2 col-lg-2 col-xl-2 mb-2"><span class="font-weight-bold">Bank Name</span>
                        </div>
                        <div class="col-6 col-sm-6 col-md-2 col-lg-2 col-xl-2 mb-2">{{$owner->bank_name}}</div>
                        <div class="col-6 col-sm-6 col-md-2 col-lg-2 col-xl-2 mb-2"><span class="font-weight-bold">Account Holder Name</span>
                        </div>
                        <div class="col-6 col-sm-6 col-md-2 col-lg-2 col-xl-2 mb-2">{{$owner->banking_name}}</div>
                        <div class="col-6 col-sm-6 col-md-2 col-lg-2 col-xl-2 mb-2">
                            <span class="font-weight-bold">
                                Bank Swift Code
                            </span>
                        </div>
                        <div class="col-6 col-sm-6 col-md-2 col-lg-2 col-xl-2 mb-2">
                             {{$owner->bank_swift_code}}
                        </div>
                        <div class="col-6 col-sm-6 col-md-2 col-lg-2 col-xl-2 mb-2">
                            <span class="font-weight-bold">
                                IBAN Number
                            </span>
                        </div>
                        <div class="col-6 col-sm-6 col-md-2 col-lg-2 col-xl-2 mb-2">{{$owner->iban_number}}</div>
                        <div class="col-6 col-sm-6 col-md-2 col-lg-2 col-xl-2 mb-2">
                            <span class="font-weight-bold">
                                A/C Number
                            </span>
                        </div>
                        <div class="col-6 col-sm-6 col-md-2 col-lg-2 col-xl-2 mb-2">
                            {{$owner->bank_account}}
                        </div>
                    </div>
                </div>
            </div>

            <div class="card">
                <div class="card-header bg-gradient-gray">
                    <h6>Billing Address Detail</h6>
                </div>
                <div class="card-body table-responsive">
                    <div class="row">
                        <div class="col-6 col-sm-6 col-md-2 col-lg-2 col-xl-2 mb-2"><span class="font-weight-bold">Country</span>
                        </div>
                        <div class="col-6 col-sm-6 col-md-2 col-lg-2 col-xl-2 mb-2">{{ucwords($owner->country ? $owner->country->name : null )}}</div>
                        <div class="col-6 col-sm-6 col-md-2 col-lg-2 col-xl-2 mb-2"><span class="font-weight-bold">State</span>
                        </div>
                        <div class="col-6 col-sm-6 col-md-2 col-lg-2 col-xl-2 mb-2">{{$owner->state ? $owner->state->name : null}}</div>
                        <div class="col-6 col-sm-6 col-md-2 col-lg-2 col-xl-2 mb-2">
                            <span class="font-weight-bold">
                                City
                            </span>
                        </div>
                        <div class="col-6 col-sm-6 col-md-2 col-lg-2 col-xl-2 mb-2">
                             {{$owner->city? $owner->city->name : null}}
                        </div>
                        <div class="col-6 col-sm-6 col-md-2 col-lg-2 col-xl-2 mb-2">
                            <span class="font-weight-bold">
                                Address
                            </span>
                        </div>
                        <div class="col-6 col-sm-6 col-md-2 col-lg-2 col-xl-2 mb-2">{{$owner->address}}</div>
                    </div>
                </div>
            </div>
            @if(!empty($owner->authorised_person))
            <div class="card">
                <div class="card-header bg-gradient-gray">
                     <h6>Authorised Person Detail</h6>
                </div>
                <div class="card-body">
                   <div class="row">
                       <div class="col-12 col-sm-8 col-md-8 col-lg-8 col-xl-8 table-responsive">
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
