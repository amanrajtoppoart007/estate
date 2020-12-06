{{Form::open(['id'=>'allot_unit_form'])}}

<div id="allotUnitModal" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-xl" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Add Property Unit</h5>
        <button type="button" class="btn btn-xs btn-icon btn-ghost-secondary" data-dismiss="modal" aria-label="Close">
          <i class="tio-clear tio-lg"></i>
        </button>
      </div>
      <div class="modal-body">
			<div class="row">
				<div class="col col-md-3 col-lg-3 col-xl-3">
					<div class="form-group">
						<label for="allot_unit_id">Property Unit</label>
						

							<select  class="js-select2-custom" name="property_unit_id" id="allot_unit_id">
								 <option value="">Select Unit Type</option>
								@foreach($property_units as $prop_unit)
                                    @if($prop_unit->unit_status=='1')
							        <option value="{{$prop_unit->id}}">{{$prop_unit->unitcode}}/{{$prop_unit->flat_number}}/</option>
                                    @endif
								@endforeach
							</select>
					</div>
				</div>
                <div class="col col-md-3 col-lg-3 col-xl-3">
					<div class="form-group">
						<label for="allot_alllotment_type">Allotment Type</label>
							
							<select  class="js-select2-custom" name="allotment_type" id="allot_alllotment_type">
                                @php $modes = array('1'=>'RENT','2'=>'SALE');@endphp
								<option value="">Select</option>
								@foreach($modes as $key=>$value)
								 <option value="{{$key}}">{{$value}}</option>
								@endforeach
							</select>
					</div>
			</div>
                <div class="col col-md-3 col-lg-3 col-xl-3">
					<div class="form-group">
						<label for="allot_client_id">Tenant/Buyer</label>
							
							<select  class="js-select2-custom" name="client_id" id="allot_client_id">

							</select>
					</div>
			</div>

			</div>
		</div>
      
      <div class="modal-footer">
        <button type="button" class="btn btn-white" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Allot Unit</button>
      </div>
    </div>
  </div>
</div>
<!-- End Modal -->


{{Form::close()}}
