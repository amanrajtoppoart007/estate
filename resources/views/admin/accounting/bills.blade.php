@extends('admin.layout.app')
@section('content')
<h4 class="color-primary mb-4">Submit Property</h4>
<div class="submit_form color-secondery icon_primary p-5 bg-white">
    <form id="mainPropForm" enctype="multipart/form-data" method="POST" autocomplete="off">
        @csrf
        <div class="property-location mt-4">
            <h5 class="color-primary">Property Location</h5>
            <hr>3
            <div class="mb-5">
                <div class="single-map">
                    <div id="map"></div>
                </div>
            </div>
            <div class="row">
                <div class="col-6">
                    <div class="form-group">
                        <label for="latitude"></label>
                        <input type="text" name="latitude" id="latitude" class="form-control" value="" placeholder="Latitude">
                        @error('latitude')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="col-6">
                    <div class="form-group">
                        <label for="longitude"></label>
                        <input type="text" name="longitude" id="longitude" class="form-control" value="" placeholder="Longitude">
                        @error('longitude')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-10 col-md-6">
                    <div class="form-group">
                        <label>Address</label>
                        <input type="text" name="address" id="address" class="form-control @error('address') is-invalid @enderror" value="{{old('title')}}">
                        @error('address')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="col-lg-3 col-md-4">
                    <div class="form-group">
                        <label>Country</label>
                        <select class="form-control @error('country_id') is-invalid @enderror" name="country_id" id="country_id">
                            <option value="">Select Country</option>
                            @php
                            @endphp
                            @foreach($countries as $country)
                            @if($country->id==old('country_id'))
                            <option value="{{ $country->id }}" selected>{{ $country->name }}</option>
                            @else
                            <option value="{{ $country->id }}">{{ $country->name }}</option>
                            @endif
                            @endforeach
                        </select>
                        @error('country_id')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="col-lg-3 col-md-4">
                    <div class="form-group">
                        <label>State</label>
                        <select class="form-control @error('state_id') is-invalid @enderror" name="state_id" id="state_id">
                            <option value="">Select State</option>
                            @if(count($states)>0)
                            @foreach($states as $state)
                            @if($state->id==old('state_id'))
                            <option value="{{ $state->id }}" selected>{{ $state->name }}</option>
                            @else
                            <option value="{{ $state->id }}">{{ $state->name }}</option>
                            @endif
                            @endforeach
                            @endif
                        </select>
                        @error('state_id')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="form-group">
                        <label>City</label>
                        <select class="form-control @error('city_id') is-invalid @enderror" name="city_id" id="city_id">
                            <option value="">Select City</option>
                        </select>
                        @error('city_id')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <div class="col-lg-3 col-md-4">
                    <div class="form-group">
                        <label>Post Box No.</label>
                        <input type="text" class="form-control @error('zip') is-invalid @enderror" name="zip" id="zip" value="{{old('zip')}}">
                        @error('zip')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

            </div>
        </div>
        <div class="description">
            <h5 class="color-primary">Basic Information</h5>
            <hr>
            <div class="row">
                <div class="col-lg-3 col-md-3">
                    <div class="form-group">
                        <label>Property Code</label><span class="ml-2 fa-2x"><i title="Property Code" class="fa fa-question-circle" aria-hidden="true"></i></span>
                        <input type="text" name="propcode" id="prop_code" class="form-control @error('propcode') is-invalid @enderror" value="{{ old('propcode')}}" autocomplete="off">
                        @error('propcode')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="col-lg-12 col-md-12">
                    <div class="form-group">
                        <label>Property Title</label><span class="ml-2 fa-2x"><i title="Property Title" class="fa fa-question-circle" aria-hidden="true"></i></span>
                        <input type="text" name="title" id="title" class="form-control @error('title') is-invalid @enderror" value="{{old('title')}}">
                        @error('title')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="col-lg-4 col-md-12">
                    <div class="form-group">
                        <label>Property Status</label>
                        <select class="form-control @error('status') is-invalid @enderror" name="status" id="status">
                            <option value="">Any Status</option>
                            @php
                            $status = array('1'=>'Status One','2'=>'Status Two','3'=>'Status Three')
                            @endphp
                            @foreach($status as $statusKey=>$statusVal)
                            @if($statusKey==old('status'))
                            <option value="{{ $statusKey }}" selected>{{ $statusVal }}</option>
                            @else
                            <option value="{{ $statusKey }}">{{ $statusVal }}</option>
                            @endif
                            @endforeach
                        </select>
                        @error('status')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="col-lg-4 col-md-12">
                    <div class="form-group">
                        <label>Property Types</label>
                        <select class="form-control @error('type') is-invalid @enderror" name="type" id="type">
                            <option value="">Select Property Type</option>
                            @foreach($propertyTypes as $type)
                            @if($type->id==old('type'))
                            <option value="{{ $type->id }}" selected>{{ $type->title }}</option>
                            @else
                            <option value="{{ $type->id }}">{{ $type->title }}</option>
                            @endif
                            @endforeach
                        </select>
                        @error('type')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="col-lg-4 col-md-12">
                    <div class="form-group">
                        <label>Property For</label>
                        <select class="form-control @error('prop_for') is-invalid @enderror" name="prop_for" id="prop_for">
                            <option value="">Purpose</option>
                            @php
                            $purpose = array('1'=>'For Rent','2'=>'For Sale')
                            @endphp
                            @foreach($purpose as $pKey=>$pVal)
                            @if($pKey==old('prop_for'))
                            <option value="{{$pKey}}" selected>{{$pVal}}</option>
                            @else
                            <option value="{{$pKey}}">{{$pVal}}</option>
                            @endif
                            @endforeach
                        </select>
                        @error('prop_for')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="col-lg-3 col-md-12">
                    <div class="form-group">
                        <label>Price</label><span class="ml-2 fa-2x"><i title="Property Price" class="fa fa-question-circle" aria-hidden="true"></i></span>
                        <input type="text" placeholder="AED" class="form-control @error('price') is-invalid @enderror">
                    </div>
                </div>
                <div class="col-lg-3 col-md-12">
                    <div class="form-group">
                        <label>Area</label><span class="ml-2 fa-2x"><i title="Property Area" class="fa fa-question-circle" aria-hidden="true"></i></span>
                        <input type="text" name="area" id="area" placeholder="Sq Ft" class="form-control @error('area') is-invalid @enderror" value="{{old('area')}}">
                        @error('area')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="col-lg-3 col-md-12">

                </div>
                <div class="col-lg-3 col-md-12">

                </div>
                <div class="col-lg-5">
                </div>
            </div>
        </div>
        <div class="description mt-4">
            <h5 class="color-primary">Description</h5>
            <hr>
            <div class="row">
                <div class="col-lg-12 col-md-12">
                    <div class="form-group">
                        <label>Description</label>
                        <textarea name="description" id="description" class="form-control bg-gray @error('description') is-invalid @enderror" placeholder="Write Details...">{{old('title')}}</textarea>
                        @error('description')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
            </div>
        </div>



        <div class="additional_feature mt-4">
            <h5 class="color-primary">Additional Features</h5>
            <div class="row">
                <div class="col-lg-12">
                    <ul class="check_submit row">
                        @if(count($features)>0)
                        @foreach($features as $feature)
                        <li class="col-md-3">
                            <input id="feature_{{ $feature->id }}" name="feature[]" class="hide" type="checkbox" value="{{ $feature->id }}">
                            <label for="feature_{{ $feature->id }}">{{ $feature->title }}</label>
                        </li>
                        @endforeach
                        @endif
                    </ul>
                </div>
                <div class="col-lg-12">
                    @error('feature')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
            </div>

        </div>
        <div class="additional_feature mt-4">
            <h5 class="color-primary">Units</h5>
            <div class="row">
                <div class="col-lg-6">
                    <select class="form-control" name="prop_type" id="prop_type">
                        <option value="1">Single Unit</option>
                        <option value="2">Multi Unit</option>
                    </select>
                </div>

            </div>
            <div class="row mt-2">
                <div class="col-md-2">
                    Unit Type
                </div>
                <div class="col-md-2">
                    Bedrooms
                </div>
                <div class="col-md-2">
                    Bathroom
                </div>
                <div class="col-md-2">
                    Kitchen
                </div>
                <div class="col-md-2">
                    Hall
                </div>
                <div class="col-md-1">
                    Total
                </div>
                <div class="col-md-1">
                    Action
                </div>
            </div>
            <div id="appendUnit">



            </div>
            <div class="row mt-2 hideme" id="moreBTNdiv">
                <div class="col-md-2">
                    <button type="button" id="addMoreUnit" class="btn btn-primary"><i class="fa fa-plus text-white"></i> Add more</button>
                </div>

            </div>



            <div class="upload_media mt-5">
                <h5 class="color-primary">Add Photos </h5>
                <hr>
                <div class="row">
                    <div class="col-md-12">
                        <div class="browse_submit">
                            <input type="file" name="images[]" id="images" class="hide" value="" multiple>
                            <label class="fileupload_label text-center w-100" for="images">Drag and Drop to Add Photo (770x390)</label>
                        </div>
                        @error('images')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="col-lg-12">
                        <div class="property_thumbnails mt-5">
                            <div class="row" id="gallery">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="form-group">
                <input type="submit" name="name" class="btn btn-primary" value="Save Data">
            </div>
    </form>
</div>

@endsection
@section('script')





@endsection