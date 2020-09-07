<form>
                                <div class="row">
                                    <div class="col-lg-6 col-sm-4 col-12">
                                        <div class="form-group">
                                            <input type="text" name="address" class="form-control" placeholder="Enter location, Project or Landmark">
                                        </div>
                                    </div>
                                    <div class="col-lg-2 col-sm-3 col-12">
                                        <div class="form-group">
                                            <select class="custom-select">
                                                <option>Unit Type</option>
                                                @php $property_types = get_property_types() @endphp
                                                @foreach($property_types as $key=>$value)
                                                    <option value="{{$key}}">{{$value}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-lg-2 col-sm-3 col-12">
                                        <div class="form-group">
                                            <select name="budget" class="custom-select">
                                                <option value="">Budget</option>

                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-lg-2 col-sm-3 col-12">
                                        <div class="form-group">
                                            <select name="furnishing" class="custom-select">
                                                <option value="">Furnishing</option>
                                                @php $furnishings = get_furnishing_types() @endphp
                                                @foreach($furnishings as $key=>$value)
                                                    <option value="{{$key}}">{{$value}}</option>
                                                @endforeach>
                                            </select>
                                        </div>
                                    </div>

                                </div>
                                <div class="row">
                                    <div class="col-lg-3 col-sm-3 col-12">
                                        <div class="form-group">
                                            <select name="mode" class="custom-select">
                                                <option value="">For</option>
                                                @php $modes = get_property_purpose_modes(); @endphp
                                                @foreach($modes as $key=>$value)
                                                    <option value="{{$key}}">{{$value}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-sm-6 col-12">
                                        <div class="row">
                                            <div class="col-lg-3 col-sm-3 col-12">
                                                <div class="form-group">
                                                    <input type="text" class="form-control" name="price[min]" placeholder="Min. Price">
                                                </div>
                                            </div>
                                            <div class="col-lg-3 col-sm-3 col-12">
                                                <div class="form-group">
                                                    <input type="text" class="form-control" name="price[max]" placeholder="Max. Price">
                                                </div>
                                            </div>
                                            <div class="col-lg-3 col-sm-3 col-12">
                                                <div class="form-group">
                                                    <input type="text" class="form-control" name="bedroom[min]" placeholder="Min. Bed">
                                                </div>
                                            </div>
                                            <div class="col-lg-3 col-sm-3 col-12">
                                                <div class="form-group">
                                                    <input type="text" class="form-control" name="bedroom[max]" placeholder="Max. Bed">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-3 col-sm-2 col-12">
                                        <div class="form-group">
                                            <button type="submit" class="btn btn-primary btn-block btn-form-submit">Submit</button>
                                        </div>
                                    </div>
                                </div>
                            </form>
