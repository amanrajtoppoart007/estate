{{Form::open(['id'=>'allot_property_form'])}}
<input type="hidden" name="owner_id"  id="owner_id" value="">
<div class="modal" tabindex="-1" role="dialog" id="allocate_unit_modal">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Allot Unit To Owner</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-12 col-sm-3 col-md-3 col-xl-3 col-lg-3">
                        <div class="form-group">
                            <label for="property_id">Building</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <div class="input-group-text">
                                        <i class="fa fa-building"></i>
                                    </div>
                                </div>
                                <select class="form-control" id="property_id" name="property_id">
                                    <option value="">Select Building</option>
                                    @foreach($properties as $property)
                                        <option value="{{$property->id}}">{{$property->title}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Allot Unit</button>
            </div>
        </div>
    </div>
</div>

{{Form::close()}}

<script>
    $(document).ready(function(){

        let html = `
        <div class="col-12 col-sm-3 col-md-3 col-xl-3 col-lg-3">
                        <div class="form-group">
                            <label for="unit_id">Flat</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <div class="input-group-text">
                                        <i class="fa fa-building"></i>
                                    </div>
                                </div>
                                <input type="hidden" name="unit_id" value="">
                                <input type="text" name="flat_no" value="">
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-sm-3 col-md-3 col-xl-3 col-lg-3">
                        <div class="form-group">
                            <label for="purchase_date">Purchasing Date</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <div class="input-group-text">
                                        <i class="fa fa-building"></i>
                                    </div>
                                </div>
                                <input type="text" class="form-control" name="purchase_date[]"
                                       value="">
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-sm-3 col-md-3 col-xl-3 col-lg-3">
                        <div class="form-group">
                            <label for="purchase_cost">Purchasing Cost</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <div class="input-group-text">
                                        <i class="fa fa-building"></i>
                                    </div>
                                </div>
                                <input type="text" class="form-control" name="purchase_cost[]"
                                       value="">
                            </div>
                        </div>
                    </div>`;
    });
</script>
