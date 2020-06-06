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

<section class="container-fluid pt-5 pb-5" style="background-color: #EBF1F5;">
  <div class="container">
	<div class="row">
		<div class="col-lg-8 col-md-9">
			<div class="property-listing-header">
				<span class="property-count left">{{$agents->count()}} agents found</span>
				<div class="property-layout-toggle right">
					<a href="{{route('property.agent.list',['view'=>'grid'])}}" class="property-layout-toggle-item"><i class="fa fa-th-large"></i></a>
				   <a href="{{route('property.agent.list',['view'=>'list'])}}" class="property-layout-toggle-item active"><i class="fa fa-bars"></i></a>
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
				<div class="col-lg-12">
			      <div class="agent agent-row agent-row-sidebar shadow-hover">
			          <a href="{{route('view.agent.detail',$agent->id)}}" class="agent-img">
			            <div class="img-fade"></div>
			            <div class="button alt agent-tag">{{$agent->properties_count}} Properties</div>
			            <img src="{{$img}}" alt="Image of {{$agent->name}}">
			          </a>
			          <div class="agent-content">
			            <div class="agent-details">
			              <h4><a href="{{route('view.agent.detail',$agent->id)}}">{{$agent->name}}</a></h4>
			              <p><i class="fa fa-tag icon"></i>Verified Agent</p>
			              <p><i class="fa fa-envelope icon"></i>{{$agent->email}}</p>
			              <p><i class="fa fa-phone icon"></i>{{$agent->mobile}}</p>
			            </div>
			    			  <div class="agent-footer center">
			                    <a href="{{route('view.agent.detail',$agent->id)}}" class="button button-icon right"><i class="fa fa-angle-right"></i>View Details</a>
			    			  </div>
			          </div>
			          <div class="clear"></div>
			      </div>
			    </div>
             @endforeach
            </div>
            {{$agents->links('vendor.pagination.guest')}}
		</div>
		
		<div class="col-lg-4 col-md-3 sidebar">
		
			<div class="widget widget-sidebar recent-properties">
			  <h4><span>Recent Properties</span> <img src="images/divider-half.png" alt=""></h4>
			  <div class="widget-content">
				@foreach($recents['property_unit_types'] as $property)
                    <div class="recent-property">
                        <div class="row">
                        <div class="col-lg-4 col-md-4 col-sm-4">
                            <a href="{{$property['view_url']}}" alt="{{$property['title']}}" />
                                <img src="{{$property['image']}}" alt="{{$property['title']}}">
                            </a>
                        </div>
                            <div class="col-lg-8 col-md-8 col-sm-8">
                                <h5><a href="{{$property['view_url']}}">{{$property['title']}}</a></h5>
                                <p>{!!$property['price']!!}</p>
                            </div>
                        </div>
                    </div>
                @endforeach
			  </div>
			</div>
			
			<div class="widget widget-sidebar recent-properties">
			  <h4><span>Quick Links</span> <img src="images/divider-half.png" alt=""></h4>
			  <div class="widget-content box">
				<ul class="bullet-list">
				  <li><a href="#">Featured Properties</a></li>
				  <li><a href="#">Featured Agents</a></li>
				  <li><a href="#">Terms &amp; Conditions</a></li>
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
</section>
@endsection