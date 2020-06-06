@extends('guest.layout.main')
@include('guest.include.navbar')
@section('content')
<!--	Banner
===============================================================-->
<div class="page-banner bg-gray">
	<div class="container">
		<div class="row">
			<div class="col-md-12 col-lg-12">
				<div class="breadcrumbs color-secondery">
					<ul>
                    <li class="hover_gray"><a href="{{url('/')}}">Home</a></li>
						<li><i class="fa fa-angle-right" aria-hidden="true"></i></li>
						<li class="color-default">{{ __('Register') }}</li>
					</ul>
				</div>
				<div class="float-right color-primary">
					<h3 class="banner-title font-weight-bold">{{ __('Register') }}</h3>
				</div>
			</div>
		</div>
	</div>
</div>
<section class="full-row">
	<div class="container">
		<div class="row">
			<div class="col-md-7 col-md-7">
				<div class="login_massage pb_60">
					<h4 class="pb_20 color-primary">Welcome</h4>
					<p>Sign Up Now it's very easy. </p>
				</div>
				<div class="login_list">
					<h5 class="pb_20 color-primary">Keep in a mind a few basic password roules :</h5>
					<div class="row">
						<div class="col-md-6 col-lg-4">
							<ul class="flat_small">
								<li><span class="color-default"><i class="flaticon-checked"></i></span>Change your passwords periodically</li>
								<li><span class="color-default"><i class="flaticon-checked"></i></span>Avoid re-using password for multiple site</li>
								<li><span class="color-default"><i class="flaticon-checked"></i></span>Use complex characters including uppercase and number</li>
							</ul>
						</div>
					</div>
				</div>
			</div>
			<div class="col-md-5 col-lg-5">
				<div class="login_form">
					<ul class="d-inline-block mb_30">
						<li><a href="{{route('login')}}" class="color-primary">Login</a></li>
                    <li class="active"><a href="{{route('register')}}" class="color-primary">{{ __('Register') }}</a></li>
					</ul>
                        <form class="form9" method="POST" action="{{ route('register') }}">
                            @csrf
					  <div class="form-group user">
					    <label for="name">{{ __('Name') }}</label>
                        <input id="name"  name="name" type="text" class="form-control bg-gray @error('name') is-invalid @enderror" placeholder="Name" value="{{ old('name') }}" required autocomplete="name" autofocus>
                        @error('name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
					  </div>
					   <div class="form-group email">
					    <label for="email">{{ __('E-Mail Address') }}</label>
                        <input id="email" name="email" type="email" class="form-control bg-gray @error('email') is-invalid @enderror" placeholder="" value="{{ old('email') }}" required autocomplete="email">
                        @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
					  </div>
					  <div class="form-group password">
					    <label for="password">{{ __('Password') }}</label>
                        <input id="password" name="password" type="password" class="form-control bg-gray @error('password') is-invalid @enderror" placeholder="" required autocomplete="new-password">
                        @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
					  </div>
					  <div class="form-group password">
					    <label for="password-confirm">{{ __('Confirm Password') }}</label>
					    <input id="password-confirm" name="password_confirmation"  type="password" class="form-control bg-gray" placeholder="" required autocomplete="new-password">
					  </div>
					  <div class="form-group form-check">
					    <input type="checkbox" class="form-check-input" id="exampleCheck1" name="">
					    <label class="form-check-label" for="exampleCheck1">Accept Terms and Condition</label>
					  </div>
					  <button type="submit" class="btn btn-default1 mt_15">{{ __('Register') }}</button>
                    <a  class="color-primary d-block mt_30" href="#">View Terms and Conditions</a>					  
					</form>
				</div>
			</div>
		</div>
	</div>
</section>
@endsection
