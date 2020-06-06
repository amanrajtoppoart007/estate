@extends('guest.layout.main')
@include('guest.include.navbar')
@section('content')
<section class="subheader subheader-listing-sidebar">
    <div class="container">
        <h1>Agent Listing</h1>
        <div class="breadcrumb right">Home <i class="fa fa-angle-right"></i> <a href="#" class="current">Agents</a></div>
        <div class="clear"></div>
    </div>
</section>
<div class="container-fluid pt-5 pb-5" style="background-color: #EBF1F5;">
    <div class="container">
        <div class="row">
            <div class="col-sm-12 col-12">
                <div class="agent agent-single">
                    <a href="javascript:void(0)" class="agent-img">
                        <div class="img-fade"></div>
                        <img class="hex" src="images/hexagon.png" alt="" />
                        @php
                            if(!empty($agent->photo))
                            {
                                $img = route('get.doc',base64_encode($agent->photo));
                            }
                            else 
                            {
                                $img = asset('theme/default/images/team/01.jpg');
                            } 
                        @endphp
                        <img src="{{$img}}" alt="" />
                    </a>
                    <div class="agent-content">
                        <div class="agent-details">
                            <h4><a href="#">Sarah Parker</a></h4>
                            <p><i class="fa fa-tag icon"></i>Status: <span> Verified</span></p>
                            <p><i class="fa fa-envelope icon"></i>Email: <span>{{$agent->email}}</span></p>
                            <p><i class="fa fa-phone icon"></i>Office: <span>{{$agent->mobile}}</span></p>
                            <p><i class="fa fa-mobile icon"></i>Mobile: <span>....</span></p>
                            <p><i class="fa fa-skype icon"></i>Skype: <span>....</span></p>
                        </div>
                        <div class="button alt button-icon"><i class="fa fa-home"></i>{{count($properties['property_unit_types'])}} Assigned Properties</div>
                    </div>
                    <div class="agent-form">
                        <h4 class="contact-h4 text-center">CONTACT AGENT</h4>
                        <form id="agent_enquiry_form" method="post">
                            <div class="form-block">
                                <input type="text" name="name" placeholder="Name" />
                            </div>
                            <div class="form-block">
                                <input type="text" name="mobile" placeholder="Phone" />
                            </div>
                            <div class="form-block">
                                <input type="text" name="email" placeholder="Email" />
                            </div>
                            <div class="form-block">
                                <textarea name="message" placeholder="Message..."></textarea>
                            </div>
                            <div class="form-block">
                                <button type="submit" class="btn btn-primary btn-block btn-defaultmine">Send</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="clear"></div>
        </div>
        <div class="row mt-5 mob-mt-0">
            <div class="col-lg-9 col-md-9">
                <div class="widget property-single-item agent-properties">
                    <h4>
                        Assigned Properties
                    </h4>

                    <div class="row">
                      @foreach($properties['property_unit_types'] as $property)
                        <div class="col-lg-4 col-md-4">
                            <div class="property shadow-hover">
                                <a href="#" class="property-img">
                                    <div class="img-fade"></div>
                                    {{-- <div class="property-tag button alt featured">Featured</div> --}}
                                    <div class="property-tag button status">For {{$property['mode']}}</div>
                                    <div class="property-price">{!!$property['price']!!}</div>
                                    <div class="property-color-bar"></div>
                                    <img src="{{$property['image']}}" alt="" />
                                </a>
                                <div class="property-content">
                                    <div class="property-title">
                                        <h4><a href="{{$property['view_url']}}">{{$property['title']}}</a></h4>
                                        <p class="property-address"><i class="fa fa-map-marker icon"></i>{{$property['full_address']}}</p>
                                    </div>
                                    <table class="property-details">
                                        <tr>
                                            <td><i class="fa fa-bed"></i> {{$property['bedroom']}} Beds</td>
                                            <td><i class="fa fa-tint"></i> {{$property['bathroom']}} Baths</td>
                                            <td><i class="fa fa-expand"></i> {{$property['unit_size']}} Sq Ft</td>
                                        </tr>
                                    </table>
                                </div>
                                <div class="property-footer">
                                    <span class="left"><i class="fa fa-calendar-o icon"></i> {{$property['created_at']}}</span>
                                    <div class="clear"></div>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                    {{$properties['links'] }}
                </div>
            </div>
            <div class="col-lg-3 col-md-3">
                <div class="widget widget-sidebar recent-properties">
                    <h4>Recent Properties</h4>
                    <div class="widget-content">
                        <div class="recent-property">
                            <div class="row">
                                <div class="col-lg-4 col-md-4 col-sm-4"><a href="#"><img src="{{asset('new_images/property-img1.jpg')}}" alt="" /></a></div>
                                <div class="col-lg-8 col-md-8 col-sm-8">
                                    <h5><a href="#">Beautiful Waterfront Condo</a></h5>
                                    <p><strong>$1,800</strong> Per Month</p>
                                </div>
                            </div>
                        </div>
                        <div class="recent-property">
                            <div class="row">
                                <div class="col-lg-4 col-md-4 col-sm-4"><a href="#"><img src="{{asset('new_images/property-img2.jpg')}}" alt="" /></a></div>
                                <div class="col-lg-8 col-md-8 col-sm-8">
                                    <h5><a href="#">Family Home</a></h5>
                                    <p><strong>$500,000</strong></p>
                                </div>
                            </div>
                        </div>
                        <div class="recent-property">
                            <div class="row">
                                <div class="col-lg-4 col-md-4 col-sm-4"><a href="#"><img src="{{asset('new_images/property-img3.jpg')}}" alt="" /></a></div>
                                <div class="col-lg-8 col-md-8 col-sm-8">
                                    <h5><a href="#">Ubran Apartment</a></h5>
                                    <p><strong>$1,800</strong> Per Month</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="widget widget-sidebar recent-properties">
                    <h4>Quick Links</h4>
                    <div class="widget-content box">
                        <ul class="bullet-list">
                            <li><a href="#">Featured Properties</a></li>
                            <li><a href="#">Featured Agents</a></li>
                            <li><a href="#">Terms & Conditions</a></li>
                            <li><a href="#">Privacy Policy</a></li>
                            <li><a href="#">Frequently Asked Questions</a></li>
                            <li><a href="#">Login</a></li>
                            <li><a href="#">Submit a Property</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('script')
<script>
   $(document).ready(function(){
    $("#agent_enquiry_form").on('submit',function(e){
        e.preventDefault();
        var params = $("#agent_enquiry_form").serialize();
        var url    = '{{route('agent.enquiry.store')}}';
        function fn_success(result)
        {
            $("#agent_enquiry_form")[0].reset();
            toast('success',result.message,'bottom-right');
            $("#booking_request_modal").modal("hide");
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