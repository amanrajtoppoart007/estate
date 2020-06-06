@extends('guest.layout.main')
@include('guest.include.navbar')
@section('content')

<!-- Header Sub-Header Section -->
<section class="subheader subheader-listing-sidebar">
	<div class="container">
		<h1>Agent Listing</h1>
		<div class="breadcrumb right">Home <i class="fa fa-angle-right"></i> <a href="#" class="current">Agents</a></div>
		<div class="clear"></div>
	</div>
</section>
<!-- End Sub-Header Section -->

<!-- Agent List Page -->
<div class="container-fluid pt-5 pb-5" style="background-color: #EBF1F5;">
	<div class="container">
		<div class="property-listing-header">
			<span class="property-count left">showing {{$agents->count()}}  results</span>
			<div class="property-layout-toggle right">
				<a href="{{route('property.agent.list',['view'=>'grid'])}}" class="property-layout-toggle-item active"><i class="fa fa-th-large"></i></a>
				<a href="{{route('property.agent.list',['view'=>'list'])}}" class="property-layout-toggle-item"><i class="fa fa-bars"></i></a>
			</div>
			<div class="clear"></div>
		</div>

		<div class="row">
          @foreach($agents as $agent)
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
			<div class="col-lg-3 col-md-3">
				<div class="agent shadow-hover">
					<a href="{{route('view.agent.detail',$agent->id)}}" class="agent-img">
						<div class="img-fade"></div>
						<div class="button alt agent-tag">{{$agent->properties_count}} Properties</div>
						<img src="{{$img}}" alt="" />
					</a>
					<div class="agent-content">
						<div class="agent-details">
							<h4><a href="{{route('view.agent.detail',$agent->id)}}">{{ucwords($agent->name)}}</a></h4>
							<p><i class="fa fa-check icon"></i>Verified Agent</p>
							<p><i class="fa fa-envelope icon"></i>{{$agent->email}}</p>
							<p><i class="fa fa-phone icon"></i>{{$agent->mobile}}</p>
						</div>
					</div>
				</div>
            </div>
         @endforeach
	 </div>
		{{$agents->links('vendor.pagination.guest')}}
	</div>
</div>
@endsection