@extends("admin.layout.app")
@include("admin.include.breadcrumb",["page_title"=>"BreakDown Setting"])
@section("content")
    <div class="card">
        <div class="card-body">
            @foreach(get_tenancy_types() as $tenancy_type=>$tenancy)
            <div class="card">
                <div class="card-header bg-gradient-orange">
                    <h6 class="text-white">BreakDown : Tenancy Type - {{$tenancy}}</h6>
                </div>
                <div class="card-body table-responsive">
                     <table class="table table-condensed">
                         <thead>
                            <tr>
                                <th class="width_200px">Unit Type</th>
                                <th>Municipality Fess</th>
                                <th>Security Deposit</th>
                                <th>Brokerage</th>
                                <th>Contract</th>
                                <th>Remote Deposit</th>
                                <th>Sewa Deposit</th>
                            </tr>
                         </thead>
                         <tbody>
                         @foreach(get_unit_types() as $unit=>$unit_title)
                            <tr>
                                <td>
                                    <input type="hidden" class="form-control" name="tenancy_type[]" value="{{$tenancy_type}}" readonly>
                                    <input type="text" class="form-control" name="unit_type[]" value="{{$unit}}" readonly>
                                </td>
                                <td>
                                    <input type="text" class="form-control" name="municipality_fees[]" value="">
                                </td>
                                <td>
                                   <input type="text" class="form-control" name="security_deposit[]" value="">
                                </td>
                                <td>
                                  <input type="text" class="form-control" name="brokerage[]" value="">
                                </td>
                                <td>
                                  <input type="text" class="form-control" name="contract[]" value="">
                                </td>
                                <td>
                                  <input type="text" class="form-control" name="remote_deposit[]" value="">
                                </td>
                                <td>
                                  <input type="text" class="form-control" name="sewa_deposit[]" value="">
                                </td>
                            </tr>
                             @endforeach
                         </tbody>
                     </table>
                </div>
            </div>
            @endforeach
        </div>
    </div>
@endsection
