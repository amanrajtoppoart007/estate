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
                                      if(!empty($owner->emirates_id_doc))
                                      {
                                          $emirates_id_doc = route('get.doc',base64_encode($owner->emirates_id_doc));
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
                                  {{$owner->emirates_exp_date ? date("d-m-Y",strtotime($owner->emirates_exp_date)): null}}
                              </th>
                          </tr>
                          <tr>
                              <th>Passport</th>
                              <th>
                                  @php
                                      if(!empty($owner->passport))
                                      {
                                          $passport = route('get.doc',base64_encode($owner->passport));
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
                                  {{$owner->passport_exp_date ? date("d-m-Y",strtotime($owner->passport_exp_date)): null}}
                              </th>
                          </tr>
                        <tr>
                              <th>Visa</th>
                              <th>
                                  @php
                                      if(!empty($owner->visa))
                                      {
                                          $visa = route('get.doc',base64_encode($owner->visa));
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
                                  {{$owner->visa_exp_date ? date("d-m-Y",strtotime($owner->visa_exp_date)): null}}
                              </th>
                          </tr>
                          <tr>
                              <th>Power Of Attorney</th>
                              <th>
                                  @php
                                      if(!empty($owner->poa))
                                      {
                                          $poa = route('get.doc',base64_encode($owner->poa));
                                      }
                                      else
                                      {
                                          $poa = asset('theme/default/images/dashboard/4.png');
                                      }
                                  @endphp
                                  <a target="_blank" class="img-thumbnail" href="{{$poa}}" alt="Owner's Power Of Attorney">
                                     <i class="fa fa-file"></i>
                                  </a>
                              </th>
                              <th>
                                  {{$owner->poa_exp_date ? date("d-m-Y",strtotime($owner->poa_exp_date)): null}}
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
                            <td>{{ucwords($owner->country)}}</td>
                            <th>State</th>
                            <td>{{$owner->state}}</td>
                            <th>City</th>
                            <td>{{$owner->city}}</td>
                            <th>Address</th>
                            <td>{{$owner->address}}</td>
                        </tr>
                        </tbody>
                    </table>
                </div>
            </div>
           @if(!empty($owner->auth_person))
            <div class="card">
                <div class="card-header bg-primary">
                    <h6>Auth Person Detail</h6>
                </div>
                <div class="card-body">
                    <table class="table table-borderless">
                              <tbody>
                                 <tr>
                                     <th>Name</th>
                                     <td>{{$owner->auth_person->name}}</td>
                                     <th>Email</th>
                                     <td>{{$owner->auth_person->email}}</td>
                                     <th>Mobile</th>
                                     <td>{{$owner->auth_person->mobile}}</td>
                                 </tr>
                                 <tr>
                                     <th>Designation/Relation</th>
                                     <td>{{$owner->auth_person->designation}}</td>
                                     <th></th>
                                     <td></td>
                                     <th></th>
                                     <td></td>
                                 </tr>
                              </tbody>
                          </table>

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
                                      if(!empty($owner->auth_person->emirates_id))
                                      {
                                          $emirates_id_doc = route('get.doc',base64_encode($owner->auth_person->emirates_id));
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
                                  {{$owner->auth_person->emirates_id_exp_date ? date("d-m-Y",strtotime($owner->auth_person->emirates_id_exp_date)): null}}
                              </th>
                          </tr>
                          <tr>
                              <th>Passport</th>
                              <th>
                                  @php
                                      if(!empty($owner->auth_person->passport))
                                      {
                                          $passport = route('get.doc',base64_encode($owner->auth_person->passport));
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
                                  {{$owner->auth_person->passport_exp_date ? date("d-m-Y",strtotime($owner->auth_person->passport_exp_date)): null}}
                              </th>
                          </tr>
                        <tr>
                              <th>Visa</th>
                              <th>
                                  @php
                                      if(!empty($owner->auth_person->visa))
                                      {
                                          $visa = route('get.doc',base64_encode($owner->auth_person->visa));
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
                                  {{$owner->auth_person->visa_exp_date ? date("d-m-Y",strtotime($owner->auth_person->visa_exp_date)): null}}
                              </th>
                          </tr>
                          <tr>
                              <th>Power Of Attorney</th>
                              <th>
                                  @php
                                      if(!empty($owner->auth_person->poa))
                                      {
                                          $poa = route('get.doc',base64_encode($owner->auth_person->poa));
                                      }
                                      else
                                      {
                                          $poa = asset('theme/default/images/dashboard/4.png');
                                      }
                                  @endphp
                                  <a target="_blank" class="img-thumbnail" href="{{$poa}}" alt="Owner's Power Of Attorney">
                                     <i class="fa fa-file"></i>
                                  </a>
                              </th>
                              <th>
                                  {{$owner->auth_person->poa_exp_date ? date("d-m-Y",strtotime($owner->auth_person->poa_exp_date)): null}}
                              </th>
                          </tr>
                        </tbody>
                    </table>
                </div>
            </div>
         @endif
        </div>
    </div>
@endsection
