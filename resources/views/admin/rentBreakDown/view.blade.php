@extends("admin.layout.app")
@include("admin.include.breadcrumb",["page_title"=>"View BreakDown"])
@section("content")
    <div id="printThis">
    <div class="card">
        <div class="card-header bg-gradient-dark">
            <h6>Property Detail</h6>
        </div>
        <div class="card-body">
           <div class="row">
               <div class="col-6 col-sm-6 col-md-3 col-lg-3 col-xl-3 mb-2"> <span class="font-weight-bold">City</span></div>
               <div class="col-6 col-sm-6 col-md-3 col-lg-3 col-xl-3 mb-2">{{$breakdown->city ? $breakdown->city->name : null}}</div>
               <div class="col-6 col-sm-6 col-md-3 col-lg-3 col-xl-3 mb-2"> <span class="font-weight-bold">Building</span></div>
               <div class="col-6 col-sm-6 col-md-3 col-lg-3 col-xl-3 mb-2">{{$breakdown->property ? $breakdown->property->title : null }}</div>

           </div>
            <div class="row">
                 <div class="col-6 col-sm-6 col-md-3 col-lg-3 col-xl-3 mb-2"> <span class="font-weight-bold">Flat No.</span></div>
                <div class="col-6 col-sm-6 col-md-3 col-lg-3 col-xl-3 mb-2">{{$breakdown->unit ? $breakdown->unit->flat_number : null }}</div>
            </div>
        </div>
    </div>
    <div class="card">
        <div class="card-header bg-gradient-dark">
            <h6>Client Detail</h6>
        </div>
        <div class="card-body">
            <div class="row">
               <div class="col-6 col-sm-6 col-md-3 col-lg-3 col-xl-3 mb-2"> <span class="font-weight-bold">Name</span></div>
               <div class="col-6 col-sm-6 col-md-3 col-lg-3 col-xl-3 mb-2">{{$breakdown->rent_enquiry ? $breakdown->rent_enquiry->name : null}}</div>
               <div class="col-6 col-sm-6 col-md-3 col-lg-3 col-xl-3 mb-2"> <span class="font-weight-bold">Mobile No.</span></div>
               <div class="col-6 col-sm-6 col-md-3 col-lg-3 col-xl-3 mb-2">{{$breakdown->rent_enquiry ? $breakdown->rent_enquiry->mobile : null }}</div>
           </div>
            <div class="row">
               <div class="col-6 col-sm-6 col-md-3 col-lg-3 col-xl-3 mb-2"> <span class="font-weight-bold">Tenancy Type</span></div>
               <div class="col-6 col-sm-6 col-md-3 col-lg-3 col-xl-3 mb-2">{{$breakdown->rent_enquiry ? get_tenancy_type_title($breakdown->rent_enquiry->tenancy_type) : null}}</div>
               <div class="col-6 col-sm-6 col-md-3 col-lg-3 col-xl-3 mb-2"> <span class="font-weight-bold">Nationality</span></div>
               <div class="col-6 col-sm-6 col-md-3 col-lg-3 col-xl-3 mb-2">{{ (!empty($breakdown->rent_enquiry->country->name)) ? $breakdown->rent_enquiry->country->name : null }}</div>
           </div>
            <div class="row">
                 <div class="col-6 col-sm-6 col-md-3 col-lg-3 col-xl-3 mb-2"> <span class="font-weight-bold">No Of Tenants</span></div>
                <div class="col-6 col-sm-6 col-md-3 col-lg-3 col-xl-3 mb-2">{{$breakdown->rent_enquiry ? $breakdown->rent_enquiry->tenant_count : null }}</div>
            </div>
        </div>
    </div>
    <div class="card">
        <div class="card-header bg-gradient-dark">
            <h6>Rent Detail</h6>
        </div>
        <div class="card-body">
           <div class="row">
               <div class="col-6 col-sm-6 col-md-3 col-lg-3 col-xl-3 mb-2"> <span class="font-weight-bold">Rent Frequency</span></div>
               <div class="col-6 col-sm-6 col-md-3 col-lg-3 col-xl-3 mb-2">{{$breakdown->rent_period_type}}</div>
               <div class="col-6 col-sm-6 col-md-3 col-lg-3 col-xl-3 mb-2"> <span class="font-weight-bold">Rent Period</span></div>
               <div class="col-6 col-sm-6 col-md-3 col-lg-3 col-xl-3 mb-2">{{$breakdown->rent_period }}</div>
           </div>
            <div class="row">
               <div class="col-6 col-sm-6 col-md-3 col-lg-3 col-xl-3 mb-2"> <span class="font-weight-bold">Parking</span></div>
               <div class="col-6 col-sm-6 col-md-3 col-lg-3 col-xl-3 mb-2">{{$breakdown->parking}}</div>
               <div class="col-6 col-sm-6 col-md-3 col-lg-3 col-xl-3 mb-2"> <span class="font-weight-bold">Parking No</span></div>
               <div class="col-6 col-sm-6 col-md-3 col-lg-3 col-xl-3 mb-2">{{$breakdown->parking_number}}</div>
           </div>
            <div class="row">
                 <div class="col-6 col-sm-6 col-md-3 col-lg-3 col-xl-3 mb-2"> <span class="font-weight-bold">Lease Start Date</span></div>
                <div class="col-6 col-sm-6 col-md-3 col-lg-3 col-xl-3 mb-2">{{$breakdown->lease_start_date ? date("d-m-Y",strtotime($breakdown->lease_start_date)) : null }}</div>
                <div class="col-6 col-sm-6 col-md-3 col-lg-3 col-xl-3 mb-2"> <span class="font-weight-bold">Lease End Date</span></div>
                <div class="col-6 col-sm-6 col-md-3 col-lg-3 col-xl-3 mb-2">{{$breakdown->lease_end_date ? date("d-m-Y",strtotime($breakdown->lease_end_date)) : null }}</div>
            </div>
             <div class="row">
               <div class="col-6 col-sm-6 col-md-3 col-lg-3 col-xl-3 mb-2"> <span class="font-weight-bold">Rent Amount</span></div>
               <div class="col-6 col-sm-6 col-md-3 col-lg-3 col-xl-3 mb-2">{{$breakdown->rent_amount}}</div>
               <div class="col-6 col-sm-6 col-md-3 col-lg-3 col-xl-3 mb-2"> <span class="font-weight-bold">Installments</span></div>
               <div class="col-6 col-sm-6 col-md-3 col-lg-3 col-xl-3 mb-2">{{$breakdown->installments}}</div>
           </div>
        </div>
    </div>
    <div class="card">
        <div class="card-header bg-gradient-dark">
            <h6>Rent BreakDown</h6>
        </div>
        <div class="card-body">
          <table class="table table-borderless">
              <tbody>
              @php $breakdown_items = get_breakdown_items($breakdown->rent_break_down_items); @endphp
              @if(!empty($breakdown_items))
                  @foreach($breakdown_items as  $item_key=>$item_values)
                      <tr>
                          <th>{{snake_case_string_to_word(get_breakdown_item_title($item_key))}}</th>
                          @foreach($item_values as $key=>$value)
                              <td>{{$value}}</td>
                          @endforeach
                      </tr>
                  @endforeach
              @endif
              </tbody>
          </table>
        </div>
    </div>
        </div>
    <div class="row">
        <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12 text-right">
            <div class="form-group">
                <a href="{{route('print.rent.breakdown',$breakdown->id)}}" target="_blank"  class="btn btn-success"><i class="fa fa-print"></i>Print BreakDown</a>
                <button type="button" id="send_via_mail_btn" class="btn btn-info"><i class="fa fa-envelope"></i>Send BreakDown Via Email </button>
            </div>
        </div>
    </div>
@endsection
@section("script")
    <script>
        $(document).ready(function(){

            $("#send_via_mail_btn").on("click",function(){

                let url = "{{route('send.breakdown.mail')}}";
                let params = {
                    break_down_id : {{$breakdown->id}},
                    rent_enquiry_id : {{$breakdown->rent_enquiry_id}}
                };
                function fn_success(result)
                {
                    toast("success",result.message,"top-right");
                }
                function fn_error(result)
                {
                    toast("error",result.message,"top-right");
                }
                $.fn_ajax(url,params,fn_success,fn_error);
            })
        });
    </script>
    @if(request()->has("action"))
        @if(request()->action=="print")
        <script>
            $(document).ready(function(){
                $("#printThis").printThis({
                     header: "{{config('app.name')}}"
                 });
            });
        </script>
        @endif
    @endif
@endsection

