{{Form::open(['id'=>'allot_unit_form'])}}
<div class="modal" tabindex="-1" role="dialog" id="allotUnitModal">
	<div class="modal-dialog modal-xl" role="document">
		<div class="modal-content">
		<div class="modal-header bg-primary">
			<h5 class="modal-title">Allot Property Unit</h5>
			<button type="button" class="close" data-dismiss="modal" aria-label="Close">
			<span aria-hidden="true">&times;</span>
			</button>
		</div>
		<div class="modal-body">
			<div class="row">
				<div class="col col-md-3 col-lg-3 col-xl-3">
					<div class="form-group">
						<label for="allot_unit_id">Property Unit</label>
						<div class="input-group">
							<div class="input-group-prepend">
								<span class="input-group-text"><i class="fas fa-building text-indigo"></i></span>
							</div>

							<select  class="form-control" name="property_unit_id" id="allot_unit_id">
								 <option value="">Select Unit Type</option>
								@foreach($property_units as $prop_unit)
                                    @if($prop_unit->unit_status=='1')
							        <option value="{{$prop_unit->id}}">{{$prop_unit->unitcode}}/{{$prop_unit->flat_number}}/</option>
                                    @endif
								@endforeach
							</select>
						</div>
					</div>
				</div>
                <div class="col col-md-3 col-lg-3 col-xl-3">
					<div class="form-group">
						<label for="allot_alllotment_type">Allotment Type</label>
						<div class="input-group">
							<div class="input-group-prepend">
								<span class="input-group-text"><i class="fas fa-user text-info"></i></span>
							</div>
							<select  class="form-control" name="allotment_type" id="allot_alllotment_type">
                                @php $modes = array('1'=>'RENT','2'=>'SALE');@endphp
								<option value="">Select</option>
								@foreach($modes as $key=>$value)
								 <option value="{{$key}}">{{$value}}</option>
								@endforeach
							</select>
						</div>
					</div>
			</div>
                <div class="col col-md-3 col-lg-3 col-xl-3">
					<div class="form-group">
						<label for="allot_client_id">Tenant/Buyer</label>
						<div class="input-group">
							<div class="input-group-prepend">
								<span class="input-group-text"><i class="fas fa-user text-info"></i></span>
							</div>
							<select  class="form-control" name="client_id" id="allot_client_id">

							</select>
						</div>
					</div>
			</div>

			</div>
		</div>
		<div class="modal-footer">
			<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
			<button type="submit" class="btn btn-primary">Allot Unit</button>
		</div>
		</div>
	</div>
</div>
{{Form::close()}}
