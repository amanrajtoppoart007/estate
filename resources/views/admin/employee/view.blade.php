@extends("admin.layout.app")
@include("admin.include.breadcrumb",["page_title"=>"View Employee"])
@section("content")
    <div class="card">
        <div class="card-header bg-gradient-navy">
            <h6>Personal Detail</h6>
        </div>
        <div class="card-body">
             <div class="row">
                 <div class="col-12 col-sm-6 col-md-8 col-xl-8 col-lg-8 table-responsive">
                     <table class="table table-borderless">
                         <tbody>
                         <tr>
                             <th>Name</th>
                             <td>{{$employee->name}}</td>
                             <th>Email</th>
                             <td>{{$employee->email}}</td>
                             <th>Mobile</th>
                             <td>{{$employee->mobile}}</td>
                         </tr>
                         <tr>
                             <th>Gender</th>
                             <td>{{$employee->gender}}</td>
                             <th>Civil Status</th>
                             <td>{{$employee->civil_status}}</td>
                             <th>Age</th>
                             <td>{{$employee->age}}</td>
                         </tr>
                         <tr>
                             <th>Date Of Birth</th>
                             <td>{{$employee->dob ?date("d-m-Y",strtotime($employee->dob)) : null}}</td>
                             <th>Emirates Id</th>
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
    <div class="card">
        <div class="card-header bg-gradient-navy">
            <h6>Employment Detail</h6>
        </div>
        <div class="card-body table-responsive">
           <table class="table table-borderless">
               <tbody>
                 <tr>
                     <th>Department</th>
                     <td>{{$employee->department ? $employee->department->name : null}}</td>
                     <th>Designation</th>
                     <td>{{$employee->designation ? $employee->designation->name : null}}</td>
                     <th>ID</th>
                     <td>{{$employee->id_number}}</td>
                     <th>Work Permit Number</th>
                     <td>{{$employee->work_permit_number}}</td>
                 </tr>
                 <tr>
                     <th>Email (Office) </th>
                     <td>{{$employee->official_email}}</td>
                     <th>Office Joining Date</th>
                     <td>{{$employee->joining_date ? date("d-m-Y",strtotime($employee->joining_date)) : null}}</td>
                     <th>Fixed Salary</th>
                     <td>{{$employee->fixed_salary}}</td>
                     <th>Employee Status</th>
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
                     <th>Country</th>
                     <td>{{$employee->country ? $employee->country->name :null }}</td>
                     <th>Emirates/State</th>
                     <td>{{$employee->state ? $employee->state->name :null }}</td>
                     <th>City</th>
                     <td>{{$employee->city ? $employee->city->name :null }}</td>
                 </tr>
                  <tr>
                      <th>Address</th>
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
                       <th>Bank Name</th>
                       <td>{{$employee->bank_name}}</td>
                       <th>IBAN Number</th>
                       <td>{{$employee->iban_number}}</td>
                       <th>A/c Number</th>
                       <td>{{$employee->bank_account}}</td>
                   </tr>

                 </tbody>
             </table>
        </div>
    </div>
@endsection
