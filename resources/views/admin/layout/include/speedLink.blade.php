<!-- Quick Links -->
<div id="activitySidebar" class="hs-unfold-content sidebar sidebar-bordered sidebar-box-shadow sidebar-scrollbar">
    <div class="card card-lg sidebar-card">
        <div class="card-header">
            <h4 class="card-header-title">Quick Links</h4>

            <!-- Toggle Button -->
            <a class="js-hs-unfold-invoker btn btn-icon btn-xs btn-ghost-dark ml-2" href="javascript:;"
               data-hs-unfold-options='{
            "target": "#activitySidebar",
            "type": "css-animation",
            "animationIn": "fadeInRight",
            "animationOut": "fadeOutRight",
            "hasOverlay": true,
            "smartPositionOff": true
           }'>
                <i class="tio-clear tio-lg"></i>
            </a>
            <!-- End Toggle Button -->
        </div>

        <!-- Body -->
        <div class="card-body sidebar-body">
            <div class="row">

                @php $quick_links = get_quick_links(); @endphp
                @foreach($quick_links as $link)
                    <a href="{{route('rentEnquiry.list')}}"  class="btn btn-sm btn-white mr-2  mt-2">
                        <i class="{{$link['icon']}}" aria-hidden="true"></i>
                        <span>{{$link['title']}}</span>
                    </a>
                @endforeach
            </div>

        </div>
        <!-- End Body -->
    </div>
</div>
<!-- End Quick Links -->
