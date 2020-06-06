@extends('layouts.guest')
@extends('layouts.guest.navbar')
@section('content')
<div class="page-banner bg-gray">
	<div class="container">
		<div class="row">
			<div class="col-md-12 col-lg-12">
				<div class="breadcrumbs color-secondery">
					<ul>
                    <li class="hover_gray"><a href="{{url('/')}}">Home</a></li>
						<li><i class="fa fa-angle-right" aria-hidden="true"></i></li>
						<li class="color-default">Forgot Paasword</li>
					</ul>
				</div>
				<div class="float-right color-primary">
					<h3 class="banner-title font-weight-bold">Forgot Paasword</h3>
				</div>
			</div>
		</div>
	</div>
</div>
<section class="full-row">
	<div class="container">
		<div class="row">
			<div class="col-md-12 col-lg-12">
				<div class="forget_password w-50 m-auto">
					<div class="login_form">
                        <h4 class="color-primary mb-4">Recover Your Password</h4>
                            <form class="form9" method="POST" action="{{ route('password.email') }}">
                                @csrf
						   <div class="form-group email">
						    <label for="email">{{ __('E-Mail Address') }}</label>
                            <input id="email" name="email" type="email" class="form-control bg-gray @error('email') is-invalid @enderror" value="{{ old('email') }}" placeholder="E-mail" required autocomplete="email" autofocus>
                          </div>
                          @if (session('status'))
                                <div class="alert alert-success" role="alert">
                                    {{ session('status') }}
                                </div>
                            @endif
                            @error('email')
                                <span class="alert alert-danger" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                          <button type="submit" class="btn btn-default1 mt_15">
                                    {{ __('Send Password Reset Link') }}
                          </button>			  
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>
@endsection