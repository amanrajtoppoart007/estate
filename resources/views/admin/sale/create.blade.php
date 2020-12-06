@extends('admin.layout.base')
@section('content')

<!-- Content -->
    <div class="content container-fluid">
        <span class="float-right">Sale Property</span>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}">Home</a></li>
                <li class="breadcrumb-item active" aria-current="page">Sale Property</li>
            </ol>

        </nav>

        <div class="row gx-2 gx-lg-3 mt-3">
            <div class="col-lg-12 mb-3 mb-lg-0">
        {{Form::open(['id'=>'add_data_form'])}}
          <input type="hidden" name="buyer_id" id="buyer_id" value="{{$buyer->id}}">
          <input type="hidden" name="owner_id" id="owner_id" value="">
          <div class="card">
             <!-- Header -->
              <div class="card-header">
                  <div class="row justify-content-between align-items-center flex-grow-1">
                      <div class="col-sm-6 col-md-4 mb-3 mb-sm-0">
                          Buyer Detail
                      </div>
                  </div>
                  <!-- End Row -->
              </div>
              <!-- End Header -->
             <div class="card-body">
                 <table class="table border-th-td-none">
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
                       <th>PassPort</th>
                       <td>{{($buyer->passport)?'Submitted':'Not Submitted'}}</td>
                       <th>Visa</th>
                       <td>{{($buyer->visa)?'Submitted':'Not Submitted'}}</td>
                       <th>Emirates Id</th>
                       <td>{{$buyer->emirates_id}}</td>
                     </tr>
                     <tr>
                       <th>Country</th>
                       <td>{{$buyer->country->name}}</td>
                       <th>State</th>
                       <td>{{$buyer->state->name}}</td>
                       <th>City</th>
                       <td>{{$buyer->city->name}}</td>
                     </tr>
                     <tr>
                       <th>Address</th>
                       <td>{{$buyer->address}}</td>
                       <th></th>
                       <td></td>
                       <th></th>
                       <td></td>
                     </tr>
                   </tbody>
                 </table>
             </div>
          </div> 
          <div class="card mt-3">
             <div class="card-header">
                   <h6>Property Detail</h6> 
             </div>
             <div class="card-body">
               <div class="row">
              <div class="col-md-4 col-lg-4 col-xl-4">
                <div class="form-group">
                  <label for="state_id">State</label>
                     <select name="state_id" id="state_id" class="js-select2-custom">
                       <option value="">Select State</option>
                       @foreach($states as $state)
                         <option value="{{$state->id}}">{{$state->name}}</option>
                       @endforeach
                     </select>
                </div>
              </div>
              <div class="col-md-4 col-lg-4 col-xl-4">
                <div class="form-group">
                  <label for="city_id">City</label>
                     
                     <select name="city_id" id="city_id" class="js-select2-custom"></select>
                </div>
              </div>
              <div class="col-md-4 col-lg-4 col-xl-4">
                <div class="form-group">
                  <label for="property_id">Property</label>
                  <select name="property_id" id="property_id" class="js-select2-custom"></select>
                   
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-md-4 col-lg-4 col-xl-4">
                <div class="form-group">
                  <label for="property_unit_type_id">Property Unit Type</label>
                  <select name="property_unit_type_id" id="property_unit_type_id" class="js-select2-custom"></select>
                </div>
              </div>
              <div class="col-md-4 col-lg-4 col-xl-4">
                <div class="form-group">
                  <label for="unit_id">Property Unit</label>
                  <select name="unit_id" id="unit_id" class="js-select2-custom"></select>
                   
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-12 col-sm-12 col-md-12 col-lg-12">
                   <table class="table border-th-td-none" id="display_property_detail_grid">
                      <tbody>
                        <tr>
                          <th>Property</th>
                          <td id="disp_property"></td>
                          <th>Property Code</th>
                          <td id="disp_property_code"></td>
                          <th>Unit Code</th>
                          <td id="disp_unit_code"></td>
                          <th>Type</th>
                          <td id="disp_property_type"></td>
                        </tr>
                        <tr>
                          <th>Size (Sqrt)</th>
                          <td id="disp_unit_size"></td>
                          <th>Bedroom</th>
                          <td id="disp_bedroom"></td>
                          <th>Bathroom</th>
                          <td id="disp_bathroom"></td>
                          <th>Balcony</th>
                          <td id="disp_balcony"></td>
                        </tr>
                       
                        <tr>
                          <th>Parking</th>
                          <td id="disp_parking"></td>
                          <th>Hall</th>
                          <td id="disp_hall"></td>
                          <th>Kithchen</th>
                          <td id="disp_kitchen"></td>
                          <th>Price</th>
                          <td id="disp_rental_amount"></td>
                        </tr>
                      </tbody>
                   </table>
              </div>
            </div>
             </div>
          </div> 
          <div class="card mt-3">
             <!-- Header -->
              <div class="card-header">
                  <div class="row justify-content-between align-items-center flex-grow-1">
                      <div class="col-sm-6 col-md-4 mb-3 mb-sm-0">
                          Owner Detail
                      </div>
                  </div>
                  <!-- End Row -->
              </div>
              <!-- End Header -->
             <div class="card-body">
               <table class="table border-th-td-none" id="display_owner_detail_grid">
                   <tbody>
                     <tr>
                       <th>Name</th>
                       <td id="owner_name"></td>
                       <th>Email</th>
                       <td id="owner_email"></td>
                       <th>Mobile</th>
                       <td id="owner_mobile"></td>
                     </tr>
                     <tr>
                       <th>PassPort</th>
                       <td id="owner_passport"></td>
                       <th>Visa</th>
                       <td id="owner_visa"></td>
                       <th>Emirates Id</th>
                       <td id="owner_emirates_id"></td>
                     </tr>
                     <tr>
                       <th>Country</th>
                       <td id="owner_country"></td>
                       <th>State</th>
                       <td id="owner_state"></td>
                       <th>City</th>
                       <td id="owner_city"></td>
                     </tr>
                     <tr>
                       <th>Address</th>
                       <td id="owner_address"></td>
                       <th></th>
                       <td></td>
                       <th></th>
                       <td></td>
                     </tr>
                   </tbody>
                 </table>
             </div>
          </div> 
          <div class="card mt-3">
             <!-- Header -->
              <div class="card-header">
                  <div class="row justify-content-between align-items-center flex-grow-1">
                      <div class="col-sm-6 col-md-4 mb-3 mb-sm-0">
                          Payment Detail
                      </div>
                  </div>
                  <!-- End Row -->
              </div>
              <!-- End Header -->
             <div class="card-body">
               <div class="row">
                  <div class="col-sm-3 col-md-3 col-lg-3 col-xl-3">
                    <div class="form-group">
                       <label for="selling_price">Selling Price</label>
                       <div class="input-group">
                         <div class="input-group-prepend">
                            <div class="input-group-text">
                               <i class="fa fa-money-bill-wave"></i>
                            </div>
                         </div>
                         <input type="text" name="selling_price" id="selling_price" class="form-control">
                       </div>
                    </div>
                  </div>
                  <div class="col-sm-3 col-md-3 col-lg-3 col-xl-3">
                    <div class="form-group">
                       <label for="booking_amount">Booking Amount</label>
                       <div class="input-group">
                         <div class="input-group-prepend">
                            <div class="input-group-text">
                               <i class="fa fa-money-bill-wave"></i>
                            </div>
                         </div>
                         <input type="text" name="booking_amount" id="booking_amount" class="form-control">
                       </div>
                    </div>
                  </div>
               </div>
             </div>
          </div>
          <div class="row">
            <div class="col-md-12">
              <button class="btn btn-success float-right" type="submit">Save</button>
            </div>
          </div>
          {{Form::close()}}



    
        </div>


    </div>
    <!-- End Content -->
@endsection
@section('script')
 <script>
    $(document).ready(function(){
            $('.js-select2-custom').each(function () {
                var select2 = $.HSCore.components.HSSelect2.init($(this));
            });
       /************get list of cities via state id  */
           $('#state_id').on('change',function(e){
             $("#city_id").empty();
             $("#owner_id").val('');
             $("#selling_price").val('');
             $("#property_id").empty();
             $("#property_unit_type_id").empty();
             $("#unit_id").empty();
             $("#display_property_detail_grid").find('tr').find('td').text('');
             $("#display_owner_detail_grid").find('tr').find('td').text('');
             
            $.get_city_list($("#state_id"),$("#city_id"));  
           });

           /************ get list of property   ***************/

           $('#city_id').on('change',function(e){
             $("#property_id").empty();
             $("#owner_id").val('');
             $("#selling_price").val('');
             $("#property_unit_type_id").empty();
             $("#unit_id").empty();
             $("#display_property_detail_grid").find('tr').find('td').text('');
             $("#display_owner_detail_grid").find('tr').find('td').text('');
            var params = {
              'city_id' : $(this).val(),
            };
            function fn_success(result)
            {
                 if(result.response=="success")
                 {
                     $("#property_id").empty();
                     $("#property_id").append(`<option value="">Select Property</option>`);
                     $.each(result.data,function(i,item)
                     {
                       let option = `<option value="${item.id}">${item.title}</option>`;
                       $("#property_id").append(option);
                     });
                 }
            };
            function fn_error(result)
            {
               toast('error', result.message, 'bottom-right');
            };
            $.fn_ajax('{{route('sale.citywise.getPropertyListForSale')}}',params,fn_success,fn_error);
           });
                      /************ get list of property unit types  ***************/
          $('#property_id').on('change',function(e)
           {
             $("#owner_id").val('');
             $("#selling_price").val('');
             $("#property_unit_type_id").empty();
             $("#unit_id").empty();
             $("#display_property_detail_grid").find('tr').find('td').text('');
             $("#display_owner_detail_grid").find('tr').find('td').text('');
            var params = {
              'property_id' : $(this).val(),
            };
            function fn_success(result)
            {
                 if(result.response=="success")
                 {
                    $("#property_unit_type_id").append('<option value="">Select Unit Type</option>');
                     $.each(result.data,function(i,item)
                     {
                       
                       let option = `<option value="${item.id}">${item.title}</option>`;
                       $("#property_unit_type_id").append(option);
                     });
                     get_property_owner_detail();
                 }
            };
            function fn_error(result)
            {
               toast('error', result.message, 'bottom-right');
            };
            $.fn_ajax('{{route('sale.getPropertyUnitTypes')}}',params,fn_success,fn_error);
            
           });
           /************ get list of property unit***************/
          $('#property_unit_type_id').on('change',function(e)
           {
             $("#unit_id").empty();
             $("#selling_price").val('');
             $("#display_property_detail_grid").find('tr').find('td').text('');
            var params = {
              'property_unit_type_id' : $(this).val(),
            };
            function fn_success(result)
            {
                 if(result.response=="success")
                 {
                    $("#unit_id").append('<option value="">Select Unit</option>');
                     $.each(result.data,function(i,item)
                     {
                       let option = `<option value="${item.id}">${item.unitcode}</option>`;
                       $("#unit_id").append(option);
                     });
                 }
            };
            function fn_error(result)
            {
               toast('error', result.message, 'bottom-right');
            };
            $.fn_ajax('{{route('sale.getPropertyUnits')}}',params,fn_success,fn_error);
           });

         $("#unit_id").on('change',function(){
           $("#selling_price").val('');
           $("#display_property_detail_grid").find('tr').find('td').text('');
           var url = "{{route('sale.getPropertyUnitDetails')}}";
           var params = {'unit_id':$("#unit_id").val()};
           function fn_success(result)
           {
               data = result.data;
               $("#property_unit_id").val($("#unit_id").val());
               $("#disp_property").text(data.property.title);
               $("#disp_property_code").text(data.property.propcode);
               $("#disp_unit_code").text(data.unitcode);
               $("#disp_property_type").text(data.title);
               $("#disp_unit_size").text(data.unit_size);
               $("#disp_bedroom").text(data.bedroom);
               $("#disp_bathroom").text(data.bathroom);
              $("#disp_balcony").text(data.balcony);
              $("#disp_parking").text(data.parking);
              $("#disp_hall").text(data.hall);
              $("#disp_kitchen").text(data.kitchen);
              $("#disp_rental_amount").text(data.rental_amount);
              $("#selling_price").val(data.rental_amount);
           };
           function fn_error(result)
           {
                 toast('error',result.message,'bottom-right');
           };
           $.fn_ajax(url,params,fn_success,fn_error);
         });  
         function get_property_owner_detail()
         {
            var url   = "{{route('sale.getPropertyOwnerDetail')}}";
            var params = {'property_id' : $("#property_id").val()};
            function fn_success(result)
            {
                 data = result.data;
                 $("#owner_id").val(data.id);
                 $("#owner_name").text(data.name);
                 $("#owner_email").text(data.email);
                 $("#owner_mobile").text(data.mobile);
                 
                 $("#owner_emirates_id").text(data.emirates_id);
                 $("#owner_country").text(data.country);
                 $("#owner_state").text(data.state);
                 $("#owner_city").text(data.city);
                 $("#owner_address").text(data.address);
                 let passport = (data.passport)?'<span class="text-success">Submitted</span>':'<span class="text-danger">Not Submitted</span>';
                 let visa     = (data.visa)?'<span class="text-success">Submitted</span>':'<span class="text-danger">Not Submitted</span>';
                 $("#owner_passport").html(passport);
                 $("#owner_visa").html(visa);
            };
            function fn_error(result)
            {
                 toast('error',result.message,'bottom-right');
            };
            $.fn_ajax(url,params,fn_success,fn_error);
         }

         $("#add_data_form").on('submit',function(e){
            e.preventDefault();
            var url    = "{{route('sale.bookProperty')}}";
            var params = $("#add_data_form").serialize();
            function fn_success(result)
            {
               toast('success',result.message,'bottom-right');
            };
            function fn_error(result)
            {
                toast('error',result.message,'bottom-right');
            };
            $.fn_ajax(url,params,fn_success,fn_error);
         });
    });
 </script>
@endsection