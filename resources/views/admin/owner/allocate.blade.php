@extends("admin.layout.app")
@section("content")

    {{Form::open(['id'=>'allot_property_form','autocomplete'=>'off'])}}
    <input type="hidden" name="owner_id" id="owner_id" value="{{$owner_id}}">
    <div class="card">
        <div class="card-body">
            <table class="table">
                <thead>
                <tr>
                    <th>Building</th>
                    <th>Flat No.</th>
                    <th>Purchasing Date</th>
                    <th>Purchasing Cost</th>
                </tr>
                </thead>
                <tbody id="unit_grid">
                <tr>
                    <td>
                        <div class="form-group">
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
                    </td>
                    <td>
                        <div class="form-group">
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <div class="input-group-text">
                                        <i class="fa fa-building"></i>
                                    </div>
                                </div>
                                <select type="text" name="unit_id" id="unit_id" class="form-control">
                                </select>
                            </div>
                        </div>
                    </td>
                    <td>
                        <div class="form-group">
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <div class="input-group-text">
                                        <i class="fa fa-building"></i>
                                    </div>
                                </div>
                                <input type="text" class="form-control" name="purchase_date" id="purchase_date" value="">
                            </div>
                        </div>
                    </td>
                    <td>
                        <div class="form-group">
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <div class="input-group-text">
                                        <i class="fa fa-building"></i>
                                    </div>
                                </div>
                                <input type="text" class="form-control numeric" name="purchase_cost" id="purchase_cost" value="">
                            </div>
                        </div>
                    </td>
                </tr>
                </tbody>
            </table>
        </div>
        <div class="card-footer">
            <div class="row">
                <div class="col text-right">
                    <button type="submit" class="btn btn-primary">Allot Unit</button>
                </div>
            </div>
        </div>
    </div>
    {{Form::close()}}
@endsection
 @section('head')
    <link rel="stylesheet" href="{{asset('plugin/datetimepicker/css/gijgo.min.css')}}">
@endsection
@section('js')
<script src="{{asset('plugin/datetimepicker/js/gijgo.min.js')}}"></script>
@endsection
@section("script")
    <script>
        $(document).ready(function () {

            $("#purchase_date").datepicker({ footer: true, modal: true,format: 'dd-mm-yyyy', minDate : '{{now()->format('d-m-Y')}}'});

            $("#property_id").on("change", function (e) {
                let url = "{{route('get.unit.list')}}";
                let params = {
                    property_id: $(this).val()
                };

                function fn_success(result) {
                    let units = result.data;
                    let html = `<option value="">Select Unit</option>`;
                    $.each(units, function (index, item) {
                        html += `<option value="${item.id}">${item.flat_number}</option>`;
                    })
                    $("#unit_id").html(html);
                }

                function fn_error(result) {
                    toast('error', result.message, 'top-right');
                }

                $.fn_ajax(url, params, fn_success, fn_error);
            });

            $("#allot_property_form").on("submit",function(e){
                e.preventDefault();
                let url = "{{route('owner.allot.property.unit')}}";
                let params = $("#allot_property_form").serialize();
                function fn_success(result)
                {
                    toast("success",result.message,"top-right");
                    $("#allot_property_form")[0].reset();
                }
                function fn_error(result)
                {
                    toast("error",result.message,"top-right");
                }

                $.fn_ajax(url,params,fn_success,fn_error);

            })
        });
    </script>
@endsection
