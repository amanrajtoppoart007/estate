@extends("admin.layout.base")
@include("admin.include.breadcrumb",["page_title"=>"View Buyer Detail"])
@section("content")

<!-- Content -->
    <div class="content container-fluid">
        <span class="float-right">View Buyer Detail</span>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}">Home</a></li>
                <li class="breadcrumb-item active" aria-current="page">View Buyer Detail</li>
            </ol>

        </nav>

        <div class="row gx-2 gx-lg-3 mt-3">
            <div class="col-lg-12 mb-3 mb-lg-0">

                <div class="card">
       
                <!-- Header -->
                    <div class="card-header">
                        <div class="row justify-content-between align-items-center flex-grow-1">
                            <div class="col-sm-6 col-md-4 mb-3 mb-sm-0">
                                Personal Detail
                            </div>
                        </div>
                        <!-- End Row -->
                    </div>
                    <!-- End Header -->
        <div class="card-body">
             <div class="row">
                 <div class="col-12 col-sm-6 col-md-8 col-xl-8 col-lg-8">
                     <table class="table table-borderless">
                         <tbody>
                         <tr>
                             <th>Name</th>
                             <td>{{$buyer->name}}</td>
                             <th>Email</th>
                             <td>{{$buyer->email}}</td>
                             <th>Mobile</th>
                             <td>{{$buyer->mobile}}</td>
                         </tr>

                         <tr>
                             <th>Emirates Id</th>
                             <td>{{$buyer->emirates_id}}</td>
                             <th></th>
                             <td></td>
                             <th></th>
                             <td></td>
                         </tr>
                         </tbody>
                     </table>
                 </div>
                 <div class="col-12 col-sm-6 col-md-4 col-xl-4 col-lg-4">
                    <div class="text-center">
                  <div class="user_photo">
                       @php
                         if(!empty($buyer->buyer_image))
                         {
                             $img = route('get.doc',base64_encode($buyer->buyer_image));
                         }
                         else
                         {
                             $img = asset('theme/images/4.png');
                         }
                      @endphp
                    <img id="profile_image_grid" src="{{$img}}" style="width:250px;margin-bottom:10px;" alt="">
                  </div>
                </div>
                 </div>
             </div>
        </div>
    </div>

    <div class="card mt-3">
        
        <div class="card-header">
                        <div class="row justify-content-between align-items-center flex-grow-1">
                            <div class="col-sm-6 col-md-4 mb-3 mb-sm-0">
                                Address Detail
                            </div>
                        </div>
                        <!-- End Row -->
                    </div>
                    <!-- End Header -->
        <div class="card-body">
            <table class="table table-borderless">
                <tbody>
                 <tr>
                     <th>Country</th>
                     <td>{{$buyer->country ? $buyer->country->name :null }}</td>
                     <th>Emirates/State</th>
                     <td>{{$buyer->state ? $buyer->state->name :null }}</td>
                     <th>City</th>
                     <td>{{$buyer->city ? $buyer->city->name :null }}</td>
                 </tr>
                  <tr>
                      <th>Address</th>
                      <td>{{$buyer->address ? $buyer->address :null }}</td>
                      <th></th>
                      <th></th>
                      <th></th>
                      <th></th>
                  </tr>
                </tbody>
            </table>

        </div>
    </div>
                <!-- End Card -->

            </div>
        </div>


    </div>
    <!-- End Content -->
@endsection
