@extends("admin.layout.app")
@include("admin.include.breadcrumb",["page_title"=>"View Buyer Detail"])
@section("content")
    <div class="card">
        <div class="card-header bg-gradient-navy">
            <h6>Personal Detail</h6>
        </div>
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
    <div class="card">
        <div class="card-header bg-gradient-navy">
            <h6>Address Detail</h6>
        </div>
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
@endsection
