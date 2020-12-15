@foreach($properties as $prop)
                                        @php $selected = ($property_unit->property->id==$prop->id)?"selected":"";  @endphp
                                        <option value="{{$prop->id}}" {{$selected}}>{{$prop->title}}</option>
                                    @endforeach
