{{Form::open(['id'=>'edit_unit_data_form'])}}
<input type="hidden" name="unit_id" id="edit_property_unit_id" value="">
<div class="modal" tabindex="-1" role="dialog" id="editModal">
	<div class="modal-dialog modal-xl" role="document">
		<div class="modal-content">
		<div class="modal-header bg-primary">
			<h5 class="modal-title">Edit Property Unit</h5>
			<button type="button" class="close" data-dismiss="modal" aria-label="Close">
			<span aria-hidden="true">&times;</span>
			</button>
		</div>
		<div class="modal-body">
			<div class="row">
				<div class="col col-md-3 col-lg-3 col-xl-3">
					<div class="form-group">
						<label for="flat_house_no">Flat/House No.</label>
						<div class="input-group">
							<div class="input-group-prepend">
								<span class="input-group-text"><i class="fas fa-building text-primary"></i></span>
							</div>
							<input type="text" class="form-control" name="flat_house_no" id="edit_flat_house_no" value="">
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
							<input type="text" class="form-control" name="floor_no" id="edit_floor_no" value="">
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
							<input type="text" class="form-control" name="unit_size" id="edit_unit_size" value="">
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
							<input type="text" class="form-control" name="bedroom" id="edit_bedroom" value="">
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
							<input type="text" class="form-control" name="bathroom" id="edit_bathroom" value="">
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
							
							<select  class="form-control" name="furnishing" id="edit_furnishing">
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
							<select  class="form-control" name="balcony" id="edit_balcony">
								<option value="">Select</option>
								<option value="1">Yes</option>
								<option value="0">No</option>
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
							<select  class="form-control" name="parking" id="edit_parking">
								<option value="">Select</option>
								<option value="1">Yes</option>
								<option value="0">No</option>
							</select>
						</div>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col col-md-3 col-lg-3 col-xl-3">
					<div class="form-group">
						<label for="kitchen">Kitchen</label>
						<div class="input-group">
							<div class="input-group-prepend">
								<span class="input-group-text"><i class="fas fa-utensils text-fuchsia"></i></span>
							</div>
							<input type="text" class="form-control" name="kitchen" id="edit_kitchen" value="">
						</div>
					</div>
				</div>
				<div class="col col-md-3 col-lg-3 col-xl-3">
					<div class="form-group">
						<label for="hall">Hall</label>
						<div class="input-group">
							<div class="input-group-prepend">
								<span class="input-group-text"><i class="fas fa-square text-gray"></i></span>
							</div>
							<input type="text" class="form-control" name="hall" id="edit_hall" value="">
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
							<select  class="form-control" name="owner_id" id="edit_owner_id">
								<option value="">Select</option>
								@foreach($owners as $owner)
								 <option value="{{$owner->id}}">{{$owner->name}}</option>
								@endforeach
							</select>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="modal-footer">
			<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
			<button type="submit" class="btn btn-primary">Save changes</button>
		</div>
		</div>
	</div>
</div>
{{Form::close()}}