{{Form::open(['id'=>'add_unit_form'])}}
<input type="hidden" name="property_id" id="property_id" value="">
<input type="hidden" name="title" id="title" value="">
<div class="modal" tabindex="-1" role="dialog" id="addUnitModal">
	<div class="modal-dialog modal-xl" role="document">
		<div class="modal-content">
		<div class="modal-header bg-primary">
			<h5 class="modal-title">Add Property Unit</h5>
			<button type="button" class="close" data-dismiss="modal" aria-label="Close">
			<span aria-hidden="true">&times;</span>
			</button>
		</div>
		<div class="modal-body">
			<div class="row">
				<div class="col col-md-3 col-lg-3 col-xl-3">
					<div class="form-group">
						<label for="property_unit_type_id">Unit Series</label>
						<div class="input-group">
							<div class="input-group-prepend">
								<span class="input-group-text"><i class="fas fa-building text-indigo"></i></span>
							</div>

							<select  class="form-control" name="property_unit_type_id" id="property_unit_type_id">
								 <option value="">Select Unit Series</option>
								@foreach($property->propertyUnitTypes as $propertyUnitType)
							        <option value="{{$propertyUnitType->id}}">Series {{$propertyUnitType->unit_series}}</option>
								@endforeach
							</select>
						</div>
					</div>
				</div>
				<div class="col col-md-3 col-lg-3 col-xl-3">
					<div class="form-group">
						<label for="flat_house_no">Flat No.</label>
						<div class="input-group">
							<div class="input-group-prepend">
								<span class="input-group-text"><i class="fas fa-building text-primary"></i></span>
							</div>
							<input type="text" class="form-control" name="flat_house_no" id="flat_house_no" value="">
						</div>
					</div>
				</div>
				<div class="col col-md-3 col-lg-3 col-xl-3">
					<div class="form-group">
						<label for="floor_no">Floor No.</label>
						<div class="input-group">
							<div class="input-group-prepend">
								<span class="input-group-text"><i class="fas fa-sort-numeric-up-alt text-warning"></i></span>
							</div>
							<select type="text" class="form-control" name="floor_no" id="floor_no">
                                <option value="">Select Floor</option>
                                @for($i=1;$i<=$property->total_floors;$i++)
                                    <option value="{{$i}}">{{$i}}th Floor</option>
                                @endfor
                            </select>
						</div>
					</div>
				</div>
				<div class="col col-md-3 col-lg-3 col-xl-3">
					<div class="form-group">
						<label for="unit_size">Unit Size</label>
						<div class="input-group">
							<div class="input-group-prepend">
								<span class="input-group-text"><i class="fas fa-window-maximize text-info"></i></span>
							</div>
							<input type="text" class="form-control" name="unit_size" id="unit_size" value="">
						</div>
					</div>
				</div>
				<div class="col col-md-3 col-lg-3 col-xl-3">
					<div class="form-group">
						<label for="bedroom">Bedroom</label>
						<div class="input-group">
							<div class="input-group-prepend">
								<span class="input-group-text"><i class="fas fa-bed text-cyan"></i></span>
							</div>
							<select type="text" class="form-control" name="bedroom" id="bedroom">
                                <option value="">Select</option>
                                <option value="studio">Studio</option>
                                <option value="1">1</option>
                                <option value="2">2</option>
                                <option value="3">3</option>
                                <option value="4">4</option>
                                <option value="5">5</option>
                                <option value="6">6</option>
                                <option value="7">7</option>
                                <option value="7+">7+</option>
                            </select>
						</div>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col col-md-3 col-lg-3 col-xl-3">
					<div class="form-group">
						<label for="bathroom">Bathroom</label>
						<div class="input-group">
							<div class="input-group-prepend">
								<span class="input-group-text"><i class="fas fa-bath text-dark"></i></span>
							</div>
							<select type="text" class="form-control" name="bathroom" id="bathroom">
                            <option value="">Select</option>
                                <option value="1">1</option>
                                <option value="2">2</option>
                                <option value="3">3</option>
                                <option value="4">4</option>
                                <option value="5">5</option>
                                <option value="6">6</option>
                                <option value="7">7</option>
                                <option value="7+">7+</option>
                            </select>

						</div>
					</div>
				</div>
				<div class="col col-md-3 col-lg-3 col-xl-3">
					<div class="form-group">
						<label for="furnishing">Furnishing</label>
						<div class="input-group">
							<div class="input-group-prepend">
								<span class="input-group-text"><i class="fas fa-chair text-indigo"></i></span>
							</div>

							<select  class="form-control" name="furnishing" id="furnishing">
								<option value="">Select</option>
								<option value="furnished">Yes</option>
								<option value="semifurnished">Partial</option>
								<option value="unfurnished">No</option>
							</select>
						</div>
					</div>
				</div>
				<div class="col col-md-3 col-lg-3 col-xl-3">
					<div class="form-group">
						<label for="balcony">Balcony</label>
						<div class="input-group">
							<div class="input-group-prepend">
								<span class="input-group-text"><i class="far fa-window-maximize text-warning"></i></span>
							</div>
							<select  class="form-control" name="balcony" id="balcony">
								<option value="">Select</option>
								<option value="1">1</option>
								<option value="2">2</option>
								<option value="3">3</option>
								<option value="4">4</option>
								<option value="4+">4+</option>
							</select>
						</div>
					</div>
				</div>
				<div class="col col-md-3 col-lg-3 col-xl-3">
					<div class="form-group">
						<label for="parking">Parking</label>
						<div class="input-group">
							<div class="input-group-prepend">
								<span class="input-group-text"><i class="fas fa-parking text-danger"></i></span>
							</div>
							<select  class="form-control" name="parking" id="parking">
								<option value="">Select</option>
								<option value="1">1</option>
								<option value="2">2</option>
								<option value="3">3</option>
								<option value="4">4</option>
								<option value="4+">4+</option>
							</select>
						</div>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col col-md-3 col-lg-3 col-xl-3 d-none">
					<div class="form-group">
						<label for="kitchen">Kitchen</label>
						<div class="input-group">
							<div class="input-group-prepend">
								<span class="input-group-text"><i class="fas fa-utensils text-fuchsia"></i></span>
							</div>
							<select type="text" class="form-control" name="kitchen" id="kitchen">
                                <option value="">Select</option>
								<option value="1">1</option>
								<option value="2">2</option>
								<option value="3">3</option>
								<option value="4">4</option>
								<option value="4+">4+</option>
                            </select>
						</div>
					</div>
				</div>
				<div class="col col-md-3 col-lg-3 col-xl-3 d-none">
					<div class="form-group">
						<label for="hall">Hall</label>
						<div class="input-group">
							<div class="input-group-prepend">
								<span class="input-group-text"><i class="fas fa-square text-gray"></i></span>
							</div>
							<input type="text" class="form-control" name="hall" id="hall" value="">
						</div>
					</div>
				</div>
                <div class="col col-md-3 col-lg-3 col-xl-3">
					<div class="form-group">
						<label for="purpose">Purpose</label>
						<div class="input-group">
							<div class="input-group-prepend">
								<span class="input-group-text"><i class="fas fa-parking text-danger"></i></span>
							</div>
							<select class="form-control" name="purpose" id="purpose">
                                <option value="">Select</option>
                                @if($property->prop_for==1)
                                    <option value="1">Rent</option>
                                @elseif($property->prop_for==2)
                                    <option value="2">Sale</option>
                                @else
                                    <option value="1">Rent</option>
                                    <option value="2">Sale</option>
                                    <option value="3">Rent & Sale</option>
                                @endif
							</select>
						</div>
					</div>
				</div>
                <div class="col col-md-3 col-lg-3 col-xl-3">
					<div class="form-group">
						<label for="unit_status">Status</label>
						<div class="input-group">
							<div class="input-group-prepend">
								<span class="input-group-text"><i class="fas fa-parking text-danger"></i></span>
							</div>
							<select class="form-control" name="unit_status" id="unit_status">
                                <option value="">Select</option>
                                <option value="2">Rented</option>
                                <option value="9">Owner Stay</option>
                                <option value="10">Owner Rent</option>
                                <option value="11">For Rent</option>
                                <option value="12">For Sale</option>
                                <option value="13">For Rent & Sale</option>
							</select>
						</div>
					</div>
				</div>
				<div class="col col-md-3 col-lg-3 col-xl-3 grid_rent_type" style="display:none;">
					<div class="form-group">
						<label for="rent_type">Rent Type</label>
						<div class="input-group">
							<div class="input-group-prepend">
								<span class="input-group-text"><i class="fas fa-parking text-danger"></i></span>
							</div>
							<select class="form-control" name="rent_type" id="rent_type">
                                <option value="">Select</option>
                                <option value="monthly">Monthly</option>
								<option value="yearly">Yearly</option>
								<option value="half_yearly">Half Yearly</option>
							</select>
						</div>
					</div>
				</div>
				<div class="col col-md-3 col-lg-3 col-xl-3">
					<div class="form-group">
						<label for="unit_price">Flat Rent/Sale Price</label>
						<div class="input-group">
							<div class="input-group-prepend">
								<span class="input-group-text"><i class="fas fa-parking text-danger"></i></span>
							</div>
							<input type="text" class="form-control" name="unit_price" id="unit_price" value="">
						</div>
					</div>
				</div>
			</div>
			<div class="row">

				<div class="col col-md-3 col-lg-3 col-xl-3">
					<div class="form-group">
						<label for="agent_id">Agent</label>
						<div class="input-group">
							<div class="input-group-prepend">
								<span class="input-group-text"><i class="fas fa-user text-info"></i></span>
							</div>
							<select  class="form-control" name="agent_id" id="agent_id">
								<option value="">Select</option>
								@foreach($agents as $agent)
								 <option value="{{$agent->id}}">{{$agent->name}}</option>
								@endforeach
							</select>
						</div>
					</div>
				</div>
				<div class="col col-md-3 col-lg-3 col-xl-3">
					<div class="form-group">
						<label for="owner_id">Owner</label>
						<div class="input-group">
							<div class="input-group-prepend">
								<span class="input-group-text"><i class="fas fa-user text-info"></i></span>
							</div>
							<select  class="form-control" name="owner_id" id="owner_id">
								<option value="">Select</option>
								@foreach($owners as $owner)
								 <option value="{{$owner->id}}">{{$owner->name}}</option>
								@endforeach
							</select>
						</div>
					</div>
				</div>

                <div class="col col-md-3 col-lg-3 col-xl-3">
                    <div class="form-group">
                        <label for="purchase_date">Purchase Date</label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-user text-info"></i></span>
                            </div>
                            <input type="text" class="form-control" name="purchase_date" id="purchase_date" value="">
                        </div>
                    </div>
                </div>

                <div class="col col-md-3 col-lg-3 col-xl-3">
					<div class="form-group">
						<label for="purchase_cost">Purchase Cost</label>
						<div class="input-group">
							<div class="input-group-prepend">
								<span class="input-group-text"><i class="fas fa-user text-info"></i></span>
							</div>
                            <input type="text" class="form-control numeric" name="purchase_cost" id="purchase_cost" value="">
						</div>
					</div>
				</div>

			</div>
		</div>
		<div class="modal-footer">
			<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
			<button type="submit" class="btn btn-primary">Add Unit</button>
		</div>
		</div>
	</div>
</div>
{{Form::close()}}
