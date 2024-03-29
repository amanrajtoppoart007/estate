@extends("guest.layout.main")
@section("content")
     <!-- Property Slider -->
     @if(!empty($unit['images']))
    <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
        <ol class="carousel-indicators">
            <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
        </ol>
        <div class="carousel-inner">
            @php $i=0; @endphp
             @foreach($unit['images'] as $image)
            <div class="carousel-item {{$i==0 ? 'active': null}}">
                <img src="{{$image}}" class="d-block w-100 img-fluid" alt="...">
            </div>
                 @php $i++; @endphp
            @endforeach
        </div>
        <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </a>
    </div>
    @endif
    <!-- End Property Slider -->

    <!-- Main Section -->
    <div class="container my-5">
        <div class="row">
            <div class="col-lg-8 col-sm-8 col-12">
                <div class="row">
                    <div class="col-lg-12 col-sm-12 col-12">
                        <h6 class="mb-0">
                            {{$unit['full_address']}}
                        </h6>
                        <h3>
                            {{$unit['title']}}
                        </h3>
                        <div class="row mt-4">
                            <div class="col-lg-6 col-sm-6 col-12">
                                <div class="row">
                                    <div class="col-lg-5 col-sm-5 col-12">
                                        <img src="{{asset('theme/images/propertyType.svg')}}" alt=""> Property Type:
                                    </div>
                                    <div class="col-lg-7 col-sm-7 col-12">
                                        <span class="pl-5 font-16"></span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6 col-sm-6 col-12">
                                <div class="row">
                                    <div class="col-lg-5 col-sm-5 col-12">
                                        <img src="{{asset('theme/images/bedRooms.svg')}}" alt=""> Bedrooms:
                                    </div>
                                    <div class="col-lg-7 col-sm-7 col-12">
                                        <span class="pl-5 font-16">{{$unit['bedroom']}}</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row mt-2">
                            <div class="col-lg-6 col-sm-6 col-12">
                                <div class="row">
                                    <div class="col-lg-5 col-sm-5 col-12">
                                        <img src="{{asset('theme/images/propertySize.svg')}}" alt=""> Property size:
                                    </div>
                                    <div class="col-lg-7 col-sm-7 col-12">
                                        <span class="pl-5 font-16">{{$unit['unit_size']}} SqFt</span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6 col-sm-6 col-12">
                                <div class="row">
                                    <div class="col-lg-5 col-sm-5 col-12">
                                        <img src="{{asset('theme/images/bathroom.svg')}}" alt=""> Bathrooms:
                                    </div>
                                    <div class="col-lg-7 col-sm-7 col-12">
                                        <span class="pl-5 font-16">{{$unit['bathroom']}}</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row mt-2">
                            <div class="col-lg-6 col-sm-6 col-12">
                                <div class="row">
                                    <div class="col-lg-5 col-sm-5 col-12">
                                        <img src="{{asset('theme/images/completion.svg')}}" alt=""> Completion:
                                    </div>
                                    <div class="col-lg-7 col-sm-7 col-12">
                                        <span class="pl-5 font-16">Ready</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row mt-5 bg-light p-2">
                    <div class="col-lg-6 col-sm-6 col-12">
                        <div class="row">
                            <div class="col-lg-12 col-sm-12 col-12">
                                <h4>Location</h4>
                            </div>
                        </div>
                        <div class="row mt-4">
                            <div class="col-lg-4 col-sm-4 col-12">
                                <a href="">
                                    <img class="img-fluid rounded-circle" src="{{asset('theme/images/Map.svg')}}" alt="">
                                </a>
                            </div>
                            <div class="col-lg-8 col-sm-8 col-12">
                                <h6 class="my-3">Meadows 1</h6>
                                <button type="button" class="btn btn-success btn-sm">4.9/5</button>
                                <a href="#">2 Reviews</a>
                                <p class="mt-3">
                                    Dubai, Meadows
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 col-sm-6 col-12">
                        <div class="row">
                            <div class="col-lg-12 col-sm-12 col-12">
                                <h4>Agent</h4>
                            </div>
                        </div>
                        <div class="row mt-4">
                            <div class="col-lg-4 col-sm-4 col-12">
                                <a href="">
                                    <img class="img-fluid img-thumbnail" src="{{asset('theme/images/agent.jpg')}}" alt="">
                                </a>
                            </div>
                            <div class="col-lg-8 col-sm-8 col-12">
                                <a href="" class="mb-3">{{$unit['agent_name']}}</a>
                                <div class="clearfix"></div>
                                <p class="mb-0">Senior Client Manager at Espace Real Estate</p>

                            </div>
                        </div>
                    </div>
                </div>
                <div class="row mt-4">

                    <div class="col-lg-12 col-sm-12 col-12">
                        <h3>
                            Amenities
                        </h3>
                        <div class="row mt-4">
                            @foreach($unit['amenities'] as $feature)
                            <div class="col-lg-4 col-sm-4 col-12">
                                {{$feature}}
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>
                <hr>
                <div class="row mt-4">
                    <div class="col-lg-12 col-sm-12 col-12">
                        <h3>
                            Description
                        </h3>
                        <div class="row mt-4">
                            <div class="col-lg-12 col-sm-12 col-12">
                                <p align="justify">
                                      {!! $unit['description'] !!}
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-sm-4 col-12 ">
                <div class="row">
                    <div class="col-lg-12 col-sm-12 col-12">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title">Property For <a href="javascript:void(0)">{{$unit['purpose']}}</a> </h5>
                                <p class="card-text">
                                    Estimated
                                    <a href="javascript:void(0)">{{$unit['price']}}</a>
                                </p>
                                <div class="row">
                                    <div class="col-lg-6 col-sm-6 col-12">
                                        <button type="button" class="btn btn-success btn-lg btn-block call_for_enquiry_btn">
                                            <i class="fa fa-phone" aria-hidden="true"></i> Call Now
                                        </button>
                                    </div>
                                    <div class="col-lg-6 col-sm-6 col-12">
                                        <button type="button" class="btn btn-danger btn-lg btn-block enquiry_modal_open_btn">
                                            <i class="fa fa-envelope" aria-hidden="true"></i> Email
                                        </button>
                                    </div>
                                </div>
                                <hr>
                                <p class="mt-4">
                                    AL Hoor has verified the accuracy and authenticity of this listing.
                                </p>
                                <hr>
                                <center>
                                    <button type="button" class="btn btn-outline-secondary">
                                        <i class="fa fa-heart-o" aria-hidden="true"></i> Save to Shortlist
                                    </button>
                                </center>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row mt-4">
                    <div class="col-lg-12 col-sm-12 col-12">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="text-center">Own this property from just</h4>
                                <p class="card-title text-center">
                                    <strong class="font-24">{{$unit['price']}}</strong>
                                </p>
                                {{--<p class="card-text text-center">
                                    Fixed rates from
                                    <strong>2.70%</strong>
                                </p>--}}
                                <div class="row">
                                    <div class="col-lg-12 col-sm-12col-12">
                                        <button type="button" class="btn btn-outline-danger btn-block">
                                            Get pre-approved
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <hr>
    </div>
    <!-- End Main Section -->
@endsection
@section("modal")
    {{Form::open(['id'=>'property_enquiry_form'])}}
    <input type="hidden" name="property_id" value="{{$unit['property_id']}}">
    <input type="hidden" name="unit_id" value="{{$unit['id']}}">
    <div class="modal" tabindex="-1" id="property_enquiry_modal">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Contact Us</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-4 col-sm-4 col-lg-4 col-xl-4">
                            <img src="{{$unit['primary_image']}}" alt="" class="card-img-top">
                        </div>
                        <div class="col-8 col-sm-8 col-lg-8 col-xl-8">
                            <table class="table table-borderless">
                                <tbody>
                                <tr>
                                    <th>Summery</th>
                                    <th>{{$unit['title']}}</th>
                                </tr>
                                <tr>
                                     <th>Address</th>
                                     <th>{{$unit['full_address']}}</th>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <div class="form-group">
                                <textarea class="form-control property-enquiry-input" name="message"
                                          placeholder="Type your message">Hey i saw , ad of property code {{$unit['unitcode']}} in your website , I am interested in this property ,please contact me. </textarea>
                            </div>
                        </div>

                        <div class="col-6">
                            <div class="form-group">
                                <input type="text" class="property-enquiry-input" name="name" placeholder="Name"
                                       value="name">
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group">
                                <input type="email" class="form-control property-enquiry-input" name="email"
                                       placeholder="Email" value="name@gmail.com">
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form-group">
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <div>
                                            <select name="country_code" id="country_code" data-flag="true">
                                                @php $countries = get_country_list() @endphp
                                                @foreach($countries as $key=>$value)
                                                    <option value="{{$key}}">{{$value}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <input type="text"
                                           class="form-control property-enquiry-input property-enquiry-input"
                                           name="contact" placeholder="Mobile" value="1234567890">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save changes</button>
                </div>
            </div>
        </div>
    </div>
    {{Form::close()}}
@endsection
@section("script")
    <script>
        (function($){

            $(document).on("click",".enquiry_modal_open_btn",function(){
                $("#property_enquiry_modal").modal("show");
            });


            $(document).on("click",".call_for_enquiry_btn",function(){
                $(this).text("+957432423423434");
            });


            $("#property_enquiry_form").on("submit",function(e){
                e.preventDefault();
                let url = "{{route('bookingRequest.store')}}";
                let params = $("#property_enquiry_form").serialize();
                function fn_success(result)
                {
                  alert(result.message);
                  $("#property_enquiry_modal").modal("hide");

                }
                function fn_error(result)
                {
                    alert(result.message);
                }
                $.fn_ajax(url,params,fn_success,fn_error);

            });

        })(jQuery);
    </script>
@endsection
