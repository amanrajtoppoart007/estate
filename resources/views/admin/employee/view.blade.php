@extends("admin.layout.base")
@section("content")


<!-- Content -->
    <div class="content container-fluid">
        <span class="float-right">View Employee</span>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}">Home</a></li>
                <li class="breadcrumb-item active" aria-current="page">View Employee</li>
            </ol>
        </nav>

        <div class="row gx-2 gx-lg-3 mt-3">
            <div class="col-lg-12 mb-3 mb-lg-0">

                <!-- Card -->
                <div class="card">
        <div class="card-header">
            <h6>Personal Detail</h6>
        </div>
        <div class="card-body">
             <div class="row">
                 <div class="col-12 col-sm-6 col-md-8 col-xl-8 col-lg-8 table-responsive">
                     <table class="table table-borderless">
                         <tbody>
                         <tr>
                             <th class="font-weight-bold">Name</th>
                             <td>{{$employee->name}}</td>
                             <th class="font-weight-bold">Email</th>
                             <td>{{$employee->email}}</td>
                             <th class="font-weight-bold">Mobile</th>
                             <td>{{$employee->mobile}}</td>
                         </tr>
                         <tr>
                             <th class="font-weight-bold">Gender</th>
                             <td>{{$employee->gender}}</td>
                             <th class="font-weight-bold">Civil Status</th>
                             <td>{{$employee->civil_status}}</td>
                             <th class="font-weight-bold">Age</th>
                             <td>{{$employee->age}}</td>
                         </tr>
                         <tr>
                             <th class="font-weight-bold">Date Of Birth</th>
                             <td>{{$employee->dob ?date("d-m-Y",strtotime($employee->dob)) : null}}</td>
                             <th class="font-weight-bold">Emirates Id</th>
                             <td>{{$employee->emirates_id}}</td>
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
                         if(!empty($employee->photo))
                         {
                             $img = route('get.doc',base64_encode($employee->photo));
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
            <h6>Employment Detail</h6>
        </div>
        <div class="card-body table-responsive">
           <table class="table table-borderless">
               <tbody>
                 <tr>
                     <th class="font-weight-bold">Department</th>
                     <td>{{$employee->department ? $employee->department->name : null}}</td>
                     <th class="font-weight-bold">Designation</th>
                     <td>{{$employee->designation ? $employee->designation->name : null}}</td>
                     <th class="font-weight-bold">ID</th>
                     <td>{{$employee->id_number}}</td>
                     <th class="font-weight-bold">Work Permit Number</th>
                     <td>{{$employee->work_permit_number}}</td>
                 </tr>
                 <tr>
                     <th class="font-weight-bold">Email (Office) </th>
                     <td>{{$employee->official_email}}</td>
                     <th class="font-weight-bold">Office Joining Date</th>
                     <td>{{$employee->joining_date ? date("d-m-Y",strtotime($employee->joining_date)) : null}}</td>
                     <th class="font-weight-bold">Fixed Salary</th>
                     <td>{{$employee->fixed_salary}}</td>
                     <th class="font-weight-bold">Employee Status</th>
                     <td>{{$employee->status ? 'active':'Inactive'}}</td>
                 </tr>
               </tbody>
           </table>
        </div>
    </div>
    <div class="card">
        <div class="card-header bg-gradient-navy">
            <h6>Address Detail</h6>
        </div>
        <div class="card-body table-responsive">
            <table class="table table-borderless">
                <tbody>
                 <tr>
                     <th class="font-weight-bold">Country</th>
                     <td>{{$employee->country ? $employee->country->name :null }}</td>
                     <th class="font-weight-bold">Emirates/State</th>
                     <td>{{$employee->state ? $employee->state->name :null }}</td>
                     <th class="font-weight-bold">City</th>
                     <td>{{$employee->city ? $employee->city->name :null }}</td>
                 </tr>
                  <tr>
                      <th class="font-weight-bold">Address</th>
                      <td>{{$employee->address ? $employee->address :null }}</td>
                      <th></th>
                      <th></th>
                      <th></th>
                      <th></th>
                  </tr>
                </tbody>
            </table>

        </div>
    </div>
    <div class="card">
        <div class="card-header bg-gradient-navy">
            <h6>Account Detail</h6>
        </div>
        <div class="card-body table-responsive">
             <table class="table table-borderless">
                 <tbody>
                   <tr>
                       <th class="font-weight-bold">Bank Name</th>
                       <td>{{$employee->bank_name}}</td>
                       <th class="font-weight-bold">IBAN Number</th>
                       <td>{{$employee->iban_number}}</td>
                       <th class="font-weight-bold">A/c Number</th>
                       <td>{{$employee->bank_account}}</td>
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
