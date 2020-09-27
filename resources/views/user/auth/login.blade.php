@extends("guest.layout.main")
@section("content")
    <!-- Login Section -->
    <div class="container-fluid mb-5 py-5">
        <div class="row">
            <div class="col-lg-4 col-sm-4 col-12 offset-lg-4 offset-sm-4">
                <form action="{{ route('login') }}" class="p-4 bgGray box-shadow mt-5">
                    <div class="row">
                        <div class="col-lg-12 col-sm-12 col-12">
                            <h2 class="text-center mb-0">Welcome Back</h2>
                            <h5 class="text-center mb-4 colorOrange">{{ __('Login') }} To Your Panel</h5>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-12 col-sm-12 col-12">
                            <div class="form-group">
                                <input type="email" class="form-control" name="email" id="email" placeholder="Your email" value="{{old('email')}}">
                                @error('email')
                                <span class="invalid-feedback" role="alert">
                                   <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-12 col-sm-12 col-12">
                            <div class="form-group">
                                <input type="password" name="password" class="form-control" placeholder="Password" value="">
                                @error('password')
                                <span class="invalid-feedback" role="alert">
                                   <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-6 col-sm-6 col-12">
                            <div class="form-group form-check">
                                <input type="checkbox" class="form-check-input" id="remember" name="remember" {{ old('remember') ? 'checked' : '' }}>
                                <label class="form-check-label" for="remember">Remember Me</label>
                            </div>
                        </div>
                        @if (Route::has('password.request'))
                        <div class="col-lg-6 col-sm-6 col-12 text-right">
                            <div class="form-group form-check">
                                <a href="{{ route('password.request') }}" class="colorOrange">Forgot Password?</a>
                            </div>
                        </div>
                        @endif
                    </div>
                    <div class="row">
                        <div class="col-lg-12 col-sm-12 col-12">
                            <div class="form-group">
                                <button type="submit" class="btn btn-primary btn-block btn-Formsubmit">Login</button>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-12 col-sm-12 col-12 text-center">
                            Don't have an Account ? <a href="{{route('register')}}" class="colorOrange">Sign Up</a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- End Login Section -->
@endsection
