@section('navbar')
<style>
	.navbar-brand:before {
		display: none;
	}

	.nav-logo{
		padding-top: 10px;
	}

	@media screen and (min-width: 250px) and (max-width: 768px) {

    }
</style>

<nav class="navbar navbar-expand-lg navbar-light bg-light">
	<div class="container">
	<a class="navbar-brand" href="{{URL::to('/')}}">
			<img class="nav-logo" src="{{asset('theme/default/images/logo/logo.png')}}" alt=""></a>
		</a>
		<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
			<span class="navbar-toggler-icon"></span>
		</button>

		<div class="collapse navbar-collapse" id="navbarSupportedContent">
			<ul class="navbar-nav ml-auto">
				<li class="nav-item">
					<a class="nav-link" href="{{url('/')}}">Home</a>
				</li>
				<li class="nav-item home-link">
					<a class="nav-link" href="{{route('property.search',['mode'=>2])}}">Home For Sale</a>
				</li>
				<li class="nav-item home-link">
					<a class="nav-link" href="{{route('property.search',['mode'=>1])}}">Home For Rent</a>
				</li>

				<li class="nav-item home-link">
					<a class="nav-link" href="{{route('property.agent.list')}}">Find Agents</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" href="{{ route('contact') }}">Contact</a>
				</li>
			</ul>
		</div>
	</div>
</nav>
@endsection
