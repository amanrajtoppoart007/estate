@extends('admin.layout.app')
  @section('content')
     <h4 class="color-primary mb-4">@lang('property.allocate_property')</h4>
							
							<div class="submit_form color-secondery icon_primary p-5 bg-white">
                {{Form::open(['route'=>'allot.property','id'=>'add_data_form'])}}
                 <input type="hidden" name="tenant_id" value="{{$tenant->id}}">
                  <h6>Tenant Detail</h6>
									<div class="card card-body table-responsive">
                    <table class="table table-condensed">
                      <tbody>
                        <tr>
                          <th>Name</th>
                        <td>{{$tenant->name}}</td>
                        
                          <th>Tenancy Type</th>
                        <td>{{($tenant->tenant_type)?ucwords(str_replace("_"," ",$tenant->tenant_type)):''}}</td>
                        
                          <th>Number Of Tenants</th>
                          <td>{{($tenant->profile->tenant_count)?($tenant->profile->tenant_count):'0'}}</td>
                        </tr>
                      </tbody>
                    </table>
                  </div>
                  <h6>Property Allocation Detail</h6>
									<div class="card card-body">
                      
                    <div class="row">
                    <div class="col">
                      <div class="form-group">
                        <label for="state_id">State</label>
                        @php  $states[''] = 'Select State'; @endphp
                        {{Form::select('state_id',$states,old('state_id'),['id'=>'state_id','class'=>'form-control'])}}
                      </div>
                       
                    </div>
                    <div class="col">
                      <div class="form-group">
                        <label for="city_id">City</label>
                        <select class="form-control" name="city_id" id="city_id"></select>
                      </div>
                    </div>
                    
                  </div>
								    <div class="row">
                      <div class="col-md-6">
                       <div class="form-group">
                        <label for="property_id">Property</label>
                        <select class="form-control" name="property_id" id="property_id"></select>
                      </div>
                    </div>
                    <div class="col-md-3">
                       <div class="form-group">
                        <label for="property_unit_type_id">Property Unit Type</label>
                        <select class="form-control" name="property_unit_type_id" id="property_unit_type_id"></select>
                      </div>
                    </div>
                    <div class="col-md-3">
                       <div class="form-group">
                        <label for="unit_id">Property Unit</label>
                        <select class="form-control" name="unit_id" id="unit_id"></select>
                      </div>
                    </div>
                    </div>
                  </div>
                  <h6>Rent Installment Breakup Detail</h6>
                  <div class="card card-body">
                      <div class="row">
                        <div class="col-md-6">
                        <div class="form-group">
                          <label for="security_deposit">Secuirity Deposit</label>
                          <input type="text" class="form-control" name="security_deposit" id="security_deposit" value="">
                        </div>
                      </div>
                      <div class="col-md-3">
                        <div class="form-group">
                          <label for="rent_amount">Rent Amount(Yearly)</label>
                          <input type="text" class="form-control" name="rent_amount" id="rent_amount" value="">
                        </div>
                      </div>
                      <div class="col-md-3">
                        <div class="form-group">
                          <label for="installments">Installments</label>
                          <input type="text" class="form-control" name="installments" id="installments" value="">
                        </div>
                      </div>
                      </div>
                      <table class="table table-bordered">
                        <thead>
                          <tr>
                            <th>Installment Amount</th>
                            <th>Date</th>
                          </tr>
                        </thead>
                        <tbody id="installment_amount_breakup_grid">
                          
                        </tbody>
                      </table>
                  </div>
									<button type="submit" class="btn btn-primary mt-4">Allocate Property</button>
								{{Form::close()}}
							</div>
  @endsection
  @section('script')
    <script>
      $(document).ready(function(){

        let base_url = $('meta[name="base-url"]').attr('content');
    $('#add_data_form').submit(function(event){
        event.preventDefault();
          var base_url = $('meta[name="base-url"]').attr('content');
          var params   = $("#add_data_form").serialize();
          var url      = '{{route('allot.property')}}';
          function fn_success(result)
          {
              toast('success', result.message, 'bottom-right');
              window.location.href = base_url + '/master/tenant/view-detail/'+result.data.tenant_id;
          };
          function fn_error(result)
          {
                if(result.response=='validation_error')
                {
                    toast('error', result.message, 'bottom-right');
                }
                else
                {
                      toast('error', result.message, 'bottom-right');
                }
          }
        $.fn_ajax(url,params,fn_success,fn_error);
  });
        /************get list of cities via state id  */
           $('#state_id').on('change',function(e){
            $.get_city_list($("#state_id"),$("#city_id"));  
           });

           /************ get list of property   ***************/

           $('#city_id').on('change',function(e){
            var params = {
              'city_id' : $(this).val(),
            };
            function fn_success(result)
            {
                 if(result.response=="success")
                 {
                     $("#property_id").empty();
                     $.each(result.data,function(i,item)
                     {
                       let src = base_url+item.images[0].image_url;
                       let image = `<img class="img-thumbnail" src="${src}">`;
                       let option = `<option value="${item.id}">${item.title}</option>`;
                       $("#property_id").append(option);
                     });
                 }
            };
            function fn_error(result)
            {
               toast('error', result.message, 'bottom-right');
            };
            $.fn_ajax('{{route('citywise.property.list')}}',params,fn_success,fn_error);
           });

           /************ get list of property unit types  ***************/
          $('#property_id').on('change',function(e)
           {
             $("#property_unit_type_id").empty();
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
                 }
            };
            function fn_error(result)
            {
               toast('error', result.message, 'bottom-right');
            };
            $.fn_ajax('{{route('get.propertyUnitTypes.list')}}',params,fn_success,fn_error);
           });
           /************ get list of property unit***************/
          $('#property_unit_type_id').on('change',function(e)
           {
             $("#unit_id").empty();
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
            $.fn_ajax('{{route('get.getPropertyUnit.list')}}',params,fn_success,fn_error);
           });
           /****** installment amount breakup ************/
           $("#installments,#rent_amount").on('change',function(e){
             $("#installment_amount_breakup_grid").empty();
             if(!$.trim($("#installments").val()).length)
             {
                toast('error', 'Please enter number of installments', 'bottom-right');
                return false;
             }
             if(!$.trim($("#rent_amount").val()).length)
             {
                toast('error', 'Please enter rent amount', 'bottom-right');
                return false;
             }
             
             let installments    = $("#installments").val();
             if($("#installments").val()>12)
             {
                installments = 12;
                $("#installments").val(installments);
             }
             let rent_amount     = $("#rent_amount").val();
             let amount          = rent_amount/installments;
             for(i=0;i<installments;i++)
             {
                 let html = `<tr>
                            <td><input type="text" class="form-control" name="installment_amount[]" value="${amount}"></td>
                            <td><input type="text" class="form-control" name="installment_date[]"  value=""></td>
                        </tr>`;
                $("#installment_amount_breakup_grid").append(html);
             }
           });
      });
    </script>
  @endsection