@extends('guest.layout.main')
@include('guest.include.navbar')
@section('content')
<div class="page-banner bg-gray">
	<div class="container">
		<div class="row">
			<div class="col-md-12 col-lg-12">
				<div class="breadcrumbs color-secondery">
					<ul>
                    <li class="hover_gray"><a href="{{url('/')}}">Home</a></li>
						<li><i class="fa fa-angle-right" aria-hidden="true"></i></li>
						<li class="color-default">Login</li>
					</ul>
				</div>
				<div class="float-right color-primary">
					<h3 class="banner-title font-weight-bold">Admin Login</h3>
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
					<p>Adipiscing lacinia pede proin vulputate habitasse donec adipiscing. Cubilia Interdum hac turpis et dignissim vehicula porta nostra dictum nostra semper. Dictumst congue dictum. Nam massa id, netus interdum amet Metus turpis scelerisque aptent sapien penatibus potenti. </p>
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
                    <li class="active"><a href="{{route('login')}}" class="color-primary">Login</a></li>
                    <li><a href="{{route('register')}}" class="color-primary">Register</a></li>
					</ul>
					{{Form::open(['route'=>'admin.login.submit','class'=>'form9'])}}
                    
					  <div class="form-group user">
					    <label for="email">Email</label>
                        <input id="email" name="email" type="email" class="form-control bg-gray @error('email') is-invalid @enderror" value="{{ old('email') }}" placeholder="E-mail" autofocus required>
                         @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
					  </div>
					  <div class="form-group password">
					    <label for="password">Password</label>
                        <input id="password" name="password" type="password" class="form-control bg-gray @error('password') is-invalid @enderror" placeholder="Password">
                        @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
					  </div>
					  <div class="form-group form-check">
					    <input type="checkbox" class="form-check-input" id="remember" name="remember" {{ old('remember') ? 'checked' : '' }}>
					    <label class="form-check-label" for="remember">{{ __('Remember Me') }}</label>
					  </div>
					  <button type="submit" class="btn btn-default1 mt_15">Login</button>
					  @if (Route::has('password.request'))
							<a class="color-primary d-block mt_30" href="{{ route('admin.password.request') }}">
								{{ __('Forgot Your Password?') }}
							</a>
                      @endif
					{{Form::close()}}
				</div>
			</div>
		</div>
	</div>
</section>
@endsection
