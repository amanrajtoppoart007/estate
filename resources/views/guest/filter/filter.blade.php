{{Form::open(['route'=>'property.search','method'=>'get'])}}
<div class="row mt-5">
    <div class="col-lg-12 col-sm-12 col-12">
        <!-- Advance Search -->
        <ul class="nav nav-pills advanced-tabs justify-content-center" role="tablist">
            <li class="nav-item">
                <a class="nav-link active" data-toggle="tab" href="#BUY" role="tab">BUY</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" data-toggle="tab" href="#SELL" role="tab">SELL</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" data-toggle="tab" href="#PLOT" role="tab">PLOT</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" data-toggle="tab" href="#COMMERCIAL" role="tab">COMMERCIAL</a>
            </li>
        </ul>
        <!-- Tab panes -->
        <div class="tab-content mt-4">
            <div class="tab-pane active" id="BUY" role="tabpanel">
                @include("guest.filter.buy")
            </div>
            <div class="tab-pane" id="SELL" role="tabpanel">
                @include("guest.filter.sell")
            </div>
            <div class="tab-pane" id="PLOT" role="tabpanel">
                @include("guest.filter.sell")
            </div>
            <div class="tab-pane" id="COMMERCIAL" role="tabpanel">
                @include("guest.filter.sell")
            </div>
        </div>
        <!-- End -->
    </div>
</div>

{{Form::close()}}
