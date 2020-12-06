@extends('admin.layout.base')
@section('content')


<!-- Content -->
    <div class="content container-fluid">
        <span class="float-right">View Property Owner</span>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}">Home</a></li>
                <li class="breadcrumb-item active" aria-current="page">View Property Owner</li>
            </ol>
        </nav>

        <div class="row gx-2 gx-lg-3 mt-3">
            <div class="col-lg-12 mb-3 mb-lg-0">

                <!-- Card -->
                <div class="card">
        <div class="card-body">
            <div class="card mt-3">
                <div class="card-header">
                    <h6>Owner Detail</h6>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-12 col-sm-12 col-md-8 col-lg-8 col-xl-8">
                          <table class="table table-borderless">
                              <tbody>
                                 <tr>
                                     <th class="font-weight-bold">OwnerType</th>
                                     <td>{{ucwords($owner->firm_type)}}</td>
                                     <th class="font-weight-bold">Name</th>
                                     <td>{{$owner->name}}</td>
                                     <th class="font-weight-bold">Email</th>
                                     <td>{{$owner->email}}</td>
                                 </tr>
                                 <tr>
                                     <th class="font-weight-bold">Emirates Id</th>
                                     <td>{{$owner->emirates_id}}</td>
                                     <th class="font-weight-bold">Mobile</th>
                                     <td>{{$owner->mobile}}</td>
                                      <th></th>
                                     <td></td>
                                 </tr>
                              </tbody>
                          </table>
                        </div>
                        <div class="col-12 col-sm-12 col-md-4 col-lg-4 col-xl-4">
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
                            <img class="border-dark" id="profile_image_grid" src="{{$img}}" style="width:250px;margin-bottom:10px;" alt="">
                        </div>
                    </div>
                </div>
            </div>
            <div class="card mt-3">
                <div class="card-header">
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

            <div class="card mt-3">
                <div class="card-header">
                    <h6>Account Detail</h6>
                </div>
                <div class="card-body">
                    <table class="table table-borderless">
                        <tbody>
                        <tr>
                            <th class="font-weight-bold">Bank Name</th>
                            <td>{{ucwords($owner->bank_name)}}</td>
                            <th class="font-weight-bold">Account Holder Name</th>
                            <td>{{$owner->banking_name  }}</td>
                            <th class="font-weight-bold">Bank Swift Code</th>
                            <td>{{$owner->bank_swift_code}}</td>
                            <th class="font-weight-bold">IBAN Number</th>
                            <td>{{$owner->bank_account}}</td>
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
                            <td>{{ucwords($owner->country?$owner->country->name:null)}}</td>
                            <th class="font-weight-bold">State</th>
                            <td>{{$owner->state ? $owner->state->name : null}}</td>
                            <th class="font-weight-bold">City</th>
                            <td>{{$owner->city?$owner->city->name : null}}</td>
                            <th class="font-weight-bold">Address</th>
                            <td>{{$owner->address}}</td>
                        </tr>
                        </tbody>
                    </table>
                </div>
            </div>
           @if(!empty($owner->authorised_person->documents))
                        <div class="row">
                        <div class="col-12 col-sm-12 col-lg-12 col-xl-12">
               <div class="card py-2">
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
                <!-- End Card -->

            </div>
        </div>


    </div>
    <!-- End Content -->
@endsection
