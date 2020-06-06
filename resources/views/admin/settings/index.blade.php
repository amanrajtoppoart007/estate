@extends('admin.layout.app')
@section('head')
<style type="text/css">
.blocks1{

}
.blocks1:hover{
cursor: pointer;
}
</style>
@endsection
@section('content')
<h4 class="color-primary mb-4">Settings</h4>
<div class="panel_massage color-primary mt_30 mb_60">
    <div class="success bg-white">
        <span class="closebtn">&times;</span>
        Hi, You have got a new message from new customer on <span class="color-default">City Tradecenter</span> for rent request
    </div>

    <div class="alert success bg-white">
        <span class="closebtn">&times;</span>
        Password change notice for security issue and make your password more strong.
    </div>
</div>

<div class="row massanger">
    <div class="col-md-12 col-xl-12">
        <div class="accordion mt_30" id="accordion1" role="tablist">
            <div class="card mb_20">
                <div class="card-header p-0" role="tab">
                    <h6 class="m-0"><a href="#collapseOne" data-toggle="collapse" data-parent="#accordion1" aria-expanded="true" class="panel_accordian">Elements</a></h6>
                </div>
                <div class="collapse show" id="collapseOne" role="tabpanel" style="">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-4 col-xl-4">
                                <div class="porfile_overview blocks1 mb_20" id="m_country">
                                    <span class="color-default"><i class="flaticon-house-1"></i></span>
                                    <h5 class="m-0 d-inline-block">Countries</h5>
                                    <p class="color-secondery">Country list</p>
                                    </a>
                                </div>
                                <div class="porfile_overview blocks1 mb_20" id="m_city">
                                    <span class="color-default"><i class="flaticon-chat-comment-oval-speech-bubble-with-text-lines"></i></span>
                                    <h5 class="m-0 d-inline-block">Cities</h5>
                                    <p class="color-secondery">City</p>
                                </div>
                            </div>
                            <div class="col-md-4 col-xl-4">
                                <div class="porfile_overview blocks1 mb_20" id="m_states">
                                    <span class="color-default"><i class="flaticon-eye"></i></span>
                                    <h5 class="m-0 d-inline-block">States</h5>
                                    <p class="color-secondery">Amirates</p>
                                </div>
                                <div class="porfile_overview blocks1 mb_20" id="m_slider">
                                    <span class="color-default"><i class="flaticon-heart"></i></span>
                                    <h5 class="m-0 d-inline-block">Slider</h5>
                                    <p class="color-secondery">Slider</p>
                                </div>
                            </div>
                            <div class="col-md-4 col-xl-4">
                                <div class="porfile_overview mb_20">
                                    <span class="color-default"><i class="flaticon-house-1"></i></span>
                                    <h5 class="m-0 d-inline-block">.</h5>
                                    <p class="color-secondery">.</p>
                                </div>
                                <div class="porfile_overview mb_20">
                                    <span class="color-default"><i class="flaticon-chat-comment-oval-speech-bubble-with-text-lines"></i></span>
                                    <h5 class="m-0 d-inline-block">.</h5>
                                    <p class="color-secondery">.</p>
                                </div>
                            </div>
        
                        </div>
                    </div>
                </div>
            </div>


        </div>
    </div>

</div>
<div class="row massanger">
    <div class="col-md-12 col-xl-12">
        <div class="accordion mt_30" id="accordion1" role="tablist">
            <div class="card mb_20">
                <div class="card-header p-0" role="tab">
                    <h6 class="m-0"><a href="#collapseOne" data-toggle="collapse" data-parent="#accordion1" aria-expanded="true" class="panel_accordian">System Settings</a></h6>
                </div>
                <div class="collapse show" id="collapseOne" role="tabpanel" style="">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-4 col-xl-4">
                                <div class="porfile_overview blocks1 mb_20" id="s_basic">
                                    <span class="color-default"><i class="flaticon-settings"></i></span>
                                    <h5 class="m-0 d-inline-block">Basic</h5>
                                    <p class="color-secondery">Basic settings</p>
                                    </a>
                                </div>
                                <div class="porfile_overview blocks1 mb_20" id="s_adv_set">
                                    <span class="color-default"><i class="flaticon-settings"></i></span>
                                    <h5 class="m-0 d-inline-block">Advanced</h5>
                                    <p class="color-secondery">Advanced settings</p>
                                </div>
                            </div>
                          
                           
        
                        </div>
                    </div>
                </div>
            </div>


        </div>
    </div>

</div>
@endsection
@section('script')
<script type="text/javascript">
    $("#sidebar_settings").addClass('active');
    $(".blocks1").click(function() {
        console.log();
        if($(this).attr("id")=="m_country"){
            window.location.href = "{{route('country.list')}}";
        }else if($(this).attr("id")=="m_states"){
            window.location.href = "{{route('state.list')}}";
        }else if($(this).attr("id")=="m_city"){
            window.location.href = "{{route('city.list')}}";
        }else if($(this).attr("id")=="m_city"){
            window.location.href = "{{route('city.list')}}";
        }else if($(this).attr("id")=="m_slider"){
            window.location.href = "{{route('slider.list')}}";
        }else if($(this).attr("id")=="s_basic"){
            window.location.href = "{{route('system-setting')}}";
        }
    })
</script>
@endsection