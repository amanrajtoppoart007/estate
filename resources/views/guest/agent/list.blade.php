@extends("guest.layout.main")
@section("content")
     <!-- Hero Section -->
    <div class="jumbotron agentSection">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-sm-12 col-12">
                    <h1 class="text-center text-white">Great agents find great properties.</h1>
                </div>
            </div>
               @include("guest.filter.agent.filter")
        </div>
    </div>
    <!-- End -->

    <!-- Thumbnail List of Agents -->
    <div class="container my-5 pb-5">
        <div class="row">
            <div class="col-lg-12 col-sm-12 col-12">
                <h2 class="text-center mb-5">Verified Agents</h2>
            </div>
        </div>
        <div class="row">
            @if(!empty($agents))
                @foreach($agents as $agent)
                  <div class="col-lg-3 col-sm-3 col-12">
                <div class="card cardBox-Shadow">
                    <a class="cardAnchor" href="{{route('view.agent.detail',$agent->id)}}">
                        @php
                         if(!empty($agent->photo))
                         {
                             $img = route('get.doc',base64_encode($agent->photo));
                         }
                         else
                         {
                             $img = asset('theme/images/4.png');
                         }
                      @endphp
                        <img style="width: 253px;height: 169px;" src="{{$img}}" class="card-img-top" alt="...">
                        <div class="card-body p-0 pt-2">
                            <h5 class="card-title mb-0 text-center">{{$agent->name}}</h5>

                            <hr>
                            <ul class="agentCard-ul">
                                <li>
                                    Nationality : <strong>{{$agent->country->name}}</strong>
                                </li>
                                <li>
                                    Active Since : <strong>{{$agent->created_at->diffForHumans()}}</strong>
                                </li>
                            </ul>
                            <hr class="mb-0">
                            <div class="row">
                                <div class="col-lg-6 col-sm-6 col-12 pr-0">
                                    <button type="button" class="btn btn-primary btnOrange btn-block">
                                    <strong class="font-24">{{$agent->property_units->whereIn('purpose',[1,3])->count()}}</strong>
                                    <span class="clearfix"></span>
                                    <small>For Rent</small>
                                </button>
                                </div>
                                <div class="col-lg-6 col-sm-6 col-12 pl-0">
                                    <button type="button" class="btn btn-primary btnBlue btn-block">
                                    <strong class="font-24">{{$agent->property_units->whereIn('purpose',[2,3])->count()}}</strong>
                                    <span class="clearfix"></span>
                                    <small>For Sale</small>
                                </button>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
            </div>
                @endforeach
            @else
                <div class="col-12 col-lg-12 col-xl-12 text-center">
                    <h6 class="text-danger">No agents are available for now</h6>
                </div>
            @endif

        </div>

        <div class="row mt-5">
            <div class="col-lg-12 col-sm-12 col-12 text-center">
                {{$agents->links()}}
            </div>
        </div>
    </div>
    <!-- End Thumbnail List of Agents -->
@endsection
