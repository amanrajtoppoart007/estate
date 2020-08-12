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
                        <div class="col-12 col-sm-6 col-md-6 col-lg-6 col-xl-6">
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
                             $img = asset('theme/default/images/dashboard/4.png');
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
                <div class="card-body">
                    <table class="table table-borderless">
                        <thead>
                           <tr>
                               <th>Document</th>
                               <th>Link/View</th>
                               <th>Expiry Date</th>
                           </tr>
                        </thead>
                        <tbody>
                          <tr>
                              <th>Emirates Id</th>
                              <th>
                                  @php
                                      if(!empty($agent->emirates_id_doc))
                                      {
                                          $emirates_id_doc = route('get.doc',base64_encode($agent->emirates_id_doc));
                                      }
                                      else
                                      {
                                          $emirates_id_doc = asset('theme/default/images/dashboard/4.png');
                                      }
                                  @endphp
                                  <a target="_blank" class="img-thumbnail" href="{{$emirates_id_doc}}" alt="Owner Emirates Id">
                                     <i class="fa fa-file"></i>
                                  </a>
                              </th>
                              <th>
                                  {{$agent->emirates_exp_date ? date("d-m-Y",strtotime($agent->emirates_exp_date)): null}}
                              </th>
                          </tr>
                          <tr>
                              <th>Passport</th>
                              <th>
                                  @php
                                      if(!empty($agent->passport))
                                      {
                                          $passport = route('get.doc',base64_encode($agent->passport));
                                      }
                                      else
                                      {
                                          $passport = asset('theme/default/images/dashboard/4.png');
                                      }
                                  @endphp
                                  <a target="_blank" class="img-thumbnail" href="{{$passport}}" alt="Owner Passport">
                                     <i class="fa fa-file"></i>
                                  </a>
                              </th>
                              <th>
                                  {{$agent->passport_exp_date ? date("d-m-Y",strtotime($agent->passport_exp_date)): null}}
                              </th>
                          </tr>
                        <tr>
                              <th>Visa</th>
                              <th>
                                  @php
                                      if(!empty($agent->visa))
                                      {
                                          $visa = route('get.doc',base64_encode($agent->visa));
                                      }
                                      else
                                      {
                                          $visa = asset('theme/default/images/dashboard/4.png');
                                      }
                                  @endphp
                                  <a target="_blank" class="img-thumbnail" href="{{$visa}}" alt="Owner Visa">
                                     <i class="fa fa-file"></i>
                                  </a>
                              </th>
                              <th>
                                  {{$agent->visa_exp_date ? date("d-m-Y",strtotime($agent->visa_exp_date)): null}}
                              </th>
                          </tr>
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
                <div class="card-body">
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
