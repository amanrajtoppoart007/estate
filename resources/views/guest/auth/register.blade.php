@extends("guest.layout.main")
@section("content")
    <!-- Login Section -->
    <div class="container-fluid mb-5 py-5">
        <div class="row">
            <div class="col-lg-4 col-sm-4 col-12 offset-lg-4 offset-sm-4">
                <form method="post" action="{{route('register')}}" class="p-4 bgGray box-shadow mt-5">
                    @csrf
                    <div class="row">
                        <div class="col-lg-12 col-sm-12 col-12">
                            <h2 class="text-center mb-0">Register Now</h2>
                            <h5 class="text-center mb-4 colorOrange">Fill the Registration Form</h5>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-12 col-sm-12 col-12">
                            <div class="form-group">
                                <select type="text" class="form-control" name="country_id" id="country_id">
                                    <option value="">Select Country</option>
                                    @foreach($countries as $country)
                                        @php $selected =(old('country_id')==$country->id)?'selected':null; @endphp
                                        <option value="{{$country->id}}" {{$selected}}>{{$country->name}}</option>
                                    @endforeach
                                </select>
                                @error('country_id')
                                  <div class="alert alert-danger">
                                      {{$message}}
                                  </div>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-12 col-sm-12 col-12">
                            <div class="form-group">
                                <input type="text" class="form-control" name="name" id="name" placeholder="Your Name" value="{{old('name')}}">
                                @error('name')
                                  <div class="alert alert-danger">
                                      {{$message}}
                                  </div>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-12 col-sm-12 col-12">
                            <div class="form-group">
                                <input type="email" class="form-control" name="email" id="email" placeholder="Your Email" value="{{old('email')}}">
                                @error('email')
                                  <div class="alert alert-danger">
                                      {{$message}}
                                  </div>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-12 col-sm-12 col-12">
                            <div class="form-group">
                                <input type="text" class="form-control" name="mobile" id="mobile" placeholder="Your Mobile Number" value="{{old('mobile')}}">
                                @error('mobile')
                                  <div class="alert alert-danger">
                                      {{$message}}
                                  </div>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-12 col-sm-12 col-12">
                            <div class="form-group">
                                <input type="password" name="password" id="password" class="form-control" placeholder="{{ __('Password') }}">
                                @error('password')
                                  <div class="alert alert-danger">
                                      {{$message}}
                                  </div>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-12 col-sm-12 col-12">
                            <div class="form-group">
                                <input type="text" name="password_confirmation" id="password_confirmation" class="form-control" placeholder="{{ __('Password') }}">
                                @error('password_confirmation')
                                  <div class="alert alert-danger">
                                      {{$message}}
                                  </div>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-12 col-sm-12 col-12">
                            <div class="form-group">
                                <button type="submit" class="btn btn-primary btn-block btn-form-submit">Sign Up</button>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-12 col-sm-12 col-12 text-center">
                            Already have an Account ? <a href="{{route('login')}}" class="colorOrange">LogIn</a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- End Login Section -->
@endsection
